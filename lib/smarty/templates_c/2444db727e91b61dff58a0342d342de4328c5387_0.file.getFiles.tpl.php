<?php /* Smarty version 3.1.24, created on 2017-02-03 00:19:17
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/uploader_products/templates/getFiles.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10474830605893a2554e1200_61743050%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2444db727e91b61dff58a0342d342de4328c5387' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/uploader_products/templates/getFiles.tpl',
      1 => 1485559683,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10474830605893a2554e1200_61743050',
  'variables' => 
  array (
    'files' => 0,
    'preview_url' => 0,
    'file' => 0,
    'type' => 0,
    'url' => 0,
    'product_id' => 0,
    'sys_images_url' => 0,
    'act_url' => 0,
    'tech_files' => 0,
    'files_products_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5893a2555b9301_14928951',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5893a2555b9301_14928951')) {
function content_5893a2555b9301_14928951 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc-pskov/data/www/kc-pskov.ru/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '10474830605893a2554e1200_61743050';
$_from = $_smarty_tpl->tpl_vars['files']->value[100];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["file"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["file"]->_loop = false;
$_smarty_tpl->tpl_vars["item_key"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['__foreach_files'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["item_key"]->value => $_smarty_tpl->tpl_vars["file"]->value) {
$_smarty_tpl->tpl_vars["file"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_files']->value['iteration']++;
$foreach_file_Sav = $_smarty_tpl->tpl_vars["file"];
?>
    <div class="up-img">
        <img src="<?php echo $_smarty_tpl->tpl_vars['preview_url']->value;
echo $_smarty_tpl->tpl_vars['file']->value->file;?>
" alt="" />
        <div class="up-del">
            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить?')) { AjaxRequest('uploader_images_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
uploader_products/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->type)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
/1/<?php echo $_smarty_tpl->tpl_vars['file']->value->file_id;?>
/', '100'); }"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
up-del.png" alt="" /></a>
        </div>
      <?php if (((isset($_smarty_tpl->tpl_vars['__foreach_files']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_files']->value['iteration'] : null) != 1 || (isset($_smarty_tpl->tpl_vars['__foreach_files']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_files']->value['iteration'] : null) != (isset($_smarty_tpl->tpl_vars['__foreach_files']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_files']->value['total'] : null)) || $_smarty_tpl->tpl_vars['act_url']->value) {?>
            <div class="up-nav">
                <?php if ($_smarty_tpl->tpl_vars['act_url']->value) {?>
                    <div class="up-action">
                        <a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['act_url']->value,"#img_id#",$_smarty_tpl->tpl_vars['file']->value->file_id);?>
?not_menu=1" class="fancy_up_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
action.png" alt="" /></a>
                    </div>
                <?php }?>
            <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_files']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_files']->value['iteration'] : null) != 1) {?><div class="up-back"><a href="javascript:void(0)" onclick="AjaxRequest('uploader_images_<?php echo $_smarty_tpl->tpl_vars['file']->value->type;?>
', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
uploader_products/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->type)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
/2/<?php echo $_smarty_tpl->tpl_vars['file']->value->file_id;?>
/', '100');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
arrow_left.png" alt="" /></a></div><?php }?>
        <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_files']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_files']->value['iteration'] : null) != (isset($_smarty_tpl->tpl_vars['__foreach_files']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_files']->value['total'] : null)) {?><div class="up-next"><a href="javascript:void(0)" onclick="AjaxRequest('uploader_images_<?php echo $_smarty_tpl->tpl_vars['file']->value->type;?>
', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
uploader_products/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->type)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
/3/<?php echo $_smarty_tpl->tpl_vars['file']->value->file_id;?>
/', '100');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
arrow_right.png" alt="" /></a></div><?php }?>
    </div>
<?php }?>
    </div>
<?php
$_smarty_tpl->tpl_vars["file"] = $foreach_file_Sav;
}
?>
<div class="clear">&nbsp;</div>

<?php
$_from = $_smarty_tpl->tpl_vars['tech_files']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["file"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["file"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_files'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["file"]->value) {
$_smarty_tpl->tpl_vars["file"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_files']->value['iteration']++;
$foreach_file_Sav = $_smarty_tpl->tpl_vars["file"];
?>
    <div class="up-img">
        <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
file.png" alt="" />
        <div class="up-del">
            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить?')) { AjaxRequest('uploader_images_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
uploader_products/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->type)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
/5/<?php echo $_smarty_tpl->tpl_vars['file']->value->id;?>
/', '100'); }"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
up-del.png" alt="" /></a>
        </div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['files_products_url']->value;
echo $_smarty_tpl->tpl_vars['file']->value->file;?>
" target="_blank"><?php if (substr($_smarty_tpl->tpl_vars['file']->value->name,0,14)) {
echo substr($_smarty_tpl->tpl_vars['file']->value->name,0,16);
} else {
echo substr($_smarty_tpl->tpl_vars['file']->value->file,0,14);
}?></a>

    </div>
<?php
$_smarty_tpl->tpl_vars["file"] = $foreach_file_Sav;
}
?>
<div class="clear">&nbsp;</div><?php }
}
?>