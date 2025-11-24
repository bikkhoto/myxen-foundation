# Copilot Instructions for bikkhoto/myxen-foundation

Purpose
- Provide clear, actionable guidance for GitHub Copilot (or any AI-assisted contributor) working on the MyXen Foundation repository.
- Ensure changes follow project architecture, security, and deployment requirements.

Project summary
- Two applications in the repo:
  - Next.js DApp (root) — TypeScript + Tailwind, Solana wallet integration, static export.
  - PHP website (`myxen foundation/`) — legacy content and integration.
- Key priorities: community transparency, developer wallet visibility, full static export (GitHub Pages), no server-side runtime.

General rules for Copilot
1. Respect the project's mission
   - All developer wallet addresses must be visible and never hidden or moved into private files.
   - Prioritize community-first and decentralization principles in feature design.

2. No secrets in the repository
   - Never introduce private keys, seed phrases, API secrets, or any sensitive data.
   - If code requires credentials, use NEXT_PUBLIC_ for client safe variables only, or reference external secret storage and document how to provide them securely during deployment.

3. No server-side features in Next.js
   - The Next.js app is statically exported (next.config.ts: output: 'export').
   - Avoid API routes, getServerSideProps, or other server-only features.
   - Use client-side data fetching or on-chain reads via @solana/web3.js and RPC endpoints.

4. Use client components for interactive code
   - Add "use client" to files that directly interact with browser APIs, wallets, or DOM.
   - Keep server-like logic out of static pages.

5. Wallet integration rules
   - Use @solana/wallet-adapter-react and maintain support for Phantom and Solflare.
   - If adding new providers, ensure they are optional and documented.
   - Developer wallets must be displayed transparently (component: components/DeveloperWallets.tsx).
   - When adding wallet calls, handle permission rejections and offline states gracefully.

6. Build and deploy compatibility
   - Ensure code is compatible with static export and GitHub Pages:
     - Use images.unoptimized: true in next.config.ts
     - Avoid dynamic server-side behavior and runtime environment dependencies.
   - Output directory must remain `./out` (static export).
   - Keep Node 20.x compatibility and avoid Node APIs that break static builds.

Coding style and quality
- Language conventions:
  - Next.js app: TypeScript + React + Tailwind CSS.
  - PHP legacy site: keep structure unchanged unless migrating intentionally.
- Linting & formatting:
  - Follow repository ESLint and Prettier configs (add or update if missing).
  - Prefer readable commit messages and atomic changes.
- Accessibility:
  - Ensure accessible navigation and wallet flows (keyboard focus, aria labels for connect buttons).
- Tests:
  - Add relevant unit tests for critical logic. For UI, prefer integration/storybook-level tests due to static export.

Branching, commits, and PRs
- Branch naming:
  - feature/<short-description>-<ticket-id?>, fix/<short-description>, chore/<task>.
- Commit messages:
  - Conventional-ish: type(scope): short summary
    - Examples:
      - feat(wallet): add Ledger provider support
      - fix(developer-wallets): correct balance formatting
      - docs(readme): update deployment steps
- PR description should include:
  - What changed and why
  - How to test locally (npm commands, account/wallet notes)
  - Screenshots or recordings for UI changes
  - Any migration or backward-incompatible notes
- Link the PR to any related issues and add appropriate labels (enhancement, bug, docs).

Security & compliance
- Do not commit private keys, .env files with secrets, or credentials.
- Use environment variables prefixed with NEXT_PUBLIC_ only for client-surface values.
- For any dependency that interacts with web3/wallets, verify supply-chain integrity and pin versions where practical.
- Follow MIT license requirements as included in the repo.

Repository-specific constraints & guidance
- Static export:
  - All new pages must be static-friendly.
  - Client-side-only logic (wallet interactions, balance polling) must be in components with "use client".
- Caching strategy:
  - Keep .next/cache behavior consistent with CI caching scheme. When adding heavy build steps, document cache keys and invalidation strategy.
- Deployment pipeline:
  - Changes must not break `.github/workflows/nextjs.yml` that builds and deploys to GitHub Pages.
  - If new build-time env variables are required, document them in README and workflow.

DeveloperWallets component
- Always preserve or improve transparency features:
  - Public wallet addresses must remain visible.
  - Show balances and basic transaction links (e.g., Solana explorers).
  - If adding history, prefer on-chain read-only queries; paginate and cache for performance.

Tasks Copilot can help with (examples)
- Implement new wallet provider (e.g., Ledger) with feature flag and docs.
- Improve UI/UX for DeveloperWallets: polling intervals, error states, and explorer links.
- Add a static page that explains developer wallets policy and lists addresses.
- Fix TypeScript types and linting errors in the Next.js codebase.
- Update README with build and deployment steps for contributors.

When you cannot proceed
- If a task requires secrets, private keys, or a privileged user account: stop and request human intervention.
- If a change requires a backend or serverless API (not allowed in static exports): propose architecture alternatives (client-only, serverless external API) and document trade-offs.
- For ambiguous requirements that impact project mission (transparency/decentralization): flag to maintainers with a clear rationale and suggested options.

Local development checklist (quick)
1. Install
   - npm ci
2. Build / dev
   - npx next dev (for local dev)
   - npx next build && npx next export -o out (to test static export)
3. Test
   - npm test (if tests present)
4. Lint and format
   - npm run lint
   - npm run format

Example PR template suggestion (short)
- Summary
- Related issue(s)
- Testing steps
- Screenshots
- Security notes (secrets, keys)
- Migration notes

Contact and escalation
- If unsure about wallet behavior, security, or deployment impacts, escalate to repository maintainers via an issue and include reproduction steps and suggested fixes.

Change log
- When making changes that affect the public contract (wallet addresses, public UI flows), update README and create a small CHANGELOG entry in docs/ or CHANGES.md.

Acknowledgements
- Keep contributions transparent, testable, and reversible. Favor small, well-documented changes that align with the project's community-first goals.

---
Document created to guide AI-assisted contributions for the MyXen Foundation repository. Follow it as a living document — update when processes, stack, or deployment rules change.
