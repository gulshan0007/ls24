<?php

include 'config/dbconnect.php';

// save details filled in the form to database
if(isset($_POST['moodle_submit'])){
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $roll_number = mysqli_real_escape_string($conn, $_POST['roll_number']);
    $gmail = mysqli_real_escape_string($conn, $_POST['gmail']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // assuming user submits a valid form
    $sql = "INSERT INTO learnerspace_2022_moodle(name,rollnumber,gmail,username,password) values ('$full_name','$roll_number','$gmail','$username', '$password')";
    
    if(mysqli_query($conn, $sql)){
        echo "Moodle details filled";
        header("Location: moodle_successful.php");
    }
    else{
        echo "query error " . mysqli_error($conn);
    }

}

?>