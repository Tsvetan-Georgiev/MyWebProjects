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
	<form role = "form" name = "show_items" id = "show_items" method = "POST">
		<fieldset>
			<legend>Наличност</legend>
			<label for = "stockfrom">От дата </label>
			<label for = "stockto">- до дата</label>
			<input type="text" class = "form-control input-lg" id="stockfrom" placeholder="Начална дата" name = "from_date">
			<input type = "text" class = "form-control input-lg" id = "stockto" placeholder="Крайна дата" name = "to_date">
			<button type = "submit" id = "show_btn" class = "btn btn-default" name = "show_items" formmethod = "POST" form = "show_items">
				<p class = "lead">
					<span class="glyphicon glyphicon-ok"></span>
					Наличност
				</p>
			</button>
		</fieldset>

	</form>
<?php
	if (isset($_POST['show_items'])) {
		include 'script/conn.php';
		$from = strtotime($_POST['from_date']);
		$to = strtotime($_POST['to_date']);
//echo $to." ".$from."<br>";
		$q = <<<SQL
		SELECT * from sell
		WHERE ID != 0
SQL;
		$result = $conn -> query($q);
		if ($result->num_rows > 0) {
			$i = 0;
			while($row = $result->fetch_assoc()){

				$id_sell[$i] = $row["ID"];
				$article_sell[$i] = $row["article"];
				$amount_sell[$i] = $row["amount"];
				$price_sell[$i] = $row["price"];
				$date_sell[$i] = $row["date"];
				$i++;
			}
//echo $i;
			for ($j=0; $j < $i; $j++) {
				$db_date = strtotime($date_sell[$j]);
				if ($to == "" or $to == null or $to == "undefined") {
					if ($from >= $db_date) {
						echo "<div>"
						.$id_sell[$j]." ".$article_sell[$j]." ".$amount_sell[$j]." ".$price_sell[$j]." ".$date_sell[$j].
						"</div>";
						$have_a_sold = 1;
					}	
				}
				else{
					if ($from == "" or $from == null or $from == "undefined") {
						if ($to <= $db_date) {
							echo "<div>"
							.$id_sell[$j]." ".$article_sell[$j]." ".$amount_sell[$j]." ".$price_sell[$j]." ".$date_sell[$j].
							"</div>";
							$have_a_sold = 1;
						}
					}
					else{
						if ($from >= $db_date && $to <= $db_date) {
							echo "<div>"
							.$id_sell[$j]." ".$article_sell[$j]." ".$amount_sell[$j]." ".$price_sell[$j]." ".$date_sell[$j].
							"</div>";
							$have_a_sold = 1;
						}
					}
				}				
			}
			$have_a_sold = 0;
			if (!$have_a_sold) {
				echo "Няма продажби за зададения период";
			}
		}
		else{
			echo "Няма продажби все още";
		}
	}
?>
</html>