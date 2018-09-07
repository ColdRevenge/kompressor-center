
{if $orders}

    <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%">
        <thead>
            <tr>
                <td valign="middle" align="center">№</td>
                <td valign="middle" align="center">Дата создания</td>
                <td valign="middle" align="center">Контактная информация</td>
                <td valign="middle" align="center">Адрес</td>
                <td valign="middle" align="center">Стоимость заказа</td>
                <td valign="middle" align="center" width="220">Статус</td>
                <td valign="middle" align="center" width="47">&nbsp;</td>
            </tr>
        </thead>
        {assign var="total" value="0"}
        {foreach from=$orders item="order" name="order"}
            {assign var='order_id' value=$order->id}
            <tbody class="order_shop_{$order->shop_id}" {if $order->email|in_array:$getBlackList} style="color: red;"{/if} id="tbody_order_{$order_id}">
                <tr> 

                    <td valign="middle" align="center"><a  href="{$admin_url}order/get/{$order->id}/?not_menu=1" class="fancy">{$order->id}</a></td>
                    <td valign="middle" align="center" style="cursor: pointer;" onclick="location.href = '{$admin_url}order/get/{$order_id}/'">{$order->created|date_format:"%d.%m.%Y %H:%M"}</td>
                    <td valign="middle" align="left" style="line-height: 1.4em">
                        {assign var='order_id' value=$order->id}
                        {assign var='sum_cost' value=0}

                        {if $order->user_id}Логин: <a href="{$admin_url}users/admin/0/edit/{$order->user_id}/?is_modal=1" rel="fancy">{$order->login}</a> <a href="{$admin_url}users/admin/0/history/{$order->user_id}/?is_modal=1" class="fancy" title="История заказов польщзователя {$order->login}"><img src="{$sys_images_url}orders.png" alt="" style="margin-left: 3px"/></a><br/>{/if}
                        {if $order->fio}ФИО: {$order->fio|stripslashes|strip_tags}&nbsp;<a href="{$admin_url}order/black-list/{$order->id}/?is_modal=1" rel="fancy"><img src="/images/sys/admin/ban.png" alt="" title="Добавит покупателя ь в черный список" width="16" /></a><br/>{/if}
                        {if $order->phone}Телефон: {$order->phone|stripslashes|strip_tags}<br/>{/if}
                        {if $order->email}E-mail: <a href="mailto:{$order->email}">{$order->email|strip_tags}</a><br/>{/if}
                        {include file="buy_market_info.tpl"}

                    </td>
                    <td valign="middle" align="left" {*style="cursor: pointer;" onclick="location.href = '{$admin_url}order/get/{$order_id}/'"*}>
                        <b>{$order->city_index|stripslashes} {$order->city|stripslashes|strip_tags}</b>
                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                        {$order->adress|stripslashes|strip_tags}


                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                        {$order->delivery_name}

                        {if ($order->status_id == 7 || $order->status_id == 8) && $order->post_code}

                            <div id="result_{$order_id}">&nbsp;</div>
                            {gdePosulka_obj->cacheGdePosulka post_code=$order->post_code order_id=$order_id assign="cache_gde_posulka"}
                            {if $cache_gde_posulka|@count > 1}
                                {include file=$base_dir|cat:'modules/delivery/templates/gdePosulkaList.tpl' list=$cache_gde_posulka}
                            {else}
                                <script type="text/javascript">
                                    AjaxRequest('result_{$order_id}', '{$admin_url}delivery/gdeposulka/get/{$order_id}/{$order->post_code}/')
                                </script>
                            {/if}
                        {/if}
                    </td>
                    <td valign="middle" align="center" {*style="cursor: pointer;" onclick="location.href = '{$admin_url}order/get/{$order_id}/'"*}>

                        <b  style="font-size: 14px;font-weight: normal">{$order->sum_order|number_format:2|replace:",":"&nbsp;"} р.</b> {if $order->discount_procent && $order->coupon_discount_sum == 0}<b style="font-size: 14px; color: #e41b1f">-{$order->discount_procent}%</b>{/if} {if $order->discount_sum}<b style="font-size: 14px; color: #e41b1f">-{$order->discount_sum} руб.</b>{/if}  

                        <b style="font-size: 14px; font-weight: normal"> + доставка {$order->sum_delivery} р. 

                            {if $order->delivery_id == 11} {* Почта России *}
                                    {if $order->sum_discount < 1000}
                                        <span class="notice">(+ {(40 + ($order->sum_discount * 0.05))|@ceil} с покупателя за НП)</span>
                                    {elseif $order->sum_discount < 5000}
                                        <span class="notice">(+ {(50 + ($order->sum_discount * 0.04))|@ceil} с покупателя за НП)</span>
                                    {elseif $order->sum_discount < 20000}
                                        <span class="notice">(+ {(150 + ($order->sum_discount * 0.02))|@ceil} с покупателя за НП)</span>
                                    {elseif $order->sum_discount >= 20000}
                                        <span class="notice">(+ {(250 + ($order->sum_discount * 0.015))|@ceil} с покупателя за НП)</span>
                                    {/if}
                                {/if}
                            </b> <b style="font-size: 14px; "> = {$order->sum_total|number_format:2|replace:",":"&nbsp;"} р.</b>{* <b>{$default_currency->name}</b>*}

                            <div><textarea style="min-width: 260px; height: 40px;margin: 4px 0;font-size: 13px;" placeholder="Комментарий менеджера" 
                                           onchange="$(this).attr('disabled', 'disabled');
                                                           AjaxRequest('', '{$admin_url}order/set/comment/{$order_id}/?comment=' + $(this).val());
                                                           $(this).removeAttr('disabled');">{$order->comment_admin|stripslashes}</textarea></div>


                            {if $order->is_payment == 1}
                                <div class="notice" style="color: green; margin-top: 4px;">Заказ оплачен {if $order->payment_method_id == 3}(МКБ){elseif $order->payment_method_id == 7}Яндекс.Деньги (сумма <b>{$order->payment_sum} руб.</b>){elseif $order->payment_method_id == 5}(Авангард){elseif $order->payment_method_id == 4}(Яндекс.Деньги){elseif $order->payment_method_id == 5}(Авангард){elseif $order->payment_method_id == 6}(Robokassa){/if}</div>
                            {elseif $order->payment_method_id == 5}
                                <div class="notice" style="color: green; margin-top: 4px;">Выбран способ оплаты Банковская карточка</div>

                            {/if} 
                            {if $order->coupon_discount_sum > 0}
                                <div class="notice" style="color: green; margin-top: 4px;">Использована дисконтная карточка №: <b>{$order->coupon}</b>, скидка: <b>{$order->coupon_discount_sum}</b> руб.</div>
                            {/if}
                            {if ($order->payment_method_id == 8)}
                                <div class="notice" style="color: green; margin-top: 4px;">Способ оплаты - Сбербанк. К оплате - <b>{($order->sum_total*0.95)|number_format:0|replace:",":"&nbsp;"} р.</b> (нужно изменить сумму, а потом статус Ожидает оплаты Сбербанк)</div>
                            {/if}

                        </td>
                        <td valign="middle" align="center" style="width: 230px;">
                            <form method="post" action="" id="form_status_{$order->id}">
                                <select name="status[{$order->id}]" style="width: 160px;" id="select_status_{$order->id}">
                                    {foreach from=$status item="status_item"}
                                        <option value="{$status_item->id}" {if $order->status_id == $status_item->id}selected="selected"{/if}{if $order->sum_expense == 0 && $setting->is_expense == 1 && $status_item->id == 3} disabled="disabled"{/if}>{$status_item->name}</option>
                                    {/foreach}
                                </select>
                                <button onclick="$(this).addClass('hide');
                                        AjaxFormRequest('order_list_block', 'form_status_{$order->id}', '{$admin_url}order/set/status/{$order_id}/' + document.getElementById('select_status_{$order->id}').options[document.getElementById('select_status_{$order->id}').selectedIndex].value + '/');
                                        return false;" >ОК</button>
                            </form>
                        </td>

                        <td valign="middle" align="center">
                            <a href="{$admin_url}order/get/{$order_id}/" title="Редактировать"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" style="vertical-align: middle" /></a>


                            <img src="{$sys_images_url}admin/del.png" alt="" style="cursor: pointer;vertical-align: middle" onclick="if (confirm('Вы действительно хотите удалить заказ № {$order->id}?')){ldelim}
                                        location.href = '{$admin_url}order/list//3/{$order->id}/'{rdelim}"  title="Отменить"/>
                        </td>
                        {assign var="total" value=$total+$order->sum_total}
                    </tr>
                </tbody>
                {/foreach}
                    <tfoot>
                        <tr>
                            <td valign="middle" align="right" colspan="8">
                                Всего: <b>{$smarty.foreach.order.iteration}</b>, Общая стоимость заказов: <b>{$total|number_format:2|replace:",":"&nbsp;"} руб.</b>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                {else}
                    <h2>Заказы отсутствуют</h2>
                    {/if}