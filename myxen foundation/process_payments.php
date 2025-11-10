<?php
// This script runs every 1-5 mins via cron job
// Checks MyxenPay wallet for new payments
// Forwards (amount - fee) to merchant

// Pseudo-logic:
// 1. Use Solana RPC to get recent transactions to MyxenPay wallet
// 2. For each payment:
//    - Extract amount, sender (not needed), and memo (if used to ID merchant)
//    - Calculate fee: $fee = $amount * 0.0002;
//    - Forward ($amount - $fee) to merchant's wallet
// 3. Log success/failure

// You'll need:
// - Solana PHP SDK (or curl to public RPC)
// - Secure storage of merchant wallet mappings
// - Error handling + retries