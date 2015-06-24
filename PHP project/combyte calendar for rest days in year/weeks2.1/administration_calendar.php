<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<!-- <link rel="stylesheet" type="text/css" href="draw_calendar.css"> -->
	<title>Прибавяне и махане на ден от дадена година</title>
</head>
<body>
	<div>
	<table>
		<tr>
			<td>
				<a href="weeks-go6u.php"><button>Към календара</button></a>
			</td>
			<td>
			</td>
			<td>
				Ден
			</td>
			<td>
				Месец
			</td>
			<td>
				Година
			</td>
			<td>
				Наименование на почивният ден
			</td>
			<td>
			</td>
			<td>
			</td>
			<td>
				Ден
			</td>
			<td>
				Месец
			</td>
			<td>
				Година
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				Добавяне на дата
			</td>
			<td>
<form name = "newdate" method = "GET" action = "weeks-go6u.php">				
				<input type = "number" name = "newday" min = "1" max = "31">
			</td>
			<td>
				<input type = "number" name = "newmonth" min = "1" max = "12">
			</td>
			<td>
				<input type = "number" name = "year" min = "1902" max = "2037" value = "2015">
			</td>
			<td>
				<input type = "text" name = "nameday" value = "Почивен ден">
			</td>
			<td>
				<input type = "submit" name = "insertdate" value = "Прибави дата">
</form>
			</td>
			<td>
				Изтриване на дата
			</td>
			<td>
<form name="deletedate" method="GET" action="weeks-go6u.php">				
				<input type="number" name="deleteday" min="1" max="31">
			</td>
			<td>
				<input type="number" name="deletemonth" min="1" max="12">
			</td>
			<td>
				<input type = "number" name ="year" min="1902" max="2037" value="2015">
			</td>
			<td>
				<input type="submit" name="deletedate" value="Изтрии дата">
</form>
			</td>
		</tr>
	</table>
	<?php 
	// $getyear = "2015";
	// $check_for_weekend = "mahane";
	// 	$hdays[$getyear."-01-01"] = "Нова година"; 
	// 	$hdays[$getyear."-03-03"] = "Национален празник на България"; 
	// 	$hdays[$getyear."-05-01"] = "Ден на труда"; 
	// 	$hdays[$getyear."-05-06"] = "Гергьовден"; 
	// 	$hdays[$getyear."-05-24"] = "Ден на писмеността"; 
	// 	$hdays[$getyear."-09-06"] = "Ден на съединението"; 
	// 	$hdays[$getyear."-09-22"] = "Независимостта на България"; 
	// 	$hdays[$getyear."-12-24"] = "Коледа"; 
	// 	$hdays[$getyear."-12-25"] = "Коледа"; 
	// 	$hdays[$getyear."-12-26"] = "Коледа";
	// 	$hdays["mahane"] = "SHE SE MAHNA LI?";
	// 	// var_dump($hdays);
	// 	// echo "<br>";
	// 	// echo "<br>";
		
	// 	echo strtotime("01-01-2015");
	// 	foreach ($hdays as $key => $value) {
	// 		echo "<br>"."(key) ".$key." => (value) ".$value;

	// 	}
		// echo "<br>";
		// echo "<br>";
		// unset($hdays[$check_for_weekend]);
		// var_dump($hdays);

	?>
	</div>
</body>
</html>