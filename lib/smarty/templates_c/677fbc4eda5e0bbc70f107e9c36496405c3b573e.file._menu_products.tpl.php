<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 11:58:57
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/_menu_products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74414039555d46a6280abe1-96491581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '677fbc4eda5e0bbc70f107e9c36496405c3b573e' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/_menu_products.tpl',
      1 => 1440060624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74414039555d46a6280abe1-96491581',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46a628192f8_59810870',
  'variables' => 
  array (
    'category_tree_list' => 0,
    'count_product_not_category' => 0,
    'MyURL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46a628192f8_59810870')) {function content_55d46a628192f8_59810870($_smarty_tpl) {?><div class="menu">
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
<?php }} ?>
