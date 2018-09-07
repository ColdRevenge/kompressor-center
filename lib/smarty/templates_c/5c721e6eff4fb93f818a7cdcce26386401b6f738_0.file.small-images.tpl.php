<?php /* Smarty version 3.1.24, created on 2017-08-21 01:41:24
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/products/templates/small-images.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1242105842599a101472a1f4_52535155%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c721e6eff4fb93f818a7cdcce26386401b6f738' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/products/templates/small-images.tpl',
      1 => 1503268783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1242105842599a101472a1f4_52535155',
  'variables' => 
  array (
    'product_images' => 0,
    'gallery_url' => 0,
    'key' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_599a101474b909_60793616',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599a101474b909_60793616')) {
function content_599a101474b909_60793616 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1242105842599a101472a1f4_52535155';
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
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["item_img"]->value) {
$_smarty_tpl->tpl_vars["item_img"]->_loop = true;
$foreach_item_img_Sav = $_smarty_tpl->tpl_vars["item_img"];
?><a 
       
                href="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[6][$_smarty_tpl->tpl_vars['key']->value]->file;?>
"  rel="prettyPhoto">
    <img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
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