<?php /* Smarty version 3.1.24, created on 2015-09-15 16:58:18
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/page/templates/_menu_page.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7451832655f823fac458a3_17634423%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '330857d9f5f41f739f01bfa021fc17658e208236' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/page/templates/_menu_page.tpl',
      1 => 1442325483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7451832655f823fac458a3_17634423',
  'variables' => 
  array (
    'shop' => 0,
    'category_tree_list_101' => 0,
    'category_tree_list_1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f823fac77200_23368217',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f823fac77200_23368217')) {
function content_55f823fac77200_23368217 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7451832655f823fac458a3_17634423';
?>
<div class="menu">


    <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'forum') {?>
        <h1>Мобильное меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_101']->value;?>

        </table>
        <br/>
    <?php } else { ?>
        <h1>Левое меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="min-width: 340px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_1']->value;?>

        </table>
        <br/>
   
        
        
    <?php }?>


    

</div><?php }
}
?>