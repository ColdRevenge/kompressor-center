<?php /* Smarty version 3.1.24, created on 2015-10-28 15:24:16
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/page/templates/_menu_page.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9253673235630be70253732_95855509%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c438eb0f23af3a559cc4437c27fd05e47589d9ae' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/page/templates/_menu_page.tpl',
      1 => 1442325483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9253673235630be70253732_95855509',
  'variables' => 
  array (
    'shop' => 0,
    'category_tree_list_101' => 0,
    'category_tree_list_1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630be7025c876_77295156',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630be7025c876_77295156')) {
function content_5630be7025c876_77295156 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9253673235630be70253732_95855509';
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