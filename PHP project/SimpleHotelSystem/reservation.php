<!Doctype html>
<html lang = "bg">
<head>
	<meta http-equiv="Content-Type" content="text/html"  charset="UTF-8"/>
	<title>
		Резервация | Хотелска система
	</title>
	<meta name = "viewport" content="width = device-width, initial-scale = 1">
	<link rel="icon" type="image/png" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="scripts/jquery-ui.css"> 
	<script type="text/javascript" src="scripts/external/jquery/jquery.js"></script>
	<script type="text/javascript" src="scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="scripts/jquery.ui.datepicker-bg.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script>
		$(function() {
			$( "#from" ).datepicker({
				defaultDate: "+1d",
				changeMonth: false,
				numberOfMonths: 2,
				onClose: function( selectedDate ) {
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
				}
			});
			$( "#to" ).datepicker({
				defaultDate: "+1w",
				changeMonth: false,
				numberOfMonths: 2,
				onClose: function( selectedDate ) {
					$( "#from" ).datepicker( "option", "maxDate", selectedDate );
				}
    		});
		});
	</script>
</head>
<body style = "background:#EEEEEE;">
	<div class = "container">
		<?php
			include_once("parts/menu.php");
		?>
							<?php 
								$now = strtotime(date("Y-m-d"));
								include_once "scripts/conn.php";
								$q = <<<SQL
									SELECT * FROM reservation
									WHERE fromDate >= "$now";
SQL;
								$res_list = $conn -> query($q);
								$res_future = array();
								while($row = $res_list -> fetch_assoc()){
									$res_id = $row["ID"];
									$res_number = $row["roomNumber"];
									$res_from = $row["fromDate"];
									$res_to = $row["toDate"];
									$res_future[] = array(

										"$res_number"."-"."$res_id" => array(
											"from" => "$res_from",
											"to" => "$res_to"
										)
									);
								}
// array for free rooms at date after today
								echo "<div id = 'busyrooms' style = 'display:none'>";
									foreach ($res_future as $key => $value) {
										foreach ($value as $key2 => $value2) {
											echo $key2;
											foreach ($value2 as $key3 => $value3) {
												echo ",".$value3;
											}
											echo ";";
										}
									}
								echo "</div>";
//all rooms and info
								$q = <<<SQL
								SELECT ID,title,floor,beds FROM rooms
SQL;
								$res_list = $conn -> query($q);
								echo "<div id = 'roomsInfo' style = 'display:none'>";
								while($row = $res_list -> fetch_assoc()){
									$roomid = $row["ID"];
									$roomname = $row["title"].", ".$row["floor"]."ет., ".$row["beds"]." легла";
									echo $roomid.",".$roomname.";";
								}
								echo "</div>";
							?>
		<div class = "row">
			<div class = "col-md-12">
				<form role = "form" name = "reservation" id = "reservation" method = "GET">
					<div class = "form-group">
						<label for = "old-friends">
							<p class = "lead">
								Стари клиенти
							</p>
						</label>
						<hr>
						<select class = "form-control  input-lg" id = "old-friends" name = "old-friends">
							<?php 
// option for the clients

								include_once "scripts/conn.php";
								$q = <<<SQL
									SELECT * FROM clients
									WHERE ID!="0"
SQL;
								$result = $conn -> query($q);
								if ($result->num_rows > 0) {
									echo "<option value = '0'>Нов клиент, може да се подмине полето</option>";
									while($row = $result->fetch_assoc()){
										$client_ID = $row["ID"];
										$client_name = $row["names"];
										echo "<option value = '$client_ID'>".$client_ID.". ".$client_name."</option>";
									}
								}
								else{
									echo "<option value ='0'>Все още няма въведени клиенти.</option>";
								}

							?>
						</select>
					</div>
					<div class = "form-group">
						<div class = "col-md-6">
							<hr>
							<label for = "from">
								<p class = "lead">
									От дата
								</p>
							</label>
							<hr>
							<input type="text" class = "form-control input-lg" id="from" placeholder="Начална дата" name = "res-from" onChange = "freerooms()">
							<hr>
						</div>
						<div class = "col-md-6">
							<hr>
							<label for = "to">
								
								<p class = "lead">
									До дата
								</p>
							</label>
							<hr>
							<input type = "text" class = "form-control input-lg" id = "to" placeholder="Крайна дата" name = "res-to" onChange = "freerooms()">
						<hr>
						</div>
					</div>
					<div class = "form-group">
						<label for = "free-room">
							<p class = "lead">
								Стая
							</p>
						</label>
						<hr>
						<select type = "text" class = "form-control input-lg" id = "free-room" name = "free-room">
						</select>
					</div>
					<div class = "form-group">
						<hr>
							<label for = "cust-names">
								<p class = "lead">
									Трите имена
								</p>
							</label>
						<hr>
							<input type = "text" class = "form-control input-lg" id = "cust-names" placeholder = "Въвеждане на имена" name = "cust-names">
						<hr>
							<label for = "price">
								<p class = "lead">
									Цена
								</p>
							</label>
						<hr>
							<input type = "number" class = "form-control input-lg" id = "price" placeholder = "Лева" min = "0" step = "any" name = "price">
						<hr>
					</div>
					<button type = "submit" id = "button-res" class = "btn btn-default" name = "reservation" formmethod = "POST" form = "reservation">
						<p class = "lead">
							<span class="glyphicon glyphicon-ok"></span>
							Резервация
						</p>
					</button>
					<hr>
				</form>

				<div id="dialog" title="Регистрацията завърши"  class = "col-md-12">
					<?php
						if (isset($_POST['reservation'])) {
							include "scripts/conn.php";
							$res_from = $_POST['res-from'];
							$res_from = strtotime($res_from);
							// echo "От дата ".$res_from;
							if ($_POST['res-to'] !== '') {
								$res_to = $_POST['res-to'];
								$res_to = strtotime($res_to);
							}
							else{
								$res_to = $_POST['res-from'];
								$res_to = strtotime($res_to);
							}
							//echo "<br>До дата ".$res_to;
							$room = $_POST['free-room'];
							// echo "<br>Стая ".$room;
							if ($_POST['cust-names'] != null) {
								$new_c = $_POST['cust-names'];
								// echo "<br> Нов клиент ".$new_c;
							}
							if ($_POST['old-friends'] != "0") {
								$old_friend = $_POST['old-friends'];
								// echo "<br>Стар клиент ".$old_friend;
								$q = <<<SQL
								UPDATE clients
								SET 
									fromDate = "$res_from",
									toDate = "$res_to"
								WHERE ID ="$old_friend"

SQL;
								$conn -> query($q);
							}
							else{
								$q = <<<SQL
								INSERT INTO clients
								(names, phone, room, fromDate, toDate)
								VALUES
								('$new_c','0', '$room', '$res_from', '$res_to')
SQL;
								$conn -> query($q);
								$q = <<<SQL
								SELECT ID FROM clients
								WHERE ID = LAST_INSERT_ID();
								
SQL;
								$old_friend = $conn -> query($q);
								$old_friend = $old_friend -> fetch_assoc();
								$old_friend = $old_friend["ID"];
								// echo '<br> old friend: '.$old_friend;
							}
							$price = $_POST['price'];
							// echo "<br> Пари ".$price;
							$q = <<<SQL
								INSERT INTO reservation 
								(price,roomNumber,clientNumber,fromDate,toDate)
								VALUES
								('$price','$room','$old_friend','$res_from','$res_to')
SQL;
							$conn -> query($q);
							$res_to = strtotime( date("Y-m-d",$res_to) . "+1 day");
							//echo "dateToFree = ".$res_to;
							$q = <<<SQL
								UPDATE rooms 
								SET busy = '1', dateToFree = '$res_to'
								WHERE ID = "$room"
SQL;
							$conn -> query($q);
						}

					?>

				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">

		function freerooms(){
//взима стойността на от дата
			var dateFrom = document.getElementById("from").value,
			dateTo = document.getElementById("to").value,
//информация за всяка стая(легла, етаж...)
			roomName = document.getElementById("roomsInfo").innerHTML,
//прави данните на масив. всяка стая е в отделен елемент
			roomNameArray = roomName.split(";"),
			loop = roomNameArray.length - 1,
			free_rooms,
			dateFrom1,dateTo1,
//събира данните за резервации от сега нататък от php
			phpReportRooms = document.getElementById("busyrooms").innerHTML,
			arrayOfBusyRooms;
//маха излишният "" елемент
			roomNameArray.splice(loop,1);
			free_rooms = 0;
//същата логика като в roomInfo, само че за заетите стаи след сегашна дата
			arrayOfBusyRooms = phpReportRooms.split(";");
			dateFrom = dateFrom.split(".");
// формат подходящ за unixtimestamp
			dateFrom1 = dateFrom[2].concat(".",dateFrom[1],".",dateFrom[0]);
//преобразуване към линуксвреме
			dateFrom1 = new Date(dateFrom1).getTime() / 1000;
			dateFrom1 = dateFrom1 + 3600;
//при въведена до дата преобразуване на до дата
			if (typeof dateTo !== 'undefined' && dateTo !== null && dateTo !== "") {
				dateTo = dateTo.split(".");
				dateTo1 = dateTo[2].concat(".",dateTo[1],".",dateTo[0]); 
				dateTo1 = new Date(dateTo1).getTime() / 1000;
				dateTo1 = dateTo1 + 3600
			};
//превъртане на бъдещите резервации
			for (var i = arrayOfBusyRooms.length - 1; i >= 0; i--) {
//проверка на i елемент в масив със заети стаи
				if (typeof arrayOfBusyRooms[i] !== 'undefined' && arrayOfBusyRooms[i] !== null) {
					var roomNumber, room = arrayOfBusyRooms[i];
					roomNumber = room.substr(0,1);
					room = room.split(",");
					if (dateTo1 > 0) {
// при въведени от-до дата влиза само ако има резервация в списъка и маха възможните стаи
						if (dateFrom1 >= room[1] && dateFrom1 <= room[2] || dateTo1 >= room[1] && dateTo1 <= room[2]) {
							for (var l = 0; l < roomNameArray.length; l++) {
								var numberForDelete = roomNameArray[l];
								numberForDelete = numberForDelete.substr(0,1);
								if (numberForDelete === roomNumber) {
									roomNameArray.splice(l,1);
								};
							};
						}
					}

// при въедена "от" дата влиза и маха от списъкът със стаи заетата
					else{
						if (dateFrom1 >= room[1] && dateFrom1 <= room[2]) {
							for (var l = 0; l < roomNameArray.length; l++) {
								var numberForDelete = roomNameArray[l];
								numberForDelete = numberForDelete.substr(0,1);
								if (numberForDelete === roomNumber) {
									roomNameArray.splice(l,1);
								};
							};
						}
					};
				};
			};
			for (var k = 0; k < loop; k++) {
				if (typeof roomNameArray[k] !== 'undefined' && roomNameArray[k] !== null) {
					var j = k;
						j++;
					createoption(j,roomNameArray[k]);
				}
			}
		}
//добавя опцията за свободната стая
		function createoption(number,text){
			var select = document.getElementById('free-room');
			var length = select.options.length;
			var one = 1;
				var opt = document.createElement('option');
				opt.value = number;
				opt.innerHTML = text;
			if (length > 0) {

				for (var b = 0; b < length; b++) {
					if (select.options[b].text) {

						var alibaba = select.options[b].text;
						var alibaba2 = opt.innerHTML;
						if(alibaba == alibaba2){
							var one = 0;
							break;
						}
					};
				};
				if (one) {
					select.appendChild(opt);
				};
			}
			else{
				select.appendChild(opt);
			}
		}		
	</script>
</body>
</html>