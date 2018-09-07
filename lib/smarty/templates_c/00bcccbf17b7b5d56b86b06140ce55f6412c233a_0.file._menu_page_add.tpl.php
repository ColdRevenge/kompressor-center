<?php /* Smarty version 3.1.24, created on 2016-03-24 14:07:22
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/page/templates/_menu_page_add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:159964913356f3ca6a15bf09_59362116%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00bcccbf17b7b5d56b86b06140ce55f6412c233a' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/page/templates/_menu_page_add.tpl',
      1 => 1450788675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159964913356f3ca6a15bf09_59362116',
  'variables' => 
  array (
    'admin_url' => 0,
    'type' => 0,
    'category_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56f3ca6a16b711_52994785',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f3ca6a16b711_52994785')) {
function content_56f3ca6a16b711_52994785 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '159964913356f3ca6a15bf09_59362116';
?>
<ul>
    <li class="active"><span class="selected" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/'" style="cursor: pointer">Список страниц</span></li>
</ul><?php }
}
?>