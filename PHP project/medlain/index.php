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
?>
<?php
		if ($old > 0) {
?>

	<form>
		<fieldset>
			<legend>Доставка</legend>
<?php
				for ($i=0; $i < $old; $i++) { 
			echo '
					<label for = "store_item">Съществуващи артикули</label>
					<select type = "text" class = "form-control input-lg" id = "store_item" name = "store_item">';
?>
								<?php

	// 								include_once "scripts/conn.php";
	// 								$q = <<<SQL
	// 									SELECT * FROM rooms
	// 									WHERE ID!="0"
	// 									AND busy = "0"
	// SQL;
	// 								$result = $conn->query($q);
	// 								 if ($result->num_rows > 0) {
	// 									while($row = $result->fetch_assoc()){
	// 										$room_ID = $row["ID"];
	// 										$room_name = $row["title"];
	// 										$room_floor = $row["floor"];
	// 										$room_beds = $row["beds"];
	// 										echo "<option value = '$room_ID'>".$room_ID.". ".$room_name."; етаж ".$room_floor."; легла ".$room_beds."</option>";
	// 									}
	// 								}
	// 								else{
	// 									echo "<option value ='0'>Все още няма въведени стаи.</option>";
	// 								}
	// 								$conn -> close();

					?>
<?php
			echo '
					</select>
					<label for = "peaces_old'.$i.'">Брой</label>
					<input type = "number" class = "form-control input-lg" id = "peaces_old'.$i.'" name = "peaces_old'.$i.'">
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
?>
<?php
	if ($new > 0) {
?>
	<form>
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
				<input type = "number" class = "form-control input-lg" id = "peaces'.$i.'" name = "peaces'.$i.'">
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
}
?>
</html>