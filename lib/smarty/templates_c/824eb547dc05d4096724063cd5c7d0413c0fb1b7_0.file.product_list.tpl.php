<?php /* Smarty version 3.1.24, created on 2016-01-19 12:22:23
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/related/templates/product_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:30932710569e004f9d0a37_91684984%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '824eb547dc05d4096724063cd5c7d0413c0fb1b7' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/related/templates/product_list.tpl',
      1 => 1450788679,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30932710569e004f9d0a37_91684984',
  'variables' => 
  array (
    'products' => 0,
    'category_name' => 0,
    'product' => 0,
    'discaunt' => 0,
    'product_id' => 0,
    'current_product_id' => 0,
    'selected_product' => 0,
    'admin_url' => 0,
    'type' => 0,
    'category_id' => 0,
    'ldelim' => 0,
    'rdelim' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_569e004fd110b6_34096114',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569e004fd110b6_34096114')) {
function content_569e004fd110b6_34096114 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '30932710569e004f9d0a37_91684984';
?>
        <?php if (count($_smarty_tpl->tpl_vars['products']->value)) {?>
<h1>Категория &laquo;<?php echo $_smarty_tpl->tpl_vars['category_name']->value;?>
&raquo;</h1>
<form method="post" action="" id="related_save">
    <input type="hidden" name="related_send" value="1" />
    <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%" style="font-size: 12px;">

        <tbody class="table_header">
            <tr>
                <td valign="middle" align="center">&nbsp;</td>
                <td valign="middle" align="center">Название</td>
                <td valign="middle" align="center">Стоимость</td>
            </tr>
        </tbody>
        
        <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['product'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['product']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars['product'];
?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
        <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->price*100/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
        <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_Variable($_smarty_tpl->tpl_vars['discaunt']->value-100, null, 0);?>
        <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_Variable(0, null, 0);?>
        <?php }?>
        <?php $_smarty_tpl->tpl_vars["current_product_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['product_id']->value != $_smarty_tpl->tpl_vars['current_product_id']->value) {?>
            <tbody class="tbody">
            <tr>
                <td valign="middle" align="center">
                    <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['selected_product']->value[$_smarty_tpl->tpl_vars['current_product_id']->value]) {?>checked="checked"<?php }?> id="related_product_id_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" name="related_product_id[]"  onchange="AjaxFormRequest('product_list','related_save','<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
related/add/product/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['category_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
/'); AjaxQueryParentFrame('related_list_menu_<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
related/get/product/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['category_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
/<?php echo $_smarty_tpl->tpl_vars['product_id']->value;?>
/');return false;" />
                </td>
                <td valign="middle" align="center">
                    <img src="/images/gallery/<?php echo $_smarty_tpl->tpl_vars['product']->value->file;?>
" alt="" style="max-height: 80px;" />
                </td>
                <td valign="middle" align="center"  style="cursor: pointer;" onclick="if (document.getElementById('related_product_id_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
').checked) <?php echo $_smarty_tpl->tpl_vars['ldelim']->value;?>
document.getElementById('related_product_id_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
').checked = false;<?php echo $_smarty_tpl->tpl_vars['rdelim']->value;?>
 else <?php echo $_smarty_tpl->tpl_vars['ldelim']->value;?>
document.getElementById('related_product_id_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
').checked = true;$('#related_product_id_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
').change()<?php echo $_smarty_tpl->tpl_vars['rdelim']->value;?>
">
                        <?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>

                    <div class="notice">Артикул: <?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->article);?>
</div>

                </td>
                <td valign="middle" align="center"  style="cursor: pointer;" onclick="if (document.getElementById('related_product_id_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
').checked) <?php echo $_smarty_tpl->tpl_vars['ldelim']->value;?>
document.getElementById('related_product_id_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
').checked = false;<?php echo $_smarty_tpl->tpl_vars['rdelim']->value;?>
 else <?php echo $_smarty_tpl->tpl_vars['ldelim']->value;?>
document.getElementById('related_product_id_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
').checked = true;$('#related_product_id_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
').change()<?php echo $_smarty_tpl->tpl_vars['rdelim']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
 руб.</td>
            </tr>
        </tbody>
        <?php }?>
        <?php
$_smarty_tpl->tpl_vars['product'] = $foreach_product_Sav;
}
?>

    </table>
</form>
<?php } else { ?>
<h1>Категория пуста &laquo;<?php echo $_smarty_tpl->tpl_vars['category_name']->value;?>
&raquo;</h1>
        <?php }
}
}
?>