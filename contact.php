<?php
	include_once('parts/header.php');
?>
	<meta name="description" content="Карта на офиса на Иван Тричков. Както и контактна форма за директно изпращане на емейл (електронно писмо) до електронната поща на Иван Тричков">
	<title>Контакти | хотел Радиели до кръстова гора | hotelradieli.com </title>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  	js = d.createElement(s); js.id = id;
	 	js.src = "//connect.facebook.net/bg_BG/sdk.js#xfbml=1&version=v2.3";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
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
			<article id="contactarea">
				<h2 style="display:none">Begin google map with the address of the office</h2>
				<p>
					За да ме откриете, може да видите картата или направо по-долу да бъдете навигирани от мястото, на което се намирате.
				</p>
				<p>
					Решили сте да ми пишете. Моля, възползвайте се от бутона, който е залепен за лявата граница на прозорецът.
				</p>
				<p class="clear"></p>
				<div class="google_map">
					<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=%D0%9F%D0%BB%D0%BE%D0%B2%D0%B4%D0%B8%D0%B2%20%D1%83%D0%BB%D0%B8%D1%86%D0%B0%20%D0%A5%D0%B0%D0%BD%20%D0%90%D1%81%D0%BF%D0%B0%D1%80%D1%83%D1%85%20105&key=AIzaSyCq3ELAWsse2U8le7E9Q4hw9vaAavm2skc"></iframe>
				</div>
			</article>
			<article>
				<h2 style="display:none">Navigation to the office</h2>
				<form action="http://maps.google.com/maps" method="get" target="_blank">
				   <label for="saddr">
				   		Напишете мястото, от което искате да дойдете</label>
				   <input type="text" name="saddr" />
				   <input type="hidden" name="daddr" value="хотел Радиели с.Дряново" />
				   <input type="submit" value="Навигирай ме" />
				</form>
			</article>
			<article>
				<h4>
					Споделяне в социалните мрежи
				</h4>
				<div class="fb-share-button" style="position: relative; top: -4px;" data-href="http://psihozdrave.com/contact.php" data-layout="button_count">
				</div>
				<g:plusone></g:plusone>
			</article>
		</div>
	<script type="text/javascript">
		var $map, $cover;
		$map = $('.google_map');
		$cover = $('<div class="cover"></div>');
		$map.append($cover);
		$cover.on('click', function () {
		  $cover.remove();
		});
	</script>
	<script type="text/javascript">
/* var bcf_settings = { buttonText:'Contact Us', buttonTop:'30%', language:'en_US' }; // Better Contact Form Settings */
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0]; js = d.createElement(s); js.id = id;
    js.src = "http://bettercontactform.com/contact/media/e/f/ef8dc8e473503a897c8c744c8d5f1ee021950242.js";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "bcf-render"));</script>
<a id="bcf_trigger" href="http://bettercontactform.com" rel="bcf_trigger"></a>
<?php
	include_once('parts/footer.php');
?>