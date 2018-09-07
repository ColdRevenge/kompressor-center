<?php /* Smarty version 3.1.24, created on 2018-07-02 09:00:50
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/category/templates/tree_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18457792635b39bf92aac2b7_51314048%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53b218c325180163a438ca05c88afc60edbe7ee0' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/category/templates/tree_list.tpl',
      1 => 1530509449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18457792635b39bf92aac2b7_51314048',
  'variables' => 
  array (
    'id' => 0,
    'tree' => 0,
    'subtree' => 0,
    'category_id' => 0,
    'tree_url' => 0,
    'is_modal' => 0,
    'level' => 0,
    'offset' => 0,
    'type' => 0,
    'key' => 0,
    'inc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39bf92b45b60_30511393',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39bf92b45b60_30511393')) {
function content_5b39bf92b45b60_30511393 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18457792635b39bf92aac2b7_51314048';
?>

<?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0] != '') {?>
<?php
$_from = $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["subtree"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["subtree"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["subtree"]->value) {
$_smarty_tpl->tpl_vars["subtree"]->_loop = true;
$foreach_subtree_Sav = $_smarty_tpl->tpl_vars["subtree"];
?>
<?php if ($_smarty_tpl->tpl_vars['subtree']->value->id) {?>
<tbody class="<?php if ($_smarty_tpl->tpl_vars['category_id']->value == $_smarty_tpl->tpl_vars['subtree']->value->id) {?>tbody_hover <?php }?>tbody" >
    <tr>
        <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['tree_url']->value;
echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
/<?php if ($_smarty_tpl->tpl_vars['is_modal']->value == 1) {?>?is_modal=1<?php }?>'">
            <div style="margin-left:<?php echo $_smarty_tpl->tpl_vars['level']->value*$_smarty_tpl->tpl_vars['offset']->value;?>
px;"><a href="<?php echo $_smarty_tpl->tpl_vars['tree_url']->value;
echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
/<?php if ($_smarty_tpl->tpl_vars['is_modal']->value == 1) {?>?is_modal=1<?php }?>" style="<?php if ($_smarty_tpl->tpl_vars['category_id']->value == $_smarty_tpl->tpl_vars['subtree']->value->id) {?>font-weight:bold;<?php }
if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible == 0) {?>color:gray;<?php }?>"><?php echo stripslashes($_smarty_tpl->tpl_vars['subtree']->value->name);?>
</a></div>
        </td>
		<?php if ($_smarty_tpl->tpl_vars['type']->value == 5) {?>
			<td align="center" valign="top"><input type="text" name="order[<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
]" style="width: 30px;text-align: center;" value="<?php echo $_smarty_tpl->tpl_vars['subtree']->value->order;?>
" /></td>
			<td align="center"><a href="/xadmin/category/edit/5/<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
/?not_menu=1" rel="add_banners_menu"><img src="/images/sys/admin/edit.png" align="middle" hspace="1" alt="Редактировать"></a></td>
			<td align="center">
				<a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить раздел?','/xadmin/category/list/5/3/<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
/?not_menu=1');">
                <img src="/images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить раздел"></a>
			</td>
		<?php }?>
</tbody>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("tree_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'tree_url'=>$_smarty_tpl->tpl_vars['tree_url']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'offset'=>$_smarty_tpl->tpl_vars['offset']->value), 0);
?>

<?php
$_smarty_tpl->tpl_vars["subtree"] = $foreach_subtree_Sav;
}
?>
<?php }
}
}
?>