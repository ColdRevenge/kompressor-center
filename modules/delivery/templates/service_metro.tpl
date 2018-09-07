<table class="table_fields">
    <tbody>
        <tr>
            <td valign="middle" align="right" style="text-align: right">Ближайшее метро: </td>
            <td valign="middle" align="left" style="text-align: left">
                <select class="form-control" name="metro_id" style="width: 330px;">
                    <option value="">Выбрать</option>
                    {foreach from=$metro item="item"}
                        <option value="{$item->id}"{if $smarty.post.metro_id == $item->id} selected="selected"{/if}>{$item->name}</option>
                    {/foreach}
                </select>
            </td>
        </tr>
        {include file="free_delivery_info.tpl"}
    </tbody>
</table>