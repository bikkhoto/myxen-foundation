<?php
// presale gate — put at the very top of modules/presale.php
// identity.php must already be included by index.php

// ensure user logged in
if (empty($_SESSION['uid'])) {
    // redirect to SSO login, return to presale afterwards
    header('Location: /?page=user-login&next=' . urlencode('/?page=presale'));
    exit;
}

// check KYC status function (implement DB check)
function isKycVerified($user_id) {
    global $db; // if you use $db in core/functions — adapt accordingly
    // Minimal example; replace with your real KYC table/column
    if (isset($db)) {
        $stmt = $db->prepare("SELECT status FROM kyc WHERE user_id = ? LIMIT 1");
        $stmt->execute([$user_id]);
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($r && ($r['status'] === 'verified' || $r['status'] === 'approved'));
    }
    // fallback: block if DB not configured
    return false;
}

$user_id = intval($_SESSION['uid']);

// if user not KYC verified
if (!isKycVerified($user_id)) {
    header('Location: /?page=support&msg=' . urlencode('Please complete KYC to participate in presale'));
    exit;
}

// continue with presale page (the rest of modules/presale.php)
?>