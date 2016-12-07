<?php
	include_once ('connect.php');
	include_once ('secure.php');
	$phonebook = $_SESSION['username']."_phonebook";
	$forUpdate=$_POST["forUpdate"];
	$fullname=$phonenumber=$phonenumber2=$address=$email=$info="";
	$fullname= safestrip($_POST["fullname"]);
	$phonenumber= safestrip($_POST["phonenumber"]);
	$phonenumber2= safestrip($_POST["phonenumber2"]);
	$address= safestrip($_POST["address"]);
	$email= safestrip($_POST["email"]);
	$info= safestrip($_POST["info"]);
	if ($fullname!='') {
		$sql = "UPDATE $phonebook SET fullname='$fullname' WHERE id=$forUpdate;";
	}
	if ($phonenumber!='') {
		$sql .= "UPDATE $phonebook SET phonenumber='$phonenumber' WHERE id=$forUpdate;";
	}
	if ($phonenumber!='') {
		$sql .= "UPDATE $phonebook SET phonenumber2='$phonenumber2' WHERE id=$forUpdate;";
	}
	if ($address!='') {
		$sql .= "UPDATE $phonebook SET address='$address' WHERE id=$forUpdate;";
	}
	if ($email!='') {
		$sql .= "UPDATE $phonebook SET email='$email' WHERE id=$forUpdate;";
	}
	if ($info!='') {
		$sql .= "UPDATE $phonebook SET info='$info' WHERE id=$forUpdate;";
	}
	if ($conn->multi_query($sql)===TRUE) {
		echo "Записът ".$forUpdate." обновен успешно";
		header("location: ../edit.php?sent=true");
	}
	else{
		echo "Грешка при обновяване на записът: ".$conn->error;
		header("location: ../edit.php?sent=false");
	}
	$conn->close();

?>
