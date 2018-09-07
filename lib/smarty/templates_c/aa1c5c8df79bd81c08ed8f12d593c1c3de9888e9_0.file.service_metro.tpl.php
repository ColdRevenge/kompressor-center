<?php /* Smarty version 3.1.24, created on 2015-09-13 23:25:12
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/delivery/templates/service_metro.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:184993964855f5dba81c1907_66844432%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa1c5c8df79bd81c08ed8f12d593c1c3de9888e9' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/delivery/templates/service_metro.tpl',
      1 => 1434202102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184993964855f5dba81c1907_66844432',
  'variables' => 
  array (
    'is_mobile' => 0,
    'metro' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f5dba823b637_43933002',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f5dba823b637_43933002')) {
function content_55f5dba823b637_43933002 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '184993964855f5dba81c1907_66844432';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
    <div style="padding-left: 20px;">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td valign="middle" align="left" style="text-align: left">
                        <select class="text" name="metro_id" style="width: 100%;">
                            <option value="">Ближайшее метро</option>
                            <?php
$_from = $_smarty_tpl->tpl_vars['metro']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_POST['metro_id'] == $_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                            <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                        </select>
                    </td>
                </tr>
                <?php echo $_smarty_tpl->getSubTemplate ("free_delivery_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            </tbody>
        </table>
    </div>
<?php } else { ?>
    <table class="table_fields">
        <tbody>
            <tr>
                <td valign="middle" align="right" style="text-align: right">Ближайшее метро: </td>
                <td valign="middle" align="left" style="text-align: left">
                    <select class="text" name="metro_id" style="width: 347px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
                        <option value="">Выбрать</option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['metro']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_POST['metro_id'] == $_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                        <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                    </select>
                </td>
            </tr>
            <?php echo $_smarty_tpl->getSubTemplate ("free_delivery_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </tbody>
    </table>
<?php }
}
}
?>