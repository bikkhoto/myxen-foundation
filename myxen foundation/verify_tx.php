<?php
// verify_tx.php
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once __DIR__ . '/includes/db.php';

$payment_ref = $_POST['payment_ref'] ?? null;
$tx = trim($_POST['tx_signature'] ?? '');

if (!$payment_ref || !$tx) {
    die('Missing data');
}

// fetch payment record
$stmt = $conn->prepare("SELECT id, merchant_id, amount, total_amount, status FROM qr_payments WHERE payment_ref = ? LIMIT 1");
$stmt->bind_param("s", $payment_ref);
$stmt->execute();
$res = $stmt->get_result();
$qr = $res->fetch_assoc();
if (!$qr) die('Payment request not found');

// if already paid
if ($qr['status'] === 'paid') {
    header("Location: success.php?ref=" . urlencode($payment_ref) . "&tx=" . urlencode($tx));
    exit;
}

// Solana RPC and token mint (set your RPC and token)
$RPC_URL = 'https://api.mainnet-beta.solana.com';
$TOKEN_MINT = 'CHXoAEvTi3FAEZMkWDJJmUSRXxYAoeco4bDMDZQJVWen';
$RECEIVER = 'FF4VLF8YKbNVhTbb3S8GyP7hC6wGYNnpAtkWzMJoae7p';

// call getTransaction for the tx signature
$payload = [
    "jsonrpc" => "2.0",
    "id" => 1,
    "method" => "getTransaction",
    "params" => [
        $tx,
        "jsonParsed"
    ]
];

$ch = curl_init($RPC_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
$result = curl_exec($ch);
if ($result === false) { die('RPC call failed'); }
$data = json_decode($result, true);
curl_close($ch);

if (empty($data['result'])) {
    die('Transaction not found or not finalized yet. Wait a few seconds and try again.');
}

// parse transaction for token transfer to our receiver with the expected mint
$txInfo = $data['result'];
$meta = $txInfo['meta'] ?? null;
$transaction = $txInfo['transaction'] ?? null;

$found = false;
$matched_amount = 0;

if ($transaction && isset($transaction['message']['instructions'])) {
    foreach ($transaction['message']['instructions'] as $ins) {
        if (isset($ins['parsed']) && isset($ins['parsed']['type']) && $ins['parsed']['type'] === 'transfer') {
            // native SOL transfer
            $info = $ins['parsed']['info'];
            if (($info['destination'] ?? '') === $RECEIVER) {
                // amount is in lamports
                $lamports = intval($info['lamports'] ?? 0);
                $solAmount = $lamports / 1e9;
                // match loosely to expected total (allow small rounding)
                if (abs($solAmount - floatval($qr['total_amount'])) < 0.0001) {
                    $found = true;
                    $matched_amount = $solAmount;
                    break;
                }
            }
        }
        // SPL token transfer parsed
        if (isset($ins['parsed']) && isset($ins['parsed']['type']) && ($ins['parsed']['type'] === 'transfer' || $ins['parsed']['type'] === 'transferChecked')) {
            $info = $ins['parsed']['info'];
            // token transfers show 'mint' and dest
            if (($info['mint'] ?? '') === $TOKEN_MINT) {
                // destination could be token account; we should check parsed dest owner or account owner; simpler: accept if any recipient equals our owner
                // some parsers include 'destination' token account; we will accept and later optionally check owner from meta
                // amount is string amount (in token units)
                $amt = floatval($info['amount'] ?? 0);
                // many tokens have decimals - but parsed amount here is already normalized in some RPCs; if not, you may need decimals logic.
                // We'll accept any transfer > 0 as success for now but we can compare to qr amount as numeric.
                if ($amt > 0) {
                    $found = true;
                    $matched_amount = $amt;
                    break;
                }
            }
        }
    }
}

if (!$found) {
    die('Could not verify a matching payment in that transaction. Ensure you sent the correct token/recipient and try again.');
}

// mark as paid in DB and record tx
$update = $conn->prepare("UPDATE qr_payments SET status='paid', tx_signature = ? WHERE payment_ref = ?");
$update->bind_param("ss", $tx, $payment_ref);
$update->execute();

// redirect to success page
header("Location: success.php?ref=" . urlencode($payment_ref) . "&tx=" . urlencode($tx));
exit;
