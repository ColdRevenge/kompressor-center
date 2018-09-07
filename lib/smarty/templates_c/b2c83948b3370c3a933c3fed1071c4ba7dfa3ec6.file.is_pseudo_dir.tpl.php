<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-30 11:11:59
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/is_pseudo_dir.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178372895155e2bacfe3c5f2-63998783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2c83948b3370c3a933c3fed1071c4ba7dfa3ec6' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/page/templates/is_pseudo_dir.tpl',
      1 => 1423307971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178372895155e2bacfe3c5f2-63998783',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_dir' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e2bacfe6d7b4_53174657',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e2bacfe6d7b4_53174657')) {function content_55e2bacfe6d7b4_53174657($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_dir']->value==0) {?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
ok.png" alt="Папка свободна" title="Папка свободна" style='width:20px;vertical-align: bottom;margin-left: 10px;'/>
<?php } else { ?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
stop.png" alt="Папка уже занята, или содержит недопустимые символы" title="Папка уже занята, или содержит недопустимые символы"  style='width:20px;vertical-align: bottom;margin-left: 10px;'/><?php }?><?php }} ?>
