<?php
	//include_once ('secure.php');
	include_once ('connect.php');
  include_once ('viewFunc.php');

	$phonebook = $_SESSION['username']."_phonebook";
	if(isset($_GET['sort_number'])){
    view("id", "ASC", $conn, $phonebook);
		return;
	}
	if(isset($_GET['sort_name'])){
      view("fullname", "ASC", $conn, $phonebook);
		return;
	}
	if(isset($_GET['sort_phonenum'])){
      view("phonenumber", "ASC", $conn, $phonebook);
		return;
	}
	if(isset($_GET['sort_phonenum2'])){
      view("phonenumber2", "ASC", $conn, $phonebook);
		return;
	}
	if(isset($_GET['sort_addr'])){
      view("address", "ASC", $conn, $phonebook);
		return;
	}
	if(isset($_GET['sort_email'])){
      view("email", "ASC", $conn, $phonebook);
		return;
	}
	if(isset($_GET['sort_note'])){
      view("info", "ASC", $conn, $phonebook);
		return;
	}
	if(isset($_GET['sort_date'])){
      view("reg_date", "DESC", $conn, $phonebook);
		return;
	}
	$sql = "SELECT * FROM $phonebook";
	$result= $conn->query($sql);
	if ($result) {

		if(isset($_POST["submitsearch"])){
			$forsearch = safestrip($_POST["search"]);
			$sql = <<< SQL
			SELECT *
			FROM  $phonebook
			WHERE
				fullname LIKE '%$forsearch%'
			OR
				phonenumber LIKE '%$forsearch%'
			OR
				email LIKE '%$forsearch%'
SQL;
			$result = $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr>
          <td>".$row["id"]."</td>
          <td>".$row["fullname"]."</td>
          <td><a href=tel:$phone>".$phone."</a></td>
          <td>".$row["phonenumber2"]."</td>
          <td class = 'addrs'>".$row["address"]."</td>
          <td><a href='mailto:$email'>".$email."</a></td>
          <td>".$row["info"]."</td>
          <td>".$row["reg_date"]."</td>
          </tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		else{
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr>
					<td>".$row["id"]."</td>
					<td>".$row["fullname"]."</td>
					<td><a href=tel:$phone>".$phone."</a></td>
					<td>".$row["phonenumber2"]."</td>
					<td class = 'addrs'>".$row["address"]."</td>
					<td><a href='mailto:$email'>".$email."</a></td>
					<td>".$row["info"]."</td>
					<td>".$row["reg_date"]."</td>
					</tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
	}
	else{
		echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
	}
	$conn->close();
?>
