<?php 
	session_start();
	if (!isset($_SESSION['ldap'])){
		header("Location: index.php");
		exit();
	}
	if (isset($_SESSION['ldap']) && (!isset($_SESSION['gmail']) || !$_SESSION['phno'])) {
		header("Location: fill_details.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
  	  <meta charset="utf-8">
  	  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  	  <title>Learners' Space | Registrations</title>
  	  <meta content="" name="descriptison">
  	  <meta content="" name="keywords">

  	  <?php require 'head_links.php';?>
    </head>

    <body>

      <?php 
      	require 'navbar.php'; 
      ?>

      <?php
        require 'functions.php';

        // LDAP of the user
        $user_ldap = $_SESSION['ldap'];

        // Register all logic
        if(array_key_exists('register_all', $_POST)) {
                registerAll($user_ldap);
         
                           
                         
        }
       

        // Connecting to the database
        include 'config/dbconnect.php';

        // Check connection
        if (!$conn) {
          die("Connection failed: ".mysqli_connect_error());
        }

        $select_query = "
    		SELECT * FROM learnerspace_2024_reg
    		WHERE user_ldap = '$user_ldap'
    		";

        $count_query = "
        SELECT COUNT(*) FROM learnerspace_2024_reg
        WHERE user_ldap = '$user_ldap'
        ";

    		$result = mysqli_query($conn, $select_query);

        $N_CART = mysqli_query($conn, $count_query);
        $cart_rows = mysqli_fetch_array($N_CART);
        $total = $cart_rows[0];
      ?>

        <div class="container mb-5" style="margin-top: 100px">
            <div class="card" style="background: #0f2b55">
                <div class="card-header text-center text-white mt-2">
                    <h2>Your Registrations</h2>
                    <p>
                      <b class="badge badge-pill badge-light text-dark"><?php echo $total; ?></b> courses registered
                    </p>
                </div>
            </div>
        </div>

        <?php
	        if (isset($_GET['message'])){
	      		$message = $_GET['message'];
	      		if ($message == 'reg_all'){
	      			echo '<p class="text-center my-5"><i class="alert alert-warning">Registration successful</i></p>';
	      		}
	      	}
      	?>

        <div class="container mt-5">
    		<?php if (mysqli_num_rows($result) > 0) { ?>

            <ul class="list-group mx-auto shadow col-md-9 pr-0">
              <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <li class="list-group-item">
                  <div class="d-inline-block">
                    <?php
                      echo '<b class="lead">'.$row["course_name"].'</b>' ;
                      $course_code = $row["course_code"];
                    ?>
                  </div>

                  <div class="d-inline-block float-right">
                    <form method="POST" action="temp2.php?code=<?php echo $course_code; ?>&ldap=<?php echo $user_ldap; ?>" class="my-md-0 my-2">
                       <small class="badge badge-light badge-pill font-weight-normal">
	                       
                       </small>

                       <!-- <a href="<?php echo htmlspecialchars('course_details.php?course_code='.$course_code); ?>" 
                       	class="btn btn-primary btn-sm">Details</a> -->

                       <input 
	                       type="submit" 
	                       name="<?php echo htmlspecialchars('remove_from_cart_'.$course_code); ?>"
	                       class="btn btn-danger btn-sm" value="Deregister" 
                       />
                    </form>
                  </div>
                </li>
          		<?php } ?>
             <!--  <li class="list-group-item bg-light py-2">
                <form method="POST" class="float-right">
                     <input type="submit" name="register_all" class="btn btn-outline-success shadow" value="Register for all" />
                </form>
                <a href="user_details.php" class="btn btn-outline-success shadow">Verify personal details</a>
              </li> -->
            </ul>

    		<?php } else {
      		  echo '<p class="text-center my-5"><i class="alert alert-warning">No courses registered</i></p>';
      		}
      		mysqli_close($conn);
            ?>
        </div>

	  <?php require 'footer.php'; ?>
    </body>
</html>
