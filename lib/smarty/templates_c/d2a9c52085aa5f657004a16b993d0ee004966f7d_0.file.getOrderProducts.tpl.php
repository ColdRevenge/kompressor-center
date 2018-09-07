<?php /* Smarty version 3.1.24, created on 2015-10-20 17:51:13
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/order/templates/getOrderProducts.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1078024974562654e11a9a64_38972739%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2a9c52085aa5f657004a16b993d0ee004966f7d' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/order/templates/getOrderProducts.tpl',
      1 => 1442305254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1078024974562654e11a9a64_38972739',
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'gallery_url' => 0,
    '_shop_url' => 0,
    'sys_images_url' => 0,
    'admin_url' => 0,
    'order' => 0,
    'delivery' => 0,
    'delivery_item' => 0,
    'delivery_id' => 0,
    'delivery_child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_562654e12b2906_78716136',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562654e12b2906_78716136')) {
function content_562654e12b2906_78716136 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '1078024974562654e11a9a64_38972739';
?>
<h2>Товары</h2>
<div id="product_order">
    <form method="post" id="form_order_products" action="">
        <table cellpadding="4" cellspacing="1" border="0" class="table">
            <tbody class="table_header">
                <tr>
                    <td valign="middle" align="center">&nbsp;</td>
                    <td valign="middle" align="center">Наименование</td>
                    <td valign="middle" align="center">Цена, руб.</td>
                    <td valign="middle" align="center">Кол-во</td>
                    <td valign="middle" align="center">Стоимость, руб.</td>
                    <td valign="middle" align="center">&nbsp;</td>
                </tr>
            </tbody>
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
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><?php if ($_smarty_tpl->tpl_vars['product']->value->file) {?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['product']->value->file;?>
" alt="" style="border: 1px solid #CCCCCC" /><?php }?>
                        </td>
                        <td valign="middle" align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['product']->value->pseudo_dir;?>
/" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['product']->value->name);?>
</a> 
                            <div class="notice">
                                Артикул: <b><?php echo $_smarty_tpl->tpl_vars['product']->value->article;?>
</b>
                                <br/>

                                <?php if ($_smarty_tpl->tpl_vars['product']->value->char_name_1) {?>Размер: <b><?php echo $_smarty_tpl->tpl_vars['product']->value->char_name_1;?>
</b><?php }?>
                                
                        </td>
                        <td valign="middle" align="center">
                            <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
" name="product_price[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" style="width: 70px;text-align: center"/> руб.
                            <div class="notice" style="margin-top: 3px;"><?php echo $_smarty_tpl->tpl_vars['product']->value->cost_price;?>
 руб.</div>
                        </td>
                        <td valign="middle" align="center"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->count;?>
" name="product_count[<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
]" style="width: 22px;text-align: center" maxlength="3"/> шт.</td>
                        <td valign="middle" align="center"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['product']->value->sum,2),",","&nbsp;");?>
 руб.</td>
                        <td valign="middle" align="center"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" alt="Удалить"  title="Удалить" class="hand" onclick="AjaxRequest('order_products', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/del/<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
/')" /></td>
                    </tr>
                </tbody>
            <?php
$_smarty_tpl->tpl_vars["product"] = $foreach_product_Sav;
}
?>

            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="6">
                        <button onclick="AjaxFormRequest('order_products', 'form_order_products', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/set/product/<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
/');
                                return false;">Сохранить</button>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="6">
                        <b  style="font-size: 17px;font-weight: normal"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['order']->value->sum_order,2),",","&nbsp;");?>
 р.</b> <?php if ($_smarty_tpl->tpl_vars['order']->value->discount_procent) {?><b style="font-size: 17px; color: #e41b1f">-<?php echo $_smarty_tpl->tpl_vars['order']->value->discount_procent;?>
%</b><?php }?> <?php if ($_smarty_tpl->tpl_vars['order']->value->discount_sum) {?><b style="font-size: 17px; color: #e41b1f">-<?php echo $_smarty_tpl->tpl_vars['order']->value->discount_sum;?>
 руб.</b><?php }?>  <b style="font-size: 17px; font-weight: normal"> + доставка <?php echo $_smarty_tpl->tpl_vars['order']->value->sum_delivery;?>
 р.</b> <b style="font-size: 17px; font-weight: normal"> = <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['order']->value->sum_total,2),",","&nbsp;");?>
 р.</b>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="center" colspan="6">
                        <h2>Дополнительные параметры заказа</h2>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">
                        Доставка:
                    </td>
                    <td valign="middle" align="left" colspan="1">
                        <select name="delivery_id" style="width: 250px;">
                            <?php
$_from = $_smarty_tpl->tpl_vars['delivery']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["delivery_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["delivery_item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["delivery_item"]->value) {
$_smarty_tpl->tpl_vars["delivery_item"]->_loop = true;
$foreach_delivery_item_Sav = $_smarty_tpl->tpl_vars["delivery_item"];
?>
                                <?php $_smarty_tpl->tpl_vars["delivery_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['delivery_item']->value->id, null, 0);?>
                                <?php if (count($_smarty_tpl->tpl_vars['delivery']->value[$_smarty_tpl->tpl_vars['delivery_id']->value])) {?>
                                    <optgroup label='<?php echo $_smarty_tpl->tpl_vars['delivery_item']->value->name;?>
'>
                                        <?php
$_from = $_smarty_tpl->tpl_vars['delivery']->value[$_smarty_tpl->tpl_vars['delivery_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["delivery_child"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["delivery_child"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["delivery_child"]->value) {
$_smarty_tpl->tpl_vars["delivery_child"]->_loop = true;
$foreach_delivery_child_Sav = $_smarty_tpl->tpl_vars["delivery_child"];
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['delivery_child']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_child_id == $_smarty_tpl->tpl_vars['delivery_child']->value->id) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['delivery_child']->value->name;?>
</option>
                                        <?php
$_smarty_tpl->tpl_vars["delivery_child"] = $foreach_delivery_child_Sav;
}
?>
                                    </optgroup>
                                <?php } else { ?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['delivery_item']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_id == $_smarty_tpl->tpl_vars['delivery_item']->value->id) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['delivery_item']->value->name;?>
</option>
                                <?php }?>
                            <?php
$_smarty_tpl->tpl_vars["delivery_item"] = $foreach_delivery_item_Sav;
}
?>
                        </select>
                    </td>
                    <td valign="middle" align="left" style="text-align: left">
                        
                        <input type="text" name="delivery_price" id="order_delivery_price" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['order']->value->sum_delivery)===null||$tmp==='' ? 0 : $tmp);?>
" style="width: 50px;vertical-align: middle; text-align: center"
                               onchange="setOrderDiscountDelivery($('#order_sum_total'), '<?php echo $_smarty_tpl->tpl_vars['order']->value->sum_order;?>
', $('#order_delivery_price').val(), $('#order_discount_price').val(), $('#order_discount_type option:selected').val())"/>  руб.
                    </td>

                    <td valign="middle" align="left" colspan="3" rowspan="5">
                        <button onclick="AjaxFormRequest('order_products', 'form_order_products', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/set/options/<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
/');
                                return false;">Сохранить</button>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        Скидка:
                    </td>
                    <td valign="middle" align="left" style="text-align: center;">
                        <input type="text" name="discount" id="order_discount_price" value="<?php if ($_smarty_tpl->tpl_vars['order']->value->discount_procent > 0) {
echo $_smarty_tpl->tpl_vars['order']->value->discount_procent;
} else {
echo $_smarty_tpl->tpl_vars['order']->value->discount_sum;
}?>" style="width: 50px;vertical-align: middle" onchange="setOrderDiscountDelivery($('#order_sum_total'), '<?php echo $_smarty_tpl->tpl_vars['order']->value->sum_order;?>
', $('#order_delivery_price').val(), $('#order_discount_price').val(), $('#order_discount_type option:selected').val())"/>
                        <select name="discount_type" style="width: 70px;" id="order_discount_type" onchange="setOrderDiscountDelivery($('#order_sum_total'), '<?php echo $_smarty_tpl->tpl_vars['order']->value->sum_order;?>
', $('#order_delivery_price').val(), $('#order_discount_price').val(), $('#order_discount_type option:selected').val())">
                            <option value="1"<?php if ($_smarty_tpl->tpl_vars['order']->value->discount_procent > 0) {?> selected="selected"<?php }?>>%</option>
                            <option value="2"<?php if ($_smarty_tpl->tpl_vars['order']->value->discount_sum > 0) {?> selected="selected"<?php }?>>руб.</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        Общая стоимость заказа:
                    </td>
                    <td valign="middle" align="left" style="text-align: center;">
                        <input type="text" name="sum_total" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->sum_total;?>
" id="order_sum_total" style="width: 107px;vertical-align: middle"/> руб.
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        Расходы на заказ:
                    </td>
                    <td valign="middle" align="left" style="text-align: center;">
                        <input type="text" name="sum_expense" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->sum_expense;?>
" style="width: 107px;vertical-align: middle"/> руб.
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="3">
                        Добавить товар к заказу: &nbsp;
                        
                        <input type="text" name="name" placeholder="Название товара" id="add_product_article" style="width: 160px;vertical-align: middle"/>
                        
                    </td>
                    <td valign="middle" align="left" colspan="3">
                        <button onclick="AjaxFormRequest('order_products', 'form_order_products', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/add/product/<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
/');
                                return false;">Добавить</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <br/>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
    $('#add_product_article').autocomplete({
        serviceUrl: '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/add/product/', // Страница для обработки запросов автозаполнения
        minChars: 2, // Минимальная длина запроса для срабатывания автозаполнения
        delimiter: /(,|;)\s*/, // Разделитель для нескольких запросов, символ или регулярное выражение
        maxHeight: 400, // Максимальная высота списка подсказок, в пикселях
        width: 450, // Ширина списка
        zIndex: 9999, // z-index списка
        deferRequestBy: 0, // Задержка запроса (мсек), на случай, если мы не хотим слать миллион запросов, пока пользователь печатает. Я обычно ставлю 300.
        params: {country: 'Yes'}, // Дополнительные параметры
                onSelect: function (data, value) {
                } // Callback функция, срабатывающая на выбор одного из предложенных вариантов,
    
            });
<?php echo '</script'; ?>
><?php }
}
?>