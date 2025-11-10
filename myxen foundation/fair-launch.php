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
<title>Fair Launch - MyxenPay</title>
<meta name="description" content="MyxenPay Fair Launch: No presale, no team allocation. Community-first token distribution on Pump.fun.">
<meta property="og:title" content="Fair Launch - MyxenPay">
<meta property="og:description" content="True fair launch on Pump.fun with equal opportunity for all participants.">
<meta property="og:image" content="https://myxenpay.finance/og/og-fair-launch.jpg">
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

/* Fair Launch specific styles */
.fair-launch-hero {
    padding: 8rem 1rem 4rem;
    text-align: center;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.fair-launch-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
    background-size: cover;
}

.fair-launch-hero h1 {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    margin-bottom: 1rem;
    position: relative;
}

.fair-launch-hero p {
    font-size: 1.25rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
    position: relative;
}

.launch-features {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 3rem 0;
}

.launch-feature {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 2.5rem 2rem;
    text-align: center;
    transition: all 0.3s ease;
}

.launch-feature:hover {
    transform: translateY(-8px);
    border-color: var(--primary);
}

.feature-icon {
    font-size: 3rem;
    margin-bottom: 1.5rem;
    display: block;
}

.feature-title {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: var(--primary);
    font-weight: 600;
}

.feature-description {
    opacity: 0.8;
    line-height: 1.6;
}

.launch-timeline {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 3rem;
    margin: 3rem 0;
}

.timeline-item {
    display: flex;
    gap: 2rem;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--border);
}

.timeline-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.timeline-marker {
    width: 60px;
    height: 60px;
    background: var(--primary);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.25rem;
    flex-shrink: 0;
}

.timeline-content h3 {
    color: var(--primary);
    margin-bottom: 0.5rem;
    font-size: 1.25rem;
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

    .launch-features {
        grid-template-columns: 1fr;
    }

    .timeline-item {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
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
            <a href="fair-launch.php" class="active">Fair Launch</a>
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
    <a href="fair-launch.php" class="active">Fair Launch</a>
</nav>

<!-- Fair Launch Hero -->
<section class="fair-launch-hero">
    <div class="container">
        <h1>Fair Launch</h1>
        <p>True community-first token distribution with no presale, no team allocation, and equal opportunity for all</p>
    </div>
</section>

<!-- Fair Launch Content -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">What Makes Our Launch Fair?</h2>
            <p class="section-subtitle">Transparent, community-driven token distribution with no advantages for insiders</p>
        </div>

        <div class="launch-features">
            <div class="launch-feature">
                <div class="feature-icon">🚫</div>
                <h3 class="feature-title">No Presale</h3>
                <p class="feature-description">Zero private sales or pre-mining. Everyone gets the same starting price and conditions.</p>
            </div>

            <div class="launch-feature">
                <div class="feature-icon">⚖️</div>
                <h3 class="feature-title">Equal Opportunity</h3>
                <p class="feature-description">No whitelists, no preferential treatment. All participants have equal access at launch.</p>
            </div>

            <div class="launch-feature">
                <div class="feature-icon">🔍</div>
                <h3 class="feature-title">Full Transparency</h3>
                <p class="feature-description">Complete visibility into token distribution and launch mechanics from day one.</p>
            </div>
        </div>

        <!-- Launch Timeline -->
        <div class="launch-timeline">
            <h2 style="color: var(--primary); margin-bottom: 2rem; text-align: center;">Launch Timeline</h2>
            
            <div class="timeline-item">
                <div class="timeline-marker">1</div>
                <div class="timeline-content">
                    <h3>Pump.fun Launch</h3>
                    <p>Initial launch on Pump.fun with bonding curve mechanics. This ensures fair price discovery and prevents whale manipulation.</p>
                    <ul style="margin-top: 1rem; opacity: 0.8;">
                        <li>Initial Market Cap: $50,000</li>
                        <li>Bonding Curve: Standard Pump.fun mechanics</li>
                        <li>Equal access for all participants</li>
                    </ul>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">2</div>
                <div class="timeline-content">
                    <h3>Raydium Listing</h3>
                    <p>Automatic migration to Raydium once the bonding curve completes. Liquidity is locked to ensure price stability.</p>
                    <ul style="margin-top: 1rem; opacity: 0.8;">
                        <li>Automatic liquidity migration</li>
                        <li>LP tokens locked for 6 months</li>
                        <li>Continuous trading on DEX</li>
                    </ul>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-marker">3</div>
                <div class="timeline-content">
                    <h3>Community Growth</h3>
                    <p>Post-launch community building and platform development. Real utility drives organic growth and adoption.</p>
                    <ul style="margin-top: 1rem; opacity: 0.8;">
                        <li>Platform feature releases</li>
                        <li>Community governance activation</li>
                        <li>Ecosystem expansion</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Token Distribution -->
<div class="section-header" style="margin-top: 4rem;">
    <h2 class="section-title">Fair Distribution</h2>
    <p class="section-subtitle">Transparent token allocation that benefits the entire ecosystem</p>
</div>

<div class="launch-features">
    <div class="launch-feature">
        <div class="feature-icon">💰</div>
        <h3 class="feature-title">50% Liquidity</h3>
        <p class="feature-description">500M $MYXEN allocated to liquidity pools to ensure stable trading and price discovery.</p>
    </div>

    <div class="launch-feature">
        <div class="feature-icon">🛠️</div>
        <h3 class="feature-title">5% Development</h3>
        <p class="feature-description">50M $MYXEN for ongoing development, team compensation, and ecosystem growth.</p>
    </div>

    <div class="launch-feature">
        <div class="feature-icon">🎯</div>
        <h3 class="feature-title">15% Marketing & Community</h3>
        <p class="feature-description">150M $MYXEN reserved for community rewards, airdrops, and ecosystem incentives.</p>
    </div>

    <div class="launch-feature">
        <div class="feature-icon">🔥</div>
        <h3 class="feature-title">30% Buyback & Burn</h3>
        <p class="feature-description">300M $MYXEN dedicated to progressive buyback and burn based on market cap milestones.</p>
    </div>
</div>

<!-- Add Progressive Burn Section -->
<div class="launch-timeline" style="margin-top: 3rem;">
    <h2 style="color: var(--primary); margin-bottom: 2rem; text-align: center;">Progressive Burn Mechanism</h2>
    
    <div class="timeline-item">
        <div class="timeline-marker">🔥</div>
        <div class="timeline-content">
            <h3>Market Cap Driven Burns</h3>
            <p>Automatic token burns triggered by market cap growth milestones to create deflationary pressure.</p>
            <ul style="margin-top: 1rem; opacity: 0.8;">
                <li><strong>1% burn per $1M</strong> market cap increase</li>
                <li><strong>Full 30% burn</strong> at $30M market cap sustained for 24 hours</li>
                <li><strong>Final supply:</strong> 700M $MYXEN after all burns</li>
            </ul>
        </div>
    </div>

    <div class="timeline-item">
        <div class="timeline-marker">📈</div>
        <div class="timeline-content">
            <h3>Burn Schedule</h3>
            <p>Progressive burns occur as market cap milestones are reached and sustained.</p>
            <ul style="margin-top: 1rem; opacity: 0.8;">
                <li>$1M Market Cap: 10M $MYXEN burned (1%)</li>
                <li>$5M Market Cap: 50M $MYXEN burned (5%)</li>
                <li>$10M Market Cap: 100M $MYXEN burned (10%)</li>
                <li>$20M Market Cap: 200M $MYXEN burned (20%)</li>
                <li>$30M Market Cap: 300M $MYXEN burned (30%)</li>
            </ul>
        </div>
    </div>
</div>

        <!-- Call to Action -->
        <div style="text-align: center; margin-top: 4rem; padding: 3rem; background: var(--glass-bg); border-radius: 20px;">
            <h2 style="color: var(--primary); margin-bottom: 1rem;">Ready to Participate?</h2>
            <p style="opacity: 0.8; margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                Join our community and be part of a truly fair launch that puts users first.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <button class="btn btn-primary" onclick="connectWallet()">
                    Connect Wallet
                </button>
                <a href="tokenomics.php" class="btn" style="background: transparent; border: 2px solid var(--primary); color: var(--primary);">
                    View Tokenomics
                </a>
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
                    <li><a href="documentation.php">Documentation</a></li>
                    <li><a href="help.php">Help Center</a></li>
                    <li><a href="blog.php">Blog</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Company</h3>
                <ul class="footer-links">
                    <li><a href="about.php">About Us</a></li>
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
document.addEventListener('DOMContentLoaded', initTheme);
</script>
</body>
</html>