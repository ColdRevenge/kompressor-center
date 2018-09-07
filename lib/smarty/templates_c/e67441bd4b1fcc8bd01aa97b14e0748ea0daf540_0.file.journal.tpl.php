<?php /* Smarty version 3.1.24, created on 2018-07-02 09:26:29
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/journal.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7341095765b39c59563f683_51228134%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e67441bd4b1fcc8bd01aa97b14e0748ea0daf540' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/journal.tpl',
      1 => 1530509474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7341095765b39c59563f683_51228134',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39c595686bf8_63008918',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39c595686bf8_63008918')) {
function content_5b39c595686bf8_63008918 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7341095765b39c59563f683_51228134';
?>
<div class="breadcrumbs">
    <div class="container">
	    <ul class="breadcrumbs__cont">
	        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/">Главная</a></li>
	        <li class="breadcrumbs__item">Интернет-журнал</li>
	    </ul>
	</div>
</div>

<div class="container">
	<h1 class="headline">Интернет-журнал</h1>
	<?php echo $_smarty_tpl->getSubTemplate ("_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</div><?php }
}
?>