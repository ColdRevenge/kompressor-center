<?php /* Smarty version 3.1.24, created on 2015-09-15 16:54:38
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/_menu_products.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:43255766955f8231e93e6f1_07268446%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61a4b7b3f51eb5e381f918b3dc8446602d625a40' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/_menu_products.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43255766955f8231e93e6f1_07268446',
  'variables' => 
  array (
    'category_tree_list' => 0,
    'count_product_not_category' => 0,
    'MyURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f8231e947c77_82312737',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f8231e947c77_82312737')) {
function content_55f8231e947c77_82312737 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '43255766955f8231e93e6f1_07268446';
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