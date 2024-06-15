<?php
$servername = "213.210.36.66";
$username = "ugac";
$password = "LearnerSpace@24";
$database= "ugacademics_learnerspace2024";

$conn = mysqli_connect($servername,$username,$password ,$database);
//  mysqli_select_db($conn,$database);
if(!$conn){

    die ("Error". mysqli_connect_error());
}

?>