<?php /* Smarty version 3.1.24, created on 2015-09-15 16:56:58
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/page/templates/is_pseudo_dir.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7405074755f823aaae7384_65466982%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fac7daf290576939dbd61feff1fd60c38ea3989' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/page/templates/is_pseudo_dir.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7405074755f823aaae7384_65466982',
  'variables' => 
  array (
    'is_dir' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f823aab16b68_64100866',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f823aab16b68_64100866')) {
function content_55f823aab16b68_64100866 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7405074755f823aaae7384_65466982';
if ($_smarty_tpl->tpl_vars['is_dir']->value == 0) {?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
ok.png" alt="Папка свободна" title="Папка свободна" style='width:20px;vertical-align: bottom;margin-left: 10px;'/>
<?php } else { ?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
stop.png" alt="Папка уже занята, или содержит недопустимые символы" title="Папка уже занята, или содержит недопустимые символы"  style='width:20px;vertical-align: bottom;margin-left: 10px;'/><?php }
}
}
?>