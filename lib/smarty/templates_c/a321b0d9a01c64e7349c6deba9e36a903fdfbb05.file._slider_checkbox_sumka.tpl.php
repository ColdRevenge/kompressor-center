<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:43:17
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/_slider_checkbox_sumka.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138239683655d46bd54238f3-32217701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a321b0d9a01c64e7349c6deba9e36a903fdfbb05' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/catalog/templates/_slider_checkbox_sumka.tpl',
      1 => 1436699833,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138239683655d46bd54238f3-32217701',
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
    'mod' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46bd553fad1_31447363',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46bd553fad1_31447363')) {function content_55d46bd553fad1_31447363($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><?php $_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['id']->value,'sort'=>$_smarty_tpl->tpl_vars['sort']->value,'is_desc_char'=>$_smarty_tpl->tpl_vars['is_desc_char']->value),$_smarty_tpl));?>

<?php if (count($_smarty_tpl->tpl_vars['chars_id']->value)) {?>
    <div class="<?php if ($_smarty_tpl->tpl_vars['id']->value==51) {?>podbor-param-size<?php } elseif ($_smarty_tpl->tpl_vars['id']->value==73) {?>podbor-param-color<?php } else { ?>podbor-param-sezon<?php }?>">
        <div class="p-sel"><?php echo $_smarty_tpl->tpl_vars['name']->value;
if ($_smarty_tpl->tpl_vars['id']->value==73) {?><span id="color-title">&nbsp;</span><?php }?></div>
        <?php if ($_smarty_tpl->tpl_vars['id']->value==73) {?> 
                <div class="p-check">
                    <div style="text-align: center">
                        <?php  $_smarty_tpl->tpl_vars["char"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_id']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char"]->key => $_smarty_tpl->tpl_vars["char"]->value) {
$_smarty_tpl->tpl_vars["char"]->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['id']->value==73&&$_smarty_tpl->tpl_vars['char']->value->icon) {?>
                                <?php $_smarty_tpl->tpl_vars["_char_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char']->value->id, null, 0);?>
                                <div<?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id==73) {?> class="set-color-filtr<?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value]==1) {?> color-active-filtr<?php }?>"<?php }?>><?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id==73) {?><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" style="background-image: url(/images/icons/<?php echo $_smarty_tpl->tpl_vars['char']->value->icon;?>
)" title="<?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
"><input style="display: none;"  title="<?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
" id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
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
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['id']->value==51) {?> 

                <div class="p-check p-check-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                    <?php  $_smarty_tpl->tpl_vars["char"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_id']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["char"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["char"]->key => $_smarty_tpl->tpl_vars["char"]->value) {
$_smarty_tpl->tpl_vars["char"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["char"]['index']++;
?>
                        <?php $_smarty_tpl->tpl_vars["_char_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char']->value->id, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["mod"] = new Smarty_variable(ceil(count($_smarty_tpl->tpl_vars['chars_id']->value)/4), null, 0);?>
                        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['char']['index']%$_smarty_tpl->tpl_vars['mod']->value==0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['char']['index']!=0) {?></div><div class="p-check p-check-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php }?>
                        <div><input id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value]==1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
"><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
</label><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
">&nbsp;</label></div>
                    <?php } ?>
                </div>

            <?php } else { ?> 
                <div class="p-check">
                    <?php  $_smarty_tpl->tpl_vars["char"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chars_id']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char"]->key => $_smarty_tpl->tpl_vars["char"]->value) {
$_smarty_tpl->tpl_vars["char"]->_loop = true;
?>
                        <?php $_smarty_tpl->tpl_vars["_char_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['char']->value->id, null, 0);?>
                        <div><input id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value]==1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
"><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
</label><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
">&nbsp;</label></div>
                            <?php } ?>

                </div>
            <?php }?>
        </div>
    <?php }?><?php }} ?>
