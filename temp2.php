<?php
session_start();
require 'functions.php';

if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['code']) && isset($_GET['ldap'])) {
    $course_code = $_GET['code'];
    $user_email = $_GET['ldap'];

    if (array_key_exists('remove_from_cart_' . $course_code, $_POST)) {
        removeFromReg($course_code, $user_email);
        header("Location: registrations.php");
        exit();
    }
}
?>
