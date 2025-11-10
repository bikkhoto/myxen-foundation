# MyXen Foundation - AI Agent Instructions

## Project Overview

MyXen Foundation is a comprehensive decentralized financial ecosystem built on Solana, providing payments, payroll, remittance, education rewards, and DeFi services. The platform serves as a transparent, community-focused open ledger with developer wallets visible to all participants.

**Live Website**: https://myxenpay.finance

## Repository Structure

This is a **hybrid monorepo** containing two interconnected applications:

```
myxen-foundation/
├── myxen foundation/      # PHP legacy website (current production)
│   ├── *.php             # Backend services and pages
│   ├── assets/           # CSS, JS, images
│   ├── modules/          # Feature modules (payroll, presale, etc.)
│   ├── api/              # REST API endpoints
│   ├── includes/         # Database and utilities
│   └── vendor/           # Composer dependencies
│
└── myxenpay-dapp/        # Next.js decentralized application
    ├── src/              # React components and pages
    ├── public/           # Static assets
    ├── scripts/          # Solana integration scripts
    └── docs/             # Comprehensive documentation
```

## Technology Stack

**Backend (PHP Website)**:

- PHP 7.4+ with Composer
- MySQL database (`includes/db.php`)
- QR code generation (Endroid/BaconQR)
- Session-based authentication
- CSRF protection and rate limiting

**Frontend (Next.js DApp)**:

- Next.js 14.2.5 with TypeScript
- Tailwind CSS 3.3 for styling
- Solana Web3.js + SPL Token
- Wallet Adapter (Phantom, Solflare)
- Static export for cPanel deployment

**Blockchain**:

- Solana mainnet-beta
- Token: MYXN (CHXoAEvTi3FAEZMkWDJJmUSRXxYAoeco4bDMDZQJVWen)
- Anchor framework for smart contracts

**Deployment**:

- cPanel hosting with Node.js support
- Automatic deployment via `.cpanel.yml`
- PHP site at root, Next.js dApp at `/dapp` subdirectory

## System Architecture

### Integration Model

The system uses a **coexistence architecture**:

- **PHP Backend** handles authentication, database operations, payment processing
- **Next.js dApp** provides modern UI for blockchain interactions
- **Shared APIs** allow communication between systems
- **Solana Blockchain** manages token operations and transactions

### Key Systems & Components

**Payment Processing** (`myxen foundation/pay.php`, `process_payments.php`, `solana-payment-system.php`):

- QR code generation for crypto payments (Endroid QR Code library)
- Transaction verification via Solana RPC
- Processed transactions logged in `processed_tx.json`
- Real-time payment status updates

**Authentication** (`myxen foundation/core/identity.php`, `modules/auth/`):

- Session-based user management
- CSRF token protection (`get_csrf.php`)
- Rate limiting tracked in `data/rate_limits.json`
- Admin access controls (`admin/freeze_control.php`, `admin/index.php`)

**Feature Modules** (`myxen foundation/modules/`):

- `presale.php` - Token presale interface with wallet connect
- `streaming-payroll.php` - Blockchain payroll system
- `merchants.php` - Merchant onboarding and management
- `university.php` - Student rewards program
- `visa-virtual-card.php` - Virtual card services
- `work.php` - Job platform integration

**Database Layer** (`myxen foundation/includes/db.php`):

- MySQL connection wrapper
- Environment variables from `.env` file
- Prepared statements for SQL injection prevention
- Connection pooling

**Next.js dApp Configuration** (`myxenpay-dapp/myxen.config.json`):

- Single source of truth for all application settings
- Token addresses, RPC endpoints, domain configuration
- Dynamically loaded across all pages via `utils/config.ts`

### Deployment Pipeline

**Automatic Deployment via `.cpanel.yml`**:

1. Triggers on push to `main` branch
2. Deploys PHP files to `$HOME/public_html/`
3. Installs Composer dependencies for PHP
4. Builds Next.js dApp with `npm run build`
5. Deploys static Next.js output to `public_html/dapp/`
6. Sets file permissions (755 for dirs, 644 for files)
7. Ensures writable directories: `data/`, `assets/qrcodes/`

**Result**:

- https://myxenpay.finance → PHP website (root)
- https://myxenpay.finance/dapp → Next.js dApp

## Development Workflows

### PHP Website Development

```bash
cd "myxen foundation"

# Install dependencies
composer install

# Run local PHP server (for testing)
php -S localhost:8000

# Edit files directly - changes reflect immediately
```

**Key Files**:

- `index.php` - Homepage
- `config.php` - App configuration
- `includes/db.php` - Database connection
- `.env` - Environment variables (never commit!)

### Next.js dApp Development

```bash
cd myxenpay-dapp

# Install dependencies
npm install

# Run development server
npm run dev  # → http://localhost:3000

# Build for production
npm run build  # Creates 'out' folder

# Configuration
# Edit myxen.config.json for all settings
```

**Key Files**:

- `myxen.config.json` - Central configuration
- `src/pages/` - All pages
- `src/components/` - Reusable components
- `next.config.js` - Next.js settings (static export enabled)

### Database Setup

The PHP site requires MySQL. Schema located in:

- `myxenpay-dapp/docs/db-schema.sql` (reference schema)
- `myxen foundation/includes/db.php` (connection logic)

**Required `.env` variables**:

```env
DB_HOST=localhost
DB_NAME=myxenpay_db
DB_USER=your_user
DB_PASS=your_password
```

### Testing Locally (Both Systems Together)

```bash
# Terminal 1 - PHP Backend
cd "myxen foundation"
php -S localhost:8000

# Terminal 2 - Next.js Frontend
cd myxenpay-dapp
npm run dev

# Access:
# PHP: http://localhost:8000
# dApp: http://localhost:3000
```

## Project-Specific Conventions

### File Organization

**PHP Files**: Keep in `myxen foundation/` directory

- Pages: `*.php` in root
- Modules: `modules/` subdirectory
- APIs: `api/` subdirectory
- Assets: `assets/css/`, `assets/js/`, `assets/images/`

**Next.js Files**: Keep in `myxenpay-dapp/` directory

- Pages: `src/pages/`
- Components: `src/components/`
- Utilities: `src/utils/`, `src/lib/`
- Styles: `src/styles/`

### Security Patterns

**PHP**:

- Always use CSRF tokens for forms (`get_csrf.php`)
- Rate limit API endpoints (check `data/rate_limits.json`)
- Sanitize all user inputs
- Use prepared statements for SQL queries

**Next.js**:

- Prefix public environment variables with `NEXT_PUBLIC_`
- Never expose private keys in frontend code
- Validate wallet signatures server-side (use PHP backend)
- Use Solana wallet adapter for secure connections

### Blockchain Integration

**Solana Connection** (`myxenpay-dapp/src/lib/wallet.ts`):

- Use `@solana/web3.js` for RPC calls
- Use `@solana/wallet-adapter-react` for wallet connections
- RPC endpoint configured in `myxen.config.json`
- Token mint address: `CHXoAEvTi3FAEZMkWDJJmUSRXxYAoeco4bDMDZQJVWen`

**Transaction Processing**:

- PHP backend verifies Solana transactions
- `verify_tx.php` checks transaction signatures
- `processed_tx.json` stores processed transaction hashes
- Never trust frontend-only verification

### QR Code Generation

Uses Endroid QR Code library (`vendor/endroid/qr-code/`):

```php
// Example from pay.php or qr.php
require 'vendor/autoload.php';
use Endroid\QrCode\QrCode;
$qr = QrCode::create($payment_url);
```

## Important Files Reference

**Documentation**:

- `myxenpay-dapp/docs/WHITEPAPER.md` - Technical specifications
- `myxenpay-dapp/docs/TOKENOMICS.md` - Token economics
- `myxenpay-dapp/docs/CPANEL_DEPLOYMENT.md` - Deployment guide
- `myxenpay-dapp/docs/SOLANA_SETUP.md` - Blockchain setup

**Configuration**:

- `.cpanel.yml` - Deployment automation
- `myxenpay-dapp/myxen.config.json` - Frontend config
- `myxen foundation/.env` - PHP environment (not in repo)
- `myxen foundation/config.php` - PHP app config

**Key Scripts**:

- `myxenpay-dapp/scripts/check-token-metadata.ts` - Verify token on-chain
- `myxenpay-dapp/scripts/update-myxn-metadata.ts` - Update token metadata
- `myxenpay-dapp/test-deployment.sh` - Test deployment locally

## Common Tasks

### Adding a New PHP Page

1. Create `new-page.php` in `myxen foundation/`
2. Include header: `<?php require 'includes/db.php'; ?>`
3. Add navigation link in main menu
4. Test locally: `php -S localhost:8000`

### Adding a New Next.js Page

1. Create `new-page.tsx` in `myxenpay-dapp/src/pages/`
2. Import Layout: `import Layout from '@/components/Layout'`
3. Add route to navigation in `Header.tsx`
4. Test: `npm run dev`

### Updating Token Configuration

1. Edit `myxenpay-dapp/myxen.config.json`
2. Update token address, RPC, or other settings
3. Restart dev server for changes to take effect
4. Changes apply across all pages automatically

### Deploying to Production

1. Commit changes to `main` branch
2. Push to GitHub: `git push origin main`
3. `.cpanel.yml` triggers automatic deployment
4. Verify at https://myxenpay.finance

## Troubleshooting

**PHP Issues**:

- Check `myxen foundation/error_log` for errors
- Verify database connection in `includes/db.php`
- Ensure `.env` file exists with correct credentials

**Next.js Issues**:

- Run `npm run build` to check for build errors
- Verify `output: 'export'` is set in `next.config.js`
- Check console for runtime errors
- Ensure `myxen.config.json` is valid JSON

**Deployment Issues**:

- Verify `.cpanel.yml` paths are correct
- Check cPanel file permissions (755/644)
- Ensure Node.js is available on cPanel
- Check `data/` and `assets/qrcodes/` are writable (777)
