<?php /* Smarty version 3.1.24, created on 2015-09-15 10:35:19
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProductLady.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:180570423755f7ca37d9b224_81158398%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c4293dc9714ef9bc77a9ca45401e8d50895730c' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProductLady.tpl',
      1 => 1442302482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180570423755f7ca37d9b224_81158398',
  'variables' => 
  array (
    'param_tpl' => 0,
    'products' => 0,
    'shop' => 0,
    'chars_menu' => 0,
    'char_menu' => 0,
    'product' => 0,
    'old_price_discaunt' => 0,
    'product_id' => 0,
    'gallery_url' => 0,
    'key' => 0,
    'product_images' => 0,
    '_shop_url' => 0,
    'size_discount_char_id' => 0,
    'chars_product' => 0,
    'char_size' => 0,
    'char_name' => 0,
    'chars_discount_product' => 0,
    'size_char_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f7ca38075344_51958694',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f7ca38075344_51958694')) {
function content_55f7ca38075344_51958694 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_counter')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '180570423755f7ca37d9b224_81158398';
?>
<div id="indicator_catalog">
    <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['param_id'] == 3) {?>
        <?php if ($_smarty_tpl->tpl_vars['products']->value[0]->created) {?>
            <p>Последнее поступление новинок: <b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['products']->value[0]->created,"%d.%m.%Y");?>
</b></p>
        <?php }?>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['param_id'] == 5 || $_smarty_tpl->tpl_vars['param_tpl']->value['param_id'] == 3 || $_smarty_tpl->tpl_vars['param_tpl']->value['param_id'] == 1) {?>
        <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
            <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['param_id'] == 5) {?>
                <?php $_smarty_tpl->assign("chars_menu",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>62,'sort'=>'1','is_param_5'=>1),$_smarty_tpl));?>

            <?php } else { ?>
                <?php $_smarty_tpl->assign("chars_menu",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>51,'sort'=>'1','is_param_5'=>1),$_smarty_tpl));?>

            <?php }?>
        <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['param_id'] == 5) {?>
                <?php $_smarty_tpl->assign("chars_menu",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>111,'sort'=>'1','is_param_5'=>1),$_smarty_tpl));?>

            <?php } else { ?>
                <?php $_smarty_tpl->assign("chars_menu",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>118,'sort'=>'1','is_param_5'=>1),$_smarty_tpl));?>

            <?php }?>
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['chars_menu']->value)) {?>
            <div class="sale_seize">
                <div>Ваш размер:</div>
                <?php echo smarty_function_counter(array('assign'=>"i",'start'=>0),$_smarty_tpl);?>

                <a href="?"<?php if (!$_GET['sale_size']) {?> class="active"<?php }?>>Все размеры</a>

                <?php
$_from = $_smarty_tpl->tpl_vars['chars_menu']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["char_menu"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["char_menu"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["char_menu"]->value) {
$_smarty_tpl->tpl_vars["char_menu"]->_loop = true;
$foreach_char_menu_Sav = $_smarty_tpl->tpl_vars["char_menu"];
?>
                    <?php echo smarty_function_counter(array('assign'=>"i"),$_smarty_tpl);?>

                    <?php $_smarty_tpl->tpl_vars["char_valur_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['char_menu']->value->id, null, 0);?>

                    <a href="?sale_size=<?php echo $_smarty_tpl->tpl_vars['char_menu']->value->id;?>
"<?php if ($_GET['sale_size'] == $_smarty_tpl->tpl_vars['char_menu']->value->id) {?> class="active"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['char_menu']->value->name);?>
</a>
                <?php
$_smarty_tpl->tpl_vars["char_menu"] = $foreach_char_menu_Sav;
}
?>
            </div>
        <?php }?>

    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
        <?php $_smarty_tpl->tpl_vars["size_char_id"] = new Smarty_Variable("118", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["size_discount_char_id"] = new Smarty_Variable("111", null, 0);?>
    <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
        <?php $_smarty_tpl->tpl_vars["size_char_id"] = new Smarty_Variable("51", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["size_discount_char_id"] = new Smarty_Variable("62", null, 0);?>
    <?php }?>

    <div class="products">
        <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
                <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(($_smarty_tpl->tpl_vars['product']->value->price*100)/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
                <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['old_price_discaunt']->value-100, null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(0, null, 0);?>
            <?php }?>
            <?php $_smarty_tpl->tpl_vars['product_id'] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value->shop_id == '1') {?>
                <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://lalipop.ru/", null, 0);?>
            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id == '2') {?>
                <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://lady.lalipop.ru/", null, 0);?>
            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id == '3') {?>
                <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://platok.lalipop.ru/", null, 0);?>
            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id == '4') {?>
                <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://sumka.lalipop.ru/", null, 0);?>
            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id == '5') {?>
                <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://woman.lalipop.ru/", null, 0);?>
            <?php }?>
            <div class="product">
                <div class="product-wrapp">
                    <div class="product-block" id="catalog_product_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
">
                        <a  href="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][0]->file;?>
" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="quick-lupa" rel="prettyPhoto[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]">Увеличить</a>

                        <?php if ($_smarty_tpl->tpl_vars['old_price_discaunt']->value) {?><div class="size_block">
                                <span><?php echo number_format($_smarty_tpl->tpl_vars['old_price_discaunt']->value);?>
%</span>
                            </div><?php }?>

                            <div class="img-box"><?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1) {?><img src="/images/fronted/sale.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3 == 1) {?><img src="/images/fronted/novinka.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2 == 1) {?><img src="/images/fronted/lucena.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_4 == 1) {?><img src="/images/fronted/lider.png" class="sale" alt=""  /><?php }?><a  href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="product_img" rel="fancy" ><span id="img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][3][0]->file;?>
" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" /><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"  /><?php }?></span></a><a  href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="quick-look" rel="fancy">Быстрый просмотр</a></div>

                            <div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a><div class="notice"><?php echo $_smarty_tpl->tpl_vars['product']->value->brand_name;?>
</div></div>


                            
                            <div class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');
if ($_smarty_tpl->tpl_vars['product']->value->max_price != $_smarty_tpl->tpl_vars['product']->value->price && $_smarty_tpl->tpl_vars['product']->value->max_price > 0) {?> - <?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->max_price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1,'is_max'=>1),$_smarty_tpl);
}?> руб. <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>&nbsp;<span><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,''," ");?>
 р.</span><?php }?></div>
                            
                            <div class="size-block">
                                <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['param_id'] == 5 && $_smarty_tpl->tpl_vars['shop']->value == 'lady') {?> 
                                        <?php $_smarty_tpl->assign("chars_product",$_smarty_tpl->smarty->registered_objects['char_obj'][0]->getProductValuesCharAllTemplate(array('characteristic_id'=>$_smarty_tpl->tpl_vars['size_discount_char_id']->value,'product_id'=>$_smarty_tpl->tpl_vars['product_id']->value,'shop_id'=>$_smarty_tpl->tpl_vars['product']->value->shop_id),$_smarty_tpl));?>

                                        <ul>
                                            <?php
$_from = $_smarty_tpl->tpl_vars['chars_product']->value[$_smarty_tpl->tpl_vars['product_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["char_size"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["char_size"]->_loop = false;
$_smarty_tpl->tpl_vars["char_key"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['__foreach_char_size'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["char_key"]->value => $_smarty_tpl->tpl_vars["char_size"]->value) {
$_smarty_tpl->tpl_vars["char_size"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration']++;
$foreach_char_size_Sav = $_smarty_tpl->tpl_vars["char_size"];
?>
                                                <?php $_smarty_tpl->tpl_vars["char_name"] = new Smarty_Variable($_smarty_tpl->tpl_vars['char_size']->value->name, null, 0);?>
                                                <li><label><input type="radio" <?php if ($_smarty_tpl->tpl_vars['chars_discount_product']->value[$_smarty_tpl->tpl_vars['product_id']->value][$_smarty_tpl->tpl_vars['char_name']->value]) {?> rel='discount'<?php }?> id="size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['char_size']->value->id;?>
" name="size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['char_size']->value->id;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration'] : null) == 1) {?> checked="checked"<?php }?>  onchange="setSizeAdress(this, '<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
', $(this).parent().find('span').html())" /><span><?php echo $_smarty_tpl->tpl_vars['char_size']->value->name;?>
</span></label>
                                                        <?php
$_smarty_tpl->tpl_vars["char_size"] = $foreach_char_size_Sav;
}
?>
                                        </ul>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->assign("chars_product",$_smarty_tpl->smarty->registered_objects['char_obj'][0]->getProductValuesCharAllTemplate(array('characteristic_id'=>$_smarty_tpl->tpl_vars['size_char_id']->value,'product_id'=>$_smarty_tpl->tpl_vars['product_id']->value,'shop_id'=>$_smarty_tpl->tpl_vars['product']->value->shop_id),$_smarty_tpl));?>

                                        <?php $_smarty_tpl->assign("chars_discount_product",$_smarty_tpl->smarty->registered_objects['char_obj'][0]->getProductValuesCharAllTemplate(array('key_type'=>"discount",'characteristic_id'=>$_smarty_tpl->tpl_vars['size_discount_char_id']->value,'product_id'=>$_smarty_tpl->tpl_vars['product_id']->value,'shop_id'=>$_smarty_tpl->tpl_vars['product']->value->shop_id),$_smarty_tpl));?>


                                        <ul>
                                            <?php
$_from = $_smarty_tpl->tpl_vars['chars_product']->value[$_smarty_tpl->tpl_vars['product_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["char_size"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["char_size"]->_loop = false;
$_smarty_tpl->tpl_vars["char_key"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['__foreach_char_size'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["char_key"]->value => $_smarty_tpl->tpl_vars["char_size"]->value) {
$_smarty_tpl->tpl_vars["char_size"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration']++;
$foreach_char_size_Sav = $_smarty_tpl->tpl_vars["char_size"];
?>
                                                <?php $_smarty_tpl->tpl_vars["char_name"] = new Smarty_Variable($_smarty_tpl->tpl_vars['char_size']->value->name, null, 0);?>
                                                <li><label><input type="radio" <?php if ($_smarty_tpl->tpl_vars['chars_discount_product']->value[$_smarty_tpl->tpl_vars['product_id']->value][$_smarty_tpl->tpl_vars['char_name']->value]) {?> rel='discount'<?php }?> id="size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['char_size']->value->id;?>
" name="size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['char_size']->value->id;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration'] : null) == 1) {?> checked="checked"<?php }?>  onchange="setSizeAdress(this, '<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
', $(this).parent().find('span').html())" /><span><?php echo $_smarty_tpl->tpl_vars['char_size']->value->name;?>
</span></label>
                                                        <?php
$_smarty_tpl->tpl_vars["char_size"] = $foreach_char_size_Sav;
}
?>
                                        </ul>
                                        <?php if (count($_smarty_tpl->tpl_vars['chars_discount_product']->value[$_smarty_tpl->tpl_vars['product_id']->value])) {?> 
                                                <?php echo '<script'; ?>
>
                                                    upPriceCatalog('#catalog_product_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
', '<?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');?>
', '<?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,''," ");?>
')
                                                <?php echo '</script'; ?>
>
                                            <?php }?>
                                        <?php }?>
                                    </div>

                                    <button class="buy" onclick="basketAnimated('#img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
', '#catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value->mod_id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, $(this).parent().find('.size-block input:checked').val(), 0, 0, 1);"></button>
                                    <button class="detailed" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/'">Подробнее</button>
                                </div>
                            </div>
                        </div>
                        <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
                        </div> 
                        <div class="clear"></div>
                    </div><?php }
}
?>