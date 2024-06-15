<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>Learners' Space | Courses</title>
      <meta content="" name="descriptison">
      <meta content="" name="keywords">

      <?php require 'head_links.php'; ?>

      <!-- details button css -->
      <style>
        .btn-outline-success{
            color:#0f2b55;
            border-color:#0f2b55
        }
        .btn-outline-success:hover{
            color:#fff;
            background-color:#0f2b55;
            border-color:#0f2b55
        }
        
        .text-white-here{
            color:#0f2b55;
        }
      </style>

    </head>


    <body>

   <?php require 'head_links.php';?>
        <?php require "navbar.php"; ?>
    
    <div class="container mb-5" style="margin-top: 100px">
        <h2 class="text-center" style="color: #0f2b55">Courses</h2>
    </div>

    <div class="container my-3 justify-content-center">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">NTSS</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">TSS</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="" >
                    <div class="text-white-here">
                        <blockquote class="blockquote mx-2 my-4">
                        <p>Non Technical Summer School (NTSS) :</p>
                        <footer class="text-sm text-white-here"><small> This stands as a perfect platform to grasp skills in a variety of interesting topics which are fundamental to develop an intriguing profile for some of the most popular <cite title="Source Title">non-technical</cite> vocations existing today.</small></footer>
                        </blockquote>
                    </div>
                </div>
                <?php

                include 'config/dbconnect.php';

                $query = "SELECT * FROM learnerspace2024_courses WHERE category='NTSS'";
                if ($result = mysqli_query($conn, $query)) {
                    ?>
                            <section id="courses" class="courses">
                            <div class="container" data-aos="fade-up">

                            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    $details_url = "./course_details.php?course_code=" . $row["course_code"] . "";
                                    //echo $details_url;
                                    echo '
                                    
                                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch my-3">
                                            <div class="course-item shadow">
                                            
                                            <div class="course-content">
                                                <div class="d-flex justify-content-between align-items-center my-2">
                                                
                                                </div>
                                
                                                <h3>' . $row["course_name"] . '</h3>
                                                <p>' . $row["course_desc"] . '</p>
                                                <div class="trainer d-flex justify-content-between align-items-center">
                                                
                                                <div class="trainer-rank d-flex align-items-center">
                                                    <a class="btn btn-outline-success btn-sm float-right" href="' . $details_url . '">Details</a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div> 
                        <!--/Course Item--> ';
                                }
                                ?>
                            </div>

                            </div>
                            </section>
                    <!--/Courses Section -->
                        <?php

                }

                ?>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="" >
                    <div class="text-white-here">
                        <blockquote class="blockquote mx-2 my-4">
                        <p>Technical Summer School (TSS) :</p>
                        <footer class="text-sm text-white-here"><small> An integral part of Learners’ Space where one can learn and choose from an assortment of courses which develop some of the necessary applied skills required to build a <cite title="Source Title">strong technical profile</cite>.</small></footer>
                        </blockquote>
                    </div>
                </div>
                <?php

                include 'config/dbconnect.php';

                $query = "SELECT * FROM learnerspace2024_courses WHERE category='TSS'";
                if ($result = mysqli_query($conn, $query)) {
                    ?>
                                <section id="courses" class="courses">
                                <div class="container" data-aos="fade-up">

                                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        $details_url = "./course_details.php?course_code=" . $row["course_code"] . "";
                                        //echo $details_url;
                                        echo '
                                        
                                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch my-3">
                                                <div class="course-item shadow">
                                                
                                                <div class="course-content">
                                                    <div class="d-flex justify-content-between align-items-center my-2">
                                                    
                                                    </div>
                                    
                                                    <h3>' . $row["course_name"] . '</h3>
                                                    <p>' . $row["course_desc"] . '</p>
                                                    <div class="trainer d-flex justify-content-between align-items-center">
                                                    
                                                    <div class="trainer-rank d-flex align-items-center">
                                                        <a class="btn btn-outline-success btn-sm float-right" href="' . $details_url . '">Details</a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div> 
                            <!--/Course Item--> ';
                                    }
                                    ?>
                                </div>

                                </div>
                                </section>
                        <!--/Courses Section -->
                            <?php

                }

                ?>
            </div>
        </div>
    </div>

    
    <?php require 'footer.php'; ?>

    </body>

</html>