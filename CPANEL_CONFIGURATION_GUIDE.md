# cPanel Deployment Configuration Guide

## Overview

This guide explains how to configure the `.cpanel.yml` file for automatic deployment to your cPanel hosting environment.

## Critical Configuration Issues Fixed

### 1. SSH Deploy Workflow Error (FIXED)
**Location**: `.github/workflows/ssh-deploy.yml` line 42

**Previous (Broken)**:
```yaml
eval "")(ssh-agent -s)"
```

**Fixed**:
```yaml
eval "$(ssh-agent -s)"
```

This syntax error prevented the SSH agent from starting correctly, causing deployment failures.

### 2. cPanel Path Configuration (UPDATED)

**Previous Path Structure**:
```yaml
- export DEPLOYPATH=/home/username
```

**Updated Path Structure**:
```yaml
- export DEPLOYPATH=/home/username/public_html
```

## Understanding cPanel Directory Structure

### Standard cPanel Hosting Structure

In cPanel hosting, the typical directory structure is:

```
/home/
  └── username/              # Your cPanel account username
      ├── public_html/       # Main website root (example.com)
      ├── subdomain1/        # Subdomain root (subdomain1.example.com)
      ├── subdomain2/        # Subdomain root (subdomain2.example.com)
      ├── logs/              # Server logs
      ├── tmp/               # Temporary files
      └── mail/              # Email data
```

### Your Current Configuration

The `.cpanel.yml` is configured for:
- **Server**: `server10.cloudswebserver.com`
- **Username**: `myxenpay`
- **Main Site**: `/home/myxenpay/public_html/`
- **Backend**: `/home/myxenpay/public_html/admin/` (not created yet)
- **Next.js DApp**: `/home/myxenpay/public_html/dapp/`
- **Subdomains**: `/home/myxenpay/{subdomain}.myxenpay.finance/`
- **Database**: `myxenpay__myxn`
- **DB User**: `myxenpay_admin`

## How to Customize Deployment Paths

### Step 1: Identify Your cPanel Username

1. Log in to your cPanel
2. Look at the top-right corner or check the home directory
3. Your username is typically shown in the format `/home/username`

### Step 2: Verify Your Directory Structure

SSH into your server and run:
```bash
pwd
ls -la /home/
```

### Step 3: Update `.cpanel.yml`

Edit the deployment paths in `.cpanel.yml`:

```yaml
deployment:
  tasks:
    # Replace 'myxenpay' with your actual cPanel username if different
    - export DEPLOYPATH=/home/YOUR_USERNAME/public_html
    - export NODE_ENV=production
```

### Step 4: Configure Subdomain Paths

Two common subdomain configurations:

**Option A: Subdomains in Home Directory** (Current Configuration)
```yaml
- export SUBDOMAINSPATH=/home/YOUR_USERNAME
```

**Option B: Subdomains in public_html**
```yaml
- export SUBDOMAINSPATH=/home/YOUR_USERNAME/public_html
```

## Required cPanel Setup

### Before Deployment Works, Ensure:

1. **Main Domain Configuration**
   - Domain is added in cPanel
   - Points to `public_html` directory

2. **Subdomain Creation**
   - Create each subdomain in cPanel (Domains → Subdomains)
   - Note the document root for each subdomain
   - Common patterns:
     - `/home/username/admin` for admin.yourdomain.com
     - `/home/username/public_html/admin` (alternative)

3. **Directory Permissions**
   - `public_html`: 755
   - `data/` directories: 777 (if writable)
   - Files: 644
   - Directories: 755

4. **File Upload Method**
   The repository includes two deployment methods:
   - **Git Pull (cPanel)**: Uses `.cpanel.yml` for automatic deployment on git push
   - **SSH/FTP (GitHub Actions)**: Uses `.github/workflows/ssh-deploy.yml` for external deployment

## Deployment Methods

### Method 1: cPanel Git Deployment (Recommended)

1. In cPanel, go to "Git Version Control"
2. Create a new repository:
   - Repository Path: `/home/myxenpay/myxen-foundation`
   - Repository URL: `https://github.com/bikkhoto/myxen-foundation.git`
   - Branch: `main`

3. The `.cpanel.yml` file will automatically run on deployment

4. After deployment, visit:
   - Main site: `https://myxenpay.finance`
   - DApp: `https://myxenpay.finance/dapp`
   - Backend: `https://admin.myxenpay.finance`

### Method 2: SSH Deployment (GitHub Actions)

1. Configure GitHub Secrets:
   - `SSH_HOST`: Your server hostname
   - `SSH_PORT`: SSH port (usually 22)
   - `SSH_USER`: Your cPanel username
   - `SSH_PRIVATE_KEY`: Your SSH private key
   - `SSH_TARGET_PATH`: Target deployment path
   - `SSH_PASSPHRASE`: SSH key passphrase (optional)

2. Push to `main` branch triggers automatic deployment via SSH

## Troubleshooting

### Issue: "Permission denied"
**Solution**: 
```bash
chmod -R 755 /home/myxenpay/public_html
find /home/myxenpay/public_html -type f -exec chmod 644 {} \;
```

### Issue: "npm not found on server"
**Solution**: 
- The `.cpanel.yml` includes a fallback message
- Build Next.js locally and deploy via FTP/SSH if npm is unavailable on server
- Or use GitHub Actions SSH deploy workflow which builds on GitHub runners

### Issue: "Subdomain not accessible"
**Solution**:
1. Create subdomain in cPanel first
2. Verify subdomain document root path
3. Update `SUBDOMAINSPATH` in `.cpanel.yml` to match
4. Run deployment again

### Issue: "Backend API not working"
**Solution**:
1. Verify admin subdomain is properly configured in cPanel
2. Check PHP version requirements (7.4+)
3. Run `composer install` in the main directory
4. Set proper permissions for data directories

## Testing Your Configuration

### 1. Test Paths Locally
```bash
# SSH into your server
ssh myxenpay@server10.cloudswebserver.com

# Verify paths exist
ls -la /home/myxenpay/public_html
ls -la /home/myxenpay/admin.myxenpay.finance
ls -la /home/myxenpay/work.myxenpay.finance
```

### 2. Test Deployment
```bash
# Make a small change
git add .
git commit -m "Test deployment"
git push origin main
```

### 3. Verify Deployment
Check these URLs:
- Main site: `https://myxenpay.finance`
- DApp: `https://myxenpay.finance/dapp`
- Admin subdomain: `https://admin.myxenpay.finance`

## Additional Configuration

### Environment Variables

Create `.env` file in `myxen foundation/` directory:
```env
DB_HOST=localhost
DB_NAME=your_database
DB_USER=your_db_user
DB_PASS=your_db_password
```

This file is automatically deployed by `.cpanel.yml`.

### Composer Dependencies

PHP dependencies are installed automatically:
```yaml
- /usr/local/bin/composer install --no-dev --optimize-autoloader
```

### Node.js Build (DApp)

If npm is available on server:
```yaml
- npm ci
- npm run build
- /bin/cp -R out/* $DEPLOYPATH/dapp/
```

If npm is not available, use GitHub Actions build instead.

## Need Help?

If you're still experiencing issues:

1. **Check cPanel Error Logs**
   - cPanel → Metrics → Errors
   
2. **Verify Server Requirements**
   - PHP 7.4+
   - Composer (for PHP dependencies)
   - Node.js 20+ (optional, for server builds)
   
3. **Contact Your Hosting Provider**
   - Confirm your home directory path
   - Verify subdomain document roots
   - Check if Git deployment is enabled

## Summary of Changes Made

✅ **Fixed**: SSH agent syntax error in workflow
✅ **Updated**: Main deployment path to include `/public_html`
✅ **Updated**: Backend path to be under `public_html`
✅ **Updated**: DApp path to be under `public_html`
✅ **Improved**: Subdomain deployment with mkdir before copy
✅ **Added**: Comments explaining path configuration
✅ **Created**: This comprehensive configuration guide

## Next Steps

1. Review the paths in `.cpanel.yml`
2. Customize paths to match your actual cPanel structure
3. Test deployment with a small change
4. Monitor deployment logs in cPanel or GitHub Actions
5. Verify all sites and subdomains are accessible
