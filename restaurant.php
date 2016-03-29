<?php
include_once('parts/header.php');
?>
<meta name="description" content="Статии и мисли на Иван Тричков.">
<title>Ресторант | хотел Радиели до кръстова гора | hotelradieli.com </title>
<link rel="stylesheet" type="text/css" href="style/forstories.css">
</head>
<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
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
        <article>
            <h2>
                Ресторант “Радиели“ разполага с 60 места.
            </h2>
            <p>
                При нас може да похапнете както традиционни български ястия, така и специалитети от натурални продукти собствено производство: овче мляко, родопски чевермета и много други изненади.
            </p>
        </article>
        <article class="opportunities">
            <img src="images/radieli-restaurant.jpg" alt="Маса, готова и чакаща свойте консуматори" width="100%" height="100%">
            <h2 style="display:none;">hotel Radieli Restaurant picture (хотел Радиели снимка на ресторанта)</h2>
        </article>
        <article class="opportunities">
            <img src="images/radieli-restaurant2.jpg" alt="Маса, готова и чакаща свойте консуматори 2" width="100%" height="50%">
            <h2 style="display:none;">hotel Radieli Restaurant picture 2 (хотел Радиели снимка на ресторанта 2)</h2>
        </article>
        <article class="opportunities">
            <img src="images/radieli-restaurant3.jpg" alt="Маса, готова и чакаща свойте консуматори с поглед към прозорците" width="100%" height="50%">
            <h2 style="display:none;">hotel Radieli Restaurant picture 3 (хотел Радиели снимка на ресторанта 3)</h2>
        </article>
        <article class="opportunities">
            <img src="images/radieli-restaurant4.jpg" alt="Маса, готова и чакаща свойте консуматори с поглед към бара" width="100%" height="50%">
            <h2 style="display:none;">hotel Radieli Restaurant picture 4 (хотел Радиели снимка на ресторанта 4)</h2>
        </article>
        <article class="opportunities">
            <img src="images/radieli-restaurant5.jpg" alt="Маса, готова и чакаща свойте консуматори от близък план" width="100%" height="50%">
            <h2 style="display:none;">hotel Radieli Restaurant picture 5 (хотел Радиели снимка на ресторанта 5)</h2>
        </article>
    </div>
<?php
include_once('parts/footer.php');
?>