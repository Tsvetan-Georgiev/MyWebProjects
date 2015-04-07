<?php
	include_once('parts/header.php');
?>
	<meta name="description" content="Статии и мисли на Иван Тричков.">
	<title>Статии и публикации | Психоздраве с Иван Тричков | psihozdrave.com</title>
	<link rel="stylesheet" type="text/css" href="style/forstories.css">
</head>
<body>
	<div id="wrapper">
		<header>
			<div class="global">
				<div class="container">
					<div class="left mainLogo">
						<a href="index.php" title="Психо здраве">
							<span>Психо здраве</span>
						</a>
					</div>
					<div class="right contact">
						<button id="show_hide">Меню</button>
						<a href="contact.php">
							<p class="contact">Свържи се с Иван</p><br>
							<ul class="icons">
								<li class="email">
									<span>itrichkov@abv.bg</span>
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
					<div class="right searchBox">
						<script type="text/javascript">

						</script>
						<div id="___gcse_0">
						</div>
					</div>
				</div>
			</div>
			<nav class="menu">
				<div class="container">
					<ul>
						<li class="quoteListItem">
							<a href="index.php" title="Добре дошли!">
								<span>Добре дошли!</span>
							</a>
						</li>
						<li class="switchListItem">
							<a href="psyholog.php" title="Психолог">
								<span>Психолог</span>
							</a>
						</li>
						<li class="everythingListItem">
							<a href="storyies.php" title="Статии и публикации">
								<span>Статии и публикации</span>
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