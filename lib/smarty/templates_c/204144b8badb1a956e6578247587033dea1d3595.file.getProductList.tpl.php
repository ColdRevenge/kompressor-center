<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-04 12:29:42
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProductList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81120297655d47d8cc53964-30183430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '204144b8badb1a956e6578247587033dea1d3595' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/getProductList.tpl',
      1 => 1441288879,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81120297655d47d8cc53964-30183430',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d47d8ced3a80_17831855',
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'old_price_discaunt' => 0,
    'gallery_url' => 0,
    'key' => 0,
    'product_images' => 0,
    'fronted_images_url' => 0,
    '_shop_url' => 0,
    'small_img' => 0,
    'key_img' => 0,
    'product_id' => 0,
    'product_characteristic' => 0,
    'shop' => 0,
    'value_root' => 0,
    'is_out_char' => 0,
    'value' => 0,
    'char_id' => 0,
    'value_1' => 0,
    'is_out_char_value_1' => 0,
    'is_b2b' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d47d8ced3a80_17831855')) {function content_55d47d8ced3a80_17831855($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><div id="indicator_catalog">
    <div class="products-list">
        <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["product"]->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
                <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value->price*100)/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
                <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable($_smarty_tpl->tpl_vars['old_price_discaunt']->value-100, null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable(0, null, 0);?>
            <?php }?>
            <?php $_smarty_tpl->tpl_vars['product_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value->shop_id=='1') {?>
                <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://lalipop.ru/", null, 0);?>
            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id=='2') {?>
                <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://lady.lalipop.ru/", null, 0);?>
            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id=='3') {?>
                <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://platok.lalipop.ru/", null, 0);?>
            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id=='4') {?>
                <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://sumka.lalipop.ru/", null, 0);?>
            <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id=='5') {?>
                <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://woman.lalipop.ru/", null, 0);?>
            <?php }?>
            <div class="product">
                <?php if ($_smarty_tpl->tpl_vars['old_price_discaunt']->value) {?><div class="size_block">
                        <span><?php echo number_format($_smarty_tpl->tpl_vars['old_price_discaunt']->value);?>
%</span>
                    </div><?php }?>

                    <a  href="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][0]->file;?>
" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="quick-lupa" rel="prettyPhoto[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]">Увеличить</a>
                    <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1==1||$_smarty_tpl->tpl_vars['product']->value->is_param_2||$_smarty_tpl->tpl_vars['product']->value->is_param_3||$_smarty_tpl->tpl_vars['product']->value->is_param_4) {?><div class="catalog-icon"><?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1==1) {?><div class="is_param_1">&nbsp;</div><?php }
if ($_smarty_tpl->tpl_vars['product']->value->is_param_2==1) {?><div class="is_param_2">&nbsp;</div><?php }
if ($_smarty_tpl->tpl_vars['product']->value->is_param_3==1) {?><div class="is_param_3">&nbsp;</div><?php }
if ($_smarty_tpl->tpl_vars['product']->value->is_param_4==1) {?><div class="is_param_4">&nbsp;</div><?php }?></div><?php }?>
                    <div class="img-box" id="img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['product']->value->is_param_1==1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
sale.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3==1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
novinka.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2==1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
lucena.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_4==1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['fronted_images_url']->value;?>
lider.png" class="sale" alt=""  /><?php }?><span><?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][3][0]->file;?>
" alt="<?php echo stripslashes((($tmp = @stripslashes($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->name))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value->name : $tmp));?>
" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" /><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"  /><?php }?><a  href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="quick-look" rel="fancy">Быстрый просмотр</a></span>

                        <?php if (count($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1])>1) {?>
                            <div class="product-images-list">
                                <?php  $_smarty_tpl->tpl_vars["small_img"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["small_img"]->_loop = false;
 $_smarty_tpl->tpl_vars["key_img"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["key_item"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["small_img"]->key => $_smarty_tpl->tpl_vars["small_img"]->value) {
$_smarty_tpl->tpl_vars["small_img"]->_loop = true;
 $_smarty_tpl->tpl_vars["key_img"]->value = $_smarty_tpl->tpl_vars["small_img"]->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["key_item"]['iteration']++;
?>
                                    <img src="/images/gallery/<?php echo $_smarty_tpl->tpl_vars['small_img']->value->file;?>
" alt="" onmouseover="CatalogImg.setCatalogImgList(this, '<?php echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][3][$_smarty_tpl->tpl_vars['key_img']->value]->file;?>
');" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['key_item']['iteration']==1) {?> class="active"<?php }?> />
                                    <?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][0]->id!=$_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][$_smarty_tpl->tpl_vars['key_img']->value]->id) {?>
                                        <a  href="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][6][$_smarty_tpl->tpl_vars['key_img']->value]->file;?>
" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" rel="prettyPhoto[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]">&nbsp;</a>
                                    <?php }?>
                                <?php } ?>
                            </div>
                        <?php }?>
                    </div>



                    
                    <div class="desc-block-wrapper">
                        <div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a></div>

                        <div class="desc-block">

                            <div class="article">Артикул: <b><?php echo $_smarty_tpl->tpl_vars['product']->value->article;?>
</b></div>
                            <div class="short_desc"><?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['product']->value->desc_4)))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value->desc : $tmp)));?>
</div>

                            <?php if (count($_smarty_tpl->tpl_vars['product_characteristic']->value[$_smarty_tpl->tpl_vars['product_id']->value])) {?>
                                <div class="chars-product">
                                    <?php if ($_smarty_tpl->tpl_vars['shop']->value=='sumka'&&$_smarty_tpl->tpl_vars['product']->value->desc_1!='') {?>
                                        <div><b<?php if ($_GET['is_modal']==1) {?> style="background-color: white"<?php }?>>Размер:</b>
                                            <div<?php if ($_GET['is_modal']==1) {?> style="background-color: white"<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['product']->value->desc_1;?>
 см.
                                            </div>
                                        </div>
                                    <?php }?>
                                    <?php $_smarty_tpl->tpl_vars["is_out_char"] = new Smarty_variable("0", null, 0);?>
                                    <?php  $_smarty_tpl->tpl_vars["value_root"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["value_root"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_characteristic']->value[$_smarty_tpl->tpl_vars['product_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["value_root"]->key => $_smarty_tpl->tpl_vars["value_root"]->value) {
$_smarty_tpl->tpl_vars["value_root"]->_loop = true;
?>
                                        <?php  $_smarty_tpl->tpl_vars["value"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["value"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['value_root']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->key => $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
?>
                                            <?php if ($_smarty_tpl->tpl_vars['is_out_char']->value!=$_smarty_tpl->tpl_vars['value']->value->characteristic_id&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=73&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=63&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=64&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=5&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=2&&$_smarty_tpl->tpl_vars['value']->value->characteristic_id!=12) {?>
                                                <?php $_smarty_tpl->tpl_vars["char_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value->characteristic_id, null, 0);?>
                                                <div><b><?php if ($_smarty_tpl->tpl_vars['value']->value->icon) {?><img src="/images/icons/<?php echo $_smarty_tpl->tpl_vars['value']->value->icon;?>
" alt="" /><?php }
echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value']->value->characteristic_name,"?",''));?>
:</b>
                                                    <div>
                                                        <?php  $_smarty_tpl->tpl_vars["value_1"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["value_1"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_characteristic']->value[$_smarty_tpl->tpl_vars['product_id']->value][$_smarty_tpl->tpl_vars['char_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["value_1"]->key => $_smarty_tpl->tpl_vars["value_1"]->value) {
$_smarty_tpl->tpl_vars["value_1"]->_loop = true;
if ($_smarty_tpl->tpl_vars['value']->value->characteristic_id==$_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {
if ($_smarty_tpl->tpl_vars['is_out_char_value_1']->value==$_smarty_tpl->tpl_vars['value_1']->value->characteristic_id) {?>,<?php }?>
                                                            <?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value_1']->value->name,"?",''));?>
 <?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['value_1']->value->unit,"?",''));
$_smarty_tpl->tpl_vars["is_out_char_value_1"] = new Smarty_variable($_smarty_tpl->tpl_vars['value_1']->value->characteristic_id, null, 0);
}
} ?>
                                                        </div>
                                                    </div>

                                                    <?php $_smarty_tpl->tpl_vars['is_out_char'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value->characteristic_id, null, 0);?>
                                                <?php }?>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                <?php }?>
                            </div>

                            <div class="buy-box-wrapper">
                                <div class="buy-box">
                                    <div class="price-box">

                                        

                                        <div class="price"<?php if ($_smarty_tpl->tpl_vars['old_price_discaunt']->value) {
}?>><?php if ($_smarty_tpl->tpl_vars['is_b2b']->value!=1) {
echo number_format($_smarty_tpl->tpl_vars['product']->value->price,0,'.',' ');
} else {
echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['product']->value->max_price!=$_smarty_tpl->tpl_vars['product']->value->price&&$_smarty_tpl->tpl_vars['product']->value->max_price>0) {?> - <?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->max_price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1,'is_max'=>1),$_smarty_tpl);
}
}?> <span>руб.</span>
                                            <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?><div class="notice">Старая цена: <?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,''," ");?>
 р.</div><?php }?>
                                        </div>
                                    </div>
                                </div>


                                <div class="price-buy-box">
                                    <div class="price-block"><button class="buy" onclick="basketAnimated('#img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
', '#catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value->mod_id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, 0, 0, 0, 1);"></button>
                                        <button class="detailed" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/'">&nbsp;</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clear">&nbsp;</div>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                    <div class="clear"></div>
                </div><?php }} ?>
