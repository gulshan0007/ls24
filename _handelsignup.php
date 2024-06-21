<?php
session_start(); // Start or resume session
include 'db_connect.php';
require 'vendor/autoload.php'; // Require PHPMailer autoload

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST['signupemail'];
    $user_gmail = $_POST['signupemail'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $otp = $_POST['otp'];

    // Validate user email 
    $existSql = "SELECT * FROM `learnerspace_2024_reg` WHERE user_email='$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) {
        $showError = "User email already exists";
    } else {
        if ($password == $cpassword) {
            // Check if OTP is correct (compare with stored OTP in session)
            $stored_otp = isset($_SESSION['otp']) ? $_SESSION['otp'] : '';

            if ($otp == $stored_otp) {
                // OTP matched, proceed with registration
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $hash2 = password_hash($cpassword, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `learnerspace_2024_reg` (`user_email`,`user_gmail`, `password`, `cpassword`, `signup_time`, `course_code`, `course_name`) VALUES ('$user_email','$user_gmail', '$hash', '$hash2', current_timestamp(),'','')";
                $result = mysqli_query($conn, $sql);
                
                if ($result) {
                    $showalert = true;
                    header("location: /index.php?signupsuccess=true");
                    exit();
                } else {
                    $showError = "Database error. Please try again.";
                }
            } else {
                $showError = "Incorrect OTP entered.";
            }

        } else {
            $showError = "Password do not match";
        }
    }

    header("location: index.php?signupsuccess=false&error=$showError");
    exit();
}

// Handle OTP generation request
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['signupemail'])) {
    $signupemail = $_GET['signupemail'];
    $otp = mt_rand(100000, 999999); // Generate a random 6-digit OTP

    // Store OTP in session (in real application, store securely in database with user identifier)
    $_SESSION['otp'] = $otp;

    // Send OTP via email
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = false;
        $mail->Username = 'gulshankumar060102@gmail.com'; // SMTP username
        $mail->Password = 'tutraiufsgqfpfjf'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom('gulshankumar060102@gmail.com', 'UGAC');
        $mail->addAddress($signupemail . '@iitb.ac.in'); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'OTP for Signup';
        $mail->Body = 'Your OTP for signup is: ' . $otp;

        $mail->send();
        echo 'OTP sent to ' . $signupemail . '@iitb.ac.in';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
}
?>
