# MyXen Foundation DApp

A Next.js-based decentralized application (DApp) for the MyXen Foundation, featuring Solana wallet integration and transparent developer wallet displays.

## Features

- 🔐 **Solana Wallet Integration**: Connect with Phantom, Solflare, and other Solana wallets
- 👁️ **Transparent Developer Wallets**: View real-time balances of all developer wallets on-chain
- 🎨 **Modern UI**: Built with Tailwind CSS and responsive design
- ⚡ **Static Site Generation**: Optimized for GitHub Pages deployment
- 🌐 **Mainnet Connection**: Direct connection to Solana mainnet

## Tech Stack

- **Framework**: Next.js 16 with TypeScript
- **Styling**: Tailwind CSS
- **Blockchain**: Solana Web3.js
- **Wallet Adapter**: @solana/wallet-adapter-react
- **Deployment**: GitHub Pages (Static Export)

## Development

### Prerequisites

- Node.js 20.x or higher
- npm

### Installation

```bash
npm install
```

### Development Server

```bash
npm run dev
```

Open [http://localhost:3000](http://localhost:3000) to view the app.

### Building for Production

```bash
npm run build
```

This generates static files in the `./out` directory, ready for GitHub Pages deployment.

### Linting

```bash
npm run lint
```

## Project Structure

```
/
├── app/                    # Next.js app directory
│   ├── layout.tsx         # Root layout with wallet provider
│   ├── page.tsx           # Home page
│   └── globals.css        # Global styles
├── components/            # React components
│   ├── WalletProvider.tsx # Solana wallet adapter setup
│   ├── Header.tsx         # Navigation with wallet button
│   ├── Hero.tsx           # Landing section
│   ├── DeveloperWallets.tsx # Transparent wallet display
│   ├── Features.tsx       # Feature showcase
│   └── Footer.tsx         # Site footer
├── public/                # Static assets
└── next.config.ts         # Next.js configuration
```

## Configuration

### Wallet Integration

The DApp uses Solana mainnet by default. To change the network, edit `components/WalletProvider.tsx`:

```typescript
const network = WalletAdapterNetwork.Mainnet; // or Devnet, Testnet
```

### Developer Wallets

Update the developer wallet addresses in `components/DeveloperWallets.tsx`:

```typescript
const [wallets, setWallets] = useState<WalletInfo[]>([
  {
    name: 'Development Fund',
    address: 'YOUR_WALLET_ADDRESS_HERE',
    balance: null,
    loading: true,
  },
  // Add more wallets as needed
]);
```

## Deployment

The project is configured for automatic deployment to GitHub Pages via GitHub Actions:

1. Push to `main` branch
2. GitHub Actions workflow builds the Next.js app
3. Static files are deployed to GitHub Pages

The workflow is defined in `.github/workflows/nextjs.yml`.

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## Security

- All developer wallets are publicly visible by design for transparency
- Never commit private keys or sensitive credentials
- Use environment variables (prefixed with `NEXT_PUBLIC_`) for client-side configuration

## License

MIT License - see LICENSE file for details

## Links

- Website: [myxenpay.finance](https://myxenpay.finance)
- Twitter: [@myxenpay](https://x.com/myxenpay)
- Telegram: [t.me/myxenpay](https://t.me/myxenpay)

## Support

For issues or questions, please open an issue on GitHub or reach out via our community channels.
