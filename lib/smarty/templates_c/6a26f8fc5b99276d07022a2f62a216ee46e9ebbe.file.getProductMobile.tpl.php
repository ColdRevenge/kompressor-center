<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-30 21:32:14
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/getProductMobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69706822255d46e01422016-20515441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a26f8fc5b99276d07022a2f62a216ee46e9ebbe' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/getProductMobile.tpl',
      1 => 1440958279,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69706822255d46e01422016-20515441',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46e015291f5_36895619',
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'old_price_discaunt' => 0,
    'is_mobile' => 0,
    'shop_url' => 0,
    'key' => 0,
    'product_images' => 0,
    'gallery_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46e015291f5_36895619')) {function content_55d46e015291f5_36895619($_smarty_tpl) {?><div class="products">
    <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["product_item"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["product"]->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["product_item"]['iteration']++;
?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
            <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value->price*100)/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
            <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable($_smarty_tpl->tpl_vars['old_price_discaunt']->value-100, null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["old_price_discaunt"] = new Smarty_variable(0, null, 0);?>
        <?php }?>
        <?php $_smarty_tpl->tpl_vars['product_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
        <div class="product">

            <?php if ($_smarty_tpl->tpl_vars['old_price_discaunt']->value) {?><div class="size_block">
                    <span><?php echo number_format($_smarty_tpl->tpl_vars['old_price_discaunt']->value);?>
%</span>
                </div><?php }?>

                <div class="img-box"><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value!=1) {
if ($_smarty_tpl->tpl_vars['product']->value->is_param_1==1) {?><img src="/images/fronted/sale.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_3==1) {?><img src="/images/fronted/novinka.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_2==1) {?><img src="/images/fronted/lucena.png" class="sale" alt="" /><?php } elseif ($_smarty_tpl->tpl_vars['product']->value->is_param_4==1) {?><img src="/images/fronted/lider.png" class="sale" alt=""  /><?php }
}?><a  href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/<?php if ($_smarty_tpl->tpl_vars['is_mobile']->value!=1) {?>?is_modal=1<?php }?>" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="product_img" <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value!=1) {?>rel="fancy"<?php }?>   ><span id="img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1]) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {
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
if ($_smarty_tpl->tpl_vars['product']->value->max_price!=$_smarty_tpl->tpl_vars['product']->value->price&&$_smarty_tpl->tpl_vars['product']->value->max_price>0) {?> - <?php echo $_smarty_tpl->smarty->registered_objects['price'][0]->getPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->max_price,'product_id'=>$_smarty_tpl->tpl_vars['product']->value->id,'is_query_price'=>1,'is_max'=>1),$_smarty_tpl);
}?> руб. <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>&nbsp;<span><?php echo number_format($_smarty_tpl->tpl_vars['product']->value->old_price,0,''," ");?>
 р.</span><?php }?></div>
                <div class="basket_added" id="basket_added_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">Товар успешно добавлен в корзину!</div>
                <button class="buy"  onclick="basketModal('#img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
', '#catalog_img_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
',<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value->mod_id;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->id)===null||$tmp==='' ? 0 : $tmp);?>
, 0, 0, 0, 1);">Купить</button>
                <button class="detailed" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/'">Подробнее</button>

                <div class="clear">&nbsp;</div>

            </div>
            <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value!=1) {?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['product_item']['iteration']%5==0) {?><div class="clear">&nbsp;</div><?php }?>
            <?php }?>
            <?php } ?>
                <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value!=1) {?>
                    <div class="clear"></div>
                <?php }?>
            </div> <?php }} ?>
