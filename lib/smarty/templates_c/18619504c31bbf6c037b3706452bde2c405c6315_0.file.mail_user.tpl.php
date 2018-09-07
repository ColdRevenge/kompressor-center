<?php /* Smarty version 3.1.24, created on 2015-10-25 15:59:39
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/order/templates/mail_user.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:594540690562cd23b647600_53916521%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18619504c31bbf6c037b3706452bde2c405c6315' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/order/templates/mail_user.tpl',
      1 => 1445777850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '594540690562cd23b647600_53916521',
  'variables' => 
  array (
    'setting' => 0,
    'url' => 0,
    'mail_order' => 0,
    'metro' => 0,
    'delivery_child' => 0,
    'order' => 0,
    'mail_products' => 0,
    'product' => 0,
    'gallery_url' => 0,
    '_shop_url' => 0,
    'shop_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_562cd23b798e38_64944199',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562cd23b798e38_64944199')) {
function content_562cd23b798e38_64944199 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '594540690562cd23b647600_53916521';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" ></meta>
        <title><?php echo stripslashes($_smarty_tpl->tpl_vars['setting']->value->name);?>
</title>
    </head>
    <body bgcolor="#f6f5f3">
        <table width="700" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border: 1px solid #e8e7e5;">
            <tr>
                <td colspan="3" height="35"></td>
            </tr>
            <tr>
                <td width="35"></td>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr xmlns="">
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="50%" rowspan="2"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVEAAABHCAYAAAC+jnRwAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NTc3MiwgMjAxNC8wMS8xMy0xOTo0NDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjdEMjQ4MEJCOTU4ODExRTQ5QzZEQjQxM0EyRUZDMUNCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjdEMjQ4MEJDOTU4ODExRTQ5QzZEQjQxM0EyRUZDMUNCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6N0QyNDgwQjk5NTg4MTFFNDlDNkRCNDEzQTJFRkMxQ0IiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6N0QyNDgwQkE5NTg4MTFFNDlDNkRCNDEzQTJFRkMxQ0IiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4NZyFaAAAZ2ElEQVR42uxd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" border="0"  alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['setting']->value->name);?>
"></a></td>
                                        <td height="12"></td>
                                    </tr>
                                    <tr>
                                        <td width="50%" align="right"></td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr xmlns="">
                            <td height="45"></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr xmlns="">
                                        <td width="48"></td>
                                        <td width="580" valign="top">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <font size="5" face="Arial, sans-serif">Подтверждение заказа</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10"></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="3" face="Arial, sans-serif">Здравствуйте, <?php echo $_smarty_tpl->tpl_vars['mail_order']->value->fio;?>
! Вы оформили заказ в интернет магазине &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['setting']->value->name);?>
&raquo;.</font></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr xmlns="">
                                        <td colspan="2" height="48"></td>
                                    </tr>
                                    <tr xmlns="">
                                        <td width="48" valign="top"></td>
                                        <td width="580">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td><a style="text-decoration: none;" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
order/<?php echo $_smarty_tpl->tpl_vars['mail_order']->value->id;?>
/"><font size="4" face="Arial, sans-serif" color="#4b9f02">Заказ №<?php echo $_smarty_tpl->tpl_vars['mail_order']->value->id;?>
 в магазине &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['setting']->value->name);?>
&raquo;</font></a></td>
                                                </tr>
                                                <tr>
                                                    <td height="25"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td width="50%"><font size="2" face="Arial, sans-serif">Информация о доставке</font></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" height="12"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="50%" valign="top">
                                                                    <font size="3" face="Arial, sans-serif">
                                                                        <strong><?php echo stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->city_index);?>
  <?php echo stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->city);?>
  
                                                                            <?php echo stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->adress);?>
 <?php echo $_smarty_tpl->tpl_vars['metro']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['delivery_child']->value;?>
<br/><?php echo stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->fio);?>
<br>тел. <?php echo stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->phone);
if ($_smarty_tpl->tpl_vars['mail_order']->value->email) {?><br>e-mail:&nbsp;<a href="mailto:<?php echo stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->email);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->email);?>
</a><?php }?>
                                                                        </strong>
                                                                    </font>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" height="12"></td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="25"></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="2" face="Arial, sans-serif"></font></td>
                                                </tr>
                                                <tr>
                                                    <td height="30"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td colspan="5" height="12" style="border-top: 1px solid #e8e7e5;">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="50"><font size="2" face="Arial, sans-serif">Товар</font></td>
                                                                <td width="15"></td>
                                                                <td width="287"></td>
                                                                <td width="126" align="right"><font size="2" face="Arial, sans-serif">Количество</font></td>
                                                                <td width="102" align="right"><font size="2" face="Arial, sans-serif">Цена</font></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5" height="13" style="border-bottom: 1px solid #e8e7e5;">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5" height="10"></td>
                                                            </tr>


                                                            <?php $_smarty_tpl->tpl_vars["all_price"] = new Smarty_Variable($_smarty_tpl->tpl_vars['order']->value->delivery_price, null, 0);?>
                                                            <?php $_smarty_tpl->tpl_vars["all_price_not_delivery"] = new Smarty_Variable(0, null, 0);?>
                                                            <?php
$_from = $_smarty_tpl->tpl_vars['mail_products']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
                                                                <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['product']->value->product_id, null, 0);?>

                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable($_smarty_tpl->tpl_vars['url']->value, null, 0);?>

                                                                <tr>
                                                                    <td width="50" align="center" valign="middle">
                                                                        <?php if ($_smarty_tpl->tpl_vars['product']->value->file) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product']->value->file;?>
" alt="" border="0" /><?php }?>
                                                                    </td>
                                                                    <td width="15"></td>
                                                                    <td colspan="3" width="415">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td width="267">
                                                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/" style="text-decoration: none"><font size="2" color="#4b9f02" face="Arial, sans-serif"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</font> </a>
                                                                                            
                                                                                            
                                                                                            
                                                                                </td>
                                                                                <td width="136" valign="top" align="right">
                                                                                    <font size="2" face="Arial, sans-serif"><?php echo $_smarty_tpl->tpl_vars['product']->value->count;?>
 шт.</font>
                                                                                </td>
                                                                                <td width="112" valign="top" align="right">
                                                                                    <font size="2" face="Arial, sans-serif"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['product']->value->sum,0),",","&nbsp;");?>
 р.
                                                                                    </font>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['mail_order']->value->delivery_name) {?>
                                                                <tr>
                                                                    <td colspan="3" width="332"></td>
                                                                    <td width="136"><font size="2" face="Arial, sans-serif"><?php echo $_smarty_tpl->tpl_vars['mail_order']->value->delivery_name;?>
</font></td>
                                                                    <td width="112" align="right"><font size="2" face="Arial, sans-serif"><?php echo $_smarty_tpl->tpl_vars['mail_order']->value->sum_delivery;?>
  руб.</font></td>
                                                                </tr>
                                                            <?php }?>
                                                            <tr>
                                                                <td colspan="5" height="12" style="border-top: 1px solid #e8e7e5;">&nbsp;</td>
                                                            </tr>
                                                            <tr><td colspan="5" align="right">
                                                                    <font size="3" face="Arial, sans-serif"><strong>Итого:</strong></font> &nbsp; &nbsp; &nbsp;
                                                                    <font size="3" face="Arial, sans-serif"><b><?php echo smarty_modifier_replace(number_format(($_smarty_tpl->tpl_vars['mail_order']->value->sum_order+$_smarty_tpl->tpl_vars['mail_order']->value->sum_delivery),0),",","&nbsp;");?>
<font size="2">&nbsp;руб.</font> </b>&nbsp; &nbsp;
                                                                       <?php if ($_smarty_tpl->tpl_vars['mail_order']->value->discount_procent) {?><font color="red" size="4"><b>-<?php echo $_smarty_tpl->tpl_vars['mail_order']->value->discount_procent;?>
%</b></font>&nbsp; = &nbsp;<b><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['mail_order']->value->sum_total,0),",","&nbsp;");?>
<font size="2">&nbsp;руб.</font></b><?php }?> </font>
                                                                </td>
                                                            </tr>



                                                            <?php if ($_smarty_tpl->tpl_vars['mail_order']->value->discount_sum != 0) {?> 
                                                                    <tbody>
                                                                        <tr>
                                                                            <td valign="middle" align="right" colspan="5" style="font-size: 17px;text-align: right; background-color: transparent; color: red;">
                                                                                Стоимость с учетом скидки: <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['mail_order']->value->sum_total,0),",","&nbsp;");?>
 руб.</td>
                                                                        </tr>
                                                                    </tbody>
                                                                <?php }?>

                                                                <tr>
                                                                    <td colspan="5" height="16" style="border-bottom: 1px solid #e8e7e5;">&nbsp;</td>
                                                                </tr>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                    <tr><td height="21"></td>
                                                    </tr>
                                                    <?php if ($_smarty_tpl->tpl_vars['mail_order']->value->is_jur_person == 1) {?>
                                                        <tr>
                                                            <td>
                                                                <font size="3" face="Arial, sans-serif"><strong>Реквизиты компании</strong></font><br/>
                                                                <font size="2" face="Arial, sans-serif">
                                                                    <strong>Название: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_name));?>
<br/>
                                                                    <strong>Факс: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_fax));?>
<br/>
                                                                    <strong>ИНН: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_inn));?>
<br/>
                                                                    <strong>Юридический адрес: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_ur_adress));?>
<br/>
                                                                    <strong>Банк: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_bank));?>
<br/>
                                                                    <strong>БИК: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_bik));?>
<br/>
                                                                    <strong>P/c: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_rs));?>
<br/>
                                                                    <strong>К/c: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_ks));?>
<br/>
                                                                    <strong>КПП: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_kpp));?>
<br/>
                                                                    <strong>ОКПО: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_okpo));?>
<br/>
                                                                    <strong>ОКНХ: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_oknx));?>
<br/>
                                                                    <strong>ФИО Ген. директора: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_fio_director));?>
<br/>
                                                                    <strong>ФИО Гл. бухгалтера: </strong>&nbsp; <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['mail_order']->value->company_fio_accountant));?>

                                                                </font>
                                                            </td>
                                                        </tr>

                                                        <tr><td height="21"></td>
                                                        </tr>
                                                    <?php }?>
                                                    <tr>
                                                        <td><font size="2" face="Arial, sans-serif">Если у Вас возникли какие-либо вопросы, Вы можете уточнить информацию на&nbsp;<a style="text-decoration: none;" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><font size="2" face="Arial, sans-serif" color="#4b9f02">сайте магазина  </font></a>или позвонить в магазин по телефону <?php echo $_smarty_tpl->tpl_vars['setting']->value->phone_1;?>
</font></td>
                                                    </tr>
                                                </table></td>
                                        </tr>

                                        <tr xmlns="">
                                            <td height="38" colspan="2"></td>
                                        </tr>
                                        <tr xmlns=""><td colspan="2" height="21"></td></tr>
                                        <tr xmlns=""><td width="48"></td>
                                                   <td width="580" valign="top">
                                            <font size="3" face="Arial, sans-serif">С уважением,<br>  <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" style="text-decoration: none;">
                                                        <font color="#000">Интернет магазин &nbsp;&laquo;<?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
&raquo;</font></a></font>
                                        </td>
                                        </tr>
                                        <tr xmlns="">
                                            <td colspan="2" height="21"></td>
                                        </tr>
                                    </table>

                                </td>
                                <td width="35"></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>
        </body>
    </html>
<?php }
}
?>