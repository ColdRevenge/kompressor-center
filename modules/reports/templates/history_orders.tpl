<div class="block">
    {include file="_menu_reports.tpl"}
    <div class="page">
        <h1>{if $type == 1}История выполненных заказов{elseif $type == 2}История отмененных заказов{/if}</h1>


        <form method="post" action="">

            <table cellpadding="4" cellspacing="1" border="0" class="table" width="710" style="margin: auto">
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">
                            Дата заказа:
                        </td>
                        <td valign="middle" align="left">
                            с {$start_date_form} до {$end_date_form}
                        </td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <input type="hidden" src="{$sys_images_url}sform.png" name="send" value="Сформировать"/>
                            <button>Сформировать</button>
                        </td>
                    </tr>
                </tbody>
            </table>


        </form>
        <br/>
        {if $orders|@count}
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
                {assign var="total" value="0"}
                {foreach from=$orders item="order" name="order"}
                    {assign var='order_id' value=$order->id}
                    <tbody class="tbody">
                        <tr>

                            <td valign="middle" align="center"><a  href="{$admin_url}order/get/{$order->id}/?not_menu=1{if $menu_type == 2}&is_delete_product=-1{/if}" class="fancy">{$order->id}</a></td>
                            <td valign="middle" align="center">{$order->created|date_format:"%d.%m.%Y %H:%M"}</td>
                            <td valign="middle" align="left" style="line-height: 1.4em">
                                {assign var='order_id' value=$order->id}
                                {assign var='sum_cost' value=0}

                                {if $order->user_id}Логин: <a href="{$admin_url}users/admin/0/edit/{$order->user_id}/?is_modal=1" class="fancy">{$order->login}</a> <a href="{$admin_url}users/admin/0/history/{$order->user_id}/?is_modal=1" class="fancy" title="История заказов польщзователя {$order->login}"><img src="{$sys_images_url}orders.png" alt="" style="margin-left: 3px"/></a><br/>{/if}
                                {if $order->fio}ФИО: {$order->fio|stripslashes}<br/>{/if}
                                {if $order->phone}Телефон: {$order->phone|stripslashes}<br/>{/if}
                                {if $order->email}E-mail: <a href="mailto:{$order->email}">{$order->email}</a><br/>{/if}
                            </td>
                            <td valign="middle" align="left">
                                <b>{$order->city_index|stripslashes} {$order->city|stripslashes}</b>
                                <div style="height: 5px; font-size: 0">&nbsp;</div>
                                {$order->adress|stripslashes}
                                <div style="height: 5px; font-size: 0">&nbsp;</div>
                                {$order->delivery_name}
                            </td>
                            <td valign="middle" align="center">

                                <b  style="font-size: 14px;font-weight: normal">{$order->sum_total|number_format:2|replace:",":"&nbsp;"} р.</b>{* <b>{$default_currency->name}</b>*}



                                {if $order->is_payment == 1}
                                    <div class="notice" style="color: #1976C3">Заказ оплачен</div>
                                {/if}

                            </td>

                            <td valign="middle" align="center">{$order->comment}</td>

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
            {if $type == 1}
                <h2>Отсутствуют выполненные заказы</h2>
            {elseif $type == 2}
                <h2>Отсутствуют отмененные заказы</h2>
            {/if}
        {/if}
    </div>
</div>