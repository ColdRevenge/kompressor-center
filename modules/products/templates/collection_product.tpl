{* Похожие товары. Берет все товары из корневой категории *}
{if $collection|@count >= 5}<br/>
    <div class="box">
        <div class="h1">Товары из этой же коллекции</div>
        <div class="slider-wrap-like">
            <button class="prev-like" id="prev-collection"></button>
            <button class="next-like" id="next-collection"></button>        
            <div class="slider-like" id="slider-collection">
                <ul>
                    {foreach from=$collection item="product_collection"}
                        {if $product_collection->id != $product->id}
                            <li>
                                <a rel='fancy' href="{$shop_url}products/{$product_collection->pseudo_dir}/?is_modal=1">{if $product_collection->file}<img src="{$gallery_url}{$product_collection->file}" alt="" id="catalog_img_{$product_collection->id}"  />{else}<img src="/images/icons/no-image.png" alt="" id="catalog_img_{$product_collection->id}"  />{/if}</a>
                                <div class="name"><a href="{$shop_url}products/{$product_collection->pseudo_dir}/">{$product_collection->name|stripslashes}</a></div>
                                <span class="cost">{$product_collection->price|number_format:2:'.':''} р.</span>	
                            </li>
                        {/if}
                    {/foreach}

                </ul>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $("#slider-collection").jCarouselLite({
                btnNext: "#prev-collection",
                btnPrev: "#next-collection",
                visible:4,
                mouseWheel: true
            });
        });

    </script>
{/if}
<!-- end medium-slider-line -->


