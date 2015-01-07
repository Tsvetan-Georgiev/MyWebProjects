<?php 
	$servername = "localhost";
	$username = "tito";
	$password = "masterkey";
	$bd = "contactlist";
	$conn = new mysqli($servername, $username, $password,$bd);
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	$sql = "SELECT * FROM Phonebook";
	$result= $conn->query($sql);
	if ($result->num_rows>0) {
		while($row=$result->fetch_assoc()){
			echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td>".$row["phonenumber"]."</td><td>".$row["phonenumber2"]."</td><td>".$row["address"]."</td><td>".$row["email"]."</td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
		}
	}
	else{
		echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
	}
	$conn->close();
?>