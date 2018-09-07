{if $is_cost == 1}
    <div id="payment">
        <form id='FrmHtmlCheckout' name='FrmHtmlCheckout' action='https://ts-ecomweb.mcb.ru/SENTRY/PaymentGateway/Application/RedirectLink.aspx' method='post' target='_blank'> 
            <input id='Version' type='hidden' name='Version' value='1.0.0'> 
            <input id='MerID' type='hidden' value='600000000000562' name='MerID' > 
            <input id='AcqID' type='hidden' value='443222' name='AcqID' > 
            <input id='MerRespURL' type='hidden' value='{$url}payment/mkb/success/' name='MerRespURL'> 
            <input id='PurchaseCurrency' type='hidden' value='643' name='PurchaseCurrency'> 
            <input id='PurchaseCurrencyExponent' type='hidden' value='2' name='PurchaseCurrencyExponent'> 
            <input id='OrderID' type='hidden' value='{$OrderID}' name='OrderID' > 
            <input id='SignatureMethod' type='hidden' value='SHA1' name='SignatureMethod'> 
            <input id='PurchaseAmt' type='hidden' value='{$PurchaseAmt}' name='PurchaseAmt'> 
            <input id='Signature' type='hidden' value='{$Signature}' name='Signature'> 
            <button class="payment">Оплата банковской картой</button>
        </form> 

        {*    {else}
        <h2>Произошла ошибка, попробуйте <a href="">обновить страницу</a></h2>*}
    </div> 
{/if}    