# cPanel Deployment Configuration - Fix Summary

## Problem Statement
The `cpanel.yml` configuration was not working, causing deployment failures.

## Root Causes Identified

### 1. Critical SSH Agent Syntax Error
**Location**: `.github/workflows/ssh-deploy.yml`, line 42

**Issue**: 
```yaml
eval "")(ssh-agent -s)"  # ❌ BROKEN - syntax error
```

**Impact**: This syntax error prevented the SSH agent from starting, causing all SSH-based deployments to fail with authentication errors.

**Fix**:
```yaml
eval "$(ssh-agent -s)"  # ✅ FIXED - correct command substitution
```

### 2. Incorrect cPanel Path Structure
**Location**: `.cpanel.yml`

**Issue**: Paths were pointing to `/home/studyproglobal.com.bd` directly, which is not the web root in standard cPanel setups.

**Impact**: Files were deployed to wrong directories, making the website inaccessible.

**Fix**: Updated all paths to use `/home/myxenpay/public_html` which is the standard cPanel web root:
- Main Site: `/home/myxenpay/public_html/`
- Backend: `/home/myxenpay/public_html/admin/` (via subdomain admin.myxenpay.finance)
- DApp: `/home/myxenpay/public_html/dapp/`

### 3. Subdomain Deployment Issues
**Issue**: Subdomain directories were not being created before copying files, causing copy operations to fail.

**Fix**: Added `mkdir -p` commands before each subdomain copy operation to ensure target directories exist.

## Files Modified

### 1. `.github/workflows/ssh-deploy.yml`
- Fixed SSH agent initialization syntax error (line 42)
- This affects GitHub Actions-based SSH deployments

### 2. `.cpanel.yml`
- Updated `DEPLOYPATH` to include `/public_html`
- Updated `BACKENDPATH` to be under `public_html`
- Added `mkdir -p` commands for subdomain directories
- Improved comments explaining path requirements
- Updated all 19 subdomain deployment commands
- Updated final deployment summary messages

### 3. `CPANEL_CONFIGURATION_GUIDE.md` (NEW)
- Comprehensive guide for understanding and customizing cPanel paths
- Troubleshooting section for common deployment issues
- Step-by-step instructions for both deployment methods
- Directory structure diagrams
- Testing procedures

## Deployment Methods

This repository supports two deployment methods:

### Method 1: cPanel Git Deployment
- Uses `.cpanel.yml` for automatic deployment
- Triggered when cPanel pulls from Git repository
- Requires Git integration to be set up in cPanel
- **Status**: ✅ FIXED with path corrections

### Method 2: GitHub Actions SSH Deployment  
- Uses `.github/workflows/ssh-deploy.yml`
- Triggered on push to `main` branch
- Requires SSH secrets configured in GitHub
- **Status**: ✅ FIXED with SSH agent syntax correction

## Validation Performed

✅ **YAML Syntax**: Both files validated successfully
✅ **Task Count**: 84 deployment tasks in `.cpanel.yml`
✅ **Security Scan**: No vulnerabilities detected (CodeQL)
✅ **Code Review**: No issues found

## What You Need to Do

### Step 1: Verify Your cPanel Username
The configuration is set up for:
- **Server**: `server10.cloudswebserver.com`
- **Username**: `myxenpay`
- **Database**: `myxenpay__myxn`
- **DB User**: `myxenpay_admin`

To verify:
1. Log into cPanel at server10.cloudswebserver.com
2. Check the home directory (should be `/home/myxenpay`)
3. If different, update the paths in `.cpanel.yml`

### Step 2: Verify Public HTML Path
Most cPanel accounts use `/home/username/public_html` as the web root.

To verify via SSH:
```bash
ssh myxenpay@server10.cloudswebserver.com
pwd  # Should show /home/myxenpay
ls -la public_html/  # Should show your website files
```

### Step 3: Create Subdomains in cPanel
Before deployment, ensure all 19 subdomains are created in cPanel:

Required subdomains:
- admin.myxenpay.finance
- work.myxenpay.finance
- career.myxenpay.finance
- claim.myxenpay.finance
- blog.myxenpay.finance
- wallets.myxenpay.finance
- payments.myxenpay.finance
- store.myxenpay.finance
- meme.myxenpay.finance
- locker.myxenpay.finance
- university.myxenpay.finance
- remit.myxenpay.finance
- payroll.myxenpay.finance
- students.myxenpay.finance
- merchant.myxenpay.finance
- life.myxenpay.finance
- agent.myxenpay.finance
- api.myxenpay.finance
- docker.myxenpay.finance

### Step 4: Configure GitHub Secrets (for SSH deployment)
If using GitHub Actions SSH deployment, configure these secrets:
- `SSH_HOST`: `server10.cloudswebserver.com`
- `SSH_PORT`: SSH port (usually 22)
- `SSH_USER`: `myxenpay`
- `SSH_PRIVATE_KEY`: Your SSH private key
- `SSH_TARGET_PATH`: `/home/myxenpay/public_html`
- `SSH_PASSPHRASE`: SSH key passphrase (if applicable)

### Step 5: Test Deployment
```bash
# Make a test change
git add .
git commit -m "Test deployment after configuration fix"
git push origin main
```

Monitor deployment:
- **cPanel Git**: Check Git Version Control in cPanel
- **GitHub Actions**: Check Actions tab in GitHub repository

### Step 6: Verify Deployment Success
After deployment, check:
- ✅ Main site: `https://myxenpay.finance`
- ✅ DApp: `https://myxenpay.finance/dapp`
- ✅ Backend API: `https://admin.myxenpay.finance`
- ✅ Admin subdomain: `https://admin.myxenpay.finance`
- ✅ Other subdomains as needed

## Troubleshooting

### "Permission denied" Errors
```bash
chmod -R 755 /home/myxenpay/public_html
find /home/myxenpay/public_html -type f -exec chmod 644 {} \;
```

### "Directory not found" Errors
- Verify the paths in `.cpanel.yml` match your actual cPanel structure
- Check if `public_html` exists: `ls -la /home/myxenpay/`
- Subdomain paths might need adjustment based on your cPanel configuration

### "npm not found" Messages
This is expected if Node.js is not installed on your cPanel server. The configuration includes a fallback:
- Option A: Build via GitHub Actions (recommended)
- Option B: Install Node.js on your cPanel server
- Option C: Build locally and deploy via FTP

### SSH Agent Still Failing
After the syntax fix, if SSH agent issues persist:
1. Verify `SSH_PRIVATE_KEY` secret is correctly formatted (include BEGIN/END lines)
2. Check if passphrase is required and `SSH_PASSPHRASE` is set
3. Verify SSH key has correct permissions on server

## Additional Resources

- **CPANEL_CONFIGURATION_GUIDE.md**: Detailed configuration guide
- **README.md**: Repository overview and architecture
- **CPANEL_SUBDOMAIN_SETUP.md**: Subdomain setup instructions
- **.cpanel.yml**: Deployment configuration file
- **.github/workflows/ssh-deploy.yml**: GitHub Actions workflow

## Summary

✅ **Critical SSH agent syntax error fixed**
✅ **Deployment paths corrected for standard cPanel structure**
✅ **Subdomain deployment improved with error handling**
✅ **Comprehensive documentation added**
✅ **All changes validated and security scanned**

The deployment configuration should now work correctly. If you still experience issues, please:
1. Review the `CPANEL_CONFIGURATION_GUIDE.md`
2. Verify your cPanel directory structure
3. Check deployment logs in cPanel or GitHub Actions
4. Provide your actual cPanel structure so paths can be further customized

---

**Configuration Status**: ✅ READY FOR DEPLOYMENT

**Current Configuration:**
- Server: server10.cloudswebserver.com
- Username: myxenpay
- Main Site: /home/myxenpay/public_html/
- DApp: /home/myxenpay/public_html/dapp/
- Subdomains: /home/myxenpay/{subdomain}.myxenpay.finance/
- Database: myxenpay__myxn (User: myxenpay_admin)
