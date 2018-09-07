<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 17:08:29
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/uploader/templates/getFiles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19126731555d5df5de32738-12585432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41c473ca422fd4ecf9a6d77b2ffb2cc65b921a8c' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/uploader/templates/getFiles.tpl',
      1 => 1423307977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19126731555d5df5de32738-12585432',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'files' => 0,
    'preview_url' => 0,
    'file' => 0,
    'admin_url' => 0,
    'action_id' => 0,
    'sys_images_url' => 0,
    'act_url' => 0,
    'type' => 0,
    'item_key' => 0,
    'url' => 0,
    'file_1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5df5e004b85_70345120',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5df5e004b85_70345120')) {function content_55d5df5e004b85_70345120($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><?php  $_smarty_tpl->tpl_vars["file"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["file"]->_loop = false;
 $_smarty_tpl->tpl_vars["item_key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['files']->value[100]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["file"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["files"]['total'] = $_smarty_tpl->tpl_vars["file"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["files"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["file"]->key => $_smarty_tpl->tpl_vars["file"]->value) {
$_smarty_tpl->tpl_vars["file"]->_loop = true;
 $_smarty_tpl->tpl_vars["item_key"]->value = $_smarty_tpl->tpl_vars["file"]->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["files"]['iteration']++;
?>
    <div class="up-img">
        <img src="<?php echo $_smarty_tpl->tpl_vars['preview_url']->value;
echo $_smarty_tpl->tpl_vars['file']->value->file;?>
" alt="" />
        <div class="up-del">
            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить?')) { AjaxRequest('uploader_images_<?php echo $_smarty_tpl->tpl_vars['file']->value->type;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
uploader/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->type)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->category_id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->page_id)===null||$tmp==='' ? 0 : $tmp);?>
/1/<?php echo $_smarty_tpl->tpl_vars['file']->value->file_id;?>
/<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
/', '100'); }"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
up-del.png" alt="" /></a>
        </div>
        <?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['files']['iteration']!=1||$_smarty_tpl->getVariable('smarty')->value['foreach']['files']['iteration']!=$_smarty_tpl->getVariable('smarty')->value['foreach']['files']['total'])||($_smarty_tpl->tpl_vars['act_url']->value||$_smarty_tpl->tpl_vars['type']->value==2200)) {?>
            <div class="up-nav">
                <?php if ($_smarty_tpl->tpl_vars['type']->value==2200) {?> 
                    <div class="up-action">
                        <a href="javascript:void(0)" style="margin-left: 20px" onclick="pasteImage('<?php if ($_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->file) {
echo $_smarty_tpl->tpl_vars['url']->value;?>
files/mail/<?php echo $_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->file;
} else {
$_smarty_tpl->tpl_vars["file_1"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["file_1"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value[0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["file_1"]->key => $_smarty_tpl->tpl_vars["file_1"]->value) {
$_smarty_tpl->tpl_vars["file_1"]->_loop = true;
if ($_smarty_tpl->tpl_vars['file_1']->value->file_id==$_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->id&&$_smarty_tpl->tpl_vars['file_1']->value->resize_type==0) {
echo $_smarty_tpl->tpl_vars['url']->value;?>
files/articles/images/<?php echo $_smarty_tpl->tpl_vars['file_1']->value->file;
}
}
}?>', '')"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
add_icon.png" alt="" title="Добавить картинку в текст статьи" /></a>
                    </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['act_url']->value) {?>
                    <div class="up-action">
                        <a href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['act_url']->value,"#img_id#",$_smarty_tpl->tpl_vars['file']->value->file_id);?>
?not_menu=1" class="fancy_up_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
action.png" alt="" /></a>
                    </div>
                <?php }?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['files']['iteration']!=1) {?><div class="up-back"><a href="javascript:void(0)" onclick="AjaxRequest('uploader_images_<?php echo $_smarty_tpl->tpl_vars['file']->value->type;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
uploader/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->type)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->category_id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->page_id)===null||$tmp==='' ? 0 : $tmp);?>
/2/<?php echo $_smarty_tpl->tpl_vars['file']->value->file_id;?>
/<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
/', '100');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
arrow_left.png" alt="" /></a></div><?php }?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['files']['iteration']!=$_smarty_tpl->getVariable('smarty')->value['foreach']['files']['total']) {?><div class="up-next"><a href="javascript:void(0)" onclick="AjaxRequest('uploader_images_<?php echo $_smarty_tpl->tpl_vars['file']->value->type;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
uploader/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->type)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->category_id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->page_id)===null||$tmp==='' ? 0 : $tmp);?>
/3/<?php echo $_smarty_tpl->tpl_vars['file']->value->file_id;?>
/<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
/', '100');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
arrow_right.png" alt="" /></a></div><?php }?>
    </div>
<?php }?>

</div>
<?php } ?>
<div class="clear">&nbsp;</div>
<?php  $_smarty_tpl->tpl_vars["file"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["file"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value[200]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["file"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["files"]['total'] = $_smarty_tpl->tpl_vars["file"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["files"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["file"]->key => $_smarty_tpl->tpl_vars["file"]->value) {
$_smarty_tpl->tpl_vars["file"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["files"]['iteration']++;
?>
    <div class="up-img">
        <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
file.png" alt="" />
        <div class="up-del">
            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить?')) { AjaxRequest('uploader_images_<?php echo $_smarty_tpl->tpl_vars['file']->value->type;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
uploader/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->type)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->category_id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->page_id)===null||$tmp==='' ? 0 : $tmp);?>
/1/<?php echo $_smarty_tpl->tpl_vars['file']->value->id;?>
/', '100'); }"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
up-del.png" alt="" /></a>
        </div>
        <?php echo substr($_smarty_tpl->tpl_vars['file']->value->name,0,16);?>


    </div>
<?php } ?>
<div class="clear">&nbsp;</div>
<?php }} ?>
