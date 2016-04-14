<?php
include_once('parts/header.php');
?>
    <meta name="keywords"
          content="село Дряново, Лъки, Хотел Радиели, Hotel Radieli , къща за гости, за нас">
    <meta name="description"
          content="Туристически и информационен сайт за хотел Радиели и околностите на кръстова гора - Начална страница на хотел Радиели">
    <title> Начало | хотел Радиели до кръстова гора | hotelradieli.com </title>
    <link rel="stylesheet" type="text/css" href="style/forindexpage.css">
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
            <section>
                <h2 style="display:none;">Happyness is...</h2>
                <article>
                    <h2>Добре дошли в Хотел „Радиели“!</h2>
                </article>
                <article class="two_birds">
                    <h2 style="display:none;">Two birds</h2>
                </article>
            </section>
            <article id="entertaimant">
                <img src="images/radieli-index.jpg" alt="х. Радиели" id="az">
                <h3>Семеен Хотел "Радиели" се намира в китното родопско селце  Дряново,  само на 50км от областния град Пловдив и на 10км от гр. Лъки.</h3>
                <img src="images/az-mobile.jpg" alt="Моя снимка" id="mobile" width="100%" height="100%">
                <p><b>Разположен е в живописна местност, с много история и легенди. В близост до резервата "Кормисош" в Родопите и една от най-големите християнски светини - Кръстова гора.</b></p>
                <p><b>За своите посетители, хотелът  разполага с 10 стаи и 3 апартамента, ресторант с 60 места, лоби бар и  просторна лятна градина.</b></p>
            </article>
            <article class="upspace">
                <h2>
                    Хотелът е подходящ за отдих и пешеходен туризъм в прекрасни планински места.
                </h2>
                <p>
                    В близост до нас има множество новоизградени екопътеки, по които можете да се разходите и  насладите на красотите на Родопа планина. За по-голямо разнообразие може да предложим ловен туризъм и offroad, както и разходка до параклис „Свети Георги“ разположен на върха на село Дряново.При нас може да оргазнизирате и проведете разлини събирания и тържества: семинари, тиймбилдинги, банкети и др.
                </p>
            </article>
            <article id="dreams">
                <a href="restaurant.php">
                    <h2>"Тишина. Природата говори..."</h2>
                </a>
            </article>
            <article class="upspace">
                <h4>
                    Споделяне в социалните мрежи
                </h4>
                <div class="fb-share-button" style="position: relative; top: -4px;" data-href="http://psihozdrave.com/"
                     data-layout="button_count">
                </div>
                <g:plusone></g:plusone>
            </article>
        </div>
<?php
include_once('parts/footer.php');
?>