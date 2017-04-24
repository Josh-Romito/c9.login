<?php
	session_start();
	if (isset($_SESSION['id'])) {
		
	include '../dbh.php';

		
	include '../header.php';
	
	
	include 'user.php';
	
	
	include '../footer.php';
	}
	else
	{
		header("Location: https://login-jrom.c9users.io/");
	}
	
	
?>
