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
			<table>
				<thead>
						<?php 
							set_error_handler("customError");
							function customError($errno, $errstr) {
							}
							if($_GET['sent']==NULL){
							}
							elseif($_GET['sent']){
								echo "<tr><td><h2>Промяната е извършена УСПЕШНО.</h2></tr></td>";
							}
							else{
								echo "<tr><td><h2>НЕУСПЕШНО редактиране.</h2></tr></td>";
							}
						?>
				</thead>
				<tbody>
					<tr>
						<td style="text-align:right;">
							<h1>Въведените контакти</h1>
						</td>
					</tr>
					<tr>
						<td>
							<form name="edit" action="scripts/updateDB.php" method="post" onsubmit="return validateEdit()">
								<fieldset>
								<legend>Редактиране на контакт</legend>
									<label for="forUpdate">Въведете номер за редактиране</label>
											<br>
										<input type="number" id="forUpdate" name="forUpdate" min="1">
											<br>
									<label for="1">Нови имена:</label>
											<br>
										<input type="text" id="1" name="fullname">
											<br>
									<label for="2">Нов телефонен номер:</label>
											<br>
										<input type="tel" id="2" name="phonenumber">
											<br>
									<label for="3">Нов алтернативен тел. номер:</label>
											<br>
										<input type="tel" id="3" name="phonenumber2">
											<br>
									<label for="4">Нов адрес:</label>
											<br>
										<input type="text" id="4" name="address">
											<br>
									<label for="5">Нова електронна поща:</label>
											<br>
										<input type="email" id="5" name="email">
											<br>
									<label for="6">Ново инфо:</label>
											<br>
										<textarea name="info" id="6"></textarea>
											<br>
									<input type="submit" value="Готово">
									<input type="reset" value="Почисти">
								</fieldset>
							</form>
						</td>
						<td>
							<table>
								<tr>
									<td><b>Номер</b></td><td><b>Имена</b></td><td><b>Тел.номер</b></td><td><b>Алтернативен номер</b></td><td><b>Адрес</b></td><td><b>Електронна поща</b></td><td><b>Бележка</b></td><td><b>Дата на въвеждане</b></td>
								</tr>
									<?php include "scripts/viewDB.php";?>
							</table>
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td>
							Контакти 1.0
						</td>
					</tr>
				</tfoot>
			</table>
		</article>
		<footer>
			Copyright 2014
		</footer>
	</div>
</body>
</html>