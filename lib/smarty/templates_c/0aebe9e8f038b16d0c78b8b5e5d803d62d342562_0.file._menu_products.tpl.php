<?php /* Smarty version 3.1.24, created on 2015-10-28 15:22:51
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/products/templates/_menu_products.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19843126275630be1b537830_10299900%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0aebe9e8f038b16d0c78b8b5e5d803d62d342562' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/products/templates/_menu_products.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19843126275630be1b537830_10299900',
  'variables' => 
  array (
    'category_tree_list' => 0,
    'count_product_not_category' => 0,
    'MyURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630be1b53ebd8_75695595',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630be1b53ebd8_75695595')) {
function content_5630be1b53ebd8_75695595 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19843126275630be1b537830_10299900';
?>
<div class="menu">
    <h1>Каталог:</h1>
    <table cellpadding="5" cellspacing="1" border="0" class="table" style="min-width: 340px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list']->value;?>

    </table>

    <?php if ($_smarty_tpl->tpl_vars['count_product_not_category']->value) {?>
    <br/>
    <div class="notice">--</div>
    <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/0/0/">Товары без категории </a>(<?php echo $_smarty_tpl->tpl_vars['count_product_not_category']->value;?>
)
    <?php }?>
    <?php echo '<script'; ?>
 type="text/javascript">
        minimizeMenu.minimizeMenu();
    <?php echo '</script'; ?>
>
</div>
<?php }
}
?>