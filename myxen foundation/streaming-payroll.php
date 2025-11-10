<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Streaming Payroll - Real-time Salary Payments | MyxenPay</title>
  <meta name="description" content="Revolutionize payroll with real-time salary streaming. Pay employees instantly on Solana blockchain with zero delays and minimal fees.">
  <meta property="og:title" content="Streaming Payroll - Real-time Salary Payments | MyxenPay">
  <meta property="og:description" content="Instant payroll processing, real-time salary streaming, and global payments on Solana.">
  <meta property="og:image" content="https://myxenpay.finance/og/streaming-payroll.jpg">
  <style>
    :root {
      --bg: #ffffff;
      --text: #111111;
      --card-bg: rgba(255, 255, 255, 0.7);
      --border: rgba(0, 0, 0, 0.05);
      --primary: #007AFF;
      --secondary: #30D158;
      --accent: #FF9F0A;
      --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
      --header-bg: rgba(255, 255, 255, 0.8);
      --shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
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
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      line-height: 1.6;
      padding-top: 80px;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Navigation */
    .top-nav {
      display: flex;
      justify-content: center;
      gap: 1.5rem;
      padding: 0.5rem 0;
      background: var(--header-bg);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
    }

    .top-nav a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 600;
      font-size: 0.95rem;
      transition: color 0.3s ease;
    }

    .top-nav a:hover {
      color: var(--accent);
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background: var(--header-bg);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border);
      position: fixed;
      top: 40px;
      left: 0;
      right: 0;
      z-index: 999;
    }

    .logo {
      height: 48px;
      width: auto;
      transition: transform 0.3s ease;
    }

    .logo:hover {
      transform: scale(1.05);
    }

    .header-actions {
      display: flex;
      gap: 0.8rem;
      align-items: center;
    }

    .theme-btn {
      background: none;
      border: 1px solid var(--border);
      width: 36px;
      height: 36px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    .theme-btn:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow);
    }

    .back-btn {
      color: var(--primary);
      text-decoration: none;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      transition: color 0.3s ease;
    }

    .back-btn:hover {
      color: var(--accent);
    }

    /* Hero Section */
    .hero {
      padding: 6rem 2rem 4rem;
      text-align: center;
      background: linear-gradient(135deg, var(--bg) 0%, var(--card-bg) 100%);
    }

    .hero h1 {
      font-size: 3.5rem;
      font-weight: 800;
      line-height: 1.1;
      margin-bottom: 1.5rem;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero p {
      font-size: 1.4rem;
      max-width: 800px;
      margin: 0 auto 2rem;
      opacity: 0.8;
    }

    .hero-stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
      max-width: 800px;
      margin: 3rem auto;
    }

    .stat {
      text-align: center;
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: 800;
      color: var(--primary);
      display: block;
    }

    .stat-label {
      opacity: 0.7;
      font-size: 0.9rem;
    }

    /* Comparison Section */
    .comparison {
      padding: 4rem 2rem;
      background: var(--bg);
    }

    .section-title {
      text-align: center;
      font-size: 2.5rem;
      margin-bottom: 3rem;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-weight: 800;
    }

    .comparison-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .comparison-card {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 2.5rem;
      text-align: center;
      position: relative;
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: transform 0.3s ease;
    }

    .comparison-card:hover {
      transform: translateY(-5px);
    }

    .comparison-card.bad::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: #FF453A;
    }

    .comparison-card.good::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: var(--secondary);
    }

    .comparison-icon {
      font-size: 3rem;
      margin-bottom: 1.5rem;
    }

    .comparison-card h3 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }

    .feature-list {
      list-style: none;
      text-align: left;
    }

    .feature-list li {
      margin-bottom: 0.8rem;
      padding-left: 1.5rem;
      position: relative;
    }

    .feature-list li:before {
      content: "•";
      color: var(--secondary);
      font-weight: bold;
      position: absolute;
      left: 0;
    }

    .feature-list.bad li:before {
      color: #FF453A;
    }

    /* How It Works */
    .how-it-works {
      padding: 4rem 2rem;
      background: linear-gradient(135deg, var(--card-bg) 0%, var(--bg) 100%);
    }

    .steps {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      max-width: 1000px;
      margin: 0 auto;
    }

    .step {
      text-align: center;
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 2rem;
      position: relative;
      box-shadow: var(--shadow);
      transition: transform 0.3s ease;
    }

    .step:hover {
      transform: translateY(-5px);
    }

    .step-number {
      width: 40px;
      height: 40px;
      background: var(--gradient);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      margin: 0 auto 1rem;
    }

    /* Features Grid */
    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 3rem auto;
      padding: 0 2rem;
    }

    .feature-card {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 2.5rem 2rem;
      text-align: center;
      transition: transform 0.3s ease;
      box-shadow: var(--shadow);
    }

    .feature-card:hover {
      transform: translateY(-5px);
    }

    .feature-icon {
      font-size: 3rem;
      margin-bottom: 1.5rem;
    }

    /* Use Cases */
    .use-cases {
      padding: 4rem 2rem;
      background: var(--bg);
    }

    .case-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .case-card {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 2rem;
      box-shadow: var(--shadow);
      transition: transform 0.3s ease;
    }

    .case-card:hover {
      transform: translateY(-5px);
    }

    .case-card h3 {
      color: var(--primary);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    /* Social Share */
    .social-share {
      padding: 3rem 2rem;
      text-align: center;
      background: var(--card-bg);
      margin: 2rem 0;
    }

    .share-buttons {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-top: 1.5rem;
      flex-wrap: wrap;
    }

    .share-btn {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.8rem 1.5rem;
      border-radius: 12px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      border: 1px solid var(--border);
      background: var(--card-bg);
      color: var(--text);
    }

    .share-btn:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow);
    }

    .share-btn.twitter { background: #1DA1F2; color: white; border-color: #1DA1F2; }
    .share-btn.linkedin { background: #0077B5; color: white; border-color: #0077B5; }
    .share-btn.facebook { background: #4267B2; color: white; border-color: #4267B2; }
    .share-btn.telegram { background: #0088cc; color: white; border-color: #0088cc; }

    /* CTA Section */
    .cta-section {
      padding: 6rem 2rem;
      text-align: center;
      background: var(--gradient);
      color: white;
      margin: 4rem 0;
    }

    .cta-section h2 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .cta-buttons {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-top: 2rem;
      flex-wrap: wrap;
    }

    .btn {
      background: white;
      color: var(--primary);
      text-decoration: none;
      padding: 1rem 2rem;
      border-radius: 15px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .btn-outline {
      background: transparent;
      border: 2px solid white;
      color: white;
    }

    /* FAQ */
    .faq {
      padding: 4rem 2rem;
      max-width: 800px;
      margin: 0 auto;
    }

    .faq-item {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 15px;
      padding: 1.5rem;
      margin-bottom: 1rem;
      box-shadow: var(--shadow);
      transition: transform 0.3s ease;
    }

    .faq-item:hover {
      transform: translateY(-2px);
    }

    .faq-question {
      font-weight: 600;
      font-size: 1.1rem;
      margin-bottom: 0.5rem;
      color: var(--primary);
    }

    /* Footer */
    footer {
      background: var(--card-bg);
      border-top: 1px solid var(--border);
      padding: 3rem 2rem 2rem;
      text-align: center;
    }

    .footer-links {
      display: flex;
      justify-content: center;
      gap: 2rem;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }

    .footer-links a {
      color: var(--text);
      text-decoration: none;
      opacity: 0.8;
      transition: opacity 0.3s ease;
    }

    .footer-links a:hover {
      opacity: 1;
      color: var(--primary);
    }

    @media (max-width: 768px) {
      .hero h1 {
        font-size: 2.5rem;
      }
      
      .hero p {
        font-size: 1.2rem;
      }
      
      .cta-buttons {
        flex-direction: column;
        align-items: center;
      }
      
      .btn {
        width: 100%;
        max-width: 300px;
      }

      .share-buttons {
        flex-direction: column;
        align-items: center;
      }

      .share-btn {
        width: 100%;
        max-width: 250px;
        justify-content: center;
      }

      header {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <!-- Top Navigation -->
  <nav class="top-nav">
    <a href="tokenomics.html">Tokenomics</a>
    <a href="merchant.html">Merchant QR</a>
    <a href="student-rewards.html">Student Rewards</a>
    <a href="Retail_&_Commerce.php">Retail & Commerce</a>
  </nav>

  <!-- Header -->
  <header>
    <a href="index.php" class="back-btn">← Back to Home</a>
    <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyxenPay" class="logo">
    <div class="header-actions">
      <button id="theme-toggle" class="theme-btn">☀️</button>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <h1>Streaming Payroll</h1>
    <p>Real-time salary payments on Solana. Pay employees instantly, anywhere in the world.</p>
    
    <div class="hero-stats">
      <div class="stat">
        <span class="stat-number">Instant</span>
        <span class="stat-label">Payment Processing</span>
      </div>
      <div class="stat">
        <span class="stat-number">0.5%</span>
        <span class="stat-label">Average Fees</span>
      </div>
      <div class="stat">
        <span class="stat-number">24/7</span>
        <span class="stat-label">Global Payments</span>
      </div>
      <div class="stat">
        <span class="stat-number">$0</span>
        <span class="stat-label">Chargebacks</span>
      </div>
    </div>
  </section>

  <!-- Social Share Section -->
  <section class="social-share">
    <h2 class="section-title">Share This Innovation</h2>
    <p>Help others discover the future of payroll processing</p>
    <div class="share-buttons">
      <a href="https://twitter.com/intent/tweet?text=Revolutionize%20your%20payroll%20with%20real-time%20salary%20streaming%20on%20%40MyxenPay%20-%20instant%20payments%2C%200.5%25%20fees%2C%20global%20reach%20on%20Solana%20blockchain%20%F0%9F%9A%80&url=https://myxenpay.finance/streaming-payroll.html" 
         class="share-btn twitter" target="_blank">
        <span>🐦</span> Share on Twitter
      </a>
      <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://myxenpay.finance/streaming-payroll.html" 
         class="share-btn linkedin" target="_blank">
        <span>💼</span> Share on LinkedIn
      </a>
      <a href="https://www.facebook.com/sharer/sharer.php?u=https://myxenpay.finance/streaming-payroll.html" 
         class="share-btn facebook" target="_blank">
        <span>📘</span> Share on Facebook
      </a>
      <a href="https://t.me/share/url?url=https://myxenpay.finance/streaming-payroll.html&text=Check%20out%20MyxenPay%20Streaming%20Payroll%20-%20Real-time%20salary%20payments%20on%20Solana%20blockchain%20%F0%9F%92%B0" 
         class="share-btn telegram" target="_blank">
        <span>📢</span> Share on Telegram
      </a>
    </div>
  </section>

  <!-- Comparison Section -->
  <section class="comparison">
    <h2 class="section-title">Traditional vs Streaming Payroll</h2>
    <div class="comparison-grid">
      <div class="comparison-card bad">
        <div class="comparison-icon">⏳</div>
        <h3>Traditional Payroll</h3>
        <ul class="feature-list bad">
          <li>2-5 day processing delays</li>
          <li>3-5% bank and processor fees</li>
          <li>Limited to business hours</li>
          <li>Geographical restrictions</li>
          <li>High international transfer costs</li>
          <li>Monthly or bi-weekly cycles only</li>
        </ul>
      </div>
      
      <div class="comparison-card good">
        <div class="comparison-icon">⚡</div>
        <h3>Streaming Payroll</h3>
        <ul class="feature-list">
          <li>Real-time salary payments</li>
          <li>0.5% transaction fees</li>
          <li>24/7 instant processing</li>
          <li>Global reach, no borders</li>
          <li>No international fees</li>
          <li>Flexible payment schedules</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- How It Works -->
  <section class="how-it-works">
    <h2 class="section-title">How Streaming Payroll Works</h2>
    <div class="steps">
      <div class="step">
        <div class="step-number">1</div>
        <h3>Connect Wallet</h3>
        <p>Employer connects Solana wallet with sufficient funds</p>
      </div>
      <div class="step">
        <div class="step-number">2</div>
        <h3>Set Up Employees</h3>
        <p>Add employee wallet addresses and salary amounts</p>
      </div>
      <div class="step">
        <div class="step-number">3</div>
        <h3>Choose Schedule</h3>
        <p>Set real-time streaming or scheduled payments</p>
      </div>
      <div class="step">
        <div class="step-number">4</div>
        <h3>Stream Payments</h3>
        <p>Salaries are paid instantly or as earned</p>
      </div>
    </div>
  </section>

  <!-- Key Features -->
  <section class="features">
    <h2 class="section-title">Key Features</h2>
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon">🌍</div>
        <h3>Global Payments</h3>
        <p>Pay employees anywhere in the world without geographical restrictions or extra fees</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">💸</div>
        <h3>Lowest Fees</h3>
        <p>Only 0.5% transaction fees compared to 3-5% with traditional payment processors</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">⚡</div>
        <h3>Instant Processing</h3>
        <p>No more waiting for bank processing - payments settle in seconds, not days</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">🔒</div>
        <h3>Secure & Transparent</h3>
        <p>All transactions recorded on Solana blockchain with complete transparency</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">🔄</div>
        <h3>Real-time Streaming</h3>
        <p>Pay employees as they work with real-time salary streaming options</p>
      </div>
      <div class="feature-card">
        <div class="feature-icon">📊</div>
        <h3>Automated Reporting</h3>
        <p>Automatic payroll records, tax documentation, and payment history</p>
      </div>
    </div>
  </section>

  <!-- Use Cases -->
  <section class="use-cases">
    <h2 class="section-title">Perfect For</h2>
    <div class="case-grid">
      <div class="case-card">
        <h3>🏢 Remote Teams</h3>
        <p>Global companies with remote employees across different time zones and countries</p>
      </div>
      <div class="case-card">
        <h3>🚀 Startups</h3>
        <p>Fast-growing companies needing flexible payroll without traditional banking hurdles</p>
      </div>
      <div class="case-card">
        <h3>🎯 Freelancers</h3>
        <p>Independent contractors and gig economy workers receiving project-based payments</p>
      </div>
      <div class="case-card">
        <h3>🌏 International Businesses</h3>
        <p>Companies with global operations needing to pay teams across multiple countries</p>
      </div>
      <div class="case-card">
        <h3>⏱️ Hourly Workers</h3>
        <p>Employees who prefer real-time payment for hours worked instead of waiting for payday</p>
      </div>
      <div class="case-card">
        <h3>💻 Tech Companies</h3>
        <p>Technology firms embracing blockchain and modern payment solutions</p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section">
    <h2>Ready to Revolutionize Your Payroll?</h2>
    <p>Join hundreds of businesses already using MyxenPay Streaming Payroll</p>
    <div class="cta-buttons">
      <a href="merchant.html" class="btn">Get Started Now</a>
      <a href="contact.html" class="btn btn-outline">Schedule Demo</a>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="faq">
    <h2 class="section-title">Frequently Asked Questions</h2>
    
    <div class="faq-item">
      <div class="faq-question">How is this different from traditional payroll?</div>
      <p>Traditional payroll processes payments in batches with 2-5 day delays. Streaming payroll enables real-time payments on Solana blockchain, eliminating delays and reducing fees from 3-5% to just 0.5%.</p>
    </div>
    
    <div class="faq-item">
      <div class="faq-question">Do employees need crypto wallets?</div>
      <p>Yes, employees need Solana-compatible wallets (like Phantom or Backpack). We provide easy onboarding guides to help employees set up wallets in minutes.</p>
    </div>
    
    <div class="faq-item">
      <div class="faq-question">What about taxes and compliance?</div>
      <p>We provide automated reporting for all transactions. Employers receive detailed records for tax purposes, and we're working with regulatory bodies to ensure full compliance.</p>
    </div>
    
    <div class="faq-item">
      <div class="faq-question">Can employees convert to local currency?</div>
      <p>Yes, employees can easily convert SOL or USDC to their local currency through various exchanges or use our integrated conversion tools.</p>
    </div>
    
    <div class="faq-item">
      <div class="faq-question">Is there a minimum company size?</div>
      <p>No! Streaming payroll works for companies of all sizes - from solo entrepreneurs to enterprises with thousands of employees.</p>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-links">
      <a href="index.php">Home</a>
      <a href="merchant.html">Merchant QR</a>
      <a href="student-rewards.html">Student Rewards</a>
      <a href="tokenomics.html">Tokenomics</a>
      <a href="privacy.html">Privacy Policy</a>
      <a href="terms.html">Terms of Service</a>
    </div>
    <p>© 2025 MyxenPay Ltd. Revolutionizing global payments on Solana.</p>
  </footer>

  <script>
    // Theme functionality (same as index.php)
    function initTheme() {
      const saved = localStorage.getItem('theme');
      const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      
      if (saved) {
        document.body.setAttribute('data-theme', saved);
        updateThemeUI(saved);
      } else if (prefersDark) {
        document.body.setAttribute('data-theme', 'dark');
        updateThemeUI('dark');
        localStorage.setItem('theme', 'dark');
      } else {
        document.body.setAttribute('data-theme', 'light');
        updateThemeUI('light');
        localStorage.setItem('theme', 'light');
      }
    }

    function updateThemeUI(theme) {
      const themeBtn = document.getElementById('theme-toggle');
      const logo = document.getElementById('theme-logo');
      
      if (theme === 'dark') {
        themeBtn.textContent = '🌙';
        logo.src = 'myxenpay-logo-dark.png';
      } else {
        themeBtn.textContent = '☀️';
        logo.src = 'myxenpay-logo-light.png';
      }
    }

    document.getElementById('theme-toggle').addEventListener('click', () => {
      const current = document.body.getAttribute('data-theme');
      const newTheme = current === 'dark' ? 'light' : 'dark';
      
      document.body.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      updateThemeUI(newTheme);
    });

    // Copy URL function for social sharing
    function copyPageUrl() {
      const url = window.location.href;
      navigator.clipboard.writeText(url).then(() => {
        alert('Page URL copied to clipboard!');
      });
    }

    // Initialize theme when page loads
    document.addEventListener('DOMContentLoaded', initTheme);
  </script>
  <script>
    // Copy protection (same as index.php)
    document.addEventListener('contextmenu', e => e.preventDefault());
    document.addEventListener('selectstart', e => e.preventDefault());
    document.addEventListener('keydown', e => {
        if (e.ctrlKey && (e.key === 'u' || e.key === 'U' || e.key === 's' || e.key === 'S')) {
            e.preventDefault();
        }
    });

    // Add payroll system link
    document.addEventListener('DOMContentLoaded', function() {
        // Add admin link to footer
        const footerLinks = document.querySelector('.footer-links');
        if (footerLinks) {
            const adminLink = document.createElement('a');
            adminLink.href = 'Payroll-admin.php';
            adminLink.textContent = 'Payroll Admin';
            adminLink.style.color = 'var(--primary)';
            footerLinks.appendChild(adminLink);
        }
        
        // Add payroll CTA section
        const ctaSection = document.querySelector('.cta-section');
        if (ctaSection) {
            const payrollBtn = document.createElement('a');
            payrollBtn.href = 'Payroll-admin.php';
            payrollBtn.className = 'btn btn-outline';
            payrollBtn.style.marginLeft = '10px';
            payrollBtn.textContent = 'Access Payroll System';
            ctaSection.querySelector('.cta-buttons').appendChild(payrollBtn);
        }
    });
</script>
</body>
</html>