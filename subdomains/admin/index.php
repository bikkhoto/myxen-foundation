<?php
session_start();

// 🔑 CHANGE THIS PASSWORD!
$ADMIN_PASSWORD = 'Nazmuzsakib01715@@##';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    if (isset($_POST['password']) && $_POST['password'] === $ADMIN_PASSWORD) {
        $_SESSION['logged_in'] = true;
        header('Location: admin.php');
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>MyxenPay Admin Login</title>
        <meta name="viewport" content="width=device-width">
        <style>
            body { font-family: sans-serif; background: #f5f7ff; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
            .login { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); text-align: center; }
            input { padding: 12px; width: 240px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; }
            button { background: #007AFF; color: white; border: none; padding: 12px 24px; border-radius: 8px; cursor: pointer; }
        </style>
    </head>
    <body>
        <div class="login">
            <h2>MyxenPay Admin</h2>
            <form method="post">
                <input type="password" name="password" placeholder="Password" autofocus required>
                <br>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// Configuration
$myxenpay_wallet = '6S4eDdYXABgtmuk3waLM63U2KHgExcD9mco7MuyG9f5G';
$merchants_file = __DIR__ . '/merchants.json';
$processed_file = __DIR__ . '/processed_tx.json';
$rewards_file = __DIR__ . '/rewards_history.json';

$merchants = file_exists($merchants_file) ? json_decode(file_get_contents($merchants_file), true) : [];
$processed = file_exists($processed_file) ? json_decode(file_get_contents($processed_file), true) : [];
$rewards_history = file_exists($rewards_file) ? json_decode(file_get_contents($rewards_file), true) : [];

// Handle manual forward
if (isset($_GET['forward']) && isset($_GET['sig']) && isset($_GET['merchant_id'])) {
    $sig = $_GET['sig'];
    $merchant_id = $_GET['merchant_id'];
    if (isset($merchants[$merchant_id])) {
        $processed[$sig] = [
            'merchant_id' => $merchant_id,
            'status' => 'forwarded_manually',
            'forwarded_at' => date('c'),
            'note' => 'Forwarded via admin dashboard'
        ];
        file_put_contents($processed_file, json_encode($processed, JSON_PRETTY_PRINT));
        echo "<script>alert('Marked as forwarded! Now send payment manually via Phantom.'); window.location='admin.php';</script>";
        exit;
    }
}

// Handle rewards distribution
if (isset($_POST['distribute_rewards'])) {
    $total_reward_pool = floatval($_POST['reward_pool']);
    $reward_type = $_POST['reward_type'];
    
    // Calculate merchant performance (transaction count)
    $merchant_performance = [];
    foreach ($processed as $tx) {
        if (isset($tx['merchant_id']) && isset($merchants[$tx['merchant_id']])) {
            $merchant_id = $tx['merchant_id'];
            if (!isset($merchant_performance[$merchant_id])) {
                $merchant_performance[$merchant_id] = 0;
            }
            $merchant_performance[$merchant_id]++;
        }
    }
    
    // Sort merchants by performance
    arsort($merchant_performance);
    $top_merchants = array_slice($merchant_performance, 0, 100, true);
    
    // Calculate rewards distribution
    $rewards_distribution = [];
    $total_merchants = count($top_merchants);
    
    if ($total_merchants > 0) {
        if ($reward_type === 'decreasing') {
            // Decreasing rewards: 1st gets highest, 100th gets lowest
            $total_points = ($total_merchants * ($total_merchants + 1)) / 2; // Sum of 1+2+3+...+100
            $rank = 1;
            foreach ($top_merchants as $merchant_id => $performance) {
                $points = $total_merchants - $rank + 1;
                $reward_amount = ($points / $total_points) * $total_reward_pool;
                $rewards_distribution[$merchant_id] = [
                    'rank' => $rank,
                    'performance' => $performance,
                    'reward' => $reward_amount,
                    'wallet' => $merchants[$merchant_id]['wallet']
                ];
                $rank++;
            }
        } else {
            // Equal distribution
            $reward_per_merchant = $total_reward_pool / $total_merchants;
            $rank = 1;
            foreach ($top_merchants as $merchant_id => $performance) {
                $rewards_distribution[$merchant_id] = [
                    'rank' => $rank,
                    'performance' => $performance,
                    'reward' => $reward_per_merchant,
                    'wallet' => $merchants[$merchant_id]['wallet']
                ];
                $rank++;
            }
        }
        
        // Save to rewards history
        $rewards_history[] = [
            'timestamp' => date('c'),
            'total_pool' => $total_reward_pool,
            'type' => $reward_type,
            'distribution' => $rewards_distribution
        ];
        file_put_contents($rewards_file, json_encode($rewards_history, JSON_PRETTY_PRINT));
        
        $_SESSION['rewards_distribution'] = $rewards_distribution;
        $_SESSION['reward_pool'] = $total_reward_pool;
    }
}

// Fetch transactions and calculate fees
$pending = [];
$url = 'https://api.mainnet-beta.solana.com';

// Get recent signatures
$data = [
    "jsonrpc" => "2.0",
    "id" => 1,
    "method" => "getSignaturesForAddress",
    "params" => [$myxenpay_wallet, ["limit" => 10]]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$signatures = $result['result'] ?? [];

foreach ($signatures as $tx) {
    $sig = $tx['signature'];
    if (isset($processed[$sig])) continue;

    // Get full transaction
    $tx_data = [
        "jsonrpc" => "2.0",
        "id" => 1,
        "method" => "getTransaction",
        "params" => [$sig, "json"]
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($tx_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $tx_response = curl_exec($ch);
    curl_close($ch);

    $tx_detail = json_decode($tx_response, true);
    if (!$tx_detail || !isset($tx_detail['result']['meta'])) continue;

    $meta = $tx_detail['result']['meta'];
    $account_keys = $tx_detail['result']['transaction']['message']['accountKeys'] ?? [];
    $myxenpay_index = array_search($myxenpay_wallet, $account_keys);
    if ($myxenpay_index === false) continue;

    $pre_balance = $meta['preBalances'][$myxenpay_index] ?? 0;
    $post_balance = $meta['postBalances'][$myxenpay_index] ?? 0;
    $lamports_received = $post_balance - $pre_balance;

    if ($lamports_received <= 0) continue;

    $sol_amount = $lamports_received / 1_000_000_000;
    
    // ✅ FEE CALCULATION IMPLEMENTED HERE
    $service_fee = $sol_amount * 0.0002; // 0.02% fee
    $merchant_amount = $sol_amount - $service_fee;
    
    $memo = '—';

    // Extract merchant ID from logs
    foreach ($meta['logMessages'] ?? [] as $log) {
        if (preg_match('/M\d+/', $log, $matches)) {
            $memo = $matches[0];
            break;
        }
    }

    // Format time safely
    $time_str = '—';
    if (isset($tx['blockTime']) && is_numeric($tx['blockTime'])) {
        $time_str = date('Y-m-d H:i', (int)$tx['blockTime']);
    }

    $pending[] = [
        'sig' => $sig,
        'sol' => $sol_amount,
        'service_fee' => $service_fee,
        'merchant_amount' => $merchant_amount,
        'memo' => $memo,
        'time' => $time_str
    ];
}

// Calculate top merchants for rewards
$merchant_stats = [];
foreach ($processed as $tx) {
    if (isset($tx['merchant_id']) && isset($merchants[$tx['merchant_id']])) {
        $merchant_id = $tx['merchant_id'];
        if (!isset($merchant_stats[$merchant_id])) {
            $merchant_stats[$merchant_id] = [
                'transaction_count' => 0,
                'total_volume' => 0,
                'wallet' => $merchants[$merchant_id]['wallet']
            ];
        }
        $merchant_stats[$merchant_id]['transaction_count']++;
        if (isset($tx['amount_sol'])) {
            $merchant_stats[$merchant_id]['total_volume'] += $tx['amount_sol'];
        }
    }
}

// Sort by transaction count
uasort($merchant_stats, function($a, $b) {
    return $b['transaction_count'] - $a['transaction_count'];
});

$top_100_merchants = array_slice($merchant_stats, 0, 100, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyxenPay Admin</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; background: #f8fafc; padding: 20px; margin: 0; }
        .container { max-width: 1200px; margin: 0 auto; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 1px solid #e2e8f0; }
        .card { background: white; padding: 24px; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); margin-bottom: 24px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { padding: 14px 12px; text-align: left; border-bottom: 1px solid #f1f5f9; }
        th { background: #f8fafc; font-weight: 600; color: #334155; }
        .btn { 
            background: #007AFF; color: white; border: none; padding: 8px 16px; 
            border-radius: 8px; text-decoration: none; display: inline-block; 
            font-weight: 500; cursor: pointer; 
        }
        .btn-success { background: #10b981; }
        .btn-warning { background: #f59e0b; }
        .btn:hover { opacity: 0.9; }
        .empty { text-align: center; color: #64748b; padding: 40px 0; }
        .instructions { background: #f0f9ff; border-left: 4px solid #0ea5e9; padding: 16px; margin-top: 20px; }
        .logout { color: #ef4444; text-decoration: none; font-weight: 500; }
        .fee-info { color: #64748b; font-size: 0.9em; }
        .rewards-form { background: #f0fdf4; padding: 20px; border-radius: 12px; margin: 20px 0; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; }
        .form-group input, .form-group select { padding: 10px; border: 1px solid #d1d5db; border-radius: 8px; width: 200px; }
        .reward-item { padding: 10px; border: 1px solid #e5e7eb; margin: 5px 0; border-radius: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>MyxenPay Admin Dashboard</h1>
            <a href="?logout=1" class="logout">Logout</a>
        </div>

        <?php if (empty($pending)): ?>
            <div class="card">
                <div class="empty">
                    <h3>✅ No pending payments</h3>
                    <p>All payments have been processed.</p>
                </div>
            </div>
        <?php else: ?>
            <div class="card">
                <h2>Pending Payments (<?= count($pending) ?>)</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Amount (SOL)</th>
                            <th>Service Fee (0.02%)</th>
                            <th>Merchant Gets</th>
                            <th>Merchant ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pending as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['time']) ?></td>
                            <td><?= number_format($p['sol'], 6) ?></td>
                            <td class="fee-info"><?= number_format($p['service_fee'], 6) ?> SOL</td>
                            <td><strong><?= number_format($p['merchant_amount'], 6) ?> SOL</strong></td>
                            <td><?= htmlspecialchars($p['memo']) ?></td>
                            <td>
                                <?php if (isset($merchants[$p['memo']])): ?>
                                    <?php
                                    $merchant_wallet = $merchants[$p['memo']]['wallet'];
                                    $msg = "1. Open Phantom\n2. Send " . number_format($p['merchant_amount'], 6) . " SOL to:\n$merchant_wallet\n3. Service fee (" . number_format($p['service_fee'], 6) . " SOL) will remain in system wallet.\n4. Click OK after sending.";
                                    ?>
                                    <a class="btn" href="?forward=1&sig=<?= urlencode($p['sig']) ?>&merchant_id=<?= urlencode($p['memo']) ?>" 
                                       onclick="alert('<?= addslashes($msg) ?>'); return true;">Forward</a>
                                <?php else: ?>
                                    <span style="color: #ef4444;">Unknown merchant</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <!-- Top 100 Merchants Rewards System -->
        <div class="card">
            <h2>🎯 Top 100 Merchants Rewards System</h2>
            
            <div class="rewards-form">
                <h3>Distribute Rewards</h3>
                <form method="post">
                    <div class="form-group">
                        <label>Total Reward Pool (SOL):</label>
                        <input type="number" name="reward_pool" step="0.001" min="0.001" value="100" required>
                    </div>
                    <div class="form-group">
                        <label>Distribution Type:</label>
                        <select name="reward_type" required>
                            <option value="decreasing">Decreasing Rewards (Rank 1 gets most)</option>
                            <option value="equal">Equal Distribution</option>
                        </select>
                    </div>
                    <button type="submit" name="distribute_rewards" class="btn btn-success">Calculate & Distribute Rewards</button>
                </form>
            </div>

            <?php if (isset($_SESSION['rewards_distribution'])): ?>
                <div style="margin-top: 20px;">
                    <h3>🎁 Rewards Distribution Plan</h3>
                    <p>Total Pool: <strong><?= number_format($_SESSION['reward_pool'], 6) ?> SOL</strong></p>
                    
                    <?php 
                    $rewards_distribution = $_SESSION['rewards_distribution'];
                    $total_distributed = 0;
                    ?>
                    
                    <div style="max-height: 400px; overflow-y: auto;">
                        <?php foreach ($rewards_distribution as $merchant_id => $reward_data): ?>
                            <div class="reward-item">
                                <strong>Rank #<?= $reward_data['rank'] ?></strong> | 
                                Merchant: <?= $merchant_id ?> | 
                                Transactions: <?= $reward_data['performance'] ?> | 
                                Reward: <strong><?= number_format($reward_data['reward'], 6) ?> SOL</strong>
                            </div>
                            <?php 
                            $total_distributed += $reward_data['reward'];
                            endforeach; 
                            unset($_SESSION['rewards_distribution']);
                            unset($_SESSION['reward_pool']);
                            ?>
                    </div>
                    
                    <p style="margin-top: 15px;"><strong>Total Distributed:</strong> <?= number_format($total_distributed, 6) ?> SOL</p>
                    <button class="btn btn-warning" onclick="alert('Use Phantom wallet to send rewards to each merchant according to the distribution above.')">Send Rewards via Phantom</button>
                </div>
            <?php endif; ?>

            <div style="margin-top: 30px;">
                <h3>🏆 Top 100 Merchants Performance</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Merchant ID</th>
                            <th>Transactions</th>
                            <th>Total Volume (SOL)</th>
                            <th>Wallet Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $rank = 1;
                        foreach ($top_100_merchants as $merchant_id => $stats): 
                        ?>
                            <tr>
                                <td>#<?= $rank ?></td>
                                <td><?= $merchant_id ?></td>
                                <td><?= $stats['transaction_count'] ?></td>
                                <td><?= number_format($stats['total_volume'], 2) ?></td>
                                <td style="font-size: 0.8em;"><?= substr($stats['wallet'], 0, 20) ?>...</td>
                            </tr>
                        <?php 
                            $rank++;
                        endforeach; 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <h3>How to Forward Payments</h3>
            <ol>
                <li>Click <strong>"Forward"</strong> next to a payment</li>
                <li>A popup shows the exact amount to send (after 0.07% service fee deduction)</li>
                <li>Send the displayed amount to the merchant's wallet via Phantom</li>
                <li>Click OK to mark as processed</li>
                <li>The service fee automatically remains in your system wallet</li>
            </ol>
            <div class="instructions">
                <strong>Fee Structure:</strong> 0.07% service fee on all transactions. Example: 10 SOL payment → Merchant receives 9.993 SOL → Service fee: 0.007 SOL
            </div>
        </div>
    </div>
</body>
</html>