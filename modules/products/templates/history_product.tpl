{if $smarty.get.is_modal != 1} {if $session_products|@count > 1}
            <div class="h1">Вы недавно смотрели:</div>
            <div class="you_look">
                {foreach from=$session_products item="s_product" name="product"}
                    {if $smarty.foreach.product.iteration <= 5 && $smarty.foreach.product.iteration != 0 && $s_product.id != $product->id}
                        <div class="product-history-block">

                            <span class="img-box"><a href="/products/{$s_product.pseudo_dir}/?is_modal=1" rel="fancy"><img src="{$gallery_url}{$s_product.file}" onerror="this.src='/images/icons/no-image.png'" alt="" class="img-offers"  /></a></span>

{*                            <div class="price"><b>{$s_product.price}  руб.</b></div>*}
                            <div class="name"><a href="/products/{$s_product.pseudo_dir}/">{$s_product.name|stripslashes}</a></div>
                            {if $smarty.foreach.product.iteration%4 == 0}<div class="clear"></div>{/if}
                        </div>
                    {/if}
                {/foreach}
            </div>
            <div class="clear">&nbsp;</div>
        {/if}

    {/if}