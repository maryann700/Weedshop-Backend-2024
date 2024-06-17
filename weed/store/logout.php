<?php
session_start();
unset($_SESSION['store']);
if(session_destroy()){	
	header("Location: login.php");
	exit;
}
?>


