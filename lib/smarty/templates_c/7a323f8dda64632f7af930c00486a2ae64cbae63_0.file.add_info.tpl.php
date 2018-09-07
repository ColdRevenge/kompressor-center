<?php /* Smarty version 3.1.24, created on 2015-09-13 16:51:33
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/order/templates/add_info.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:89595446455f57f655240e2_05527808%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a323f8dda64632f7af930c00486a2ae64cbae63' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/order/templates/add_info.tpl',
      1 => 1441288898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89595446455f57f655240e2_05527808',
  'variables' => 
  array (
    'is_mobile' => 0,
    'is_payment' => 0,
    'order' => 0,
    'method_name' => 0,
    'payment_form' => 0,
    'sig' => 0,
    'metrika_order' => 0,
    'products' => 0,
    'product' => 0,
    'gallery_url' => 0,
    '_shop_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57f65653ef6_71657481',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57f65653ef6_71657481')) {
function content_55f57f65653ef6_71657481 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '89595446455f57f655240e2_05527808';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {
echo $_smarty_tpl->getSubTemplate ("add_info_mobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
} else { ?>
    <div class="text">
        <div class="text-page" style="min-height: 100px;">
            <h1 style="margin-top: 10px;">Оформить заказ</h1>
            <?php if ($_smarty_tpl->tpl_vars['is_payment']->value == 1) {?>

                <h2>Оплата заказа</h2>
                <?php if ($_smarty_tpl->tpl_vars['order']->value->payment_method_id == 1) {?>
                    <p>Ваш заказ принят. Наш менеджер свяжется с вами в ближайшее время. Спасибо</p>
                <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->payment_method_id == 2) {?>
                    <p>Ваш заказ принят. На указанный Вами электронный адрес в ближайшее время будет выставлен счёт на оплату. Спасибо</p>
                <?php } else { ?>
                    <p>Для завершения оформления заказа  его необходимо оплатить: </p>
                <?php }?>

                <p style="line-height: 1.6em;">
                    Заказ №: <b><?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</b><br/>
                    Сумма к оплате: <b><?php echo number_format($_smarty_tpl->tpl_vars['order']->value->sum_total,"0","."," ");?>
 руб.</b><br/>
                    Метод оплаты: <b><?php echo (($tmp = @$_smarty_tpl->tpl_vars['method_name']->value)===null||$tmp==='' ? "Наличными" : $tmp);?>
</b>

                    <?php if ($_GET['pay_success'] == 1) {?>
                        <br/><br/><br/>
                    <h2 style="text-align: center">Ваш заказ успешно оплачен!!</h2>
                    <h3 style="text-align: center">В ближайшее время с Вами свяжется наш менеджер, для уточнения деталей</h3>
                    <br/><br/>
                <?php } elseif ($_GET['pay_error'] == 1) {?>
                    <br/>
                    <?php echo $_smarty_tpl->tpl_vars['payment_form']->value;?>

                    <h2 style="text-align: center;color: #f94208;">Ваш заказ не оплачен</h2>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['payment_form']->value;?>

                <?php }?>
                </p>

                <?php $_smarty_tpl->tpl_vars["all_price"] = new Smarty_Variable($_smarty_tpl->tpl_vars['order']->value->delivery_price, null, 0);?>
                <?php $_smarty_tpl->tpl_vars["all_price_not_delivery"] = new Smarty_Variable(0, null, 0);?>


                


            <?php } else { ?>  <br/>  
                <h3 style="text-align: center;">Заказ успешно оформлен! <br/>В ближайшее время с вами свяжутся наши менеджеры<br/><br/>Ваш номер заказа: <b><?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</b></h3>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['sig']->value) {?>
                    
                <div style="text-align: center; padding-top: 21px;">
                    <div id="fieldset">&nbsp;</div>
                </div>
            <?php }?>
        </div>
        <br/>
        <?php echo '<script'; ?>
 type="text/javascript">
        var yaParams = <?php echo $_smarty_tpl->tpl_vars['metrika_order']->value;?>

        <?php echo '</script'; ?>
> 
        <h1 style="margin-bottom: 15px;">Ваш заказ</h1>
        <table cellpadding="4" cellspacing="0" border="3" width="100%"  style="width: 90%; margin: 10px auto;">
            <tbody>
                <tr>
                    <td valign="middle" align="center" class="table_header">&nbsp;</td>
                    <!--                <td valign="middle" align="center">&nbsp;</td>-->
                    <td valign="middle" align="center" class="table_header" style="width: 200px;">Название</td>
                    <td valign="middle" align="center" class="table_header">Кол-во</td>
                    <td valign="middle" align="center" class="table_header">Стоимость</td>
                </tr>
            </tbody>
            <?php $_smarty_tpl->tpl_vars["all_price"] = new Smarty_Variable($_smarty_tpl->tpl_vars['order']->value->delivery_price, null, 0);?>
            <?php $_smarty_tpl->tpl_vars["all_price_not_delivery"] = new Smarty_Variable(0, null, 0);?>
            <?php
$_from = $_smarty_tpl->tpl_vars['products']->value;
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
                <?php if ($_smarty_tpl->tpl_vars['product']->value->shop_id == '1') {?>
                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://lalipop.ru/", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id == '2') {?>
                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://lady.lalipop.ru/", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id == '3') {?>
                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://platok.lalipop.ru/", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id == '4') {?>
                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://sumka.lalipop.ru/", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['product']->value->shop_id == '5') {?>
                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://woman.lalipop.ru/", null, 0);?>
                <?php }?>
                <tbody>
                    <tr>
                        <!--            <td valign="middle" align="center">&nbsp;</td>-->
                        <td valign="middle" align="center" style="text-align: center;">
                            <?php if ($_smarty_tpl->tpl_vars['product']->value->file) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product']->value->file;?>
" alt="" /><?php }?>

                        </td>
                        <td valign="middle" align="center">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/" style="font-size: 16px;" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
 </a>
                               


                            
                            
                        </td>
                        <td valign="middle" align="center"> 
                            <?php echo $_smarty_tpl->tpl_vars['product']->value->count;?>
 шт.</td>
                        <td valign="middle" align="center"><span class="price" style="font-size: 17px"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['product']->value->sum,0),",","&nbsp;");?>
 руб.</span></td>
                    </tr>
                </tbody>
            <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
            </tbody>
            <tr>
                <td valign="middle" align="right" colspan="6" style="font-size: 17px;background: none;text-align: right; padding-top: 10px;">
                    Итого: <b  style="font-size: 18px;font-weight: normal"><?php echo smarty_modifier_replace(number_format(($_smarty_tpl->tpl_vars['order']->value->sum_order+$_smarty_tpl->tpl_vars['order']->value->sum_delivery),0),",","&nbsp;");?>
 руб. </b> <?php if ($_smarty_tpl->tpl_vars['order']->value->discount_procent && !$_smarty_tpl->tpl_vars['order']->value->coupon_discount_sum) {?><b style="font-size: 20px; color: #e41b1f">-<?php echo $_smarty_tpl->tpl_vars['order']->value->discount_procent;?>
%</b> = <b style="font-size: 18px; font-weight: normal"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['order']->value->sum_total,0),",","&nbsp;");?>
 руб.</b><?php }?>
                </td>
            </tr>



            <?php if ($_smarty_tpl->tpl_vars['order']->value->discount_sum != 0) {?> 
                    <tbody>
                        <tr>
                            <td valign="middle" align="right" colspan="6" style="font-size: 17px;text-align: right; background-color: transparent; color: red;">
                                Стоимость с учетом скидки: <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['order']->value->sum_total,0),",","&nbsp;");?>
 руб.</td>
                        </tr>
                    </tbody>
                <?php }?>
            </table>

            <h1 style="margin-top: 0; padding-top: 0">Информация о заказе</h1>
            <div style="padding: 10px 20px; width: 85%;margin: auto">
                <table cellpadding="4" cellspacing="0" border="0" class="table_fields" style="margin: auto; ">
                    <tbody style="">
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>ФИО:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['order']->value->fio)===null||$tmp==='' ? "-" : $tmp);?>
</i></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>Телефон:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['order']->value->phone)===null||$tmp==='' ? "-" : $tmp);?>
</i></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>E-Mail:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['order']->value->email)===null||$tmp==='' ? "-" : $tmp);?>
</i></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>Доставка:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i><?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_name) {
echo $_smarty_tpl->tpl_vars['order']->value->delivery_name;?>
 (<?php echo $_smarty_tpl->tpl_vars['order']->value->delivery_price;?>
)<?php } else { ?>-<?php }?></i></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>Адрес:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['order']->value->adress)===null||$tmp==='' ? "-" : $tmp);?>
</i></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>Комментарий:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i><?php echo (($tmp = @$_smarty_tpl->tpl_vars['order']->value->comment)===null||$tmp==='' ? "-" : $tmp);?>
</i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br/><br/><br/><br/>
    <?php }
}
}
?>