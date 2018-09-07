<?php /* Smarty version 3.1.24, created on 2018-07-02 08:45:43
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/page/templates/_menu_page_add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17359906245b39bc073f4a86_54121916%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e55f9d18ccb7c6efa0027a6372626649fb9cc9c' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/page/templates/_menu_page_add.tpl',
      1 => 1530509488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17359906245b39bc073f4a86_54121916',
  'variables' => 
  array (
    'admin_url' => 0,
    'type' => 0,
    'category_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39bc073fa7b0_39058814',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39bc073fa7b0_39058814')) {
function content_5b39bc073fa7b0_39058814 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17359906245b39bc073f4a86_54121916';
?>
<ul>
    <li class="active"><span class="selected" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/'" style="cursor: pointer">Список страниц</span></li>
</ul><?php }
}
?>