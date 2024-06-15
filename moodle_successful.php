<?php

    session_start();
    if(!isset($_SESSION['ldap'])){
        header("Location: index.php");
        exit();
    }
    if(isset($_SESSION['ldap']) && (!isset($_SESSION['gmail']) || !isset($_SESSION['phno']))){
        header("Location: fill_details.php");
        exit();
    }

    include 'config/dbconnect.php';

        $rno=$_SESSION['rollno'];
        $query2 = "SELECT * FROM learnerspace_2022_moodle WHERE rollnumber='".$rno."'";
        if($result2 = mysqli_query($conn, $query2))
        {   //echo $rno;
            if(($result2->num_rows===0))
            {//echo $result->num_rows;
                header("Location: moodle_user_details.php");
                exit();
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	  <meta content="width=device-width, initial-scale=1.0" name="viewport">

	  <title>Learners' Space | Courses</title>
	  <meta content="" name="descriptison">
	  <meta content="" name="keywords">

	  <?php require 'head_links.php';?>
        
      <!-- button css -->
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
        .card-header{
          background-color: #0f2b55;
        }
      </style>

</head>
<body>
    <?php require 'navbar.php' ?>
    
    <div class="container pt-5">
        <div class="col-md-8 px-0 card shadow mt-5 mx-auto">
          <div class="card-header text-center h3 font-weight-light text-white">Your details have been recorded successfully!</div>
          <div class="card-body">
            <div class="card-text">
              You will now receive an email from moodle (within 24 hours) with further instructions. <strong>Please check your spam folder also.</strong>
              <br>
              Till then, Happy Learning :)
            </div>
            <div class="text-center">
                <!--a href="https://gymkhana.iitb.ac.in/profiles/user/" class="btn btn-outline-success mt-3">Update personal details</a-->
                <!-- <form method="POST"> -->
                    
                    <a href="http://moodle.learnerspace.tech/" target="_blank">
                        <button class="btn btn-outline-success float-center">Access Moodle <i class="fas fa-sign-in-alt"></i></button>
                    </a>
                 
                <!-- </form> -->
            </div>
          </div>
        </div>
    </div>

    <?php
    require 'footer.php';
    ?>

</body>
</html>
