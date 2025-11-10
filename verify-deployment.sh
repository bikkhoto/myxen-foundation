#!/bin/bash
# Quick deployment verification script for MyXen Foundation
# Run after deployment to validate both PHP and DApp

echo "🚀 MyXen Foundation - Deployment Verification"
echo "================================================"
echo ""

# Colors
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

BASE_URL="http://myxenpay.finance"
DAPP_URL="$BASE_URL/dapp"

check_url() {
    local url=$1
    local name=$2
    
    echo -n "Checking $name... "
    
    status=$(curl -s -o /dev/null -w "%{http_code}" "$url" 2>/dev/null)
    
    if [ "$status" = "200" ]; then
        echo -e "${GREEN}✓ OK${NC} (HTTP $status)"
        return 0
    else
        echo -e "${RED}✗ FAIL${NC} (HTTP $status)"
        return 1
    fi
}

echo "📍 Testing Root PHP Site"
echo "------------------------"
check_url "$BASE_URL" "Homepage"
check_url "$BASE_URL/index.php" "Index PHP"
check_url "$BASE_URL/presale.php" "Presale Page"
check_url "$BASE_URL/merchants.php" "Merchants Page"
check_url "$BASE_URL/pay.php" "Payment Page"
check_url "$BASE_URL/contact.php" "Contact Page"
echo ""

echo "⚛️  Testing Next.js DApp"
echo "------------------------"
check_url "$DAPP_URL" "DApp Home"
check_url "$DAPP_URL/health" "Health Check"
check_url "$DAPP_URL/_next/static/css/" "DApp CSS Assets"
echo ""

echo "📦 Testing Static Assets"
echo "------------------------"
check_url "$BASE_URL/assets/css/style.css" "PHP CSS"
check_url "$DAPP_URL/logo.png" "DApp Logo"
echo ""

echo "🔐 Testing Critical Directories"
echo "--------------------------------"
if curl -s "$BASE_URL/data/" | grep -q "Index of"; then
    echo -e "${YELLOW}⚠ WARNING:${NC} /data/ directory is browsable (should be protected)"
else
    echo -e "${GREEN}✓ OK${NC} /data/ directory protected"
fi

if curl -s "$BASE_URL/vendor/" | grep -q "Index of"; then
    echo -e "${YELLOW}⚠ WARNING:${NC} /vendor/ directory is browsable (should be protected)"
else
    echo -e "${GREEN}✓ OK${NC} /vendor/ directory protected"
fi
echo ""

echo "📊 Final Summary"
echo "----------------"
echo "Root Site: $BASE_URL"
echo "DApp: $DAPP_URL"
echo "Health: $DAPP_URL/health"
echo ""
echo "Run this script again anytime: ./verify-deployment.sh"
