<form method="post" class="niceform" id="form_order" action="" style=" margin-bottom: 20px;margin-top: 10px;">
    <input type="hidden" name="coupon_code" value="" id="coupon_code" />
    <table cellpadding="3" cellspacing="0" border="0" id="basket_table" style="margin-left: 0px;width: 100%">
        <tbody  class="order-block">
            <tr>
                <td valign="middle" align="left"  style="text-align: left">
                    <h2>Контактная информация</h2>
                    <table cellpadding="1" cellspacing="0" border="0" id="basket_table" style="margin-left: 0px;width: 100%">
                        <tr>
                            <td valign="middle" align="left">
                                <input type="text" class="text" value="{$smarty.post.fio}" style="width: 100%;" name="fio" placeholder="ФИО" id="fio" maxlength="255" />
                                <label for="fio"></label></td>

                        </tr> 
                        <tr>
                            <td valign="middle" align="left"><input type="text" class="text" placeholder="Телефон" value="{$smarty.post.phone}" style="width: 100%;" name="phone" maxlength="255" id="phone_mask" />
                                <label for="phone"></label>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="left"><input type="text" id="email_check" placeholder="E-mail" class="text" value="{$smarty.post.email}" style="width: 100%;" name="email" maxlength="255" />
                                <label for="email"></label>
                                {*                    <div class="notice"><input type="checkbox" value="1" checked="checked" name="is_send_email" id="is_send_email" /><label for="is_send_email" style="display: inline; font-size: 13px; font-family: inherit">Я согласен получать ваши рассылки по e-mail</label></div>*}
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="left">
                                <textarea class="text" placeholder="Комментарий" style="width: 100%;height: 102px;" name="comment">{$smarty.post.comment}</textarea>
                            </td>
                        </tr>
                        <tr style="display: none;">
                            <td valign="middle" align="right">&nbsp;</td>
                            <td valign="middle" align="left" style="text-align: left">
                                <input type="radio" value="0"{if $get_user->is_jur_person == '0' || $smarty.post.is_jur_person == '0' || $get_user->is_jur_person == ''} checked="checked"{/if} onchange="$('#jur_person_block').fadeOut('slow', function () {ldelim}
                                            $(this).css('display', 'none');{rdelim});" name="is_jur_person" id="is_jur_person_0" /><label for="is_jur_person_0" style="display: inline">Физ. лицо</label>

                                <input type="radio" value="1"{if $get_user->is_jur_person == '1' || $smarty.post.is_jur_person == '1'} checked="checked"{/if} onchange="$('#jur_person_block').fadeIn('slow', function () {ldelim}
                                            $(this).css('display', 'table-row-group');{rdelim});" name="is_jur_person" id="is_jur_person_1" /><label for="is_jur_person_1" style="display: inline">Юр. лицо</label>

                            </td>
                        </tr>


                    </table>

                </td>

            </tr>


        </tbody>
        <tbody class="order-block">
            <tr>
                <td valign="middle" align="left" id="method_payments" style="text-align: left">
                    <h2>Способ оплаты</h2>
                    {foreach from=$payment_methods item="method" name="method"}
                        <label>
                            <span><input type="radio" value="{$method->id}" name="payment_method_id" id="payment_{$method->id}" {if ($smarty.foreach.method.iteration == 1 && !isset($smarty.post.payment_method_id)) || $smarty.post.payment_method_id == $method->id} checked="checked"{/if} /></span><div><b>{$method->name|stripslashes}</b><div class="notice">
                                    {$method->comment|stripslashes}
                                </div>
                            </div>
                            <div class="clear">&nbsp;</div> 
                        </label>
                    {/foreach}  
                </td>
            </tr>
        </tbody>
        <tbody {if $get_user->is_jur_person != 1 && $smarty.post.is_jur_person != '1'}style="display: none"{/if} id="jur_person_block" class="order-block">
            <tr>
                <td valign="middle" align="left"  style="text-align: left">
                    <h2>Контактная информация</h2>
                    <table cellpadding="3" cellspacing="0" border="0" class="table_fields" id="basket_table" style="margin-left: 0px;width: 100%">
                        <tr>
                            <td valign="middle" align="right" colspan="2"><h3 style="font-size: 23px;text-align: center">Реквизиты компании</h3></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right; width: 230px;">Название: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_name" value="{$smarty.post.company_name|stripslashes|replace:"'":'"'|default:$get_user->company_name|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">Факс:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_fax" value="{$smarty.post.company_fax|stripslashes|replace:"'":'"'|default:$get_user->company_fax|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ИНН: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_inn" value="{$smarty.post.company_inn|stripslashes|replace:"'":'"'|default:$get_user->company_inn|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">Юридический адрес: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_ur_adress" value="{$smarty.post.company_ur_adress|stripslashes|replace:"'":'"'|default:$get_user->company_ur_adress|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">Банк: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_bank" value="{$smarty.post.company_bank|stripslashes|replace:"'":'"'|default:$get_user->company_bank|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">БИК: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_bik" value="{$smarty.post.company_bik|stripslashes|replace:"'":'"'|default:$get_user->company_bik|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">P/c: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_rs" value="{$smarty.post.company_rs|stripslashes|replace:"'":'"'|default:$get_user->company_rs|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">К/c:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_ks" value="{$smarty.post.company_ks|stripslashes|replace:"'":'"'|default:$get_user->company_ks|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">КПП: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_kpp" value="{$smarty.post.company_kpp|stripslashes|replace:"'":'"'|default:$get_user->company_kpp|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ОКПО:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_okpo" value="{$smarty.post.company_okpo|stripslashes|replace:"'":'"'|default:$get_user->company_okpo|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ОКНХ:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_oknx" value="{$smarty.post.company_oknx|stripslashes|replace:"'":'"'|default:$get_user->company_oknx|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ФИО Ген. директора:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_fio_director" value="{$smarty.post.company_fio_director|stripslashes|replace:"'":'"'|default:$get_user->company_fio_director|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ФИО Гл. бухгалтера:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_fio_accountant" value="{$smarty.post.company_fio_accountant|stripslashes|replace:"'":'"'|default:$get_user->company_fio_accountant|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            {*                        {/if}*}
        </tbody>
        <tbody class="order-block">
            <tr>
                <td valign="middle" align="left" style="text-align: left">
                    <h2>Информация о доставке</h2>
                    <div  id="delivery_methods">
                        {foreach from=$delivery.0 item="item" name="delivery"}
                            {assign var="delivery_id" value=$item->id}
                            <label class="check-style">
                                <span class="delivery_radio"><input type="radio"  name="delivery_id" value="{$item->id}" rel="{$item->service}" /><span>&nbsp;</span></span>
                                <span class="delivery_desc"><b>{$item->name|stripslashes}</b>
                                    {if $item->free_sum-$sum_basket <= 0}
                                        - <b style="color: red">Бесплатно!</b>
                                    {elseif $item->price != 0}

                                        - <b>{$item->price} руб.</b>
                                    {/if}
                                    <div class="notice">{$item->info|stripslashes}</div>
                                    {*                                                                <div class="delivery_date">от {$item->from_day} до {$item->to_day} дней</div>*}
                                </span>
                                <div class="clear">&nbsp;</div>
                            </label>
                            {if $item->service} {* Если у службы доставки есть сервис *}
                                    <div class="delivery_service" id="delivery_service_{$delivery_id}">

                                    </div>
                                {/if}
                                {foreach from=$delivery.$delivery_id item="delivery_child" name="delivery_child"}
                                    <div class="delivery_child" id="delivery_child_{$delivery_id}">
                                        <label class="check-style">
                                            <span class="delivery_radio_child"><input type="radio" name="delivery_child_id" class="delivery_child_id" rel="{$item->service}" value="{$delivery_child->id}" /><span>&nbsp;</span></span>
                                            <span class="delivery_desc">
                                                <b>{$delivery_child->name|stripslashes} {if $delivery_child->price != 0} - <b>{$delivery_child->price} руб.</b>{/if}</b>
                                                <div class="notice">{$delivery_child->info|stripslashes}</div>
                                                {*                                                                        <div>от {$delivery_child->from_day} до {$delivery_child->to_day}</div>*}
                                            </span>
                                        </label>
                                    </div>
                                {/foreach}
                                {/foreach}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td valign="middle" align="right">
                                <div id="error_delivery">Выберите удобный способ доставки</div>
                                <input type="hidden" value="1" name="send" />
                                <div id="order_button" style="text-align: right"><button>Оформить заказ</button></div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>
            {*           <script type="text/javascript">
            showJQuery('order_form', 1);
            jQuery.scrollTo('#order_form', 700);
            $('#delivery_id').change();
            </script>*}