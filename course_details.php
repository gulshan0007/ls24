<!DOCTYPE html>
<?php
  session_start();
  if (isset($_SESSION['ldap']) && (!isset($_SESSION['gmail']) || !$_SESSION['phno'])) {
		header("Location: fill_details.php");
		exit();
	}
?>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Learners' Space | Course Details</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <?php require 'head_links.php';?>

        <!-- add to cart button css -->
        <style>
            .text-success{
                color: #0f2b55!important;
            }
            .btn-outline-success{
                color:#0f2b55;
                border-color:#0f2b55
            }
            .btn-outline-success:hover{
                color:#fff;
                background-color:#0f2b55;
                border-color:#0f2b55
            }
        </style>
    </head>

    <body>

        <?php
        	require 'navbar.php';
            require 'functions.php';
        ?>

        <?php
            // $conn_error = 'could not connect';
            // $conn = mysqli_connect('localhost', 'ugacademics', 'ug_acads', 'ugacademics') or die($conn_error);
            include 'config/dbconnect.php';
            $query = "SELECT * FROM learnerspace2024_courses WHERE course_code=".$_GET['course_code']."";
            $result = @mysqli_query($conn, $query);
            $row = @mysqli_fetch_array($result);

            // Implemeting the functions for the cart system
            if(array_key_exists('add_to_cart', $_POST)) {

                addToCart(
                	$_SESSION['name'], $_SESSION['ldap'], $_SESSION['rollno'],
                	$_SESSION['email'], $_SESSION['gmail'], $_SESSION['phno'],
                	$row['course_name'], $row['course_code']
                );

            }

            if(array_key_exists('register_course', $_POST)) {
                registerCourse(
                	$_SESSION['name'], $_SESSION['ldap'], $_SESSION['rollno'],
                	$_SESSION['email'], $_SESSION['gmail'], $_SESSION['phno'],
                	$row['course_name'], $row['course_code']
                );
            }
        ?>

        <!-- ======= Course Details Section ======= -->
        <section id="course-details" class="course-details">
        <div class="container p-5" data-aos="fade-up">

        	<!--Error Messages-->
	        <?php if (isset($_GET['message'])){
	        	$message = $_GET['message']; ?>
	        	<div class="text-center mb-4">
		         	<b class="alert alert-warning font-weight-normal">
				        <?php
				        	if ($message == 'already_added'){
				        		echo 'Course already added to the cart';
				        	}
				        	else if ($message == 'already_registered'){
				        		echo 'Already registered for this course';
				        	}
				        	else if ($message == 'added_successfully'){
				        		//echo "<script type='text/javascript'>alert('Course added successfully to cart')</script>";
				        		echo 'Course added successfully to cart';
				        	}
				        	else if ($message == 'reg_successfully'){
				        		//echo "<script type='text/javascript'>alert('Course registered successfully')</script>";
				        		echo 'Course registered successfully';
				        	}
				        	else {
				        		echo '';
				        	}
				        ?>
			        </b>
		        </div>
		      <?php } ?>
	        <!--/Error Messages-->

            <div class="row">
            <div class="col-lg-8">

                <img src="assets/img/courses/<?php echo $row['image']?>" class="img-fluid" alt="" style="width: 750px; height: 450px">

                <h3><?php echo $row['course_name'] ?></h3>
                <h5 class="text-success">Course description:</h5>
                <p class="ml-4 mr-4"><?php echo $row['course_desc'] ?></p>
                <p class="ml-4 mr-4"><?php echo $row['course_detailed'] ?></p>
                <h5 class="text-success">Assignments:</h5><p> <?php echo htmlspecialchars($row['assignment'])  ?></p>

            </div>
            <div class="col-lg-4">


                <div class="course-info d-flex justify-content-between align-items-center">
                <h5>Weekly Commitment</h5>
                <p class="text-right"><a href="#" style="text-decoration: none"><?php echo $row["weekly_commitment"] ?></a></p>
                </div>



                <div class="course-info d-flex justify-content-between align-items-center">
                <h5>Start Date</h5>
                <p class="text-right"><a href="#" style="text-decoration: none"><?php echo $row["startdate"] ?></a></p>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                <h5>Duration</h5>
                <p class="text-right"><a href="#" style="text-decoration: none"><?php echo $row["course_duration"] ?></a></p>
                </div>

            </div>
            </div>

        </div>
        </section><!-- End Course Details Section -->

        <!-- ======= Course Details Tabs Section ======= -->
        <section id="cource-details-tabs" class="cource-details-tabs">
        <div class="container" data-aos="fade-up">

            <div class="row">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#tab-1">Timeline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-2">Pre-requisites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-3">Certificate Criteria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-4">Moderators</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tab-5">Club</a>
                </li>
                </ul>
            </div>


            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">

                    <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">

                        <p><?php echo $row["timeline"] ?> </p>
                    </div>

                    <div class="col-lg-4 text-center order-1 order-lg-2">
                        <!-- <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid"> -->
                    </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab-2">

                    <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">

                        <p><?php echo $row["pre_req"]; ?></p>
                    </div>

                    <div class="col-lg-4 text-center order-1 order-lg-2">
                        <!-- <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid"> -->
                    </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab-3">

                    <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                        <p><?php echo $row["certificate"] ?></p>
                    </div>

                    <div class="col-lg-4 text-center order-1 order-lg-2">
                        <!-- <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid"> -->
                    </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab-4">

                    <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                        <p><?php echo $row["poc"] ?></p>
                    </div>

                    <div class="col-lg-4 text-center order-1 order-lg-2">
                       <!--  <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid"> -->
                    </div>
                    </div>
                </div>

                <div class="tab-pane" id="tab-5">

                    <div class="row">
                    <div class="col-lg-8 details order-2 order-lg-1">
                        <a href="./moderators.php?club=<?php echo $row["poc"] ?>" >
                            <p><?php echo $row["poc"] ?></p>
                        </a>
                    </div>

                    <div class="col-lg-4 text-center order-1 order-lg-2">
                       <!--  <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid"> -->
                    </div>
                    </div>
                </div>

                </div>
            </div>
            </div>

        </div>
        </section>
        <!--/Course Details Tabs Section -->

        <?php if(isset($_SESSION['ldap'])) { 
                ?>
                <!-- <div class="container pb-5 text-center">
                    <div class="alert alert-warning h5 text-danger"><em>The Course Registrations are Closed</em></div> -->
                    <!-- <small class="alert alert-warning text-danger"><em>The course registrations are closed</em></small> -->
                     <div class="row justify-content-center">
                        <div class="col-4 col-sm-4 col-lg-10">
                        
                        </div>
                        <div class="col-4 col-sm-4 col-lg-2">
                            <form method="POST" action="temp3.php?cname=<?php echo $row['course_name']; ?>&code=<?php echo $row['course_code']; ?>" class="float-left">
                                <button type="submit" name="add_to_cart" class="btn btn-outline-success float-right" >
                                    Add to cart <i class="fas fa-cart-plus"></i>
                                </button>
                            </form>
                            
                            
                        </div>
                        <div class="col-4 col-sm-4 col-lg-0">
                            
                        </div>
                    </div>
                    

                    <!-- removed register for this course button -->
                    
                </div>
        <?php } else { ?>

                <div class="container text-center">
                    <div class="alert alert-warning h5">Login to register for courses</div>
                </div>

        <?php } ?>

        <?php require "footer.php" ?>

    </body>
    
    <!--Scroll to top on reload-->
    <script type="text/javascript">
      $(document).ready(function(){
        $(this).scrollTop(0);
      });
    </script>

<!--script>
function myFunction() {
  alert("Hello! I am an alert box!");
}
</script-->
</html>
