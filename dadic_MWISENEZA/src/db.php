<?php 
// src/db.php
function get_db_connection() {
    $db_host = getenv('DB_HOST') ?: '127.0.0.1';
    $db_user = getenv('DB_USER') ?: 'root';
    $db_pass = getenv('DB_PASSWORD') ?: 'rootpassword';
    $db_name = getenv('DB_NAME') ?: '25rp19025_shareride_db';
    $db_port = getenv('DB_PORT') ?: '3306';

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, (int)$db_port);
    if ($conn->connect_error) {
        die('DB connect error: ' . $conn->connect_error);
    }
    return $conn;
}
