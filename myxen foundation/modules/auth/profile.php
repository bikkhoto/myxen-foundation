<?php
require_once __DIR__ . '/../../core/identity.php';
requireLogin();
?>
<section style="max-width:600px;margin:60px auto;text-align:center;">
  <h2>Welcome, <?=htmlspecialchars($_SESSION['email'])?></h2>
  <p>You are logged in to the MyXen ecosystem.</p>
  <form method="post" action="?logout=1">
    <button type="submit" style="padding:8px 18px;background:#ff3b30;color:#fff;border:none;border-radius:6px;">Logout</button>
  </form>
</section>
<?php
if(isset($_GET['logout'])){
  logoutUser();
  header("Location: /");
  exit;
}
?>
