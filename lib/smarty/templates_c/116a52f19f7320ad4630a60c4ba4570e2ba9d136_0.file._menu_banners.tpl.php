<?php /* Smarty version 3.1.24, created on 2018-07-02 09:00:50
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/banners/templates/_menu_banners.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2456981935b39bf92ebee38_72572018%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '116a52f19f7320ad4630a60c4ba4570e2ba9d136' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/banners/templates/_menu_banners.tpl',
      1 => 1530509434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2456981935b39bf92ebee38_72572018',
  'variables' => 
  array (
    'param_tpl' => 0,
    'category_tree_list_5' => 0,
    'category_tree_list_1' => 0,
    'category_tree_list_0' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39bf92eccc46_93503876',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39bf92eccc46_93503876')) {
function content_5b39bf92eccc46_93503876 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2456981935b39bf92ebee38_72572018';
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