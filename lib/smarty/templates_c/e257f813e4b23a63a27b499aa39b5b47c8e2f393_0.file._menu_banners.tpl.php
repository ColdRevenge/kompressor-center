<?php /* Smarty version 3.1.24, created on 2017-02-03 16:19:16
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/banners/templates/_menu_banners.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1947319295589483544bf699_66183945%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e257f813e4b23a63a27b499aa39b5b47c8e2f393' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/banners/templates/_menu_banners.tpl',
      1 => 1485559636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1947319295589483544bf699_66183945',
  'variables' => 
  array (
    'param_tpl' => 0,
    'category_tree_list_5' => 0,
    'category_tree_list_1' => 0,
    'category_tree_list_0' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_589483544d1e99_77188000',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_589483544d1e99_77188000')) {
function content_589483544d1e99_77188000 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1947319295589483544bf699_66183945';
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