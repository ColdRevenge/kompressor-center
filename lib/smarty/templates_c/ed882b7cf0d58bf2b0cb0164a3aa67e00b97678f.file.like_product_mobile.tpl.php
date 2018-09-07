<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 11:51:36
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/like_product_mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131768799955d469b4014d04-54424986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed882b7cf0d58bf2b0cb0164a3aa67e00b97678f' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/like_product_mobile.tpl',
      1 => 1440060623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131768799955d469b4014d04-54424986',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d469b4081278_87401504',
  'variables' => 
  array (
    'products_in_category' => 0,
    'type' => 0,
    'product_in_category_name' => 0,
    'product_like' => 0,
    'product' => 0,
    'shop_url' => 0,
    'is_open_buy' => 0,
    'gallery_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d469b4081278_87401504')) {function content_55d469b4081278_87401504($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['products_in_category']->value)>=1) {?>
    <li>
        <a  href="javascript:void(0)" class="slideParamProduct<?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?> like-icon<?php } else { ?> podoidet-icon<?php }?>"><?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?>Похожие <?php echo stripslashes($_smarty_tpl->tpl_vars['product_in_category_name']->value);
} else { ?>К этому товару подойдет<?php }?></a>
        <div style="display: none;">
            <?php  $_smarty_tpl->tpl_vars["product_like"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product_like"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products_in_category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["like"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["product_like"]->key => $_smarty_tpl->tpl_vars["product_like"]->value) {
$_smarty_tpl->tpl_vars["product_like"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["like"]['iteration']++;
?>
                <?php if ($_smarty_tpl->tpl_vars['product_like']->value->id!=$_smarty_tpl->tpl_vars['product']->value->id&&$_smarty_tpl->getVariable('smarty')->value['foreach']['like']['iteration']<10) {?>
                    <div class="product">
                        <div class="img-box"><a  href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product_like']->value->pseudo_dir;?>
/?is_modal=1<?php if ($_smarty_tpl->tpl_vars['is_open_buy']->value==1) {?>&is_buy_open=1<?php }?>" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
" class="product_img" ><span id="img_box_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php if ($_smarty_tpl->tpl_vars['product_like']->value->file) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_like']->value->file;?>
" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product_like']->value->id;?>
"  /><?php } else { ?><img src="/images/icons/no-image.png" alt="" id="catalog_img_<?php echo $_smarty_tpl->tpl_vars['product_like']->value->id;?>
"  /><?php }?></span></a></div>
                        <div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product_like']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['product_like']->value->name);?>
</a></div>

                        
                        
                        <div class="price"><?php echo number_format($_smarty_tpl->tpl_vars['product_like']->value->price,2,'.','');?>
 р.</div>
                        <div class="clear">&nbsp;</div>
                    </div>
                <?php }?>
            <?php } ?>
        </div>
    </li>
<?php }?>
<!-- end medium-slider-line -->


<?php }} ?>
