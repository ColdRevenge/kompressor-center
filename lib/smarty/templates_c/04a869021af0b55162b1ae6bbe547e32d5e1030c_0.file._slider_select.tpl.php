<?php /* Smarty version 3.1.24, created on 2017-01-27 19:57:42
         compiled from "E:/OpenServer/domains/kc-pskov.dev/modules/catalog/templates/_slider_select.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1797588b7c064a5f29_59164573%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04a869021af0b55162b1ae6bbe547e32d5e1030c' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/modules/catalog/templates/_slider_select.tpl',
      1 => 1485536260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1797588b7c064a5f29_59164573',
  'variables' => 
  array (
    'id' => 0,
    'open_category_id' => 0,
    'sort' => 0,
    'chars_id' => 0,
    'name' => 0,
    'char' => 0,
    '_char_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588b7c065023b5_67049044',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b7c065023b5_67049044')) {
function content_588b7c065023b5_67049044 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once 'E:/OpenServer/domains/kc-pskov.dev/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '1797588b7c064a5f29_59164573';
$_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['id']->value,'open_category_id'=>(($tmp = @$_smarty_tpl->tpl_vars['open_category_id']->value)===null||$tmp==='' ? null : $tmp),'sort'=>$_smarty_tpl->tpl_vars['sort']->value),$_smarty_tpl));?>


<?php if (count($_smarty_tpl->tpl_vars['chars_id']->value)) {?>
    <div class="p-sel"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</div>
    <span>
        <select name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
            <option value="0">Выбрать</option>
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