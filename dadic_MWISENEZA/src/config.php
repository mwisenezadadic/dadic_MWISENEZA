<?php
// Database configuration
$host = "localhost";
$db_name = "newvision_db";   // change to your database name
$username = "root";             // your DB username
$password = "";                 // your DB password (XAMPP is empty by default)

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);

    // Set PDO error mode
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // If connection fails, stop program and show error
    die("Database connection failed: " . $e->getMessage());
}
?>
