<?php /* Smarty version 3.1.24, created on 2018-07-02 08:45:39
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/page/templates/_menu_page.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3684662135b39bc03050385_78718877%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be38bf8f0542f83140649bada55c9e7e97487386' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/page/templates/_menu_page.tpl',
      1 => 1530509487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3684662135b39bc03050385_78718877',
  'variables' => 
  array (
    'category_tree_list_1' => 0,
    'category_tree_list_2' => 0,
    'category_tree_list_3' => 0,
    'category_tree_list_4' => 0,
    'category_tree_list_5' => 0,
    'category_tree_list_6' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39bc0305bb58_49100306',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39bc0305bb58_49100306')) {
function content_5b39bc0305bb58_49100306 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3684662135b39bc03050385_78718877';
?>
<div class="menu">
        <h1>Левое меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="min-width: 340px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_1']->value;?>

        </table>
        <br/>
        <h1>Основное меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_2']->value;?>

        </table>
        <br/>
        <h1>Нижнее меню 1:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
        <?php echo $_smarty_tpl->tpl_vars['category_tree_list_3']->value;?>

        </table>
        <br/>
        <h1>Нижнее меню 2:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
        <?php echo $_smarty_tpl->tpl_vars['category_tree_list_4']->value;?>

        </table>
        <br/>
        <h1>Нижнее меню 3:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_5']->value;?>

        </table>
        <h1>Нижнее меню 4:</h1>
        <table cellpadding="6" cellspacing="1" border="0" class="table" style="width: 250px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_6']->value;?>

        </table>
        <br/>
</div><?php }
}
?>