<?php 
	include_once ('secure.php');
	include_once ('connect.php');
	$phonebook = $_SESSION['username']."_phonebook";
	if(isset($_GET['sort_number'])){
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
			FROM $phonebook
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
			FROM $phonebook
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
			FROM $phonebook
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
			FROM $phonebook
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
			FROM $phonebook
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
			FROM $phonebook
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
			FROM $phonebook
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
			FROM $phonebook
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
	}
	else{
		echo "<tr><td colspan='8'>Няма резултати ;( </td></tr>";
	}
	$conn->close();
?>