<?php /* Smarty version 3.1.24, created on 2017-01-27 21:43:23
         compiled from "E:/OpenServer/domains/kc-pskov.dev/modules/products/templates/small-images.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:23706588b94cb627bc3_34542915%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0f850cb387df1b344c7c9d3b233087be4b90276' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/modules/products/templates/small-images.tpl',
      1 => 1485497708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23706588b94cb627bc3_34542915',
  'variables' => 
  array (
    'product_images' => 0,
    'gallery_url' => 0,
    'key' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588b94cb63ca42_46193729',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b94cb63ca42_46193729')) {
function content_588b94cb63ca42_46193729 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '23706588b94cb627bc3_34542915';
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