'use client';

import { WalletMultiButton } from '@solana/wallet-adapter-react-ui';
import Image from 'next/image';

export function Header() {
  return (
    <header className="sticky top-0 z-50 w-full border-b border-gray-200 bg-white/80 backdrop-blur-lg dark:border-gray-800 dark:bg-black/80">
      <div className="container mx-auto flex h-16 items-center justify-between px-4">
        <div className="flex items-center gap-2">
          {/* Light mode logo */}
          <Image
            src="/myxenpay-logo-dark.png"
            alt="MyXen Foundation"
            width={120}
            height={40}
            className="hidden dark:block"
            priority
          />
          {/* Dark mode logo */}
          <Image
            src="/myxenpay-logo-light.png"
            alt="MyXen Foundation"
            width={120}
            height={40}
            className="block dark:hidden"
            priority
          />
        </div>
        
        <nav className="hidden items-center gap-6 md:flex">
          <a href="#about" className="text-sm font-medium hover:text-blue-600 transition-colors">
            About
          </a>
          <a href="#wallets" className="text-sm font-medium hover:text-blue-600 transition-colors">
            Transparency
          </a>
          <a href="#features" className="text-sm font-medium hover:text-blue-600 transition-colors">
            Features
          </a>
        </nav>
        
        <WalletMultiButton className="!bg-gradient-to-r !from-blue-600 !to-purple-600 hover:!from-blue-700 hover:!to-purple-700" />
      </div>
    </header>
  );
}
