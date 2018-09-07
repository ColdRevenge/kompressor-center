<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-03 17:05:31
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/templates/mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:210939377955d469856a99b9-25648140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4050b10dfab876bcb89df4798fefc0dc69006c6c' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/templates/mobile.tpl',
      1 => 1441289043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210939377955d469856a99b9-25648140',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d469858192e3_01895418',
  'variables' => 
  array (
    'head_title' => 0,
    'set' => 0,
    'host_url' => 0,
    'head_desc' => 0,
    'head_key' => 0,
    'host' => 0,
    'shop' => 0,
    'url' => 0,
    'https_url' => 0,
    'basket' => 0,
    'menu_left' => 0,
    'menu' => 0,
    'open_category_id' => 0,
    'menu_top' => 0,
    'catalog_dir' => 0,
    'is_main' => 0,
    'get_product_param_1' => 0,
    'content' => 0,
    'shop_type' => 0,
    'session_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d469858192e3_01895418')) {function content_55d469858192e3_01895418($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN"&#32;
    "https://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
    <head>
        <title><?php echo stripslashes((($tmp = @stripslashes($_smarty_tpl->tpl_vars['head_title']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['set']->value->title : $tmp));?>
</title>
        <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
favicon.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content='<?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', stripslashes((($tmp = @smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['head_desc']->value)),149))===null||$tmp==='' ? '' : $tmp))),149);?>
' />
        <meta name="keywords" content='<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes((($tmp = @stripslashes($_smarty_tpl->tpl_vars['head_key']->value))===null||$tmp==='' ? '' : $tmp)));?>
' />
        <link rel="apple-touch-icon" href="/images/mobile/apple-touch.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="HandheldFriendly" content="True">
        <link href='<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" media="screen,handheld" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
css/mobile.css">
        <?php echo '<script'; ?>
 src="/js/jquery.min.js"><?php echo '</script'; ?>
>
        
    </head>
    <body<?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?> id="lady"<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='platok') {?> id="platok"<?php }?>>
        <div id="header">
            <a href="javascript:void(0)" id="menu-icon">Меню</a>
            <a href="javascript:void(0)" id="find-icon">Поиск</a>
            <div id="logo"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="/images/mobile/logo.png" alt="<?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>Интернет магазин одежды больших размеров<?php } else { ?>Интернет магазин бижутерии<?php }?>" /></a></div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
basket/" id="basket"><?php echo $_smarty_tpl->tpl_vars['basket']->value;?>
</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
auth/auth/" id="stat-icon">Личный кабинет</a>
        </div>

        <div id="left-menu-shadow">&nbsp;</div>
        <div id="left-menu">
            <ul>
            <?php  $_smarty_tpl->tpl_vars["menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_left']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["menu"]->key => $_smarty_tpl->tpl_vars["menu"]->value) {
$_smarty_tpl->tpl_vars["menu"]->_loop = true;
if ($_smarty_tpl->tpl_vars['menu']->value->is_visible==1&&$_smarty_tpl->tpl_vars['menu']->value->link!='') {?><li<?php if ($_smarty_tpl->tpl_vars['open_category_id']->value==$_smarty_tpl->tpl_vars['menu']->value->id||$_smarty_tpl->tpl_vars['menu']->value->id==769&&$_smarty_tpl->tpl_vars['open_category_id']->value==0||($_SERVER['REQUEST_URI']==smarty_modifier_replace($_smarty_tpl->tpl_vars['menu']->value->link,$_smarty_tpl->tpl_vars['url']->value,"/"))) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value->link;?>
" ><?php if ($_smarty_tpl->tpl_vars['menu']->value->id==1010||$_smarty_tpl->tpl_vars['menu']->value->id==1011||$_smarty_tpl->tpl_vars['menu']->value->id==1009||$_smarty_tpl->tpl_vars['menu']->value->id==1012) {?><span class="menu-sumka-icon">&nbsp;</span><?php } elseif ($_smarty_tpl->tpl_vars['menu']->value->id==919||$_smarty_tpl->tpl_vars['menu']->value->id==951||$_smarty_tpl->tpl_vars['menu']->value->id==947) {?><span class="menu-catalog-icon">&nbsp;</span><?php } elseif ($_smarty_tpl->tpl_vars['menu']->value->id==920||$_smarty_tpl->tpl_vars['menu']->value->id==948||$_smarty_tpl->tpl_vars['menu']->value->id==952||$_smarty_tpl->tpl_vars['menu']->value->id==979) {?><span class="menu-basket-icon">&nbsp;</span><?php } elseif ($_smarty_tpl->tpl_vars['menu']->value->id==955||$_smarty_tpl->tpl_vars['menu']->value->id==960||$_smarty_tpl->tpl_vars['menu']->value->id==963||$_smarty_tpl->tpl_vars['menu']->value->id==983) {?><span class="menu-busy-icon">&nbsp;</span><?php } elseif ($_smarty_tpl->tpl_vars['menu']->value->id==956||$_smarty_tpl->tpl_vars['menu']->value->id==959||$_smarty_tpl->tpl_vars['menu']->value->id==962||$_smarty_tpl->tpl_vars['menu']->value->id==982) {?><span class="menu-odejda-icon">&nbsp;</span><?php } elseif ($_smarty_tpl->tpl_vars['menu']->value->id==957||$_smarty_tpl->tpl_vars['menu']->value->id==958||$_smarty_tpl->tpl_vars['menu']->value->id==961||$_smarty_tpl->tpl_vars['menu']->value->id==981) {?><span class="menu-platki-icon">&nbsp;</span><?php } elseif ($_smarty_tpl->tpl_vars['menu']->value->id==921||$_smarty_tpl->tpl_vars['menu']->value->id==949||$_smarty_tpl->tpl_vars['menu']->value->id==953||$_smarty_tpl->tpl_vars['menu']->value->id==980) {?><span class="menu-stat-icon">&nbsp;</span><?php }
echo stripslashes($_smarty_tpl->tpl_vars['menu']->value->name);?>
</a></li><?php }
} ?>
    <?php  $_smarty_tpl->tpl_vars["menu"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["menu"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_top']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["menu"]->key => $_smarty_tpl->tpl_vars["menu"]->value) {
$_smarty_tpl->tpl_vars["menu"]->_loop = true;
if ($_smarty_tpl->tpl_vars['menu']->value->is_visible==1&&$_smarty_tpl->tpl_vars['menu']->value->param_str_1==1) {?><li<?php if ($_smarty_tpl->tpl_vars['open_category_id']->value==$_smarty_tpl->tpl_vars['menu']->value->id||$_smarty_tpl->tpl_vars['menu']->value->id==769&&$_smarty_tpl->tpl_vars['open_category_id']->value==0||($_SERVER['REQUEST_URI']==smarty_modifier_replace($_smarty_tpl->tpl_vars['menu']->value->link,$_smarty_tpl->tpl_vars['url']->value,"/"))) {?> class="active"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
echo $_smarty_tpl->tpl_vars['menu']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageIdRoutes(array('page_id'=>$_smarty_tpl->tpl_vars['menu']->value->page_id),$_smarty_tpl);
}?>" ><?php echo stripslashes($_smarty_tpl->tpl_vars['menu']->value->name);?>
</a></li><?php }
} ?>
</ul>
</div>
    <div id="find" <?php if ($_GET['find']) {?> style="display: block;"<?php }?>>
    <form action="/<?php echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find/category/" name="" method="get">
        <input type="text" name="find" value="<?php echo stripslashes($_GET['find']);?>
" placeholder="Поиск товаров в каталоге">
        <button>&nbsp;</button>	
    </form>
</div>
<?php if ($_smarty_tpl->tpl_vars['is_main']->value==1) {?>
    <div id="banner">
        <a href="/skidki/"><img src="/images/mobile/banner.jpg" alt="" /></a>
    </div>
    <div id="main-content">
        <ul>
            <?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>
                <li><a href="https://lady.lalipop.ru/odezhda/" class="odejda-icon"><b>Одежда больших размеров</b></a></li>
                <li><a href="https://lalipop.ru/bizhuteriya/" class="busy-icon"><b>Каталог бижутерии</b></a></li>
                <li><a href="https://platok.lalipop.ru/platki-sharfy/" class="plakok-icon"><b>Платки и шарфы</b></a></li>
                <li><a href="https://sumka.lalipop.ru/kozhgalantereya/" class="sumka-icon"><b>Кожгалантерея</b></a></li>
                <?php } else { ?>
                <li><a href="https://lalipop.ru/bizhuteriya/" class="busy-icon"><b>Каталог бижутерии</b></a></li>
                <li><a href="https://lady.lalipop.ru/odezhda/" class="odejda-icon"><b>Одежда больших размеров</b></a></li>
                <li><a href="https://platok.lalipop.ru/platki-sharfy/" class="platok-icon"><b>Платки и шарфы</b></a></li>
                <li><a href="https://sumka.lalipop.ru/kozhgalantereya/" class="sumka-icon"><b>Кожгалантерея</b></a></li>
                <?php }?>
            <li><a href="/specialnue-predlojeniya/" class="spec-icon">Спец. предложения</a>
                <?php echo $_smarty_tpl->tpl_vars['get_product_param_1']->value;?>

            </li>
            <li><a href="/novinki/" class="novinki-icon">Новинки</a></li>
            <li><a href="/skidki/" class="discount-icon">Система скидок</a></li>
            <li><a href="/dostavka/" class="dostavka-icon">Доставка и оплата</a></li>
            <li><a href="/novinki/" class="order-icon">Как заказать</a></li>
            <li><a href="/garantii/" class="garantii-icon">Гарантии</a></li>
            <li><a href="/novosti/" class="news-icon">Новости</a></li>
            <li><a href="/kontaktu/" class="contact-icon">Контакты</a></li>
                
        </ul>
    </div>
<?php } else { ?>
    <div id="content">
        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

    </div>
<?php }?>
<div id="footer">
    <div id="phone">
        <div><?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>8 (495) 642-38-53<?php } else { ?>8 (495) 642-27-34<?php }?></div>
        <span>пн-пт с 10:00 до 21:00</span>
    </div>
</div>
<div id="full-version"><a href="?mobile=0">Полная версия сайта</a></div>
<?php echo '<script'; ?>
 type="text/javascript">
    var url = '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
';
    var base_url = url;
    shop_type = <?php echo $_smarty_tpl->tpl_vars['shop_type']->value;?>

    session_id = '<?php echo $_smarty_tpl->tpl_vars['session_id']->value;?>
'
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/mobile.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/srcollTo.js"><?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {?>
    
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
    
<?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='platok') {?>
    
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
</body>
</html><?php }} ?>
