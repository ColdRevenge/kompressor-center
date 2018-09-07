<?php /* Smarty version 3.1.24, created on 2017-04-19 15:47:26
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/page/templates/_menu_page.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:193320325358f75c5e7bb845_03526686%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85a255396c1a959b750763d7060bfdc4a13c68f5' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/page/templates/_menu_page.tpl',
      1 => 1485559665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193320325358f75c5e7bb845_03526686',
  'variables' => 
  array (
    'shop' => 0,
    'category_tree_list_101' => 0,
    'category_tree_list_1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_58f75c5e7cd4c2_52601298',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58f75c5e7cd4c2_52601298')) {
function content_58f75c5e7cd4c2_52601298 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '193320325358f75c5e7bb845_03526686';
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