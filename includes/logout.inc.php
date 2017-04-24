<?php
	session_start(); 
	session_destroy();
	header("Location: https://login-jrom.c9users.io/index.php");
	
?>