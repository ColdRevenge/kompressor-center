<?php /* Smarty version 3.1.24, created on 2015-10-27 15:52:32
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/products/templates/small-images.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2083794367562f7390ea5613_80949740%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '281861710ba6e1d893861818bfc07aa3e0202c6c' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/products/templates/small-images.tpl',
      1 => 1443533245,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2083794367562f7390ea5613_80949740',
  'variables' => 
  array (
    'product_images' => 0,
    'gallery_url' => 0,
    'key' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_562f7390ebf103_61242211',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562f7390ebf103_61242211')) {
function content_562f7390ebf103_61242211 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2083794367562f7390ea5613_80949740';
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