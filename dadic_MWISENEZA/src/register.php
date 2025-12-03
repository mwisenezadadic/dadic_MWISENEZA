<?php
// src/register.php
session_start();
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Register - ShareRide</title></head>
<body>
  <h2>Register</h2>
  <?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red;"><?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></p>
  <?php endif; ?>
  <form action="process_register.php" method="post">
    <label>First name: <input name="firstname" required></label><br>
    <label>Last name: <input name="lastname" required></label><br>
    <label>Gender:
      <select name="gender" required>
        <option value="">--Select--</option>
        <option>Male</option><option>Female</option><option>Other</option>
      </select>
    </label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <button type="submit">Register</button>
  </form>
  <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>
