<!Doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;  charset=UTF-8"/>
	<title>Телефонен указател</title>
	<link rel="stylesheet" type="text/css" href="styles/homepage.css">
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
					<tr>
						<td>
							<h1>Въведените контакти</h1>
						</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><b>Номер</b></td><td><b>Имена</b></td><td><b>Тел.номер</b></td><td><b>Алтернативен номер</b></td><td><b>Адрес</b></td><td><b>Електронна поща</b></td><td><b>Бележка</b></td><td><b>Дата на въвеждане</b></td>
					</tr>
					<?php include "scripts/viewDB.php";?>
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