<?php
require_once __DIR__ . '/config/db_config.php';
session_start();

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);

    // Check if email exists
    $stmt = $conn->prepare("SELECT firstname FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $firstname = $user['firstname'];

        // Generate new token
        $newToken = rand(100000, 999999);

        // Update token in DB
        $updateStmt = $conn->prepare("UPDATE students SET token = ? WHERE email = ?");
        $updateStmt->bind_param("ss", $newToken, $email);
        $updateStmt->execute();

        // Send email
        $verifyLink = "https://yourdomain.com/verify_email.php?token=$newToken";
        $subject = "Resend Verification - RITA Africa LMS";
        $message = "Hi $firstname,\n\nYour new verification code: $newToken\nClick to verify: $verifyLink\n\nThank you,\nRITA Africa LMS";
        $headers = "From: noreply@yourdomain.com\r\n" .
                   "Reply-To: noreply@dyourdomain.com\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        @mail($email, $subject, $message, $headers);

        echo "<script>
                alert('Verification link resent successfully. Please check your inbox.');
                window.location='verify_email.php';
              </script>";
        exit;

    } else {
        echo "<script>
                alert('Email not found. Please register first.');
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
  <title>Resend Verification</title>
  <link rel="stylesheet" href="assets/css/login.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <div class="login-card">
      <h2>📨 Resend Verification</h2>
      <p class="subtitle">
        Enter your registered email address to receive a new verification link.
      </p>

      <form action="resend_verification.php" method="POST" class="form">
        <div class="input-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required />
        </div>

        <button type="submit" class="btn">Resend Link</button>

        <p class="register-text">
          Already verified? <a href="login.html">Login here</a>
        </p>
      </form>
    </div>
  </div>
</body>
</html>
<?php
require_once __DIR__ . '/config/db_config.php';
session_start();

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);

    // Check if email exists
    $stmt = $conn->prepare("SELECT firstname FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $firstname = $user['firstname'];

        // Generate new token
        $newToken = rand(100000, 999999);

        // Update token in DB
        $updateStmt = $conn->prepare("UPDATE students SET token = ? WHERE email = ?");
        $updateStmt->bind_param("ss", $newToken, $email);
        $updateStmt->execute();

        // Send email
        $verifyLink = "https://yourdomain.com/verify_email.php?token=$newToken";
        $subject = "Resend Verification - RITA Africa LMS";
        $message = "Hi $firstname,\n\nYour new verification code: $newToken\nClick to verify: $verifyLink\n\nThank you,\nRITA Africa LMS";
        $headers = "From: noreply@yourdomain.com\r\n" .
                   "Reply-To: noreply@yourdomain.com\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        @mail($email, $subject, $message, $headers);

        echo "<script>
                alert('Verification link resent successfully. Please check your inbox.');
                window.location='verify_email.php';
              </script>";
        exit;

    } else {
        echo "<script>
                alert('Email not found. Please register first.');
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
  <title>Resend Verification</title>
  <link rel="stylesheet" href="assets/css/login.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <div class="login-card">
      <h2>📨 Resend Verification</h2>
      <p class="subtitle">
        Enter your registered email address to receive a new verification link.
      </p>

      <form action="resend_verification.php" method="POST" class="form">
        <div class="input-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required />
        </div>

        <button type="submit" class="btn">Resend Link</button>

        <p class="register-text">
          Already verified? <a href="login.html">Login here</a>
        </p>
      </form>
    </div>
  </div>
</body>
</html>
<?php
require_once __DIR__ . '/config/db_config.php';
session_start();

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);

    // Check if email exists
    $stmt = $conn->prepare("SELECT firstname FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $firstname = $user['firstname'];

        // Generate new token
        $newToken = rand(100000, 999999);

        // Update token in DB
        $updateStmt = $conn->prepare("UPDATE students SET token = ? WHERE email = ?");
        $updateStmt->bind_param("ss", $newToken, $email);
        $updateStmt->execute();

        // Send email
        $verifyLink = "https://yourdomain.com/verify_email.php?token=$newToken";
        $subject = "Resend Verification - RITA Africa LMS";
        $message = "Hi $firstname,\n\nYour new verification code: $newToken\nClick to verify: $verifyLink\n\nThank you,\nRITA Africa LMS";
        $headers = "From: noreply@yourdomain.com\r\n" .
                   "Reply-To: noreply@yourdomain.com\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        @mail($email, $subject, $message, $headers);

        echo "<script>
                alert('Verification link resent successfully. Please check your inbox.');
                window.location='verify_email.php';
              </script>";
        exit;

    } else {
        echo "<script>
                alert('Email not found. Please register first.');
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
  <title>Resend Verification</title>
  <link rel="stylesheet" href="assets/css/login.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="wrapper">
    <div class="login-card">
      <h2>📨 Resend Verification</h2>
      <p class="subtitle">
        Enter your registered email address to receive a new verification link.
      </p>

      <form action="resend_verification.php" method="POST" class="form">
        <div class="input-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required />
        </div>

        <button type="submit" class="btn">Resend Link</button>

        <p class="register-text">
          Already verified? <a href="login.html">Login here</a>
        </p>
      </form>
    </div>
  </div>
</body>
</html>
