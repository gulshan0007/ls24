<?php session_start(); 
if (!isset($_SESSION['ldap'])){
        header("Location: index.php");
        exit();
    }
    if (isset($_SESSION['ldap']) && (!isset($_SESSION['gmail']) || !isset($_SESSION['phno']))) {
        header("Location: fill_details.php");
        exit();
    }
    include 'config/dbconnect.php';
        
        $rno=$_SESSION['rollno'];
        $query = "SELECT * FROM learnerspace_2022_feedback WHERE rollno='".$rno."'";
        if($result = mysqli_query($conn, $query))
        {   //echo $rno;
            if(($result->num_rows===0))
            {//echo $result->num_rows;
            header("Location:feedback.php");exit();}
        }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Learners' Space | Certificates</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <?php require 'head_links.php';?>
    </head>


    <body>

   <?php require 'head_links.php';?>
        <?php require "navbar.php"; ?>
  
    <div class="breadcrumbs">
      <div class="container">
        <h2>Your Certificates</h2>
        <p>One stop for all your Learners' Space Certificates!!</p>
      </div>
    </div>

    <?php
        $conn_error = 'could not connect';
        include 'config/dbconnect.php';
        
        $rno=$_SESSION['rollno'];
        $query = "SELECT * FROM learnerspace_2022_certifs WHERE rollno='".$rno."'";
        if($result = mysqli_query($conn, $query))
        {
            ?>
                <section id="courses" class="courses">
                <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <?php
                        while($row = mysqli_fetch_array($result))
                        {   
                            // $details_url= "./certigen/index.php?course_code=".$row["course_code"]."";
                            //echo $details_url;
                            echo '
                               
                                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch my-3">
                                    <div class="course-item shadow">
                                    <img src="assets/img/courses/'.$row['bg'].'" class="img-fluid" alt="course_image">
                                    <div class="course-content">
                                        
                        
                                        <h3>'.$row["camp"].'</h3>
                                        
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                        
                                        <div class="trainer-rank d-flex align-items-center">
                                        <form action="certigen/" method="POST">
                                            <input type="hidden" name="key" value="'.$row["camp"].'" hidden" />
                                            <input type="hidden" name="temp" value="'.$row["temp"].'" hidden" />
                                            <a><input class="btn btn-outline-success btn-sm float-right" type="submit" value="Check it Out!" /></a>
                                            </form>
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
  <div class="container text-center">
                    <div class="alert alert-warning h5">Having some issue with your certificates? <a href='https://docs.google.com/forms/d/e/1FAIpQLScv-ObEHgCNuCOnPHNyb5cdeKnV-Fzn8XOdm5dRXd7h_rO5Ow/viewform?usp=sf_link'target="_blank">Click Here</a></div>
                </div>
    <?php require 'footer.php'; ?>

    </body>

</html>
