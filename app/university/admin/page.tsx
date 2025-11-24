'use client';

import { Header } from "@/components/Header";
import { Footer } from "@/components/Footer";
import { useState } from "react";
import Link from "next/link";

type SubscriptionPlan = 'standard' | 'enterprise' | 'platinum';

export default function UniversityAdminDashboard() {
  const [activeTab, setActiveTab] = useState<'overview' | 'students' | 'analytics' | 'token' | 'revenue'>('overview');
  const [showRegistration, setShowRegistration] = useState(false);
  const [isSubmitting, setIsSubmitting] = useState(false);

  // Mock university data
  const universityData = {
    name: "Sample University",
    studentsRegistered: 1247,
    activeLocations: 37,
    transactionVolume: 45672.89,
    cashbackDistributed: 2283.64,
    revenueGenerated: 15234.56,
    plan: 'enterprise' as SubscriptionPlan,
    monthlyGrowth: 15.3,
  };

  const tokenTiers = [
    { name: "Self Service", price: 250, description: "Deploy your own token with our tools" },
    { name: "Partial Service", price: 750, description: "We help with deployment and integration" },
    { name: "Full Service", price: 1500, description: "Complete token creation and management" },
  ];

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

          <div className="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
              <h1 className="text-4xl md:text-5xl font-bold mb-2 text-gray-900 dark:text-white">
                🏛️ University Admin Dashboard
              </h1>
              <p className="text-xl text-gray-600 dark:text-gray-400">
                Manage your campus payment ecosystem
              </p>
            </div>
            {!showRegistration && (
              <button
                onClick={() => setShowRegistration(true)}
                className="mt-4 md:mt-0 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors"
              >
                Register New University
              </button>
            )}
          </div>

          {showRegistration ? (
            /* University Registration Form */
            <div className="max-w-2xl mx-auto">
              <div className="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg border border-gray-200 dark:border-gray-700">
                <h2 className="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
                  University Registration
                </h2>
                <form className="space-y-6" onSubmit={(e) => {
                  e.preventDefault();
                  setIsSubmitting(true);
                  // TODO: Implement API call to submit registration
                  // Simulate API call
                  setTimeout(() => {
                    setIsSubmitting(false);
                    alert('Registration submitted successfully! Awaiting CEO approval.');
                    setShowRegistration(false);
                  }, 1500);
                }}>
                  <div>
                    <label className="block text-sm font-semibold mb-2 text-gray-900 dark:text-white">
                      University Name
                    </label>
                    <input
                      type="text"
                      required
                      className="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                      placeholder="Enter university name"
                    />
                  </div>

                  <div className="grid md:grid-cols-2 gap-4">
                    <div>
                      <label className="block text-sm font-semibold mb-2 text-gray-900 dark:text-white">
                        Contact Name
                      </label>
                      <input
                        type="text"
                        required
                        className="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                        placeholder="Full name"
                      />
                    </div>
                    <div>
                      <label className="block text-sm font-semibold mb-2 text-gray-900 dark:text-white">
                        Contact Email
                      </label>
                      <input
                        type="email"
                        required
                        className="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                        placeholder="email@university.edu"
                      />
                    </div>
                  </div>

                  <div>
                    <label className="block text-sm font-semibold mb-2 text-gray-900 dark:text-white">
                      Student Count
                    </label>
                    <input
                      type="number"
                      required
                      min="1"
                      className="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                      placeholder="Total enrolled students"
                    />
                  </div>

                  <div>
                    <label className="block text-sm font-semibold mb-2 text-gray-900 dark:text-white">
                      Subscription Plan
                    </label>
                    <select className="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-white">
                      <option value="standard">Standard - $999/year</option>
                      <option value="enterprise">Enterprise - $4,999/year</option>
                      <option value="platinum">Platinum - $9,999/year</option>
                    </select>
                  </div>

                  <div>
                    <label className="flex items-center gap-2">
                      <input type="checkbox" className="w-4 h-4" />
                      <span className="text-sm text-gray-600 dark:text-gray-400">
                        Request branded token creation (additional cost)
                      </span>
                    </label>
                  </div>

                  <div className="flex gap-4">
                    <button
                      type="submit"
                      disabled={isSubmitting}
                      className="flex-1 bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed text-white font-semibold py-3 px-6 rounded-lg transition-colors"
                    >
                      {isSubmitting ? 'Submitting...' : 'Submit Application'}
                    </button>
                    <button
                      type="button"
                      onClick={() => setShowRegistration(false)}
                      className="flex-1 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-semibold py-3 px-6 rounded-lg transition-colors"
                    >
                      Cancel
                    </button>
                  </div>
                </form>
              </div>
            </div>
          ) : (
            <>
              {/* Key Metrics */}
              <div className="grid md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Students</div>
                  <div className="text-2xl font-bold text-blue-600">{universityData.studentsRegistered.toLocaleString()}</div>
                  <div className="text-xs text-green-600 mt-1">+{universityData.monthlyGrowth}% this month</div>
                </div>

                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Locations</div>
                  <div className="text-2xl font-bold text-purple-600">{universityData.activeLocations}</div>
                  <div className="text-xs text-gray-500 mt-1">Active merchants</div>
                </div>

                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Volume</div>
                  <div className="text-2xl font-bold text-green-600">${universityData.transactionVolume.toLocaleString()}</div>
                  <div className="text-xs text-gray-500 mt-1">This month</div>
                </div>

                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Cashback</div>
                  <div className="text-2xl font-bold text-orange-600">${universityData.cashbackDistributed.toLocaleString()}</div>
                  <div className="text-xs text-gray-500 mt-1">Distributed</div>
                </div>

                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Revenue</div>
                  <div className="text-2xl font-bold text-emerald-600">${universityData.revenueGenerated.toLocaleString()}</div>
                  <div className="text-xs text-gray-500 mt-1">Your share</div>
                </div>

                <div className="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                  <div className="text-sm text-gray-600 dark:text-gray-400 mb-2">Plan</div>
                  <div className="text-lg font-bold text-blue-600 capitalize">{universityData.plan}</div>
                  <div className="text-xs text-gray-500 mt-1">Active subscription</div>
                </div>
              </div>

              {/* Tab Navigation */}
              <div className="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 mb-8">
                <div className="flex flex-wrap border-b border-gray-200 dark:border-gray-700">
                  {[
                    { id: 'overview', label: 'Overview', icon: '📊' },
                    { id: 'students', label: 'Students', icon: '👨‍🎓' },
                    { id: 'analytics', label: 'Analytics', icon: '📈' },
                    { id: 'token', label: 'Token Creation', icon: '🪙' },
                    { id: 'revenue', label: 'Revenue', icon: '💰' },
                  ].map((tab) => (
                    <button
                      key={tab.id}
                      onClick={() => setActiveTab(tab.id as any)}
                      className={`px-6 py-4 font-semibold transition-colors ${
                        activeTab === tab.id
                          ? 'text-blue-600 border-b-2 border-blue-600'
                          : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'
                      }`}
                    >
                      <span className="mr-2">{tab.icon}</span>
                      {tab.label}
                    </button>
                  ))}
                </div>

                <div className="p-8">
                  {/* Overview Tab */}
                  {activeTab === 'overview' && (
                    <div className="space-y-6">
                      <div>
                        <h3 className="text-2xl font-bold mb-4 text-gray-900 dark:text-white">
                          Platform Overview
                        </h3>
                        <p className="text-gray-600 dark:text-gray-400 mb-6">
                          Real-time dashboard showing your campus payment ecosystem performance
                        </p>
                      </div>

                      <div className="grid md:grid-cols-2 gap-6">
                        <div className="bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-xl p-6">
                          <h4 className="font-bold text-lg mb-3 text-gray-900 dark:text-white">Student Adoption Rate</h4>
                          <div className="text-4xl font-bold text-blue-600 mb-2">73%</div>
                          <div className="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                            <div className="bg-gradient-to-r from-blue-500 to-purple-500 h-3 rounded-full" style={{ width: '73%' }} />
                          </div>
                          <p className="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            {universityData.studentsRegistered.toLocaleString()} of 1,700 total students
                          </p>
                        </div>

                        <div className="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl p-6">
                          <h4 className="font-bold text-lg mb-3 text-gray-900 dark:text-white">Monthly Growth</h4>
                          <div className="text-4xl font-bold text-green-600 mb-2">+{universityData.monthlyGrowth}%</div>
                          <div className="flex items-center gap-2">
                            <div className="text-2xl">📈</div>
                            <p className="text-sm text-gray-600 dark:text-gray-400">
                              Consistent growth in student registration and transaction volume
                            </p>
                          </div>
                        </div>
                      </div>

                      <div className="bg-gray-50 dark:bg-gray-900 rounded-xl p-6">
                        <h4 className="font-bold text-lg mb-4 text-gray-900 dark:text-white">Quick Actions</h4>
                        <div className="grid md:grid-cols-3 gap-4">
                          <button className="bg-white dark:bg-gray-800 p-4 rounded-lg hover:shadow-lg transition-shadow text-left">
                            <div className="text-2xl mb-2">✉️</div>
                            <div className="font-semibold text-gray-900 dark:text-white">Invite Students</div>
                            <div className="text-sm text-gray-600 dark:text-gray-400">Send bulk invitations</div>
                          </button>
                          <button className="bg-white dark:bg-gray-800 p-4 rounded-lg hover:shadow-lg transition-shadow text-left">
                            <div className="text-2xl mb-2">🏪</div>
                            <div className="font-semibold text-gray-900 dark:text-white">Add Merchant</div>
                            <div className="text-sm text-gray-600 dark:text-gray-400">Onboard new location</div>
                          </button>
                          <button className="bg-white dark:bg-gray-800 p-4 rounded-lg hover:shadow-lg transition-shadow text-left">
                            <div className="text-2xl mb-2">📊</div>
                            <div className="font-semibold text-gray-900 dark:text-white">Export Report</div>
                            <div className="text-sm text-gray-600 dark:text-gray-400">Download analytics</div>
                          </button>
                        </div>
                      </div>
                    </div>
                  )}

                  {/* Students Tab */}
                  {activeTab === 'students' && (
                    <div className="space-y-6">
                      <div className="flex justify-between items-center">
                        <h3 className="text-2xl font-bold text-gray-900 dark:text-white">
                          Student Management
                        </h3>
                        <button className="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg">
                          Invite Students
                        </button>
                      </div>

                      <div className="bg-gray-50 dark:bg-gray-900 rounded-xl p-4 mb-4">
                        <input
                          type="search"
                          placeholder="Search students by name or email..."
                          className="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white"
                        />
                      </div>

                      <div className="space-y-3">
                        {[
                          { name: "John Doe", email: "john.doe@university.edu", cashback: 245.50, status: "Active" },
                          { name: "Jane Smith", email: "jane.smith@university.edu", cashback: 189.25, status: "Active" },
                          { name: "Mike Johnson", email: "mike.j@university.edu", cashback: 432.75, status: "Active" },
                        ].map((student, i) => (
                          <div key={i} className="flex items-center justify-between p-4 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
                            <div>
                              <div className="font-semibold text-gray-900 dark:text-white">{student.name}</div>
                              <div className="text-sm text-gray-600 dark:text-gray-400">{student.email}</div>
                            </div>
                            <div className="text-right">
                              <div className="font-semibold text-green-600">${student.cashback} cashback</div>
                              <div className="text-sm text-gray-600 dark:text-gray-400">{student.status}</div>
                            </div>
                          </div>
                        ))}
                      </div>
                    </div>
                  )}

                  {/* Analytics Tab */}
                  {activeTab === 'analytics' && (
                    <div className="space-y-6">
                      <h3 className="text-2xl font-bold text-gray-900 dark:text-white">
                        Advanced Analytics
                      </h3>
                      <div className="grid md:grid-cols-2 gap-6">
                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                          <h4 className="font-bold mb-4 text-gray-900 dark:text-white">Transaction Trends</h4>
                          <div className="h-48 flex items-end justify-around gap-2">
                            {[40, 65, 45, 80, 60, 75, 90].map((height, i) => (
                              <div key={i} className="flex-1 bg-gradient-to-t from-blue-600 to-purple-600 rounded-t" style={{ height: `${height}%` }} />
                            ))}
                          </div>
                          <div className="flex justify-around text-xs text-gray-600 dark:text-gray-400 mt-2">
                            <span>Mon</span>
                            <span>Tue</span>
                            <span>Wed</span>
                            <span>Thu</span>
                            <span>Fri</span>
                            <span>Sat</span>
                            <span>Sun</span>
                          </div>
                        </div>

                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                          <h4 className="font-bold mb-4 text-gray-900 dark:text-white">Top Merchants</h4>
                          <div className="space-y-3">
                            {[
                              { name: "Campus Cafe", revenue: 12450 },
                              { name: "Bookstore", revenue: 8930 },
                              { name: "Student Union", revenue: 6720 },
                            ].map((merchant, i) => (
                              <div key={i} className="flex justify-between items-center">
                                <span className="text-gray-900 dark:text-white">{merchant.name}</span>
                                <span className="font-semibold text-green-600">${merchant.revenue.toLocaleString()}</span>
                              </div>
                            ))}
                          </div>
                        </div>
                      </div>
                    </div>
                  )}

                  {/* Token Creation Tab */}
                  {activeTab === 'token' && (
                    <div className="space-y-6">
                      <div>
                        <h3 className="text-2xl font-bold mb-2 text-gray-900 dark:text-white">
                          Branded Token Creation
                        </h3>
                        <p className="text-gray-600 dark:text-gray-400">
                          Create a custom token for your university to enhance campus engagement
                        </p>
                      </div>

                      <div className="grid md:grid-cols-3 gap-6">
                        {tokenTiers.map((tier, i) => (
                          <div key={i} className="bg-white dark:bg-gray-800 rounded-xl p-6 border-2 border-gray-200 dark:border-gray-700 hover:border-blue-500 transition-colors">
                            <h4 className="font-bold text-xl mb-2 text-gray-900 dark:text-white">{tier.name}</h4>
                            <div className="text-3xl font-bold text-blue-600 mb-4">${tier.price}</div>
                            <p className="text-gray-600 dark:text-gray-400 mb-6">{tier.description}</p>
                            <button className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                              Select Plan
                            </button>
                          </div>
                        ))}
                      </div>
                    </div>
                  )}

                  {/* Revenue Tab */}
                  {activeTab === 'revenue' && (
                    <div className="space-y-6">
                      <h3 className="text-2xl font-bold text-gray-900 dark:text-white">
                        Revenue Sharing
                      </h3>
                      <div className="grid md:grid-cols-2 gap-6">
                        <div className="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl p-6">
                          <h4 className="font-bold text-lg mb-3 text-gray-900 dark:text-white">Your Revenue Share</h4>
                          <div className="text-4xl font-bold text-green-600 mb-2">${universityData.revenueGenerated.toLocaleString()}</div>
                          <p className="text-sm text-gray-600 dark:text-gray-400">This month's earnings from transaction fees</p>
                        </div>

                        <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                          <h4 className="font-bold text-lg mb-3 text-gray-900 dark:text-white">Payment Schedule</h4>
                          <div className="space-y-2 text-sm">
                            <div className="flex justify-between">
                              <span className="text-gray-600 dark:text-gray-400">Next Payment:</span>
                              <span className="font-semibold text-gray-900 dark:text-white">Dec 1, 2025</span>
                            </div>
                            <div className="flex justify-between">
                              <span className="text-gray-600 dark:text-gray-400">Payment Method:</span>
                              <span className="font-semibold text-gray-900 dark:text-white">SOL Wallet</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  )}
                </div>
              </div>
            </>
          )}
        </div>
      </main>
      <Footer />
    </div>
  );
}
