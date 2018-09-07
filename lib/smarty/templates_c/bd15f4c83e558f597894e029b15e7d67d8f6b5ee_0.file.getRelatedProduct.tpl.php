<?php /* Smarty version 3.1.24, created on 2015-09-13 17:02:27
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/related/templates/getRelatedProduct.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:64968896855f581f31a5ab4_99532121%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd15f4c83e558f597894e029b15e7d67d8f6b5ee' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/related/templates/getRelatedProduct.tpl',
      1 => 1423307973,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64968896855f581f31a5ab4_99532121',
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'discaunt' => 0,
    'key' => 0,
    'product_images' => 0,
    'gallery_url' => 0,
    'admin_url' => 0,
    'category_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f581f31fb793_65120100',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f581f31fb793_65120100')) {
function content_55f581f31fb793_65120100 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '64968896855f581f31a5ab4_99532121';
if (count($_smarty_tpl->tpl_vars['products']->value)) {?>
<h1 style="text-align: center;margin-top: 35px;">Является сопутствующим товаром для</h1>
<?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['product']->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars['product'];
?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
        <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->price*100/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
        <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['discaunt']->value-100, null, 0);?>
        <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_Variable(0, null, 0);?>
        <?php }?>
        <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>


<div style="text-align: center; margin: 15px 0px 0px 0px;padding-bottom: 15px;; border-bottom: 1px solid #CCCCCC;cursor: pointer;">
    <?php if ($_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->file) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product_images']->value[$_smarty_tpl->tpl_vars['key']->value][1][0]->file;?>
" alt="" style="border: 1px solid #CCCCCC;" onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/edit/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/')" /><?php }?>
    <div onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/edit/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/')"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</div>
    <div onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/edit/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/')"><?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
 руб.</div>
    <div style="margin-top: 3px;"><a href="javascript:void(0)" onclick="AjaxRequest('related_list_menu','<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
related/del/product/<?php echo $_smarty_tpl->tpl_vars['product']->value->related_id;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->product_id;?>
/');return false;">Удалить</a></div>
</div>
        <?php
$_smarty_tpl->tpl_vars['product'] = $foreach_product_Sav;
}
?>
<?php }
}
}
?>