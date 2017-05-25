<?php
/**
 * Шаблон стартовой страницы сайта
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
    <!-- <link href="<insert name="path">maket/css/style.css" rel="stylesheet"> -->
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
                        <a href="index.html">
                            <img src="<insert name="custom" path="images/logo.png">" alt="">
                        </a>
                    </div>
                    <div class="wotk-time">
                        <div class="t">Работаем ежедневно 24 часа в сутки</div>
                        <div class="b">бесплатная анонимная консультация</div>
                    </div>
                    <div class="right-column">
                        <div class="tel">+7(343)382-46-43</div>
                        <div class="tel">+7(922)155-11-00</div>
                        <a href="#inline1" class="order">Заказать обратный звонок</a>
                        <br/>
                        <br/>
                        <a href="o-nas/kontakty/index.html">Карта проезда</a>
                    </div>
                </div>
            </div>
            <div class="bottom-head">
                <div class="wrapper">
                    <nav class="main-menu">
                        <ul>
                            <ul>
                                <li><a href='o-nas/index.html'>О нас</a></li>
                                <li><a href='lechenie-narkomanii/index.html'>Лечение наркомании</a></li>
                                <li><a href='lechenie-alkogolizma/index.html'>Лечение алкоголизма</a></li>
                                <li><a href='reabilitatsiya/index.html'>Реабилитация</a></li>
                                <li><a href='rodstvennikam/index.html'>Родственникам</a></li>
                                <li><a href='blog/index.html'>Блог</a></li>
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
        <div class="banner">
            <div class="wrapper">
                <div class="h1">
                    Хотите избавиться
                    <br/> от зависимости?
                </div>
                <div class="h2">
                    Мы предлагаем Вам лечение наркомании и алкоголизма в нашем реабилитационном центре КЛЮЧИ в городе ГОРОД </div>
                <div class="block-banner">
                    <div class="item">
                        <div class="icon">
                            <img src="<insert name="path">maket/images/icon-banner/1.png" alt="">
                        </div>
                        <span>
                                100% гарантия от срыва
                            </span>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="<insert name="path">maket/images/icon-banner/2.png" alt="">
                        </div>
                        <span>
                                14 центров по россии
                            </span>
                    </div>
                    <div class="item">
                        <div class="icon">
                            <img src="<insert name="path">maket/images/icon-banner/3.png" alt="">
                        </div>
                        <span>
                                более 2000 пациентов
                            </span>
                    </div>
                </div>
            </div>
            <div class="form">
                <div class="wrapper">
                    <div class="t">
                        Бесплатная консультация
                    </div>
                    <p>
                        Не откладывайте! Сделайте это прямо сейчас. Мы знаем, как Вам помочь (100% Анонимно и конфиденциально)
                    </p>
                    <form class="order" enctype="multipart/form-data" method="post" action="http://narkologicheskaya-klinika-rostov.ru/netcat/add.php">
                        <input name="catalogue" type="hidden" value="1">
                        <input name="cc" type="hidden" value="16">
                        <input name="sub" type="hidden" value="25">
                        <input name="posting" type="hidden" value="1">
                        <input name="f_urlMessage" type="hidden" value="http://narkologicheskaya-klinika-rostov.ru/">
                        <input type="hidden" name="f_trafficSource" value="">
                        <input type="hidden" name="f_istochnik" value="">
                        <input type="text" name="f_name" class="name" placeholder="Ваше имя*">
                        <input type="text" name="f_phone" class="telephone" placeholder="Телефон*">
                        <input type="submit" value="отправить заявку" class="btn">
                    </form>
                </div>
            </div>
        </div>
        <div class="block-problem">
            <div class="wrapper">
                <div class="t-main">
                    Проблемы наркомании и алкоголизма
                </div>
                <div class="items">
                    <div class="item wow fadeIn" data-wow-offset="100">
                        <div>
                            <img src="<insert name="custom" path="images/problem-icon/1.png">" alt="">
                        </div>
                        <div>
                            раздражительность, гнев
                        </div>
                    </div>
                    <div class="item wow fadeIn" data-wow-offset="100" data-wow-delay="0.2s">
                        <div>
                            <img src="<insert name="custom" path="images/problem-icon/2.png">" alt="">
                        </div>
                        <div>
                            нарушение деятельности мозговых клеток
                        </div>
                    </div>
                    <div class="item wow fadeIn" data-wow-offset="100" data-wow-delay="0.4s">
                        <div>
                            <img src="<insert name="custom" path="images/problem-icon/3.png">" alt="">
                        </div>
                        <div>
                            психозы с бредом, галлюцинации
                        </div>
                    </div>
                    <div class="item wow fadeIn" data-wow-offset="100" data-wow-delay="0.6s">
                        <div>
                            <img src="<insert name="custom" path="images/problem-icon/4.png">" alt="">
                        </div>
                        <div>
                            прогрессирующая деградация личности
                        </div>
                    </div>
                    <div class="item wow fadeIn" data-wow-offset="100" data-wow-delay="0.8s">
                        <div>
                            <img src="<insert name="custom" path="images/problem-icon/5.png">" alt="">
                        </div>
                        <div>
                            навязчивые суицидальные мысли
                        </div>
                    </div>
                    <div class="item wow fadeIn" data-wow-offset="100" data-wow-delay="1s">
                        <div>
                            <img src="<insert name="custom" path="images/problem-icon/6.png">" alt="">
                        </div>
                        <div>
                            проблемы с законом, долги
                        </div>
                    </div>
                    <div class="item wow fadeIn" data-wow-offset="100" data-wow-delay="1.2s">
                        <div>
                            <img src="<insert name="custom" path="images/problem-icon/7.png">" alt="">
                        </div>
                        <div>
                            потеря друзей, семьи и работы
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-number">
            <div class="wrapper">
                <div class="items">
                    <div class="item wow fadeInDown" data-wow-offset="100">
                        <div class="number">1589</div>
                        <p>здоровых пациентов</p>
                    </div>
                    <div class="item wow fadeInDown" data-wow-offset="100" data-wow-delay="0.2s">
                        <div class="number">12</div>
                        <p>лучших докторов города</p>
                    </div>
                    <div class="item wow fadeInDown" data-wow-offset="100" data-wow-delay="0.4s">
                        <div class="number">450158</div>
                        <p>процедуры детоксикации</p>
                    </div>
                    <div class="item wow fadeInDown" data-wow-offset="100" data-wow-delay="0.6s">
                        <div class="number">14</div>
                        <p>лет опыта работы</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-wgy-we">
            <div class="wrapper">
                <div class="t-main">
                    Почему именно мы?
                </div>
                <div class="items">
                    <div class="item item1">
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
                    <div class="item item2">
                        <div class="desk">
                            <img src="<insert name="path">maket/images/why-we/v2.jpg" alt="">
                            <div class="txt">
                                <div class="t">СПЕЦИАЛИСТЫ</div>
                                <p>Опытные профессионалы </p>
                            </div>
                        </div>
                        <div class="photo">
                            <img src="<insert name="path">maket/images/why-we/img2.jpg" alt="">
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
                    <div class="item item8">
                        <div class="photo">
                            <img src="<insert name="path">maket/images/why-we/img6.jpg" alt="">
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
                    <div class="item item7">
                        <div class="photo">
                            <img src="<insert name="path">maket/images/why-we/img5.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="center">
                    <a href="#inline1" class="order btn">записаться на консультацию</a>
                </div>
            </div>
        </div>
        <div class="specialist">
            <div class="wrapper">
                <div class="t-main">
                    наши Специалисты
                </div>
                <div class="specialist-slider">
                    <div class="item">
                        <div class="photo">
                            <img src="<insert name="custom" path="images/specialist/1.png">" alt="">
                        </div>
                        <div class="name">
                            Великий Никита Владимирович
                        </div>
                        <p>
                            Психолог, руководитель программы реабилитации
                        </p>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <img src="<insert name="custom" path="images/specialist/2.png">" alt="">
                        </div>
                        <div class="name">
                            Нестеренко Андрей Викторович
                        </div>
                        <p>
                            Психолог, специалист по химической зависимости, консультант реабилитационной программы
                        </p>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <img src="<insert name="custom" path="images/specialist/3.png">" alt="">
                        </div>
                        <div class="name">
                            Валитов Сергей Маратович
                        </div>
                        <p>
                           Директор реабилитационного центра, специалист по консультированию созависимых
                        </p>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <img src="<insert name="custom" path="images/specialist/4.jpg">" alt="">
                        </div>
                        <div class="name">
                            Смирнов Сергей Федорович
                        </div>
                        <p>
                            консультант по алкогольной зависимости
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="steps">
            <div class="wrapper">
                <div class="t-main">
                    5 шагов к здоровой жизни
                </div>
                <p>
                    Любая зависимость требует обязательного вмешательства квалифицированных специалистов. Ведь самостоятельно справиться со своим недугом сложно. Реабилитационный центр Гиппократ предоставляет курс медикаментозного лечения и последующей реабилитации.
                </p>
                <div class="items">
                    <div class="item wow fadeInLeft" data-wow-offset="100">
                        <div class="icon">
                            <span>
                                    <img src="<insert name="custom" path="images/step-icon/1.png">" alt="">
                                </span>
                        </div>
                        <div class="t">
                            консультация
                        </div>
                        <p>
                            Вместе с Вами выбираем наиболее оптимальный вариант лечения
                        </p>
                    </div>
                    <div class="item wow fadeInLeft" data-wow-offset="100" data-wow-delay="0.2s">
                        <div class="icon">
                            <span>
                                    <img src="<insert name="custom" path="images/step-icon/2.png">" alt="">
                                </span>
                        </div>
                        <div class="t">
                            детоксикация
                        </div>
                        <p>
                            Проводим полную очистку организма - детоксикацию
                        </p>
                    </div>
                    <div class="item wow fadeInLeft" data-wow-offset="100" data-wow-delay="0.4s">
                        <div class="icon">
                            <span>
                                    <img src="<insert name="custom" path="images/step-icon/3.png">" alt="">
                                </span>
                        </div>
                        <div class="t">
                            реабилитация
                        </div>
                        <p>
                            Наступает процесс излечения. Реабилитация 100% анонимно
                        </p>
                    </div>
                    <div class="item wow fadeInLeft" data-wow-offset="100" data-wow-delay="0.6s">
                        <div class="icon">
                            <span>
                                    <img src="<insert name="custom" path="images/step-icon/4.png">" alt="">
                                </span>
                        </div>
                        <div class="t">
                            Ресоциализация
                        </div>
                        <p>
                            Поможем восстановить отношения с близкими Вам людьми
                        </p>
                    </div>
                    <div class="item wow fadeInLeft" data-wow-offset="100" data-wow-delay="0.8s">
                        <div class="icon">
                            <span>
                                    <img src="<insert name="custom" path="images/step-icon/5.png">" alt="">
                                </span>
                        </div>
                        <div class="t">
                            выздоровление
                        </div>
                        <p>
                            Вы успешно прошли лечение и готовы к полоценной здоровой и чистой жизни
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="review">
            <div class="wrapper">
                <div class="t-main">
                    отзывы родителей и пациентов
                </div>
                <!-- reviews -->
                <div class="tpl-block-list tpl-component-152" id="nc-block-c8793619b034e3b94bfb9b4644e790cc">
                    <div class="review-slider">
                        <div class="item">
                            <a class="popup-youtube" href="http://www.youtube.com/watch?v=1B8OUSHUlNE">
                                <img src="netcat_files/42/38/review.jpg_%3b%20filename_%3dutf-8%27%27review.jpg" alt="Он употреблял наркотики 20 лет! Как он смог бросить?">
                            </a>
                            <div class="data-block">
                                <div class="data">
                                    <span>15</span> 12.2016 </div>
                                <div class="t">
                                    Он употреблял наркотики 20 лет! Как он смог бросить? </div>
                            </div>
                            <p>
                                Армен - наркоман с двадцатилетним стажем. Выздоравливает уже 5 месяцев. В клинику &quot;Решение&quot; Армен попал в критическом ...
                            </p>
                            <a href="o-nas/otzyvy/otzyvy_3.html" class="read-more">
    читать далее
  </a>
                        </div>
                        <div class="item">
                            <a class="popup-youtube" href="http://www.youtube.com/watch?v=1B8OUSHUlNE">
                                <img src="netcat_files/42/38/review.jpg_%3b%20filename_%3dutf-8%27%27review-2.jpg" alt="Он употреблял наркотики 20 лет! Как он смог бросить?">
                            </a>
                            <div class="data-block">
                                <div class="data">
                                    <span>15</span> 12.2016 </div>
                                <div class="t">
                                    Он употреблял наркотики 20 лет! Как он смог бросить? </div>
                            </div>
                            <p>
                                Армен - наркоман с двадцатилетним стажем. Выздоравливает уже 5 месяцев. В клинику &quot;Решение&quot; Армен попал в критическом ...
                            </p>
                            <a href="o-nas/otzyvy/otzyvy_2.html" class="read-more">
    читать далее
  </a>
                        </div>
                    </div>
                </div>
                <div class="center">
                    <a href="o-nas/otzyvy/index.html" class="btn">
                            Смотреть все отзывы
                        </a>
                </div>
            </div>
        </div>
        <div class="txt-block">
            <div class="wrapper">
                <h1 class='t-main'>Реабилитационный центр “Ключи”</h1>
                <div class="t2">Лечение наркомании &ndash; это восстановление физического и психического здоровья, трудоспособности и социальных связей, нарушенных в результате употребления наркотических веществ. Оно включает в себя медицинские, социально-правовые, психологические, экономические и духовные аспекты.</div>
                <h2>Очень важно соблюдать следующие условия:</h2>
                <ol>
                    <li><span>1</span> Центр должен находиться вдали от социума. Окружение зависимого составляют такие же люди, как и он сам и поставщики наркотиков. Чтобы не мешать процессу выздоровления, эти факторы нужно устранить.</li>
                    <li><span>1</span> Достаточный срок пребывания в клинике. Он зависит от характера зависимости, тяжести сопутствующей патологии, возраста, &laquo;стажа&raquo; и др. Сроки пребывания у нас в центре колеблются от 3 месяцев до года.</li>
                    <li><span>1</span> Грамотная медицинская помощь. Она предполагает ежедневное наблюдение, консультации, назначения врачей-специалистов. Используются разнообразные методы психотерапии (гештальт, поведенческая, роджеровская и др.), участие в оздоровительных мероприятиях (гимнастика, физиопроцедуры, массаж), группах поддержки, психообразовательных программах, обучение труду.</li>
                </ol>
                <h3>Как организован процесс лечения?</h3>
                <p>Вначале пациент проходит полную детоксикацию, после которой организм очищается от продуктов распада наркотических веществ. Таким образом, в нашей клинике ему дают возможность перейти на следующий этап &mdash; восстановления.</p>
                <p>Реабилитация проходит в загородном доме, оснащенном всем необходимым. Там же проживают пациенты. В центрах есть всё, что может понадобиться для оказания плановой и экстренной медицинской помощи, а также социальные блоки и подсобные помещения.</p>
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
                            <input name="f_urlMessage" type="hidden" value="http://narkologicheskaya-klinika-rostov.ru/">
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
                                <li><a href='o-nas/fotogalereya/index.html'>Фотогалерея</a></li>
                                <li><a href='o-nas/otzyvy/index.html'>Отзывы</a></li>
                                <li><a href='o-nas/kontakty/index.html'>Контакты</a></li>
                            </ul>
                            <ul>
                                <li><a href='rodstvennikam/prinuditelnoe-lechenie-narkomanii/index.html'>Принудительное лечение наркомании</a></li>
                                <li><a href='rodstvennikam/vyzov-narkologa-domoy/index.html'>Вызов нарколога домой</a></li>
                            </ul>
                            <ul>
                                <li><a href='reabilitatsiya/narkologicheskiy-statsionar/index.html'>Наркологический стационар</a></li>
                                <li><a href='reabilitatsiya/pomosch-narkozavisimym/index.html'>Помощь наркозависимым</a></li>
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
                        000000, Екатеринбург,
                        <br />Пр. Энгельса, 36 <br />
                        2 подъезд, кабинет 419/8.3
                    </div>
                    <div class="block-c">
                        <div class="t">
                            Телефоны:
                        </div>
                        +7(343)382-46-43, <br />
                        +7(922)155-11-00
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
                        Copyright © 2017 <a href="index.html">Реабилитационный Центр “Ключи”</a>. Все права защищены.
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

    <script src="<insert name="custom" path="js/sourcebuster.min.js" type="text/javascript" charset="utf-8"></script>
    <script>
    (function($, undefined) {
        sbjs.init();
        $("input[name=f_trafficSource]").val(sbjs.get.current.typ);
        $("input[name=f_istochnik]").val(sbjs.get.current.src);
    })(jQuery);
    </script>
</body>
</html>
