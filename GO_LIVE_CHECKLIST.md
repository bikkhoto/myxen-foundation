# 🚀 MyXen Foundation - Go-Live Checklist

## Pre-Deployment Setup

### GitHub Repository
- [x] `.cpanel.yml` configured for automatic deployment
- [x] Root Next.js app builds successfully (`npm run build`)
- [x] PHP site files in `myxen foundation/` directory

### cPanel Configuration
- [ ] Git Version Control set up and linked to GitHub repo
- [ ] Node.js selector configured (optional, for building on server)
- [ ] PHP version 7.4+ selected
- [ ] MySQL database created and credentials in `.env`
- [ ] Composer available (optional, improves PHP dependency management)

### Domain & SSL
- [ ] Domain `myxenpay.finance` pointing to cPanel server
- [ ] SSL certificate installed and active (HTTPS)
- [ ] `.htaccess` configured for clean URLs

## Deployment Steps

### cPanel Git Deploy
```bash
# In cPanel Git Version Control:
1. Click "Manage" on your repository
2. Click "Pull or Deploy" → "Update from Remote"
3. Wait for .cpanel.yml to execute
4. Verify logs show successful build
```

**To push updates:**
```bash
# Make changes and push to GitHub
git add .
git commit -m "Your changes"
git push origin main

# Then deploy via cPanel Git Version Control interface
```

## Post-Deployment Validation

### Automated Check
```bash
# Run from local machine
./verify-deployment.sh
```

### Manual Verification

#### Root PHP Site (http://myxenpay.finance)
- [ ] Homepage loads without errors
- [ ] Navigation menu works
- [ ] `presale.php` renders correctly
- [ ] `merchants.php` displays merchant list
- [ ] `pay.php` generates QR codes
- [ ] `contact.php` form displays
- [ ] Database connection works (check any page that reads DB)
- [ ] Session/login functionality works
- [ ] File uploads (if applicable) working

#### Next.js DApp (http://myxenpay.finance/dapp)
- [ ] Homepage loads with proper styling
- [ ] Wallet connect button appears
- [ ] Phantom wallet connection works
- [ ] Solflare wallet connection works
- [ ] Developer wallets section shows balances
- [ ] Features section displays correctly
- [ ] Navigation between pages works
- [ ] `/_next/` static assets load (no 404s)
- [ ] Images and logos display

#### Health & Monitoring (http://myxenpay.finance/dapp/health)
- [ ] Health page loads
- [ ] RPC connection shows "Connected"
- [ ] Current slot number displays
- [ ] Block time shows recent timestamp
- [ ] Solana version displays
- [ ] System info section accurate

### Security & Performance

#### File Permissions
```bash
# Should be set automatically by .cpanel.yml, but verify:
# Directories: 755
# Files: 644
# Writable dirs: 777 (data/, assets/qrcodes/)
```

#### Directory Protection
- [ ] `/data/` not browsable
- [ ] `/vendor/` not browsable
- [ ] `/includes/` not browsable
- [ ] `.env` not accessible via web
- [ ] `.git/` not accessible via web

#### Performance
- [ ] Page load < 3 seconds
- [ ] Images optimized and loading
- [ ] CSS/JS assets cached properly
- [ ] No console errors in browser

## Troubleshooting

### PHP Site Issues
```bash
# Check error logs
tail -f myxen\ foundation/error_log

# Test database connection
php -r "require 'myxen foundation/includes/db.php'; echo 'DB OK';"
```

### DApp Issues
```bash
# Rebuild locally to test
npm run build

# Check if out/ directory has all files
ls -la out/

# Test locally
npx serve out
```

### Deployment Fails
- Check cPanel Git Version Control deployment logs
- Ensure cPanel has disk space
- Check Node.js/npm availability on server
- Verify file permissions in deployment directory

## Go-Live Final Steps

1. **Announcement**
   - [ ] Update social media
   - [ ] Send email to mailing list
   - [ ] Post on community channels

2. **Monitoring**
   - [ ] Set up uptime monitoring (UptimeRobot, Pingdom)
   - [ ] Configure error alerting
   - [ ] Enable Google Analytics (if desired)

3. **Backup**
   - [ ] Take full cPanel backup
   - [ ] Export database snapshot
   - [ ] Save copy of `.env` securely offline

4. **Documentation**
   - [ ] Share `DEPLOYMENT_SETUP.md` with team
   - [ ] Document any custom configuration
   - [ ] Note any cPanel-specific settings

## Quick Reference

### URLs
- **Main Site:** http://myxenpay.finance
- **DApp:** http://myxenpay.finance/dapp
- **Health:** http://myxenpay.finance/dapp/health
- **GitHub:** https://github.com/bikkhoto/myxen-foundation
- **Actions:** https://github.com/bikkhoto/myxen-foundation/actions

### Key Files
- `myxen foundation/` → PHP site → `public_html/`
- `out/` → DApp build → `public_html/dapp/`
- `.env` → Database credentials (NOT in repo)
- `myxen.config.json` → DApp configuration

### Support Contacts
- cPanel support: Your hosting provider
- Domain/DNS: Your registrar
- Development: GitHub Issues

---

**Status:** Ready for deployment ✅

**Last Updated:** November 10, 2025
