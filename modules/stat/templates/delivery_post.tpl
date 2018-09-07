{include file=$template_message message=$message error=$error}
{if $is_mobile == 1}
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="/">Назад</a></div>
        <h1>Отследить заказ (Почта России)</h1>
        <div class="clear">&nbsp;</div>
    </div>

    <ul id="profile-link">
        <li><a href="/stat/orders/">Мои заказы</a></li>
        <li><a href="/stat/profile/">Мой профиль</a></li>
        <li><a href="/stat/password/">Сменить пароль</a></li>
        <li><a href="/auth/exit/?back_url={$url}{$smarty.server.REQUEST_URI|ltrim:"/"}">Выход</a></li>
    </ul>
{else}
    <div id="stat-left-menu">
        {include file="stat_menu.tpl"}
    </div>
    <div id="stat_content">

        <div class="breadcrumbs-block">

            <ul class="clearfix">
                <li><a href="{$url}">Главная</a><span>/</span></li>
                <li>Отследить заказ (Почта России)</li>
            </ul>
        </div>
        <h1>Отследить заказ (Почта России)</h1>
    {/if}
    {foreach from=$get_order item="order"}
        <h2>Заказ №{$order.order->id}</h2>
        <p>Обновлено: <b>{$order.delivery.result.checkpoints|date_format:"%d.%m.%Y %H:%I"}</b> <span class="notice">(трек: <b>{$order.delivery.result.tracking_number})</b></span></p>
        {*    <p>Вес: {$order.delivery.result.extra[0]['specific.russian-post.finance.mass_rate']|var_dump}</p>*}
        <table  border="3" style="margin: auto;">
            <tbody>
                <tr>
                    <td valign="middle" align="center">Время</td>
                    <td valign="middle" align="center">Адрес</td>
                    <td valign="middle" align="center">Статус</td>
                </tr>
            </tbody>
            <tbody>
                {foreach from=$order.delivery.result.checkpoints item="deliv" name="deliv"}
                    <tr>
                        <td valign="middle" align="center" style="font-size: 14px;width: 120px;">
                            {$deliv.time|date_format:"%d.%m.%Y %H:%I"}
                        </td>
                        <td valign="middle" align="center" style="font-size: 14px;">
                            {$deliv.location}
                        </td>
                        <td valign="middle" align="center" style="font-size: 14px;">
                            {$deliv.message}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {foreachelse}
        <h2>Нет отправленных заказов</h2>
        <p>Возможно статус Вашего заказа еще не обновился в отделении почты России. Если Вы совершили заказ, то в ближайшее время Вы сможете его отследить через этот раздел</p>
    {/foreach}
    {if $is_mobile != 1}
    </div>
{/if}
<br/><br/>