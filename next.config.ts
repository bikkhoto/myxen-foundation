import type { NextConfig } from "next";

const nextConfig: NextConfig = {
  output: 'export',
  images: {
    unoptimized: true,
  },
  // basePath will be automatically injected by GitHub Actions configure-pages
  trailingSlash: true,
};

export default nextConfig;
