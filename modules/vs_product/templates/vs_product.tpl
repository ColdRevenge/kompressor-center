
<table class="table" style="margin: 0; width: 100%">
    <tr>
        <td style="width: 300px;">&nbsp;</td>
        {foreach from=$get_products item="product"}
            <td style="text-align: center; vertical-align: bottom; padding-top: 10px;">
                <div><a href="{$url}products/{$product->pseudo_dir}/" target="_top" style=" font-size: 17px;">{$product->name}</a></div>
                <div><a href="{$url}products/{$product->pseudo_dir}/" target="_top"><img src="{$gallery_url}{$product->file}" onerror="this.src='/images/icons/no-image.png'" alt="" style="margin-top: 10px;margin-bottom: 5px;max-height: 95px; border: 1px solid #E5E5E5"  /></a></div>

                <a href="{$url}vs_product/del/{$product->id}/?is_modal=1&category_id={$param_tpl.category_id}" style=" color: #222;">Удалить</a>

            </td>
        {/foreach}
    </tr>

    {foreach from=$char_all item="char_all_item"} {* Обходим все характеристики *}
            {if $char_all_item->id != 640}
                <tr>
                    <td style="text-align: left; font-size: 17px;padding-bottom: 10px">
                        {$char_all_item->name|stripslashes|replace:"?":""}
                    </td>
                    {foreach from=$get_products item="product"}
                        <td style="text-align: center; font-size: 17px;">
                            {assign var="product_id" value=$product->id}
                            {if $characteristics_product.$product_id|@count}
                                {foreach from=$characteristics_product.$product_id item="value"}
                                    {assign var="characteristic_id" value= $value->characteristic_id}
                                    {if $diff.$characteristic_id || $diff_characteristic.$characteristic_id|@count != $get_products|@count}<span style="color: red;font-size: 17px;">{/if}
                                        {if $char_all_item->id == $value->characteristic_id} {* Только текущая характеристика выводиться *}
                                                {assign var="is_out_char" value="0"}
                                                {if $is_out_char != $value->characteristic_id} 
                                                    {* Вывод нескольких характеристик *}
                                                    {foreach from=$characteristics_product.$product_id item="value_1"}{if $value->characteristic_id == $value_1->characteristic_id}{if $is_out_char_value_1 == $value_1->characteristic_id} {/if}
                                                    {$value_1->value_name|stripslashes|replace:"?":""}{assign var="is_out_char_value_1" value=$value_1->characteristic_id}{/if}{/foreach}

                                                    {assign var='is_out_char' value=$value->characteristic_id}
                                                {/if}
                                            {/if}
                                            {if $diff.$characteristic_id || $diff_characteristic.$characteristic_id|@count != $get_products|@count}</span>{/if}
                                            {/foreach}
                                                {/if}
                                            </td>
                                            {/foreach}
                                            </tr>
                                            {/if}
                                                {/foreach}

                                                    <tr>
                                                        <td style="width: 300px;">&nbsp;</td>
                                                        {foreach from=$get_products item="product"}
                                                            <td style="text-align: center; vertical-align: bottom; padding-top: 10px;">
                                                                <div style=" font-size: 19px;color: #e41b1f">{$product->price} руб.</div>
                                                            </td>
                                                        {/foreach}

                                                    </tr>
                                                </table>
