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

  <?php require "navbar.php"; ?>

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container" >
        <h2>The Team</h2>
        <p>Contact us for any queries or problems whatsoever!</p>
      </div>
    </div><!-- End Breadcrumbs -->

    
    
    <div class="container contactLS" data-aos="fade-up">

                  
                    <div class="mt-5">
                        <nav class="nav nav-pills nav-justified">
                            <a class="nav-item nav-link active mx-3 bg-white" data-toggle="tab" href="#tab-1">Maths and Physics Club</a>
                            <a class="nav-item nav-link mx-3 bg-white" data-toggle="tab" href="#tab-2">Tinkerer's Lab</a>
                            <a class="nav-item nav-link mx-3 bg-white" data-toggle="tab" href="#tab-3">Web n Coding Club</a>
                            <a class="nav-item nav-link mx-3 bg-white" data-toggle="tab" href="#tab-4">Chemistry Club</a>
                            <a class="nav-item nav-link mx-3 bg-white" data-toggle="tab" href="#tab-5">Energy Club</a>
                        </nav>
                    </div>


                  
                      <div class="mt-4 mt-lg-0">
                              <div class="tab-content">
                                  <div class="tab-pane active show" id="tab-1">

                                  <div class="row">


                                                <div class="col-lg-8 details order-2 order-lg-1">
                                                    <p><?php echo $row["prereq"]; ?></p>
                                                </div>

                                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                                    <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                                                </div>


                                  </div>
                              </div>

                              <div class="tab-pane" id="tab-2">

                                  <div class="row">


                                                  <div class="col-lg-8 details order-2 order-lg-1">
                                                      <p><?php echo $row["contact"] ?></p>
                                                  </div>

                                                  <div class="col-lg-4 text-center order-1 order-lg-2">
                                                      <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                                                  </div>


                                  </div>
                              </div>

                              <div class="tab-pane" id="tab-3">

                                  <div class="row">


                                                  <div class="col-lg-8 details order-2 order-lg-1">
                                                      <p><?php echo $row["contact"] ?></p>
                                                  </div>

                                                  <div class="col-lg-4 text-center order-1 order-lg-2">
                                                      <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                                                  </div>

                                                  
                                  </div>
                              </div>

                              <div class="tab-pane" id="tab-4">

                                  <div class="row">


                                                  <div class="col-lg-8 details order-2 order-lg-1">
                                                      <p><?php echo $row["contact"] ?></p>
                                                  </div>

                                                  <div class="col-lg-4 text-center order-1 order-lg-2">
                                                      <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                                                  </div>

                                                  
                                  </div>
                              </div>
                          
                          </div>
                      
                    



            </div>

        </div>
        
        

  </main><!-- End #main -->

  <?php require "footer.php" ?>

</body>

</html>