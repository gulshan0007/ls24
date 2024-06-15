<?php
session_start();
$rollno=$_SESSION['rollno'];
$name=$_SESSION['name'];
$courses_offered=$_POST['courses_offered'];
$assignment=$_POST['assignment'];
$learning=$_POST['learning'];
$coursec=$_POST['coursec'];
$pace=$_POST['pace'];
$website=$_POST['website'];
$other_courses=$_POST['other_courses'];
$suggestions=$_POST['suggestions'];

// echo $courses_offered;
// echo $assignment;
// echo $learning;
// echo $coursec;
// echo $pace;
// echo $website;

// echo $other_courses;
// echo $suggestions;


		include 'config/dbconnect.php';

		
		$other_courses=mysqli_real_escape_string($conn, $other_courses);
		$suggestions=mysqli_real_escape_string($conn, $suggestions);
		
		$insert_query = "
			INSERT INTO learnerspace_2022_feedback
			(rollno, name, courses_offered, assign_given, learning, course_content, pace, website,other_offer,other_words)
			VALUES ('$rollno','$name','$courses_offered', '$assignment', '$learning', '$coursec', '$pace', '$website', '$other_courses', '$suggestions')
			";

			// Success/Failure message
			if (mysqli_query($conn, $insert_query)) {
				header("Location: certifs.php?&message=Successful");
				exit();
			} else {
			  echo "Something's not right. Error: ".mysqli_error($conn);
			}
			?>
