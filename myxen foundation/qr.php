<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Generate Payment QR | MyXenPay</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
  margin:0;
  background: radial-gradient(circle at top right,#000000 0%,#05070b 100%);
  font-family:"Inter",sans-serif;
  color:#e9f4ff;
  min-height:100vh;
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:center;
}
.navbar {
  width:100%;
  background:rgba(15,20,25,0.6);
  backdrop-filter:blur(12px);
  border-bottom:1px solid rgba(0,255,255,0.08);
  position:fixed;
  top:0;
  z-index:10;
}
.navbar-brand img {
  height:36px;
}
.navbar a {
  color:#9feeff;
  font-size:0.9rem;
  text-decoration:none;
  margin-left:18px;
}
.navbar a:hover {
  color:#00d4ff;
}
.main {
  margin-top:120px;
  width:100%;
  display:flex;
  justify-content:center;
}
.card {
  background:rgba(20,20,25,0.75);
  border-radius:16px;
  box-shadow:0 0 25px rgba(0,255,255,0.05);
  border:1px solid rgba(0,255,255,0.1);
  max-width:500px;
  width:90%;
  color:#d9f7ff;
  text-align:center;
  padding:30px;
}
.btn-primary {
  background:linear-gradient(90deg,#00c6ff,#0072ff);
  border:none;
  font-weight:500;
  transition:all .2s;
}
.btn-primary:hover {
  transform:translateY(-1px);
  box-shadow:0 0 12px rgba(0,255,255,0.4);
}
.qr-box {
  display:none;
  animation:fadeIn .6s ease forwards;
}
.qr-box.show {display:block;}
@keyframes fadeIn {
  from {opacity:0;transform:scale(0.9);}
  to {opacity:1;transform:scale(1);}
}
.qr-image {
  width:230px;
  margin:20px auto;
  display:block;
  border-radius:10px;
  box-shadow:0 0 20px rgba(0,255,255,0.15);
}
small{color:#9fbccd;}
</style>
</head>
<body>

<nav class="navbar navbar-expand-md px-4">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="/">
      <img src="/assets/images/MyXenpay_logo.png" alt="MyXenPay">
    </a>
    <div class="d-flex ms-auto">
      <a href="/">Home</a>
      <a href="/merchant/dashboard.php">Merchant</a>
      <a href="/qr.php">QR Payment</a>
      <a href="/presale.php">Pre-sale</a>
      <a href="/tokenomics.php">Tokenomics</a>
      <a href="/whitepaper.pdf" target="_blank">Whitepaper</a>
      <a href="/payroll.php">Payroll</a>
      <a href="/signup.php">Signup</a>
    </div>
  </div>
</nav>

<div class="main">
  <div class="card">
    <h3 class="fw-semibold text-cyan mb-3">Generate Payment QR</h3>
    <p><small>Instant crypto & fiat QR for merchant checkout</small></p>

    <form id="qrForm" class="text-start mt-4">
      <div class="mb-3">
        <label class="form-label">Merchant ID</label>
        <input type="number" name="merchant_id" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Amount</label>
        <input type="number" name="amount" step="0.01" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100 mt-2">Generate</button>
    </form>

    <div id="qrResult" class="qr-box mt-4">
      <h5 class="fw-normal mb-3">QR Code Generated</h5>
      <img id="qrImage" src="" alt="QR" class="qr-image">
      <p><strong>Platform Fee:</strong> $<span id="fee"></span></p>
      <p><strong>Total Amount:</strong> $<span id="total"></span></p>
    </div>
  </div>
</div>

<script>
document.getElementById('qrForm').addEventListener('submit', async e=>{
  e.preventDefault();
  const res = await fetch('qr.php',{method:'POST',body:new FormData(e.target)});
  const data = await res.json();
  if(data.status==='success'){
    document.getElementById('qrImage').src = data.qr;
    document.getElementById('fee').textContent = data.fee.toFixed(2);
    document.getElementById('total').textContent = data.total.toFixed(2);
    document.getElementById('qrResult').classList.add('show');
  } else {
    alert('QR generation failed.');
  }
});
</script>
</body>
</html>
