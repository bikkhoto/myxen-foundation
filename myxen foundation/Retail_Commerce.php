<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Retail & Commerce - MyxenPay Crypto Payments</title>
  <meta name="description" content="Transform your retail business with crypto payments. Lower fees, instant settlements, global customers with MyxenPay.">
  <style>
    :root {
      --bg: #ffffff;
      --text: #111111;
      --card-bg: rgba(255, 255, 255, 0.7);
      --border: rgba(0, 0, 0, 0.05);
      --primary: #007AFF;
      --secondary: #30D158;
      --accent: #FF9F0A;
    }

    [data-theme="dark"] {
      --bg: #000000;
      --text: #f5f5f7;
      --card-bg: rgba(30, 30, 30, 0.7);
      --border: rgba(255, 255, 255, 0.05);
      --primary: #0A84FF;
      --secondary: #32D74B;
      --accent: #FF9F0A;
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
      padding: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .header {
      text-align: center;
      padding: 3rem 0;
    }

    .header h1 {
      font-size: 3rem;
      background: linear-gradient(90deg, var(--primary), var(--accent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1rem;
    }

    .header p {
      font-size: 1.2rem;
      opacity: 0.8;
      max-width: 600px;
      margin: 0 auto;
    }

    .content-grid {
      display: grid;
      gap: 2rem;
      margin: 3rem 0;
    }

    .benefit-card {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 2.5rem;
      margin-bottom: 2rem;
    }

    .benefit-card h2 {
      color: var(--primary);
      margin-bottom: 1rem;
      font-size: 1.8rem;
    }

    .benefit-card ul {
      list-style: none;
      padding-left: 1rem;
    }

    .benefit-card li {
      margin-bottom: 0.8rem;
      position: relative;
    }

    .benefit-card li:before {
      content: "✓";
      color: var(--secondary);
      font-weight: bold;
      position: absolute;
      left: -1.5rem;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
      margin: 2rem 0;
    }

    .stat-card {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 15px;
      padding: 1.5rem;
      text-align: center;
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: bold;
      color: var(--primary);
      display: block;
    }

    .stat-label {
      opacity: 0.8;
      font-size: 0.9rem;
    }

    .cta-section {
      text-align: center;
      padding: 4rem 0;
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      border-radius: 25px;
      color: white;
      margin: 3rem 0;
    }

    .cta-section h2 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .cta-button {
      display: inline-block;
      background: white;
      color: var(--primary);
      padding: 1rem 2rem;
      border-radius: 15px;
      text-decoration: none;
      font-weight: bold;
      margin-top: 1.5rem;
      transition: transform 0.3s ease;
    }

    .cta-button:hover {
      transform: translateY(-3px);
    }

    .back-link {
      display: inline-block;
      color: var(--primary);
      text-decoration: none;
      margin-bottom: 2rem;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <a href="index.php" class="back-link">← Back to Home</a>

  <div class="header">
    <h1>Retail & Commerce Revolution</h1>
    <p>Transform your business with cryptocurrency payments - faster, cheaper, and global</p>
  </div>

  <div class="content-grid">
    <div class="benefit-card">
      <h2>Why Crypto for Retail?</h2>
      <p>Traditional payment systems come with high fees, slow settlements, and geographical limitations. Cryptocurrency solves these problems:</p>
      
      <div class="stats-grid">
        <div class="stat-card">
          <span class="stat-number">2-3%</span>
          <span class="stat-label">Traditional Payment Fees</span>
        </div>
        <div class="stat-card">
          <span class="stat-number">0.5%</span>
          <span class="stat-label">MyxenPay Fees</span>
        </div>
        <div class="stat-card">
          <span class="stat-number">2-3 days</span>
          <span class="stat-label">Bank Settlement Time</span>
        </div>
        <div class="stat-card">
          <span class="stat-number">Instant</span>
          <span class="stat-label">MyxenPay Settlement</span>
        </div>
      </div>
    </div>

    <div class="benefit-card">
      <h2>Benefits for Retail Businesses</h2>
      <ul>
        <li><strong>Lower Transaction Fees</strong> - Save 60-80% compared to traditional payment processors</li>
        <li><strong>Instant Settlements</strong> - Receive payments immediately without waiting for bank processing</li>
        <li><strong>Global Customer Base</strong> - Accept payments from anywhere in the world without currency conversion fees</li>
        <li><strong>No Chargebacks</strong> - Cryptocurrency transactions are irreversible, eliminating fraudulent chargebacks</li>
        <li><strong>24/7 Operations</strong> - Process payments anytime, no banking hours restrictions</li>
        <li><strong>Enhanced Security</strong> - Blockchain technology provides superior security compared to traditional systems</li>
        <li><strong>Financial Inclusion</strong> - Serve customers without bank accounts or credit cards</li>
      </ul>
    </div>

    <div class="benefit-card">
      <h2>How MyxenPay Supports Retailers</h2>
      <ul>
        <li><strong>Simple QR Code Integration</strong> - Start accepting crypto payments in minutes</li>
        <li><strong>Real-time Currency Conversion</strong> - Display prices in local currency, receive in crypto</li>
        <li><strong>POS System Compatibility</strong> - Works with existing point-of-sale systems</li>
        <li><strong>E-commerce Plugins</strong> - Easy integration with online stores</li>
        <li><strong>Detailed Analytics</strong> - Track sales, customer trends, and payment history</li>
        <li><strong>Multi-Currency Support</strong> - Accept SOL, USDC, MYXEN and other major cryptocurrencies</li>
        <li><strong>Automatic Settlements</strong> - Funds automatically transferred to your wallet</li>
      </ul>
    </div>

    <div class="benefit-card">
      <h2>Use Cases</h2>
      <ul>
        <li><strong>Brick & Mortar Stores</strong> - Retail shops, supermarkets, boutiques</li>
        <li><strong>Restaurants & Cafes</strong> - Quick table payments without waiting for card machines</li>
        <li><strong>Service Providers</strong> - Consultants, freelancers, professionals</li>
        <li><strong>E-commerce Stores</strong> - Online retailers, digital products, subscriptions</li>
        <li><strong>Market Vendors</strong> - Farmers markets, pop-up shops, street vendors</li>
        <li><strong>Hospitality Industry</strong> - Hotels, resorts, travel services</li>
      </ul>
    </div>
  </div>

  <div class="cta-section">
    <h2>Ready to Transform Your Business?</h2>
    <p>Start accepting crypto payments today and join the future of commerce</p>
    <a href="merchant.html" class="cta-button">Generate Your QR Code Now</a>
  </div>

  <script>
    // Simple theme detection
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    if (prefersDark) {
      document.body.setAttribute('data-theme', 'dark');
    }
  </script>
</body>
</html>