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
<title>About Us - MyxenPay</title>
<meta name="description" content="Learn about MyxenPay's mission to revolutionize global payments with blockchain technology and financial inclusion.">
<meta property="og:title" content="About MyxenPay - Global Crypto Payments">
<meta property="og:description" content="Our mission to make crypto payments accessible for everyone worldwide.">
<meta property="og:image" content="https://myxenpay.finance/og/og-about.jpg">
<meta name="twitter:card" content="summary_large_image">

<style>
/* About page specific styles */
.about-hero {
    padding: 8rem 1rem 4rem;
    text-align: center;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    color: white;
    position: relative;
    overflow: hidden;
}

.about-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,0 1000,1000 0,1000"/></svg>');
    background-size: cover;
}

.mission-section {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 3rem;
    margin: 3rem 0;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 3rem 0;
}

.value-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 2.5rem 2rem;
    text-align: center;
    transition: all 0.3s ease;
}

.value-card:hover {
    transform: translateY(-5px);
    border-color: var(--primary);
}

.value-icon {
    font-size: 3rem;
    margin-bottom: 1.5rem;
    display: block;
}

.value-title {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: var(--primary);
    font-weight: 600;
}

.value-description {
    opacity: 0.8;
    line-height: 1.6;
}

.team-section {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 3rem;
    margin: 3rem 0;
}

.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.team-member {
    text-align: center;
}

.member-avatar {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin: 0 auto 1.5rem;
    background: var(--border);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
}

.member-name {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
    color: var(--primary);
    font-weight: 600;
}

.member-role {
    opacity: 0.8;
    margin-bottom: 1rem;
}

.member-bio {
    opacity: 0.7;
    font-size: 0.9rem;
    line-height: 1.5;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin: 3rem 0;
}

.stat-item {
    text-align: center;
    padding: 2rem;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    background: linear-gradient(135deg, var(--primary), var(--accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.8;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Inherit all other styles from previous pages */
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
            <a href="about.php" class="active">About</a>
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
    <a href="about.php" class="active">About</a>
</nav>

<!-- About Hero -->
<section class="about-hero">
    <div class="container">
        <h1>About MyXenPay</h1>
        <p>Revolutionizing global payments with blockchain technology and financial inclusion</p>
    </div>
</section>

<!-- About Content -->
<section class="section">
    <div class="container">
        <!-- Mission Section -->
        <div class="mission-section">
            <h2 style="color: var(--primary); margin-bottom: 2rem; text-align: center;">Our Mission</h2>
            <p style="font-size: 1.25rem; text-align: center; opacity: 0.9; line-height: 1.6; max-width: 800px; margin: 0 auto;">
                To democratize access to global payments by leveraging blockchain technology, making crypto payments 
                as simple and accessible as traditional methods for everyone, everywhere.
            </p>
        </div>

        <!-- Our Story -->
        <div class="section-header">
            <h2 class="section-title">Our Story</h2>
            <p class="section-subtitle">From idea to global payment solution</p>
        </div>

        <div style="background: var(--glass-bg); padding: 2rem; border-radius: 15px; margin-bottom: 3rem;">
            <p style="opacity: 0.9; line-height: 1.7; margin-bottom: 1.5rem;">
                MyXenPay was born from the realization that traditional payment systems are fundamentally broken 
                for global commerce. High fees, slow settlements, geographic restrictions, and banking barriers 
                prevent billions of people from participating fully in the digital economy.
            </p>
            <p style="opacity: 0.9; line-height: 1.7; margin-bottom: 1.5rem;">
                We saw an opportunity with Solana blockchain technology to build a payment system that's 
                faster, cheaper, and more accessible than anything that exists today. By combining the speed 
                of blockchain with user-friendly interfaces like QR codes and virtual cards, we're bridging 
                the gap between crypto and everyday payments.
            </p>
            <p style="opacity: 0.9; line-height: 1.7;">
                Today, we're building the infrastructure for the future of payments - one where anyone, anywhere 
                can send and receive money instantly, with minimal fees, regardless of their banking status 
                or location.
            </p>
        </div>

        <!-- Our Values -->
        <div class="section-header">
            <h2 class="section-title">Our Values</h2>
            <p class="section-subtitle">The principles that guide everything we do</p>
        </div>

        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">🔓</div>
                <h3 class="value-title">Financial Freedom</h3>
                <p class="value-description">We believe everyone should have access to fast, affordable payments without barriers or discrimination.</p>
            </div>

            <div class="value-card">
                <div class="value-icon">🌍</div>
                <h3 class="value-title">Global Inclusion</h3>
                <p class="value-description">Building for the entire world, not just developed markets. Everyone deserves equal access to financial tools.</p>
            </div>

            <div class="value-card">
                <div class="value-icon">⚡</div>
                <h3 class="value-title">Innovation</h3>
                <p class="value-description">Continuously pushing the boundaries of what's possible with blockchain technology and user experience.</p>
            </div>

            <div class="value-card">
                <div class="value-icon">🤝</div>
                <h3 class="value-title">Transparency</h3>
                <p class="value-description">Open and honest about our technology, tokenomics, and business practices. No hidden fees or surprises.</p>
            </div>

            <div class="value-card">
                <div class="value-icon">🎓</div>
                <h3 class="value-title">Education</h3>
                <p class="value-description">Empowering users through education and accessible tools to understand and benefit from crypto payments.</p>
            </div>

            <div class="value-card">
                <div class="value-icon">🔄</div>
                <h3 class="value-title">Sustainability</h3>
                <p class="value-description">Building long-term value through sustainable token economics and real revenue generation.</p>
            </div>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">1B+</div>
                <div class="stat-label">People Unbanked</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">2-4%</div>
                <div class="stat-label">Traditional Fees</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">$0.00025</div>
                <div class="stat-label">Our Average Fee</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">&lt; 1s</div>
                <div class="stat-label">Settlement Time</div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="team-section">
            <h2 style="color: var(--primary); margin-bottom: 2rem; text-align: center;">Our Team</h2>
            <p style="text-align: center; opacity: 0.8; margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                A diverse team of blockchain experts, payment industry veterans, and technology innovators 
                working together to build the future of payments.
            </p>

            <div class="team-grid">
                <div class="team-member">
                    <div class="member-avatar">👨‍💻</div>
                    <h3 class="member-name">Alex Chen</h3>
                    <div class="member-role">Founder & CEO</div>
                    <p class="member-bio">Former payments architect with 10+ years in fintech and blockchain development.</p>
                </div>

                <div class="team-member">
                    <div class="member-avatar">👩‍🎓</div>
                    <h3 class="member-name">Sarah Rodriguez</h3>
                    <div class="member-role">Head of Product</div>
                    <p class="member-bio">Product lead from major crypto exchange, focused on user experience and accessibility.</p>
                </div>

                <div class="team-member">
                    <div class="member-avatar">👨‍🔬</div>
                    <h3 class="member-name">Marcus Johnson</h3>
                    <div class="member-role">CTO</div>
                    <p class="member-bio">Solana ecosystem developer and smart contract security expert.</p>
                </div>

                <div class="team-member">
                    <div class="member-avatar">👩‍💼</div>
                    <h3 class="member-name">Elena Petrova</h3>
                    <div class="member-role">Head of Business Development</div>
                    <p class="member-bio">Former partnerships lead at global payment processor, bringing merchants to web3.</p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div style="text-align: center; margin-top: 4rem; padding: 3rem; background: var(--glass-bg); border-radius: 20px;">
            <h2 style="color: var(--primary); margin-bottom: 1rem;">Join Our Mission</h2>
            <p style="opacity: 0.8; margin-bottom: 2rem; max-width: 600px; margin-left: auto; margin-right: auto;">
                Be part of the payment revolution. Whether you're a merchant, developer, or user, 
                there's a place for you in the MyXenPay ecosystem.
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="merchants.php" class="btn btn-primary">
                    For Businesses
                </a>
                <a href="developers.php" class="btn" style="background: transparent; border: 2px solid var(--primary); color: var(--primary);">
                    For Developers
                </a>
                <a href="contact.php" class="btn" style="background: transparent; border: 2px solid var(--primary); color: var(--primary);">
                    Contact Us
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
// Include the same JavaScript as previous pages for navigation, theme, and wallet connection
</script>
</body>
</html>