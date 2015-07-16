<!Doctype html>
<html>
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
	<script src="scripts/validateForm.js"></script>
</head>
<body>
	<div class="container">
		<?php
			include_once ("nav.php");
		?>
		<article>
			<?php 
				if(isset($_GET['sent'])==NULL){
				}
				elseif(isset($_GET['sent'])){
					echo "<h2>Новият контакт е добавен УСПЕШНО.</h2>";
				}
				else{
					echo "<h2>НЕУСПЕШНО добавяне.</h2>";
				}
			?>
			<form name="new" action="scripts/insertDataDB.php" method="post" onsubmit="return validateForm()">
				<fieldset>
				<legend>Въведете новият контакт</legend>	
					<label for="1">Имена:</label>
							<br>
						<input type="text" id = "1" class = "new_contact_inp" name="fullname" autofocus>
							<br>
					<label for="2">Телефонен номер:</label>
							<br>
						<input type="tel" id = "2" class = "new_contact_inp" name="phonenumber">
							<br>
					<label for="3">Алтернативен тел. номер:</label>
							<br>
						<input type="tel" id = "3" class = "new_contact_inp" name="phonenumber2">
							<br>
					<label for="4">Адрес:</label>
							<br>
						<input type="text" id = "4" class = "new_contact_inp" name="address">
							<br>
					<label for="5">Електронна поща:</label>
							<br>
						<input type="email" id = "5" class = "new_contact_inp" name="email">
							<br>
					<label for="6">Инфо:</label>
							<br>
						<textarea name="info" id = "6" class = "new_contact_inp"></textarea>
							<br>
					<input type="submit" value="Готово">
					<input type="reset" value="Почисти">
				</fieldset>
			</form>
		</article>
		<?php
		include_once("footer.php");
		?>