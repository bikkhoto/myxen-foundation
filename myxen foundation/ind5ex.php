<?php
// top of public_html/index.php — put this before headers/output
// ensure identity/session available on every page
if (file_exists(__DIR__ . '/core/identity.php')) {
    require_once __DIR__ . '/core/identity.php';
}
// Routing map at top of index.php
$page = $_GET['page'] ?? 'home';
$map = [
  'home'        => 'modules/home.php',
  'presale'     => 'modules/presale.php',
  'visa'        => 'modules/visa-virtual-card.php',
  'university'  => 'modules/university.php',
  'travel'      => 'modules/travel.php',
  'work'        => 'modules/work.php',
  'store'       => 'modules/store.php',
  'merchant'    => 'modules/merchants.php',
  'payroll'     => 'modules/streaming-payroll.php',
  'support'     => 'modules/support.php',

  // 👇 add this new line right here
  'user-login'  => 'modules/auth/user-login.php',

  'profile'     => 'modules/auth/profile.php'
];
$include = $map[$page] ?? $map['home'];
?>

<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="openai-domain-verification" content="dv-QHb0Ph0nZDQ3fFInGfP8HaLG" />
    <meta name="facebook-domain-verification" content="l4cne9g5tshvb2zk4awtvnsy19vllz" />
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
    <title>MyXen Foundation – Building a Decentralized Tomorrow</title>
    
    <!-- Updated SEO Meta Tags -->
    <meta name="description" content="MyXen Foundation — $MYXN payments, Visa Card, travel, university onboarding, freelance marketplace and more.">
    <meta property="og:title" content="MyXenPay — Gateway to Digital Freedom">
    <meta property="og:description" content="$MYXN ecosystem for payments, Visa Card, travel, work and education.">
    <meta property="og:image" content="https://myxenpay.finance/assets/images/myxenpay-token-logo.png">
    <meta property="og:url" content="https://myxenpay.finance/">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="MyXenPay — Gateway to Digital Freedom">
    <meta name="twitter:description" content="$MYXN ecosystem for payments, Visa Card, travel, work and education.">
    <meta name="twitter:image" content="https://myxenpay.finance/assets/images/myxenpay-token-logo.png">
    
    <!-- SEO & Sitemap -->
    <link rel="canonical" href="https://www.myxenpay.finance/" />
    <link rel="sitemap" type="application/xml" href="/sitemap.xml">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="myxenpay-logo-light.png" as="image">
    <link rel="preload" href="myxenpay-logo-dark.png" as="image">
    
    <!-- Structured Data for SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "MyXen Foundation",
        "url": "https://www.myxenpay.finance/",
        "logo": "https://www.myxenpay.finance/myxenpay-logo-light.png",
        "description": "Building a Decentralized Tomorrow, Responsibly and Transparently",
        "sameAs": [
        "https://x.com/myxenpay",
        "https://t.me/myxenpay"
        ]
    }
    </script>
    
    <style>
        /* CSS Variables for Theme */
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

        /* Tokenomics Hero Style */
        .tokenomics-hero {
        padding: 8rem 1rem 4rem;
        text-align: center;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 50%, var(--accent) 100%);
        color: white;
        position: relative;
        overflow: hidden;
        }

        .tokenomics-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,1000 1000,0 1000,1000"/></svg>');
        background-size: cover;
        }

        .tokenomics-hero h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        margin-bottom: 1rem;
        position: relative;
        }

        .tokenomics-hero p {
        font-size: 1.25rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        }

        /* Presale Table Styles */
        .presale-table {
        width: 100%;
        max-width: 800px;
        margin: 2rem auto;
        border-collapse: collapse;
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--glass-border);
        }

        .presale-table th,
        .presale-table td {
        padding: 1rem 1.5rem;
        text-align: left;
        border-bottom: 1px solid var(--border);
        }

        .presale-table th {
        background: var(--primary);
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        }

        .presale-table tr:last-child td {
        border-bottom: none;
        }

        .presale-table tr:hover {
        background: var(--glass-bg);
        }

        /* Social Share Buttons */
        .social-share {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
        flex-wrap: wrap;
        margin: 2rem 0;
        }

        .social-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.25rem;
        text-decoration: none;
        color: var(--text);
        }

        .social-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow);
        }

        .social-btn.twitter:hover { background: #1DA1F2; color: white; }
        .social-btn.telegram:hover { background: #0088CC; color: white; }
        .social-btn.whatsapp:hover { background: #25D366; color: white; }
        .social-btn.linkedin:hover { background: #0077B5; color: white; }
        .social-btn.facebook:hover { background: #4267B2; color: white; }
        .social-btn.reddit:hover { background: #FF4500; color: white; }
        .social-btn.copy:hover { background: var(--primary); color: white; }

        .share-text {
        text-align: center;
        margin-bottom: 1rem;
        font-weight: 600;
        color: var(--primary);
        }

        .share-toast {
        position: fixed;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%) translateY(100px);
        background: var(--secondary);
        color: black;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        box-shadow: var(--shadow);
        z-index: 10000;
        opacity: 0;
        transition: all 0.3s ease;
        }

        .share-toast.show {
        transform: translateX(-50%) translateY(0);
        opacity: 1;
        }

        /* Verified Badges */
        .verified-badges {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin: 2rem 0;
        align-items: center;
        }

        .badge {
        background: var(--secondary);
        color: black;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        width: fit-content;
        }

        .badge.solana { background: #9945FF; color: white; }
        .badge.gdpr { background: #059669; color: white; }
        .badge.safe { background: #60a5fa; color: white; }
        .badge.ssl { background: #00d664; color: white; }
        .badge.visa { background: #1a1f71; color: white; }
        .badge.solana-pay { background: linear-gradient(45deg, #9945FF, #14F195); color: white; }
        .badge.secure-payment { background: #dc2626; color: white; }

        .company-registration {
        text-align: center;
        margin: 1.5rem 0;
        padding: 1rem;
        background: var(--glass-bg);
        border-radius: 12px;
        border: 1px solid var(--glass-border);
        }

        .company-registration p {
        margin: 0;
        font-size: 0.9rem;
        opacity: 0.8;
        }

        /* Mobile Navigation Toggle */
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

        /* Header Styles */
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
        transition: background-color 0.3s ease, border-color 0.3s ease;
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

        .logo:hover {
        transform: scale(1.05);
        }

        /* Desktop Navigation - Minimized */
        .desktop-nav {
        display: flex;
        gap: 1.5rem;
        align-items: center;
        }

        .desktop-nav a {
        color: var(--text);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        transition: color 0.3s ease;
        opacity: 0.8;
        padding: 0.5rem 0.75rem;
        border-radius: 8px;
        }

        .desktop-nav a:hover,
        .desktop-nav a.active {
        color: var(--primary);
        opacity: 1;
        background: var(--glass-bg);
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
        font-size: 1.1rem;
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

        /* Hero Section - Updated to match tokenomics style */
        .hero {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 8rem 1rem 4rem;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 50%, var(--accent) 100%);
        color: white;
        }

        .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,1000 1000,0 1000,1000"/></svg>');
        background-size: cover;
        }

        .hero-content {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        }

        .hero h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        }

        .hero p {
        font-size: clamp(1.125rem, 2.5vw, 1.5rem);
        line-height: 1.4;
        margin-bottom: 2.5rem;
        opacity: 0.9;
        font-weight: 400;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        }

        .hero-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
        }

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
        }

        .btn-primary {
        background: white;
        color: var(--primary);
        }

        .btn-primary:hover {
        background: var(--secondary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .btn-secondary {
        background: transparent;
        color: white;
        border: 2px solid white;
        }

        .btn-secondary:hover {
        background: white;
        color: var(--primary);
        transform: translateY(-2px);
        }

        /* Countdown Section */
        .countdown-section {
        padding: 4rem 1rem;
        text-align: center;
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        margin: 2rem auto;
        border-radius: 24px;
        max-width: 800px;
        border: 1px solid var(--glass-border);
        }

        .countdown-label {
        font-size: 1.5rem;
        margin-bottom: 2rem;
        color: var(--primary);
        font-weight: 700;
        }

        .countdown-timer {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
        margin: 2rem 0;
        }

        .countdown-item {
        text-align: center;
        }

        .countdown-number {
        font-size: clamp(2rem, 5vw, 3rem);
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
        line-height: 1;
        }

        .countdown-unit {
        font-size: 0.9rem;
        color: var(--text);
        opacity: 0.7;
        margin-top: 0.5rem;
        font-weight: 500;
        }

        /* Notify Section */
        .notify-section {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        margin: 2rem auto;
        max-width: 500px;
        text-align: center;
        }

        .notify-section p {
        margin-bottom: 1.5rem;
        font-size: 1.1rem;
        color: var(--text);
        }

        .notify-form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        max-width: 400px;
        margin: 0 auto;
        }

        .form-input {
        padding: 1rem 1.25rem;
        border: 1px solid var(--border);
        border-radius: 12px;
        background: transparent;
        color: var(--text);
        font-size: 1rem;
        transition: all 0.3s ease;
        }

        .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
        }

        /* Features Section */
        .section {
        padding: var(--section-spacing) 1rem;
        }

        .section-header {
        text-align: center;
        margin-bottom: 4rem;
        }

        .section-title {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
        letter-spacing: -0.02em;
        }

        .section-subtitle {
        font-size: 1.25rem;
        opacity: 0.7;
        max-width: 600px;
        margin: 0 auto;
        }

        .features-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        }

        .feature-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        padding: 2.5rem 2rem;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        }

        .feature-card::before {
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

        .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .feature-card:hover::before {
        transform: scaleX(1);
        }

        .feature-icon {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        display: block;
        transition: transform 0.3s ease;
        }

        .feature-card:hover .feature-icon {
        transform: scale(1.1);
        }

        .feature-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: var(--primary);
        font-weight: 700;
        }

        .feature-description {
        color: var(--text);
        opacity: 0.8;
        margin-bottom: 1.5rem;
        line-height: 1.6;
        font-size: 1rem;
        }

        .feature-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        }

        .feature-link:hover {
        color: var(--accent);
        transform: translateX(5px);
        }

        /* Footer - Updated to match tokenomics */
        footer {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-top: 1px solid var(--border);
        padding: 3rem 1rem 2rem;
        margin-top: 4rem;
        }

        .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        text-align: center;
        }

        .footer-section h3 {
        margin-bottom: 1.5rem;
        color: var(--primary);
        font-size: 1.25rem;
        }

        .footer-links {
        list-style: none;
        display: inline-block;
        text-align: center;
        }

        .footer-links li {
        margin-bottom: 0.75rem;
        display: inline-block;
        margin-right: 1.5rem;
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
        }

        .copyright {
        text-align: center;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid var(--border);
        opacity: 0.7;
        font-size: 0.9rem;
        }

        /* Social Links in Footer */
        .social-links {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin: 1.5rem 0;
        flex-wrap: wrap;
        }

        .social-links a {
        color: var(--text);
        text-decoration: none;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        transition: all 0.3s ease;
        font-size: 0.9rem;
        }

        .social-links a:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
        }

        /* Animations */
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

        .fade-in-up {
        animation: fadeInUp 0.8s ease both;
        }

        /* Responsive Design */
        @media (min-width: 768px) {
        .header-container {
            padding: 1rem 2rem;
        }
        
        .logo {
            height: 40px;
        }
        
        .hero {
            padding: 10rem 2rem 6rem;
        }
        
        .features-grid {
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }
        
        .footer-content {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: left;
        }

        .footer-links {
            text-align: left;
        }

        .footer-links li {
            display: block;
            margin-right: 0;
        }
        
        .verified-badges {
            flex-direction: row;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .notify-form {
            flex-direction: row;
        }

        .desktop-nav {
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
        
        .hero-actions {
            flex-direction: column;
            align-items: center;
        }
        
        .btn {
            width: 100%;
            max-width: 280px;
            justify-content: center;
        }
        
        .presale-table {
            font-size: 0.8rem;
        }
        
        .presale-table th,
        .presale-table td {
            padding: 0.5rem 0.75rem;
        }

        .footer-links li {
            display: block;
            margin-right: 0;
            margin-bottom: 0.5rem;
        }

        .social-links {
            gap: 0.5rem;
        }

        .social-links a {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
        }
        }

        /* Loading Animation */
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

        /* Safe area for notch devices */
        @supports(padding: max(0px)) {
        body, .header-container, .section {
            padding-left: max(1rem, env(safe-area-inset-left));
            padding-right: max(1rem, env(safe-area-inset-right));
        }
        
        .hero {
            padding-top: max(8rem, env(safe-area-inset-top));
        }
        }
    </style>
</head>
<body>
    <!-- Site Header -->
    <header class="site-header">
        <div class="header-container">
        <!-- Logo -->
        <a href="index.php?page=home">
            <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyXen Foundation" class="logo">
        </a>

        <!-- Mobile Navigation Toggle -->
        <button class="mobile-nav-toggle" id="mobile-nav-toggle">
            <span></span>
        </button>

        <!-- Desktop Navigation - Minimized -->
        <nav class="desktop-nav">
            <a href="index.php?page=home" class="<?= $page == 'home' ? 'active' : '' ?>">Home</a>
            <a href="index.php?page=presale" class="<?= $page == 'presale' ? 'active' : '' ?>">Pre-Sale</a>
            <a href="index.php?page=visa" class="<?= $page == 'visa' ? 'active' : '' ?>">Visa Card</a>
            <a href="index.php?page=university" class="<?= $page == 'university' ? 'active' : '' ?>">University</a>
            <a href="index.php?page=travel" class="<?= $page == 'travel' ? 'active' : '' ?>">Travel</a>
            <a href="index.php?page=work" class="<?= $page == 'work' ? 'active' : '' ?>">Freelance</a>
            <a href="index.php?page=store" class="<?= $page == 'store' ? 'active' : '' ?>">Store</a>
            <a href="index.php?page=merchant" class="<?= $page == 'merchant' ? 'active' : '' ?>">Merchants</a>
            <a href="index.php?page=payroll" class="<?= $page == 'payroll' ? 'active' : '' ?>">Payroll</a>
            <a href="index.php?page=support" class="<?= $page == 'support' ? 'active' : '' ?>">Support</a>
            <a href="index.php?page=user-login" class="<?= $page == 'user-login' ? 'active' : '' ?>">Login</a>
        </nav>

        <!-- Header Actions -->
        <div class="header-actions">
            <button id="theme-toggle" class="theme-btn">☀️</button>
            <button id="connect-btn" class="connect-btn">Connect Wallet</button>
        </div>
        </div>
    </header>

    <!-- Mobile Navigation -->
    <nav class="mobile-nav" id="mobile-nav">
        <a href="index.php?page=home" class="<?= $page == 'home' ? 'active' : '' ?>">Home</a>
        <a href="index.php?page=presale" class="<?= $page == 'presale' ? 'active' : '' ?>">Pre-Sale</a>
        <a href="index.php?page=visa" class="<?= $page == 'visa' ? 'active' : '' ?>">Visa Card</a>
        <a href="index.php?page=university" class="<?= $page == 'university' ? 'active' : '' ?>">University</a>
        <a href="index.php?page=travel" class="<?= $page == 'travel' ? 'active' : '' ?>">Travel</a>
        <a href="index.php?page=work" class="<?= $page == 'work' ? 'active' : '' ?>">Freelance</a>
        <a href="index.php?page=store" class="<?= $page == 'store' ? 'active' : '' ?>">Store</a>
        <a href="index.php?page=merchant" class="<?= $page == 'merchant' ? 'active' : '' ?>">Merchants</a>
        <a href="index.php?page=payroll" class="<?= $page == 'payroll' ? 'active' : '' ?>">Payroll</a>
        <a href="index.php?page=support" class="<?= $page == 'support' ? 'active' : '' ?>">Support</a>
        <a href="index.php?page=user-login" class="<?= $page == 'user-login' ? 'active' : '' ?>">Login</a>
    </nav>

    <!-- Main Content Area -->
    <main>
        <?php include($include); ?>
    </main>

    <!-- Footer - Updated to match tokenomics -->
    <footer>
        <div class="footer-content">
        <div class="footer-section">
            <h3>MyXen Foundation</h3>
            <p>Building a Decentralized Tomorrow, Responsibly and Transparently</p>
            
            <!-- Company Registration -->
            <div class="company-registration">
            <p>🏢 <strong>UK Registered Company</strong><br>Registration Number: °°°°°°</p>
            <p>📧 contact@myxenpay.finance<br>☎️ +1 (786) 509-7729</p>
            </div>
        </div>
        
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul class="footer-links">
            <li><a href="tokenomics.php">Tokenomics</a></li>
            <li><a href="whitepaper.php">Whitepaper</a></li>
            <li><a href="privacy.php">Privacy Policy</a></li>
            <li><a href="terms.php">Terms & Condition</a></li>
            </ul>
        </div>
        
        <div class="footer-section">
            <h3>Connect With Us</h3>
            <div class="social-links">
            <a href="https://t.me/myxenpay" target="_blank">Telegram</a>
            <a href="https://www.facebook.com/myxen.foundation/" target="_blank">Facebook</a>
            <a href="https://www.instagram.com/myxenp_inc/" target="_blank">Instagram</a>
            <a href="https://medium.com/@myxeninc" target="_blank">Medium</a>
            <a href="https://www.reddit.com/user/MyXen_Inc/" target="_blank">Reddit</a>
            </div>
            
            <div style="background: var(--card-bg); border: 1px solid var(--border); padding: 15px; border-radius: 8px; margin-top: 15px;">
            <p style="margin: 0; font-size: 0.9rem; color: var(--text);">🚀 <strong>Pre-Sale Starting:</strong> November 10, 2025</p>
            </div>
        </div>
        </div>
        
        <!-- Updated Verified Badges -->
        <div class="verified-badges">
        <span class="badge solana">✅ Verified by Solana</span>
        <span class="badge solana-pay">⚡ Solana Pay Verified</span>
        <span class="badge gdpr">🔒 GDPR Compliant</span>
        <span class="badge ssl">🔐 SSL SECURED</span>
        <span class="badge visa">💳 VISA Verified</span>
        <span class="badge secure-payment">🛡️ Secure Payment</span>
        </div>
        
        <div class="copyright">
        <p>© 2025 MyXen Foundation LTD. All rights reserved. Building a decentralized tomorrow, responsibly and transparently.</p>
        <p style="margin-top: 0.5rem; font-size: 0.8rem; opacity: 0.6;">
            $MYXN is a utility token, not an investment contract. Token value is subject to market conditions. 
            MyXen Foundation does not support gambling, illegal transactions, or use in any restricted jurisdictions. 
            Always DYOR (Do Your Own Research) before purchasing or trading any digital asset.
        </p>
        </div>
    </footer>

    <!-- Share Toast Notification -->
    <div id="share-toast" class="share-toast">Link copied to clipboard!</div>

    <script>
        // Anti-scrape
        document.addEventListener('contextmenu', e => e.preventDefault());
        document.addEventListener('selectstart', e => e.preventDefault());

        // Global state
        let walletConnected = false;
        let walletAddress = null;

        // Theme Management
        function initTheme() {
        const saved = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        if (saved === 'dark' || (!saved && prefersDark)) {
            document.body.setAttribute('data-theme', 'dark');
            document.getElementById('theme-logo').src = 'myxenpay-logo-dark.png';
            document.getElementById('theme-toggle').textContent = '🌙';
        } else {
            document.body.setAttribute('data-theme', 'light');
            document.getElementById('theme-logo').src = 'myxenpay-logo-light.png';
            document.getElementById('theme-toggle').textContent = '☀️';
        }
        }

        // Mobile Navigation
        function initMobileNav() {
        const mobileNavToggle = document.getElementById('mobile-nav-toggle');
        const mobileNav = document.getElementById('mobile-nav');
        
        if (mobileNavToggle && mobileNav) {
            mobileNavToggle.addEventListener('click', () => {
            mobileNavToggle.classList.toggle('active');
            mobileNav.classList.toggle('active');
            document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
            });

            // Close mobile nav when clicking on links
            mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileNavToggle.classList.remove('active');
                mobileNav.classList.remove('active');
                document.body.style.overflow = '';
            });
            });
        }
        }

        // Theme Toggle
        function initThemeToggle() {
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
            const current = document.body.getAttribute('data-theme');
            const newTheme = current === 'dark' ? 'light' : 'dark';
            
            document.body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            
            // Update logo
            const logo = document.getElementById('theme-logo');
            if (logo) {
            logo.src = newTheme === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
            }
            
            // Update button text
            themeToggle.textContent = newTheme === 'dark' ? '🌙' : '☀️';
            });
        }
        }

        // Wallet Connection
        async function connectWallet() {
        const provider = window.solana || window.phantom?.solana;
        const connectBtn = document.getElementById('connect-btn');
        
        if (!provider) {
            alert('Please install Phantom or Backpack wallet.');
            return;
        }
        
        // If already connected, disconnect
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
        
        // Connect wallet
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

        // Social Share Functions
        function showToast(message) {
        const toast = document.getElementById('share-toast');
        if (toast) {
            toast.textContent = message;
            toast.classList.add('show');
            setTimeout(() => {
            toast.classList.remove('show');
            }, 3000);
        }
        }

        function shareOnTwitter() {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent("🚀 MyXen Foundation - Building a Decentralized Tomorrow! \n\n🏛️ Official Master Development & Vision Document\n💎 Pre-Sale starting November 10, 2025\n🌍 Comprehensive ecosystem on Solana\n\n#MyXenFoundation #DeFi #Crypto #Solana #PreSale");
        window.open(`https://twitter.com/intent/tweet?text=${text}&url=${url}`, '_blank', 'width=600,height=400');
        }

        function shareOnTelegram() {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent("🚀 MyXen Foundation - Building a Decentralized Tomorrow\n🏛️ Official Master Development & Vision Document\n💎 Pre-Sale starting November 10, 2025\n🌍 Comprehensive ecosystem on Solana");
        window.open(`https://t.me/share/url?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
        }

        function shareOnWhatsApp() {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent("Check out MyXen Foundation - Building a Decentralized Tomorrow! Official Master Development & Vision Document. Pre-Sale starting November 10, 2025.");
        window.open(`https://wa.me/?text=${text}%20${url}`, '_blank', 'width=600,height=400');
        }

        function shareOnLinkedIn() {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent("MyXen Foundation - Building a Decentralized Tomorrow");
        const summary = encodeURIComponent("Official Master Development & Vision Document. Pre-Sale starting November 10, 2025. Comprehensive ecosystem on Solana.");
        window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}&title=${title}&summary=${summary}`, '_blank', 'width=600,height=400');
        }

        function shareOnFacebook() {
        const url = encodeURIComponent(window.location.href);
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
        }

        function shareOnReddit() {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent("MyXen Foundation - Building a Decentralized Tomorrow");
        window.open(`https://reddit.com/submit?url=${url}&title=${title}`, '_blank', 'width=600,height=400');
        }

        function copyToClipboard() {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            showToast('Link copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy: ', err);
            showToast('Failed to copy link');
        });
        }

        // Initialize Social Share Buttons
        function initSocialShare() {
        document.addEventListener('DOMContentLoaded', () => {
            const socialButtons = document.querySelectorAll('.social-btn');
            socialButtons.forEach(btn => {
            if (btn.classList.contains('twitter')) {
                btn.addEventListener('click', shareOnTwitter);
            } else if (btn.classList.contains('telegram')) {
                btn.addEventListener('click', shareOnTelegram);
            } else if (btn.classList.contains('whatsapp')) {
                btn.addEventListener('click', shareOnWhatsApp);
            } else if (btn.classList.contains('linkedin')) {
                btn.addEventListener('click', shareOnLinkedIn);
            } else if (btn.classList.contains('facebook')) {
                btn.addEventListener('click', shareOnFacebook);
            } else if (btn.classList.contains('reddit')) {
                btn.addEventListener('click', shareOnReddit);
            } else if (btn.classList.contains('copy')) {
                btn.addEventListener('click', copyToClipboard);
            }
            });
        });
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
        initTheme();
        initMobileNav();
        initThemeToggle();
        initSocialShare();
        
        // Initialize wallet connection
        const connectBtn = document.getElementById('connect-btn');
        if (connectBtn) {
            connectBtn.addEventListener('click', connectWallet);
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

        const animatableElements = document.querySelectorAll('.feature-card, .tokenomics-card');
        animatableElements.forEach(el => {
            observer.observe(el);
        });
        });
// Countdown Timer - Add this to index.php
function initCountdown() {
    const PRESALE_DATE = new Date('November 10, 2025 12:00:00 UTC').getTime();
    
    function updateCountdown() {
        const now = new Date().getTime();
        const diff = PRESALE_DATE - now;
        
        if (diff <= 0) {
            const countdownElement = document.getElementById('countdown');
            if (countdownElement) {
                countdownElement.innerHTML = '<div class="countdown-number" style="color:var(--secondary);font-size:3rem;">PRE-SALE LIVE!</div>';
            }
            const notifySection = document.querySelector('.notify-section');
            if (notifySection) {
                notifySection.style.display = 'none';
            }
            return;
        }
        
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);
        
        const daysEl = document.getElementById('days');
        const hoursEl = document.getElementById('hours');
        const minutesEl = document.getElementById('minutes');
        const secondsEl = document.getElementById('seconds');
        
        if (daysEl) daysEl.textContent = String(days).padStart(2, '0');
        if (hoursEl) hoursEl.textContent = String(hours).padStart(2, '0');
        if (minutesEl) minutesEl.textContent = String(minutes).padStart(2, '0');
        if (secondsEl) secondsEl.textContent = String(seconds).padStart(2, '0');
    }
    
    // Only start countdown if we're on home page and elements exist
    if (document.getElementById('countdown')) {
        setInterval(updateCountdown, 1000);
        updateCountdown(); // Initial call
    }
}

// Waitlist Form - Add this to index.php
function initWaitlistForm() {
    const form = document.getElementById('launch-notify-form');
    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = e.target.querySelector('input').value;
            const button = e.target.querySelector('button');
            
            if (!email || !email.includes('@')) {
                alert('Please enter a valid email address.');
                return;
            }
            
            const originalText = button.textContent;
            button.innerHTML = '<div class="loading"></div>';
            button.disabled = true;
            
            try {
                // Simulate API call
                await new Promise(resolve => setTimeout(resolve, 1000));
                alert('Successfully subscribed to pre-sale notifications!');
                e.target.reset();
            } catch (err) {
                alert('Failed to subscribe. Please try again later.');
            } finally {
                button.textContent = originalText;
                button.disabled = false;
            }
        });
    }
}
    </script>
</body>
</html>