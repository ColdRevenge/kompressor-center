<?php /* Smarty version 3.1.24, created on 2015-09-15 16:54:53
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/banners/templates/_menu_banners.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:134978694255f8232d1ec742_36495051%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e4795a9439468e137eeea35b0adfd18af4d5165' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/banners/templates/_menu_banners.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134978694255f8232d1ec742_36495051',
  'variables' => 
  array (
    'param_tpl' => 0,
    'category_tree_list_5' => 0,
    'category_tree_list_1' => 0,
    'category_tree_list_0' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f8232d1f85c1_78090834',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f8232d1f85c1_78090834')) {
function content_55f8232d1f85c1_78090834 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '134978694255f8232d1ec742_36495051';
?>
<div class="menu">
<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['type'] == 5) {?>
	<form method="POST" action="">
	<table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
	<?php echo $_smarty_tpl->tpl_vars['category_tree_list_5']->value;?>

	</table>
	<br/>
	<a href="/xadmin/category/edit/5/?not_menu=1" rel="add_banners_menu">Добавить новый раздел</a>
	<br/>
	<button>Применить сортировку</button>
	</form>
<?php } else { ?>
    <h1>Верхнее меню:</h1>
    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
        <?php echo $_smarty_tpl->tpl_vars['category_tree_list_1']->value;?>

    </table>

   

  
	
    
    <br/>
    <h1>Каталог:</h1>
    <table cellpadding="5" cellspacing="1" border="0" class="table" style="min-width: 250px;">
        <?php echo $_smarty_tpl->tpl_vars['category_tree_list_0']->value;?>

    </table>
<?php }?>
</div><?php }
}
?>