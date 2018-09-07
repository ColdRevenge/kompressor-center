<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-24 20:05:10
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/payment/templates/cash_sberbank.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150797423755db4ec64a0639-16376124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de6e8e263cc6978f2cc7fd13e7d96839b882e4b0' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/payment/templates/cash_sberbank.tpl',
      1 => 1434204142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150797423755db4ec64a0639-16376124',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'get_order' => 0,
    'is_mobile' => 0,
    'sum_sber' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55db4ec652d9b2_69391226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55db4ec652d9b2_69391226')) {function content_55db4ec652d9b2_69391226($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars["sum_sber"] = new Smarty_variable(number_format(($_smarty_tpl->tpl_vars['get_order']->value->sum_total*0.95),0,''," "), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
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
<?php }?><?php }} ?>
