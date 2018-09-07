<?php /* Smarty version 3.1.24, created on 2015-09-13 18:29:17
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/_slider_select_sumka.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:146280389755f5964db67e62_31103563%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c49cd7490cd08820b273f2ad0a550ff236819b8' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/_slider_select_sumka.tpl',
      1 => 1436701545,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146280389755f5964db67e62_31103563',
  'variables' => 
  array (
    'id' => 0,
    'sort' => 0,
    'chars_id' => 0,
    'name' => 0,
    'char' => 0,
    '_char_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f5964db8ef07_83563376',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f5964db8ef07_83563376')) {
function content_55f5964db8ef07_83563376 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '146280389755f5964db67e62_31103563';
$_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['id']->value,'sort'=>$_smarty_tpl->tpl_vars['sort']->value),$_smarty_tpl));?>


<?php if (count($_smarty_tpl->tpl_vars['chars_id']->value)) {?>
    <span>
        <select name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
            <option value="0"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</option>
            <?php
$_from = $_smarty_tpl->tpl_vars['chars_id']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["char"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["char"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["char"]->value) {
$_smarty_tpl->tpl_vars["char"]->_loop = true;
$foreach_char_Sav = $_smarty_tpl->tpl_vars["char"];
?>
                <?php $_smarty_tpl->tpl_vars["_char_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['char']->value->id, null, 0);?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>selected="selected"<?php }?>><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
</option>
            <?php
$_smarty_tpl->tpl_vars["char"] = $foreach_char_Sav;
}
?>  
        </select>
    </span>
<?php }
}
}
?>