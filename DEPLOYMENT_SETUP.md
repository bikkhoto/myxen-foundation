# cPanel Git Version Control Deployment Setup

## ✅ Configuration Complete

Your repository is configured to automatically deploy to your cPanel server using **cPanel Git Version Control** feature.

## 📋 Setup Instructions

### Step 1: Configure cPanel Git Version Control

1. **Login to cPanel** at your hosting provider
2. Navigate to **Git Version Control** (under Files section)
3. Click **Create** to add a new repository
4. Configure the repository:
   - **Clone URL**: `https://github.com/bikkhoto/myxen-foundation.git`
   - **Repository Path**: `/home/studyproglobal.com.bd` (or your domain path)
   - **Repository Name**: `myxen-foundation`
   - **Branch**: `main`
5. Click **Create**

### Step 2: Deploy Using cPanel

To deploy your application:

1. Go to **Git Version Control** in cPanel
2. Click **Manage** next to your repository
3. Click **Pull or Deploy** → **Update from Remote**
4. The `.cpanel.yml` file will automatically:
   - ✅ Deploy PHP files to the main directory
   - ✅ Install Composer dependencies
   - ✅ Build and deploy Next.js DApp to `/dapp` subdirectory
   - ✅ Set correct file permissions
   - ✅ Deploy all subdomains

## 🎯 Deployment Details

**What Gets Deployed:**
- PHP Website → `/home/studyproglobal.com.bd/` (root directory)
- Next.js DApp → `/home/studyproglobal.com.bd/dapp/` (subdirectory)
- Backend → `/home/studyproglobal.com.bd/studypro-backend/`
- Subdomains → Various subdomain directories

**Live URLs:**
- Main Site: https://studyproglobal.com.bd (or your domain)
- DApp: https://studyproglobal.com.bd/dapp

## 🔄 How to Deploy Changes

1. **Make your changes locally**
   ```bash
   git add .
   git commit -m "Your changes"
   git push origin main
   ```

2. **Deploy via cPanel**
   - Login to cPanel
   - Go to **Git Version Control**
   - Click **Manage** → **Pull or Deploy** → **Update from Remote**
   - Wait for deployment to complete

## 🛠️ Automatic Deployment Configuration

The `.cpanel.yml` file handles all deployment tasks:
- Copies PHP files from `myxen foundation/` directory
- Installs Composer dependencies
- Builds Next.js application (if Node.js is available)
- Sets proper file permissions (755 for directories, 644 for files)
- Creates writable directories for data and QR codes
- Deploys backend and subdomain applications

## 📝 Files Configured

- ✅ `.cpanel.yml` - cPanel deployment automation script
- ✅ `README.md` - Project documentation
- ✅ `.github/copilot-instructions.md` - AI agent instructions

## 🔍 Troubleshooting

**If deployment fails:**

1. Check cPanel deployment logs in Git Version Control interface
2. Ensure cPanel has enough disk space
3. Verify file permissions are correct
4. Check if Node.js is available on server (for DApp build)

**Common Issues:**

- **"Permission denied"** → Check repository access in cPanel
- **"Directory not found"** → Verify deployment paths in `.cpanel.yml`
- **"Build failed"** → Node.js may not be available; pre-build locally
- **"Composer not available"** → Install Composer via cPanel or skip that step

**Building Locally (if Node.js not on server):**
```bash
# Build Next.js locally
npm ci
npm run build

# Commit the out/ directory
git add out/
git commit -m "Add pre-built Next.js files"
git push origin main
```

## 📞 Need Help?

Check the documentation:
- `.cpanel.yml` - Review deployment configuration
- `README.md` - Project overview
- cPanel Git Version Control documentation

---

**Next Step:** Set up Git Version Control in cPanel and run your first deployment!
