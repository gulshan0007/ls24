<?php

	// Adds a particular course to cart
	function addToCart($name, $user_ldap, $roll_number, $user_email, $user_gmail, $user_phno, $course_name, $course_code){

		// Connecting to the database
		include 'config/dbconnect.php';

		// Check connection
		if (!$conn) {
		  die("Connection failed: ".mysqli_connect_error());
		}

		// Check for duplicate insertion
		$check_query_1 = "
		SELECT * FROM learnerspace_2023_cart
		WHERE (user_ldap = '$user_ldap' AND course_code = '$course_code')
		";

		$result_1 = mysqli_query($conn, $check_query_1);

		// Check for duplicate registration
		$check_query_2 = "
		SELECT * FROM learnerspace_2023_reg
		WHERE (user_ldap = '$user_ldap' AND course_code = '$course_code')
		";

		$result_2 = mysqli_query($conn, $check_query_2);
		// Error Handling:
		if (mysqli_num_rows($result_1) > 0) {
			header("Location: course.php?&message=already_added");
			exit();
		}
		else if (mysqli_num_rows($result_2) > 0){
			header("Location: course.php?&message=already_registered");
			exit();
		}
		else {
			// Query to insert data into the DB
			$insert_query = "
			INSERT INTO learnerspace_2023_cart
			(user_name, user_ldap, roll_number, user_email, user_gmail, user_phno, course_name, course_code)
			VALUES ('$name', '$user_ldap', '$roll_number', '$user_email', '$user_gmail', '$user_phno', '$course_name', '$course_code')
			";

			// Success/Failure message
			if (mysqli_query($conn, $insert_query)) {
				header("Location: cart.php?course_code=".$course_code."&message=added_successfully");
				exit();
			} else {
			  echo "Something's not right. Error: ".mysqli_error($conn);
			}
		}
		mysqli_close($conn);
	}

	// Function to display the current user's cart
	function showCart($user_ldap){
		// Connecting to the database
		include 'config/dbconnect.php';

		// Check connection
		if (!$conn) {
		  die("Connection failed: ".mysqli_connect_error());
		}

		$select_query = "
		SELECT course_name FROM learnerspace_2023_cart
		WHERE user_ldap = '$user_ldap'
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
	function removeFromCart($course_code, $user_ldap){
		// Connecting to the database
		include 'config/dbconnect.php';

		// Check connection
		if (!$conn) {
		  die("Connection failed: ".mysqli_connect_error());
		}

		$delete_query = "
		DELETE FROM learnerspace_2023_cart
		WHERE course_code = '$course_code' AND user_ldap = '$user_ldap'
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
	function removeFromReg($course_code, $user_ldap){
		// Connecting to the database
		include 'config/dbconnect.php';

		// Check connection
		if (!$conn) {
		  die("Connection failed: ".mysqli_connect_error());
		}

		$delete_query = "
		DELETE FROM learnerspace_2023_reg
		WHERE course_code = '$course_code' AND user_ldap = '$user_ldap'
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
	function registerCourse($name, $user_ldap, $roll_number, $user_email, $user_gmail, $user_phno, $course_name, $course_code){

		// Connecting to the database
		include 'config/dbconnect.php';

		// Check connection
		if (!$conn) {
		  die("Connection failed: ".mysqli_connect_error());
		}

		// Check whether user has already added that course to cart, if yes, delete that from cart
		$check_query_1 = "
		SELECT * FROM learnerspace_2023_cart
		WHERE (user_ldap = '$user_ldap' AND course_code = '$course_code')
		";

		$result_1 = mysqli_query($conn, $check_query_1);

		// Check for duplicate registration
		$check_query_2 = "
		SELECT * FROM learnerspace_2023_reg
		WHERE (user_ldap = '$user_ldap' AND course_code = '$course_code')
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
				removeFromCart($course_code, $user_ldap);
			}
			// Query to insert data into the DB
			$insert_query = "
			INSERT INTO learnerspace_2023_reg
			(user_name, user_ldap, roll_number, user_email, user_gmail, user_phno, course_name, course_code)
			VALUES ('$name', '$user_ldap', '$roll_number', '$user_email', '$user_gmail', '$user_phno', '$course_name', '$course_code')
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
	function registerAll($user_ldap){

		// Connecting to the database
		include 'config/dbconnect.php';

		// Check connection
		if (!$conn) {
		  die("Connection failed: ".mysqli_connect_error());
		}

		// Copying all data from cart to reg table
		$copy_query = "
		INSERT INTO learnerspace_2023_reg
		SELECT * FROM learnerspace_2023_cart WHERE user_ldap = '$user_ldap'
		";

		// Success/Failure message
		if (mysqli_query($conn, $copy_query)) {
		  header("Location: cart.php?message=register_all");
		  #echo "Registered successfully for the selected courses.";
		} else {
		  echo "Something's not right. Error: ".mysqli_error($conn);
		}

		// Emptying the cart
		$delete_query = "
		DELETE FROM learnerspace_2023_cart
		WHERE user_ldap = '$user_ldap'
		";

		// Success/Failure message
		if (mysqli_query($conn, $delete_query)) {
		  echo " "; // Cart emptied, reg successful
		} else {
		  echo "Something's not right. Error: ".mysqli_error($conn);
		}

		mysqli_close($conn);
	}

?>
