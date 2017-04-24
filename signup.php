<?php
	include 'header.php';
?>
	<div class="container">
	
<?php
	
	$url = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	
	if(strpos($url, 'error=empty') !== false)
	{
		echo "There are missing fields that are required.";
	}
	elseif(strpos($url, 'error=username') !== false)
	{
		echo "Username already exists!";
	}
	
	if (isset($_SESSION['id'])) {
		echo "<div style='color: white; margin: auto; position: absolute; top:0; bottom:20%; right:0; left:0; width: 350px; height: 496px;'><h1> :( <br><br>  Sorry, you are already logged in....</h1></div>";
	}
	else
	{
		echo "
		<div id='signupForm'class='panel' style='display: none; color: grey; margin: auto; position: absolute; top:0; bottom:0; right:0; left:0; width: 350px; height: 496px;'>
		<div class='panel-heading bg-primary'><h2>Signup</h2></div>
		<div class='panel-body'>
			<form action='includes/signup.inc.php' method='POST'>
				<div class='form-group' style='width:200px; margin: auto;'>
					<label for='first'>Firstname:</label>
					<input type='text' class='form-control' name='first' placeholder='Firstname'>
				</div>
				<br>
				<div class='form-group' style='width:200px; margin: auto;'>
					<label for='last'>Lastname:</label>
					<input type='text' class='form-control' name='last' placeholder='Lastname'></input>
				</div>
				<br>
				<div class='form-group' style='width:200px; margin: auto;'>
					<label for='uid'>Username:</label>
					<input type='text' class='form-control' name='uid' placeholder='Username'></input>
				</div>
				<br>
				<div class='form-group' style='width:200px; margin: auto;'>
				<label for='pwd'>Password:</label>
					<input type='password' class='form-control' name='pwd' placeholder='Password'></input>
				</div>
				<br>
				<div class='form-group text-center'>
					<button type='submit' class='btn btn-primary'>Signup</button>
					<div class='small' style='padding: 16px'>
						<a href='index.php'>Already have an account? </a>
					</div>
				</div>
			</form>
		</div>
		</div>";
	}

	include 'footer.php';
?>
