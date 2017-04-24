<?php
	if(!isset($_SESSION))
	{
		session_start();
	 
	}
	elseif(isset($_SESSION)){
		
	
	
	}

include 'dbh.php';
?>

<!DOCTYPE html>
<html>
<head id='refresh'>
	<title>
		<?php

		?>
	</title>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://login-jrom.c9users.io/styles/userStyle.css">
	<script type="text/javascript" src="https://login-jrom.c9users.io/js/validate.js"></script>
	<script>
		
		
	$(document).ready(function(){
		//$("nav").load("header.php nav");
		//$("nav").load("userStyle.css nav");
		$("#sideMenu").slideToggle("slow");
		$("#userPanel").slideToggle("slow");
		$("#signupForm").slideToggle("slow");
		$("#loginForm").slideToggle("slow");
		$("#login").click(function()
		{
			$(".panel").slideUp(1000);
		});
		
		$("#profilePOP").popover({
	        placement: 'bottom',
	        html: 'true',
	        title : '',
	        content : 
	        		  '<p><?php echo $_SESSION['uid']."</p>"; ?>'+
	        		  '<div class="row"><div style="padding:5px;"><img id="profileIMGpop" class="col-6-xs profIMG img img-circle" data-toggle="modal" data-target="#myModal" src="https://login-jrom.c9users.io/userIMG/<?php if(isset($_SESSION['ext'])) {echo $_SESSION['id'].".png?".rand(); } elseif(!isset($_SESSION['ext'])){echo "default.png"; } ?>"><div id="popNAME"><h5><strong><?php echo $_SESSION['first']." ".$_SESSION['last']; ?></strong></h5>'+
	        		  '<a href="https://login-jrom.c9users.io/pages/userINDEX.php" class="btn btn-warning">Profile </a><p></p>'+
					  '<button style="color:white;" type="button" data-toggle="modal" data-target="#myModal" id="upload" class="btn btn-primary"> Change Image</button>'+
	        		  '</div></div></div>'+
					  
					  
					  "<div style='width: 100%;' class='text-center'><a href='https://login-jrom.c9users.io/includes/logout.inc.php'><span style='color:grey; float:right;'class='glyphicon glyphicon-log-out'></span></a></div>"+
					  '</div>'+
					  ''
			
			    });
			});	
		
	</script>
</head> 
	
<body class="bg-primary">
<header>
<nav class="navbar navbar-inverse navbar-fixed-top navbar-static-top">
	 
	 
	
  
  
	<div class="container-fluid">
		<!--<div class="navbar-header">
			<a class="navbar-brand" href="index.php">ROM</a>
		</div>-->
		<ul id="nav-item" class="nav navbar-nav">
		<?php
			if (isset($_SESSION['id']))
			{
				echo "<div id='pageLOGO'><li><a href='https://login-jrom.c9users.io/pages/userINDEX.php'>.ROM</a></li></div>
				<li><a href='https://login-jrom.c9users.io/pages/userINDEX.php'>Home</a></li>
				<li><a href='https://login-jrom.c9users.io/pages/thoughtsINDEX.php'>Thought cloud...?</a></li>";
			}
			else{
				echo "<div id='pageLOGO'><li><a href='https://login-jrom.c9users.io/index.php'>.ROM</></a></li></div>
				
				<li><a href='https://login-jrom.c9users.io/index.php'>Home</a></li>";
			}
		?>
		</ul>
		<ul id="nav-item" class="nav navbar-nav navbar-right">
			<?php
			
			if (!isset($_SESSION['id'])) {
				
				$pageCheck = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				if(strpos($pageCheck, 'signup.php') !== false)
					{
							echo "<li>
								
							<a href='https://login-jrom.c9users.io/' class='glyphicon glyphicon-log-in'></a>
								
						  </li>";
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
						<span class='glyphicon glyphicon-log-out'></span>	
							
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
							echo "<img id='profileIMG' src='https://login-jrom.c9users.io/userIMG/".$_SESSION['id'].".".$ext."?".rand()."' class='img img-circle'>	";
						}
						
					
							
						
					
					echo "		</a></li>";
				}
				else{
						echo "	<li id='profilePOP'><a href=#'><img id='profileIMG' src='https://login-jrom.c9users.io/userIMG/default.png' class='img img-circle'>	</a></li>	";
					}
	
			}
			?>
		</ul>
	</div>
</nav>
 <!-- Modal Start -->
  <div class='modal fade' id='myModal' role='dialog'>
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Upload...</h4>
        </div>
        <div class='modal-body' style='padding:16px'>
          <form id='uploadForm' action='https://login-jrom.c9users.io/userIMG/upload.php' method='POST' enctype='multipart/form-data'>
        	<p>Browse to find a file (.jpg, .jpeg, .png, .txt)</p>
        	<input id='upload' type='file' name='file'><br>
        	<button name='submit' onclick='$(".navbar").load("header.php");' type='submit' class='btn btn-primary'>Upload</button>
        	<input type="hidden" name="destination" value="<?php echo $_SERVER["REQUEST_URI"]; ?>"/>
          </form>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
</header>