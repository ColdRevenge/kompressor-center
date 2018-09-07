<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:32:59
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/templates/_slider_select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89649526555d4696bc31c87-33505322%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '382821a945e1add2d2bdb99d2f6a1dcd797a4448' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/templates/_slider_select.tpl',
      1 => 1435241532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89649526555d4696bc31c87-33505322',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'sort' => 0,
    'is_desc_char' => 0,
    'chars_id' => 0,
    'name' => 0,
    'char' => 0,
    '_char_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4696bc65e89_11924954',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4696bc65e89_11924954')) {function content_55d4696bc65e89_11924954($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><?php $_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['id']->value,'sort'=>$_smarty_tpl->tpl_vars['sort']->value,'is_desc_char'=>$_smarty_tpl->tpl_vars['is_desc_char']->value),$_smarty_tpl));?>


<?php if (count($_smarty_tpl->tpl_vars['chars_id']->value)) {?>
    <div class="p-sel"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</div>
    <span>
        <select name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
            <option value="0">Выбрать</option>
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
