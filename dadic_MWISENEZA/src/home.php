<?php
// src/home.php
session_start();
if (empty($_SESSION['user_id'])) {
    // Step 11.C: redirect to index where login/register available
    header('Location: index.php'); exit;
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Home</title></head>
<body>
  <h2>Well logged in</h2>
  <p>Welcome, <?php echo htmlspecialchars($_SESSION['user_firstname']); ?>!</p>
  <p><a href="index.php">Back to index</a></p>
</body>
</html>
