<?php /* Smarty version 3.1.24, created on 2015-09-15 03:43:52
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/payment/templates/cash_sberbank.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:177077397455f769c8c433b5_76318378%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41f168f7b574f8a4181286ef83942dd356a9106d' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/payment/templates/cash_sberbank.tpl',
      1 => 1434204142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177077397455f769c8c433b5_76318378',
  'variables' => 
  array (
    'get_order' => 0,
    'is_mobile' => 0,
    'sum_sber' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f769c8c90c59_51357433',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f769c8c90c59_51357433')) {
function content_55f769c8c90c59_51357433 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '177077397455f769c8c433b5_76318378';
?>


<?php $_smarty_tpl->tpl_vars["sum_sber"] = new Smarty_Variable(number_format(($_smarty_tpl->tpl_vars['get_order']->value->sum_total*0.95),0,''," "), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
    <div style="padding-bottom: 20px;width: 100%;text-align: center;" class="navigation-detailed" id="sberbank_form">
        <h2 style="text-align: center;">Оплата с помощью банковской карты Сбербанка</h2>
        <p style="margin-top: 8px;">Сумма оплаты: <b><?php echo $_smarty_tpl->tpl_vars['sum_sber']->value;?>
 руб.</b> <span class="notice">(сумма с учетом <b style="color: red">скидки 5%</b>)</span></p>
        <p style="text-align: center; margin-top: 3px;color: gray">
            В ближайшее время с Вами свяжется  менеджер для уточнения деталей заказа, после чего Вы сможете оплатить заказ при помощи сервиса Сбербанк Онлайн или ближайшего банкомата.

            

        </p>
    </div>
<?php } else { ?>
    <div style="padding-bottom: 20px;width: 700px;text-align: center;" class="navigation-detailed" id="sberbank_form">
        <h2 style="text-align: center;">Оплата с помощью банковской карты Сбербанка</h2>
        <p style="margin-top: 8px;">Сумма оплаты: <b><?php echo $_smarty_tpl->tpl_vars['sum_sber']->value;?>
 руб.</b> <span class="notice">(сумма с учетом <b style="color: red">скидки 5%</b>)</span></p>
        <p style="text-align: center; margin-top: 3px;color: gray">
            В ближайшее время с Вами свяжется  менеджер для уточнения деталей заказа, после чего Вы сможете оплатить заказ при помощи сервиса Сбербанк Онлайн или ближайшего банкомата.

            

        </p>
    </div>
<?php }
}
}
?>