<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-11 18:05:09
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/orders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57429055355d56aa4e4a261-22054260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc7a60a36f53582fbb07b31b49f9231730704733' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/orders.tpl',
      1 => 1441983908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57429055355d56aa4e4a261-22054260',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d56aa504abb8_00059107',
  'variables' => 
  array (
    'is_mobile' => 0,
    'url' => 0,
    'orders' => 0,
    'order' => 0,
    'order_id' => 0,
    'products' => 0,
    'host_url' => 0,
    'product' => 0,
    'sum_cost' => 0,
    'product_id' => 0,
    'product_count' => 0,
    'orders_complected' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d56aa504abb8_00059107')) {function content_55d56aa504abb8_00059107($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?>
<?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="/">Назад</a></div>
        <h1>Мои заказы</h1>
        <div class="clear">&nbsp;</div>
    </div>

    <ul id="profile-link">
        <li><a href="/stat/delivery/post/">Отследить заказ (Почта России)</a></li>
        <li><a href="/stat/profile/">Мой профиль</a></li>
        <li><a href="/stat/password/">Сменить пароль</a></li>
        <li><a href="/auth/exit/?back_url=<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo ltrim($_SERVER['REQUEST_URI'],"/");?>
">Выход</a></li>
    </ul>

    <?php if (count($_smarty_tpl->tpl_vars['orders']->value)) {?>
        <table cellpadding="4" cellspacing="1" border="3" width="100%" class="table">
            <tbody>
                <tr>
                    <td valign="middle" align="center" style="text-align: center">Дата</td>
                    <td valign="middle" align="center">Заказанные товары</td>
                    <td valign="middle" align="center" style="width: 120px;text-align: center">Стоимость</td>
                </tr>
            </tbody>
            <?php  $_smarty_tpl->tpl_vars["order"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["order"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->key => $_smarty_tpl->tpl_vars["order"]->value) {
$_smarty_tpl->tpl_vars["order"]->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->id, null, 0);?>
                <?php if (count($_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value])>0) {?>
                    <tbody>
                        <tr>

                            <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value->created,"%d.%m.%Y");?>


                                <div class="notice" style="margin-top: 10px;text-align: center"><b>№ <?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</b></div>
                            </td>
                            <td valign="middle" align="left">
                                <?php $_smarty_tpl->tpl_vars['sum_cost'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars["product_id"]->value = $_smarty_tpl->tpl_vars["product"]->key;
?>
                                    <div class="order-product">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" rel="fancy" class="order-product-name"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
 <?php if ($_smarty_tpl->tpl_vars['product']->value->mod_name) {?>(<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->mod_name);?>
)<?php }?></a> 
                                        <?php $_smarty_tpl->tpl_vars['sum_cost'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum_cost']->value+$_smarty_tpl->tpl_vars['product']->value->sum, null, 0);?>
                                        <span>(<?php  $_smarty_tpl->tpl_vars["product_count"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product_count"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value['count'][$_smarty_tpl->tpl_vars['order_id']->value][$_smarty_tpl->tpl_vars['product_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product_count"]->key => $_smarty_tpl->tpl_vars["product_count"]->value) {
$_smarty_tpl->tpl_vars["product_count"]->_loop = true;
echo $_smarty_tpl->tpl_vars['product_count']->value;?>
&nbsp;шт.)<?php } ?></span>
                                    </div>
                                <?php } ?>
                            </td>

                            <td valign="middle" align="center">
                                <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars["product_id"]->value = $_smarty_tpl->tpl_vars["product"]->key;
?>
                                    <div class="order-product order-product-price">
                                        <?php echo number_format($_smarty_tpl->tpl_vars['products']->value['count_price'][$_smarty_tpl->tpl_vars['order_id']->value][$_smarty_tpl->tpl_vars['product_id']->value],"0"," "," ");?>
&nbsp;<span>руб.</span>
                                    </div>
                                <?php } ?>

                                <div class="notice" style="margin-top: 10px;text-align: center"><b><?php echo $_smarty_tpl->tpl_vars['order']->value->status_name;?>
</b></div>
                            </td
                            </td>

                        </tr>
                    </tbody>
                <?php }?>
            <?php } ?>
        </tbody>
    </table>
<?php }?>


<?php if (!count($_smarty_tpl->tpl_vars['orders_complected']->value)&&!count($_smarty_tpl->tpl_vars['orders']->value)) {?>
    <h2>Нет заказов</h2>
<?php }?>
<?php } else { ?>
    <div id="stat-left-menu">
        <?php echo $_smarty_tpl->getSubTemplate ("stat_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div id="stat_content">
        <div class="breadcrumbs-block">

            <ul class="clearfix">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
                <li>Мои заказы</li>
            </ul>
        </div>

        <h1>Мои заказы</h1>



        <div class="text">
            <div>
                <?php if (count($_smarty_tpl->tpl_vars['orders']->value)) {?>
                    <table cellpadding="4" cellspacing="1" border="0" width="100%" class="order-table">
                        <tbody>
                            <tr>
                                <td valign="middle" align="center">№</td>
                                <td valign="middle" align="center">Дата</td>
                                <td valign="middle" align="center">Заказанные товары</td>
                                <td valign="middle" align="center">Статус</td>
                                <td valign="middle" align="center" style="width: 120px;text-align: center">Стоимость</td>
                            </tr>
                            <?php  $_smarty_tpl->tpl_vars["order"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["order"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->key => $_smarty_tpl->tpl_vars["order"]->value) {
$_smarty_tpl->tpl_vars["order"]->_loop = true;
?>
                                <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->id, null, 0);?>
                                <?php if (count($_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value])>0) {?>
                                    <tr>
                                        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</td>
                                        <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value->created,"%d.%m.%Y");?>
</td>
                                        <td valign="middle" align="left">
                                            <?php $_smarty_tpl->tpl_vars['sum_cost'] = new Smarty_variable(0, null, 0);?>
                                            <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars["product_id"]->value = $_smarty_tpl->tpl_vars["product"]->key;
?>
                                                <div class="order-product">
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" rel="fancy" class="order-product-name"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
 <?php if ($_smarty_tpl->tpl_vars['product']->value->mod_name) {?>(<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->mod_name);?>
)<?php }?></a> 
                                                    <?php $_smarty_tpl->tpl_vars['sum_cost'] = new Smarty_variable($_smarty_tpl->tpl_vars['sum_cost']->value+$_smarty_tpl->tpl_vars['product']->value->sum, null, 0);?>
                                                    <span>(<?php  $_smarty_tpl->tpl_vars["product_count"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product_count"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value['count'][$_smarty_tpl->tpl_vars['order_id']->value][$_smarty_tpl->tpl_vars['product_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product_count"]->key => $_smarty_tpl->tpl_vars["product_count"]->value) {
$_smarty_tpl->tpl_vars["product_count"]->_loop = true;
echo $_smarty_tpl->tpl_vars['product_count']->value;?>
&nbsp;шт.)<?php } ?></span>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value->status_name;?>
</td>
                                        <td valign="middle" align="center">
                                            <?php  $_smarty_tpl->tpl_vars["product"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["product"]->_loop = false;
 $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["product"]->key => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
 $_smarty_tpl->tpl_vars["product_id"]->value = $_smarty_tpl->tpl_vars["product"]->key;
?>
                                                <div class="order-product order-product-price">
                                                    <?php echo number_format($_smarty_tpl->tpl_vars['products']->value['count_price'][$_smarty_tpl->tpl_vars['order_id']->value][$_smarty_tpl->tpl_vars['product_id']->value],"0"," "," ");?>
&nbsp;<span>руб.</span>
                                                </div>
                                            <?php } ?>
                                        </td
                                        </td>

                                    </tr>
                                <?php }?>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php }?>


                <?php if (!count($_smarty_tpl->tpl_vars['orders_complected']->value)&&!count($_smarty_tpl->tpl_vars['orders']->value)) {?>
                    <h2>Нет заказов</h2>
                <?php }?>

            </div>
        </div>
    </div>
<?php }?>
<br/><br/><?php }} ?>
