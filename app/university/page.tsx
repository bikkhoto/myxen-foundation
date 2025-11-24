import { Header } from "@/components/Header";
import { Footer } from "@/components/Footer";
import Link from "next/link";

export const metadata = {
  title: "MyXen.University - Campus Payment & Engagement Platform",
  description: "Transform university economies through branded tokens, cashback rewards, and seamless payment solutions built on Solana blockchain.",
};

export default function UniversityPortal() {
  return (
    <div className="min-h-screen bg-gradient-to-b from-white to-gray-50 dark:from-black dark:to-gray-900">
      <Header />
      <main className="pt-20">
        {/* Hero Section */}
        <section className="container mx-auto px-4 py-20 text-center">
          <div className="max-w-4xl mx-auto">
            <h1 className="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
              🎓 MyXen.University
            </h1>
            <p className="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-8">
              Transform Your Campus Economy with Blockchain Technology
            </p>
            <p className="text-lg text-gray-500 dark:text-gray-400 mb-12 max-w-2xl mx-auto">
              A comprehensive payment and engagement platform designed for universities, 
              featuring branded tokens, automated cashback rewards, and seamless Solana-powered payments.
            </p>
          </div>
        </section>

        {/* Portal Access Cards */}
        <section className="container mx-auto px-4 py-16">
          <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            {/* Student Portal */}
            <Link 
              href="/university/student"
              className="group bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700 hover:scale-105"
            >
              <div className="text-4xl mb-4">👨‍🎓</div>
              <h3 className="text-xl font-bold mb-2 text-gray-900 dark:text-white">
                Student Portal
              </h3>
              <p className="text-gray-600 dark:text-gray-400 mb-4">
                Access cashback rewards, campus payments, and financial education
              </p>
              <div className="text-blue-600 dark:text-blue-400 font-semibold group-hover:translate-x-2 transition-transform">
                Enter Portal →
              </div>
            </Link>

            {/* Merchant Dashboard */}
            <Link 
              href="/university/merchant"
              className="group bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700 hover:scale-105"
            >
              <div className="text-4xl mb-4">🏪</div>
              <h3 className="text-xl font-bold mb-2 text-gray-900 dark:text-white">
                Merchant Dashboard
              </h3>
              <p className="text-gray-600 dark:text-gray-400 mb-4">
                Accept payments, view transactions, and access analytics
              </p>
              <div className="text-blue-600 dark:text-blue-400 font-semibold group-hover:translate-x-2 transition-transform">
                Enter Dashboard →
              </div>
            </Link>

            {/* University Admin */}
            <Link 
              href="/university/admin"
              className="group bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700 hover:scale-105"
            >
              <div className="text-4xl mb-4">🏛️</div>
              <h3 className="text-xl font-bold mb-2 text-gray-900 dark:text-white">
                University Admin
              </h3>
              <p className="text-gray-600 dark:text-gray-400 mb-4">
                Manage campus operations, analytics, and token creation
              </p>
              <div className="text-blue-600 dark:text-blue-400 font-semibold group-hover:translate-x-2 transition-transform">
                Admin Access →
              </div>
            </Link>

            {/* CEO Dashboard */}
            <Link 
              href="/university/ceo"
              className="group bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700 hover:scale-105"
            >
              <div className="text-4xl mb-4">👔</div>
              <h3 className="text-xl font-bold mb-2 text-gray-900 dark:text-white">
                CEO Dashboard
              </h3>
              <p className="text-gray-600 dark:text-gray-400 mb-4">
                Central control, approvals, and ecosystem monitoring
              </p>
              <div className="text-blue-600 dark:text-blue-400 font-semibold group-hover:translate-x-2 transition-transform">
                Executive Access →
              </div>
            </Link>
          </div>
        </section>

        {/* Key Features */}
        <section className="container mx-auto px-4 py-16">
          <h2 className="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white">
            Platform Features
          </h2>
          <div className="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">💰</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                5% Cashback Rewards
              </h3>
              <p className="text-gray-600 dark:text-gray-400">
                Students earn automatic 5% cashback on all campus purchases, up to $500 monthly cap
              </p>
            </div>

            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">🪙</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                Branded Tokens
              </h3>
              <p className="text-gray-600 dark:text-gray-400">
                Create custom university tokens with full service from $250 to $1,500
              </p>
            </div>

            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">⚡</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                Instant Payments
              </h3>
              <p className="text-gray-600 dark:text-gray-400">
                Solana-powered transactions with QR code scanning for seamless campus payments
              </p>
            </div>

            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">🗺️</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                Campus Map
              </h3>
              <p className="text-gray-600 dark:text-gray-400">
                Interactive map showing all verified merchant locations and payment points
              </p>
            </div>

            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">📊</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                Analytics Dashboard
              </h3>
              <p className="text-gray-600 dark:text-gray-400">
                Real-time metrics on student adoption, transactions, and revenue sharing
              </p>
            </div>

            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">📚</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                Financial Education
              </h3>
              <p className="text-gray-600 dark:text-gray-400">
                Crypto and finance courses with achievement badges for student learning
              </p>
            </div>
          </div>
        </section>

        {/* Subscription Tiers */}
        <section className="container mx-auto px-4 py-16">
          <h2 className="text-3xl md:text-4xl font-bold text-center mb-12 text-gray-900 dark:text-white">
            Subscription Plans
          </h2>
          <div className="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            {/* Standard */}
            <div className="bg-white dark:bg-gray-800 rounded-xl p-8 border-2 border-gray-200 dark:border-gray-700">
              <h3 className="text-2xl font-bold mb-2 text-gray-900 dark:text-white">Standard</h3>
              <div className="text-4xl font-bold mb-4 text-blue-600">$999<span className="text-lg">/year</span></div>
              <ul className="space-y-3 mb-8">
                <li className="flex items-start gap-2">
                  <span className="text-green-500">✓</span>
                  <span className="text-gray-600 dark:text-gray-400">Basic student verification</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-500">✓</span>
                  <span className="text-gray-600 dark:text-gray-400">Cashback tracking system</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-500">✓</span>
                  <span className="text-gray-600 dark:text-gray-400">Campus map integration</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-500">✓</span>
                  <span className="text-gray-600 dark:text-gray-400">Standard analytics</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-500">✓</span>
                  <span className="text-gray-600 dark:text-gray-400">Email support</span>
                </li>
              </ul>
              <Link href="/university/admin?plan=standard" className="block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg text-center transition-colors">
                Get Started
              </Link>
            </div>

            {/* Enterprise */}
            <div className="bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl p-8 border-2 border-blue-500 relative transform scale-105">
              <div className="absolute top-0 right-0 bg-yellow-400 text-gray-900 text-xs font-bold px-3 py-1 rounded-bl-lg rounded-tr-lg">
                POPULAR
              </div>
              <h3 className="text-2xl font-bold mb-2 text-white">Enterprise</h3>
              <div className="text-4xl font-bold mb-4 text-white">$4,999<span className="text-lg">/year</span></div>
              <ul className="space-y-3 mb-8">
                <li className="flex items-start gap-2">
                  <span className="text-green-300">✓</span>
                  <span className="text-white">Everything in Standard +</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-300">✓</span>
                  <span className="text-white">Advanced student verification</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-300">✓</span>
                  <span className="text-white">Branded token creation</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-300">✓</span>
                  <span className="text-white">Advanced analytics</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-300">✓</span>
                  <span className="text-white">Revenue sharing dashboard</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-300">✓</span>
                  <span className="text-white">Priority support</span>
                </li>
              </ul>
              <Link href="/university/admin?plan=enterprise" className="block w-full bg-white hover:bg-gray-100 text-blue-600 font-semibold py-3 px-6 rounded-lg text-center transition-colors">
                Get Started
              </Link>
            </div>

            {/* Platinum */}
            <div className="bg-white dark:bg-gray-800 rounded-xl p-8 border-2 border-gray-200 dark:border-gray-700">
              <h3 className="text-2xl font-bold mb-2 text-gray-900 dark:text-white">Platinum</h3>
              <div className="text-4xl font-bold mb-4 text-purple-600">$9,999<span className="text-lg">/year</span></div>
              <ul className="space-y-3 mb-8">
                <li className="flex items-start gap-2">
                  <span className="text-green-500">✓</span>
                  <span className="text-gray-600 dark:text-gray-400">Everything in Enterprise +</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-500">✓</span>
                  <span className="text-gray-600 dark:text-gray-400">Full customization</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-500">✓</span>
                  <span className="text-gray-600 dark:text-gray-400">White-label solution</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-500">✓</span>
                  <span className="text-gray-600 dark:text-gray-400">API access</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-500">✓</span>
                  <span className="text-gray-600 dark:text-gray-400">Dedicated account manager</span>
                </li>
                <li className="flex items-start gap-2">
                  <span className="text-green-500">✓</span>
                  <span className="text-gray-600 dark:text-gray-400">24/7 premium support</span>
                </li>
              </ul>
              <Link href="/university/admin?plan=platinum" className="block w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg text-center transition-colors">
                Get Started
              </Link>
            </div>
          </div>
        </section>

        {/* CTA Section */}
        <section className="container mx-auto px-4 py-20 text-center">
          <div className="max-w-3xl mx-auto bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-12 text-white">
            <h2 className="text-3xl md:text-4xl font-bold mb-6">
              Ready to Transform Your Campus?
            </h2>
            <p className="text-xl mb-8 opacity-90">
              Join the universities already using MyXen.University to revolutionize their payment ecosystem
            </p>
            <div className="flex flex-col sm:flex-row gap-4 justify-center">
              <Link 
                href="/university/admin"
                className="bg-white text-blue-600 hover:bg-gray-100 font-semibold py-3 px-8 rounded-lg transition-colors"
              >
                Register Your University
              </Link>
              <Link 
                href="/university/student"
                className="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-semibold py-3 px-8 rounded-lg transition-colors"
              >
                Student Access
              </Link>
            </div>
          </div>
        </section>
      </main>
      <Footer />
    </div>
  );
}
