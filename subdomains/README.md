# MyXen Foundation - Subdomain Structure

This directory contains all subdomain applications for the MyXen ecosystem. Each subdomain is deployed as a separate directory in cPanel and accessible via its subdomain URL.

## Subdomain Mapping

| Subdomain | Directory | Purpose | Main File |
|-----------|-----------|---------|-----------|
| admin.myxenpay.finance | `/admin` | Admin portal for system management | `index.php` |
| work.myxenpay.finance | `/work` | Freelancer platform | `index.php` |
| career.myxenpay.finance | `/career` | Career and job portal | `index.php` |
| claim.myxenpay.finance | `/claim` | Token claim portal | `index.php` |
| blog.myxenpay.finance | `/blog` | Blog/CMS | `index.php` |
| wallet.myxenpay.finance | `/wallet` | Virtual card & wallet service | `index.php` |
| payments.myxenpay.finance | `/payments` | Payment gateway | `index.php` |
| store.myxenpay.finance | `/store` | Merchant store | `index.php` |
| meme.myxenpay.finance | `/meme` | Meme hub | `index.php` |
| locker.myxenpay.finance | `/locker` | Token locker/vesting | `index.php` |
| university.myxenpay.finance | `/university` | University finance | `index.php` |
| remit.myxenpay.finance | `/remit` | Remit service | `index.php` |
| payroll.myxenpay.finance | `/payroll` | Streaming payroll | `index.php` |
| student.myxenpay.finance | `/student` | Student rewards | `index.php` |
| merchant.myxenpay.finance | `/merchant` | Merchant dashboard | `index.php` |
| life.myxenpay.finance | `/life` | Life/Charity | `index.php` |

## Structure

Each subdomain directory contains:
- `index.php` - Main entry point
- `.htaccess` - Apache configuration
- `config.php` - Configuration file
- `core/` - Core library files (symlinked)
- `includes/` - Include files (symlinked)
- `assets/` - Static assets (symlinked to main assets)
- `vendor/` - Composer dependencies (symlinked)

## Deployment

The `.cpanel.yml` file in the root automatically deploys all subdomains to their respective directories in cPanel.

### Manual Deployment

If you need to manually deploy a subdomain:

```bash
# SSH into cPanel
cd /home/studyproglobal.com.bd

# Copy subdomain files
cp -R /path/to/repo/subdomains/admin ./admin

# Set permissions
chmod -R 755 admin
find admin -type f -exec chmod 644 {} \;
```

## cPanel Subdomain Configuration

In cPanel, ensure each subdomain is configured to point to its directory:

1. Go to cPanel → Domains → Subdomains
2. Create subdomain (e.g., `admin`)
3. Set Document Root to `/home/studyproglobal.com.bd/admin`
4. Save configuration

## Shared Resources

All subdomains share these resources via symlinks:
- `/assets` - Images, CSS, JS
- `/vendor` - PHP Composer packages
- `/core` - Core PHP classes
- `/includes` - Common PHP includes

This prevents duplication and ensures consistency across all subdomains.

## Development

When developing locally, you can simulate subdomain routing:

### Option 1: Using `/etc/hosts`
```bash
# Add to /etc/hosts
127.0.0.1 admin.myxenpay.local
127.0.0.1 work.myxenpay.local
# ... etc
```

### Option 2: Using Port Numbers
```bash
# Start PHP server for each subdomain on different ports
cd subdomains/admin && php -S localhost:8001
cd subdomains/work && php -S localhost:8002
cd subdomains/career && php -S localhost:8003
```

## Adding a New Subdomain

1. Create directory: `mkdir subdomains/newservice`
2. Add `index.php` file with your application code
3. Copy `.htaccess` from another subdomain
4. Copy shared resources (config, core, includes)
5. Update `.cpanel.yml` to include the new subdomain
6. Configure subdomain in cPanel
7. Deploy via Git push

## Security

Each subdomain has:
- HTTPS enforcement via `.htaccess`
- Security headers (X-Frame-Options, CSP, etc.)
- Access restrictions to `.env` and `config.php`
- PHP handler configuration

## Troubleshooting

### Issue: 404 Error on Subdomain
- Check cPanel subdomain configuration
- Verify document root path
- Check `.htaccess` file exists
- Verify file permissions (755 for directories, 644 for files)

### Issue: Assets Not Loading
- Check symlinks: `ls -la subdomain/assets`
- Recreate symlinks if broken: `ln -s ../../myxen foundation/assets subdomain/assets`

### Issue: PHP Errors
- Check error logs: `tail -f subdomain/error.log`
- Verify PHP version in `.htaccess`
- Check file permissions

## Architecture Diagram

```
┌─────────────────────────────────────────────┐
│     myxenpay.finance (Main Domain)          │
│              index.php                       │
└─────────────────────────────────────────────┘
                    │
        ┌───────────┴───────────┐
        │                       │
┌───────▼──────┐     ┌──────────▼────────┐
│  Subdomains  │     │  Static Assets    │
│              │     │  (Shared)         │
│ - admin      │────▶│  - /assets        │
│ - work       │     │  - /vendor        │
│ - career     │     │  - /core          │
│ - claim      │     │  - /includes      │
│ - blog       │     └───────────────────┘
│ - wallet     │
│ - payments   │
│ - store      │
│ - meme       │
│ - locker     │
│ - ...        │
└──────────────┘
```
