<?php
// src/login.php
session_start();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Login - ShareRide</title></head>
<body>
  <h2>Login</h2>
  <?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red;"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></p>
  <?php endif; ?>
  <form action="process_login.php" method="post">
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <button type="submit">Login</button>
  </form>
  <p>Don't have an account? <a href="register.php">Register</a></p>
</body>
</html>
