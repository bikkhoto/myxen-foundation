import type { Metadata } from "next";
import "./globals.css";
import { WalletProvider } from "@/components/WalletProvider";

export const metadata: Metadata = {
  title: "MyXen Foundation – Building a Decentralized Tomorrow",
  description: "Community-focused, fully decentralized open ledger ecosystem built on Solana. Transparent development with visible developer wallets.",
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
