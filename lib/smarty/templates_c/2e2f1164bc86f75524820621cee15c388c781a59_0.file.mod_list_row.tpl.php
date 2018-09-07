<?php /* Smarty version 3.1.24, created on 2018-07-13 10:07:20
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/products/templates/mod_list_row.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:15257476345b484fa85817a5_28818962%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e2f1164bc86f75524820621cee15c388c781a59' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/products/templates/mod_list_row.tpl',
      1 => 1530509495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15257476345b484fa85817a5_28818962',
  'variables' => 
  array (
    'mod_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b484fa85e39b8_34586480',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b484fa85e39b8_34586480')) {
function content_5b484fa85e39b8_34586480 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '15257476345b484fa85817a5_28818962';
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