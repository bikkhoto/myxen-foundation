<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Careers - MyXen Foundation – Building a Decentralized Tomorrow</title>
    <meta name="description" content="Join MyXen Foundation team. Explore open positions and build the future of decentralized finance with us.">
    
    <!-- Styles -->
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
        .career-hero {
            padding: 12rem 2rem 6rem;
            text-align: center;
            background: radial-gradient(circle at top center, rgba(110, 69, 226, 0.2) 0%, transparent 50%);
            position: relative;
            overflow: hidden;
        }

        .career-hero::before {
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

        .career-hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .career-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .career-hero p {
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

        /* Job Cards Grid */
        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .job-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 2rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .job-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .job-card:hover::before {
            transform: scaleX(1);
        }

        .job-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .job-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .job-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .job-meta {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 0.5rem;
        }

        .job-tag {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .job-tag.remote {
            background: rgba(0, 122, 255, 0.2);
            border-color: rgba(0, 122, 255, 0.5);
        }

        .job-tag.urgent {
            background: rgba(255, 45, 117, 0.2);
            border-color: rgba(255, 45, 117, 0.5);
        }

        .job-description {
            margin-bottom: 1.5rem;
            color: var(--text-muted);
        }

        .job-details {
            margin-bottom: 2rem;
        }

        .job-details h4 {
            font-size: 1.125rem;
            margin: 1rem 0 0.5rem;
            color: var(--primary);
        }

        .job-details ul {
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .job-details li {
            margin-bottom: 0.5rem;
            color: var(--text-muted);
        }

        .job-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.875rem 1.75rem;
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

        /* Benefits Grid */
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .benefit-card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .benefit-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .benefit-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }

        .benefit-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .benefit-description {
            color: var(--text-muted);
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

        /* Application Modal */
        .application-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            z-index: 10000;
            overflow-y: auto;
            padding: 2rem 1rem;
        }

        .application-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 2.5rem;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            background: var(--glass-bg);
            transform: rotate(90deg);
        }

        .modal-title {
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
            font-weight: 700;
        }

        .modal-subtitle {
            color: var(--text-muted);
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .application-form {
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

        .form-input, .form-textarea, .form-select {
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
            min-height: 120px;
            resize: vertical;
        }

        .file-upload {
            border: 2px dashed var(--border);
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-upload:hover {
            border-color: var(--primary);
            background: var(--glass-bg);
        }

        .file-upload input {
            display: none;
        }

        .file-upload-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            display: block;
        }

        .file-info {
            margin-top: 0.5rem;
            font-size: 0.85rem;
            opacity: 0.7;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        /* Job Share Links */
        .job-share {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .share-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            text-decoration: none;
            color: var(--text);
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .share-link:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        /* No Jobs Message */
        .no-jobs {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-muted);
        }

        .no-jobs-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .desktop-nav {
                display: none;
            }

            .mobile-nav-toggle {
                display: flex;
            }

            .career-hero {
                padding: 10rem 1.5rem 4rem;
            }

            .career-hero h1 {
                font-size: 2.5rem;
            }

            .section {
                padding: 3rem 1.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .jobs-grid {
                grid-template-columns: 1fr;
            }

            .job-header {
                flex-direction: column;
                gap: 1rem;
            }

            .job-actions {
                flex-direction: column;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
            
            .modal-content {
                padding: 2rem 1.5rem;
                margin: 1rem;
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
        <a href="careers.php" class="active">Careers</a>
        <a href="support.php">Support</a>
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
    <a href="careers.php" class="active">Careers</a>
    <a href="support.php">Support</a>
  </nav>

  <!-- Hero Section -->
  <section class="career-hero">
    <div class="career-hero-content fade-in-up">
      <h1>Join Our Mission</h1>
      <p>Help us build a decentralized tomorrow. We're hiring passionate individuals to expand our global reach.</p>
      <a href="#open-positions" class="btn btn-primary">View Open Positions</a>
    </div>
  </section>

  <!-- Open Positions Section -->
  <section class="section" id="open-positions">
    <div class="section-header">
      <h2 class="section-title">Open Positions</h2>
      <p class="section-subtitle">Join our growing team and help shape the future of decentralized finance</p>
    </div>
    
    <div class="jobs-grid" id="jobs-container">
      <!-- Jobs will be loaded dynamically from JSON -->
      <?php
      // Load jobs from JSON file
      $jobs_file = 'data/jobs.json';
      $jobs = [];
      
      if (file_exists($jobs_file)) {
          $jobs_data = file_get_contents($jobs_file);
          $jobs = json_decode($jobs_data, true) ?: [];
      }
      
      if (empty($jobs)) {
          echo '
          <div class="no-jobs">
            <div class="no-jobs-icon">💼</div>
            <h3>No Open Positions Currently</h3>
            <p>Check back later for new opportunities or join our talent network.</p>
          </div>';
      } else {
          foreach ($jobs as $job) {
              echo '
              <div class="job-card fade-in-up">
                <div class="job-header">
                  <div>
                    <h3 class="job-title">' . htmlspecialchars($job['title']) . '</h3>
                    <div class="job-meta">
                      <span class="job-tag ' . ($job['location'] === 'remote' ? 'remote' : '') . '">' . ucfirst($job['location']) . '</span>
                      <span class="job-tag">' . ucfirst(str_replace('-', ' ', $job['type'])) . '</span>
                      ' . ($job['is_urgent'] ? '<span class="job-tag urgent">Urgent Hiring</span>' : '') . '
                    </div>
                  </div>
                  ' . (!empty($job['onboarding_date']) ? '<div><span class="job-tag">Onboarding: ' . date('M j', strtotime($job['onboarding_date'])) . '</span></div>' : '') . '
                </div>
                
                <div class="job-description">
                  <p>' . htmlspecialchars($job['description']) . '</p>
                </div>
                
                <div class="job-details">';
                
                if (!empty($job['regions'])) {
                    echo '<h4>Regions:</h4><ul><li>' . str_replace(',', '</li><li>', htmlspecialchars($job['regions'])) . '</li></ul>';
                }
                
                if (!empty($job['responsibilities'])) {
                    $responsibilities = explode("\n", $job['responsibilities']);
                    echo '<h4>Key Responsibilities:</h4><ul>';
                    foreach ($responsibilities as $resp) {
                        if (trim($resp)) echo '<li>' . htmlspecialchars(trim($resp)) . '</li>';
                    }
                    echo '</ul>';
                }
                
                if (!empty($job['requirements'])) {
                    $requirements = explode("\n", $job['requirements']);
                    echo '<h4>Requirements:</h4><ul>';
                    foreach ($requirements as $req) {
                        if (trim($req)) echo '<li>' . htmlspecialchars(trim($req)) . '</li>';
                    }
                    echo '</ul>';
                }
                
                echo '</div>
                
                <div class="job-actions">
                  <button class="btn btn-primary apply-btn" data-job="' . htmlspecialchars($job['title']) . '" data-job-id="' . htmlspecialchars($job['slug']) . '">Apply Now</button>
                  <a href="job-details.php?slug=' . htmlspecialchars($job['slug']) . '" class="btn btn-secondary">View Details</a>
                </div>
                
                <div class="job-share">
                  <span>Share this job:</span>
                  <a href="#" class="share-link" data-share="twitter">Twitter</a>
                  <a href="#" class="share-link" data-share="linkedin">LinkedIn</a>
                  <a href="#" class="share-link" data-share="telegram">Telegram</a>
                  <a href="#" class="share-link copy-link" data-link="' . htmlspecialchars('https://myxenpay.finance/job-details.php?slug=' . $job['slug']) . '">Copy Link</a>
                </div>
              </div>';
          }
      }
      ?>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="section">
    <div class="section-header">
      <h2 class="section-title">Why Join MyXen Foundation?</h2>
      <p class="section-subtitle">We offer more than just a job - we offer a mission</p>
    </div>
    
    <div class="benefits-grid">
      <div class="benefit-card fade-in-up">
        <div class="benefit-icon">🌍</div>
        <h3 class="benefit-title">Global Impact</h3>
        <p class="benefit-description">Work on cutting-edge technology that's shaping the future of finance worldwide.</p>
      </div>
      
      <div class="benefit-card fade-in-up">
        <div class="benefit-icon">💼</div>
        <h3 class="benefit-title">Remote Flexibility</h3>
        <p class="benefit-description">Work from anywhere in the world with our fully remote team structure.</p>
      </div>
      
      <div class="benefit-card fade-in-up">
        <div class="benefit-icon">🚀</div>
        <h3 class="benefit-title">Growth Opportunities</h3>
        <p class="benefit-description">Ample opportunities for professional development and advancement.</p>
      </div>
      
      <div class="benefit-card fade-in-up">
        <div class="benefit-icon">💰</div>
        <h3 class="benefit-title">Competitive Compensation</h3>
        <p class="benefit-description">Competitive salary packages with potential token-based incentives.</p>
      </div>
    </div>
  </section>

  <!-- Application Modal -->
  <div class="application-modal" id="application-modal">
    <div class="modal-content">
      <button class="modal-close" id="modal-close">×</button>
      <h2 class="modal-title">Apply for <span id="modal-job-title">Position</span></h2>
      <p class="modal-subtitle">Fill out the form below and we'll get back to you soon.</p>
      
      <form class="application-form" id="application-form" action="submit-application.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="job_id" id="form-job-id">
        <input type="hidden" name="job_title" id="form-job-title">
        
        <div class="form-row">
          <div class="form-group">
            <label for="first-name" class="form-label">First Name *</label>
            <input type="text" id="first-name" name="first_name" class="form-input" required>
          </div>
          <div class="form-group">
            <label for="last-name" class="form-label">Last Name *</label>
            <input type="text" id="last-name" name="last_name" class="form-input" required>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group">
            <label for="email" class="form-label">Email Address *</label>
            <input type="email" id="email" name="email" class="form-input" required>
          </div>
          <div class="form-group">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" id="phone" name="phone" class="form-input">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group">
            <label for="country" class="form-label">Country *</label>
            <select id="country" name="country" class="form-select" required>
              <option value="">Select your country</option>
              <option value="Philippines">Philippines</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="experience" class="form-label">Years of Experience *</label>
            <select id="experience" name="experience" class="form-select" required>
              <option value="">Select experience</option>
              <option value="0-1">0-1 years</option>
              <option value="1-3">1-3 years</option>
              <option value="3-5">3-5 years</option>
              <option value="5+">5+ years</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label for="cover-letter" class="form-label">Cover Letter *</label>
          <textarea id="cover-letter" name="cover_letter" class="form-textarea" placeholder="Tell us why you're interested in this position and what makes you a good fit..." required></textarea>
        </div>
        
        <div class="form-group">
          <label class="form-label">Resume/CV *</label>
          <div class="file-upload" id="resume-upload">
            <span class="file-upload-icon">📄</span>
            <span>Click to upload your resume</span>
            <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
            <div class="file-info">PDF, DOC, DOCX (Max 5MB)</div>
          </div>
          <div id="resume-name" style="margin-top: 0.5rem; font-size: 0.9rem;"></div>
        </div>
        
        <div class="form-group">
          <label class="form-label">Profile Picture</label>
          <div class="file-upload" id="photo-upload">
            <span class="file-upload-icon">📷</span>
            <span>Click to upload your photo</span>
            <input type="file" id="photo" name="photo" accept="image/*">
            <div class="file-info">JPG, PNG (Max 2MB)</div>
          </div>
          <div id="photo-name" style="margin-top: 0.5rem; font-size: 0.9rem;"></div>
        </div>
        
        <div class="form-group">
          <label for="linkedin" class="form-label">LinkedIn Profile (Optional)</label>
          <input type="url" id="linkedin" name="linkedin" class="form-input" placeholder="https://linkedin.com/in/yourprofile">
        </div>
        
        <button type="submit" class="btn btn-primary" style="margin-top: 1rem;">
          <span id="submit-text">Submit Application</span>
          <div class="loading" id="submit-loading" style="display: none;"></div>
        </button>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <div class="footer-section">
        <h3>MyXen Foundation</h3>
        <p>Building a Decentralized Tomorrow, Responsibly and Transparently</p>
        
        <div class="company-registration">
          <p>🏢 <strong>UK Registered Company</strong><br>Registration Number: °°°°°°</p>
          <p>📧 careers@myxenpay.finance<br>☎️ +1 (786) 509-7729</p>
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
    
    // Application Modal Functionality
    function initApplicationModal() {
      const modal = document.getElementById('application-modal');
      const closeBtn = document.getElementById('modal-close');
      const applyBtns = document.querySelectorAll('.apply-btn');
      const form = document.getElementById('application-form');
      const jobTitle = document.getElementById('modal-job-title');
      const formJobId = document.getElementById('form-job-id');
      const formJobTitle = document.getElementById('form-job-title');
      
      // File upload handlers
      const resumeUpload = document.getElementById('resume-upload');
      const resumeInput = document.getElementById('resume');
      const resumeName = document.getElementById('resume-name');
      
      const photoUpload = document.getElementById('photo-upload');
      const photoInput = document.getElementById('photo');
      const photoName = document.getElementById('photo-name');
      
      // Open modal when apply button is clicked
      applyBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          const job = btn.getAttribute('data-job');
          const jobId = btn.getAttribute('data-job-id');
          
          jobTitle.textContent = job;
          formJobId.value = jobId;
          formJobTitle.value = job;
          
          modal.classList.add('active');
          document.body.style.overflow = 'hidden';
        });
      });
      
      // Close modal
      closeBtn.addEventListener('click', () => {
        modal.classList.remove('active');
        document.body.style.overflow = '';
      });
      
      // Close modal when clicking outside
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          modal.classList.remove('active');
          document.body.style.overflow = '';
        }
      });
      
      // File upload handling
      resumeUpload.addEventListener('click', () => {
        resumeInput.click();
      });
      
      resumeInput.addEventListener('change', () => {
        if (resumeInput.files.length > 0) {
          resumeName.textContent = `Selected: ${resumeInput.files[0].name}`;
        }
      });
      
      photoUpload.addEventListener('click', () => {
        photoInput.click();
      });
      
      photoInput.addEventListener('change', () => {
        if (photoInput.files.length > 0) {
          photoName.textContent = `Selected: ${photoInput.files[0].name}`;
        }
      });
    }
    
    // Job sharing functionality
    function initJobSharing() {
      const shareLinks = document.querySelectorAll('.share-link');
      
      shareLinks.forEach(link => {
        link.addEventListener('click', (e) => {
          e.preventDefault();
          
          const shareType = link.getAttribute('data-share');
          const jobLink = link.getAttribute('data-link');
          const jobTitle = link.closest('.job-card').querySelector('.job-title').textContent;
          
          if (shareType) {
            shareJob(shareType, jobTitle, jobLink);
          } else if (link.classList.contains('copy-link')) {
            copyToClipboard(jobLink);
          }
        });
      });
    }
    
    function shareJob(platform, title, url) {
      const text = `Check out this job opportunity at MyXen Foundation: ${title}`;
      
      switch(platform) {
        case 'twitter':
          window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`, '_blank');
          break;
        case 'linkedin':
          window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`, '_blank');
          break;
        case 'telegram':
          window.open(`https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`, '_blank');
          break;
      }
    }
    
    function copyToClipboard(text) {
      navigator.clipboard.writeText(text).then(() => {
        // Show toast notification (you can implement this)
        alert('Job link copied to clipboard!');
      });
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
      
      // Initialize application system
      initApplicationModal();
      initJobSharing();
      
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

      const animatableElements = document.querySelectorAll('.job-card, .benefit-card');
      animatableElements.forEach(el => {
        observer.observe(el);
      });
    });
  </script>
</body>
</html>