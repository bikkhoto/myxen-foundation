<?php
// Merchant Login — MyXenPay
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once __DIR__.'/includes/db.php';
session_start();

$msg='';

if($_SERVER['REQUEST_METHOD']==='POST'){
  $email=trim($_POST['email']);
  $pass=$_POST['password'];

  $stmt=$conn->prepare("SELECT id,name,password_hash,kyc_status FROM merchants WHERE email=? LIMIT 1");
  $stmt->bind_param("s",$email);
  $stmt->execute();
  $res=$stmt->get_result();
  $user=$res->fetch_assoc();

  if($user && password_verify($pass,$user['password_hash'])){
    if($user['kyc_status']==='verified'){
      $_SESSION['merchant_id']=$user['id'];
      $_SESSION['merchant_name']=$user['name'];
      header("Location: merchant-dashboard.php");
      exit;
    }else{
      $msg="<div class='alert alert-warning mt-3'>Your KYC verification is still pending.</div>";
    }
  }else{
    $msg="<div class='alert alert-danger mt-3'>Invalid email or password.</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Merchant Login | MyXenPay</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/png" href="/myxenpay-logo-light.png">
<style>
body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Arial,sans-serif;background:var(--bg,#fff);color:var(--text,#111);}
.container{max-width:420px;margin-top:160px;}
.card{border:none;border-radius:16px;box-shadow:0 10px 25px rgba(0,0,0,0.05);padding:2rem;background:var(--card-bg,rgba(255,255,255,0.8));}
</style>
</head>
<body data-theme="light">
<header class="site-header" style="position:fixed;top:0;width:100%;background:rgba(255,255,255,0.9);backdrop-filter:blur(20px);border-bottom:1px solid #eee;z-index:10;">
  <div class="d-flex justify-content-between align-items-center px-4 py-2">
    <a href="index.php"><img id="theme-logo" src="myxenpay-logo-light.png" alt="MyXenPay" style="height:34px"></a>
    <div>
      <a href="signup.php" class="btn btn-sm btn-outline-primary">Signup</a>
    </div>
  </div>
</header>

<div class="container">
  <div class="card">
    <h3 class="text-center mb-3 fw-semibold">Merchant Login</h3>
    <p class="text-center text-muted mb-4">Access your MyXenPay Merchant Dashboard.</p>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
      <?= $msg ?>
    </form>
  </div>
</div>

<script>
const toggle=document.createElement('button');toggle.id='theme-toggle';toggle.textContent='☀️';toggle.style.position='fixed';toggle.style.bottom='20px';toggle.style.right='20px';
document.body.appendChild(toggle);
toggle.addEventListener('click',()=>{const cur=document.body.getAttribute('data-theme');const n=cur==='dark'?'light':'dark';document.body.setAttribute('data-theme',n);document.getElementById('theme-logo').src=n==='dark'?'myxenpay-logo-dark.png':'myxenpay-logo-light.png';toggle.textContent=n==='dark'?'🌙':'☀️';});
</script>
</body>
</html>
