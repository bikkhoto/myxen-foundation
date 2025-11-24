<?php
require_once __DIR__.'/../../../core/identity.php';
header('Content-Type: application/json');
$data=json_decode(file_get_contents('php://input'),true);
$email=$data['email']??'';
$pass=$data['password']??'';
if($email==='admin@myxenpay.finance' && $pass==='demo123'){
  $user=['id'=>1,'email'=>$email];
  $token=issueToken($user);
  echo json_encode(['status'=>'ok','token'=>$token]);
}else{
  http_response_code(401);
  echo json_encode(['status'=>'error','message'=>'Invalid credentials']);
}
