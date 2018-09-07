<?php /* Smarty version 3.1.24, created on 2018-07-05 15:50:40
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/templates/footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:11206393315b3e142079c1d7_03896593%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7c058265934177278bbb607292b8f161cc7b464' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/templates/footer.tpl',
      1 => 1530795037,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11206393315b3e142079c1d7_03896593',
  'variables' => 
  array (
    'menu_footer_1' => 0,
    'menu' => 0,
    'url' => 0,
    'menu_footer_2' => 0,
    'menu_footer_3' => 0,
    'menu_footer_4' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b3e1420868257_18318131',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b3e1420868257_18318131')) {
function content_5b3e1420868257_18318131 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '11206393315b3e142079c1d7_03896593';
?>


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

                            <?php
$_from = $_smarty_tpl->tpl_vars['menu_footer_1']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["menu"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["menu"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["menu"]->value) {
$_smarty_tpl->tpl_vars["menu"]->_loop = true;
$foreach_menu_Sav = $_smarty_tpl->tpl_vars["menu"];
?>
                                <?php if ($_smarty_tpl->tpl_vars['menu']->value->is_visible == 1) {?>
                                    <li class="f-menu__item">
                                        <a class="f-menu__link" href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
echo $_smarty_tpl->tpl_vars['menu']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageIdRoutes(array('page_id'=>$_smarty_tpl->tpl_vars['menu']->value->page_id),$_smarty_tpl);
}?>" ><?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value->name);?>
</a>
                                    </li>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars["menu"] = $foreach_menu_Sav;
}
?>
                        </ul>
                        <ul class="f-menu__column">
                            <?php
$_from = $_smarty_tpl->tpl_vars['menu_footer_2']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["menu"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["menu"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["menu"]->value) {
$_smarty_tpl->tpl_vars["menu"]->_loop = true;
$foreach_menu_Sav = $_smarty_tpl->tpl_vars["menu"];
?>
                                <?php if ($_smarty_tpl->tpl_vars['menu']->value->is_visible == 1) {?>
                                    <li class="f-menu__item">
                                        <a class="f-menu__link" href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
echo $_smarty_tpl->tpl_vars['menu']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageIdRoutes(array('page_id'=>$_smarty_tpl->tpl_vars['menu']->value->page_id),$_smarty_tpl);
}?>" ><?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value->name);?>
</a>
                                    </li>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars["menu"] = $foreach_menu_Sav;
}
?>
                        </ul>
                        <ul class="f-menu__column">
                            <?php
$_from = $_smarty_tpl->tpl_vars['menu_footer_3']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["menu"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["menu"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["menu"]->value) {
$_smarty_tpl->tpl_vars["menu"]->_loop = true;
$foreach_menu_Sav = $_smarty_tpl->tpl_vars["menu"];
?>
                                <?php if ($_smarty_tpl->tpl_vars['menu']->value->is_visible == 1) {?>
                                    <li class="f-menu__item">
                                        <a class="f-menu__link" href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
echo $_smarty_tpl->tpl_vars['menu']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageIdRoutes(array('page_id'=>$_smarty_tpl->tpl_vars['menu']->value->page_id),$_smarty_tpl);
}?>" ><?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value->name);?>
</a>
                                    </li>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars["menu"] = $foreach_menu_Sav;
}
?>
                        </ul>
                        <ul class="f-menu__column">
                            <?php
$_from = $_smarty_tpl->tpl_vars['menu_footer_4']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["menu"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["menu"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["menu"]->value) {
$_smarty_tpl->tpl_vars["menu"]->_loop = true;
$foreach_menu_Sav = $_smarty_tpl->tpl_vars["menu"];
?>
                                <?php if ($_smarty_tpl->tpl_vars['menu']->value->is_visible == 1) {?>
                                    <li class="f-menu__item">
                                        <a class="f-menu__link" href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
echo $_smarty_tpl->tpl_vars['menu']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageIdRoutes(array('page_id'=>$_smarty_tpl->tpl_vars['menu']->value->page_id),$_smarty_tpl);
}?>" ><?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value->name);?>
</a>
                                    </li>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars["menu"] = $foreach_menu_Sav;
}
?>
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
                    <div class="tbl-cell"><a data-city="krasnoyarsk" href="http://kc-krasnoyarsk.ru/?city=krasnoyarsk">Красноярск</a></div>
                    <div class="tbl-cell"><a data-city="novosibirsk" href="http://www.kc-novosibirsk.ru/?city=novosibirsk">Новосибирск</a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->

    <?php echo '<script'; ?>
 src="/assets/vendor/owl/owl.carousel.min.js"><?php echo '</script'; ?>
>
    <link href="/assets/vendor/owl/assets/owl.carousel.min.css" rel="stylesheet" />
    <?php echo '<script'; ?>
 src="/assets/vendor/scrollbar/jquery.scrollbar.min.js"><?php echo '</script'; ?>
>
    <link href="/assets/vendor/scrollbar/jquery.scrollbar.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/assets/vendor/fancybox/jquery.fancybox.min.css">
    <?php echo '<script'; ?>
 src="/assets/vendor/fancybox/jquery.fancybox.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/assets/js/scripts.js?v=1"><?php echo '</script'; ?>
>

    <!-- Yandex.Metrika counter --> <?php echo '<script'; ?>
 type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter36127575 = new Ya.Metrika({ id:36127575, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); <?php echo '</script'; ?>
> <noscript><div><img src="https://mc.yandex.ru/watch/36127575" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</body>
</html><?php }
}
?>