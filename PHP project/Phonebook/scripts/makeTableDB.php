<?php 
$servername = "localhost";
$username = "tito";
$password = "masterkey";
$bd = "contactlist";
$conn = new mysqli($servername, $username, $password,$bd);
if ($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
//sql to create table
$sql = "CREATE TABLE IF NOT EXISTS Phonebook (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	fullname VARCHAR(100) NOT NULL,
	phonenumber VARCHAR(20) NOT NULL,
	phonenumber2 VARCHAR(20),
	address VARCHAR(200),
	email VARCHAR(50),
	info VARCHAR(350),
	reg_date TIMESTAMP
	)";
if ($conn->query($sql)===TRUE) {
	$last_id = $conn->insert_id;
	echo "Table Phonebook successfully. Last inserted ID is: " . $last_id;
}
else{
	echo "**** Error creating table: ".$conn->error;
}

$conn->close();
?>