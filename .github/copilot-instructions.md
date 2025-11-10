# MyXen Foundation - AI Agent Instructions

## Project Overview

MyXen Foundation is a community-focused, fully decentralized open ledger ecosystem built on Solana. The project emphasizes transparency with a developer wallet system visible to all participants.

**Current Status**: Foundation repository established; Next.js application structure pending implementation.

## Technology Stack

- **Blockchain**: Solana
- **Frontend Framework**: Next.js (planned, CI/CD configured)
- **Deployment**: GitHub Pages via Static Site Generation
- **Node Version**: 20.x
- **Package Manager**: Auto-detected (npm/yarn support configured)

## Project Architecture

### Deployment Pipeline

The repository uses GitHub Actions for automated deployment (`.github/workflows/nextjs.yml`):
- Triggers on pushes to `main` branch or manual workflow dispatch
- Auto-detects package manager (yarn or npm) based on lock files
- Builds Next.js with static site generation for GitHub Pages
- Output directory: `./out` (configured for static export)
- Production environment deploys to GitHub Pages with automatic URL

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

### Adding Next.js Project Structure

When initializing the Next.js application:
1. Ensure `next.config.js` includes `output: 'export'` for static generation
2. Configure `basePath` if deploying to a non-root GitHub Pages path
3. Set `images.unoptimized: true` for GitHub Pages compatibility
4. Verify `out` directory is generated during build

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

## Next Steps for Implementation

When building out this repository, prioritize:
1. Initialize Next.js project with static export configuration
2. Implement Solana wallet connection and blockchain interaction
3. Create transparent developer wallet display
4. Build community features (governance, voting, ledger viewing)
5. Ensure all builds produce static output in `./out`

## Special Considerations

- **No Server-Side Rendering**: GitHub Pages hosting requires pure static generation
- **API Routes**: Cannot use Next.js API routes; consider external serverless functions or on-chain data
- **Environment Variables**: Use `NEXT_PUBLIC_` prefix for client-side variables
- **Base Path**: May need configuration if repo name differs from domain root
