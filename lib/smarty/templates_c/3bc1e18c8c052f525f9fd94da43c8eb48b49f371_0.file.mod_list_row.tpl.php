<?php /* Smarty version 3.1.24, created on 2015-09-16 11:57:19
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/mod_list_row.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:89375064155f92eefcebca3_65271270%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bc1e18c8c052f525f9fd94da43c8eb48b49f371' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/mod_list_row.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89375064155f92eefcebca3_65271270',
  'variables' => 
  array (
    'mod_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f92eefcf88a3_84056534',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f92eefcf88a3_84056534')) {
function content_55f92eefcf88a3_84056534 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '89375064155f92eefcebca3_65271270';
$_from = $_smarty_tpl->tpl_vars['mod_list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product_mod"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product_mod"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["product_mod"]->value) {
$_smarty_tpl->tpl_vars["product_mod"]->_loop = true;
$foreach_product_mod_Sav = $_smarty_tpl->tpl_vars["product_mod"];
?>
    <?php echo $_smarty_tpl->getSubTemplate ("mod_list_row_td.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php
$_smarty_tpl->tpl_vars["product_mod"] = $foreach_product_mod_Sav;
}
if (!$_smarty_tpl->tpl_vars["product_mod"]->_loop) {
?>
    <?php echo $_smarty_tpl->getSubTemplate ("mod_list_row_td.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php
}
?>

<?php }
}
?>