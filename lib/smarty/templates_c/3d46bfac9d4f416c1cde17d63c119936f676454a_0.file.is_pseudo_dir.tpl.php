<?php /* Smarty version 3.1.24, created on 2015-10-28 15:24:20
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/category/templates/is_pseudo_dir.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20766556075630be74a50ce6_35178586%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d46bfac9d4f416c1cde17d63c119936f676454a' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/category/templates/is_pseudo_dir.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20766556075630be74a50ce6_35178586',
  'variables' => 
  array (
    'is_dir' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630be74a89504_78256107',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630be74a89504_78256107')) {
function content_5630be74a89504_78256107 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20766556075630be74a50ce6_35178586';
if ($_smarty_tpl->tpl_vars['is_dir']->value == 0) {?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
ok.png" alt="Папка свободна" title="Папка свободна" style='width:20px;vertical-align: top;margin-left: 10px;'/>
<?php } else { ?><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
stop.png" alt="Папка уже занята" title="Папка уже занята"  style='width:20px;vertical-align: top;margin-left: 10px;'/><?php }
}
}
?>