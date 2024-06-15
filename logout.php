<?php
session_start();
session_unset();
session_destroy();
header("location: /Learners_Space24/index.php");
exit();
?>
