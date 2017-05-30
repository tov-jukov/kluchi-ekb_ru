<?php
/**
 * Основной шаблон сайта
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2017 OOO «Диафан» (http://www.diafan.ru/)
 */

if(! defined("DIAFAN"))
{
    $path = __FILE__; $i = 0;
    while(! file_exists($path.'/includes/404.php'))
    {
        if($i == 10) exit; $i++;
        $path = dirname($path);
    }
    include $path.'/includes/404.php';
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <!-- шаблонный тег show_head выводит часть HTML-шапки сайта. Описан в файле themes/functions/show_head.php. -->
    <insert name="show_head">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="<insert name=" path ">favicon.ico" type="image/x-icon">
    <!-- шаблонный тег show_css подключает CSS-файлы. Описан в файле themes/functions/show_css.php. -->
    <!-- <insert name="show_css" files="default.css, style.css"> -->
    <insert name="show_css" files="style.css">
</head>

<body>

    <!-- Yandex.Metrika counter -->
    <!-- /Yandex.Metrika counter -->

    <div id="page">
        <header>
            <div class="top-head">
                <div class="wrapper">
                    <div class="logo">
                        <a href="../../index.html">
                            <img src="<insert name="path">maket/images/logo.png" alt="Реабилитационный центр Ключи - логотип">
                        </a>
                    </div>
                    <div class="wotk-time">
                        <div class="t">Работаем ежедневно 24 часа в сутки</div>
                        <div class="b">бесплатная анонимная консультация</div>
                    </div>
                    <div class="right-column">
                        <div class="tel"><div class="tel"><insert name="show_block" module="site" id="1"></div>
                        <a href="#inline1" class="order">Заказать обратный звонок</a>
                        <br/>
                        <br/>
                        <a href="index.html">Карта проезда</a>
                    </div>
                </div>
            </div>
            <div class="bottom-head">
                <div class="wrapper">
                    <nav class="main-menu">
                        <ul>
                            <ul>
                                <li class='active'><a href='../index.html' class='active'>О нас</a></li>
                                <li><a href='../../lechenie-narkomanii/index.html'>Лечение наркомании</a></li>
                                <li><a href='../../lechenie-alkogolizma/index.html'>Лечение алкоголизма</a></li>
                                <li><a href='../../reabilitatsiya/index.html'>Реабилитация</a></li>
                                <li><a href='../../rodstvennikam/index.html'>Родственникам</a></li>
                                <li><a href='../../blog/index.html'>Блог</a></li>
                            </ul>
                        </ul>
                    </nav>
                    <div class="block-search">
                        <div class="ya-site-form ya-site-form_inited_no" onclick="return {'action':'http://narkologicheskaya-klinika-rostov.ru/search/','arrow':false,'bg':'transparent','fontsize':12,'fg':'#000000','language':'ru','logo':'rb','publicname':'Yandex Site Search #2289724','suggest':true,'target':'_self','tld':'ru','type':3,'usebigdictionary':true,'searchid':2289724,'input_fg':'#999999','input_bg':'#ffffff','input_fontStyle':'normal','input_fontWeight':'normal','input_placeholder':'Поиск по сайту...','input_placeholderColor':'#999999','input_borderColor':'#ffffff'}">
                            <form action="https://yandex.ru/search/site/" method="get" target="_self" accept-charset="utf-8">
                                <input type="hidden" name="searchid" value="2289724" />
                                <input type="hidden" name="l10n" value="ru" />
                                <input type="hidden" name="reqenc" value="" />
                                <input type="search" name="text" value="" />
                                <input type="submit" value="Найти" />
                            </form>
                        </div>
                        <style type="text/css">
                        .ya-page_js_yes .ya-site-form_inited_no {
                            display: none;
                        }
                        </style>
                <script type="text/javascript">
                        (function(w, d, c) {
                            var s = d.createElement('script'),
                                h = d.getElementsByTagName('script')[0],
                                e = d.documentElement;
                            if ((' ' + e.className + ' ').indexOf(' ya-page_js_yes ') === -1) {
                                e.className += ' ya-page_js_yes';
                            }
                            s.type = 'text/javascript';
                            s.async = true;
                            s.charset = 'utf-8';
                            s.src = (d.location.protocol === 'https:' ? 'https:' : 'http:') + '//site.yandex.net/v2.0/js/all.js';
                            h.parentNode.insertBefore(s, h);
                            (w[c] || (w[c] = [])).push(function() {
                                Ya.Site.Form.init()
                            })
                        })(window, document, 'yandex_site_callbacks');
                        </script>
                    </div>
                </div>
                <a id="menu-mobile-open" href="#" class="">
                    <span class="top-line"></span>
                    <span class="one"></span>
                    <span class="two"></span>
                    <span class="bottom-line"></span>
                </a>
            </div>
        </header>
        <div class="content">
            <div class="wrapper">
                <div class="left-column">
                    <div class="breachroomb">
                        <!-- <a href='../../index.html'>Главная</a> / <a href='../index.html'>О нас</a> / Контакты  -->
                        <insert name="show_path">
                        </div>
                    <div class="txt-block">
                        <div class="tpl-block-list tpl-component-netcat-stub-address" id="nc-block-881166c221a2cc237b2b8e54fc5635ad">
                            <div id="kontakty"></div>
                            <div class='nc_list nc_addresses'>
                                <div class='nc_row'>

                                <insert name="show_body">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside>
                    <div class="form">
                        <div class="t">
                            бесплатная консультация
                        </div>
                        <p>
                            Не откладывайте! Сделайте это прямо сейчас!
                        </p>
                        <form class="order" enctype="multipart/form-data" method="post" action="http://narkologicheskaya-klinika-rostov.ru/netcat/add.php">
                            <input name="catalogue" type="hidden" value="1">
                            <input name="cc" type="hidden" value="16">
                            <input name="sub" type="hidden" value="25">
                            <input name="posting" type="hidden" value="1">
                            <input name="f_urlMessage" type="hidden" value="index.html">
                            <input type="hidden" name="f_trafficSource" value="">
                            <input type="hidden" name="f_istochnik" value="">
                            <input type="text" name="f_name" placeholder="Ваше имя">
                            <input type="text" name="f_phone" class="telephone" placeholder="Телефон*">
                            <input type="submit" value="Отправить заявку" class="btn">
                        </form>
                    </div>
                    <!-- right menu -->
                    <div class='nav-catalog'>
                        <div class='t'>Меню</div>
                        <nav>
                            <ul>
                                <li><a href='../fotogalereya/index.html'>Фотогалерея</a></li>
                                <li><a href='../otzyvy/index.html'>Отзывы</a></li>
                                <li class='active'><a href='index.html'>Контакты</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="why-we-aside">
                        <div class="t">
                            почему именно мы?
                        </div>
                        <div class="single-slider">
                            <div class="item">
                                <div class="photo">
                                    <img src="<insert name="path">maket/images/why-we/img1.jpg" alt="">
                                </div>
                                <div class="desk">
                                    <img src="<insert name="path">maket/images/why-we/v1.jpg" alt="">
                                    <div class="txt">
                                        <div class="t">Индивидуальный</div>
                                        <p>Подход к каждому</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="photo">
                                    <img src="<insert name="path">maket/images/why-we/img2.jpg" alt="">
                                </div>
                                <div class="desk">
                                    <img src="<insert name="path">maket/images/why-we/v2.jpg" alt="">
                                    <div class="txt">
                                        <div class="t">СПЕЦИАЛИСТЫ</div>
                                        <p>Опытные профессионалы </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item item3">
                                <div class="photo">
                                    <img src="<insert name="path">maket/images/why-we/img3.jpg" alt="">
                                </div>
                                <div class="desk">
                                    <img src="<insert name="path">maket/images/why-we/v3.jpg" alt="">
                                    <div class="txt">
                                        <div class="t">ТРУДОУСТРОЙСТВО</div>
                                        <p>Поможем найти достойную работу</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item item4">
                                <div class="desk">
                                    <img src="<insert name="path">maket/images/why-we/v4.jpg" alt="">
                                    <div class="txt">
                                        <div class="t">ПОЖИЗЕННАЯ</div>
                                        <p>Поддержка и помощь</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item item5">
                                <div class="photo">
                                    <img src="<insert name="path">maket/images/why-we/img4.jpg" alt="">
                                </div>
                            </div>
                            <div class="item item6">
                                <div class="desk">
                                    <img src="<insert name="path">maket/images/why-we/v5.jpg" alt="">
                                    <div class="txt">
                                        <div class="t">Эффективный</div>
                                        <p>Результат лечения</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        <footer>
            <div class="wrapper">
                <div class="left-column">
                    <div class="t-f">
                        Бесплатная консультация
                    </div>
                    <p>Не откладывайте!
                        <br />Сделайте это прямо сейчас!</p>
                    <div class="form-f">
                        <form class="order" enctype="multipart/form-data" method="post" action="http://narkologicheskaya-klinika-rostov.ru/netcat/add.php">
                            <input name="catalogue" type="hidden" value="1">
                            <input name="cc" type="hidden" value="16">
                            <input name="sub" type="hidden" value="25">
                            <input name="posting" type="hidden" value="1">
                            <input name="f_urlMessage" type="hidden" value="index.html">
                            <input type="hidden" name="f_trafficSource" value="">
                            <input type="hidden" name="f_istochnik" value="">
                            <input type="text" name="f_name" placeholder="Ваше имя">
                            <input type="text" name="f_phone" class="telephone" placeholder="Телефон*">
                            <input type="submit" value="Перезвоните мне" class="btn">
                        </form>
                    </div>
                </div>
                <div class="nav-f">
                    <div class="t-f">
                        полезные ссылки
                    </div>
                    <nav>
                        <ul>
                            <ul>
                                <li><a href='../fotogalereya/index.html'>Фотогалерея</a></li>
                                <li><a href='../otzyvy/index.html'>Отзывы</a></li>
                                <li class='active'><a href='index.html' class='active'>Контакты</a></li>
                            </ul>
                            <ul>
                                <li><a href='../../rodstvennikam/prinuditelnoe-lechenie-narkomanii/index.html'>Принудительное лечение наркомании</a></li>
                                <li><a href='../../rodstvennikam/vyzov-narkologa-domoy/index.html'>Вызов нарколога домой</a></li>
                            </ul>
                            <ul>
                                <li><a href='../../reabilitatsiya/narkologicheskiy-statsionar/index.html'>Наркологический стационар</a></li>
                                <li><a href='../../reabilitatsiya/pomosch-narkozavisimym/index.html'>Помощь наркозависимым</a></li>
                            </ul>
                        </ul>
                    </nav>
                </div>
                <div class="right-column">
                    <div class="t-f">
                        контакты
                    </div>
                    <div class="block-c">
                        <div class="t">
                            Адрес:
                        </div>
                        <insert name="show_block" module="site" id="2">
                    </div>
                    <div class="block-c">
                        <div class="t">
                            Телефоны:
                        </div>
                        <insert name="show_block" module="site" id="1">, <br />
                        <insert name="show_block" module="site" id="5">
                        <br />
                    </div>
                </div>
            </div>
            <noindex>
                <div style="color: #eee; font-size: 12px; text-align: center; padding: 10px 0 10px 0; line-height: 1.2;">
                    Персональные данные обрабатываются на сайте в целях его функционирования, если вы не согласны, пожалуйста покиньте сайт.
                    <br /> В противном случае это будет являться согласием на обработку персональных данных.
                    <a rel="nofollow" href="http://www.consultant.ru/document/cons_doc_LAW_61801/" target="_blank" style="color: #eee; font-size: 12px;">Подробнее.</a>
                </div>
            </noindex>
            <div class="copy-line">
                <div class="wrapper">
                    <div class="left">
                        Copyright © 2017 <a href="../../index.html">Реабилитационный Центр “Ключи”</a>. Все права защищены.
                    </div>
                    <div class="social">
                        <a href="#" class="g"></a>
                        <a href="#" class="in"></a>
                        <a href="#" class="fb"></a>
                        <a href="#" class="tv"></a>
                        <a href="#" class="p"></a>
                        <a href="#" class="ln"></a>
                        <a href="#" class="yab"></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div style="display: none;">
        <div id="inline1">
            <div class="wrap-call">
                <div class="form">
                    <div class="t">
                        Бесплатная консультация
                    </div>
                    <form class="order" enctype="multipart/form-data" method="post" action="http://narkologicheskaya-klinika-rostov.ru/netcat/add.php">
                        <input name="catalogue" type="hidden" value="1">
                        <input name="cc" type="hidden" value="16">
                        <input name="sub" type="hidden" value="25">
                        <input name="posting" type="hidden" value="1">
                        <input name="f_urlMessage" type="hidden" value="index.html">
                        <input type="hidden" name="f_trafficSource" value="">
                        <input type="hidden" name="f_istochnik" value="">
                        <input type="text" name="f_name" class="name" placeholder="Ваше имя*">
                        <input type="text" name="f_phone" class="telephone" placeholder="Телефон*">
                        <input type="submit" class="btn button-red" value="перезвоните мне">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <insert name="show_js">
    <!-- <script src="<insert name="path">maket/js/jquery-1.11.2.min.js"></script> -->
    <script src="<insert name="custom" path="js/jquery.fancybox.pack.js" absolute="true">"></script>
    <script src="<insert name="custom" path="js/mask.js" absolute="true">"></script>
    <script src="<insert name="custom" path="js/owl.carousel.js" absolute="true">"></script>
    <script src="<insert name="custom" path="js/popup-video.js" absolute="true">"></script>
    <script src="<insert name="custom" path="js/wow.js" absolute="true">"></script>
    <script src="<insert name="custom" path="js/common.js" absolute="true">"></script>


    <!-- BEGIN JIVOSITE CODE {literal} -->
    <!-- {/literal} END JIVOSITE CODE -->

    <script src="<insert name="custom" path="js/sourcebuster.min.js">" type="text/javascript" charset="utf-8"></script>
    <script>
    (function($, undefined) {
        sbjs.init();
        $("input[name=f_trafficSource]").val(sbjs.get.current.typ);
        $("input[name=f_istochnik]").val(sbjs.get.current.src);
    })(jQuery);
    </script>
</body>
</html>
