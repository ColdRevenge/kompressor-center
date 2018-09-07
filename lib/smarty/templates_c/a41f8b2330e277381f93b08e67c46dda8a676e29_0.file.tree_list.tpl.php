<?php /* Smarty version 3.1.24, created on 2015-09-14 17:16:02
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/characteristics/templates/tree_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:143262986955f6d6a2cec1d1_08519404%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a41f8b2330e277381f93b08e67c46dda8a676e29' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/characteristics/templates/tree_list.tpl',
      1 => 1423307966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143262986955f6d6a2cec1d1_08519404',
  'variables' => 
  array (
    'id' => 0,
    'tree' => 0,
    'subtree' => 0,
    'char_category_id' => 0,
    'level' => 0,
    'offset' => 0,
    'limit' => 0,
    'tree_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f6d6a2d22a35_10444166',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f6d6a2d22a35_10444166')) {
function content_55f6d6a2d22a35_10444166 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '143262986955f6d6a2cec1d1_08519404';
if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0] != '') {
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
if ($_smarty_tpl->tpl_vars['subtree']->value->id) {?><option value="<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['char_category_id']->value == $_smarty_tpl->tpl_vars['subtree']->value->id) {?> selected="selected"<?php }?>><?php echo str_repeat('&nbsp;',($_smarty_tpl->tpl_vars['level']->value*$_smarty_tpl->tpl_vars['offset']->value));
echo stripslashes($_smarty_tpl->tpl_vars['subtree']->value->name);?>
</option><?php }
if ($_smarty_tpl->tpl_vars['level']->value < $_smarty_tpl->tpl_vars['limit']->value) {
echo $_smarty_tpl->getSubTemplate ("tree_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>$_smarty_tpl->tpl_vars['subtree']->value->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'char_category_id'=>$_smarty_tpl->tpl_vars['char_category_id']->value,'tree_url'=>$_smarty_tpl->tpl_vars['tree_url']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'offset'=>$_smarty_tpl->tpl_vars['offset']->value,'limit'=>$_smarty_tpl->tpl_vars['limit']->value), 0);
}
$_smarty_tpl->tpl_vars["subtree"] = $foreach_subtree_Sav;
}
}
}
}
?>