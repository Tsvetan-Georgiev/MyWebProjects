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
		<label for = "generate_new">Брой различни видове артикули</label>
		<input type = "number" class = "form-control input-lg" id = "generate_new" name = "generate_new">
		<label for = "generate_old">Брой различни видове съществуващи артикули</label>
		<input type = "number" class = "form-control input-lg" id = "generate_old" name = "generate_old">
		<button type = "submit" id = "submit_generate" class = "btn btn-default" name = "generate" formmethod = "GET" form = "generate">
			<p class = "lead">
				<span class="glyphicon glyphicon-ok"></span>
				Покажи
			</p>
		</button>
	</form>
<?php
	if (isset($_GET["generate"])) {
		$new = $_GET["generate_new"];
		$old = $_GET["generate_old"];
		include "script/conn.php";
		if ($old > 0) {
?>

	<form role = "form" name = "delivery_old" id = "delivery_old" method = "POST">
		<fieldset>
			<legend>Доставка</legend>
<?php
				for ($i=0; $i < $old; $i++) { 
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
					<label for = "peaces_old'.$i.'">Брой</label>
					<input type = "number" class = "form-control input-lg" id = "peaces_old'.$i.'" name = "peaces_old'.$i.'" step="any">
					<hr>';
				}
				echo '
					<button type = "submit" id = "delivery_old" class = "btn btn-default" name = "delivery_old" formmethod = "POST" form = "delivery_old">
						<p class = "lead">
							<span class="glyphicon glyphicon-ok"></span>
							Доставка
						</p>
					</button>
				';
?>
	</form>
		</fieldset>
<?php
		}
		if (isset($_POST["delivery_old"])) {
			for ($i=0; $i < $old; $i++) { 
  			$item_ID[$i] = $_POST["store_item".$i];
  			$peaces[$i] = $_POST["peaces_old".$i];
  			$q = <<<SQL
  			UPDATE store
  			SET amount = amount + '$peaces[$i]'
			WHERE ID = "$item_ID[$i]"
SQL;
			$conn -> query($q);
  			}
		}
				$conn -> close();
?>
<?php
	if ($new > 0) {
?>
	<form role = "form" name = "delivery" id = "delivery" method = "POST">
		<fieldset>
			<legend>Доставка</legend>
<?php
		for ($i=0; $i < $new; $i++) { 
			echo '
		
				<label for = "new_item'.$i.'">Нови артикули</label>
				<input type = "text" class = "form-control input-lg" id = "new_item'.$i.'" name = "new_item'.$i.'">
				<br>
				<br>
				<label for = "measure'.$i.'">Мярка</label>
				<input type = "text" id = "measure'.$i.'" name = "measure'.$i.'">
				<br>
				<br>
				<label for = "peaces'.$i.'">Брой</label>
				<input type = "number" class = "form-control input-lg" id = "peaces'.$i.'" name = "peaces'.$i.'"  step="any">
				<br>
				<br>
				<hr>
			';
		}
		echo '
				<br>
				<br>
				<button type = "submit" id = "delivery" class = "btn btn-default" name = "delivery" formmethod = "POST" form = "delivery">
					<p class = "lead">
						<span class="glyphicon glyphicon-ok"></span>
						Доставка
					</p>
				</button>
		';
?>
		</fieldset>
	</form>
<?php
	}
	if (isset($_POST["delivery"])) {
  		for ($i=0; $i < $new; $i++) { 
  			$new_item[$i] = $_POST["new_item".$i];
  			$measure[$i] = $_POST["measure".$i];
  			$peaces[$i] = $_POST["peaces".$i];
  			echo $new_item[$i];
  			$q = <<<SQL
  			INSERT INTO store
  			( item, measure, amount)
			VALUES
			('$new_item[$i]', '$measure[$i]', '$peaces[$i]')
SQL;
			$conn -> query($q);
  		}
		$conn -> close();
	}
}
?>
</html>