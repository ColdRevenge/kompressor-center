<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 15:04:02
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/characteristics/templates/product_quick_select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98176750655d470b24d1355-10480598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7f8306d10eacfa738585fe42a227f5ca1834339' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/characteristics/templates/product_quick_select.tpl',
      1 => 1423307966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98176750655d470b24d1355-10480598',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'get_values' => 0,
    'value' => 0,
    'selected_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d470b2518172_99000006',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d470b2518172_99000006')) {function content_55d470b2518172_99000006($_smarty_tpl) {?><option value="0">Выбрать</option>
<?php  $_smarty_tpl->tpl_vars["value"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["value"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_values']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->key => $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
?>
    <?php $_smarty_tpl->tpl_vars["char_value_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value->id, null, 0);?>
    <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['selected_id']->value==$_smarty_tpl->tpl_vars['value']->value->id) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['value']->value->name);?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['value']->value->unit);?>
</option>
<?php } ?><?php }} ?>
