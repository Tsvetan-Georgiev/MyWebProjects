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
	<form role = "form" name = "generate" id = "generate" method = "GET">
		<label for = "generate_sell">Брой различни видове артикули за продажба</label>
		<input type = "number" class = "form-control input-lg" id = "generate_sell" name = "generate_sell">
		<button type = "submit" id = "submit_generate" class = "btn btn-default" name = "generate" formmethod = "GET" form = "generate">
			<p class = "lead">
				<span class="glyphicon glyphicon-ok"></span>
				Покажи
			</p>
		</button>
	</form>
	<form role = "form" name = "delivery_sell" id = "delivery_sell" method = "POST">
<?php
	if (isset($_GET["generate"])) {
		$sell = $_GET["generate_sell"];
		include "script/conn.php";
		if ($sell > 0) {
?>
		<fieldset>
			<legend>Продажба</legend>
			<?php
				for ($i=0; $i < $sell; $i++) { 
			echo '
					<label for = "store_item">Съществуващи артикули</label>
					<select type = "text" class = "form-control input-lg" id = "store_item" name = "store_item'.$i.'">';
									$q = <<<SQL
										SELECT * FROM store
										WHERE ID!="0"
SQL;
									$result = $conn -> query($q);
									 if ($result ->num_rows > 0) {
										while($row = $result->fetch_assoc()){
											$item_ID = $row["ID"];
											$item_name = $row["item"];
											$measure = $row["measure"];
											$amount = $row["amount"];
											echo "<option value = '$item_ID'>".$item_ID.". ".$item_name."; ".$amount." ".$measure."  </option>";
										}
									}
									else{
										echo "<option value ='0'>Все още няма въведени артикули.</option>";
									}
									
			echo '
					</select>
					<label for = "peaces_sell'.$i.'">Брой</label>
					<input type = "number" class = "form-control input-lg" id = "peaces_sell'.$i.'" name = "peaces_sell'.$i.'" step="any">
					<label for = "price'.$i.'">Цена</label>
					<input type = "number" class = "form-control input-lg" id = "price'.$i.'" name = "price'.$i.'" step="any">
					<hr>';
				}
				echo '
					<button type = "submit" id = "sell_btn" class = "btn btn-default" name = "delivery_sell" formmethod = "POST" form = "delivery_sell">
						<p class = "lead">
							<span class="glyphicon glyphicon-ok"></span>
							Продажба
						</p>
					</button>
				';
?>
	</form>
		</fieldset>
<?php
		}
		if (isset($_POST["delivery_sell"])) {
			for ($i=0; $i < $sell; $i++) { 
  			$item_ID[$i] = $_POST["store_item".$i];
  			$peaces[$i] = $_POST["peaces_sell".$i];
  			$price[$i] = $_POST["price".$i];
  			$q = <<<SQL
  			UPDATE store
  			SET amount = amount - '$peaces[$i]'
			WHERE ID = "$item_ID[$i]"
SQL;
			$conn -> query($q);
			$q = <<<SQL
			INSERT INTO sell
			( article, amount, price)
			SELECT t.item, '$peaces[$i]', '$price[$i]'
			FROM store t
			WHERE t.ID = '$item_ID[$i]'
SQL;
			$conn -> query($q);
  			}
		}
				$conn -> close();
?>
<?php
	}
?>
</html>