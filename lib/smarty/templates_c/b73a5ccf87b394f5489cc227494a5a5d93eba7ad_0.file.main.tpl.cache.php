<?php /* Smarty version 3.1.24, created on 2015-09-13 16:07:03
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/templates/main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:150582741055f574f764e338_95689529%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b73a5ccf87b394f5489cc227494a5a5d93eba7ad' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/templates/main.tpl',
      1 => 1441976216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150582741055f574f764e338_95689529',
  'variables' => 
  array (
    'shop' => 0,
    'is_mobile' => 0,
    'is_only_content' => 0,
    'content' => 0,
    'live_search' => 0,
    'param_tpl' => 0,
    'url' => 0,
    'fronted_images_url' => 0,
    'menu_catalog' => 0,
    'is_hide_sumka' => 0,
    'is_main' => 0,
    'open_category_id' => 0,
    'category_price' => 0,
    'last_news' => 0,
    'item_news' => 0,
    'month' => 0,
    'month_int' => 0,
    'months' => 0,
    'host' => 0,
    'banners_list' => 0,
    'bann_item' => 0,
    'file_id' => 0,
    'get_banners' => 0,
    'host_url' => 0,
    'i' => 0,
    'get_product_param_1_top' => 0,
    'get_product_param_1' => 0,
    'tree' => 0,
    'icategory' => 0,
    'icategory_id' => 0,
    'icategory_child' => 0,
    'catalog_dir' => 0,
    'brands' => 0,
    'brand' => 0,
    'icons_url' => 0,
    'is_open_product' => 0,
    'lib_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f574f7845c28_05511722',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f574f7845c28_05511722')) {
function content_55f574f7845c28_05511722 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_counter')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '150582741055f574f764e338_95689529';
if ($_smarty_tpl->tpl_vars['shop']->value == 'forum') {?>
    <?php echo $_smarty_tpl->getSubTemplate ("forum_main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } elseif ($_smarty_tpl->tpl_vars['is_mobile']->value == '1') {?>
    <?php echo $_smarty_tpl->getSubTemplate ("mobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } elseif ($_smarty_tpl->tpl_vars['is_only_content']->value == 1) {
echo $_smarty_tpl->tpl_vars['content']->value;
} else {
if ($_GET['is_modal'] != 1) {
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        <div id="content">
            <div id="find"<?php if ($_GET['find']) {?> style="display: block;"<?php }?>>
                <?php echo $_smarty_tpl->tpl_vars['live_search']->value;?>

            </div>
            <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['module'] != 'stat') {?>
                <div id="content-left">
                    <div class="content-wrap">

                        <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
platki-sharfy/"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
platki_catalog.png" alt="Платки и шарфы" id="catalog-header" /></a><?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'sumka') {?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
kozhgalantereya/"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
sumka_catalog.png" alt="Интернет магазин кожгалантереи" id="catalog-header" /></a><?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'woman') {?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
odezhda/"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
woman_catalog.png" alt="Женская одежда" id="catalog-header" /></a><?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
odezhda/"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
lady_catalog.png" alt="Женская одежда больших размеров" id="catalog-header" /></a><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
bizhuteriya/"><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
catalog.png" alt="Интернет магазин бижутерии и украшений" id="catalog-header" /></a><?php }?>

                        <div class="catalog-bg">
                            <?php echo $_smarty_tpl->tpl_vars['menu_catalog']->value;?>

                            <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lalipop') {?>
                                <a href="https://woman.lalipop.ru/"><img src="/images/fronted/catalog_woman.jpg" alt="" /></a>
                                <a href="https://lady.lalipop.ru/"><img src="/images/fronted/catalog_lady.jpg" alt="" /></a>
                                <a href="https://platok.lalipop.ru/"><img src="/images/fronted/platki-sharfy_catalog.png" alt="" /></a>
                                <a href="https://sumka.lalipop.ru/"<?php if ($_smarty_tpl->tpl_vars['is_hide_sumka']->value == '1') {?> class="hide"<?php }?>><img src="/images/fronted/catalog_sumka.jpg" alt="" /></a>
                                <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
                                <a href="https://woman.lalipop.ru/"><img src="/images/fronted/catalog_woman.jpg" alt="" /></a>
                                <a href="https://lalipop.ru/"><img src="/images/fronted/lady_catalog_busy.png" alt="" /></a>
                                <a href="https://platok.lalipop.ru/"><img src="/images/fronted/platki-sharfy_catalog.png" alt="" /></a>
                                <a href="https://sumka.lalipop.ru/"<?php if ($_smarty_tpl->tpl_vars['is_hide_sumka']->value == '1') {?> class="hide"<?php }?>><img src="/images/fronted/catalog_sumka.jpg" alt="" /></a>
                                <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?>
                                <a href="https://lalipop.ru/"><img src="/images/fronted/lady_catalog_busy.png" alt="" /></a>
                                <a href="https://woman.lalipop.ru/"><img src="/images/fronted/catalog_woman.jpg" alt="" /></a>
                                <a href="https://lady.lalipop.ru/"><img src="/images/fronted/catalog_lady.jpg" alt="" /></a>
                                <a href="https://sumka.lalipop.ru/"<?php if ($_smarty_tpl->tpl_vars['is_hide_sumka']->value == '1') {?> class="hide"<?php }?>><img src="/images/fronted/catalog_sumka.jpg" alt="" /></a>
                                <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'sumka') {?>
                                <a href="https://lalipop.ru/"><img src="/images/fronted/lady_catalog_busy.png" alt="" /></a>
                                <a href="https://woman.lalipop.ru/"><img src="/images/fronted/catalog_woman.jpg" alt="" /></a>
                                <a href="https://lady.lalipop.ru/"><img src="/images/fronted/catalog_lady.jpg" alt="" /></a>
                                <a href="https://platok.lalipop.ru/"><img src="/images/fronted/platki-sharfy_catalog.png" alt="" /></a>
                                <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
                                <a href="https://lalipop.ru/"><img src="/images/fronted/lady_catalog_busy.png" alt="" /></a>
                                <a href="https://lady.lalipop.ru/"><img src="/images/fronted/catalog_lady.jpg" alt="" /></a>
                                <a href="https://platok.lalipop.ru/"><img src="/images/fronted/platki-sharfy_catalog.png" alt="" /></a>
                                <a href="https://sumka.lalipop.ru/"<?php if ($_smarty_tpl->tpl_vars['is_hide_sumka']->value == '1') {?> class="hide"<?php }?>><img src="/images/fronted/catalog_sumka.jpg" alt="" /></a>
                                <?php }?>
                        </div>
                    </div>
                    <div id="forum">
                        <a href="https://forum.lalipop.ru/" target="_blank" title="Женский форум интернет магазина Lalipop.ru"><img src="/images/fronted/forum.png" alt="Женский форум интернет магазина Lalipop.ru" /></a>
                    </div>
                    
                    
                    
                    

                    <?php if ($_smarty_tpl->tpl_vars['shop']->value != 'lady' && $_smarty_tpl->tpl_vars['shop']->value != 'sumka' && $_smarty_tpl->tpl_vars['shop']->value != 'woman') {?>
                        <?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1 && $_smarty_tpl->tpl_vars['open_category_id']->value > 0 && $_smarty_tpl->tpl_vars['open_category_id']->value != 764 && $_smarty_tpl->tpl_vars['category_price']->value->max_price > 0) {?>

                            <div class="content-wrap">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
podbor-header.png" alt="" id="catalog-header" />
                                <div class="catalog-bg">

                                    <?php echo $_smarty_tpl->getSubTemplate ("podbor.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                                </div>
                            </div>
                        <?php }?>
                    <?php }?>     


                    <?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1) {?>
                        <?php if (count($_smarty_tpl->tpl_vars['last_news']->value)) {?><br/>
                            <div class="h1"><a href="/novosti/">Новости и статьи</a></div>
                            <div class="news-box">
                                <?php
$_from = $_smarty_tpl->tpl_vars['last_news']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item_news"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item_news"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item_news"]->value) {
$_smarty_tpl->tpl_vars["item_news"]->_loop = true;
$foreach_item_news_Sav = $_smarty_tpl->tpl_vars["item_news"];
?>            
                                    <div class="news">
                                        <?php $_smarty_tpl->tpl_vars["month"] = new Smarty_Variable(smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%m"), null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["month_int"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1-1, null, 0);?>
                                        <?php $_smarty_tpl->tpl_vars["month_int_0"] = new Smarty_Variable($_smarty_tpl->tpl_vars['month']->value*1, null, 0);
$_smarty_tpl->assign("icon",$_smarty_tpl->smarty->registered_objects['setFile'][0]->setFile(array('file'=>$_smarty_tpl->tpl_vars['item_news']->value->icon),$_smarty_tpl));?>


                                        <div class="news-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%d");?>
 <?php echo $_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['month_int']->value];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item_news']->value->date,"%Y");?>
</div>
                                        <div class="news-name"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['item_news']->value->id;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['item_news']->value->name);?>
</a></div>
                                            
                                    </div>
                                <?php
$_smarty_tpl->tpl_vars["item_news"] = $foreach_item_news_Sav;
}
?>
                            </div>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
                            <a href="/tablica-razmerov/" class="spec" title="Таблица размеров одежды"><img src="/images/fronted/table-size.png" alt="Таблица размеров одежды" /></a>
                            <?php } else { ?>
                            <a href="/specialnue-predlojeniya/" class="spec"><img src="/images/fronted/spec.png" alt="" /></a>
                            <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
                            <a href="https://clck.yandex.ru/redir/dtype=stred/pid=47/cid=2508/*https://market.yandex.ru/shop/294458/reviews" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
clck.yandex.ru/redir/dtype=stred/pid=47/cid=2507/*<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
grade.market.yandex.ru/?id=294458&action=image&size=3" border="0" width="200" height="125" alt="Читайте отзывы покупателей и оценивайте качество магазина на Яндекс.Маркете" style="margin: auto" /></a>
                            <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?>
                            <a href="https://clck.yandex.ru/redir/dtype=stred/pid=47/cid=2508/*https://market.yandex.ru/shop/297720/reviews" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
clck.yandex.ru/redir/dtype=stred/pid=47/cid=2507/*<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
grade.market.yandex.ru/?id=294458&action=image&size=3" border="0" width="200" height="125" alt="Читайте отзывы покупателей и оценивайте качество магазина на Яндекс.Маркете" style="margin: auto" /></a>
                            <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'lalipop') {?>
                            <a href="https://clck.yandex.ru/redir/dtype=stred/pid=47/cid=2508/*https://market.yandex.ru/shop/271264/reviews" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
clck.yandex.ru/redir/dtype=stred/pid=47/cid=2507/*<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
grade.market.yandex.ru/?id=271264&action=image&size=3" border="0" width="200" height="125" alt="Читайте отзывы покупателей и оценивайте качество магазина на Яндекс.Маркете" style="margin: auto" /></a>
                            <?php }?>

                    <?php }?>
                    


                    

                </div>
            <?php }?>

            <div id="content-box"<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['module'] == 'stat') {?> style="float: none; width: 1000px;"<?php }?>>
                <?php if (count($_smarty_tpl->tpl_vars['banners_list']->value) > 0) {?>
                    <div id="slider">
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
' width="739" height="210" alt="<?php echo $_smarty_tpl->tpl_vars['get_banners']->value[$_smarty_tpl->tpl_vars['file_id']->value]->short_desc;?>
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

                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?>
                        <a href="/skidki/" id="main_discount">
                            <img src="/images/fronted/lalipop_discount.jpg" alt="" />
                        </a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'platok' || $_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
                        <div id="icon-main-top">
                            <a href="/dostavka/"><img src="/images/fronted/dostpo.png" /></a>
                            <a href="/kontaktu/"><img src="/images/fronted/samovyvoz1.png" /></a>
                            <a href="/dostavka/"><img src="/images/fronted/oplata.png" /></a>
                            <a href="/garantii/"><img src="/images/fronted/garanriya.png" /></a>
                            <a href="/primerka/"><img src="/images/fronted/vozm-pry.png" /></a>
                        </div>
                    <?php }?>
                <?php }?>

                


                <?php if ($_smarty_tpl->tpl_vars['is_main']->value != 1) {?>
                    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'lalipop' || $_smarty_tpl->tpl_vars['shop']->value == 'sumka' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
                    <div class="product-param-small">
                        <div class="head-h1"><div class="line">&nbsp;</div><a href="/rasprodaja/"><span>Распродажа!! : ))</span></a></div>
                        <?php echo $_smarty_tpl->tpl_vars['get_product_param_1_top']->value;?>

                    </div>
                <?php }?>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?>
                <div class="clear">&nbsp;</div>

                
                

                <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?>
                    <div class="head-h1"<?php if ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?> style="margin-top: 0;"<?php }?>><div class="line">&nbsp;</div><a href="/specialnue-predlojeniya/">Специальные предложения</a></div>
                    <?php echo $_smarty_tpl->tpl_vars['get_product_param_1']->value;?>

                    <div><a href="/specialnue-predlojeniya/">Все предложения</a></div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['is_main']->value == 1) {?>


                    <div class="head-h1"><div class="line">&nbsp;</div><?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
odezhda/">Каталог одежды</a><?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'sumka') {?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
kozhgalantereya/">Каталог кожгалантереи</a><?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
platki-sharfy/">Каталог платков</a><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
bizhuteriya/">Каталог бижутерии</a><?php }?></div>
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
                                <?php if ($_smarty_tpl->tpl_vars['icategory']->value->is_param_1 == 1) {?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['icategory']->value->category_pseudo_dir;?>
/" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
"><span><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</span>
                                        <img src="/images/icons/<?php if ($_smarty_tpl->tpl_vars['icategory']->value->icon) {
echo $_smarty_tpl->tpl_vars['icategory']->value->icon;
} else { ?>no-image.png<?php }?>" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
" />
                                    </a>
                                <?php }?>
                                <?php
$_from = $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['icategory_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["icategory_child"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["icategory_child"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory_child"]->value) {
$_smarty_tpl->tpl_vars["icategory_child"]->_loop = true;
$foreach_icategory_child_Sav = $_smarty_tpl->tpl_vars["icategory_child"];
?>

                                    <?php if ($_smarty_tpl->tpl_vars['icategory_child']->value->is_visible == 1 && $_smarty_tpl->tpl_vars['icategory_child']->value->is_param_1 == 1) {?>
                                        <?php $_smarty_tpl->tpl_vars["icategory_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['icategory_child']->value->id, null, 0);?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['icategory_child']->value->category_pseudo_dir;?>
/" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory_child']->value->name);?>
"><span><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory_child']->value->name);?>
</span>
                                            <img src="/images/icons/<?php if ($_smarty_tpl->tpl_vars['icategory_child']->value->icon) {
echo $_smarty_tpl->tpl_vars['icategory_child']->value->icon;
} else { ?>no-image.png<?php }?>" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory_child']->value->name);?>
" />
                                        </a>
                                    <?php }?>
                                <?php
$_smarty_tpl->tpl_vars["icategory_child"] = $foreach_icategory_child_Sav;
}
?>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
                    </div>
                    <br/>
                <?php }?>

                <?php echo $_smarty_tpl->tpl_vars['content']->value;?>




            <?php }?>



            <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'sumka' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
                <div  id="brands_list">
                    <div class="h1">Бренды</div>
                    					
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
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['brand']->value->pseudo_dir;?>
/" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['brand']->value->name);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['brand']->value->icon;?>
" onerror="this.src='<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;?>
no-brand.png'" style="width: 184px;height: 92px;" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['brand']->value->name);?>
" /></a>
                            </li>
                        <?php
$_smarty_tpl->tpl_vars["brand"] = $foreach_brand_Sav;
}
?>
                    </ul>
                </div>
                
            <?php }?>

            <div class="clear">&nbsp;</div>
            <div id="icon-main">
                <a href="/dostavka/"><img src="/images/fronted/__icon-delivery.png" alt="" /></a><a href="/garantii/"><img src="/images/fronted/__icon-garant.png" alt="" /></a><a href="/skidki/"><img src="/images/fronted/__icon-discount.png" alt="" /></a><a href="/dostavka/"><img src="/images/fronted/__icon-samo.png" alt="" /></a>
            </div>

            


             

            


            

            

            


            





            
            

            

            





            <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        <?php } else { ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
            <html xmlns="https://www.w3.org/1999/xhtml">
                <head>
                    <?php echo $_smarty_tpl->getSubTemplate ("head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                </head>
                <body style="background: none white;" id="modal">
                    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?><div id="lady"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</div>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                    <?php }?>
                    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
                    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
                    <?php if ($_smarty_tpl->tpl_vars['is_open_product']->value == 1) {?>
                        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/zoom/cloud-zoom.css" />
                        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/zoom/cloud-zoom.1.0.2.min.js"><?php echo '</script'; ?>
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
                </body>
            </html>
        <?php }?>
    <?php }
}
}
?>