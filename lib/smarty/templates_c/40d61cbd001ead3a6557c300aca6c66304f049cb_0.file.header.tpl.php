<?php /* Smarty version 3.1.24, created on 2017-01-27 23:11:33
         compiled from "E:/OpenServer/domains/kc-pskov.dev/templates/header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:25470588ba975608446_35134881%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40d61cbd001ead3a6557c300aca6c66304f049cb' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/templates/header.tpl',
      1 => 1485547892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25470588ba975608446_35134881',
  'variables' => 
  array (
    'host' => 0,
    'menu_top' => 0,
    'menu' => 0,
    'open_category_id' => 0,
    'url' => 0,
    'is_main' => 0,
    'fronted_images_url' => 0,
    'setting' => 0,
    'https_url' => 0,
    'basket' => 0,
    'banners_list' => 0,
    'bann_item' => 0,
    'file_id' => 0,
    'get_banners' => 0,
    'host_url' => 0,
    'i' => 0,
    'brands' => 0,
    'brand' => 0,
    'base_dir' => 0,
    'tree' => 0,
    'icategory' => 0,
    'content' => 0,
    'last_news' => 0,
    'item_news' => 0,
    'month' => 0,
    'month_int' => 0,
    'months' => 0,
    'last_articles' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588ba9757289d7_33886984',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588ba9757289d7_33886984')) {
function content_588ba9757289d7_33886984 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once 'E:/OpenServer/domains/kc-pskov.dev/lib/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_function_counter')) require_once 'E:/OpenServer/domains/kc-pskov.dev/lib/smarty/plugins/function.counter.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'E:/OpenServer/domains/kc-pskov.dev/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '25470588ba975608446_35134881';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
www.w3.org/1999/xhtml">
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        
    </head> 
    <body>
        <div id="right-shadow">
            <div id="wrapper">

                <div id="left-wrap">

                    <div style="width: 215px;">&nbsp;</div>
                    
                    <ul>
                <?php
$_from = $_smarty_tpl->tpl_vars['menu_top']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["menu"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["menu"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_menu'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["menu"]->value) {
$_smarty_tpl->tpl_vars["menu"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_menu']->value['iteration']++;
$foreach_menu_Sav = $_smarty_tpl->tpl_vars["menu"];
if ($_smarty_tpl->tpl_vars['menu']->value->is_visible == 1) {?><li><span<?php if ((isset($_smarty_tpl->tpl_vars['__foreach_menu']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_menu']->value['iteration'] : null) == (isset($_smarty_tpl->tpl_vars['__foreach_menu']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_menu']->value['total'] : null)) {?> style="background: none;"<?php }
if ($_smarty_tpl->tpl_vars['open_category_id']->value == $_smarty_tpl->tpl_vars['menu']->value->id || $_smarty_tpl->tpl_vars['menu']->value->id == 769 && $_smarty_tpl->tpl_vars['open_category_id']->value == 0 || ($_SERVER['REQUEST_URI'] == smarty_modifier_replace($_smarty_tpl->tpl_vars['menu']->value->link,$_smarty_tpl->tpl_vars['url']->value,"/"))) {?>  class="selected_menu"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['menu']->value->link) {
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


            <div class="bg-menu-left"><a class="iml-1" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
catalog/full_podbor/">Подобрать оборудование</a></div>
            <div class="bg-menu-left"><a class="iml-2" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
akcii/">Акции</a></div>
            <div class="bg-menu-left"><a class="iml-3" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
dostavka/">Доставка</a></div>
            <div class="bg-menu-left"><a class="iml-4" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
oplata/">Оплата</a></div>
            <div class="bg-menu-left"><a class="iml-5" href="/call_back/send/?is_modal=1" rel="call_back">Обратная связь</a></div>
            <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?>
                <div class="limg-block">
                    <img src="/images/fronted/limg-1.png" alt="" />
                    <img src="/images/fronted/limg-2.png" alt="" />
                    <img src="/images/fronted/limg-3.png" alt="" />
                    <img src="/images/fronted/limg-4.png" alt="" />
                    <img src="/images/fronted/limg-5.png" alt="" />
                </div>
                <div class="ytube">
                    <span>Наш канал на <img src="/images/fronted/ytube.png" alt="" /></span>
                    <iframe width="187" height="" src="https://www.youtube.com/embed/videoseries?list=PLJUqsa8rfxTJ_ZG4R4Zki27K0G3chEzgi" frameborder="0" allowfullscreen></iframe>
                    <a href="">Перейти на канал</a>
                </div>
            <?php }?>

        </div>

        <div id="content-wrap">
            <div id="header">
                <div id="logo">
                    <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1 && $_SERVER['REQUEST_URI'] != '/404/') {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo.jpg" alt="Энергия воздуха" /><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
logo.jpg" alt="Энергия воздуха" /></a><?php }?>
                </div>
                <div id="adress-block">
                    
                    <a href="/catalog/fav" title="Избранное" class="fav">
                        <img src="/images/fronted/fav.png" alt="Избранное" />
                        Избранное
                    </a>
    
                    <?php if (!$_smarty_tpl->tpl_vars['setting']->value->hide_prices && !@constant('hideBasketWidget')) {?>
                        <div>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
basket/" id="basket">
                                <?php echo $_smarty_tpl->tpl_vars['basket']->value;?>

                            </a>
                        </div>
                    <?php }?>

                    <div id="adress">
                        г. Псков
                    </div>
                    <div id="phone">
                        <?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['setting']->value->phone_1,")",")</span>"),'+',"<span>+"),'8(',"<span>8("),'8 (',"<span>8 (");?>

                    </div>
                    <div id="adress_2">
                        г. В.Луки
                    </div>
                    <div id="phone">
                        <?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['setting']->value->phone_2,")",")</span>"),'+',"<span>+"),'8(',"<span>8("),'8 (',"<span>8 (");?>

                    </div>
                </div>
                <div class="clear">&nbsp;</div>
            </div>

            <?php if (count($_smarty_tpl->tpl_vars['banners_list']->value) > 0) {?>
                <div id="slider">
                    <?php if (count($_smarty_tpl->tpl_vars['banners_list']->value) <= 2) {?>
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
                                <?php if ($_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->link) {?><a href="<?php echo $_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->link;?>
"><?php }?><img src='<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
images/banners/<?php echo $_smarty_tpl->tpl_vars['bann_item']->value->file;?>
' width="773" height="288" alt="<?php echo $_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->short_desc;?>
" /><?php if ($_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->link) {?></a><?php }?>

                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars["bann_item"] = $foreach_bann_item_Sav;
}
?>
                    <?php } else { ?>
                        <div class="slider">
                            <ul>
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
                                        <li><?php if ($_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->link) {?><a href="<?php echo $_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->link;?>
"><?php }?><img src='<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
images/banners/<?php echo $_smarty_tpl->tpl_vars['bann_item']->value->file;?>
' width="773" height="288" alt="<?php echo $_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->short_desc;?>
" /><?php if ($_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->link) {?></a><?php }?></li>

                                    <?php }?>
                                <?php
$_smarty_tpl->tpl_vars["bann_item"] = $foreach_bann_item_Sav;
}
?>
                            </ul>
                        </div>


                        <div class="navAndArrowButtonStyle">
                            <div class="arrowSliderButton">
                                <button class="prev">Пред.</button>
                                <button class="next">След.</button>
                            </div>
                            <div class="navSliderButton">
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
                                        <button class="<?php echo smarty_function_counter(array('name'=>"slide-count",'assign'=>"i"),$_smarty_tpl);
echo $_smarty_tpl->tpl_vars['i']->value;
if ($_smarty_tpl->tpl_vars['i']->value == 1) {?> j-active<?php }?>"></button>
                                    <?php }?>
                                <?php
$_smarty_tpl->tpl_vars["bann_item"] = $foreach_bann_item_Sav;
}
?>
                            </div>
                            <div class="clear">&nbsp;</div>
                        </div>

                    <?php }?>
                </div>
            <?php }?>




            <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?>
                <div class="main-content-top-data">
                    <div class="main-content-text">
                        <b>Компрессор-Центр «Энергия Воздуха»</b> – это специализированная площадка на которой специалисты в области компрессорного и пневматического оборудования профессионально подойдут к решению любой задачи в области сжатого воздуха какой бы простой или сложной она не была. Компрессор-Центр предлагает только самые передовые технологии, от ведущих мировых производителей компрессорной техники и пневматического инструмента, которые зарекомендовали себя у российского потребителя.
                    </div>

                    <div class="head-h1"><a href="/rasprodaja/"><span>Специализированная сеть компрессор-центров</span></a></div>
                    <div id="main-icon">
                        <a href="/bolshoiy-oput-servisnux-rabot/"><img src="/images/fronted/icon-1.png" alt="" /><span>Большой опыт сервисных работ</span></a>
                        <a href="/garantiya-kachestva/"><img src="/images/fronted/icon-2.png" alt="" /><span>Гарантия качества</span></a>
                        <a href="/bolee-10-let-rabotu/"><img src="/images/fronted/icon-3.png" alt="" /><span>Более 10 лет работы</span></a>
                        <a href="/nalichie-sklada-oborydovaniya/"><img src="/images/fronted/icon-4.png" alt="" /><span>Наличие склада оборудования</span></a>
                        <a href="/set-po-vseiy-rossii/"><img src="/images/fronted/icon-5.png" alt="" /><span>Сеть по всей России</span></a>
                    </div>

                    <div class="main-brands">
                        <div class="main-brands_title">Производители</div>

                        <div class="main-brands_slider">
                            <ul>
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
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
catalog/brand/<?php echo $_smarty_tpl->tpl_vars['brand']->value->pseudo_dir;?>
/"><img width="125px" height="63px" src="/images/icons/<?php echo $_smarty_tpl->tpl_vars['brand']->value->icon;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['brand']->value->name;?>
" /></a></li>
                                    <?php
$_smarty_tpl->tpl_vars["brand"] = $foreach_brand_Sav;
}
?>
                            </ul>
                        </div>
                        <div class="arrowSliderButton">
                            <button class="prev">Пред.</button>
                            <button class="next">След.</button>
                        </div>
                    </div>
                </div>

                <div class="main-podbor">
                    <div class="head-h1"><a href="/catalog/full_podbor/"><span>Подбор оборудования</span></a></div>
                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("modules/catalog/templates/podbor.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('hide_title'=>1,'open_category_id'=>0), 0);
?>

                    <?php echo '<script'; ?>
>
                        $('.main-podbor .sel-button').click(function() {
                            $('.main-content-bottom-data, .main-content-top-data, #slider').hide();
                            $(window).scrollTop(200)
                        })
                    <?php echo '</script'; ?>
>
                </div>

                <div class="main-content-bottom-data">
                    <div class="head-h1"><a href="/rasprodaja/"><span>Каталог оборудования</span></a></div>
                    <div id="category-group">
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
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['icategory']->value->category_pseudo_dir;?>
/" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
">
                                    <img src="/images/icons/<?php if ($_smarty_tpl->tpl_vars['icategory']->value->icon) {
echo $_smarty_tpl->tpl_vars['icategory']->value->icon;
} else { ?>no-image.png<?php }?>" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
" />
                                    <span><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</span>
                                </a>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
                    </div>
                </div>
                <br/>
            <?php }?>

            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>


            <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?>
                <div class="main-info">

                    <div class="main-news-box">
                        <div class="main-news-box_title">Новости</div>

                        <?php
$_from = $_smarty_tpl->tpl_vars['last_news']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item_news"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item_news"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["item_news"]->value) {
$_smarty_tpl->tpl_vars["item_news"]->_loop = true;
$foreach_item_news_Sav = $_smarty_tpl->tpl_vars["item_news"];
?>
                            <?php $_smarty_tpl->tpl_vars["month"] = new Smarty_Variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%m"), null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["month_int"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1-1, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["month_int_0"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1, null, 0);?>
                            <div class="main-news-box_content">
                                <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%d");?>
 <?php echo $_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['month_int']->value];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%Y");?>
</span>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/"><?php echo $_smarty_tpl->tpl_vars['item_news']->value->name;?>
</a>
                            </div>
                        <?php
$_smarty_tpl->tpl_vars["item_news"] = $foreach_item_news_Sav;
}
?>

                        <div class="main-news-box_bottom">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
novosti/">Все новости</a>
                        </div>

                    </div>

                    <div class="main-news-box main-news-box-fix-width">
                        <div class="main-news-box_title">Полезная информация</div>

                        <?php
$_from = $_smarty_tpl->tpl_vars['last_articles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item_news"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item_news"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["item_news"]->value) {
$_smarty_tpl->tpl_vars["item_news"]->_loop = true;
$foreach_item_news_Sav = $_smarty_tpl->tpl_vars["item_news"];
?>
                            <?php $_smarty_tpl->tpl_vars["month"] = new Smarty_Variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%m"), null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["month_int"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1-1, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars["month_int_0"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1, null, 0);?>
                            <div class="main-news-box_content">
                                <img src="/images/news/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->icon;?>
" alt="" />
                                <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%d");?>
 <?php echo $_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['month_int']->value];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%Y");?>
</span>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/"><?php echo $_smarty_tpl->tpl_vars['item_news']->value->name;?>
</a>
                                <div class="clear"></div>
                            </div>
                        <?php
$_smarty_tpl->tpl_vars["item_news"] = $foreach_item_news_Sav;
}
?>

                        <div class="main-news-box_bottom">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
stati/">Все статьи</a>
                        </div>

                    </div>

                </div>
            <?php }?>

        </div>
    </div>
</div>





<div class="clear">&nbsp;</div>







<?php }
}
?>