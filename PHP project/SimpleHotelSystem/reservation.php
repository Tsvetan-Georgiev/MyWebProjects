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
				defaultDate: "+1w",
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
<body>
	<div class = "container">
		<?php
			include_once("parts/menu.php");
		?>
		<div class = "row">
			<div class = "col-md-12">
				<form role = "form">
					<div class = "form-group">
						<label for = "old-friends">
							<p class = "lead">
								Стари клиенти
							</p>
						</label>
						<select class = "form-control  input-lg" id = "old-friends">
							<option>1</option>
						</select>
					</div>
					<div class = "form-group">
						<div class = "col-md-6">
							<label for = "from">
								<p class = "lead">
									От дата
								</p>
							</label>
							<input type="text" class = "form-control input-lg" id="from" placeholder="Начална дата">
						</div>
						<div class = "col-md-6">
							<label for = "to">
								
								<p class = "lead">
									До дата
								</p>
							</label>
							<input type = "text" class = "form-control input-lg" id = "to" placeholder="Крайна дата">
						</div>
					</div>
					<div class = "form-group">
						<label for = "free-room">
							<p class = "lead">
								Стая
							</p>
						</label>
						<input type = "text" class = "form-control input-lg" id = "free-room">
					</div>
					<div class = "form-group">
						<!-- <div class = "col-sm-10"> -->
							<label for = "cust-names">
								<p class = "lead">
									Трите имена
								</p>
							</label>
							<input type = "text" class = "form-control input-lg" id = "cust-names" placeholder = "Въвеждане на имена">
						<!-- </div> -->
						<!-- <div class = "col-sm-2"> -->
							<label for = "price">
								<p class = "lead">
									Цена
								</p>
							</label>
							<input type = "number" class = "form-control input-lg" id = "price" placeholder = "Лева" min = "0">
						<!-- </div> -->
					</div>
					<div class = "checkbox">
						<label>
							<input type = "checkbox">Ала бала
						</label>
					</div>
					<button type = "submit" class = "btn btn-default">
						<p class = "lead">
							<span class="glyphicon glyphicon-ok"></span>
							Резервация
						</p>
					</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>