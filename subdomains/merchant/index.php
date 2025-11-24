
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


// redirect if not logged in
if (!isset($_SESSION['merchant_id'])) {
  header('Location: ../login.php');
  exit;
}

// fetch merchant info
$id = $_SESSION['merchant_id'];
$stmt = $conn->prepare("SELECT name,email,receiving_wallet,kyc_status FROM merchants WHERE id=? LIMIT 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$merchant = $res->fetch_assoc();

if (!$merchant || $merchant['kyc_status'] !== 'verified') {
  echo "<script>alert('Your KYC is pending or invalid.');window.location='../login.php';</script>";
  exit;
}

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $amount = floatval($_POST['amount']);
  if ($amount > 0) {
    $payment_ref = 'MXN' . strtoupper(uniqid());
    $platform_fee = round($amount * 0.0007, 4);
    $total = $amount + $platform_fee;
    $qr_link = "https://myxenpay.finance/pay.php?ref={$payment_ref}";

    require_once __DIR__ . '/../vendor/autoload.php';
    use Endroid\QrCode\Builder\Builder;
    use Endroid\QrCode\Writer\PngWriter;
    use Endroid\QrCode\Encoding\Encoding;
    use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

    $fileName = 'qr_' . $payment_ref . '.png';
    $dir = __DIR__ . '/../assets/qrcodes/';
    if (!is_dir($dir)) mkdir($dir, 0775, true);
    $filePath = $dir . $fileName;

    $result = Builder::create()
      ->writer(new PngWriter())
      ->data($qr_link)
      ->encoding(new Encoding('UTF-8'))
      ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
      ->size(240)
      ->margin(8)
      ->build();
    $result->saveToFile($filePath);

    $stmt = $conn->prepare("INSERT INTO qr_payments (merchant_id,amount,platform_fee,total_amount,qr_code,status,payment_ref)
                            VALUES (?,?,?,?,?,'pending',?)");
    $stmt->bind_param("idddss", $id, $amount, $platform_fee, $total, $fileName, $payment_ref);
    $stmt->execute();

    $msg = "<div class='alert alert-success mt-3'>QR generated successfully.<br>
            <a href='/assets/qrcodes/$fileName' target='_blank'>Download QR</a> or share link: 
            <a href='$qr_link' target='_blank'>$qr_link</a></div>";
  } else {
    $msg = "<div class='alert alert-warning mt-3'>Enter a valid amount.</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Merchant Dashboard | MyXenPay</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Arial,sans-serif;background:#f8fafc;}
header{position:fixed;top:0;width:100%;background:rgba(255,255,255,0.95);backdrop-filter:blur(15px);border-bottom:1px solid #eee;z-index:10;}
.container{max-width:720px;margin-top:120px;}
.card{border:none;border-radius:16px;box-shadow:0 8px 25px rgba(0,0,0,0.05);}
</style>
</head>
<body>
<header class="py-2 px-4 d-flex justify-content-between align-items-center">
  <a href="../index.php"><img src="/myxenpay-logo-light.png" style="height:34px"></a>
  <div>
    <span class="me-3 text-muted small">👤 <?= htmlspecialchars($merchant['name']) ?></span>
    <a href="../logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
  </div>
</header>

<div class="container">
  <div class="card p-4">
    <h3 class="mb-3 text-center fw-semibold">Generate Payment QR</h3>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Amount</label>
        <input type="number" name="amount" step="0.01" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Generate QR</button>
      <?= $msg ?>
    </form>
  </div>

  <div class="mt-4 card p-3">
    <h5 class="fw-semibold">Merchant Info</h5>
    <p><strong>Email:</strong> <?= htmlspecialchars($merchant['email']) ?></p>
    <p><strong>Receiving Wallet:</strong><br><code><?= htmlspecialchars($merchant['receiving_wallet']) ?></code></p>
  </div>
</div>
</body>
</html>
