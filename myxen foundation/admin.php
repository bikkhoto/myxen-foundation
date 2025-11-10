<?php
// admin/index.php — DB-driven admin for MyXenPay
// Place this file at /public_html/admin/index.php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ---- CONFIG ----
// Change this admin password to something safe immediately
$ADMIN_PASSWORD = 'Nazmuzsakib01715@@##';

// Path to DB connection (adjust if your includes path differs)
require_once __DIR__ . '/../includes/db.php'; // must define $conn (mysqli)

// Simple CSRF token
if (!isset($_SESSION['admin_csrf'])) {
    $_SESSION['admin_csrf'] = bin2hex(random_bytes(16));
}
$csrf = $_SESSION['admin_csrf'];

// ---- LOGIN HANDLING ----
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_password'])) {
        if ($_POST['admin_password'] === $ADMIN_PASSWORD) {
            $_SESSION['admin_logged_in'] = true;
            header('Location: index.php');
            exit;
        } else {
            $error = "Invalid password.";
        }
    }
    // render login form
    ?>
    <!doctype html>
    <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>Admin Login — MyXenPay</title>
      <style>
        body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial;background:#f5f7fb;display:flex;align-items:center;justify-content:center;height:100vh;margin:0}
        .box{background:#fff;padding:28px;border-radius:12px;box-shadow:0 8px 30px rgba(2,6,23,0.08);width:340px;text-align:center}
        input{width:100%;padding:10px;margin:10px 0;border-radius:8px;border:1px solid #e6e9ef}
        button{background:#007aff;color:#fff;border:0;padding:10px 14px;border-radius:8px;cursor:pointer}
        .error{color:#b00020;margin-top:8px}
      </style>
    </head>
    <body>
      <div class="box">
        <h2>MyXenPay Admin</h2>
        <form method="post">
          <input name="admin_password" type="password" placeholder="Admin password" required autofocus>
          <button type="submit">Login</button>
        </form>
        <?php if(!empty($error)): ?><div class="error"><?=htmlspecialchars($error)?></div><?php endif; ?>
      </div>
    </body>
    </html>
    <?php
    exit;
}

// ---- PROTECTED ACTIONS (approve/reject, mark paid/forward, distribute rewards) ----
function require_csrf() {
    if (!isset($_POST['csrf']) || $_POST['csrf'] !== ($_SESSION['admin_csrf'] ?? '')) {
        die('Invalid CSRF token.');
    }
}

// Approve / Reject merchant KYC
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && in_array($_POST['action'], ['approve_kyc','reject_kyc'])) {
    require_csrf();
    $m_id = intval($_POST['merchant_id']);
    $new = $_POST['action'] === 'approve_kyc' ? 'verified' : 'rejected';
    $stmt = $conn->prepare("UPDATE merchants SET kyc_status = ? WHERE id = ?");
    $stmt->bind_param("si", $new, $m_id);
    $stmt->execute();
    $_SESSION['flash'] = "Merchant #{$m_id} set to {$new}.";
    header('Location: index.php');
    exit;
}

// Mark a qr_payment as paid or forwarded_manually
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && in_array($_POST['action'], ['mark_paid','mark_forwarded'])) {
    require_csrf();
    $id = intval($_POST['tx_id']);
    $status = $_POST['action'] === 'mark_paid' ? 'paid' : 'forwarded_manually';
    $stmt = $conn->prepare("UPDATE qr_payments SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $_SESSION['flash'] = "Transaction #{$id} marked as {$status}.";
    header('Location: index.php');
    exit;
}

// Distribute rewards
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['distribute_rewards'])) {
    require_csrf();
    $total_pool = floatval($_POST['reward_pool']);
    $reward_type = ($_POST['reward_type'] === 'decreasing') ? 'decreasing' : 'equal';

    // Fetch top merchants by number of paid transactions (live)
    $sql = "SELECT merchant_id, COUNT(*) AS tx_count, SUM(amount) AS total_volume
            FROM qr_payments
            WHERE status = 'paid'
            GROUP BY merchant_id
            ORDER BY tx_count DESC
            LIMIT 100";
    $res = $conn->query($sql);
    $rows = [];
    while ($r = $res->fetch_assoc()) {
        $rows[$r['merchant_id']] = $r;
    }

    $total_merchants = count($rows);
    $distribution = [];

    if ($total_merchants > 0) {
        if ($reward_type === 'decreasing') {
            // total points = sum 1..N = N*(N+1)/2
            $total_points = ($total_merchants * ($total_merchants + 1)) / 2;
            $rank = 1;
            foreach ($rows as $merchant_id => $info) {
                $points = $total_merchants - $rank + 1;
                $reward_amount = ($points / $total_points) * $total_pool;
                $distribution[$merchant_id] = [
                    'rank' => $rank,
                    'tx_count' => intval($info['tx_count']),
                    'total_volume' => floatval($info['total_volume']),
                    'reward' => $reward_amount
                ];
                $rank++;
            }
        } else {
            $reward_per = $total_pool / $total_merchants;
            $rank = 1;
            foreach ($rows as $merchant_id => $info) {
                $distribution[$merchant_id] = [
                    'rank' => $rank,
                    'tx_count' => intval($info['tx_count']),
                    'total_volume' => floatval($info['total_volume']),
                    'reward' => $reward_per
                ];
                $rank++;
            }
        }
    }

    // Save distribution JSON into rewards_history table
    $dist_json = json_encode($distribution, JSON_PRETTY_PRINT);
    $stmt = $conn->prepare("INSERT INTO rewards_history (total_pool, type, distribution) VALUES (?, ?, ?)");
    $stmt->bind_param("dss", $total_pool, $reward_type, $dist_json);
    $stmt->execute();

    $_SESSION['flash'] = "Rewards distribution calculated and saved.";
    header('Location: index.php');
    exit;
}

// ---- DATA FOR DISPLAY ----
// Recent merchants (limit 200)
$merchants = [];
$res = $conn->query("SELECT id,name,email,receiving_wallet,kyc_status,created_at FROM merchants ORDER BY created_at DESC LIMIT 200");
while ($m = $res->fetch_assoc()) $merchants[] = $m;

// Recent transactions (qr_payments)
$txs = [];
$res = $conn->query("SELECT id,payment_ref,merchant_id,amount,platform_fee,total_amount,qr_code,status,created_at FROM qr_payments ORDER BY id DESC LIMIT 50");
while ($r = $res->fetch_assoc()) $txs[] = $r;

// Recent rewards history
$rewards = [];
$res = $conn->query("SELECT id,created_at,total_pool,type,distribution FROM rewards_history ORDER BY created_at DESC LIMIT 10");
while ($r = $res->fetch_assoc()) $rewards[] = $r;

// flash
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Admin — MyXenPay</title>
  <style>
    body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial;background:#f6f9fc;margin:0;padding:28px;color:#0f172a}
    .container{max-width:1200px;margin:0 auto}
    .row{display:flex;gap:20px;flex-wrap:wrap}
    .card{background:#fff;padding:18px;border-radius:12px;box-shadow:0 6px 30px rgba(2,6,23,0.06);margin-bottom:18px}
    .card.wide{flex:1 1 100%}
    .card.half{flex:1 1 calc(50% - 20px)}
    table{width:100%;border-collapse:collapse}
    th,td{padding:10px;border-bottom:1px solid #eef2f7;text-align:left;font-size:0.95rem}
    th{background:#fbfcfe;font-weight:700}
    .btn{display:inline-block;padding:8px 10px;border-radius:8px;text-decoration:none;color:#fff;background:#007aff;border:0;cursor:pointer}
    .btn.warn{background:#f59e0b}
    .btn.danger{background:#ef4444}
    .muted{color:#64748b;font-size:0.9rem}
    .small{font-size:0.85rem;color:#475569}
    .flash{background:#e6fffa;border-left:4px solid #06b6d4;padding:10px;margin-bottom:10px;border-radius:6px}
    form.inline{display:inline}
    .search{margin-bottom:12px}
  </style>
</head>
<body>
  <div class="container">
    <header style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
      <h1>MyXenPay Admin</h1>
      <div>
        <a class="btn" href="../">Open Site</a>
        <a class="btn warn" href="?logout=1">Logout</a>
      </div>
    </header>

    <?php if($flash): ?>
      <div class="flash"><?=htmlspecialchars($flash)?></div>
    <?php endif; ?>

    <div class="row">
      <div class="card half">
        <h3>Merchants (latest)</h3>
        <div class="muted small">Approve / Reject merchant KYC here.</div>
        <table>
          <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Wallet</th><th>KYC</th><th>Action</th></tr></thead>
          <tbody>
            <?php foreach($merchants as $m): ?>
              <tr>
                <td><?=htmlspecialchars($m['id'])?></td>
                <td><?=htmlspecialchars($m['name'])?></td>
                <td class="small"><?=htmlspecialchars($m['email'])?></td>
                <td class="small"><?=htmlspecialchars($m['receiving_wallet'])?></td>
                <td><?=htmlspecialchars($m['kyc_status'])?></td>
                <td>
                  <?php if($m['kyc_status'] !== 'verified'): ?>
                    <form class="inline" method="post" style="display:inline">
                      <input type="hidden" name="csrf" value="<?=htmlspecialchars($csrf)?>">
                      <input type="hidden" name="merchant_id" value="<?=htmlspecialchars($m['id'])?>">
                      <input type="hidden" name="action" value="approve_kyc">
                      <button class="btn" type="submit">Approve</button>
                    </form>
                    <form class="inline" method="post" style="display:inline">
                      <input type="hidden" name="csrf" value="<?=htmlspecialchars($csrf)?>">
                      <input type="hidden" name="merchant_id" value="<?=htmlspecialchars($m['id'])?>">
                      <input type="hidden" name="action" value="reject_kyc">
                      <button class="btn danger" type="submit">Reject</button>
                    </form>
                  <?php else: ?>
                    <span class="small">—</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>

      <div class="card half">
        <h3>Pending QR Payments</h3>
        <div class="muted small">Mark transactions as paid or forwarded (manual).</div>
        <table>
          <thead><tr><th>ID</th><th>Ref</th><th>Merchant</th><th>Amount</th><th>Status</th><th>Action</th></tr></thead>
          <tbody>
            <?php foreach($txs as $t): if($t['status'] === 'pending'): ?>
            <tr>
              <td><?=htmlspecialchars($t['id'])?></td>
              <td><?=htmlspecialchars($t['payment_ref'])?></td>
              <td><?=htmlspecialchars($t['merchant_id'])?></td>
              <td><?=number_format($t['amount'], 6)?></td>
              <td><span class="small"><?=htmlspecialchars($t['status'])?></span></td>
              <td>
                <form method="post" class="inline">
                  <input type="hidden" name="csrf" value="<?=htmlspecialchars($csrf)?>">
                  <input type="hidden" name="tx_id" value="<?=htmlspecialchars($t['id'])?>">
                  <input type="hidden" name="action" value="mark_paid">
                  <button class="btn" type="submit">Mark Paid</button>
                </form>
                <form method="post" class="inline">
                  <input type="hidden" name="csrf" value="<?=htmlspecialchars($csrf)?>">
                  <input type="hidden" name="tx_id" value="<?=htmlspecialchars($t['id'])?>">
                  <input type="hidden" name="action" value="mark_forwarded">
                  <button class="btn warn" type="submit">Mark Forwarded</button>
                </form>
              </td>
            </tr>
            <?php endif; endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="card wide">
        <h3>All recent transactions (latest 50)</h3>
        <table>
          <thead><tr><th>ID</th><th>Ref</th><th>Merchant</th><th>Amount</th><th>Total</th><th>Status</th><th>QR</th><th>Created</th></tr></thead>
          <tbody>
            <?php foreach($txs as $t): ?>
              <tr>
                <td><?=htmlspecialchars($t['id'])?></td>
                <td><?=htmlspecialchars($t['payment_ref'])?></td>
                <td><?=htmlspecialchars($t['merchant_id'])?></td>
                <td><?=number_format($t['amount'],6)?></td>
                <td><?=number_format($t['total_amount'],6)?></td>
                <td class="small"><?=htmlspecialchars($t['status'])?></td>
                <td class="small"><?= $t['qr_code']? "<a href='/assets/qrcodes/".htmlspecialchars($t['qr_code'])."' target='_blank'>QR</a>":'—' ?></td>
                <td class="small"><?=htmlspecialchars($t['created_at'])?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="card wide">
        <h3>Rewards — Top Merchants</h3>
        <div class="muted small">Distribute a SOL pool among top merchants by number of paid transactions.</div>

        <div style="margin-top:12px;margin-bottom:12px;">
          <form method="post" style="display:flex;gap:12px;align-items:center;flex-wrap:wrap">
            <input type="hidden" name="csrf" value="<?=htmlspecialchars($csrf)?>">
            <label class="small">Total Pool (SOL):</label>
            <input type="number" name="reward_pool" step="0.001" min="0.001" value="100" required>
            <label class="small">Type:</label>
            <select name="reward_type">
              <option value="decreasing">Decreasing (ranked)</option>
              <option value="equal">Equal</option>
            </select>
            <button class="btn" name="distribute_rewards" type="submit">Calculate & Save</button>
          </form>
        </div>

        <?php if(!empty($rewards)): ?>
          <h4>Past distributions</h4>
          <table>
            <thead><tr><th>ID</th><th>When</th><th>Pool (SOL)</th><th>Type</th><th>Preview</th></tr></thead>
            <tbody>
              <?php foreach($rewards as $r): ?>
                <tr>
                  <td><?=htmlspecialchars($r['id'])?></td>
                  <td><?=htmlspecialchars($r['created_at'])?></td>
                  <td><?=number_format($r['total_pool'],6)?></td>
                  <td><?=htmlspecialchars($r['type'])?></td>
                  <td class="small"><pre style="max-height:80px;overflow:auto;background:#fbfcfe;padding:8px;border-radius:6px"><?=htmlspecialchars(substr($r['distribution'],0,500))?></pre></td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="small muted">No reward distributions yet.</div>
        <?php endif; ?>
      </div>

    </div> <!-- row -->
  </div> <!-- container -->
</body>
</html>
