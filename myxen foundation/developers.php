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
  <title>Developers - MyxenPay</title>
  <meta name="description" content="Build with MyxenPay APIs and SDKs. Integrate crypto payments into your applications with our comprehensive developer tools.">
  <meta property="og:title" content="Developers - MyxenPay">
  <meta property="og:description" content="API documentation, SDKs, and developer tools for MyxenPay integration.">
  <meta property="og:image" content="https://myxenpay.finance/og/og-developers.jpg">
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

    /* Developers-specific styles */
    .dev-hero {
      padding: 8rem 1rem 4rem;
      text-align: center;
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      color: white;
      position: relative;
      overflow: hidden;
    }

    .dev-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
      background-size: cover;
    }

    .dev-hero h1 {
      font-size: clamp(2.5rem, 5vw, 4rem);
      font-weight: 700;
      margin-bottom: 1rem;
      position: relative;
    }

    .dev-hero p {
      font-size: 1.25rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
      position: relative;
    }

    .code-block {
      background: #1a1a1a;
      color: #f8f8f2;
      border-radius: 12px;
      padding: 2rem;
      margin: 2rem 0;
      font-family: 'Courier New', monospace;
      overflow-x: auto;
      border: 1px solid #333;
    }

    .code-comment { color: #6272a4; }
    .code-keyword { color: #ff79c6; }
    .code-function { color: #50fa7b; }
    .code-string { color: #f1fa8c; }
    .code-number { color: #bd93f9; }

    .sdk-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin: 3rem 0;
    }

    .sdk-card {
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

    .sdk-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
    }

    .sdk-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow);
    }

    .sdk-icon {
      font-size: 3rem;
      margin-bottom: 1.5rem;
      display: block;
    }

    .sdk-title {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color: var(--primary);
      font-weight: 600;
    }

    .api-features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
      margin: 2rem 0;
    }

    .api-feature {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 15px;
      padding: 1.5rem;
      text-align: center;
      transition: all 0.3s ease;
    }

    .api-feature:hover {
      transform: translateY(-3px);
      border-color: var(--primary);
    }

    .feature-icon {
      font-size: 2rem;
      margin-bottom: 1rem;
      display: block;
    }

    .quick-start {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      padding: 3rem;
      margin: 3rem 0;
    }

    .step {
      display: flex;
      align-items: start;
      gap: 1.5rem;
      margin-bottom: 2rem;
      padding: 2rem;
      background: var(--card-bg);
      border-radius: 15px;
      border-left: 4px solid var(--primary);
    }

    .step:last-child {
      margin-bottom: 0;
    }

    .step-number {
      background: var(--primary);
      color: white;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      flex-shrink: 0;
    }

    .step-content h3 {
      color: var(--primary);
      margin-bottom: 0.5rem;
      font-size: 1.25rem;
    }

    .endpoints {
      background: var(--card-bg);
      border-radius: 20px;
      padding: 3rem;
      margin: 3rem 0;
      border: 1px solid var(--glass-border);
    }

    .endpoint {
      background: var(--glass-bg);
      border-radius: 12px;
      padding: 1.5rem;
      margin-bottom: 1rem;
      border-left: 4px solid var(--secondary);
    }

    .endpoint:last-child {
      margin-bottom: 0;
    }

    .endpoint-method {
      display: inline-block;
      background: var(--secondary);
      color: black;
      padding: 0.25rem 0.75rem;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.9rem;
      margin-right: 1rem;
    }

    .endpoint-get { background: var(--secondary); color: black; }
    .endpoint-post { background: var(--accent); color: black; }
    .endpoint-put { background: #FFA500; color: black; }
    .endpoint-delete { background: #FF6B6B; color: white; }

    .endpoint-path {
      font-family: 'Courier New', monospace;
      font-weight: 600;
    }

    .endpoint-description {
      margin-top: 0.5rem;
      opacity: 0.8;
    }

    .tools-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
      margin: 3rem 0;
    }

    .tool-card {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 2.5rem 2rem;
      text-align: center;
      transition: all 0.3s ease;
    }

    .tool-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow);
    }

    .tool-icon {
      font-size: 3rem;
      margin-bottom: 1.5rem;
      display: block;
    }

    .tool-title {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color: var(--primary);
      font-weight: 600;
    }

    .community-section {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white;
      padding: 4rem 2rem;
      border-radius: 20px;
      margin: 3rem 0;
      text-align: center;
    }

    .community-links {
      display: flex;
      justify-content: center;
      gap: 2rem;
      margin-top: 2rem;
      flex-wrap: wrap;
    }

    .community-link {
      background: rgba(255, 255, 255, 0.1);
      color: white;
      padding: 1rem 2rem;
      border-radius: 12px;
      text-decoration: none;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
    }

    .community-link:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-2px);
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

      .step {
        flex-direction: column;
        text-align: center;
      }

      .community-links {
        flex-direction: column;
        align-items: center;
      }

      .quick-start, .endpoints {
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
        <a href="developers.php" class="active">Developers</a>
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
    <a href="student-rewards.php">Student Rewards</a>
    <a href="developers.php" class="active">Developers</a>
    <a href="merchants.php">For Businesses</a>
  </nav>

  <!-- Developers Hero -->
  <section class="dev-hero">
    <div class="container">
      <h1>Build with MyxenPay</h1>
      <p>Powerful APIs, comprehensive SDKs, and developer tools to integrate crypto payments into your applications</p>
    </div>
  </section>

  <!-- SDKs Section -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">SDKs & Libraries</h2>
        <p class="section-subtitle">Choose your preferred programming language and start building</p>
      </div>

      <div class="sdk-grid">
        <div class="sdk-card">
          <div class="sdk-icon">⚡</div>
          <h3 class="sdk-title">JavaScript/TypeScript</h3>
          <p>Full SDK for web applications, React, Vue, Angular, and Node.js</p>
          <div style="margin-top: 1.5rem;">
            <button class="btn btn-primary" onclick="viewDocumentation('js')">
              View Documentation
            </button>
          </div>
        </div>

        <div class="sdk-card">
          <div class="sdk-icon">🐍</div>
          <h3 class="sdk-title">Python</h3>
          <p>Comprehensive library for Python applications and backend services</p>
          <div style="margin-top: 1.5rem;">
            <button class="btn btn-primary" onclick="viewDocumentation('python')">
              View Documentation
            </button>
          </div>
        </div>

        <div class="sdk-card">
          <div class="sdk-icon">☕</div>
          <h3 class="sdk-title">Java</h3>
          <p>Enterprise-grade SDK for Java applications and Android development</p>
          <div style="margin-top: 1.5rem;">
            <button class="btn btn-primary" onclick="viewDocumentation('java')">
              View Documentation
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Quick Start -->
  <section class="section" style="background: var(--glass-bg);">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Quick Start Guide</h2>
        <p class="section-subtitle">Get started with MyxenPay API in 5 minutes</p>
      </div>

      <div class="quick-start">
        <div class="step">
          <div class="step-number">1</div>
          <div class="step-content">
            <h3>Get API Keys</h3>
            <p>Sign up for a developer account and get your API keys from the dashboard</p>
          </div>
        </div>

        <div class="step">
          <div class="step-number">2</div>
          <div class="step-content">
            <h3>Install SDK</h3>
            <p>Install the MyxenPay SDK for your preferred programming language</p>
            <div class="code-block" style="margin-top: 1rem;">
              <span class="code-comment"># Using npm</span><br>
              <span class="code-keyword">npm</span> install <span class="code-string">@myxenpay/sdk</span>
            </div>
          </div>
        </div>

        <div class="step">
          <div class="step-number">3</div>
          <div class="step-content">
            <h3>Initialize Client</h3>
            <p>Initialize the MyxenPay client with your API keys</p>
            <div class="code-block" style="margin-top: 1rem;">
              <span class="code-keyword">import</span> { MyxenPay } <span class="code-keyword">from</span> <span class="code-string">'@myxenpay/sdk'</span>;<br><br>
              <span class="code-keyword">const</span> myxenpay = <span class="code-keyword">new</span> <span class="code-function">MyxenPay</span>({<br>
              &nbsp;&nbsp;apiKey: <span class="code-string">'your-api-key'</span>,<br>
              &nbsp;&nbsp;secretKey: <span class="code-string">'your-secret-key'</span><br>
              });
            </div>
          </div>
        </div>

        <div class="step">
          <div class="step-number">4</div>
          <div class="step-content">
            <h3>Make Your First API Call</h3>
            <p>Create a payment request and start accepting crypto payments</p>
            <div class="code-block" style="margin-top: 1rem;">
              <span class="code-comment">// Create a payment request</span><br>
              <span class="code-keyword">const</span> payment = <span class="code-keyword">await</span> myxenpay.payments.<span class="code-function">create</span>({<br>
              &nbsp;&nbsp;amount: <span class="code-number">100</span>,<br>
              &nbsp;&nbsp;currency: <span class="code-string">'USDC'</span>,<br>
              &nbsp;&nbsp;description: <span class="code-string">'Product purchase'</span><br>
              });<br><br>
              <span class="code-keyword">const</span> qrCodeUrl = payment.qrCodeUrl;
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- API Features -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">API Features</h2>
        <p class="section-subtitle">Everything you need to build powerful payment applications</p>
      </div>

      <div class="api-features">
        <div class="api-feature">
          <div class="feature-icon">💳</div>
          <h4>Payment Processing</h4>
          <p>Accept crypto payments via QR codes, deep links, and API calls</p>
        </div>

        <div class="api-feature">
          <div class="feature-icon">🔍</div>
          <h4>Transaction History</h4>
          <p>Access complete transaction history and real-time status updates</p>
        </div>

        <div class="api-feature">
          <div class="feature-icon">💰</div>
          <h4>Wallet Management</h4>
          <p>Create and manage non-custodial wallets for your users</p>
        </div>

        <div class="api-feature">
          <div class="feature-icon">🌍</div>
          <h4>Currency Conversion</h4>
          <p>Real-time crypto-to-fiat conversion with multiple currency support</p>
        </div>

        <div class="api-feature">
          <div class="feature-icon">📊</div>
          <h4>Analytics</h4>
          <p>Comprehensive analytics and reporting for your payment data</p>
        </div>

        <div class="api-feature">
          <div class="feature-icon">🔔</div>
          <h4>Webhooks</h4>
          <p>Real-time notifications for payment events and status changes</p>
        </div>
      </div>
    </div>
  </section>

  <!-- API Endpoints -->
  <section class="section" style="background: var(--glass-bg);">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Core API Endpoints</h2>
        <p class="section-subtitle">RESTful API designed for simplicity and performance</p>
      </div>

      <div class="endpoints">
        <div class="endpoint">
          <span class="endpoint-method endpoint-post">POST</span>
          <span class="endpoint-path">/v1/payments</span>
          <div class="endpoint-description">Create a new payment request and generate QR code</div>
        </div>

        <div class="endpoint">
          <span class="endpoint-method endpoint-get">GET</span>
          <span class="endpoint-path">/v1/payments/{id}</span>
          <div class="endpoint-description">Retrieve payment details and status</div>
        </div>

        <div class="endpoint">
          <span class="endpoint-method endpoint-get">GET</span>
          <span class="endpoint-path">/v1/transactions</span>
          <div class="endpoint-description">List all transactions with filtering and pagination</div>
        </div>

        <div class="endpoint">
          <span class="endpoint-method endpoint-post">POST</span>
          <span class="endpoint-path">/v1/wallets</span>
          <div class="endpoint-description">Create a new non-custodial wallet</div>
        </div>

        <div class="endpoint">
          <span class="endpoint-method endpoint-get">GET</span>
          <span class="endpoint-path">/v1/rates/{currency}</span>
          <div class="endpoint-description">Get current exchange rates for cryptocurrencies</div>
        </div>

        <div class="endpoint">
          <span class="endpoint-method endpoint-post">POST</span>
          <span class="endpoint-path">/v1/webhooks</span>
          <div class="endpoint-description">Register webhook endpoints for real-time notifications</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Developer Tools -->
  <section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Developer Tools</h2>
        <p class="section-subtitle">Everything you need to build, test, and deploy</p>
      </div>

      <div class="tools-grid">
        <div class="tool-card">
          <div class="tool-icon">🧪</div>
          <h3 class="tool-title">Testnet Environment</h3>
          <p>Full testing environment with test tokens and simulated transactions</p>
        </div>

        <div class="tool-card">
          <div class="tool-icon">📖</div>
          <h3 class="tool-title">API Documentation</h3>
          <p>Comprehensive documentation with examples and best practices</p>
        </div>

        <div class="tool-card">
          <div class="tool-icon">🛠️</div>
          <h3 class="tool-title">CLI Tool</h3>
          <p>Command-line interface for quick testing and automation</p>
        </div>

        <div class="tool-card">
          <div class="tool-icon">🐛</div>
          <h3 class="tool-title">Debugging Tools</h3>
          <p>Advanced debugging and logging for development and production</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Community Section -->
  <section class="section">
    <div class="container">
      <div class="community-section">
        <h2 style="font-size: 2.5rem; margin-bottom: 1rem;">Join Our Developer Community</h2>
        <p style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.9;">
          Connect with other developers, get support, and share your projects
        </p>
        <div class="community-links">
          <a href="https://github.com/myxenpay" class="community-link" target="_blank">
            💻 GitHub
          </a>
          <a href="https://discord.gg/myxenpay" class="community-link" target="_blank">
            💬 Discord
          </a>
          <a href="https://t.me/myxenpaydev" class="community-link" target="_blank">
            📢 Telegram
          </a>
          <a href="https://x.com/myxenpaydev" class="community-link" target="_blank">
            🐦 Twitter
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="section">
    <div class="container">
      <div class="cta-section">
        <h2 style="font-size: 2.5rem; margin-bottom: 1rem;">Ready to Start Building?</h2>
        <p style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.9;">
          Get your API keys and start integrating crypto payments today
        </p>
        <button class="white-button" onclick="getApiKeys()">
          🚀 Get API Keys
        </button>
        <p style="margin-top: 1rem; opacity: 0.8; font-size: 0.9rem;">
          Free to start • No credit card required
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
            <li><a href="faq.html">FAQ</a></li>
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

    // Developer Functions
    function viewDocumentation(language) {
      const docsUrl = {
        'js': 'https://docs.myxenpay.com/javascript',
        'python': 'https://docs.myxenpay.com/python', 
        'java': 'https://docs.myxenpay.com/java'
      };
      
      if (docsUrl[language]) {
        window.open(docsUrl[language], '_blank');
      } else {
        window.open('https://docs.myxenpay.com', '_blank');
      }
    }

    function getApiKeys() {
      if (!walletConnected) {
        alert('Please connect your wallet first to get API keys.');
        connectWallet();
        return;
      }
      
      // Redirect to API keys dashboard
      window.location.href = 'developer-dashboard.html';
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', initTheme);
  </script>
</body>
</html>