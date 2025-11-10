<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyXen.Meme - Fuel System of MyXen Foundation</title>
    <style>
        :root {
            --primary: #4a00e0;
            --secondary: #8e2de2;
            --accent: #00c6ff;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: var(--light);
            line-height: 1.6;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header Styles */
        header {
            padding: 20px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            background: rgba(26, 26, 46, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
        }
        
        .logo span {
            color: var(--accent);
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
        }
        
        nav a {
            color: var(--light);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        nav a:hover {
            color: var(--accent);
        }
        
        .cta-button {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        /* Hero Section */
        .hero {
            padding: 160px 0 100px;
            text-align: center;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 800" opacity="0.1"><path d="M0,0 L1200,800 L0,800 Z" fill="%2300c6ff"/></svg>') no-repeat center center;
            background-size: cover;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            background: linear-gradient(to right, var(--accent), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            color: rgba(255, 255, 255, 0.8);
        }
        
        /* Section Styles */
        section {
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.5rem;
        }
        
        .section-title span {
            color: var(--accent);
        }
        
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }
        
        .card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--accent);
        }
        
        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--accent);
        }
        
        /* Revenue Section */
        .revenue-breakdown {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        
        .revenue-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .revenue-card h4 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: var(--accent);
        }
        
        .percentage {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 15px 0;
            color: var(--accent);
        }
        
        /* Timeline */
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 50px auto;
        }
        
        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background: var(--accent);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }
        
        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }
        
        .timeline-item:nth-child(odd) {
            left: 0;
        }
        
        .timeline-item:nth-child(even) {
            left: 50%;
        }
        
        .timeline-content {
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .timeline-content h4 {
            margin-bottom: 10px;
            color: var(--accent);
        }
        
        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.3);
            padding: 50px 0 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .footer-column h4 {
            margin-bottom: 20px;
            color: var(--accent);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-column a:hover {
            color: var(--accent);
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            nav ul {
                display: none;
            }
            
            .timeline::after {
                left: 31px;
            }
            
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }
            
            .timeline-item:nth-child(even) {
                left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <span>MyXen</span>.Meme
                </div>
                <nav>
                    <ul>
                        <li><a href="#about">About</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#revenue">Revenue</a></li>
                        <li><a href="#process">Process</a></li>
                        <li><a href="#benefits">Benefits</a></li>
                    </ul>
                </nav>
                <button class="cta-button">Join Community</button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Fueling the Future of Meme Tokens</h1>
            <p>MyXen.Meme is the revolutionary fuel system of MyXen Foundation, creating sustainable value through fair-launch meme tokens on Pump Fun with transparent revenue generation.</p>
            <button class="cta-button">Explore Our Ecosystem</button>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <h2 class="section-title">About <span>MyXen.Meme</span></h2>
            <div class="card-grid">
                <div class="card">
                    <div class="card-icon">🚀</div>
                    <h3>Fair Launch Only</h3>
                    <p>Exclusively launched on Pump Fun with no insider advantages, ensuring equal opportunity for all participants.</p>
                </div>
                <div class="card">
                    <div class="card-icon">🛡️</div>
                    <h3>100% Backed by MyXen Team</h3>
                    <p>Full support from MyXen Devs Team and Marketing Team with all revenue directed to the MyXen Foundation.</p>
                </div>
                <div class="card">
                    <div class="card-icon">💎</div>
                    <h3>Revenue Generation</h3>
                    <p>Creating sustainable value through carefully designed meme tokens with transparent revenue allocation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" style="background: rgba(0, 0, 0, 0.2);">
        <div class="container">
            <h2 class="section-title">Key <span>Features</span></h2>
            <div class="card-grid">
                <div class="card">
                    <h3>Dex Pay & Verified X Handle</h3>
                    <p>All revenue supports Dex operations and verified X handles for enhanced community engagement.</p>
                </div>
                <div class="card">
                    <h3>20% Buy Back & Lock</h3>
                    <p>Strategic token buyback with 6-month locking mechanism to ensure price stability and long-term value.</p>
                </div>
                <div class="card">
                    <h3>Top Holder Rewards</h3>
                    <p>Top 50 holders in 24-hour periods receive 10% distribution from buyback functions.</p>
                </div>
                <div class="card">
                    <h3>Monthly Token Launches</h3>
                    <p>Maximum of 5 tokens published monthly with quarterly voting for utility token selection.</p>
                </div>
                <div class="card">
                    <h3>Transparent Operations</h3>
                    <p>All transactions and revenue spending displayed on each token's dashboard for complete transparency.</p>
                </div>
                <div class="card">
                    <h3>Community Protection</h3>
                    <p>Eligibility for education, accident, and family protection benefits for dedicated participants.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Revenue Section -->
    <section id="revenue">
        <div class="container">
            <h2 class="section-title">Revenue <span>Breakdown</span></h2>
            <h3 style="text-align: center; margin-bottom: 30px; color: var(--accent);">From Creator Fee (24-Hour Cycle)</h3>
            <div class="revenue-breakdown">
                <div class="revenue-card">
                    <h4>Ecosystem Development</h4>
                    <div class="percentage">50%</div>
                    <p>For MyXen Foundation Ecosystem Development</p>
                </div>
                <div class="revenue-card">
                    <h4>DEX & Marketing</h4>
                    <div class="percentage">30%</div>
                    <p>For DEX operations, community growth, and marketing initiatives</p>
                </div>
                <div class="revenue-card">
                    <h4>Donation</h4>
                    <div class="percentage">20%</div>
                    <p>Directed to charitable causes and community support</p>
                </div>
            </div>
            
            <h3 style="text-align: center; margin: 50px 0 30px; color: var(--accent);">From Buy Back Sale Revenue</h3>
            <div class="card-grid">
                <div class="card">
                    <h3>10% Token Lock</h3>
                    <p>Initial 10% of tokens locked for 6 months in MyXen Treasury</p>
                </div>
                <div class="card">
                    <h3>20% Team Allocation</h3>
                    <p>Team buys maximum 20% of tokens for revenue generation</p>
                </div>
                <div class="card">
                    <h3>70% Public Funds</h3>
                    <p>Remaining tokens allocated for public participation</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section id="process" style="background: rgba(0, 0, 0, 0.2);">
        <div class="container">
            <h2 class="section-title">Our <span>Process</span></h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h4>Token Design</h4>
                        <p>Team designs projects with only the Head Coordinator knowing which token will launch</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h4>Fair Launch</h4>
                        <p>Exclusive launch on Pump Fun platform with no insider advantages</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h4>Revenue Generation</h4>
                        <p>Strategic buyback and revenue allocation according to transparent rules</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h4>Community Voting</h4>
                        <p>Quarterly voting to select one meme token for utility conversion and CEX listing</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h4>Benefit Distribution</h4>
                        <p>Rewards and protection benefits distributed to eligible community members</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits">
        <div class="container">
            <h2 class="section-title">Community <span>Benefits</span></h2>
            <div class="card-grid">
                <div class="card">
                    <h3>Eligibility Criteria</h3>
                    <p>Participants in 40 out of 60 projects in a financial year with minimum $2500 investment in one week become eligible for our protection programs.</p>
                </div>
                <div class="card">
                    <h3>Protection Programs</h3>
                    <p>Education support, accident coverage, and after-death renomination benefits for verified community members.</p>
                </div>
                <div class="card">
                    <h3>Our Mission</h3>
                    <p>MyXen Foundation is not just a token - it's a system for using crypto in daily life, trading responsibly, and securing your family's future.</p>
                </div>
            </div>
            <div style="text-align: center; margin-top: 50px;">
                <h3 style="color: var(--accent); margin-bottom: 20px;">We Are Always Beside You</h3>
                <p style="max-width: 800px; margin: 0 auto;">Trade with responsibility while knowing that your future and your family's security are protected through our innovative ecosystem.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h4>MyXen.Meme</h4>
                    <p>The fuel system of MyXen Foundation, creating sustainable value through meme tokens with transparent revenue allocation.</p>
                </div>
                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#about">About</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#revenue">Revenue Model</a></li>
                        <li><a href="#process">Our Process</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Whitepaper</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Connect With Us</h4>
                    <ul>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Telegram</a></li>
                        <li><a href="#">Discord</a></li>
                        <li><a href="#">Medium</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 MyXen.Meme - Fuel System of MyXen Foundation. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('nav a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            });
        });

        // Add animation to cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card, .revenue-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>