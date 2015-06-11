<?php 
	$servername = "localhost";
	$username = "tito";
	$password = "masterkey";
	$bd = "contactlist";
	$conn = new mysqli($servername, $username, $password,$bd);
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	$forDelete=$_POST["forRemove"];
	if ($forDelete!=null) {
		$sql = "DELETE FROM Phonebook WHERE id=$forDelete";
	}
	else{
		header("location: ../remove.php?sent=false");
	}
	if ($conn->query($sql)===TRUE) {
		echo "Record ".$forDelete." deleted successfully";
		header("location: ../remove.php?sent=true");
	}
	else{
		echo "Error deleting record: ".$conn->error;
		header("location: ../remove.php?sent=false");
	}
	$conn->close();
?>