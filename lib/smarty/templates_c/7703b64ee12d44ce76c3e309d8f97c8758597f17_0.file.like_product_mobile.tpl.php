<?php /* Smarty version 3.1.24, created on 2015-09-13 16:04:04
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/like_product_mobile.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:90535636955f574447223b4_91411037%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7703b64ee12d44ce76c3e309d8f97c8758597f17' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/like_product_mobile.tpl',
      1 => 1440060623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90535636955f574447223b4_91411037',
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
  'version' => '3.1.24',
  'unifunc' => 'content_55f57444775b33_59119896',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57444775b33_59119896')) {
function content_55f57444775b33_59119896 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '90535636955f574447223b4_91411037';
?>

<?php if (count($_smarty_tpl->tpl_vars['products_in_category']->value) >= 1) {?>
    <li>
        <a  href="javascript:void(0)" class="slideParamProduct<?php if ($_smarty_tpl->tpl_vars['type']->value == 1) {?> like-icon<?php } else { ?> podoidet-icon<?php }?>"><?php if ($_smarty_tpl->tpl_vars['type']->value == 1) {?>Похожие <?php echo stripslashes($_smarty_tpl->tpl_vars['product_in_category_name']->value);
} else { ?>К этому товару подойдет<?php }?></a>
        <div style="display: none;">
            <?php
$_from = $_smarty_tpl->tpl_vars['products_in_category']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product_like"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product_like"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_like'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["product_like"]->value) {
$_smarty_tpl->tpl_vars["product_like"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_like']->value['iteration']++;
$foreach_product_like_Sav = $_smarty_tpl->tpl_vars["product_like"];
?>
                <?php if ($_smarty_tpl->tpl_vars['product_like']->value->id != $_smarty_tpl->tpl_vars['product']->value->id && (isset($_smarty_tpl->tpl_vars['__foreach_like']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_like']->value['iteration'] : null) < 10) {?>
                    <div class="product">
                        <div class="img-box"><a  href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product_like']->value->pseudo_dir;?>
/?is_modal=1<?php if ($_smarty_tpl->tpl_vars['is_open_buy']->value == 1) {?>&is_buy_open=1<?php }?>" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
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
            <?php
$_smarty_tpl->tpl_vars["product_like"] = $foreach_product_like_Sav;
}
?>
        </div>
    </li>
<?php }?>
<!-- end medium-slider-line -->


<?php }
}
?>