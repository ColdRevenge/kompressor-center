<table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: auto;" width="100%">
    <thead>
        <tr>
            <td valign="middle" align="center">Название</td>
            <td valign="middle" align="center">Артикул</td>
            <td valign="middle" align="center">Кол-во</td>
            <td valign="middle" align="center">Сумма</td>
            <td valign="middle" align="center">Доход</td>
        </tr>
    </thead>
    {assign var="total" value="0"}
    {foreach from=$orders item="order" name="order"}
        {assign var='order_id' value=$order->id}
        <tbody class="tbody">
            <tr>
                <td valign="middle" align="left">

                    {assign var="_shop_url" value=$url}
                    <a href="{$_shop_url}products/{$order->pseudo_dir}/" target="__blank">{$order->name|stripslashes}</a></td>
                <td valign="middle" align="center">
                    {$order->article|stripslashes}
                </td>
                <td valign="middle" align="center">
                    {$order->count|stripslashes}
                </td>
                <td valign="middle" align="center">
                    {$order->sum_total|number_format:2|replace:",":"&nbsp;"} р.
                </td>
                <td valign="middle" align="center">
                    {($order->sum_total-$order->sum_expense)|number_format:2|replace:",":"&nbsp;"} р.
                </td>
            </tr>
        </tbody>
        {assign var="total" value=$total+$order->sum_total}
    {/foreach}
</table>