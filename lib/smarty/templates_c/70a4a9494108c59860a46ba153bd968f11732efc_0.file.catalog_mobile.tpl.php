<?php /* Smarty version 3.1.24, created on 2015-09-13 16:03:05
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/catalog_mobile.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:89715448255f574090399a7_76466436%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70a4a9494108c59860a46ba153bd968f11732efc' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/catalog_mobile.tpl',
      1 => 1435848956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89715448255f574090399a7_76466436',
  'variables' => 
  array (
    'is_main' => 0,
    'is_ajax' => 0,
    'bread_page_arr' => 0,
    'adress' => 0,
    'bread' => 0,
    'url' => 0,
    'bread_catalog_root' => 0,
    'bread_catalog' => 0,
    'open_category_id' => 0,
    'full_adress' => 0,
    'shop' => 0,
    'brand_name' => 0,
    'is_find' => 0,
    'all_brands' => 0,
    'h1' => 0,
    'catalog' => 0,
    'child_categoryes' => 0,
    'icategory' => 0,
    'category' => 0,
    'brand_text_top' => 0,
    'is_brand' => 0,
    'brands_categoryes' => 0,
    'is_selection_find' => 0,
    'products' => 0,
    'is_show_count_product' => 0,
    'not_sort' => 0,
    'count_products' => 0,
    'catalog_dir' => 0,
    'pseudo_dir' => 0,
    'param_tpl' => 0,
    'navigation_param' => 0,
    'char_adress' => 0,
    'select_page' => 0,
    'category_id' => 0,
    'is_category' => 0,
    'category_find' => 0,
    'category_text' => 0,
    'brand_text_bottom' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57409258826_95455293',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57409258826_95455293')) {
function content_55f57409258826_95455293 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '89715448255f574090399a7_76466436';
if ($_smarty_tpl->tpl_vars['is_main']->value != 1 && $_GET['not_detailed_catalog'] != 1) {?>
    <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value != 1) {?>

        <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_Variable('', null, 0);?>
        <?php $_smarty_tpl->tpl_vars["full_adress"] = new Smarty_Variable('', null, 0);?>
        <?php
$_from = $_smarty_tpl->tpl_vars['bread_page_arr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["bread"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["bread"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_bread'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["bread"]->value) {
$_smarty_tpl->tpl_vars["bread"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_bread']->value['iteration']++;
$foreach_bread_Sav = $_smarty_tpl->tpl_vars["bread"];
?>
            <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_bread']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_bread']->value['iteration'] : null) == (isset($_smarty_tpl->tpl_vars['__foreach_bread']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_bread']->value['total'] : null)-1) {?>
                <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_Variable((($_smarty_tpl->tpl_vars['adress']->value).($_smarty_tpl->tpl_vars['bread']->value->pseudo_dir)).('/'), null, 0);?>
                <?php $_smarty_tpl->tpl_vars["full_adress"] = new Smarty_Variable(($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['adress']->value), null, 0);?>
            <?php }?>
        <?php
$_smarty_tpl->tpl_vars["bread"] = $foreach_bread_Sav;
}
?>


        <?php
$_from = $_smarty_tpl->tpl_vars['bread_catalog_root']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["bread_catalog"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["bread_catalog"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_name'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["bread_catalog"]->value) {
$_smarty_tpl->tpl_vars["bread_catalog"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_name']->value['iteration']++;
$foreach_bread_catalog_Sav = $_smarty_tpl->tpl_vars["bread_catalog"];
?>
            <?php if ($_smarty_tpl->tpl_vars['bread_catalog']->value['link'] && (isset($_smarty_tpl->tpl_vars['__foreach_name']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_name']->value['iteration'] : null) == (isset($_smarty_tpl->tpl_vars['__foreach_name']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_name']->value['total'] : null)-1) {?>
                <?php $_smarty_tpl->tpl_vars["full_adress"] = new Smarty_Variable(($_smarty_tpl->tpl_vars['url']->value).($_smarty_tpl->tpl_vars['bread_catalog']->value['link']), null, 0);?>
            <?php }?>
        <?php
$_smarty_tpl->tpl_vars["bread_catalog"] = $foreach_bread_catalog_Sav;
}
?>

        <div id="breadcrumbs-block">
            <div id="bread-back"><?php if ($_smarty_tpl->tpl_vars['open_category_id']->value > 0 && $_smarty_tpl->tpl_vars['full_adress']->value == '') {?>
                <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
                    <a href="/odezhda/">Назад</a>
                <?php } else { ?>
                    <a href="/bizhuteriya/">Назад</a>
                <?php }?>
            <?php } else { ?><a href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['full_adress']->value)===null||$tmp==='' ? "/" : $tmp);?>
">Назад</a><?php }?></div>
        <?php if ($_smarty_tpl->tpl_vars['brand_name']->value) {?><h1><?php echo stripslashes($_smarty_tpl->tpl_vars['brand_name']->value);?>
</h1>
        <?php } elseif ($_smarty_tpl->tpl_vars['is_find']->value == 1) {?><h1>Поиск товаров</h1>
        <?php } else { ?>
            <h1><?php if (count($_smarty_tpl->tpl_vars['all_brands']->value)) {?>Производители<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {
echo stripslashes((($tmp = @(($tmp = @stripslashes($_smarty_tpl->tpl_vars['h1']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['catalog']->value->name : $tmp))===null||$tmp==='' ? "Каталог одежды больших размеров" : $tmp));
} elseif ($_smarty_tpl->tpl_vars['shop']->value == 'sumka') {
echo stripslashes((($tmp = @(($tmp = @stripslashes($_smarty_tpl->tpl_vars['h1']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['catalog']->value->name : $tmp))===null||$tmp==='' ? "Каталог кожгалантереи" : $tmp));
} elseif ($_smarty_tpl->tpl_vars['shop']->value == 'platok') {
echo stripslashes((($tmp = @(($tmp = @stripslashes($_smarty_tpl->tpl_vars['h1']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['catalog']->value->name : $tmp))===null||$tmp==='' ? "Каталог платков и шарфов" : $tmp));
} else {
echo stripslashes((($tmp = @(($tmp = @stripslashes($_smarty_tpl->tpl_vars['h1']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['catalog']->value->name : $tmp))===null||$tmp==='' ? "Каталог бижутерии" : $tmp));
}
}?></h1>
<?php }?>
<div class="clear">&nbsp;</div>
</div>




<?php if (!$_smarty_tpl->tpl_vars['brand_name']->value) {?>

    
<?php }?>
<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value != 1) {
if ($_GET['not_detailed_catalog'] != 1) {?>
            <?php if (count($_smarty_tpl->tpl_vars['child_categoryes']->value)) {?>
                <div class="category-group">
                    <?php
$_from = $_smarty_tpl->tpl_vars['child_categoryes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["icategory"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
$foreach_icategory_Sav = $_smarty_tpl->tpl_vars["icategory"];
?>
                        <div class="category-list">
                            <a href="<?php if ($_smarty_tpl->tpl_vars['icategory']->value->link) {
echo $_smarty_tpl->tpl_vars['icategory']->value->link;
} else {
echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['category_obj'][0]->getFullAdressCategoryIdRoutes(array('category_id'=>$_smarty_tpl->tpl_vars['icategory']->value->id),$_smarty_tpl);
}?>">
                                <img src="/images/icons/<?php if ($_smarty_tpl->tpl_vars['icategory']->value->icon) {
echo $_smarty_tpl->tpl_vars['icategory']->value->icon;
} else { ?>no-image.png<?php }?>" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
" />
                                <span><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</span>
                                <div class="clear">&nbsp;</div>
                            </a>
                        </div>
                    <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
                </div>
            <?php }?>
        <?php }?>
    <?php }?>
    <div id="left_box">
        <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value != 1) {?>
            <?php if ($_smarty_tpl->tpl_vars['category']->value->text_top) {?>
                <?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value->text_top);?>
<br/>
            <?php }?>
        <?php }?>
        

        <?php echo stripslashes($_smarty_tpl->tpl_vars['brand_text_top']->value);?>


        <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
                <?php if ($_GET['not_detailed_catalog'] != 1) {?>
                    <?php if ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {?>
                        <?php if ($_smarty_tpl->tpl_vars['brands_categoryes']->value) {?>
                            <ul class="brand-category">
                                <?php
$_from = $_smarty_tpl->tpl_vars['brands_categoryes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["icategory"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
$foreach_icategory_Sav = $_smarty_tpl->tpl_vars["icategory"];
?>
                                    
                                    <li<?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == $_smarty_tpl->tpl_vars['icategory']->value->id) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
brands/<?php echo $_smarty_tpl->tpl_vars['icategory']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
 от производителя <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->brand_name);?>
</a></li>
                                        
                                    <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
                                <li class="clear">&nbsp;</li>
                            </ul>
                            <div class="clear">&nbsp;</div>
                        <?php }?>
                    <?php } else { ?>
                        
                        
                    <?php }?>
                <?php }?>
            <?php } else { ?>
                
            <?php }?>


            <?php if ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1 && count($_smarty_tpl->tpl_vars['products']->value) == 0) {?>
                <h2>Товаров не найдено</h2>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['is_show_count_product']->value == 1) {?>
                
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['products']->value[0]) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("navigation_mobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                

                <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
                    <?php echo $_smarty_tpl->getSubTemplate ('getProductMobileLady.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                <?php } else { ?>
                    <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value != 790 && $_smarty_tpl->tpl_vars['open_category_id']->value != 823) {?>
                        <?php echo $_smarty_tpl->getSubTemplate ('getProductMobile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                    <?php }?>
                <?php }?>


<?php if ($_smarty_tpl->tpl_vars['not_sort']->value == '' && $_smarty_tpl->tpl_vars['not_sort']->value != 1 && $_smarty_tpl->tpl_vars['count_products']->value > 0 && $_GET['not_detailed_catalog'] != 1) {?>
    <div class="navigation">

        <div class="pages">
            <?php if ($_smarty_tpl->tpl_vars['count_products']->value > 1) {?>
                <select onchange="jQuery.scrollTo('#content', 1200);AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
if ($_GET['is_category_brand_id']) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/' + $(this).find('option:selected').val() + '/?<?php } elseif ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?params=<?php echo urldecode(smarty_modifier_replace(serialize($_POST),'"','@@@@'));?>
&<?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/' + $(this).find('option:selected').val() + '/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php } elseif ($_smarty_tpl->tpl_vars['navigation_param']->value) {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/get-product/<?php echo $_smarty_tpl->tpl_vars['navigation_param']->value;?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?<?php }
if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo urldecode($_smarty_tpl->tpl_vars['char_adress']->value);?>
&<?php }?>page=' + $(this).find('option:selected').val() + '<?php if ($_GET['brand_id']) {?>&brand_id=<?php echo $_GET['brand_id'];
}?>', '#indicator_catalog');">
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["page"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['count_products']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['name'] = "page";
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["page"]['total']);
?>
                        <option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['index'];?>
"<?php if ($_smarty_tpl->tpl_vars['select_page']->value == $_smarty_tpl->getVariable('smarty')->value['section']['page']['index']) {?> selected="selected"<?php }?>>Страница <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['page']['iteration'];?>
</option>
                    <?php endfor; endif; ?>
                </select>
            <?php }?>
        </div>


        <div class="clear">&nbsp;</div>
    </div>
<?php }?>


                <div id="sorting_pages" style="display: none"><?php echo $_smarty_tpl->getSubTemplate ('navigation_pages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_scrool'=>1), 0);
?>
</div>
                <div class="clear"></div>

                




            <?php } elseif ($_smarty_tpl->tpl_vars['category_id']->value != 0 || $_smarty_tpl->tpl_vars['is_find']->value == 1) {?>

                <?php if ($_smarty_tpl->tpl_vars['is_category']->value != 1) {?>   
                        
                        <h3>Товаров не найдено</h3>

                    <?php }?> 
                <?php } elseif (!(count($_smarty_tpl->tpl_vars['child_categoryes']->value))) {?>
                    <h3>Нет товаров</h3>
                <?php }?>


                <?php if ($_smarty_tpl->tpl_vars['is_category']->value == 1) {?> 
                        <?php if (count($_smarty_tpl->tpl_vars['category_find']->value) == 0) {?>
                            <h2>Продуктов не найдено</h2>
                        <?php } else { ?>    
                            <div class="category-group">
                                <?php
$_from = $_smarty_tpl->tpl_vars['category_find']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["icategory"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
$foreach_icategory_Sav = $_smarty_tpl->tpl_vars["icategory"];
?>
                                    <div class="category-list">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find/category/<?php echo $_smarty_tpl->tpl_vars['icategory']->value->category_pseudo_dir;?>
/?find=<?php echo $_POST['find'];?>
">
                                            <span>
                                                <img src="/images/icons/<?php if ($_smarty_tpl->tpl_vars['icategory']->value->category_icon) {
echo $_smarty_tpl->tpl_vars['icategory']->value->category_icon;
} else { ?>no-image.png<?php }?>" alt="" />
                                            </span>
                                            <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->category_name);?>
 [<?php echo $_smarty_tpl->tpl_vars['icategory']->value->count;?>
]</a>
                                    </div>
                                <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
                            </div>
                        <?php }?>
                    <?php }?>


                </div>  

                <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value != 1) {?>
                    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
                        <?php if ($_GET['not_detailed_catalog'] != 1) {?>
                            <?php if ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {?>
                                <?php if ($_smarty_tpl->tpl_vars['brands_categoryes']->value) {?>
                                    <ul class="brand-category">
                                        <?php
$_from = $_smarty_tpl->tpl_vars['brands_categoryes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["icategory"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
$foreach_icategory_Sav = $_smarty_tpl->tpl_vars["icategory"];
?>
                                            
                                            <li<?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == $_smarty_tpl->tpl_vars['icategory']->value->id) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
brands/<?php echo $_smarty_tpl->tpl_vars['icategory']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
 от производителя <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->brand_name);?>
</a></li>
                                                
                                            <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
                                        <li class="clear">&nbsp;</li>
                                    </ul>
                                    <div class="clear">&nbsp;</div>
                                <?php }?>
                            <?php } else { ?>
                                
                            <?php }?>
                        <?php }?>
                    <?php }?>


                <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 0) {
echo stripslashes($_smarty_tpl->tpl_vars['category_text']->value);
}?>
                <?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value->text_bottom);?>

                <?php echo stripslashes($_smarty_tpl->tpl_vars['brand_text_bottom']->value);?>
 
            <?php }?>
            
            <?php }
}
?>