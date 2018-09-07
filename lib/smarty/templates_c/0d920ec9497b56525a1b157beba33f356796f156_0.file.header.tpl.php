<?php /* Smarty version 3.1.24, created on 2018-08-14 18:05:51
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/templates/header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:11623698735b72efcf1791c1_13314393%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d920ec9497b56525a1b157beba33f356796f156' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/templates/header.tpl',
      1 => 1534259131,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11623698735b72efcf1791c1_13314393',
  'variables' => 
  array (
    'head_title' => 0,
    'set' => 0,
    'host_url' => 0,
    'head_desc' => 0,
    'head_key' => 0,
    'menu_top' => 0,
    'menu' => 0,
    'url' => 0,
    'fav_count' => 0,
    'https_url' => 0,
    'setting' => 0,
    'basket_count' => 0,
    'menu_main' => 0,
    'is_main' => 0,
    'content' => 0,
    'banners_list' => 0,
    'bann_item' => 0,
    'file_id' => 0,
    'get_banners' => 0,
    'brands' => 0,
    'brand' => 0,
    'base_dir' => 0,
    'tree' => 0,
    'icategory' => 0,
    'mainProducts' => 0,
    'iproduct' => 0,
    'key' => 0,
    'last_news' => 0,
    'news_image_url' => 0,
    'last_articles' => 0,
    'main_journal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b72efcf618b04_90940458',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b72efcf618b04_90940458')) {
function content_5b72efcf618b04_90940458 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '11623698735b72efcf1791c1_13314393';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?php echo stripslashes((($tmp = @stripslashes($_smarty_tpl->tpl_vars['head_title']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['set']->value->title : $tmp));?>
</title>
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
favicon.ico" />
    <meta name="description" content='<?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', stripslashes((($tmp = @smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['head_desc']->value)),249))===null||$tmp==='' ? '' : $tmp))),249);?>
' />
    <meta name="keywords" content='<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes((($tmp = @stripslashes($_smarty_tpl->tpl_vars['head_key']->value))===null||$tmp==='' ? '' : $tmp)));?>
' />

    <link media="all" type="text/css" rel="stylesheet" href="/assets/fonts/fonts.css" />
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/styles.css?v=1" />
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/responsive.css" />
    <?php echo '<script'; ?>
 src="/assets/vendor/jquery/jquery-1.12.3.min.js"><?php echo '</script'; ?>
>
</head>
<body>
    <div class="supertop">
        <div class="container supertop__container">
            <div class="supertop__menu supertop-menu">
                <ul class="supertop-menu__ul">
                    <?php
$_from = $_smarty_tpl->tpl_vars['menu_top']->value[0];
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
                            <li class="supertop-menu__li">
                                <a class="supertop-menu__link" href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
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
            </div>
            <div class="supertop__city">
                <a href="#" class="supertop__city-link js-select-city">Выберите город</a>
            </div>
            <div class="supertop__buttons supertop-buttons">
                <!-- <a href="#" class="supertop-buttons__link"><span class="sprite -user"></span></a> -->
                <a href="/catalog/fav" class="supertop-buttons__link">
                    <span class="sprite -fav"></span>
                    <?php if ($_smarty_tpl->tpl_vars['fav_count']->value) {?>
                        <span class="supertop-buttons__counter _<?php echo $_smarty_tpl->tpl_vars['fav_count']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['fav_count']->value;?>
</span>
                    <?php }?>
                </a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
basket/" class="supertop-buttons__link" <?php if ($_smarty_tpl->tpl_vars['setting']->value->hide_prices || @constant('hideBasketWidget')) {?>style="display: none;"<?php }?> id="basket">
                    <span class="sprite -cart"></span>
                    <?php if ($_smarty_tpl->tpl_vars['basket_count']->value) {?>
                        <span class="supertop-buttons__counter _<?php echo $_smarty_tpl->tpl_vars['basket_count']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['basket_count']->value;?>
</span>
                    <?php }?>
                </a>
            </div>
        </div>
    </div>

    <header class="header">
        <div class="container header__container">
            <div class="header__logo">
                <a href="/">
                    <img src="/assets/img/logo.jpg" alt="Компрессор центр - Энергия воздуха" />
                </a>
            </div><!-- /.header__logo -->
            <div class="header__search-address">
                <form action="/catalog/find/" class="header__search h-search">
                    <input type="text" name="find" class="h-search__input" placeholder="Поиск по сайту" value="<?php echo (($tmp = @$_GET['find'])===null||$tmp==='' ? '' : $tmp);?>
" />
                    <button type="submit" class="h-search__submit"><span class="sprite -search"></span></button>
                </form>
                <address class="header__address h-address">
                    <div class="h-address__address">
                        <span class="sprite -address -mr5"></span>
                        г. Москва, 1-ая ул. Энтузиастов, д.12 стр.1
                    </div>
                    <div class="h-address__email">
                        <span class="sprite -mail -mr5"></span>
                        <a href="mailto: info@kompressor-center.com" class="h-address__link">info@kompressor-center.com</a>
                    </div>
                </address>
            </div><!-- /.header__search-address -->
            <div class="header__phones">
                <div class="header__phone"><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['setting']->value->phone_1,")",")</span>"),'+',"<span>+"),'8(',"<span>8("),'8 (',"<span>8 (");?>
</div>
                <div class="header__worktime">
                    <span class="sprite -worktime header__worktime-icon"></span>
                    Пн-Вс  08.00-18.00
                </div>
            </div><!-- /.header__phones -->
        </div><!-- /.container -->
    </header>


    <nav class="menu">
        <div class="container">
            <ul class="menu__ul">
                <?php
$_from = $_smarty_tpl->tpl_vars['menu_main']->value[0];
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
                        <li class="menu__li">
                            <a class="menu__link" href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
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
            </ul><!-- /.menu__ul -->
        </div><!-- /.container -->
    </nav>


    <section class="content">
        <?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1) {?>
            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?>
            <section class="main-slider">
                <div class="container">
                    <div class="slider owl-carousel">
                        <?php
$_from = $_smarty_tpl->tpl_vars['banners_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["bann_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["bann_item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["bann_item"]->value) {
$_smarty_tpl->tpl_vars["bann_item"]->_loop = true;
$foreach_bann_item_Sav = $_smarty_tpl->tpl_vars["bann_item"];
?>
                            <?php if ($_smarty_tpl->tpl_vars['bann_item']->value->file_id == 0) {?>
                                <?php $_smarty_tpl->tpl_vars["file_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['bann_item']->value->id, null, 0);?>
                                <div class="slider__item">
                                    <?php if ($_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->link) {?><a href="<?php echo $_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->link;?>
"><?php }?>
                                        <img src='<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
images/banners/<?php echo $_smarty_tpl->tpl_vars['bann_item']->value->file;?>
' class="slider__img" alt="<?php echo $_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->short_desc;?>
" />
                                    <?php if ($_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->link) {?></a><?php }?>
                                </div>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars["bann_item"] = $foreach_bann_item_Sav;
}
?>
                    </div><!-- /.slider -->
                </div><!-- /.container -->
            </section><!-- /.main-slider -->

            <section class="brands">
                <div class="container">
                    <div class="brands__slider js-brands-slider js-slider owl-carousel">
                        <?php
$_from = $_smarty_tpl->tpl_vars['brands']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["brand"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["brand"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["brand"]->value) {
$_smarty_tpl->tpl_vars["brand"]->_loop = true;
$foreach_brand_Sav = $_smarty_tpl->tpl_vars["brand"];
?>
                            <div class="brands__item js-slider-item">
                                <a class="brands__link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
catalog/brand/<?php echo $_smarty_tpl->tpl_vars['brand']->value->pseudo_dir;?>
/">
                                    <img class="brands__img" width="125px" height="63px" src="/images/icons/<?php echo $_smarty_tpl->tpl_vars['brand']->value->icon;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['brand']->value->name;?>
" />
                                </a>
                            </div>
                        <?php
$_smarty_tpl->tpl_vars["brand"] = $foreach_brand_Sav;
}
?>
                    </div>
                </div><!-- /.container -->
            </section><!-- /.brands -->

            <div class="container">
                <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('hide_title'=>1,'open_category_id'=>0), 0);
?>

            </div><!-- /.container -->

            <div class="container">
                <div class="divider"></div>
            </div>

            <div class="container">
                <section class="categories">
                    <?php
$_from = $_smarty_tpl->tpl_vars['tree']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["icategory"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
$foreach_icategory_Sav = $_smarty_tpl->tpl_vars["icategory"];
?>
                        <?php $_smarty_tpl->tpl_vars["icategory_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['icategory']->value->id, null, 0);?>
                        <?php if ($_smarty_tpl->tpl_vars['icategory']->value->is_visible == 1) {?>
                            <div class="categories__item">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['icategory']->value->category_pseudo_dir;?>
/" class="categories__link" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
">
                                    <span class="categories__item-image">
                                        <img src="/images/icons/<?php if ($_smarty_tpl->tpl_vars['icategory']->value->icon) {
echo $_smarty_tpl->tpl_vars['icategory']->value->icon;
} else { ?>no-image.png<?php }?>" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
" />
                                    </span>
                                    <span class="categories__item-text"><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</span>
                                </a>
                            </div>
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
                </section><!-- /.categories -->
            </div><!-- /.container -->

            <div class="container">
                <section class="main-products tabs">
                    <div class="main-products__tabs">
                        <div class="products-tabs tabs__items">
                            <a href="#main-products-tab-discounts" class="products-tabs__link js-tab-link _active">Скидки</a>
                            <a href="#main-products-tab-promo" class="products-tabs__link js-tab-link">Акции</a>
                            <a href="#main-products-tab-new" class="products-tabs__link js-tab-link">Новинки</a>
                            <a href="#main-products-tab-sale" class="products-tabs__link js-tab-link">Распродажи</a>
                        </div>
                    </div>
                    <div class="main-products__content">
                        <div class="tabs__content _active" id="main-products-tab-discounts">
                            <div class="products-slider js-slider owl-carousel">
                                <?php
$_from = $_smarty_tpl->tpl_vars['mainProducts']->value[1]['products'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["iproduct"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["iproduct"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["iproduct"]->value) {
$_smarty_tpl->tpl_vars["iproduct"]->_loop = true;
$foreach_iproduct_Sav = $_smarty_tpl->tpl_vars["iproduct"];
?>
                                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/getProductItem.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['iproduct']->value,'product_images'=>$_smarty_tpl->tpl_vars['mainProducts']->value[1]['images'],'key'=>$_smarty_tpl->tpl_vars['key']->value), 0);
?>

                                <?php
$_smarty_tpl->tpl_vars["iproduct"] = $foreach_iproduct_Sav;
}
?>
                            </div><!-- /.products-slider -->
                        </div><!-- .tabs__content -->
                        <div class="tabs__content" id="main-products-tab-promo">
                            <div class="products-slider js-slider owl-carousel">
                                <?php
$_from = $_smarty_tpl->tpl_vars['mainProducts']->value[2]['products'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["iproduct"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["iproduct"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["iproduct"]->value) {
$_smarty_tpl->tpl_vars["iproduct"]->_loop = true;
$foreach_iproduct_Sav = $_smarty_tpl->tpl_vars["iproduct"];
?>
                                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/getProductItem.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['iproduct']->value,'product_images'=>$_smarty_tpl->tpl_vars['mainProducts']->value[2]['images'],'key'=>$_smarty_tpl->tpl_vars['key']->value), 0);
?>

                                <?php
$_smarty_tpl->tpl_vars["iproduct"] = $foreach_iproduct_Sav;
}
?>
                            </div><!-- /.products-slider -->
                        </div><!-- .tabs__content -->
                        <div class="tabs__content" id="main-products-tab-new">
                            <div class="products-slider js-slider owl-carousel">
                                <?php
$_from = $_smarty_tpl->tpl_vars['mainProducts']->value[3]['products'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["iproduct"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["iproduct"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["iproduct"]->value) {
$_smarty_tpl->tpl_vars["iproduct"]->_loop = true;
$foreach_iproduct_Sav = $_smarty_tpl->tpl_vars["iproduct"];
?>
                                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/getProductItem.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['iproduct']->value,'product_images'=>$_smarty_tpl->tpl_vars['mainProducts']->value[3]['images'],'key'=>$_smarty_tpl->tpl_vars['key']->value), 0);
?>

                                <?php
$_smarty_tpl->tpl_vars["iproduct"] = $foreach_iproduct_Sav;
}
?>
                            </div><!-- /.products-slider -->
                        </div><!-- .tabs__content -->
                        <div class="tabs__content" id="main-products-tab-sale">
                            <div class="products-slider js-slider owl-carousel">
                                <?php
$_from = $_smarty_tpl->tpl_vars['mainProducts']->value[5]['products'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["iproduct"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["iproduct"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["iproduct"]->value) {
$_smarty_tpl->tpl_vars["iproduct"]->_loop = true;
$foreach_iproduct_Sav = $_smarty_tpl->tpl_vars["iproduct"];
?>
                                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/getProductItem.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['iproduct']->value,'product_images'=>$_smarty_tpl->tpl_vars['mainProducts']->value[5]['images'],'key'=>$_smarty_tpl->tpl_vars['key']->value), 0);
?>

                                <?php
$_smarty_tpl->tpl_vars["iproduct"] = $foreach_iproduct_Sav;
}
?>
                            </div><!-- /.products-slider -->
                        </div><!-- .tabs__content -->
                    </div><!-- /.main-products__content -->
                    <div class="main-products__link">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
catalog/" class="btn -bordered">В каталог</a>
                    </div>
                </section><!-- /.main-products -->
            </div>

            <div class="container">
                <section class="main-informers">
                    <div class="main-informers__item">
                        <a href="#" class="main-informers__item-cont">
                            <div class="main-informers__image">
                                <img class="main-informers__img" src="/assets/img/informer-business.jpg" alt="Бизнес клиентам - Энергия воздуха" />
                            </div>
                            <div class="main-informers__item-title">Бизнес клиентам</div>
                        </a>
                    </div>
                    <div class="main-informers__item">
                        <a href="/informacionnue-materialu/" class="main-informers__item-cont">
                            <div class="main-informers__image">
                                <img class="main-informers__img" src="/assets/img/informer-info.jpg" alt="Информационные материалы - Энергия воздуха" />
                            </div>
                            <div class="main-informers__item-title">Информационные материалы</div>
                        </a>
                    </div>
                </section><!-- /.main-informers -->
            </div>

            <div class="container">
                <section class="main-articles">
                    <?php if ($_smarty_tpl->tpl_vars['last_news']->value[0]) {?>
                        <div class="main-articles__item main-article">
                            <div class="main-article__head">
                                <a href="/novosti" class="main-article__type">Новости</a>
                            </div>
                            <article class="main-article__cont article">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['last_news']->value[0]->id;?>
/" class="article__image"><img src="<?php echo $_smarty_tpl->tpl_vars['news_image_url']->value;
echo $_smarty_tpl->smarty->registered_objects['setFile'][0]->setFile(array('file'=>$_smarty_tpl->tpl_vars['last_news']->value[0]->icon),$_smarty_tpl);?>
" alt="" /></a>
                                <!--
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['last_news']->value[0]->id;?>
/" class="article__category"><span class="sprite -news-category article__category-icon"></span> Природа</a>
                                -->
                                <div class="article__title-line">
                                    <span class="article__date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['last_news']->value[0]->date,"%d.%m.%Y");?>
</span>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['last_news']->value[0]->id;?>
/" class="article__title"><?php echo $_smarty_tpl->tpl_vars['last_news']->value[0]->name;?>
</a>
                                </div>
                                <div class="article__description"><?php echo stripslashes(smarty_modifier_truncate(trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['last_news']->value[0]->text)),75," ...",true,false));?>
</div>
                            </article>
                            <div class="mail-article__link">
                                <a href="/novosti" class="btn -bordered">Все новости</a>
                            </div>
                        </div><!-- /.main-articles__item -->
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['last_articles']->value[0]) {?>
                        <div class="main-articles__item main-article">
                            <div class="main-article__head">
                                <a href="/stati" class="main-article__type">Статьи</a>
                            </div>
                            <article class="main-article__cont article">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['last_articles']->value[0]->id;?>
/" class="article__image"><img src="<?php echo $_smarty_tpl->tpl_vars['news_image_url']->value;
echo $_smarty_tpl->smarty->registered_objects['setFile'][0]->setFile(array('file'=>$_smarty_tpl->tpl_vars['last_articles']->value[0]->icon),$_smarty_tpl);?>
" alt="" /></a>
                                <!--
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['last_articles']->value[0]->id;?>
/" class="article__category"><span class="sprite -news-category article__category-icon"></span> Природа</a>
                                -->
                                <div class="article__title-line">
                                    <span class="article__date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['last_articles']->value[0]->date,"%d.%m.%Y");?>
</span>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['last_articles']->value[0]->id;?>
/" class="article__title"><?php echo $_smarty_tpl->tpl_vars['last_articles']->value[0]->name;?>
</a>
                                </div>
                                <div class="article__description"><?php echo stripslashes(smarty_modifier_truncate(trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['last_articles']->value[0]->text)),75," ...",true,false));?>
</div>
                            </article>
                            <div class="mail-article__link">
                                <a href="/stati" class="btn -bordered">Все статьи</a>
                            </div>
                        </div><!-- /.main-articles__item -->
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['main_journal']->value[0]) {?>
                        <div class="main-articles__item main-article">
                            <div class="main-article__head">
                                <a href="/journal" class="main-article__type">Интернет журнал</a>
                            </div>
                            <article class="main-article__cont article">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
journal/look/<?php echo $_smarty_tpl->tpl_vars['main_journal']->value[0]->id;?>
/" class="article__image"><img src="/images/news/<?php echo $_smarty_tpl->tpl_vars['main_journal']->value[0]->image;?>
" alt="" /></a>
                                <!--
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
journal/look/<?php echo $_smarty_tpl->tpl_vars['main_journal']->value[0]->id;?>
/" class="article__category"><span class="sprite -news-category article__category-icon"></span> Природа</a>
                                -->
                                <div class="article__title-line">
                                    <span class="article__date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['main_journal']->value[0]->published_at,"%d.%m.%Y");?>
</span>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
journal/look/<?php echo $_smarty_tpl->tpl_vars['main_journal']->value[0]->id;?>
/" class="article__title"><?php echo $_smarty_tpl->tpl_vars['main_journal']->value[0]->title;?>
</a>
                                </div>
                                <div class="article__description"><?php echo stripslashes($_smarty_tpl->tpl_vars['main_journal']->value[0]->description);?>
</div>
                            </article>
                            <div class="mail-article__link">
                                <a href="/journal" class="btn -bordered">В Интернет-журнал</a>
                            </div>
                        </div><!-- /.main-articles__item -->
                    <?php }?>
                </section><!-- /.main-articles -->
            </div>
        <?php }?>

        <div class="container">
            <form action="" method="post" class="consult">
                <div class="consult__photo">
                    <img class="consult__img" src="/assets/img/consult-photo.png" alt="" />
                </div>
                <div class="consult__phone">
                    <input type="text" placeholder="Ваш телефон" class="form-control" />
                </div>
                <div class="consult__button">
                    <button type="submit" class="btn -dark">Заказать консультацию</button>
                </div>
            </form><!-- /.consult -->
        </div>


        <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1 && $_smarty_tpl->tpl_vars['content']->value) {?>
            <div class="container">
                <section class="seo-text">
                    <div class="seo-text__cutter"></div>
                    <a href="#" class="seo-text__read-more js-seo-read-more">Читать дальше →</a>
                    <p><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</p>
                </section><!-- /.main-text -->
            </div><!-- /.container -->
        <?php }?>
    </section><!-- /.content --><?php }
}
?>