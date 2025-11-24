# cPanel Subdomain Configuration Guide

This guide explains how to configure subdomains in cPanel to work with the MyXen Foundation subdomain structure.

## Overview

The repository now contains a `/subdomains` directory with pre-configured subdomain applications. The `.cpanel.yml` file will automatically deploy these to your cPanel hosting when you push to the main branch.

## Architecture

```
/home/studyproglobal.com.bd/          (Main domain root)
├── index.php                          (Main website from "myxen foundation")
├── admin/                             (admin.myxenpay.finance)
│   └── index.php
├── work/                              (work.myxenpay.finance)
│   └── index.php
├── career/                            (career.myxenpay.finance)
│   └── index.php
├── claim/                             (claim.myxenpay.finance)
│   └── index.php
└── [other subdomains...]
```

## Step-by-Step Setup

### 1. Create Subdomains in cPanel

1. **Log in to cPanel**
   - Navigate to your cPanel dashboard
   - URL typically: `https://yourdomain.com:2083`

2. **Navigate to Domains Section**
   - Find and click on "Domains" or "Subdomains" icon
   - Usually under "Domains" category

3. **Create Each Subdomain**
   
   For each subdomain in the architecture, create it with the following settings:

   #### Admin Subdomain
   - **Subdomain**: `admin`
   - **Domain**: `myxenpay.finance` (or your domain)
   - **Document Root**: `/home/studyproglobal.com.bd/admin`
   - Click "Create"

   #### Work Subdomain
   - **Subdomain**: `work`
   - **Domain**: `myxenpay.finance`
   - **Document Root**: `/home/studyproglobal.com.bd/work`
   - Click "Create"

   #### Career Subdomain
   - **Subdomain**: `career`
   - **Domain**: `myxenpay.finance`
   - **Document Root**: `/home/studyproglobal.com.bd/career`
   - Click "Create"

   Repeat for all subdomains:
   - `claim` → `/claim`
   - `blog` → `/blog`
   - `wallet` → `/wallet`
   - `payments` → `/payments`
   - `store` → `/store`
   - `meme` → `/meme`
   - `locker` → `/locker`
   - `university` → `/university`
   - `remit` → `/remit`
   - `payroll` → `/payroll`
   - `student` → `/student`
   - `merchant` → `/merchant`
   - `life` → `/life`

### 2. Configure SSL Certificates (Optional but Recommended)

1. **Navigate to SSL/TLS Status**
   - In cPanel, go to "Security" → "SSL/TLS Status"

2. **Enable AutoSSL for Subdomains**
   - Select all newly created subdomains
   - Click "Run AutoSSL"
   - Wait for SSL certificates to be issued (usually 5-10 minutes)

### 3. Push Code to Deploy

Once subdomains are created in cPanel:

```bash
# From your local repository
git add .
git commit -m "Deploy subdomain structure"
git push origin main
```

The `.cpanel.yml` will automatically:
1. Deploy main website files to root
2. Deploy each subdomain to its directory
3. Set correct permissions
4. Install dependencies

### 4. Verify Deployment

After deployment, verify each subdomain works:

1. **Check Main Domain**
   ```
   https://myxenpay.finance
   ```

2. **Check Subdomains**
   ```
   https://admin.myxenpay.finance
   https://work.myxenpay.finance
   https://career.myxenpay.finance
   https://claim.myxenpay.finance
   https://blog.myxenpay.finance
   https://wallet.myxenpay.finance
   https://payments.myxenpay.finance
   https://store.myxenpay.finance
   https://meme.myxenpay.finance
   https://locker.myxenpay.finance
   https://university.myxenpay.finance
   https://remit.myxenpay.finance
   https://payroll.myxenpay.finance
   https://student.myxenpay.finance
   https://merchant.myxenpay.finance
   https://life.myxenpay.finance
   ```

## Troubleshooting

### Subdomain Shows 404 Error

**Cause**: Subdomain not created in cPanel or incorrect document root

**Solution**:
1. Verify subdomain exists in cPanel → Domains
2. Check document root matches `/home/studyproglobal.com.bd/[subdomain]`
3. Verify files exist: SSH and run `ls -la /home/studyproglobal.com.bd/admin`

### Subdomain Shows "No input file specified"

**Cause**: Missing index.php or incorrect file permissions

**Solution**:
```bash
# SSH into server
cd /home/studyproglobal.com.bd/admin
ls -la index.php  # Should exist and be readable

# Fix permissions if needed
chmod 644 index.php
chmod 755 .
```

### Assets Not Loading (Images, CSS, JS)

**Cause**: Broken symlinks or incorrect asset paths

**Solution**:
```bash
# SSH into server
cd /home/studyproglobal.com.bd/admin
ls -la assets  # Should be a symlink to ../../myxen foundation/assets

# If broken, recreate symlink
rm assets
ln -s /home/studyproglobal.com.bd/assets assets
```

### SSL Certificate Not Working

**Cause**: AutoSSL hasn't run or failed

**Solution**:
1. Go to cPanel → SSL/TLS Status
2. Find the subdomain
3. Click "Run AutoSSL" or "Include in AutoSSL"
4. Wait 5-10 minutes for certificate issuance
5. If it fails, check domain DNS is pointing to server

### Database Connection Errors

**Cause**: Wrong config.php or .env settings

**Solution**:
1. Check database credentials in subdomain's config.php
2. Verify database exists in cPanel → MySQL Databases
3. Check database user has permissions
4. Test connection:
   ```php
   <?php
   require 'config.php';
   // Add database connection test code
   ?>
   ```

## Manual File Upload (Alternative to Git)

If Git push fails or you prefer manual upload:

1. **Using File Manager**:
   - cPanel → File Manager
   - Navigate to `/home/studyproglobal.com.bd`
   - Upload subdomain folders (admin, work, career, etc.)
   - Extract and set permissions

2. **Using FTP**:
   - Connect via FileZilla or similar
   - Host: `ftp.yourdomain.com`
   - Username: Your cPanel username
   - Password: Your cPanel password
   - Upload to `/home/studyproglobal.com.bd/`

## DNS Configuration (If Using External DNS)

If your domain's nameservers are not pointing to cPanel:

1. **Create A Records** (in your DNS provider):
   ```
   admin.myxenpay.finance    A    [Your Server IP]
   work.myxenpay.finance     A    [Your Server IP]
   career.myxenpay.finance   A    [Your Server IP]
   [... etc for all subdomains]
   ```

2. **Or Create Wildcard**:
   ```
   *.myxenpay.finance        A    [Your Server IP]
   ```

## Performance Optimization

### Enable Caching

1. **OPcache** (cPanel → PHP Configuration):
   - Enable OPcache
   - Set opcache.memory_consumption = 128
   - Set opcache.max_accelerated_files = 10000

2. **Browser Caching** (Already in .htaccess):
   - CSS, JS, images cached for 30 days
   - Configured in each subdomain's .htaccess

### CDN Setup (Optional)

1. **Cloudflare**:
   - Add domain to Cloudflare
   - Point nameservers
   - Enable "Orange Cloud" for subdomains
   - Configure caching rules

## Security Checklist

- [ ] SSL certificates installed on all subdomains
- [ ] HTTPS forced via .htaccess (already configured)
- [ ] .env files protected (already in .htaccess)
- [ ] Security headers enabled (already in .htaccess)
- [ ] File permissions correct (644 for files, 755 for directories)
- [ ] Database credentials secured
- [ ] Admin password changed from default
- [ ] ModSecurity enabled in cPanel
- [ ] Fail2Ban or similar brute-force protection enabled

## Maintenance

### Updating Subdomains

To update a subdomain:

```bash
# Make changes in your local repo
cd /path/to/myxen-foundation
cd subdomains/admin
# Edit index.php or other files

# Commit and push
git add .
git commit -m "Update admin subdomain"
git push origin main

# .cpanel.yml auto-deploys
```

### Monitoring

1. **Check Logs**:
   ```bash
   # SSH into server
   tail -f /home/studyproglobal.com.bd/admin/error.log
   tail -f /home/studyproglobal.com.bd/work/error.log
   ```

2. **Check Resource Usage**:
   - cPanel → Metrics → CPU and Concurrent Connection Usage
   - Monitor during high traffic

3. **Uptime Monitoring**:
   - Use services like UptimeRobot
   - Monitor each subdomain separately

## Backup Strategy

1. **cPanel Backups**:
   - cPanel → Backup → Download Full Backup
   - Schedule: Weekly

2. **Git Repository**:
   - Code is version controlled
   - Can redeploy anytime

3. **Database Backups**:
   - cPanel → phpMyAdmin → Export
   - Or use cPanel Backup for automatic DB backups

## Support

If you encounter issues:

1. Check cPanel error logs
2. Review Apache error logs
3. Test PHP syntax: `php -l index.php`
4. Check file permissions
5. Verify database connectivity
6. Contact hosting support if infrastructure issue

---

**Last Updated**: November 24, 2025  
**Repository**: https://github.com/bikkhoto/myxen-foundation
