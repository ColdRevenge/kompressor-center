
<h1>Цены на продукцию</h1>

<h2>Дни поставок:</h2>
{$footer_left}
{foreach from=$root_categoryes.0 item="root_category"}
    {assign var="root_category_id" value=$root_category->id}
    {if $products.$root_category_id}
        <h3 style="padding: 10px;">{$root_category->name}</h3>
        <table cellpadding="4" cellspacing="1" border="0" class="table_list" style="width: 550px;margin: 0px 40px;;" >
            <tbody class="table_header_list">
                <tr>
                    <td valign="middle" align="center">Название</td>
                    <td valign="middle" align="center">Стоимость, руб.</td>
                </tr>
            </tbody>
            {foreach from=$products.$root_category_id item="product"}
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><a href="{$url}products/{$product->pseudo_dir}/" class="price">{$product->name}</a></td>
                        <td valign="middle" align="center"><a href="{$url}products/{$product->pseudo_dir}/" class="price">{$product->price}</a></td>
                    </tr>
                </tbody>
            {/foreach}
        </table>
    {/if}
    {foreach from=$root_categoryes.$root_category_id item="category"}
        {assign var="category_id" value=$category->id}
        <h3 style="padding: 10px;">{$category->name}</h3>
        <table cellpadding="4" cellspacing="1" border="0" class="table_list" style="width: 550px;margin: 0px 40px;">
            <tbody class="table_header_list">
                <tr>
                    <td valign="middle" align="center">Название</td>
                    <td valign="middle" align="center">Стоимость, руб.</td>
                </tr>
            </tbody>
            {foreach from=$products.$category_id item="product"}
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><a href="{$url}products/{$product->pseudo_dir}/" class="price">{$product->name}</a></td>
                        <td valign="middle" align="center"><a href="{$url}products/{$product->pseudo_dir}/" class="price">{$product->price}</a></td>
                    </tr>
                </tbody>
            {/foreach}
        </table>
    {/foreach}
{/foreach}