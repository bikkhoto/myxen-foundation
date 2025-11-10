<?php
// modules/auth/user-login.php
// Requires core/identity.php to be included by index.php top (session started)

$error = '';
$next = $_GET['next'] ?? '/?page=profile';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // === REPLACE with your DB auth logic ===
    // Example placeholder — replace with real DB lookup:
    // SELECT id,email,kyc_status FROM users WHERE email = ? AND password_hash = ?
    if ($email === 'admin@myxenpay.finance' && $password === 'demo123') {
        // demo user (replace with DB user record)
        $user = ['id' => 1, 'email' => $email];
        loginUser($user); // function from core/identity.php
        // redirect to where user intended to go
        header('Location: ' . $next);
        exit;
    } else {
        $error = 'Invalid credentials';
    }
}
?>
<section style="max-width:420px;margin:60px auto;padding:20px;border-radius:6px;background:rgba(0,0,0,0.02);text-align:left;">
  <h2 style="text-align:center">MyXen Sign In</h2>
  <?php if ($error): ?><p style="color:#c00;text-align:center;"><?=htmlspecialchars($error)?></p><?php endif; ?>
  <form method="post" style="display:block">
    <label>Email</label><input name="email" type="email" required style="width:100%;padding:10px;margin:6px 0">
    <label>Password</label><input name="password" type="password" required style="width:100%;padding:10px;margin:6px 0">
    <input type="hidden" name="next" value="<?=htmlspecialchars($next)?>">
    <button type="submit" style="width:100%;padding:10px;background:#0a84ff;color:#fff;border:none;border-radius:6px;margin-top:8px">Sign In</button>
  </form>
  <p style="text-align:center;margin-top:10px;font-size:13px;color:#666">Need an account? Contact support.</p>
</section>