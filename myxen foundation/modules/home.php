<?php
// modules/home.php - Home page content with fixes
?>

<style>
/* Additional CSS for responsive fixes */
:root {
    --primary: #1a3c34;
    --secondary: #e9c46a;
    --light: #f8f9fa;
    --dark: #212529;
    --transition: all 0.3s ease;
}

/* Responsive Hero Section */
.hero {
    background: linear-gradient(135deg, #2a9d8f 0%, #e9c46a 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 6rem 2rem 2rem;
    color: var(--light);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.hero h1 {
    font-size: 3rem;
    margin-bottom: 1.5rem;
    line-height: 1.2;
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

/* Social Share Buttons */
.social-share {
    margin: 2rem 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
}

.share-text {
    font-weight: 600;
    font-size: 1.1rem;
}

.social-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    justify-content: center;
}

.social-btn {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 50%;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    cursor: pointer;
    transition: var(--transition);
    backdrop-filter: blur(10px);
}

.social-btn:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
}

/* Hero Actions */
.hero-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 2rem;
}

.btn {
    display: inline-block;
    padding: 0.8rem 1.8rem;
    border-radius: 4px;
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
    border: none;
    cursor: pointer;
    text-align: center;
}

.btn-primary {
    background-color: var(--secondary);
    color: var(--dark);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.btn-secondary {
    background-color: transparent;
    border: 2px solid var(--secondary);
    color: var(--secondary);
}

.btn-secondary:hover {
    background-color: var(--secondary);
    color: var(--dark);
}

/* Countdown Section */
.countdown-section {
    background-color: var(--light);
    padding: 3rem 2rem;
    text-align: center;
}

.countdown-label {
    font-size: 1.5rem;
    margin-bottom: 2rem;
    color: var(--primary);
    font-weight: 600;
}

.countdown-timer {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

.countdown-item {
    background-color: var(--primary);
    color: var(--light);
    padding: 1.5rem;
    border-radius: 8px;
    min-width: 100px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.countdown-number {
    font-size: 2.5rem;
    font-weight: 700;
    display: block;
    line-height: 1;
}

.countdown-unit {
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 0.5rem;
    display: block;
}

/* Notify Section */
.notify-section {
    margin-top: 2rem;
}

.notify-section p {
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

.notify-form {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    max-width: 500px;
    margin: 0 auto;
}

.form-input {
    padding: 0.8rem 1rem;
    border: 2px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    min-width: 250px;
    flex: 1;
}

.form-input:focus {
    outline: none;
    border-color: var(--primary);
}

/* Section Styles */
.section {
    padding: 4rem 2rem;
}

.section-header {
    text-align: center;
    margin-bottom: 3rem;
}

.section-title {
    font-size: 2.5rem;
    color: var(--primary);
    margin-bottom: 1rem;
}

.section-subtitle {
    font-size: 1.2rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}

/* Pre-Sale Table */
.presale-table {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    border-collapse: collapse;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

.presale-table th,
.presale-table td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid #eee;
}

.presale-table th {
    background-color: var(--primary);
    color: var(--light);
    font-weight: 600;
}

.presale-table tr:nth-child(even) {
    background-color: #f8f9fa;
}

.presale-table tr:hover {
    background-color: #e9ecef;
}

.phase-badge {
    background-color: var(--secondary);
    color: var(--dark);
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

/* Features Grid */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.feature-card {
    background: white;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: var(--transition);
    text-align: center;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.feature-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.feature-title {
    font-size: 1.5rem;
    color: var(--primary);
    margin-bottom: 1rem;
}

.feature-description {
    color: #666;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.feature-link {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    transition: var(--transition);
}

.feature-link:hover {
    color: var(--secondary);
}

/* Animations */
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

/* Loading Animation */
.loading {
    width: 20px;
    height: 20px;
    border: 2px solid transparent;
    border-top: 2px solid var(--dark);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero h1 {
        font-size: 2.2rem;
    }
    
    .hero p {
        font-size: 1rem;
    }
    
    .countdown-timer {
        gap: 1rem;
    }
    
    .countdown-item {
        min-width: 80px;
        padding: 1rem;
    }
    
    .countdown-number {
        font-size: 2rem;
    }
    
    .notify-form {
        flex-direction: column;
        align-items: center;
    }
    
    .form-input {
        min-width: auto;
        width: 100%;
        max-width: 300px;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .presale-table {
        font-size: 0.9rem;
    }
    
    .presale-table th,
    .presale-table td {
        padding: 0.8rem 0.5rem;
    }
}

@media (max-width: 480px) {
    .hero {
        padding: 4rem 1rem 1rem;
    }
    
    .hero h1 {
        font-size: 1.8rem;
    }
    
    .countdown-item {
        min-width: 70px;
        padding: 0.8rem;
    }
    
    .countdown-number {
        font-size: 1.8rem;
    }
    
    .section {
        padding: 3rem 1rem;
    }
    
    .btn {
        padding: 0.7rem 1.5rem;
        width: 100%;
        max-width: 250px;
    }
    
    .hero-actions {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<!-- Hero Section - Updated to match tokenomics style -->
<section class="hero">
    <div class="hero-content fade-in-up">
    <h1>Building a Decentralized Tomorrow</h1>
    <p>MyXen Foundation - Official Master Development & Vision Document. Pre-Sale starting November 10, 2025.</p>
    
    <!-- Social Share Buttons in Hero -->
    <div class="social-share">
        <div class="share-text">Share MyXen Foundation</div>
        <div class="social-buttons">
            <button class="social-btn twitter" title="Share on Twitter">🐦</button>
            <button class="social-btn telegram" title="Share on Telegram">📢</button>
            <button class="social-btn whatsapp" title="Share on WhatsApp">💬</button>
            <button class="social-btn linkedin" title="Share on LinkedIn">💼</button>
            <button class="social-btn facebook" title="Share on Facebook">📘</button>
            <button class="social-btn reddit" title="Share on Reddit">🤖</button>
            <button class="social-btn copy" title="Copy link">🔗</button>
        </div>
    </div>
    
    <div class="hero-actions">
        <a href="index.php?page=presale" class="btn btn-primary">
        Join Pre-Sale
        </a>
        <a href="whitepaper.php" class="btn btn-secondary">
        Read Whitepaper
        </a>
    </div>
    </div>
</section>

<!-- Countdown Section -->
<section class="countdown-section fade-in-up">
    <div class="countdown-label">Pre-Sale Starting November 10, 2025</div>
    <div class="countdown-timer" id="countdown">
    <div class="countdown-item">
        <span class="countdown-number" id="days">00</span>
        <span class="countdown-unit">Days</span>
    </div>
    <div class="countdown-item">
        <span class="countdown-number" id="hours">00</span>
        <span class="countdown-unit">Hours</span>
    </div>
    <div class="countdown-item">
        <span class="countdown-number" id="minutes">00</span>
        <span class="countdown-unit">Minutes</span>
    </div>
    <div class="countdown-item">
        <span class="countdown-number" id="seconds">00</span>
        <span class="countdown-unit">Seconds</span>
    </div>
    </div>
    
    <div class="notify-section">
    <p>Get notified when our Pre-Sale goes live</p>
    <form class="notify-form" id="launch-notify-form">
        <input type="email" class="form-input" placeholder="your@email.com" required />
        <button type="submit" class="btn btn-primary">Notify Me</button>
    </form>
    </div>
</section>

<!-- Pre-Sale Phases -->
<section class="section">
    <div class="section-header">
    <h2 class="section-title">Pre-Sale Phases</h2>
    <p class="section-subtitle">6 phases with increasing price - Starting November 10, 2025</p>
    </div>
    
    <table class="presale-table">
    <thead>
        <tr>
        <th>Phase</th>
        <th>Range (MYXN)</th>
        <th>Price (USD)</th>
        <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>Phase 1</td>
        <td>0–25M</td>
        <td>$0.0001</td>
        <td><span class="phase-badge">Upcoming</span></td>
        </tr>
        <tr>
        <td>Phase 2</td>
        <td>25M–100M</td>
        <td>$0.0005</td>
        <td><span class="phase-badge">Upcoming</span></td>
        </tr>
        <tr>
        <td>Phase 3</td>
        <td>100M–150M</td>
        <td>$0.001</td>
        <td><span class="phase-badge">Upcoming</span></td>
        </tr>
        <tr>
        <td>Phase 4</td>
        <td>150M–200M</td>
        <td>$0.002</td>
        <td><span class="phase-badge">Upcoming</span></td>
        </tr>
        <tr>
        <td>Phase 5</td>
        <td>200M–250M</td>
        <td>$0.003</td>
        <td><span class="phase-badge">Upcoming</span></td>
        </tr>
        <tr>
        <td>Phase 6</td>
        <td>250M–300M</td>
        <td>$0.005</td>
        <td><span class="phase-badge">Upcoming</span></td>
        </tr>
    </tbody>
    </table>
</section>

<!-- Core Features -->
<section class="section">
    <div class="section-header">
    <h2 class="section-title">MyXen Ecosystem</h2>
    <p class="section-subtitle">Comprehensive suite of decentralized applications</p>
    </div>
    <div class="features-grid">
    <div class="feature-card fade-in-up">
        <div class="feature-icon">💳</div>
        <h3 class="feature-title">MyXenPay</h3>
        <p class="feature-description">Main Utility Token for payments, QR codes, merchant solutions, and student tuition fees.</p>
        <a href="myxenpay.php" class="feature-link">Learn more →</a>
    </div>
    <div class="feature-card fade-in-up">
        <div class="feature-icon">🚀</div>
        <h3 class="feature-title">MyXen Meme</h3>
        <p class="feature-description">Fuel of MyXen Ecosystem - Community engagement and marketing platform.</p>
        <a href="myxen-meme.php" class="feature-link">Learn more →</a>
    </div>
    <div class="feature-card fade-in-up">
        <div class="feature-icon">🌍</div>
        <h3 class="feature-title">MyXen.Life</h3>
        <p class="feature-description">3 Zero Idea implementation - Sustainable and impactful global initiatives.</p>
        <a href="myxen-life.php" class="feature-link">Learn more →</a>
    </div>
    <div class="feature-card fade-in-up">
        <div class="feature-icon">🎓</div>
        <h3 class="feature-title">MyXen.University</h3>
        <p class="feature-description">Dedicated platform for universities - Student verification and educational payments.</p>
        <a href="index.php?page=university" class="feature-link">Learn more →</a>
    </div>
    <div class="feature-card fade-in-up">
        <div class="feature-icon">⚡</div>
        <h3 class="feature-title">MyXen.CEO</h3>
        <p class="feature-description">Full admin control system for the entire MyXen ecosystem management.</p>
        <a href="myxen-ceo.php" class="feature-link">Learn more →</a>
    </div>
    <div class="feature-card fade-in-up">
        <div class="feature-icon">✈️</div>
        <h3 class="feature-title">MyXen.Travel</h3>
        <p class="feature-description">Book flights and hotels with crypto - Travel made simple with blockchain.</p>
        <a href="index.php?page=travel" class="feature-link">Learn more →</a>
    </div>
    </div>
</section>

<!-- Additional Ecosystem Products -->
<section class="section">
    <div class="section-header">
    <h2 class="section-title">Complete Ecosystem</h2>
    <p class="section-subtitle">Everything you need in one unified platform</p>
    </div>
    <div class="features-grid">
    <div class="feature-card fade-in-up">
        <div class="feature-icon">🛠️</div>
        <h3 class="feature-title">MyXen.Work</h3>
        <p class="feature-description">Decentralized freelancing platform - Work globally, get paid instantly.</p>
        <a href="index.php?page=work" class="feature-link">Learn more →</a>
    </div>
    <div class="feature-card fade-in-up">
        <div class="feature-icon">📧</div>
        <h3 class="feature-title">MyXen.Mail</h3>
        <p class="feature-description">Decentralized email platform - Secure communication for the ecosystem.</p>
        <a href="myxen-mail.php" class="feature-link">Learn more →</a>
    </div>
    <div class="feature-card fade-in-up">
        <div class="feature-icon">💬</div>
        <h3 class="feature-title">MyXen.Social</h3>
        <p class="feature-description">Content publishing platform - Create, share, and get rewarded.</p>
        <a href="myxen-social.php" class="feature-link">Learn more →</a>
    </div>
    <div class="feature-card fade-in-up">
        <div class="feature-icon">🛒</div>
        <h3 class="feature-title">MyXen.Store</h3>
        <p class="feature-description">Simple UI/UX e-commerce system - Buy and sell with crypto.</p>
        <a href="index.php?page=store" class="feature-link">Learn more →</a>
    </div>
    <div class="feature-card fade-in-up">
        <div class="feature-icon">🔒</div>
        <h3 class="feature-title">MyXen.Locker</h3>
        <p class="feature-description">Secure token locking and vesting management system.</p>
        <a href="myxen-locker.php" class="feature-link">Learn more →</a>
    </div>
    <div class="feature-card fade-in-up">
        <div class="feature-icon">💰</div>
        <h3 class="feature-title">MyXen.Payroll</h3>
        <p class="feature-description">Enterprise-grade payroll system - Streamlined payment processing.</p>
        <a href="index.php?page=payroll" class="feature-link">Learn more →</a>
    </div>
    </div>
</section>

<script>
// Countdown Timer for Home Page - FIXED VERSION
const PRESALE_DATE = new Date('November 10, 2025 12:00:00 UTC').getTime();

function updateCountdown() {
    const now = new Date().getTime();
    const diff = PRESALE_DATE - now;
    
    if (diff <= 0) {
        document.getElementById('countdown').innerHTML = '<div class="countdown-number" style="color:var(--secondary);font-size:3rem;padding:1rem;">PRE-SALE LIVE!</div>';
        document.querySelector('.notify-section').style.display = 'none';
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

// Waitlist Form for Home Page
function initWaitlistForm() {
    const form = document.getElementById('launch-notify-form');
    if (form) {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const emailInput = e.target.querySelector('input[type="email"]');
            const email = emailInput.value;
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

// Social Share Functionality
function initSocialShare() {
    const shareButtons = document.querySelectorAll('.social-btn');
    const currentUrl = encodeURIComponent(window.location.href);
    const title = encodeURIComponent('MyXen Foundation - Building a Decentralized Tomorrow');
    
    shareButtons.forEach(button => {
        button.addEventListener('click', () => {
            const platform = button.classList[1];
            
            let shareUrl = '';
            switch(platform) {
                case 'twitter':
                    shareUrl = `https://twitter.com/intent/tweet?text=${title}&url=${currentUrl}`;
                    break;
                case 'telegram':
                    shareUrl = `https://t.me/share/url?url=${currentUrl}&text=${title}`;
                    break;
                case 'whatsapp':
                    shareUrl = `https://wa.me/?text=${title}%20${currentUrl}`;
                    break;
                case 'linkedin':
                    shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${currentUrl}`;
                    break;
                case 'facebook':
                    shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`;
                    break;
                case 'reddit':
                    shareUrl = `https://reddit.com/submit?url=${currentUrl}&title=${title}`;
                    break;
                case 'copy':
                    navigator.clipboard.writeText(window.location.href).then(() => {
                        alert('Link copied to clipboard!');
                    });
                    return;
            }
            
            if (shareUrl) {
                window.open(shareUrl, '_blank', 'width=600,height=400');
            }
        });
    });
}

// Initialize home page specific functionality
document.addEventListener('DOMContentLoaded', function() {
    // Start countdown
    setInterval(updateCountdown, 1000);
    updateCountdown();
    
    // Initialize waitlist form
    initWaitlistForm();
    
    // Initialize social share
    initSocialShare();
    
    // Add staggered animation delays
    document.querySelectorAll('.fade-in-up').forEach((el, index) => {
        el.style.animationDelay = `${index * 0.1}s`;
    });
});
</script>