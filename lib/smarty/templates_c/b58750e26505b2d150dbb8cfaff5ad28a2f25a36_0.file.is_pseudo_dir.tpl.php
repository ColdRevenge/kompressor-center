<?php /* Smarty version 3.1.24, created on 2018-08-13 11:00:52
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/page/templates/is_pseudo_dir.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1730062965b713ab47cbcc7_80220999%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b58750e26505b2d150dbb8cfaff5ad28a2f25a36' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/page/templates/is_pseudo_dir.tpl',
      1 => 1530509487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1730062965b713ab47cbcc7_80220999',
  'variables' => 
  array (
    'is_dir' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b713ab49412f7_88904702',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b713ab49412f7_88904702')) {
function content_5b713ab49412f7_88904702 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1730062965b713ab47cbcc7_80220999';
if ($_smarty_tpl->tpl_vars['is_dir']->value == 0) {?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
ok.png" alt="Папка свободна" title="Папка свободна" style='width:20px;vertical-align: bottom;margin-left: 10px;'/>
<?php } else { ?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
stop.png" alt="Папка уже занята, или содержит недопустимые символы" title="Папка уже занята, или содержит недопустимые символы"  style='width:20px;vertical-align: bottom;margin-left: 10px;'/><?php }
}
}
?>