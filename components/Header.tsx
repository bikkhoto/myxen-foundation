'use client';

import { useState } from 'react';
import { WalletMultiButton } from '@solana/wallet-adapter-react-ui';
import Image from 'next/image';
import Link from 'next/link';

export function Header() {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  return (
    <header className="sticky top-0 z-50 w-full border-b border-gray-200 bg-white/80 backdrop-blur-lg dark:border-gray-800 dark:bg-black/80">
      <div className="container mx-auto flex h-16 items-center justify-between px-4">
        <Link href="/" className="flex items-center gap-2" aria-label="MyXen Foundation Home">
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
        </Link>
        
        {/* Desktop Navigation */}
        <nav className="hidden items-center gap-6 md:flex" aria-label="Main navigation">
          <a href="#about" className="text-sm font-medium hover:text-blue-600 transition-colors">
            About
          </a>
          <a href="#wallets" className="text-sm font-medium hover:text-blue-600 transition-colors">
            Transparency
          </a>
          <a href="#features" className="text-sm font-medium hover:text-blue-600 transition-colors">
            Features
          </a>
          <Link href="/health" className="text-sm font-medium hover:text-blue-600 transition-colors">
            Status
          </Link>
        </nav>
        
        <div className="flex items-center gap-2">
          <WalletMultiButton className="!bg-gradient-to-r !from-blue-600 !to-purple-600 hover:!from-blue-700 hover:!to-purple-700 !text-sm md:!text-base" />
          
          {/* Mobile menu button */}
          <button
            onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
            className="md:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
            aria-label="Toggle mobile menu"
            aria-expanded={mobileMenuOpen}
          >
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              {mobileMenuOpen ? (
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
              ) : (
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" />
              )}
            </svg>
          </button>
        </div>
      </div>
      
      {/* Mobile Navigation */}
      {mobileMenuOpen && (
        <nav className="md:hidden border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-black" aria-label="Mobile navigation">
          <div className="container mx-auto px-4 py-4 flex flex-col gap-4">
            <a 
              href="#about" 
              className="text-sm font-medium hover:text-blue-600 transition-colors py-2"
              onClick={() => setMobileMenuOpen(false)}
            >
              About
            </a>
            <a 
              href="#wallets" 
              className="text-sm font-medium hover:text-blue-600 transition-colors py-2"
              onClick={() => setMobileMenuOpen(false)}
            >
              Transparency
            </a>
            <a 
              href="#features" 
              className="text-sm font-medium hover:text-blue-600 transition-colors py-2"
              onClick={() => setMobileMenuOpen(false)}
            >
              Features
            </a>
            <Link 
              href="/health" 
              className="text-sm font-medium hover:text-blue-600 transition-colors py-2"
              onClick={() => setMobileMenuOpen(false)}
            >
              System Status
            </Link>
          </div>
        </nav>
      )}
    </header>
  );
}
