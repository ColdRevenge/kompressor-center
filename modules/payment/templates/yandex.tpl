{if $is_cost == 1}
    <div id="payment">
        <h2>Выберите способ оплаты:</h2>
        <form name=ShopForm method="POST" action="https://demomoney.yandex.ru/eshop.xml">
            <font face=tahoma size=2>
            <input type="hidden" name="scid" value="56296" />
            <input type="hidden" name="ShopID" value="18915" />
            <input type="hidden" name="CustomerNumber" value="{$OrderID}" />
            <input type="hidden" name="Sum" value="{$sum}" />

            <div id="method_payments" style="padding-left: 30px;"> 
                <input name="paymentType" value="PC" type="radio" id="payment_PC" checked="checked"/><label for="payment_PC"><span><img src="/images/sys/yandex.png" alt="" /></span><div>Оплата со счета в Яндекс.Деньгах</div></label>
                <div class="clear">&nbsp;</div> 
                <input name="paymentType" value="AC" type="radio" id="payment_AC" /><label for="payment_AC"><span><img src="/images/sys/visa.png" alt="" /></span><div>Оплата банковской картой</div></label>
                <div class="clear">&nbsp;</div> 
                <input name="paymentType" value="GP" type="radio" id="payment_GP" /><label for="payment_GP"><span><img src="/images/sys/terminal.jpg" alt="" /></span><div>Оплата по коду через терминал</div></label>
                <div class="clear">&nbsp;</div> 
                <input name="paymentType" value="WM" type="radio" id="payment_WM" /><label for="payment_WM"><span><img src="/images/sys/webmoney.png" alt="" /></span><div>Оплата cо счета WebMoney</div></label>

            </div>
            <br>
            <button class="payment">Оплатить</button>
        </form>
    </div>
{/if} 