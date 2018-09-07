<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-22 13:13:38
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/uploader_article/templates/getFiles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129355258255d84b52e24ba7-82008868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1150f99c9f5f769737545a3e5f2fa6b20cadfe9' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/uploader_article/templates/getFiles.tpl',
      1 => 1423307977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129355258255d84b52e24ba7-82008868',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'files' => 0,
    'preview_url' => 0,
    'file' => 0,
    'url' => 0,
    'action_id' => 0,
    'sys_images_url' => 0,
    'act_url' => 0,
    'item_key' => 0,
    'file_1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d84b52f19bb3_17113380',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d84b52f19bb3_17113380')) {function content_55d84b52f19bb3_17113380($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars["file"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["file"]->_loop = false;
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
', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
uploader_article/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->type)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->category_id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->page_id)===null||$tmp==='' ? 0 : $tmp);?>
/1/<?php echo $_smarty_tpl->tpl_vars['file']->value->file_id;?>
/<?php echo $_smarty_tpl->tpl_vars['action_id']->value;?>
/', '100'); }"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
up-del.png" alt="" /></a>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['file']->value->type!=1600) {?>
            <?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['files']['iteration']!=1||$_smarty_tpl->getVariable('smarty')->value['foreach']['files']['iteration']!=$_smarty_tpl->getVariable('smarty')->value['foreach']['files']['total'])||$_smarty_tpl->tpl_vars['act_url']->value) {?>
                <div class="up-nav">
                    <?php if ($_smarty_tpl->tpl_vars['act_url']->value) {?>
                        <div class="up-action">
                            <a href="javascript:void(0)" onclick="pasteImage('<?php if ($_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->file) {
echo $_smarty_tpl->tpl_vars['url']->value;?>
files/articles/images/<?php echo $_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->file;
}?>', '<?php  $_smarty_tpl->tpl_vars["file_1"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["file_1"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value[2]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["file_1"]->key => $_smarty_tpl->tpl_vars["file_1"]->value) {
$_smarty_tpl->tpl_vars["file_1"]->_loop = true;
if ($_smarty_tpl->tpl_vars['file_1']->value->file_id==$_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->id&&$_smarty_tpl->tpl_vars['file_1']->value->resize_type==2) {
echo $_smarty_tpl->tpl_vars['url']->value;?>
files/articles/images/<?php echo $_smarty_tpl->tpl_vars['file_1']->value->file;
}
} ?>')"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
add_small.png" alt="" title="Добавить картинку  в текст статьи(с увиличением)" /></a>
                            <a href="javascript:void(0)" style="margin-left: 20px" onclick="pasteImage('<?php if ($_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->file) {
echo $_smarty_tpl->tpl_vars['url']->value;?>
files/articles/images/<?php echo $_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->file;
}?>', '<?php  $_smarty_tpl->tpl_vars["file_1"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["file_1"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['files']->value[1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["file_1"]->key => $_smarty_tpl->tpl_vars["file_1"]->value) {
$_smarty_tpl->tpl_vars["file_1"]->_loop = true;
if ($_smarty_tpl->tpl_vars['file_1']->value->file_id==$_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->id&&$_smarty_tpl->tpl_vars['file_1']->value->resize_type==1) {
echo $_smarty_tpl->tpl_vars['url']->value;?>
files/articles/images/<?php echo $_smarty_tpl->tpl_vars['file_1']->value->file;
}
} ?>')"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
add_icon.png" alt="" title="Добавить картинку в текст статьи" /></a>
                        </div>
                    <?php }?>
                </div>
            <?php }?>
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
', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
uploader_article/get/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->type)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->category_id)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['file']->value->page_id)===null||$tmp==='' ? 0 : $tmp);?>
/1/<?php echo $_smarty_tpl->tpl_vars['file']->value->id;?>
/', '100'); }"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
up-del.png" alt="" /></a>

        </div>
        <div class="up-nav">
            <?php if ($_smarty_tpl->tpl_vars['act_url']->value) {?>
                <div class="up-action">
                    <a href="javascript:void(0)" onclick="pasteFile('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
files/articles/images/<?php echo $_smarty_tpl->tpl_vars['file']->value->file;?>
', '<?php echo $_smarty_tpl->tpl_vars['file']->value->size;?>
')"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
add_icon.png" alt="" title="Добавить картинку в текст статьи" /></a>
                </div>
            <?php }?>
        </div>
        <?php echo substr($_smarty_tpl->tpl_vars['file']->value->name,0,16);?>


    </div>
<?php } ?>
<div class="clear">&nbsp;</div><?php }} ?>
