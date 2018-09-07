<div id="payment">
    {if $is_cost == 1}
        <form method="post" action="https://merchant.roboxchange.com/Index.aspx{*http://test.robokassa.ru/Index.aspx*}" id="form_payment">
            <input type="hidden" name="MrchLogin" value="{$MrchLogin}" />
            <input type="hidden" name="OutSum" value="{$OutSum}" />
            <input type="hidden" name="InvId" value="{$InvId}" />
            <input type="hidden" name="Desc" value="{$Desc}" />
            <input type="hidden" name="SignatureValue" value="{$SignatureValue}" />
{*            <input type="hidden" name="IncCurrLabel" value="{$IncCurrLabel}" />*}
            <button name="accept"  class="payment"></button>
        </form>
    {else}
        <h2>Произошла ошибка, попробуйте <a href="">обновить страницу</a></h2>
    {/if}    
</div>