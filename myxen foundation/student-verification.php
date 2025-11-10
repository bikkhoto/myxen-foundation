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
  <title>Student Verification - MyxenPay</title>
  <meta name="description" content="Verify your student status to unlock 5% cashback rewards on educational payments with MyxenPay.">
  <meta property="og:title" content="Student Verification - MyxenPay">
  <meta property="og:description" content="Get verified for student rewards and earn 5% cashback on educational payments.">
  <meta property="og:image" content="https://myxenpay.finance/og/og-student-verification.jpg">
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

    /* Student Verification specific styles */
    .verification-hero {
      padding: 8rem 1rem 4rem;
      text-align: center;
      background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
      color: white;
      position: relative;
      overflow: hidden;
    }

    .verification-hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
      background-size: cover;
    }

    .verification-hero h1 {
      font-size: clamp(2.5rem, 5vw, 4rem);
      font-weight: 700;
      margin-bottom: 1rem;
      position: relative;
    }

    .verification-hero p {
      font-size: 1.25rem;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
      position: relative;
    }

    .verification-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 2rem 1rem;
    }

    .verification-steps {
      display: flex;
      justify-content: space-between;
      margin-bottom: 3rem;
      position: relative;
    }

    .verification-steps::before {
      content: '';
      position: absolute;
      top: 20px;
      left: 0;
      right: 0;
      height: 2px;
      background: var(--border);
      z-index: 1;
    }

    .step {
      text-align: center;
      position: relative;
      z-index: 2;
      flex: 1;
    }

    .step-number {
      width: 40px;
      height: 40px;
      background: var(--border);
      color: var(--text);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .step.active .step-number {
      background: var(--primary);
      color: white;
    }

    .step.completed .step-number {
      background: var(--secondary);
      color: white;
    }

    .step-label {
      font-size: 0.9rem;
      font-weight: 500;
      opacity: 0.7;
    }

    .step.active .step-label {
      opacity: 1;
      color: var(--primary);
    }

    .verification-form {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 3rem;
      margin-bottom: 2rem;
    }

    .form-step {
      display: none;
    }

    .form-step.active {
      display: block;
    }

    .form-group {
      margin-bottom: 2rem;
    }

    .form-label {
      display: block;
      margin-bottom: 0.75rem;
      font-weight: 600;
      color: var(--text);
    }

    .form-input {
      width: 100%;
      padding: 1rem 1.25rem;
      border: 1px solid var(--border);
      border-radius: 12px;
      background: var(--bg);
      color: var(--text);
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .form-input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
    }

    .form-select {
      width: 100%;
      padding: 1rem 1.25rem;
      border: 1px solid var(--border);
      border-radius: 12px;
      background: var(--bg);
      color: var(--text);
      font-size: 1rem;
      cursor: pointer;
    }

    .file-upload {
      border: 2px dashed var(--border);
      border-radius: 12px;
      padding: 2rem;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .file-upload:hover {
      border-color: var(--primary);
    }

    .file-upload.dragover {
      border-color: var(--primary);
      background: rgba(0, 122, 255, 0.05);
    }

    .upload-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
      display: block;
    }

    .file-input {
      display: none;
    }

    .file-preview {
      margin-top: 1rem;
      display: none;
    }

    .file-preview img {
      max-width: 200px;
      max-height: 200px;
      border-radius: 8px;
    }

    .verification-actions {
      display: flex;
      justify-content: space-between;
      margin-top: 2rem;
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

    .btn-primary:hover:not(:disabled) {
      background: var(--secondary);
      transform: translateY(-2px);
    }

    .btn-primary:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    .btn-secondary {
      background: transparent;
      color: var(--text);
      border: 1px solid var(--border);
    }

    .btn-secondary:hover {
      border-color: var(--primary);
      color: var(--primary);
    }

    .verification-success {
      text-align: center;
      padding: 4rem 2rem;
      display: none;
    }

    .success-icon {
      font-size: 4rem;
      margin-bottom: 2rem;
      display: block;
    }

    .benefits-list {
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 2rem;
      margin: 2rem 0;
    }

    .benefit-item {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem 0;
      border-bottom: 1px solid var(--border);
    }

    .benefit-item:last-child {
      border-bottom: none;
    }

    .benefit-icon {
      font-size: 1.5rem;
      flex-shrink: 0;
    }

    .loading {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(255,255,255,.3);
      border-radius: 50%;
      border-top-color: #fff;
      animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
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

      .verification-steps {
        flex-direction: column;
        gap: 2rem;
      }

      .verification-steps::before {
        display: none;
      }

      .verification-form {
        padding: 2rem 1.5rem;
      }

      .verification-actions {
        flex-direction: column;
        gap: 1rem;
      }

      .verification-actions .btn {
        width: 100%;
        justify-content: center;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header class="site-header">
    <div class="header-container">
      <a href="index.php">
        <img id="theme-logo" src="../myxenpay-logo-light.png" alt="MyxenPay" class="logo">
      </a>

      <button class="mobile-nav-toggle" id="mobile-nav-toggle">
        <span></span>
      </button>

      <nav class="desktop-nav">
        <a href="../tokenomics.php">Tokenomics</a>
        <a href="../whitepaper.php">Whitepaper</a>
        <a href="../student-rewards.php">Student Rewards</a>
        <a href="../developers.php">Developers</a>
        <a href="../merchants.php">For Businesses</a>
      </nav>

      <div class="header-actions">
        <button id="theme-toggle" class="theme-btn">☀️</button>
        <button id="connect-btn" class="connect-btn">Connect Wallet</button>
      </div>
    </div>
  </header>

  <!-- Mobile Navigation -->
  <nav class="mobile-nav" id="mobile-nav">
    <a href="../tokenomics.php">Tokenomics</a>
    <a href="../whitepaper.php">Whitepaper</a>
    <a href="../student-rewards.php">Student Rewards</a>
    <a href="../developers.php">Developers</a>
    <a href="../merchants.php">For Businesses</a>
  </nav>

  <!-- Verification Hero -->
  <section class="verification-hero">
    <div class="container">
      <h1>Student Verification</h1>
      <p>Get verified and unlock 5% cashback rewards on educational payments</p>
    </div>
  </section>

  <!-- Verification Process -->
  <section class="section">
    <div class="verification-container">
      <!-- Progress Steps -->
      <div class="verification-steps">
        <div class="step active" id="step-1">
          <div class="step-number">1</div>
          <div class="step-label">Basic Info</div>
        </div>
        <div class="step" id="step-2">
          <div class="step-number">2</div>
          <div class="step-label">Email Verification</div>
        </div>
        <div class="step" id="step-3">
          <div class="step-number">3</div>
          <div class="step-label">ID Upload</div>
        </div>
        <div class="step" id="step-4">
          <div class="step-number">4</div>
          <div class="step-label">Complete</div>
        </div>
      </div>

      <!-- Verification Form -->
      <div class="verification-form">
        <!-- Step 1: Basic Information -->
        <div class="form-step active" id="form-step-1">
          <h2 style="margin-bottom: 2rem; color: var(--primary);">Basic Information</h2>
          
          <div class="form-group">
            <label class="form-label" for="fullName">Full Name</label>
            <input type="text" id="fullName" class="form-input" placeholder="Enter your full name" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="educationalEmail">Educational Email</label>
            <input type="email" id="educationalEmail" class="form-input" placeholder="your.name@university.edu" required>
            <small style="display: block; margin-top: 0.5rem; opacity: 0.7;">
              We'll send a verification code to this email. .edu domains are preferred.
            </small>
          </div>

          <div class="form-group">
            <label class="form-label" for="institution">Educational Institution</label>
            <input type="text" id="institution" class="form-input" placeholder="Your university or college" required>
          </div>

          <div class="form-group">
            <label class="form-label" for="studentId">Student ID Number (Optional)</label>
            <input type="text" id="studentId" class="form-input" placeholder="For higher reward limits">
          </div>

          <div class="verification-actions">
            <div></div> <!-- Spacer -->
            <button class="btn btn-primary" onclick="nextStep(2)">Continue</button>
          </div>
        </div>

        <!-- Step 2: Email Verification -->
        <div class="form-step" id="form-step-2">
          <h2 style="margin-bottom: 2rem; color: var(--primary);">Email Verification</h2>
          
          <div class="form-group">
            <label class="form-label">Verification Code</label>
            <input type="text" id="verificationCode" class="form-input" placeholder="Enter 6-digit code" maxlength="6">
            <small style="display: block; margin-top: 0.5rem; opacity: 0.7;">
              We've sent a verification code to your educational email.
            </small>
          </div>

          <div style="text-align: center; margin: 2rem 0;">
            <button class="btn btn-secondary" onclick="resendCode()" id="resend-btn">
              Resend Code
            </button>
            <div id="countdown" style="margin-top: 1rem; display: none;">
              <small>Resend available in <span id="countdown-timer">60</span> seconds</small>
            </div>
          </div>

          <div class="verification-actions">
            <button class="btn btn-secondary" onclick="prevStep(1)">Back</button>
            <button class="btn btn-primary" onclick="verifyEmail()">Verify Email</button>
          </div>
        </div>

        <!-- Step 3: Student ID Upload -->
        <div class="form-step" id="form-step-3">
          <h2 style="margin-bottom: 2rem; color: var(--primary);">Student ID Upload (Optional)</h2>
          
          <div class="form-group">
            <label class="form-label">Upload Student ID</label>
            <div class="file-upload" id="file-upload-area">
              <div class="upload-icon">📄</div>
              <p>Drag & drop your student ID here</p>
              <p style="opacity: 0.7; font-size: 0.9rem; margin-top: 0.5rem;">
                or click to browse files
              </p>
              <input type="file" id="studentIdFile" class="file-input" accept="image/*,.pdf">
            </div>
            <div class="file-preview" id="file-preview">
              <img id="preview-image" src="" alt="Preview">
              <p id="file-name"></p>
              <button class="btn btn-secondary" onclick="removeFile()" style="margin-top: 1rem;">Remove File</button>
            </div>
          </div>

          <div class="benefits-list">
            <h4 style="margin-bottom: 1rem; color: var(--primary);">Benefits of ID Verification:</h4>
            <div class="benefit-item">
              <div class="benefit-icon">💰</div>
              <div>
                <strong>Higher Reward Limit</strong>
                <p>Increase your cashback limit from $250 to $500 per semester</p>
              </div>
            </div>
            <div class="benefit-item">
              <div class="benefit-icon">⚡</div>
              <div>
                <strong>Faster Verification</strong>
                <p>Get approved within 24 hours instead of 3-5 business days</p>
              </div>
            </div>
            <div class="benefit-item">
              <div class="benefit-icon">🔒</div>
              <div>
                <strong>Enhanced Security</strong>
                <p>Your documents are encrypted and stored securely</p>
              </div>
            </div>
          </div>

          <div class="verification-actions">
            <button class="btn btn-secondary" onclick="prevStep(2)">Back</button>
            <button class="btn btn-primary" onclick="submitVerification()" id="submit-btn">
              Complete Verification
            </button>
          </div>
        </div>

        <!-- Step 4: Success -->
        <div class="form-step" id="form-step-4">
          <div class="verification-success">
            <div class="success-icon">🎉</div>
            <h2 style="margin-bottom: 1rem; color: var(--primary);">Verification Complete!</h2>
            <p style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.9;">
              Welcome to MyxenPay Student Rewards Program
            </p>
            
            <div class="benefits-list" style="text-align: left; max-width: 500px; margin: 2rem auto;">
              <h4 style="margin-bottom: 1rem; color: var(--primary);">You Now Have Access To:</h4>
              <div class="benefit-item">
                <div class="benefit-icon">💰</div>
                <div>5% cashback on all educational payments</div>
              </div>
              <div class="benefit-item">
                <div class="benefit-icon">🌍</div>
                <div>Global payment acceptance with QR codes</div>
              </div>
              <div class="benefit-item">
                <div class="benefit-icon">💳</div>
                <div>VISA virtual card for spending crypto anywhere</div>
              </div>
              <div class="benefit-item">
                <div class="benefit-icon">⚡</div>
                <div>Instant settlements on Solana blockchain</div>
              </div>
            </div>

            <div style="margin-top: 2rem;">
              <button class="btn btn-primary" onclick="goToDashboard()">
                Go to Student Dashboard
              </button>
            </div>
          </div>
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
            <li><a href="../merchants.php">For Businesses</a></li>
            <li><a href="../developers.php">Developers</a></li>
            <li><a href="../tokenomics.php">Tokenomics</a></li>
            <li><a href="../student-rewards.php">Student Rewards</a></li>
          </ul>
        </div>
        
        <div class="footer-section">
          <h3>Resources</h3>
          <ul class="footer-links">
            <li><a href="../whitepaper.php">Whitepaper</a></li>
            <li><a href="../documentation.html">Documentation</a></li>
            <li><a href="../help.html">Help Center</a></li>
            <li><a href="../blog.html">Blog</a></li>
          </ul>
        </div>
        
        <div class="footer-section">
          <h3>Company</h3>
          <ul class="footer-links">
            <li><a href="../about.html">About Us</a></li>
            <li><a href="../contact.html">Contact</a></li>
            <li><a href="../privacy.html">Privacy Policy</a></li>
            <li><a href="../terms.html">Terms of Service</a></li>
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
        document.getElementById('theme-logo').src = saved === 'dark' ? '../myxenpay-logo-dark.png' : '../myxenpay-logo-light.png';
        document.getElementById('theme-toggle').textContent = saved === 'dark' ? '🌙' : '☀️';
      } else if (prefersDark) {
        document.body.setAttribute('data-theme', 'dark');
        document.getElementById('theme-logo').src = '../myxenpay-logo-dark.png';
        document.getElementById('theme-toggle').textContent = '🌙';
      } else {
        document.body.setAttribute('data-theme', 'light');
        document.getElementById('theme-logo').src = '../myxenpay-logo-light.png';
        document.getElementById('theme-toggle').textContent = '☀️';
      }
    }

    document.getElementById('theme-toggle').addEventListener('click', () => {
      const current = document.body.getAttribute('data-theme');
      const newTheme = current === 'dark' ? 'light' : 'dark';
      document.body.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      document.getElementById('theme-logo').src = newTheme === 'dark' ? '../myxenpay-logo-dark.png' : '../myxenpay-logo-light.png';
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

    // Student Verification Functions
    let currentStep = 1;

    function nextStep(step) {
      // Validate current step before proceeding
      if (step === 2 && !validateStep1()) {
        return;
      }
      
      document.getElementById(`form-step-${currentStep}`).classList.remove('active');
      document.getElementById(`step-${currentStep}`).classList.remove('active');
      
      currentStep = step;
      
      document.getElementById(`form-step-${currentStep}`).classList.add('active');
      document.getElementById(`step-${currentStep}`).classList.add('active');
      
      // Special handling for step 2
      if (step === 2) {
        sendVerificationCode();
      }
    }

    function prevStep(step) {
      document.getElementById(`form-step-${currentStep}`).classList.remove('active');
      document.getElementById(`step-${currentStep}`).classList.remove('active');
      
      currentStep = step;
      
      document.getElementById(`form-step-${currentStep}`).classList.add('active');
      document.getElementById(`step-${currentStep}`).classList.add('active');
    }

    function validateStep1() {
      const fullName = document.getElementById('fullName').value;
      const email = document.getElementById('educationalEmail').value;
      const institution = document.getElementById('institution').value;
      
      if (!fullName || !email || !institution) {
        alert('Please fill in all required fields.');
        return false;
      }
      
      if (!email.includes('@')) {
        alert('Please enter a valid email address.');
        return false;
      }
      
      return true;
    }

    function sendVerificationCode() {
      const email = document.getElementById('educationalEmail').value;
      
      // Simulate sending verification code
      const submitBtn = document.querySelector('#form-step-2 .btn-primary');
      const originalText = submitBtn.textContent;
      submitBtn.innerHTML = '<div class="loading"></div>';
      submitBtn.disabled = true;
      
      setTimeout(() => {
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
        alert(`Verification code sent to ${email}. In a real implementation, this would send an actual email.`);
        
        // Start countdown for resend
        startCountdown();
      }, 2000);
    }

    function startCountdown() {
      const resendBtn = document.getElementById('resend-btn');
      const countdown = document.getElementById('countdown');
      const timer = document.getElementById('countdown-timer');
      
      resendBtn.disabled = true;
      countdown.style.display = 'block';
      
      let timeLeft = 60;
      const countdownInterval = setInterval(() => {
        timeLeft--;
        timer.textContent = timeLeft;
        
        if (timeLeft <= 0) {
          clearInterval(countdownInterval);
          resendBtn.disabled = false;
          countdown.style.display = 'none';
        }
      }, 1000);
    }

    function resendCode() {
      sendVerificationCode();
    }

    function verifyEmail() {
      const code = document.getElementById('verificationCode').value;
      
      if (!code || code.length !== 6) {
        alert('Please enter the 6-digit verification code.');
        return;
      }
      
      // Simulate email verification
      const verifyBtn = document.querySelector('#form-step-2 .btn-primary');
      const originalText = verifyBtn.textContent;
      verifyBtn.innerHTML = '<div class="loading"></div>';
      verifyBtn.disabled = true;
      
      setTimeout(() => {
        verifyBtn.textContent = originalText;
        verifyBtn.disabled = false;
        nextStep(3);
      }, 1500);
    }

    // File upload handling
    const fileInput = document.getElementById('studentIdFile');
    const fileUploadArea = document.getElementById('file-upload-area');
    const filePreview = document.getElementById('file-preview');
    const previewImage = document.getElementById('preview-image');
    const fileName = document.getElementById('file-name');

    fileUploadArea.addEventListener('click', () => {
      fileInput.click();
    });

    fileUploadArea.addEventListener('dragover', (e) => {
      e.preventDefault();
      fileUploadArea.classList.add('dragover');
    });

    fileUploadArea.addEventListener('dragleave', () => {
      fileUploadArea.classList.remove('dragover');
    });

    fileUploadArea.addEventListener('drop', (e) => {
      e.preventDefault();
      fileUploadArea.classList.remove('dragover');
      const files = e.dataTransfer.files;
      if (files.length > 0) {
        handleFile(files[0]);
      }
    });

    fileInput.addEventListener('change', (e) => {
      if (e.target.files.length > 0) {
        handleFile(e.target.files[0]);
      }
    });

    function handleFile(file) {
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = (e) => {
          previewImage.src = e.target.result;
          fileName.textContent = file.name;
          filePreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      } else if (file.type === 'application/pdf') {
        previewImage.style.display = 'none';
        fileName.textContent = file.name + ' (PDF)';
        filePreview.style.display = 'block';
      } else {
        alert('Please upload an image or PDF file.');
      }
    }

    function removeFile() {
      fileInput.value = '';
      filePreview.style.display = 'none';
    }

    function submitVerification() {
      if (!walletConnected) {
        alert('Please connect your wallet to complete verification.');
        connectWallet();
        return;
      }
      
      const submitBtn = document.getElementById('submit-btn');
      const originalText = submitBtn.textContent;
      submitBtn.innerHTML = '<div class="loading"></div>';
      submitBtn.disabled = true;
      
      // Simulate verification processing
      setTimeout(() => {
        nextStep(4);
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
        
        // In a real implementation, you would send the verification data to your backend
        const verificationData = {
          fullName: document.getElementById('fullName').value,
          email: document.getElementById('educationalEmail').value,
          institution: document.getElementById('institution').value,
          studentId: document.getElementById('studentId').value,
          walletAddress: walletAddress,
          timestamp: new Date().toISOString()
        };
        
        console.log('Verification data:', verificationData);
      }, 3000);
    }

    function goToDashboard() {
      window.location.href = '../student-dashboard.html';
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', initTheme);
  </script>
</body>
</html>