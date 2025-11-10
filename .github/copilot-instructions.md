# MyXen Foundation - AI Agent Instructions

## Project Overview

MyXen Foundation is a community-focused, fully decentralized open ledger ecosystem built on Solana. The project emphasizes transparency with a developer wallet system visible to all participants.

**Current Status**: Next.js DApp implemented with Solana wallet integration and transparent developer wallet display. The PHP-based website exists in `myxen foundation/` directory alongside the Next.js application.

## Technology Stack

- **Blockchain**: Solana
- **Frontend Framework**: Next.js with TypeScript and Tailwind CSS
- **Deployment**: GitHub Pages via Static Site Generation
- **Node Version**: 20.x
- **Package Manager**: npm
- **Wallet Integration**: @solana/wallet-adapter-react with Phantom and Solflare support
- **Solana RPC**: Mainnet connection via @solana/web3.js

## Project Architecture

### Repository Structure

The repository contains two main applications:
1. **Next.js DApp** (root directory): Modern Web3 application with Solana wallet integration
2. **PHP Website** (`myxen foundation/` directory): Legacy website with existing Solana integration

### Deployment Pipeline

The repository uses GitHub Actions for automated deployment (`.github/workflows/nextjs.yml`):
- Triggers on pushes to `main` branch or manual workflow dispatch
- Auto-detects package manager (yarn or npm) based on lock files
- Builds Next.js with static site generation for GitHub Pages
- Output directory: `./out` (configured for static export)
- Production environment deploys to GitHub Pages with automatic URL

### DApp Components

- **WalletProvider** (`components/WalletProvider.tsx`): Solana wallet adapter integration
- **Header** (`components/Header.tsx`): Navigation with wallet connection button
- **Hero** (`components/Hero.tsx`): Landing section with connection status
- **DeveloperWallets** (`components/DeveloperWallets.tsx`): Transparent developer wallet display with real-time balances
- **Features** (`components/Features.tsx`): Feature highlights
- **Footer** (`components/Footer.tsx`): Site footer with links

### Key Configuration Details

**Next.js Build**: 
- Must support static export (no server-side features requiring Node.js runtime)
- GitHub Pages configuration auto-injected via `actions/configure-pages@v5`
- Image optimization disabled for static hosting (use `unoptimized` flag)

**Caching Strategy**:
- `.next/cache` cached based on lock files and source file hashes
- Cache key pattern: `{OS}-nextjs-{lockfile-hash}-{source-hash}`

## Development Workflows

### Building Locally

Since the workflow auto-detects package managers:
```bash
# If using npm
npm ci
npx next build

# If using yarn
yarn install
yarn next build
```

### Working with Next.js DApp

The Next.js application is configured for static export:
1. `next.config.ts` includes `output: 'export'` for static generation
2. `images.unoptimized: true` is set for GitHub Pages compatibility
3. Build generates static files in `./out` directory
4. All components use 'use client' directive for client-side interactivity

When making changes:
- Run `npm run build` to generate static export
- Components requiring browser APIs must use 'use client' directive
- Avoid using Next.js server-side features (API routes, server components with dynamic data)

## Project-Specific Conventions

### Blockchain Integration

When implementing Solana integration:
- Developer wallet addresses must be publicly accessible (transparency requirement)
- Consider using `@solana/web3.js` for blockchain interactions
- Transaction history should be queryable and displayable to community

### Community & Transparency

This project prioritizes:
- **Open Development**: All development wallets visible on-chain
- **Community-First**: Features should serve community governance and participation
- **Decentralization**: Avoid centralized control points

## Important Files

- `README.md`: Project mission and overview
- `.github/workflows/nextjs.yml`: Automated deployment configuration
- `LICENSE`: MIT License (permissive open source)
- `logo.png`, `fevicon.jpg`: Brand assets for UI integration

## Implementation Status

### Completed
- ✅ Next.js project initialized with static export configuration
- ✅ Solana wallet connection implemented (Phantom, Solflare)
- ✅ Transparent developer wallet display with real-time balances
- ✅ Responsive UI with Tailwind CSS
- ✅ GitHub Pages deployment configuration

### Future Enhancements
When extending this repository, consider:
1. Add more wallet providers (Ledger, Torus, etc.)
2. Implement transaction history viewing
3. Build community features (governance, voting)
4. Add ledger query and display features
5. Integrate with MyXenPay token contract
6. Add multi-language support

## Special Considerations

- **No Server-Side Rendering**: GitHub Pages hosting requires pure static generation
- **API Routes**: Cannot use Next.js API routes; consider external serverless functions or on-chain data
- **Environment Variables**: Use `NEXT_PUBLIC_` prefix for client-side variables
- **Base Path**: May need configuration if repo name differs from domain root
