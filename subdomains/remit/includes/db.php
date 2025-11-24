<?php
$host = 'localhost';
$db   = 'myxenpay__myxn';
$user = 'myxenpay_admin';
$pass = 'Nazmuzsakib01715@@##'; // replace only this
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}
?>
