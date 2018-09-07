<?php /* Smarty version 3.1.24, created on 2015-10-28 15:24:17
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/page/templates/_menu_page_add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2958562055630be714551d1_81186891%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b7fcb7353edafe840820f3f3e29c8f7fb5b0cff' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/page/templates/_menu_page_add.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2958562055630be714551d1_81186891',
  'variables' => 
  array (
    'admin_url' => 0,
    'type' => 0,
    'category_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630be71459674_18253412',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630be71459674_18253412')) {
function content_5630be71459674_18253412 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2958562055630be714551d1_81186891';
?>
<ul>
    <li class="active"><span class="selected" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/'" style="cursor: pointer">Список страниц</span></li>
</ul><?php }
}
?>