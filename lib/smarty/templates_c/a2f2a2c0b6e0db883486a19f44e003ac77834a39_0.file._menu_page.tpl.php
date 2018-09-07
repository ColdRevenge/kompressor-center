<?php /* Smarty version 3.1.24, created on 2015-09-14 12:58:11
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/page/templates/_menu_page.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:64548257255f69a3354b314_89993055%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2f2a2c0b6e0db883486a19f44e003ac77834a39' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/page/templates/_menu_page.tpl',
      1 => 1440922285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64548257255f69a3354b314_89993055',
  'variables' => 
  array (
    'shop' => 0,
    'category_tree_list_101' => 0,
    'category_tree_list_1' => 0,
    'category_tree_list_5' => 0,
    'category_tree_list_4' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f69a33557cc6_74661996',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f69a33557cc6_74661996')) {
function content_55f69a33557cc6_74661996 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '64548257255f69a3354b314_89993055';
?>
<div class="menu">


    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'forum') {?>
        <h1>Мобильное меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_101']->value;?>

        </table>
        <br/>
    <?php } else { ?>
        <h1>Верхнее меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="min-width: 340px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_1']->value;?>

        </table>
        <br/>
        <h1>Нижнее меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_5']->value;?>

        </table>
        <br/>
        <h1>Мобильное меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_4']->value;?>

        </table>
        <br/>
    <?php }?>


    

</div><?php }
}
?>