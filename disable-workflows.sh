#!/bin/bash

# MyXen Foundation - Workflow Management Script
# This script helps you disable deployment workflows to stop failures

set -e

echo "🔧 MyXen Foundation - Deployment Workflow Manager"
echo "=================================================="
echo ""

WORKFLOWS_DIR=".github/workflows"

if [ ! -d "$WORKFLOWS_DIR" ]; then
    echo "❌ Error: .github/workflows directory not found"
    echo "   Make sure you're in the repository root"
    exit 1
fi

echo "Current deployment workflows:"
echo ""
ls -1 "$WORKFLOWS_DIR"/*.yml 2>/dev/null | grep -E "(nextjs|cpanel|ssh)" || echo "  No deployment workflows found"
echo ""

echo "Choose an action:"
echo ""
echo "1) Disable ALL deployment workflows (recommended first step)"
echo "2) Enable only GitHub Pages (nextjs.yml)"
echo "3) Enable only cPanel deployment (cpanel-deploy.yml)"
echo "4) Enable only SSH deployment (ssh-deploy.yml)"
echo "5) Show current status"
echo "6) Exit"
echo ""

read -p "Enter your choice (1-6): " choice

case $choice in
    1)
        echo ""
        echo "🛑 Disabling all deployment workflows..."
        [ -f "$WORKFLOWS_DIR/nextjs.yml" ] && mv "$WORKFLOWS_DIR/nextjs.yml" "$WORKFLOWS_DIR/nextjs.yml.disabled" && echo "  ✓ Disabled nextjs.yml"
        [ -f "$WORKFLOWS_DIR/cpanel-deploy.yml" ] && mv "$WORKFLOWS_DIR/cpanel-deploy.yml" "$WORKFLOWS_DIR/cpanel-deploy.yml.disabled" && echo "  ✓ Disabled cpanel-deploy.yml"
        [ -f "$WORKFLOWS_DIR/ssh-deploy.yml" ] && mv "$WORKFLOWS_DIR/ssh-deploy.yml" "$WORKFLOWS_DIR/ssh-deploy.yml.disabled" && echo "  ✓ Disabled ssh-deploy.yml"
        echo ""
        echo "✅ All deployment workflows disabled"
        echo ""
        echo "Next steps:"
        echo "1. Choose your deployment method (see DEPLOYMENT_FIX.md)"
        echo "2. Run this script again to enable only your chosen workflow"
        echo "3. Commit and push: git add . && git commit -m 'Disable conflicting workflows' && git push"
        ;;
    
    2)
        echo ""
        echo "📄 Enabling GitHub Pages deployment..."
        [ -f "$WORKFLOWS_DIR/nextjs.yml.disabled" ] && mv "$WORKFLOWS_DIR/nextjs.yml.disabled" "$WORKFLOWS_DIR/nextjs.yml" && echo "  ✓ Enabled nextjs.yml"
        [ -f "$WORKFLOWS_DIR/cpanel-deploy.yml" ] && mv "$WORKFLOWS_DIR/cpanel-deploy.yml" "$WORKFLOWS_DIR/cpanel-deploy.yml.disabled" && echo "  ✓ Disabled cpanel-deploy.yml"
        [ -f "$WORKFLOWS_DIR/ssh-deploy.yml" ] && mv "$WORKFLOWS_DIR/ssh-deploy.yml" "$WORKFLOWS_DIR/ssh-deploy.yml.disabled" && echo "  ✓ Disabled ssh-deploy.yml"
        echo ""
        echo "✅ GitHub Pages deployment enabled"
        echo ""
        echo "⚠️  IMPORTANT: Enable GitHub Pages in repository settings:"
        echo "   https://github.com/bikkhoto/myxen-foundation/settings/pages"
        echo "   Set Source to: GitHub Actions"
        echo ""
        echo "Then commit and push: git add . && git commit -m 'Enable GitHub Pages deployment' && git push"
        ;;
    
    3)
        echo ""
        echo "🖥️  Enabling cPanel deployment..."
        [ -f "$WORKFLOWS_DIR/nextjs.yml" ] && mv "$WORKFLOWS_DIR/nextjs.yml" "$WORKFLOWS_DIR/nextjs.yml.disabled" && echo "  ✓ Disabled nextjs.yml"
        [ -f "$WORKFLOWS_DIR/cpanel-deploy.yml.disabled" ] && mv "$WORKFLOWS_DIR/cpanel-deploy.yml.disabled" "$WORKFLOWS_DIR/cpanel-deploy.yml" && echo "  ✓ Enabled cpanel-deploy.yml"
        [ -f "$WORKFLOWS_DIR/ssh-deploy.yml" ] && mv "$WORKFLOWS_DIR/ssh-deploy.yml" "$WORKFLOWS_DIR/ssh-deploy.yml.disabled" && echo "  ✓ Disabled ssh-deploy.yml"
        echo ""
        echo "✅ cPanel deployment enabled"
        echo ""
        echo "⚠️  IMPORTANT: Add GitHub Secret 'CPANEL_FTP_PASSWORD':"
        echo "   https://github.com/bikkhoto/myxen-foundation/settings/secrets/actions"
        echo ""
        echo "Then commit and push: git add . && git commit -m 'Enable cPanel deployment' && git push"
        ;;
    
    4)
        echo ""
        echo "🔐 Enabling SSH deployment..."
        [ -f "$WORKFLOWS_DIR/nextjs.yml" ] && mv "$WORKFLOWS_DIR/nextjs.yml" "$WORKFLOWS_DIR/nextjs.yml.disabled" && echo "  ✓ Disabled nextjs.yml"
        [ -f "$WORKFLOWS_DIR/cpanel-deploy.yml" ] && mv "$WORKFLOWS_DIR/cpanel-deploy.yml" "$WORKFLOWS_DIR/cpanel-deploy.yml.disabled" && echo "  ✓ Disabled cpanel-deploy.yml"
        [ -f "$WORKFLOWS_DIR/ssh-deploy.yml.disabled" ] && mv "$WORKFLOWS_DIR/ssh-deploy.yml.disabled" "$WORKFLOWS_DIR/ssh-deploy.yml" && echo "  ✓ Enabled ssh-deploy.yml"
        echo ""
        echo "✅ SSH deployment enabled"
        echo ""
        echo "⚠️  IMPORTANT: Add these GitHub Secrets:"
        echo "   https://github.com/bikkhoto/myxen-foundation/settings/secrets/actions"
        echo ""
        echo "   Required secrets:"
        echo "   - SSH_PRIVATE_KEY"
        echo "   - SSH_USER"
        echo "   - SSH_HOST"
        echo "   - SSH_TARGET_PATH"
        echo "   - SSH_PORT (optional, default: 22)"
        echo "   - SSH_PASSPHRASE (optional)"
        echo ""
        echo "Then commit and push: git add . && git commit -m 'Enable SSH deployment' && git push"
        ;;
    
    5)
        echo ""
        echo "📊 Current Workflow Status:"
        echo ""
        echo "Active workflows:"
        ls -1 "$WORKFLOWS_DIR"/*.yml 2>/dev/null | while read -r file; do
            filename=$(basename "$file")
            if [[ "$filename" == *"nextjs"* ]] || [[ "$filename" == *"cpanel"* ]] || [[ "$filename" == *"ssh"* ]]; then
                echo "  ✅ $filename (ACTIVE)"
            fi
        done
        echo ""
        echo "Disabled workflows:"
        ls -1 "$WORKFLOWS_DIR"/*.disabled 2>/dev/null | while read -r file; do
            filename=$(basename "$file")
            echo "  ❌ $filename (DISABLED)"
        done || echo "  None"
        echo ""
        ;;
    
    6)
        echo ""
        echo "👋 Exiting..."
        exit 0
        ;;
    
    *)
        echo ""
        echo "❌ Invalid choice. Please run the script again."
        exit 1
        ;;
esac

echo ""
echo "📚 For detailed information, see: DEPLOYMENT_FIX.md"
echo ""
