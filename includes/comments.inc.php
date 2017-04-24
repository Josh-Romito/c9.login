<?php
    session_start();
    include '../dbh.php';
    
    $comment = $_POST['comment'];
    $uid = $_SESSION['id'];
    $likes = 0;
    $dislikes = 0;
    $replyID = 0;
    
    
    
    $sql = "INSERT INTO comments (userID, comment, likes, dislikes, replyID)
            VALUES ('$uid', '$comment', '$likes', '$dislikes', '$replyID')";
            
    $result = mysqli_query($conn, $sql);
    header("Location: https://login-jrom.c9users.io/pages/thoughtsINDEX.php?=commentSUCCESS/");
    
?>