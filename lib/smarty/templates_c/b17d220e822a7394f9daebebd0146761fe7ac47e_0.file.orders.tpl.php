<?php /* Smarty version 3.1.24, created on 2015-09-13 20:38:48
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/orders.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:213757043155f5b4a8f14977_58732049%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b17d220e822a7394f9daebebd0146761fe7ac47e' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/orders.tpl',
      1 => 1441983908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213757043155f5b4a8f14977_58732049',
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
  'version' => '3.1.24',
  'unifunc' => 'content_55f5b4a9135105_92585999',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f5b4a9135105_92585999')) {
function content_55f5b4a9135105_92585999 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '213757043155f5b4a8f14977_58732049';
?>

<?php if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
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
            <?php
$_from = $_smarty_tpl->tpl_vars['orders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["order"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["order"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->value) {
$_smarty_tpl->tpl_vars["order"]->_loop = true;
$foreach_order_Sav = $_smarty_tpl->tpl_vars["order"];
?>
                <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_Variable($_smarty_tpl->tpl_vars['order']->value->id, null, 0);?>
                <?php if (count($_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value]) > 0) {?>
                    <tbody>
                        <tr>

                            <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value->created,"%d.%m.%Y");?>


                                <div class="notice" style="margin-top: 10px;text-align: center"><b>№ <?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</b></div>
                            </td>
                            <td valign="middle" align="left">
                                <?php $_smarty_tpl->tpl_vars['sum_cost'] = new Smarty_Variable(0, null, 0);?>
                                <?php
$_from = $_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
$_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["product_id"]->value => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
                                    <div class="order-product">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" rel="fancy" class="order-product-name"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
 <?php if ($_smarty_tpl->tpl_vars['product']->value->mod_name) {?>(<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->mod_name);?>
)<?php }?></a> 
                                        <?php $_smarty_tpl->tpl_vars['sum_cost'] = new Smarty_Variable($_smarty_tpl->tpl_vars['sum_cost']->value+$_smarty_tpl->tpl_vars['product']->value->sum, null, 0);?>
                                        <span>(<?php
$_from = $_smarty_tpl->tpl_vars['products']->value['count'][$_smarty_tpl->tpl_vars['order_id']->value][$_smarty_tpl->tpl_vars['product_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product_count"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product_count"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["product_count"]->value) {
$_smarty_tpl->tpl_vars["product_count"]->_loop = true;
$foreach_product_count_Sav = $_smarty_tpl->tpl_vars["product_count"];
echo $_smarty_tpl->tpl_vars['product_count']->value;?>
&nbsp;шт.)<?php
$_smarty_tpl->tpl_vars["product_count"] = $foreach_product_count_Sav;
}
?></span>
                                    </div>
                                <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
                            </td>

                            <td valign="middle" align="center">
                                <?php
$_from = $_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
$_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["product_id"]->value => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
                                    <div class="order-product order-product-price">
                                        <?php echo number_format($_smarty_tpl->tpl_vars['products']->value['count_price'][$_smarty_tpl->tpl_vars['order_id']->value][$_smarty_tpl->tpl_vars['product_id']->value],"0"," "," ");?>
&nbsp;<span>руб.</span>
                                    </div>
                                <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>

                                <div class="notice" style="margin-top: 10px;text-align: center"><b><?php echo $_smarty_tpl->tpl_vars['order']->value->status_name;?>
</b></div>
                            </td
                            </td>

                        </tr>
                    </tbody>
                <?php }?>
            <?php
$_smarty_tpl->tpl_vars["order"] = $foreach_order_Sav;
}
?>
        </tbody>
    </table>
<?php }?>


<?php if (!count($_smarty_tpl->tpl_vars['orders_complected']->value) && !count($_smarty_tpl->tpl_vars['orders']->value)) {?>
    <h2>Нет заказов</h2>
<?php }?>
<?php } else { ?>
    <div id="stat-left-menu">
        <?php echo $_smarty_tpl->getSubTemplate ("stat_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

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
                            <?php
$_from = $_smarty_tpl->tpl_vars['orders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["order"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["order"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->value) {
$_smarty_tpl->tpl_vars["order"]->_loop = true;
$foreach_order_Sav = $_smarty_tpl->tpl_vars["order"];
?>
                                <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_Variable($_smarty_tpl->tpl_vars['order']->value->id, null, 0);?>
                                <?php if (count($_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value]) > 0) {?>
                                    <tr>
                                        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</td>
                                        <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value->created,"%d.%m.%Y");?>
</td>
                                        <td valign="middle" align="left">
                                            <?php $_smarty_tpl->tpl_vars['sum_cost'] = new Smarty_Variable(0, null, 0);?>
                                            <?php
$_from = $_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
$_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["product_id"]->value => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
                                                <div class="order-product">
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/?is_modal=1" rel="fancy" class="order-product-name"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
 <?php if ($_smarty_tpl->tpl_vars['product']->value->mod_name) {?>(<?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->mod_name);?>
)<?php }?></a> 
                                                    <?php $_smarty_tpl->tpl_vars['sum_cost'] = new Smarty_Variable($_smarty_tpl->tpl_vars['sum_cost']->value+$_smarty_tpl->tpl_vars['product']->value->sum, null, 0);?>
                                                    <span>(<?php
$_from = $_smarty_tpl->tpl_vars['products']->value['count'][$_smarty_tpl->tpl_vars['order_id']->value][$_smarty_tpl->tpl_vars['product_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product_count"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product_count"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["product_count"]->value) {
$_smarty_tpl->tpl_vars["product_count"]->_loop = true;
$foreach_product_count_Sav = $_smarty_tpl->tpl_vars["product_count"];
echo $_smarty_tpl->tpl_vars['product_count']->value;?>
&nbsp;шт.)<?php
$_smarty_tpl->tpl_vars["product_count"] = $foreach_product_count_Sav;
}
?></span>
                                                </div>
                                            <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
                                        </td>
                                        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['order']->value->status_name;?>
</td>
                                        <td valign="middle" align="center">
                                            <?php
$_from = $_smarty_tpl->tpl_vars['products']->value['product'][$_smarty_tpl->tpl_vars['order_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["product"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["product"]->_loop = false;
$_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["product_id"]->value => $_smarty_tpl->tpl_vars["product"]->value) {
$_smarty_tpl->tpl_vars["product"]->_loop = true;
$foreach_product_Sav = $_smarty_tpl->tpl_vars["product"];
?>
                                                <div class="order-product order-product-price">
                                                    <?php echo number_format($_smarty_tpl->tpl_vars['products']->value['count_price'][$_smarty_tpl->tpl_vars['order_id']->value][$_smarty_tpl->tpl_vars['product_id']->value],"0"," "," ");?>
&nbsp;<span>руб.</span>
                                                </div>
                                            <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>
                                        </td
                                        </td>

                                    </tr>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars["order"] = $foreach_order_Sav;
}
?>
                        </tbody>
                    </table>
                <?php }?>


                <?php if (!count($_smarty_tpl->tpl_vars['orders_complected']->value) && !count($_smarty_tpl->tpl_vars['orders']->value)) {?>
                    <h2>Нет заказов</h2>
                <?php }?>

            </div>
        </div>
    </div>
<?php }?>
<br/><br/><?php }
}
?>