<?php /* Smarty version 3.1.24, created on 2018-07-02 08:34:20
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/_slider_checkbox.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:6348005585b39b95c7a6dc0_87288048%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62bcf23ffadd3df5a0ac5b2e7266dd1622c3b182' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/_slider_checkbox.tpl',
      1 => 1530509447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6348005585b39b95c7a6dc0_87288048',
  'variables' => 
  array (
    'name' => 0,
    'chars_id' => 0,
    'id' => 0,
    'char' => 0,
    '_char_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39b95c85bb05_51679692',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39b95c85bb05_51679692')) {
function content_5b39b95c85bb05_51679692 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '6348005585b39b95c7a6dc0_87288048';
?>
<div class="podbor-list__cell podbor-item">
    <div class="podbor-item__data">
        <div class="podbor-item__title"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
:</div>
        <div class="podbor-item__value">
            <div style="text-align: center">
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
                    <?php if ($_smarty_tpl->tpl_vars['id']->value == 2 && $_smarty_tpl->tpl_vars['char']->value->icon) {?>
                        <?php $_smarty_tpl->tpl_vars["_char_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['char']->value->id, null, 0);?>
                        <div <?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id == 2) {?> class="set-color-filtr<?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?> color-active-filtr<?php }?>"<?php }?>>
                            <?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id == 2) {?>
                                <label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" style="background-image: url(/images/icons/<?php echo $_smarty_tpl->tpl_vars['char']->value->icon;?>
)" title="<?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
">
                                    <input style="display: none;" id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" />
                                    <div>&nbsp;</div>
                                </label>
                            <?php } else { ?>
                                <input id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" />
                                <label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
"><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
</label><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
">&nbsp;</label>
                            <?php }?>
                        </div>
                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars["char"] = $foreach_char_Sav;
}
?>  
            </div>
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
                <?php if ($_smarty_tpl->tpl_vars['id']->value != 2 && $_smarty_tpl->tpl_vars['_char_id']->value != 170) {?>
                    <div <?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id == 2) {?>class="set-color-filtr<?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?> color-active-filtr<?php }?>"<?php }?>>
                        <?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id == 2) {?>
                            <label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" style="background-image: url(/images/icons/<?php echo $_smarty_tpl->tpl_vars['char']->value->icon;?>
)">
                                <input style="display: none;" id="checkbox_c" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" />
                                <div>&nbsp;</div>
                            </label>
                        <?php } else { ?>
                            <input id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" />
                            <label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
"><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
</label>
                            <label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
">&nbsp;</label>
                        <?php }?>
                    </div>
                <?php }?>
            <?php
$_smarty_tpl->tpl_vars["char"] = $foreach_char_Sav;
}
?> 
        </div>
    </div>
</div><?php }
}
?>