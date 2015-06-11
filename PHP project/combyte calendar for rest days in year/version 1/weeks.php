<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="dayoffs.css">
	<title>Калкулатор за почивни дни през дадена година</title>
</head>
<body>
	<div>
		<form name="year" method="post">
			Изберете година
			<input type="number" name="year" min="1902" max="2037" value="2015">
			<input type="submit" name="submit" value="Виж">
		</form>
	</div>
<?php
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
			global $hdays,$arr_weekds,$fevruari_days;
			$qnuari=0;
			$fevruari=0;
			$mart=0;
			$april=0;
			$mai=0;
			$iuni=0;
			$iuli=0;
			$avgust=0;
			$septemvri=0;
			$oktomvri=0;
			$noemvri=0;
			$dekemvri=0;
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
			echo "<h3>Всички почивни дни през ".$getyear."</h3>";
			echo "<br>";
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
				// проверява за кой месец е текущата дата
				$todays_month=date("m",strtotime($arr_weekds[$i]));
				// реже годината
				$arr_weekds[$i]= substr_replace($arr_weekds[$i], "", 5,5);
				// копира само датата на следващото число
				// $just_date_next= substr($arr_weekds[$i+1], 2, 2);
				// $just_date_next= intval($just_date_next);
				set_error_handler("customError");
				switch ($todays_month) {
					case '01':
						$qnuari_all.= "<div class='qnuari' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$qnuari++;
						$all_rest_days++;
						break;
					case '02':				
						$fevruari_all.= "<div class='fevruari' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$fevruari++;
						$all_rest_days++;
						break;
					case '03':
						$mart_all.= "<div class='mart' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$mart++;
						$all_rest_days++;
						break;
					case '04':
						$april_all.= "<div class='april' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$april++;
						$all_rest_days++;
						break;
					case '05':
						$mai_all.= "<div class='mai' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$mai++;
						$all_rest_days++;
						break;
					case '06':
						$iuni_all.= "<div class='iuni' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$iuni++;
						$all_rest_days++;
						break;
					case '07':
						$iuli_all.= "<div class='iuli' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$iuli++;
						$all_rest_days++;
						break;
					case '08':
						$avgust_all.= "<div class='avgust' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$avgust++;
						$all_rest_days++;
						break;
					case '09':
						$septemvri_all.= "<div class='septemvri' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$septemvri++;
						$all_rest_days++;
						break;
					case '10':
						$oktomvri_all.= "<div class='oktomvri' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$oktomvri++;
						$all_rest_days++;
						break;
					case '11':
						$noemvri_all.= "<div class='noemvri' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$noemvri++;
						$all_rest_days++;
						break;
					case '12':
						$dekemvri_all.= "<div class='dekemvri' style='display:inline-block;margin:2px 10px 2px 10px;width=20%;'>".$arr_weekds[$i]."</div>";
						$dekemvri++;
						$all_rest_days++;
						break;
					default:
						break;
				}

				//echo "<div style='background:green'>".$todays_month."</div>";
				// $today_month= date("m",strtotime($arr_weekds[$i+1]));
				//echo "<div style='background:red'>".$arr_weekds[$i]."</div>";
				// echo "<div style='background:green'>".gettype($arr_weekds[$i+1])."</div>";
				// if (gettype($arr_weekds[$i+1])=="string") {
				// 	if ($today_month!==$todays_month) {
				// 		echo "<br>";
				// 	}
				// }
			}
			echo "Всички почивни дни са общо - $all_rest_days от $leap_year<br>";
			echo "<br><h4> Почивните дни за всеки месец са както следва </h4><br>
				Януари - $qnuari  от 31<br>
				Февруари - $fevruari от $fevruari_days<br>
				Март - $mart  от 31<br>
				Април - $april от 30<br>
				Май - $mai от 31<br>
				Юни - $iuni от 30<br>
				Юли - $iuli от 31<br>
				Август - $avgust от 31<br>
				Септември - $septemvri от 30<br>
				Октомври - $oktomvri от 31<br>
				Ноември - $noemvri от 30<br>
				Декември - $dekemvri от 31
				";
			echo "<br><br><h4> Работните дни за всеки месец са както следва </h4><br>
				Януари - ".$qnuari=31-$qnuari."  от 31<br>
				Февруари - ".$fevruari_days=$fevruari_days-$fevruari." от ".$fevruari_days." <br>
				Март - ".$mart=31-$mart."  от 31<br>
				Април - ".$april=30-$april." от 30<br>
				Май - ".$mai=31-$mai." от 31<br>
				Юни - ".$iuni=30-$iuni." от 30<br>
				Юли - ".$iuli=31-$iuli." от 31<br>
				Август - ".$avgust=31-$avgust." от 31<br>
				Септември - ".$septemvri=30-$septemvri." от 30<br>
				Октомври - ".$oktomvri=31-$oktomvri." от 31<br>
				Ноември - ".$noemvri=30-$noemvri." от 30<br>
				Декември - ".$dekemvri=31-$dekemvri." от 31
				";
			echo "<div><br><span  class='month'>Януари $getyear</span><br><br>".$qnuari_all."</div>";
			echo "<div><br><span  class='month'>Февруари $getyear</span><br><br>".$fevruari_all."</div>";
			echo "<div><br><span  class='month'>Март $getyear</span><br><br>".$mart_all."</div>";
			echo "<div><br><span  class='month'>Април $getyear</span><br><br>".$april_all."</div>";
			echo "<div><br><span  class='month'>Май $getyear</span><br><br>".$mai_all."</div>";
			echo "<div><br><span  class='month'>Юни $getyear</span><br><br>".$iuni_all."</div>";
			echo "<div><br><span  class='month'>Юли $getyear</span><br><br>".$iuli_all."</div>";
			echo "<div><br><span  class='month'>Август $getyear</span><br><br>".$avgust_all."</div>";
			echo "<div><br><span  class='month'>Септември $getyear</span><br><br>".$septemvri_all."</div>";
			echo "<div><br><span  class='month'>Октомври $getyear</span><br><br>".$oktomvri_all."</div>";
			echo "<div><br><span  class='month'>Ноември $getyear</span><br><br>".$noemvri_all."</div>";
			echo "<div><br><span  class='month'>Декември $getyear</span><br><br>".$dekemvri_all."</div>";
		return $all_rest_days;
		}
	function customError($errno, $errstr) {
	}
	// while ($getyear!==$getyear2) {
	// 	echo "<div style='background:red;'> $getyear </div>";
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
		allinone($getyear);
		//$osiguritelen_staj=$osiguritelen_staj+allinone($getyear);
		// $getyear=$getyear+1;
		// $fevruari_days=getDaysFev($getyear2);
		// $Razppetak=VelikDen($getyear2,"2");
		// $Ponedlk=VelikDen($getyear2,"-1");
		// if ($Razppetak!==$hdays[2] and $Razppetak!==$hdays[3]) {
		// 	array_push($hdays, $Razppetak);
		// }
		// if ($Ponedlk!==$hdays[2] and $Ponedlk!==$hdays[3]) {
		// 	array_push($hdays, $Ponedlk);
		// }
		// getWeekendsOfYear($getyear2);
		// getHolidaysOfYear($getyear2);
		// allinone($getyear2);
		//$osiguritelen_staj=$osiguritelen_staj+allinone($getyear);
		// $getyear=$getyear+1;
	// }
	//echo "Осигурителният стаж за периода е ".$osiguritelen_staj;
}
?>
<br>
</body>
</html>