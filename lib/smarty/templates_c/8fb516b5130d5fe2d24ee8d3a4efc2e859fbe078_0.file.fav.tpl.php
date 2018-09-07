<?php /* Smarty version 3.1.24, created on 2017-01-28 02:35:59
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/catalog/templates/fav.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:255846567588bd95fddcdb8_84369571%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fb516b5130d5fe2d24ee8d3a4efc2e859fbe078' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/catalog/templates/fav.tpl',
      1 => 1485559641,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '255846567588bd95fddcdb8_84369571',
  'variables' => 
  array (
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588bd95fe28087_99836042',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588bd95fe28087_99836042')) {
function content_588bd95fe28087_99836042 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '255846567588bd95fddcdb8_84369571';
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