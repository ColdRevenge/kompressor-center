<?php /* Smarty version 3.1.24, created on 2018-07-13 10:10:54
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/characteristics/templates/product_quick_select.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:15977973705b48507e0f5801_70586362%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0941ed7dbea3770980f33b5222d243fde469c7e' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/characteristics/templates/product_quick_select.tpl',
      1 => 1530509452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15977973705b48507e0f5801_70586362',
  'variables' => 
  array (
    'get_values' => 0,
    'value' => 0,
    'selected_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b48507e191126_57605162',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b48507e191126_57605162')) {
function content_5b48507e191126_57605162 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15977973705b48507e0f5801_70586362';
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