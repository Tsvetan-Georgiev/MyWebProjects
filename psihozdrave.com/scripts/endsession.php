<?php
	include_once('connect.php');
	include_once('session.php');
	session_destroy();
	header("location: ../administration/adminpanel.php");
?>