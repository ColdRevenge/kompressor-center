<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-30 11:11:49
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/_menu_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114509240755d48db9711183-38779084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3385fc04ea16a01a94ab9320f83c2f78dce5b045' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/_menu_page.tpl',
      1 => 1440922285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114509240755d48db9711183-38779084',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d48db971bcc7_74987825',
  'variables' => 
  array (
    'shop' => 0,
    'category_tree_list_101' => 0,
    'category_tree_list_1' => 0,
    'category_tree_list_5' => 0,
    'category_tree_list_4' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d48db971bcc7_74987825')) {function content_55d48db971bcc7_74987825($_smarty_tpl) {?><div class="menu">


    <?php if ($_smarty_tpl->tpl_vars['shop']->value=='forum') {?>
        <h1>Мобильное меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_101']->value;?>

        </table>
        <br/>
    <?php } else { ?>
        <h1>Верхнее меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="min-width: 340px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_1']->value;?>

        </table>
        <br/>
        <h1>Нижнее меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_5']->value;?>

        </table>
        <br/>
        <h1>Мобильное меню:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_4']->value;?>

        </table>
        <br/>
    <?php }?>


    

</div><?php }} ?>
