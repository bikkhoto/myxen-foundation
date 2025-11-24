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
  <title>Student Rewards - MyxenPay</title>
  <meta name="description" content="Get 5% cashback on university payments with MyxenPay Student Rewards. Verified off-chain. No KYC required.">
  <meta property="og:title" content="Student Rewards - MyxenPay">
  <meta property="og:description" content="5% cashback on educational payments. Max $500 rewards. No KYC.">
  <meta property="og:image" content="https://myxenpay.finance/og/og-student-rewards.jpg">
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

    /* Student Rewards-specific styles */
    .student-hero {
      padding: 8rem 1rem 4rem;
      text-align: center;
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      color: white;
      position: relative;
      overflow: hidden;
    }

    .student-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
      background-size: cover;
    }

    .student-hero h1 {
      font-size: clamp(2.5rem, 5vw, 4rem);
      font-weight: 700;
      margin-bottom: 1rem;
      position: relative;
    }

    .student-hero p {
      font-size: 1.25rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
      position: relative;
    }

    .reward-highlight {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 2px solid var(--glass-border);
      border-radius: 20px;
      padding: 3rem 2rem;
      text-align: center;
      margin: 2rem auto;
      max-width: 800px;
    }

    .reward-percentage {
      font-size: 4rem;
      font-weight: 700;
      background: linear-gradient(135deg, var(--secondary), var(--accent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1rem;
      line-height: 1;
    }

    .reward-max {
      font-size: 1.5rem;
      color: var(--text);
      opacity: 0.9;
      margin-bottom: 2rem;
    }

    .benefits-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
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
    }

    .benefit-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow);
    }

    .benefit-icon {
      font-size: 3rem;
      margin-bottom: 1.5rem;
      display: block;
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

    .eligible-payments {
      background: linear-gradient(135deg, var(--secondary), var(--primary));
      color: white;
      padding: 3rem 2rem;
      border-radius: 20px;
      margin: 3rem 0;
    }

    .payment-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1.5rem;
      margin-top: 2rem;
    }

    .payment-item {
      background: rgba(255, 255, 255, 0.1);
      padding: 1.5rem;
      border-radius: 12px;
      text-align: center;
      backdrop-filter: blur(10px);
    }

    .payment-icon {
      font-size: 2rem;
      margin-bottom: 1rem;
      display: block;
    }

    .verification-process {
      background: var(--card-bg);
      border-radius: 20px;
      padding: 3rem;
      margin: 3rem 0;
      border: 1px solid var(--glass-border);
    }

    .verification-steps {
      display: flex;
      flex-direction: column;
      gap: 2rem;
      margin-top: 2rem;
    }

    .verification-step {
      display: flex;
      align-items: start;
      gap: 1.5rem;
      padding: 2rem;
      background: var(--glass-bg);
      border-radius: 15px;
      border-left: 4px solid var(--primary);
    }

    .step-icon {
      font-size: 2rem;
      flex-shrink: 0;
    }

    .step-content h4 {
      color: var(--primary);
      margin-bottom: 0.5rem;
      font-size: 1.25rem;
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

      .verification-steps {
        flex-direction: row;
      }

      .verification-step {
        flex: 1;
      }
    }

    @media (max-width: 767px) {
      .mobile-nav-toggle {
        display: flex;
      }
      
      .desktop-nav {
        display: none;
      }

      .reward-highlight {
        padding: 2rem 1rem;
      }

      .reward-percentage {
        font-size: 3rem;
      }

      .how-it-works {
        padding: 2rem 1.5rem;
      }

      .verification-step {
        flex-direction: column;
        text-align: center;
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
        <a href="student-rewards.php" class="active">Student Rewards</a>
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
    <a href="tokenomics.php">Tokenomics</a>
    <a href="whitepaper.php">Whitepaper</a>
    <a href="student-rewards.php" class="active">Student Rewards</a>
    <a href="developers.php">Developers</a>
    <a href="merchants.php">For Businesses</a>
  </nav>

  <!-- Student Rewards Hero -->
  <section class="student-hero">
    <div class="container">
      <h1>Student Rewards Program</h1>
      <p>Get 5% cashback on university payments and educational expenses with $MYXEN tokens</p>
    </div>
  </section>

  <!-- Reward Highlight -->
  <section class="section">
    <div class="container">
      <div class="reward-highlight">
        <div class="reward-percentage">5% Cashback</div>
        <div class="reward-max">Up to $500 in $MYXEN tokens per semester</div>
        <p style="opacity: 0.9; margin-bottom: 2rem;">
          Verified off-chain student status • No KYC required • Instant rewards
        </p>
        <button class="btn btn-primary" onclick="verifyStudentStatus()">
          🎓 Verify Student Status
        </button>
      </div>
    </div>
  </section>

  <!-- Key Benefits -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Why Join Student Rewards?</h2>
        <p class="section-subtitle">Exclusive benefits designed for students worldwide</p>
      </div>

      <div class="benefits-grid">
        <div class="benefit-card">
          <div class="benefit-icon">💰</div>
          <h3 class="benefit-title">5% Cashback</h3>
          <p>Get 5% back in $MYXEN tokens on all eligible educational payments</p>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">🌍</div>
          <h3 class="benefit-title">Global Access</h3>
          <p>Available to students worldwide, regardless of location or banking status</p>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">🔒</div>
          <h3 class="benefit-title">No KYC Required</h3>
          <p>Simple off-chain verification without complex identity checks</p>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">⚡</div>
          <h3 class="benefit-title">Instant Rewards</h3>
          <p>Receive $MYXEN tokens immediately after each eligible payment</p>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works -->
  <section class="section" style="background: var(--glass-bg);">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">How It Works</h2>
        <p class="section-subtitle">Get started with student rewards in 3 simple steps</p>
      </div>

      <div class="how-it-works">
        <div class="steps">
          <div class="step">
            <div class="step-number">1</div>
            <h3 class="step-title">Verify Student Status</h3>
            <p class="step-description">Complete simple off-chain verification using your educational email or student ID</p>
          </div>

          <div class="step">
            <div class="step-number">2</div>
            <h3 class="step-title">Make Payments</h3>
            <p class="step-description">Use MyxenPay QR codes or virtual cards for tuition and educational expenses</p>
          </div>

          <div class="step">
            <div class="step-number">3</div>
            <h3 class="step-title">Earn Rewards</h3>
            <p class="step-description">Receive 5% cashback in $MYXEN tokens instantly after each payment</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Eligible Payments -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title" style="color: white;">Eligible Payments</h2>
        <p class="section-subtitle" style="color: rgba(255,255,255,0.8);">Get cashback on these educational expenses</p>
      </div>

      <div class="eligible-payments">
        <div class="payment-list">
          <div class="payment-item">
            <div class="payment-icon">🏫</div>
            <h4>Tuition Fees</h4>
            <p>University and college tuition</p>
          </div>

          <div class="payment-item">
            <div class="payment-icon">📚</div>
            <h4>Textbooks</h4>
            <p>Course materials and books</p>
          </div>

          <div class="payment-item">
            <div class="payment-icon">🏠</div>
            <h4>Student Housing</h4>
            <p>Dormitory and accommodation</p>
          </div>

          <div class="payment-item">
            <div class="payment-icon">🍽️</div>
            <h4>Meal Plans</h4>
            <p>Campus dining and food services</p>
          </div>

          <div class="payment-item">
            <div class="payment-icon">🔬</div>
            <h4>Lab Fees</h4>
            <p>Laboratory and equipment fees</p>
          </div>

          <div class="payment-item">
            <div class="payment-icon">🎯</div>
            <h4>Course Fees</h4>
            <p>Special course and program fees</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Verification Process -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Simple Verification</h2>
        <p class="section-subtitle">Privacy-focused student verification without KYC</p>
      </div>

      <div class="verification-process">
        <div class="verification-steps">
          <div class="verification-step">
            <div class="step-icon">📧</div>
            <div class="step-content">
              <h4>Educational Email</h4>
              <p>Verify using your university or college email address (.edu domains preferred)</p>
            </div>
          </div>

          <div class="verification-step">
            <div class="step-icon">🎫</div>
            <div class="step-content">
              <h4>Student ID Upload</h4>
              <p>Optional: Upload student ID for higher reward limits and additional verification</p>
            </div>
          </div>

          <div class="verification-step">
            <div class="step-icon">🔐</div>
            <div class="step-content">
              <h4>Off-Chain Verification</h4>
              <p>No personal data stored on blockchain. Your privacy is protected</p>
            </div>
          </div>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
          <p style="opacity: 0.8; font-style: italic;">
            Verification takes less than 5 minutes and doesn't require sensitive personal information
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Program Stats -->
  <section class="section" style="background: var(--glass-bg);">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Program Impact</h2>
        <p class="section-subtitle">Helping students save on educational expenses worldwide</p>
      </div>

      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-number">5%</div>
          <div class="stat-label">Cashback Rate</div>
        </div>

        <div class="stat-card">
          <div class="stat-number">$500</div>
          <div class="stat-label">Max Rewards per Semester</div>
        </div>

        <div class="stat-card">
          <div class="stat-number">0%</div>
          <div class="stat-label">KYC Required</div>
        </div>

        <div class="stat-card">
          <div class="stat-number">Instant</div>
          <div class="stat-label">Reward Distribution</div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="section">
    <div class="container">
      <div class="cta-section">
        <h2 style="font-size: 2.5rem; margin-bottom: 1rem;">Ready to Start Earning?</h2>
        <p style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.9;">
          Join thousands of students already saving with MyxenPay rewards
        </p>
        <button class="white-button" onclick="startVerification()">
          🎓 Start Student Verification
        </button>
        <p style="margin-top: 1rem; opacity: 0.8; font-size: 0.9rem;">
          Takes less than 5 minutes • No credit card required
        </p>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Frequently Asked Questions</h2>
        <p class="section-subtitle">Everything you need to know about Student Rewards</p>
      </div>

      <div class="benefits-grid">
        <div class="benefit-card">
          <h3 class="benefit-title">Who is eligible?</h3>
          <p>Any currently enrolled student at an accredited educational institution worldwide. Verification is required.</p>
        </div>

        <div class="benefit-card">
          <h3 class="benefit-title">What's the cashback limit?</h3>
          <p>Maximum $500 in $MYXEN tokens per semester. Reset each academic term.</p>
        </div>

        <div class="benefit-card">
          <h3 class="benefit-title">When do I get rewards?</h3>
          <p>Instantly after each eligible payment. $MYXEN tokens are sent directly to your wallet.</p>
        </div>

        <div class="benefit-card">
          <h3 class="benefit-title">Is KYC required?</h3>
          <p>No KYC required for basic verification. Student ID upload is optional for higher limits.</p>
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

    // Student Rewards Functions
    function verifyStudentStatus() {
      if (!walletConnected) {
        alert('Please connect your wallet first to verify student status.');
        connectWallet();
        return;
      }
      
      // Simulate student verification process
      const email = prompt('Enter your educational email address (.edu preferred):');
      if (email && email.includes('@')) {
        alert('Verification email sent! Please check your inbox to complete student verification.');
      }
    }

    function startVerification() {
      if (!walletConnected) {
        alert('Please connect your wallet to start student verification.');
        connectWallet();
        return;
      }
      
      // Redirect to verification page or open modal
      window.location.href = 'student-verification.html';
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', initTheme);
  </script>
</body>
</html>