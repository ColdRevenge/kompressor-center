<?php /* Smarty version 3.1.24, created on 2018-07-02 08:45:38
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/category/templates/page_tree_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17096687595b39bc02e0e8a1_01706999%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6432e9c1bf31771d1085801a79b428ff0a048ef1' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/category/templates/page_tree_list.tpl',
      1 => 1530509449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17096687595b39bc02e0e8a1_01706999',
  'variables' => 
  array (
    'id' => 0,
    'tree' => 0,
    'subtree' => 0,
    'category_id' => 0,
    'admin_url' => 0,
    'level' => 0,
    'offset' => 0,
    'key' => 0,
    'inc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39bc02e92f09_91461124',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39bc02e92f09_91461124')) {
function content_5b39bc02e92f09_91461124 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '17096687595b39bc02e0e8a1_01706999';
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
        <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/list/0/<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
/'">
            <div style="margin-left:<?php echo $_smarty_tpl->tpl_vars['level']->value*$_smarty_tpl->tpl_vars['offset']->value;?>
px;"><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/list/0/<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
/" style="<?php if ($_smarty_tpl->tpl_vars['category_id']->value == $_smarty_tpl->tpl_vars['subtree']->value->id) {?>font-weight:bold;<?php }
if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible == 0) {?>color:gray;<?php }?>"><?php echo stripslashes($_smarty_tpl->tpl_vars['subtree']->value->name);?>
</a> (<?php echo $_smarty_tpl->tpl_vars['subtree']->value->count;?>
)</div>
        </td>
      
</tbody>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("page_tree_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'offset'=>$_smarty_tpl->tpl_vars['offset']->value), 0);
?>

<?php
$_smarty_tpl->tpl_vars["subtree"] = $foreach_subtree_Sav;
}
?>
<?php }
}
}
?>