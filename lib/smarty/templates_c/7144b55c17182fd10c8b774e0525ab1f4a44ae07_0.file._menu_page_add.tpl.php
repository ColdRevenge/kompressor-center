<?php /* Smarty version 3.1.24, created on 2015-09-15 16:56:55
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/page/templates/_menu_page_add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:194208655155f823a7ec2a67_86335958%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7144b55c17182fd10c8b774e0525ab1f4a44ae07' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/page/templates/_menu_page_add.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194208655155f823a7ec2a67_86335958',
  'variables' => 
  array (
    'admin_url' => 0,
    'type' => 0,
    'category_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f823a7ec8484_30047766',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f823a7ec8484_30047766')) {
function content_55f823a7ec8484_30047766 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '194208655155f823a7ec2a67_86335958';
?>
<ul>
    <li class="active"><span class="selected" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/'" style="cursor: pointer">Список страниц</span></li>
</ul><?php }
}
?>