<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 15:45:42
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/characteristics/templates/tree_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4697464455d5cbf6e5aa90-30245804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6ebc600462e41f051fa5b11c83d08989724ddf0' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/characteristics/templates/tree_list.tpl',
      1 => 1423307966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4697464455d5cbf6e5aa90-30245804',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5cbf6ea4897_54083162',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5cbf6ea4897_54083162')) {function content_55d5cbf6ea4897_54083162($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0]!='') {
$_smarty_tpl->tpl_vars["subtree"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subtree"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subtree"]->key => $_smarty_tpl->tpl_vars["subtree"]->value) {
$_smarty_tpl->tpl_vars["subtree"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["subtree"]->key;
if ($_smarty_tpl->tpl_vars['subtree']->value->id) {?><option value="<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['char_category_id']->value==$_smarty_tpl->tpl_vars['subtree']->value->id) {?> selected="selected"<?php }?>><?php echo str_repeat('&nbsp;',($_smarty_tpl->tpl_vars['level']->value*$_smarty_tpl->tpl_vars['offset']->value));
echo stripslashes($_smarty_tpl->tpl_vars['subtree']->value->name);?>
</option><?php }
if ($_smarty_tpl->tpl_vars['level']->value<$_smarty_tpl->tpl_vars['limit']->value) {
echo $_smarty_tpl->getSubTemplate ("tree_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['subtree']->value->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'char_category_id'=>$_smarty_tpl->tpl_vars['char_category_id']->value,'tree_url'=>$_smarty_tpl->tpl_vars['tree_url']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'offset'=>$_smarty_tpl->tpl_vars['offset']->value,'limit'=>$_smarty_tpl->tpl_vars['limit']->value), 0);
}
}
}?><?php }} ?>
