

    <footer>
        <div class="footer">
            <div class="footer__bg"></div>

            <div class="footer__subfooter subfooter">
                <div class="container subfooter__container">
                    <ul class="subfooter__infoblock">
                        <li class="subfooter__infoblock-item f-infoblock-item">
                            <div class="f-infoblock-item__icon _pt5">10<span class="f-infoblock-item__plus">+</span></div>
                            <p class="f-infoblock-item__text">Более 10 лет работы</p>
                        </li>
                        <li class="subfooter__infoblock-seporator">
                            <span class="sprite -kc-seporator"></span>
                        </li>
                        <li class="subfooter__infoblock-item f-infoblock-item">
                            <div class="f-infoblock-item__icon _pt2"><span class="sprite -guaranty"></span></div>
                            <p class="f-infoblock-item__text">Гарантия качества</p>
                        </li>
                        <li class="subfooter__infoblock-seporator">
                            <span class="sprite -kc-seporator"></span>
                        </li>
                        <li class="subfooter__infoblock-item f-infoblock-item">
                            <div class="f-infoblock-item__icon"><span class="sprite -exp"></span></div>
                            <p class="f-infoblock-item__text">Большой опыт сервисных работ</p>
                        </li>
                        <li class="subfooter__infoblock-seporator">
                            <span class="sprite -kc-seporator"></span>
                        </li>
                        <li class="subfooter__infoblock-item f-infoblock-item">
                            <div class="f-infoblock-item__icon _lh60"><span class="sprite -storage"></span></div>
                            <p class="f-infoblock-item__text">Наличие склада оборудования</p>
                        </li>
                        <li class="subfooter__infoblock-seporator">
                            <span class="sprite -kc-seporator"></span>
                        </li>
                        <li class="subfooter__infoblock-item f-infoblock-item">
                            <div class="f-infoblock-item__icon"><span class="sprite -russia"></span></div>
                            <p class="f-infoblock-item__text">Сеть по всей России</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer__content">
                <div class="container footer__container">
                    <div class="footer__main">
                        <div class="footer__main-cell"><a href="tel: 84952295065" class="footer__main-phone">8 (495) 229-50-65</a></div>
                        <div class="footer__main-cell _logo"><a href="#" class="footer__main-logo"><img src="/assets/img/footer-logo.png" alt="Компрессор центр - Энергия воздуха" /></a></div>
                        <div class="footer__main-cell js-feedback">
                            <a href="#" class="footer__main-feedback js-feedback-link">Напишите нам</a>
                            <form method="post" action="" class="feedback">
                                <div class="form-group">
                                    <div class="feedback__link-cont">
                                        <input type="submit" value="Напишите нам" href="#" class="feedback__link btn -link js-submit"></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control -no-border" name="email" required placeholder="Ваше сообщение"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control -no-border" name="email" required placeholder="Ваш email" />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control -no-border" name="fio" required placeholder="Ваше имя" />
                                </div>
                            </form>
                        </div><!-- /.footer__main-cell -->
                    </div><!-- /.footer__main -->
                    <div class="footer__menu f-menu">
                        <ul class="f-menu__column">

                            {foreach from=$menu_footer_1.0 item="menu" name="menu"}
                                {if $menu->is_visible == 1}
                                    <li class="f-menu__item">
                                        <a class="f-menu__link" href="{if $menu->link}{$menu->link}{else}{$url}{page_obj->getFullAdressPageIdRoutes page_id=$menu->page_id}{/if}" >{$menu->name|stripslashes}</a>
                                    </li>
                                {/if}
                            {/foreach}
                        </ul>
                        <ul class="f-menu__column">
                            {foreach from=$menu_footer_2.0 item="menu" name="menu"}
                                {if $menu->is_visible == 1}
                                    <li class="f-menu__item">
                                        <a class="f-menu__link" href="{if $menu->link}{$menu->link}{else}{$url}{page_obj->getFullAdressPageIdRoutes page_id=$menu->page_id}{/if}" >{$menu->name|stripslashes}</a>
                                    </li>
                                {/if}
                            {/foreach}
                        </ul>
                        <ul class="f-menu__column">
                            {foreach from=$menu_footer_3.0 item="menu" name="menu"}
                                {if $menu->is_visible == 1}
                                    <li class="f-menu__item">
                                        <a class="f-menu__link" href="{if $menu->link}{$menu->link}{else}{$url}{page_obj->getFullAdressPageIdRoutes page_id=$menu->page_id}{/if}" >{$menu->name|stripslashes}</a>
                                    </li>
                                {/if}
                            {/foreach}
                        </ul>
                        <ul class="f-menu__column">
                            {foreach from=$menu_footer_4.0 item="menu" name="menu"}
                                {if $menu->is_visible == 1}
                                    <li class="f-menu__item">
                                        <a class="f-menu__link" href="{if $menu->link}{$menu->link}{else}{$url}{page_obj->getFullAdressPageIdRoutes page_id=$menu->page_id}{/if}" >{$menu->name|stripslashes}</a>
                                    </li>
                                {/if}
                            {/foreach}
                        </ul>
                    </div><!-- /.f-menu -->
                </div><!-- /.container -->
            </div><!-- /.footer__content -->
        </div><!-- /.footer -->
        <div class="superfooter">
            <div class="container">
                <p class="superfooter__copyrights">Энергия воздуха 1905 - 2018 © Защищено авторским правом</p>
            </div>
        </div>
    </footer>


    
    <div style="display: none">
        <div id="choose-city" {if $smarty.get.city}data-city="{$smarty.get.city}"{/if}>
            <h3>Выберите город</h3>
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell"><a data-city="moscow" href="http://kompressor-center.com/?city=moscow">Москва</a></div>
                    <div class="tbl-cell"><a data-city="kazan" href="http://www.kc-kazan.ru/?city=kazan">Казань</a></div>
                </div>
                <div class="tbl-row">
                    <div class="tbl-cell"><a data-city="spb" href="http://kc-pskov.ru/?city=spb">Санкт-Петербург</a></div>
                    <div class="tbl-cell"><a data-city="ufa" href="http://kc-ufa.ru/?city=ufa">Уфа</a></div>
                </div>
                <div class="tbl-row">
                    <div class="tbl-cell"><a data-city="pskov" href="http://kc-pskov.ru/?city=pskov">Псков</a></div>
                    <div class="tbl-cell"><a data-city="chelyabinsk" href="http://www.kc-chelyabinsk.ru/?city=chelyabinsk">Челябинск</a></div>
                </div>
                <div class="tbl-row">
                    <div class="tbl-cell"><a data-city="krasnoyarsk" href="http://kc-krasnoyarsk.ru/?city=krasnoyarsk">Красноярск</a></div>
                    <div class="tbl-cell"><a data-city="novosibirsk" href="http://www.kc-novosibirsk.ru/?city=novosibirsk">Новосибирск</a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->

    <script src="/assets/vendor/owl/owl.carousel.min.js"></script>
    <link href="/assets/vendor/owl/assets/owl.carousel.min.css" rel="stylesheet" />
    <script src="/assets/vendor/scrollbar/jquery.scrollbar.min.js"></script>
    <link href="/assets/vendor/scrollbar/jquery.scrollbar.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/assets/vendor/fancybox/jquery.fancybox.min.css">
    <script src="/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="/assets/js/scripts.js?v=1"></script>

    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter36127575 = new Ya.Metrika({ id:36127575, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/36127575" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</body>
</html>