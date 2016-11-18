<?php
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$bd = "database_name";
	$conn = new mysqli($servername, $username, $password,$bd);
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	mysqli_set_charset( $conn,"UTF8" );
?>
