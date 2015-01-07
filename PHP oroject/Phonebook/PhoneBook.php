<?php 
$servername="localhost";
$id="id";
$username = "username";
$password="password";
$phonenumber="phonenumber";
$phonenumber2="phonenumber2";
$address="address";
$info="info";
//create connection
$conn= new mysqli($servername,$username,$password);
//check conn
if ($conn->connect_error) {
	echo "Database created successfully";	
}
else{
	echo "Error creating database: ".$conn->error;
}
$conn->close();
?>