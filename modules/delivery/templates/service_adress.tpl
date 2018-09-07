<table class="table_fields">
    <tbody>
        <tr>
            <td valign="top" align="right" style="text-align: right; padding-top: 8px;"><label class="form-label">Адрес доставки: <span class="asterix">*</span></label></td>

            <td valign="middle" align="left">
                <input type="text" name="street" class="form-control" value="{$smarty.post.street}" id="street" placeholder="Улица" style="width: 330px;" />
            </td>

        </tr>
        <tr>
            <td valign="top" align="right" style="text-align: right"></td>
            <td valign="middle" align="left" style="padding-bottom: 10px;">
                <input type="text" class="form-control -small" name="house" value="{$smarty.post.house}" id="house" placeholder="Дом" style="width: 77px" />
                <input type="text" class="form-control -small" name="housing" value="{$smarty.post.housing}"  placeholder="Корпус" style="width: 77px" />
                <input type="text" class="form-control -small" name="building" value="{$smarty.post.building}"  placeholder="Строение" style="width: 82px" />
                <input type="text" class="form-control -small" name="appartment" value="{$smarty.post.appartment}"  placeholder="Квартира" style="width: 82px" />
            </td>
        </tr>

        <tr>
            <td valign="middle" align="right" style="text-align: right;"><label class="form-label">Ближайшее метро: </label></td>
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