<?php
session_start();
// set time-out period (in seconds)
$inactive = 5400;
 
// check to see if $_SESSION["timeout"] is set
if (isset($_SESSION["timeout"])) {
    // calculate the session's "time to live"
    $sessionTTL = time() - $_SESSION["timeout"];
    if ($sessionTTL > $inactive) {
        session_destroy();
        header("Location: /administration/adminpanel.php");
    }
}
$_SESSION["timeout"] = time();
function loggedin(){
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
		return true;
	}
	else {
		return false;
	}
}