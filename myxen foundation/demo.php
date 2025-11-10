<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>View Demo - MyxenPay</title>
  <meta name="description" content="Experience MyxenPay demo - global crypto payments platform.">
  <style>
    /* COPY THE SAME STYLES AS ABOVE */
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

    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { background: var(--bg); color: var(--text); font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; line-height: 1.6; padding-top: 60px; }

    /* Copy the same navigation, header styles as above */
    .top-nav { display: flex; justify-content: center; gap: 1.5rem; padding: 0.5rem 0; background: var(--header-bg); backdrop-filter: blur(20px); border-bottom: 1px solid var(--border); position: fixed; top: 0; left: 0; right: 0; z-index: 1000; }
    .top-nav a { color: var(--primary); text-decoration: none; font-weight: 600; font-size: 0.95rem; transition: color 0.3s ease; }
    .top-nav a:hover { color: var(--accent); }
    header { display: flex; justify-content: space-between; align-items: center; padding: 1rem 2rem; background: var(--header-bg); backdrop-filter: blur(20px); border-bottom: 1px solid var(--border); margin-top: 40px; position: sticky; top: 0; z-index: 999; }
    .logo { height: 64px; width: auto; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1)); }
    .header-actions { display: flex; gap: 0.8rem; align-items: center; }
    .theme-btn, .connect-btn { background: none; border: 1px solid var(--border); width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 14px; transition: all 0.3s ease; }
    .theme-btn:hover, .connect-btn:hover { transform: translateY(-2px); box-shadow: var(--shadow); }
    .connect-btn { background: var(--primary); color: white; border: none; width: auto; padding: 0 12px; font-weight: 600; font-size: 14px; }

    /* Demo Section */
    .demo-section { padding: 4rem 1.5rem; text-align: center; }
    .demo-section h1 { font-size: 2.5rem; font-weight: 800; margin-bottom: 1.5rem; background: linear-gradient(90deg, var(--primary), var(--accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .demo-section p { font-size: 1.2rem; max-width: 600px; margin: 0 auto 2rem; opacity: 0.8; }
    .demo-card { background: var(--card-bg); backdrop-filter: blur(20px); border: 1px solid var(--border); border-radius: 24px; padding: 3rem; max-width: 600px; margin: 0 auto; box-shadow: var(--shadow); }
    .demo-placeholder { background: var(--border); padding: 4rem 2rem; border-radius: 16px; margin: 2rem 0; }
    .demo-features { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin: 2rem 0; }
    .demo-feature { text-align: center; padding: 1.5rem; }
    .demo-feature .icon { font-size: 2.5rem; margin-bottom: 1rem; }
    .action-btn { background: var(--primary); color: white; text-decoration: none; padding: 1rem 2rem; border-radius: 12px; font-weight: 600; display: inline-block; margin: 1rem; transition: all 0.3s ease; }
    .action-btn:hover { background: var(--secondary); transform: translateY(-2px); }
    .back-link { display: inline-block; margin-top: 2rem; color: var(--primary); text-decoration: none; font-weight: 600; }
  </style>
</head>
<body>
  <!-- Top Navigation -->
  <nav class="top-nav">
    <a href="tokenomics.html">Tokenomics</a>
    <a href="whitepaper.html">Whitepaper</a>
    <a href="student-rewards.html">Student Rewards</a>
    <a href="developers.html">Developers</a>
    <a href="merchants.html">For Businesses</a>
  </nav>

  <!-- Header -->
  <header>
    <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyxenPay" class="logo">
    <div class="header-actions">
      <button id="theme-toggle" class="theme-btn">☀️</button>
      <button class="connect-btn">Connect Wallet</button>
    </div>
  </header>

  <!-- Demo Section -->
  <section class="demo-section">
    <h1>MyxenPay Demo</h1>
    <p>Experience the future of crypto payments with our interactive demo</p>
    
    <div class="demo-card">
      <div class="demo-placeholder">
        <div style="font-size: 4rem; margin-bottom: 1rem;">🚀</div>
        <h3>Interactive Demo Coming Soon</h3>
        <p>Our full demo will be available at launch. Get early access by joining our waitlist.</p>
      </div>
      
      <div class="demo-features">
        <div class="demo-feature">
          <div class="icon">💳</div>
          <h4>QR Payments</h4>
          <p>Instant crypto payments</p>
        </div>
        <div class="demo-feature">
          <div class="icon">🌍</div>
          <h4>Global Access</h4>
          <p>Borderless transactions</p>
        </div>
        <div class="demo-feature">
          <div class="icon">⚡</div>
          <h4>Solana Fast</h4>
          <p>Lightning speed</p>
        </div>
      </div>
      
      <a href="signup.html" class="action-btn">Join Waitlist for Early Access</a>
    </div>
    
    <a href="index.php" class="back-link">← Back to Home</a>
  </section>

  <script>
    // Same theme toggle script as above
    function initTheme() {
      const saved = localStorage.getItem('theme');
      const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      if (saved) {
        document.body.setAttribute('data-theme', saved);
        document.getElementById('theme-logo').src = saved === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
        document.getElementById('theme-toggle').textContent = saved === 'dark' ? '🌙' : '☀️';
      } else if (prefersDark) {
        document.body.setAttribute('data-theme', 'dark');
        document.getElementById('theme-logo').src = 'myxenpay-logo-dark.png';
        document.getElementById('theme-toggle').textContent = '🌙';
      } else {
        document.body.setAttribute('data-theme', 'light');
        document.getElementById('theme-logo').src = 'myxenpay-logo-light.png';
        document.getElementById('theme-toggle').textContent = '☀️';
      }
    }

    document.getElementById('theme-toggle').addEventListener('click', () => {
      const current = document.body.getAttribute('data-theme');
      const newTheme = current === 'dark' ? 'light' : 'dark';
      document.body.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      document.getElementById('theme-logo').src = newTheme === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
      document.getElementById('theme-toggle').textContent = newTheme === 'dark' ? '🌙' : '☀️';
    });

    document.addEventListener('DOMContentLoaded', initTheme);
  </script>
</body>
</html>