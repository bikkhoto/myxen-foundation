<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-KVWK4RJ2QN"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-KVWK4RJ2QN');
  </script>
  <meta name="google-site-verification" content="your-verification-code" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>$MYXN Tokenomics - MyXenPay</title>
  <meta name="description" content="Complete $MYXN token economics: pre-sale structure, transaction fees, burn policy, student cashback, and sustainable token utility.">
  <meta property="og:title" content="$MYXN Tokenomics - MyXenPay">
  <meta property="og:description" content="Pre-sale phases, 0.07% transaction fees, progressive burns, 5% student cashback. Real utility for global payments.">
  <meta property="og:image" content="https://myxenpay.finance/og/og-tokenomics.jpg">
  <meta name="twitter:card" content="summary_large_image">
  
  <style>
    /* Inherit CSS variables from index.php */
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

    /* Tokenomics-specific styles */
    .tokenomics-hero {
      padding: 8rem 1rem 4rem;
      text-align: center;
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 50%, var(--accent) 100%);
      color: white;
      position: relative;
      overflow: hidden;
    }

    .tokenomics-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,1000 1000,0 1000,1000"/></svg>');
      background-size: cover;
    }

    .tokenomics-hero h1 {
      font-size: clamp(2.5rem, 5vw, 4rem);
      font-weight: 700;
      margin-bottom: 1rem;
      position: relative;
    }

    .tokenomics-hero p {
      font-size: 1.25rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
      position: relative;
    }

    .token-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin: 3rem 0;
    }

    .token-card {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 2rem;
      text-align: center;
      transition: all 0.3s ease;
    }

    .token-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow);
    }

    .token-card h3 {
      color: var(--primary);
      margin-bottom: 1rem;
      font-size: 1.5rem;
    }

    .token-card .value {
      font-size: 2.5rem;
      font-weight: 700;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin: 1rem 0;
    }

    .distribution-chart {
      max-width: 800px;
      margin: 3rem auto;
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 2rem;
    }

    .distribution-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 0;
      border-bottom: 1px solid var(--border);
    }

    .distribution-item:last-child {
      border-bottom: none;
    }

    .distribution-bar {
      flex-grow: 1;
      height: 8px;
      background: var(--border);
      border-radius: 4px;
      margin: 0 1rem;
      overflow: hidden;
    }

    .distribution-fill {
      height: 100%;
      border-radius: 4px;
      transition: width 1s ease-in-out;
    }

    .chart-legend {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      justify-content: center;
      margin-top: 2rem;
    }

    .legend-item {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.9rem;
    }

    .legend-color {
      width: 12px;
      height: 12px;
      border-radius: 50%;
    }

    .presale-table {
      width: 100%;
      border-collapse: collapse;
      margin: 2rem 0;
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border-radius: 15px;
      overflow: hidden;
    }

    .presale-table th {
      background: var(--primary);
      color: white;
      padding: 1rem;
      text-align: left;
    }

    .presale-table td {
      padding: 1rem;
      border-bottom: 1px solid var(--border);
    }

    .presale-table tr:last-child td {
      border-bottom: none;
    }

    .presale-table tr:hover {
      background: var(--glass-border);
    }

    .phase-badge {
      background: var(--accent);
      color: white;
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
    }

    .contract-verified {
      background: var(--secondary);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 10px;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 1rem;
    }

    /* Inherit all other styles from index.php */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
      line-height: 1.6;
      overflow-x: hidden;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;
    }

    .section {
      padding: var(--section-spacing) 1rem;
    }

    .section-header {
      text-align: center;
      margin-bottom: 3rem;
    }

    .section-title {
      font-size: clamp(2rem, 4vw, 3rem);
      font-weight: 700;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1rem;
    }

    .section-subtitle {
      font-size: 1.25rem;
      opacity: 0.7;
      max-width: 600px;
      margin: 0 auto;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 1rem 2rem;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .btn-primary {
      background: var(--primary);
      color: white;
    }

    .btn-primary:hover {
      background: var(--secondary);
      transform: translateY(-2px);
    }

    /* Header and Footer Styles */
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
    }

    .footer-section h3 {
      margin-bottom: 1.5rem;
      color: var(--primary);
      font-size: 1.25rem;
    }

    .footer-links {
      list-style: none;
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

    @media (min-width: 768px) {
      .header-container {
        padding: 1rem 2rem;
      }
      
      .logo {
        height: 40px;
      }
      
      .footer-content {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
      }
    }

    @media (max-width: 767px) {
      .mobile-nav-toggle {
        display: flex;
      }
      
      .desktop-nav {
        display: none;
      }

      .presale-table {
        font-size: 0.8rem;
      }

      .presale-table th,
      .presale-table td {
        padding: 0.5rem;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header class="site-header">
    <div class="header-container">
      <a href="index.php">
        <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyXenPay" class="logo">
      </a>

      <button class="mobile-nav-toggle" id="mobile-nav-toggle">
        <span></span>
      </button>

      <nav class="desktop-nav">
        <a href="tokenomics.php" class="active">Tokenomics</a>
        <a href="whitepaper.php">Whitepaper</a>
        <a href="student-rewards.php">Student Rewards</a>
        <a href="developers.php">Developers</a>
        <a href="merchants.php">For Businesses</a>
      </nav>

      <div class="header-actions">
        <button id="theme-toggle" class="theme-btn">☀️</button>
        <button id="connect-btn" class="connect-btn">Connect Wallet</button>
      </div>
    </div>
  </header>

  <!-- Mobile Navigation -->
  <nav class="mobile-nav" id="mobile-nav">
    <a href="tokenomics.php" class="active">Tokenomics</a>
    <a href="whitepaper.php">Whitepaper</a>
    <a href="student-rewards.php">Student Rewards</a>
    <a href="developers.php">Developers</a>
    <a href="merchants.php">For Businesses</a>
  </nav>

  <!-- Tokenomics Hero -->
  <section class="tokenomics-hero">
    <div class="container">
      <h1>$MYXN Tokenomics</h1>
      <p>Pre-sale structure, sustainable economics with transaction fees and progressive burns powering the future of global crypto payments</p>
    </div>
  </section>

  <!-- Token Metrics -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Token Metrics</h2>
        <p class="section-subtitle">Transparent token economics with verified contract</p>
      </div>

      <div class="token-grid">
        <div class="token-card">
          <h3>Total Supply</h3>
          <div class="value">1B $MYXN</div>
          <p>Fixed total supply with progressive burns</p>
        </div>

        <div class="token-card">
          <h3>Transaction Fee</h3>
          <div class="value">0.07%</div>
          <p>Per merchant transaction with fee redistribution</p>
        </div>

        <div class="token-card">
          <h3>Student Cashback</h3>
          <div class="value">5%</div>
          <p>Verified university students earn up to $500 cashback</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Token Distribution -->
  <section class="section" style="background: var(--glass-bg);">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Token Distribution</h2>
        <p class="section-subtitle">Fair allocation for sustainable growth with locked liquidity</p>
      </div>

      <div class="distribution-chart">
        <div class="distribution-item">
          <span>Pre-Sale (Phases 1-6)</span>
          <div class="distribution-bar">
            <div class="distribution-fill" style="width: 30%; background: var(--primary);"></div>
          </div>
          <span><strong>30%</strong> - 300M $MYXN</span>
        </div>

        <div class="distribution-item">
          <span>Foundation Treasury & Global Expansion</span>
          <div class="distribution-bar">
            <div class="distribution-fill" style="width: 20%; background: var(--secondary);"></div>
          </div>
          <span><strong>20%</strong> - 200M $MYXN</span>
        </div>

        <div class="distribution-item">
          <span>Liquidity Pool (Raydium / DEX)</span>
          <div class="distribution-bar">
            <div class="distribution-fill" style="width: 20%; background: var(--accent);"></div>
          </div>
          <span><strong>20%</strong> - 200M $MYXN</span>
        </div>

        <div class="distribution-item">
          <span>Ecosystem Incentives & Rewards</span>
          <div class="distribution-bar">
            <div class="distribution-fill" style="width: 10%; background: #8E44AD;"></div>
          </div>
          <span><strong>10%</strong> - 100M $MYXN</span>
        </div>

        <div class="distribution-item">
          <span>Development & Infrastructure Reserve</span>
          <div class="distribution-bar">
            <div class="distribution-fill" style="width: 10%; background: #3498DB;"></div>
          </div>
          <span><strong>10%</strong> - 100M $MYXN</span>
        </div>

        <div class="distribution-item">
          <span>Team & Advisors</span>
          <div class="distribution-bar">
            <div class="distribution-fill" style="width: 5%; background: #E74C3C;"></div>
          </div>
          <span><strong>5%</strong> - 50M $MYXN</span>
        </div>

        <div class="distribution-item">
          <span>Charity & Social Impact Fund</span>
          <div class="distribution-bar">
            <div class="distribution-fill" style="width: 5%; background: #2ECC71;"></div>
          </div>
          <span><strong>5%</strong> - 50M $MYXN</span>
        </div>
      </div>

      <div class="chart-legend">
        <div class="legend-item">
          <div class="legend-color" style="background: var(--primary);"></div>
          <span>Pre-Sale (30%)</span>
        </div>
        <div class="legend-item">
          <div class="legend-color" style="background: var(--secondary);"></div>
          <span>Foundation Treasury (20%)</span>
        </div>
        <div class="legend-item">
          <div class="legend-color" style="background: var(--accent);"></div>
          <span>Liquidity Pool (20%)</span>
        </div>
        <div class="legend-item">
          <div class="legend-color" style="background: #8E44AD;"></div>
          <span>Ecosystem Incentives (10%)</span>
        </div>
        <div class="legend-item">
          <div class="legend-color" style="background: #3498DB;"></div>
          <span>Development Reserve (10%)</span>
        </div>
        <div class="legend-item">
          <div class="legend-color" style="background: #E74C3C;"></div>
          <span>Team & Advisors (5%)</span>
        </div>
        <div class="legend-item">
          <div class="legend-color" style="background: #2ECC71;"></div>
          <span>Charity & Social Impact (5%)</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Pre-Sale Structure -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Pre-Sale Structure</h2>
        <p class="section-subtitle">November 10, 2025 – December 30, 2025 • Accepted: USDC (Solana SPL)</p>
      </div>

      <table class="presale-table">
        <thead>
          <tr>
            <th>Phase</th>
            <th>Token Range</th>
            <th>Price (USD)</th>
            <th>Fundraising Goal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><span class="phase-badge">Phase 1</span></td>
            <td>0–25M</td>
            <td>$0.0001</td>
            <td>$2,500</td>
            <td>Upcoming</td>
          </tr>
          <tr>
            <td><span class="phase-badge">Phase 2</span></td>
            <td>25M–100M</td>
            <td>$0.0005</td>
            <td>$37,500</td>
            <td>Upcoming</td>
          </tr>
          <tr>
            <td><span class="phase-badge">Phase 3</span></td>
            <td>100M–150M</td>
            <td>$0.0010</td>
            <td>$50,000</td>
            <td>Upcoming</td>
          </tr>
          <tr>
            <td><span class="phase-badge">Phase 4</span></td>
            <td>150M–200M</td>
            <td>$0.0015</td>
            <td>$75,000</td>
            <td>Upcoming</td>
          </tr>
          <tr>
            <td><span class="phase-badge">Phase 5</span></td>
            <td>200M–250M</td>
            <td>$0.0020</td>
            <td>$100,000</td>
            <td>Upcoming</td>
          </tr>
          <tr>
            <td><span class="phase-badge">Phase 6</span></td>
            <td>250M–300M</td>
            <td>$0.0025</td>
            <td>$125,000</td>
            <td>Upcoming</td>
          </tr>
        </tbody>
      </table>

      <div style="text-align: center; margin-top: 2rem;">
        <p style="opacity: 0.8; font-style: italic;">
          🔒 LP Lock: 12 months post-listing • 📈 CEX/DEX Listing: Target Q1 2026
        </p>
      </div>
    </div>
  </section>

  <!-- Economic Mechanisms -->
  <section class="section" style="background: var(--glass-bg);">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Economic Mechanisms</h2>
        <p class="section-subtitle">Sustainable tokenomics driving ecosystem growth</p>
      </div>

      <div class="token-grid">
        <div class="token-card">
          <h3>Transaction Fee</h3>
          <div class="value">0.07%</div>
          <p>Per merchant transaction with automated redistribution</p>
          <div style="margin-top: 1rem; font-size: 0.9rem;">
            <div>70% → Buyback & Burn</div>
            <div>20% → Foundation Treasury</div>
            <div>10% → Community Reward Pool</div>
          </div>
        </div>

        <div class="token-card">
          <h3>Burn Policy</h3>
          <div class="value">1% per $1M</div>
          <p>For every $1M market cap milestone, 1% of total supply is burned (up to 30% max)</p>
        </div>

        <div class="token-card">
          <h3>Student Cashback</h3>
          <div class="value">5%</div>
          <p>Verified university students earn 5% cashback (up to $500) per eligible payment</p>
        </div>
      </div>

      <div class="token-grid" style="margin-top: 2rem;">
        <div class="token-card">
          <h3>Merchant Rewards</h3>
          <div class="value">SOL Bonuses</div>
          <p>Top-performing merchants receive SOL-based monthly bonuses based on transaction volume</p>
        </div>

        <div class="token-card">
          <h3>Liquidity Lock</h3>
          <div class="value">12 Months</div>
          <p>Initial DEX liquidity fully locked for 12 months to prevent rug pulls</p>
        </div>

        <div class="token-card">
          <h3>Auto Buybacks</h3>
          <div class="value">Real-time</div>
          <p>Automated buybacks occur based on real-time fee accumulation from transactions</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Transparency & Compliance -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Transparency & Compliance</h2>
        <p class="section-subtitle">Verified, audited, and compliant ecosystem</p>
      </div>

      <div class="token-grid">
        <div class="token-card">
          <h3>Audit-Ready Code</h3>
          <p>Smart contracts are verified and published on Solana Explorer</p>
        </div>

        <div class="token-card">
          <h3>Treasury Transparency</h3>
          <p>All expenditures and burns are recorded on-chain for public verification</p>
        </div>

        <div class="token-card">
          <h3>KYC/AML Compliance</h3>
          <p>All presale participants must complete identity verification</p>
        </div>
      </div>

      <div class="token-grid" style="margin-top: 2rem;">
        <div class="token-card">
          <h3>ISO Compliance</h3>
          <p>Foundation aims for ISO/IEC 27001:2025 certification for data security</p>
        </div>

        <div class="token-card">
          <h3>Public Oversight</h3>
          <p>Burn, reserve, and liquidity wallets visible on transparency dashboard</p>
        </div>

        <div class="token-card">
          <h3>Legal Compliance</h3>
          <p>Operating in full compliance with applicable regulations and jurisdictions</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contract Information -->
  <section class="section" style="background: var(--glass-bg);">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Smart Contract</h2>
        <p class="section-subtitle">Verified contract on Solana mainnet</p>
      </div>

      <div class="contract-address">
        <div class="contract-verified">
          ✅ Verified Contract
        </div>
        <h3 style="color: var(--primary); margin-bottom: 1rem;">$MYXN Contract Address</h3>
        <div class="address-display" id="contract-address">
          CHXoAEvTi3FAEZMkWDJJmUSRXxYAoeco4bDMDZQJVWen
        </div>
        <p style="margin: 1rem 0; opacity: 0.8;">
          <strong>Token Type:</strong> SPL (Utility & Governance) • <strong>Decimals:</strong> 9<br>
          <strong>Mint Authority:</strong> Permanently Disabled After Allocation
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 1rem;">
          <button class="btn btn-primary" onclick="copyContractAddress()">
            Copy Address
          </button>
          <button class="btn btn-primary" onclick="viewOnExplorer()">
            View on Solana Explorer
          </button>
          <button class="btn btn-primary" onclick="viewOnRaydium()">
            View on Raydium
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <h3>MyXenPay</h3>
          <p>Secure Crypto Payment Gateway for the Future of Finance</p>
          <div class="trust-badges" style="display: flex; flex-direction: column; gap: 10px; margin-top: 15px; align-items: flex-start;">
            <span style="background: #00d664; color: white; padding: 5px 10px; border-radius: 4px; font-size: 0.8rem; font-weight: bold; width: fit-content;">🔒 SSL Secured</span>
            <span style="background: #4a5568; color: white; padding: 5px 10px; border-radius: 4px; font-size: 0.8rem; font-weight: bold; width: fit-content;">⚡ Instant</span>
          </div>
        </div>
        
        <div class="footer-section">
          <h3>Product</h3>
          <ul class="footer-links">
            <li><a href="merchants.php">For Businesses</a></li>
            <li><a href="developers.php">Developers</a></li>
            <li><a href="tokenomics.php">Tokenomics</a></li>
            <li><a href="student-rewards.php">Student Rewards</a></li>
          </ul>
        </div>
        
        <div class="footer-section">
          <h3>Resources</h3>
          <ul class="footer-links">
            <li><a href="whitepaper.php">Whitepaper</a></li>
            <li><a href="documentation.html">Documentation</a></li>
            <li><a href="help.html">Help Center</a></li>
            <li><a href="blog.html">Blog</a></li>
          </ul>
        </div>
        
        <div class="footer-section">
          <h3>Company</h3>
          <ul class="footer-links">
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="privacy.html">Privacy Policy</a></li>
            <li><a href="terms.html">Terms of Service</a></li>
          </ul>
        </div>
      </div>
      
      <div class="copyright">
        <p>© 2024 MyXenPay. All rights reserved. Making crypto payments accessible for everyone.</p>
        <p style="margin-top: 0.5rem; font-size: 0.8rem; opacity: 0.6;">
          $MYXN is a utility token, not an investment contract. Token value is subject to market conditions. 
          MyXen Foundation does not support gambling, illegal transactions, or use in any restricted jurisdictions. 
          Always DYOR (Do Your Own Research) before purchasing or trading any digital asset.
        </p>
      </div>
    </div>
  </footer>

  <script>
    // Mobile Navigation
    const mobileNavToggle = document.getElementById('mobile-nav-toggle');
    const mobileNav = document.getElementById('mobile-nav');
    
    mobileNavToggle.addEventListener('click', () => {
      mobileNavToggle.classList.toggle('active');
      mobileNav.classList.toggle('active');
      document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
    });

    // Close mobile nav when clicking on a link
    mobileNav.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        mobileNavToggle.classList.remove('active');
        mobileNav.classList.remove('active');
        document.body.style.overflow = '';
      });
    });

    // Theme Toggle
    function initTheme() {
      const saved = localStorage.getItem('theme');
      const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      if (saved) {
        document.body.setAttribute('data-theme', saved);
        document.getElementById('theme-logo').src = saved === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
        document.getElementById('theme-toggle').textContent = saved === 'dark' ? '🌙' : '☀️';
      } else if (prefersDark) {
        document.body.setAttribute('data-theme', 'dark');
        document.getElementById('theme-logo').src = 'myxenpay-logo-dark.png';
        document.getElementById('theme-toggle').textContent = '🌙';
      } else {
        document.body.setAttribute('data-theme', 'light');
        document.getElementById('theme-logo').src = 'myxenpay-logo-light.png';
        document.getElementById('theme-toggle').textContent = '☀️';
      }
    }

    document.getElementById('theme-toggle').addEventListener('click', () => {
      const current = document.body.getAttribute('data-theme');
      const newTheme = current === 'dark' ? 'light' : 'dark';
      document.body.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      document.getElementById('theme-logo').src = newTheme === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
      document.getElementById('theme-toggle').textContent = newTheme === 'dark' ? '🌙' : '☀️';
    });

    // Wallet Connection
    let walletConnected = false;
    let walletAddress = null;

    async function connectWallet() {
      const provider = window.solana || window.phantom?.solana;
      const connectBtn = document.getElementById('connect-btn');
      
      if (!provider) {
        alert('Please install Phantom or Backpack wallet.');
        return;
      }
      
      if (walletConnected) {
        try {
          if (provider.disconnect) {
            await provider.disconnect();
          }
          walletConnected = false;
          walletAddress = null;
          connectBtn.textContent = 'Connect Wallet';
          connectBtn.classList.remove('connected');
          return;
        } catch (error) {
          console.error('Disconnect failed:', error);
        }
      }
      
      const originalText = connectBtn.textContent;
      connectBtn.innerHTML = '<div class="loading"></div>';
      connectBtn.disabled = true;
      
      try {
        const response = await provider.connect();
        walletConnected = true;
        walletAddress = response.publicKey.toString();
        
        const truncatedAddress = walletAddress.substring(0, 4) + '...' + walletAddress.substring(walletAddress.length - 4);
        connectBtn.textContent = `Disconnect ${truncatedAddress}`;
        connectBtn.classList.add('connected');
        connectBtn.disabled = false;
        
      } catch (err) {
        console.error('Connection failed:', err);
        connectBtn.textContent = 'Failed - Retry';
        connectBtn.disabled = false;
        setTimeout(() => {
          connectBtn.textContent = originalText;
        }, 3000);
      }
    }

    document.getElementById('connect-btn').addEventListener('click', connectWallet);

    // Tokenomics-specific functions
    function copyContractAddress() {
      const address = document.getElementById('contract-address').textContent;
      navigator.clipboard.writeText(address).then(() => {
        alert('Contract address copied to clipboard!');
      });
    }

    function viewOnExplorer() {
      const address = document.getElementById('contract-address').textContent;
      window.open(`https://solscan.io/token/${address}`, '_blank');
    }

    function viewOnRaydium() {
      const address = document.getElementById('contract-address').textContent;
      window.open(`https://raydium.io/swap/?inputCurrency=sol&outputCurrency=${address}`, '_blank');
    }

    // Animate distribution bars on scroll
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const fills = document.querySelectorAll('.distribution-fill');
          fills.forEach(fill => {
            const width = fill.style.width;
            fill.style.width = '0';
            setTimeout(() => {
              fill.style.width = width;
            }, 100);
          });
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    observer.observe(document.querySelector('.distribution-chart'));

    // Initialize
    document.addEventListener('DOMContentLoaded', initTheme);
  </script>
</body>
</html>