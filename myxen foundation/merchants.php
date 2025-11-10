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
  <title>For Businesses - Accept Crypto Payments | MyxenPay</title>
  <meta name="description" content="Accept crypto payments worldwide with MyxenPay. Lower fees, instant settlements, and global reach for your business.">
  <meta property="og:title" content="For Businesses - Accept Crypto Payments | MyxenPay">
  <meta property="og:description" content="Start accepting crypto payments with QR codes and VISA virtual cards. Lower fees, no chargebacks, global customers.">
  <meta property="og:image" content="https://myxenpay.finance/og/og-merchants.jpg">
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

    /* Merchants-specific styles */
    .merchants-hero {
      padding: 8rem 1rem 4rem;
      text-align: center;
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      color: white;
      position: relative;
      overflow: hidden;
    }

    .merchants-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
      background-size: cover;
    }

    .merchants-hero h1 {
      font-size: clamp(2.5rem, 5vw, 4rem);
      font-weight: 700;
      margin-bottom: 1rem;
      position: relative;
    }

    .merchants-hero p {
      font-size: 1.25rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
      position: relative;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
      margin: 3rem 0;
    }

    .stat-card {
      text-align: center;
      padding: 2rem;
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: 700;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 0.5rem;
    }

    .stat-label {
      opacity: 0.8;
      font-size: 1rem;
    }

    .benefits-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin: 3rem 0;
    }

    .benefit-card {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 2.5rem 2rem;
      text-align: center;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .benefit-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      transform: scaleX(0);
      transition: transform 0.3s ease;
    }

    .benefit-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow);
    }

    .benefit-card:hover::before {
      transform: scaleX(1);
    }

    .benefit-icon {
      font-size: 3rem;
      margin-bottom: 1.5rem;
      display: block;
      transition: transform 0.3s ease;
    }

    .benefit-card:hover .benefit-icon {
      transform: scale(1.1);
    }

    .benefit-title {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color: var(--primary);
      font-weight: 600;
    }

    .how-it-works {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      padding: 3rem;
      margin: 3rem 0;
    }

    .steps {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .step {
      text-align: center;
      position: relative;
    }

    .step-number {
      width: 60px;
      height: 60px;
      background: var(--primary);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.5rem;
      font-size: 1.5rem;
      font-weight: 700;
      position: relative;
      z-index: 2;
    }

    .step-title {
      font-size: 1.25rem;
      margin-bottom: 1rem;
      color: var(--primary);
      font-weight: 600;
    }

    .step-description {
      opacity: 0.8;
      line-height: 1.6;
    }

    .features-section {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white;
      padding: 4rem 2rem;
      border-radius: 20px;
      margin: 3rem 0;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .feature-item {
      background: rgba(255, 255, 255, 0.1);
      padding: 2rem;
      border-radius: 15px;
      text-align: center;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }

    .feature-item:hover {
      transform: translateY(-5px);
      background: rgba(255, 255, 255, 0.15);
    }

    .feature-icon {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      display: block;
    }

    .pricing-section {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      padding: 3rem;
      margin: 3rem 0;
    }

    .pricing-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .pricing-card {
      background: var(--card-bg);
      border-radius: 20px;
      padding: 2.5rem 2rem;
      text-align: center;
      border: 1px solid var(--glass-border);
      transition: all 0.3s ease;
      position: relative;
    }

    .pricing-card.featured {
      border: 2px solid var(--primary);
      transform: scale(1.05);
    }

    .pricing-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow);
    }

    .pricing-card.featured:hover {
      transform: scale(1.05) translateY(-5px);
    }

    .pricing-badge {
      position: absolute;
      top: -10px;
      left: 50%;
      transform: translateX(-50%);
      background: var(--primary);
      color: white;
      padding: 0.5rem 1.5rem;
      border-radius: 20px;
      font-size: 0.9rem;
      font-weight: 600;
    }

    .pricing-title {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color: var(--primary);
      font-weight: 600;
    }

    .pricing-price {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 1rem;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .pricing-period {
      font-size: 1rem;
      opacity: 0.7;
      margin-bottom: 2rem;
    }

    .pricing-features {
      list-style: none;
      margin-bottom: 2rem;
    }

    .pricing-features li {
      padding: 0.5rem 0;
      border-bottom: 1px solid var(--border);
    }

    .pricing-features li:last-child {
      border-bottom: none;
    }

    .business-types {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
      margin: 3rem 0;
    }

    .business-card {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 2.5rem 2rem;
      text-align: center;
      transition: all 0.3s ease;
    }

    .business-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow);
      border-color: var(--primary);
    }

    .business-icon {
      font-size: 3rem;
      margin-bottom: 1.5rem;
      display: block;
    }

    .business-title {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color: var(--primary);
      font-weight: 600;
    }

    .integration-section {
      background: var(--card-bg);
      border-radius: 20px;
      padding: 3rem;
      margin: 3rem 0;
      border: 1px solid var(--glass-border);
    }

    .integration-options {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .integration-option {
      text-align: center;
      padding: 2rem;
    }

    .integration-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
      display: block;
    }

    .cta-section {
      text-align: center;
      padding: 4rem 2rem;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      color: white;
      border-radius: 20px;
      margin: 3rem 0;
    }

    .white-button {
      background: white;
      color: var(--primary);
      border: none;
      padding: 1.25rem 2.5rem;
      border-radius: 12px;
      font-weight: 600;
      font-size: 1.1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.75rem;
    }

    .white-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .demo-section {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      padding: 3rem;
      margin: 3rem 0;
      text-align: center;
    }

    .qr-demo {
      max-width: 300px;
      margin: 2rem auto;
      background: white;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: var(--shadow);
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

      .pricing-card.featured {
        transform: none;
      }

      .pricing-card.featured:hover {
        transform: translateY(-5px);
      }

      .stats-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .how-it-works, .pricing-section, .integration-section {
        padding: 2rem 1.5rem;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header class="site-header">
    <div class="header-container">
      <a href="index.php">
        <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyxenPay" class="logo">
      </a>

      <button class="mobile-nav-toggle" id="mobile-nav-toggle">
        <span></span>
      </button>

      <nav class="desktop-nav">
        <a href="tokenomics.php">Tokenomics</a>
        <a href="whitepaper.php">Whitepaper</a>
        <a href="student-rewards.php">Student Rewards</a>
        <a href="developers.php">Developers</a>
        <a href="merchants.php" class="active">For Businesses</a>
      </nav>

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
    <a href="student-rewards.php">Student Rewards</a>
    <a href="developers.php">Developers</a>
    <a href="merchants.php" class="active">For Businesses</a>
  </nav>

  <!-- Merchants Hero -->
  <section class="merchants-hero">
    <div class="container">
      <h1>Accept Crypto Payments Worldwide</h1>
      <p>Lower fees, instant settlements, and access to global customers with MyxenPay</p>
      <div style="margin-top: 2rem;">
        <button class="white-button" onclick="startOnboarding()">
          🚀 Start Accepting Crypto
        </button>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="section">
    <div class="container">
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-number">1-2%</div>
          <div class="stat-label">Transaction Fees</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">Instant</div>
          <div class="stat-label">Settlement Time</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">190+</div>
          <div class="stat-label">Countries Supported</div>
        </div>
        <div class="stat-card">
          <div class="stat-number">0%</div>
          <div class="stat-label">Chargeback Risk</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="section" style="background: var(--glass-bg);">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Why Accept Crypto Payments?</h2>
        <p class="section-subtitle">Transform your business with the future of payments</p>
      </div>

      <div class="benefits-grid">
        <div class="benefit-card">
          <div class="benefit-icon">💰</div>
          <h3 class="benefit-title">Lower Fees</h3>
          <p>Save 60-80% compared to traditional payment processors with our 1-2% transaction fees</p>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">⚡</div>
          <h3 class="benefit-title">Instant Settlements</h3>
          <p>Receive payments instantly on Solana blockchain, no more waiting 3-5 business days</p>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">🌍</div>
          <h3 class="benefit-title">Global Reach</h3>
          <p>Accept payments from customers worldwide without geographic restrictions or currency conversion fees</p>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">🔒</div>
          <h3 class="benefit-title">No Chargebacks</h3>
          <p>Blockchain transactions are irreversible, eliminating chargeback fraud and disputes</p>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">📈</div>
          <h3 class="benefit-title">New Customer Base</h3>
          <p>Tap into the growing crypto user base of over 300 million people worldwide</p>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">💳</div>
          <h3 class="benefit-title">VISA Virtual Cards</h3>
          <p>Spend your crypto earnings anywhere with our VISA-compatible virtual cards</p>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">How It Works</h2>
        <p class="section-subtitle">Start accepting crypto payments in just 3 simple steps</p>
      </div>

      <div class="how-it-works">
        <div class="steps">
          <div class="step">
            <div class="step-number">1</div>
            <h3 class="step-title">Create Account</h3>
            <p class="step-description">Sign up for a merchant account and complete simple verification</p>
          </div>

          <div class="step">
            <div class="step-number">2</div>
            <h3 class="step-title">Generate QR Code</h3>
            <p class="step-description">Create payment QR codes for your products or generate unique codes for each transaction</p>
          </div>

          <div class="step">
            <div class="step-number">3</div>
            <h3 class="step-title">Start Accepting Payments</h3>
            <p class="step-description">Customers scan QR codes to pay with crypto, you receive instant settlements</p>
          </div>
        </div>

        <div style="text-align: center; margin-top: 3rem;">
          <button class="btn btn-primary" onclick="startOnboarding()">
            Get Started Now
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="section">
    <div class="container">
      <div class="features-section">
        <div class="section-header">
          <h2 style="color: white; margin-bottom: 1rem;">Powerful Features for Your Business</h2>
          <p style="color: rgba(255,255,255,0.9);">Everything you need to succeed with crypto payments</p>
        </div>

        <div class="features-grid">
          <div class="feature-item">
            <div class="feature-icon">🏪</div>
            <h4>QR Code Payments</h4>
            <p>Static or dynamic QR codes for in-person and online payments</p>
          </div>

          <div class="feature-item">
            <div class="feature-icon">📱</div>
            <h4>Mobile App</h4>
            <p>Manage payments on the go with our merchant mobile app</p>
          </div>

          <div class="feature-item">
            <div class="feature-icon">📊</div>
            <h4>Analytics Dashboard</h4>
            <p>Real-time insights into your sales and customer behavior</p>
          </div>

          <div class="feature-item">
            <div class="feature-icon">🔄</div>
            <h4>Auto-Conversion</h4>
            <p>Automatically convert crypto to stablecoins to avoid volatility</p>
          </div>

          <div class="feature-item">
            <div class="feature-icon">🔔</div>
            <h4>Payment Notifications</h4>
            <p>Instant alerts for successful payments and settlements</p>
          </div>

          <div class="feature-item">
            <div class="feature-icon">🌐</div>
            <h4>API Integration</h4>
            <p>Seamlessly integrate with your existing systems and websites</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Simple, Transparent Pricing</h2>
        <p class="section-subtitle">No hidden fees, no monthly commitments</p>
      </div>

      <div class="pricing-section">
        <div class="pricing-cards">
          <div class="pricing-card">
            <h3 class="pricing-title">Starter</h3>
            <div class="pricing-price">1.9%</div>
            <div class="pricing-period">per transaction</div>
            <ul class="pricing-features">
              <li>Up to $10,000 monthly volume</li>
              <li>QR Code payments</li>
              <li>Basic analytics</li>
              <li>Email support</li>
              <li>Instant settlements</li>
            </ul>
            <button class="btn btn-primary" onclick="selectPlan('starter')">
              Get Started
            </button>
          </div>

          <div class="pricing-card featured">
            <div class="pricing-badge">Most Popular</div>
            <h3 class="pricing-title">Business</h3>
            <div class="pricing-price">1.5%</div>
            <div class="pricing-period">per transaction</div>
            <ul class="pricing-features">
              <li>Up to $50,000 monthly volume</li>
              <li>QR Code + API access</li>
              <li>Advanced analytics</li>
              <li>Priority support</li>
              <li>Auto-conversion to stablecoins</li>
              <li>VISA virtual cards</li>
            </ul>
            <button class="btn btn-primary" onclick="selectPlan('business')">
              Choose Business
            </button>
          </div>

          <div class="pricing-card">
            <h3 class="pricing-title">Enterprise</h3>
            <div class="pricing-price">1.2%</div>
            <div class="pricing-period">per transaction</div>
            <ul class="pricing-features">
              <li>Unlimited volume</li>
              <li>Full API access + White label</li>
              <li>Custom analytics</li>
              <li>24/7 dedicated support</li>
              <li>Multi-currency settlements</li>
              <li>Custom integration support</li>
            </ul>
            <button class="btn btn-primary" onclick="selectPlan('enterprise')">
              Contact Sales
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Business Types -->
  <section class="section" style="background: var(--glass-bg);">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Perfect for Every Business</h2>
        <p class="section-subtitle">From small shops to large enterprises</p>
      </div>

      <div class="business-types">
        <div class="business-card">
          <div class="business-icon">🏪</div>
          <h3 class="business-title">Retail Stores</h3>
          <p>Accept in-store payments with QR codes displayed at checkout counters</p>
        </div>

        <div class="business-card">
          <div class="business-icon">🛒</div>
          <h3 class="business-title">E-commerce</h3>
          <p>Integrate crypto payments into your online store with our API</p>
        </div>

        <div class="business-card">
          <div class="business-icon">🍽️</div>
          <h3 class="business-title">Restaurants & Cafes</h3>
          <p>Quick table-side payments and takeaway orders with QR codes</p>
        </div>

        <div class="business-card">
          <div class="business-icon">🎓</div>
          <h3 class="business-title">Educational Institutions</h3>
          <p>Accept tuition and fee payments from students worldwide</p>
        </div>

        <div class="business-card">
          <div class="business-icon">💻</div>
          <h3 class="business-title">SaaS & Subscriptions</h3>
          <p>Recurring payments for software and subscription services</p>
        </div>

        <div class="business-card">
          <div class="business-icon">🎮</div>
          <h3 class="business-title">Gaming & Digital Goods</h3>
          <p>Instant payments for in-game items and digital products</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Integration Section -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Easy Integration</h2>
        <p class="section-subtitle">Multiple ways to start accepting crypto payments</p>
      </div>

      <div class="integration-section">
        <div class="integration-options">
          <div class="integration-option">
            <div class="integration-icon">📱</div>
            <h4>Mobile App</h4>
            <p>Download our merchant app and start accepting payments in minutes</p>
          </div>

          <div class="integration-option">
            <div class="integration-icon">🌐</div>
            <h4>Web Dashboard</h4>
            <p>Generate payment links and QR codes from our web platform</p>
          </div>

          <div class="integration-option">
            <div class="integration-icon">🔌</div>
            <h4>API Integration</h4>
            <p>Integrate directly with your website or app using our REST API</p>
          </div>

          <div class="integration-option">
            <div class="integration-icon">🛒</div>
            <h4>E-commerce Plugins</h4>
            <p>Plugins for Shopify, WooCommerce, Magento, and more</p>
          </div>
        </div>

        <div style="text-align: center; margin-top: 3rem;">
          <button class="btn btn-primary" onclick="viewDocumentation()">
            View Integration Docs
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Demo Section -->
  <section class="section">
    <div class="container">
      <div class="demo-section">
        <h2 style="color: var(--primary); margin-bottom: 1rem;">See It In Action</h2>
        <p style="margin-bottom: 2rem; opacity: 0.8;">Scan this demo QR code to see how easy crypto payments can be</p>
        
        <div class="qr-demo">
          <div style="width: 200px; height: 200px; background: #f0f0f0; margin: 0 auto; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
            <span style="opacity: 0.5;">QR Code Preview</span>
          </div>
          <p style="margin-top: 1rem; font-weight: 600;">$25.00 USD</p>
          <p style="opacity: 0.7; font-size: 0.9rem;">Demo Product</p>
        </div>

        <p style="margin-top: 2rem; opacity: 0.8;">
          Customers simply scan, confirm payment in their wallet, and you're done!
        </p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="section">
    <div class="container">
      <div class="cta-section">
        <h2 style="font-size: 2.5rem; margin-bottom: 1rem;">Ready to Transform Your Business?</h2>
        <p style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.9;">
          Join thousands of businesses already accepting crypto payments with MyxenPay
        </p>
        <button class="white-button" onclick="startOnboarding()">
          🚀 Start Accepting Crypto Today
        </button>
        <p style="margin-top: 1rem; opacity: 0.8; font-size: 0.9rem;">
          No setup fees • No monthly commitments • Get started in minutes
        </p>
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

    // Merchant Functions
    function startOnboarding() {
      if (!walletConnected) {
        alert('Please connect your wallet to start the merchant onboarding process.');
        connectWallet();
        return;
      }
      
      // Redirect to merchant onboarding
      window.location.href = 'merchant-onboarding.html';
    }

    function selectPlan(plan) {
      if (!walletConnected) {
        alert('Please connect your wallet to select a plan.');
        connectWallet();
        return;
      }
      
      // In a real implementation, this would redirect to plan selection
      const planNames = {
        'starter': 'Starter Plan',
        'business': 'Business Plan', 
        'enterprise': 'Enterprise Plan'
      };
      
      alert(`Selected: ${planNames[plan]}. In a real implementation, this would proceed to payment and activation.`);
      
      // For demo purposes, redirect to onboarding
      startOnboarding();
    }

    function viewDocumentation() {
      window.open('developers.php', '_blank');
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', initTheme);
  </script>
</body>
</html>