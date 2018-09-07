<?php /* Smarty version 3.1.24, created on 2015-09-13 17:02:27
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/mod_list_row.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:31729140955f581f359ba17_16716524%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '617dc693d39691c91fddda5198fae553973ce620' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/mod_list_row.tpl',
      1 => 1440060623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31729140955f581f359ba17_16716524',
  'variables' => 
  array (
    'mod_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f581f35a7d81_76868451',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f581f35a7d81_76868451')) {
function content_55f581f35a7d81_76868451 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '31729140955f581f359ba17_16716524';
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