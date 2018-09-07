<?php /* Smarty version 3.1.24, created on 2018-07-02 09:12:17
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/catalog.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18188499745b39c241df91d9_71765723%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3f50445f931552d787c1125a2795cd448e74b3b' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/catalog.tpl',
      1 => 1530511936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18188499745b39c241df91d9_71765723',
  'variables' => 
  array (
    'is_main' => 0,
    'is_ajax' => 0,
    'bread_page_arr' => 0,
    'adress' => 0,
    'bread' => 0,
    'bread_desc_char' => 0,
    'url' => 0,
    'brand_name' => 0,
    'bread_catalog_root' => 0,
    'bread_catalog' => 0,
    'is_find' => 0,
    'all_brands' => 0,
    'h1' => 0,
    'catalog' => 0,
    'allCategories' => 0,
    'open_category_parent_id' => 0,
    'icategory' => 0,
    'open_category_id' => 0,
    'isubcat' => 0,
    'category' => 0,
    'brand_text_top' => 0,
    'is_brand' => 0,
    'brands_categoryes' => 0,
    'content_text' => 0,
    'category_id' => 0,
    'categoryes' => 0,
    'is_selection_find' => 0,
    'products' => 0,
    'template_products_catalog' => 0,
    'product_in_chars' => 0,
    'product_characteristic_id' => 0,
    'product_in_char_name' => 0,
    'product_in_char_images' => 0,
    'select_page' => 0,
    'count_products' => 0,
    'catalog_dir' => 0,
    'pseudo_dir' => 0,
    'param_tpl' => 0,
    'char_adress' => 0,
    'is_category' => 0,
    'child_categoryes' => 0,
    'category_text' => 0,
    'brand_text_bottom' => 0,
    'category_find' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39c24214e2e5_56004238',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39c24214e2e5_56004238')) {
function content_5b39c24214e2e5_56004238 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18188499745b39c241df91d9_71765723';
if ($_smarty_tpl->tpl_vars['is_main']->value != 1 && $_GET['not_detailed_catalog'] != 1) {?>
    <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value != 1) {?>
        <div class="breadcrumbs">
            <div class="container">
                <ul class="breadcrumbs__cont">
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/">Главная</a></li>
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/catalog">Каталог товаров</a></li>
                    <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_Variable('', null, 0);?>
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
                        <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_Variable((($_smarty_tpl->tpl_vars['adress']->value).($_smarty_tpl->tpl_vars['bread']->value->pseudo_dir)).('/'), null, 0);?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_bread']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_bread']->value['total'] : null) == (isset($_smarty_tpl->tpl_vars['__foreach_bread']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_bread']->value['iteration'] : null)) {?>
                            <?php if ($_smarty_tpl->tpl_vars['bread_desc_char']->value) {?>
                                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['adress']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->name : $tmp);?>
</a></li> 
                                <li class="breadcrumbs__item"><?php echo stripslashes($_smarty_tpl->tpl_vars['bread_desc_char']->value);?>
</li>
                            <?php } else { ?>
                                <li class="breadcrumbs__item"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->name : $tmp);?>
 </li>
                            <?php }?>
                        <?php } else { ?>
                            <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['adress']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->name : $tmp);?>
</a></li> 
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars["bread"] = $foreach_bread_Sav;
}
?>
                    <?php if ($_smarty_tpl->tpl_vars['brand_name']->value && !count($_smarty_tpl->tpl_vars['bread_page_arr']->value)) {?>
                        <li class="breadcrumbs__item"><?php echo $_smarty_tpl->tpl_vars['brand_name']->value;?>
</li>
                    <?php }?>

                    <?php
$_from = $_smarty_tpl->tpl_vars['bread_catalog_root']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["bread_catalog"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["bread_catalog"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_name'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from)));
foreach ($_from as $_smarty_tpl->tpl_vars["bread_catalog"]->value) {
$_smarty_tpl->tpl_vars["bread_catalog"]->_loop = true;
$foreach_bread_catalog_Sav = $_smarty_tpl->tpl_vars["bread_catalog"];
?>
                        <?php if ($_smarty_tpl->tpl_vars['bread_catalog']->value['link'] && (isset($_smarty_tpl->tpl_vars['__foreach_name']->value['itaration']) ? $_smarty_tpl->tpl_vars['__foreach_name']->value['itaration'] : null) != (isset($_smarty_tpl->tpl_vars['__foreach_name']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_name']->value['total'] : null)-1) {?>
                            <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['bread_catalog']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['bread_catalog']->value['name'];?>
</a></li> 
                        <?php } else { ?>
                            <li class="breadcrumbs__item"><?php echo $_smarty_tpl->tpl_vars['bread_catalog']->value['name'];?>
</li>
                        <?php }?>

                    <?php
$_smarty_tpl->tpl_vars["bread_catalog"] = $foreach_bread_catalog_Sav;
}
?>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php if ($_smarty_tpl->tpl_vars['brand_name']->value) {?>
                <h1 class="headline"><?php echo stripslashes($_smarty_tpl->tpl_vars['brand_name']->value);?>
</h1>
            <?php } elseif ($_smarty_tpl->tpl_vars['is_find']->value == 1) {?>
                <h1 class="headline">Поиск товаров - "<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_GET['find']));?>
"</h1>
            <?php } else { ?>
                <h1 class="headline">
                    <?php if (count($_smarty_tpl->tpl_vars['all_brands']->value)) {?>
                        Производители
                    <?php } else { ?>
                        <?php echo stripslashes((($tmp = @(($tmp = @stripslashes($_smarty_tpl->tpl_vars['h1']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['catalog']->value->name : $tmp))===null||$tmp==='' ? "Каталог товаров" : $tmp));?>

                    <?php }?>
                </h1>
            <?php }?>
            <div class="c-catalog__content l-layout">
                <aside class="l-layout__sidebar c-menu">
                    <?php
$_from = $_smarty_tpl->tpl_vars['allCategories']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["icategory"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_icategory'] = new Smarty_Variable(array('index' => -1));
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_icategory']->value['index']++;
$foreach_icategory_Sav = $_smarty_tpl->tpl_vars["icategory"];
?>
                        <div class="c-menu__item">
                            <div class="c-menu-item <?php if (($_smarty_tpl->tpl_vars['open_category_parent_id']->value == $_smarty_tpl->tpl_vars['icategory']->value->id || $_smarty_tpl->tpl_vars['open_category_id']->value == $_smarty_tpl->tpl_vars['icategory']->value->id)) {?>-active<?php }?>">
                                <div class="c-menu-item__head">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['category_obj'][0]->getFullAdressCategoryIdRoutes(array('category_id'=>$_smarty_tpl->tpl_vars['icategory']->value->id),$_smarty_tpl);?>
" class="c-menu-item__head-link">
                                        <span><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</span>
                                    </a>
                                    <?php if ($_smarty_tpl->tpl_vars['allCategories']->value[$_smarty_tpl->tpl_vars['icategory']->value->id]) {?>
                                        <span class="c-menu-item__head-arrow js-open-categories-submenu sprite -arrow-down"></span>
                                    <?php }?>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['allCategories']->value[$_smarty_tpl->tpl_vars['icategory']->value->id]) {?>
                                    <ul class="c-menu-item__submenu c-submenu">
                                        <?php
$_from = $_smarty_tpl->tpl_vars['allCategories']->value[$_smarty_tpl->tpl_vars['icategory']->value->id];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["isubcat"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["isubcat"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["isubcat"]->value) {
$_smarty_tpl->tpl_vars["isubcat"]->_loop = true;
$foreach_isubcat_Sav = $_smarty_tpl->tpl_vars["isubcat"];
?>
                                            <li class="c-submenu__item">
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['category_obj'][0]->getFullAdressCategoryIdRoutes(array('category_id'=>$_smarty_tpl->tpl_vars['isubcat']->value->id),$_smarty_tpl);?>
" 
                                                   class="c-submenu__link 
                                                          <?php if (($_smarty_tpl->tpl_vars['open_category_parent_id']->value == $_smarty_tpl->tpl_vars['isubcat']->value->id || $_smarty_tpl->tpl_vars['open_category_id']->value == $_smarty_tpl->tpl_vars['isubcat']->value->id)) {?>_active<?php }?>">
                                                    <?php echo stripslashes($_smarty_tpl->tpl_vars['isubcat']->value->name);?>

                                                </a>
                                            </li>
                                        <?php
$_smarty_tpl->tpl_vars["isubcat"] = $foreach_isubcat_Sav;
}
?>
                                    </ul>
                                <?php }?>
                            </div>
                        </div>
                    <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
                </aside>

                <div class="l-layout__content">

                    <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value != 1) {?>
                        <?php if ($_smarty_tpl->tpl_vars['category']->value->text_top) {?>
                            <?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value->text_top);?>
<br/>
                        <?php }?>
                    <?php }?>

                    
                    <?php echo stripslashes($_smarty_tpl->tpl_vars['brand_text_top']->value);?>


                    <?php }?>
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
$_smarty_tpl->tpl_vars['__foreach_icategory'] = new Smarty_Variable(array('index' => -1));
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_icategory']->value['index']++;
$foreach_icategory_Sav = $_smarty_tpl->tpl_vars["icategory"];
?>
                                        
                                        <li<?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == $_smarty_tpl->tpl_vars['icategory']->value->id) {?> class="active"<?php }
if ((isset($_smarty_tpl->tpl_vars['__foreach_icategory']->value['index']) ? $_smarty_tpl->tpl_vars['__foreach_icategory']->value['index'] : null)%3 == 0) {?> style="clear: both"<?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
brands/<?php echo $_smarty_tpl->tpl_vars['icategory']->value->pseudo_dir;?>
/">
                                                <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
 от производителя <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->brand_name);?>

                                            </a>
                                        </li>
                                            
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

                    <?php if ($_smarty_tpl->tpl_vars['content_text']->value) {?>
                        <div style="margin-bottom: 10px;"><?php echo $_smarty_tpl->tpl_vars['content_text']->value;?>
</div>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['categoryes']->value[$_smarty_tpl->tpl_vars['category_id']->value]) {?>
                        <?php echo $_smarty_tpl->getSubTemplate ('getCategoriesList.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('categoriesList'=>$_smarty_tpl->tpl_vars['categoryes']->value[$_smarty_tpl->tpl_vars['category_id']->value],'modificator'=>'catalog'), 0);
?>

                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1 && count($_smarty_tpl->tpl_vars['products']->value) == 0) {?>
                        <h2>Товаров не найдено</h2>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['products']->value[0] && !$_smarty_tpl->tpl_vars['categoryes']->value[$_smarty_tpl->tpl_vars['category_id']->value]) {?>

                        <?php echo $_smarty_tpl->getSubTemplate ((($tmp = @$_smarty_tpl->tpl_vars['template_products_catalog']->value)===null||$tmp==='' ? 'getProduct.tpl' : $tmp), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


                        
                        <?php if (count($_smarty_tpl->tpl_vars['product_in_chars']->value) > 0) {?><br/><br/>
                            <div class="h1">
                                Другие товары cодержащие 
                                <?php if ($_smarty_tpl->tpl_vars['product_characteristic_id']->value == 5) {?>
                                    камень
                                <?php }?> 
                                "<?php echo stripslashes($_smarty_tpl->tpl_vars['product_in_char_name']->value);?>
" 
                                <?php if ($_smarty_tpl->tpl_vars['product_characteristic_id']->value == 2) {?>цвет<?php }?>
                            </div>
                            <?php echo $_smarty_tpl->getSubTemplate ((($tmp = @$_smarty_tpl->tpl_vars['template_products_catalog']->value)===null||$tmp==='' ? 'getProduct.tpl' : $tmp), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('products'=>$_smarty_tpl->tpl_vars['product_in_chars']->value,'product_images'=>$_smarty_tpl->tpl_vars['product_in_char_images']->value), 0);
?>

                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['select_page']->value+1 < $_smarty_tpl->tpl_vars['count_products']->value && $_smarty_tpl->tpl_vars['is_find']->value != 1) {?>
                            <div class="page-number">
                                <div>Страница <?php echo $_smarty_tpl->tpl_vars['select_page']->value+2;?>
</div>
                            </div>

                            <?php if ($_smarty_tpl->tpl_vars['is_selection_find']->value == 1) {?>
                                <button class="next-product"  onclick="$(this).prev('.page-number').css({'display': 'block'});
                                    $(this).remove();
                                    AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/find-selection/?not_detailed_catalog=1&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
&params=<?php echo urlencode(serialize($_POST));?>
', '#add_scrool_page_<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
', 1, '');"></button>

                            <?php } elseif ($_GET['is_category_brand_id']) {?> 
                                <button class="next-product"  onclick="$(this).prev('.page-number').css({'display': 'block'});
                                    $(this).remove();
                                    AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/category/<?php echo $_smarty_tpl->tpl_vars['pseudo_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?not_detailed_catalog=1&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
', '#add_scrool_page_<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
', 1, '');"></button>

                            <?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value == 1) {?> 
                                <button class="next-product"  onclick="$(this).prev('.page-number').css({'display': 'block'});
                                    $(this).remove();
                                    AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/brand/<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['brand'];?>
/<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?not_detailed_catalog=1&page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
', '#add_scrool_page_<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
', 1, '');"></button>

                            <?php } else { ?> 
                                <button class="next-product"  onclick="$(this).prev('.page-number').css({'display': 'block'});
                                    $(this).remove();
                                    AjaxRequestInd('left_box', '<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['catalog_dir']->value;?>
/id/<?php echo $_smarty_tpl->tpl_vars['catalog']->value->id;?>
/?not_detailed_catalog=1&<?php if ($_smarty_tpl->tpl_vars['char_adress']->value) {?>char_adress=<?php echo $_smarty_tpl->tpl_vars['char_adress']->value;?>
&<?php }?>page=<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
', '#add_scrool_page_<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
', 1, '', '', 2);"></button>
                            <?php }?>

                            
                        <?php }?>


                        <div id="sorting_pages" style="display: none"><?php echo $_smarty_tpl->getSubTemplate ('navigation_pages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_scrool'=>1), 0);
?>
</div>
                        <div class="clear"></div>

                        

                    <?php } elseif ((!$_smarty_tpl->tpl_vars['products']->value[0]) && ($_smarty_tpl->tpl_vars['category_id']->value != 0 || $_smarty_tpl->tpl_vars['is_find']->value == 1)) {?>

                        <?php if ($_smarty_tpl->tpl_vars['is_category']->value != 1) {?> 
                              
                            <h3>Товаров не найдено</h3>

                        <?php }?> 

                    <?php } elseif ((!$_smarty_tpl->tpl_vars['products']->value[0]) && !(count($_smarty_tpl->tpl_vars['child_categoryes']->value)) && $_smarty_tpl->tpl_vars['open_category_id']->value != 0) {?>
                        <h3>Нет товаров</h3>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value != 1) {?>
                        <div>
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
$_smarty_tpl->tpl_vars['__foreach_icategory'] = new Smarty_Variable(array('index' => -1));
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_icategory']->value['index']++;
$foreach_icategory_Sav = $_smarty_tpl->tpl_vars["icategory"];
?>
                                            <li <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == $_smarty_tpl->tpl_vars['icategory']->value->id) {?>class="active"<?php }?>>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
brands/<?php echo $_smarty_tpl->tpl_vars['icategory']->value->pseudo_dir;?>
/">
                                                    <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
 от производителя <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->brand_name);?>

                                                </a>
                                            </li>
                                        <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
                                        <li class="clear">&nbsp;</li>
                                    </ul>
                                    <div class="clear">&nbsp;</div>
                                <?php }?>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value == 0) {?>
                                <?php echo stripslashes($_smarty_tpl->tpl_vars['category_text']->value);?>

                            <?php }?>

                            <?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value->text_bottom);?>


                            <?php echo stripslashes($_smarty_tpl->tpl_vars['brand_text_bottom']->value);?>
 
                        </div>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['is_category']->value == 1) {?> 
                        

                        <?php if (count($_smarty_tpl->tpl_vars['category_find']->value) == 0) {?>
                            <h2>Продуктов не найдено</h2>
                        <?php } else { ?>    
                            <div class="category-group <?php if ($_smarty_tpl->tpl_vars['is_find']->value == 1) {?> find-category-list<?php }?>">
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
/?find=<?php echo $_GET['find'];?>
&shop_type=<?php echo $_GET['shop_type'];?>
">
                                            <span>
                                                <img src="/images/icons/<?php if ($_smarty_tpl->tpl_vars['icategory']->value->category_icon) {
echo $_smarty_tpl->tpl_vars['icategory']->value->category_icon;
} else { ?>no-image.png<?php }?>" alt="" />
                                            </span>
                                            <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->category_name);?>
 [<?php echo $_smarty_tpl->tpl_vars['icategory']->value->count;?>
]
                                        </a>
                                    </div>
                                <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
                            </div>
                        <?php }?>
                    <?php }?>
                </div><!-- /.l-layout__content -->
            </div><!-- /.l-layout -->
        </div><!-- /.container -->
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value != 1) {
if ($_GET['not_detailed_catalog'] != 1) {?>

        <div class="<?php if ($_smarty_tpl->tpl_vars['is_ajax']->value != 1) {?>container<?php }?>">
            <?php if (count($_smarty_tpl->tpl_vars['child_categoryes']->value)) {?>
                <div class="category-group">
                    <?php
$_from = $_smarty_tpl->tpl_vars['child_categoryes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["icategory"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_icategory'] = new Smarty_Variable(array('index' => -1));
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_icategory']->value['index']++;
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
} else { ?>no-image.png<?php }?>" alt="" />
                                <br/>
                                <span><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</span>
                            </a>
                        </div>
                    <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>
                </div>
            <?php }?>
        </div>
    <?php }?>
<?php }?>

<?php }
}
?>