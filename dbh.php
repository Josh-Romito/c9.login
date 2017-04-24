<?php
	$conn = mysqli_connect("127.0.0.1", "root", "meterpreter", "c9");
	
	if (!$conn)
	{
		die("Connection failed: ".mysqli_connect_error());
	}
?>