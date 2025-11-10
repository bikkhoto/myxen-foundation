# 🔧 MyXen Foundation - Deployment Fix Guide

## 🚨 Main Problem Identified

**Root Cause**: GitHub Pages is **NOT ENABLED** in the repository settings, causing all GitHub Pages deployment workflows to fail.

**Error Message**:
```
Get Pages site failed. Please verify that the repository has Pages enabled 
and configured to build using GitHub Actions
```

## 📊 Current Situation

### Workflows Status
Your repository has **3 ACTIVE deployment workflows** all triggering on push to `main`:

1. ✅ **nextjs.yml** - GitHub Pages deployment (FAILING - Pages not enabled)
2. ✅ **cpanel-deploy.yml** - cPanel FTP deployment (FAILING - likely missing credentials)
3. ✅ **ssh-deploy.yml** - SSH rsync deployment (FAILING - likely missing credentials)

### Build Status
✅ **Next.js build works perfectly!** The code has no issues - only deployment configuration problems.

---

## 🎯 Solution Options

You need to choose **ONE** deployment method. Here are your options:

### Option 1: Enable GitHub Pages (Recommended for Static Sites)

**Pros:**
- Free hosting
- Automatic HTTPS
- Fast global CDN
- No server management

**Cons:**
- Public repositories only (for free tier)
- No server-side PHP support
- Limited to static content

**Steps to Enable:**

1. **Go to Repository Settings**
   - Navigate to: https://github.com/bikkhoto/myxen-foundation/settings/pages

2. **Configure GitHub Pages**
   - Under "Build and deployment"
   - Source: Select "GitHub Actions"
   - This tells GitHub to use the `.github/workflows/nextjs.yml` workflow

3. **Disable Other Workflows**
   - Rename or delete `.github/workflows/cpanel-deploy.yml`
   - Rename or delete `.github/workflows/ssh-deploy.yml`

4. **Push to Main Branch**
   - The next push will trigger the GitHub Pages deployment
   - Your site will be available at: `https://bikkhoto.github.io/myxen-foundation/`

5. **(Optional) Add Custom Domain**
   - In Pages settings, add your custom domain
   - Configure DNS records as instructed

---

### Option 2: Use cPanel Deployment

**Pros:**
- Supports PHP backend
- Your own hosting infrastructure
- Full server control

**Cons:**
- Requires hosting costs
- Need to manage credentials
- Manual server maintenance

**Steps to Enable:**

1. **Add GitHub Secrets**
   - Go to: https://github.com/bikkhoto/myxen-foundation/settings/secrets/actions
   - Add: `CPANEL_FTP_PASSWORD` (your cPanel FTP password)

2. **Disable Other Workflows**
   - Rename `.github/workflows/nextjs.yml` to `.github/workflows/nextjs.yml.disabled`
   - Rename `.github/workflows/ssh-deploy.yml` to `.github/workflows/ssh-deploy.yml.disabled`

3. **Verify cPanel Configuration**
   - Server: `myxenpay.finance`
   - Username: `myxenpay`
   - Deploy Path: `public_html/`

4. **Push to Main**
   - Deployment will start automatically
   - PHP site → `http://myxenpay.finance/`
   - DApp → `http://myxenpay.finance/dapp/`

---

### Option 3: Use SSH Deployment

**Pros:**
- Most flexible
- Fastest deployment (rsync)
- Automatic backups
- Supports both PHP and Next.js

**Cons:**
- Requires SSH access
- Need to set up multiple secrets
- More complex configuration

**Steps to Enable:**

1. **Add GitHub Secrets**
   Go to: https://github.com/bikkhoto/myxen-foundation/settings/secrets/actions
   
   Add these secrets:
   - `SSH_PRIVATE_KEY` - Your SSH private key
   - `SSH_USER` - SSH username
   - `SSH_HOST` - Server hostname (e.g., `myxenpay.finance`)
   - `SSH_TARGET_PATH` - Deployment path (e.g., `/home/myxenpay/public_html`)
   - `SSH_PORT` - SSH port (default: 22)
   - `SSH_PASSPHRASE` - SSH key passphrase (if applicable)

2. **Disable Other Workflows**
   - Rename `.github/workflows/nextjs.yml` to `.github/workflows/nextjs.yml.disabled`
   - Rename `.github/workflows/cpanel-deploy.yml` to `.github/workflows/cpanel-deploy.yml.disabled`

3. **Generate SSH Key Pair** (if needed)
   ```bash
   ssh-keygen -t ed25519 -C "github-deploy-myxenpay"
   ```
   - Add public key to server's `~/.ssh/authorized_keys`
   - Add private key to GitHub Secrets as `SSH_PRIVATE_KEY`

4. **Push to Main**
   - Deployment starts automatically
   - Uses rsync for efficient file transfer
   - Creates automatic backups on server

---

## 🔍 Quick Diagnosis

Run this command to check deployment status:
```bash
curl -H "Accept: application/vnd.github.v3+json" \
  https://api.github.com/repos/bikkhoto/myxen-foundation/actions/runs \
  | grep -A 5 "conclusion"
```

---

## 🛠️ Immediate Fix (Temporary)

**To stop all failing workflows immediately:**

1. **Disable All Workflows**
   ```bash
   # In your local repository
   cd .github/workflows
   mv nextjs.yml nextjs.yml.disabled
   mv cpanel-deploy.yml cpanel-deploy.yml.disabled
   mv ssh-deploy.yml ssh-deploy.yml.disabled
   git add .
   git commit -m "Temporarily disable deployment workflows"
   git push origin main
   ```

2. **Choose Your Deployment Method**
   - Follow one of the options above

3. **Re-enable Only Your Chosen Workflow**
   ```bash
   # Example: Re-enable GitHub Pages
   mv nextjs.yml.disabled nextjs.yml
   git add nextjs.yml
   git commit -m "Enable GitHub Pages deployment"
   git push origin main
   ```

---

## 📝 Recommended Setup

**For This Project**, I recommend:

### **GitHub Pages** if:
- You only need the Next.js DApp
- You don't need the PHP backend
- You want free, fast hosting

### **cPanel or SSH** if:
- You need both PHP site AND Next.js DApp
- You're already paying for hosting
- You need server-side features

---

## 🚀 Best Practice: Single Deployment Workflow

**Only keep ONE active deployment workflow!**

Having multiple workflows causes:
- ❌ Confusing failure notifications
- ❌ Wasted GitHub Actions minutes
- ❌ Unclear which deployment is "live"
- ❌ Potential race conditions

---

## 🆘 Still Need Help?

If deployments still fail after following this guide:

1. Check GitHub Actions logs: https://github.com/bikkhoto/myxen-foundation/actions
2. Verify all secrets are correctly set
3. Test build locally: `npm run build`
4. Check server access (for cPanel/SSH options)

---

## 📌 Summary

**Current Issue**: GitHub Pages NOT enabled → `nextjs.yml` fails
**Impact**: All deployments failing (Pages, cPanel, SSH)
**Root Cause**: Multiple workflows, misconfigured Pages
**Solution**: Choose ONE method, configure it properly, disable others

**Build Status**: ✅ Code is fine, only deployment config needs fixing!

---

**Last Updated**: November 10, 2025
**Status**: Awaiting deployment method selection
