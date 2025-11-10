<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$email = filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL);
$notifyAtLaunch = !empty($data['notifyAtLaunch']);

if (!$email) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid email']);
    exit;
}

// Save to appropriate list
$waitlistFile = $notifyAtLaunch ? 'launch_notify.txt' : 'waitlist_emails.txt';
$emails = file_exists($waitlistFile) ? file($waitlistFile, FILE_IGNORE_NEW_LINES) : [];

if (in_array($email, $emails)) {
    echo json_encode(['success' => true, 'message' => 'Already subscribed']);
    exit;
}

file_put_contents($waitlistFile, $email . "\n", FILE_APPEND | LOCK_EX);
$message = $notifyAtLaunch 
    ? 'You’ll be notified the moment we launch on Pump.fun!' 
    : 'Thank you! You’ll be notified at launch.';
    
echo json_encode(['success' => true, 'message' => $message]);
?>