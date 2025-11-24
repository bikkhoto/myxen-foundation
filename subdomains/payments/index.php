<?php
// pay.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/includes/db.php';

$ref = $_GET['ref'] ?? null;
if (!$ref) {
    http_response_code(400);
    echo "Missing ref";
    exit;
}

// Find QR record by payment_ref
$stmt = $conn->prepare("SELECT q.id, q.merchant_id, q.amount, q.platform_fee, q.total_amount, q.status, m.name AS merchant_name
    FROM qr_payments q
    LEFT JOIN merchants m ON m.id = q.merchant_id
    WHERE q.payment_ref = ? LIMIT 1");
$stmt->bind_param("s", $ref);
$stmt->execute();
$res = $stmt->get_result();
$qr = $res->fetch_assoc();
if (!$qr) {
    http_response_code(404);
    echo "Payment request not found.";
    exit;
}

$merchantName = $qr['merchant_name'] ?: "Merchant #".$qr['merchant_id'];
$amount = (float)$qr['amount'];
$total = (float)$qr['total_amount'];
$platformFee = (float)$qr['platform_fee'];

// your token mint and receiving wallet (set below)
$TOKEN_MINT = 'CHXoAEvTi3FAEZMkWDJJmUSRXxYAoeco4bDMDZQJVWen';
$RECEIVER = 'FF4VLF8YKbNVhTbb3S8GyP7hC6wGYNnpAtkWzMJoae7p';

// build a simple solana:// link text for user (wallets should accept solana: links)
$solanaUri = "solana:{$RECEIVER}?amount={$total}&spl-token={$TOKEN_MINT}&label=" . urlencode($merchantName);

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Pay — <?=htmlspecialchars($merchantName)?> (<?=htmlspecialchars($amount)?>)</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card mx-auto" style="max-width:720px">
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <img src="/myxenpay-logo-dark.png" alt="logo" style="height:46px;margin-right:12px">
          <div>
            <h5 class="mb-0"><?=htmlspecialchars($merchantName)?></h5>
            <small class="text-muted">Paying <?=htmlspecialchars($amount)?> (total <?=number_format($total,2)?>)</small>
          </div>
        </div>

        <p>Scan the QR with a wallet app or click the button to open a wallet:</p>

        <div class="mb-3">
          <a class="btn btn-primary" href="<?=htmlspecialchars($solanaUri)?>">Open wallet (Pay)</a>
          <button id="open-wallet" class="btn btn-outline-primary">Open Phantom (if installed)</button>
          <a class="btn btn-outline-secondary" href="/qr.php">Back</a>
        </div>

        <hr>

        <h6>After you pay</h6>
        <p class="small text-muted">Once the wallet confirms the transfer, paste the transaction signature (txid) below and press Verify.</p>

        <form id="verifyForm" method="post" action="verify_tx.php">
          <input type="hidden" name="payment_ref" value="<?=htmlspecialchars($ref)?>">
          <div class="mb-3">
            <label class="form-label">Transaction signature (txid)</label>
            <input type="text" name="tx_signature" class="form-control" required placeholder="Enter tx signature from your wallet">
          </div>
          <button type="submit" class="btn btn-success">Verify Payment</button>
        </form>

        <hr>
        <small class="text-muted">If you used a non-SPL transfer or the exact amounts differ, our verification will try to match token mint & recipient. Contact support if automatic verification fails.</small>
      </div>
    </div>
  </div>

  <script>
    // try opening Phantom automatically (optional UX)
    document.getElementById('open-wallet').addEventListener('click', async () => {
      if (window.solana && window.solana.isPhantom) {
        try {
          await window.solana.connect();
          // create a deep link opening via solana: scheme
          window.location.href = "<?=htmlspecialchars($solanaUri)?>";
        } catch (e) {
          alert('Phantom connection cancelled.');
        }
      } else {
        alert('Phantom not found. Use the "Open wallet" button or scan the QR with any wallet.');
      }
    });
  </script>
</body>
</html>
