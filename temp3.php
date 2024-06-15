<?php
session_start();
require 'functions.php';

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
}

// Check if the required POST parameters are set
if (isset($_POST['cname'], $_POST['code'])) {
    $user_email = $_SESSION['user_email'];
    $user_gmail = $_SESSION['user_gmail'];
    $course_name = $_POST['cname'];
    $course_code = $_POST['code'];

    // Add the course to the cart
    addToCart($user_email, $user_gmail, $course_name, $course_code);

    // Redirect to the cart page
    header("Location: cart.php");
    exit();
} else {
    // Redirect to the appropriate page if the parameters are not set
    header("Location: fill_details.php");
    exit();
}
?>
