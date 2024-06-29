<!-- <?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email=$_POST['loginemail'];
    $password=$_POST['password'];

      
  
    $sql="SELECT * FROM `learnerspace_2024_reg` WHERE user_email='$email'";
    $result=mysqli_query($conn ,$sql);
    $numRows=mysqli_num_rows($result);
    if($numRows == 1){
       $row =mysqli_fetch_assoc($result);
       if(password_verify($password,$row['password'])){
           session_start();
           $_SESSION['loggedin']=true;
           $_SESSION['id']=$row['id'];
           $_SESSION['user_email']=$email;
           $_SESSION['user_gmail']=$email;
           echo "loged in".$email;
       }
       header ("location: /index.php");
    }
}


?> -->