<?php
session_start();
include '../dbh.php';


if(!isset($_SESSION['id'])){
    header("Location: https://login-jrom.c9users.io");
}

?>
<script>
</script>
	<div id='sideMenu' class='well bs-sidebar'>
      <ul class='nav nav-pills nav-stacked'>
         <!-- Trigger the modal with a button -->
          
      </ul>
    </div> <!--well bs-sidebar affix-->
	<div id='userPanel' class='panel'>
		<div class='panel-heading'>
			
			<?php
			    echo '<h1>'.$_SESSION['first'].' '.$_SESSION['last'].'</h1>';
			?>
			<hr/>
		</div>
		<div class='panel-body'>
		  <?php
		    echo '<h1> '.$_SESSION['uid'].' thought: </h1><br><hr>';
		    $ID = $_SESSION['id'];
		    
		    $count = "SELECT COUNT(*) FROM comments WHERE userID = $ID";
		    $sql = "SELECT * FROM comments WHERE userID = $ID or 1 = 1 ; -- ORDER BY date DESC; ";
		    
		    $result = mysqli_query($conn, $sql);
		    
		    while($row = mysqli_fetch_array($result))
		    {
		    	
		    	$user = $_SESSION['uid'];
		    	$comment = $row['comment'];
		    	$commentDate = $row["date"];
		    	echo "
		    	
		    	 <div class='comment'>
	                  <div style='float:right;'><a href='#'><span class='glyphicon glyphicon-thumbs-down'></span> Dislike </a></div>
	                  <div style='float:right; padding-right:16px;'><a href='#'><span class='glyphicon glyphicon-thumbs-up'></span> Like </a></div>
	                  <img class='commentIMG img img-circle' src='https://login-jrom.c9users.io/userIMG/".$_SESSION['id'].".png?".rand()."'>
	                  <h1 class='commentUSER'>".$user.""."</h1>
	                  <div><p>".$comment."</p></div><br>
	                  <div class='commentDATE small'>".$commentDate."</div>
	                  <hr>
	                  <br>
	            </div>
		    	";
		    }
		  ?>
		</div>
	</div>