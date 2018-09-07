<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:43:17
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/_slider_select_sumka.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104593017155d46bd5543704-46552929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd25316cc4699293e9280183599527a1c6ff6ea10' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/_slider_select_sumka.tpl',
      1 => 1436701545,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104593017155d46bd5543704-46552929',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46bd5571fd1_91303698',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46bd5571fd1_91303698')) {function content_55d46bd5571fd1_91303698($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><?php $_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['id']->value,'sort'=>$_smarty_tpl->tpl_vars['sort']->value),$_smarty_tpl));?>


<?php if (count($_smarty_tpl->tpl_vars['chars_id']->value)) {?>
    <span>
        <select name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
            <option value="0"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</option>
            <?php  $_smarty_tpl->tpl_vars["char"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_id']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char"]->key => $_smarty_tpl->tpl_vars["char"]->value) {
$_smarty_tpl->tpl_vars["char"]->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars["_char_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char']->value->id, null, 0);?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['_char_id']->value]==1) {?>selected="selected"<?php }?>><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
</option>
            <?php } ?>  
        </select>
    </span>
<?php }?><?php }} ?>
