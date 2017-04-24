<link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
<footer id="footer" style='text-align: center' class='navbar-inverse navbar-fixed-bottom text-center'>
	<div class='container-fluid' style='height:50px;'>
		<ul class='nav navbar-nav'>
			<li><a href='index.php'>
			<?php
				if (isset($_SESSION['id'])) {
					echo "UserID:".$_SESSION['id'];
				}
				else
				{
					echo "Not logged in....";
				}
				?>
				   </a>
		   </li>
		</ul>
	</div>
</footer>
</div>





</body>	
</html>
			
	
			
				
			
			
			