<?php /* Smarty version 3.1.24, created on 2017-01-27 22:13:30
         compiled from "E:/OpenServer/domains/kc-pskov.dev/modules/order/templates/mail_user.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:21404588b9bda6a4a86_23971583%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c24512cc3da513cbda46b9c02ee7cfa1db3848a' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/modules/order/templates/mail_user.tpl',
      1 => 1485497756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21404588b9bda6a4a86_23971583',
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
  'unifunc' => 'content_588b9bda7c6476_13244372',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b9bda7c6476_13244372')) {
function content_588b9bda7c6476_13244372 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once 'E:/OpenServer/domains/kc-pskov.dev/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '21404588b9bda6a4a86_23971583';
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
"><img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABQAAD/4QMqaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjUtYzAxNCA3OS4xNTE0ODEsIDIwMTMvMDMvMTMtMTI6MDk6MTUgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6N0EzQ0VFRTE1Qjg3MTFFNUJDMkZBRkVFQkYwQ0IyOTUiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6N0EzQ0VFRTI1Qjg3MTFFNUJDMkZBRkVFQkYwQ0IyOTUiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo3QTNDRUVERjVCODcxMUU1QkMyRkFGRUVCRjBDQjI5NSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo3QTNDRUVFMDVCODcxMUU1QkMyRkFGRUVCRjBDQjI5NSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pv/uAA5BZG9iZQBkwAAAAAH/2wCEAAICAgICAgICAgIDAgICAwQDAgID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" border="0"  alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['setting']->value->name);?>
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