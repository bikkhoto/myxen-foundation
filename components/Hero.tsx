'use client';

import { useWallet } from '@solana/wallet-adapter-react';

export function Hero() {
  const { connected } = useWallet();

  return (
    <section id="about" className="container mx-auto px-4 py-20 md:py-32">
      <div className="mx-auto max-w-4xl text-center">
        <h1 className="mb-6 text-4xl font-bold tracking-tight sm:text-6xl md:text-7xl">
          Building a{' '}
          <span className="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Decentralized Tomorrow
          </span>
        </h1>
        
        <p className="mb-8 text-lg text-gray-600 dark:text-gray-400 md:text-xl">
          MyXen Foundation is a community-focused, fully decentralized open ledger ecosystem built on Solana.
          We prioritize transparency with a developer wallet system visible to all participants.
        </p>
        
        <div className="flex flex-wrap gap-4 justify-center items-center mt-8">
          {connected ? (
            <div className="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-green-800 dark:bg-green-900/30 dark:text-green-400">
              <svg className="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clipRule="evenodd" />
              </svg>
              Wallet Connected
            </div>
          ) : (
            <p className="text-sm text-gray-500 dark:text-gray-500">
              Connect your wallet to get started
            </p>
          )}
          
          <a 
            href="http://myxenpay.finance" 
            target="_blank" 
            rel="noopener noreferrer"
            className="px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-semibold transition"
          >
            Main Site →
          </a>
          
          <a 
            href="/health" 
            className="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-semibold transition"
          >
            System Status
          </a>
        </div>
      </div>
    </section>
  );
}
