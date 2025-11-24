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
<title>Solana Payment System - MyxenPay</title>
<meta name="description" content="Fast, secure Solana payment system with instant settlements and low fees. Integrate crypto payments into your business.">
<meta property="og:title" content="Solana Payment System - MyxenPay">
<meta property="og:description" content="Fast, secure Solana payment system with instant settlements and low fees.">
<meta property="og:image" content="https://myxenpay.finance/og/og-solana-payments.jpg">
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

/* Hero Section */
.hero {
    padding: 12rem 1rem 6rem;
    text-align: center;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    color: white;
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
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
    background-size: cover;
}

.hero h1 {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    margin-bottom: 1.5rem;
    position: relative;
}

.hero p {
    font-size: 1.5rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto 2rem;
    position: relative;
}

/* Features Grid */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 4rem 0;
}

.feature-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 3rem 2rem;
    text-align: center;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-10px);
    border-color: var(--primary);
}

.feature-icon {
    font-size: 3rem;
    margin-bottom: 1.5rem;
    display: block;
}

.feature-card h3 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: var(--primary);
}

.feature-card p {
    opacity: 0.8;
    line-height: 1.6;
}

/* Benefits Section */
.benefits {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 4rem 2rem;
    margin: 4rem 0;
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
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
    transform: translateX(10px);
    border-color: var(--primary);
}

.benefit-icon {
    font-size: 1.5rem;
    margin-top: 0.25rem;
}

.benefit-content h4 {
    margin-bottom: 0.5rem;
    color: var(--primary);
}

/* Integration Steps */
.integration-steps {
    margin: 6rem 0;
}

.steps-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.step-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 2.5rem 2rem;
    text-align: center;
    position: relative;
}

.step-number {
    position: absolute;
    top: -1rem;
    left: 50%;
    transform: translateX(-50%);
    background: var(--primary);
    color: white;
    width: 3rem;
    height: 3rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.2rem;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    color: white;
    padding: 6rem 2rem;
    text-align: center;
    border-radius: 20px;
    margin: 6rem 0;
}

.cta-section h2 {
    font-size: clamp(2rem, 4vw, 3rem);
    margin-bottom: 1.5rem;
}

.cta-section p {
    font-size: 1.25rem;
    opacity: 0.9;
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
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

.btn-white {
    background: white;
    color: var(--primary);
}

.btn-white:hover {
    background: var(--secondary);
    color: white;
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

    .features-grid,
    .benefits-grid,
    .steps-grid {
        grid-template-columns: 1fr;
    }
    
    .hero {
        padding: 10rem 1rem 4rem;
    }
    
    .hero h1 {
        font-size: 2rem;
    }
    
    .hero p {
        font-size: 1.2rem;
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

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1>Solana Payment System</h1>
        <p>Lightning-fast crypto payments with instant settlements and near-zero fees</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-top: 2rem;">
            <button class="btn btn-white" onclick="location.href='merchants.php'">Start Accepting Payments</button>
            <button class="btn btn-secondary" style="background: transparent; color: white; border: 2px solid white;" onclick="location.href='developers.php'">Developer Docs</button>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section">
    <div class="container">
        <div style="text-align: center; margin-bottom: 4rem;">
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 1rem;">Why Choose Solana Payments?</h2>
            <p style="font-size: 1.25rem; opacity: 0.8; max-width: 600px; margin: 0 auto;">Built for speed, scale, and security</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <span class="feature-icon">⚡</span>
                <h3>Lightning Fast</h3>
                <p>Process 65,000+ transactions per second with 400ms block times. No more waiting for confirmations.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">💸</span>
                <h3>Near-Zero Fees</h3>
                <p>Average transaction fees of $0.00025. Accept micro-payments without worrying about gas costs.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🔒</span>
                <h3>Enterprise Security</h3>
                <p>Military-grade encryption and decentralized architecture ensure your funds are always safe.</p>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="section">
    <div class="container">
        <div class="benefits">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: clamp(1.75rem, 3vw, 2.5rem); margin-bottom: 1rem;">Business Benefits</h2>
                <p style="font-size: 1.125rem; opacity: 0.8;">Transform your payment infrastructure with Solana</p>
            </div>

            <div class="benefits-grid">
                <div class="benefit-item">
                    <span class="benefit-icon">💰</span>
                    <div class="benefit-content">
                        <h4>Lower Costs</h4>
                        <p>Save 60-80% on payment processing fees compared to traditional payment processors.</p>
                    </div>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">🌍</span>
                    <div class="benefit-content">
                        <h4>Global Reach</h4>
                        <p>Accept payments from anywhere in the world without currency conversion fees.</p>
                    </div>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">⚡</span>
                    <div class="benefit-content">
                        <h4>Instant Settlements</h4>
                        <p>Receive funds instantly instead of waiting days for bank transfers to clear.</p>
                    </div>
                </div>
                <div class="benefit-item">
                    <span class="benefit-icon">🛡️</span>
                    <div class="benefit-content">
                        <h4>Chargeback Protection</h4>
                        <p>Blockchain transactions are irreversible, eliminating fraudulent chargebacks.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Integration Steps -->
<section class="section">
    <div class="container">
        <div class="integration-steps">
            <div style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: clamp(1.75rem, 3vw, 2.5rem); margin-bottom: 1rem;">Easy Integration</h2>
                <p style="font-size: 1.125rem; opacity: 0.8;">Get started in just 4 simple steps</p>
            </div>

            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3>Create Account</h3>
                    <p>Sign up for a merchant account and complete verification</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3>Get API Keys</h3>
                    <p>Generate your unique API keys from the dashboard</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3>Integrate</h3>
                    <p>Add our payment widget or use our REST API</p>
                </div>
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h3>Go Live</h3>
                    <p>Start accepting Solana payments instantly</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section">
    <div class="container">
        <div class="cta-section">
            <h2>Ready to Transform Your Payments?</h2>
            <p>Join thousands of businesses already using MyxenPay's Solana payment system</p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <button class="btn btn-white" onclick="location.href='merchant-dashboard.php'">Get Started Now</button>
                <button class="btn" style="background: transparent; color: white; border: 2px solid white;" onclick="location.href='contact.php'">Contact Sales</button>
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

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    initTheme();
});
</script>
</body>
</html>