<?php
require_once __DIR__ . '/config/db_config.php';
session_start();

// Enable error reporting (for debugging)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// When user clicks the verification link
if (isset($_GET['token'])) {
    $token = trim($_GET['token']);

    $stmt = $conn->prepare("SELECT * FROM students WHERE token = ? LIMIT 1");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $update = $conn->prepare("UPDATE students SET email_verified = 1, token = NULL WHERE token = ?");
        $update->bind_param("s", $token);
        $update->execute();

        echo "<script>
                alert('✅ Email verified successfully! You can now log in.');
                window.location='login.html';
              </script>";
        exit;
    } else {
        echo "<script>
                alert('Invalid or expired verification link.');
                window.location='register.html';
              </script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Email Verification</title>
  <link rel="stylesheet" href="assets/css/login.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <div class="login-card">
      <h2>📧 Verify Your Email</h2>
      <p class="subtitle">
        Please check your inbox for the verification code.<br>
        If you didn’t get one, you can resend it below.
      </p>

      <form action="resend_verification.php" method="POST" class="form">
        <div class="input-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" placeholder="Enter your registered email" required />
        </div>

        <button type="submit" class="btn">Resend Verification Email</button>

        <p class="register-text">
          Already verified? <a href="login.html">Login here</a>
        </p>
      </form>
    </div>
  </div>
</body>
</html>
