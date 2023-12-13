<?php
    $dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "healthcare";

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

	if(mysqli_connect_errno()){
		echo "Failed to connect to mysql : " . mysqli_connect_error();
	}
?>