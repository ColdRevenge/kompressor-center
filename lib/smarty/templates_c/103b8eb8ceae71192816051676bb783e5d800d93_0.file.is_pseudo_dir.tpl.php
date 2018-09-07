<?php /* Smarty version 3.1.24, created on 2015-09-15 16:55:13
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/category/templates/is_pseudo_dir.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:122992285355f8234152e421_86016074%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '103b8eb8ceae71192816051676bb783e5d800d93' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/category/templates/is_pseudo_dir.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122992285355f8234152e421_86016074',
  'variables' => 
  array (
    'is_dir' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f8234155e432_30753624',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f8234155e432_30753624')) {
function content_55f8234155e432_30753624 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '122992285355f8234152e421_86016074';
if ($_smarty_tpl->tpl_vars['is_dir']->value == 0) {?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
ok.png" alt="Папка свободна" title="Папка свободна" style='width:20px;vertical-align: top;margin-left: 10px;'/>
<?php } else { ?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
stop.png" alt="Папка уже занята" title="Папка уже занята"  style='width:20px;vertical-align: top;margin-left: 10px;'/><?php }
}
}
?>