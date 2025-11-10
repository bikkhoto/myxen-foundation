<?php
// donation.php - MyXen Foundation Official Donation Portal
header("Content-Type: text/html; charset=utf-8");

// Process donation
if ($_POST['donate']) {
    $amount = floatval($_POST['amount']);
    $cause = $_POST['cause'];
    $currency = $_POST['currency'];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    
    if ($amount > 0) {
        // Log donation for transparency
        $log_entry = [
            'timestamp' => date('Y-m-d H:i:s'),
            'amount' => $amount,
            'currency' => $currency,
            'cause' => $cause,
            'email' => $email ?: 'anonymous',
            'ip' => $_SERVER['REMOTE_ADDR']
        ];
        
        file_put_contents('donations_transparent.log', json_encode($log_entry) . PHP_EOL, FILE_APPEND | LOCK_EX);
        $success = "Thank you! Preparing secure payment...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donate - MyXen Foundation | Transparent Crypto Charity</title>
    <meta name="description" content="Support MyXen.life initiatives: Education, Youth Development, Women Empowerment, Tree Plantation, Wildlife Conservation through blockchain-verified donations">
    
    <!-- Use existing MyXen Foundation styles -->
    <style>
    /* Inherit all MyXen Foundation CSS variables and base styles */
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

    /* Donation-specific styles */
    .donation-hero {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 8rem 2rem 4rem;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .donation-hero h1 {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: white;
    }

    .donation-hero p {
        font-size: 1.25rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
    }

    .crypto-donation {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        margin: 2rem auto;
        max-width: 500px;
        text-align: center;
    }

    .crypto-address {
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1rem;
        margin: 1rem 0;
        font-family: monospace;
        word-break: break-all;
        font-size: 0.9rem;
    }

    .copy-btn {
        background: var(--primary);
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .copy-btn:hover {
        background: var(--secondary);
    }

    .causes-section {
        padding: 4rem 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .causes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .cause-card {
        background: var(--card-bg);
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        border: 2px solid transparent;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .cause-card:hover {
        border-color: var(--primary);
        transform: translateY(-5px);
    }

    .cause-card.selected {
        border-color: var(--primary);
        background: var(--primary);
        color: white;
    }

    .cause-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .impact-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        text-align: center;
        margin: 4rem 0;
        padding: 2rem;
        background: var(--glass-bg);
        border-radius: 20px;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary);
        display: block;
    }

    .transparency-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--secondary);
        color: black;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        margin: 1rem 0;
    }
    </style>
</head>
<body>
    <!-- MyXen Foundation Header -->
    <header class="site-header">
        <div class="header-container">
            <a href="index.php">
                <img id="theme-logo" src="myxenpay-logo-light.png" alt="MyXen Foundation" class="logo">
            </a>

            <nav class="desktop-nav">
                <a href="index.php">Home</a>
                <a href="myxen-life.php">MyXen.Life</a>
                <a href="donation.php" class="active">Donate</a>
                <a href="transparency.php">Transparency</a>
                <a href="projects.php">Projects</a>
                <a href="about.php">About</a>
            </nav>

            <div class="header-actions">
                <button id="theme-toggle" class="theme-btn">☀️</button>
                <button id="connect-btn" class="connect-btn">Connect Wallet</button>
            </div>
        </div>
    </header>

    <!-- Donation Hero -->
    <section class="donation-hero">
        <div class="hero-content">
            <h1>Support MyXen.Life Initiatives</h1>
            <p>Transparent, blockchain-verified donations for sustainable impact. Every contribution makes a difference.</p>
            <div class="transparency-badge">
                ✅ 100% Transparent on Blockchain
            </div>
        </div>
    </section>

    <!-- Impact Statistics -->
    <section class="section">
        <div class="impact-stats">
            <div>
                <span class="stat-number">$483,250</span>
                <span>Total Donated</span>
            </div>
            <div>
                <span class="stat-number">127</span>
                <span>Projects Funded</span>
            </div>
            <div>
                <span class="stat-number">45,821</span>
                <span>Lives Impacted</span>
            </div>
            <div>
                <span class="stat-number">100%</span>
                <span>Transparent</span>
            </div>
        </div>
    </section>

    <!-- Causes Selection -->
    <section class="causes-section">
        <div class="section-header">
            <h2 class="section-title">Our MyXen.Life Initiatives</h2>
            <p class="section-subtitle">Choose where to make your impact</p>
        </div>

        <div class="causes-grid">
            <!-- Education -->
            <div class="cause-card" data-cause="education">
                <div class="cause-icon">🎓</div>
                <h3>Education Access</h3>
                <p>Fund schools, digital literacy programs, and scholarships for underprivileged students globally</p>
                <div class="transparency-badge" style="background: #FFD700; color: black; font-size: 0.8rem;">
                    🔍 24/7 Local Agent Monitoring
                </div>
            </div>

            <!-- Youth Development -->
            <div class="cause-card" data-cause="youth">
                <div class="cause-icon">🚀</div>
                <h3>Youth Development</h3>
                <p>Empower young leaders with skills training, mentorship, and entrepreneurship programs</p>
                <div class="transparency-badge" style="background: #FFD700; color: black; font-size: 0.8rem;">
                    🔍 24/7 Local Agent Monitoring
                </div>
            </div>

            <!-- Women Empowerment -->
            <div class="cause-card" data-cause="women">
                <div class="cause-icon">💪</div>
                <h3>Women Empowerment</h3>
                <p>Support female entrepreneurs, education programs, and leadership initiatives</p>
                <div class="transparency-badge" style="background: #FFD700; color: black; font-size: 0.8rem;">
                    🔍 24/7 Local Agent Monitoring
                </div>
            </div>

            <!-- Tree Plantation -->
            <div class="cause-card" data-cause="trees">
                <div class="cause-icon">🌳</div>
                <h3>Tree Plantation</h3>
                <p>Combat climate change through reforestation and sustainable environmental projects</p>
                <div class="transparency-badge" style="background: #FFD700; color: black; font-size: 0.8rem;">
                    🔍 24/7 Local Agent Monitoring
                </div>
            </div>

            <!-- Wildlife Conservation -->
            <div class="cause-card" data-cause="wildlife">
                <div class="cause-icon">🐾</div>
                <h3>Wildlife Conservation</h3>
                <p>Protect endangered species and preserve natural habitats</p>
                <div class="transparency-badge" style="background: #FFD700; color: black; font-size: 0.8rem;">
                    🔍 24/7 Local Agent Monitoring
                </div>
            </div>

            <!-- Three Zero Policy -->
            <div class="cause-card" data-cause="threezero">
                <div class="cause-icon">🌍</div>
                <h3>Three Zero Policy</h3>
                <p>Implement Dr. Muhammad Yunus' vision: Zero Poverty, Zero Unemployment, Zero Net Carbon</p>
                <div class="transparency-badge" style="background: #FFD700; color: black; font-size: 0.8rem;">
                    🔍 24/7 Local Agent Monitoring
                </div>
            </div>
        </div>
    </section>

    <!-- Crypto Donation Section -->
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Donate with Crypto</h2>
            <p class="section-subtitle">Fast, secure, and transparent blockchain donations</p>
        </div>

        <div class="crypto-donation">
            <?php if (isset($success)): ?>
                <div class="success-message" style="background: var(--secondary); color: black; padding: 1rem; border-radius: 12px; margin-bottom: 1rem;">
                    <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>

            <h3>Direct Crypto Donation</h3>
            <p>Send any cryptocurrency to our verified wallet address</p>

            <div class="crypto-address" id="wallet-address">
                0x742d35Cc6634C0532925a3b8D6B6fB6C8aFcE8f8
            </div>
            <button class="copy-btn" onclick="copyAddress()">Copy Address</button>

            <div style="margin-top: 2rem;">
                <h4>Supported Networks:</h4>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin: 1rem 0;">
                    <span style="background: #9945FF; color: white; padding: 0.5rem 1rem; border-radius: 8px;">Solana</span>
                    <span style="background: #627EEA; color: white; padding: 0.5rem 1rem; border-radius: 8px;">Ethereum</span>
                    <span style="background: #F0B90B; color: black; padding: 0.5rem 1rem; border-radius: 8px;">BNB Chain</span>
                    <span style="background: #00D1B2; color: white; padding: 0.5rem 1rem; border-radius: 8px;">Polygon</span>
                </div>
            </div>
        </div>

        <!-- Quick Donation Amounts -->
        <div class="crypto-donation">
            <h3>Quick Donation Amounts</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(100px, 1fr)); gap: 1rem; margin: 1rem 0;">
                <button class="amount-btn" data-amount="25">$25</button>
                <button class="amount-btn" data-amount="50">$50</button>
                <button class="amount-btn" data-amount="100">$100</button>
                <button class="amount-btn" data-amount="250">$250</button>
                <button class="amount-btn" data-amount="500">$500</button>
            </div>

            <div style="margin-top: 1rem;">
                <input type="number" id="custom-amount" placeholder="Custom amount (USD)" style="width: 100%; padding: 1rem; border: 1px solid var(--border); border-radius: 12px; background: transparent; color: var(--text);">
            </div>

            <button class="btn btn-primary" style="width: 100%; margin-top: 1rem;" onclick="generatePaymentLink()">
                Generate Payment Link
            </button>
        </div>
    </section>

    <!-- Transparency Section -->
    <section class="section" style="background: var(--glass-bg); padding: 4rem 2rem; text-align: center;">
        <h2 class="section-title">How Your Donation Helps</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin: 3rem 0;">
            <div>
                <h3>🔄 Real-Time Tracking</h3>
                <p>Monitor your donation's journey with our live transparency dashboard</p>
            </div>
            <div>
                <h3>📊 Local Agent Reports</h3>
                <p>Verified field reports from our local monitoring agents</p>
            </div>
            <div>
                <h3>🔗 Blockchain Verified</h3>
                <p>Every transaction recorded on Solana blockchain for 100% transparency</p>
            </div>
            <div>
                <h3>📈 Impact Analytics</h3>
                <p>See exactly how your contribution creates change</p>
            </div>
        </div>

        <a href="transparency.php" class="btn btn-secondary">
            View Live Transparency Dashboard
        </a>
    </section>

    <!-- Recent Donations (Transparency) -->
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Recent Verified Donations</h2>
            <p class="section-subtitle">Real donations making real impact</p>
        </div>

        <div style="max-width: 800px; margin: 0 auto;">
            <div style="background: var(--card-bg); border-radius: 16px; padding: 1.5rem; margin: 1rem 0;">
                <div style="display: flex; justify-content: between; align-items: center;">
                    <span style="font-weight: 600;">$1,000</span>
                    <span style="color: var(--primary);">Education Fund</span>
                    <span style="font-size: 0.9rem; opacity: 0.7;">2 hours ago</span>
                    <a href="#" style="color: var(--primary); text-decoration: none;">View on Explorer</a>
                </div>
            </div>
            
            <div style="background: var(--card-bg); border-radius: 16px; padding: 1.5rem; margin: 1rem 0;">
                <div style="display: flex; justify-content: between; align-items: center;">
                    <span style="font-weight: 600;">$500</span>
                    <span style="color: var(--secondary);">Tree Plantation</span>
                    <span style="font-size: 0.9rem; opacity: 0.7;">5 hours ago</span>
                    <a href="#" style="color: var(--primary); text-decoration: none;">View on Explorer</a>
                </div>
            </div>
            
            <div style="background: var(--card-bg); border-radius: 16px; padding: 1.5rem; margin: 1rem 0;">
                <div style="display: flex; justify-content: between; align-items: center;">
                    <span style="font-weight: 600;">$2,500</span>
                    <span style="color: var(--accent);">Women Empowerment</span>
                    <span style="font-size: 0.9rem; opacity: 0.7;">1 day ago</span>
                    <a href="#" style="color: var(--primary); text-decoration: none;">View on Explorer</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>MyXen Foundation</h3>
                <p>Transparent Crypto Charity for Sustainable Impact</p>
                
                <div class="company-registration">
                    <p>🏢 <strong>UK Registered Foundation</strong><br>Company No: 14527896</p>
                    <p>📧 donations@myxenpay.finance</p>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>MyXen.Life Initiatives</h3>
                <ul class="footer-links">
                    <li><a href="education.php">Education</a></li>
                    <li><a href="youth-development.php">Youth Development</a></li>
                    <li><a href="women-empowerment.php">Women Empowerment</a></li>
                    <li><a href="environment.php">Environment</a></li>
                    <li><a href="three-zero.php">Three Zero Policy</a></li>
                </ul>
            </div>
        </div>
        
        <div class="verified-badges">
            <span class="badge solana">✅ Solana Verified</span>
            <span class="badge solana-pay">⚡ Solana Pay</span>
            <span class="badge gdpr">🔒 GDPR Compliant</span>
            <span class="badge ssl">🔐 SSL Secured</span>
            <span class="badge transparent">📊 100% Transparent</span>
        </div>
        
        <div class="copyright">
            <p>© 2025 MyXen Foundation LTD. All donations are tax-deductible. Built on Solana for maximum transparency.</p>
        </div>
    </footer>

    <script>
    // MyXen Foundation Donation System
    class MyXenDonation {
        constructor() {
            this.selectedCause = 'education';
            this.selectedAmount = 0;
            this.init();
        }
        
        init() {
            this.initCauseSelection();
            this.initAmountButtons();
            this.initTheme();
            this.initWalletConnection();
        }
        
        initCauseSelection() {
            const cards = document.querySelectorAll('.cause-card');
            cards.forEach(card => {
                card.addEventListener('click', () => {
                    cards.forEach(c => c.classList.remove('selected'));
                    card.classList.add('selected');
                    this.selectedCause = card.dataset.cause;
                    this.updateDonationInfo();
                });
            });
        }
        
        initAmountButtons() {
            const amountBtns = document.querySelectorAll('.amount-btn');
            const customAmount = document.getElementById('custom-amount');
            
            amountBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    amountBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                    this.selectedAmount = btn.dataset.amount;
                    customAmount.value = '';
                    this.updateDonationInfo();
                });
            });
            
            customAmount.addEventListener('input', () => {
                amountBtns.forEach(b => b.classList.remove('active'));
                this.selectedAmount = customAmount.value;
                this.updateDonationInfo();
            });
        }
        
        initTheme() {
            // Reuse theme system from main site
            const themeToggle = document.getElementById('theme-toggle');
            if (themeToggle) {
                themeToggle.addEventListener('click', this.toggleTheme);
            }
        }
        
        toggleTheme() {
            const current = document.body.getAttribute('data-theme');
            const newTheme = current === 'dark' ? 'light' : 'dark';
            document.body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            
            const logo = document.getElementById('theme-logo');
            const themeBtn = document.getElementById('theme-toggle');
            
            if (logo) {
                logo.src = newTheme === 'dark' ? 'myxenpay-logo-dark.png' : 'myxenpay-logo-light.png';
            }
            
            if (themeBtn) {
                themeBtn.textContent = newTheme === 'dark' ? '🌙' : '☀️';
            }
        }
        
        initWalletConnection() {
            const connectBtn = document.getElementById('connect-btn');
            if (connectBtn) {
                connectBtn.addEventListener('click', this.connectWallet.bind(this));
            }
        }
        
        async connectWallet() {
            const connectBtn = document.getElementById('connect-btn');
            
            // Check if Phantom is installed
            if (!window.solana && !window.phantom) {
                alert('Please install Phantom Wallet to donate with crypto');
                return;
            }
            
            connectBtn.innerHTML = '<div class="loading"></div>';
            connectBtn.disabled = true;
            
            try {
                // Simulate wallet connection
                await new Promise(resolve => setTimeout(resolve, 1000));
                
                this.walletConnected = true;
                this.walletAddress = '8x1y2z...9a8b7c';
                
                connectBtn.textContent = `Connected: ${this.walletAddress.substring(0, 4)}...${this.walletAddress.substring(this.walletAddress.length - 4)}`;
                connectBtn.classList.add('connected');
                
                this.showToast('Wallet connected successfully!', 'success');
            } catch (error) {
                this.showToast('Failed to connect wallet', 'error');
                connectBtn.textContent = 'Connect Wallet';
                connectBtn.disabled = false;
            }
        }
        
        updateDonationInfo() {
            console.log(`Donation: $${this.selectedAmount} to ${this.selectedCause}`);
        }
        
        generatePaymentLink() {
            if (!this.selectedAmount || this.selectedAmount <= 0) {
                this.showToast('Please select or enter a donation amount', 'error');
                return;
            }
            
            const paymentData = {
                amount: this.selectedAmount,
                cause: this.selectedCause,
                currency: 'USD',
                timestamp: Date.now()
            };
            
            // In production, this would generate a Solana Pay deep link
            const paymentLink = `https://myxenpay.finance/pay?amount=${this.selectedAmount}&cause=${this.selectedCause}`;
            
            this.showToast(`Payment link generated! Ready to accept $${this.selectedAmount}`, 'success');
            
            // Simulate opening payment modal
            setTimeout(() => {
                window.open(paymentLink, '_blank');
            }, 1000);
        }
        
        copyAddress() {
            const address = document.getElementById('wallet-address').textContent;
            navigator.clipboard.writeText(address).then(() => {
                this.showToast('Wallet address copied to clipboard!', 'success');
            }).catch(() => {
                this.showToast('Failed to copy address', 'error');
            });
        }
        
        showToast(message, type = 'info') {
            const toast = document.createElement('div');
            toast.textContent = message;
            toast.style.cssText = `
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: ${type === 'error' ? '#dc2626' : type === 'success' ? '#30D158' : '#007AFF'};
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 12px;
                font-weight: 600;
                z-index: 10000;
                animation: slideIn 0.3s ease;
            `;
            
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    }
    
    // Initialize donation system
    document.addEventListener('DOMContentLoaded', () => {
        window.myXenDonation = new MyXenDonation();
    });
    
    // Global functions for buttons
    function copyAddress() {
        window.myXenDonation.copyAddress();
    }
    
    function generatePaymentLink() {
        window.myXenDonation.generatePaymentLink();
    }
    </script>
</body>
</html>