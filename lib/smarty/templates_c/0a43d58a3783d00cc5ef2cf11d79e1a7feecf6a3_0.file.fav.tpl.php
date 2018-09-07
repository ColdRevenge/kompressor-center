<?php /* Smarty version 3.1.24, created on 2018-07-02 09:09:59
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/fav.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17493932125b39c1b76b5341_04963339%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a43d58a3783d00cc5ef2cf11d79e1a7feecf6a3' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/fav.tpl',
      1 => 1530509445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17493932125b39c1b76b5341_04963339',
  'variables' => 
  array (
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39c1b76fe179_54294817',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39c1b76fe179_54294817')) {
function content_5b39c1b76fe179_54294817 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17493932125b39c1b76b5341_04963339';
?>
<div class="breadcrumbs">
    <div class="container">
	    <ul class="breadcrumbs__cont">
	        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/">Главная</a></li>
        	<li class="breadcrumbs__item">Избранное</li>
    	</ul>
	</div>
</div>
<div class="container">
	<h1 class="headline">Избранное</h1>
	<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
		<?php echo $_smarty_tpl->getSubTemplate ('getProduct.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<?php } else { ?>
		<div>Товаров не найдено</div>
	<?php }?>
</div><?php }
}
?>