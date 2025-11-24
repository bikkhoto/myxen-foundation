<?php
session_start();

// 🔑 CHANGE THIS PASSWORD!
$ADMIN_PASSWORD = 'Nazmuzsakib01715@@##';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    if (isset($_POST['password']) && $_POST['password'] === $ADMIN_PASSWORD) {
        $_SESSION['logged_in'] = true;
        header('Location: Payroll-admin.php');
        exit;
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>MyxenPay Payroll Admin Login</title>
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
            <h2>MyxenPay Payroll Admin</h2>
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
    header('Location: Payroll-admin.php');
    exit;
}

// Configuration
$payroll_file = __DIR__ . '/payroll_employees.json';
$payroll_history = __DIR__ . '/payroll_history.json';

// Initialize files if they don't exist
if (!file_exists($payroll_file)) {
    file_put_contents($payroll_file, json_encode([]));
}
if (!file_exists($payroll_history)) {
    file_put_contents($payroll_history, json_encode([]));
}

$employees = json_decode(file_get_contents($payroll_file), true);
$payroll_history_data = json_decode(file_get_contents($payroll_history), true);

// Handle adding employee
if (isset($_POST['add_employee'])) {
    $employee_data = [
        'id' => uniqid('EMP'),
        'name' => $_POST['name'],
        'wallet' => $_POST['wallet'],
        'salary_sol' => floatval($_POST['salary_sol']),
        'payment_schedule' => $_POST['payment_schedule'],
        'status' => 'active',
        'created_at' => date('c')
    ];
    
    $employees[] = $employee_data;
    file_put_contents($payroll_file, json_encode($employees, JSON_PRETTY_PRINT));
    $success = "Employee added successfully!";
}

// Handle payroll processing
if (isset($_POST['process_payroll'])) {
    $processed_payments = [];
    $total_amount = 0;
    
    foreach ($employees as $employee) {
        if ($employee['status'] === 'active') {
            $processed_payments[] = [
                'employee_id' => $employee['id'],
                'employee_name' => $employee['name'],
                'wallet' => $employee['wallet'],
                'amount_sol' => $employee['salary_sol'],
                'processed_at' => date('c'),
                'status' => 'pending_manual_send'
            ];
            $total_amount += $employee['salary_sol'];
        }
    }
    
    // Add to payroll history
    $payroll_run = [
        'id' => uniqid('PAYRUN'),
        'timestamp' => date('c'),
        'total_employees' => count($processed_payments),
        'total_amount_sol' => $total_amount,
        'payments' => $processed_payments
    ];
    
    $payroll_history_data[] = $payroll_run;
    file_put_contents($payroll_history, json_encode($payroll_history_data, JSON_PRETTY_PRINT));
    
    $payroll_success = "Payroll processed! Total: " . number_format($total_amount, 6) . " SOL for " . count($processed_payments) . " employees.";
}

// Handle individual payment
if (isset($_GET['pay_employee']) && isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    $employee = null;
    
    foreach ($employees as $emp) {
        if ($emp['id'] === $employee_id) {
            $employee = $emp;
            break;
        }
    }
    
    if ($employee) {
        $payment_data = [
            'employee_id' => $employee['id'],
            'employee_name' => $employee['name'],
            'wallet' => $employee['wallet'],
            'amount_sol' => $employee['salary_sol'],
            'processed_at' => date('c'),
            'status' => 'pending_manual_send'
        ];
        
        // Add to history
        $payroll_history_data[] = [
            'id' => uniqid('SINGLE'),
            'timestamp' => date('c'),
            'total_employees' => 1,
            'total_amount_sol' => $employee['salary_sol'],
            'payments' => [$payment_data]
        ];
        
        file_put_contents($payroll_history, json_encode($payroll_history_data, JSON_PRETTY_PRINT));
        $individual_success = "Payment prepared for " . $employee['name'] . " - " . number_format($employee['salary_sol'], 6) . " SOL";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Admin - MyxenPay</title>
    <style>
        :root {
            --bg: #ffffff;
            --text: #111111;
            --card-bg: rgba(255, 255, 255, 0.7);
            --border: rgba(0, 0, 0, 0.05);
            --primary: #007AFF;
            --secondary: #30D158;
            --accent: #FF9F0A;
            --header-bg: rgba(255, 255, 255, 0.8);
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }

        [data-theme="dark"] {
            --bg: #000000;
            --text: #f5f5f7;
            --card-bg: rgba(30, 30, 30, 0.7);
            --border: rgba(255, 255, 255, 0.05);
            --primary: #0A84FF;
            --secondary: #32D74B;
            --accent: #FF9F0A;
            --header-bg: rgba(0, 0, 0, 0.8);
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        body { 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; 
            background: var(--bg); 
            color: var(--text);
            padding: 20px;
            margin: 0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .container { max-width: 1200px; margin: 0 auto; }
        
        .header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 24px; 
            padding-bottom: 16px; 
            border-bottom: 1px solid var(--border); 
        }
        
        .card { 
            background: var(--card-bg); 
            padding: 24px; 
            border-radius: 16px; 
            box-shadow: var(--shadow); 
            margin-bottom: 24px; 
            border: 1px solid var(--border);
        }
        
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 16px; 
        }
        
        th, td { 
            padding: 14px 12px; 
            text-align: left; 
            border-bottom: 1px solid var(--border); 
        }
        
        th { 
            background: var(--card-bg); 
            font-weight: 600; 
            color: var(--text);
        }
        
        .btn { 
            background: var(--primary); 
            color: white; 
            border: none; 
            padding: 8px 16px; 
            border-radius: 8px; 
            text-decoration: none; 
            display: inline-block; 
            font-weight: 500; 
            cursor: pointer; 
            transition: all 0.3s ease;
        }
        
        .btn:hover { 
            background: var(--secondary); 
            transform: translateY(-2px);
        }
        
        .btn-danger { background: #FF453A; }
        .btn-success { background: var(--secondary); }
        .btn-warning { background: var(--accent); }
        
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 600; }
        .form-group input, .form-group select { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid var(--border); 
            border-radius: 8px; 
            background: var(--bg); 
            color: var(--text);
        }
        
        .alert { 
            padding: 12px 16px; 
            border-radius: 8px; 
            margin-bottom: 1rem; 
        }
        
        .alert-success { background: #30D15820; color: var(--secondary); border: 1px solid var(--secondary); }
        .alert-info { background: #007AFF20; color: var(--primary); border: 1px solid var(--primary); }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: var(--card-bg);
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
            border: 1px solid var(--border);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            display: block;
        }
        
        .logout { color: #FF453A; text-decoration: none; font-weight: 500; }
        
        .theme-btn {
            background: none;
            border: 1px solid var(--border);
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .theme-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>MyxenPay Payroll Admin</h1>
            <div style="display: flex; gap: 1rem; align-items: center;">
                <button id="theme-toggle" class="theme-btn">☀️</button>
                <a href="?logout=1" class="logout">Logout</a>
            </div>
        </div>

        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>
        
        <?php if (isset($payroll_success)): ?>
            <div class="alert alert-success"><?= $payroll_success ?></div>
        <?php endif; ?>
        
        <?php if (isset($individual_success)): ?>
            <div class="alert alert-info"><?= $individual_success ?></div>
        <?php endif; ?>

        <!-- Stats Overview -->
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-number"><?= count($employees) ?></span>
                <span>Total Employees</span>
            </div>
            <div class="stat-card">
                <span class="stat-number"><?= count(array_filter($employees, function($e) { return $e['status'] === 'active'; })) ?></span>
                <span>Active Employees</span>
            </div>
            <div class="stat-card">
                <?php
                $total_monthly = 0;
                foreach ($employees as $emp) {
                    if ($emp['status'] === 'active') {
                        $total_monthly += $emp['salary_sol'];
                    }
                }
                ?>
                <span class="stat-number"><?= number_format($total_monthly, 2) ?></span>
                <span>Monthly SOL</span>
            </div>
            <div class="stat-card">
                <span class="stat-number"><?= count($payroll_history_data) ?></span>
                <span>Payroll Runs</span>
            </div>
        </div>

        <!-- Add Employee Form -->
        <div class="card">
            <h2>Add New Employee</h2>
            <form method="post">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label>Employee Name</label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Wallet Address</label>
                        <input type="text" name="wallet" required placeholder="9WzDXwBbmkg8ZTbNMqUxvQRAyrZzDsGYdLVL9zYtAWWM">
                    </div>
                    <div class="form-group">
                        <label>Salary (SOL)</label>
                        <input type="number" step="0.001" name="salary_sol" required>
                    </div>
                    <div class="form-group">
                        <label>Payment Schedule</label>
                        <select name="payment_schedule" required>
                            <option value="monthly">Monthly</option>
                            <option value="bi-weekly">Bi-Weekly</option>
                            <option value="weekly">Weekly</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="add_employee" class="btn">Add Employee</button>
            </form>
        </div>

        <!-- Employees List -->
        <div class="card">
            <h2>Employee Management</h2>
            <?php if (empty($employees)): ?>
                <p>No employees added yet.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Wallet</th>
                            <th>Salary (SOL)</th>
                            <th>Schedule</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?= htmlspecialchars($employee['name']) ?></td>
                            <td style="font-family: monospace; font-size: 0.8em;"><?= substr($employee['wallet'], 0, 20) ?>...</td>
                            <td><?= number_format($employee['salary_sol'], 6) ?></td>
                            <td><?= $employee['payment_schedule'] ?></td>
                            <td>
                                <span style="color: <?= $employee['status'] === 'active' ? '#30D158' : '#FF453A' ?>;">
                                    <?= $employee['status'] ?>
                                </span>
                            </td>
                            <td>
                                <a href="?pay_employee=1&employee_id=<?= $employee['id'] ?>" class="btn btn-success" 
                                   onclick="return confirm('Pay <?= $employee['name'] ?> - <?= number_format($employee['salary_sol'], 6) ?> SOL?')">
                                    Pay Now
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        <!-- Payroll Processing -->
        <div class="card">
            <h2>Process Payroll</h2>
            <p>Process payroll for all active employees. This will prepare payments for manual sending via Phantom.</p>
            
            <?php
            $active_count = count(array_filter($employees, function($e) { return $e['status'] === 'active'; }));
            $total_sol = 0;
            foreach ($employees as $emp) {
                if ($emp['status'] === 'active') {
                    $total_sol += $emp['salary_sol'];
                }
            }
            ?>
            
            <div style="background: var(--card-bg); padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
                <strong>Current Payroll Summary:</strong><br>
                - Active Employees: <?= $active_count ?><br>
                - Total Amount: <?= number_format($total_sol, 6) ?> SOL
            </div>
            
            <form method="post">
                <button type="submit" name="process_payroll" class="btn btn-warning" 
                        onclick="return confirm('Process payroll for <?= $active_count ?> employees? Total: <?= number_format($total_sol, 6) ?> SOL')">
                    Process Complete Payroll
                </button>
            </form>
        </div>

        <!-- Payroll History -->
        <div class="card">
            <h2>Payroll History</h2>
            <?php if (empty($payroll_history_data)): ?>
                <p>No payroll history yet.</p>
            <?php else: ?>
                <div style="max-height: 400px; overflow-y: auto;">
                    <?php foreach (array_reverse($payroll_history_data) as $run): ?>
                        <div style="border: 1px solid var(--border); padding: 1rem; margin-bottom: 1rem; border-radius: 8px;">
                            <strong>Run ID: <?= $run['id'] ?></strong><br>
                            Date: <?= date('Y-m-d H:i', strtotime($run['timestamp'])) ?><br>
                            Employees: <?= $run['total_employees'] ?><br>
                            Total: <?= number_format($run['total_amount_sol'], 6) ?> SOL<br>
                            <button onclick="showPayrollDetails('<?= $run['id'] ?>')" class="btn">View Details</button>
                            
                            <div id="details-<?= $run['id'] ?>" style="display: none; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                                <?php foreach ($run['payments'] as $payment): ?>
                                    <div style="margin-bottom: 0.5rem;">
                                        <?= $payment['employee_name'] ?> → 
                                        <?= number_format($payment['amount_sol'], 6) ?> SOL
                                        <br>
                                        <small style="font-family: monospace;"><?= $payment['wallet'] ?></small>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Instructions -->
        <div class="card">
            <h3>How to Use Payroll System</h3>
            <ol>
                <li><strong>Add Employees</strong> - Fill in employee details and wallet addresses</li>
                <li><strong>Individual Payments</strong> - Click "Pay Now" next to any employee for immediate payment</li>
                <li><strong>Bulk Payroll</strong> - Use "Process Complete Payroll" to prepare all payments</li>
                <li><strong>Send Payments</strong> - Use Phantom wallet to send SOL to the listed wallet addresses</li>
                <li><strong>Track History</strong> - All payroll runs are recorded in history</li>
            </ol>
            
            <div style="background: #f0f9ff; padding: 1rem; border-radius: 8px; margin-top: 1rem;">
                <strong>Note:</strong> This system prepares payroll data. Actual SOL payments need to be sent manually via Phantom wallet using the wallet addresses shown.
            </div>
        </div>
    </div>

    <script>
        // Theme functionality
        function initTheme() {
            const saved = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (saved) {
                document.body.setAttribute('data-theme', saved);
                updateThemeUI(saved);
            } else if (prefersDark) {
                document.body.setAttribute('data-theme', 'dark');
                updateThemeUI('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.body.setAttribute('data-theme', 'light');
                updateThemeUI('light');
                localStorage.setItem('theme', 'light');
            }
        }

        function updateThemeUI(theme) {
            const themeBtn = document.getElementById('theme-toggle');
            if (theme === 'dark') {
                themeBtn.textContent = '🌙';
            } else {
                themeBtn.textContent = '☀️';
            }
        }

        document.getElementById('theme-toggle').addEventListener('click', () => {
            const current = document.body.getAttribute('data-theme');
            const newTheme = current === 'dark' ? 'light' : 'dark';
            
            document.body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeUI(newTheme);
        });

        // Payroll details toggle
        function showPayrollDetails(runId) {
            const details = document.getElementById('details-' + runId);
            if (details.style.display === 'none') {
                details.style.display = 'block';
            } else {
                details.style.display = 'none';
            }
        }

        // Copy protection (same as index.php)
        document.addEventListener('contextmenu', e => e.preventDefault());
        document.addEventListener('selectstart', e => e.preventDefault());
        document.addEventListener('keydown', e => {
            if (e.ctrlKey && (e.key === 'u' || e.key === 'U' || e.key === 's' || e.key === 'S')) {
                e.preventDefault();
            }
        });

        // Initialize theme
        document.addEventListener('DOMContentLoaded', initTheme);
    </script>
</body>
</html>