{* Похожие товары. Берет все товары из корневой категории *}
{if $products_in_category|@count >= 1}
    <div class="box">
        <div class="h1">{if $type == 1}Похожие {$product_in_category_name|stripslashes}{else}К этому товару подойдет{/if} </div>
        <div class="slider-wrap-like">
            {if ($products_in_category|@count) > 4}
                <button class="prev-like" id="prev-like_{$type}"></button>
                <button class="next-like" id="next-like_{$type}"></button>        
            {/if}
            <div class="slider-like" id="like-products_{$type}">
                <ul>
                    {foreach from=$products_in_category item="product_like"}
                        {if $product_like->id != $product->id}
                            <li>
                                <a rel='fancy' href="{$shop_url}products/{$product_like->pseudo_dir}/?is_modal=1{if $is_open_buy == 1}&is_buy_open=1{/if}">{if $product_like->file}<img src="{$gallery_url}{$product_like->file}" alt="" id="catalog_img_{$product_like->id}"  />{else}<img src="/images/icons/no-image.png" alt="" id="catalog_img_{$product_like->id}"  />{/if}</a>
                                <div class="name"><a href="{$shop_url}products/{$product_like->pseudo_dir}/">{$product_like->name|stripslashes}</a></div>
                                <span class="cost">{$product_like->price|number_format:2:'.':''} р.</span>	
                            </li>
                        {/if}
                    {/foreach}

                </ul>
            </div>
        </div>
    </div>
    {if $products_in_category|@count > 1}
        <script type="text/javascript">
            $(function () {
                $("#like-products_{$type}").jCarouselLite({
                    btnNext: "#next-like_{$type}",
                    btnPrev: "#prev-like_{$type}",
                    visible: 4,
                    mouseWheel: true
                });
            });

        </script>
    {/if}
{/if}
<!-- end medium-slider-line -->


