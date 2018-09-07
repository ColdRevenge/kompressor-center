<?php /* Smarty version 3.1.24, created on 2015-09-14 19:35:10
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/page/templates/_menu_page_add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:121721582355f6f73e278368_90907377%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac92230b96cc363bb015970a4ba7bccaba6c0564' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/page/templates/_menu_page_add.tpl',
      1 => 1423307971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121721582355f6f73e278368_90907377',
  'variables' => 
  array (
    'admin_url' => 0,
    'type' => 0,
    'category_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f6f73e27e855_95246999',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f6f73e27e855_95246999')) {
function content_55f6f73e27e855_95246999 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '121721582355f6f73e278368_90907377';
?>
<ul>
    <li class="active"><span class="selected" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/'" style="cursor: pointer">Список страниц</span></li>
</ul><?php }
}
?>