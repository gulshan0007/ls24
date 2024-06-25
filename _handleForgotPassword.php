<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Display a form to enter the email for which the password is forgotten
    echo '<div style="text-align:center;margin-top:20%;">
            <h3>Forgot Password</h3>
            <form action="./_handleForgotPassword.php" method="post">
                <label for="email">Enter your Roll No.:</label>
                <input type="text" id="email" name="email" required>
                <button type="submit">Submit</button>
            </form>
          </div>';
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    
    // Check if the email exists
    $sql = "SELECT * FROM `learnerspace_2024_reg` WHERE user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    
    if ($numRows == 1) {
        // Delete the user's registration details
        $deleteSql = "DELETE FROM `learnerspace_2024_reg` WHERE user_email='$email'";
        $deleteResult = mysqli_query($conn, $deleteSql);
        
        if ($deleteResult) {
            echo '<div style="text-align:center;margin-top:20%;">
                    <h3>Account Deleted</h3>
                    <p>Your account has been successfully deleted.</p>
                    <p>You can register again.</p>
                    <a href="./index.php">Go to Home</a>
                  </div>';
        } else {
            echo '<div style="text-align:center;margin-top:20%;">
                    <h3>Error</h3>
                    <p>There was an error deleting your account. Please try again.</p>
                    <a href="./index.php">Go to Home</a>
                  </div>';
        }
    } else {
        echo '<div style="text-align:center;margin-top:20%;">
                <h3>Error</h3>
                <p>No account found with this Roll No.. Please try again.</p>
                <a href="./index.php">Go to Home</a>
              </div>';
    }
}
?>
