# MyXen Foundation - Server Configuration

This document contains the current server and hosting configuration for the MyXen Foundation deployment.

## Server Details

**Hosting Information:**
- **Server**: server10.cloudswebserver.com
- **Control Panel**: cPanel
- **Primary Domain**: myxenpay.finance

## cPanel Account

**Account Credentials:**
- **Username**: myxenpay
- **Home Directory**: /home/myxenpay
- **Web Root**: /home/myxenpay/public_html

## Database Configuration

**MySQL Database:**
- **Database Name**: myxenpay__myxn
- **Database User**: myxenpay_admin
- **Host**: localhost
- **Configuration File**: `myxen foundation/includes/db.php`

## Deployment Structure

### Main Website
- **Path**: `/home/myxenpay/public_html/`
- **URL**: https://myxenpay.finance
- **Source**: `myxen foundation/` directory
- **Type**: PHP application with MySQL backend

### Next.js DApp
- **Path**: `/home/myxenpay/public_html/dapp/`
- **URL**: https://myxenpay.finance/dapp
- **Source**: Built from root Next.js application
- **Build Command**: `npm run build`
- **Output**: `./out` directory

### Backend/Admin
- **Path**: Not yet created (planned for `/home/myxenpay/public_html/admin/`)
- **URL**: Will be accessible via admin.myxenpay.finance subdomain
- **Note**: Backend functionality is currently in subdomain deployment

## Subdomains

All subdomains follow the pattern: `{subdomain}.myxenpay.finance`

| Subdomain | Document Root | Purpose |
|-----------|--------------|---------|
| admin | /home/myxenpay/admin.myxenpay.finance | Admin portal |
| work | /home/myxenpay/work.myxenpay.finance | Freelancer platform |
| career | /home/myxenpay/career.myxenpay.finance | Job portal |
| claim | /home/myxenpay/claim.myxenpay.finance | Token claim interface |
| blog | /home/myxenpay/blog.myxenpay.finance | Content management |
| wallets | /home/myxenpay/wallets.myxenpay.finance | Virtual card services |
| payments | /home/myxenpay/payments.myxenpay.finance | Payment gateway |
| store | /home/myxenpay/store.myxenpay.finance | Merchant storefront |
| meme | /home/myxenpay/meme.myxenpay.finance | Meme hub |
| locker | /home/myxenpay/locker.myxenpay.finance | Token locker |
| university | /home/myxenpay/university.myxenpay.finance | University platform |
| remit | /home/myxenpay/remit.myxenpay.finance | Remittance service |
| payroll | /home/myxenpay/payroll.myxenpay.finance | Streaming payroll |
| students | /home/myxenpay/students.myxenpay.finance | Student rewards |
| merchant | /home/myxenpay/merchant.myxenpay.finance | Merchant dashboard |
| life | /home/myxenpay/life.myxenpay.finance | Life/Charity |
| agent | /home/myxenpay/agent.myxenpay.finance | Agent portal |
| api | /home/myxenpay/api.myxenpay.finance | API Gateway |
| docker | /home/myxenpay/docker.myxenpay.finance | Docker management |

## Email Configuration

**SMTP Settings:**
- **Host**: mail.myxenpay.finance
- **Port**: 465
- **Encryption**: SSL
- **Username**: noreply@myxenpay.finance
- **From Email**: noreply@myxenpay.finance
- **From Name**: MyxenPay
- **Configuration File**: `myxen foundation/.env`

## Deployment Methods

### Method 1: cPanel Git Deployment (Primary)
The repository is configured for automatic deployment via cPanel Git integration:

1. **Setup**:
   - In cPanel → Git Version Control
   - Repository: https://github.com/bikkhoto/myxen-foundation.git
   - Branch: main
   - Clone Path: /home/myxenpay/myxen-foundation

2. **Automatic Deployment**:
   - When code is pushed to `main` branch
   - cPanel pulls changes and runs `.cpanel.yml`
   - Deploys PHP website, Next.js DApp, and all subdomains

3. **Configuration File**: `.cpanel.yml`

### Method 2: GitHub Actions SSH Deployment (Backup)
Alternative deployment via GitHub Actions:

1. **Required Secrets** (to be configured in GitHub):
   - `SSH_HOST`: server10.cloudswebserver.com
   - `SSH_PORT`: 22 (or custom port)
   - `SSH_USER`: myxenpay
   - `SSH_PRIVATE_KEY`: SSH private key for authentication
   - `SSH_TARGET_PATH`: /home/myxenpay/public_html
   - `SSH_PASSPHRASE`: Optional, if SSH key has passphrase

2. **Workflow File**: `.github/workflows/ssh-deploy.yml`
3. **Trigger**: Push to `main` branch or manual dispatch

## File Permissions

**Recommended Permissions:**
```bash
# Directories
chmod 755 /home/myxenpay/public_html

# Files
find /home/myxenpay/public_html -type f -exec chmod 644 {} \;

# Writable directories
chmod 777 /home/myxenpay/public_html/data
chmod 777 /home/myxenpay/public_html/assets/qrcodes
```

## PHP Configuration

- **Version**: PHP 7.4+ required
- **Composer**: Available for dependency management
- **Configuration**: Set via `.htaccess` in each directory

## Blockchain Integration

**Solana Configuration:**
- **Network**: Mainnet-beta
- **Token**: MYXN
- **Token Mint**: CHXoAEvTi3FAEZMkWDJJmUSRXxYAoeco4bDMDZQJVWen
- **Integration**: Via @solana/web3.js in Next.js DApp

## Verification Checklist

After deployment, verify these URLs:

- [ ] Main site: https://myxenpay.finance
- [ ] DApp: https://myxenpay.finance/dapp
- [ ] Admin: https://admin.myxenpay.finance
- [ ] Work: https://work.myxenpay.finance
- [ ] Career: https://career.myxenpay.finance
- [ ] Claim: https://claim.myxenpay.finance
- [ ] Blog: https://blog.myxenpay.finance
- [ ] Wallets: https://wallets.myxenpay.finance
- [ ] Payments: https://payments.myxenpay.finance
- [ ] Store: https://store.myxenpay.finance
- [ ] University: https://university.myxenpay.finance
- [ ] Other subdomains as needed

## Security Notes

1. **Credentials**: The database and SMTP passwords are stored in:
   - `myxen foundation/.env` (SMTP credentials)
   - `myxen foundation/includes/db.php` (Database credentials)

2. **Never Commit**: Ensure `.env` files with actual credentials are not committed to the repository

3. **SSL**: Ensure SSL certificates are configured in cPanel for all domains and subdomains

4. **Backups**: Configure regular backups in cPanel

## Support & Troubleshooting

For issues with deployment:
1. Check cPanel Error Logs
2. Review GitHub Actions workflow logs
3. Verify file permissions
4. Check `.cpanel.yml` configuration
5. Consult `CPANEL_CONFIGURATION_GUIDE.md`

## Last Updated

This configuration was last updated on: November 24, 2025

---

**Note**: Keep this document updated whenever server configuration changes. This is a reference document for deployment and troubleshooting.
