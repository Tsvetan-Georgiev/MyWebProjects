<!Doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;  charset=UTF-8">
	<title>Телефонен указател</title>
	<link rel="stylesheet" type="text/css" href="styles/homepage.css">
	<script src="scripts/validateForm.js"></script>
</head>
<body>
	<div id="wrapper">
		<header>
			<nav>
				<ul>
					<li><a href="index.php">Контакти</a></li><li>
						<a href="newcontact.php">Нов Контакт</a></li><li>
						<a href="edit.php">Редактиране</a></li><li>
						<a href="remove.php">Изтриване</a></li>
				</ul>
			</nav>
		</header>
		<article>
			<?php 
				set_error_handler("customError");
				function customError($errno, $errstr) {
				}
				if($_GET['sent']==NULL){
				}
				elseif($_GET['sent']){
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
						<input type="text" id="1" name="fullname">
							<br>
					<label for="2">Телефонен номер:</label>
							<br>
						<input type="tel" id="2" name="phonenumber">
							<br>
					<label for="3">Алтернативен тел. номер:</label>
							<br>
						<input type="tel" id="3" name="phonenumber2">
							<br>
					<label for="4">Адрес:</label>
							<br>
						<input type="text" id="4" name="address">
							<br>
					<label for="5">Електронна поща:</label>
							<br>
						<input type="email" id="5" name="email">
							<br>
					<label for="6">Инфо:</label>
							<br>
						<textarea name="info" id="6"></textarea>
							<br>
					<input type="submit" value="Готово">
					<input type="reset" value="Почисти">
				</fieldset>
			</form>
		</article>
		<footer>
			Copyright 2014
		</footer>
	</div>
</body>
</html>