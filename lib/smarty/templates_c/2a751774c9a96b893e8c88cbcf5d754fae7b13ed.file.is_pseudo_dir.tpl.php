<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 16:55:08
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/is_pseudo_dir.tpl" */ ?>
<?php /*%%SmartyHeaderCode:67107846655d5dc3ceb2ac1-47149144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a751774c9a96b893e8c88cbcf5d754fae7b13ed' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/is_pseudo_dir.tpl',
      1 => 1423307965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67107846655d5dc3ceb2ac1-47149144',
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
  'unifunc' => 'content_55d5dc3cee7fb3_28583580',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5dc3cee7fb3_28583580')) {function content_55d5dc3cee7fb3_28583580($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_dir']->value==0) {?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
ok.png" alt="Папка свободна" title="Папка свободна" style='width:20px;vertical-align: top;margin-left: 10px;'/>
<?php } else { ?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
stop.png" alt="Папка уже занята" title="Папка уже занята"  style='width:20px;vertical-align: top;margin-left: 10px;'/><?php }?><?php }} ?>
