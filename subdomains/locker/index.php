<?php 
// myxen-locker.php
header("Content-Type: text/html; charset=utf-8");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>MyXen.Locker - Secure Token Locking & Vesting</title>
    <meta name="description" content="Secure token locking and vesting system for the MyXen ecosystem">
    
    <style>
    /* CSS Variables - Match Main Site */
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
      --section-spacing: clamp(2rem, 6vw, 4rem);
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

    /* Header Styles - Fixed */
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
    }

    .desktop-nav {
      display: flex;
      gap: 1.5rem;
      align-items: center;
    }

    .desktop-nav a {
      color: var(--text);
      text-decoration: none;
      font-weight: 500;
      font-size: 0.95rem;
      opacity: 0.8;
      transition: color 0.3s ease;
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

    /* Locker Hero Section - FIXED */
    .locker-hero {
      min-height: 70vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 6rem 1rem 3rem;
      position: relative;
      overflow: hidden;
    }

    .locker-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(ellipse at center, transparent 0%, var(--bg) 70%);
      z-index: -1;
    }

    .locker-hero-content {
      max-width: 800px;
      margin: 0 auto;
      width: 100%;
    }

    .locker-title {
      font-size: clamp(2rem, 5vw, 3.5rem);
      font-weight: 700;
      line-height: 1.1;
      margin-bottom: 1.5rem;
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      letter-spacing: -0.02em;
    }

    .locker-subtitle {
      font-size: clamp(1rem, 2.5vw, 1.25rem);
      line-height: 1.4;
      margin-bottom: 2rem;
      opacity: 0.8;
      font-weight: 400;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
      padding: 0 1rem;
    }

    .hero-actions {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
      padding: 0 1rem;
    }

    /* Button Styles */
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 1rem 2rem;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      min-width: 140px;
      justify-content: center;
    }

    .btn-primary {
      background: var(--primary);
      color: white;
    }

    .btn-primary:hover {
      background: var(--secondary);
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
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

    /* Main Container - FIXED */
    .locker-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 2rem 1rem;
      width: 100%;
    }

    /* Grid Layout - COMPLETELY FIXED */
    .locker-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 2rem;
      margin-bottom: 3rem;
      width: 100%;
    }

    @media (min-width: 768px) {
      .locker-grid {
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
      }
    }

    @media (min-width: 1024px) {
      .locker-grid {
        gap: 3rem;
      }
    }

    /* Cards - FIXED */
    .locker-card {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 2rem;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      width: 100%;
    }

    .locker-card::before {
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

    .locker-card:hover::before {
      transform: scaleX(1);
    }

    .card-title {
      font-size: clamp(1.5rem, 3vw, 1.75rem);
      margin-bottom: 1.5rem;
      color: var(--primary);
      font-weight: 700;
      text-align: center;
    }

    /* Form Styles - FIXED */
    .form-group {
      margin-bottom: 1.5rem;
      width: 100%;
    }

    .form-label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 600;
      font-size: 0.95rem;
      color: var(--text);
    }

    .form-input, .form-select {
      width: 100%;
      padding: 1rem;
      border: 1px solid var(--border);
      border-radius: 12px;
      background: transparent;
      color: var(--text);
      font-size: 1rem;
      transition: all 0.3s ease;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }

    .form-input:focus, .form-select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
    }

    /* Vesting Options - FIXED */
    .vesting-options {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1rem;
      margin-top: 1rem;
    }

    @media (min-width: 480px) {
      .vesting-options {
        grid-template-columns: 1fr 1fr;
      }
    }

    .vesting-option {
      padding: 1.25rem 1rem;
      border: 2px solid var(--border);
      border-radius: 12px;
      cursor: pointer;
      text-align: center;
      transition: all 0.3s ease;
      background: transparent;
    }

    .vesting-option.selected {
      border-color: var(--primary);
      background: rgba(0, 122, 255, 0.1);
    }

    .vesting-option input {
      display: none;
    }

    .option-title {
      font-weight: 600;
      margin-bottom: 0.25rem;
      color: var(--primary);
      font-size: 0.95rem;
    }

    .option-description {
      font-size: 0.8rem;
      opacity: 0.7;
      line-height: 1.3;
    }

    /* Lock Summary - FIXED */
    .lock-summary {
      background: var(--card-bg);
      padding: 1.5rem;
      border-radius: 16px;
      margin-top: 2rem;
      border: 1px solid var(--border);
    }

    .summary-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 0.75rem;
      padding-bottom: 0.75rem;
      border-bottom: 1px solid var(--border);
    }

    .summary-item:last-child {
      border-bottom: none;
      margin-bottom: 0;
    }

    .summary-label {
      opacity: 0.8;
      font-size: 0.9rem;
    }

    .summary-value {
      font-weight: 600;
      color: var(--primary);
      font-size: 0.9rem;
      text-align: right;
    }

    /* Locks List - FIXED */
    .locks-list {
      margin-top: 1.5rem;
    }

    .lock-item {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 1.5rem;
      margin-bottom: 1rem;
      transition: all 0.3s ease;
    }

    .lock-item:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow);
    }

    .lock-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 1rem;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    .lock-title {
      font-weight: 700;
      font-size: 1.1rem;
      color: var(--primary);
    }

    .lock-status {
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 600;
      white-space: nowrap;
    }

    .status-active {
      background: var(--secondary);
      color: black;
    }

    .status-completed {
      background: var(--primary);
      color: white;
    }

    .status-upcoming {
      background: var(--accent);
      color: black;
    }

    .lock-details {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .detail-item {
      text-align: center;
    }

    .detail-label {
      display: block;
      font-size: 0.8rem;
      opacity: 0.7;
      margin-bottom: 0.25rem;
    }

    .detail-value {
      display: block;
      font-weight: 700;
      font-size: 0.9rem;
      color: var(--primary);
    }

    .progress-bar {
      width: 100%;
      height: 6px;
      background: var(--border);
      border-radius: 3px;
      overflow: hidden;
      margin: 1rem 0;
    }

    .progress-fill {
      height: 100%;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      transition: width 0.3s ease;
    }

    /* Empty State - FIXED */
    .empty-state {
      text-align: center;
      padding: 3rem 1rem;
      opacity: 0.7;
    }

    .empty-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
      opacity: 0.5;
    }

    /* Section Styles */
    .section {
      padding: var(--section-spacing) 1rem;
    }

    .section-header {
      text-align: center;
      margin-bottom: 3rem;
    }

    .section-title {
      font-size: clamp(1.75rem, 4vw, 2.5rem);
      font-weight: 700;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 1rem;
    }

    .section-subtitle {
      font-size: 1.1rem;
      opacity: 0.7;
      max-width: 600px;
      margin: 0 auto;
    }

    /* Revenue Grid - FIXED */
    .revenue-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
      margin-top: 2rem;
    }

    @media (min-width: 768px) {
      .revenue-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
      }
    }

    .revenue-card {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 16px;
      padding: 2rem;
      text-align: center;
      transition: all 0.3s ease;
    }

    .revenue-card:hover {
      transform: translateY(-5px);
    }

    .revenue-icon {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .revenue-title {
      font-size: 1.25rem;
      margin-bottom: 1.5rem;
      color: var(--primary);
      font-weight: 600;
    }

    .revenue-list {
      list-style: none;
      text-align: left;
    }

    .revenue-list li {
      padding: 0.75rem 0;
      border-bottom: 1px solid var(--border);
      font-size: 0.9rem;
    }

    .revenue-list li:last-child {
      border-bottom: none;
    }

    /* Features Grid - FIXED */
    .features-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
      margin: 2rem 0;
    }

    @media (min-width: 768px) {
      .features-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
      }
    }

    .feature-card {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 16px;
      padding: 2rem;
      text-align: center;
      transition: all 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    .feature-icon {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .feature-title {
      font-size: 1.25rem;
      margin-bottom: 1rem;
      color: var(--primary);
      font-weight: 600;
    }

    .feature-description {
      opacity: 0.8;
      line-height: 1.5;
      font-size: 0.95rem;
    }

    /* Loading Animation */
    .loading {
      display: inline-block;
      width: 18px;
      height: 18px;
      border: 2px solid rgba(255,255,255,.3);
      border-radius: 50%;
      border-top-color: #fff;
      animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    /* Animations */
    .fade-in-up {
      animation: fadeInUp 0.6s ease both;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive Design Fixes */
    @media (max-width: 767px) {
      .mobile-nav-toggle {
        display: flex;
      }
      
      .desktop-nav {
        display: none;
      }
      
      .locker-hero {
        padding: 5rem 1rem 2rem;
        min-height: 60vh;
      }
      
      .hero-actions {
        flex-direction: column;
        align-items: center;
      }
      
      .btn {
        width: 100%;
        max-width: 280px;
      }
      
      .locker-card {
        padding: 1.5rem;
      }
      
      .lock-header {
        flex-direction: column;
        align-items: flex-start;
      }
      
      .lock-status {
        align-self: flex-start;
      }
    }

    @media (max-width: 480px) {
      .locker-container {
        padding: 1rem 0.5rem;
      }
      
      .locker-card {
        padding: 1.25rem;
      }
      
      .lock-details {
        grid-template-columns: 1fr 1fr;
      }
      
      .revenue-card, .feature-card {
        padding: 1.5rem;
      }
    }

    /* Safe area support */
    @supports(padding: max(0px)) {
      .locker-container, .section {
        padding-left: max(1rem, env(safe-area-inset-left));
        padding-right: max(1rem, env(safe-area-inset-right));
      }
      
      .locker-hero {
        padding-top: max(6rem, env(safe-area-inset-top));
      }
    }
    </style>
</head>
<body data-theme="light">
    <!-- Fixed Header -->
    <header class="site-header">
        <div class="header-container">
            <a href="index.php">
                <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyXen Foundation" class="logo">
            </a>

            <button class="mobile-nav-toggle" id="mobile-nav-toggle">
                <span></span>
            </button>

            <nav class="desktop-nav">
                <a href="index.php">Home</a>
                <a href="tokenomics.php">Tokenomics</a>
                <a href="whitepaper.php">Whitepaper</a>
                <a href="presale.php">Pre-Sale</a>
                <a href="myxen-locker.php" class="active">Locker</a>
                <a href="student-rewards.php">Student Rewards</a>
            </nav>

            <div class="header-actions">
                <button id="theme-toggle" class="theme-btn">☀️</button>
                <button id="connect-btn" class="connect-btn">Connect Wallet</button>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation -->
    <nav class="mobile-nav" id="mobile-nav">
        <a href="index.php">Home</a>
        <a href="tokenomics.php">Tokenomics</a>
        <a href="whitepaper.php">Whitepaper</a>
        <a href="presale.php">Pre-Sale</a>
        <a href="myxen-locker.php" class="active">Locker</a>
        <a href="student-rewards.php">Student Rewards</a>
    </nav>

    <!-- Hero Section - FIXED -->
    <section class="locker-hero">
        <div class="locker-hero-content fade-in-up">
            <h1 class="locker-title">MyXen.Locker</h1>
            <p class="locker-subtitle">Secure token locking and vesting with multi-signature protection. Institutional-grade security for your digital assets.</p>
            <div class="hero-actions">
                <a href="#create-lock" class="btn btn-primary">Create Lock</a>
                <a href="#revenue" class="btn btn-secondary">Revenue Model</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Why Choose MyXen.Locker?</h2>
            <p class="section-subtitle">Enterprise-grade security meets user-friendly design</p>
        </div>
        <div class="features-grid">
            <div class="feature-card fade-in-up">
                <div class="feature-icon">🔒</div>
                <h3 class="feature-title">Multi-Signature Security</h3>
                <p class="feature-description">3-of-4 signature requirement with platform oversight for maximum security</p>
            </div>
            <div class="feature-card fade-in-up">
                <div class="feature-icon">💸</div>
                <h3 class="feature-title">Zero Setup Fees</h3>
                <p class="feature-description">Create your first lock for free. Pay only when you scale</p>
            </div>
            <div class="feature-card fade-in-up">
                <div class="feature-icon">⚡</div>
                <h3 class="feature-title">Instant Deployment</h3>
                <p class="feature-description">Smart contracts deployed instantly on Solana with minimal gas fees</p>
            </div>
        </div>
    </section>

    <!-- Main Locker Interface - FIXED -->
    <div class="locker-container">
        <div class="locker-grid">
            <!-- Create Lock Form -->
            <div class="locker-card" id="create-lock">
                <h2 class="card-title">Create New Lock</h2>
                <form id="create-lock-form">
                    <div class="form-group">
                        <label class="form-label">Token Address</label>
                        <input type="text" name="token_address" class="form-input" placeholder="Enter token contract address" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Token Amount</label>
                        <input type="number" name="token_amount" class="form-input" step="0.000001" placeholder="Amount to lock" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Lock Type</label>
                        <select name="lock_type" class="form-select" id="lock-type" required>
                            <option value="">Select lock type</option>
                            <option value="team_vesting">Team Vesting</option>
                            <option value="liquidity_lock">Liquidity Lock</option>
                            <option value="simple_lock">Simple Token Lock</option>
                            <option value="multi_sig">Multi-Signature Vault</option>
                        </select>
                    </div>

                    <!-- Vesting Options -->
                    <div id="vesting-options" style="display: none;">
                        <label class="form-label">Vesting Schedule</label>
                        <div class="vesting-options">
                            <label class="vesting-option">
                                <input type="radio" name="vesting_type" value="linear">
                                <div class="option-title">Linear Vesting</div>
                                <div class="option-description">Equal releases over time</div>
                            </label>
                            <label class="vesting-option">
                                <input type="radio" name="vesting_type" value="cliff">
                                <div class="option-title">Cliff + Linear</div>
                                <div class="option-description">Cliff period then linear</div>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Cliff Period (months)</label>
                            <input type="number" name="cliff_period" class="form-input" min="0" max="36" placeholder="0 for no cliff">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Vesting Duration (months)</label>
                            <input type="number" name="vesting_duration" class="form-input" min="1" max="60" placeholder="Total vesting period">
                        </div>
                    </div>

                    <!-- Multi-sig Options -->
                    <div id="multisig-options" style="display: none;">
                        <div class="form-group">
                            <label class="form-label">Guardian 1 (Trusted Contact)</label>
                            <input type="text" name="guardian_1" class="form-input" placeholder="Wallet address">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Guardian 2 (Trusted Contact)</label>
                            <input type="text" name="guardian_2" class="form-input" placeholder="Wallet address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Lock Duration</label>
                        <select name="lock_duration" class="form-select" id="lock-duration" required>
                            <option value="">Select duration</option>
                            <option value="3">3 Months</option>
                            <option value="6">6 Months</option>
                            <option value="12">1 Year</option>
                            <option value="24">2 Years</option>
                            <option value="36">3 Years</option>
                        </select>
                    </div>

                    <div class="lock-summary">
                        <h4 style="margin-bottom: 1rem; color: var(--primary);">Lock Summary</h4>
                        <div class="summary-item">
                            <span class="summary-label">Tokens to Lock:</span>
                            <span class="summary-value" id="summary-tokens">-</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Lock Type:</span>
                            <span class="summary-value" id="summary-type">-</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Duration:</span>
                            <span class="summary-value" id="summary-duration">-</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Unlock Date:</span>
                            <span class="summary-value" id="summary-unlock">-</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Platform Fee:</span>
                            <span class="summary-value" id="summary-fee">0.1%</span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="create-lock-btn" style="margin-top: 1.5rem;">
                        🚀 Create Lock Contract
                    </button>
                </form>
            </div>

            <!-- Active Locks -->
            <div class="locker-card">
                <h2 class="card-title">Your Active Locks</h2>
                <div class="locks-list" id="locks-list">
                    <div class="empty-state" id="empty-locks">
                        <div class="empty-icon">🔒</div>
                        <h3 style="margin-bottom: 0.5rem;">No Active Locks</h3>
                        <p>Connect your wallet to view existing locks or create a new one</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue Model Section -->
        <section class="section" id="revenue">
            <div class="section-header">
                <h2 class="section-title">Revenue Model</h2>
                <p class="section-subtitle">Sustainable business model ensuring long-term platform development</p>
            </div>
            <div class="revenue-grid">
                <div class="revenue-card fade-in-up">
                    <div class="revenue-icon">💳</div>
                    <h3 class="revenue-title">Subscription Plans</h3>
                    <ul class="revenue-list">
                        <li>🆓 <strong>Basic:</strong> Free (1 lock)</li>
                        <li>🚀 <strong>Starter:</strong> $49/month (5 locks)</li>
                        <li>📈 <strong>Growth:</strong> $199/month (20 locks)</li>
                        <li>🏢 <strong>Enterprise:</strong> Custom pricing</li>
                    </ul>
                </div>
                <div class="revenue-card fade-in-up">
                    <div class="revenue-icon">⚡</div>
                    <h3 class="revenue-title">Transaction Fees</h3>
                    <ul class="revenue-list">
                        <li>📊 0.1% of locked value</li>
                        <li>🚨 Early unlock: 10-25% penalty</li>
                        <li>🔐 Multi-sig setup: $50 one-time</li>
                        <li>🔄 Contract upgrades: $100</li>
                    </ul>
                </div>
                <div class="revenue-card fade-in-up">
                    <div class="revenue-icon">🛡️</div>
                    <h3 class="revenue-title">Premium Features</h3>
                    <ul class="revenue-list">
                        <li>📈 Advanced analytics dashboard</li>
                        <li>⚖️ Legal document templates</li>
                        <li>🎯 Insurance integration</li>
                        <li>🔌 API access</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.body.setAttribute('data-theme', savedTheme);
        document.getElementById('theme-toggle').textContent = savedTheme === 'dark' ? '🌙' : '☀️';
        
        const logo = document.getElementById('theme-logo');
        if (logo) {
            logo.src = savedTheme === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
        }

        // Theme toggle
        document.getElementById('theme-toggle').addEventListener('click', function() {
            const current = document.body.getAttribute('data-theme');
            const newTheme = current === 'dark' ? 'light' : 'dark';
            document.body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            
            const logo = document.getElementById('theme-logo');
            if (logo) {
                logo.src = newTheme === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
            }
            this.textContent = newTheme === 'dark' ? '🌙' : '☀️';
        });

        // Mobile navigation
        const mobileNavToggle = document.getElementById('mobile-nav-toggle');
        const mobileNav = document.getElementById('mobile-nav');
        
        if (mobileNavToggle && mobileNav) {
            mobileNavToggle.addEventListener('click', () => {
                mobileNavToggle.classList.toggle('active');
                mobileNav.classList.toggle('active');
                document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
            });

            mobileNav.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileNavToggle.classList.remove('active');
                    mobileNav.classList.remove('active');
                    document.body.style.overflow = '';
                });
            });
        }

        // Form interactions
        const lockTypeSelect = document.getElementById('lock-type');
        const vestingOptions = document.getElementById('vesting-options');
        const multisigOptions = document.getElementById('multisig-options');
        const lockDurationSelect = document.getElementById('lock-duration');

        if (lockTypeSelect) {
            lockTypeSelect.addEventListener('change', function() {
                if (vestingOptions) {
                    vestingOptions.style.display = this.value === 'team_vesting' ? 'block' : 'none';
                }
                if (multisigOptions) {
                    multisigOptions.style.display = this.value === 'multi_sig' ? 'block' : 'none';
                }
                updateSummary();
            });
        }

        if (lockDurationSelect) {
            lockDurationSelect.addEventListener('change', updateSummary);
        }

        // Vesting option selection
        document.querySelectorAll('.vesting-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.vesting-option').forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                const input = this.querySelector('input');
                if (input) input.checked = true;
            });
        });

        // Update summary in real-time
        function updateSummary() {
            const tokenAmount = document.querySelector('input[name="token_amount"]');
            const lockType = lockTypeSelect ? lockTypeSelect.options[lockTypeSelect.selectedIndex].text : '';
            const duration = lockDurationSelect ? lockDurationSelect.options[lockDurationSelect.selectedIndex].text : '';
            
            if (tokenAmount && tokenAmount.value) {
                const summaryTokens = document.getElementById('summary-tokens');
                if (summaryTokens) summaryTokens.textContent = `${tokenAmount.value} Tokens`;
            }
            
            const summaryType = document.getElementById('summary-type');
            if (summaryType && lockType) summaryType.textContent = lockType;
            
            const summaryDuration = document.getElementById('summary-duration');
            if (summaryDuration && duration) summaryDuration.textContent = duration;
            
            if (duration && lockDurationSelect) {
                const unlockDate = new Date();
                unlockDate.setMonth(unlockDate.getMonth() + parseInt(lockDurationSelect.value));
                const summaryUnlock = document.getElementById('summary-unlock');
                if (summaryUnlock) summaryUnlock.textContent = unlockDate.toLocaleDateString();
            }
        }

        // Real-time summary updates
        const tokenInput = document.querySelector('input[name="token_amount"]');
        if (tokenInput) {
            tokenInput.addEventListener('input', updateSummary);
        }

        // Wallet connection simulation
        const connectBtn = document.getElementById('connect-btn');
        if (connectBtn) {
            connectBtn.addEventListener('click', function() {
                if (!window.walletConnected) {
                    // Simulate wallet connection
                    window.walletConnected = true;
                    window.walletAddress = '0x' + Math.random().toString(16).substr(2, 40);
                    this.textContent = `Disconnect ${window.walletAddress.substring(0, 6)}...`;
                    this.classList.add('connected');
                    
                    // Load mock locks
                    loadUserLocks();
                } else {
                    window.walletConnected = false;
                    window.walletAddress = null;
                    this.textContent = 'Connect Wallet';
                    this.classList.remove('connected');
                    const emptyLocks = document.getElementById('empty-locks');
                    const locksList = document.getElementById('locks-list');
                    if (emptyLocks) emptyLocks.style.display = 'block';
                    if (locksList) locksList.innerHTML = '';
                    if (emptyLocks && locksList) locksList.appendChild(emptyLocks);
                }
            });
        }

        // Mock locks data
        function loadUserLocks() {
            setTimeout(() => {
                const locks = [
                    {
                        id: 'lock_1',
                        token: 'MYXN',
                        amount: '100,000',
                        type: 'Team Vesting',
                        created: '2024-01-15',
                        unlock: '2025-01-15',
                        progress: 45,
                        status: 'active',
                        value: '$25,000'
                    },
                    {
                        id: 'lock_2', 
                        token: 'LP',
                        amount: '50,000',
                        type: 'Liquidity Lock',
                        created: '2024-02-01',
                        unlock: '2026-02-01',
                        progress: 20,
                        status: 'active',
                        value: '$15,000'
                    }
                ];
                
                renderLocks(locks);
            }, 1000);
        }

        function renderLocks(locks) {
            const locksList = document.getElementById('locks-list');
            const emptyLocks = document.getElementById('empty-locks');
            
            if (!locksList || !emptyLocks) return;

            if (locks.length === 0) {
                emptyLocks.style.display = 'block';
                locksList.innerHTML = '';
                locksList.appendChild(emptyLocks);
                return;
            }

            emptyLocks.style.display = 'none';
            locksList.innerHTML = locks.map(lock => `
                <div class="lock-item fade-in-up">
                    <div class="lock-header">
                        <div class="lock-title">${lock.token} Lock</div>
                        <div class="lock-status status-${lock.status}">${lock.status.toUpperCase()}</div>
                    </div>
                    <div class="lock-details">
                        <div class="detail-item">
                            <span class="detail-label">Amount</span>
                            <span class="detail-value">${lock.amount}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Type</span>
                            <span class="detail-value">${lock.type}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Value</span>
                            <span class="detail-value">${lock.value}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Unlocks</span>
                            <span class="detail-value">${lock.unlock}</span>
                        </div>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: ${lock.progress}%"></div>
                    </div>
                    <div style="text-align: center; font-size: 0.85rem; opacity: 0.7; margin-top: 0.5rem;">
                        ${lock.progress}% vested • Created: ${lock.created}
                    </div>
                </div>
            `).join('');
        }

        // Form submission
        const createLockForm = document.getElementById('create-lock-form');
        if (createLockForm) {
            createLockForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (!window.walletConnected) {
                    alert('Please connect your wallet first');
                    return;
                }

                const submitBtn = document.getElementById('create-lock-btn');
                if (!submitBtn) return;

                const originalText = submitBtn.textContent;

                submitBtn.innerHTML = '<div class="loading"></div> Creating Lock...';
                submitBtn.disabled = true;

                // Simulate lock creation
                setTimeout(() => {
                    alert('🎉 Lock contract created successfully! Your tokens are now securely locked.');
                    this.reset();
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    
                    // Reload locks to show the new one
                    if (window.walletConnected) {
                        loadUserLocks();
                    }
                }, 2000);
            });
        }

        // Initialize animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationDelay = '0s';
                    entry.target.classList.add('fade-in-up');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in-up').forEach(el => {
            observer.observe(el);
        });
    });
    </script>
</body>
</html>