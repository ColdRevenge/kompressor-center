
{if $is_mobile == 1}
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="/">Назад</a></div>
        <h1>Мои заказы</h1>
        <div class="clear">&nbsp;</div>
    </div>

    <ul id="profile-link">
        <li><a href="/stat/delivery/post/">Отследить заказ (Почта России)</a></li>
        <li><a href="/stat/profile/">Мой профиль</a></li>
        <li><a href="/stat/password/">Сменить пароль</a></li>
        <li><a href="/auth/exit/?back_url={$url}{$smarty.server.REQUEST_URI|ltrim:"/"}">Выход</a></li>
    </ul>

    {if $orders|@count}
        <table cellpadding="4" cellspacing="1" border="3" width="100%" class="table">
            <tbody>
                <tr>
                    <td valign="middle" align="center" style="text-align: center">Дата</td>
                    <td valign="middle" align="center">Заказанные товары</td>
                    <td valign="middle" align="center" style="width: 120px;text-align: center">Стоимость</td>
                </tr>
            </tbody>
            {foreach from=$orders item="order" name="order"}
                {assign var='order_id' value=$order->id}
                {if $products.product.$order_id|@count > 0}
                    <tbody>
                        <tr>

                            <td valign="middle" align="center">{$order->created|date_format:"%d.%m.%Y"}

                                <div class="notice" style="margin-top: 10px;text-align: center"><b>№ {$order->id}</b></div>
                            </td>
                            <td valign="middle" align="left">
                                {assign var='sum_cost' value=0}
                                {foreach from=$products.product.$order_id item="product" key="product_id"}
                                    <div class="order-product">
                                        <a href="{$host_url}products/{$product->pseudo_dir}/?is_modal=1" rel="fancy" class="order-product-name">{$product->name|stripslashes} {if $product->mod_name}({$product->mod_name|stripslashes}){/if}</a> 
                                        {assign var='sum_cost' value=$sum_cost+$product->sum}
                                        <span>({foreach from=$products.count.$order_id.$product_id item="product_count"}{$product_count}&nbsp;шт.){/foreach}</span>
                                    </div>
                                {/foreach}
                            </td>

                            <td valign="middle" align="center">
                                {foreach from=$products.product.$order_id item="product" key="product_id"}
                                    <div class="order-product order-product-price">
                                        {$products.count_price.$order_id.$product_id|number_format:"0":" ":" "}&nbsp;<span>руб.</span>
                                    </div>
                                {/foreach}

                                <div class="notice" style="margin-top: 10px;text-align: center"><b>{$order->status_name}</b></div>
                            </td
                            </td>

                        </tr>
                    </tbody>
                {/if}
            {/foreach}
        </tbody>
    </table>
{/if}


{if !$orders_complected|@count && !$orders|@count}
    <h2>Нет заказов</h2>
{/if}
{else}
    <div id="stat-left-menu">
        {include file="stat_menu.tpl"}
    </div>
    <div id="stat_content">
        <div class="breadcrumbs-block">

            <ul class="clearfix">
                <li><a href="{$url}">Главная</a><span>/</span></li>
                <li>Мои заказы</li>
            </ul>
        </div>

        <h1>Мои заказы</h1>



        <div class="text">
            <div>
                {if $orders|@count}
                    <table cellpadding="4" cellspacing="1" border="0" width="100%" class="order-table">
                        <tbody>
                            <tr>
                                <td valign="middle" align="center">№</td>
                                <td valign="middle" align="center">Дата</td>
                                <td valign="middle" align="center">Заказанные товары</td>
                                <td valign="middle" align="center">Статус</td>
                                <td valign="middle" align="center" style="width: 120px;text-align: center">Стоимость</td>
                            </tr>
                            {foreach from=$orders item="order" name="order"}
                                {assign var='order_id' value=$order->id}
                                {if $products.product.$order_id|@count > 0}
                                    <tr>
                                        <td valign="middle" align="center">{$order->id}</td>
                                        <td valign="middle" align="center">{$order->created|date_format:"%d.%m.%Y"}</td>
                                        <td valign="middle" align="left">
                                            {assign var='sum_cost' value=0}
                                            {foreach from=$products.product.$order_id item="product" key="product_id"}
                                                <div class="order-product">
                                                    <a href="{$host_url}products/{$product->pseudo_dir}/?is_modal=1" rel="fancy" class="order-product-name">{$product->name|stripslashes} {if $product->mod_name}({$product->mod_name|stripslashes}){/if}</a> 
                                                    {assign var='sum_cost' value=$sum_cost+$product->sum}
                                                    <span>({foreach from=$products.count.$order_id.$product_id item="product_count"}{$product_count}&nbsp;шт.){/foreach}</span>
                                                </div>
                                            {/foreach}
                                        </td>
                                        <td valign="middle" align="center">{$order->status_name}</td>
                                        <td valign="middle" align="center">
                                            {foreach from=$products.product.$order_id item="product" key="product_id"}
                                                <div class="order-product order-product-price">
                                                    {$products.count_price.$order_id.$product_id|number_format:"0":" ":" "}&nbsp;<span>руб.</span>
                                                </div>
                                            {/foreach}
                                        </td
                                        </td>

                                    </tr>
                                {/if}
                            {/foreach}
                        </tbody>
                    </table>
                {/if}


                {if !$orders_complected|@count && !$orders|@count}
                    <h2>Нет заказов</h2>
                {/if}

            </div>
        </div>
    </div>
{/if}
<br/><br/>