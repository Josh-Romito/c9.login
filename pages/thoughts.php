<?php
      include '../dbh.php';
      if(!isset($_SESSION)){session_start();}
?>
<div id='sideMenu' class='well bs-sidebar affix'>
      <ul class='nav nav-pills nav-stacked'>
        
          <li><a href='#'>Post General</a></li>
      </ul>
</div> <!--well bs-sidebar affix-->

<script>
      
      
</script>
<div id='userPanel' class='panel'>
	<div class='panel-heading'>
	      <h1>Write a thought..?</h1>
	</div>
	<!-- body -->
	<div class='commentPANEL panel-body'>
      	<div id="commentAlert" class="alert alert-danger">
              <strong>No comment!</strong> C'mon, you could at least write something first!
            </div>
            
      	<form name="commentForm" action="https://login-jrom.c9users.io/includes/comments.inc.php" method="POST" onsubmit="return validate()">
                  <div class="form-group">
                        <label for="comment">I think...</label>
                        <textarea name="comment" class="form-control" rows="5" id="comment"></textarea>
                  </div>
                  <div class="form-group">
                        <button type="submit" class="btn btn-danger">Post</button>
                  </div>
            </form>
            <hr/>
            <?php
                  $sql = "SELECT * FROM profileimg";
                  $sqlJoin = "SELECT *
                              FROM users a, comments b
                              WHERE a.id = b.userID
                              ORDER BY b.date DESC";
                   $joinResult = mysqli_query($conn, $sqlJoin);
                   $joinRows = array();
                   
                   while($joinRow = mysqli_fetch_array($joinResult))
                        {
                              $joinRows[] = $joinRow;
                        }
                  
                  foreach($joinRows as $row)
                  {
                        
                        $img = $row['setIMG'];
                        $commentID = $row['commentID'];
                        $comment = $row['comment'];
                        $id = $row['id'];
                        $user = $row['uid'];
                        $replyID = ['replyID'];
                        $commentDate = $row['date'];
                        $commentLikes = $row['likes'];
                        $commentDislikes = $row['dislikes'];
                        $link;
                        
                        if($img !== NULL) { $link = $id.".png"; } elseif($img === NULL){ $link = "default.png"; }
                        echo "
                                    <div class='comment'>
                                          <div style='float:right;'><a href='#'><span class='glyphicon glyphicon-thumbs-down'></span> Dislike </a></div>
                                          <div style='float:right; padding-right:16px;'><a href='#'><span class='glyphicon glyphicon-thumbs-up'></span> Like </a></div>
                                          <img class='commentIMG img img-circle' src='https://login-jrom.c9users.io/userIMG/".$link."?".rand()."'>
                                          <h1 class='commentUSER'>".$user.""."<p class='small'>Thought: </p></h1>
                                          <div><p>".$comment."</p></div><br>
                                          <div class='commentDATE small'>".$commentDate."</div>
                                          <button class='reply-btn btn' data-toggle='collapse' data-target='#".$commentID."'>Reply</button>
                                          <br>
                                          <form id='".$commentID."' class='replyComment panel-collapse collapse' name='replyForm'>
                                              <div class='form-group'>
                                              <br>
                                                <label for='reply'>I think...</label>
                                                <textarea name='reply' class='form-control' rows='5'></textarea>
                                                <br/>
                                                <button type='submit' class='btn'>Post Reply</button>
                                              </div>
                                          </form>
                                          <br>
                                    </div>      
                                          
                                                
                                          
                                    
                              
                              <hr/>";
                         
                         
                              
                  }
                  
                 
            
            ?>
            
	</div>
</div>