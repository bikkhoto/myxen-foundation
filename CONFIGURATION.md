# Configuration Guide

This document provides guidance on configuring the MyXen Foundation DApp for production deployment.

## Developer Wallet Addresses

The DApp displays transparent developer wallets on the homepage. Before deploying to production, you must update the placeholder addresses with your actual Solana wallet addresses.

### Location
File: `components/DeveloperWallets.tsx`

### Current Setup (Placeholders)
```typescript
const [wallets, setWallets] = useState<WalletInfo[]>([
  {
    name: 'Development Fund',
    address: '11111111111111111111111111111111', // PLACEHOLDER
    balance: null,
    loading: true,
  },
  // ... more wallets
]);
```

### How to Update

1. Open `components/DeveloperWallets.tsx`
2. Replace the placeholder addresses with your actual Solana wallet addresses
3. Valid Solana addresses are base58 encoded, typically 32-44 characters
4. Example valid address: `DYw8jCTfwHNRJhhmFcbXvVDTqWMEVFBX6ZKUmG5CNSKK`

### Example Configuration
```typescript
const [wallets, setWallets] = useState<WalletInfo[]>([
  {
    name: 'Development Fund',
    address: 'YourActualSolanaAddressHere1234567890ABC',
    balance: null,
    loading: true,
  },
  {
    name: 'Community Treasury',
    address: 'YourActualSolanaAddressHere1234567890DEF',
    balance: null,
    loading: true,
  },
  {
    name: 'Marketing & Growth',
    address: 'YourActualSolanaAddressHere1234567890GHI',
    balance: null,
    loading: true,
  },
]);
```

## SEO Configuration

### Base URL
Update the base URL in `app/layout.tsx` if deploying to a custom domain:

```typescript
metadataBase: new URL('https://myxenpay.finance'), // Update this
```

### Social Media Handles
Update social media links in `components/Footer.tsx`:
- Twitter/X: Currently set to `@myxenpay`
- Telegram: Currently set to `t.me/myxenpay`
- GitHub: Currently set to `bikkhoto/myxen-foundation`

## Network Configuration

The DApp connects to Solana mainnet by default. To change networks:

### Location
File: `components/WalletProvider.tsx`

### Current Setup
```typescript
const network = WalletAdapterNetwork.Mainnet;
```

### Options
- `WalletAdapterNetwork.Mainnet` - Production (mainnet-beta)
- `WalletAdapterNetwork.Devnet` - Development testing
- `WalletAdapterNetwork.Testnet` - Testing environment

## Environment Variables

While this DApp uses static export and doesn't require server-side environment variables, you can add client-side environment variables:

1. Create `.env.local` (already in .gitignore)
2. Prefix variables with `NEXT_PUBLIC_` for client-side access
3. Example:
   ```
   NEXT_PUBLIC_SOLANA_RPC_URL=https://api.mainnet-beta.solana.com
   NEXT_PUBLIC_ANALYTICS_ID=your-analytics-id
   ```

## Analytics (Optional)

To add analytics tracking:

1. Choose a privacy-respecting analytics service (e.g., Plausible, Fathom)
2. Add the tracking script to `app/layout.tsx`
3. Ensure compliance with privacy regulations (GDPR, CCPA)

## Pre-Deployment Checklist

- [ ] Update all wallet addresses with real Solana addresses
- [ ] Update base URL in metadata if using custom domain
- [ ] Update social media links if different
- [ ] Test wallet connections on mainnet
- [ ] Verify all links work correctly
- [ ] Run `npm run build` to ensure clean build
- [ ] Run `npm run lint` to ensure no errors
- [ ] Test on multiple devices and browsers
- [ ] Verify SEO tags with tools like Twitter Card Validator

## Testing Wallet Addresses

Before deploying, you can test with these Solana devnet addresses:

```
Devnet System Program: 11111111111111111111111111111111
```

For testing on mainnet, create new wallets or use existing ones that you want to display publicly.

## Security Notes

- Never commit private keys or seed phrases to the repository
- All displayed wallet addresses are public by design (read-only)
- The DApp only reads balances; it cannot perform transactions on displayed wallets
- Only connected user wallets can sign transactions

## Support

For questions or issues with configuration:
- Open an issue on GitHub
- Check documentation in `DAPP_README.md`
- Review `IMPLEMENTATION_SUMMARY.md` for technical details
