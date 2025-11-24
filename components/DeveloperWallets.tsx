'use client';

import { useEffect, useState } from 'react';
import { Connection, LAMPORTS_PER_SOL, PublicKey } from '@solana/web3.js';

interface WalletInfo {
  name: string;
  address: string;
  balance: number | null;
  loading: boolean;
}

export function DeveloperWallets() {
  // Note: These are placeholder wallet addresses for demonstration purposes.
  // Replace with actual Solana wallet addresses in production.
  // Valid Solana addresses are base58 encoded and typically 32-44 characters.
  const [wallets, setWallets] = useState<WalletInfo[]>([
    {
      name: 'Development Fund',
      address: '11111111111111111111111111111111', // Placeholder - replace with actual address
      balance: null,
      loading: true,
    },
    {
      name: 'Community Treasury',
      address: '11111111111111111111111111111112', // Placeholder - replace with actual address
      balance: null,
      loading: true,
    },
    {
      name: 'Marketing & Growth',
      address: '11111111111111111111111111111113', // Placeholder - replace with actual address
      balance: null,
      loading: true,
    },
  ]);

  useEffect(() => {
    const fetchBalances = async () => {
      const connection = new Connection('https://api.mainnet-beta.solana.com');
      
      const updatedWallets = await Promise.all(
        wallets.map(async (wallet) => {
          try {
            const publicKey = new PublicKey(wallet.address);
            const balance = await connection.getBalance(publicKey);
            return {
              ...wallet,
              balance: balance / LAMPORTS_PER_SOL,
              loading: false,
            };
          } catch (error) {
            console.error(`Error fetching balance for ${wallet.name}:`, error);
            return {
              ...wallet,
              balance: 0,
              loading: false,
            };
          }
        })
      );
      
      setWallets(updatedWallets);
    };

    fetchBalances();
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, []);

  return (
    <section id="wallets" className="bg-gray-50 py-20 dark:bg-gray-900">
      <div className="container mx-auto px-4">
        <div className="mx-auto max-w-4xl">
          <div className="mb-12 text-center">
            <h2 className="mb-4 text-3xl font-bold md:text-4xl">
              Transparent Development
            </h2>
            <p className="text-gray-600 dark:text-gray-400">
              All developer wallets are publicly visible on-chain for complete transparency
            </p>
          </div>

          <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            {wallets.map((wallet) => (
              <div
                key={wallet.address}
                className="rounded-2xl border border-gray-200 bg-white p-6 shadow-lg transition-all hover:shadow-xl dark:border-gray-800 dark:bg-black"
              >
                <h3 className="mb-2 text-xl font-semibold">{wallet.name}</h3>
                
                <div className="mb-4">
                  <p className="text-sm text-gray-500 dark:text-gray-400">Address</p>
                  <p className="break-all font-mono text-xs text-gray-700 dark:text-gray-300">
                    {wallet.address}
                  </p>
                </div>

                <div className="flex items-center justify-between rounded-lg bg-gradient-to-r from-blue-50 to-purple-50 p-4 dark:from-blue-950/20 dark:to-purple-950/20">
                  <span className="text-sm font-medium text-gray-700 dark:text-gray-300">
                    Balance
                  </span>
                  {wallet.loading ? (
                    <span className="text-gray-500 flex items-center gap-2">
                      <svg className="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle>
                        <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                      Loading
                    </span>
                  ) : (
                    <span className="text-xl font-bold text-gray-900 dark:text-white">
                      {wallet.balance?.toFixed(4)} SOL
                    </span>
                  )}
                </div>

                <a
                  href={`https://explorer.solana.com/address/${wallet.address}`}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="mt-4 flex items-center justify-center gap-2 rounded-lg bg-gray-100 py-2 text-sm font-medium transition-colors hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700"
                  aria-label={`View ${wallet.name} on Solana Explorer`}
                >
                  View on Solana Explorer
                  <svg className="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                  </svg>
                </a>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
