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
<title>Contact Us - MyxenPay</title>
<meta name="description" content="Get in touch with MyxenPay team. We're here to help with global crypto payments, VISA virtual cards, and student rewards.">
<meta property="og:title" content="Contact MyxenPay - Global Crypto Payments Support">
<meta property="og:description" content="Reach out for partnerships, technical support, or general inquiries about our crypto payment platform.">
<meta property="og:image" content="https://myxenpay.finance/og/og-contact.jpg">
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

/* Contact-specific styles */
.contact-hero {
    padding: 8rem 1rem 4rem;
    text-align: center;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.contact-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
    background-size: cover;
}

.contact-hero h1 {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    margin-bottom: 1rem;
    position: relative;
}

.contact-hero p {
    font-size: 1.25rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
    position: relative;
}

.contact-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.contact-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    margin: 3rem 0;
}

.contact-info {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 3rem;
}

.contact-form-container {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 3rem;
}

.contact-methods {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.contact-method {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.5rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    transition: all 0.3s ease;
}

.contact-method:hover {
    transform: translateY(-2px);
    background: rgba(255, 255, 255, 0.15);
}

.method-icon {
    width: 50px;
    height: 50px;
    background: var(--primary);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.method-content h3 {
    color: var(--primary);
    margin-bottom: 0.5rem;
    font-size: 1.25rem;
}

.method-content p {
    opacity: 0.8;
    margin-bottom: 0.5rem;
}

.method-link {
    color: var(--accent);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.method-link:hover {
    color: var(--secondary);
}

.contact-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-label {
    font-weight: 600;
    color: var(--text);
    font-size: 0.95rem;
}

.form-input,
.form-textarea {
    padding: 1rem 1.25rem;
    border: 1px solid var(--border);
    border-radius: 12px;
    background: var(--bg);
    color: var(--text);
    font-size: 1rem;
    transition: all 0.3s ease;
    font-family: inherit;
}

.form-input:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
}

.form-textarea {
    resize: vertical;
    min-height: 120px;
}

.submit-btn {
    background: var(--primary);
    color: white;
    border: none;
    padding: 1.25rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
}

.submit-btn:hover {
    background: var(--secondary);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.contact-features {
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
    padding: 2.5rem 2rem;
    text-align: center;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
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

.faq-section {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 3rem;
    margin: 4rem 0;
}

.faq-item {
    border-bottom: 1px solid var(--border);
    padding: 1.5rem 0;
}

.faq-item:last-child {
    border-bottom: none;
}

.faq-question {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--primary);
    margin-bottom: 1rem;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.faq-answer {
    opacity: 0.8;
    line-height: 1.6;
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

    .contact-layout {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .contact-info,
    .contact-form-container {
        padding: 2rem 1.5rem;
    }

    .contact-methods {
        gap: 1rem;
    }

    .contact-method {
        padding: 1rem;
    }

    .method-icon {
        width: 40px;
        height: 40px;
        font-size: 1.25rem;
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
            <a href="contact.php" class="active">Contact</a>
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
    <a href="contact.php" class="active">Contact</a>
</nav>

<!-- Contact Hero -->
<section class="contact-hero">
    <div class="container">
        <h1>Get In Touch</h1>
        <p>We're here to help you with global crypto payments, VISA virtual cards, and student rewards programs.</p>
    </div>
</section>

<!-- Contact Content -->
<section class="section">
    <div class="contact-container">
        <div class="contact-layout">
            <!-- Contact Information -->
            <div class="contact-info">
                <h2 style="color: var(--primary); margin-bottom: 2rem; font-size: 2rem;">Contact Information</h2>
                <div class="contact-methods">
                    <div class="contact-method">
                        <div class="method-icon">📧</div>
                        <div class="method-content">
                            <h3>Email Us</h3>
                            <p>General inquiries and support</p>
                            <a href="mailto:hello@myxenpay.finance" class="method-link">hello@myxenpay.finance</a>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="method-icon">💼</div>
                        <div class="method-content">
                            <h3>Business & Partnerships</h3>
                            <p>For merchant partnerships and enterprise solutions</p>
                            <a href="mailto:partnerships@myxenpay.finance" class="method-link">partnerships@myxenpay.finance</a>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="method-icon">🔧</div>
                        <div class="method-content">
                            <h3>Technical Support</h3>
                            <p>Developer support and technical issues</p>
                            <a href="mailto:support@myxenpay.finance" class="method-link">support@myxenpay.finance</a>
                        </div>
                    </div>

                    <div class="contact-method">
                        <div class="method-icon">🎓</div>
                        <div class="method-content">
                            <h3>Student Rewards</h3>
                            <p>Student verification and rewards program</p>
                            <a href="mailto:students@myxenpay.finance" class="method-link">students@myxenpay.finance</a>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--border);">
                    <h3 style="color: var(--primary); margin-bottom: 1rem;">Response Time</h3>
                    <p style="opacity: 0.8;">We typically respond to all inquiries within 24 hours. For urgent matters, please mention "URGENT" in your subject line.</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-container">
                <h2 style="color: var(--primary); margin-bottom: 2rem; font-size: 2rem;">Send Us a Message</h2>
                <form class="contact-form" id="contact-form">
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email address" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="subject">Subject</label>
                        <select id="subject" name="subject" class="form-input" required>
                            <option value="">Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="technical">Technical Support</option>
                            <option value="partnership">Business Partnership</option>
                            <option value="student">Student Rewards</option>
                            <option value="merchant">Merchant Account</option>
                            <option value="developer">Developer API</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="message">Message</label>
                        <textarea id="message" name="message" class="form-textarea" placeholder="Tell us how we can help you..." required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">
                        <span>Send Message</span>
                        <span>➔</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Support Features -->
        <div class="contact-features">
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3 class="feature-title">Quick Support</h3>
                <p class="feature-description">Get answers to your questions within 24 hours from our dedicated support team.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3 class="feature-title">Secure Communication</h3>
                <p class="feature-description">All communications are encrypted and secure to protect your privacy.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🌍</div>
                <h3 class="feature-title">Global Support</h3>
                <p class="feature-description">We support users and businesses from all around the world, 24/7.</p>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <h2 style="color: var(--primary); margin-bottom: 2rem; font-size: 2rem; text-align: center;">Frequently Asked Questions</h2>
            
            <div class="faq-item">
                <div class="faq-question">
                    How do I verify my student status for rewards?
                    <span>+</span>
                </div>
                <div class="faq-answer">
                    Student verification is done off-chain through our secure verification system. You'll need to provide your educational email and basic student information. No KYC required for basic verification.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    What payment methods do you support?
                    <span>+</span>
                </div>
                <div class="faq-answer">
                    We support QR code payments, VISA virtual cards, and direct crypto payments via Solana. All settlements are instant and low-cost.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    How can merchants integrate MyXenPay?
                    <span>+</span>
                </div>
                <div class="faq-answer">
                    Merchants can integrate through our API, plugins for popular e-commerce platforms, or use our standalone QR code system. Contact our partnerships team for custom integration support.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    Is there a fee for using MyXenPay?
                    <span>+</span>
                </div>
                <div class="faq-answer">
                    Transaction fees are significantly lower than traditional payment processors. Specific rates depend on the payment method and volume. Contact us for enterprise pricing.
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

// Contact Form Handling
document.getElementById('contact-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const submitBtn = e.target.querySelector('.submit-btn');
    const originalText = submitBtn.innerHTML;

    // Show loading state
    submitBtn.innerHTML = '<div class="loading"></div>Sending...';
    submitBtn.disabled = true;

    try {
        // Simulate form submission (replace with actual endpoint)
        await new Promise(resolve => setTimeout(resolve, 2000));
        
        // Show success message
        alert('Thank you for your message! We\'ll get back to you within 24 hours.');
        e.target.reset();
        
    } catch (error) {
        alert('Sorry, there was an error sending your message. Please try again or email us directly.');
    } finally {
        // Reset button state
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }
});

// FAQ Toggle
document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const answer = question.nextElementSibling;
        const isOpen = answer.style.display === 'block';
        
        // Close all answers
        document.querySelectorAll('.faq-answer').forEach(ans => {
            ans.style.display = 'none';
        });
        document.querySelectorAll('.faq-question span').forEach(span => {
            span.textContent = '+';
        });
        
        // Toggle current answer
        if (!isOpen) {
            answer.style.display = 'block';
            question.querySelector('span').textContent = '−';
        }
    });
});

// Initialize FAQ answers as closed
document.querySelectorAll('.faq-answer').forEach(answer => {
    answer.style.display = 'none';
});

// Initialize
document.addEventListener('DOMContentLoaded', initTheme);
</script>
</body>
</html>