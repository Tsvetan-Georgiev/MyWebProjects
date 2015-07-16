<?php 
	include_once ('test_input_func.php');
	$servername = "localhost";
	$username = "tito";
	$password = "masterkey";
	$bd = "contactlist";
	$conn = new mysqli($servername, $username, $password,$bd);
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	mysqli_set_charset( $conn,"UTF8" );
	if(isset($_GET['sort_number'])){
		if(isset($_POST["submitsearch"])){
			$forsearch = test_input($_POST["search"]);
			$sql = <<< SQL
			SELECT * 
			FROM  Phonebook 
			WHERE 
				fullname LIKE '%$forsearch%'
			OR
				phonenumber LIKE '%$forsearch%'
			OR
				email LIKE '%$forsearch%'
			ORDER BY id ASC
SQL;
			$result = $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		else{
			$sql = <<<SQL
			SELECT * 
			FROM Phonebook
			ORDER BY id ASC
SQL;
			$result= $conn->query($sql);
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
		return;
	}
	
	if(isset($_GET['sort_name'])){
		if(isset($_POST["submitsearch"])){
			$forsearch = test_input($_POST["search"]);
			$sql = <<< SQL
			SELECT * 
			FROM  Phonebook 
			WHERE 
				fullname LIKE '%$forsearch%'
			OR
				phonenumber LIKE '%$forsearch%'
			OR
				email LIKE '%$forsearch%'
			ORDER BY fullname ASC
SQL;
			$result = $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		else{
			$sql = <<<SQL
			SELECT * 
			FROM Phonebook
			ORDER BY fullname ASC
SQL;
			$result= $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		return;
	}
	
	if(isset($_GET['sort_phonenum'])){
		if(isset($_POST["submitsearch"])){
			$forsearch = test_input($_POST["search"]);
			$sql = <<< SQL
			SELECT * 
			FROM  Phonebook 
			WHERE 
				fullname LIKE '%$forsearch%'
			OR
				phonenumber LIKE '%$forsearch%'
			OR
				email LIKE '%$forsearch%'
			ORDER BY phonenumber ASC
SQL;
			$result = $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		else{
			$sql = <<<SQL
			SELECT * 
			FROM Phonebook
			ORDER BY phonenumber ASC
SQL;
			$result= $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		return;
	}
	
	if(isset($_GET['sort_phonenum2'])){
		if(isset($_POST["submitsearch"])){
			$forsearch = test_input($_POST["search"]);
			$sql = <<< SQL
			SELECT * 
			FROM  Phonebook 
			WHERE 
				fullname LIKE '%$forsearch%'
			OR
				phonenumber LIKE '%$forsearch%'
			OR
				email LIKE '%$forsearch%'
			ORDER BY phonenumber2 ASC
SQL;
			$result = $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		else{
			$sql = <<<SQL
			SELECT * 
			FROM Phonebook
			ORDER BY phonenumber2 ASC
SQL;
			$result= $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		return;
	}
	if(isset($_GET['sort_addr'])){
		if(isset($_POST["submitsearch"])){
			$forsearch = test_input($_POST["search"]);
			$sql = <<< SQL
			SELECT * 
			FROM  Phonebook 
			WHERE 
				fullname LIKE '%$forsearch%'
			OR
				phonenumber LIKE '%$forsearch%'
			OR
				email LIKE '%$forsearch%'
			ORDER BY address ASC
SQL;
			$result = $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		else{
			$sql = <<<SQL
			SELECT * 
			FROM Phonebook
			ORDER BY address ASC
SQL;
			$result= $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		return;
	}
	
	if(isset($_GET['sort_email'])){
		if(isset($_POST["submitsearch"])){
			$forsearch = test_input($_POST["search"]);
			$sql = <<< SQL
			SELECT * 
			FROM  Phonebook 
			WHERE 
				fullname LIKE '%$forsearch%'
			OR
				phonenumber LIKE '%$forsearch%'
			OR
				email LIKE '%$forsearch%'
			ORDER BY email ASC
SQL;
			$result = $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		else{
			$sql = <<<SQL
			SELECT * 
			FROM Phonebook
			ORDER BY email ASC
SQL;
			$result= $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		return;
	}
	
	if(isset($_GET['sort_note'])){
		if(isset($_POST["submitsearch"])){
			$forsearch = test_input($_POST["search"]);
			$sql = <<< SQL
			SELECT * 
			FROM  Phonebook 
			WHERE 
				fullname LIKE '%$forsearch%'
			OR
				phonenumber LIKE '%$forsearch%'
			OR
				email LIKE '%$forsearch%'
			ORDER BY info ASC
SQL;
			$result = $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		else{
			$sql = <<<SQL
			SELECT * 
			FROM Phonebook
			ORDER BY info ASC
SQL;
			$result= $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		return;
	}
	if(isset($_GET['sort_date'])){
		if(isset($_POST["submitsearch"])){
			$forsearch = test_input($_POST["search"]);
			$sql = <<< SQL
			SELECT * 
			FROM  Phonebook 
			WHERE 
				fullname LIKE '%$forsearch%'
			OR
				phonenumber LIKE '%$forsearch%'
			OR
				email LIKE '%$forsearch%'
			ORDER BY reg_date DESC
SQL;
			$result = $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		else{
			$sql = <<<SQL
			SELECT * 
			FROM Phonebook
			ORDER BY reg_date DESC
SQL;
			$result= $conn->query($sql);
			if ($result->num_rows>0) {
				while($row=$result->fetch_assoc()){
					$phone = $row["phonenumber"];
					$email = $row["email"];
					echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
				}
			}
			else{
				echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
			}
		}
		return;
	}
	
	// switch ($sort) {
	// 	case 'sort_number':
	// 		# code...
	// 		break;
		
	// 	default:
	// $sql = "SELECT * FROM Phonebook";
	// $result= $conn->query($sql);
	// 		break;
	// }
	$sql = "SELECT * FROM Phonebook";
	$result= $conn->query($sql);
	if(isset($_POST["submitsearch"])){
		$forsearch = test_input($_POST["search"]);
		$sql = <<< SQL
		SELECT * 
		FROM  Phonebook 
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
				echo "<tr><td>".$row["id"]."</td><td>".$row["fullname"]."</td><td><a href=tel:$phone>".$phone."</a></td><td>".$row["phonenumber2"]."</td><td class = 'addrs'>".$row["address"]."</td><td><a href='mailto:$email'>".$email."</a></td><td>".$row["info"]."</td><td>".$row["reg_date"]."</td></tr>";
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
	$conn->close();
?>