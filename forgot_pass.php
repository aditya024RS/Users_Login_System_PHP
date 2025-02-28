<?php
session_start();
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/forgot.css">
    <link rel="stylesheet" href="CSS/main.css">
</head>
<body>
    <div class="wrapper-main forgot-password-main">
      <div class="container">
          <h2>Forgot Password</h2>
          <?php if (isset($error)): ?>
              <div class="error"><?php echo htmlspecialchars($error); ?></div>
          <?php endif; ?>
          <?php if (isset($success)): ?>
              <div class="success"><?php echo htmlspecialchars($success); ?></div>
              <div class="back-to-login">
                <p><a href="./index.php">Go to Login Page</a></p>
              </div>
          <?php endif; ?>
          <form action="includes/forgot_pass.inc.php" method="POST">
              <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" id="username" name="username" placeholder="Email address or phone number" autocomplete="off">
              </div>
              <div class="form-group">
                  <label for="dob">Date of Birth:</label>
                  <input type="date" id="dob" name="dob">
              </div>
              <div class="form-group">
                  <label for="new_password">New Password:</label>
                  <input type="password" id="new_password" name="new_password" placeholder="Password">
              </div>
              <button type="submit">Reset Password</button>
          </form>
      </div>
    </div>

    <?php include 'partials/footer.php';?>
</body>
</html>