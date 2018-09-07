<?php /* Smarty version 3.1.24, created on 2015-09-13 17:01:57
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/_menu_products.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:178965107955f581d5cc3f56_15474789%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91a0c434a41b83d0e1736217105fcfddb7b19403' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/_menu_products.tpl',
      1 => 1440060624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178965107955f581d5cc3f56_15474789',
  'variables' => 
  array (
    'category_tree_list' => 0,
    'count_product_not_category' => 0,
    'MyURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f581d5ccbd05_84784887',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f581d5ccbd05_84784887')) {
function content_55f581d5ccbd05_84784887 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '178965107955f581d5cc3f56_15474789';
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