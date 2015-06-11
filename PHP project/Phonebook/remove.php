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
								echo "<tr><td><h2>Изтриването УСПЕШНО.</h2></tr></td>";
							}
							else{
								echo "<tr><td><h2>НЕУСПЕШНО изтриване.</h2></tr></td>";
							}
						?>
				</thead>
				<tbody>
					<tr>
						<td>
							<h1>Въведените контакти</h1>
						</td>
					</tr>
					<tr>
						<td>
							<form name="remove" action="scripts/deleteFromDB.php" method="post" onsubmit="return validateRemove()">
								<label for="forRemove">Въведете номер за триене</label>
								<input type="number" id="forRemove" name="forRemove" min="1">
								<br><br>
								<input type="submit" value="Готово">
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