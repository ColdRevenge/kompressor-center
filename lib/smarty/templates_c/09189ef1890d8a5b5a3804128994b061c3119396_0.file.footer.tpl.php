<?php /* Smarty version 3.1.24, created on 2017-05-11 10:17:21
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/templates/footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:185546231259141001badb03_68549402%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09189ef1890d8a5b5a3804128994b061c3119396' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/templates/footer.tpl',
      1 => 1494487037,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185546231259141001badb03_68549402',
  'variables' => 
  array (
    'is_main' => 0,
    'fronted_images_url' => 0,
    'url' => 0,
    'is_open_product' => 0,
    'host_url' => 0,
    'banners_list' => 0,
    'bann_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_59141001c3ed42_04834483',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59141001c3ed42_04834483')) {
function content_59141001c3ed42_04834483 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/var/www/user-kc-pskov/data/www/kc-pskov.ru/lib/smarty/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '185546231259141001badb03_68549402';
?>

<div class="clear">&nbsp;</div>
</div>

<div class="clear">&nbsp;</div>

<?php echo '<script'; ?>
 type="text/javascript">
    
        $(window).scroll(function () {
            var x = $(document).height();
            var y = $(window).height();
            if ($(window).scrollTop() >= (x - y) - Number(65)) {
                $('#basket').animate({bottom: '70px'}, 1);
            } else {
                $('#basket').animate({bottom: '0'}, 1);
            }
        });
    
<?php echo '</script'; ?>
>

<div style="display: none">
    <div id="choose-city" <?php if ($_GET['city']) {?>data-city="<?php echo $_GET['city'];?>
"<?php }?>>
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
                <div class="tbl-cell"><a data-city="great_luke" href="http://kc-pskov.ru/?city=great_luke">Великие Луки</a></div>
                <div class="tbl-cell"><a data-city="novosibirsk" href="http://www.kc-novosibirsk.ru/?city=novosibirsk">Новосибирск</a></div>
            </div>
        </div>
    </div>
</div>


<div id="footer">

    <div class="center">
        <div id="footer-left">
            <div id="footer-logo">
                <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer.png" alt="" />
                <?php } else { ?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer.png" alt="" /></a>
                    <?php }?>
            </div>
        </div>

        <div class="phone-info">
            <span>8 (8112)</span> 57-22-32
        </div>

        <div class="office">

            2017 © Энергия воздуха<br/>
            Все права защищены

        </div>

        

    </div>
    <div class="clear"></div>

</div>
<?php if ($_smarty_tpl->tpl_vars['is_open_product']->value == 1) {?>
    

    

<?php }?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/srcollTo.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/lib/rinit.min.js"><?php echo '</script'; ?>
>

<!--Замена PrettyPopin-->
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/fancybox/jquery.fancybox.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/fancybox/jquery.mousewheel-3.0.6.pack.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<?php echo '<script'; ?>
 type="text/javascript">
    $(".slider").jCarouselLite({
        btnNext: ".navSliderButton, .next",
        btnPrev: ".navSliderButton, .prev",
        visible: 1,
        start: 0,
        auto: 6000,
        btnGo: [<?php
$_from = $_smarty_tpl->tpl_vars['banners_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["bann_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["bann_item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["bann_item"]->value) {
$_smarty_tpl->tpl_vars["bann_item"]->_loop = true;
$foreach_bann_item_Sav = $_smarty_tpl->tpl_vars["bann_item"];
if ($_smarty_tpl->tpl_vars['bann_item']->value->file_id == 0) {?>".<?php echo smarty_function_counter(array('name'=>"slide-count-page"),$_smarty_tpl);?>
",<?php }
$_smarty_tpl->tpl_vars["bann_item"] = $foreach_bann_item_Sav;
}
?>],
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
<?php echo '</script'; ?>
>


<!-- Yandex.Metrika counter -->
<?php echo '<script'; ?>
 type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter37473905 = new Ya.Metrika({
                    id:37473905,
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
<?php echo '</script'; ?>
>
<noscript><div><img src="https://mc.yandex.ru/watch/37473905" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html><?php }
}
?>