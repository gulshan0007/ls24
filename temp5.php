<?php
                            session_start();require 'functions.php';
    // if (!isset($_SESSION['ldap'])){
    //     header("Location: index.php");
    //     exit();
    // }
    session_unset();
                        session_destroy();
            // Redirect to main page
            
            header("Location: https://gymkhana.iitb.ac.in/profiles/user");
            echo "<script> window.open('index.php');</script>";

            exit();
                             // if(array_key_exists('remove_from_cart_'.$course_code, $_POST)) {
                               // removeFromReg($_GET['code'], $_GET['ldap']);
                                 // // echo "<script type='text/javascript'>window.location.reload()</script>";
                            //  echo "hi";
                            // header("Location: registrations.php");
                             // // header('Location: '.$_SERVER['REQUEST_URI']);
                             // }
                           ?>