
<div class="block">
    {if $smarty.get.not_menu != '1'}
        <div id="breadcrumbs">
            <a href="{$admin_url}order/list/">Заказы</a> &laquo; Заказ № {$order->id}
        </div>
    {/if}
    <h1>Заказ № {$order->id}</h1>
    {include file=$template_message message=$message error=$error}
    <form method="post" action="">
        <table cellpadding="4" cellspacing="1" border="0" class="table">
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">
                        Заказ создан:
                    </td>
                    <td valign="middle" align="left">
                        {$order->created|date_format:"%d.%m.%Y %H:%M"}
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">
                        Статус: 
                    </td>
                    <td valign="middle" align="left">
                        <select name="status_id" style="width: 250px;">
                            {foreach from=$status item="status_item"}
                                <option value="{$status_item->id}" {if $order->status_id == $status_item->id}selected="selected"{/if} {if $order->sum_expense == 0 && $setting->is_expense == 1 && $status_item->id == 3} disabled="disabled"{/if}>{$status_item->name}{if $order->sum_expense == 0 && $setting->is_expense == 1 && $status_item->id == 3} (Необходимо указать расход на заказ) {/if}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody"{if $get_user->user_type != 1 || $is_multi_manager == 0} style="display: none"{/if}>
                <tr>
                    <td valign="middle" align="right">
                        Менеджер: 
                    </td>
                    <td valign="middle" align="left">
                        <select name="manager_id" style="width: 250px;" >
                            <option value="0">Не выбран</option>
                            {foreach from=$managers item="manager"}
                                <option value="{$manager->id}" {if $order->manager_id == $manager->id}selected="selected"{/if}>{$manager->name|stripslashes}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>
            </tbody>



            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <div style="float: left">
     {*                       <button onclick="window.open('{$url}example_blank.php?order_id={$order->id}');
                                    return false;" value="Печать бланка" >Печать бланка</button>*}
                        </div>
                        <button>Сохранить</button>
                    </td>
                </tr>
            </tbody>

        </table>
    </form>

    {include file="buy_market_info.tpl"}
    <div id="order_products">
        {include file="getOrderProducts.tpl"}  
    </div>
    <h2>Контактная информация</h2>
    <form method="post" action="">
        <table cellpadding="4" cellspacing="1" border="0" class="table">
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Получатель: </td>
                    <td valign="middle" align="left">
                        <input type="text" value="{$order->fio|stripslashes|strip_tags}" name="fio" style="width: 340px;" />
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Телефон: </td>
                    <td valign="middle" align="left"><input type="text" value="{$order->phone|default:""|stripslashes|strip_tags}" name="phone" style="width: 340px;" /></td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">E-mail: </td>
                    <td valign="middle" align="left"><input type="text" value="{$order->email|stripslashes|strip_tags}" name="email" style="width: 340px;" /></td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Индекс/Город: </td>
                    <td valign="middle" align="left">
                        <input type="text" value="{$order->city_index|stripslashes|strip_tags}" name="city_index" style="width: 80px;" />
                        <input type="text" value="{$order->city|stripslashes|strip_tags}" name="city" />
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody" style="display: none">
                <tr>
                    <td valign="middle" align="right">Почтовый идентификатор: </td>
                    <td valign="middle" align="left">
                        <input type="text" value="{$order->post_code|stripslashes|strip_tags}" name="post_code" style="width: 340px;" />
                    </td>
                </tr>
            </tbody>
            {if $is_coupon == 1}
                <tbody id="coupon_tbody">
                    {include file=$base_dir|cat:'modules/users/templates/user_coupon.tpl' order_user_id=$order_user_id}
                </tbody>
            {/if}
            <tbody class="tbody">
                <tr>
                    <td valign="top" align="right">Адрес: </td>
                    <td valign="middle" align="left">
                        <textarea name="adress" style="width: 340px;">{$order->adress|stripslashes}</textarea>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Метро: </td>
                    <td valign="middle" align="left">
                        <select class="text" name="metro_id" style="width: 230px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
                            <option value="">Выбрать</option>
                            {foreach from=$metro item="item"}
                                <option value="{$item->id}"{if $smarty.post.metro_id == $item->id || $order->metro_id == $item->id} selected="selected"{/if}>{$item->name}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Метод оплаты: </td>
                    <td valign="middle" align="left">
                        <select class="text" name="payment_method_id" style="width: 230px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
                            <option value="">Выбрать</option>
                            {foreach from=$payment_methods item="method" name="method"}
                                <option value="{$method->id}"{if $order->payment_method_id == $method->id} selected="selected"{/if}>{$method->name}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Комментарий к заказу: </td>
                    <td valign="middle" align="left"><textarea name="comment" style="width: 340px;">{$order->comment}</textarea></td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">&nbsp;</td>
                    <td valign="middle" align="left" style="text-align: left">
                        <label class="p-check"><input type="radio" value="0"{if $order->is_jur_person == '' || $order->is_jur_person == '0' || $smarty.post.is_jur_person == '0'} checked="checked"{/if} onchange="$('#jur_person_block').fadeOut('slow', function () {ldelim}
                            $(this).css('display', 'none');{rdelim});" name="is_jur_person" id="is_jur_person_0" /><em>&nbsp;</em><span>Физ. лицо</span></label>

                            <label class="p-check"><input type="radio" value="1"{if $order->is_jur_person == '1' || $smarty.post.is_jur_person == '1'} checked="checked"{/if} onchange="$('#jur_person_block').fadeIn('slow', function () {ldelim}
                                $(this).css('display', 'table-row-group');{rdelim});" name="is_jur_person" id="is_jur_person_1" /><em>&nbsp;</em><span>Юр. лицо</span></label>

                    </td>
                </tr>
            </tbody>
            <tbody {if $order->is_jur_person != 1 && $smarty.post.is_jur_person != '1'}style="display: none"{/if} id="jur_person_block" class="tbody">
                <tr>
                    <td valign="middle" align="right" style="text-align: right; width: 230px;">Название:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_name" value="{$smarty.post.company_name|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_name|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">Факс:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_fax" value="{$smarty.post.company_fax|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_fax|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">ИНН:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_inn" value="{$smarty.post.company_inn|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_inn|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">Юридический адрес:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_ur_adress" value="{$smarty.post.company_ur_adress|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_ur_adress|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">Банк:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_bank" value="{$smarty.post.company_bank|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_bank|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">БИК:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_bik" value="{$smarty.post.company_bik|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_bik|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">P/c:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_rs" value="{$smarty.post.company_rs|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_rs|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">К/c:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_ks" value="{$smarty.post.company_ks|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_ks|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">КПП:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_kpp" value="{$smarty.post.company_kpp|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_kpp|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">ОКПО:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_okpo" value="{$smarty.post.company_okpo|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_okpo|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">ОКНХ:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_oknx" value="{$smarty.post.company_oknx|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_oknx|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">ФИО Ген. директора:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_fio_director" value="{$smarty.post.company_fio_director|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_fio_director|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">ФИО Гл. бухгалтера:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_fio_accountant" value="{$smarty.post.company_fio_accountant|stripslashes|replace:"'":'"'|stripslashes|strip_tags|default:$order->company_fio_accountant|stripslashes|replace:"'":'"'|stripslashes|strip_tags}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Комментарий менеджера: </td>
                    <td valign="middle" align="left"><textarea name="comment_admin" style="width: 340px;">{$order->comment_admin|stripslashes|replace:'"':'&quot;'}</textarea></td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <button>Сохранить</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    {$check_out_info}
</div>
