<?php
	session_start();
	if (isset($_SESSION['id'])) {
		
	include '../dbh.php';

		
	include '../header.php';
	
	
	include 'thoughts.php';
	
	
	include '../footer.php';
	}
	else
	{
		header("Location:https://login-jrom.c9users.io/index.php");
	}


?>



