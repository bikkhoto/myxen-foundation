import type { Metadata, Viewport } from "next";
import "./globals.css";
import { WalletProvider } from "@/components/WalletProvider";

export const metadata: Metadata = {
  title: "MyXen Foundation – Building a Decentralized Tomorrow",
  description: "Community-focused, fully decentralized open ledger ecosystem built on Solana. Transparent development with visible developer wallets.",
  keywords: ["MyXen", "Solana", "DeFi", "Blockchain", "Cryptocurrency", "Decentralized", "Web3", "MyXenPay"],
  authors: [{ name: "MyXen Foundation" }],
  creator: "MyXen Foundation",
  publisher: "MyXen Foundation",
  metadataBase: new URL('https://myxenpay.finance'),
  openGraph: {
    type: 'website',
    locale: 'en_US',
    url: 'https://myxenpay.finance',
    title: 'MyXen Foundation – Building a Decentralized Tomorrow',
    description: 'Community-focused, fully decentralized open ledger ecosystem built on Solana.',
    siteName: 'MyXen Foundation',
    images: [
      {
        url: '/myxenpay-logo-dark.png',
        width: 1200,
        height: 630,
        alt: 'MyXen Foundation',
      },
    ],
  },
  twitter: {
    card: 'summary_large_image',
    title: 'MyXen Foundation – Building a Decentralized Tomorrow',
    description: 'Community-focused, fully decentralized open ledger ecosystem built on Solana.',
    images: ['/myxenpay-logo-dark.png'],
    creator: '@myxenpay',
  },
  icons: {
    icon: [
      { url: '/favicon.ico' },
      { url: '/fevicon.jpg', sizes: '32x32', type: 'image/jpeg' },
    ],
    apple: [
      { url: '/logo.png', sizes: '180x180', type: 'image/png' },
    ],
  },
  manifest: '/site.webmanifest',
  appleWebApp: {
    capable: true,
    statusBarStyle: 'default',
    title: 'MyXen Foundation',
  },
  robots: {
    index: true,
    follow: true,
    googleBot: {
      index: true,
      follow: true,
      'max-video-preview': -1,
      'max-image-preview': 'large',
      'max-snippet': -1,
    },
  },
};

export const viewport: Viewport = {
  width: 'device-width',
  initialScale: 1,
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body className="antialiased">
        <WalletProvider>{children}</WalletProvider>
      </body>
    </html>
  );
}
