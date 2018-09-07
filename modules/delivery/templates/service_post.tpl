<table class="table_fields">
    <tbody>
        <tr>
            <td valign="top" align="right" style="text-align: right; padding-top: 8px;"><label class="form-label">Адрес доставки: <span class="asterix">*</span></label></td>
            <td valign="middle" align="left" style="text-align: left; padding-bottom: 10px;">
                <input type="text" size="30" name="city_index" id="city_index" value="{$smarty.post.city_index|default:$get_user->city_index|stripslashes}" class="form-control" maxlength="255" style="width: 80px" id="index" placeholder="Индекс"/> 
                <input type="text" size="30" name="city" class="form-control" id="city" value="{$smarty.post.city|default:$get_user->city|stripslashes}" maxlength="255" style="width: 246px" placeholder="Город"/> 
            </td>
        </tr>
        <tr>
            <td valign="top" align="right" style="text-align: right"> </td>

            <td valign="middle" align="left">
                <input type="text" class="form-control" name="street" value="{$smarty.post.street}" id="street" placeholder="Улица" style="width: 330px;" />
            </td>
        </tr>
        <tr>
            <td valign="top" align="right" style="text-align: right"></td>
            <td valign="middle" align="left">
                <input type="text" class="form-control -small" name="house" value="{$smarty.post.house}" id="house" placeholder="Дом" style="width: 77px" />
                <input type="text" class="form-control -small" name="housing" value="{$smarty.post.housing}"  placeholder="Корпус" style="width: 77px" />
                <input type="text" class="form-control -small" name="building" value="{$smarty.post.building}"  placeholder="Строение" style="width: 82px" />
                <input type="text" class="form-control -small" name="appartment" value="{$smarty.post.appartment}"  placeholder="Квартира" style="width: 82px" />
            </td>
        </tr>
        {include file="free_delivery_info.tpl"}
    </tbody>
</table>

{if $sum_basket < 1000}
    {math assign="price_russion_post" equation="40 + (y * 0.05)" y=$sum_basket}
{elseif $sum_basket < 5000}
    {math assign="price_russion_post" equation="50 + (y * 0.04)" y=$sum_basket}
{elseif $sum_basket < 20000}
    {math assign="price_russion_post" equation="150 + (y * 0.02)" y=$sum_basket}
{elseif $sum_basket >= 20000}
    {math assign="price_russion_post" equation="250 + (y * 0.015)" y=$sum_basket}
{/if}
<script type="text/javascript">
    if ($('#method_payments input:checked').val() == 1) {
        $('#post_nal_notice').show();
        $('#method_payments input').change(function () {
            if ($('#method_payments input:checked').val() == 1) {
                $('#post_nal_notice').show();
            }
            else {
                $('#post_nal_notice').hide();
            }
        })
    }
</script>
{if $price_russion_post > 0}
    <div class="notice" style="color: red;display: none;text-align: center; padding-bottom: 10px;" id="post_nal_notice">При получении заказа почта России взимает комиссию за отправку наложеного платежа<br/> в размере  <strong style="display:inline;vertical-align:top;">{$price_russion_post} руб.</strong> <br/>При оплате банковской картой (Visa / MasterCard) или Яндекс деньгами комиссия за отправку наложеного платежа не взимается.</div>
{/if}