
{if $products|@count}
    <h1>Категория &laquo;{$category_name}&raquo;</h1>
    <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%" style="font-size: 12px;">

        <tbody class="table_header">
            <tr>
                <td valign="middle" align="center">&nbsp;</td>
                <td valign="middle" align="center">Название</td>
            </tr>
        </tbody>

        {foreach from = $products item = 'product'}
            {assign var="current_product_id" value=$product->id}
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="center">
                        <form method="post" action="" id="news_product_{$product->id}">
                            <input type="hidden" value="{$product->id}" name="product_id" />
                            <input type="checkbox" value="1" id="checkbox_{$product->id}" {if $selected_news.$current_product_id}checked="checked"{/if} name="is_product_id"  
                                   onchange="AjaxFormRequest('product_list', 'news_product_{$product->id}', '{$admin_url}news/product_list/{$news_id}/{$category_id|default:0}/');   AjaxQueryParentFrame('news_for_products', '{$admin_url}news/product_menu/{$news_id}/');" />
                                                          

                        </form>
                    </td>
                    <td valign="middle" align="center"  style="cursor: pointer;" onclick="$('#checkbox_{$product->id}').attr('checked', !$('#checkbox_{$product->id}').attr('checked'));
                            $('#checkbox_{$product->id}').change();
                            return false;">
                        {$product->name|stripslashes}
                    </td>
                </tr>
            </tbody>
        {/foreach}
    </table>
{else}
    <h1>Категория пуста &laquo;{$category_name}&raquo;</h1>
{/if}