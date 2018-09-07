<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:06
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/templates/footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:184901206055f573cea15752_53563046%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '393ac1b30f2ee7088a01e96dc4ab308df88b10a9' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/templates/footer.tpl',
      1 => 1440172371,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184901206055f573cea15752_53563046',
  'variables' => 
  array (
    'shop' => 0,
    'is_main' => 0,
    'fronted_images_url' => 0,
    'url' => 0,
    'menu_top' => 0,
    'menu_footer_5' => 0,
    'menu' => 0,
    'open_category_id' => 0,
    'is_open_product' => 0,
    'host_url' => 0,
    'lib_url' => 0,
    'banners_list' => 0,
    'bann_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f573ceae1d09_14161624',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573ceae1d09_14161624')) {
function content_55f573ceae1d09_14161624 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '184901206055f573cea15752_53563046';
?>

<div class="clear">&nbsp;</div>
</div>

<div class="clear">&nbsp;</div>
<div id="footer">
    <div class="center">
        <div id="footer-left">
            <div id="footer-logo">
                <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
                    <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer-lady.png" alt="Интернет магазин одежды больших размеров" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer-lady.png" alt="Интернет магазин одежды больших размеров" /></a><?php }?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
                        <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer-woman.gif" alt="Интернет магазин женской одежды" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer-woman.gif" alt="Интернет магазин женской одежды" /></a><?php }?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?>
                        <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer-platok.png" alt="Интернет магазин платков и шарфов" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer-platok.png" alt="Интернет магазин платков и шарфов" /></a><?php }?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'sumka') {?>
                        <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer-sumka.png" alt="Интернет магазин кожгалантереи" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer-sumka.png" alt="Интернет магазин кожгалантереи" /></a><?php }?>
                    <?php } else { ?>
                        <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer.png" alt="Интернет магазин бижутерии" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo-footer.png" alt="Интернет магазин бижутерии" /></a><?php }?>
                    <?php }?>
                <div><?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>Женская одежда больших размеров<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>Интернет магазин женской одежды<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'sumka') {?>Интернет магазин кожгалантереи<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?>Интернет магазин платков и шарфов<?php } else { ?>Интернет магазин бижутерии<?php }?></div>
            </div>
            
        </div>


        <div class="office">

            <div itemscope itemtype="http://schema.org/Organization">
                <span itemprop="name" class="hide"><?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>Lady.<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'sumka') {?>Woman.<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'sumka') {?>Sumka.<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?>Platok.<?php }?>Lalipop</span>
                <?php if ($_smarty_tpl->tpl_vars['shop']->value != 'sumka') {?><b>Офис в г. Москве:</b>
                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

                        <span itemprop="postalCode"> 111020</span>
                        <span itemprop="addressLocality"> г. Москва</span>, 
                        <span itemprop="streetAddress">Боровая д.7 стр.7</span>
                    </div>
                <?php }?>
                <div class="telephone"><span itemprop="telephone">8 <span>(495)</span> 642-27-34</span></div>
                
            </div>

        </div>

        <?php if (count($_smarty_tpl->tpl_vars['menu_top']->value[0])) {?>
            <div id="footer-menu">
                <div>
                    <ul>
                <?php
$_from = $_smarty_tpl->tpl_vars['menu_footer_5']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["menu"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["menu"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["menu"]->value) {
$_smarty_tpl->tpl_vars["menu"]->_loop = true;
$foreach_menu_Sav = $_smarty_tpl->tpl_vars["menu"];
if ($_smarty_tpl->tpl_vars['menu']->value->is_visible == 1) {?><li><span<?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == $_smarty_tpl->tpl_vars['menu']->value->id || $_smarty_tpl->tpl_vars['menu']->value->id == 769 && $_smarty_tpl->tpl_vars['open_category_id']->value == 0) {?>  class="selected_menu"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
echo $_smarty_tpl->tpl_vars['menu']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageIdRoutes(array('page_id'=>$_smarty_tpl->tpl_vars['menu']->value->page_id),$_smarty_tpl);
}?>" ><?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value->name);?>
</a></span></li><?php }
$_smarty_tpl->tpl_vars["menu"] = $foreach_menu_Sav;
}
?>
            </ul>

            <div id="footer-soc">
                <div><b>Мы в социальных сетях</b></div>
                <a href="http://vk.com/lalipop_ru" title="Вконтакте" target="_blank"><img src="/images/fronted/v.png" alt="" /></a>
                    

            </div>
        </div>
    <?php }?>

</div>
</div>
</div>
<div id="footer_panel">
    <div id="footer_logo">
        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
            <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
                <img src="/images/fronted/logo-small-lady.png" alt="Интернет магазин одежды больших размеров" />
            <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?>
                <img src="/images/fronted/logo-small-platok.png" alt="Интернет магазин платков и шарфов" />
            <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'sumka') {?>
                <img src="/images/fronted/logo-small-sumka.png" alt="Интернет магазин кожгалантереи" />
            <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
                <img src="/images/fronted/logo-small-woman.png" alt="Интернет магазин женской одежды" />
            <?php } else { ?>
                <img src="/images/fronted/logo-small.png" alt="Интернет магазин бижутерии" />
            <?php }?>
        </a>
    </div>
    <div class="center">
        <a id="update-shop" href="http://<?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>lady.<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?>woman.<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'sumka') {?>sumka.<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?>platok.<?php }?>lalipop.ru/call_back/send/?is_modal=1&is_update=1" rel="call_back_update" title="Помогите улучшить магазин"><img src="/images/fronted/update-shop.png" alt="Помогите улучшить магазин!" /></a>
        <div class="white-phone">
            <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
                <img src="/images/fronted/phone3-lady.png" alt="" />
            <?php } else { ?>
                <img src="/images/fronted/phone3.png" alt="" />
            <?php }?>
        </div>
        
    </div>
</div>
<?php if ($_smarty_tpl->tpl_vars['is_open_product']->value == 1) {?>
    

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/jquery.elevateZoom-3.0.8.min"><?php echo '</script'; ?>
>

<?php }?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/srcollTo.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/lib/rinit.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['lib_url']->value;?>
top.js'><?php echo '</script'; ?>
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
<?php echo '</script'; ?>
>



<?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
    
        <!-- Yandex.Metrika counter -->
        <?php echo '<script'; ?>
 type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function () {
                    try {
                        w.yaCounter30158869 = new Ya.Metrika({id: 30158869,
                            webvisor: true,
                            clickmap: true,
                            trackLinks: true,
                            accurateTrackBounce: true, params: window.yaParams || {}});
                    } catch (e) {
                    }
                });

                var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () {
                            n.parentNode.insertBefore(s, n);
                        };
                s.type = "text/javascript";
                s.async = true;
                s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(document, window, "yandex_metrika_callbacks");
        <?php echo '</script'; ?>
>
        <noscript><div><img src="//mc.yandex.ru/watch/30158869" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    
<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'sumka') {?>
    
        <!-- Yandex.Metrika counter -->
        <?php echo '<script'; ?>
 type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function () {
                    try {
                        w.yaCounter31231585 = new Ya.Metrika({
                            id: 31231585,
                            clickmap: true,
                            trackLinks: true,
                            accurateTrackBounce: true,
                            webvisor: true
                        });
                    } catch (e) {
                    }
                });

                var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () {
                            n.parentNode.insertBefore(s, n);
                        };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(document, window, "yandex_metrika_callbacks");
        <?php echo '</script'; ?>
>
        <noscript><div><img src="https://mc.yandex.ru/watch/31231585" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    
<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?>
    
        <!-- Yandex.Metrika counter -->
        <?php echo '<script'; ?>
 type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function () {
                    try {
                        w.yaCounter30960661 = new Ya.Metrika({id: 30960661,
                            webvisor: true,
                            clickmap: true,
                            trackLinks: true,
                            accurateTrackBounce: true, params: window.yaParams || {}});
                    } catch (e) {
                    }
                });

                var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () {
                            n.parentNode.insertBefore(s, n);
                        };
                s.type = "text/javascript";
                s.async = true;
                s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(document, window, "yandex_metrika_callbacks");
        <?php echo '</script'; ?>
>
        <noscript><div><img src="//mc.yandex.ru/watch/30960661" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
    

<?php } else { ?>

    
        <?php echo '<script'; ?>
 type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function () {
                    try {
                        w.yaCounter27973704 = new Ya.Metrika({id: 27973704,
                            webvisor: true,
                            clickmap: true,
                            trackLinks: true,
                            accurateTrackBounce: true, params: window.yaParams || {}});
                    } catch (e) {
                    }
                });

                var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () {
                            n.parentNode.insertBefore(s, n);
                        };
                s.type = "text/javascript";
                s.async = true;
                s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(document, window, "yandex_metrika_callbacks");
        <?php echo '</script'; ?>
>
        <noscript><div><img src="//mc.yandex.ru/watch/27973704" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

    
<?php }?>
<!-- /Yandex.Metrika counter -->
<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function () {
        $.getScript('https://consultsystems.ru/script/25083/');
    });
<?php echo '</script'; ?>
>


</body>
</html><?php }
}
?>