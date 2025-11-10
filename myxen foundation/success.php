<?php
require_once __DIR__ . '/includes/db.php';
$ref = $_GET['ref'] ?? null;
$tx = $_GET['tx'] ?? null;
if (!$ref) { echo "Missing ref"; exit; }

$stmt = $conn->prepare("SELECT q.id, q.merchant_id, q.amount, q.total_amount, q.tx_signature, m.name AS merchant_name
    FROM qr_payments q
    LEFT JOIN merchants m ON m.id = q.merchant_id
    WHERE q.payment_ref = ? LIMIT 1");
$stmt->bind_param("s", $ref);
$stmt->execute();
$res = $stmt->get_result();
$qr = $res->fetch_assoc();
if (!$qr) { echo "Not found"; exit; }
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Payment Success</title></head>
<body>
  <div style="max-width:800px;margin:40px auto;font-family:Arial,Helvetica,sans-serif">
    <h2>Payment successful ✓</h2>
    <p>Merchant: <?=htmlspecialchars($qr['merchant_name'] ?: $qr['merchant_id'])?></p>
    <p>Amount: <?=htmlspecialchars($qr['amount'])?></p>
    <p>Total: <?=htmlspecialchars($qr['total_amount'])?></p>
    <p>Transaction: <a href="https://explorer.solana.com/tx/<?=htmlspecialchars($tx)?>?cluster=mainnet" target="_blank"><?=htmlspecialchars($tx)?></a></p>
  </div>
</body>
</html>
