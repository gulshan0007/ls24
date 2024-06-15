<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Learners' Space | Contact Us</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <?php require 'head_links.php';?>
</head>

<body>

    <?php
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
        
        ?>


    <?php require "navbar.php"; ?>

    <main id="main" data-aos="fade-in">
   
        <div class="container mb-4" style="margin-top: 100px">
            <div class="card" style="background:  #ff3f81;">
                <div class="card-header text-center text-white mt-2">
                    <h2><?= stripslashes($_GET['club']) ?></h2>
                    <p>
                        Contact us for any queries or problems whatsoever!
                    </p>
                </div>
            </div>
        </div>

        <?php  
        include 'config/dbconnect.php';
        $query = "SELECT * FROM learnerspace_2023_contact WHERE club='".$_GET["club"]."'";
        $result = mysqli_query($conn, $query);
        ?>

        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <?php
                        while($row = mysqli_fetch_array($result))
                        {
                            echo '
                                <div class="col-sm-4 d-flex align-items-stretch my-3 mx-auto">
                                    
                                    <div class="card shadow p-3 mb-5 bg-body-tertiary rounded border border-black" style="width: 20rem;">
                                        <div class="card-body">
                                            <h5 class="card-title text-center mb-3" style="color:white; background-color: #ff3f81; padding:10px;">'.$row["name"].'</h5>
                                            <p class="card-text">
                                                Contact: '.$row["phone"].'
                                                <br>
                                                Email: '.$row["email"].'
                                            </p>
                                            <a href="mailto:'.$row['email'].'" target="_blank" class="nav-link"><i class="fas fa-envelope"></i></a>
                                        </div>
                                    </div>

                                
                                </div>
                                    
				                ';
                        }
                    ?>
                </div>

            </div>
        </section>


    </main><!-- End #main -->

    <?php require "footer.php" ?>

</body>

</html>