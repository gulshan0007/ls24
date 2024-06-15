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

    <div class="container mb-5" style="margin-top: 100px">
        <div class="card" style="background: color: #ff3f81;">
            <div class="card-header text-center text-white mt-2">
                <h2>Web Team UGAC</h2>
                <p>
                Contact us for any queries or problems whatsoever!
                </p>
            </div>
        </div>
    </div>

    

    
        
        <section id="courses" class="courses">
                <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-sm-4 d-flex align-items-stretch my-3 mx-auto">
                        <div class="course-item shadow">
                            <img src="assets/img/moderators/gaurav.png" style="width: 350px;height: 350px;transform:none; "class="img-fluid" alt="course_image"onmouseover="hover(this);" onmouseout="unhover(this);">
                            <div class="course-content">                        
                                <h3>Gaurav Rathod</h3>
                                <p> Contact: 8669723750</p>
                                <p> Email: rathod.gauravvinod@gmail.com</p>
                                <a class="nav-link" href="https://www.instagram.com/rathod__gaurav_/"><i class="fab fa-instagram"></i></a>
                                <!-- <a class="nav-link" href="https://github.com/rathod-gaurav"><i class="fab fa-github"></i></a> -->
                            </div>
                        </div>
                    </div>
                    
                                        
                </div>

                </div>
                </section>
        

  </main><!-- End #main -->

  <?php require "footer.php" ?>

</body>

</html>