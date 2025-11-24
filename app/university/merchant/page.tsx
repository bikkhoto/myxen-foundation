'use client';

import { Header } from "@/components/Header";
import { Footer } from "@/components/Footer";
import { useState } from "react";
import Link from "next/link";

export default function MerchantDashboard() {
  const [qrCode, setQrCode] = useState(false);

  // Mock merchant data
  const merchantData = {
    businessName: "Campus Cafe",
    location: "Student Union Building",
    totalRevenue: 12450.75,
    transactionCount: 847,
    averageTransaction: 14.70,
    monthlyGrowth: 23.5,
  };

  return (
    <div className="min-h-screen bg-gradient-to-b from-white to-gray-50 dark:from-black dark:to-gray-900">
      <Header />
      <main className="pt-20 pb-16">
        <div className="container mx-auto px-4">
          <Link 
            href="/university"
            className="inline-flex items-center gap-2 text-blue-600 dark:text-blue-400 hover:underline mb-6"
          >
            ← Back to University Portal
          </Link>

          <h1 className="text-4xl md:text-5xl font-bold mb-2 text-gray-900 dark:text-white">
            🏪 Merchant Dashboard
          </h1>
          <p className="text-xl text-gray-600 dark:text-gray-400 mb-8">
            {merchantData.businessName} - {merchantData.location}
          </p>

          {/* Key Metrics */}
          <div className="grid md:grid-cols-4 gap-6 mb-12">
            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
              <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Total Revenue</div>
              <div className="text-3xl font-bold text-green-600">${merchantData.totalRevenue.toLocaleString()}</div>
              <div className="text-xs text-green-600 mt-2">+{merchantData.monthlyGrowth}% this month</div>
            </div>

            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
              <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Transactions</div>
              <div className="text-3xl font-bold text-blue-600">{merchantData.transactionCount}</div>
              <div className="text-xs text-gray-500 mt-2">This month</div>
            </div>

            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
              <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Avg Transaction</div>
              <div className="text-3xl font-bold text-purple-600">${merchantData.averageTransaction}</div>
              <div className="text-xs text-gray-500 mt-2">Per purchase</div>
            </div>

            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
              <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Status</div>
              <div className="text-xl font-bold text-green-600">✓ Active</div>
              <div className="text-xs text-gray-500 mt-2">Verified merchant</div>
            </div>
          </div>

          {/* Main Features */}
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            {/* Payment QR Code */}
            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">📱</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                Payment QR Code
              </h3>
              <p className="text-gray-600 dark:text-gray-400 mb-4">
                Display QR code for customers to scan and pay
              </p>
              {!qrCode ? (
                <button 
                  onClick={() => setQrCode(true)}
                  className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors"
                >
                  Generate QR Code
                </button>
              ) : (
                <div className="bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900 dark:to-purple-900 rounded-lg p-8">
                  <div className="bg-white rounded-lg p-4 text-center">
                    <div className="text-6xl mb-2">📷</div>
                    <div className="text-xs text-gray-600">Scan to Pay</div>
                    <div className="text-xs text-gray-400 mt-2">Campus Cafe</div>
                  </div>
                </div>
              )}
            </div>

            {/* Transaction History */}
            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">📊</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                Transaction History
              </h3>
              <p className="text-gray-600 dark:text-gray-400 mb-4">
                View all payments received from students
              </p>
              <div className="space-y-2 mb-4">
                <div className="flex justify-between text-sm">
                  <span className="text-gray-600 dark:text-gray-400">Today</span>
                  <span className="font-semibold text-green-600">$342.50</span>
                </div>
                <div className="flex justify-between text-sm">
                  <span className="text-gray-600 dark:text-gray-400">This week</span>
                  <span className="font-semibold text-green-600">$2,845.75</span>
                </div>
              </div>
              <button className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                View All Transactions
              </button>
            </div>

            {/* Business Analytics */}
            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">📈</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                Business Analytics
              </h3>
              <p className="text-gray-600 dark:text-gray-400 mb-4">
                Track sales trends and customer insights
              </p>
              <div className="h-20 flex items-end justify-around gap-1 mb-4">
                {[30, 45, 35, 60, 50, 70, 55].map((height, i) => (
                  <div key={i} className="flex-1 bg-gradient-to-t from-blue-600 to-purple-600 rounded-t" style={{ height: `${height}%` }} />
                ))}
              </div>
              <button className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                View Analytics
              </button>
            </div>

            {/* Settlement Details */}
            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">💰</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                Settlement Details
              </h3>
              <p className="text-gray-600 dark:text-gray-400 mb-4">
                Instant Solana-powered settlements
              </p>
              <div className="bg-gray-100 dark:bg-gray-900 rounded-lg p-4 mb-4">
                <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Pending Settlement</div>
                <div className="text-2xl font-bold text-gray-900 dark:text-white">$0.00</div>
                <div className="text-xs text-gray-500 mt-1">All transactions settled instantly</div>
              </div>
            </div>

            {/* Payment Terminal */}
            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">🖥️</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                Payment Terminal
              </h3>
              <p className="text-gray-600 dark:text-gray-400 mb-4">
                Enter amount for customer to pay
              </p>
              <input
                type="number"
                placeholder="0.00"
                className="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white mb-4 text-center text-2xl"
              />
              <button className="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                Generate Payment Request
              </button>
            </div>

            {/* Support & Help */}
            <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
              <div className="text-3xl mb-4">❓</div>
              <h3 className="text-xl font-bold mb-3 text-gray-900 dark:text-white">
                Support & Help
              </h3>
              <p className="text-gray-600 dark:text-gray-400 mb-4">
                Get assistance with your merchant account
              </p>
              <div className="space-y-2 mb-4">
                <button className="w-full text-left text-sm text-blue-600 dark:text-blue-400 hover:underline">
                  → Setup Guide
                </button>
                <button className="w-full text-left text-sm text-blue-600 dark:text-blue-400 hover:underline">
                  → Contact Support
                </button>
                <button className="w-full text-left text-sm text-blue-600 dark:text-blue-400 hover:underline">
                  → FAQ
                </button>
              </div>
            </div>
          </div>

          {/* Recent Transactions Table */}
          <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
            <h3 className="text-xl font-bold mb-4 text-gray-900 dark:text-white">
              Recent Transactions
            </h3>
            <div className="overflow-x-auto">
              <table className="w-full">
                <thead>
                  <tr className="border-b border-gray-200 dark:border-gray-700">
                    <th className="text-left py-3 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Time</th>
                    <th className="text-left py-3 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Student</th>
                    <th className="text-right py-3 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Amount</th>
                    <th className="text-right py-3 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Cashback</th>
                    <th className="text-center py-3 px-4 text-sm font-semibold text-gray-600 dark:text-gray-400">Status</th>
                  </tr>
                </thead>
                <tbody>
                  {[
                    { time: "10:24 AM", student: "John D.", amount: 12.50, cashback: 0.63, status: "Completed" },
                    { time: "10:18 AM", student: "Sarah M.", amount: 8.75, cashback: 0.44, status: "Completed" },
                    { time: "10:05 AM", student: "Mike J.", amount: 15.00, cashback: 0.75, status: "Completed" },
                    { time: "9:52 AM", student: "Emily R.", amount: 6.25, cashback: 0.31, status: "Completed" },
                    { time: "9:47 AM", student: "David L.", amount: 11.50, cashback: 0.58, status: "Completed" },
                  ].map((tx, i) => (
                    <tr key={i} className="border-b border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900">
                      <td className="py-3 px-4 text-sm text-gray-600 dark:text-gray-400">{tx.time}</td>
                      <td className="py-3 px-4 text-sm text-gray-900 dark:text-white">{tx.student}</td>
                      <td className="py-3 px-4 text-sm text-right font-semibold text-gray-900 dark:text-white">${tx.amount}</td>
                      <td className="py-3 px-4 text-sm text-right text-green-600">${tx.cashback}</td>
                      <td className="py-3 px-4 text-center">
                        <span className="inline-block px-2 py-1 text-xs font-semibold text-green-600 bg-green-100 dark:bg-green-900/30 rounded">
                          {tx.status}
                        </span>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
      <Footer />
    </div>
  );
}
