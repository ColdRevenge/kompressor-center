<?php /* Smarty version 3.1.24, created on 2018-07-02 08:45:43
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/uploader_article/templates/getFiles.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1820867305b39bc0727dcb4_68578678%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '388610ed66a33641eb5603d3b3776fae1fbd0cb6' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/uploader_article/templates/getFiles.tpl',
      1 => 1530509518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1820867305b39bc0727dcb4_68578678',
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
  'version' => '3.1.24',
  'unifunc' => 'content_5b39bc07337b45_32894702',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39bc07337b45_32894702')) {
function content_5b39bc07337b45_32894702 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1820867305b39bc0727dcb4_68578678';
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
        <?php if ($_smarty_tpl->tpl_vars['file']->value->type != 1600) {?>
            <?php if (((isset($_smarty_tpl->tpl_vars['__foreach_files']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_files']->value['iteration'] : null) != 1 || (isset($_smarty_tpl->tpl_vars['__foreach_files']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_files']->value['iteration'] : null) != (isset($_smarty_tpl->tpl_vars['__foreach_files']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_files']->value['total'] : null)) || $_smarty_tpl->tpl_vars['act_url']->value) {?>
                <div class="up-nav">
                    <?php if ($_smarty_tpl->tpl_vars['act_url']->value) {?>
                        <div class="up-action">
                            <a href="javascript:void(0)" onclick="pasteImage('<?php if ($_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->file) {
echo $_smarty_tpl->tpl_vars['url']->value;?>
files/articles/images/<?php echo $_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->file;
}?>', '<?php
$_from = $_smarty_tpl->tpl_vars['files']->value[2];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["file_1"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["file_1"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["file_1"]->value) {
$_smarty_tpl->tpl_vars["file_1"]->_loop = true;
$foreach_file_1_Sav = $_smarty_tpl->tpl_vars["file_1"];
if ($_smarty_tpl->tpl_vars['file_1']->value->file_id == $_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->id && $_smarty_tpl->tpl_vars['file_1']->value->resize_type == 2) {
echo $_smarty_tpl->tpl_vars['url']->value;?>
files/articles/images/<?php echo $_smarty_tpl->tpl_vars['file_1']->value->file;
}
$_smarty_tpl->tpl_vars["file_1"] = $foreach_file_1_Sav;
}
?>')"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
add_small.png" alt="" title="Добавить картинку  в текст статьи(с увиличением)" /></a>
                            <a href="javascript:void(0)" style="margin-left: 20px" onclick="pasteImage('<?php if ($_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->file) {
echo $_smarty_tpl->tpl_vars['url']->value;?>
files/articles/images/<?php echo $_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->file;
}?>', '<?php
$_from = $_smarty_tpl->tpl_vars['files']->value[1];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["file_1"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["file_1"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["file_1"]->value) {
$_smarty_tpl->tpl_vars["file_1"]->_loop = true;
$foreach_file_1_Sav = $_smarty_tpl->tpl_vars["file_1"];
if ($_smarty_tpl->tpl_vars['file_1']->value->file_id == $_smarty_tpl->tpl_vars['files']->value[0][$_smarty_tpl->tpl_vars['item_key']->value]->id && $_smarty_tpl->tpl_vars['file_1']->value->resize_type == 1) {
echo $_smarty_tpl->tpl_vars['url']->value;?>
files/articles/images/<?php echo $_smarty_tpl->tpl_vars['file_1']->value->file;
}
$_smarty_tpl->tpl_vars["file_1"] = $foreach_file_1_Sav;
}
?>')"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
add_icon.png" alt="" title="Добавить картинку в текст статьи" /></a>
                        </div>
                    <?php }?>
                </div>
            <?php }?>
        <?php }?>

    </div>
<?php
$_smarty_tpl->tpl_vars["file"] = $foreach_file_Sav;
}
?>
<div class="clear">&nbsp;</div>

<?php
$_from = $_smarty_tpl->tpl_vars['files']->value[200];
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
<?php
$_smarty_tpl->tpl_vars["file"] = $foreach_file_Sav;
}
?>
<div class="clear">&nbsp;</div><?php }
}
?>