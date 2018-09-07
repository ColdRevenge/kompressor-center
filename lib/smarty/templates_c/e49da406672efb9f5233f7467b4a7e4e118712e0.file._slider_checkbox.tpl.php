<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:32:59
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/templates/_slider_checkbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:44090727155d4696bcb0de0-73131734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e49da406672efb9f5233f7467b4a7e4e118712e0' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/templates/_slider_checkbox.tpl',
      1 => 1435692144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44090727155d4696bcb0de0-73131734',
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
  'unifunc' => 'content_55d4696bde19d7_42362439',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4696bde19d7_42362439')) {function content_55d4696bde19d7_42362439($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><?php $_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['id']->value,'sort'=>$_smarty_tpl->tpl_vars['sort']->value,'is_desc_char'=>$_smarty_tpl->tpl_vars['is_desc_char']->value),$_smarty_tpl));?>

<?php if (count($_smarty_tpl->tpl_vars['chars_id']->value)) {?>
    <div class="<?php if ($_smarty_tpl->tpl_vars['id']->value==2||$_smarty_tpl->tpl_vars['id']->value==63) {?>podbor-param-color<?php }?>">
        <div class="p-sel"><?php echo $_smarty_tpl->tpl_vars['name']->value;
if ($_smarty_tpl->tpl_vars['id']->value==2||$_smarty_tpl->tpl_vars['id']->value==63) {?><span id="color-title">&nbsp;</span><?php }?></div>
        <div class="p-check">
            <div style="text-align: center">
                <?php  $_smarty_tpl->tpl_vars["char"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_id']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char"]->key => $_smarty_tpl->tpl_vars["char"]->value) {
$_smarty_tpl->tpl_vars["char"]->_loop = true;
?>
                    <?php if (($_smarty_tpl->tpl_vars['id']->value==2||$_smarty_tpl->tpl_vars['id']->value==63)&&$_smarty_tpl->tpl_vars['char']->value->icon) {?>
                        <?php $_smarty_tpl->tpl_vars["_char_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char']->value->id, null, 0);?>
                        <div<?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id==2||$_smarty_tpl->tpl_vars['char']->value->characteristic_id==63) {?> class="set-color-filtr<?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value]==1) {?> color-active-filtr<?php }?>"<?php }?>><?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id==2||$_smarty_tpl->tpl_vars['char']->value->characteristic_id==63) {?><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" style="background-image: url(/images/icons/<?php echo $_smarty_tpl->tpl_vars['char']->value->icon;?>
)" title="<?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
"><input style="display: none;"<?php if ($_smarty_tpl->tpl_vars['id']->value==2||$_smarty_tpl->tpl_vars['id']->value==63) {?>  title="<?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value]==1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><div>&nbsp;</div></label><?php } else { ?><input id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value]==1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
"><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
</label><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
">&nbsp;</label><?php }?></div>
                            <?php }?>
                        <?php } ?>  
            </div>
            <?php  $_smarty_tpl->tpl_vars["char"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_id']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char"]->key => $_smarty_tpl->tpl_vars["char"]->value) {
$_smarty_tpl->tpl_vars["char"]->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars["_char_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char']->value->id, null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['id']->value!=63&&$_smarty_tpl->tpl_vars['id']->value!=2&&$_smarty_tpl->tpl_vars['_char_id']->value!=170) {?>
                    <div<?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id==2||$_smarty_tpl->tpl_vars['char']->value->characteristic_id==63) {?> class="set-color-filtr<?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value]==1) {?> color-active-filtr<?php }?>"<?php }?>><?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id==2||$_smarty_tpl->tpl_vars['char']->value->characteristic_id==63) {?><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" style="background-image: url(/images/icons/<?php echo $_smarty_tpl->tpl_vars['char']->value->icon;?>
)"><input style="display: none;" id="checkbox_c" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value]==1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><div>&nbsp;</div></label><?php } else { ?><input id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value]==1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
"><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
</label><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
">&nbsp;</label><?php }?></div>
                        <?php }?>
                    <?php } ?> 
        </div>
    </div>
<?php }?>
<?php }} ?>
