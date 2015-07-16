<?php 
	$servername = "localhost";
	$username = "tito";
	$password = "masterkey";
	$bd = "contactlist";
	$conn = new mysqli($servername, $username, $password,$bd);
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	mysqli_set_charset( $conn,"UTF8" );
	$forUpdate=$_POST["forUpdate"];
	$fullname=$phonenumber=$phonenumber2=$address=$email=$info="";
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	$fullname= test_input($_POST["fullname"]);
	$phonenumber= test_input($_POST["phonenumber"]);
	$phonenumber2= test_input($_POST["phonenumber2"]);
	$address= test_input($_POST["address"]);
	$email= test_input($_POST["email"]);
	$info= test_input($_POST["info"]);
	if ($fullname!='') {
		$sql = "UPDATE Phonebook SET fullname='$fullname' WHERE id=$forUpdate;";
	}
	if ($phonenumber!='') {
		$sql .= "UPDATE Phonebook SET phonenumber='$phonenumber' WHERE id=$forUpdate;";
	}
	if ($phonenumber!='') {
		$sql .= "UPDATE Phonebook SET phonenumber2='$phonenumber2' WHERE id=$forUpdate;";
	}
	if ($address!='') {
		$sql .= "UPDATE Phonebook SET address='$address' WHERE id=$forUpdate;";
	}
	if ($email!='') {
		$sql .= "UPDATE Phonebook SET email='$email' WHERE id=$forUpdate;";
	}
	if ($info!='') {
		$sql .= "UPDATE Phonebook SET info='$info' WHERE id=$forUpdate;";
	}
	if ($conn->multi_query($sql)===TRUE) {
		echo "Record ".$forUpdate." updated successfully";
		header("location: ../edit.php?sent=true");
	}
	else{
		echo "Error updated record: ".$conn->error;
		header("location: ../edit.php?sent=false");
	}
	$conn->close();

?>