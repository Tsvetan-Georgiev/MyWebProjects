<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="draw_calendar.css">
	<title>Калкулатор за почивни дни през дадена година</title>
</head>
<body>
	<div>
		<form name="year" method="GET">
			<table>
				<tr>
					<td>
					</td>
					<td>
					</td>
					<td>
					</td>
					<td>
					</td>
				</tr>
				<tr>
					<td>
						Изберете година
					</td>
					<td>
						<input type="number" name="year" min="1902" max="2037" value="2015">
					</td>
					<td>
						<input type="submit" name="submit" value="Виж">
		</form>
				</tr>
			</table>
	</div>
<?php
if (isset($_GET["insertdate"])) {
	$day=$_GET["newday"];
	$month=$_GET["newmonth"];
	$getyear = $_GET["year"];
	$nameday = $_GET["nameday"];
	if ($nameday == "") {
		$nameday = "Почивен ден";
	}
	mysql_connect("localhost","root","") or die("Няма връзка. " . mysql_error());
    mysql_select_db("po4_dni") or die("Не може да избере база данни. " . mysql_error());
	// функция връщаща броя на дните във февруари
	function getDaysFev($G){
		$RC= date("L",strtotime("$G"."-02-02"));
		if ($RC==1) {
			$RC=29;
			return $RC;
		} else {
			$RC=28;
			return $RC;
		}
	}
	$fev_days=getDaysFev($getyear);
	switch ($month) {
		case '1':
			break;
		case '2':				
			if ($fev_days<$day) {
				$day=$fev_days;
			}
			break;
		case '3':
			break;
		case '4':
			if ($day>30) {
				$day=30;
			}
			break;
		case '5':
			break;
		case '6':
			if ($day>30) {
				$day=30;
			}
			break;
		case '7':
			break;
		case '8':
			break;
		case '9':
			if ($day>30) {
				$day=30;
			}
			break;
		case '10':
			break;
		case '11':
			if ($day>30) {
				$day=30;
			}
			break;
		case '12':
			break;
		default:
			break;
	}
	$for_insert = $getyear."-".$month."-".$day;
	$for_insert = strtotime($for_insert);
	$q = "SELECT * FROM vsi4ki_dni WHERE dati='$for_insert'";
	$a = mysql_query($q);
	$a = mysql_fetch_assoc($a);
	$a = date("Y-m-d",$a['dati']);
	$for_insert = date("Y-m-d",$for_insert);
	// проверка дали датата е вече в базата данни
	if ($a!==$for_insert) {
		echo "Новият почивен ден $for_insert е записан успешно";
		$for_insert=strtotime($for_insert);
		$q = "INSERT INTO vsi4ki_dni (dati,name,godina) VALUES('$for_insert','$nameday','$getyear')";
		mysql_query($q);
	}
	else{
		echo "Датата вече е в списъка с почивни дни";
	}
}
if (isset($_GET["deletedate"])){
	$day=$_GET["deleteday"];
	$month=$_GET["deletemonth"];
	$getyear = $_GET["year"];
	mysql_connect("localhost","root","") or die("Няма връзка. " . mysql_error());
    mysql_select_db("po4_dni") or die("Не може да избере база данни. " . mysql_error());
	// функция връщаща броя на дните във февруари
	function getDaysFev($G){
		$RC= date("L",strtotime("$G"."-02-02"));
		if ($RC==1) {
			$RC=29;
			return $RC;
		} else {
			$RC=28;
			return $RC;
		}
	}
	$fev_days=getDaysFev($getyear);
	switch ($month) {
		case '1':
			break;
		case '2':				
			if ($fev_days<$day) {
				$day=$fev_days;
			}
			break;
		case '3':
			break;
		case '4':
			if ($day>30) {
				$day=30;
			}
			break;
		case '5':
			break;
		case '6':
			if ($day>30) {
				$day=30;
			}
			break;
		case '7':
			break;
		case '8':
			break;
		case '9':
			if ($day>30) {
				$day=30;
			}
			break;
		case '10':
			break;
		case '11':
			if ($day>30) {
				$day=30;
			}
			break;
		case '12':
			break;
		default:
			break;
	}
	$for_delete = $getyear."-".$month."-".$day;
	$for_delete = strtotime($for_delete);
	$q = "SELECT * FROM vsi4ki_dni WHERE dati='$for_delete'";
	$a = mysql_query($q);
	$a = mysql_fetch_assoc($a);
	$a = date("Y-m-d",$a['dati']);
	$for_delete = date("Y-m-d",$for_delete);
	// проверка дали датата е вече в базата данни
	if ($a==$for_delete) {
		echo "Почивният ден $for_delete е изтрит успешно";
		$for_delete=strtotime($for_delete);
		$q = "DELETE FROM vsi4ki_dni WHERE dati = '$for_delete'";
		mysql_query($q);
	}
	else{
		echo "Датата не е в списъка с почивни дни";
	}
}
if (isset($_GET['submit'])) {
	$getyear=$_GET["year"];
	$hdays[$getyear."-01-01"] = "Нова година"; 
	$hdays[$getyear."-03-03"] = "Национален празник"; 
	$hdays[$getyear."-05-01"] = "Ден на труда"; 
	$hdays[$getyear."-05-06"] = "Гергьовден"; 
	$hdays[$getyear."-05-24"] = "Ден на писмеността"; 
	$hdays[$getyear."-09-06"] = "Ден на съединението"; 
	$hdays[$getyear."-09-22"] = "Независимостта на България"; 
	$hdays[$getyear."-12-24"] = "Коледа"; 
	$hdays[$getyear."-12-25"] = "Коледа"; 
	$hdays[$getyear."-12-26"] = "Коледа";
	$arr_weekds = array();
		function VelikDen($G,$petilipon){
					$m = 0;
					$R1 = $G % 19;
					$R2 = $G % 4;
					$R3 = $G % 7;
					$RA = 19*$R1 + 16;
					$R4 = $RA % 30;
					$RB = 2*$R2 + 4*$R3 + 6*$R4;
					$R5 = $RB % 7;
					$RC = $R4 + $R5;
						if ($RC<28){
							$RC=$RC+3;
							$m=4;
						}
						else if($RC>=28){
							$RC=$RC-27;
						    $m=5;
						}
						// ако великден е май или денят е преди 10-ти слага нула на деня
						if ($m==5 or $RC<10) {
						// стринг от точната дата на великден
							$Razppetak="0".$RC."-"."0".$m."-".$G;
						// записва датата в секунди по линукският формат
							$Razppetak=strtotime($Razppetak);
						// добавя или изважда дни според втория зададен параметър на функцията
							$Razppetak2=strtotime(date("d-m-Y",$Razppetak)."-"."$petilipon"." day");
						// превръща датата във формат МесецДен-Година за да е по-лесно да бъде сортиран с останалите дати
							$Razppetak2=date("Y-m-d",$Razppetak2);
						}
						else{
							$Razppetak=$RC."-"."0".$m."-".$G;
							$Razppetak=strtotime($Razppetak);
							$Razppetak2=strtotime(date("d-m-Y",$Razppetak)."-"."$petilipon"." day");
							$Razppetak2=date("Y-m-d",$Razppetak2);
						}
					return $Razppetak2;
		}
		// функция връщаща броя на дните във февруари
		function getDaysFev($G){
			$RC= date("L",strtotime("$G"."-02-02"));
			if ($RC==1) {
				$RC=29;
				return $RC;
			} else {
				$RC=28;
				return $RC;
			}
		}
		// високосна ли е годината
		function leap_year(){
			global $getyear;
			if(getDaysFev($getyear)==29){
				return 266;
			}
			else{
				return 265;
			}
		}
		//Намиране на съботите и неделите в дадена година
		function getWeekendsOfYear($year){
			$now ="01.01.".$year;
			$end_date ="01.01.".($year+1);
			$now = strtotime($now);
			$end_date = strtotime($end_date);
			global $hdays;
			while (date("Y-m-d", $now) != date("Y-m-d", $end_date)) {
			    $day_index = date("w", $now);
			    //проверка дали е събота или неделя
			    if ($day_index == 0 || $day_index == 6) {
			    	if ($day_index == 0) {
			    		$forpush = date("Y-m-d", $now);
			    		$hdays[$forpush] = "Неделя";
			    	}
			    	else{
			    		$forpush = date("Y-m-d", $now);
			    		$hdays[$forpush] = "Събота";
			    	}
			    }
			    $now = strtotime(date("Y-m-d", $now) . "+1 day");
			}
			return $hdays;
		}
		// функция за сливане на почивните дни през година с празниците, които не се включват в тях, а са през седмицата
		function allinone($getyear){
			mysql_connect("localhost","root","") or die("Няма връзка. " . mysql_error());
    		mysql_select_db("po4_dni") or die("Не може да избере база данни. " . mysql_error());
			global $hdays,$getyear;
			$all_rest_days=0;
			$leap_year=leap_year();
			ksort($hdays);
			$q = "SELECT * FROM vsi4ki_dni";
		    $r = mysql_query($q);
		    $o = mysql_fetch_assoc($r);
		    $o = $o['godina'];
		    if ( $o !== $getyear ) {
				foreach ($hdays as $key => $value) {
					$za_bazata=strtotime($key);
					$sql = "INSERT INTO vsi4ki_dni(dati,name,godina) VALUES('$za_bazata','$value','$getyear')";
      				mysql_query($sql);
				 }
			}
		}
		$fevruari_days=getDaysFev($getyear);
		$Razppetak=VelikDen($getyear,"2");
		$Ponedlk=VelikDen($getyear,"-1");
		// if ($Razppetak!==$hdays[2] and $Razppetak!==$hdays[3]) {
			$hdays[VelikDen($getyear,"2")] = "Великден";
		// }
		// if ($Ponedlk!==$hdays[2] and $Ponedlk!==$hdays[3]) {
			$hdays[VelikDen($getyear,"-1")] = "Великден";
		// }
		getWeekendsOfYear($getyear);
		//getHolidaysOfYear($getyear);
		mysql_connect("localhost","root","") or die("Няма връзка. " . mysql_error());
		mysql_select_db("po4_dni") or die("Не може да избере база данни. " . mysql_error());
		$table_check = "vsi4ki_dni";
		if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$table_check."'")) !== 1){
			$q = "CREATE TABLE IF NOT EXISTS vsi4ki_dni (id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, dati varchar(11) NOT NULL, name varchar(50), godina varchar(5))";
			mysql_query($q);
			$q = "ALTER TABLE vsi4ki_dni AUTO_INCREMENT = 1";
			mysql_query($q);
		}
		// рисуване на календар
		function draw_calendar($month,$year){
			global $getyear;
			// рисуване на таблица 
			$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
			// рисуване на главните надписи 
			$headings = array('Понеделник','Вторник','Сряда','Четвъртък','Петък','Събота','Неделя');
			$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
			// сега променливите за дни и седмици ...
			$running_day = date('N',mktime(0,0,0,$month,7,$year));
			$days_in_month = date('t',mktime(0,0,0,$month,7,$year));
			$days_in_this_week = 1;
			$day_counter = 0;
			$dates_array = array();
			// ред за първата седмица
			$calendar.= '<tr class="calendar-row">';
			// печатаме празни дни до първият ден от месеца
			if ($running_day < 7) {
				for($x = 0; $x < $running_day; $x++){
					$calendar.= '<td class="calendar-day-np"> </td>';
					$days_in_this_week++;
				}
			}
			// продължаваме с дните...
			for($list_day = 1; $list_day <= $days_in_month; $list_day++){
				$calendar.= '<td class="calendar-day">';
					// прибавяме номерът на текущиа деня
					$calendar.= '<div class="day-number">'.$list_day.'</div>';
					// заявка към базата данни за въвеждане на запис за текущият ден!! Ако има съвпадение го принтира !!
					mysql_connect("localhost","root","") or die("Няма връзка. " . mysql_error());
				    mysql_select_db("po4_dni") or die("Не може да избере база данни. " . mysql_error());
				    $check_date = strtotime($getyear."-".$month."-".$list_day);
				    $q = "SELECT * FROM vsi4ki_dni WHERE dati='$check_date'";
					$r = mysql_query($q);
					$a = mysql_fetch_assoc($r);
					if (is_null($a["dati"])) {
						$db_day = false;
					}
					else{
						$db_day = date("d", $a["dati"]);
					}
					if ($db_day == $list_day) {
						$poqsnenie = $a['name'];
						$calendar.= str_repeat('<p> '.$poqsnenie.' </p>',1);
					}
				$calendar.= '</td>';
				if($running_day == 6){
					$calendar.= '</tr>';
					if(($day_counter+1) != $days_in_month){
						$calendar.= '<tr class="calendar-row">';
					}
					$running_day = -1;
					$days_in_this_week = 0;
				}
				if ($running_day == 13) {
					$calendar.= '</tr>';
					$running_day == 0;
					if(($day_counter+1) != $days_in_month){
						$calendar.= '<tr class="calendar-row">';
					}
					$running_day = -1;
					$days_in_this_week = 0;
				}
				$days_in_this_week++; $running_day++; $day_counter++;
			}
			// приключване на отстаналите дни в седмицата
			if($days_in_this_week < 8){
				for($x = 1; $x <= (8 - $days_in_this_week); $x++){
					$calendar.= '<td class="calendar-day-np"> </td>';
				}
			}
			// финалният ред
			$calendar.= '</tr>';
			// край на таблицата
			$calendar.= '</table>';
			// приключване и връщане на резултат
			return $calendar;
		}
		allinone($getyear);
		echo '<h2>Януари '.$getyear.'</h2>';
		echo draw_calendar(1,$getyear);

		echo '<h2>Февриари '.$getyear.'</h2>';
		echo draw_calendar(2,$getyear);

		echo '<h2>Март '.$getyear.'</h2>';
		echo draw_calendar(3,$getyear);

		echo '<h2>Април '.$getyear.'</h2>';
		echo draw_calendar(4,$getyear);

		echo '<h2>Май '.$getyear.'</h2>';
		echo draw_calendar(5,$getyear);

		echo '<h2>Юни '.$getyear.'</h2>';
		echo draw_calendar(6,$getyear);

		echo '<h2>Юли '.$getyear.'</h2>';
		echo draw_calendar(7,$getyear);

		echo '<h2>Август '.$getyear.'</h2>';
		echo draw_calendar(8,$getyear);

		echo '<h2>Септември '.$getyear.'</h2>';
		echo draw_calendar(9,$getyear);

		echo '<h2>Октомври '.$getyear.'</h2>';
		echo draw_calendar(10,$getyear);

		echo '<h2>Ноември '.$getyear.'</h2>';
		echo draw_calendar(11,$getyear);

		echo '<h2>Декември '.$getyear.'</h2>';
		echo draw_calendar(12,$getyear);
}
?>
<br>
</body>
</html>