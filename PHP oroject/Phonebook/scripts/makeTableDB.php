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
$sql = "CREATE TABLE Phonebook (
	id INT(6) UNSIGNED AUTO_INCREMENT=1 PRIMARY KEY,
	fullname varchar(100) NOT NULL,
	phonenumber INT(12) NOT NULL,
	phonenumber2 INT(12),
	address VARCHAR(50),
	email VARCHAR(50),
	info varchar(200),
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