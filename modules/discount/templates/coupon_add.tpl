{include file=$template_message message=$message error=$error}
<div class="block" style="border: 0">
    <h1>{if $param_tpl.edit_id > 0}Редактировать{else}Добавить{/if} купон</h1>

    <form method="post" enctype="multipart/form-data" action="">
        <table cellpadding="2" cellspacing="0" border="0">
            <tr>
                <td valign="middle" align="right">Название: <span class="asterix">*</span></td>
                <td valign="middle" align="left"><input type="text" name="name" value="{$smarty.post.name}" maxlength="255" style="width: 246px;"/></td>
            </tr>
            <tr>
                <td valign="top" align="right">Список кодов: <span class="asterix">*</span>
                    <div class="notice">
                        Каждый код купона должен идти с новой строчки
                    </div>
                </td>
                <td valign="middle" align="left">
                    <textarea name="code_list" style="width: 246px;height: 200px;">{$smarty.post.code_list|stripslashes|trim}</textarea>
                </td>
            </tr>
            <tr>
                <td valign="top" align="right">Категория:</td>
                <td valign="top" align="left">
                    {include file='coupon_add_category.tpl' id=0 tree=$category inc='coupon_add_category.tpl' level=0}
                    <script type="text/javascript">
                        $('#parent_0>div>div>div>input:checked').each(function () {
                            id = ($(this).parent().parent().attr('id'));
                            if (id) {
                                $('#' + (id)).show();
                            }
                        });
                    </script>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">Скидка:</td>
                <td valign="middle" align="left"><input type="text" name="discount" value="{$smarty.post.discount}" maxlength="255" style="width: 146px;"/>
                    <select style="width: 70px;" name="discount_type">
                        <option value="0" {if $smarty.post.discount_type == 0} selected="selected"{/if}>%</option>
                        <option value="1" {if $smarty.post.discount_type == 1} selected="selected"{/if}>руб.</option>
                    </select>
                </td>
            </tr>
            <tr style="display: none;">
                <td valign="middle" align="right"></td>
                <td valign="middle" align="left">
                    <input type="radio" name="type" value="1" id="type_1" {if $smarty.post.type == 1} checked="checked"{/if} /><label for="type_1">Одноразовый</label>
                    <input type="radio" name="type" value="0" id="type_0" {if $smarty.post.type == 0} checked="checked"{/if} /><label for="type_0">Многоразовый</label>
                    <br/><br/>
                </td>   
            </tr>
            <tr>
                <td valign="middle" align="right">Дата завершения<span class="asterix">*</span>:</td>
                <td valign="top" align="left">
                    {$date_form}
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">Минимальная стоимость товара:</td>
                <td valign="middle" align="left"><input type="text" name="min_sum" value="{$smarty.post.min_sum}" maxlength="255" style="width: 246px;"/></td>
            </tr>


            <tr>
                <td valign="middle" align="right">Переход на следующий копон:</td>
                <td valign="middle" align="left">
                    <table style="color: gray">
                        <tr>

                            <td style="text-align: right;padding-right: 7px">
                                При сумме: 
                            </td>
                            <td>
                                <input type="text" name="code_next_sum" value="{$smarty.post.code_next_sum}" maxlength="255" style="width: 110px;"/> р.
                            </td>

                        </tr>
                        <tr>
                            <td style="text-align: right;padding-right: 7px">
                                След. купон: 
                            </td>
                            <td>
                                <select style="width: 126px;" name="code_next_coupon_id">
                                    <option value="0">Не выбрано</option>
                                    {foreach from=$coupons_list item="coupon_item"}
                                        {if $coupon_item->id != $param_tpl.edit_id}
                                            <option value="{$coupon_item->id}"{if $smarty.post.code_next_coupon_id == $coupon_item->id} selected="selected"{/if}>{$coupon_item->name|stripslashes}</option>
                                        {/if}
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <input type="hidden" value="1" name="submit" />
                    <button>{if $param_tpl.edit_id}Сохранить{else}Добавить{/if}</button>
                </td>
            </tr>
        </table>
    </form>
</div>