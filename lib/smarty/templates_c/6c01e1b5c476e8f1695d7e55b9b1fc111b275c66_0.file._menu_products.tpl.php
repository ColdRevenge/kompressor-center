<?php /* Smarty version 3.1.24, created on 2017-02-03 00:18:50
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/products/templates/_menu_products.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20043748505893a23a8a5602_85380056%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c01e1b5c476e8f1695d7e55b9b1fc111b275c66' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/products/templates/_menu_products.tpl',
      1 => 1485559671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20043748505893a23a8a5602_85380056',
  'variables' => 
  array (
    'category_tree_list' => 0,
    'count_product_not_category' => 0,
    'MyURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5893a23a8bae35_93281052',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5893a23a8bae35_93281052')) {
function content_5893a23a8bae35_93281052 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20043748505893a23a8a5602_85380056';
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