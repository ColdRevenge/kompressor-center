{if $is_mobile == 1}
    Корзина
    {if $basket_count > 0}
    <span>
        {$basket_count}
    </span>
    {/if}
{else}
    {* Стандартный вид (santvip) *} 
    <img src="/images/fronted/basket-img.png" alt="" id="basket-img" />

    <div class="basket-h">
		<b>Ваша корзина</b>
		<span>
        {if $basket_count == 0}
            0 товаров
        {else}    
            {$basket_count|default:0} 

            {if $basket_count == 0 || $basket_count >= 5 && $basket_count <=20 || $basket_count >= 105 && $basket_count <=120}
                товаров
            {elseif $basket_count%10 == 1}
                товар
            {elseif $basket_count%10 > 1 && $basket_count%10 < 5}
                товара
            {else}
                товаров
            {/if}
            {if ! $setting->hide_prices}
			 / {$discount_sum|default:$basket_price|default:'0'} руб.
            {/if}
        {/if}
		</span>
    </div>
{/if}