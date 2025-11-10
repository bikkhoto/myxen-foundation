# GitHub to cPanel Deployment Setup

## ✅ Configuration Complete

Your repository is now configured to automatically deploy to your cPanel server at **myxenpay.finance**.

## 📋 Setup Instructions

### Step 1: Add GitHub Secret

You need to add your FTP password as a GitHub secret:

1. Go to your repository: https://github.com/bikkhoto/myxen-foundation
2. Click **Settings** → **Secrets and variables** → **Actions**
3. Click **New repository secret**
4. Add this secret:
   - **Name**: `CPANEL_FTP_PASSWORD`
   - **Value**: Your cPanel FTP password

### Step 2: Merge to Main Branch

The deployment triggers when you push to the `main` branch. To merge your current changes:

```bash
# Switch to main branch
git checkout main

# Merge the copilot branch
git merge copilot/vscode1762792226157

# Push to GitHub
git push origin main
```

### Step 3: Automatic Deployment

Once pushed to `main`, GitHub Actions will:
1. ✅ Build the Next.js dApp
2. ✅ Package PHP files and Next.js files together
3. ✅ Deploy via FTP to `public_html/` on your cPanel server
4. ✅ Your site goes live automatically!

## 🎯 Deployment Details

**FTP Configuration:**
- Server: `myxenpay.finance`
- Username: `myxenpay`
- Password: (stored in GitHub Secrets)
- Deploy Path: `public_html/`

**What Gets Deployed:**
- PHP Website → `public_html/` (root directory)
- Next.js DApp → `public_html/dapp/` (subdirectory)

**Live URLs:**
- Main Site: http://myxenpay.finance
- DApp: http://myxenpay.finance/dapp

## 🔄 How to Deploy Changes

After initial setup, deployment is automatic:

```bash
# Make your changes
git add .
git commit -m "Your changes"
git push origin main
```

That's it! GitHub Actions handles the rest.

## 🛠️ Manual Deployment (If Needed)

If you need to deploy manually via cPanel Git Version Control:

1. Login to cPanel
2. Go to **Git Version Control**
3. Click **Manage** on your repository
4. Click **Pull or Deploy** → **Update from Remote**
5. The `.cpanel.yml` file will automatically run the deployment

## 📝 Files Configured

- ✅ `.cpanel.yml` - cPanel deployment automation
- ✅ `.github/workflows/cpanel-deploy.yml` - GitHub Actions FTP deployment
- ✅ `README.md` - Project documentation
- ✅ `.github/copilot-instructions.md` - AI agent instructions

## 🔍 Troubleshooting

**If deployment fails:**

1. Check GitHub Actions logs: Repository → Actions tab
2. Verify FTP password is correct in GitHub Secrets
3. Ensure cPanel has enough disk space
4. Check file permissions on cPanel (755 for directories, 644 for files)

**Common Issues:**

- **"Permission denied"** → Check FTP credentials
- **"Directory not found"** → Ensure `public_html/` exists in cPanel
- **"Build failed"** → Check Next.js build logs in Actions

## 📞 Need Help?

Check the documentation:
- `myxenpay-dapp/docs/CPANEL_DEPLOYMENT.md` - Detailed deployment guide
- `.github/copilot-instructions.md` - Architecture overview
- `README.md` - Project overview

---

**Next Step:** Add the `CPANEL_FTP_PASSWORD` secret to GitHub, then push to main branch!
