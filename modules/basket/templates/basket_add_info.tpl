
{if $discount}
    <h2 style="margin-top: 1px;text-align: center">
        {if $error_info == 1}Товара нет в наличии{else}Товар успешно добавлен в корзину!{/if}
    </h2>
    <div style="text-align: center">
        В корзине {$basket->count|default:0} покупок 
        {if ! $setting->hide_prices}
            на сумму {$basket->sum|number_format|replace:",":" "|default:0} {$default_currency->name} 
        {/if}
    </div>

    <div style="text-align: center">
        <div><h2 style="margin: 0px; font: 19px Arial,Helvetica,sans-serif;;"> - {$discount}%</h2></div>
        <div style="margin: 0px; font: 19px Arial,Helvetica,sans-serif;;">= {$discount_sum|number_format|replace:",":" "} руб</div>
        <div style="margin-top: 2px;"><a href="{$url}basket/"><img src="{$fronted_images_url}in_basket_info.png" alt="" /></a> </div>
    </div>
{else}
    <h2 style="margin-top: 10px;text-align: center">
        {if $error_info == 1}Товара нет в наличии{else}Товар успешно добавлен в корзину!{/if}
        </h2>
    <div style="text-align: center; margin-top: 15px;">
        В корзине <b>{$basket->count|default:0}</b> 
        
        {if $basket->count == 0 || $basket->count >= 5 && $basket->count <=20 || $basket->count >= 105 && $basket->count <=120}
            товаров
        {elseif $basket->count%10 == 1}
            товар
        {elseif $basket->count%10 > 1 && $basket->count%10 < 5}
            товара
        {else}
            товаров
        {/if}

        {if ! $setting->hide_prices}
            на сумму <b>{$basket->sum|number_format:0|replace:",":" "|default:0} {$default_currency->name}</b> 
        {endif}
    </div>
    <div style="text-align: center">
       <div style="margin-top: 20px;"><a href="{$url}basket/"><img src="{$fronted_images_url}in_basket_info.png" alt="" /></a> </div>
    </div>
{/if}