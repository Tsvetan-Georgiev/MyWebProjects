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
		<form name="year" method="post">
			<table>
				<tr>
					<td>
					</td>
					<td>
						Година
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
						Изберете година
					</td>
					<td>
						<input type="number" name="year" min="1902" max="2037" value="2015">
					</td>
					<td>
						<input type="submit" name="submit" value="Виж">
		</form>	
					</td>
					<td>
						Добавяне на дата</td>
					<td>
		<form name="newdate" method="post">				
						<input type="number" name="newday" min="1" max="31">
					</td>
					<td>
						<input type="number" name="newmonth" min="1" max="12">
					</td>
					<td>
						<input type = "number" name ="year" min="1902" max="2037" value="2015">
					</td>
					<td>
						<input type="submit" name="insertdate" value="Прибави дата">
		</form>
					</td>
					<td>
						Изтриване на дата</td>
					<td>
		<form name="deletedate" method="post">				
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
	</div>
<?php
if (isset($_POST["insertdate"])) {
	$day=$_POST["newday"];
	$month=$_POST["newmonth"];
	$getyear = $_POST["year"];
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
		$q = "INSERT INTO vsi4ki_dni (dati,name,godina) VALUES('$for_insert','Почивен ден','$getyear')";
		mysql_query($q);
	}
	else{
		echo "Датата вече е в списъка с почивни дни";
	}
}
if (isset($_POST["deletedate"])){
	$day=$_POST["deleteday"];
	$month=$_POST["deletemonth"];
	$getyear = $_POST["year"];
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
if (isset($_POST['submit'])) {
	$getyear=$_POST["year"];
	$hdays= array("0101"."-".$getyear,"0303"."-".$getyear,"0501"."-".$getyear,"0506"."-".$getyear,"0524"."-".$getyear,"0906"."-".$getyear,"0922"."-".$getyear,"1224"."-".$getyear,"1225"."-".$getyear,"1226"."-".$getyear );
	$arr_weekds = array();
		function getHolidaysOfYear($year){
			$now="01.01.".$year;
			$end_date="01.01.".($year+1);
			$now = strtotime($now);
			$end_date = strtotime($end_date);
			$count_hdays=10;
			global $hdays;
			while (date("Y-m-d", $now) != date("Y-m-d", $end_date)) {
			    $day_index = date("w", $now);
			    if ($day_index == 0 || $day_index == 6) {
			        $hdayslength=count($hdays);
			        for ($i=0; $i < $hdayslength; $i++) { 
			        	// проверява дали някой от официялните празници са през почивните дни и в такъв случай ги изважда от масива
			        	if (date("md-Y",$now)==$hdays[$i]) {
			        		$count_hdays--;
			        		// функция за изваждане на елемент от масив
			        		array_splice($hdays, $i,1);
			        		$hdayslength=count($hdays);
			        	}
			        }
			    }
			    $now = strtotime(date("Y-m-d", $now) . "+1 day");
			}
			return $count_hdays;
		}
		//Намиране на кои дати е великден по православния календар
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
							$Razppetak2=date("md-Y",$Razppetak2);
						}
						else{
							$Razppetak=$RC."-"."0".$m."-".$G;
							$Razppetak=strtotime($Razppetak);
							$Razppetak2=strtotime(date("d-m-Y",$Razppetak)."-"."$petilipon"." day");
							$Razppetak2=date("md-Y",$Razppetak2);
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
			global $arr_weekds;
			$count_wdays = 0;
			while (date("Y-m-d", $now) != date("Y-m-d", $end_date)) {
			    $day_index = date("w", $now);
			    //проверка дали е събота или неделя
			    if ($day_index == 0 || $day_index == 6) {
			        $count_wdays++;
			        $forpush=date("md-Y",$now);
			        array_push($arr_weekds, $forpush );
			    }
			    $now = strtotime(date("Y-m-d", $now) . "+1 day");
			}
			return $arr_weekds;
		}
		// функция за сливане на почивните дни през година с празниците, които не се включват в тях, а са през седмицата
		function allinone($getyear){
			mysql_connect("localhost","root","") or die("Няма връзка. " . mysql_error());
    		mysql_select_db("po4_dni") or die("Не може да избере база данни. " . mysql_error());
			global $hdays,$arr_weekds,$getyear;
			$all_rest_days=0;
			$leap_year=leap_year();
			$i_max=count($hdays)-1;
			$i=0;
			// пъха празниците при почивните
			while ( $i<= $i_max) {
				array_push($arr_weekds, $hdays[$i]);
				$i++;
			}
			sort($arr_weekds);
			$q = "SELECT * FROM vsi4ki_dni";
		    $r = mysql_query($q);
		    $o = mysql_fetch_assoc($r);
		    $o = $o['godina'];
		    if ( $o !== $getyear ) {
				for ($i=0;$i < count($arr_weekds); $i=$i+1) {
					$minus="-";
					// вади датата във вид мм-дд-гггг
					$arr_weekds[$i]= substr_replace($arr_weekds[$i],$minus,2,0);
					// копира датата от която е от 3-тия
					$date_from_month= substr($arr_weekds[$i], 3, 3);
					// слага копираната дата в началото
					$arr_weekds[$i]= substr_replace($arr_weekds[$i],$date_from_month,0,0);
					// маха излишната дата дд-мм(-дд)-гггг
					$arr_weekds[$i]= substr_replace($arr_weekds[$i], "",5,3);
					$za_bazata=strtotime($arr_weekds[$i]);
					$sql = "INSERT INTO vsi4ki_dni(dati,name,godina) VALUES('$za_bazata','Почивен ден','$getyear')";
      				mysql_query($sql);
				}
			}
		}
		$fevruari_days=getDaysFev($getyear);
		$Razppetak=VelikDen($getyear,"2");
		$Ponedlk=VelikDen($getyear,"-1");
		if ($Razppetak!==$hdays[2] and $Razppetak!==$hdays[3]) {
			array_push($hdays, $Razppetak);
		}
		if ($Ponedlk!==$hdays[2] and $Ponedlk!==$hdays[3]) {
			array_push($hdays, $Ponedlk);
		}
		getWeekendsOfYear($getyear);
		getHolidaysOfYear($getyear);
		mysql_connect("localhost","root","") or die("Няма връзка. " . mysql_error());
		mysql_select_db("po4_dni") or die("Не може да избере база данни. " . mysql_error());
		$table_check = "vsi4ki_dni";
		if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$table_check."'")) !== 1){
			$q = "CREATE TABLE IF NOT EXISTS vsi4ki_dni (id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, dati varchar(11) NOT NULL, name varchar(50), godina varchar(5))";
			mysql_query($q);
			$q = "ALTER TABLE vsi4ki_dni AUTO_INCREMENT = 1";
			mysql_query($q);
		}
		/* draws a calendar */
		function draw_calendar($month,$year){
			global $getyear;
			/* draw table */
			$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

			/* table headings */
			$headings = array('Понеделник','Вторник','Сряда','Четвъртък','Петък','Събота','Неделя');
			$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

			/* days and weeks vars now ... */
			$running_day = date('N',mktime(0,0,0,$month,7,$year));
			$days_in_month = date('t',mktime(0,0,0,$month,7,$year));
			$days_in_this_week = 1;
			$day_counter = 0;
			$dates_array = array();

			/* row for week one */
			$calendar.= '<tr class="calendar-row">';
			/* print "blank" days until the first of the current week */
			if ($running_day < 7) {
				for($x = 0; $x < $running_day; $x++){
					$calendar.= '<td class="calendar-day-np"> </td>';
					$days_in_this_week++;
				}
			}
			/* keep going with days.... */
			for($list_day = 1; $list_day <= $days_in_month; $list_day++){
				$calendar.= '<td class="calendar-day">';
					/* add in the day number */
					$calendar.= '<div class="day-number">'.$list_day.'</div>';

					/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
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
						$calendar.= str_repeat('<p> Почивен ден </p>',1);
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

			/* finish the rest of the days in the week */
			if($days_in_this_week < 8){
				for($x = 1; $x <= (8 - $days_in_this_week); $x++){
					$calendar.= '<td class="calendar-day-np"> </td>';
				}
			}

			/* final row */
			$calendar.= '</tr>';

			/* end the table */
			$calendar.= '</table>';
			
			/* all done, return result */
			return $calendar;
		}
		allinone($getyear);
		function display_public() {
			$entry_display = "<p></p>";
			mysql_connect("localhost","root","") or die("Няма връзка. " . mysql_error());
    		mysql_select_db("po4_dni") or die("Не може да избере база данни. " . mysql_error());
		    $q = "SELECT * FROM vsi4ki_dni ORDER BY vsi4ki_dni.dati ASC";
		    $r = mysql_query($q);
		    if ( $r !== false && mysql_num_rows($r) > 0 ) {
		      while ( $a = mysql_fetch_assoc($r) ) {
		        $dati = stripslashes($a['dati']);
		        $dati = date("d-m-Y", $dati);
		        // $m = date("m", $dati);
		        // switch ($m) {
		        // 	case '01':
		        		
		        // 		break;
		        	
		        // 	default:
		        // 		# code...
		        // 		break;
		        // }
		        $entry_display.= '<p class="time">'.$dati.'</p>';
		      }
		      echo $entry_display;
		    }
		}
		//display_public();
		/* sample usages */
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