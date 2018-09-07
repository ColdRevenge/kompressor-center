<?php /* Smarty version 3.1.24, created on 2018-07-02 11:44:22
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/category/templates/is_pseudo_dir.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16184658515b39e5e6a9ae45_68172859%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fe6d1378b7580123877c18bf7c2bb3a88191d69' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/category/templates/is_pseudo_dir.tpl',
      1 => 1530509448,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16184658515b39e5e6a9ae45_68172859',
  'variables' => 
  array (
    'is_dir' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39e5e6ad1b89_85297908',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39e5e6ad1b89_85297908')) {
function content_5b39e5e6ad1b89_85297908 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16184658515b39e5e6a9ae45_68172859';
if ($_smarty_tpl->tpl_vars['is_dir']->value == 0) {?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
ok.png" alt="Папка свободна" title="Папка свободна" style='width:20px;vertical-align: top;margin-left: 10px;'/>
<?php } else { ?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
stop.png" alt="Папка уже занята" title="Папка уже занята"  style='width:20px;vertical-align: top;margin-left: 10px;'/><?php }
}
}
?>