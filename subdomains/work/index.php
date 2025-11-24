<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>MyXen.Work – Global Freelancer Platform | MyXen Foundation</title>
    <meta name="description" content="MyXen.Work - Enterprise-grade freelancer platform. Work globally, get paid instantly in crypto. Secure, fast, and decentralized.">
    
    <style>
        /* CSS Variables for Security Theme */
        :root {
            --bg: #0a0a0a;
            --text: #ffffff;
            --card-bg: rgba(30, 30, 30, 0.95);
            --border: rgba(255, 255, 255, 0.1);
            --primary: #007AFF;
            --secondary: #30D158;
            --accent: #FF9F0A;
            --warning: #FF453A;
            --secure-green: #00D4AA;
            --header-bg: rgba(10, 10, 10, 0.95);
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
            --glass-bg: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.08);
            --section-spacing: clamp(3rem, 8vw, 6rem);
            --neon-glow: 0 0 20px rgba(0, 122, 255, 0.3);
        }

        [data-theme="light"] {
            --bg: #ffffff;
            --text: #111111;
            --card-bg: rgba(255, 255, 255, 0.95);
            --border: rgba(0, 0, 0, 0.1);
            --primary: #007AFF;
            --secondary: #30D158;
            --accent: #FF9F0A;
            --warning: #FF453A;
            --secure-green: #00A884;
            --header-bg: rgba(255, 255, 255, 0.95);
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            --glass-bg: rgba(0, 0, 0, 0.03);
            --glass-border: rgba(0, 0, 0, 0.08);
            --neon-glow: 0 0 20px rgba(0, 122, 255, 0.1);
        }

        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Security Status Bar */
        .security-status {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--secure-green), var(--primary), var(--accent));
            z-index: 10000;
            animation: securityScan 3s ease-in-out infinite;
        }

        @keyframes securityScan {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 1; }
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
            border-bottom: 1px solid var(--border);
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 2rem;
            max-width: 1440px;
            margin: 0 auto;
        }

        .logo {
            height: 40px;
            width: auto;
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

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 8rem 2rem 4rem;
            position: relative;
            background: linear-gradient(135deg, var(--bg) 0%, rgba(0, 122, 255, 0.05) 100%);
        }

        .hero-content {
            max-width: 900px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: clamp(1.125rem, 2.5vw, 1.5rem);
            line-height: 1.4;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        /* Platform Badges */
        .platform-badges {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1rem;
            margin: 2rem 0;
        }

        .platform-badge {
            background: linear-gradient(135deg, var(--card-bg), var(--glass-bg));
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 600;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .platform-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }

        .platform-badge:hover::before {
            left: 100%;
        }

        .platform-badge.instant {
            border-left: 4px solid var(--secure-green);
        }

        .platform-badge.global {
            border-left: 4px solid var(--primary);
        }

        .platform-badge.secure {
            border-left: 4px solid var(--accent);
        }

        .platform-badge.decentralized {
            border-left: 4px solid var(--secondary);
        }

        .platform-badge .badge-icon {
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: var(--glass-bg);
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

        /* Platform Dashboard */
        .section {
            padding: var(--section-spacing) 2rem;
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
        }

        .section-subtitle {
            font-size: 1.25rem;
            opacity: 0.7;
            max-width: 600px;
            margin: 0 auto;
        }

        /* How It Works Section */
        .how-it-works {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .work-step {
            background: linear-gradient(135deg, var(--card-bg), var(--glass-bg));
            padding: 2.5rem;
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            text-align: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .work-step:hover {
            transform: translateY(-5px);
            box-shadow: var(--neon-glow);
        }

        .step-number {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.2rem;
        }

        .step-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .step-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        .step-description {
            opacity: 0.9;
            line-height: 1.6;
        }

        /* Job Categories */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin: 3rem 0;
        }

        .category-card {
            background: linear-gradient(135deg, var(--card-bg), var(--glass-bg));
            padding: 2rem;
            border-radius: 16px;
            border: 1px solid var(--glass-border);
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--neon-glow);
        }

        .category-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .category-name {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .job-count {
            font-size: 0.9rem;
            opacity: 0.7;
        }

        /* Freelancer Profiles */
        .freelancers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .freelancer-card {
            background: linear-gradient(135deg, var(--card-bg), var(--glass-bg));
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            transition: all 0.3s ease;
        }

        .freelancer-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--neon-glow);
        }

        .freelancer-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .freelancer-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
            color: white;
        }

        .freelancer-info h3 {
            font-size: 1.3rem;
            margin-bottom: 0.25rem;
            color: var(--primary);
        }

        .freelancer-title {
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .freelancer-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0.5rem 0;
        }

        .stars {
            color: var(--accent);
        }

        .rating-value {
            font-weight: 600;
        }

        .freelancer-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .skill-tag {
            background: var(--glass-bg);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            border: 1px solid var(--glass-border);
        }

        .freelancer-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin: 1rem 0;
        }

        .stat {
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .stat-label {
            font-size: 0.8rem;
            opacity: 0.7;
        }

        /* Platform Features */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin: 3rem 0;
        }

        .feature-card {
            background: linear-gradient(135deg, var(--card-bg), var(--glass-bg));
            padding: 2rem;
            border-radius: 16px;
            border: 1px solid var(--glass-border);
            text-align: center;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--neon-glow);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        .feature-description {
            opacity: 0.9;
            line-height: 1.5;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            padding: 4rem 2rem;
            border-radius: 24px;
            text-align: center;
            margin: 4rem 0;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: white;
        }

        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            color: white;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-white {
            background: white;
            color: var(--primary);
        }

        .btn-outline-white {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline-white:hover {
            background: white;
            color: var(--primary);
        }

        /* Footer */
        footer {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-top: 1px solid var(--border);
            padding: 4rem 2rem 2rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .verified-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
            margin: 2rem 0;
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
        }

        .badge.solana { background: #9945FF; color: white; }
        .badge.gdpr { background: #059669; color: white; }
        .badge.ssl { background: #00d664; color: white; }
        .badge.secure-payment { background: #dc2626; color: white; }

        .copyright {
            text-align: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border);
            opacity: 0.7;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .header-container {
                padding: 1rem;
            }
            
            .desktop-nav {
                display: none;
            }
            
            .hero {
                padding: 7rem 1rem 3rem;
            }
            
            .platform-badges,
            .features-grid,
            .categories-grid,
            .freelancers-grid,
            .how-it-works {
                grid-template-columns: 1fr;
            }
            
            .section {
                padding: 2rem 1rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 480px) {
            .freelancer-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Real-time Security Status -->
    <div class="security-status"></div>

    <!-- Site Header -->
    <header class="site-header">
        <div class="header-container">
            <a href="index.php">
                <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyXen Foundation" class="logo">
            </a>

            <nav class="desktop-nav">
                <a href="tokenomics.php">Tokenomics</a>
                <a href="whitepaper.php">Whitepaper</a>
                <a href="presale.php">Pre-Sale</a>
                <a href="student-rewards.php">Student Rewards</a>
                <a href="developers.php">Developers</a>
                <a href="myxen-work.php" class="active">MyXen.Work</a>
            </nav>

            <div class="header-actions">
                <button id="theme-toggle" class="theme-btn">☀️</button>
                <button id="connect-btn" class="connect-btn">Connect Wallet</button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>MYXEN.WORK FREELANCER PLATFORM</h1>
            <p>Work globally, get paid instantly in crypto. Enterprise-grade security meets decentralized freelancing.</p>
            
            <!-- Platform Badges -->
            <div class="platform-badges">
                <div class="platform-badge instant">
                    <div class="badge-icon">⚡</div>
                    <div>
                        <div>Instant Payments</div>
                        <small>Get paid in seconds, not weeks</small>
                    </div>
                </div>
                <div class="platform-badge global">
                    <div class="badge-icon">🌍</div>
                    <div>
                        <div>Global Access</div>
                        <small>Work with clients worldwide</small>
                    </div>
                </div>
                <div class="platform-badge secure">
                    <div class="badge-icon">🔒</div>
                    <div>
                        <div>Secure Escrow</div>
                        <small>Bank-grade payment protection</small>
                    </div>
                </div>
                <div class="platform-badge decentralized">
                    <div class="badge-icon">🚀</div>
                    <div>
                        <div>Decentralized</div>
                        <small>No middlemen, lower fees</small>
                    </div>
                </div>
            </div>
            
            <div class="hero-actions">
                <a href="#how-it-works" class="btn btn-primary">Start Freelancing</a>
                <a href="#find-talent" class="btn btn-secondary">Hire Talent</a>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="section" id="how-it-works">
        <div class="section-header">
            <h2 class="section-title">HOW MYXEN.WORK WORKS</h2>
            <p class="section-subtitle">Simple, secure, and efficient freelancing powered by blockchain</p>
        </div>
        
        <div class="how-it-works">
            <div class="work-step">
                <div class="step-number">1</div>
                <div class="step-icon">👤</div>
                <h3 class="step-title">Create Profile</h3>
                <p class="step-description">Set up your professional profile with skills, portfolio, and hourly rate. Get verified on the blockchain.</p>
            </div>
            
            <div class="work-step">
                <div class="step-number">2</div>
                <div class="step-icon">💼</div>
                <h3 class="step-title">Find Work</h3>
                <p class="step-description">Browse thousands of projects or get matched with clients. Bid on jobs that match your expertise.</p>
            </div>
            
            <div class="work-step">
                <div class="step-number">3</div>
                <div class="step-icon">🔒</div>
                <h3 class="step-title">Secure Escrow</h3>
                <p class="step-description">Client funds are locked in smart contract escrow. Work with complete payment security.</p>
            </div>
            
            <div class="work-step">
                <div class="step-number">4</div>
                <div class="step-icon">💰</div>
                <h3 class="step-title">Get Paid Instantly</h3>
                <p class="step-description">Receive payment in MYXN tokens immediately upon project completion. No waiting, no fees.</p>
            </div>
        </div>
    </section>

    <!-- Job Categories -->
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">POPULAR JOB CATEGORIES</h2>
            <p class="section-subtitle">Find work in your area of expertise</p>
        </div>
        
        <div class="categories-grid">
            <div class="category-card">
                <div class="category-icon">💻</div>
                <h3 class="category-name">Web Development</h3>
                <div class="job-count">1,247 active jobs</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">🎨</div>
                <h3 class="category-name">UI/UX Design</h3>
                <div class="job-count">892 active jobs</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">📱</div>
                <h3 class="category-name">Mobile Development</h3>
                <div class="job-count">734 active jobs</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">📊</div>
                <h3 class="category-name">Data Science</h3>
                <div class="job-count">567 active jobs</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">📝</div>
                <h3 class="category-name">Content Writing</h3>
                <div class="job-count">1,589 active jobs</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">🎬</div>
                <h3 class="category-name">Video Editing</h3>
                <div class="job-count">423 active jobs</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">🔍</div>
                <h3 class="category-name">Digital Marketing</h3>
                <div class="job-count">978 active jobs</div>
            </div>
            
            <div class="category-card">
                <div class="category-icon">🔧</div>
                <h3 class="category-name">Blockchain Development</h3>
                <div class="job-count">654 active jobs</div>
            </div>
        </div>
    </section>

    <!-- Top Freelancers -->
    <section class="section" id="find-talent">
        <div class="section-header">
            <h2 class="section-title">TOP FREELANCERS</h2>
            <p class="section-subtitle">Hire from our pool of verified professionals</p>
        </div>
        
        <div class="freelancers-grid">
            <div class="freelancer-card">
                <div class="freelancer-header">
                    <div class="freelancer-avatar">JS</div>
                    <div class="freelancer-info">
                        <h3>John Smith</h3>
                        <div class="freelancer-title">Senior Web Developer</div>
                        <div class="freelancer-rating">
                            <div class="stars">★★★★★</div>
                            <div class="rating-value">4.9/5</div>
                        </div>
                    </div>
                </div>
                
                <div class="freelancer-skills">
                    <span class="skill-tag">React</span>
                    <span class="skill-tag">Node.js</span>
                    <span class="skill-tag">TypeScript</span>
                    <span class="skill-tag">Web3</span>
                </div>
                
                <div class="freelancer-stats">
                    <div class="stat">
                        <div class="stat-value">127</div>
                        <div class="stat-label">Projects</div>
                    </div>
                    <div class="stat">
                        <div class="stat-value">98%</div>
                        <div class="stat-label">Success Rate</div>
                    </div>
                </div>
                
                <button class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Hire Now</button>
            </div>
            
            <div class="freelancer-card">
                <div class="freelancer-header">
                    <div class="freelancer-avatar">SD</div>
                    <div class="freelancer-info">
                        <h3>Sarah Davis</h3>
                        <div class="freelancer-title">UI/UX Designer</div>
                        <div class="freelancer-rating">
                            <div class="stars">★★★★★</div>
                            <div class="rating-value">4.8/5</div>
                        </div>
                    </div>
                </div>
                
                <div class="freelancer-skills">
                    <span class="skill-tag">Figma</span>
                    <span class="skill-tag">Adobe XD</span>
                    <span class="skill-tag">Prototyping</span>
                    <span class="skill-tag">User Research</span>
                </div>
                
                <div class="freelancer-stats">
                    <div class="stat">
                        <div class="stat-value">89</div>
                        <div class="stat-label">Projects</div>
                    </div>
                    <div class="stat">
                        <div class="stat-value">100%</div>
                        <div class="stat-label">Success Rate</div>
                    </div>
                </div>
                
                <button class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Hire Now</button>
            </div>
            
            <div class="freelancer-card">
                <div class="freelancer-header">
                    <div class="freelancer-avatar">MJ</div>
                    <div class="freelancer-info">
                        <h3>Mike Johnson</h3>
                        <div class="freelancer-title">Blockchain Developer</div>
                        <div class="freelancer-rating">
                            <div class="stars">★★★★★</div>
                            <div class="rating-value">5.0/5</div>
                        </div>
                    </div>
                </div>
                
                <div class="freelancer-skills">
                    <span class="skill-tag">Solidity</span>
                    <span class="skill-tag">Smart Contracts</span>
                    <span class="skill-tag">DeFi</span>
                    <span class="skill-tag">Web3.js</span>
                </div>
                
                <div class="freelancer-stats">
                    <div class="stat">
                        <div class="stat-value">156</div>
                        <div class="stat-label">Projects</div>
                    </div>
                    <div class="stat">
                        <div class="stat-value">99%</div>
                        <div class="stat-label">Success Rate</div>
                    </div>
                </div>
                
                <button class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Hire Now</button>
            </div>
        </div>
    </section>

    <!-- Platform Features -->
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">WHY CHOOSE MYXEN.WORK</h2>
            <p class="section-subtitle">Enterprise features for modern freelancers and clients</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🔐</div>
                <h3 class="feature-title">Smart Contract Escrow</h3>
                <p class="feature-description">Funds are secured in blockchain smart contracts. Payment released only when work is approved.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3 class="feature-title">Instant Payments</h3>
                <p class="feature-description">Receive payments in MYXN tokens within seconds. No bank delays or payment processing fees.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🌍</div>
                <h3 class="feature-title">Global Access</h3>
                <p class="feature-description">Work with clients from anywhere in the world. No geographical restrictions or currency conversion fees.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3 class="feature-title">Transparent Ratings</h3>
                <p class="feature-description">Immutable reputation system on blockchain. Real feedback from verified clients and freelancers.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h3 class="feature-title">Dispute Resolution</h3>
                <p class="feature-description">Decentralized arbitration system. Community-powered dispute resolution for fair outcomes.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">💎</div>
                <h3 class="feature-title">Lower Fees</h3>
                <p class="feature-description">Only 2% platform fee compared to 20% on traditional platforms. More earnings for freelancers.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section">
        <div class="cta-section">
            <h2>READY TO START FREELANCING?</h2>
            <p>Join thousands of professionals already earning on MyXen.Work</p>
            <div class="cta-buttons">
                <a href="#" class="btn btn-white">Create Freelancer Profile</a>
                <a href="#" class="btn btn-outline-white">Post a Job</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>MyXen.Work</h3>
                <p>Decentralized freelancer platform powered by blockchain technology</p>
                
                <div class="company-registration">
                    <p>🏢 <strong>MYXEN FOUNDATION</strong><br>Global Freelancer Platform</p>
                    <p>📧 <strong>SUPPORT:</strong> work@myxenpay.finance<br>☎️ <strong>HELP DESK:</strong> +1 (786) 509-7729</p>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#">For Freelancers</a></li>
                    <li><a href="#">For Clients</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Help Center</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Resources</h3>
                <ul class="footer-links">
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Community</a></li>
                    <li><a href="#">Success Stories</a></li>
                    <li><a href="#">Developer API</a></li>
                    <li><a href="#">Status</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Platform Verification Badges -->
        <div class="verified-badges">
            <span class="badge solana">✅ Powered by Solana</span>
            <span class="badge gdpr">🔒 GDPR Compliant</span>
            <span class="badge ssl">🔐 SSL SECURED</span>
            <span class="badge secure-payment">🛡️ Secure Escrow</span>
        </div>
        
        <div class="copyright">
            <p>© 2025 MyXen Foundation LTD. All rights reserved. | 🚀 MyXen.Work - Building the future of work, decentralized and secure.</p>
        </div>
    </footer>

    <script>
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

            document.getElementById('theme-toggle').addEventListener('click', function() {
                const current = document.body.getAttribute('data-theme');
                const newTheme = current === 'dark' ? 'light' : 'dark';
                
                document.body.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                
                const logo = document.getElementById('theme-logo');
                logo.src = newTheme === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
                
                this.textContent = newTheme === 'dark' ? '🌙' : '☀️';
            });
        }

        // Wallet Connection
        async function connectWallet() {
            const connectBtn = document.getElementById('connect-btn');
            
            if (window.walletConnected) {
                // Disconnect
                window.walletConnected = false;
                window.walletAddress = null;
                connectBtn.textContent = 'Connect Wallet';
                connectBtn.classList.remove('connected');
                return;
            }
            
            // Simulate wallet connection
            connectBtn.textContent = 'Connecting...';
            
            setTimeout(() => {
                window.walletConnected = true;
                window.walletAddress = '0x' + Math.random().toString(16).substr(2, 40);
                
                const truncatedAddress = window.walletAddress.substring(0, 6) + '...' + window.walletAddress.substring(38);
                connectBtn.textContent = `Connected: ${truncatedAddress}`;
                connectBtn.classList.add('connected');
            }, 2000);
        }

        // Initialize everything
        document.addEventListener('DOMContentLoaded', function() {
            initTheme();
            
            // Wallet connection
            document.getElementById('connect-btn').addEventListener('click', connectWallet);
            
            // Add interactivity to category cards
            document.querySelectorAll('.category-card').forEach(card => {
                card.addEventListener('click', function() {
                    const categoryName = this.querySelector('.category-name').textContent;
                    alert(`Exploring jobs in: ${categoryName}`);
                });
            });
            
            // Add interactivity to freelancer cards
            document.querySelectorAll('.freelancer-card .btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const freelancerName = this.closest('.freelancer-card').querySelector('h3').textContent;
                    alert(`Initiating hire process for: ${freelancerName}`);
                });
            });
        });
    </script>
</body>
</html>