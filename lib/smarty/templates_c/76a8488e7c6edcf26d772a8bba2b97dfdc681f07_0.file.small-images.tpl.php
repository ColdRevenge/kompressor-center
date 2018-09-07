<?php /* Smarty version 3.1.24, created on 2015-09-29 16:27:26
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/small-images.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1984115801560a91be4646c0_44838074%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76a8488e7c6edcf26d772a8bba2b97dfdc681f07' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/small-images.tpl',
      1 => 1443533245,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1984115801560a91be4646c0_44838074',
  'variables' => 
  array (
    'product_images' => 0,
    'gallery_url' => 0,
    'key' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_560a91be4b3e39_85676041',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_560a91be4b3e39_85676041')) {
function content_560a91be4b3e39_85676041 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1984115801560a91be4646c0_44838074';
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