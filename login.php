<?php
require_once('config/db_config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            if ($row['email_verified'] == 0) {
                echo "<script>alert('Please verify your email first.'); window.location='verify_email.php';</script>";
                exit;
            }

            $_SESSION['student_id'] = $row['sid'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['loggedin'] = true;

            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('Invalid email or password.'); window.location='login.html';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Invalid email or password.'); window.location='login.html';</script>";
        exit;
    }
}
?>
