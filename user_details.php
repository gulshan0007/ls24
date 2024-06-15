<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Learners' Space | User Details</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <?php require 'head_links.php';?>
    </head>



    <body>

        <?php 
        	require 'navbar.php';
        	require 'functions.php';
        ?>

        
        <?php
            session_start();
            echo '
                <div class="mt-5 p-5 container">
                    <div class="card">
                        <h3 class="mt-3 text-center"><span class="text-success">Name: </span>'.$_SESSION['name'].'</h3>
                        <h3 class="mt-3 text-center"><span class="text-success">Roll Number: </span>'.$_SESSION['rollno'].'</h3>
                        <h3 class="mt-3 text-center"><span class="text-success">LDAP: </span>'.$_SESSION['ldap'].'</h3>
                        
                    </div>
                    <button class="btn btn-outline-success mx-1 my-md-0 my-1 mt-5 float-left" onclick="goBack()">Go Back</button>
                </div>
            ';
        ?>

        

        <script>
        function goBack() {
        window.history.back();
        }
        </script>
        
            
        <?php require "footer.php" ?>

    </body>

</html>