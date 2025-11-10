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
<title>Documentation - MyxenPay</title>
<meta name="description" content="Complete documentation for MyxenPay API, integration guides, and developer resources.">
<meta property="og:title" content="Documentation - MyxenPay">
<meta property="og:description" content="Complete documentation for MyxenPay API and integration guides.">
<meta property="og:image" content="https://myxenpay.finance/og/og-documentation.jpg">
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

/* Documentation-specific styles */
.docs-hero {
    padding: 8rem 1rem 4rem;
    text-align: center;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.docs-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
    background-size: cover;
}

.docs-hero h1 {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 700;
    margin-bottom: 1rem;
    position: relative;
}

.docs-hero p {
    font-size: 1.25rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
    position: relative;
}

.docs-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.docs-layout {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 3rem;
    margin: 2rem 0;
}

/* Docs Sidebar */
.docs-sidebar {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 2rem;
    height: fit-content;
    position: sticky;
    top: 120px;
}

.docs-nav {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.docs-nav-section {
    margin-bottom: 1.5rem;
}

.docs-nav-section h3 {
    color: var(--primary);
    margin-bottom: 1rem;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.docs-nav-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border-radius: 12px;
    text-decoration: none;
    color: var(--text);
    transition: all 0.3s ease;
    opacity: 0.8;
    font-size: 0.9rem;
}

.docs-nav-item:hover,
.docs-nav-item.active {
    background: var(--primary);
    color: white;
    opacity: 1;
    transform: translateX(5px);
}

.docs-nav-icon {
    font-size: 1rem;
    width: 20px;
    text-align: center;
    flex-shrink: 0;
}

/* Docs Content */
.docs-content {
    display: flex;
    flex-direction: column;
    gap: 3rem;
}

.docs-section {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 3rem;
}

.docs-section h2 {
    color: var(--primary);
    margin-bottom: 2rem;
    font-size: 2rem;
    border-bottom: 2px solid var(--border);
    padding-bottom: 1rem;
}

.docs-section h3 {
    color: var(--primary);
    margin: 2rem 0 1rem;
    font-size: 1.5rem;
}

.docs-section h4 {
    color: var(--text);
    margin: 1.5rem 0 0.75rem;
    font-size: 1.25rem;
    opacity: 0.9;
}

.docs-section p {
    line-height: 1.7;
    margin-bottom: 1.5rem;
    opacity: 0.9;
}

.docs-section ul, .docs-section ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.docs-section li {
    margin-bottom: 0.75rem;
    line-height: 1.6;
    opacity: 0.9;
}

/* Code Blocks */
.code-block {
    background: rgba(0, 0, 0, 0.8);
    border-radius: 12px;
    padding: 1.5rem;
    margin: 1.5rem 0;
    overflow-x: auto;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.code-block pre {
    margin: 0;
    color: #f8f8f2;
    font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
    font-size: 0.9rem;
    line-height: 1.5;
}

.code-block code {
    color: #50fa7b;
}

.code-comment {
    color: #6272a4;
}

.code-keyword {
    color: #ff79c6;
}

.code-string {
    color: #f1fa8c;
}

.code-function {
    color: #50fa7b;
}

/* API Reference */
.api-endpoint {
    background: var(--card-bg);
    border-radius: 12px;
    padding: 1.5rem;
    margin: 1.5rem 0;
    border-left: 4px solid var(--primary);
}

.endpoint-method {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    background: var(--primary);
    color: white;
    border-radius: 6px;
    font-weight: 600;
    font-size: 0.8rem;
    margin-right: 0.75rem;
}

.endpoint-path {
    font-family: monospace;
    font-weight: 600;
    color: var(--primary);
}

.endpoint-description {
    margin: 1rem 0;
    opacity: 0.9;
}

.parameter-table {
    width: 100%;
    border-collapse: collapse;
    margin: 1rem 0;
    background: var(--bg);
    border-radius: 8px;
    overflow: hidden;
}

.parameter-table th,
.parameter-table td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid var(--border);
}

.parameter-table th {
    background: var(--primary);
    color: white;
    font-weight: 600;
    font-size: 0.9rem;
}

.parameter-table tr:last-child td {
    border-bottom: none;
}

/* Quick Start Cards */
.quick-start-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 2rem 0;
}

.quick-start-card {
    background: var(--card-bg);
    border-radius: 16px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    border: 1px solid var(--glass-border);
}

.quick-start-card:hover {
    transform: translateY(-5px);
    border-color: var(--primary);
}

.quick-start-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    display: block;
}

.quick-start-card h3 {
    color: var(--primary);
    margin-bottom: 1rem;
}

.quick-start-card p {
    margin-bottom: 1.5rem;
    opacity: 0.8;
}

/* Alert Boxes */
.alert {
    padding: 1.5rem;
    border-radius: 12px;
    margin: 1.5rem 0;
    border-left: 4px solid;
}

.alert-info {
    background: rgba(0, 122, 255, 0.1);
    border-color: var(--primary);
    color: var(--primary);
}

.alert-warning {
    background: rgba(255, 159, 10, 0.1);
    border-color: var(--accent);
    color: var(--accent);
}

.alert-success {
    background: rgba(48, 209, 88, 0.1);
    border-color: var(--secondary);
    color: var(--secondary);
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
    .docs-layout {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .docs-sidebar {
        position: static;
        order: 2;
    }
    
    .docs-content {
        order: 1;
    }
}

@media (max-width: 767px) {
    .mobile-nav-toggle {
        display: flex;
    }

    .desktop-nav {
        display: none;
    }

    .docs-hero {
        padding: 7rem 1rem 3rem;
    }
    
    .docs-hero h1 {
        font-size: 2rem;
    }
    
    .docs-section {
        padding: 2rem 1.5rem;
    }
    
    .docs-section h2 {
        font-size: 1.5rem;
    }
    
    .quick-start-grid {
        grid-template-columns: 1fr;
    }
    
    .code-block {
        padding: 1rem;
    }
    
    .parameter-table {
        font-size: 0.8rem;
    }
    
    .parameter-table th,
    .parameter-table td {
        padding: 0.75rem 0.5rem;
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
            <a href="documentation.php" class="active">Documentation</a>
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
    <a href="documentation.php" class="active">Documentation</a>
</nav>

<!-- Documentation Hero -->
<section class="docs-hero">
    <div class="container">
        <h1>MyxenPay Documentation</h1>
        <p>Complete guides and API reference for integrating MyxenPay into your applications</p>
    </div>
</section>

<!-- Documentation Content -->
<section class="section">
    <div class="docs-container">
        <div class="docs-layout">
            <!-- Sidebar Navigation -->
            <aside class="docs-sidebar">
                <nav class="docs-nav">
                    <div class="docs-nav-section">
                        <h3>Getting Started</h3>
                        <a href="#quick-start" class="docs-nav-item active">
                            <span class="docs-nav-icon">🚀</span>
                            <span>Quick Start</span>
                        </a>
                        <a href="#authentication" class="docs-nav-item">
                            <span class="docs-nav-icon">🔑</span>
                            <span>Authentication</span>
                        </a>
                        <a href="#installation" class="docs-nav-item">
                            <span class="docs-nav-icon">📦</span>
                            <span>Installation</span>
                        </a>
                    </div>

                    <div class="docs-nav-section">
                        <h3>API Reference</h3>
                        <a href="#payments-api" class="docs-nav-item">
                            <span class="docs-nav-icon">💳</span>
                            <span>Payments API</span>
                        </a>
                        <a href="#webhooks" class="docs-nav-item">
                            <span class="docs-nav-icon">🔔</span>
                            <span>Webhooks</span>
                        </a>
                        <a href="#qr-codes" class="docs-nav-item">
                            <span class="docs-nav-icon">📱</span>
                            <span>QR Codes</span>
                        </a>
                    </div>

                    <div class="docs-nav-section">
                        <h3>Guides</h3>
                        <a href="#ecommerce-integration" class="docs-nav-item">
                            <span class="docs-nav-icon">🛒</span>
                            <span>E-commerce Integration</span>
                        </a>
                        <a href="#mobile-apps" class="docs-nav-item">
                            <span class="docs-nav-icon">📱</span>
                            <span>Mobile Apps</span>
                        </a>
                        <a href="#security" class="docs-nav-item">
                            <span class="docs-nav-icon">🛡️</span>
                            <span>Security Best Practices</span>
                        </a>
                    </div>

                    <div class="docs-nav-section">
                        <h3>Resources</h3>
                        <a href="#sdks" class="docs-nav-item">
                            <span class="docs-nav-icon">⚙️</span>
                            <span>SDKs & Libraries</span>
                        </a>
                        <a href="#examples" class="docs-nav-item">
                            <span class="docs-nav-icon">💡</span>
                            <span>Code Examples</span>
                        </a>
                        <a href="#faq" class="docs-nav-item">
                            <span class="docs-nav-icon">❓</span>
                            <span>FAQ</span>
                        </a>
                    </div>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="docs-content">
                <!-- Quick Start Section -->
                <section id="quick-start" class="docs-section">
                    <h2>Quick Start Guide</h2>
                    <p>Get started with MyxenPay in just a few minutes. This guide will walk you through the basic integration steps.</p>

                    <div class="quick-start-grid">
                        <div class="quick-start-card">
                            <span class="quick-start-icon">🔑</span>
                            <h3>1. Get API Keys</h3>
                            <p>Create an account and generate your API keys from the merchant dashboard.</p>
                            <a href="merchant-dashboard.php" class="btn btn-secondary">Get API Keys</a>
                        </div>
                        <div class="quick-start-card">
                            <span class="quick-start-icon">📦</span>
                            <h3>2. Install SDK</h3>
                            <p>Install the MyxenPay SDK for your preferred programming language.</p>
                            <div class="code-block">
                                <pre><code>npm install @myxenpay/sdk</code></pre>
                            </div>
                        </div>
                        <div class="quick-start-card">
                            <span class="quick-start-icon">💻</span>
                            <h3>3. Make Your First Request</h3>
                            <p>Start accepting payments with just a few lines of code.</p>
                            <div class="code-block">
                                <pre><code>const payment = await myxenpay.createPayment({
  amount: 100,
  currency: 'USD'
});</code></pre>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <strong>Pro Tip:</strong> Test your integration using our sandbox environment before going live.
                    </div>
                </section>

                <!-- Authentication Section -->
                <section id="authentication" class="docs-section">
                    <h2>Authentication</h2>
                    <p>MyxenPay uses API keys to authenticate requests. You can manage your API keys from the merchant dashboard.</p>

                    <h3>API Key Usage</h3>
                    <p>Include your API key in the Authorization header of all requests:</p>

                    <div class="code-block">
                        <pre><code>Authorization: Bearer sk_live_your_api_key_here</code></pre>
                    </div>

                    <div class="alert alert-warning">
                        <strong>Important:</strong> Never expose your secret API keys in client-side code. Always keep them secure on your server.
                    </div>

                    <h3>Key Types</h3>
                    <table class="parameter-table">
                        <thead>
                            <tr>
                                <th>Key Type</th>
                                <th>Prefix</th>
                                <th>Usage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>Publishable</code></td>
                                <td><code>pk_</code></td>
                                <td>Client-side applications</td>
                            </tr>
                            <tr>
                                <td><code>Secret</code></td>
                                <td><code>sk_</code></td>
                                <td>Server-side applications</td>
                            </tr>
                            <tr>
                                <td><code>Test</code></td>
                                <td><code>test_</code></td>
                                <td>Sandbox environment</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Payments API Section -->
                <section id="payments-api" class="docs-section">
                    <h2>Payments API</h2>
                    <p>Process payments, check status, and manage transactions through our REST API.</p>

                    <h3>Create a Payment</h3>
                    <div class="api-endpoint">
                        <div>
                            <span class="endpoint-method">POST</span>
                            <span class="endpoint-path">/v1/payments</span>
                        </div>
                        <p class="endpoint-description">Create a new payment request and get a payment URL for your customer.</p>

                        <h4>Request Body</h4>
                        <table class="parameter-table">
                            <thead>
                                <tr>
                                    <th>Parameter</th>
                                    <th>Type</th>
                                    <th>Required</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>amount</code></td>
                                    <td>integer</td>
                                    <td>Yes</td>
                                    <td>Amount in smallest currency unit (e.g., cents for USD)</td>
                                </tr>
                                <tr>
                                    <td><code>currency</code></td>
                                    <td>string</td>
                                    <td>Yes</td>
                                    <td>Currency code (USD, EUR, SOL, USDC, etc.)</td>
                                </tr>
                                <tr>
                                    <td><code>description</code></td>
                                    <td>string</td>
                                    <td>No</td>
                                    <td>Payment description shown to customer</td>
                                </tr>
                                <tr>
                                    <td><code>metadata</code></td>
                                    <td>object</td>
                                    <td>No</td>
                                    <td>Additional metadata for your reference</td>
                                </tr>
                            </tbody>
                        </table>

                        <h4>Example Request</h4>
                        <div class="code-block">
                            <pre><code>curl -X POST https://api.myxenpay.finance/v1/payments \
  -H "Authorization: Bearer sk_live_your_api_key" \
  -H "Content-Type: application/json" \
  -d '{
    "amount": 1000,
    "currency": "USD",
    "description": "Premium Subscription",
    "metadata": {
      "order_id": "12345"
    }
  }'</code></pre>
                        </div>

                        <h4>Example Response</h4>
                        <div class="code-block">
                            <pre><code>{
  "id": "pay_123456789",
  "status": "pending",
  "amount": 1000,
  "currency": "USD",
  "payment_url": "https://pay.myxenpay.finance/pay_123456789",
  "expires_at": "2024-01-15T14:30:00Z"
}</code></pre>
                        </div>
                    </div>
                </section>

                <!-- Webhooks Section -->
                <section id="webhooks" class="docs-section">
                    <h2>Webhooks</h2>
                    <p>Receive real-time notifications about payment events in your application.</p>

                    <h3>Setting Up Webhooks</h3>
                    <p>Configure your webhook endpoint in the merchant dashboard to receive events:</p>

                    <ol>
                        <li>Go to your merchant dashboard</li>
                        <li>Navigate to Settings → Webhooks</li>
                        <li>Add your webhook URL</li>
                        <li>Select the events you want to receive</li>
                    </ol>

                    <h3>Webhook Events</h3>
                    <table class="parameter-table">
                        <thead>
                            <tr>
                                <th>Event Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>payment.completed</code></td>
                                <td>Payment successfully completed</td>
                            </tr>
                            <tr>
                                <td><code>payment.failed</code></td>
                                <td>Payment failed or was canceled</td>
                            </tr>
                            <tr>
                                <td><code>payment.pending</code></td>
                                <td>Payment is pending confirmation</td>
                            </tr>
                            <tr>
                                <td><code>payout.processed</code></td>
                                <td>Payout has been processed</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="alert alert-success">
                        <strong>Best Practice:</strong> Always verify webhook signatures to ensure they come from MyxenPay.
                    </div>
                </section>

                <!-- FAQ Section -->
                <section id="faq" class="docs-section">
                    <h2>Frequently Asked Questions</h2>

                    <h3>How long do payments take to confirm?</h3>
                    <p>Solana payments typically confirm within 1-2 seconds. Other cryptocurrencies may take longer depending on network conditions.</p>

                    <h3>What currencies do you support?</h3>
                    <p>We support USD, EUR, SOL, USDC, USDT, and MYXEN tokens. More currencies are being added regularly.</p>

                    <h3>Is there a sandbox environment for testing?</h3>
                    <p>Yes! Use the test API keys from your dashboard to test integrations without moving real funds.</p>

                    <h3>How do I handle refunds?</h3>
                    <p>Refunds can be processed through the merchant dashboard or via the API. Contact support for assistance with complex refund scenarios.</p>
                </section>
            </main>
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
                    <li><a href="documentation.php" class="active">Documentation</a></li>
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

// Documentation Navigation
document.querySelectorAll('.docs-nav-item').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetSection = document.querySelector(targetId);
        
        if (targetSection) {
            // Update active state
            document.querySelectorAll('.docs-nav-item').forEach(i => i.classList.remove('active'));
            this.classList.add('active');
            
            // Scroll to section
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    });
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