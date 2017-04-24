<?php
	include 'header.php';
?>

<div class="container">
<?php
	$url = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	if(strpos($url, 'error=invalid') !== false)
	{
		echo "<br><br><br><br><br>Your username or password is incorrect";
	}
	elseif(strpos($url, 'success') !== false)
	{
		echo "<br><br><br><br><br><div id='signupSuccess' class='alert alert-success text-center'>
				<h4>Account creation was successful. Login in to continue...</h4>
			  </div>";
	}
?>


<?php
	if(!isset($_SESSION['id']))
	{
		include 'login.php';
	}
	
	else {
		//header("Location: https://login-jrom.c9users.io/pages/userINDEX.php");
	}


?>


			

<?php
	include 'footer.php';
?>
