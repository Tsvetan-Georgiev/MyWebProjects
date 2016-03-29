<?php
	include_once('parts/header.php');
?>
	<meta name="description" content="Статии и мисли на Иван Тричков.">
	<title>Туризъм | хотел Радиели до кръстова гора | hotelradieli.com </title>
	<link rel="stylesheet" type="text/css" href="style/forstories.css">
</head>
<body>
	<div id="wrapper">
	<header>
		<div class="global">
			<div class="container">
				<div class="left mainLogo">
					<a href="index.php" title="Хотел Радиели">
						<span>Хотел Радиели</span>
					</a>
				</div>
				<div class="right contact">
					<button id="show_hide">Меню</button>
					<a href="contact.php">
						<p class="contact">Свържи се с нас</p><br>
						<ul class="icons">
							<li class="email">
								<span>radieli_sf@abv.bg</span>
							</li>
							<li class="chat">
								<span>Chat</span>
							</li>
							<li class="tel">
								<span></span>
							</li>
						</ul>
					</a>
				</div>

				<div class="right searchBox" style="float:right;">
					<script>
						(function () {
							var cx = '008128519321121355907:phxlfbljl7m';
							var gcse = document.createElement('script');
							gcse.type = 'text/javascript';
							gcse.async = true;
							gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
								'//www.google.com/cse/cse.js?cx=' + cx;
							var s = document.getElementsByTagName('script')[0];
							s.parentNode.insertBefore(gcse, s);
						})();
					</script>
					<gcse:search></gcse:search>
				</div>
			</div>
		</div>
		<nav class="menu">
			<div class="container">
				<ul>
					<li class="quoteListItem">
						<a href="index.php" title="За нас">
							<span>За нас</span>
						</a>
					</li>
					<li class="switchListItem">
						<a href="restaurant.php" title="">
							<span>Ресторант</span>
						</a>
					</li>
					<li class="everythingListItem">
						<a href="gallery.php" title="Галерия">
							<span>Галерия</span>
						</a>
					</li>
					<li class="everythingListItem">
						<a href="price.php" title="Цени">
							<span>Цени</span>
						</a>
					</li>
					<li class="everythingListItem">
						<a href="tours.php" title="Туризъм">
							<span>Туризъм</span>
						</a>
					</li>
					<li class="memberListItem">
						<a href="contact.php" title="Контакти">
							<span>Контакти</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
		<div id="content">
			<?php
				include_once('_class/simpleCMS.php');
				set_error_handler("customError");
				$obj = new simpleCMS();
				$obj->host = 'localhost';
				$obj->username = 'username';
				$obj->password = 'pass';
				$obj->table = 'psihozdr_main';
				$obj->connect();
				$obj->write($_POST);
				echo ( $_GET['admin'] == 1 ) ? $obj->display_admin() : $obj->display_public();
			?>
			<div id="linkadmin">
				<span><a href="administration/adminpanel.php">а</a></span>
			</div>
		</div>
<?php
	include_once('parts/footer.php');
?>