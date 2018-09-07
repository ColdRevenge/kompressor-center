<?php /* Smarty version 3.1.24, created on 2015-09-14 20:23:18
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProductListLady.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:176755894555f702866da871_12868257%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4c849e4327452efcbfd726eaaa320e7b780d4e2' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProductListLady.tpl',
      1 => 1442251396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176755894555f702866da871_12868257',
  'variables' => 
  array (
    'shop' => 0,
    'products' => 0,
    'product' => 0,
    'old_price_discaunt' => 0,
    'product_id' => 0,
    'gallery_url' => 0,
    'key' => 0,
    'product_images' => 0,
    '_shop_url' => 0,
    'small_img' => 0,
    'key_img' => 0,
    'product_characteristic' => 0,
    'value_root' => 0,
    'is_out_char' => 0,
    'value' => 0,
    'char_id' => 0,
    'value_1' => 0,
    'is_out_char_value_1' => 0,
    'is_b2b' => 0,
    'size_char_id' => 0,
    'size_discount_char_id' => 0,
    'char_size' => 0,
    'char_name' => 0,
    'chars_discount_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f7028692d635_68438592',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f7028692d635_68438592')) {
function content_55f7028692d635_68438592 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '176755894555f702866da871_12868257';
?>
<div id="indicator_catalog">
    <div class="products-list">
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
            <div class="product" id="catalog_product_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
">
                <?php if ($_smarty_tpl->tpl_vars['old_price_discaunt']->value) {?><div class="size_block">
                        <span><?php echo number_format($_smarty_tpl->tpl_vars['old_price_discaunt']->value);?>
%</span>
                    </div><?php }?>

                    <a  href="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][0]->file;?>
" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="quick-lupa" rel="prettyPhoto[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]">Увеличить</a>
                    <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1 || $_smarty_tpl->tpl_vars['product']->value->is_param_2 || $_smarty_tpl->tpl_vars['product']->value->is_param_3 || $_smarty_tpl->tpl_vars['product']->value->is_param_4) {?><div class="catalog-icon"><?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1) {?><div class="is_param_1">&nbsp;</div><?php }
if ($_smarty_tpl->tpl_vars['product']->value->is_param_2 == 1) {?><div class="is_param_2">&nbsp;</div><?php }
if ($_smarty_tpl->tpl_vars['product']->value->is_param_3 == 1) {?><div class="is_param_3">&nbsp;</div><?php }
if ($_smarty_tpl->tpl_vars['product']->value->is_param_4 == 1) {?><div class="is_param_4">&nbsp;</div><?php }?></div><?php }?>
                    <div class="img-box" id="img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1 == 1) {?><img src="/images/fronted/sale.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3 == 1) {?><img src="/images/fronted/novinka.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2 == 1) {?><img src="/images/fronted/lucena.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_4 == 1) {?><img src="/images/fronted/lider.png" class="sale" alt=""  /><?php }?><span><?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]) {?><a  href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" rel="fancy"><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][3][0]->file;?>
" alt="<?php echo stripslashes((($tmp = @stripslashes($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->name))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value->name : $tmp));?>
" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" /></a><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"  /><?php }?><a  href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="quick-look" rel="fancy">Быстрый просмотр</a></span>

                        <?php if (count($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]) > 1) {?>
                            <div class="product-images-list">
                                <?php
$_from = $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["small_img"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["small_img"]->_loop = false;
$_smarty_tpl->tpl_vars["key_img"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['__foreach_key_item'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["key_img"]->value => $_smarty_tpl->tpl_vars["small_img"]->value) {
$_smarty_tpl->tpl_vars["small_img"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_key_item']->value['iteration']++;
$foreach_small_img_Sav = $_smarty_tpl->tpl_vars["small_img"];
?>
                                    <img src="/images/gallery/<?php echo $_smarty_tpl->tpl_vars['small_img']->value->file;?>
" alt="" onmouseover="CatalogImg.setCatalogImgList(this, '<?php echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][3][$_smarty_tpl->tpl_vars['key_img']->value]->file;?>
');" <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_key_item']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_key_item']->value['iteration'] : null) == 1) {?> class="active"<?php }?> />
                                    <?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][0]->id != $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][$_smarty_tpl->tpl_vars['key_img']->value]->id) {?>
                                        <a  href="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][$_smarty_tpl->tpl_vars['key_img']->value]->file;?>
" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" rel="prettyPhoto[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]">&nbsp;</a>
                                    <?php }?>
                                <?php
$_smarty_tpl->tpl_vars["small_img"] = $foreach_small_img_Sav;
}
?>
                            </div>
                        <?php }?>
                    </div>



                    
                    <div class="desc-block-wrapper">
                        <div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a></div>
                        <div class="desc-block">

                            <div class="article"><?php echo $_smarty_tpl->tpl_vars['product']->value->brand_name;?>
</div>
                            <div class="short_desc"><?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['product']->value->desc_4)))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value->desc : $tmp)));?>
</div>

                            <?php $_smarty_tpl->assign("product_characteristic",$_smarty_tpl->smarty->registered_objects['char_obj'][0]->getProductValuesCharAllTemplate(array('key_type'=>"list",'characteristic_id'=>-1,'product_id'=>$_smarty_tpl->tpl_vars['product_id']->value,'shop_id'=>$_smarty_tpl->tpl_vars['product']->value->shop_id),$_smarty_tpl));?>


                            <?php if (count($_smarty_tpl->tpl_vars['product_characteristic']->value[$_smarty_tpl->tpl_vars['product_id']->value])) {?>
                                <div class="chars-product">
                                    <?php $_smarty_tpl->tpl_vars["is_out_char"] = new Smarty_Variable("0", null, 0);?>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['product_characteristic']->value[$_smarty_tpl->tpl_vars['product_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value_root"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value_root"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value_root"]->value) {
$_smarty_tpl->tpl_vars["value_root"]->_loop = true;
$foreach_value_root_Sav = $_smarty_tpl->tpl_vars["value_root"];
?>
                                        <?php
$_from = $_smarty_tpl->tpl_vars['value_root']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars["value"];
?>
                                            <?php if ($_smarty_tpl->tpl_vars['is_out_char']->value != $_smarty_tpl->tpl_vars['value']->value->characteristic_id && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 58 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 55 && $_smarty_tpl->tpl_vars['value']->value->characteristic_id != 117) {?>
                                                <?php $_smarty_tpl->tpl_vars["char_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value->characteristic_id, null, 0);?>
                                                <div<?php if ($_smarty_tpl->tpl_vars['value']->value->characteristic_id == 62) {?> style="color: red;"<?php }?>><b><?php if ($_smarty_tpl->tpl_vars['value']->value->icon) {?><img src="/images/icons/<?php echo $_smarty_tpl->tpl_vars['value']->value->icon;?>
" alt="" /><?php }
echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value']->value->characteristic_name,"?",''));?>
:</b>
                                                    <div>
                                                        <?php
$_from = $_smarty_tpl->tpl_vars['product_characteristic']->value[$_smarty_tpl->tpl_vars['product_id']->value][$_smarty_tpl->tpl_vars['char_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value_1"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value_1"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value_1"]->value) {
$_smarty_tpl->tpl_vars["value_1"]->_loop = true;
$foreach_value_1_Sav = $_smarty_tpl->tpl_vars["value_1"];
if ($_smarty_tpl->tpl_vars['value']->value->characteristic_id == $_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {
if ($_smarty_tpl->tpl_vars['is_out_char_value_1']->value == $_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {?>,<?php }?>
                                                            <?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value_1']->value->name,"?",''));?>
 <?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value_1']->value->unit,"?",''));
$_smarty_tpl->tpl_vars["is_out_char_value_1"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value_1']->value->characteristic_id, null, 0);
}
$_smarty_tpl->tpl_vars["value_1"] = $foreach_value_1_Sav;
}
?>
                                                        </div>
                                                    </div>

                                                    <?php $_smarty_tpl->tpl_vars['is_out_char'] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value->characteristic_id, null, 0);?>
                                                <?php }?>
                                            <?php
$_smarty_tpl->tpl_vars["value"] = $foreach_value_Sav;
}
?>
                                        <?php
$_smarty_tpl->tpl_vars["value_root"] = $foreach_value_root_Sav;
}
?>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="buy-box-wrapper">
                                <div class="buy-box">
                                    <div class="price-box">

                                        

                                        <div class="price"<?php if ($_smarty_tpl->tpl_vars['old_price_discaunt']->value) {
}?>><?php if ($_smarty_tpl->tpl_vars['is_b2b']->value != 1) {
echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');
} else {
echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['product']->value->max_price != $_smarty_tpl->tpl_vars['product']->value->price && $_smarty_tpl->tpl_vars['product']->value->max_price > 0) {?> - <?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->max_price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1,'is_max'=>1),$_smarty_tpl);
}
}?> <span>р.</span> 
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?><div class="notice">Старая цена: <?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,''," ");?>
 р.</div><?php }?>
                                        </div>
                                    </div>
                                </div>
                                <?php if (count($_smarty_tpl->tpl_vars['product_characteristic']->value[$_smarty_tpl->tpl_vars['product_id']->value][$_smarty_tpl->tpl_vars['size_char_id']->value])) {?>
                                    <?php $_smarty_tpl->assign("chars_discount_product",$_smarty_tpl->smarty->registered_objects['char_obj'][0]->getProductValuesCharAllTemplate(array('key_type'=>"discount",'characteristic_id'=>$_smarty_tpl->tpl_vars['size_discount_char_id']->value,'product_id'=>$_smarty_tpl->tpl_vars['product_id']->value,'shop_id'=>$_smarty_tpl->tpl_vars['product']->value->shop_id),$_smarty_tpl));?>

                                    

                                    <div class="size-block">
                                        Выберите размер:
                                        <ul>
                                            <?php
$_from = $_smarty_tpl->tpl_vars['product_characteristic']->value[$_smarty_tpl->tpl_vars['product_id']->value][$_smarty_tpl->tpl_vars['size_char_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["char_size"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["char_size"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_char_size'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["char_size"]->value) {
$_smarty_tpl->tpl_vars["char_size"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration']++;
$foreach_char_size_Sav = $_smarty_tpl->tpl_vars["char_size"];
?>
                                                <?php $_smarty_tpl->tpl_vars["char_name"] = new Smarty_Variable($_smarty_tpl->tpl_vars['char_size']->value->name, null, 0);?>
                                                <li><label><input type="radio"<?php if ($_smarty_tpl->tpl_vars['chars_discount_product']->value[$_smarty_tpl->tpl_vars['product_id']->value][$_smarty_tpl->tpl_vars['char_name']->value]) {?> rel='discount'<?php }?> name="size_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['char_size']->value->id;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_char_size']->value['iteration'] : null) == 1) {?> checked="checked"<?php }?>  /><span><?php echo $_smarty_tpl->tpl_vars['char_size']->value->name;?>
</span></label></li>
                                                        <?php
$_smarty_tpl->tpl_vars["char_size"] = $foreach_char_size_Sav;
}
?>
                                        </ul>
                                    </div>
                                    <?php if (count($_smarty_tpl->tpl_vars['chars_discount_product']->value[$_smarty_tpl->tpl_vars['product_id']->value])) {?> 
                                            <?php echo '<script'; ?>
>
                                                upPriceCatalog('#catalog_product_<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
', '<?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');?>
', '<?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,''," ");?>
', 1)
                                            <?php echo '</script'; ?>
>
                                        <?php }?>
                                    <?php }?>

                                    <div class="price-buy-box">
                                        <div class="price-block"><button class="buy" onclick="basketAnimated('#img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
', '#catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value->mod_id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, $(this).parent().parent().parent().find('.size-block input:checked').val(), 0, 0, 1);"></button>
                                            <button class="detailed" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/'">&nbsp;</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear">&nbsp;</div>
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