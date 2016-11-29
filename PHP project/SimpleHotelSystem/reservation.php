<!Doctype html>
<html lang = "bg">
<head>
	<meta http-equiv="Content-Type" content="text/html"  charset="UTF-8"/>
	<title>
		Резервация | Хотелска система
	</title>
	<meta name = "viewport" content="width = device-width, initial-scale = 1">
	<link rel="icon" type="image/png" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="scripts/jquery-ui.css">
	<script type="text/javascript" src="scripts/external/jquery/jquery.js"></script>
	<script type="text/javascript" src="scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="scripts/jquery.ui.datepicker-bg.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script>
		 $(function() {
		    $( "#dialog3" ).dialog({
		      autoOpen: false,
		      show: {
		        effect: "clip",
		        duration: 700
		      },
		      hide: {
		        effect: "scale",
		        duration: 700
		      }
		    });
		    $( "#delete-res-open" ).click(function() {
		      $( "#dialog3" ).dialog( "open" );
		      });
		    });
	</script>
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
							// error_reporting(E_ALL);
								$now = strtotime(date("Y-m-d"));
								include_once "scripts/conn.php";
								$q = <<<SQL
									SELECT * FROM reservation
									WHERE fromDate >= "$now"
									OR toDate >= "$now";
SQL;
								$res_list = $conn->query($q);
								$res_future = array();
								while($row = $res_list->fetch_assoc()){
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
						<div class = "col-md-4">
							<button type = "submit" id = "button-res" class = "btn btn-default" name = "reservation" formmethod = "POST" form = "reservation">
								<p class = "lead">
									<span class="glyphicon glyphicon-ok"></span>
									Резервация
								</p>
							</button>
						</div>
				</form>
						<div class = "col-md-4">
						</div>
						<div class = "col-md-4">
				        	<button id="delete-res-open" class = "btn btn-default">
				        		<span class="glyphicon glyphicon-remove"></span>
				        		Изтриване на резервация
				        	</button>
					    </div>
					<hr>
<!--изтриване на резервация-->
				<div id = "dialog3" title = "Изтриване на резервация">
				        <form role = "form" id = "delete-res" name = "delete-res" method = "POST">
				          <div class = "form-group">
				            <label for = "">Резервация за изтриване</label>
				            <select type = "text" class = "form-control input-lg" id = "delete-res-choice" name = "delete-res-choice">
				              <?php
				                include_once "scripts/conn.php";
				                	$q = <<<SQL
					                   SELECT * FROM reservation
										WHERE fromDate >= "$now"
										OR toDate >= "$now";
SQL;
				                	$result = $conn->query($q);
				                	if ($result->num_rows > 0) {
				                		while($row = $result->fetch_assoc()){
											$res_id = $row["ID"];
											$res_number = $row["roomNumber"];
											$res_from = $row["fromDate"];
											$res_from = date("d-m-Y",$res_from);
											$res_to = $row["toDate"];
											$res_to = date("d-m-Y",$res_to);
					                    	echo "<option value = '$res_id'>".$res_id.". стая ".$res_number."; от ".$res_from."; до ".$res_to."</option>";
				                		}
				                	}
				                	else{
				                		echo "<option value ='0'>Все още няма въведени резервации.</option>";
				                	}
				            	?>
				        	</select>
				        </div>
				        	<button type = "submit" class = "btn btn-default" name = "delete-res" formmethod = "POST" form = "delete-res">
				            	<p class = "lead">
				            		<span class="glyphicon glyphicon-ok"></span>
				            		Готово
				            	</p>
				        	</button>
				        </form>
				        <?php

				          if (isset($_POST["delete-res"])) {
				            $res_id_delete = $_POST["delete-res-choice"];
				            $q = <<< SQL
				              DELETE FROM reservation
				              WHERE ID = "$res_id_delete"
SQL;
				            $conn -> query($q);
				            $conn -> close();
				            echo '<script> location.replace("reservation.php"); </script>';
				          }
				        ?>
				</div>
<!--изтриване на резервация-->
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
							echo "<p class = 'lead'>Успешна резервация!</p>";
							echo '<script> location.replace("reservation.php"); </script>';
						}

					?>

				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">

		function freerooms(){
			clearselect();//изчиства старите опции за стаи
			var dateFrom = document.getElementById("from").value,//взима стойността на от дата
			dateTo = document.getElementById("to").value,
			roomName = document.getElementById("roomsInfo").innerHTML,//информация за всяка стая(легла, етаж...)
			roomNameArray = roomName.split(";"),//прави данните на масив. всяка стая е в отделен елемент
			loop,
			free_rooms,
			dateFrom1,dateTo1,
			phpReportRooms = document.getElementById("busyrooms").innerHTML,//събира данните за резервации от сега нататък от php
			arrayOfBusyRooms;
			free_rooms = 0;
			arrayOfBusyRooms = phpReportRooms.split(";");//същата логика като в roomInfo, само че за заетите стаи след сегашна дата
			loop = arrayOfBusyRooms.length - 1;
			arrayOfBusyRooms.splice(loop,1);//маха излишният "" елемент
			loop = roomNameArray.length - 1;
			roomNameArray.splice(loop,1);
			dateFrom = dateFrom.split(".");
			dateFrom1 = dateFrom[2].concat(".",dateFrom[1],".",dateFrom[0]);// формат подходящ за unixtimestamp
			dateFrom1 = new Date(dateFrom1).getTime() / 1000;//преобразуване към линуксвреме
			//dateFrom1 = dateFrom1 + 3600;
			if (typeof dateTo !== 'undefined' && dateTo !== null && dateTo !== "") {//при въведена до дата преобразуване на до дата
				dateTo = dateTo.split(".");
				dateTo1 = dateTo[2].concat(".",dateTo[1],".",dateTo[0]);
				dateTo1 = new Date(dateTo1).getTime() / 1000;
				//dateTo1 = dateTo1 + 3600
			};
			for (var i = arrayOfBusyRooms.length - 1; i >= 0; i--) {//превъртане на бъдещите резервации
				if (typeof arrayOfBusyRooms[i] !== 'undefined' && arrayOfBusyRooms[i] !== null) {//проверка на i елемент в масив със заети стаи
					var roomNumber, room = arrayOfBusyRooms[i];
					roomNumber = room.substr(0,1);
					room = room.split(",");
					if (dateTo1 > 0) {
						if (dateFrom1 >= room[1] && dateFrom1 <= room[2] || dateTo1 >= room[1] && dateTo1 <= room[2] || dateFrom1 <= room[1] && dateTo1 >= room[2]) {// при въведени от-до дата влиза само ако има резервация в списъка и маха възможните стаи
							for (var l = 0; l < roomNameArray.length; l++) {
								var numberForDelete = roomNameArray[l];
								numberForDelete = numberForDelete.substr(0,1);
								if (numberForDelete === roomNumber) {
									roomNameArray.splice(l,1);
								};
							};
						}
					}
					else{// при въедена "от" дата влиза и маха от списъкът със стаи заетата
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
			loop = roomNameArray.length;
			for (var k = 0; k < loop; k++) {
				if (typeof roomNameArray[k] !== 'undefined' && roomNameArray[k] !== null) {
					var j = roomNameArray[k];
					j = j.substr(0,1);
					createoption(j,roomNameArray[k]);
				}
			}
		}
		function createoption(number,text){//добавя опцията за свободната стая
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
		function clearselect(){
			var select = document.getElementById("free-room");
			var length = select.options.length;
			for (var c = length - 1; c >= 0; c--) {
				select.options[c] = null;
			};
		}
	</script>
</body>
</html>
