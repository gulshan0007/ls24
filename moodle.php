<?php

    session_start();
    if(!isset($_SESSION['ldap'])){
        header("Location: index.php");
        exit();
    }
    if(isset($_SESSION['ldap']) && (!isset($_SESSION['gmail']) || !isset($_SESSION['phno']))){
        header("Location: fill_details.php");
        exit();
    }

    include 'config/dbconnect.php';

        $rno=$_SESSION['rollno'];
        $query = "SELECT * FROM learnerspace_2022_reg WHERE roll_number='".$rno."'";
        if($result = mysqli_query($conn, $query))
        {   //echo $rno;
            // check if user has registered for any course, if not then prompt him to go and register
            if(($result->num_rows===0))
            {//echo $result->num_rows;
                header("Location: reg_redirect.php");
                exit();
            }
            // if already registered for a course, then redirect him to moodle details page
            else{
                // check if he has already filled the moodle details
                $query2 = "SELECT * FROM learnerspace_2022_moodle WHERE rollnumber='".$rno."'";
                if($result2 = mysqli_query($conn, $query2)){
                    if(($result2->num_rows===0)){
                        header("Location: moodle_user_details.php");
                        exit();
                    }
                    else{
                        header("Location: moodle_successful.php");
                        exit();
                    }
                }
                // header("Location: moodle_user_details.php");
                // exit();
            }
        }
        
        
?>