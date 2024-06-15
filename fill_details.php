<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
  	  <meta charset="utf-8">
  	  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  	  <title>Learners' Space</title>
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
      <?php
      	require 'navbar.php';
        // if (isset($_POST['redirect_to_gymkhana'])){
        //   header("Location:temp5.php");
        //   session_unset();
        // 	session_destroy();
        // 	// Redirect to main page
        // 	header("Location: https://gymkhana.iitb.ac.in/profiles/user");
        // 	exit();
        // }
      ?>

      <div class="container pt-5">
        <div class="col-md-8 px-0 card shadow mt-5 mx-auto">
          <div class="card-header text-center h3 font-weight-light text-white">Please update your details</div>
          <div class="card-body">
            <div class="card-text">
              You have not added a <b>Gmail ID</b> and/or <b>phone number</b> to your gymkhana profile. <br>
              Without these, you will not be able to register for the courses. <br>
              The below link will redirect you to your gymkhana profile,
              please add your <b>phone number</b> and atleast one <b>Gmail ID</b> to your emails. <br>
              <br>
              <strong>Note: </strong> Once you successfully save all the details on your gymkhana profile, you can logout from there and come back to this page and login via SSO again.
              <!--After that, please make sure to <b class="text-danger">logout</b> from this site and then <b class="text-warning">re-login</b> to view and register for the courses.-->
            </div>
            <div class="text-center">
                <!--a href="https://gymkhana.iitb.ac.in/profiles/user/" class="btn btn-outline-success mt-3">Update personal details</a-->
                <!-- <form method="POST"> -->
                 <a href="temp5.php" target="_blank"> <button name="redirect_to_gymkhana" class="btn btn-outline-success mt-3">
                    Update personal details
                  </button></a>
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
