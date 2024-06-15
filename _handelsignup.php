<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$user_email=$_POST['signupemail'];
$user_gmail=$_POST['signupemail'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
  
//  validate user email 
$existSql="SELECT * FROM `learnerspace_2024_reg` WHERE user_email='$user_email'";
$result=mysqli_query($conn ,$existSql);
$numRows=mysqli_num_rows($result);
if($numRows>0){
    $showalert= "User email alread exist";
}
else{
    if($password == $cpassword){
        $hash= password_hash($password, PASSWORD_DEFAULT );
        $hash2= password_hash($cpassword, PASSWORD_DEFAULT );
        $sql="INSERT INTO `learnerspace_2024_reg` (`user_email`,`user_gmail`, `password`, `cpassword`, `signup_time`, `course_code`, `course_name`) VALUES ('$user_email','$user_gmail', '$hash', '$hash2', current_timestamp(),'','');";
        $result=mysqli_query($conn,$sql);
        if($result){
            $showalert = true;
            header ("location: /Learners_Space24/index.php?signupsuccess=true");
            exit();
        }

    }
    else{
        $showError= "Password do not match";
    }
    }
  header ("location: '/Learners_Space24/index.php?signupsuccess=false&error=$showError");
    }
?>