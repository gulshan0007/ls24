<?php
                            session_start();require 'functions.php';
    if (!isset($_SESSION['loggedin'])){
        header("Location: index.php");
        exit();
    }
    
                             // if(array_key_exists('remove_from_cart_'.$course_code, $_POST)) {
                               removeFromCart($_GET['code'], $_GET['email']);
                             // // echo "<script type='text/javascript'>window.location.reload()</script>";
                             echo "hi";
                            header("Location: cart.php");
                             // // header('Location: '.$_SERVER['REQUEST_URI']);
                             // }
                           ?>