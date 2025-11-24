# Cleanup Guide - Removing Duplicate Files from Root

After the subdomain structure is deployed and tested, you can optionally clean up duplicate files from the "myxen foundation" directory to reduce redundancy.

## Files Moved to Subdomains

The following files have been moved to their respective subdomain directories and can be **removed** from the root `myxen foundation/` directory once you verify the subdomains are working:

### Admin-related (→ subdomains/admin/)
- ✅ `admin.php` → `subdomains/admin/index.php`
- ✅ `admin-post-job.php` → `subdomains/admin/admin-post-job.php`

### Work/Career (→ subdomains/work/ & subdomains/career/)
- ✅ `work.php` → `subdomains/work/index.php`
- ✅ `career.php` → `subdomains/career/index.php`
- ✅ `job-country-manager.php` → `subdomains/career/job-country-manager.php`

### Blog (→ subdomains/blog/)
- ✅ `blog.php` → `subdomains/blog/index.php`

### Meme Hub (→ subdomains/meme/)
- ✅ `meme.php` → `subdomains/meme/index.php`

### Locker/Vesting (→ subdomains/locker/)
- ✅ `locker.php` → `subdomains/locker/index.php`

### Store/Merchant (→ subdomains/store/ & subdomains/merchant/)
- ✅ `merchants.php` → `subdomains/store/index.php`
- ✅ `merchant-dashboard.php` → `subdomains/merchant/index.php`
- ✅ `Retail_Commerce.php` → `subdomains/store/Retail_Commerce.php`

### Payments (→ subdomains/payments/)
- ✅ `pay.php` → `subdomains/payments/index.php`
- ✅ `process_payments.php` → `subdomains/payments/process_payments.php`
- ✅ `solana-payment-system.php` → `subdomains/payments/solana-payment-system.php`

### Payroll (→ subdomains/payroll/)
- ✅ `payroll-admin.php` → `subdomains/payroll/payroll-admin.php`
- ✅ `streaming-payroll.php` → `subdomains/payroll/index.php`

### Student (→ subdomains/student/)
- ✅ `student-rewards.php` → `subdomains/student/index.php`
- ✅ `student-verification.php` → `subdomains/student/student-verification.php`

### Wallet (→ subdomains/wallet/)
- ✅ `visa-virtual-card.php` → `subdomains/wallet/index.php`

### Claim/Presale (→ subdomains/claim/)
- ✅ `presale.php` → `subdomains/claim/index.php`
- ✅ `presale1.php` → `subdomains/claim/presale1.php`

## Files to KEEP in Root

These files should **remain** in the `myxen foundation/` directory as they are part of the main website:

### Main Pages
- ✅ `index.php` - Homepage (MUST KEEP)
- ✅ `about.php` - About page
- ✅ `contact.php` - Contact form
- ✅ `documentation.php` - Documentation
- ✅ `developers.php` - Developer resources
- ✅ `faq.html` - FAQ page
- ✅ `terms.php` - Terms of service
- ✅ `privacy.php` - Privacy policy
- ✅ `support.php` - Support page
- ✅ `whitepaper.php` - Whitepaper
- ✅ `tokenomic.php` - Tokenomics
- ✅ `tokenomics.php` - Tokenomics (alternative)
- ✅ `fair-launch.php` - Fair launch info
- ✅ `waitlist.php` - Waitlist signup
- ✅ `demo.php` - Demo page
- ✅ `campus-street-use.php` - Campus use case

### Authentication & Core
- ✅ `login.php` - Login (shared authentication)
- ✅ `signup.php` - Registration
- ✅ `logout.php` - Logout handler
- ✅ `verify.php` - Verification
- ✅ `verify_tx.php` - Transaction verification
- ✅ `success.php` - Success page
- ✅ `test.php` - Testing utilities

### Utilities
- ✅ `qr.php` - QR code generation
- ✅ `donation.php` - Donation handler
- ✅ `imageresize.php` - Image processing
- ✅ `get_csrf.php` - CSRF token endpoint

### Configuration & Core (CRITICAL - DO NOT REMOVE)
- ✅ `config.php` - Main configuration
- ✅ `.env` - Environment variables
- ✅ `.htaccess` - Apache configuration
- ✅ `composer.json` - PHP dependencies
- ✅ `package.json` - Node dependencies
- ✅ `server.js` - Node server
- ✅ All JSON files (merchants.json, metadata.json, etc.)
- ✅ All directories: `admin/`, `api/`, `assets/`, `core/`, `data/`, `includes/`, `modules/`, `vendor/`, `og/`, `.well-known/`

## Cleanup Script (Optional)

**⚠️ IMPORTANT: Only run this AFTER you've verified all subdomains are working correctly in production!**

To clean up duplicate files from root:

```bash
# Navigate to the myxen foundation directory
cd "myxen foundation"

# BACKUP FIRST (highly recommended)
cp -r . ../myxen-foundation-backup-$(date +%Y%m%d)

# Remove subdomain-specific files (they now exist in subdomains/)
rm -f admin.php
rm -f admin-post-job.php
rm -f work.php
rm -f career.php
rm -f job-country-manager.php
rm -f blog.php
rm -f meme.php
rm -f locker.php
rm -f merchants.php
rm -f merchant-dashboard.php
rm -f Retail_Commerce.php
rm -f pay.php
rm -f process_payments.php
rm -f solana-payment-system.php
rm -f payroll-admin.php
rm -f streaming-payroll.php
rm -f student-rewards.php
rm -f student-verification.php
rm -f visa-virtual-card.php
rm -f presale.php
rm -f presale1.php

# Verify files are removed
ls -la *.php | grep -E "(admin|work|career|blog|meme|locker|merchant|pay|payroll|student|presale|visa)" || echo "✅ Cleanup complete"
```

## Alternative: Move Instead of Delete

If you prefer to move files rather than delete (for safety):

```bash
# Create archive directory
mkdir ../archived-subdomain-files

# Move files
mv admin.php work.php career.php blog.php meme.php locker.php \
   merchants.php merchant-dashboard.php Retail_Commerce.php \
   pay.php process_payments.php solana-payment-system.php \
   payroll-admin.php streaming-payroll.php \
   student-rewards.php student-verification.php \
   visa-virtual-card.php presale.php presale1.php \
   ../archived-subdomain-files/

echo "✅ Files moved to ../archived-subdomain-files/"
```

## Verification Checklist

Before cleaning up, verify:

- [ ] All subdomains are accessible via browser
- [ ] Each subdomain loads its index.php correctly
- [ ] Assets (images, CSS, JS) load on subdomains
- [ ] Database connections work on subdomains
- [ ] Forms and interactive features work
- [ ] SSL certificates are installed and working
- [ ] No broken links between main site and subdomains

## Testing Plan

1. **Test Main Site**:
   ```bash
   curl https://myxenpay.finance
   curl https://myxenpay.finance/about
   curl https://myxenpay.finance/contact
   ```

2. **Test Each Subdomain**:
   ```bash
   curl https://admin.myxenpay.finance
   curl https://work.myxenpay.finance
   curl https://career.myxenpay.finance
   curl https://claim.myxenpay.finance
   curl https://blog.myxenpay.finance
   curl https://wallet.myxenpay.finance
   curl https://payments.myxenpay.finance
   curl https://store.myxenpay.finance
   curl https://meme.myxenpay.finance
   curl https://locker.myxenpay.finance
   curl https://payroll.myxenpay.finance
   curl https://student.myxenpay.finance
   curl https://merchant.myxenpay.finance
   ```

3. **Check for Errors**:
   - Review error logs in cPanel
   - Check browser console for 404s
   - Test form submissions
   - Verify database queries work

## Rollback Plan

If something goes wrong after cleanup:

1. **Via Git** (if you committed the removal):
   ```bash
   git revert HEAD
   git push origin main
   ```

2. **From Backup**:
   ```bash
   cp -r ../myxen-foundation-backup-[date]/* "myxen foundation/"
   ```

3. **Re-deploy**:
   The `.cpanel.yml` will restore files on next push

## Benefits of Cleanup

After cleanup:
- ✅ Reduced code duplication
- ✅ Clearer separation of concerns
- ✅ Easier maintenance (update once in subdomain)
- ✅ Smaller main directory
- ✅ Faster deployments
- ✅ Better organization

## Recommendation

**We recommend:**
1. Deploy the subdomain structure first
2. Test thoroughly for 1-2 weeks
3. Monitor error logs and user feedback
4. Then perform cleanup once everything is stable
5. Keep backups before cleanup

## Support

If you need to restore any files:
- They're still in your Git history
- Check the `subdomains/` directory for the moved versions
- Contact support if you need assistance

---

**Note**: This cleanup is **optional**. The duplicate files won't cause issues, they just take up extra space. The subdomains will work correctly whether you clean up or not.
