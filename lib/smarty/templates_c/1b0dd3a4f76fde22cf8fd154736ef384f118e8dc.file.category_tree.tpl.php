<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-25 13:05:00
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/category_tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209605135555d5dc2be534a5-68653273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b0dd3a4f76fde22cf8fd154736ef384f118e8dc' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/category_tree.tpl',
      1 => 1440497097,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209605135555d5dc2be534a5-68653273',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5dc2c01be93_28335828',
  'variables' => 
  array (
    'id' => 0,
    'tree' => 0,
    'subtree' => 0,
    'type' => 0,
    'MyURL' => 0,
    'key' => 0,
    'level' => 0,
    'sys_images_url' => 0,
    'inc' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5dc2c01be93_28335828')) {function content_55d5dc2c01be93_28335828($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0]!='') {?>
    <?php  $_smarty_tpl->tpl_vars["subtree"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subtree"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subtree"]->key => $_smarty_tpl->tpl_vars["subtree"]->value) {
$_smarty_tpl->tpl_vars["subtree"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["subtree"]->key;
?>
        <tbody class="check_<?php echo $_smarty_tpl->tpl_vars['subtree']->value->parent_id;?>
">
            <tr>
                <td>
                    <label class="p-check"><input type="checkbox" value="1" name="category_id[<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
]" onchange="checkMenu.checkClass(this, 'check_<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
')" /><em>&nbsp;</em></label>
                </td>
                <td align="left" valign="middle" style="cursor: pointer;" title="Редактировать" onclick="location.href =<?php if ($_smarty_tpl->tpl_vars['type']->value!=0&&$_smarty_tpl->tpl_vars['type']->value!=100) {?>'<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/edit/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id;?>
/'<?php } else { ?>'<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id;?>
/'<?php }?>">
                    <div style="margin-left:<?php echo $_smarty_tpl->tpl_vars['level']->value*32;?>
px;<?php if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible==0) {?>color:#999999;<?php }?>"><?php echo stripslashes($_smarty_tpl->tpl_vars['subtree']->value->name);?>
</div>
                </td>
                <td align="center" valign="middle">
                    <div style="<?php if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible==0) {?>color:#999999;<?php }?>"><input type="text" name="order[<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['subtree']->value->order;?>
" style="width: 40px; text-align: center;" maxlength="4" /></div>
                </td>

                <td align="center" valign="middle">
                    <a href="<?php if ($_smarty_tpl->tpl_vars['type']->value==0||$_smarty_tpl->tpl_vars['type']->value==100) {
echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
add/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id;?>
/<?php } else {
echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/add/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id;?>
/<?php }?>"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/add.png" align="middle"  hspace="1" alt="Создать подраздел" /></a>
                    <?php if ($_smarty_tpl->tpl_vars['type']->value!=0) {?><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/edit/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id;?>
/"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a><?php } else { ?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
edit/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id;?>
/"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->not_delete=="0") {?>
                            <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить раздел?', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/3/<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id;?>
/');">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" alt="Удалить раздел" /></a>
                            <?php }?>
                    </td>
                </tr>
            </tbody>
            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['inc']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), 0);?>

            <?php } ?>
                <?php }?><?php }} ?>
