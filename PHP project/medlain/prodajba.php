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
			<legend>Продажба</legend>
			<label for = "store_item">Съществуващи артикули</label>
			<select type = "text" class = "form-control input-lg" id = "store_item" name = "store_item">
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
			</select>
			<label for = "peaces">Брой</label>
			<input type = "number" id = "peaces" name = "peaces">
			<label for = "price">Цена</label>
			<input type = "number" id = "price" name = "price">
			<button type = "submit" id = "sell" class = "btn btn-default" name = "sell" formmethod = "POST" form = "sell">
				<p class = "lead">
					<span class="glyphicon glyphicon-ok"></span>
					Продажба
				</p>
			</button>
		</fieldset>

	</form>
</html>