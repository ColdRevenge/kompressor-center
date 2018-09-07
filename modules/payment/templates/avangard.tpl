<div id="payment">
    {if $not_payment != 1}

        <form action="https://www.avangard.ru/iacq/post" method="POST"
              accept-charset="UTF-8">
            <input type="hidden" name="shop_id" value="{$shop_id}"/>
            <input type="hidden" name="amount" value="{$sum_total*100}"/>
            <input type="hidden" name="back_url" value="{$url}order/{$order_id}/"/>
            <input type="hidden" name="back_url_ok" value="{$url}payment/avangard/success/"/>
            <input type="hidden" name="back_url_fail" value="{$url}order/{$order_id}/?is_err=1"/>
            <input type="hidden" name="order_number" value="{$order_id}"/>
            <input type="hidden" name="order_description" value="{$desc}"/>
            <input type="hidden" name="language" value="RU"/>
            <input type="hidden" name="client_name" value="{$get_order->fio}"/>
            <input type="hidden" name="client_phone" value="{if $get_order->phone}+{$get_order->phone}{/if}"/>
            <input type="hidden" name="client_email" value="{$get_order->email}"/>
            <input type="hidden" name="client_address" value="{$get_order->adress}"/>
            <input type="hidden" name="signature"
                   value="{$signature}"/>
            <input type="hidden" name="language" value="RU"/>
{*            <input type="submit" value="Оплатить"/>*}
            
            
{*            <input type="hidden" name="ticket" value="{$ticket}" /><br/>*}
            <button{* name="accept"*}  class="payment"></button>
        </form>
    {/if}
    {include file=$template_message message=$message error=$error}
</div>