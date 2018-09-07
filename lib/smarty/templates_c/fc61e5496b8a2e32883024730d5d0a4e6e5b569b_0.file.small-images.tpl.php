<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:36
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/small-images.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:157592455655f573ec8b7ee8_38312968%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc61e5496b8a2e32883024730d5d0a4e6e5b569b' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/small-images.tpl',
      1 => 1440251457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157592455655f573ec8b7ee8_38312968',
  'variables' => 
  array (
    'product_images' => 0,
    'gallery_url' => 0,
    'key' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f573ec8e30a8_00914474',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573ec8e30a8_00914474')) {
function content_55f573ec8e30a8_00914474 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '157592455655f573ec8b7ee8_38312968';
?>

<div class="sm-photos" id="gallery_01">
    <?php $_smarty_tpl->tpl_vars["image_count"] = new Smarty_Variable(count($_smarty_tpl->tpl_vars['product_images']->value[2]), null, 0);?>
    <?php
$_from = $_smarty_tpl->tpl_vars['product_images']->value[2];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item_img"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item_img"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['__foreach_img'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["item_img"]->value) {
$_smarty_tpl->tpl_vars["item_img"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_img']->value['iteration']++;
$foreach_item_img_Sav = $_smarty_tpl->tpl_vars["item_img"];
?><a 
       
       href="#" class="elevatezoom-gallery<?php if ((isset($_smarty_tpl->tpl_vars['__foreach_img']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_img']->value['iteration'] : null) == 1) {?> active<?php }?>" data-update="" data-image="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
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
"  /></a><?php
$_smarty_tpl->tpl_vars["item_img"] = $foreach_item_img_Sav;
}
?>

    </div>
    <?php }
}
?>