<?php 
    // connect to database
    // $conn = mysqli_connect('localhost', 'ugacademics', 'ug_acads', 'ugacademics');
    // $dbname = 'ugacademics';
    
    $conn = mysqli_connect('10.198.49.5', 'ugacademics', 'zsVgOLEGSxewJbgk', 'ugacademics_learnerspace2023');
    $dbname = 'ugacademics_learnerspace2023';
    
    // $conn = mysqli_connect('remotemysql.com:3306', 'xvjO9ohmHF', 'YqA9IpfAx1', 'xvjO9ohmHF');
    //check the connection
    
    
    if(!$conn){
        echo "database connection error" . mysqli_connect_error();
    } 
    // else {
    //     echo "connection successful";
    // }
?>