<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-22 16:51:00
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/small-images.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86593603155d4694759beb3-29169590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6acd370e339426effcf4969248d3123c0e89204d' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/small-images.tpl',
      1 => 1440251457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86593603155d4694759beb3-29169590',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d469475ed591_54898699',
  'variables' => 
  array (
    'product_images' => 0,
    'gallery_url' => 0,
    'key' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d469475ed591_54898699')) {function content_55d469475ed591_54898699($_smarty_tpl) {?>
<div class="sm-photos" id="gallery_01">
    <?php $_smarty_tpl->tpl_vars["image_count"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['product_images']->value[2]), null, 0);?>
    <?php  $_smarty_tpl->tpl_vars["item_img"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item_img"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product_images']->value[2]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["img"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["item_img"]->key => $_smarty_tpl->tpl_vars["item_img"]->value) {
$_smarty_tpl->tpl_vars["item_img"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["item_img"]->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["img"]['iteration']++;
?><a 
       
       href="#" class="elevatezoom-gallery<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['img']['iteration']==1) {?> active<?php }?>" data-update="" data-image="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[5][$_smarty_tpl->tpl_vars['key']->value]->file;?>
"  class="slide-content"
data-zoom-image="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[6][$_smarty_tpl->tpl_vars['key']->value]->file;?>
"
       data-zoom-image="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[6][$_smarty_tpl->tpl_vars['key']->value]->file;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[1][$_smarty_tpl->tpl_vars['key']->value]->file;?>
" alt="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_images']->value[1][$_smarty_tpl->tpl_vars['key']->value]->name)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['product']->value->name : $tmp);?>
"  /></a><?php } ?>

    </div>
    <?php }} ?>
