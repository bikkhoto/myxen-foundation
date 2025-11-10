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
  <title>Whitepaper - MyXen Foundation</title>
  <meta name="description" content="MyXen Foundation Whitepaper: Building a comprehensive decentralized ecosystem with interconnected platforms and services.">
  <meta property="og:title" content="MyXen Foundation Whitepaper - Decentralized Ecosystem">
  <meta property="og:description" content="Complete technical documentation and vision for MyXen Foundation ecosystem.">
  <meta property="og:image" content="https://myxenpay.finance/og/og-whitepaper.jpg">
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

    /* Whitepaper-specific styles */
    .whitepaper-hero {
      padding: 8rem 1rem 4rem;
      text-align: center;
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      color: white;
      position: relative;
      overflow: hidden;
    }

    .whitepaper-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
      background-size: cover;
    }

    .whitepaper-hero h1 {
      font-size: clamp(2.5rem, 5vw, 4rem);
      font-weight: 700;
      margin-bottom: 1rem;
      position: relative;
    }

    .whitepaper-hero p {
      font-size: 1.25rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
      position: relative;
    }

    .whitepaper-container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 2rem 1rem;
    }

    .toc-sidebar {
      position: sticky;
      top: 100px;
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 15px;
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .toc-title {
      color: var(--primary);
      margin-bottom: 1rem;
      font-size: 1.25rem;
      font-weight: 600;
    }

    .toc-list {
      list-style: none;
    }

    .toc-list li {
      margin-bottom: 0.75rem;
    }

    .toc-list a {
      color: var(--text);
      text-decoration: none;
      opacity: 0.8;
      transition: all 0.3s ease;
      display: block;
      padding: 0.5rem 0;
      border-bottom: 1px solid transparent;
    }

    .toc-list a:hover {
      opacity: 1;
      color: var(--primary);
      border-bottom-color: var(--primary);
      transform: translateX(5px);
    }

    .whitepaper-content {
      background: var(--card-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 3rem;
      margin-bottom: 2rem;
    }

    .whitepaper-section {
      margin-bottom: 3rem;
      scroll-margin-top: 100px;
    }

    .whitepaper-section:last-child {
      margin-bottom: 0;
    }

    .section-title {
      color: var(--primary);
      font-size: 2rem;
      margin-bottom: 1.5rem;
      font-weight: 700;
      border-bottom: 2px solid var(--primary);
      padding-bottom: 0.5rem;
    }

    .subsection-title {
      color: var(--accent);
      font-size: 1.5rem;
      margin: 2rem 0 1rem;
      font-weight: 600;
    }

    .whitepaper-content p {
      margin-bottom: 1rem;
      line-height: 1.7;
      opacity: 0.9;
    }

    .whitepaper-content ul, .whitepaper-content ol {
      margin-bottom: 1.5rem;
      padding-left: 1.5rem;
    }

    .whitepaper-content li {
      margin-bottom: 0.5rem;
      line-height: 1.6;
      opacity: 0.9;
    }

    .feature-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
      margin: 2rem 0;
    }

    .feature-item {
      background: var(--glass-bg);
      padding: 1.5rem;
      border-radius: 12px;
      border-left: 4px solid var(--primary);
    }

    .feature-item h4 {
      color: var(--primary);
      margin-bottom: 0.5rem;
      font-size: 1.1rem;
    }

    .tech-specs {
      background: var(--glass-bg);
      padding: 2rem;
      border-radius: 15px;
      margin: 2rem 0;
    }

    .spec-item {
      display: flex;
      justify-content: between;
      padding: 1rem 0;
      border-bottom: 1px solid var(--border);
    }

    .spec-item:last-child {
      border-bottom: none;
    }

    .spec-label {
      font-weight: 600;
      color: var(--primary);
      min-width: 150px;
    }

    .spec-value {
      flex: 1;
      opacity: 0.9;
    }

    .download-section {
      text-align: center;
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 2px dashed var(--glass-border);
      border-radius: 20px;
      padding: 3rem 2rem;
      margin: 3rem 0;
    }

    .download-btn {
      display: inline-flex;
      align-items: center;
      gap: 0.75rem;
      background: var(--primary);
      color: white;
      padding: 1.25rem 2.5rem;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .download-btn:hover {
      background: var(--secondary);
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
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

      .whitepaper-layout {
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 3rem;
        align-items: start;
      }
    }

    @media (max-width: 767px) {
      .mobile-nav-toggle {
        display: flex;
      }
      
      .desktop-nav {
        display: none;
      }

      .whitepaper-content {
        padding: 2rem 1.5rem;
      }

      .spec-item {
        flex-direction: column;
        gap: 0.5rem;
      }

      .spec-label {
        min-width: auto;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header class="site-header">
    <div class="header-container">
      <a href="index.php">
        <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyXen Foundation" class="logo">
      </a>

      <button class="mobile-nav-toggle" id="mobile-nav-toggle">
        <span></span>
      </button>

      <nav class="desktop-nav">
        <a href="tokenomics.php">Tokenomics</a>
        <a href="whitepaper.php" class="active">Whitepaper</a>
        <a href="student-rewards.php">Student Rewards</a>
        <a href="developers.php">Developers</a>
        <a href="merchants.php">For Businesses</a>
        <a href="careers.php">Careers</a>
        <a href="support.php">Support</a>
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
    <a href="whitepaper.php" class="active">Whitepaper</a>
    <a href="student-rewards.php">Student Rewards</a>
    <a href="developers.php">Developers</a>
    <a href="merchants.php">For Businesses</a>
    <a href="careers.php">Careers</a>
    <a href="support.php">Support</a>
  </nav>

  <!-- Whitepaper Hero -->
  <section class="whitepaper-hero">
    <div class="container">
      <h1>MyXen Foundation Whitepaper</h1>
      <p>Building a Comprehensive Decentralized Ecosystem for the Future</p>
    </div>
  </section>

  <!-- Whitepaper Content -->
  <section class="section">
    <div class="whitepaper-container">
      <div class="whitepaper-layout">
        <!-- Table of Contents -->
        <aside class="toc-sidebar">
          <h3 class="toc-title">Table of Contents</h3>
          <ul class="toc-list">
            <li><a href="#abstract">Abstract</a></li>
            <li><a href="#introduction">Introduction</a></li>
            <li><a href="#vision">Vision & Mission</a></li>
            <li><a href="#core-components">Core Components</a></li>
            <li><a href="#platforms-services">Platforms & Services</a></li>
            <li><a href="#technology">Technology Framework</a></li>
            <li><a href="#token">Token Economics</a></li>
            <li><a href="#governance">Governance</a></li>
            <li><a href="#roadmap">Development Roadmap</a></li>
            <li><a href="#conclusion">Conclusion</a></li>
          </ul>

          <div class="download-section" style="background: transparent; border: none; padding: 2rem 0 0;">
            <a href="/whitepaper.pdf" class="download-btn" download>
              <i class="fas fa-download"></i>
              Download PDF
            </a>
          </div>
        </aside>

        <!-- Main Content -->
        <main class="whitepaper-content">
          <!-- Abstract -->
          <section id="abstract" class="whitepaper-section">
            <h2 class="section-title">Abstract</h2>
            <p>MyXen Foundation is building a decentralized tomorrow through a comprehensive ecosystem of interconnected platforms and services, each meticulously designed to enhance utility, cultivate community engagement, and stimulate innovation within the digital asset landscape.</p>
            <p>These platforms and services form a cohesive and synergistic ecosystem, where each element contributes to the overall strength and functionality of the MyXen network. The overarching goal is to create a robust and user-centric environment that simplifies interaction with digital assets, making them more accessible and beneficial for a wider audience.</p>
            <p>This comprehensive approach ensures that users can seamlessly navigate various financial, social, and educational aspects of their lives within a secure and decentralized framework. The continuous development and integration of these services are geared towards fostering a vibrant community and driving the widespread adoption of digital currencies.</p>
          </section>

          <!-- Introduction -->
          <section id="introduction" class="whitepaper-section">
            <h2 class="section-title">1. Introduction</h2>
            <p>The digital asset landscape has evolved significantly, yet remains fragmented and inaccessible to many. MyXen Foundation addresses these challenges through a holistic ecosystem approach that bridges traditional finance with decentralized technologies.</p>
            
            <h3 class="subsection-title">1.1 The Current Digital Asset Landscape</h3>
            <p>Despite rapid growth, the digital asset space suffers from fragmentation, technical complexity, and limited real-world utility. Most platforms operate in isolation, creating barriers to mass adoption and limiting the potential of blockchain technology.</p>
            
            <h3 class="subsection-title">1.2 The MyXen Solution</h3>
            <p>MyXen Foundation creates an integrated ecosystem where each component strengthens the others, providing users with a seamless experience across financial services, social platforms, educational resources, and commercial applications.</p>
          </section>

          <!-- Vision & Mission -->
          <section id="vision" class="whitepaper-section">
            <h2 class="section-title">2. Vision & Mission</h2>
            
            <h3 class="subsection-title">2.1 Vision</h3>
            <p>To create a borderless, decentralized ecosystem where individuals and organizations can interact, transact, and innovate without traditional limitations, fostering global financial inclusion and technological advancement.</p>
            
            <h3 class="subsection-title">2.2 Mission</h3>
            <p>To build and maintain a comprehensive suite of interconnected platforms and services that empower users through decentralized technologies, driving innovation and adoption while maintaining security, transparency, and user-centric design.</p>
          </section>

          <!-- Core Components -->
          <section id="core-components" class="whitepaper-section">
            <h2 class="section-title">3. Core Components & Utilities</h2>
            
            <div class="feature-grid">
              <div class="feature-item">
                <h4>1. MyXanpay ($MYXN)</h4>
                <p>The primary utility token serving as the fundamental medium of exchange across the entire MyXen ecosystem, facilitating payments, QR code transactions, and virtual Visa card integration.</p>
              </div>
              
              <div class="feature-item">
                <h4>2. Meme Platform</h4>
                <p>The foundational fuel for ecosystem engagement, launching 4-5 tokens monthly on Pump.fun with strategic allocation: 40% DEX/marketing, 30% Foundation, 30% token burn.</p>
              </div>
              
              <div class="feature-item">
                <h4>3. MyXen.Life</h4>
                <p>Decentralized Charity Network implementing the "3 Zero Idea" framework: zero poverty, zero unemployment, and zero net carbon emissions through transparent blockchain solutions.</p>
              </div>
              
              <div class="feature-item">
                <h4>4. Claim Platform</h4>
                <p>Dedicated system for efficient management and processing of presale claims with automated verification and secure distribution mechanisms.</p>
              </div>
              
              <div class="feature-item">
                <h4>5. MyXen.University</h4>
                <p>Pioneering digital asset integration in education, enabling tuition payments with university tokens or $MYXN while introducing students to blockchain technology.</p>
              </div>
              
              <div class="feature-item">
                <h4>6. Admin Panel</h4>
                <p>Comprehensive administrative control interface for ecosystem management, security monitoring, and system configuration with multi-factor authentication.</p>
              </div>
            </div>
          </section>

          <!-- Platforms & Services -->
          <section id="platforms-services" class="whitepaper-section">
            <h2 class="section-title">4. Decentralized Platforms & Services</h2>
            
            <h3 class="subsection-title">4.1 Financial & Commercial Services</h3>
            <ul>
              <li><strong>MyXen.Travel:</strong> Book air tickets and hotels using $MYXN tokens with global partnerships and blockchain-recorded transactions.</li>
              <li><strong>MyXen.Store:</strong> User-friendly e-commerce platform with simple UI/UX, supporting $MYXN transactions and seller reputation systems.</li>
              <li><strong>MyXenPayroll.com:</strong> Dedicated payroll solution for the Foundation with automated compensation in digital assets and tax compliance.</li>
              <li><strong>MyXen Locker:</strong> Secure token vesting system with customizable schedules and automated releases via smart contracts.</li>
            </ul>

            <h3 class="subsection-title">4.2 Communication & Social Platforms</h3>
            <ul>
              <li><strong>MyXen.Social:</strong> Content publishing platform with reward mechanisms, fostering community engagement through $MYXN incentives.</li>
              <li><strong>MyXenmail.com:</strong> Secure, decentralized email service with end-to-end encryption and censorship-resistant architecture.</li>
              <li><strong>MyXen.Support:</strong> Centralized support management hub with integrated communication channels and comprehensive knowledge base.</li>
            </ul>

            <h3 class="subsection-title">4.3 Professional & Identity Services</h3>
            <ul>
              <li><strong>MyXen.Work:</strong> Decentralized freelancing platform connecting global talent with clients, eliminating intermediaries through smart contracts.</li>
              <li><strong>KYC Platform:</strong> Specialized identity verification system ensuring regulatory compliance and secure credential management.</li>
            </ul>
          </section>

          <!-- Technology Framework -->
          <section id="technology" class="whitepaper-section">
            <h2 class="section-title">5. Technology Framework</h2>
            
            <div class="tech-specs">
              <h3 class="subsection-title">Architecture Principles</h3>
              
              <div class="spec-item">
                <span class="spec-label">Decentralization:</span>
                <span class="spec-value">Distributed architecture with no single point of failure</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Interoperability:</span>
                <span class="spec-value">Seamless integration between all ecosystem components</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Security:</span>
                <span class="spec-value">Multi-layered security protocols and regular audits</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Scalability:</span>
                <span class="spec-value">Modular design supporting exponential growth</span>
              </div>
              <div class="spec-item">
                <span class="spec-label">Transparency:</span>
                <span class="spec-value">Open-source components and verifiable operations</span>
              </div>
            </div>

            <h3 class="subsection-title">Security Features</h3>
            <ul>
              <li>Non-custodial wallet architecture across all financial services</li>
              <li>Multi-signature transaction approvals for high-value operations</li>
              <li>End-to-end encryption for all communication platforms</li>
              <li>Regular smart contract security audits by third-party firms</li>
              <li>Real-time monitoring and incident response protocols</li>
            </ul>
          </section>

          <!-- Token Economics -->
          <section id="token" class="whitepaper-section">
            <h2 class="section-title">6. Token Economics</h2>
            
            <h3 class="subsection-title">6.1 $MYXN Utility</h3>
            <ul>
              <li><strong>Primary Medium of Exchange:</strong> Facilitates transactions across all ecosystem platforms</li>
              <li><strong>Payment Solutions:</strong> QR code payments, merchant services, and virtual Visa card integration</li>
              <li><strong>Fee Discounts:</strong> Reduced transaction fees when using $MYXN for platform services</li>
              <li><strong>Governance Rights:</strong> Voting power on ecosystem development and feature implementation</li>
              <li><strong>Staking Rewards:</strong> Yield generation through various staking mechanisms</li>
            </ul>

            <h3 class="subsection-title">6.2 Meme Token Economic Model</h3>
            <p>The meme platform implements a sustainable economic model with strategic allocation:</p>
            <ul>
              <li><strong>40%:</strong> DEX enhancement and marketing initiatives</li>
              <li><strong>30%:</strong> Foundation operations and development funding</li>
              <li><strong>30%:</strong> Token burn mechanism for deflationary pressure</li>
            </ul>

            <h3 class="subsection-title">6.3 Revenue Distribution</h3>
            <p>All platform revenues contribute to ecosystem sustainability through:</p>
            <ul>
              <li>Infrastructure maintenance and upgrades</li>
              <li>Security enhancement and auditing</li>
              <li>Community development and outreach</li>
              <li>Research and innovation funding</li>
            </ul>
          </section>

          <!-- Governance -->
          <section id="governance" class="whitepaper-section">
            <h2 class="section-title">7. Governance Framework</h2>
            
            <h3 class="subsection-title">7.1 Decentralized Decision-Making</h3>
            <p>MyXen Foundation implements a progressive decentralization model where governance power transitions from initial developers to the community through token-based voting mechanisms.</p>
            
            <h3 class="subsection-title">7.2 Proposal System</h3>
            <ul>
              <li><strong>Improvement Proposals:</strong> Technical upgrades and feature implementations</li>
              <li><strong>Ecosystem Proposals:</strong> New platform integrations and partnerships</li>
              <li><strong>Financial Proposals:</strong> Treasury allocation and funding requests</li>
              <li><strong>Governance Proposals:</strong> Protocol parameter changes and policy updates</li>
            </ul>

            <h3 class="subsection-title">7.3 Voting Mechanisms</h3>
            <ul>
              <li>Token-weighted voting for proportional representation</li>
              <li>Quadratic voting options for community sentiment</li>
              <li>Delegated voting for expert representation</li>
              <li>Time-locked voting for considered decision-making</li>
            </ul>
          </section>

          <!-- Development Roadmap -->
          <section id="roadmap" class="whitepaper-section">
            <h2 class="section-title">8. Development Roadmap</h2>

            <h3 class="subsection-title">Phase 1: Foundation (Q1 2025)</h3>
            <ul>
              <li>Core platform infrastructure deployment</li>
              <li>$MYXN token deployment and initial distribution</li>
              <li>Basic payment and wallet functionality</li>
              <li>Community building and initial partnerships</li>
            </ul>

            <h3 class="subsection-title">Phase 2: Expansion (Q2-Q3 2025)</h3>
            <ul>
              <li>Meme platform launch and token ecosystem development</li>
              <li>MyXen.Life charity network implementation</li>
              <li>University integration program rollout</li>
              <li>Mobile application development and release</li>
            </ul>

            <h3 class="subsection-title">Phase 3: Maturation (Q4 2025 - Q1 2026)</h3>
            <ul>
              <li>Full decentralized governance implementation</li>
              <li>Advanced platform integrations and API development</li>
              <li>Global expansion and regulatory compliance</li>
              <li>Enterprise solution development</li>
            </ul>

            <h3 class="subsection-title">Phase 4: Innovation (2026+)</h3>
            <ul>
              <li>Advanced AI integration across platforms</li>
              <li>Cross-chain interoperability implementation</li>
              <li>Global financial service expansion</li>
              <li>Sustainability and impact initiatives scaling</li>
            </ul>
          </section>

          <!-- Conclusion -->
          <section id="conclusion" class="whitepaper-section">
            <h2 class="section-title">9. Conclusion</h2>
            <p>MyXen Foundation represents a paradigm shift in how decentralized technologies can be integrated into everyday life. By creating a comprehensive ecosystem of interconnected platforms and services, we're building more than just another blockchain project—we're creating a foundation for the decentralized future.</p>
            <p>Our commitment to user-centric design, sustainable economic models, and continuous innovation positions MyXen Foundation as a leader in the next generation of decentralized applications. Through strategic development and community engagement, we aim to drive mass adoption of digital assets while maintaining the core principles of decentralization, transparency, and accessibility.</p>
            <p>The journey toward a truly decentralized tomorrow requires collaboration, innovation, and persistence. MyXen Foundation invites developers, entrepreneurs, and users worldwide to join us in building this future together.</p>
          </section>

          <!-- Download Section -->
          <div class="download-section">
            <h3 style="color: var(--primary); margin-bottom: 1rem;">Download Complete Whitepaper</h3>
            <p style="margin-bottom: 2rem; opacity: 0.8;">Get the full technical documentation and business plan in PDF format</p>
            <a href="/whitepaper.pdf" class="download-btn" download>
              <i class="fas fa-download"></i>
              Download PDF Version
            </a>
          </div>
        </main>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-section">
          <h3>MyXen Foundation</h3>
          <p>Building a Decentralized Tomorrow, Responsibly and Transparently</p>
          <div class="trust-badges" style="display: flex; flex-direction: column; gap: 10px; margin-top: 15px; align-items: flex-start;">
            <span style="background: #00d664; color: white; padding: 5px 10px; border-radius: 4px; font-size: 0.8rem; font-weight: bold; width: fit-content;">🔒 UK Registered</span>
            <span style="background: #4a5568; color: white; padding: 5px 10px; border-radius: 4px; font-size: 0.8rem; font-weight: bold; width: fit-content;">⚡ Multi-Chain</span>
          </div>
        </div>
        
        <div class="footer-section">
          <h3>Ecosystem</h3>
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
            <li><a href="support.php">Support Center</a></li>
            <li><a href="blog.html">Blog</a></li>
          </ul>
        </div>
        
        <div class="footer-section">
          <h3>Company</h3>
          <ul class="footer-links">
            <li><a href="about.html">About Us</a></li>
            <li><a href="careers.php">Careers</a></li>
            <li><a href="privacy.html">Privacy Policy</a></li>
            <li><a href="terms.html">Terms of Service</a></li>
          </ul>
        </div>
      </div>
      
      <div class="copyright">
        <p>© 2025 MyXen Foundation LTD. All rights reserved. Building a decentralized tomorrow for everyone.</p>
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

    // Smooth scrolling for table of contents
    document.querySelectorAll('.toc-list a').forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetSection = document.querySelector(targetId);
        
        if (targetSection) {
          const offsetTop = targetSection.offsetTop - 100;
          window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
          });
        }
      });
    });

    // Initialize
    document.addEventListener('DOMContentLoaded', initTheme);
  </script>
</body>
</html>