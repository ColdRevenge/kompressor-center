<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 13:45:24
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/related/templates/product_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49441971355d594b1593015-95927133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a823105e63af184d0a97eea35d808f1ccfdfdacf' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/related/templates/product_list.tpl',
      1 => 1440067520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49441971355d594b1593015-95927133',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d594b166dd31_09847991',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d594b166dd31_09847991')) {function content_55d594b166dd31_09847991($_smarty_tpl) {?>        <?php if (count($_smarty_tpl->tpl_vars['products']->value)) {?>
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
        
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value->old_price) {?>
        <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->price*100/$_smarty_tpl->tpl_vars['product']->value->old_price, null, 0);?>
        <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_variable($_smarty_tpl->tpl_vars['discaunt']->value-100, null, 0);?>
        <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["discaunt"] = new Smarty_variable(0, null, 0);?>
        <?php }?>
        <?php $_smarty_tpl->tpl_vars["current_product_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->id, null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['product_id']->value!=$_smarty_tpl->tpl_vars['current_product_id']->value) {?>
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
        <?php } ?>

    </table>
</form>
<?php } else { ?>
<h1>Категория пуста &laquo;<?php echo $_smarty_tpl->tpl_vars['category_name']->value;?>
&raquo;</h1>
        <?php }?><?php }} ?>
