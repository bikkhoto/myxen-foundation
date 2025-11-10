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
<title>Blog - MyxenPay</title>
<meta name="description" content="Latest news, updates, and insights about crypto payments, blockchain technology, and MyxenPay developments.">
<meta property="og:title" content="Blog - MyxenPay">
<meta property="og:description" content="Latest news and insights about crypto payments and blockchain technology.">
<meta property="og:image" content="https://myxenpay.finance/og/og-blog.jpg">
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

/* Blog-specific styles */
.blog-hero {
    padding: 8rem 1rem 4rem;
    text-align: center;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.blog-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
    background-size: cover;
}

.blog-hero h1 {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 700;
    margin-bottom: 1rem;
    position: relative;
}

.blog-hero p {
    font-size: 1.25rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
    position: relative;
}

.blog-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.blog-layout {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 3rem;
    margin: 2rem 0;
}

/* Blog Posts */
.blog-posts {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.blog-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 2rem;
    transition: all 0.3s ease;
}

.blog-card:hover {
    transform: translateY(-5px);
    border-color: var(--primary);
}

.blog-card.featured {
    grid-column: 1 / -1;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    color: white;
}

.blog-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 0.9rem;
    opacity: 0.8;
}

.blog-category {
    background: var(--primary);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.blog-card h2 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: var(--text);
}

.blog-card.featured h2 {
    color: white;
}

.blog-card p {
    opacity: 0.8;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.blog-card.featured p {
    opacity: 0.9;
}

.read-more {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.blog-card.featured .read-more {
    color: white;
}

.read-more:hover {
    gap: 0.75rem;
}

/* Sidebar */
.blog-sidebar {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.sidebar-widget {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 2rem;
}

.sidebar-widget h3 {
    color: var(--primary);
    margin-bottom: 1.5rem;
    font-size: 1.25rem;
}

.categories-list, .recent-posts {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.categories-list a, .recent-posts a {
    color: var(--text);
    text-decoration: none;
    transition: all 0.3s ease;
    padding: 0.5rem 0;
    border-bottom: 1px solid var(--border);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.categories-list a:hover, .recent-posts a:hover {
    color: var(--primary);
    transform: translateX(5px);
}

.category-count, .post-date {
    font-size: 0.8rem;
    opacity: 0.6;
}

/* Newsletter */
.newsletter-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.newsletter-input {
    padding: 1rem 1.25rem;
    border: 1px solid var(--border);
    border-radius: 12px;
    background: var(--bg);
    color: var(--text);
    font-size: 1rem;
    transition: all 0.3s ease;
}

.newsletter-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
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
    .blog-layout {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .blog-sidebar {
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

    .blog-hero {
        padding: 7rem 1rem 3rem;
    }
    
    .blog-hero h1 {
        font-size: 2rem;
    }
    
    .blog-card {
        padding: 1.5rem;
    }
    
    .blog-card h2 {
        font-size: 1.25rem;
    }
    
    .sidebar-widget {
        padding: 1.5rem;
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
            <a href="blog.php" class="active">Blog</a>
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
    <a href="blog.php" class="active">Blog</a>
</nav>

<!-- Blog Hero -->
<section class="blog-hero">
    <div class="container">
        <h1>MyxenPay Blog</h1>
        <p>Latest news, updates, and insights about crypto payments and blockchain technology</p>
    </div>
</section>

<!-- Blog Content -->
<section class="section">
    <div class="blog-container">
        <div class="blog-layout">
            <!-- Main Content -->
            <main class="blog-posts">
                <!-- Featured Post -->
                <article class="blog-card featured">
                    <div class="blog-meta">
                        <span class="blog-category">Featured</span>
                        <span>January 15, 2024</span>
                        <span>5 min read</span>
                    </div>
                    <h2>The Future of Crypto Payments in E-commerce</h2>
                    <p>Explore how cryptocurrency payments are revolutionizing online shopping, reducing fees, and providing global access to digital commerce. Learn why businesses are adopting crypto payments and what it means for the future of e-commerce.</p>
                    <a href="#" class="read-more">
                        Read Full Article
                        <span>→</span>
                    </a>
                </article>

                <!-- Regular Posts -->
                <article class="blog-card">
                    <div class="blog-meta">
                        <span class="blog-category">Technology</span>
                        <span>January 12, 2024</span>
                        <span>4 min read</span>
                    </div>
                    <h2>Solana vs Ethereum: Which is Better for Payments?</h2>
                    <p>Comparing transaction speeds, fees, and scalability of Solana and Ethereum for payment processing. Understand the technical differences and practical implications for merchants and developers.</p>
                    <a href="#" class="read-more">
                        Read More
                        <span>→</span>
                    </a>
                </article>

                <article class="blog-card">
                    <div class="blog-meta">
                        <span class="blog-category">Business</span>
                        <span>January 10, 2024</span>
                        <span>6 min read</span>
                    </div>
                    <h2>How to Integrate Crypto Payments in Your Online Store</h2>
                    <p>A step-by-step guide for merchants looking to accept cryptocurrency payments. Learn about API integration, security considerations, and best practices for implementation.</p>
                    <a href="#" class="read-more">
                        Read More
                        <span>→</span>
                    </a>
                </article>

                <article class="blog-card">
                    <div class="blog-meta">
                        <span class="blog-category">Education</span>
                        <span>January 8, 2024</span>
                        <span>3 min read</span>
                    </div>
                    <h2>Understanding Token Burns and Their Impact on Value</h2>
                    <p>Demystifying the concept of token burning in cryptocurrency projects. Learn how revenue burns work and why they're important for long-term token value and ecosystem health.</p>
                    <a href="#" class="read-more">
                        Read More
                        <span>→</span>
                    </a>
                </article>
            </main>

            <!-- Sidebar -->
            <aside class="blog-sidebar">
                <!-- About Widget -->
                <div class="sidebar-widget">
                    <h3>About Our Blog</h3>
                    <p>Stay updated with the latest developments in crypto payments, blockchain technology, and MyxenPay platform updates.</p>
                </div>

                <!-- Categories Widget -->
                <div class="sidebar-widget">
                    <h3>Categories</h3>
                    <ul class="categories-list">
                        <li><a href="#">Technology <span class="category-count">12</span></a></li>
                        <li><a href="#">Business <span class="category-count">8</span></a></li>
                        <li><a href="#">Education <span class="category-count">15</span></a></li>
                        <li><a href="#">Updates <span class="category-count">6</span></a></li>
                        <li><a href="#">Tutorials <span class="category-count">9</span></a></li>
                    </ul>
                </div>

                <!-- Recent Posts Widget -->
                <div class="sidebar-widget">
                    <h3>Recent Posts</h3>
                    <ul class="recent-posts">
                        <li><a href="#">The Future of Crypto Payments in E-commerce <span class="post-date">Jan 15</span></a></li>
                        <li><a href="#">Solana vs Ethereum: Payment Comparison <span class="post-date">Jan 12</span></a></li>
                        <li><a href="#">Integrating Crypto Payments Guide <span class="post-date">Jan 10</span></a></li>
                        <li><a href="#">Understanding Token Burns <span class="post-date">Jan 8</span></a></li>
                        <li><a href="#">Student Crypto Adoption Trends <span class="post-date">Jan 5</span></a></li>
                    </ul>
                </div>

                <!-- Newsletter Widget -->
                <div class="sidebar-widget">
                    <h3>Newsletter</h3>
                    <p>Get the latest updates delivered to your inbox.</p>
                    <form class="newsletter-form">
                        <input type="email" class="newsletter-input" placeholder="Enter your email" required>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
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
                    <li><a href="blog.php" class="active">Blog</a></li>
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

// Newsletter Form
document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = this.querySelector('.newsletter-input').value;
    alert('Thank you for subscribing to our newsletter!');
    this.reset();
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