<?php /* Smarty version 3.1.24, created on 2017-08-23 08:34:48
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/_menu_journal.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:639953737599d13f87e3963_82458183%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a80a4e5a3c01d397cf082ddcac75c2a64a3891b3' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/_menu_journal.tpl',
      1 => 1503466253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '639953737599d13f87e3963_82458183',
  'variables' => 
  array (
    'is_menu_add' => 0,
    'admin_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_599d13f87fadd5_07898223',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599d13f87fadd5_07898223')) {
function content_599d13f87fadd5_07898223 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '639953737599d13f87e3963_82458183';
?>
<ul>
    <li<?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value != 1) {?> class="active"<?php }?>><?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value != 1) {?><span class="selected">Список журналов</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
journal/list/">Список журналов</a><?php }?></li>
    <li<?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value == 1) {?> class="active"<?php }?>><?php if ($_smarty_tpl->tpl_vars['is_menu_add']->value == 1) {?><span class="selected">Добавить журнал</span><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
journal/add/">Добавить журнал</a><?php }?></li>
</ul><?php }
}
?>