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
        $query = "SELECT * FROM learnerspace_2022_reg WHERE roll_number='".$rno."'";
        if($result = mysqli_query($conn, $query))
        {   //echo $rno;
            if(($result->num_rows!=0))
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
          <div class="card-header text-center h3 font-weight-light text-white">Please register for atleast one course</div>
          <div class="card-body">
            <div class="card-text">
              You have not registered for any course as yet. <br>
              You will not be able to access <strong>Moodle</strong> without registering for a course.<br>
              The link below will redirect you to <strong>Your Cart</strong>, please register for the courses you have added in your cart.
              <br> If you have not added any course to your cart as yet, please go to <strong>Courses</strong>, select courses you wish to take up, add them to your cart, and then register for them.<br>
              <br>
            </div>
            <div class="text-center">
                <!--a href="https://gymkhana.iitb.ac.in/profiles/user/" class="btn btn-outline-success mt-3">Update personal details</a-->
                <!-- <form method="POST"> -->
                    <a href="cart.php">
                    <button class="btn btn-outline-success float-center">Your Cart <i class="fas fa-cart-plus"></i></button>
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
