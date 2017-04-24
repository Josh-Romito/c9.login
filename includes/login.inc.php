<?php
	session_start(); 

	include '../dbh.php';
	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];
	
	
	$sql = "SELECT * FROM users WHERE uid='$uid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	$hash_pwd = $row['pwd'];
	$hash = password_verify($pwd, $hash_pwd);
	
	if ($hash == 0)
	{
		header("Location: ../index.php?error=invalid");
		exit();
	}
	else {
		
		$sql = "SELECT * FROM users WHERE uid='$uid' AND pwd='$hash_pwd'";
		$result = mysqli_query($conn, $sql);
		
		if (!$row = $result->fetch_assoc()) {
			header("Location: ../index.php?error=invalid");
			exit();
		}
		else {
			$_SESSION['id'] = $row['id'];
			$_SESSION['first'] = $row['first'];
			$_SESSION['last'] = $row['last'];
			$_SESSION['uid'] = $row['uid'];
			$_SESSION['pwd'] = $row['pwd'];
			
			sleep(1);
		}
		
		$tempID = $_SESSION['id'];
		$sqlFIND = "SELECT * FROM profileimg WHERE profuid='$tempID'";
		//$rowIMG = $findResult->fetch_assoc();
		$findResult = mysqli_query($conn, $sqlFIND);
		
		if (!$rowIMG = $findResult->fetch_assoc()) {
			
			$_SESSION['ext'] = $rowIMG['ext'];
			header("Location: https://login-jrom.c9users.io/userINDEX.php");
			
		}
		else{
			$_SESSION['ext'] = $rowIMG['ext'];
			header("Location: ../pages/userINDEX.php");
			die();
		}
		
		
		
		header("Location: ../pages/userINDEX.php");
	}
?>