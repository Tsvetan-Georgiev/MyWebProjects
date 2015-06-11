<?php 
	$servername = "localhost";
	$username = "tito";
	$password = "masterkey";
	$bd = "contactlist";
	$conn = new mysqli($servername, $username, $password,$bd);
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	$fullname=$phonenumber=$phonenumber2=$address=$email=$info="";
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	$fullname= test_input($_POST["fullname"]);
	$phonenumber= test_input($_POST["phonenumber"]);
	$phonenumber2= $_POST["phonenumber2"];
	$address= test_input($_POST["address"]);
	$email= test_input($_POST["email"]);
	$info= test_input($_POST["info"]);
	$sql = "ALTER TABLE phonebook AUTO_INCREMENT = 1;";
	$sql.= "INSERT INTO Phonebook(fullname, phonenumber, phonenumber2, address, email, info)
	VALUES ('$fullname', '$phonenumber', '$phonenumber2', '$address', '$email', '$info')";
	if ($conn->multi_query($sql)===TRUE) {
		echo "New record created successfully";
		header("location: ../newcontact.php?sent=true");
	}
	else{
		echo "**** Error: ".$sql."<br>".$conn->error;
		header("location: ../newcontact.php?sent=true");
	}

	$conn->close();
?>