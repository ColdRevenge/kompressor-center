
<div class="block">
    {include file="_menu_discount.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>Скидки</h1>
        <form method="post" enctype="multipart/form-data" action="{$MyURL}">
            <table cellpadding="5" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Сумма заказа: </td>
                        <td valign="middle" align="center">Скидка (%): </td>
                        <td valign="middle" align="center">Накопительная: 
                            <div class="notice">(только зарегистрированым)</div></td>
                        <td valign="middle" align="center">Для раздела: </td>
                        <td valign="middle" align="center">Для производителя: </td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </thead>

                {foreach from = $discounts item = 'discount'}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="center">от <input type="text" name="sum_start[{$discount->id}]" {if $discount->is_discount_object == 1} disabled="disabled" value="0"{else} value="{$discount->sum_start}"{/if} style="width: 70px; text-align: center; margin: 0px 5px; " maxlength="11" /> до
                                <input type="text" name="sum_end[{$discount->id}]" {if $discount->is_discount_object == 1} disabled="disabled" value="0"{else} value="{$discount->sum_end}"{/if} style="width: 70px; text-align: center;margin: 0px 5px;" maxlength="11" /></td>
                            <td valign="middle" align="center"><input type="text" name="discount[{$discount->id}]" value="{$discount->discount}"  style="width: 100px; text-align: center;" maxlength="11" /></td>
                            <td valign="middle" align="center">
                                <label class="p-check"><input type="checkbox" name="is_auth[{$discount->id}]" {if $discount->is_discount_object == 1} disabled="disabled"{else}{if $discount->is_auth == 1}checked="checked"{/if}{/if} value="1" /><em>&nbsp;</em><span></span></label>
                            </td>
                            <td valign="middle" align="center">
                                <a href="{$admin_url}discount/category/list/{$discount->id}/?is_modal=1" rel="windows_400">Добавить</a>
                            </td> 
                            <td valign="middle" align="center">
                                <a href="{$admin_url}discount/brand/list/{$discount->id}/?is_modal=1" rel="windows_400">Добавить</a>
                            </td>
                            <td valign="middle" align="center">
                                <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить скидку в `{$discount->discount}%`?', '{$MyURL}3/{$discount->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" title="Удалить" alt="Удалить" /></a>
                            </td>
                        </tr>
                    </tbody>
                {/foreach}
                <tfoot>
                    <tr>
                        <td valign="middle" align="right" colspan="6">
                            <button>Сохранить</button>
                        </td>
                    </tr>
                    </tbody>
            </table>
            <br/>
            <h1>Добавить скидку</h1>
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Сумма заказа: </td>
                        <td valign="middle" align="center">Скидка (%): </td>
                        <td valign="middle" align="center">Накопительная: 
                            <div class="notice">(только зарегистрированым)</div></td>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center">от <input type="text" name="add_sum_start"   style="width: 70px; text-align: center; margin: 0px 5px; " maxlength="11" /> до
                            <input type="text" name="add_sum_end"  style="width: 70px; text-align: center;margin: 0px 5px;" maxlength="11" /></td>

                        <td valign="middle" align="center"><input type="text" value="" name="add_discount" style="width: 50px; text-align: center" maxlength="11" /></td>
                        <td valign="middle" align="center"><input type="checkbox" name="add_is_auth" value="1" /></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td valign="middle" align="right" colspan="3">
                            <button>Добавить</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>