<?php

	include 'populate.php';

?>

<!DOCTYPE html>

<html>

<head>

	<title>CSV Upload</title>

</head>

<body>

	<div class="container-fluid">

		<div class="jumbotron" style="width: 50%; margin:auto">

			<form action="" method="post" enctype="multipart/form-data">

				<h3> Upload CSV file - Course Details </h3>

				<div class="input-group">

					<label>Select File</label>

					<input type="file" class="form-control" name="courses_file_to_upload" accept=".csv">

				</div>

				<br>

				<h3> Upload CSV file - Moderator Details </h3>

				<div class="input-group">

					<label>Select File</label>

					<input type="file" class="form-control" name="moderators_file_to_upload" accept=".csv">

				</div>

				<br>
				<br>

				<div class="input-group">	

					<input type="submit" class="btn btn-success btn-block" value="Upload" name="upload_file">

				</div>

			</form>

		</div>

	</div>

</body>

</html>