<?php  
session_start();
session_destroy();
header("location:mess_login.php");

?>