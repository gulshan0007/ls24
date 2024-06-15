<?php session_start();
if (!isset($_SESSION['ldap'])) {
  header("Location: index.php");
  exit();
}
if (isset($_SESSION['ldap']) && (!isset($_SESSION['gmail']) || !isset($_SESSION['phno']))) {
  header("Location: fill_details.php");
  exit();
}

include 'config/dbconnect.php';

$rno = $_SESSION['rollno'];
$query = "SELECT * FROM learnerspace_2022_feedback WHERE rollno='" . $rno . "'";
if ($result = mysqli_query($conn, $query)) {   //echo $rno;
  if (!($result->num_rows === 0)) { //echo $result->num_rows;
    header("Location:certifs.php");
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Learners' Space | Feedback</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <style>
    @import url(https://fonts.googleapis.com/css?family=Cabin:700);
    @import url(https://fonts.googleapis.com/css?family=Roboto);
  </style>
  <?php require 'head_links.php'; ?>
</head>


<body>

 <?php require 'head_links.php';?>
        <?php require "navbar.php"; ?>

  <div class="breadcrumbs">
    <div class="container">
      <h2>Feedback</h2>
      <p>As our Learners' Space Journey comes to a conclusion, we would really grateful if you could fill up the following feedback. You'll be redirected to your certificates after this</p>
    </div>
  </div>

  <?php
  
  include 'config/dbconnect.php';

  $rno = $_SESSION['rollno'];
  $query = "SELECT * FROM learnerspace_2022_feedback WHERE rollno='" . $rno . "'";
  if ($result = mysqli_query($conn, $query)) {   //echo $rno;
    if (!($result->num_rows === 0)) {
      echo $result->num_rows;
      header("Location:certifs.php");
      exit();
    }
  }
  ?>
  <section id="courses" class="courses">
    <div class="container" data-aos="fade-up">
      <form method="POST" action="tempx.php">
        <div class="accordion " id="accordionExample">

          <div class="card">

            <div class="bg-light">
              <div class="m-1">
              <h2 class="mb-0">
                <button class="btn btn-outline-success" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Ratings* (5 being most satisfied)</button>
              </h2>
              </div>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="margin:auto;">


              


                <div class="table-responsive-sm m-2">
                  <table class="table">

                    <thead>
                      <th scope="col"> </th>
                      <th scope="col">1</th>
                      <th scope="col">2</th>
                      <th scope="col">3</th>
                      <th scope="col">4</th>
                      <th scope="col">5</th>
                    </thead>

                    <tbody>
                      <tr>
                        <th scope="row">Courses Offered</th>
                        <td><label class="flex-item"><input type="radio" value="1" name="courses_offered" required> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="2" name="courses_offered"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="3" name="courses_offered"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="4" name="courses_offered"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="5" name="courses_offered"> <span></span></label></td>
                      </tr>
                      <tr>
                        <th scope="row">Assignments Given</th>
                        <td><label class="flex-item"><input type="radio" value="1" name="assignment" required> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="2" name="assignment"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="3" name="assignment"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="4" name="assignment"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="5" name="assignment"> <span></span></label></td>
                      </tr>
                      <tr>
                        <th scope="row">Learning</th>
                        <td><label class="flex-item"><input type="radio" value="1" name="learning" required> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="2" name="learning"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="3" name="learning"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="4" name="learning"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="5" name="learning"> <span></span></label></td>
                      </tr>
                      <tr>
                        <th scope="row">Course Content</th>
                        <td><label class="flex-item"><input type="radio" value="1" name="coursec" required> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="2" name="coursec"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="3" name="coursec"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="4" name="coursec"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="5" name="coursec"> <span></span></label></td>
                      </tr>
                      <tr>
                        <th scope="row">Pace</th>
                        <td><label class="flex-item"><input type="radio" value="1" name="pace" required> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="2" name="pace"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="3" name="pace"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="4" name="pace"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="5" name="pace"> <span></span></label></td>
                      </tr>
                      <tr>
                        <th scope="row">Website</th>
                        <td><label class="flex-item"><input type="radio" value="1" name="website" required> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="2" name="website"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="3" name="website"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="4" name="website"> <span></span></label></td>
                        <td><label class="flex-item"><input type="radio" value="5" name="website"> <span></span></label></td>
                      </tr>
                    </tbody>

                  </table>
                </div>





              



            </div>
          </div>

          
            <div class="bg-light" id="headingTwo">
              <div class="m-1">
              <h2 class="mb-0">
                <button class="btn btn-outline-success collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Textual Feedback
                </button>
              </h2>
              </div>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">



                <div class="form-group">
                  <label for="other_courses">What Other Courses would you like to see in the next edition of Learners' Space?</label>
                  <input name="other_courses" type="text" class="form-control">
                </div>

                <div class="form-group">
                  <label for="suggestions">Other Suggestions</label>
                  <input name="suggestions" type="text" class="form-control" id="soplink2">
                </div>
              </div>


            
          </div>




        </div>
        <button class="btn btn-outline-success mx-4" name="save_pref_btn">Submit</button>
      </form>





    </div>
  </section>






  </form>


  <?php require 'footer.php'; ?>

<div class="container m-3">
  
</div>
</body>

</html>