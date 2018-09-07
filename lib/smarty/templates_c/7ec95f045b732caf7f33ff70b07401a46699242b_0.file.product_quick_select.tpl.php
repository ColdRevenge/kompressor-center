<?php /* Smarty version 3.1.24, created on 2015-09-16 15:29:23
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/characteristics/templates/product_quick_select.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:145153334855f960a3aa3bb1_99815248%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ec95f045b732caf7f33ff70b07401a46699242b' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/characteristics/templates/product_quick_select.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145153334855f960a3aa3bb1_99815248',
  'variables' => 
  array (
    'get_values' => 0,
    'value' => 0,
    'selected_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f960a3b20387_96245438',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f960a3b20387_96245438')) {
function content_55f960a3b20387_96245438 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '145153334855f960a3aa3bb1_99815248';
?>
<option value="0">Выбрать</option>
<?php
$_from = $_smarty_tpl->tpl_vars['get_values']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars["value"];
?>
    <?php $_smarty_tpl->tpl_vars["char_value_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value->id, null, 0);?>
    <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['selected_id']->value == $_smarty_tpl->tpl_vars['value']->value->id) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['value']->value->name);?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['value']->value->unit);?>
</option>
<?php
$_smarty_tpl->tpl_vars["value"] = $foreach_value_Sav;
}
}
}
?>