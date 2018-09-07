<?php /* Smarty version 3.1.24, created on 2017-02-03 00:18:50
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/templates/tree_select.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7767945575893a23ab9bab3_13416144%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b00806c57ee3016adc98c80d50e3fe88fcfc45fe' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/templates/tree_select.tpl',
      1 => 1485559689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7767945575893a23ab9bab3_13416144',
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
  'version' => '3.1.24',
  'unifunc' => 'content_5893a23ad978d4_13129289',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5893a23ad978d4_13129289')) {
function content_5893a23ad978d4_13129289 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7767945575893a23ab9bab3_13416144';
if ($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][0] != '') {?>
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
<!--Раздел нельзя поместить в него самого-->
<?php if ($_smarty_tpl->tpl_vars['current_id']->value != $_smarty_tpl->tpl_vars['subtree']->value->id) {?> <?php $_smarty_tpl->tpl_vars["level_indent"] = new Smarty_Variable($_smarty_tpl->tpl_vars['level']->value*4, null, 0);?>
<option value="<?php echo $_smarty_tpl->tpl_vars['subtree']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['subtree']->value->id == $_smarty_tpl->tpl_vars['selected_id']->value) {?>selected<?php }?>><?php echo preg_replace('!^!m',str_repeat("&nbsp;",$_smarty_tpl->tpl_vars['level_indent']->value),'');
echo stripslashes($_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->name);?>
</option>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['inc']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('current_id'=>$_smarty_tpl->tpl_vars['current_id']->value,'id'=>$_smarty_tpl->tpl_vars['tree']->value[$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['key']->value]->id,'tree'=>$_smarty_tpl->tpl_vars['tree']->value,'inc'=>$_smarty_tpl->tpl_vars['inc']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1,'selected_id'=>$_smarty_tpl->tpl_vars['selected_id']->value), 0);
?>

<?php }
$_smarty_tpl->tpl_vars["subtree"] = $foreach_subtree_Sav;
}
?>
<?php }
}
}
?>