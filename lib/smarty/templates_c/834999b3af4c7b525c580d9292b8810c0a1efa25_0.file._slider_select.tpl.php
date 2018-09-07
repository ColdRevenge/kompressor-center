<?php /* Smarty version 3.1.24, created on 2018-07-02 08:34:20
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/_slider_select.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13081224445b39b95c959504_51094993%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '834999b3af4c7b525c580d9292b8810c0a1efa25' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/catalog/templates/_slider_select.tpl',
      1 => 1530509447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13081224445b39b95c959504_51094993',
  'variables' => 
  array (
    'name' => 0,
    'id' => 0,
    'chars_id' => 0,
    'char' => 0,
    '_char_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39b95c97cd14_29152225',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39b95c97cd14_29152225')) {
function content_5b39b95c97cd14_29152225 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '13081224445b39b95c959504_51094993';
?>
<div class="podbor-list__cell podbor-item">
    <div class="podbor-item__data">
        <div class="podbor-item__title"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
:</div>
        <div class="podbor-item__value">
            <select class="podbor-item__select" name="char_value[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]">
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
        </div>
    </div>
</div><?php }
}
?>