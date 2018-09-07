<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 11:53:22
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/mod_list_row.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5494940655d46a66443f37-12986489%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60aca95555cafb4e5a0c26ef93217373eb18e764' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/mod_list_row.tpl',
      1 => 1440060623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5494940655d46a66443f37-12986489',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46a664528a3_39660881',
  'variables' => 
  array (
    'mod_list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46a664528a3_39660881')) {function content_55d46a664528a3_39660881($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars["product_mod"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product_mod"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mod_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product_mod"]->key => $_smarty_tpl->tpl_vars["product_mod"]->value) {
$_smarty_tpl->tpl_vars["product_mod"]->_loop = true;
?>
    <?php echo $_smarty_tpl->getSubTemplate ("mod_list_row_td.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }
if (!$_smarty_tpl->tpl_vars["product_mod"]->_loop) {
?>
    <?php echo $_smarty_tpl->getSubTemplate ("mod_list_row_td.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } ?>

<?php }} ?>
