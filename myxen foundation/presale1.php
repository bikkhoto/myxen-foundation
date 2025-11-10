<?php
require_once __DIR__ . '/includes/db.php';
header("Content-Type: text/html; charset=utf-8");

// ===== CONFIGURATION (MATCHED TO YOUR FRONTEND) =====
$TREASURY = '6S4eDdYXABgtmuk3waLM63U2KHgExcD9mco7MuyG9f5G';
$MIN_USD = 25;
$MAX_USD = 2000;
$UNLOCK_START = '2026-01-01';
$UNLOCK_RATE = 5;
$PHASES = [
  ['phase'=>1,'range'=>'0-25M','price'=>0.0001],
  ['phase'=>2,'range'=>'25M-100M','price'=>0.0005],
  ['phase'=>3,'range'=>'100M-150M','price'=>0.0010],
  ['phase'=>4,'range'=>'150M-200M','price'=>0.0020],
  ['phase'=>5,'range'=>'200M-250M','price'=>0.0030],
  ['phase'=>6,'range'=>'250M-300M','price'=>0.0050]
];

// ===== UTILITIES =====
function solPrice() {
  $r = @file_get_contents('https://api.coingecko.com/api/v3/simple/price?ids=solana&vs_currencies=usd');
  return $r ? (json_decode($r,true)['solana']['usd'] ?? null) : null;
}
function rpc($payload){
  $ch=curl_init('https://api.mainnet-beta.solana.com');
  curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>1,
  CURLOPT_POSTFIELDS=>json_encode($payload),
  CURLOPT_HTTPHEADER=>['Content-Type: application/json']]);
  $r=curl_exec($ch);curl_close($ch);
  return json_decode($r,true);
}

// ===== PROCESSING =====
$message=''; $error='';
if($_SERVER['REQUEST_METHOD']==='POST' && ($_POST['step']??'')==='submit_tx'){
  $sig=trim($_POST['signature']??'');
  $wallet=trim($_POST['buyer_wallet']??'');
  $phaseIndex=intval($_POST['phase']??0);

  if(!$sig||!$wallet) $error='Missing wallet or transaction signature.';
  elseif(!isset($PHASES[$phaseIndex])) $error='Invalid presale phase.';
  else {
    $sol_usd=solPrice();
    if(!$sol_usd) $error='Failed to fetch SOL price.';
    else {
      $r=rpc(["jsonrpc"=>"2.0","id"=>1,"method"=>"getTransaction","params"=>[$sig,"jsonParsed"]]);
      if(!isset($r['result']['meta'])) $error='Transaction not found on Solana.';
      else {
        $meta=$r['result']['meta'];
        $keys=array_map(fn($k)=>$k['pubkey'],$r['result']['transaction']['message']['accountKeys']);
        $i=array_search($TREASURY,$keys);
        if($i===false) $error='Treasury wallet not found in transaction.';
        else {
          $pre=$meta['preBalances'][$i]??0; $post=$meta['postBalances'][$i]??0;
          $lam=$post-$pre; if($lam<=0) $error='No SOL received by treasury.';
          else {
            $sol=$lam/1_000_000_000; $usd=$sol*$sol_usd;
            if($usd<$MIN_USD) $error="Below minimum of $$MIN_USD";
            elseif($usd>$MAX_USD) $error="Exceeds maximum of $$MAX_USD";
            else {
              $price=$PHASES[$phaseIndex]['price'];
              $tokens=$usd/$price;

              $stmt=$conn->prepare("SELECT id FROM vesting_schedule WHERE wallet_address=? AND start_date=?");
              $stmt->bind_param("ss",$wallet,$UNLOCK_START);
              $stmt->execute();$stmt->store_result();
              if($stmt->num_rows>0) $error='This wallet already registered.';
              else {
                $q=$conn->prepare("INSERT INTO vesting_schedule(wallet_address,total_tokens,claimed_tokens,start_date,unlock_rate,created_at)
                  VALUES(?, ?, 0, ?, ?, NOW())");
                $q->bind_param("sdss",$wallet,$tokens,$UNLOCK_START,$UNLOCK_RATE);
                if($q->execute())
                  $message="✅ Verified transaction.<br><strong>".number_format($tokens,2)." MYXN</strong> allocated (≈$".number_format($usd,2).")";
                else $error='Database error saving record.';
              }
            }
          }
        }
      }
    }
  }
}
?>
<!doctype html><html lang="en"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>MyXenPay Global Presale</title>
<style>
body{background:#000;color:#fff;font-family:system-ui,sans-serif;margin:0;text-align:center;line-height:1.6}
.container{max-width:900px;margin:0 auto;padding:2rem}
input,select{width:100%;padding:1rem;border-radius:10px;margin:.5rem 0;border:1px solid #333;background:#111;color:#fff}
.btn{background:#007aff;color:#fff;padding:1rem 2rem;border:none;border-radius:10px;cursor:pointer}
.btn:hover{background:#0a84ff}
.msg{background:#111;border-radius:12px;padding:1rem;margin:1rem 0}
.err{background:#310;border:1px solid #f44;color:#f66}
.ok{background:#021;border:1px solid #0f0;color:#0f0}
table{width:100%;border-collapse:collapse;margin-top:1rem}
th,td{padding:10px;border-bottom:1px solid #222}
th{color:#0af}
</style>
</head><body>
<div class="container">
  <h1>🔥 MyXenPay Global Presale</h1>
  <p>Send SOL to the treasury wallet below and paste your transaction signature.</p>
  <code style="background:#111;padding:10px 20px;border-radius:8px;display:inline-block;"><?php echo $TREASURY;?></code>

  <?php if($error):?><div class="msg err"><?php echo $error;?></div><?php endif;?>
  <?php if($message):?><div class="msg ok"><?php echo $message;?></div><?php endif;?>

  <form method="post" style="margin-top:2rem">
    <input type="hidden" name="step" value="submit_tx">
    <input name="buyer_wallet" placeholder="Your Solana wallet" required>
    <input name="signature" placeholder="Transaction signature" required>
    <select name="phase">
      <?php foreach($PHASES as $i=>$p):?>
        <option value="<?php echo $i;?>">Phase <?php echo $p['phase'];?> — $<?php echo number_format($p['price'],4);?> / MYXN</option>
      <?php endforeach;?>
    </select>
    <button class="btn">Verify Transaction</button>
  </form>

  <h2 style="margin-top:3rem">Presale Rules</h2>
  <ul style="list-style:disc;text-align:left;max-width:600px;margin:1rem auto">
    <li>Accepts <strong>SOL</strong> only.</li>
    <li>Minimum $<?php echo $MIN_USD;?>, maximum $<?php echo $MAX_USD;?> per wallet.</li>
    <li>6 Phases, total 300M MYXN presale supply.</li>
    <li>Unlocks on <strong><?php echo $UNLOCK_START;?></strong> — 5% daily vesting.</li>
  </ul>

  <h2>Presale Phases</h2>
  <table>
    <tr><th>Phase</th><th>Token Range</th><th>Price (USD)</th></tr>
    <?php foreach($PHASES as $p):?>
      <tr><td><?php echo $p['phase'];?></td><td><?php echo $p['range'];?></td><td>$<?php echo number_format($p['price'],4);?></td></tr>
    <?php endforeach;?>
  </table>
</div>
</body></html>
