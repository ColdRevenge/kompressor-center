<tr>
    {*    <td valign="top" align="right" style="text-align: right"></td>*}
    <td valign="middle" align="left" colspan="2">
        {if $free_sum > $sum_basket && $lacking > 0}
            <div class="free_delivery">* Добавьте товаров на <b>{$lacking|number_format:0|replace:",":"&nbsp;"} руб.</b>, доставка заказа станет <b>БЕСПЛАТНОЙ</b>!</div>
        {/if}
    </td>
</tr>