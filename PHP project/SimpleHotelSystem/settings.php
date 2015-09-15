<!Doctype html>
<html lang = "bg">
<head>
	<meta http-equiv="Content-Type" content="text/html"  charset="UTF-8"/>
	<title>
		Опции | Хотелска система
	</title>
	<meta name = "viewport" content="width = device-width, initial-scale = 1">
	<link rel="icon" type="image/png" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="scripts/jquery-ui.css">
  <script type="text/javascript" src = "scripts/external/jquery/jquery.js"></script>
	<script type="text/javascript" src="scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
  <script>
  $(function() {
    $( "#dialog" ).dialog({
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
    $( "#create-room" ).click(function() {
      $( "#dialog" ).dialog( "open" );
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

  		<p class = "lead">
  			Стаи
  		</p>
    </div>

    <hr>
			<div id="dialog" title="Създаване на стая">

			  <p class="validateTips">Всички полета са задължителни.</p>
			  <form role = "form">
          <div class = "form-group">

            <label for="room-heading">Име на стаята</label>
            <input type="text" name="room-heading" id="room-heading" class="text ui-widget-content ui-corner-all form-control">
            <label for="floor">Етаж</label>
            <input type="number" name="floor" id="floor" class="text ui-widget-content ui-corner-all form-control" min = "1" max = "2">
            <label for="num-beds">Брой легла</label>
            <input type="number" name="num-beds" id="num-beds" class="text ui-widget-content ui-corner-all form-control" min = "1" max = "8">
          </div>

          <button type = "submit" class = "btn btn-default">
            <p class = "lead">
              <span class="glyphicon glyphicon-ok"></span>
              Готово
            </p>
          </button>
			  </form>
			</div>
    <div class = "row">

      <div class = "col-md-4">
				<button id="create-room" class = "btn btn-default">
					<span class="glyphicon glyphicon-plus"></span>
					Добавяне на стая
				</button>
			</div>

			<div class = "col-md-4">
        <button id="create-room" class = "btn btn-default">
          <span class="glyphicon glyphicon-pencil"></span>
          Редактиране на стая
        </button>
      </div>

			<div class = "col-md-4">
        <button id="create-room" class = "btn btn-default">
          <span class="glyphicon glyphicon-remove"></span>
          Изтриване на стая
        </button>
      </div>
		</div>

    <hr>
    <div class = "row">

      <p class = "lead">
        Клиенти
      </p>
    </div>  

    <hr>
    <div class = "row">
      <div class = "col-md-4">


      </div>

      <div class = "col-md-4">

        <button id="create-room" class = "btn btn-default">
          <span class="glyphicon glyphicon-pencil"></span>
          Редактиране име на клиент
        </button>
      </div>
      <div class = "col-md-4">


      </div>

    </div>

	</div>

</body>
</html>