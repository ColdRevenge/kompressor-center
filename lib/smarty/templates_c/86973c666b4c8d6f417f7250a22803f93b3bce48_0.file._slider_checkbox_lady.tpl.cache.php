<?php /* Smarty version 3.1.24, created on 2015-09-13 16:07:07
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/_slider_checkbox_lady.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:181654753855f574fb6ed827_98743723%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86973c666b4c8d6f417f7250a22803f93b3bce48' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/catalog/templates/_slider_checkbox_lady.tpl',
      1 => 1440259194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181654753855f574fb6ed827_98743723',
  'variables' => 
  array (
    'id' => 0,
    'sort' => 0,
    'is_desc_char' => 0,
    'chars_id' => 0,
    'name' => 0,
    'char' => 0,
    '_char_id' => 0,
    'selected_char_value_id' => 0,
    'mod' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f574fb7e3fd9_71711849',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f574fb7e3fd9_71711849')) {
function content_55f574fb7e3fd9_71711849 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '181654753855f574fb6ed827_98743723';
$_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['id']->value,'sort'=>$_smarty_tpl->tpl_vars['sort']->value,'is_desc_char'=>$_smarty_tpl->tpl_vars['is_desc_char']->value),$_smarty_tpl));?>

<?php if (count($_smarty_tpl->tpl_vars['chars_id']->value)) {?>
    <div class="<?php if ($_smarty_tpl->tpl_vars['id']->value == 51 || $_smarty_tpl->tpl_vars['id']->value == 118) {?>podbor-param-size<?php } elseif ($_smarty_tpl->tpl_vars['id']->value == 55 || $_smarty_tpl->tpl_vars['id']->value == 117) {?>podbor-param-color<?php } else { ?>podbor-param-sezon<?php }?>">
        <div class="p-sel"><?php echo $_smarty_tpl->tpl_vars['name']->value;
if ($_smarty_tpl->tpl_vars['id']->value == 55 || $_smarty_tpl->tpl_vars['id']->value == 117) {?><span id="color-title">&nbsp;</span><?php }?></div>
        <?php if ($_smarty_tpl->tpl_vars['id']->value == 55 || $_smarty_tpl->tpl_vars['id']->value == 117) {?> 
                <div class="p-check">
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
                            <?php if ($_smarty_tpl->tpl_vars['id']->value == (55 || $_smarty_tpl->tpl_vars['id']->value == 117) && $_smarty_tpl->tpl_vars['char']->value->icon) {?>
                                <?php $_smarty_tpl->tpl_vars["_char_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['char']->value->id, null, 0);?>
                                <div<?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id == 55 || $_smarty_tpl->tpl_vars['char']->value->characteristic_id == 117) {?> class="set-color-filtr<?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1 || $_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?> color-active-filtr<?php }?>"<?php }?>><?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id == 55 || $_smarty_tpl->tpl_vars['char']->value->characteristic_id == 117) {?><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" style="background-image: url(/images/icons/<?php echo $_smarty_tpl->tpl_vars['char']->value->icon;?>
)" title="<?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
"><input style="display: none;"  title="<?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
" id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1 || $_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><div>&nbsp;</div></label><?php } else { ?><input id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1 || $_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
"><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
</label><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
">&nbsp;</label><?php }?></div>
                                    <?php }?>
                                <?php
$_smarty_tpl->tpl_vars["char"] = $foreach_char_Sav;
}
?>  
                    </div>
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['id']->value == 51 || $_smarty_tpl->tpl_vars['id']->value == 118) {?> 

                <div class="p-check p-check-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                    <?php
$_from = $_smarty_tpl->tpl_vars['chars_id']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["char"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["char"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_char'] = new Smarty_Variable(array('index' => -1));
foreach ($_from as $_smarty_tpl->tpl_vars["char"]->value) {
$_smarty_tpl->tpl_vars["char"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_char']->value['index']++;
$foreach_char_Sav = $_smarty_tpl->tpl_vars["char"];
?>
                        <?php $_smarty_tpl->tpl_vars["_char_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['char']->value->id, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["mod"] = new Smarty_Variable(ceil(count($_smarty_tpl->tpl_vars['chars_id']->value)/4), null, 0);?>
                        <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_char']->value['index']) ? $_smarty_tpl->tpl_vars['__foreach_char']->value['index'] : null)%$_smarty_tpl->tpl_vars['mod']->value == 0 && (isset($_smarty_tpl->tpl_vars['__foreach_char']->value['index']) ? $_smarty_tpl->tpl_vars['__foreach_char']->value['index'] : null) != 0) {?></div><div class="p-check p-check-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php }?>
                        <div><input id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1 || $_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
"><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
</label><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
">&nbsp;</label></div>
                    <?php
$_smarty_tpl->tpl_vars["char"] = $foreach_char_Sav;
}
?>
                </div>

            <?php } else { ?> 
                <div class="p-check">
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
                        <div><input id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1 || $_smarty_tpl->tpl_vars['selected_char_value_id']->value[$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
"><?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
</label><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
">&nbsp;</label></div>
                            <?php
$_smarty_tpl->tpl_vars["char"] = $foreach_char_Sav;
}
?>

                </div>
            <?php }?>
        </div>
    <?php }
}
}
?>