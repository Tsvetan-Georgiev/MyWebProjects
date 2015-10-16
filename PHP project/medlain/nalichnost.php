<!Doctype html>
<html lang = "bg">
<head>
	<meta http-equiv="Content-Type" content="text/html"  charset="UTF-8"/>
	<title>
		Начало | Складова система
	</title>
</head>
<body style = "background:#EEEEEE;">
</body>
	<ul>
		<li>
			<a href = "index.php">Доставка</a>
		</li>
		<li>
			<a href="prodajba.php">Продажба</a>
		</li>
		<li>
			<a href="nalichnost.php">Наличност</a>
		</li>
	</ul>
	<form>
		<fieldset>
			<legend>Наличност</legend>
			<label for = "stockfrom">От дата </label>
			<label for = "stockto">- до дата</label>
			<input type="text" class = "form-control input-lg" id="stockfrom" placeholder="Начална дата" name = "from_date">
			<input type = "text" class = "form-control input-lg" id = "stockto" placeholder="Крайна дата" name = "to_date">
			<button type = "submit" id = "show_items" class = "btn btn-default" name = "show_items" formmethod = "POST" form = "show_items">
				<p class = "lead">
					<span class="glyphicon glyphicon-ok"></span>
					Наличност
				</p>
			</button>
		</fieldset>

	</form>
</html>