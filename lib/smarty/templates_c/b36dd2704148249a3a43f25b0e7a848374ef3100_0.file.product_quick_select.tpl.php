<?php /* Smarty version 3.1.24, created on 2015-09-13 23:34:24
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/characteristics/templates/product_quick_select.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:206918001055f5ddd05ee632_46549199%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b36dd2704148249a3a43f25b0e7a848374ef3100' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/characteristics/templates/product_quick_select.tpl',
      1 => 1423307966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206918001055f5ddd05ee632_46549199',
  'variables' => 
  array (
    'get_values' => 0,
    'value' => 0,
    'selected_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f5ddd064a6c2_92137355',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f5ddd064a6c2_92137355')) {
function content_55f5ddd064a6c2_92137355 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '206918001055f5ddd05ee632_46549199';
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