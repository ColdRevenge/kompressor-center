<?php /* Smarty version 3.1.24, created on 2015-09-16 11:57:19
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/mod_list_row_td.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:153762694555f92eefcfb912_47540980%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '105547340246848e44cf6876896235dda10aa5e8' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/products/templates/mod_list_row_td.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153762694555f92eefcfb912_47540980',
  'variables' => 
  array (
    'shop' => 0,
    'product_mod' => 0,
    'currency' => 0,
    'curr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f92eefd24ba5_23475996',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f92eefd24ba5_23475996')) {
function content_55f92eefd24ba5_23475996 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '153762694555f92eefcfb912_47540980';
if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'platok' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
<tr>
    <td valign="middle" align="right">Состав: </td>
    <td valign="middle" align="left">
        <input type="text" name="mod_name[]" value="<?php echo $_smarty_tpl->tpl_vars['product_mod']->value->name;?>
"  style="width: 325px;"/>
    </td>
</tr> 
<?php }?>
<tr>
    <td valign="middle" align="right">Артикул: </td>
    <td valign="middle" align="left">
        <input type="text" name="mod_article[]" value="<?php echo $_smarty_tpl->tpl_vars['product_mod']->value->article;?>
"  style="width: 125px;"/>
    </td>
</tr>
<tr>
    <td valign="middle" align="right">Закупочная цена: </td>
    <td valign="middle" align="left">
        <input type="text" name="mod_cost_price[]" value="<?php echo $_smarty_tpl->tpl_vars['product_mod']->value->cost_price;?>
"  style="width: 125px;"/>
    </td>
</tr>
<tr>
    <td valign="middle" align="right">Цена: </td>
    <td valign="middle" align="left">
        <input type="text" name="mod_price[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_mod']->value->price)===null||$tmp==='' ? 0 : $tmp);?>
" style="width: 125px;" />


        <select name="mod_currency_id[]" style="width: 50px;">
            <?php
$_from = $_smarty_tpl->tpl_vars['currency']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["curr"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["curr"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["curr"]->value) {
$_smarty_tpl->tpl_vars["curr"]->_loop = true;
$foreach_curr_Sav = $_smarty_tpl->tpl_vars["curr"];
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['curr']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['curr']->value->name;?>
</option>
            <?php
$_smarty_tpl->tpl_vars["curr"] = $foreach_curr_Sav;
}
?>    
        </select>
    </td>
</tr>


<tr>
    <td valign="middle" align="right">Старая цена: </td>
    <td valign="middle" align="left">
        <input type="text" name="mod_old_price[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_mod']->value->old_price)===null||$tmp==='' ? 0 : $tmp);?>
" style="width: 125px;" />
    </td>
</tr>
<tr>
    <td valign="middle" align="right">На складе: </td>
    <td valign="middle" align="left">
        <input type="text" name="mod_warehouse[]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['product_mod']->value->warehouse)===null||$tmp==='' ? 100 : $tmp);?>
" maxlength="11"  style="width: 50px;" />
    </td>
</tr><?php }
}
?>