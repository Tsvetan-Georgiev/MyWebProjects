<?php
include_once ("connect.php");
$user = $username;
$user = $user."_phonebook";
//sql to create table
$sql = <<< SQL
CREATE TABLE IF NOT EXISTS $user (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	fullname VARCHAR(100) NOT NULL,
	phonenumber VARCHAR(20) NOT NULL,
	phonenumber2 VARCHAR(20),
	address VARCHAR(200),
	email VARCHAR(50),
	info VARCHAR(350),
	reg_date TIMESTAMP
	)
SQL;
if ($conn->query($sql)===TRUE) {
	echo "<br>";
}
else{
	echo "**** Грешка при създаване на базата";
}

$conn->close();
?>
