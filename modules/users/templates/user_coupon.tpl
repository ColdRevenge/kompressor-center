{if $param_tpl.user_id > 0 || $order_user_id > 0}

    <tr>
        <td valign="middle" align="right">Номер купона:</td>
        <td valign="middle" align="left">
            <script type="text/javascript">
                CouponUser = {
                    user_id: {$param_tpl.user_id|default:$order_user_id},
                    addCoupon: function () {
                        answer = AjaxRequestAsync('', '{$admin_url}users/admin/coupon/{$param_tpl.user_id|default:$order_user_id}/' + (($('#coupon_sum').attr('checked') == 'checked') ? 1 : 0) + '/?coupon=' + $('#coupon_name').val());
                        if (answer == 'not_coupon') { //Если купона не существует, предлагаем его создать по минимальной скидке купонов
                            if (confirm('Купона с номером ' + $('#coupon_name').val() + ' не существует, создать его?')) {
                                answer_add = AjaxRequestAsync('', '{$admin_url}users/admin/coupon/{$param_tpl.user_id|default:$order_user_id}/' + (($('#coupon_sum').attr('checked') == 'checked') ? 1 : 0) + '/?coupon_add=' + $('#coupon_name').val());
                                if (answer_add == 'empty_code') {
                                    alert('Ошибка: Нельзя добавить пустой купон');
                                }
                                else if (answer_add == 'empty_code_added') {
                                    alert('Ошибка: Купон уже добавлен');
                                }
                                else {
                                    $('#coupon_tbody').html(answer_add);
                                }

                            }
                        }
                        else {
                            $('#coupon_tbody').html(answer);
                            $('#coupon_tbody script').each(function () {
                                eval($(this).html());
                            });
                        }
                        return false;
                    },
                    delCoupon: function (coupon_id) {
                        AjaxRequestAsync('coupon_tbody', '{$admin_url}users/admin/coupon/{$param_tpl.user_id|default:$order_user_id}/' + (($('#coupon_sum').attr('checked') == 'checked') ? 1 : 0) + '/?del_coupon_id=' + coupon_id);
                    }
                }

            </script>
            {if $coupon_code == 0}
                <input type="text" name="coupon" id="coupon_name" value='' maxlength="255" style="width: 160px;"/>&nbsp;<button onclick="CouponUser.addCoupon();
                        return false">Привязать</button>
                    <div class="notice" style="margin: 3px 0;{if $order_user_id > 0 && $param_tpl.user_id == 0} display: none{/if}"><label class="p-check"><input type="checkbox" checked="checked" name="coupon_sum" id="coupon_sum" value="1" /><em>&nbsp;</em><span>Начислить на купон сумму заказов</span></label></div>

            {else}
                <b>{$coupon_code}</b>&nbsp;&nbsp;
                <button onclick="CouponUser.delCoupon('{$coupon_code}');
                        return false;">Отвязать купон</button> 
                            <div class="notice" style="margin: 3px 0;"><label class="p-check"><input type="checkbox" name="coupon_sum" id="coupon_sum" value="1" /><em>&nbsp;</em><span>Вычесть сумму заказов пользователя</span></label></div>

            {/if}


        </td>
    </tr>
{/if}