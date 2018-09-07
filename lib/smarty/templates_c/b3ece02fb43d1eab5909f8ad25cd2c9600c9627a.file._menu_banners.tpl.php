<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 21:12:13
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/banners/templates/_menu_banners.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135853258455d769fdb84c33-24942238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3ece02fb43d1eab5909f8ad25cd2c9600c9627a' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/banners/templates/_menu_banners.tpl',
      1 => 1423307962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135853258455d769fdb84c33-24942238',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'param_tpl' => 0,
    'category_tree_list_5' => 0,
    'category_tree_list_1' => 0,
    'category_tree_list_0' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d769fdb97035_69440087',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d769fdb97035_69440087')) {function content_55d769fdb97035_69440087($_smarty_tpl) {?><div class="menu">
<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['type']==5) {?>
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
</div><?php }} ?>
