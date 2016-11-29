<!Doctype html>
<html lang = "bg">
<head>
	<meta http-equiv="Content-Type" content="text/html"  charset="UTF-8"/>
	<title>
		Стаи | Хотелска система
	</title>
	<meta name = "viewport" content="width = device-width, initial-scale = 1">
	<link rel="icon" type="image/png" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="scripts/jquery-ui.css">
	<script type="text/javascript" src = "scripts/external/jquery/jquery.js"></script>
	<script type="text/javascript" src = "scripts/jquery-ui.js"></script>
	<script type="text/javascript" src = "bootstrap/js/bootstrap.js"></script>
	<script>
		$(function() {
			$( "#tabs" ).tabs({
	    		collapsible: true
			});
		});
		$(function() {
			$( "#vtabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		$(function() {
			$( "#vtabs2" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs2 li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		$(function() {
			$( "#vtabs3" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs3 li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		$(function() {
			$( "#vtabs4" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs4 li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		$(function() {
			$( "#vtabs5" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs5 li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		$(function() {
			$( "#vtabs6" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs6 li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		$(function() {
			$( "#vtabs7" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs7 li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		$(function() {
			$( "#vtabs8" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs8 li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		$(function() {
			$( "#vtabs9" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs9 li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		$(function() {
			$( "#vtabs10" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs10 li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		$(function() {
			$( "#vtabs11" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs11 li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
		$(function() {
			$( "#vtabs12" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
			$( "#vtabs12 li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
		});
	</script>
	<style>
		.ui-tabs-vertical { width: 55em; }
		.ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 10%; }
		.ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
		.ui-tabs-vertical .ui-tabs-nav li a { display:block;width: 100%; }
		.ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
		.ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: right; width: 40em;}
 	</style>
</head>
<body>
	<div class = "container">

		<?php
			include_once("parts/menu.php");
		?>
	</div>

	<div id="tabs">

		<ul class = "pagination">
			<li>
				<a href="#tabs-1">
					Януари
				</a>
			</li>
			<li>
				<a href="#tabs-2">
					Февруари
				</a>
			</li>
			<li>
				<a href="#tabs-3">
					Март
				</a>
			</li>
			<li>
				<a href="#tabs-4">
					Април
				</a>
			</li>
			<li>
				<a href="#tabs-5">
					Май
				</a>
			</li>
			<li>
				<a href="#tabs-6">
					Юни
				</a>
			</li>
			<li>
				<a href="#tabs-7">
					Юли
				</a>
			</li>
			<li>
				<a href="#tabs-8">
					Август
				</a>
			</li>
			<li>
				<a href="#tabs-9">
					Септември
				</a>
			</li>
			<li>
				<a href="#tabs-10">
					Октомври
				</a>
			</li>
			<li>
				<a href="#tabs-11">
					Ноември
				</a>
			</li>
			<li>
				<a href="#tabs-12">
					Декември
				</a>
			</li>
		</ul>

		<div id = "tabs-1">

			<div>

				staq1 -rozovo
			</div>
			<div>

				staq2 -zeleno
			</div>
		</div>
    <div id = "tabs-2">

			<div>

				staq1 -Червено
			</div>
			<div>

				staq2 - Айляк
			</div>
		</div>
	</div>
</body>
</html>
