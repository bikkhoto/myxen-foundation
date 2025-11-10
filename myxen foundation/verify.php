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
<title>Account Verification - MyxenPay</title>
<meta name="description" content="Verify your MyxenPay account to unlock full platform features and higher transaction limits.">
<meta property="og:title" content="Account Verification - MyxenPay">
<meta property="og:description" content="Verify your MyxenPay account to unlock full platform features.">
<meta property="og:image" content="https://myxenpay.finance/og/og-verification.jpg">
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

/* Verification-specific styles */
.verify-hero {
    padding: 8rem 1rem 4rem;
    text-align: center;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.verify-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
    background-size: cover;
}

.verify-hero h1 {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 700;
    margin-bottom: 1rem;
    position: relative;
}

.verify-hero p {
    font-size: 1.25rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
    position: relative;
}

.verify-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.verify-content {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 3rem;
    margin: 2rem 0;
}

/* Verification Steps */
.verification-steps {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 2rem;
}

.step-indicator {
    display: flex;
    justify-content: space-between;
    margin-bottom: 3rem;
    position: relative;
}

.step-indicator::before {
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
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 2;
}

.step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--border);
    color: var(--text);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    margin-bottom: 0.5rem;
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
    text-align: center;
}

/* Verification Form */
.verification-form {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.form-section {
    background: var(--card-bg);
    border-radius: 16px;
    padding: 2rem;
    border: 1px solid var(--glass-border);
}

.form-section h3 {
    color: var(--primary);
    margin-bottom: 1.5rem;
    font-size: 1.25rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: var(--text);
    font-size: 0.95rem;
}

.form-input,
.form-select,
.form-textarea {
    padding: 1rem 1.25rem;
    border: 1px solid var(--border);
    border-radius: 12px;
    background: var(--bg);
    color: var(--text);
    font-size: 1rem;
    transition: all 0.3s ease;
    font-family: inherit;
    width: 100%;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
}

.form-textarea {
    resize: vertical;
    min-height: 100px;
}

.file-upload {
    border: 2px dashed var(--border);
    border-radius: 12px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
}

.file-upload:hover {
    border-color: var(--primary);
}

.file-upload input {
    display: none;
}

.file-upload-icon {
    font-size: 2rem;
    margin-bottom: 1rem;
    display: block;
}

.file-upload-text {
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.file-upload-hint {
    font-size: 0.9rem;
    opacity: 0.7;
}

.file-preview {
    margin-top: 1rem;
    padding: 1rem;
    background: var(--bg);
    border-radius: 8px;
    border: 1px solid var(--border);
}

/* Verification Benefits */
.verification-benefits {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 2rem;
    height: fit-content;
    position: sticky;
    top: 120px;
}

.benefits-list {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.benefit-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.5rem;
    background: var(--card-bg);
    border-radius: 12px;
    transition: all 0.3s ease;
}

.benefit-item:hover {
    transform: translateX(5px);
    border-color: var(--primary);
}

.benefit-icon {
    font-size: 1.5rem;
    margin-top: 0.25rem;
    flex-shrink: 0;
}

.benefit-content h4 {
    margin-bottom: 0.5rem;
    color: var(--primary);
}

.benefit-content p {
    opacity: 0.8;
    font-size: 0.9rem;
    line-height: 1.5;
}

/* Progress Bar */
.progress-container {
    margin: 2rem 0;
}

.progress-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}

.progress-label {
    font-weight: 600;
    color: var(--text);
}

.progress-percentage {
    font-weight: 600;
    color: var(--primary);
}

.progress-bar {
    height: 8px;
    background: var(--border);
    border-radius: 4px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--primary), var(--secondary));
    border-radius: 4px;
    transition: width 0.3s ease;
}

/* Status Messages */
.status-message {
    padding: 1rem 1.5rem;
    border-radius: 12px;
    margin: 1rem 0;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.status-success {
    background: rgba(48, 209, 88, 0.1);
    border: 1px solid var(--secondary);
    color: var(--secondary);
}

.status-warning {
    background: rgba(255, 159, 10, 0.1);
    border: 1px solid var(--accent);
    color: var(--accent);
}

.status-info {
    background: rgba(0, 122, 255, 0.1);
    border: 1px solid var(--primary);
    color: var(--primary);
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
    font-size: 1rem;
}

.btn-primary {
    background: var(--primary);
    color: white;
}

.btn-primary:hover {
    background: var(--secondary);
    transform: translateY(-2px);
}

.btn-secondary {
    background: transparent;
    color: var(--primary);
    border: 2px solid var(--primary);
}

.btn-secondary:hover {
    background: var(--primary);
    color: white;
}

.btn-full {
    width: 100%;
    justify-content: center;
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

@media (max-width: 1024px) {
    .verify-content {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .verification-benefits {
        position: static;
        order: -1;
    }
}

@media (max-width: 767px) {
    .mobile-nav-toggle {
        display: flex;
    }

    .desktop-nav {
        display: none;
    }

    .verify-hero {
        padding: 7rem 1rem 3rem;
    }
    
    .verify-hero h1 {
        font-size: 2rem;
    }
    
    .step-indicator {
        flex-direction: column;
        gap: 2rem;
        align-items: flex-start;
    }
    
    .step-indicator::before {
        display: none;
    }
    
    .step {
        flex-direction: row;
        gap: 1rem;
    }
    
    .form-section {
        padding: 1.5rem;
    }
    
    .benefit-item {
        padding: 1rem;
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
            <a href="merchants.php">For Businesses</a>
            <a href="merchant-dashboard.php">Dashboard</a>
        </nav>

        <div class="header-actions">
            <button id="theme-toggle" class="theme-btn">🌙</button>
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
    <a href="merchants.php">For Businesses</a>
    <a href="merchant-dashboard.php">Dashboard</a>
</nav>

<!-- Verification Hero -->
<section class="verify-hero">
    <div class="container">
        <h1>Account Verification</h1>
        <p>Complete your verification to unlock full platform features and higher transaction limits</p>
    </div>
</section>

<!-- Verification Content -->
<section class="section">
    <div class="verify-container">
        <div class="verify-content">
            <!-- Main Verification Form -->
            <div class="verification-steps">
                <!-- Progress Indicator -->
                <div class="step-indicator">
                    <div class="step active">
                        <div class="step-number">1</div>
                        <div class="step-label">Basic Info</div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-label">Identity</div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-label">Review</div>
                    </div>
                    <div class="step">
                        <div class="step-number">4</div>
                        <div class="step-label">Complete</div>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="progress-container">
                    <div class="progress-header">
                        <span class="progress-label">Verification Progress</span>
                        <span class="progress-percentage">25%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: 25%"></div>
                    </div>
                </div>

                <!-- Status Message -->
                <div class="status-message status-info">
                    <span>🔍</span>
                    <div>
                        <strong>Verification Required</strong>
                        <p>Complete all steps to unlock full account features</p>
                    </div>
                </div>

                <!-- Verification Form -->
                <form class="verification-form" id="verificationForm">
                    <!-- Step 1: Basic Information -->
                    <div class="form-section">
                        <h3>Basic Information</h3>
                        
                        <div class="form-group">
                            <label class="form-label" for="fullName">Full Legal Name</label>
                            <input type="text" id="fullName" class="form-input" placeholder="Enter your full legal name" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Email Address</label>
                            <input type="email" id="email" class="form-input" placeholder="your@email.com" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input type="tel" id="phone" class="form-input" placeholder="+1 (555) 123-4567" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="dob">Date of Birth</label>
                            <input type="date" id="dob" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="country">Country of Residence</label>
                            <select id="country" class="form-select" required>
                                <option value="">Select your country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="GB">United Kingdom</option>
                                <option value="AU">Australia</option>
                                <option value="DE">Germany</option>
                                <option value="FR">France</option>
                                <option value="JP">Japan</option>
                                <option value="SG">Singapore</option>
                            </select>
                        </div>
                    </div>

                    <!-- Step 2: Identity Verification -->
                    <div class="form-section">
                        <h3>Identity Verification</h3>
                        
                        <div class="form-group">
                            <label class="form-label" for="idType">ID Document Type</label>
                            <select id="idType" class="form-select" required>
                                <option value="">Select document type</option>
                                <option value="passport">Passport</option>
                                <option value="drivers_license">Driver's License</option>
                                <option value="national_id">National ID Card</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="idNumber">ID Document Number</label>
                            <input type="text" id="idNumber" class="form-input" placeholder="Enter your document number" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Upload ID Document (Front)</label>
                            <div class="file-upload" onclick="document.getElementById('idFront').click()">
                                <input type="file" id="idFront" accept="image/*,.pdf">
                                <span class="file-upload-icon">📄</span>
                                <div class="file-upload-text">Click to upload document</div>
                                <div class="file-upload-hint">Supported: JPG, PNG, PDF (Max 5MB)</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Upload ID Document (Back)</label>
                            <div class="file-upload" onclick="document.getElementById('idBack').click()">
                                <input type="file" id="idBack" accept="image/*,.pdf">
                                <span class="file-upload-icon">📄</span>
                                <div class="file-upload-text">Click to upload document</div>
                                <div class="file-upload-hint">Required for driver's license and ID cards</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Selfie with ID Document</label>
                            <div class="file-upload" onclick="document.getElementById('selfie').click()">
                                <input type="file" id="selfie" accept="image/*" capture="user">
                                <span class="file-upload-icon">📸</span>
                                <div class="file-upload-text">Take a selfie with your ID</div>
                                <div class="file-upload-hint">Hold your ID next to your face</div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Additional Information -->
                    <div class="form-section">
                        <h3>Additional Information</h3>
                        
                        <div class="form-group">
                            <label class="form-label" for="address">Residential Address</label>
                            <input type="text" id="address" class="form-input" placeholder="Street address" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="city">City</label>
                            <input type="text" id="city" class="form-input" placeholder="City" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="state">State/Province</label>
                            <input type="text" id="state" class="form-input" placeholder="State or Province" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="zipCode">ZIP/Postal Code</label>
                            <input type="text" id="zipCode" class="form-input" placeholder="ZIP or Postal code" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="sourceOfFunds">Source of Funds</label>
                            <select id="sourceOfFunds" class="form-select" required>
                                <option value="">Select source of funds</option>
                                <option value="employment">Employment Income</option>
                                <option value="business">Business Income</option>
                                <option value="investments">Investment Returns</option>
                                <option value="savings">Personal Savings</option>
                                <option value="inheritance">Inheritance</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="purpose">Purpose of Account</label>
                            <select id="purpose" class="form-select" required>
                                <option value="">Select primary purpose</option>
                                <option value="personal">Personal Use</option>
                                <option value="business">Business Transactions</option>
                                <option value="trading">Crypto Trading</option>
                                <option value="investment">Long-term Investment</option>
                                <option value="remittance">International Remittance</option>
                            </select>
                        </div>
                    </div>

                    <!-- Terms and Submission -->
                    <div class="form-section">
                        <div class="form-group">
                            <label class="form-label" style="display: flex; align-items: flex-start; gap: 0.75rem;">
                                <input type="checkbox" required style="margin-top: 0.25rem;">
                                <span>
                                    I certify that all information provided is true and accurate. I understand that providing false information may result in account suspension or termination.
                                </span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="form-label" style="display: flex; align-items: flex-start; gap: 0.75rem;">
                                <input type="checkbox" required style="margin-top: 0.25rem;">
                                <span>
                                    I agree to the <a href="privacy.html" style="color: var(--primary);">Privacy Policy</a> and authorize MyxenPay to verify my identity through third-party services.
                                </span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-full">
                            <span>Submit Verification</span>
                            <span>→</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Benefits Sidebar -->
            <aside class="verification-benefits">
                <h3 style="color: var(--primary); margin-bottom: 2rem;">Verification Benefits</h3>
                
                <div class="benefits-list">
                    <div class="benefit-item">
                        <span class="benefit-icon">🚀</span>
                        <div class="benefit-content">
                            <h4>Higher Limits</h4>
                            <p>Increase your daily transaction limits from $1,000 to $10,000+</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <span class="benefit-icon">💳</span>
                        <div class="benefit-content">
                            <h4>Full Platform Access</h4>
                            <p>Unlock advanced features like API access and merchant tools</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <span class="benefit-icon">🌍</span>
                        <div class="benefit-content">
                            <h4>Global Payments</h4>
                            <p>Send and receive international payments without restrictions</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <span class="benefit-icon">🛡️</span>
                        <div class="benefit-content">
                            <h4>Enhanced Security</h4>
                            <p>Additional security features and fraud protection</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <span class="benefit-icon">⚡</span>
                        <div class="benefit-content">
                            <h4>Faster Processing</h4>
                            <p>Priority processing for withdrawals and customer support</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <span class="benefit-icon">🏦</span>
                        <div class="benefit-content">
                            <h4>Bank Integration</h4>
                            <p>Connect bank accounts for seamless fiat transactions</p>
                        </div>
                    </div>
                </div>

                <div class="status-message status-success" style="margin-top: 2rem;">
                    <span>✅</span>
                    <div>
                        <strong>Secure & Encrypted</strong>
                        <p>All documents are encrypted and stored securely</p>
                    </div>
                </div>
            </aside>
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
                    <li><a href="documentation.php">Documentation</a></li>
                    <li><a href="help.php">Help Center</a></li>
                    <li><a href="blog.php">Blog</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Company</h3>
                <ul class="footer-links">
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="privacy.html">Privacy Policy</a></li>
                    <li><a href="terms.html">Terms of Service</a></li>
                </ul>
            </div>
        </div>

        <div class="copyright">
            <p>&copy; 2024 MyXenPay. All rights reserved. Making crypto payments accessible for everyone.</p>
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
        document.getElementById('theme-toggle').textContent = saved === 'dark' ? '☀️' : '🌙';
    } else if (prefersDark) {
        document.body.setAttribute('data-theme', 'dark');
        document.getElementById('theme-logo').src = 'myxenpay-logo-dark.png';
        document.getElementById('theme-toggle').textContent = '☀️';
    } else {
        document.body.setAttribute('data-theme', 'light');
        document.getElementById('theme-logo').src = 'myxenpay-logo-light.png';
        document.getElementById('theme-toggle').textContent = '🌙';
    }
}

document.getElementById('theme-toggle').addEventListener('click', () => {
    const current = document.body.getAttribute('data-theme');
    const newTheme = current === 'dark' ? 'light' : 'dark';
    document.body.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    document.getElementById('theme-logo').src = newTheme === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
    document.getElementById('theme-toggle').textContent = newTheme === 'dark' ? '☀️' : '🌙';
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
    connectBtn.innerHTML = '<div style="width: 16px; height: 16px; border: 2px solid transparent; border-top: 2px solid white; border-radius: 50%; animation: spin 1s linear infinite;"></div>';
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

// File Upload Handling
document.querySelectorAll('input[type="file"]').forEach(input => {
    input.addEventListener('change', function(e) {
        const file = this.files[0];
        if (file) {
            const fileName = file.name;
            const fileSize = (file.size / 1024 / 1024).toFixed(2);
            
            // Create file preview
            const uploadArea = this.parentElement;
            let preview = uploadArea.querySelector('.file-preview');
            
            if (!preview) {
                preview = document.createElement('div');
                preview.className = 'file-preview';
                uploadArea.appendChild(preview);
            }
            
            preview.innerHTML = `
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <strong>${fileName}</strong>
                        <div style="font-size: 0.8rem; opacity: 0.7;">${fileSize} MB</div>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove()" style="background: none; border: none; font-size: 1.2rem; cursor: pointer; color: var(--text);">×</button>
                </div>
            `;
        }
    });
});

// Form Submission
document.getElementById('verificationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<div style="width: 20px; height: 20px; border: 2px solid transparent; border-top: 2px solid white; border-radius: 50%; animation: spin 1s linear infinite;"></div>';
    submitBtn.disabled = true;

    // Simulate API call
    setTimeout(() => {
        // Show success message
        const statusMessage = document.querySelector('.status-message');
        statusMessage.className = 'status-message status-success';
        statusMessage.innerHTML = `
            <span>✅</span>
            <div>
                <strong>Verification Submitted!</strong>
                <p>Your documents are under review. We'll notify you via email within 24 hours.</p>
            </div>
        `;

        // Update progress
        document.querySelector('.progress-percentage').textContent = '100%';
        document.querySelector('.progress-fill').style.width = '100%';

        // Update steps
        document.querySelectorAll('.step').forEach(step => {
            step.classList.remove('active');
            step.classList.add('completed');
        });

        // Reset button
        submitBtn.innerHTML = '<span>Verification Complete</span><span>✅</span>';
        
        alert('Verification submitted successfully! You will receive an email confirmation shortly.');
    }, 2000);
});

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    initTheme();
});

// Add CSS for loading animation
const style = document.createElement('style');
style.textContent = `
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
`;
document.head.appendChild(style);
</script>
</body>
</html>