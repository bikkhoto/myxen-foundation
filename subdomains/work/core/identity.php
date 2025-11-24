<?php
// Lightweight Identity / SSO core
session_start();
$secret = 'MYXEN_JWT_SECRET'; // change later to strong key

function issueToken($user) {
  global $secret;
  $payload = base64_encode(json_encode(['uid'=>$user['id'],'email'=>$user['email'],'ts'=>time()]));
  $sig = hash_hmac('sha256',$payload,$secret);
  return $payload.'.'.$sig;
}
function verifyToken($token){
  global $secret;
  [$payload,$sig] = explode('.',$token);
  return hash_hmac('sha256',$payload,$secret)===$sig ? json_decode(base64_decode($payload),true) : false;
}
function loginUser($user){
  $_SESSION['uid']=$user['id'];
  $_SESSION['email']=$user['email'];
  $_SESSION['jwt']=issueToken($user);
}
function logoutUser(){
  session_destroy();
  setcookie('myxen_auth','',time()-3600,'/');
}
function requireLogin(){
  if(empty($_SESSION['uid'])){
    header("Location: /?page=login");
    exit;
  }
}
?>
