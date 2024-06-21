<?php

include '../config/dbconnect.php';

if (isset($_POST["upload_file"])) {

	// check if the database exists

	if (!mysqli_select_db($conn, $dbname)) {

		echo "Database Not found!!!";

	} else {

		$courses_file_to_upload = $_FILES["courses_file_to_upload"]["tmp_name"];
		$moderators_file_to_upload = $_FILES["moderators_file_to_upload"]["tmp_name"];
        // echo $file_to_upload;

		if ($_FILES["courses_file_to_upload"]["size"] > 0 && $_FILES["moderators_file_to_upload"]["size"] > 0) {

			$courses_file = fopen($courses_file_to_upload, "r");
			$moderators_file = fopen($moderators_file_to_upload, "r");

			while (($getData = fgetcsv($courses_file)) !== FALSE) {

				$sql = mysqli_query($conn, "INSERT INTO learnerspace_2024_courses(course_name,mod_brief,club_image,category,course_brief,course_desc,startdate,duration,timeline,hours,assignment,contact,certificate,prereq,course_code,image) VALUES('" . $getData[0] . "','" . $getData[1] . "', '" . $getData[2] . "', '" . $getData[3] . "', '" . $getData[4] . "', '" . $getData[5] . "', '" . $getData[6] . "', '" . $getData[7] . "', '" . $getData[8] . "', '" . $getData[9] . "', '" . $getData[10] . "', '" . $getData[11] . "', '" . $getData[12] . "', '" . $getData[13] . "', '" . $getData[14] . "', '" . $getData[15] . "')");

				if (!isset($sql)) {

					echo "Invalid File: Please Upload CSV file";

				} 
                // else {

				// 	echo "File has been uploaded successfully";

				// }

			}
			
			while (($getData = fgetcsv($moderators_file)) !== FALSE) {

				$sql = mysqli_query($conn, "INSERT INTO learnerspace_2024_contact(club,name,phone,email) VALUES('" . $getData[0] . "','" . $getData[1] . "', '" . $getData[2] . "', '" . $getData[3] . "')");

				if (!isset($sql)) {

					echo "Invalid File: Please Upload CSV file";

				} 
                // else {

				// 	echo "File has been uploaded successfully";

				// }

			}

			fclose($courses_file);
			fclose($moderators_file);

		}

	}

}



?>