export default function Loading() {
  return (
    <div className="min-h-screen bg-gradient-to-b from-white to-gray-50 dark:from-black dark:to-gray-900 flex items-center justify-center">
      <div className="text-center">
        <div className="relative w-24 h-24 mx-auto mb-8">
          <div className="absolute inset-0 border-4 border-blue-200 dark:border-blue-900 rounded-full"></div>
          <div className="absolute inset-0 border-4 border-transparent border-t-blue-600 rounded-full animate-spin"></div>
        </div>
        
        <h2 className="text-xl font-semibold mb-2">Loading MyXen Foundation</h2>
        <p className="text-gray-600 dark:text-gray-400">Please wait...</p>
      </div>
    </div>
  );
}
