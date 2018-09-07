<?php /* Smarty version 3.1.24, created on 2015-10-28 15:13:28
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/banners/templates/_menu_banners.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5831683445630bbe8cfecc4_06880169%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42e12a9d164d18be5f0fe8d3b9fae34037bfbc4f' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/banners/templates/_menu_banners.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5831683445630bbe8cfecc4_06880169',
  'variables' => 
  array (
    'param_tpl' => 0,
    'category_tree_list_5' => 0,
    'category_tree_list_1' => 0,
    'category_tree_list_0' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630bbe8d09fc0_73382068',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630bbe8d09fc0_73382068')) {
function content_5630bbe8d09fc0_73382068 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5831683445630bbe8cfecc4_06880169';
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