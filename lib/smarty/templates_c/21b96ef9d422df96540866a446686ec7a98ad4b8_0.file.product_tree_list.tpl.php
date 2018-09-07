<?php /* Smarty version 3.1.24, created on 2015-10-28 15:22:51
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/category/templates/product_tree_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20332886545630be1b431ad2_25238873%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21b96ef9d422df96540866a446686ec7a98ad4b8' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/category/templates/product_tree_list.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20332886545630be1b431ad2_25238873',
  'variables' => 
  array (
    'id' => 0,
    'tree' => 0,
    'subtree' => 0,
    'key' => 0,
    'level' => 0,
    '_parent_id' => 0,
    'admin_url' => 0,
    'type' => 0,
    'offset' => 0,
    'category_id' => 0,
    '_id' => 0,
    'sys_images_url' => 0,
    'inc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630be1b4e32d1_56525302',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630be1b4e32d1_56525302')) {
function content_5630be1b4e32d1_56525302 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20332886545630be1b431ad2_25238873';
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
            <?php $_smarty_tpl->tpl_vars["_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id, null, 0);?>
            <?php $_smarty_tpl->tpl_vars["_parent_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->parent_id, null, 0);?>
            <tbody class="level_<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
 parent_product_<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->parent_id;?>
" <?php if ($_SESSION['admin_category_minimize'][$_smarty_tpl->tpl_vars['_parent_id']->value] == 1) {?> style="display: none"<?php }?>>
                <tr>
                    <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
'">
                        <div style="margin-left:<?php echo $_smarty_tpl->tpl_vars['level']->value*$_smarty_tpl->tpl_vars['offset']->value;?>
px;"><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
/" style="<?php if ($_smarty_tpl->tpl_vars['category_id']->value == $_smarty_tpl->tpl_vars['subtree']->value->id) {?>font-weight:bold;<?php }
if ($_smarty_tpl->tpl_vars['subtree']->value->is_visible == 0) {?>color:gray;<?php }?>"><?php echo stripslashes($_smarty_tpl->tpl_vars['subtree']->value->name);?>
</a> (<?php echo $_smarty_tpl->tpl_vars['subtree']->value->count;?>
)</div>
                    </td>
                    <td class="minumizeMenu">
                        <?php if (count($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['_id']->value][0])) {?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/menu_arrow_<?php if ($_SESSION['admin_category_minimize'][$_smarty_tpl->tpl_vars['_id']->value] != '1') {?>m<?php } else { ?>l<?php }?>.png" alt="" title="Свернуть/Развернуть"  class="parent_product_<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id;?>
" rel="<?php echo $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id;?>
"  />
                        <?php }?>
                    </td>
            </tbody>
        <?php }?>
        <?php echo $_smarty_tpl->getSubTemplate ("product_tree_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'offset'=>$_smarty_tpl->tpl_vars['offset']->value), 0);
?>

    <?php
$_smarty_tpl->tpl_vars["subtree"] = $foreach_subtree_Sav;
}
?>
<?php }
}
}
?>