<?php
// src/process_register.php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php'); exit;
}

$fn = trim($_POST['firstname'] ?? '');
$ln = trim($_POST['lastname'] ?? '');
$gender = trim($_POST['gender'] ?? '');
$email = trim($_POST['email'] ?? '');
$pw = $_POST['password'] ?? '';

if (!$fn || !$ln || !$gender || !$email || !$pw) {
    $_SESSION['error'] = 'All fields are required.';
    header('Location: register.php'); exit;
}

$conn = get_db_connection();

// check existing email
$stmt = $conn->prepare("SELECT user_id FROM tbl_users WHERE user_email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->close();
    $conn->close();
    $_SESSION['error'] = 'Email already registered.';
    header('Location: register.php'); exit;
}
$stmt->close();

$pw_hash = password_hash($pw, PASSWORD_DEFAULT);
$ins = $conn->prepare("INSERT INTO tbl_users (user_firstname,user_lastname,user_gender,user_email,user_password) VALUES (?,?,?,?,?)");
$ins->bind_param('sssss', $fn, $ln, $gender, $email, $pw_hash);
if ($ins->execute()) {
    $ins->close();
    $conn->close();
    header('Location: login.php'); // step 10.B
    exit;
} else {
    $ins->close();
    $conn->close();
    $_SESSION['error'] = 'Registration failed.';
    header('Location: register.php'); exit;
}
