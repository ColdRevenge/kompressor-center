
<div class="block">

    {include file=$template_message message=$message error=$error}
    <h1>Добавить покупателя в черный список</h1>
    {if $is_black_list == 1}
        <h2 style="color: red">Покупатель добавлен в черный список</h2>
    {/if}
    <form method="post" action="">
        <table cellpadding="4" cellspacing="1" border="0" class="table">
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">ФИО: </td>
                    <td valign="middle" align="left">
                        <input type="text" value="{$get_order->fio|stripslashes|strip_tags}" readonly="readonly" name="fio" style="width: 340px;" />
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Телефон: </td>
                    <td valign="middle" align="left"><input type="text" readonly="readonly" value="{$get_order->phone|stripslashes|strip_tags}" name="phone" style="width: 340px;" /></td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">E-Mail: </td>
                    <td valign="middle" align="left"><input type="text" readonly="readonly" value="{$get_order->email|stripslashes|strip_tags}" name="email" style="width: 340px;" /></td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Причина: </td>
                    <td valign="middle" align="left"><textarea name="comment" style="width: 600px;height: 150px;">{$get_black_list->comment|stripslashes|strip_tags}</textarea></td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        {if $smarty.get.success != '2'}
                            {if $is_black_list == 1}
                                <button onclick="if (!confirm('Вы действительно хотите удалить покупателя из черного списка?'))
                                            return false;" name="is_block" value="0">Разблокировать</button>
                            {else}
                                <button onclick="if (!confirm('Вы действительно хотите добавить покупателя в черный список?'))
                                            return false;" name="is_block" value="1">Заблокировать</button>
                            {/if}
                        {/if}
                    </td>
                </tr>
            </tbody>
        </table><br/>
        <div class="notice">
            <span class="asterix">*</span> Покупатели блокируются по телефону/e-mail. Если поступит заказ от заблокированного клиента, менеджер увидит это, и сможет 
            принять решение о продаже товара
        </div>
    </form>
</div>
