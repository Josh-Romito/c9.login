<?php
    if(!isset($_SESSION)){session_start();}
	
	include '../dbh.php';

    
			
			if (!isset($_SESSION['id'])) {
				
				$pageCheck = 'https://' . $_SERVER['https_HOST'] . $_SERVER['REQUEST_URI'];
			if(strpos($pageCheck, 'signup.php') !== false)
				{
						echo "<li><a href='https://login-jrom.c9users.io/'>
							
						<button type='submit' class='btn btn-primary btn-md'><span class='glyphicon glyphicon-log-in'></span></button>	
							
					  </a></li>";
				}
				else {
					echo "<li><a href='https://login-jrom.c9users.io/signup.php'>
							
						<button type='submit' class='btn btn-primary btn-md'>Signup</button>	
							
					  </a></li>";
				}
			
			}
			else
			{
				echo "<li><a href='https://login-jrom.c9users.io/includes/logout.inc.php'>
						<span class='glyphicon glyphicon-log-in'></span>	
							
					  </a></li>";
				
				$userID = $_SESSION['id'];
				$sqlImg = "SELECT * FROM profileimg WHERE profuid='$userID'";
				$result = mysqli_query($conn, $sqlImg);
				if ($row = $result->fetch_assoc())
				{
					$ext = $row['ext'];
					echo "	<li id='profilePOP'><a href=#'>";
						if($row['profuid'] == $userID)
						{
							echo "<img id='profileIMG' src='https://login-jrom.c9users.io/userIMG/".$_SESSION['id'].".".$ext."' class='img img-circle'>	";
						}
						
					
							
						
					
					echo "		</a></li>";
				}
				else{
						echo "	<li id='profilePOP'><a href=#'><img id='profileIMG' src='https://login-jrom.c9users.io/userIMG/default.png' class='img img-circle'>	</a></li>	";
					}
	
			}
			

?>