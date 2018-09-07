<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:37:06
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/templates/tree_select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159544305755d46a62aa5fc0-16609125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f733c49a70c86da5d5a4206ea9f005edcf67759a' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/templates/tree_select.tpl',
      1 => 1423307961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159544305755d46a62aa5fc0-16609125',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'tree' => 0,
    'current_id' => 0,
    'subtree' => 0,
    'level' => 0,
    'selected_id' => 0,
    'level_indent' => 0,
    'key' => 0,
    'inc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46a62afabb5_92533265',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46a62afabb5_92533265')) {function content_55d46a62afabb5_92533265($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0]!='') {?>
<?php  $_smarty_tpl->tpl_vars["subtree"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subtree"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subtree"]->key => $_smarty_tpl->tpl_vars["subtree"]->value) {
$_smarty_tpl->tpl_vars["subtree"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["subtree"]->key;
?>
<!--Раздел нельзя поместить в него самого-->
<?php if ($_smarty_tpl->tpl_vars['current_id']->value!=$_smarty_tpl->tpl_vars['subtree']->value->id) {?> <?php $_smarty_tpl->tpl_vars["level_indent"] = new Smarty_variable($_smarty_tpl->tpl_vars['level']->value*4, null, 0);?>
<option value="<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['subtree']->value->id==$_smarty_tpl->tpl_vars['selected_id']->value) {?>selected<?php }?>><?php echo preg_replace('!^!m',str_repeat("&nbsp;",$_smarty_tpl->tpl_vars['level_indent']->value),'');
echo stripslashes($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->name);?>
</option>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['inc']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('current_id'=>$_smarty_tpl->tpl_vars['current_id']->value,'id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'selected_id'=>$_smarty_tpl->tpl_vars['selected_id']->value), 0);?>

<?php }
} ?>
<?php }?><?php }} ?>
