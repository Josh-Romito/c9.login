

<div id='loginForm' class="panel" \
 style="display: none;
        position: absolute;
        color: grey; 
        margin: auto; 
        width: 350px;
        height: 356px; 
        top:0; 
        bottom:0; 
        left:0; 
        right:0;">
	<div class="panel-heading bg-primary"><h2>Login</h2></div>
	<div class="panel-body">
		<form name="login" action="includes/login.inc.php" method="POST" onsubmit="return ">
			<div class="form-group" style="width:200px; margin: auto;">
				<label for="uid">Username:</label>
				<input type="text" class="form-control" name="uid" placeholder="Username"></input>
			</div>
			<br/>
			<div class="form-group" style="width:200px; margin: auto;">
			<label for="pwd">Password:</label>
				<input type="password" class="form-control" name="pwd" placeholder="Password"></input>
			</div>
			<br>
			<div class="form-group text-center">
				<button id="login"type="submit" onclick="DoSomething();"class="btn btn-primary">Log in</button>
				<div class="small" style="padding: 16px">
					<a href="signup.php">Not registered? Signup here!</a>
				</div>
			</div>
		</form>
	</div>
</div>
