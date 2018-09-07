<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-22 18:11:13
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/catalog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161228837055d4696acbcef9-16727837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c36382452c7a9f86b1a8a73198a21f9648bba1f' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/catalog.tpl',
      1 => 1440256266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161228837055d4696acbcef9-16727837',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4696b0f9e56_57877808',
  'variables' => 
  array (
    'is_mobile' => 0,
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
    'shop' => 0,
    'h1' => 0,
    'catalog' => 0,
    'not_podbor' => 0,
    'user_id' => 0,
    'is_brand' => 0,
    'category' => 0,
    'brand_text_top' => 0,
    'brands_categoryes' => 0,
    'open_category_id' => 0,
    'icategory' => 0,
    'open_category_parent_id' => 0,
    'is_selection_find' => 0,
    'products' => 0,
    'is_show_count_product' => 0,
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
    'category_id' => 0,
    'is_category' => 0,
    'child_categoryes' => 0,
    'category_find' => 0,
    'category_text' => 0,
    'brand_text_bottom' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4696b0f9e56_57877808')) {function content_55d4696b0f9e56_57877808($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {
echo $_smarty_tpl->getSubTemplate ("catalog_mobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);
} else { ?>
    <?php if ($_smarty_tpl->tpl_vars['is_main']->value!=1&&$_GET['not_detailed_catalog']!=1) {?>
        <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value!=1) {?>
            <div class="breadcrumbs-block">
                <ul class="clearfix">
                    <li><a href="/">Главная</a><span>/</span></li>
                        <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_variable('', null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars["bread"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["bread"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bread_page_arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["bread"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bread"]['total'] = $_smarty_tpl->tpl_vars["bread"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bread"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["bread"]->key => $_smarty_tpl->tpl_vars["bread"]->value) {
$_smarty_tpl->tpl_vars["bread"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["bread"]['iteration']++;
?>
                            <?php $_smarty_tpl->tpl_vars["adress"] = new Smarty_variable((($_smarty_tpl->tpl_vars['adress']->value).($_smarty_tpl->tpl_vars['bread']->value->pseudo_dir)).('/'), null, 0);?>
                            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['bread']['total']==$_smarty_tpl->getVariable('smarty')->value['foreach']['bread']['iteration']) {?>
                                <?php if ($_smarty_tpl->tpl_vars['bread_desc_char']->value) {?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['adress']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->name : $tmp);?>
</a> <span>/</span></li> 
                                <li><?php echo stripslashes($_smarty_tpl->tpl_vars['bread_desc_char']->value);?>
</li>
                                <?php } else { ?>
                                <li><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->name : $tmp);?>
 </li>
                                <?php }?>
                            <?php } else { ?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['adress']->value;?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bread']->value->bread_name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['bread']->value->name : $tmp);?>
</a> <span>/</span></li> 
                            <?php }?>
                        <?php } ?>
                        <?php if ($_smarty_tpl->tpl_vars['brand_name']->value&&!count($_smarty_tpl->tpl_vars['bread_page_arr']->value)) {?><li><?php echo $_smarty_tpl->tpl_vars['brand_name']->value;?>
</li><?php }?>

                    <?php  $_smarty_tpl->tpl_vars["bread_catalog"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["bread_catalog"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bread_catalog_root']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["bread_catalog"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["name"]['total'] = $_smarty_tpl->tpl_vars["bread_catalog"]->total;
foreach ($_from as $_smarty_tpl->tpl_vars["bread_catalog"]->key => $_smarty_tpl->tpl_vars["bread_catalog"]->value) {
$_smarty_tpl->tpl_vars["bread_catalog"]->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['bread_catalog']->value['link']&&$_smarty_tpl->getVariable('smarty')->value['foreach']['name']['itaration']!=$_smarty_tpl->getVariable('smarty')->value['foreach']['name']['total']-1) {?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['bread_catalog']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['bread_catalog']->value['name'];?>
</a> <span>/</span></li> 
                            <?php } else { ?>
                            <li><?php echo $_smarty_tpl->tpl_vars['bread_catalog']->value['name'];?>
</li>
                            <?php }?>

                    <?php } ?>
                </ul>
            </div>

            
            <?php if ($_smarty_tpl->tpl_vars['brand_name']->value) {?><h1><?php echo stripslashes($_smarty_tpl->tpl_vars['brand_name']->value);?>
</h1>
            <?php } elseif ($_smarty_tpl->tpl_vars['is_find']->value==1) {?><h1>Поиск товаров - "<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_GET['find']));?>
"</h1>
            <?php } else { ?>
                <h1><?php if (count($_smarty_tpl->tpl_vars['all_brands']->value)) {?>Производители<?php } else { ?>
<?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady') {
echo stripslashes((($tmp = @(($tmp = @stripslashes($_smarty_tpl->tpl_vars['h1']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['catalog']->value->name : $tmp))===null||$tmp==='' ? "Каталог одежды больших размеров" : $tmp));
} elseif ($_smarty_tpl->tpl_vars['shop']->value=='woman') {
echo stripslashes((($tmp = @(($tmp = @stripslashes($_smarty_tpl->tpl_vars['h1']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['catalog']->value->name : $tmp))===null||$tmp==='' ? "Каталог одежды" : $tmp));
} elseif ($_smarty_tpl->tpl_vars['shop']->value=='sumka') {
echo stripslashes((($tmp = @(($tmp = @stripslashes($_smarty_tpl->tpl_vars['h1']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['catalog']->value->name : $tmp))===null||$tmp==='' ? "Каталог кожгалантереи" : $tmp));
} elseif ($_smarty_tpl->tpl_vars['shop']->value=='platok') {
echo stripslashes((($tmp = @(($tmp = @stripslashes($_smarty_tpl->tpl_vars['h1']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['catalog']->value->name : $tmp))===null||$tmp==='' ? "Каталог платков и шарфов" : $tmp));
} else {
echo stripslashes((($tmp = @(($tmp = @stripslashes($_smarty_tpl->tpl_vars['h1']->value))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['catalog']->value->name : $tmp))===null||$tmp==='' ? "Каталог бижутерии" : $tmp));
}
}?></h1>
<?php }?>
<?php if (!$_smarty_tpl->tpl_vars['brand_name']->value) {?>

<?php if ($_smarty_tpl->tpl_vars['not_podbor']->value!=1&&($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman')&&$_smarty_tpl->tpl_vars['is_find']->value!=1) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("podbor_lady.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['not_podbor']->value!=1&&($_smarty_tpl->tpl_vars['shop']->value=='sumka')&&$_smarty_tpl->tpl_vars['is_find']->value!=1) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("podbor_sumka.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['user_id']->value==446&&$_smarty_tpl->tpl_vars['is_brand']->value!=1&&$_smarty_tpl->tpl_vars['is_ajax']->value!=1) {?>
    <h3 style="color: red;">Только для админа:</h3>
    <?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
        <?php echo $_smarty_tpl->getSubTemplate ("podbor_char_lady.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='sumka') {?>
        <?php echo $_smarty_tpl->getSubTemplate ("podbor_char_sumka.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='platok') {?>
        <?php echo $_smarty_tpl->getSubTemplate ("podbor_char_platok.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>

<?php }?>
<div id="left_box">

    <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value!=1) {?>

        <?php if ($_smarty_tpl->tpl_vars['category']->value->text_top) {?>
            <?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value->text_top);?>
<br/>
        <?php }?>
    <?php }?>
    

    <?php echo stripslashes($_smarty_tpl->tpl_vars['brand_text_top']->value);?>


<?php }?>
<?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='sumka') {?>
    <?php if ($_GET['not_detailed_catalog']!=1) {?>
        <?php if ($_smarty_tpl->tpl_vars['is_brand']->value==1) {?>
            <?php if ($_smarty_tpl->tpl_vars['brands_categoryes']->value) {?>
                <ul class="brand-category">
                    <?php  $_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["icategory"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands_categoryes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["icategory"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->key => $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["icategory"]['index']++;
?>
                        
                        <li<?php if ($_smarty_tpl->tpl_vars['open_category_id']->value==$_smarty_tpl->tpl_vars['icategory']->value->id) {?> class="active"<?php }
if ($_smarty_tpl->getVariable('smarty')->value['foreach']['icategory']['index']%3==0) {?> style="clear: both"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
brands/<?php echo $_smarty_tpl->tpl_vars['icategory']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
 от производителя <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->brand_name);?>
</a></li>
                            
                        <?php } ?>
                    <li class="clear">&nbsp;</li>
                </ul>
                <div class="clear">&nbsp;</div>
            <?php }?>
        <?php } else { ?>
            
            
        <?php }?>
    <?php }?>
<?php } else { ?>
    <?php if ($_GET['not_detailed_catalog']!=1&&$_smarty_tpl->tpl_vars['open_category_id']->value!=790&&$_smarty_tpl->tpl_vars['open_category_parent_id']->value!=790&&$_smarty_tpl->tpl_vars['is_find']->value!=1&&$_smarty_tpl->tpl_vars['is_brand']->value!=1) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("podbor_char.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>
<?php }?>









<?php if ($_smarty_tpl->tpl_vars['is_selection_find']->value==1&&count($_smarty_tpl->tpl_vars['products']->value)==0) {?>
    <h2>Товаров не найдено</h2>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['is_show_count_product']->value==1) {?>
    
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['products']->value[0]) {?>

    

    <?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
        <?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate ((($tmp = @$_smarty_tpl->tpl_vars['template_products_catalog']->value)===null||$tmp==='' ? 'getProductLady.tpl' : $tmp), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value!=790&&$_smarty_tpl->tpl_vars['open_category_id']->value!=823) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php echo $_smarty_tpl->getSubTemplate ((($tmp = @$_smarty_tpl->tpl_vars['template_products_catalog']->value)===null||$tmp==='' ? 'getProduct.tpl' : $tmp), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
    <?php }?>
    
    <?php if (count($_smarty_tpl->tpl_vars['product_in_chars']->value)>0) {?><br/><br/>
        <div class="h1">Другие товары cодержащие <?php if ($_smarty_tpl->tpl_vars['product_characteristic_id']->value==5) {?>камень<?php }?> "<?php echo stripslashes($_smarty_tpl->tpl_vars['product_in_char_name']->value);?>
" <?php if ($_smarty_tpl->tpl_vars['product_characteristic_id']->value==2) {?>цвет<?php }?></div>
        <?php echo $_smarty_tpl->getSubTemplate ((($tmp = @$_smarty_tpl->tpl_vars['template_products_catalog']->value)===null||$tmp==='' ? 'getProduct.tpl' : $tmp), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['product_in_chars']->value,'product_images'=>$_smarty_tpl->tpl_vars['product_in_char_images']->value), 0);?>

    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['select_page']->value+1<$_smarty_tpl->tpl_vars['count_products']->value&&$_smarty_tpl->tpl_vars['is_find']->value!=1) {?>
        <div class="page-number">
            <div>Страница <?php echo $_smarty_tpl->tpl_vars['select_page']->value+2;?>
</div>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['is_selection_find']->value==1) {?>
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

        <?php } elseif ($_smarty_tpl->tpl_vars['is_brand']->value==1) {?> 
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
        
        <div id="ajax_loading_indicator_box" style="opacity: 1;position: static;">
            <div id="add_scrool_page_<?php echo $_smarty_tpl->tpl_vars['select_page']->value+1;?>
">&nbsp;</div>
        </div>
    <?php }?>


    <div id="sorting_pages" style="display: none"><?php echo $_smarty_tpl->getSubTemplate ('navigation_pages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('is_scrool'=>1), 0);?>
</div>
    <div class="clear"></div>

    




<?php } elseif ($_smarty_tpl->tpl_vars['category_id']->value!=0||$_smarty_tpl->tpl_vars['is_find']->value==1) {?>

    <?php if ($_smarty_tpl->tpl_vars['is_category']->value!=1) {?>   
            
            <h3>Товаров не найдено</h3>

        <?php }?> 
    <?php } elseif (!(count($_smarty_tpl->tpl_vars['child_categoryes']->value))) {?>
        <h3>Нет товаров</h3>
    <?php }?>


    <?php if ($_smarty_tpl->tpl_vars['is_category']->value==1) {?> 
            <?php if (count($_smarty_tpl->tpl_vars['category_find']->value)==0) {?>
                <h2>Продуктов не найдено</h2>
            <?php } else { ?>    
                <div class="category-group <?php if ($_smarty_tpl->tpl_vars['is_find']->value==1) {?> find-category-list<?php }?>">
                    <?php  $_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["icategory"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category_find']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->key => $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
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
]</a>
                        </div>
                    <?php } ?>
                </div>
            <?php }?>
        <?php }?>


    </div>  
    <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value!=1) {
if ($_GET['not_detailed_catalog']!=1) {?>
            <?php if (count($_smarty_tpl->tpl_vars['child_categoryes']->value)) {?>
                <div class="category-group">
                    <?php  $_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["icategory"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['child_categoryes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["icategory"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->key => $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["icategory"]['index']++;
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
                                <br/><span><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</span>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php }?>
        <?php }?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['is_ajax']->value!=1) {?>
        <?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
            <?php if ($_GET['not_detailed_catalog']!=1) {?>
                <?php if ($_smarty_tpl->tpl_vars['is_brand']->value==1) {?>
                    <?php if ($_smarty_tpl->tpl_vars['brands_categoryes']->value) {?>
                        <ul class="brand-category">
                            <?php  $_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["icategory"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands_categoryes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["icategory"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->key => $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["icategory"]['index']++;
?>
                                
                                <li<?php if ($_smarty_tpl->tpl_vars['open_category_id']->value==$_smarty_tpl->tpl_vars['icategory']->value->id) {?> class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
brands/<?php echo $_smarty_tpl->tpl_vars['icategory']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
 от производителя <?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->brand_name);?>
</a></li>
                                    
                                <?php } ?>
                            <li class="clear">&nbsp;</li>
                        </ul>
                        <div class="clear">&nbsp;</div>
                    <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['is_find']->value!=1&&$_smarty_tpl->tpl_vars['is_brand']->value!=1) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("podbor_char_lady.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>
            <?php }?>
        <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='sumka') {?>
            <?php if ($_smarty_tpl->tpl_vars['is_find']->value!=1&&$_smarty_tpl->tpl_vars['is_brand']->value!=1) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("podbor_char_sumka.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php }?>
        <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value=='platok') {?>
            <?php if ($_smarty_tpl->tpl_vars['is_find']->value!=1&&$_smarty_tpl->tpl_vars['is_brand']->value!=1) {?>
                <?php echo $_smarty_tpl->getSubTemplate ("podbor_char_platok.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php }?>
        <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['open_category_id']->value==0) {
echo stripslashes($_smarty_tpl->tpl_vars['category_text']->value);
}?>
    <?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value->text_bottom);?>

    <?php echo stripslashes($_smarty_tpl->tpl_vars['brand_text_bottom']->value);?>
 
<?php }?>


<?php }?><?php }} ?>
