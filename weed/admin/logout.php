<?php
session_start();
unset($_SESSION['wadmin']);
 if(session_destroy()){	
     header("location: login.php");
     die();
 }
?>


