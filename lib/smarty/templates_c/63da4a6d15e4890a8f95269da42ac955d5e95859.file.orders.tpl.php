<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 08:44:19
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/users/templates/orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148885806955d56933467bb0-78635430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63da4a6d15e4890a8f95269da42ac955d5e95859' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/users/templates/orders.tpl',
      1 => 1423307977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148885806955d56933467bb0-78635430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'orders' => 0,
    'users' => 0,
    'order' => 0,
    'admin_url' => 0,
    'order_id' => 0,
    'products' => 0,
    'product' => 0,
    'url' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d56933558eb6_53675818',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d56933558eb6_53675818')) {function content_55d56933558eb6_53675818($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>



    <?php if (count($_smarty_tpl->tpl_vars['orders']->value)) {?>
        <h2>Список заказов  пользователя <b><?php echo $_smarty_tpl->tpl_vars['users']->value->login;?>
</b></h2>
        <div  id="order_list_block">
            <?php if ($_smarty_tpl->tpl_vars['orders']->value) {?>

                <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%">
                    <tbody class="table_header">
                        <tr>
                            <td valign="middle" align="center">№</td>
                            <td valign="middle" align="center">Дата</td>
                            <td valign="middle" align="center">Заказ</td>
                            <td valign="middle" align="center">Адрес</td>
                            <td valign="middle" align="center">Стоимость заказа</td>
                        </tr>
                    </tbody>
                    <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable("0", null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars["order"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["order"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["order"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->key => $_smarty_tpl->tpl_vars["order"]->value) {
$_smarty_tpl->tpl_vars["order"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["order"]['iteration']++;
?>
                        <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->id, null, 0);?>
                        <tbody class="tbody">
                            <tr>

                                <td valign="middle" align="center"><a  href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/get/<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</a></td>
                                <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value->created,"%d.%m.%Y %H:%M");?>
 <div class="notice"><?php echo $_smarty_tpl->tpl_vars['order']->value->status_name;?>
</div></td>
                                <td valign="middle" align="left" style="line-height: 1.4em">
                                    <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['order_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
?>
                                        <div>
                                            <span class="notice">[Артикул: <?php echo $_smarty_tpl->tpl_vars['product']->value->article;?>
]</span> <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a> 

                                            - <?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
 р. x <?php echo $_smarty_tpl->tpl_vars['product']->value->count;?>
 шт. =  <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['product']->value->sum,2),",","&nbsp;");?>
 р.
                                        </div>

                                    <?php } ?>
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

                                    <b  style="font-size: 14px;font-weight: normal"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['order']->value->sum_order,2),",","&nbsp;");?>
 р.</b> <?php if ($_smarty_tpl->tpl_vars['order']->value->discount_procent) {?><b style="font-size: 14px; color: #e41b1f">-<?php echo $_smarty_tpl->tpl_vars['order']->value->discount_procent;?>
%</b><?php }?> <?php if ($_smarty_tpl->tpl_vars['order']->value->discount_sum) {?><b style="font-size: 14px; color: #e41b1f">-<?php echo $_smarty_tpl->tpl_vars['order']->value->discount_sum;?>
 руб.</b><?php }?>  <b style="font-size: 14px; font-weight: normal"> + доставка <?php echo $_smarty_tpl->tpl_vars['order']->value->sum_delivery;?>
 р.</b> <b style="font-size: 14px; "> = <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['order']->value->sum_total,2),",","&nbsp;");?>
 р.</b>



                                    <?php if ($_smarty_tpl->tpl_vars['order']->value->is_payment==1) {?>
                                        <div class="notice" style="color: #1976C3">Заказ оплачен</div>
                                    <?php }?>

                                </td>


                                <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['order']->value->sum_total, null, 0);?>
                            </tr>
                        </tbody>
                    <?php } ?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="right" colspan="8">
                                Всего: <b><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['order']['iteration'];?>
</b>, Общая стоимость заказов: <b><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['total']->value,2),",","&nbsp;");?>
 руб.</b>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php } else { ?>
                <h2>Заказы отсутствуют</h2>
            <?php }?>
        </div>
    <?php } else { ?>
        <h2>Заказы отсутствуют</h2>
    <?php }?>
</div>
<?php }} ?>