<?php
// Merchant Signup — MyXenPay
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once __DIR__.'/includes/db.php';

$msg='';

if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=trim($_POST['name']);
  $email=trim($_POST['email']);
  $wallet=trim($_POST['receiving_wallet']);
  $pass=$_POST['password'];
  $kyc=$_FILES['kyc_doc']??null;

  if($name&&$email&&$wallet&&$pass&&$kyc&&$kyc['tmp_name']){
    $ext=pathinfo($kyc['name'],PATHINFO_EXTENSION);
    $newFile='kyc_'.uniqid().'.'.strtolower($ext);
    $targetDir=__DIR__.'/assets/kyc/';
    if(!is_dir($targetDir)) mkdir($targetDir,0775,true);
    move_uploaded_file($kyc['tmp_name'],$targetDir.$newFile);

    $hash=password_hash($pass,PASSWORD_DEFAULT);
    $stmt=$conn->prepare("INSERT INTO merchants (name,email,receiving_wallet,password_hash,kyc_doc,kyc_status)
                          VALUES (?,?,?,?,?,'pending')");
    $stmt->bind_param("sssss",$name,$email,$wallet,$hash,$newFile);
    if($stmt->execute()){
      $msg="<div class='alert alert-success mt-3'>Signup successful! Your KYC is under review.</div>";
    }else{
      $msg="<div class='alert alert-danger mt-3'>Email already exists or database error.</div>";
    }
  }else{
    $msg="<div class='alert alert-warning mt-3'>All fields are required.</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Merchant Signup | MyXenPay</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/png" href="/myxenpay-logo-light.png">
<style>
body{font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Arial,sans-serif;background:var(--bg,#fff);color:var(--text,#111);}
.container{max-width:520px;margin-top:140px;}
.card{border:none;border-radius:16px;box-shadow:0 10px 25px rgba(0,0,0,0.05);padding:2rem;background:var(--card-bg,rgba(255,255,255,0.8));}
</style>
</head>
<body data-theme="light">
<header class="site-header" style="position:fixed;top:0;width:100%;background:rgba(255,255,255,0.9);backdrop-filter:blur(20px);border-bottom:1px solid #eee;z-index:10;">
  <div class="d-flex justify-content-between align-items-center px-4 py-2">
    <a href="index.php"><img id="theme-logo" src="myxenpay-logo-light.png" alt="MyXenPay" style="height:34px"></a>
    <div>
      <a href="login.php" class="btn btn-sm btn-outline-primary">Login</a>
    </div>
  </div>
</header>

<div class="container">
  <div class="card">
    <h3 class="text-center mb-3 fw-semibold">Merchant Signup</h3>
    <p class="text-center text-muted mb-4">Register your business and complete KYC to access the merchant dashboard.</p>
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Business / Merchant Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Solana Receiving Wallet</label>
        <input type="text" name="receiving_wallet" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Upload KYC Document (PDF/JPG/PNG)</label>
        <input type="file" name="kyc_doc" accept=".pdf,.jpg,.jpeg,.png" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Sign Up</button>
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
