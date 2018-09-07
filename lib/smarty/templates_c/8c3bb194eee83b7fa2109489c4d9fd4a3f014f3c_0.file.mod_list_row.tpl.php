<?php /* Smarty version 3.1.24, created on 2017-02-03 00:19:17
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/products/templates/mod_list_row.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5955283795893a2559bc199_91781718%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c3bb194eee83b7fa2109489c4d9fd4a3f014f3c' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/products/templates/mod_list_row.tpl',
      1 => 1485559670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5955283795893a2559bc199_91781718',
  'variables' => 
  array (
    'mod_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5893a2559ce444_54520954',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5893a2559ce444_54520954')) {
function content_5893a2559ce444_54520954 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5955283795893a2559bc199_91781718';
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