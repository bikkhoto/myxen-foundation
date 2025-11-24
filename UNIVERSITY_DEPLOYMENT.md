# MyXen.University Deployment Guide

## 🚀 Quick Start

The MyXen.University platform is built with Next.js and configured for static site generation, making it compatible with GitHub Pages and other static hosting services.

## Prerequisites

- Node.js 20.x or higher
- npm or yarn package manager
- Git for version control
- Access to repository

## Local Development

### 1. Clone Repository

```bash
git clone https://github.com/bikkhoto/myxen-foundation.git
cd myxen-foundation
```

### 2. Install Dependencies

```bash
npm ci
```

### 3. Run Development Server

```bash
npm run dev
```

The application will be available at `http://localhost:3000`

### 4. Access University Platform

Navigate to:
- Main Portal: `http://localhost:3000/university`
- Student Portal: `http://localhost:3000/university/student`
- Merchant Dashboard: `http://localhost:3000/university/merchant`
- Admin Dashboard: `http://localhost:3000/university/admin`
- CEO Dashboard: `http://localhost:3000/university/ceo`

## Production Build

### 1. Build Static Site

```bash
npm run build
```

This generates a static site in the `/out` directory.

### 2. Verify Build

Check that all routes are generated:

```bash
ls -la out/university/
```

You should see:
- `index.html` (main portal)
- `student/index.html`
- `merchant/index.html`
- `admin/index.html`
- `ceo/index.html`

## Deployment Options

### Option 1: GitHub Pages (Automatic)

The repository is configured for automatic deployment to GitHub Pages.

#### Configuration

1. GitHub Actions workflow already set up (`.github/workflows/nextjs.yml`)
2. Automatically deploys on push to `main` branch
3. Accessible at: `https://bikkhoto.github.io/myxen-foundation/`

#### Manual Trigger

```bash
# Push to main branch
git add .
git commit -m "Deploy to GitHub Pages"
git push origin main
```

#### Custom Domain Setup

1. Add `CNAME` file to `/public` directory:
   ```
   university.myxenpay.finance
   ```

2. Configure DNS:
   ```
   Type: CNAME
   Name: university
   Value: bikkhoto.github.io
   ```

3. Enable HTTPS in GitHub Pages settings

### Option 2: Vercel

Vercel provides seamless Next.js deployment with zero configuration.

#### Steps

1. **Install Vercel CLI**
   ```bash
   npm install -g vercel
   ```

2. **Deploy**
   ```bash
   vercel
   ```

3. **Production Deployment**
   ```bash
   vercel --prod
   ```

#### Custom Domain

1. Go to Vercel dashboard
2. Project Settings → Domains
3. Add `university.myxenpay.finance`
4. Configure DNS as instructed

### Option 3: Netlify

Netlify offers drag-and-drop deployment and continuous integration.

#### Manual Deployment

1. Build the project:
   ```bash
   npm run build
   ```

2. Drag `/out` folder to Netlify

#### Continuous Deployment

1. Connect GitHub repository
2. Build command: `npm run build`
3. Publish directory: `out`
4. Deploy on push to main branch

#### Custom Domain

1. Netlify Dashboard → Domain Settings
2. Add custom domain: `university.myxenpay.finance`
3. Configure DNS records

### Option 4: AWS S3 + CloudFront

For enterprise-scale hosting with CDN.

#### S3 Setup

1. **Create S3 Bucket**
   ```bash
   aws s3 mb s3://university-myxenpay
   ```

2. **Configure Static Website Hosting**
   ```bash
   aws s3 website s3://university-myxenpay \
     --index-document index.html \
     --error-document 404.html
   ```

3. **Upload Build**
   ```bash
   npm run build
   aws s3 sync out/ s3://university-myxenpay --delete
   ```

#### CloudFront Setup

1. Create CloudFront distribution
2. Origin: S3 bucket
3. Default root object: `index.html`
4. Custom domain: `university.myxenpay.finance`
5. SSL certificate via ACM

### Option 5: cPanel (PHP Hosting)

Since the repository includes PHP subdomains, deploy alongside existing setup.

#### Steps

1. **Build Next.js Application**
   ```bash
   npm run build
   ```

2. **Upload to cPanel**
   - Upload `/out` contents to `/university-dapp/` directory
   - Or use FTP to upload files

3. **Configure Subdomain**
   - Create subdomain in cPanel: `university.myxenpay.finance`
   - Point to `/university-dapp/` directory

4. **Setup .htaccess**
   ```apache
   # Redirect all to index.html for SPA routing
   RewriteEngine On
   RewriteBase /
   RewriteRule ^index\.html$ - [L]
   RewriteCond %{REQUEST_FILENAME} !-f
   RewriteCond %{REQUEST_FILENAME} !-d
   RewriteRule . /index.html [L]
   ```

## Environment Variables

### Frontend Variables

Create `.env.local` for development:

```bash
# Solana Configuration
NEXT_PUBLIC_SOLANA_NETWORK=mainnet-beta
NEXT_PUBLIC_SOLANA_RPC_URL=https://api.mainnet-beta.solana.com

# API Configuration
NEXT_PUBLIC_API_BASE_URL=https://api.myxenpay.finance/v1/university

# Feature Flags
NEXT_PUBLIC_ENABLE_ANALYTICS=true
NEXT_PUBLIC_ENABLE_WALLET_ADAPTER=true
```

### Production Variables

Set in hosting platform:

- **Vercel**: Project Settings → Environment Variables
- **Netlify**: Site Settings → Build & Deploy → Environment
- **GitHub Pages**: Repository Secrets

## Integration with Backend

### API Connection

1. **Update API Base URL**
   ```typescript
   // In API client configuration
   const API_BASE_URL = process.env.NEXT_PUBLIC_API_BASE_URL || 
     'https://api.myxenpay.finance/v1/university';
   ```

2. **Configure CORS**
   Backend must allow requests from:
   - `https://university.myxenpay.finance`
   - `https://bikkhoto.github.io`
   - Development: `http://localhost:3000`

3. **Authentication Flow**
   - JWT tokens stored in localStorage
   - Refresh token mechanism
   - Automatic token refresh

### Solana Integration

1. **RPC Endpoint**
   ```typescript
   const connection = new Connection(
     process.env.NEXT_PUBLIC_SOLANA_RPC_URL || 
     'https://api.mainnet-beta.solana.com'
   );
   ```

2. **Program Addresses**
   Add to environment:
   ```bash
   NEXT_PUBLIC_PAYMENT_PROGRAM_ID=...
   NEXT_PUBLIC_TOKEN_PROGRAM_ID=...
   NEXT_PUBLIC_CASHBACK_PROGRAM_ID=...
   ```

## Monitoring & Analytics

### Google Analytics

1. **Add GA Script**
   In `app/layout.tsx`:
   ```typescript
   <Script src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID" />
   ```

2. **Track Events**
   ```typescript
   gtag('event', 'payment_completed', {
     amount: 12.50,
     merchant: 'Campus Cafe'
   });
   ```

### Sentry Error Tracking

1. **Install Sentry**
   ```bash
   npm install @sentry/nextjs
   ```

2. **Configure**
   ```typescript
   Sentry.init({
     dsn: process.env.NEXT_PUBLIC_SENTRY_DSN,
     environment: process.env.NODE_ENV
   });
   ```

### Uptime Monitoring

Recommended services:
- UptimeRobot (free tier available)
- Pingdom
- Better Uptime

Monitor endpoints:
- `https://university.myxenpay.finance/health`
- `https://university.myxenpay.finance/university`

## Performance Optimization

### Image Optimization

Images are unoptimized for static export. For better performance:

1. **Use Next.js Image with unoptimized flag**
   ```typescript
   <Image src="/logo.png" alt="Logo" unoptimized />
   ```

2. **Or use external CDN**
   - Upload images to Cloudinary/ImageKit
   - Use optimized URLs

### Code Splitting

Already implemented via Next.js:
- Each page is a separate bundle
- Components lazy-loaded
- Automatic code splitting

### Caching Strategy

Configure headers in hosting:

```nginx
# Static assets - 1 year
location ~* \.(js|css|png|jpg|jpeg|gif|ico|svg|woff|woff2)$ {
    expires 1y;
    add_header Cache-Control "public, immutable";
}

# HTML - no cache
location ~* \.html$ {
    expires -1;
    add_header Cache-Control "no-store";
}
```

## Security Best Practices

### HTTPS

- Always use HTTPS in production
- Enable HSTS headers
- Use SSL certificates (Let's Encrypt free)

### Content Security Policy

Add CSP headers:

```
Content-Security-Policy: 
  default-src 'self'; 
  script-src 'self' 'unsafe-inline' 'unsafe-eval'; 
  style-src 'self' 'unsafe-inline'; 
  img-src 'self' data: https:; 
  font-src 'self' data:; 
  connect-src 'self' https://api.myxenpay.finance https://api.mainnet-beta.solana.com;
```

### Environment Security

- Never commit `.env` files
- Use environment variables for secrets
- Rotate API keys regularly
- Use least privilege access

## Rollback Procedures

### Quick Rollback

```bash
# GitHub Pages - revert commit
git revert HEAD
git push origin main

# Vercel - previous deployment
vercel rollback [deployment-url]

# Netlify - dashboard
# Site deploys → Select previous → Publish
```

### Database Rollback

If API schema changes require rollback:
1. Revert API to previous version
2. Run database migrations down
3. Redeploy frontend to compatible version

## Troubleshooting

### Build Fails

**Error**: Module not found
```bash
# Clear cache and reinstall
rm -rf node_modules package-lock.json .next
npm install
npm run build
```

**Error**: Type errors
```bash
# Check TypeScript
npx tsc --noEmit
```

### 404 Errors on Routes

**Issue**: Routes work locally but 404 in production

**Solution**: Ensure hosting supports SPA routing
- GitHub Pages: Check `next.config.ts` has `trailingSlash: true`
- Other hosts: Configure redirect rules

### Wallet Connection Issues

**Issue**: Wallet adapter fails

**Solution**: 
1. Check Solana RPC is accessible
2. Verify wallet extensions installed
3. Check browser console for errors

### API Connection Fails

**Issue**: CORS errors

**Solution**:
1. Verify API CORS configuration
2. Check API base URL is correct
3. Ensure HTTPS in production

## Maintenance

### Regular Updates

```bash
# Update dependencies
npm update

# Check for security vulnerabilities
npm audit

# Fix vulnerabilities
npm audit fix
```

### Monitoring Checklist

- [ ] Check uptime monitoring weekly
- [ ] Review error logs in Sentry
- [ ] Check analytics for unusual patterns
- [ ] Verify SSL certificate validity
- [ ] Test payment flow monthly
- [ ] Review API response times

### Backup Strategy

- Code: Git repository (already backed up)
- Database: Daily automated backups (backend responsibility)
- Configuration: Document all environment variables
- DNS: Export DNS records regularly

## Support & Documentation

### Links

- **Platform Documentation**: `UNIVERSITY_PLATFORM.md`
- **API Specification**: `UNIVERSITY_API_SPEC.md`
- **Repository**: https://github.com/bikkhoto/myxen-foundation
- **Issues**: https://github.com/bikkhoto/myxen-foundation/issues

### Getting Help

1. Check documentation first
2. Search existing GitHub issues
3. Create new issue with details
4. Contact development team

---

**Last Updated**: November 24, 2025  
**Version**: 1.0.0  
**Status**: ✅ Ready for Deployment
