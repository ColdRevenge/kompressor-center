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
            {foreach from=$products item="product"}
                {assign var="_shop_url" value=$url}
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center">{if $product->file}
                            <img src="{$gallery_url}{$product->file}" alt="" style="border: 1px solid #CCCCCC" />{/if}
                        </td>
                        <td valign="middle" align="center"><a href="{$_shop_url}products/{$product->pseudo_dir}/" target="_blank">{$product->name|stripslashes}</a> 
                            <div class="notice">
                                Артикул: <b>{$product->article}</b>
                                <br/>

                                {if $product->char_name_1}Размер: <b>{$product->char_name_1}</b>{/if}
                                {*   <div class="notice" style="padding-top: 5px;">Размер: {$product->mod_name}
                                {if $product->char_name_1 || $product->char_name_2 || $product->char_name_3 || $product->char_name_4 || $product->char_name_5}<span class="span_zap">({if $product->char_name_1}<span>{$product->char_name_1}</span>{/if}{if $product->char_name_2}<span>{$product->char_name_2}</span>{/if}{if $product->char_name_3}<span>{$product->char_name_3}</span>{/if}{if $product->char_name_4}<span>{$product->char_name_4}</span>{/if}{if $product->char_name_5}<span>{$product->char_name_5}</span>{/if})</span>{/if}
                                </div>*}
                        </td>
                        <td valign="middle" align="center">
                            <input type="text" value="{$product->price}" name="product_price[{$product->id}]" style="width: 70px;text-align: center"/> руб.
                            <div class="notice" style="margin-top: 3px;">{$product->cost_price} руб.</div>
                        </td>
                        <td valign="middle" align="center"><input type="text" value="{$product->count}" name="product_count[{$product->id}]" style="width: 22px;text-align: center" maxlength="3"/> шт.</td>
                        <td valign="middle" align="center">{$product->sum|number_format:2|replace:",":"&nbsp;"} руб.</td>
                        <td valign="middle" align="center"><img src="{$sys_images_url}admin/del.png" alt="Удалить"  title="Удалить" class="hand" onclick="AjaxRequest('order_products', '{$admin_url}order/del/{$order->id}/{$product->id}/')" /></td>
                    </tr>
                </tbody>
            {/foreach}

            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="6">
                        <button onclick="AjaxFormRequest('order_products', 'form_order_products', '{$admin_url}order/set/product/{$order->id}/');
                                return false;">Сохранить</button>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="6">
                        <b  style="font-size: 17px;font-weight: normal">{$order->sum_order|number_format:2|replace:",":"&nbsp;"} р.</b> {if $order->discount_procent}<b style="font-size: 17px; color: #e41b1f">-{$order->discount_procent}%</b>{/if} {if $order->discount_sum}<b style="font-size: 17px; color: #e41b1f">-{$order->discount_sum} руб.</b>{/if}  <b style="font-size: 17px; font-weight: normal"> + доставка {$order->sum_delivery} р.</b> <b style="font-size: 17px; font-weight: normal"> = {$order->sum_total|number_format:2|replace:",":"&nbsp;"} р.</b>{* <b>{$default_currency->name}</b>*}
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
                            {foreach from=$delivery.0 item="delivery_item"}
                                {assign var="delivery_id" value=$delivery_item->id}
                                {if $delivery.$delivery_id|@count}
                                    <optgroup label='{$delivery_item->name}'>
                                        {foreach from=$delivery.$delivery_id item="delivery_child"}
                                            <option value="{$delivery_child->id}" {if $order->delivery_child_id == $delivery_child->id}selected="selected"{/if}>{$delivery_child->name}</option>
                                        {/foreach}
                                    </optgroup>
                                {else}
                                    <option value="{$delivery_item->id}" {if $order->delivery_id == $delivery_item->id}selected="selected"{/if}>{$delivery_item->name}</option>
                                {/if}
                            {/foreach}
                        </select>
                    </td>
                    <td valign="middle" align="left" style="text-align: left">

                        <input type="text" name="delivery_price" id="order_delivery_price" value="{$order->sum_delivery|default:0}" style="width: 50px;vertical-align: middle; text-align: center"
                               onchange="setOrderDiscountDelivery($('#order_sum_total'), '{$order->sum_order}', $('#order_delivery_price').val(), $('#order_discount_price').val(), $('#order_discount_type option:selected').val())"/>  руб.
                    </td>

                    <td valign="middle" align="left" colspan="3" rowspan="5">
                        <button onclick="AjaxFormRequest('order_products', 'form_order_products', '{$admin_url}order/set/options/{$order->id}/');
                                return false;">Сохранить</button>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        Скидка:
                    </td>
                    <td valign="middle" align="left" style="text-align: center;">
                        <input type="text" name="discount" id="order_discount_price" value="{if $order->discount_procent > 0}{$order->discount_procent}{else}{$order->discount_sum}{/if}" style="width: 50px;vertical-align: middle" onchange="setOrderDiscountDelivery($('#order_sum_total'), '{$order->sum_order}', $('#order_delivery_price').val(), $('#order_discount_price').val(), $('#order_discount_type option:selected').val())"/>
                        <select name="discount_type" style="width: 70px;" id="order_discount_type" onchange="setOrderDiscountDelivery($('#order_sum_total'), '{$order->sum_order}', $('#order_delivery_price').val(), $('#order_discount_price').val(), $('#order_discount_type option:selected').val())">
                            <option value="1"{if $order->discount_procent > 0} selected="selected"{/if}>%</option>
                            <option value="2"{if $order->discount_sum > 0} selected="selected"{/if}>руб.</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        Общая стоимость заказа:
                    </td>
                    <td valign="middle" align="left" style="text-align: center;">
                        <input type="text" name="sum_total" value="{$order->sum_total}" id="order_sum_total" style="width: 107px;vertical-align: middle"/> руб.
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        Расходы на заказ:
                    </td>
                    <td valign="middle" align="left" style="text-align: center;">
                        <input type="text" name="sum_expense" value="{$order->sum_expense}" style="width: 107px;vertical-align: middle"/> руб.
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="3">
                        Добавить товар к заказу: &nbsp;
                        {*                        <input type="text" name="article" placeholder="Артикул" id="add_product_article" style="width: 160px;vertical-align: middle"/>*}
                        <input type="text" name="name" placeholder="Название товара" id="add_product_article" style="width: 160px;vertical-align: middle"/>
                        {*   {if $get_sizes|@count}
                        <select style="width: 90px;" name="char_1_id">
                        <option value="0">Размер</option>
                        {foreach from=$get_sizes item=get_size}
                        <option value="{$get_size->id}">{$get_size->name}</option>
                        {/foreach}
                        </select>
                        {/if}*}
                    </td>
                    <td valign="middle" align="left" colspan="3">
                        <button onclick="AjaxFormRequest('order_products', 'form_order_products', '{$admin_url}order/add/product/{$order->id}/');
                                return false;">Добавить</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <br/>
</div>

<script type="text/javascript">
    $('#add_product_article').autocomplete({
        serviceUrl: '{$admin_url}order/add/product/', // Страница для обработки запросов автозаполнения
        minChars: 2, // Минимальная длина запроса для срабатывания автозаполнения
        delimiter: /(,|;)\s*/, // Разделитель для нескольких запросов, символ или регулярное выражение
        maxHeight: 400, // Максимальная высота списка подсказок, в пикселях
        width: 450, // Ширина списка
        zIndex: 9999, // z-index списка
        deferRequestBy: 0, // Задержка запроса (мсек), на случай, если мы не хотим слать миллион запросов, пока пользователь печатает. Я обычно ставлю 300.
        params: {ldelim}country: 'Yes'}, // Дополнительные параметры
                onSelect: function (data, value) {
                } // Callback функция, срабатывающая на выбор одного из предложенных вариантов,
    {*                ,lookup: ['January', 'February', 'March'] // Список вариантов для локального автозаполнения*}
            });
</script>