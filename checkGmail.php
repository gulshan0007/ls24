<?php
  session_start();
  $emails = $_SESSION['email2'];

  function check_gmail($email){
    if (strpos($email, 'gmail.com')){
      // Gmail exists
      $_SESSION['gmail'] = $email;
      return 1;
    }
    else{
      return 0;
    }
  }

  function check_all_emails($emails){
    $N_EMAILS = count($emails);
    if ($N_EMAILS > 0){
      for ($i = 0; $i < $N_EMAILS ; $i++) {
        $email = $emails[$i]['email'];
        echo "Email ".$i." : ".$email."<br>";
        if (check_gmail($email)){
          return 1; // Gmail ID exists
        }
      }
    } else {
      return 0;
    }
  }
?>
