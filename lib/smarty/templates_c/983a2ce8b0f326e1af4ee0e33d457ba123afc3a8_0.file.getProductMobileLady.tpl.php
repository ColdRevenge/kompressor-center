<?php /* Smarty version 3.1.24, created on 2015-09-14 20:45:34
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProductMobileLady.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:118147371655f707be59d2f1_22041403%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '983a2ce8b0f326e1af4ee0e33d457ba123afc3a8' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProductMobileLady.tpl',
      1 => 1442252733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118147371655f707be59d2f1_22041403',
  'variables' => 
  array (
    'shop' => 0,
    'products' => 0,
    'product' => 0,
    'old_price_discaunt' => 0,
    'product_id' => 0,
    'is_mobile' => 0,
    'shop_url' => 0,
    'key' => 0,
    'product_images' => 0,
    'gallery_url' => 0,
    'param_tpl' => 0,
    'size_discount_char_id' => 0,
    'chars_product' => 0,
    'char_size' => 0,
    'char_name' => 0,
    'chars_discount_product' => 0,
    'size_char_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f707be723112_18821090',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f707be723112_18821090')) {
function content_55f707be723112_18821090 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '118147371655f707be59d2f1_22041403';
?>
<div class="products">
    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
        <?php $_smarty_tpl->tpl_vars["size_char_id"] = new Smarty_Variable("118", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["size_discount_char_id"] = new Smarty_Variable("111", null, 0);?>
    <?php } elseif ($_smarty_tpl->tpl_vars['shop']->value == 'lady') {?>
        <?php $_smarty_tpl->tpl_vars["size_char_id"] = new Smarty_Variable("51", null, 0);?>
        <?php $_smarty_tpl->tpl_vars["size_discount_char_id"] = new Smarty_Variable("62", null, 0);?>
    <?php }?>
    <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['__foreach_product_item'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_product_item']->value['iteration']++;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
            <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(($_smarty_tpl->tpl_vars['product']->value->price*100)/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
            <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['old_price_discaunt']->value-100, null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_Variable(0, null, 0);?>
        <?php }?>
        <?php $_smarty_tpl->tpl_vars['product_id'] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
        <div class="product" id="catalog_product_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
">

       

                <div class="img-box"><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value != 1) {
if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1) {?><img src="/images/fronted/sale.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3 == 1) {?><img src="/images/fronted/novinka.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2 == 1) {?><img src="/images/fronted/lucena.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_4 == 1) {?><img src="/images/fronted/lider.png" class="sale" alt=""  /><?php }
}?><a  href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/<?php if ($_smarty_tpl->tpl_vars['is_mobile']->value != 1) {?>?is_modal=1<?php }?>" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="product_img" <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value != 1) {?>rel="fancy"<?php }?>   ><span id="img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][2][0]->file;
} else {
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][3][0]->file;
}?>" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" /><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"  /><?php }?></span></a></div>

                <div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a></div>

                
                
                <div class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');
if ($_smarty_tpl->tpl_vars['product']->value->max_price != $_smarty_tpl->tpl_vars['product']->value->price && $_smarty_tpl->tpl_vars['product']->value->max_price > 0) {?> - <?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->max_price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1,'is_max'=>1),$_smarty_tpl);
}?> руб. <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>&nbsp;<span><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,''," ");?>
 р.</span><?php }?></div>
                <div class="basket_added" id="basket_added_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">Товар успешно добавлен в корзину!</div>

                <div class="size-block">
                    Выберите размер:
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
" <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration'] : null) == 1) {?> checked="checked"<?php }?>  /><span><?php echo $_smarty_tpl->tpl_vars['char_size']->value->name;?>
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
" <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration'] : null) == 1) {?> checked="checked"<?php }?>  /><span><?php echo $_smarty_tpl->tpl_vars['char_size']->value->name;?>
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
                        <div class="clear">&nbsp;</div>

                        <button class="buy"  onclick="basketModal('#img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
', '#catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value->mod_id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, $(this).parent().find('.size-block input:checked').val(), 0, 0, 1);">Купить</button>
                        <button class="detailed" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/'">Подробнее</button>

                        <div class="clear">&nbsp;</div>

                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value != 1) {?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_product_item']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_product_item']->value['iteration'] : null)%5 == 0) {?><div class="clear">&nbsp;</div><?php }?>
                    <?php }?>
                    <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
                        <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value != 1) {?>
                            <div class="clear"></div>
                        <?php }?>
                    </div> <?php }
}
?>