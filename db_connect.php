<?php
$servername = "10.198.49.5";
$username = "ugacademics";
$password = "zsVgOLEGSxewJbgk";
$database= "ugacademics_learnerspace2023";

$conn = mysqli_connect($servername,$username,$password ,$database);
//  mysqli_select_db($conn,$database);
if(!$conn){

    die ("Error". mysqli_connect_error());
}

?>