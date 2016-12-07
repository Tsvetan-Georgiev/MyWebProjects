<?php
	include_once('connect.php');
	$phonebook = $_SESSION['username']."_phonebook";
	$forDelete=$_POST["forRemove"];
	if ($forDelete!=null) {
		$sql = "DELETE FROM $phonebook WHERE id=$forDelete";
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
