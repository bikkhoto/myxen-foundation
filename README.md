# MyXen Foundation - Complete Ecosystem

The Official GitHub repository for the MyXen Ecosystem Built on Solana. The first community-focused and fully decentralized open ledger including developer wallets for a totally transparent system.

**Live Website**: https://myxenpay.finance

## 🏗️ Repository Structure

This is a **hybrid monorepo** containing:

### 1. **myxen foundation/** - PHP Backend & Website
Production PHP application powering https://myxenpay.finance
- Payment processing with QR codes
- User authentication & sessions
- MySQL database integration
- Streaming payroll system
- Merchant & student portals
- Virtual card services

### 2. **myxenpay-dapp/** - Next.js DApp Frontend
Modern decentralized application interface
- Token presale interface
- Wallet connection (Phantom, Solflare)
- Claim portal with KYC
- Blockchain transaction display
- Responsive design with Tailwind CSS

## 🚀 Quick Start

### Prerequisites
- PHP 7.4+
- Node.js 20+
- MySQL database
- Composer
- npm or yarn

### Local Development

**PHP Website:**
```bash
cd "myxen foundation"
composer install
cp .env.example .env  # Configure your database
php -S localhost:8000
```

**Next.js dApp:**
```bash
cd myxenpay-dapp
npm install
npm run dev  # Runs on http://localhost:3000
```

## 📦 Deployment

### Automatic Deployment (Recommended)

Push to `main` branch to trigger automatic deployment:

```bash
git add .
git commit -m "Your changes"
git push origin main
```

The `.cpanel.yml` file automatically:
1. Deploys PHP files to `public_html/`
2. Installs Composer dependencies
3. Builds Next.js dApp
4. Deploys dApp to `public_html/dapp/`
5. Sets correct permissions

### GitHub Secrets Required

Add these secrets in GitHub repository settings:
- `CPANEL_FTP_SERVER` - Your cPanel FTP hostname
- `CPANEL_FTP_USER` - FTP username
- `CPANEL_FTP_PASSWORD` - FTP password

### Manual Deployment

See `myxenpay-dapp/docs/CPANEL_DEPLOYMENT.md` for manual deployment instructions.

## 🔗 Architecture

```
┌──────────────────────────────────────────────┐
│         myxenpay.finance (cPanel)            │
├──────────────────────────────────────────────┤
│                                              │
│  PHP Backend (/)                             │
│  ├── Authentication                          │
│  ├── Database Operations                     │
│  ├── Payment Processing                      │
│  └── API Endpoints                           │
│                                              │
│  Next.js dApp (/dapp)                        │
│  ├── Modern UI                               │
│  ├── Wallet Connect                          │
│  ├── Blockchain Interaction                  │
│  └── Token Operations                        │
│                                              │
└──────────┬───────────────────────────────────┘
           │
           ▼
    ┌──────────────┐
    │   Solana     │
    │  Blockchain  │
    │  (mainnet)   │
    └──────────────┘
```

## 🛠️ Technology Stack

**Backend:**
- PHP 7.4+ with Composer
- MySQL database
- Endroid QR Code library
- Session-based auth
- CSRF protection

**Frontend:**
- Next.js 14.2.5 + TypeScript
- Tailwind CSS 3.3
- Solana Web3.js
- Wallet Adapter

**Blockchain:**
- Solana mainnet-beta
- Token: MYXN
- Mint: `CHXoAEvTi3FAEZMkWDJJmUSRXxYAoeco4bDMDZQJVWen`

## 📖 Documentation

Comprehensive documentation in `myxenpay-dapp/docs/`:
- **WHITEPAPER.md** - Technical specifications
- **TOKENOMICS.md** - Token economics
- **CPANEL_DEPLOYMENT.md** - Deployment guide
- **SOLANA_SETUP.md** - Blockchain setup
- **SECURITY.md** - Security practices

## 🔐 Security

- CSRF token protection on all forms
- Rate limiting on API endpoints
- SQL injection prevention (prepared statements)
- Environment variables for sensitive data
- Session management with secure cookies

## 📝 Key Configuration Files

- `.cpanel.yml` - Automatic deployment config
- `myxenpay-dapp/myxen.config.json` - Frontend settings
- `myxen foundation/.env` - PHP environment (not in repo)
- `myxen foundation/config.php` - App configuration

## 🤝 Contributing

1. Create a feature branch
2. Make your changes
3. Test locally (both PHP and Next.js)
4. Submit a pull request

## 📄 License

MIT License - See LICENSE file for details

## 🔗 Links

- **Website**: https://myxenpay.finance
- **DApp**: https://myxenpay.finance/dapp
- **Documentation**: `myxenpay-dapp/docs/`
- **Architecture Diagram**: See `myxen core.png`
- **System Design**: See `Myxenpay Core.docx`

## 💬 Support

For issues, questions, or contributions, please open a GitHub issue or contact the development team.
