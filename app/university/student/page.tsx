'use client';

import { Header } from "@/components/Header";
import { Footer } from "@/components/Footer";
import { useState } from "react";
import Link from "next/link";

export default function StudentPortal() {
  const [email, setEmail] = useState("");
  const [verificationCode, setVerificationCode] = useState("");
  const [step, setStep] = useState<'email' | 'verify' | 'dashboard'>('email');

  // Mock student data
  const studentData = {
    name: "John Doe",
    university: "Sample University",
    totalCashback: 245.50,
    monthlyLimit: 500,
    transactionCount: 23,
    walletAddress: "7xKXt...YzMqX",
  };

  const handleEmailSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    // TODO: Implement API call to send verification code
    // For now, simulate sending verification code
    setStep('verify');
  };

  const handleVerificationSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    // TODO: Implement API call to verify code
    // For now, simulate verification success
    setStep('dashboard');
  };

  return (
    <div className="min-h-screen bg-gradient-to-b from-white to-gray-50 dark:from-black dark:to-gray-900">
      <Header />
      <main className="pt-20 pb-16">
        <div className="container mx-auto px-4">
          {/* Back Link */}
          <Link 
            href="/university"
            className="inline-flex items-center gap-2 text-blue-600 dark:text-blue-400 hover:underline mb-6"
          >
            ← Back to University Portal
          </Link>

          <h1 className="text-4xl md:text-5xl font-bold mb-4 text-gray-900 dark:text-white">
            👨‍🎓 Student Portal
          </h1>
          <p className="text-xl text-gray-600 dark:text-gray-400 mb-12">
            Access your campus payments, cashback rewards, and financial education
          </p>

          {/* Email Verification Step */}
          {step === 'email' && (
            <div className="max-w-md mx-auto">
              <div className="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg border border-gray-200 dark:border-gray-700">
                <h2 className="text-2xl font-bold mb-4 text-gray-900 dark:text-white">
                  Verify Your University Email
                </h2>
                <p className="text-gray-600 dark:text-gray-400 mb-6">
                  Enter your university email address to get started
                </p>
                <form onSubmit={handleEmailSubmit}>
                  <input
                    type="email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    placeholder="your.email@university.edu"
                    className="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white mb-4"
                    required
                  />
                  <button
                    type="submit"
                    className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors"
                  >
                    Send Verification Code
                  </button>
                </form>
              </div>
            </div>
          )}

          {/* Verification Code Step */}
          {step === 'verify' && (
            <div className="max-w-md mx-auto">
              <div className="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg border border-gray-200 dark:border-gray-700">
                <h2 className="text-2xl font-bold mb-4 text-gray-900 dark:text-white">
                  Enter Verification Code
                </h2>
                <p className="text-gray-600 dark:text-gray-400 mb-6">
                  We&apos;ve sent a 6-digit code to {email}
                </p>
                <form onSubmit={handleVerificationSubmit}>
                  <input
                    type="text"
                    value={verificationCode}
                    onChange={(e) => setVerificationCode(e.target.value)}
                    placeholder="000000"
                    maxLength={6}
                    className="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white mb-4 text-center text-2xl tracking-widest"
                    required
                  />
                  <button
                    type="submit"
                    className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors mb-3"
                  >
                    Verify Email
                  </button>
                  <button
                    type="button"
                    onClick={() => setStep('email')}
                    className="w-full text-gray-600 dark:text-gray-400 hover:underline"
                  >
                    Change Email
                  </button>
                </form>
              </div>
            </div>
          )}

          {/* Student Dashboard */}
          {step === 'dashboard' && (
            <div className="max-w-6xl mx-auto">
              {/* Stats Cards */}
              <div className="grid md:grid-cols-4 gap-6 mb-12">
                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Total Cashback</div>
                  <div className="text-3xl font-bold text-green-600">${studentData.totalCashback}</div>
                  <div className="text-xs text-gray-500 mt-2">of ${studentData.monthlyLimit} monthly limit</div>
                </div>

                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Transactions</div>
                  <div className="text-3xl font-bold text-blue-600">{studentData.transactionCount}</div>
                  <div className="text-xs text-gray-500 mt-2">This month</div>
                </div>

                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Remaining</div>
                  <div className="text-3xl font-bold text-purple-600">
                    ${(studentData.monthlyLimit - studentData.totalCashback).toFixed(2)}
                  </div>
                  <div className="text-xs text-gray-500 mt-2">Cashback available</div>
                </div>

                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Status</div>
                  <div className="text-xl font-bold text-green-600">✓ Verified</div>
                  <div className="text-xs text-gray-500 mt-2">{studentData.university}</div>
                </div>
              </div>

              {/* Main Features Grid */}
              <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                {/* Cashback Rewards */}
                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-3xl mb-4">💰</div>
                  <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                    Cashback Rewards
                  </h3>
                  <p className="text-gray-600 dark:text-gray-400 mb-4">
                    Earn 5% back on every campus purchase up to $500/month
                  </p>
                  <div className="space-y-2 mb-4">
                    <div className="flex justify-between text-sm">
                      <span className="text-gray-600 dark:text-gray-400">Progress</span>
                      <span className="font-semibold text-gray-900 dark:text-white">
                        {Math.round((studentData.totalCashback / studentData.monthlyLimit) * 100)}%
                      </span>
                    </div>
                    <div className="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                      <div 
                        className="bg-gradient-to-r from-green-500 to-blue-500 h-2 rounded-full"
                        style={{ width: `${(studentData.totalCashback / studentData.monthlyLimit) * 100}%` }}
                      />
                    </div>
                  </div>
                  <button className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                    View Details
                  </button>
                </div>

                {/* Campus Map */}
                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-3xl mb-4">🗺️</div>
                  <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                    Campus Payment Locations
                  </h3>
                  <p className="text-gray-600 dark:text-gray-400 mb-4">
                    Find verified merchants and payment locations near you
                  </p>
                  <div className="bg-gray-100 dark:bg-gray-900 rounded-lg p-4 mb-4">
                    <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Active Locations</div>
                    <div className="text-2xl font-bold text-gray-900 dark:text-white">37 Merchants</div>
                  </div>
                  <button className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                    Open Map
                  </button>
                </div>

                {/* Financial Education */}
                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-3xl mb-4">📚</div>
                  <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                    Financial Education
                  </h3>
                  <p className="text-gray-600 dark:text-gray-400 mb-4">
                    Learn about crypto, finance, and blockchain technology
                  </p>
                  <div className="bg-gray-100 dark:bg-gray-900 rounded-lg p-4 mb-4">
                    <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Your Progress</div>
                    <div className="text-2xl font-bold text-gray-900 dark:text-white">3 Courses</div>
                  </div>
                  <button className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                    Start Learning
                  </button>
                </div>

                {/* Wallet Connection */}
                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-3xl mb-4">👛</div>
                  <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                    Wallet Connection
                  </h3>
                  <p className="text-gray-600 dark:text-gray-400 mb-4">
                    Connect your Phantom or Solflare wallet for payments
                  </p>
                  <div className="bg-gray-100 dark:bg-gray-900 rounded-lg p-4 mb-4 overflow-hidden">
                    <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Wallet Address</div>
                    <div className="text-sm font-mono text-gray-900 dark:text-white truncate">
                      {studentData.walletAddress}
                    </div>
                  </div>
                  <button className="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                    Connected ✓
                  </button>
                </div>

                {/* QR Payment */}
                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-3xl mb-4">📱</div>
                  <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                    QR Code Payment
                  </h3>
                  <p className="text-gray-600 dark:text-gray-400 mb-4">
                    Scan merchant QR codes to make instant payments
                  </p>
                  <div className="bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900 dark:to-purple-900 rounded-lg p-4 mb-4">
                    <div className="text-center text-6xl">📷</div>
                  </div>
                  <button className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                    Scan QR Code
                  </button>
                </div>

                {/* Transaction History */}
                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-3xl mb-4">📊</div>
                  <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                    Transaction History
                  </h3>
                  <p className="text-gray-600 dark:text-gray-400 mb-4">
                    View all your campus payments and cashback earnings
                  </p>
                  <div className="space-y-2 mb-4">
                    <div className="flex justify-between text-sm">
                      <span className="text-gray-600 dark:text-gray-400">Last 7 days</span>
                      <span className="font-semibold text-green-600">+$42.50</span>
                    </div>
                    <div className="flex justify-between text-sm">
                      <span className="text-gray-600 dark:text-gray-400">Last 30 days</span>
                      <span className="font-semibold text-green-600">+${studentData.totalCashback}</span>
                    </div>
                  </div>
                  <button className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                    View All
                  </button>
                </div>
              </div>

              {/* Recent Transactions */}
              <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                <h3 className="text-xl font-bold mb-4 text-gray-900 dark:text-white">
                  Recent Transactions
                </h3>
                <div className="space-y-3">
                  {[
                    { merchant: "Campus Cafe", amount: 12.50, cashback: 0.63, time: "2 hours ago" },
                    { merchant: "Bookstore", amount: 45.00, cashback: 2.25, time: "1 day ago" },
                    { merchant: "Student Union", amount: 8.75, cashback: 0.44, time: "2 days ago" },
                  ].map((tx, i) => (
                    <div key={i} className="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900 rounded-lg">
                      <div>
                        <div className="font-semibold text-gray-900 dark:text-white">{tx.merchant}</div>
                        <div className="text-sm text-gray-600 dark:text-gray-400">{tx.time}</div>
                      </div>
                      <div className="text-right">
                        <div className="font-semibold text-gray-900 dark:text-white">${tx.amount}</div>
                        <div className="text-sm text-green-600">+${tx.cashback} cashback</div>
                      </div>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          )}
        </div>
      </main>
      <Footer />
    </div>
  );
}
