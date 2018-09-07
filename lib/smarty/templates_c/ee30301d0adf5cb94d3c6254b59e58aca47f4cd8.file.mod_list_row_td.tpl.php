<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 18:11:07
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/mod_list_row_td.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20769228055d46a66454ff8-66867739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee30301d0adf5cb94d3c6254b59e58aca47f4cd8' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/products/templates/mod_list_row_td.tpl',
      1 => 1440169853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20769228055d46a66454ff8-66867739',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46a6648ae94_45752494',
  'variables' => 
  array (
    'shop' => 0,
    'product_mod' => 0,
    'currency' => 0,
    'curr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46a6648ae94_45752494')) {function content_55d46a6648ae94_45752494($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='platok'||$_smarty_tpl->tpl_vars['shop']->value=='woman') {?>
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
            <?php  $_smarty_tpl->tpl_vars["curr"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["curr"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currency']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["curr"]->key => $_smarty_tpl->tpl_vars["curr"]->value) {
$_smarty_tpl->tpl_vars["curr"]->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['curr']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['curr']->value->name;?>
</option>
            <?php } ?>    
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
</tr><?php }} ?>
