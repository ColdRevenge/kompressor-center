{if $order->order_id_buy_market}
    <div class="buy_market" style="line-height: 1.5em;max-width: 361px">
        <h3 style="margin: 7px 0 2px 0; color: black;">Покупка на  маркете</h3>


        <div>№ заказа в маркете: <b>{$order->order_id_buy_market}</b></div>
        <div id="status_buy_market_{$order->id}">Статус: <b>{if $order->status_buy_market}{foreach from=$buy_market_status item="item_buy_market"}{if $item_buy_market->code == $order->status_buy_market}{$item_buy_market->name} {if $order->sub_status_buy_market}{assign var="current_sub_name" value=$order->sub_status_buy_market} ({$buy_market_status_name.$current_sub_name}){/if}{/if}{/foreach}{else}<b style="color: red">Получение данных заказа</b>{/if}</b></div>

        {assign var='status_buy_market' value=$order->status_buy_market}
        {if $buy_market_status_arr.$status_buy_market|@count}
            <div id="request_status_id_{$order->id}">
                <form method="post" action="" style="padding-top: 8px" id="request_form_status_id_{$order->id}">
                    <b>Изменить статус:</b><br/>
                    <select style="width: 197px;" name="status_buy_market" onchange="if (this.options[this.selectedIndex].value == 'CANCELLED') {
                                $('#select_substatuses_{$order->id} :first').attr('selected', 'selected');
                                $('#substatuses_{$order->id}').fadeIn();
                            } else {
                                $('#select_substatuses_{$order->id} :first').attr('selected', 'selected');
                                $('#substatuses_{$order->id}').fadeOut();
                            }">
                        <option value="0">Выбрать статус</option>
                        {foreach from=$buy_market_status_arr.$status_buy_market item='status_arr'}
                            <option value="{$status_arr}">{$buy_market_status_name.$status_arr}</option>
                        {/foreach}
                    </select>
                    <div id="substatuses_{$order->id}" style="display: none;">
                        <select style="width: 197px;margin-top: 3px;" name="sub_status_buy_market" id="select_substatuses_{$order->id}">
                            <option value="0">Выбрать статус</option>
                            {foreach from=$buy_market_status item='sub_status_arr'}
                                {if $sub_status_arr->parent_id == 6}
                                    {assign var="current_status_code" value=$sub_status_arr->code}
                                    {if $sub_status_arr->is_visible_admin == 1}
                                        <option value="{$sub_status_arr->code}">{$buy_market_status_name.$current_status_code}</option>
                                    {/if}
                                {/if}
                            {/foreach}
                        </select>
                    </div>
                    <input type="hidden" value="{$order->order_id_buy_market}" name="order_id_buy_market" />
                    <button onclick="setBuyMarketStatus('request_status_id_{$order->id}', 'request_form_status_id_{$order->id}', 'status_buy_market_{$order->id}', '{$url}sync/buy/market/set/status');
                            return false">ОК</button>
                </form>
            </div>
        {/if}
    </div>
{/if}