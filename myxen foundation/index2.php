<?php
// ─────────────────────────────────────────────
// MyXenPay main index.php  (drop into /public_html)
// ─────────────────────────────────────────────

// optional include if you have core/config.php
if (file_exists(__DIR__ . '/core/config.php')) {
    include_once __DIR__ . '/core/config.php';
}

function safe_include($path) {
    $full = __DIR__ . '/' . ltrim($path, '/');
    if (file_exists($full)) include $full;
    else echo "<!-- missing: {$path} -->";
}

// map ?page= routes → your module files
$map = [
  'home'        => 'modules/home.php',
  'presale'     => 'modules/presale.php',
  'visa'        => 'modules/visa-virtual-card.php',
  'university'  => 'modules/university.php',
  'travel'      => 'modules/travel.php',
  'work'        => 'modules/work.php',
  'store'       => 'modules/store.php',
  'merchant'    => 'modules/merchants.php',
  'payroll'     => 'modules/streaming-payroll.php',
  'support'     => 'modules/support.php',
  'login'       => 'modules/auth/login.php',
  'profile'     => 'modules/auth/profile.php'
];
$page = $_GET['page'] ?? 'home';
$include = $map[$page] ?? $map['home'];

// social links (used below and for JSON-LD)
$social = [
  "website"=>"https://myxenpay.finance",
  "twitter"=>"https://x.com/myxenpay",
  "telegram"=>"https://t.me/myxenpay",
  "github"=>"https://github.com/bikkhoto/myxenpay.finance",
  "whitepaper"=>"https://myxenpay.finance/whitepaper.php",
  "reddit"=>"https://www.reddit.com/user/MyXen_Inc/",
  "medium"=>"https://medium.com/@myxeninc",
  "instagram"=>"https://www.instagram.com/myxenp_inc/",
  "facebook"=>"https://www.facebook.com/myxen.foundation/"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>MyXenPay — Gateway to Digital Freedom</title>

  <!-- Verification tags -->
  <meta name="openai-domain-verification" content="dv-QHb0Ph0nZDQ3fFInGfP8HaLG" />
  <meta name="facebook-domain-verification" content="l4cne9g5tshvb2zk4awtvnsy19vllz" />

  <!-- SEO -->
  <meta name="description" content="MyXen Foundation — $MYXN payments, Visa Card, travel, university onboarding, freelance marketplace and more.">
  <meta name="keywords" content="MyXenPay, MYXN, blockchain payments, Visa Card, crypto university, freelance, payroll, merchant gateway">
  <meta name="theme-color" content="#0a84ff">

  <!-- Open Graph -->
  <meta property="og:title" content="MyXenPay — Gateway to Digital Freedom">
  <meta property="og:description" content="$MYXN ecosystem for payments, Visa Card, travel, work and education.">
  <meta property="og:image" content="https://myxenpay.finance/assets/images/og-home.jpg">
  <meta property="og:url" content="https://myxenpay.finance/">

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-KVWK4RJ2QN"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-KVWK4RJ2QN');
  </script>

  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="favicon.png" type="image/png">
  <style>
    body{margin:0;font-family:system-ui,-apple-system,Segoe UI,Roboto,sans-serif;background:#fff;color:#111}
    header,footer{width:100%;background:#fff;box-shadow:0 1px 4px rgba(0,0,0,.08)}
    .mx-container{max-width:1200px;margin:auto;padding:10px 20px}
    .mx-header{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap}
    .mx-logo img{height:46px}
    nav a{margin:0 8px;text-decoration:none;color:#0a84ff;font-weight:500}
    nav a:hover{color:#0056b3}
    main{min-height:70vh;padding:20px}
    footer{text-align:center;font-size:14px;padding:15px 10px;background:#fafafa;color:#555}
    @media(max-width:720px){
      nav{width:100%;margin-top:10px;text-align:center}
      nav a{display:inline-block;margin:5px 10px}
    }
  </style>
</head>
<body>

<header>
  <div class="mx-container mx-header">
    <div class="mx-logo">
      <a href="/"><img src="assets/images/myxenpay-logo-light.png" alt="MyXenPay"></a>
    </div>
    <nav aria-label="Main navigation">
      <a href="/?page=home">Home</a>
      <a href="/?page=presale">Pre-Sale</a>
      <a href="/?page=visa">Visa Card</a>
      <a href="/?page=university">University</a>
      <a href="/?page=travel">Travel</a>
      <a href="/?page=work">Freelance</a>
      <a href="/?page=store">Store</a>
      <a href="/?page=merchant">Merchants</a>
      <a href="/?page=payroll">Payroll</a>
      <a href="/?page=support">Support</a>
      <a href="/?page=login">Login</a>
    </nav>
  </div>
</header>

<main>
  <?php safe_include($include); ?>
</main>

<footer>
  <div>
    <a href="<?=htmlspecialchars($social['whitepaper'])?>">Whitepaper</a> |
    <a href="<?=htmlspecialchars($social['github'])?>">GitHub</a> |
    <a href="<?=htmlspecialchars($social['twitter'])?>">X</a>
  </div>
  <div style="margin-top:6px;">© <?=date('Y')?> MyXen Foundation</div>
</footer>

<!-- Structured data -->
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"Organization",
  "name":"MyXen Foundation",
  "url":"https://myxenpay.finance",
  "sameAs":[
    "<?=htmlspecialchars($social['twitter'])?>",
    "<?=htmlspecialchars($social['telegram'])?>",
    "<?=htmlspecialchars($social['github'])?>",
    "<?=htmlspecialchars($social['facebook'])?>",
    "<?=htmlspecialchars($social['instagram'])?>"
  ]
}
</script>

<script src="script.js"></script>
</body>
</html>
