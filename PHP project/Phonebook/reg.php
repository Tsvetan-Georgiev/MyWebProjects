<!Doctype html>
<html lang = "bg">
<head>
	<meta http-equiv="Content-Type" content="text/html;  charset=UTF-8"/>
	<title>
		Телефонен указател
	</title>
	<meta name = "viewport" content="width = device-width, initial-scale = 1">
	<link rel="stylesheet" type="text/css" href="styles/homepage.css">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="scripts/jquery.min.js"></script>
	<script type="text/javascript" src="styles/bootstrap/js/bootstrap.js"></script>
</head>
<body>
	<div class = "container">
		<form method="POST" style = "margin:60px 0 0 40%">
			<?php
				include_once ("scripts/secure.php");
				include_once ("scripts/connect.php");
				include_once ("nav.php");
				 if (isset($_POST['submit'])) {
					$username = safestrip($_POST['user']);
					$password = md5(safestrip($_POST['pass']));
					if(empty($username) or empty($password)) {
	                	echo "<p style='color:red;'>Потребителят или Паролата не са въведени!</p>";
	                }
	        		else {
	        			$q = <<<SQL
	        			SELECT username
	        			FROM users
	        			WHERE username = '$username'
SQL;
						$check = $conn -> query($q);
						$check = $check -> fetch_assoc();
						$check = $check['username'];
						if ($username === $check) {
							echo "<p style='color:red;'>Потребителят вече съществува!</p>";
						}
						else{

		                	$q = <<<SQL
		                	INSERT INTO users 
		                		(username,password)
		                	VALUES
		                		('$username','$password')
SQL;
		                	if($conn -> query($q)){
		                		include ('scripts/makeTableDB.php');
		                		echo "<p style='color:green; font-size:15px;'> Успешна регистрация</p>";
		                	}
		                	else{
		                		echo "<p style='color:red;'> Неуспешна регистрация. Обвинете програмистта!</p>";
		                	}
						}
	            	}   
	            }
			?>
			<label for="user">Поребител</label>
			<br>
			<input type="text" name="user" id="user">
			<br>
			<label for="pass">Парола</label>
			<br>
			<input type="password" name="pass" id="pass">
			<br>
			<input type="submit" name="submit" value="Рагистрация">
		</form>
	</div>
</body>
</html>