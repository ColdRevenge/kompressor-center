<?php /* Smarty version 3.1.24, created on 2015-10-27 13:56:48
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/catalog/templates/_slider_checkbox.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1665158490562f58705f09a8_88880365%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91d68910a19c165a8614f00dc432cc7013f293f7' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/catalog/templates/_slider_checkbox.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1665158490562f58705f09a8_88880365',
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
  'version' => '3.1.24',
  'unifunc' => 'content_562f5870683562_58564979',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562f5870683562_58564979')) {
function content_562f5870683562_58564979 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/c10045/public_html/kompressor-center.com/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '1665158490562f58705f09a8_88880365';
$_smarty_tpl->assign("chars_id",$_smarty_tpl->smarty->registered_objects['this'][0]->getCharsPodbor(array('id'=>$_smarty_tpl->tpl_vars['id']->value,'sort'=>$_smarty_tpl->tpl_vars['sort']->value,'is_desc_char'=>$_smarty_tpl->tpl_vars['is_desc_char']->value),$_smarty_tpl));?>

<?php if (count($_smarty_tpl->tpl_vars['chars_id']->value)) {?>
    <div class="p-sel"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</div>
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
                <?php if ($_smarty_tpl->tpl_vars['id']->value == 2 && $_smarty_tpl->tpl_vars['char']->value->icon) {?>
                    <?php $_smarty_tpl->tpl_vars["_char_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['char']->value->id, null, 0);?>
                    <div<?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id == 2) {?> class="set-color-filtr<?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?> color-active-filtr<?php }?>"<?php }?>><?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id == 2) {?><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" style="background-image: url(/images/icons/<?php echo $_smarty_tpl->tpl_vars['char']->value->icon;?>
)" title="<?php echo stripslashes(smarty_modifier_replace($_smarty_tpl->tpl_vars['char']->value->name,"?",''));?>
"><input style="display: none;" id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><div>&nbsp;</div></label><?php } else { ?><input id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
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
                <div<?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id == 2) {?> class="set-color-filtr<?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?> color-active-filtr<?php }?>"<?php }?>><?php if ($_smarty_tpl->tpl_vars['char']->value->characteristic_id == 2) {?><label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" style="background-image: url(/images/icons/<?php echo $_smarty_tpl->tpl_vars['char']->value->icon;?>
)"><input style="display: none;" id="checkbox_c" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" /><div>&nbsp;</div></label><?php } else { ?><input id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
" type="checkbox" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
]" value="1" <?php if ($_POST['char_value'][$_smarty_tpl->tpl_vars['id']->value][$_smarty_tpl->tpl_vars['_char_id']->value] == 1) {?>checked="checked"<?php }?> id="checkbox_<?php echo $_smarty_tpl->tpl_vars['char']->value->id;?>
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
<?php }

}
}
?>