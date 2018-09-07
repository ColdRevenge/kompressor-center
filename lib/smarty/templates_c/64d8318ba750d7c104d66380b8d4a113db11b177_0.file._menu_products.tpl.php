<?php /* Smarty version 3.1.24, created on 2018-07-02 09:49:10
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/products/templates/_menu_products.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17010573725b39cae65751a5_67549904%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64d8318ba750d7c104d66380b8d4a113db11b177' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/products/templates/_menu_products.tpl',
      1 => 1530509496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17010573725b39cae65751a5_67549904',
  'variables' => 
  array (
    'category_tree_list' => 0,
    'count_product_not_category' => 0,
    'MyURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39cae657e7e7_06520996',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39cae657e7e7_06520996')) {
function content_5b39cae657e7e7_06520996 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17010573725b39cae65751a5_67549904';
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