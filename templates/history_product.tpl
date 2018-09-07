{if $smarty.get.is_modal != 1} 
    {if $session_products|@count > 1}<br/>
            <div class="left_h1">Вы недавно смотрели:</div>
        <div id="left-news">
            <div class="you_look">
                {foreach from=$session_products item="s_product" name="product"}
                    {if $smarty.foreach.product.iteration <= 12 && $smarty.foreach.product.iteration != 0 && $s_product.id != $product->id}
                        <div class="product-history-block">
                            <span class="img-box"><a href="{$url}products/{$s_product.pseudo_dir}/?is_modal=1" rel="fancy"><img src="{$gallery_url}{$s_product.file}" alt="" class="img-offers"  /></a></span>
                                    {*                        <div class="price"><b>{$s_product.price}  руб.</b></div>*}
                                    {*                        <div class="name"><a href="{$url}products/{$s_product.pseudo_dir}/">{$s_product.name}</a></div>*}
                        </div>
                    {/if}
                {/foreach}
            </div>

        </div>
    {/if}

{/if}