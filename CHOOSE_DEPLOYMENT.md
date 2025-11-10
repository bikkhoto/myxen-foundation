# 🚀 Choose Your Deployment Method

All deployment workflows have been temporarily disabled to stop the failing builds.

## ⚡ Quick Start

Run this command to choose your deployment method:

```bash
./disable-workflows.sh
```

Or manually follow the instructions below.

---

## 📋 Deployment Options

### Option 1: GitHub Pages (Static Hosting)
**Best for**: Static Next.js DApp only

**Steps:**
1. Enable GitHub Pages in settings: 
   - Go to https://github.com/bikkhoto/myxen-foundation/settings/pages
   - Set Source: "GitHub Actions"
2. Enable the workflow:
   ```bash
   mv .github/workflows/nextjs.yml.disabled .github/workflows/nextjs.yml
   git add .github/workflows/nextjs.yml
   git commit -m "Enable GitHub Pages deployment"
   git push
   ```

---

### Option 2: cPanel (PHP + Next.js)
**Best for**: Full-stack deployment with PHP backend

**Steps:**
1. Add GitHub Secret `CPANEL_FTP_PASSWORD`:
   - Go to https://github.com/bikkhoto/myxen-foundation/settings/secrets/actions
2. Enable the workflow:
   ```bash
   mv .github/workflows/cpanel-deploy.yml.disabled .github/workflows/cpanel-deploy.yml
   git add .github/workflows/cpanel-deploy.yml
   git commit -m "Enable cPanel deployment"
   git push
   ```

---

### Option 3: SSH with rsync (Advanced)
**Best for**: Fast, flexible deployment with automatic backups

**Steps:**
1. Add GitHub Secrets (see DEPLOYMENT_FIX.md for details):
   - `SSH_PRIVATE_KEY`
   - `SSH_USER`
   - `SSH_HOST`
   - `SSH_TARGET_PATH`
2. Check out main branch and enable ssh-deploy.yml:
   ```bash
   git checkout main
   git pull origin main
   mv .github/workflows/ssh-deploy.yml.disabled .github/workflows/ssh-deploy.yml
   git add .github/workflows/ssh-deploy.yml
   git commit -m "Enable SSH deployment"
   git push
   ```

---

## 📖 Need More Information?

See `DEPLOYMENT_FIX.md` for detailed explanations and troubleshooting.

## ❓ Still Unsure?

**Recommendation**: Start with **GitHub Pages** if you only need the Next.js DApp and don't require PHP backend support.

---

**Current Status**: All deployment workflows disabled
**Next Action**: Choose one option above and follow the steps
