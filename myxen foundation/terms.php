<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terms of Service – MyxenPay</title>
  <style>
    :root {
      --primary: #007AFF;
      --primary-dark: #0056CC;
      --bg-primary: #f9fafb;
      --bg-secondary: #ffffff;
      --text-primary: #111827;
      --text-secondary: #6B7280;
      --border: #E5E7EB;
      --shadow: 0 4px 20px rgba(0,0,0,0.05);
      --transition: all 0.3s ease;
    }

    .dark-theme {
      --primary: #0A84FF;
      --primary-dark: #409CFF;
      --bg-primary: #121212;
      --bg-secondary: #1E1E1E;
      --text-primary: #F9FAFB;
      --text-secondary: #D1D5DB;
      --border: #374151;
      --shadow: 0 4px 20px rgba(0,0,0,0.2);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: var(--bg-primary);
      color: var(--text-primary);
      line-height: 1.6;
      padding: 20px;
      transition: var(--transition);
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      background: var(--bg-secondary);
      padding: 40px;
      border-radius: 20px;
      box-shadow: var(--shadow);
      transition: var(--transition);
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      padding-bottom: 20px;
      border-bottom: 1px solid var(--border);
    }

    .logo {
      font-size: 24px;
      font-weight: 700;
      color: var(--primary);
    }

    .theme-toggle {
      background: none;
      border: 1px solid var(--border);
      border-radius: 50px;
      padding: 8px 16px;
      color: var(--text-primary);
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: var(--transition);
    }

    .theme-toggle:hover {
      background: var(--border);
    }

    .back {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 20px;
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
      transition: var(--transition);
    }

    .back:hover {
      text-decoration: underline;
      color: var(--primary-dark);
    }

    h1 {
      color: var(--primary);
      margin-bottom: 10px;
      font-size: 32px;
    }

    .last-updated {
      color: var(--text-secondary);
      margin-bottom: 30px;
      font-size: 14px;
    }

    h2 {
      margin: 2rem 0 1rem;
      color: var(--text-primary);
      font-size: 20px;
      padding-bottom: 8px;
      border-bottom: 1px solid var(--border);
    }

    p {
      margin-bottom: 1rem;
    }

    ul {
      margin-left: 20px;
      margin-bottom: 1rem;
    }

    li {
      margin-bottom: 8px;
    }

    .highlight {
      background-color: rgba(0, 122, 255, 0.1);
      border-left: 4px solid var(--primary);
      padding: 15px;
      margin: 20px 0;
      border-radius: 0 8px 8px 0;
    }

    .contact-info {
      background-color: var(--bg-primary);
      padding: 20px;
      border-radius: 12px;
      margin-top: 30px;
      text-align: center;
    }

    @media (max-width: 768px) {
      .container {
        padding: 20px;
      }
      
      h1 {
        font-size: 28px;
      }
      
      header {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <div class="logo">MyxenPay</div>
      <button class="theme-toggle" id="themeToggle">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 12C10.2091 12 12 10.2091 12 8C12 5.79086 10.2091 4 8 4C5.79086 4 4 5.79086 4 8C4 10.2091 5.79086 12 8 12Z" stroke="currentColor" stroke-width="1.5"/>
          <path d="M8 1V2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M8 14V15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M1 8H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M14 8H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M12.9497 3.05029L12.2426 3.7574" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M3.75732 12.2426L3.05021 12.9497" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M12.9497 12.9497L12.2426 12.2426" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M3.75732 3.7574L3.05021 3.05029" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <span>Toggle Theme</span>
      </button>
    </header>
    
    <a href="index.php" class="back">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 13L5 8L10 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      Back to Home
    </a>
    
    <h1>Terms of Service</h1>
    <p class="last-updated"><strong>Last updated:</strong> October 15, 2025</p>
    
    <div class="highlight">
      <p><strong>Important:</strong> Please read these Terms of Service carefully before using MyxenPay. By accessing or using our services, you agree to be bound by these terms.</p>
    </div>
    
    <h2>1. Acceptance of Terms</h2>
    <p>By accessing, downloading, or using MyxenPay services, you acknowledge that you have read, understood, and agree to be bound by these Terms of Service and our Privacy Policy. If you do not agree to these terms, you must not use our services.</p>

    <h2>2. Non-Custodial Service</h2>
    <p>MyxenPay is a non-custodial cryptocurrency platform. This means:</p>
    <ul>
      <li>You retain full control and ownership of your private keys and funds at all times</li>
      <li>We do not store, hold, or manage your cryptocurrency assets</li>
      <li>You are solely responsible for securing your wallet credentials and private keys</li>
      <li>We cannot recover lost private keys or restore access to wallets</li>
    </ul>

    <h2>3. No Financial Advice</h2>
    <p>MyxenPay does not provide financial, legal, or tax advice. All information provided through our services is for informational purposes only and should not be considered as financial advice. You should consult with qualified professionals before making any financial decisions.</p>

    <h2>4. Eligibility</h2>
    <p>To use MyxenPay, you must:</p>
    <ul>
      <li>Be at least 18 years of age</li>
      <li>Not be a resident of restricted jurisdictions (including but not limited to the United States of America and OFAC-sanctioned countries)</li>
      <li>Comply with all applicable laws and regulations in your jurisdiction</li>
      <li>Not use our services for any illegal activities</li>
    </ul>

    <h2>5. Intellectual Property</h2>
    <p>All content, features, and functionality on MyxenPay, including but not limited to text, graphics, logos, icons, images, and software, are the exclusive property of MyxenPay Ltd. and are protected by international copyright, trademark, and other intellectual property laws.</p>

    <h2>6. Limitation of Liability</h2>
    <p>To the fullest extent permitted by applicable law, MyxenPay Ltd. and its affiliates shall not be liable for:</p>
    <ul>
      <li>Any losses resulting from wallet compromise, lost private keys, or unauthorized access</li>
      <li>Smart contract bugs, vulnerabilities, or failures (use at your own risk)</li>
      <li>Market volatility, price fluctuations, or investment losses</li>
      <li>Technical issues, service interruptions, or network congestion</li>
      <li>Third-party services, applications, or integrations</li>
      <li>User error, including but not limited to incorrect transaction details</li>
    </ul>

    <h2>7. Changes to Terms</h2>
    <p>We reserve the right to modify or update these Terms of Service at any time. We will provide notice of material changes through our platform or via email. Continued use of our services after such changes constitutes your acceptance of the revised terms.</p>

    <h2>8. Governing Law</h2>
    <p>These Terms of Service and any separate agreements whereby we provide you services shall be governed by and construed in accordance with the laws of England and Wales.</p>

    <h2>9. Termination</h2>
    <p>We reserve the right to suspend or terminate your access to our services at our sole discretion, without notice, for conduct that we believe violates these Terms of Service or is harmful to other users, us, or third parties, or for any other reason.</p>

    <h2>10. Contact Information</h2>
    <p>If you have any questions about these Terms of Service, please contact us at:</p>
    
    <div class="contact-info">
      <p><strong>MyxenPay Legal Department</strong></p>
      <p>Email: legal@myxenpay.finance</p>
      <p>Response Time: Within 5 business days</p>
    </div>
  </div>

  <script>
    // Theme toggle functionality
    const themeToggle = document.getElementById('themeToggle');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    
    // Check for saved theme or prefered scheme
    const currentTheme = localStorage.getItem('theme') || 
                        (prefersDarkScheme.matches ? 'dark' : 'light');
    
    if (currentTheme === 'dark') {
      document.body.classList.add('dark-theme');
      themeToggle.innerHTML = `<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 12C10.2091 12 12 10.2091 12 8C12 5.79086 10.2091 4 8 4C5.79086 4 4 5.79086 4 8C4 10.2091 5.79086 12 8 12Z" stroke="currentColor" stroke-width="1.5"/>
          <path d="M8 1V2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M8 14V15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M1 8H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M14 8H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M12.9497 3.05029L12.2426 3.7574" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M3.75732 12.2426L3.05021 12.9497" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M12.9497 12.9497L12.2426 12.2426" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M3.75732 3.7574L3.05021 3.05029" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <span>Light Mode</span>`;
    }
    
    themeToggle.addEventListener('click', function() {
      document.body.classList.toggle('dark-theme');
      
      let theme = 'light';
      if (document.body.classList.contains('dark-theme')) {
        theme = 'dark';
        themeToggle.innerHTML = `<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 12C10.2091 12 12 10.2091 12 8C12 5.79086 10.2091 4 8 4C5.79086 4 4 5.79086 4 8C4 10.2091 5.79086 12 8 12Z" stroke="currentColor" stroke-width="1.5"/>
          <path d="M8 1V2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M8 14V15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M1 8H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M14 8H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M12.9497 3.05029L12.2426 3.7574" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M3.75732 12.2426L3.05021 12.9497" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M12.9497 12.9497L12.2426 12.2426" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M3.75732 3.7574L3.05021 3.05029" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <span>Light Mode</span>`;
      } else {
        themeToggle.innerHTML = `<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M13.5 8.5C13.5 11.2614 11.2614 13.5 8.5 13.5C5.73858 13.5 3.5 11.2614 3.5 8.5C3.5 5.73858 5.73858 3.5 8.5 3.5C11.2614 3.5 13.5 5.73858 13.5 8.5Z" stroke="currentColor" stroke-width="1.5"/>
          <path d="M8.5 1V2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M8.5 15V16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M1.5 8.5H2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M14.5 8.5H15.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M12.9497 3.05029L12.2426 3.7574" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M3.75732 12.2426L3.05021 12.9497" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M12.9497 12.9497L12.2426 12.2426" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
          <path d="M3.75732 3.7574L3.05021 3.05029" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
        </svg>
        <span>Dark Mode</span>`;
      }
      
      localStorage.setItem('theme', theme);
    });
  </script>
</body>
</html>