<?php
	include_once ('secure.php');
	include_once ('connect.php');
	$fullname=$phonenumber=$phonenumber2=$address=$email=$info="";
	$fullname= safestrip($_POST["fullname"]);
	$phonenumber= safestrip($_POST["phonenumber"]);
	$phonenumber2= $_POST["phonenumber2"];
	$address= safestrip($_POST["address"]);
	$email= safestrip($_POST["email"]);
	$info= safestrip($_POST["info"]);
	$phonebook = $_SESSION['username']."_phonebook";
	$sql = "ALTER TABLE $phonebook AUTO_INCREMENT = 1;";
	$sql.= "INSERT INTO $phonebook(fullname, phonenumber, phonenumber2, address, email, info)
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
