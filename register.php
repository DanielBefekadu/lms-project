<?php
require_once('config/db_config.php');

// Collect form data
$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$gender    = $_POST['gender'];
$dob       = $_POST['dob'];

// Secure password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$check_email = $conn->prepare("SELECT email FROM students WHERE email = ?");
$check_email->bind_param("s", $email);
$check_email->execute();
$check_email->store_result();

if ($check_email->num_rows > 0) {
    echo "<div style='text-align:center; margin-top:50px; font-family:Poppins, sans-serif;'>
      <h2 style='color:orange;'>⚠️ Email Already Registered!</h2>
      <p>The email <strong>$email</strong> is already associated with another account.</p>
      <a href='index.html' style='display:inline-block; margin-top:15px; text-decoration:none; background:#4b6cb7; color:white; padding:10px 20px; border-radius:6px;'>Try Again</a>
    </div>";
    $check_email->close();
    $conn->close();
    exit;
}
$check_email->close();

// Generate verification token
$token = random_int(100000, 999999);
$email_verified = 0;

// Insert user into database
$stmt = $conn->prepare("INSERT INTO students (firstname, lastname, email, password, gender, dob, email_verified, token) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssis", $firstname, $lastname, $email, $hashed_password, $gender, $dob, $email_verified, $token);

if ($stmt->execute()) {
    // Send verification email
    $subject = "RITA Africa LMS - Verify Your Email";
    $verifyLink = "https://yourdomain.com/verify_email.php?token=$token";
    $message = "Hi $firstname,\n\nThank you for registering. Please verify your email using this code: $token\nOr click the link: $verifyLink\n\nRITA Africa LMS";
    $headers = "From: noreply@yourdaomain.com\r\n";

    @mail($email, $subject, $message, $headers);

    echo "<div style='text-align:center; margin-top:50px; font-family:Poppins, sans-serif;'>
      <h2 style='color:green;'>✅ Registration Successful!</h2>
      <p>Welcome, <strong>$firstname $lastname</strong>.<br>Please check your email to verify your account.</p>
      <a href='verify_email.php' style='display:inline-block; margin-top:15px; text-decoration:none; background:#4b6cb7; color:white; padding:10px 20px; border-radius:6px;'>Verify Email</a>
    </div>";
} else {
    echo "<div style='text-align:center; margin-top:50px; font-family:Poppins, sans-serif;'>
      <h2 style='color:red;'>❌ Error:</h2>
      <p>" . $stmt->error . "</p>
      <a href='index.html' style='display:inline-block; margin-top:15px; text-decoration:none; background:#4b6cb7; color:white; padding:10px 20px; border-radius:6px;'>Try Again</a>
    </div>";
}

$stmt->close();
$conn->close();
?>
