<div class="block">
    {include file="_menu_reports.tpl"}
    <div class="page">
        <h1>{if $type == 4}Отсутствуют на складе{elseif $type == 3}Самые продоваемые{/if}</h1>

        {if $products|@count}
            <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%">
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">Товар</td>
                        <td valign="middle" align="center">Артикул</td>
                        <td valign="middle" align="center">Код</td>
                        <td valign="middle" align="center">Стоимость</td>
                    </tr>
                </tbody>
                {foreach from=$products item="product" name="product"}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left"><a href="{$admin_url}products/edit/0/{$product->category_1_id}/{$product->id}/{$product->id}/">{$product->name}</a></td>
                            <td valign="middle" align="center"><a href="{$admin_url}products/edit/0/{$product->category_1_id}/{$product->id}/{$product->id}/">{$product->article}</a></td>
                            <td valign="middle" align="center"><a href="{$admin_url}products/edit/0/{$product->category_1_id}/{$product->id}/{$product->id}/">{$product->code}</a></td>
                            <td valign="middle" align="center"><a href="{$admin_url}products/edit/0/{$product->category_1_id}/{$product->id}/{$product->id}/">{$product->price|default:0} руб.</a></td>

                        </tr>
                    </tbody>
                {/foreach}
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="8">
                            Всего: <b>{$smarty.foreach.product.iteration}</b>
                        </td>
                    </tr>
                </tbody>
            </table>
        {else}
            <h2>Нет товаров отсутствующих на складе</h2>
        {/if}
    </div>
</div>