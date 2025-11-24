# Security Notes - Subdomain Implementation

## Pre-Existing Security Issues

During the subdomain reorganization, the following pre-existing security issues were identified in the copied files from the original "myxen foundation" directory. These issues existed before the subdomain implementation and are **NOT** introduced by the reorganization work.

### 1. Hardcoded Database Credentials

**Location**: `*/includes/db.php` in all subdomain directories

**Issue**: Database passwords are hardcoded in plain text:
```php
$pass = 'Nazmuzsakib01715@@##'; // replace only this
```

**Risk**: Credentials exposed in version control and source code

**Recommendation**: 
Move to environment variables:
```php
// In .env file
DB_PASSWORD=your_secure_password

// In db.php
$pass = getenv('DB_PASSWORD') ?: $_ENV['DB_PASSWORD'];
```

**Status**: ⚠️ Pre-existing issue - requires user action

---

### 2. Hardcoded Admin Password

**Location**: `subdomains/admin/index.php`, `subdomains/payroll/payroll-admin.php`

**Issue**: Admin password hardcoded:
```php
$ADMIN_PASSWORD = 'Nazmuzsakib01715@@##';
```

**Risk**: Administrative access credentials exposed

**Recommendation**: 
- Use password hashing (bcrypt/Argon2)
- Store hashed passwords in database
- Implement proper authentication system

**Status**: ⚠️ Pre-existing issue - requires user action

---

### 3. Weak JWT Secret

**Location**: `*/core/identity.php` in multiple subdomain directories

**Issue**: JWT secret uses weak hardcoded value:
```php
$jwt_secret = 'Nazmuzsakib01715@@##';
```

**Risk**: JWT tokens can be forged if secret is compromised

**Recommendation**:
```php
// Generate strong random secret
$jwt_secret = getenv('JWT_SECRET') ?: bin2hex(random_bytes(32));
```

**Status**: ⚠️ Pre-existing issue - requires user action

---

## Security Improvements Implemented in Subdomain Architecture

Despite the pre-existing issues above, the subdomain reorganization **has improved** security in the following ways:

### ✅ 1. HTTPS Enforcement
All subdomains now have `.htaccess` files that force HTTPS:
```apache
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### ✅ 2. Security Headers
Each subdomain includes security headers:
```apache
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options SAMEORIGIN
Header always set X-XSS-Protection "1; mode=block"
```

### ✅ 3. Protected Configuration Files
`.env` and sensitive files are protected:
```apache
<Files ".env">
    Require all denied
</Files>
```

### ✅ 4. Service Isolation
Each subdomain operates independently:
- Separate entry points reduce attack surface
- Compromised subdomain doesn't directly affect others
- Easier to implement subdomain-specific security policies

### ✅ 5. Reduced Code Duplication
Symlinked shared resources prevent security patches from being missed:
- Update assets/vendor once → affects all subdomains
- Easier to maintain and patch

---

## Immediate Action Items (User)

To secure the application, the user should:

### Priority 1 (Critical):
1. **Change all passwords immediately**
   - Database password in `*/includes/db.php`
   - Admin passwords in `admin/index.php` and `payroll/payroll-admin.php`
   - JWT secrets in `*/core/identity.php`

2. **Move credentials to environment variables**
   - Create `.env` file (ensure it's in `.gitignore`)
   - Update all PHP files to read from environment
   - Never commit credentials to Git

3. **Regenerate JWT secret**
   - Use cryptographically secure random value
   - Store in environment variable
   - Rotate periodically

### Priority 2 (High):
4. **Implement password hashing**
   - Use PHP's `password_hash()` function
   - Store only hashed passwords
   - Verify with `password_verify()`

5. **Enable SSL certificates**
   - Configure AutoSSL in cPanel for all subdomains
   - Verify HTTPS is working on all domains

6. **Review and update `.gitignore`**
   - Ensure `.env` is excluded
   - Exclude any logs with sensitive data
   - Exclude database dumps

### Priority 3 (Medium):
7. **Implement rate limiting**
   - Protect login endpoints from brute force
   - Use Fail2Ban or similar tools
   - Add CAPTCHA on sensitive forms

8. **Set up security monitoring**
   - Enable ModSecurity in cPanel
   - Monitor error logs for suspicious activity
   - Set up intrusion detection

9. **Regular security updates**
   - Keep PHP version updated
   - Update Composer dependencies regularly
   - Review and apply security patches

---

## Security Best Practices Going Forward

### For Development:
- ✅ Never commit credentials to Git
- ✅ Use environment variables for all secrets
- ✅ Implement proper authentication and authorization
- ✅ Use prepared statements for all database queries
- ✅ Validate and sanitize all user input
- ✅ Keep dependencies updated

### For Deployment:
- ✅ Use HTTPS everywhere (already configured)
- ✅ Set proper file permissions (644 for files, 755 for directories)
- ✅ Disable directory listing
- ✅ Keep error messages generic (don't expose system details)
- ✅ Enable PHP security features (disable_functions, open_basedir)

### For Monitoring:
- ✅ Review logs regularly
- ✅ Monitor for failed login attempts
- ✅ Set up alerts for suspicious activity
- ✅ Perform regular security audits
- ✅ Keep backups (encrypted if possible)

---

## Example: Secure Configuration

### Step 1: Create `.env` file (NOT in Git)
```env
# Database
DB_HOST=localhost
DB_NAME=myxenpay__myxn
DB_USER=myxenpay_admin
DB_PASSWORD=your_very_strong_random_password_here

# Security
JWT_SECRET=your_cryptographically_secure_random_string_here
ADMIN_HASH=$2y$10$your_bcrypt_hashed_admin_password_here
```

### Step 2: Update `includes/db.php`
```php
<?php
// Load environment variables
if (file_exists(__DIR__ . '/../.env')) {
    $env = parse_ini_file(__DIR__ . '/../.env');
    foreach ($env as $key => $value) {
        putenv("$key=$value");
    }
}

$host = getenv('DB_HOST') ?: 'localhost';
$db   = getenv('DB_NAME') ?: 'myxenpay__myxn';
$user = getenv('DB_USER') ?: 'myxenpay_admin';
$pass = getenv('DB_PASSWORD');

if (!$pass) {
    error_log('DB_PASSWORD not set in environment');
    die('Configuration error');
}

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    error_log('Database connection failed: ' . $conn->connect_error);
    die('Database connection failed');
}
?>
```

### Step 3: Update `admin/index.php`
```php
<?php
session_start();

// Load environment
$env = parse_ini_file(__DIR__ . '/.env');
$ADMIN_PASSWORD_HASH = $env['ADMIN_HASH'] ?? null;

if (!$ADMIN_PASSWORD_HASH) {
    die('Configuration error');
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    if (isset($_POST['password'])) {
        if (password_verify($_POST['password'], $ADMIN_PASSWORD_HASH)) {
            $_SESSION['logged_in'] = true;
            header('Location: admin.php');
            exit;
        }
    }
    // ... show login form
}
?>
```

### Step 4: Generate secure hashes
```bash
# Generate JWT secret
php -r "echo bin2hex(random_bytes(32)) . PHP_EOL;"

# Generate password hash
php -r "echo password_hash('your_password', PASSWORD_BCRYPT) . PHP_EOL;"
```

---

## Disclaimer

The subdomain reorganization work focused on **architectural improvements** and **deployment automation**. Pre-existing security issues in the source code were intentionally left unchanged to maintain minimal modifications to working code.

**The user is responsible for:**
- Reviewing and addressing all security issues
- Changing default passwords
- Implementing proper credential management
- Following security best practices

**This document serves as a guide** to help identify and remediate security concerns.

---

## Summary

| Issue | Severity | Status | Action Required |
|-------|----------|--------|-----------------|
| Hardcoded DB credentials | 🔴 Critical | Pre-existing | User must fix |
| Hardcoded admin passwords | 🔴 Critical | Pre-existing | User must fix |
| Weak JWT secrets | 🟠 High | Pre-existing | User must fix |
| HTTPS enforcement | ✅ Fixed | Implemented | None |
| Security headers | ✅ Fixed | Implemented | None |
| Config file protection | ✅ Fixed | Implemented | None |
| Service isolation | ✅ Improved | Implemented | None |

---

**Last Updated**: November 24, 2025  
**Repository**: https://github.com/bikkhoto/myxen-foundation  
**Related**: See SECURITY.md for general security practices
