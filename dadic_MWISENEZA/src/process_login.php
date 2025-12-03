<?php
// src/process_login.php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php'); exit;
}

$email = trim($_POST['email'] ?? '');
$pw = $_POST['password'] ?? '';

if (!$email || !$pw) {
    $_SESSION['error'] = 'Email and password required';
    header('Location: login.php'); exit;
}

$conn = get_db_connection();
$stmt = $conn->prepare("SELECT user_id,user_firstname,user_password FROM tbl_users WHERE user_email = ?");
$stmt->bind_param('s',$email);
$stmt->execute();
$stmt->bind_result($uid, $fname, $pw_hash);
if ($stmt->fetch()) {
    if (password_verify($pw, $pw_hash)) {
        // logged in
        $_SESSION['user_id'] = $uid;
        $_SESSION['user_firstname'] = $fname;
        $stmt->close(); $conn->close();
        header('Location: home.php'); // Step 11.B
        exit;
    } else {
        $_SESSION['error'] = 'Invalid credentials';
    }
} else {
    $_SESSION['error'] = 'No account with that email';
}
$stmt->close(); $conn->close();
header('Location: login.php'); exit;
