import { Header } from "@/components/Header";
import { Hero } from "@/components/Hero";
import { DeveloperWallets } from "@/components/DeveloperWallets";
import { Features } from "@/components/Features";
import { Footer } from "@/components/Footer";

export default function Home() {
  return (
    <div className="min-h-screen bg-gradient-to-b from-white to-gray-50 dark:from-black dark:to-gray-900">
      <Header />
      <main>
        <Hero />
        <DeveloperWallets />
        <Features />
      </main>
      <Footer />
    </div>
  );
}
