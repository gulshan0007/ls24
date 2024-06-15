<?php
                            session_start();require 'functions.php';
    if (!isset($_SESSION['ldap'])){
        header("Location: index.php");
        exit();
    }
    if (isset($_SESSION['ldap']) && (!isset($_SESSION['gmail']) || !$_SESSION['phno'])) {
        header("Location: fill_details.php");
        exit();
    }
                             // if(array_key_exists('remove_from_cart_'.$course_code, $_POST)) {
                               // removeFromReg($_GET['code'], $_GET['ldap']);
                             registerCourse(
                    $_SESSION['name'], $_SESSION['ldap'], $_SESSION['rollno'],
                    $_SESSION['email'], $_SESSION['gmail'], $_SESSION['phno'],
                    $_GET['cname'], $_GET['code']
                );
                             // // echo "<script type='text/javascript'>window.location.reload()</script>";
                            //  echo "hi";
                            // header("Location: registrations.php");
                             // // header('Location: '.$_SERVER['REQUEST_URI']);
                             // }
                           ?>