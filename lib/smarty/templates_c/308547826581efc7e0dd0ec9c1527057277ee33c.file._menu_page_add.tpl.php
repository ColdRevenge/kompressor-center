<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-22 13:13:39
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/_menu_page_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131004738155d84b530b6fb4-95839085%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '308547826581efc7e0dd0ec9c1527057277ee33c' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/_menu_page_add.tpl',
      1 => 1423307971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131004738155d84b530b6fb4-95839085',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_url' => 0,
    'type' => 0,
    'category_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d84b530c09f7_25063167',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d84b530c09f7_25063167')) {function content_55d84b530c09f7_25063167($_smarty_tpl) {?><ul>
    <li class="active"><span class="selected" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/'" style="cursor: pointer">Список страниц</span></li>
</ul><?php }} ?>
