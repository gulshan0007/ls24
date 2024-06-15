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
            if(($result->num_rows===0))
            {//echo $result->num_rows;
                header("Location: reg_redirect.php");
                exit();
            }
            else{
                $query2 = "SELECT * FROM learnerspace_2022_moodle WHERE rollnumber='".$rno."'";
                if($result2 = mysqli_query($conn, $query2)){
                    if(($result2->num_rows!=0)){
                        header("Location: moodle_successful.php");
                        exit();
                    }
                    
                }
            }
        }
        $result = mysqli_query($conn, $query);
        $reg_courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	  <meta content="width=device-width, initial-scale=1.0" name="viewport">

	  <title>Learners' Space | Moodle</title>
	  <meta content="" name="descriptison">
	  <meta content="" name="keywords">

	  <?php require 'head_links.php';?>

      <!-- css for this page -->
      <style>
        .thead-custom{
            background-color: #0f2b55 !important;
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
    <?php require 'navbar.php' ?>
    
    <div class="container mb-5" style="margin-top: 100px">
        <h2 class="text-center" style="color: #0f2b55">Learners' Space - Moodle</h2>
    </div>

    <div class="container">
        <h4 class="text-left" style="color: #0f2b55">Courses Registered</h4>
        <table class="table table-striped">
            <thead class="thead-custom text-white">
                <tr>
                    <th scope="col">Course Name</th>
                    <th scope="col">Course Code</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($reg_courses as $course){ ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($course['course_name']) ?></th>
                        <td><?php echo htmlspecialchars($course['course_code']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-12 col-md-6 text-center order-md-first order-last">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="assets/img/meta/moodle_qr.jpeg" class="img-fluid" alt="moodle_qr_code">
                    </div>
                    <div class="col-sm-12 my-3 text-center">
                        <a href="http://moodle.learnerspace.tech/" target="_blank">
                        <button class="btn btn-outline-success float-center">Access Moodle <i class="fas fa-sign-in-alt"></i></button>
                        </a>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-12 col-md-6 order-md-last order-first">
                <h4 class="text-left mb-3 mt-2" style="color: #0f2b55">Fill your details for accessing moodle</h4>
                <form method="POST" action="add_moodle.php">
                    <div class="form-group row">
                        <label for="full_name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="full_name" name="full_name" value="<?php echo $_SESSION['name'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="roll_number" class="col-sm-2 col-form-label">Roll No.</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="roll_number" name="roll_number" value="<?php echo $_SESSION['rollno'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gmail" class="col-sm-2 col-form-label">Gmail Id</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="gmail" name="gmail" value="<?php echo $_SESSION['gmail'] ?>">
                            <small id="emailHelp" class="form-text text-muted"><em>visit gymkhana profiles page to change your gmail if you wish</em></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 mb-4">
                            <small class="form-text text-muted"><em><strong>Note:</strong> The details you fill below will be used for registering you on moodle. PLease keep these details safe.</em></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" readonly>
                            <small id="passwordHelp" class="form-text text-danger">
                                <em>
                                    Your Password should follow the below criteria: 
                                    <ul>
                                        <li>Min length: 8</li>
                                        <li>It should contain atleast one lowercase, atleast one uppercase, atleast one number and atleast one special character</li>
                                    </ul>
                                </em>
                            </small>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="alert alert-warning h6 text-danger"><em>Moodle Registrations are Closed</em></div>
                        <!-- <button type="submit" name="moodle_submit" class="btn btn-outline-success">Submit</button> -->
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
    <?php
    require 'footer.php';
    ?>
</body>
</html>
