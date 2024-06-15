<?php

	// Adds a particular course to cart
	function addToCart($user_email, $user_gmail, $course_name, $course_code) {

		// Connecting to the database
		include 'config/dbconnect.php';
	
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	
		// Check for duplicate insertion
		$check_query_1 = "
		SELECT * FROM learnerspace_2024_cart
		WHERE (user_email = '$user_email' AND course_code = '$course_code')
		";
	
		$result_1 = mysqli_query($conn, $check_query_1);
	
		// Check for duplicate registration
		$check_query_2 = "
		SELECT * FROM learnerspace_2024_reg
		WHERE (user_email = '$user_email' AND course_code = '$course_code')
		";
	
		$result_2 = mysqli_query($conn, $check_query_2);
	
		// Error Handling:
		if (mysqli_num_rows($result_1) > 0) {
			header("Location: course.php?&message=already_added");
			exit();
		} else if (mysqli_num_rows($result_2) > 0) {
			header("Location: course.php?&message=already_registered");
			exit();
		} else {
			// Debugging values
			echo "Debug Info: user_email = $user_email, user_gmail = $user_gmail, course_name = $course_name, course_code = $course_code<br>";
	
			// Query to insert data into the DB
			$insert_query = "
			INSERT INTO learnerspace_2024_cart
			(user_email, user_gmail, course_name, course_code)
			VALUES ('$user_email', '$user_gmail', '$course_name', '$course_code')
			";
	
			// Success/Failure message
			if (mysqli_query($conn, $insert_query)) {
				header("Location: cart.php?course_code=" . $course_code . "&message=added_successfully");
				exit();
			} else {
				echo "Something's not right. Error: " . mysqli_error($conn);
			}
		}
	
		mysqli_close($conn);
	}

	// Function to display the current user's cart
	function showCart($user_email){
		// Connecting to the database
		include 'config/dbconnect.php';

		// Check connection
		if (!$conn) {
		  die("Connection failed: ".mysqli_connect_error());
		}

		$select_query = "
		SELECT course_name FROM learnerspace_2024_cart
		WHERE user_email = '$user_email'
		";

		$result = mysqli_query($conn, $select_query);

		if (mysqli_num_rows($result) > 0) {
		  // Displaying all the courses added by the user
		  while($row = mysqli_fetch_assoc($result)) {
		    echo "Course Name: ".$row["course_name"]."<br>" ;
		  }
		} else {
		  echo "<i>No courses added yet</i>";
		}

		mysqli_close($conn);
	}

	// Function to remove a particular course from the cart
	function removeFromCart($course_code, $user_email){
		// Connecting to the database
		global $conn;
		include 'config/dbconnect.php';

		// Check connection
		if (!$conn) {
		  die("Connection failed: ".mysqli_connect_error());
		}

		$delete_query = "
		DELETE FROM learnerspace_2024_cart
		WHERE course_code = '$course_code' AND user_email = '$user_email'
		";

		// Success/Failure message
		if (mysqli_query($conn, $delete_query)) {
			echo 'Removed successfully';
			/*header("Location: cart.php?message=removed_successfully");
			exit();*/
		} else {
		  echo "Something's not right. Error: ".mysqli_error($conn);
		}

		mysqli_close($conn);
	}

	// Function to remove a particular course from the the registration table
	function removeFromReg($course_code, $user_email){
		// Connecting to the database
		include 'config/dbconnect.php';

		// Check connection
		if (!$conn) {
		  die("Connection failed: ".mysqli_connect_error());
		}

		$delete_query = "
		DELETE FROM learnerspace_2024_reg
		WHERE course_code = '$course_code' AND user_email = '$user_email'
		";

		// Success/Failure message
		if (mysqli_query($conn, $delete_query)) {
			echo 'Removed successfully';
			/*header("Location: cart.php?message=removed_successfully");
			exit();*/
		} else {
		  echo "Something's not right. Error: ".mysqli_error($conn);
		}

		mysqli_close($conn);
	}

	// Function to register a particular course
	function registerCourse( $user_email, $user_gmail,  $course_name, $course_code){

		// Connecting to the database
		include 'config/dbconnect.php';

		// Check connection
		if (!$conn) {
		  die("Connection failed: ".mysqli_connect_error());
		}

		// Check whether user has already added that course to cart, if yes, delete that from cart
		$check_query_1 = "
		SELECT * FROM learnerspace_2024_cart
		WHERE (user_email = '$user_email' AND course_code = '$course_code')
		";

		$result_1 = mysqli_query($conn, $check_query_1);

		// Check for duplicate registration
		$check_query_2 = "
		SELECT * FROM learnerspace_2024_reg
		WHERE (user_email = '$user_email' AND course_code = '$course_code')
		";

		$result_2 = mysqli_query($conn, $check_query_2);

		if (mysqli_num_rows($result_2) > 0) {
			header("Location: course.php?&message=already_registered");
			exit();
		}
		else{
			// If course already in cart, then delete it before registering
			if (mysqli_num_rows($result_1) > 0) {
				// Delete from cart and register
				removeFromCart($course_code, $user_email);
			}
			// Query to insert data into the DB
			$insert_query = "
			INSERT INTO learnerspace_2024_reg
			( user_email, user_gmail, course_name, course_code)
			VALUES ('$user_email', '$user_gmail', '$course_name', '$course_code')
			";

			// Success/Failure message
			if (mysqli_query($conn, $insert_query)) {
				
				header("Location: course.php?&message=reg_successfully");
				exit();
			} else {
			  echo "Something's not right. Error: ".mysqli_error($conn);
			}
		}

		mysqli_close($conn);
	}

	// Functions that registers all the current courses in the cart
	function registerAll($user_email) {
		global $conn; // Make sure $conn is accessible inside the function
	
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	
		// Start transaction
		mysqli_begin_transaction($conn);
	
		try {
			// Copy all data from cart to reg table, including course_code and course_name
			$copy_query = "
				INSERT INTO learnerspace_2024_reg1 (user_email, user_gmail, course_name, course_code)
				SELECT user_email, user_gmail, course_name, course_code FROM learnerspace_2024_cart WHERE user_email = '$user_email'
			";
	
			if (!mysqli_query($conn, $copy_query)) {
				throw new Exception("Copy operation failed: " . mysqli_error($conn));
			}
	
			// Empty the cart
			$delete_query = "
				DELETE FROM learnerspace_2024_cart
				WHERE user_email = '$user_email'
			";
	
			if (!mysqli_query($conn, $delete_query)) {
				throw new Exception("Delete operation failed: " . mysqli_error($conn));
			}
	
			// Commit transaction
			mysqli_commit($conn);
	
			echo '<script>alert("Registration Successful!");</script>';
			header("Location: index.php");
			exit();
	
		} catch (Exception $e) {
			// Rollback transaction in case of error
			mysqli_rollback($conn);
	
			// Display the error message
			echo "Transaction failed: " . $e->getMessage();
		}
	
		// Close the connection (if not using persistent connections)
		mysqli_close($conn);
	}
	

?>
