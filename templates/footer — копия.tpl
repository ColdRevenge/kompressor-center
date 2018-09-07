{*$footer_left*}{*$footer_right*}
<div class="clear">&nbsp;</div>
</div>

<div class="clear">&nbsp;</div>

<script type="text/javascript">
    {literal}
        $(window).scroll(function () {
            var x = $(document).height();
            var y = $(window).height();
            if ($(window).scrollTop() >= (x - y) - Number(65)) {
                $('#basket').animate({bottom: '70px'}, 1);
            } else {
                $('#basket').animate({bottom: '0'}, 1);
            }
        });
    {/literal}
</script>

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


<div id="footer">

    <div class="center">
        <div id="footer-left">
            <div id="footer-logo">
                {if $is_main == 1}
                    <img src="{$fronted_images_url}logo-footer.png" alt="" />
                {else}
                    <a href="{$url}"><img src="{$fronted_images_url}logo-footer.png" alt="" /></a>
                    {/if}
            </div>
        </div>

        <div class="phone-info">
            <span>8 (495)</span> 229-50-65
        </div>

        <div class="office">

            2017 © Энергия воздуха<br/>
            Все права защищены

        </div>

        {*if $menu_top.0|@count}
        <div id="footer-menu">
        <div>
        <ul>
        {foreach from=$menu_footer_5.0 item="menu" name="menu"}{if $menu->is_visible == 1}<li><span{if $open_category_id == $menu->id || $menu->id == 769 && $open_category_id == 0}  class="selected_menu"{/if}><a href="{if $menu->link}{$menu->link}{else}{$url}{page_obj->getFullAdressPageIdRoutes page_id=$menu->page_id}{/if}" >{$menu->name|stripslashes}</a></span></li>{/if}{/foreach}
        </ul>

        <div id="footer-soc">
        <div><b>Мы в социальных сетях</b></div>
        <a href="http://vk.com/lalipop_ru" title="Вконтакте" target="_blank"><img src="/images/fronted/v.png" alt="" /></a>
        <a href="#" onclick="alert('Нас пока нет в Facebook');
        return false;" title="Facebook"><img src="/images/fronted/f.png" alt="" /></a>
        <a href="#" onclick="alert('Нас пока нет в Однокласники');
        return false;" title="Однокласники"><img src="/images/fronted/od.png" alt="" /></a>

        </div>
        </div>
        {/if}

        </div>*}

    </div>
    <div class="clear"></div>

</div>
{if $is_open_product == 1}
    {*    <link rel="stylesheet" type="text/css" href="{$host_url}js/zoom/cloud-zoom.css" />
    <script type="text/javascript" src="{$host_url}js/zoom/cloud-zoom.1.0.2.min.js"></script>*}

    {*    <script type="text/javascript" src="{$host_url}js/jquery.elevateZoom-3.0.8.min"></script>*}

{/if}
<script type="text/javascript" src="{$host_url}js/srcollTo.js"></script>
<script type="text/javascript" src="/lib/rinit.min.js"></script>
{*<script type='text/javascript' src='{$lib_url}top.js'></script>*}
<!--Замена PrettyPopin-->
<script type="text/javascript" src="{$host_url}js/fancybox/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="{$host_url}js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
<link rel="stylesheet" href="{$host_url}js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$host_url}js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script type="text/javascript">
    $(".slider").jCarouselLite({
        btnNext: ".navSliderButton, .next",
        btnPrev: ".navSliderButton, .prev",
        visible: 1,
        start: 0,
        auto: 6000,
        btnGo: [{foreach from=$banners_list item="bann_item" name="ban"}{if $bann_item->file_id == 0}".{counter name="slide-count-page" }",{/if}{/foreach}],
                afterEnd: function (a, to, btnGo) {
                    if (btnGo.length <= to) {
                        to = 0;
                    }
                    $(".j-active").removeClass("j-active");
                    $(btnGo[to]).addClass("j-active");
                }
    });
    $(".main-brands_slider").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
        visible: 5,
    });
</script>

{*<script src="/js/bxslider/jquery.bxslider.min.js"></script>
<link href="/js/bxslider/jquery.bxslider.css" rel="stylesheet" />

<script>
$('#brands_list').bxSlider({
minSlides: 4,
maxSlides: 4,
slideMargin: 0,
slideWidth: 182,
controls: false,
displaySlideQty: 2
});
$(function () {
$(".slider-main").jCarouselLite({
btnNext: ".next-main",
btnPrev: ".prev-main",
visible: 4,
mouseWheel: true
});
});
</script>*}
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter36127575 = new Ya.Metrika({
                    id:36127575,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/37473905" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>