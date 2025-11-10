<?php
// top of public_html/index.php — put this before headers/output
// ensure identity/session available on every page
if (file_exists(__DIR__ . '/core/identity.php')) {
    require_once __DIR__ . '/core/identity.php';
}
$page = $_GET['page'] ?? 'home';

require_once __DIR__ . '/includes/db.php';
header("Content-Type: text/html; charset=utf-8");

// ===== CONFIGURATION (MATCHED TO YOUR FRONTEND) =====
$TREASURY = '6S4eDdYXABgtmuk3waLM63U2KHgExcD9mco7MuyG9f5G';
$MIN_USD = 25;
$MAX_USD = 2000;
$UNLOCK_START = '2026-01-01';
$UNLOCK_RATE = 5;
$PHASES = [
  ['phase'=>1,'range'=>'0–25M','price'=>0.0001,'max_tokens'=>25000000,'sold'=>0],
  ['phase'=>2,'range'=>'25M–100M','price'=>0.0005,'max_tokens'=>75000000,'sold'=>0],
  ['phase'=>3,'range'=>'100M–150M','price'=>0.0010,'max_tokens'=>50000000,'sold'=>0],
  ['phase'=>4,'range'=>'150M–200M','price'=>0.0020,'max_tokens'=>50000000,'sold'=>0],
  ['phase'=>5,'range'=>'200M–250M','price'=>0.0030,'max_tokens'=>50000000,'sold'=>0],
  ['phase'=>6,'range'=>'250M–300M','price'=>0.0050,'max_tokens'=>50000000,'sold'=>0]
];

// Calculate current phase based on total tokens sold
function getCurrentPhase($conn, $PHASES) {
    $total_sold = 0;
    $result = $conn->query("SELECT SUM(total_tokens) as total FROM vesting_schedule");
    if ($result && $row = $result->fetch_assoc()) {
        $total_sold = $row['total'] ?? 0;
    }
    
    foreach ($PHASES as $index => $phase) {
        $phase_start = $index > 0 ? $PHASES[$index-1]['max_tokens'] : 0;
        $phase_end = $phase['max_tokens'];
        
        if ($total_sold < $phase_end) {
            return $index;
        }
    }
    return -1; // All phases sold out
}

// ===== UTILITIES =====
function solPrice() {
  $r = @file_get_contents('https://api.coingecko.com/api/v3/simple/price?ids=solana&vs_currencies=usd');
  return $r ? (json_decode($r,true)['solana']['usd'] ?? null) : null;
}

function rpc($payload){
  $ch=curl_init('https://api.mainnet-beta.solana.com');
  curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>1,
  CURLOPT_POSTFIELDS=>json_encode($payload),
  CURLOPT_HTTPHEADER=>['Content-Type: application/json']]);
  $r=curl_exec($ch);curl_close($ch);
  return json_decode($r,true);
}

// Get current phase
$current_phase_index = getCurrentPhase($conn, $PHASES);

// ===== PROCESSING =====
$message=''; $error='';
if($_SERVER['REQUEST_METHOD']==='POST' && ($_POST['step']??'')==='submit_tx'){
  $sig=trim($_POST['signature']??'');
  $wallet=trim($_POST['buyer_wallet']??'');
  $phaseIndex=intval($_POST['phase']??0);

  if(!$sig||!$wallet) $error='Missing wallet or transaction signature.';
  elseif(!isset($PHASES[$phaseIndex])) $error='Invalid presale phase.';
  elseif($phaseIndex != $current_phase_index) $error='This phase is no longer available. Please check current phase.';
  else {
    $sol_usd=solPrice();
    if(!$sol_usd) $error='Failed to fetch SOL price.';
    else {
      $r=rpc(["jsonrpc"=>"2.0","id"=>1,"method"=>"getTransaction","params"=>[$sig,"jsonParsed"]]);
      if(!isset($r['result']['meta'])) $error='Transaction not found on Solana.';
      else {
        $meta=$r['result']['meta'];
        $keys=array_map(fn($k)=>$k['pubkey'],$r['result']['transaction']['message']['accountKeys']);
        $i=array_search($TREASURY,$keys);
        if($i===false) $error='Treasury wallet not found in transaction.';
        else {
          $pre=$meta['preBalances'][$i]??0; $post=$meta['postBalances'][$i]??0;
          $lam=$post-$pre; if($lam<=0) $error='No SOL received by treasury.';
          else {
            $sol=$lam/1_000_000_000; $usd=$sol*$sol_usd;
            if($usd<$MIN_USD) $error="Below minimum of $$MIN_USD";
            elseif($usd>$MAX_USD) $error="Exceeds maximum of $$MAX_USD";
            else {
              $price=$PHASES[$phaseIndex]['price'];
              $tokens=$usd/$price;

              // Check if phase has enough tokens
              $total_sold = 0;
              $result = $conn->query("SELECT SUM(total_tokens) as total FROM vesting_schedule");
              if ($result && $row = $result->fetch_assoc()) {
                  $total_sold = $row['total'] ?? 0;
              }
              
              $phase_start = $phaseIndex > 0 ? $PHASES[$phaseIndex-1]['max_tokens'] : 0;
              $phase_remaining = $PHASES[$phaseIndex]['max_tokens'] - max(0, $total_sold - $phase_start);
              
              if ($tokens > $phase_remaining) {
                  $error="Phase ".($phaseIndex+1)." has only ".number_format($phase_remaining)." tokens remaining. Please reduce your purchase amount.";
              } else {
                  $stmt=$conn->prepare("SELECT id FROM vesting_schedule WHERE wallet_address=? AND start_date=?");
                  $stmt->bind_param("ss",$wallet,$UNLOCK_START);
                  $stmt->execute();$stmt->store_result();
                  if($stmt->num_rows>0) $error='This wallet already registered.';
                  else {
                    $q=$conn->prepare("INSERT INTO vesting_schedule(wallet_address,total_tokens,claimed_tokens,start_date,unlock_rate,created_at)
                      VALUES(?, ?, 0, ?, ?, NOW())");
                    $q->bind_param("sdss",$wallet,$tokens,$UNLOCK_START,$UNLOCK_RATE);
                    if($q->execute()) {
                      $message="✅ Verified transaction.<br><strong>".number_format($tokens,2)." MYXN</strong> allocated (≈$".number_format($usd,2).")";
                      // Update current phase after successful purchase
                      $current_phase_index = getCurrentPhase($conn, $PHASES);
                    } else $error='Database error saving record.';
                  }
              }
            }
          }
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>MyXen Foundation – Pre-Sale</title>
    <meta name="description" content="MyXen Foundation Pre-Sale - Join the decentralized revolution">
    
    <style>
    /* CSS Variables for Theme - Matching Index */
    :root {
      --bg: #ffffff;
      --text: #111111;
      --card-bg: rgba(255, 255, 255, 0.7);
      --border: rgba(0, 0, 0, 0.05);
      --primary: #007AFF;
      --secondary: #30D158;
      --accent: #FF9F0A;
      --header-bg: rgba(255, 255, 255, 0.8);
      --shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
      --glass-bg: rgba(255, 255, 255, 0.25);
      --glass-border: rgba(255, 255, 255, 0.18);
      --section-spacing: clamp(3rem, 8vw, 6rem);
    }

    [data-theme="dark"] {
      --bg: #000000;
      --text: #f5f5f7;
      --card-bg: rgba(30, 30, 30, 0.7);
      --border: rgba(255, 255, 255, 0.05);
      --primary: #0A84FF;
      --secondary: #32D74B;
      --accent: #FF9F0A;
      --header-bg: rgba(0, 0, 0, 0.8);
      --shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      --glass-bg: rgba(0, 0, 0, 0.25);
      --glass-border: rgba(255, 255, 255, 0.1);
    }

    /* Reset and Base Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      -webkit-text-size-adjust: 100%;
      scroll-behavior: smooth;
      font-size: 16px;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      line-height: 1.6;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Mobile Navigation Toggle */
    .mobile-nav-toggle {
      display: none;
      background: none;
      border: none;
      width: 44px;
      height: 44px;
      cursor: pointer;
      z-index: 1001;
      position: relative;
      align-items: center;
      justify-content: center;
    }

    .mobile-nav-toggle span {
      display: block;
      width: 22px;
      height: 2px;
      background: var(--text);
      transition: all 0.3s ease;
      position: relative;
    }

    .mobile-nav-toggle span::before,
    .mobile-nav-toggle span::after {
      content: '';
      position: absolute;
      width: 22px;
      height: 2px;
      background: var(--text);
      transition: all 0.3s ease;
    }

    .mobile-nav-toggle span::before {
      top: -6px;
    }

    .mobile-nav-toggle span::after {
      top: 6px;
    }

    .mobile-nav-toggle.active span {
      background: transparent;
    }

    .mobile-nav-toggle.active span::before {
      transform: rotate(45deg) translate(4px, 4px);
    }

    .mobile-nav-toggle.active span::after {
      transform: rotate(-45deg) translate(4px, -4px);
    }

    /* Header Styles */
    .site-header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      background: var(--header-bg);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border);
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .header-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0.75rem 1rem;
      max-width: 1440px;
      margin: 0 auto;
    }

    .logo {
      height: 32px;
      width: auto;
      transition: transform 0.3s ease;
    }

    .logo:hover {
      transform: scale(1.05);
    }

    /* Desktop Navigation */
    .desktop-nav {
      display: flex;
      gap: 2rem;
      align-items: center;
    }

    .desktop-nav a {
      color: var(--text);
      text-decoration: none;
      font-weight: 500;
      font-size: 0.95rem;
      transition: color 0.3s ease;
      opacity: 0.8;
    }

    .desktop-nav a:hover,
    .desktop-nav a.active {
      color: var(--primary);
      opacity: 1;
    }

    .header-actions {
      display: flex;
      gap: 0.75rem;
      align-items: center;
    }

    .theme-btn, .connect-btn {
      background: none;
      border: 1px solid var(--border);
      width: 40px;
      height: 40px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .theme-btn:hover, .connect-btn:hover {
      transform: translateY(-1px);
      box-shadow: var(--shadow);
    }

    .connect-btn {
      background: var(--primary);
      color: white;
      border: none;
      width: auto;
      padding: 0 1rem;
      font-weight: 600;
      font-size: 0.9rem;
    }

    .connect-btn.connected {
      background: var(--secondary);
    }

    /* Mobile Navigation */
    .mobile-nav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: var(--header-bg);
      backdrop-filter: blur(30px);
      -webkit-backdrop-filter: blur(30px);
      z-index: 999;
      transform: translateX(-100%);
      transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1);
      padding: 5rem 2rem 2rem;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .mobile-nav.active {
      transform: translateX(0);
    }

    .mobile-nav a {
      color: var(--text);
      text-decoration: none;
      font-weight: 500;
      font-size: 1.25rem;
      padding: 1rem 0;
      border-bottom: 1px solid var(--border);
      transition: color 0.3s ease;
      opacity: 0.8;
    }

    .mobile-nav a:hover,
    .mobile-nav a.active {
      color: var(--primary);
      opacity: 1;
    }

    /* Hero Section */
    .hero {
      min-height: 60vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 6rem 1rem 4rem;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(ellipse at center, transparent 0%, var(--bg) 70%);
      z-index: -1;
    }

    .hero-content {
      max-width: 800px;
      margin: 0 auto;
    }

    .hero h1 {
      font-size: clamp(2.5rem, 5vw, 4rem);
      font-weight: 700;
      line-height: 1.1;
      margin-bottom: 1.5rem;
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      letter-spacing: -0.02em;
    }

    .hero p {
      font-size: clamp(1.125rem, 2.5vw, 1.5rem);
      line-height: 1.4;
      margin-bottom: 2.5rem;
      opacity: 0.8;
      font-weight: 400;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    /* Section Styles */
    .section {
      padding: var(--section-spacing) 1rem;
    }

    .section-header {
      text-align: center;
      margin-bottom: 4rem;
    }

    .section-title {
      font-size: clamp(2rem, 4vw, 3rem);
      font-weight: 700;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 1rem;
      letter-spacing: -0.02em;
    }

    .section-subtitle {
      font-size: 1.25rem;
      opacity: 0.7;
      max-width: 600px;
      margin: 0 auto;
    }

    /* Card Styles */
    .card {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 24px;
      padding: 2.5rem;
      margin: 2rem auto;
      max-width: 600px;
      text-align: center;
    }

    /* Form Styles */
    .form-group {
      margin-bottom: 1.5rem;
      text-align: left;
    }

    .form-label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      color: var(--primary);
    }

    .form-input, .form-select {
      width: 100%;
      padding: 1rem 1.25rem;
      border: 1px solid var(--border);
      border-radius: 12px;
      background: transparent;
      color: var(--text);
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .form-input:focus, .form-select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
    }

    .form-input:disabled, .form-select:disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 1rem 2rem;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    .btn-primary {
      background: var(--primary);
      color: white;
    }

    .btn-primary:hover:not(:disabled) {
      background: var(--secondary);
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .btn-primary:disabled {
      background: var(--border);
      cursor: not-allowed;
      transform: none;
    }

    .btn-secondary {
      background: transparent;
      color: var(--primary);
      border: 2px solid var(--primary);
    }

    .btn-secondary:hover {
      background: var(--primary);
      color: white;
      transform: translateY(-2px);
    }

    /* Message Styles */
    .message {
      padding: 1.5rem;
      border-radius: 12px;
      margin: 1.5rem 0;
      text-align: center;
    }

    .message.error {
      background: rgba(220, 38, 38, 0.1);
      border: 1px solid rgba(220, 38, 38, 0.3);
      color: #ef4444;
    }

    .message.success {
      background: rgba(34, 197, 94, 0.1);
      border: 1px solid rgba(34, 197, 94, 0.3);
      color: #22c55e;
    }

    /* Treasury Address */
    .treasury-address {
      background: var(--card-bg);
      border: 1px solid var(--border);
      padding: 1.5rem;
      border-radius: 12px;
      margin: 2rem 0;
      word-break: break-all;
      font-family: monospace;
      font-size: 0.9rem;
    }

    /* Presale Table */
    .presale-table {
      width: 100%;
      max-width: 800px;
      margin: 2rem auto;
      border-collapse: collapse;
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border-radius: 16px;
      overflow: hidden;
      border: 1px solid var(--glass-border);
    }

    .presale-table th,
    .presale-table td {
      padding: 1rem 1.5rem;
      text-align: left;
      border-bottom: 1px solid var(--border);
    }

    .presale-table th {
      background: var(--primary);
      color: white;
      font-weight: 600;
      font-size: 0.9rem;
    }

    .presale-table tr:last-child td {
      border-bottom: none;
    }

    .presale-table tr:hover {
      background: var(--glass-bg);
    }

    .phase-badge {
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
    }

    .phase-badge.current {
      background: var(--secondary);
      color: black;
    }

    .phase-badge.upcoming {
      background: var(--accent);
      color: black;
    }

    .phase-badge.completed {
      background: var(--border);
      color: var(--text);
    }

    /* Rules List */
    .rules-list {
      list-style: none;
      max-width: 600px;
      margin: 2rem auto;
      text-align: left;
    }

    .rules-list li {
      padding: 0.75rem 0;
      border-bottom: 1px solid var(--border);
    }

    .rules-list li:last-child {
      border-bottom: none;
    }

    .rules-list strong {
      color: var(--primary);
    }

    /* Current Phase Indicator */
    .current-phase {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white;
      padding: 1rem 2rem;
      border-radius: 12px;
      margin: 2rem 0;
      font-weight: 600;
    }

    /* Footer */
    footer {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-top: 1px solid var(--border);
      padding: 4rem 1rem 2rem;
      margin-top: 4rem;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr;
      gap: 3rem;
      text-align: center;
    }

    .footer-section h3 {
      margin-bottom: 1.5rem;
      color: var(--primary);
      font-size: 1.25rem;
    }

    .footer-links {
      list-style: none;
      display: inline-block;
      text-align: left;
    }

    .footer-links li {
      margin-bottom: 0.75rem;
    }

    .footer-links a {
      color: var(--text);
      text-decoration: none;
      opacity: 0.8;
      transition: all 0.3s ease;
      font-size: 1rem;
    }

    .footer-links a:hover {
      opacity: 1;
      color: var(--primary);
      transform: translateX(5px);
    }

    .copyright {
      text-align: center;
      margin-top: 3rem;
      padding-top: 2rem;
      border-top: 1px solid var(--border);
      opacity: 0.7;
      font-size: 0.9rem;
    }

    /* Company Registration */
    .company-registration {
      text-align: center;
      margin: 1.5rem 0;
      padding: 1rem;
      background: var(--glass-bg);
      border-radius: 12px;
      border: 1px solid var(--glass-border);
    }

    .company-registration p {
      margin: 0;
      font-size: 0.9rem;
      opacity: 0.8;
    }

    /* Verified Badges */
    .verified-badges {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin: 2rem 0;
      align-items: center;
      justify-content: center;
    }

    .badge {
      background: var(--secondary);
      color: black;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      width: fit-content;
    }

    .badge.solana { background: #9945FF; color: white; }
    .badge.gdpr { background: #059669; color: white; }
    .badge.safe { background: #60a5fa; color: white; }
    .badge.ssl { background: #00d664; color: white; }
    .badge.visa { background: #1a1f71; color: white; }
    .badge.solana-pay { background: linear-gradient(45deg, #9945FF, #14F195); color: white; }
    .badge.secure-payment { background: #dc2626; color: white; }

    /* Responsive */
    @media (max-width: 767px) {
      .mobile-nav-toggle {
        display: flex;
      }
      
      .desktop-nav {
        display: none;
      }
      
      .card {
        padding: 1.5rem;
        margin: 1rem auto;
      }
      
      .presale-table {
        font-size: 0.8rem;
      }
      
      .presale-table th,
      .presale-table td {
        padding: 0.75rem 1rem;
      }

      .verified-badges {
        flex-direction: column;
      }
    }

    @media (min-width: 768px) {
      .header-container {
        padding: 1rem 2rem;
      }
      
      .logo {
        height: 40px;
      }
      
      .hero {
        padding: 8rem 2rem 6rem;
      }
      
      .footer-content {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
      }
      
      .verified-badges {
        flex-direction: row;
        justify-content: center;
        flex-wrap: wrap;
      }
    }
    </style>
</head>
<body>
    <!-- Site Header -->
    <header class="site-header">
        <div class="header-container">
            <!-- Logo -->
            <a href="index.php">
                <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyXen Foundation" class="logo">
            </a>

            <!-- Mobile Navigation Toggle -->
            <button class="mobile-nav-toggle" id="mobile-nav-toggle">
                <span></span>
            </button>

            <!-- Desktop Navigation -->
            <nav class="desktop-nav">
                <a href="tokenomics.php">Tokenomics</a>
                <a href="whitepaper.php">Whitepaper</a>
                <a href="presale.php" class="active">Pre-Sale</a>
                <a href="student-rewards.php">Student Rewards</a>
                <a href="developers.php">Developers</a>
                <a href="merchants.php">For Businesses</a>
            </nav>

            <!-- Header Actions -->
            <div class="header-actions">
                <button id="theme-toggle" class="theme-btn">☀️</button>
                <button id="connect-btn" class="connect-btn">Connect Wallet</button>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation -->
    <nav class="mobile-nav" id="mobile-nav">
        <a href="tokenomics.php">Tokenomics</a>
        <a href="whitepaper.php">Whitepaper</a>
        <a href="presale.php" class="active">Pre-Sale</a>
        <a href="student-rewards.php">Student Rewards</a>
        <a href="developers.php">Developers</a>
        <a href="merchants.php">For Businesses</a>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>MyXenPay Global Pre-Sale</h1>
            <p>Join the decentralized revolution. Secure your MYXN tokens before the public launch.</p>
            
            <?php if ($current_phase_index >= 0): ?>
                <div class="current-phase">
                    🔥 Current Phase: <?php echo $PHASES[$current_phase_index]['phase']; ?> - 
                    $<?php echo number_format($PHASES[$current_phase_index]['price'], 4); ?> per MYXN
                </div>
            <?php else: ?>
                <div class="current-phase" style="background: var(--accent);">
                    🎉 All Phases Completed! Pre-Sale Concluded.
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Pre-Sale Form Section -->
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Participate in Pre-Sale</h2>
            <p class="section-subtitle">Send SOL to our treasury wallet and verify your transaction</p>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 1.5rem; color: var(--primary);">Treasury Wallet Address</h3>
            <div class="treasury-address">
                <?php echo $TREASURY; ?>
            </div>
            <p style="margin-bottom: 2rem; opacity: 0.8; font-size: 0.9rem;">
                Send SOL only to this address. Minimum $<?php echo $MIN_USD; ?>, maximum $<?php echo $MAX_USD; ?> per wallet.
            </p>

            <?php if($error): ?>
                <div class="message error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if($message): ?>
                <div class="message success"><?php echo $message; ?></div>
            <?php endif; ?>

            <form method="post">
                <input type="hidden" name="step" value="submit_tx">
                
                <div class="form-group">
                    <label class="form-label" for="buyer_wallet">Your Solana Wallet Address</label>
                    <input type="text" id="buyer_wallet" name="buyer_wallet" class="form-input" 
                           placeholder="Enter your wallet address" required 
                           <?php echo $current_phase_index < 0 ? 'disabled' : ''; ?>>
                </div>

                <div class="form-group">
                    <label class="form-label" for="signature">Transaction Signature</label>
                    <input type="text" id="signature" name="signature" class="form-input" 
                           placeholder="Enter transaction signature from your wallet" required
                           <?php echo $current_phase_index < 0 ? 'disabled' : ''; ?>>
                </div>

                <div class="form-group">
                    <label class="form-label" for="phase">Pre-Sale Phase</label>
                    <select id="phase" name="phase" class="form-select" 
                            <?php echo $current_phase_index < 0 ? 'disabled' : ''; ?>>
                        <?php foreach($PHASES as $i=>$p): ?>
                            <option value="<?php echo $i; ?>" 
                                    <?php echo $i == $current_phase_index ? 'selected' : ($i < $current_phase_index ? 'disabled' : 'disabled'); ?>>
                                Phase <?php echo $p['phase']; ?> — 
                                $<?php echo number_format($p['price'],4); ?> / MYXN
                                <?php echo $i == $current_phase_index ? ' (Current)' : ($i < $current_phase_index ? ' (Completed)' : ' (Upcoming)'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" 
                        <?php echo $current_phase_index < 0 ? 'disabled' : ''; ?>>
                    <?php echo $current_phase_index < 0 ? 'Pre-Sale Completed' : 'Verify Transaction'; ?>
                </button>
            </form>
        </div>
    </section>

    <!-- Pre-Sale Rules Section -->
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Pre-Sale Rules</h2>
            <p class="section-subtitle">Important information for participants</p>
        </div>

        <div class="card">
            <ul class="rules-list">
                <li>✅ Accepts <strong>SOL</strong> only</li>
                <li>✅ Minimum <strong>$<?php echo $MIN_USD; ?></strong>, maximum <strong>$<?php echo $MAX_USD; ?></strong> per wallet</li>
                <li>✅ <strong>6 Phases</strong>, total 300M MYXN pre-sale supply</li>
                <li>✅ Unlocks on <strong><?php echo $UNLOCK_START; ?></strong> — <?php echo $UNLOCK_RATE; ?>% daily vesting</li>
                <li>✅ Each phase has limited token allocation</li>
                <li>✅ Once a phase is completed, it becomes unavailable</li>
                <li>✅ Transactions are verified on-chain for security</li>
            </ul>
        </div>
    </section>

    <!-- Pre-Sale Phases Section -->
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Pre-Sale Phases</h2>
            <p class="section-subtitle">6 phases with increasing price - Sequential availability</p>
        </div>
        
        <table class="presale-table">
            <thead>
                <tr>
                    <th>Phase</th>
                    <th>Token Range</th>
                    <th>Price (USD)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($PHASES as $i=>$p): ?>
                    <tr>
                        <td>Phase <?php echo $p['phase']; ?></td>
                        <td><?php echo $p['range']; ?></td>
                        <td>$<?php echo number_format($p['price'],4); ?></td>
                        <td>
                            <?php if($i == $current_phase_index): ?>
                                <span class="phase-badge current">Current</span>
                            <?php elseif($i < $current_phase_index): ?>
                                <span class="phase-badge completed">Completed</span>
                            <?php else: ?>
                                <span class="phase-badge upcoming">Upcoming</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>MyXen Foundation</h3>
                <p>Building a Decentralized Tomorrow, Responsibly and Transparently</p>
                
                <!-- Company Registration -->
                <div class="company-registration">
                    <p>🏢 <strong>UK Registered Company</strong><br>Registration Number: °°°°°°</p>
                    <p>📧 contact@myxenpay.finance<br>☎️ +1 (786) 509-7729</p>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Connect</h3>
                <ul class="footer-links">
                    <li><a href="https://x.com/myxenpay" target="_blank">Twitter / X</a></li>
                    <li><a href="https://t.me/myxenpay" target="_blank">Telegram</a></li>
                    <li><a href="https://www.facebook.com/myxen.foundation/" target="_blank">Facebook</a></li>
                    <li><a href="https://www.instagram.com/myxenp_inc/" target="_blank">Instagram</a></li>
                    <li><a href="mailto:support@myxenpay.finance">Email Support</a></li>
                    <li><a href="https://github.com/bikkhoto/myxenpay.finance" target="_blank">GitHub</a></li>
                </ul>
                <div style="background: var(--card-bg); border: 1px solid var(--border); padding: 15px; border-radius: 8px; margin-top: 15px;">
                    <p style="margin: 0; font-size: 0.9rem; color: var(--text);">🚀 <strong>Pre-Sale Starting:</strong> November 10, 2025</p>
                </div>
            </div>
        </div>
        
        <!-- Updated Verified Badges -->
        <div class="verified-badges">
            <span class="badge solana">✅ Verified by Solana</span>
            <span class="badge solana-pay">⚡ Solana Pay Verified</span>
            <span class="badge gdpr">🔒 GDPR Compliant</span>
            <span class="badge ssl">🔐 SSL SECURED</span>
            <span class="badge visa">💳 VISA Verified</span>
            <span class="badge secure-payment">🛡️ Secure Payment</span>
        </div>
        
        <div class="copyright">
            <p>© 2025 MyXen Foundation LTD. All rights reserved. Building a decentralized tomorrow, responsibly and transparently.</p>
        </div>
    </footer>

    <script>
        // Theme Management
        function initTheme() {
            const saved = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (saved === 'dark' || (!saved && prefersDark)) {
                document.body.setAttribute('data-theme', 'dark');
                document.getElementById('theme-logo').src = 'myxenpay-logo-dark.png';
                document.getElementById('theme-toggle').textContent = '🌙';
            } else {
                document.body.setAttribute('data-theme', 'light');
                document.getElementById('theme-logo').src = 'myxenpay-logo-light.png';
                document.getElementById('theme-toggle').textContent = '☀️';
            }
        }

        // Mobile Navigation
        function initMobileNav() {
            const mobileNavToggle = document.getElementById('mobile-nav-toggle');
            const mobileNav = document.getElementById('mobile-nav');
            
            if (mobileNavToggle && mobileNav) {
                mobileNavToggle.addEventListener('click', () => {
                    mobileNavToggle.classList.toggle('active');
                    mobileNav.classList.toggle('active');
                    document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
                });

                // Close mobile nav when clicking on links
                mobileNav.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        mobileNavToggle.classList.remove('active');
                        mobileNav.classList.remove('active');
                        document.body.style.overflow = '';
                    });
                });
            }
        }

        // Theme Toggle
        function initThemeToggle() {
            const themeToggle = document.getElementById('theme-toggle');
            if (themeToggle) {
                themeToggle.addEventListener('click', () => {
                    const current = document.body.getAttribute('data-theme');
                    const newTheme = current === 'dark' ? 'light' : 'dark';
                    
                    document.body.setAttribute('data-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                    
                    // Update logo
                    const logo = document.getElementById('theme-logo');
                    if (logo) {
                        logo.src = newTheme === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
                    }
                    
                    // Update button text
                    themeToggle.textContent = newTheme === 'dark' ? '🌙' : '☀️';
                });
            }
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            initTheme();
            initMobileNav();
            initThemeToggle();
        });
    </script>
</body>
</html>