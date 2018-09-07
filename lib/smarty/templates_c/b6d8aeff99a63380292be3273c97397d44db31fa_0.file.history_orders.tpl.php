<?php /* Smarty version 3.1.24, created on 2015-10-28 15:22:14
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/reports/templates/history_orders.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1243620195630bdf683e842_18019943%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6d8aeff99a63380292be3273c97397d44db31fa' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/reports/templates/history_orders.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1243620195630bdf683e842_18019943',
  'variables' => 
  array (
    'type' => 0,
    'start_date_form' => 0,
    'end_date_form' => 0,
    'sys_images_url' => 0,
    'orders' => 0,
    'order' => 0,
    'admin_url' => 0,
    'menu_type' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630bdf6905173_05812777',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630bdf6905173_05812777')) {
function content_5630bdf6905173_05812777 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/c10045/public_html/kompressor-center.com/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) require_once '/home/c10045/public_html/kompressor-center.com/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '1243620195630bdf683e842_18019943';
?>
<div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_reports.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
        <h1><?php if ($_smarty_tpl->tpl_vars['type']->value == 1) {?>История выполненных заказов<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 2) {?>История отмененных заказов<?php }?></h1>


        <form method="post" action="">

            <table cellpadding="4" cellspacing="1" border="0" class="table" width="710" style="margin: auto">
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">
                            Дата заказа:
                        </td>
                        <td valign="middle" align="left">
                            с <?php echo $_smarty_tpl->tpl_vars['start_date_form']->value;?>
 до <?php echo $_smarty_tpl->tpl_vars['end_date_form']->value;?>

                        </td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <input type="hidden" src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
sform.png" name="send" value="Сформировать"/>
                            <button>Сформировать</button>
                        </td>
                    </tr>
                </tbody>
            </table>


        </form>
        <br/>
        <?php if (count($_smarty_tpl->tpl_vars['orders']->value)) {?>
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: auto;" width="100%">
                <thead>
                    <tr>
                        <td valign="middle" align="center">№</td>
                        <td valign="middle" align="center">Дата</td>
                        <td valign="middle" align="center">Контакты</td>
                        <td valign="middle" align="center">Адрес</td>
                        <td valign="middle" align="center">Стоимость</td>
                        <td valign="middle" align="center">Комментарий</td>
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
                    <tbody class="tbody">
                        <tr>

                            <td valign="middle" align="center"><a  href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/get/<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
/?not_menu=1<?php if ($_smarty_tpl->tpl_vars['menu_type']->value == 2) {?>&is_delete_product=-1<?php }?>" class="fancy"><?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</a></td>
                            <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value->created,"%d.%m.%Y %H:%M");?>
</td>
                            <td valign="middle" align="left" style="line-height: 1.4em">
                                <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_Variable($_smarty_tpl->tpl_vars['order']->value->id, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['sum_cost'] = new Smarty_Variable(0, null, 0);?>

                                <?php if ($_smarty_tpl->tpl_vars['order']->value->user_id) {?>Логин: <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/0/edit/<?php echo $_smarty_tpl->tpl_vars['order']->value->user_id;?>
/?is_modal=1" class="fancy"><?php echo $_smarty_tpl->tpl_vars['order']->value->login;?>
</a> <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/0/history/<?php echo $_smarty_tpl->tpl_vars['order']->value->user_id;?>
/?is_modal=1" class="fancy" title="История заказов польщзователя <?php echo $_smarty_tpl->tpl_vars['order']->value->login;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
orders.png" alt="" style="margin-left: 3px"/></a><br/><?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['order']->value->fio) {?>ФИО: <?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->fio);?>
<br/><?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['order']->value->phone) {?>Телефон: <?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->phone);?>
<br/><?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['order']->value->email) {?>E-mail: <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['order']->value->email;?>
"><?php echo $_smarty_tpl->tpl_vars['order']->value->email;?>
</a><br/><?php }?>
                            </td>
                            <td valign="middle" align="left">
                                <b><?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->city_index);?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->city);?>
</b>
                                <div style="height: 5px; font-size: 0">&nbsp;</div>
                                <?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->adress);?>

                                <div style="height: 5px; font-size: 0">&nbsp;</div>
                                <?php echo $_smarty_tpl->tpl_vars['order']->value->delivery_name;?>

                            </td>
                            <td valign="middle" align="center">

                                <b  style="font-size: 14px;font-weight: normal"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['order']->value->sum_total,2),",","&nbsp;");?>
 р.</b>



                                <?php if ($_smarty_tpl->tpl_vars['order']->value->is_payment == 1) {?>
                                    <div class="notice" style="color: #1976C3">Заказ оплачен</div>
                                <?php }?>

                            </td>

                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value->comment;?>
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
            <?php if ($_smarty_tpl->tpl_vars['type']->value == 1) {?>
                <h2>Отсутствуют выполненные заказы</h2>
            <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 2) {?>
                <h2>Отсутствуют отмененные заказы</h2>
            <?php }?>
        <?php }?>
    </div>
</div><?php }
}
?>