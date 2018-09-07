{if $shop == 'lady' || $shop == 'platok' || $shop == 'woman'}
<tr>
    <td valign="middle" align="right">Состав: </td>
    <td valign="middle" align="left">
        <input type="text" name="mod_name[]" value="{$product_mod->name}"  style="width: 325px;"/>
    </td>
</tr> 
{/if}
<tr>
    <td valign="middle" align="right">Артикул: </td>
    <td valign="middle" align="left">
        <input type="text" name="mod_article[]" value="{$product_mod->article}"  style="width: 125px;"/>
    </td>
</tr>
<tr>
    <td valign="middle" align="right">Валютная цена: </td>
    <td valign="middle" align="left">
        <input type="text" id="mod_cost_price" name="mod_cost_price[]" value="{$product_mod->cost_price}"  style="width: 125px;"/>

        <select id="auto_format_currency" name="auto_format_currency[]" style="width: 70px;">
            <option value="usd" {if $product_mod->auto_format_currency == 'usd'}selected{/if}>USD</option>
            <option value="eur" {if $product_mod->auto_format_currency == 'eur'}selected{/if}>EUR</option>
        </select>

        <span>
            <input data-currency-usd="{$setting->usd}" data-currency-eur="{$setting->eur}"
                   value="1" type="checkbox" id="auto_format" name="auto_format[]"
                   {if $product_mod->auto_format}checked="checked"{/if}
                   id="checkbox_auto_format">
            <label for="checkbox_auto_format">Формировать цену автоматически</label>
        </span>
    </td>
</tr>
<tr>
    <td valign="middle" align="right">Цена: </td>
    <td valign="middle" align="left">
        <input type="text" id="mod_price" name="mod_price[]" value="{$product_mod->price|default:0}" style="width: 125px;" />


        <select name="mod_currency_id[]" style="width: 50px;">
            {foreach from=$currency item="curr"}
                <option value="{$curr->id}">{$curr->name}</option>
            {/foreach}    
        </select>
    </td>
</tr>
{*<tr>
<td valign="middle" align="right">Цена 2: </td>
<td valign="middle" align="left">
<input type="text" name="mod_price_1[]" value="{$product_mod->price_1|default:0}" style="width: 125px;" />
</td>
</tr>
<tr>
<td valign="middle" align="right">Цена 3: </td>
<td valign="middle" align="left">
<input type="text" name="mod_price_2[]" value="{$product_mod->price_2|default:0}" style="width: 125px;" />
</td>
</tr>
<tr>
<td valign="middle" align="right">Цена 4: </td>
<td valign="middle" align="left">
<input type="text" name="mod_price_3[]" value="{$product_mod->price_3|default:0}" style="width: 125px;" />
</td>
</tr>
<tr>
<td valign="middle" align="right">Цена 5: </td>
<td valign="middle" align="left">
<input type="text" name="mod_price_4[]" value="{$product_mod->price_4|default:0}" style="width: 125px;" />
</td>
</tr>
<tr>
<td valign="middle" align="right">Цена 6: </td>
<td valign="middle" align="left">
<input type="text" name="mod_price_5[]" value="{$product_mod->price_5|default:0}" style="width: 125px;" />
</td>
</tr>
<tr>
<td valign="middle" align="right">Цена 7: </td>
<td valign="middle" align="left">
<input type="text" name="mod_price_6[]" value="{$product_mod->price_6|default:0}" style="width: 125px;" />
</td>
</tr>
<tr>
<td valign="middle" align="right">Цена 8: </td>
<td valign="middle" align="left">
<input type="text" name="mod_price_7[]" value="{$product_mod->price_7|default:0}" style="width: 125px;" />
</td>
</tr>
<tr>
<td valign="middle" align="right">Цена 9: </td>
<td valign="middle" align="left">
<input type="text" name="mod_price_8[]" value="{$product_mod->price_8|default:0}" style="width: 125px;" />
</td>
</tr>
<tr>
<td valign="middle" align="right">Цена 10: </td>
<td valign="middle" align="left">
<input type="text" name="mod_price_9[]" value="{$product_mod->price_9|default:0}" style="width: 125px;" />
</td>
</tr>*}
{*        <tr>
<td valign="middle" align="right">Цена 11: </td>
<td valign="middle" align="left">
<input type="text" name="mod_price_10[]" value="{$product_mod->price_10|default:0}" style="width: 125px;" />
</td>
</tr>*}
<tr>
    <td valign="middle" align="right">Старая цена: </td>
    <td valign="middle" align="left">
        <input type="text" name="mod_old_price[]" value="{$product_mod->old_price|default:0}" style="width: 125px;" />
    </td>
</tr>
<tr>
    <td valign="middle" align="right">На складе: </td>
    <td valign="middle" align="left">
        <input type="text" name="mod_warehouse[]" value="{$product_mod->warehouse|default:100}" maxlength="11"  style="width: 50px;" />
    </td>
</tr>