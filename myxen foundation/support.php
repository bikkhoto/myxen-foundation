<?php
// Handle support form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_data = [
        'ticket_id' => 'TKT' . time() . rand(100, 999),
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'subject' => $_POST['subject'],
        'category' => $_POST['category'],
        'priority' => $_POST['priority'],
        'message' => $_POST['message'],
        'status' => 'open',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
    
    // Ensure data directory exists
    if (!is_dir('data')) {
        mkdir('data', 0755, true);
    }
    
    // Save to JSON file
    $tickets = json_decode(file_get_contents('data/support_tickets.json'), true) ?? [];
    $tickets[] = $ticket_data;
    file_put_contents('data/support_tickets.json', json_encode($tickets, JSON_PRETTY_PRINT));
    
    $success = "Support ticket submitted successfully! Your ticket ID: " . $ticket_data['ticket_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Support - MyXen Foundation – Building a Decentralized Tomorrow</title>
    <meta name="description" content="Get help and support for MyXen Foundation. Contact our team for assistance with any questions or issues.">
    
    <style>
        /* CSS Variables */
        :root {
            --primary: #007aff;
            --primary-dark: #0056cc;
            --secondary: #6e45e2;
            --accent: #ff2d75;
            --bg: #0a0a0a;
            --bg-light: #1a1a1a;
            --text: #ffffff;
            --text-muted: #a0a0a0;
            --card-bg: rgba(255, 255, 255, 0.05);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --border: rgba(255, 255, 255, 0.1);
            --success: #34c759;
            --warning: #ffcc00;
            --danger: #ff3b30;
        }

        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 50%, #0a0a0a 100%);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Header Styles */
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 1rem 2rem;
            z-index: 1000;
            background: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            height: 40px;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .desktop-nav {
            display: flex;
            gap: 2rem;
        }

        .desktop-nav a {
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
        }

        .desktop-nav a:hover {
            background: var(--glass-bg);
        }

        .desktop-nav a.active {
            background: var(--primary);
            color: white;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .theme-btn, .connect-btn {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            color: var(--text);
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .theme-btn:hover, .connect-btn:hover {
            background: var(--primary);
            transform: translateY(-2px);
        }

        .mobile-nav-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text);
            font-size: 1.5rem;
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .mobile-nav-toggle:hover {
            background: var(--glass-bg);
        }

        .mobile-nav {
            display: none;
            position: fixed;
            top: 80px;
            left: 0;
            width: 100%;
            background: rgba(10, 10, 10, 0.95);
            backdrop-filter: blur(20px);
            padding: 2rem;
            flex-direction: column;
            gap: 1rem;
            z-index: 999;
            border-top: 1px solid var(--glass-border);
        }

        .mobile-nav.active {
            display: flex;
        }

        .mobile-nav a {
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            padding: 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .mobile-nav a:hover, .mobile-nav a.active {
            background: var(--glass-bg);
        }

        /* Hero Section */
        .support-hero {
            padding: 12rem 2rem 6rem;
            text-align: center;
            background: radial-gradient(circle at top center, rgba(110, 69, 226, 0.2) 0%, transparent 50%);
            position: relative;
            overflow: hidden;
        }

        .support-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="%23007aff" stop-opacity=".1"/><stop offset="1" stop-color="%23007aff" stop-opacity="0"/></radialGradient></defs><rect width="100%" height="100%" fill="url(%23a)"/></svg>') no-repeat center center;
            background-size: cover;
            opacity: 0.5;
            z-index: -1;
        }

        .support-hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .support-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .support-hero p {
            font-size: 1.25rem;
            color: var(--text-muted);
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Section Styles */
        .section {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-subtitle {
            font-size: 1.125rem;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Support Grid */
        .support-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .support-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 2.5rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .support-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .support-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }

        .support-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        .support-card p {
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }

        /* Support Form */
        .support-form-container {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 3rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text);
        }

        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: transparent;
            color: var(--text);
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.1);
        }

        .form-textarea {
            min-height: 150px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 122, 255, 0.3);
        }

        .btn-secondary {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            color: var(--text);
        }

        .btn-secondary:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .success-message {
            background: rgba(52, 199, 89, 0.2);
            color: var(--success);
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            border: 1px solid rgba(52, 199, 89, 0.3);
            text-align: center;
        }

        /* FAQ Section */
        .faq-grid {
            display: grid;
            gap: 1.5rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: var(--primary);
        }

        .faq-question {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        .faq-answer {
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* Footer */
        footer {
            background: rgba(10, 10, 10, 0.9);
            backdrop-filter: blur(20px);
            border-top: 1px solid var(--glass-border);
            padding: 4rem 2rem 2rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .company-registration {
            margin-top: 1.5rem;
        }

        .company-registration p {
            margin-bottom: 1rem;
            color: var(--text-muted);
        }

        .verified-badges {
            max-width: 1200px;
            margin: 0 auto 2rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
        }

        .copyright {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid var(--glass-border);
            color: var(--text-muted);
        }

        /* Animation Classes */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .desktop-nav {
                display: none;
            }

            .mobile-nav-toggle {
                display: flex;
            }

            .support-hero {
                padding: 10rem 1.5rem 4rem;
            }

            .support-hero h1 {
                font-size: 2.5rem;
            }

            .section {
                padding: 3rem 1.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .support-form-container {
                padding: 2rem 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
  <!-- Site Header -->
  <header class="site-header">
    <div class="header-container">
      <!-- Logo -->
      <a href="index.php">
        <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyXen Foundation" class="logo">
      </a>

      <!-- Mobile Navigation Toggle -->
      <button class="mobile-nav-toggle" id="mobile-nav-toggle">
        <span>☰</span>
      </button>

      <!-- Desktop Navigation -->
      <nav class="desktop-nav">
        <a href="tokenomics.php">Tokenomics</a>
        <a href="whitepaper.php">Whitepaper</a>
        <a href="presale.php">Pre-Sale</a>
        <a href="student-rewards.php">Student Rewards</a>
        <a href="developers.php">Developers</a>
        <a href="merchants.php">For Businesses</a>
        <a href="careers.php">Careers</a>
        <a href="support.php" class="active">Support</a>
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
    <a href="tokenomics.php">Tokenomics</a>
    <a href="whitepaper.php">Whitepaper</a>
    <a href="presale.php">Pre-Sale</a>
    <a href="student-rewards.php">Student Rewards</a>
    <a href="developers.php">Developers</a>
    <a href="merchants.php">For Businesses</a>
    <a href="careers.php">Careers</a>
    <a href="support.php" class="active">Support</a>
  </nav>

  <!-- Hero Section -->
  <section class="support-hero">
    <div class="support-hero-content fade-in-up">
      <h1>How Can We Help You?</h1>
      <p>Our support team is here to assist you with any questions or issues you may have about MyXen Foundation.</p>
      <a href="#support-form" class="btn btn-primary">Get Support</a>
    </div>
  </section>

  <!-- Support Options Section -->
  <section class="section">
    <div class="section-header">
      <h2 class="section-title">Support Options</h2>
      <p class="section-subtitle">Choose the best way to get the help you need</p>
    </div>
    
    <div class="support-grid">
      <div class="support-card fade-in-up">
        <div class="support-icon">🎫</div>
        <h3>Submit a Ticket</h3>
        <p>Create a support ticket for technical issues, account problems, or general inquiries.</p>
        <a href="#support-form" class="btn btn-primary">Submit Ticket</a>
      </div>
      
      <div class="support-card fade-in-up">
        <div class="support-icon">📧</div>
        <h3>Email Support</h3>
        <p>Reach out to our support team directly via email for personalized assistance.</p>
        <a href="mailto:support@myxenpay.finance" class="btn btn-secondary">support@myxenpay.finance</a>
      </div>
      
      <div class="support-card fade-in-up">
        <div class="support-icon">📚</div>
        <h3>Documentation</h3>
        <p>Browse our comprehensive documentation and FAQ for quick answers.</p>
        <a href="whitepaper.php" class="btn btn-secondary">View Docs</a>
      </div>
    </div>
  </section>

  <!-- Support Form Section -->
  <section class="section" id="support-form">
    <div class="section-header">
      <h2 class="section-title">Submit Support Request</h2>
      <p class="section-subtitle">Fill out the form below and we'll get back to you as soon as possible</p>
    </div>
    
    <div class="support-form-container">
      <?php if (isset($success)): ?>
        <div class="success-message">
          <?= $success ?>
        </div>
      <?php endif; ?>
      
      <form method="POST">
        <div class="form-row">
          <div class="form-group">
            <label for="name" class="form-label">Full Name *</label>
            <input type="text" id="name" name="name" class="form-input" required>
          </div>
          <div class="form-group">
            <label for="email" class="form-label">Email Address *</label>
            <input type="email" id="email" name="email" class="form-input" required>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group">
            <label for="category" class="form-label">Category *</label>
            <select id="category" name="category" class="form-select" required>
              <option value="">Select category</option>
              <option value="technical">Technical Issue</option>
              <option value="account">Account Problem</option>
              <option value="billing">Billing Question</option>
              <option value="general">General Inquiry</option>
              <option value="partnership">Partnership</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="priority" class="form-label">Priority *</label>
            <select id="priority" name="priority" class="form-select" required>
              <option value="low">Low</option>
              <option value="medium" selected>Medium</option>
              <option value="high">High</option>
              <option value="urgent">Urgent</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label for="subject" class="form-label">Subject *</label>
          <input type="text" id="subject" name="subject" class="form-input" required>
        </div>
        
        <div class="form-group">
          <label for="message" class="form-label">Message *</label>
          <textarea id="message" name="message" class="form-textarea" placeholder="Please describe your issue or question in detail..." required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary" style="width: 100%;">
          Submit Support Request
        </button>
      </form>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="section">
    <div class="section-header">
      <h2 class="section-title">Frequently Asked Questions</h2>
      <p class="section-subtitle">Quick answers to common questions</p>
    </div>
    
    <div class="faq-grid">
      <div class="faq-item fade-in-up">
        <div class="faq-question">What is MyXen Foundation?</div>
        <div class="faq-answer">
          MyXen Foundation is building a decentralized financial ecosystem that empowers users through blockchain technology, 
          providing transparent and accessible financial services to everyone.
        </div>
      </div>
      
      <div class="faq-item fade-in-up">
        <div class="faq-question">How do I participate in the pre-sale?</div>
        <div class="faq-answer">
          Visit our Pre-Sale page to learn about participation requirements, timelines, and how to connect your wallet 
          to participate in the token sale.
        </div>
      </div>
      
      <div class="faq-item fade-in-up">
        <div class="faq-question">Is MyXen Foundation registered?</div>
        <div class="faq-answer">
          Yes, MyXen Foundation is a UK registered company operating in compliance with relevant regulations. 
          Our registration details are available in the footer of every page.
        </div>
      </div>
      
      <div class="faq-item fade-in-up">
        <div class="faq-question">How can I join the team?</div>
        <div class="faq-answer">
          Check our Careers page for current open positions. We're always looking for talented individuals 
          passionate about blockchain and decentralized finance.
        </div>
      </div>
      
      <div class="faq-item fade-in-up">
        <div class="faq-question">What wallets are supported?</div>
        <div class="faq-answer">
          We support all major Solana wallets including Phantom, Solflare, and Backpack. 
          Make sure your wallet is connected to the Solana network to interact with our platform.
        </div>
      </div>
      
      <div class="faq-item fade-in-up">
        <div class="faq-question">How long does support response take?</div>
        <div class="faq-answer">
          We typically respond to support tickets within 24-48 hours. Urgent issues are prioritized 
          and may receive faster responses.
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <div class="footer-section">
        <h3>MyXen Foundation</h3>
        <p>Building a Decentralized Tomorrow, Responsibly and Transparently</p>
        
        <div class="company-registration">
          <p>🏢 <strong>UK Registered Company</strong><br>Registration Number: °°°°°°</p>
          <p>📧 support@myxenpay.finance<br>☎️ +1 (786) 509-7729</p>
        </div>
      </div>
      
      <div class="footer-section">
        <h3>Connect</h3>
        <ul class="footer-links">
          <li><a href="https://x.com/myxenpay" target="_blank">Twitter / X</a></li>
          <li><a href="https://t.me/myxenpay" target="_blank">Telegram</a></li>
          <li><a href="https://github.com/bikkhoto/myxenpay.finance" target="_blank">GitHub</a></li>
        </ul>
      </div>
    </div>
    
    <div class="verified-badges">
      <span class="badge solana">✅ Verified by Solana</span>
      <span class="badge solana-pay">⚡ Solana Pay Verified</span>
      <span class="badge gdpr">🔒 GDPR Compliant</span>
    </div>
    
    <div class="copyright">
      <p>© 2025 MyXen Foundation LTD. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Mobile Navigation Toggle
    function initMobileNav() {
      const mobileNavToggle = document.getElementById('mobile-nav-toggle');
      const mobileNav = document.getElementById('mobile-nav');
      
      mobileNavToggle.addEventListener('click', () => {
        mobileNav.classList.toggle('active');
      });
      
      // Close mobile nav when clicking outside
      document.addEventListener('click', (e) => {
        if (!mobileNav.contains(e.target) && !mobileNavToggle.contains(e.target)) {
          mobileNav.classList.remove('active');
        }
      });
    }
    
    // Theme Toggle
    function initThemeToggle() {
      const themeToggle = document.getElementById('theme-toggle');
      const logo = document.getElementById('theme-logo');
      
      themeToggle.addEventListener('click', () => {
        document.body.classList.toggle('light-theme');
        
        if (document.body.classList.contains('light-theme')) {
          themeToggle.textContent = '🌙';
          logo.src = 'myxenpay-logo-dark.png';
        } else {
          themeToggle.textContent = '☀️';
          logo.src = 'myxenpay-logo-light.png';
        }
      });
    }
    
    // Wallet Connection
    function connectWallet() {
      // This would integrate with actual wallet connection in a real implementation
      const connectBtn = document.getElementById('connect-btn');
      connectBtn.textContent = 'Connecting...';
      
      setTimeout(() => {
        connectBtn.textContent = 'Connected ✓';
        connectBtn.style.background = 'var(--success)';
      }, 1500);
    }
    
    // Initialize everything when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
      initMobileNav();
      initThemeToggle();
      
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

      const animatableElements = document.querySelectorAll('.support-card, .faq-item');
      animatableElements.forEach(el => {
        observer.observe(el);
      });
    });
  </script>
</body>
</html>