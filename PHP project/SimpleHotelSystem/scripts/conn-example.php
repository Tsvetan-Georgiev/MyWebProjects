<?php
 $conn = new mysqli($servername, $username, $password,$bd)
  or die("Няма връзка. " . $conn->connect_error);
  mysqli_set_charset( $conn,"UTF8" );
?>
