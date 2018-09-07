<div class="block">
    {include file=$template_message message=$message error=$error}


    {if $orders|@count}
        <h2>Список заказов  пользователя <b>{$users->login}</b></h2>
        <div  id="order_list_block">
            {if $orders}

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
                    {assign var="total" value="0"}
                    {foreach from=$orders item="order" name="order"}
                        {assign var='order_id' value=$order->id}
                        <tbody class="tbody">
                            <tr>

                                <td valign="middle" align="center"><a  href="{$admin_url}order/get/{$order->id}" target="_blank">{$order->id}</a></td>
                                <td valign="middle" align="center">{$order->created|date_format:"%d.%m.%Y %H:%M"} <div class="notice">{$order->status_name}</div></td>
                                <td valign="middle" align="left" style="line-height: 1.4em">
                                    {foreach from=$products.$order_id item="product"}
                                        <div>
                                            <span class="notice">[Артикул: {$product->article}]</span> <a href="{$url}products/{$product->pseudo_dir}/" target="_blank">{$product->name|stripslashes}</a> 

                                            - {$product->price} р. x {$product->count} шт. =  {$product->sum|number_format:2|replace:",":"&nbsp;"} р.
                                        </div>

                                    {/foreach}
                                </td>
                                <td valign="middle" align="left">
                                    <b>{$order->city_index|stripslashes} {$order->city|stripslashes}</b>
                                    <div style="height: 5px; font-size: 0">&nbsp;</div>
                                    {$order->adress|stripslashes}
                                    <div style="height: 5px; font-size: 0">&nbsp;</div>
                                    {$order->delivery_name}
                                </td>
                                <td valign="middle" align="center">

                                    <b  style="font-size: 14px;font-weight: normal">{$order->sum_order|number_format:2|replace:",":"&nbsp;"} р.</b> {if $order->discount_procent}<b style="font-size: 14px; color: #e41b1f">-{$order->discount_procent}%</b>{/if} {if $order->discount_sum}<b style="font-size: 14px; color: #e41b1f">-{$order->discount_sum} руб.</b>{/if}  <b style="font-size: 14px; font-weight: normal"> + доставка {$order->sum_delivery} р.</b> <b style="font-size: 14px; "> = {$order->sum_total|number_format:2|replace:",":"&nbsp;"} р.</b>{* <b>{$default_currency->name}</b>*}



                                    {if $order->is_payment == 1}
                                        <div class="notice" style="color: #1976C3">Заказ оплачен</div>
                                    {/if}

                                </td>


                                {assign var="total" value=$total+$order->sum_total}
                            </tr>
                        </tbody>
                    {/foreach}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="right" colspan="8">
                                Всего: <b>{$smarty.foreach.order.iteration}</b>, Общая стоимость заказов: <b>{$total|number_format:2|replace:",":"&nbsp;"} руб.</b>
                            </td>
                        </tr>
                    </tbody>
                </table>
            {else}
                <h2>Заказы отсутствуют</h2>
            {/if}
        </div>
    {else}
        <h2>Заказы отсутствуют</h2>
    {/if}
</div>
