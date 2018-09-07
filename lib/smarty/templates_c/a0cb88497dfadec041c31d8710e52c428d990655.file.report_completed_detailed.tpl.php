<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 00:00:55
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/report_completed_detailed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93253371555d640077de5d3-53031439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0cb88497dfadec041c31d8710e52c428d990655' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/report_completed_detailed.tpl',
      1 => 1437924114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93253371555d640077de5d3-53031439',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'orders' => 0,
    'order' => 0,
    'admin_url' => 0,
    'menu_type' => 0,
    'sys_images_url' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d6400789a4f5_76610292',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d6400789a4f5_76610292')) {function content_55d6400789a4f5_76610292($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: auto;" width="100%">
    <thead>
        <tr>
            <td valign="middle" align="center">№</td>
            <td valign="middle" align="center">Дата</td>
            <td valign="middle" align="center">Контактная информация</td>
            <td valign="middle" align="center">Город</td>
            <td valign="middle" align="center">Сумма</td>
            <td valign="middle" align="center">Доход</td>
        </tr>
    </thead>
    <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable("0", null, 0);?>
    <?php  $_smarty_tpl->tpl_vars["order"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["order"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->key => $_smarty_tpl->tpl_vars["order"]->value) {
$_smarty_tpl->tpl_vars["order"]->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->id, null, 0);?>
        <tbody class="tbody">
            <tr>

                <td valign="middle" align="center"><a  href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/get/<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
/?not_menu=1<?php if ($_smarty_tpl->tpl_vars['menu_type']->value==2) {?>&is_delete_product=-1<?php }?>" class="fancy"><?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</a></td>
                <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value->created,"%d.%m.%Y %H:%M");?>
</td>
                <td valign="middle" align="left" style="line-height: 1.4em">
                    <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->id, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['sum_cost'] = new Smarty_variable(0, null, 0);?>

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
                    <?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->city);?>

                </td>
                <td valign="middle" align="center">
                    <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['order']->value->sum_total,2),",","&nbsp;");?>
 р.
                </td>
                <td valign="middle" align="center">
                    <?php echo smarty_modifier_replace(number_format(($_smarty_tpl->tpl_vars['order']->value->sum_total-$_smarty_tpl->tpl_vars['order']->value->sum_expense),2),",","&nbsp;");?>
 р.
                </td>
            </tr>
        </tbody>
        <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['order']->value->sum_total, null, 0);?>
    <?php } ?>
</table><?php }} ?>
