<?php /* Smarty version 3.1.24, created on 2017-01-28 01:03:24
         compiled from "E:/OpenServer/domains/kc-pskov.dev/modules/catalog/templates/fav.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:26808588bc3ac6a8f00_84675216%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70d778b96b2e0787029e4cc1e2f9fc0065ca3ab3' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/modules/catalog/templates/fav.tpl',
      1 => 1485554603,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26808588bc3ac6a8f00_84675216',
  'variables' => 
  array (
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588bc3ac6d4871_93868102',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588bc3ac6d4871_93868102')) {
function content_588bc3ac6d4871_93868102 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '26808588bc3ac6a8f00_84675216';
?>
<div class="breadcrumbs-block">
    <ul class="clearfix">
        <li><a href="/">Главная</a><span>/</span></li>
        <li>Избранное</li>
    </ul>
</div>
<h1>Избранное</h1>
<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
	<?php echo $_smarty_tpl->getSubTemplate ('getProduct.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } else { ?>
	<div>Товаров не найдено</div>
<?php }
}
}
?>