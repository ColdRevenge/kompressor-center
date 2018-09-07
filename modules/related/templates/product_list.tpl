        {if $products|@count}
<h1>Категория &laquo;{$category_name}&raquo;</h1>
<form method="post" action="" id="related_save">
    <input type="hidden" name="related_send" value="1" />
    <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%" style="font-size: 12px;">
{*        <tbody class="tbody">
            <tr>
                <td colspan="3" align="right" valign="middle">
                    <button onclick="AjaxFormRequest('product_list','related_save','{$admin_url}related/add/product/{$type}/{$category_id|default:0}/{$product_id}/'); alert('Успешно сохранено!');AjaxQueryParentFrame('related_list_menu_{$type}','{$admin_url}related/get/product/{$type}/{$category_id|default:0}/{$product_id}/');return false;">Сохранить</button>
                </td>
            </tr>
        </tbody>*}
        <tbody class="table_header">
            <tr>
                <td valign="middle" align="center">&nbsp;</td>
                <td valign="middle" align="center">Название</td>
                <td valign="middle" align="center">Стоимость</td>
            </tr>
        </tbody>
        
        {foreach from = $products item = 'product'}
        {if $product->old_price}
        {assign var="discaunt" value=$product->price*100/$product->old_price}
        {assign var="discaunt" value=$discaunt-100}
        {else}
        {assign var="discaunt" value=0}
        {/if}
        {assign var="current_product_id" value=$product->id}
        {if $product_id != $current_product_id}
            <tbody class="tbody">
            <tr>
                <td valign="middle" align="center">
                    <input type="checkbox" value="{$product->id}" {if $selected_product.$current_product_id}checked="checked"{/if} id="related_product_id_{$product->id}" name="related_product_id[]"  onchange="AjaxFormRequest('product_list','related_save','{$admin_url}related/add/product/{$type}/{$category_id|default:0}/{$product_id}/'); AjaxQueryParentFrame('related_list_menu_{$type}','{$admin_url}related/get/product/{$type}/{$category_id|default:0}/{$product_id}/');return false;" />
                </td>
                <td valign="middle" align="center">
                    <img src="/images/gallery/{$product->file}" alt="" style="max-height: 80px;" />
                </td>
                <td valign="middle" align="center"  style="cursor: pointer;" onclick="if (document.getElementById('related_product_id_{$product->id}').checked) {$ldelim}document.getElementById('related_product_id_{$product->id}').checked = false;{$rdelim} else {$ldelim}document.getElementById('related_product_id_{$product->id}').checked = true;$('#related_product_id_{$product->id}').change(){$rdelim}">
                        {$product->name|stripslashes}
                    <div class="notice">Артикул: {$product->article|stripslashes}</div>

                </td>
                <td valign="middle" align="center"  style="cursor: pointer;" onclick="if (document.getElementById('related_product_id_{$product->id}').checked) {$ldelim}document.getElementById('related_product_id_{$product->id}').checked = false;{$rdelim} else {$ldelim}document.getElementById('related_product_id_{$product->id}').checked = true;$('#related_product_id_{$product->id}').change(){$rdelim}">{$product->price} руб.</td>
            </tr>
        </tbody>
        {/if}
        {/foreach}
{*        <tbody class="tbody">
            <tr>
                <td colspan="3" align="right" valign="middle">
                    <button onclick="AjaxFormRequest('product_list','related_save','{$admin_url}related/add/product/{$type}/{$category_id|default:0}/{$product_id}/'); alert('Успешно сохранено!');AjaxQueryParentFrame('related_list_menu_{$type}','{$admin_url}related/get/product/{$type}/{$category_id|default:0}/{$product_id}/');return false;">Сохранить</button>
                </td>
            </tr>
        </tbody>*}
    </table>
</form>
{else}
<h1>Категория пуста &laquo;{$category_name}&raquo;</h1>
        {/if}