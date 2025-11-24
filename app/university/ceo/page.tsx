'use client';

import { Header } from "@/components/Header";
import { Footer } from "@/components/Footer";
import { useState } from "react";
import Link from "next/link";

type UniversityStatus = 'pending' | 'approved' | 'rejected';

interface University {
  id: number;
  name: string;
  students: number;
  plan: string;
  status: UniversityStatus;
  revenue: number;
  appliedDate: string;
}

export default function CEODashboard() {
  const [activeTab, setActiveTab] = useState<'overview' | 'approvals' | 'universities' | 'rewards'>('overview');

  // Mock platform data
  const platformData = {
    totalUniversities: 47,
    totalStudents: 58649,
    totalRevenue: 2847392,
    pendingApprovals: 3,
    monthlyGrowth: 18.7,
    solRewardsPool: 15000,
  };

  const pendingUniversities: University[] = [
    { id: 1, name: "State University", students: 15000, plan: "Enterprise", status: "pending", revenue: 0, appliedDate: "2025-11-20" },
    { id: 2, name: "Tech Institute", students: 8500, plan: "Standard", status: "pending", revenue: 0, appliedDate: "2025-11-21" },
    { id: 3, name: "Community College", students: 3200, plan: "Standard", status: "pending", revenue: 0, appliedDate: "2025-11-22" },
  ];

  const activeUniversities: University[] = [
    { id: 4, name: "Sample University", students: 1247, plan: "Enterprise", status: "approved", revenue: 15234, appliedDate: "2025-09-15" },
    { id: 5, name: "Regional College", students: 2845, plan: "Platinum", status: "approved", revenue: 28942, appliedDate: "2025-08-22" },
    { id: 6, name: "City University", students: 4521, plan: "Enterprise", status: "approved", revenue: 42158, appliedDate: "2025-07-10" },
  ];

  const handleApproval = (universityId: number, approved: boolean) => {
    console.log(`University ${universityId} ${approved ? 'approved' : 'rejected'}`);
    // Implementation would update the status
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
            👔 CEO Dashboard
          </h1>
          <p className="text-xl text-gray-600 dark:text-gray-400 mb-8">
            Central administration and ecosystem oversight
          </p>

          {/* Executive Metrics */}
          <div className="grid md:grid-cols-2 lg:grid-cols-6 gap-4 mb-8">
            <div className="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 shadow-lg text-white">
              <div className="text-sm opacity-80 mb-2">Total Universities</div>
              <div className="text-3xl font-bold">{platformData.totalUniversities}</div>
              <div className="text-xs opacity-70 mt-1">Active institutions</div>
            </div>

            <div className="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 shadow-lg text-white">
              <div className="text-sm opacity-80 mb-2">Total Students</div>
              <div className="text-3xl font-bold">{platformData.totalStudents.toLocaleString()}</div>
              <div className="text-xs opacity-70 mt-1">Platform users</div>
            </div>

            <div className="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 shadow-lg text-white">
              <div className="text-sm opacity-80 mb-2">Total Revenue</div>
              <div className="text-3xl font-bold">${(platformData.totalRevenue / 1000).toFixed(0)}K</div>
              <div className="text-xs opacity-70 mt-1">All-time earnings</div>
            </div>

            <div className="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl p-6 shadow-lg text-white">
              <div className="text-sm opacity-80 mb-2">Pending</div>
              <div className="text-3xl font-bold">{platformData.pendingApprovals}</div>
              <div className="text-xs opacity-70 mt-1">Awaiting approval</div>
            </div>

            <div className="bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl p-6 shadow-lg text-white">
              <div className="text-sm opacity-80 mb-2">Growth Rate</div>
              <div className="text-3xl font-bold">+{platformData.monthlyGrowth}%</div>
              <div className="text-xs opacity-70 mt-1">Monthly increase</div>
            </div>

            <div className="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl p-6 shadow-lg text-white">
              <div className="text-sm opacity-80 mb-2">SOL Rewards</div>
              <div className="text-3xl font-bold">{platformData.solRewardsPool.toLocaleString()}</div>
              <div className="text-xs opacity-70 mt-1">Available to distribute</div>
            </div>
          </div>

          {/* Tab Navigation */}
          <div className="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 mb-8">
            <div className="flex flex-wrap border-b border-gray-200 dark:border-gray-700">
              {[
                { id: 'overview', label: 'Overview', icon: '📊' },
                { id: 'approvals', label: 'Approvals', icon: '✅', badge: platformData.pendingApprovals },
                { id: 'universities', label: 'Universities', icon: '🏛️' },
                { id: 'rewards', label: 'SOL Rewards', icon: '💎' },
              ].map((tab) => (
                <button
                  key={tab.id}
                  onClick={() => setActiveTab(tab.id as any)}
                  className={`relative px-6 py-4 font-semibold transition-colors ${
                    activeTab === tab.id
                      ? 'text-blue-600 border-b-2 border-blue-600'
                      : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'
                  }`}
                >
                  <span className="mr-2">{tab.icon}</span>
                  {tab.label}
                  {tab.badge && tab.badge > 0 && (
                    <span className="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">
                      {tab.badge}
                    </span>
                  )}
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
                      Monitor the entire MyXen.University ecosystem at a glance
                    </p>
                  </div>

                  <div className="grid md:grid-cols-2 gap-6">
                    {/* Platform Health */}
                    <div className="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl p-6">
                      <h4 className="font-bold text-lg mb-4 text-gray-900 dark:text-white">Platform Health</h4>
                      <div className="space-y-3">
                        <div className="flex justify-between items-center">
                          <span className="text-gray-600 dark:text-gray-400">System Uptime</span>
                          <span className="font-bold text-green-600">99.98%</span>
                        </div>
                        <div className="flex justify-between items-center">
                          <span className="text-gray-600 dark:text-gray-400">Active Transactions</span>
                          <span className="font-bold text-green-600">2,847/hr</span>
                        </div>
                        <div className="flex justify-between items-center">
                          <span className="text-gray-600 dark:text-gray-400">Success Rate</span>
                          <span className="font-bold text-green-600">99.5%</span>
                        </div>
                      </div>
                    </div>

                    {/* Growth Metrics */}
                    <div className="bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-xl p-6">
                      <h4 className="font-bold text-lg mb-4 text-gray-900 dark:text-white">Growth Metrics</h4>
                      <div className="space-y-3">
                        <div className="flex justify-between items-center">
                          <span className="text-gray-600 dark:text-gray-400">New Universities (30d)</span>
                          <span className="font-bold text-blue-600">+7</span>
                        </div>
                        <div className="flex justify-between items-center">
                          <span className="text-gray-600 dark:text-gray-400">New Students (30d)</span>
                          <span className="font-bold text-blue-600">+8,942</span>
                        </div>
                        <div className="flex justify-between items-center">
                          <span className="text-gray-600 dark:text-gray-400">Revenue Growth</span>
                          <span className="font-bold text-blue-600">+{platformData.monthlyGrowth}%</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  {/* Transaction Volume Chart */}
                  <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                    <h4 className="font-bold text-lg mb-4 text-gray-900 dark:text-white">Transaction Volume Trend</h4>
                    <div className="h-64 flex items-end justify-around gap-2">
                      {[45, 52, 48, 65, 58, 72, 68, 80, 75, 85, 82, 90].map((height, i) => (
                        <div key={i} className="flex-1 bg-gradient-to-t from-blue-600 to-purple-600 rounded-t" style={{ height: `${height}%` }} />
                      ))}
                    </div>
                    <div className="flex justify-around text-xs text-gray-600 dark:text-gray-400 mt-4">
                      {['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'].map((month) => (
                        <span key={month}>{month}</span>
                      ))}
                    </div>
                  </div>

                  {/* Top Performing Universities */}
                  <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                    <h4 className="font-bold text-lg mb-4 text-gray-900 dark:text-white">Top Performing Universities</h4>
                    <div className="space-y-3">
                      {activeUniversities.slice(0, 3).map((uni) => (
                        <div key={uni.id} className="flex justify-between items-center p-4 bg-gray-50 dark:bg-gray-900 rounded-lg">
                          <div>
                            <div className="font-semibold text-gray-900 dark:text-white">{uni.name}</div>
                            <div className="text-sm text-gray-600 dark:text-gray-400">{uni.students.toLocaleString()} students</div>
                          </div>
                          <div className="text-right">
                            <div className="font-bold text-green-600">${uni.revenue.toLocaleString()}</div>
                            <div className="text-sm text-gray-600 dark:text-gray-400">{uni.plan}</div>
                          </div>
                        </div>
                      ))}
                    </div>
                  </div>
                </div>
              )}

              {/* Approvals Tab */}
              {activeTab === 'approvals' && (
                <div className="space-y-6">
                  <div className="flex justify-between items-center">
                    <div>
                      <h3 className="text-2xl font-bold text-gray-900 dark:text-white">
                        University Approvals
                      </h3>
                      <p className="text-gray-600 dark:text-gray-400 mt-2">
                        Review and approve new university registrations
                      </p>
                    </div>
                    <div className="bg-red-100 dark:bg-red-900/30 text-red-600 px-4 py-2 rounded-lg font-semibold">
                      {platformData.pendingApprovals} Pending
                    </div>
                  </div>

                  <div className="space-y-4">
                    {pendingUniversities.map((uni) => (
                      <div key={uni.id} className="bg-white dark:bg-gray-800 rounded-xl p-6 border-2 border-yellow-400 dark:border-yellow-600">
                        <div className="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                          <div className="flex-1">
                            <h4 className="text-xl font-bold text-gray-900 dark:text-white mb-2">
                              {uni.name}
                            </h4>
                            <div className="grid md:grid-cols-3 gap-4 text-sm">
                              <div>
                                <span className="text-gray-600 dark:text-gray-400">Students:</span>
                                <span className="ml-2 font-semibold text-gray-900 dark:text-white">
                                  {uni.students.toLocaleString()}
                                </span>
                              </div>
                              <div>
                                <span className="text-gray-600 dark:text-gray-400">Plan:</span>
                                <span className="ml-2 font-semibold text-gray-900 dark:text-white">
                                  {uni.plan}
                                </span>
                              </div>
                              <div>
                                <span className="text-gray-600 dark:text-gray-400">Applied:</span>
                                <span className="ml-2 font-semibold text-gray-900 dark:text-white">
                                  {uni.appliedDate}
                                </span>
                              </div>
                            </div>
                          </div>
                          <div className="flex gap-3">
                            <button
                              onClick={() => handleApproval(uni.id, true)}
                              className="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors"
                            >
                              ✓ Approve
                            </button>
                            <button
                              onClick={() => handleApproval(uni.id, false)}
                              className="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors"
                            >
                              ✗ Reject
                            </button>
                          </div>
                        </div>
                      </div>
                    ))}
                  </div>

                  {pendingUniversities.length === 0 && (
                    <div className="text-center py-12 text-gray-500 dark:text-gray-400">
                      No pending approvals at this time
                    </div>
                  )}
                </div>
              )}

              {/* Universities Tab */}
              {activeTab === 'universities' && (
                <div className="space-y-6">
                  <div className="flex justify-between items-center">
                    <h3 className="text-2xl font-bold text-gray-900 dark:text-white">
                      Active Universities
                    </h3>
                    <div className="text-sm text-gray-600 dark:text-gray-400">
                      {platformData.totalUniversities} total institutions
                    </div>
                  </div>

                  <div className="space-y-3">
                    {activeUniversities.map((uni) => (
                      <div key={uni.id} className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 hover:shadow-lg transition-shadow">
                        <div className="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                          <div className="flex-1">
                            <div className="flex items-center gap-2 mb-2">
                              <h4 className="text-lg font-bold text-gray-900 dark:text-white">
                                {uni.name}
                              </h4>
                              <span className="bg-green-100 dark:bg-green-900/30 text-green-600 text-xs font-semibold px-2 py-1 rounded">
                                Active
                              </span>
                            </div>
                            <div className="flex flex-wrap gap-4 text-sm">
                              <div>
                                <span className="text-gray-600 dark:text-gray-400">Students:</span>
                                <span className="ml-2 font-semibold text-gray-900 dark:text-white">
                                  {uni.students.toLocaleString()}
                                </span>
                              </div>
                              <div>
                                <span className="text-gray-600 dark:text-gray-400">Revenue:</span>
                                <span className="ml-2 font-semibold text-green-600">
                                  ${uni.revenue.toLocaleString()}
                                </span>
                              </div>
                              <div>
                                <span className="text-gray-600 dark:text-gray-400">Plan:</span>
                                <span className="ml-2 font-semibold text-blue-600">
                                  {uni.plan}
                                </span>
                              </div>
                              <div>
                                <span className="text-gray-600 dark:text-gray-400">Since:</span>
                                <span className="ml-2 font-semibold text-gray-900 dark:text-white">
                                  {uni.appliedDate}
                                </span>
                              </div>
                            </div>
                          </div>
                          <button className="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
                            View Details
                          </button>
                        </div>
                      </div>
                    ))}
                  </div>
                </div>
              )}

              {/* SOL Rewards Tab */}
              {activeTab === 'rewards' && (
                <div className="space-y-6">
                  <div>
                    <h3 className="text-2xl font-bold text-gray-900 dark:text-white">
                      SOL Rewards Distribution
                    </h3>
                    <p className="text-gray-600 dark:text-gray-400 mt-2">
                      Manage and distribute SOL rewards to university partners
                    </p>
                  </div>

                  <div className="grid md:grid-cols-2 gap-6">
                    <div className="bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-xl p-6">
                      <h4 className="font-bold text-lg mb-4 text-gray-900 dark:text-white">Available Rewards Pool</h4>
                      <div className="text-4xl font-bold text-indigo-600 mb-4">
                        {platformData.solRewardsPool.toLocaleString()} SOL
                      </div>
                      <p className="text-sm text-gray-600 dark:text-gray-400 mb-4">
                        Total SOL available for distribution to top-performing universities
                      </p>
                      <button className="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                        Distribute Rewards
                      </button>
                    </div>

                    <div className="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                      <h4 className="font-bold text-lg mb-4 text-gray-900 dark:text-white">Distribution History</h4>
                      <div className="space-y-3">
                        {[
                          { date: "2025-11-15", amount: 500, recipient: "Sample University" },
                          { date: "2025-11-01", amount: 750, recipient: "Regional College" },
                          { date: "2025-10-15", amount: 600, recipient: "City University" },
                        ].map((reward, i) => (
                          <div key={i} className="flex justify-between items-center p-3 bg-gray-50 dark:bg-gray-900 rounded-lg">
                            <div>
                              <div className="font-semibold text-gray-900 dark:text-white">{reward.recipient}</div>
                              <div className="text-xs text-gray-600 dark:text-gray-400">{reward.date}</div>
                            </div>
                            <div className="font-bold text-indigo-600">{reward.amount} SOL</div>
                          </div>
                        ))}
                      </div>
                    </div>
                  </div>
                </div>
              )}
            </div>
          </div>
        </div>
      </main>
      <Footer />
    </div>
  );
}
