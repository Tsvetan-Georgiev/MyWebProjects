<?php 
$servername="localhost";
$id="id";
$username = "tito";
$password="masterkey";
$phonenumber="phonenumber";
$phonenumber2="phonenumber2";
$address="address";
$info="info";
//create connection
$conn= new mysqli($servername,$username,$password);
//check conn
if ($conn->connect_error) {
	die("******Connection failed: ".$conn->connect_error);
}
//Create database
$sql="CREATE DATABASE Contactlist";
if ($conn->query($sql)===TRUE) {
	echo "Database created successfully";	
}
else{
	echo "Error creating database: ".$conn->error;
}
$conn->close();
?>