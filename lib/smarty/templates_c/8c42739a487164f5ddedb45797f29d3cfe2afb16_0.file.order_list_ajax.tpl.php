<?php /* Smarty version 3.1.24, created on 2015-12-25 14:41:13
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/order/templates/order_list_ajax.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:87603817567d2b591f01c3_12479421%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c42739a487164f5ddedb45797f29d3cfe2afb16' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/order/templates/order_list_ajax.tpl',
      1 => 1450788675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87603817567d2b591f01c3_12479421',
  'variables' => 
  array (
    'orders' => 0,
    'order' => 0,
    'getBlackList' => 0,
    'order_id' => 0,
    'admin_url' => 0,
    'sys_images_url' => 0,
    'cache_gde_posulka' => 0,
    'base_dir' => 0,
    'status' => 0,
    'status_item' => 0,
    'setting' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_567d2b59453cf8_43353113',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_567d2b59453cf8_43353113')) {
function content_567d2b59453cf8_43353113 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '87603817567d2b591f01c3_12479421';
?>

<?php if ($_smarty_tpl->tpl_vars['orders']->value) {?>

    <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%">
        <thead>
            <tr>
                <td valign="middle" align="center">№</td>
                <td valign="middle" align="center">Дата создания</td>
                <td valign="middle" align="center">Контактная информация</td>
                <td valign="middle" align="center">Адрес</td>
                <td valign="middle" align="center">Стоимость заказа</td>
                <td valign="middle" align="center" width="220">Статус</td>
                <td valign="middle" align="center" width="47">&nbsp;</td>
            </tr>
        </thead>
        <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_Variable("0", null, 0);?>
        <?php
$_from = $_smarty_tpl->tpl_vars['orders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["order"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["order"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_order'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->value) {
$_smarty_tpl->tpl_vars["order"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_order']->value['iteration']++;
$foreach_order_Sav = $_smarty_tpl->tpl_vars["order"];
?>
            <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_Variable($_smarty_tpl->tpl_vars['order']->value->id, null, 0);?>
            <tbody class="order_shop_<?php echo $_smarty_tpl->tpl_vars['order']->value->shop_id;?>
" <?php if (in_array($_smarty_tpl->tpl_vars['order']->value->email,$_smarty_tpl->tpl_vars['getBlackList']->value)) {?> style="color: red;"<?php }?> id="tbody_order_<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
">
                <tr> 

                    <td valign="middle" align="center"><a  href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/get/<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
/?not_menu=1" class="fancy"><?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</a></td>
                    <td valign="middle" align="center" style="cursor: pointer;" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/get/<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
/'"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value->created,"%d.%m.%Y %H:%M");?>
</td>
                    <td valign="middle" align="left" style="line-height: 1.4em">
                        <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_Variable($_smarty_tpl->tpl_vars['order']->value->id, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars['sum_cost'] = new Smarty_Variable(0, null, 0);?>

                        <?php if ($_smarty_tpl->tpl_vars['order']->value->user_id) {?>Логин: <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/0/edit/<?php echo $_smarty_tpl->tpl_vars['order']->value->user_id;?>
/?is_modal=1" rel="fancy"><?php echo $_smarty_tpl->tpl_vars['order']->value->login;?>
</a> <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/0/history/<?php echo $_smarty_tpl->tpl_vars['order']->value->user_id;?>
/?is_modal=1" class="fancy" title="История заказов польщзователя <?php echo $_smarty_tpl->tpl_vars['order']->value->login;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
orders.png" alt="" style="margin-left: 3px"/></a><br/><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['order']->value->fio) {?>ФИО: <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['order']->value->fio));?>
&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/black-list/<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
/?is_modal=1" rel="fancy"><img src="/images/sys/admin/ban.png" alt="" title="Добавит покупателя ь в черный список" width="16" /></a><br/><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['order']->value->phone) {?>Телефон: <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['order']->value->phone));?>
<br/><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['order']->value->email) {?>E-mail: <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['order']->value->email;?>
"><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['order']->value->email);?>
</a><br/><?php }?>
                        <?php echo $_smarty_tpl->getSubTemplate ("buy_market_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


                    </td>
                    <td valign="middle" align="left" >
                        <b><?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->city_index);?>
 <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['order']->value->city));?>
</b>
                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                        <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['order']->value->adress));?>



                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                        <?php echo $_smarty_tpl->tpl_vars['order']->value->delivery_name;?>


                        <?php if (($_smarty_tpl->tpl_vars['order']->value->status_id == 7 || $_smarty_tpl->tpl_vars['order']->value->status_id == 8) && $_smarty_tpl->tpl_vars['order']->value->post_code) {?>

                            <div id="result_<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
">&nbsp;</div>
                            <?php $_smarty_tpl->assign("cache_gde_posulka",$_smarty_tpl->smarty->registered_objects['gdePosulka_obj'][0]->cacheGdePosulka(array('post_code'=>$_smarty_tpl->tpl_vars['order']->value->post_code,'order_id'=>$_smarty_tpl->tpl_vars['order_id']->value),$_smarty_tpl));?>

                            <?php if (count($_smarty_tpl->tpl_vars['cache_gde_posulka']->value) > 1) {?>
                                <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).('modules/delivery/templates/gdePosulkaList.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('list'=>$_smarty_tpl->tpl_vars['cache_gde_posulka']->value), 0);
?>

                            <?php } else { ?>
                                <?php echo '<script'; ?>
 type="text/javascript">
                                    AjaxRequest('result_<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
delivery/gdeposulka/get/<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['order']->value->post_code;?>
/')
                                <?php echo '</script'; ?>
>
                            <?php }?>
                        <?php }?>
                    </td>
                    <td valign="middle" align="center" >

                        <b  style="font-size: 14px;font-weight: normal"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['order']->value->sum_order,2),",","&nbsp;");?>
 р.</b> <?php if ($_smarty_tpl->tpl_vars['order']->value->discount_procent && $_smarty_tpl->tpl_vars['order']->value->coupon_discount_sum == 0) {?><b style="font-size: 14px; color: #e41b1f">-<?php echo $_smarty_tpl->tpl_vars['order']->value->discount_procent;?>
%</b><?php }?> <?php if ($_smarty_tpl->tpl_vars['order']->value->discount_sum) {?><b style="font-size: 14px; color: #e41b1f">-<?php echo $_smarty_tpl->tpl_vars['order']->value->discount_sum;?>
 руб.</b><?php }?>  

                        <b style="font-size: 14px; font-weight: normal"> + доставка <?php echo $_smarty_tpl->tpl_vars['order']->value->sum_delivery;?>
 р. 

                            <?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_id == 11) {?> 
                                    <?php if ($_smarty_tpl->tpl_vars['order']->value->sum_discount < 1000) {?>
                                        <span class="notice">(+ <?php echo ceil((40+($_smarty_tpl->tpl_vars['order']->value->sum_discount*0.05)));?>
 с покупателя за НП)</span>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->sum_discount < 5000) {?>
                                        <span class="notice">(+ <?php echo ceil((50+($_smarty_tpl->tpl_vars['order']->value->sum_discount*0.04)));?>
 с покупателя за НП)</span>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->sum_discount < 20000) {?>
                                        <span class="notice">(+ <?php echo ceil((150+($_smarty_tpl->tpl_vars['order']->value->sum_discount*0.02)));?>
 с покупателя за НП)</span>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->sum_discount >= 20000) {?>
                                        <span class="notice">(+ <?php echo ceil((250+($_smarty_tpl->tpl_vars['order']->value->sum_discount*0.015)));?>
 с покупателя за НП)</span>
                                    <?php }?>
                                <?php }?>
                            </b> <b style="font-size: 14px; "> = <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['order']->value->sum_total,2),",","&nbsp;");?>
 р.</b>

                            <div><textarea style="min-width: 260px; height: 40px;margin: 4px 0;font-size: 13px;" placeholder="Комментарий менеджера" 
                                           onchange="$(this).attr('disabled', 'disabled');
                                                           AjaxRequest('', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/set/comment/<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
/?comment=' + $(this).val());
                                                           $(this).removeAttr('disabled');"><?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->comment_admin);?>
</textarea></div>


                            <?php if ($_smarty_tpl->tpl_vars['order']->value->is_payment == 1) {?>
                                <div class="notice" style="color: green; margin-top: 4px;">Заказ оплачен <?php if ($_smarty_tpl->tpl_vars['order']->value->payment_method_id == 3) {?>(МКБ)<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->payment_method_id == 7) {?>Яндекс.Деньги (сумма <b><?php echo $_smarty_tpl->tpl_vars['order']->value->payment_sum;?>
 руб.</b>)<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->payment_method_id == 5) {?>(Авангард)<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->payment_method_id == 4) {?>(Яндекс.Деньги)<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->payment_method_id == 5) {?>(Авангард)<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->payment_method_id == 6) {?>(Robokassa)<?php }?></div>
                            <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->payment_method_id == 5) {?>
                                <div class="notice" style="color: green; margin-top: 4px;">Выбран способ оплаты Банковская карточка</div>

                            <?php }?> 
                            <?php if ($_smarty_tpl->tpl_vars['order']->value->coupon_discount_sum > 0) {?>
                                <div class="notice" style="color: green; margin-top: 4px;">Использована дисконтная карточка №: <b><?php echo $_smarty_tpl->tpl_vars['order']->value->coupon;?>
</b>, скидка: <b><?php echo $_smarty_tpl->tpl_vars['order']->value->coupon_discount_sum;?>
</b> руб.</div>
                            <?php }?>
                            <?php if (($_smarty_tpl->tpl_vars['order']->value->payment_method_id == 8)) {?>
                                <div class="notice" style="color: green; margin-top: 4px;">Способ оплаты - Сбербанк. К оплате - <b><?php echo smarty_modifier_replace(number_format(($_smarty_tpl->tpl_vars['order']->value->sum_total*0.95),0),",","&nbsp;");?>
 р.</b> (нужно изменить сумму, а потом статус Ожидает оплаты Сбербанк)</div>
                            <?php }?>

                        </td>
                        <td valign="middle" align="center" style="width: 230px;">
                            <form method="post" action="" id="form_status_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">
                                <select name="status[<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
]" style="width: 160px;" id="select_status_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">
                                    <?php
$_from = $_smarty_tpl->tpl_vars['status']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["status_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["status_item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["status_item"]->value) {
$_smarty_tpl->tpl_vars["status_item"]->_loop = true;
$foreach_status_item_Sav = $_smarty_tpl->tpl_vars["status_item"];
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['status_item']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['order']->value->status_id == $_smarty_tpl->tpl_vars['status_item']->value->id) {?>selected="selected"<?php }
if ($_smarty_tpl->tpl_vars['order']->value->sum_expense == 0 && $_smarty_tpl->tpl_vars['setting']->value->is_expense == 1 && $_smarty_tpl->tpl_vars['status_item']->value->id == 3) {?> disabled="disabled"<?php }?>><?php echo $_smarty_tpl->tpl_vars['status_item']->value->name;?>
</option>
                                    <?php
$_smarty_tpl->tpl_vars["status_item"] = $foreach_status_item_Sav;
}
?>
                                </select>
                                <button onclick="$(this).addClass('hide');
                                        AjaxFormRequest('order_list_block', 'form_status_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/set/status/<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
/' + document.getElementById('select_status_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
').options[document.getElementById('select_status_<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
').selectedIndex].value + '/');
                                        return false;" >ОК</button>
                            </form>
                        </td>

                        <td valign="middle" align="center">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/get/<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
/" title="Редактировать"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Редактировать" style="vertical-align: middle" /></a>


                            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" alt="" style="cursor: pointer;vertical-align: middle" onclick="if (confirm('Вы действительно хотите удалить заказ № <?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
?')){
                                        location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/list//3/<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
/'}"  title="Отменить"/>
                        </td>
                        <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_Variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['order']->value->sum_total, null, 0);?>
                    </tr>
                </tbody>
                <?php
$_smarty_tpl->tpl_vars["order"] = $foreach_order_Sav;
}
?>
                    <tfoot>
                        <tr>
                            <td valign="middle" align="right" colspan="8">
                                Всего: <b><?php echo (isset($_smarty_tpl->tpl_vars['__foreach_order']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_order']->value['iteration'] : null);?>
</b>, Общая стоимость заказов: <b><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['total']->value,2),",","&nbsp;");?>
 руб.</b>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <?php } else { ?>
                    <h2>Заказы отсутствуют</h2>
                    <?php }
}
}
?>