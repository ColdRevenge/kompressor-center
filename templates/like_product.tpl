{* Похожие товары. Берет все товары из корневой категории *}
{if $products_in_category|@count}
    <div class="box" style="margin-top: 20px;">
        <header>
        
        <div class="head_3">{$product_in_category_name|stripslashes}</div>
        </header>
        <div class="slider-wrap-like">
            <button class="prev-like"></button>
            <button class="next-like"></button>        
            <div class="slider-like">
                <ul>
                    {foreach from=$products_in_category item="product"}
                        <li>
                            <a rel='fancy' href="{$shop_url}products/{$product->pseudo_dir}/?is_modal=1">{if $product->file}<img src="{$gallery_url}{$product->file}" alt="" id="catalog_img_{$product->id}"  />{else}<img src="/images/icons/no-image.png" alt="" id="catalog_img_{$product->id}"  />{/if}</a>
                            <div class="name"><a href="{$shop_url}products/{$product->pseudo_dir}/">{$product->name|stripslashes}</a></div>
                            <span class="cost">{$product->price} р.</span>	
                        </li>
                    {/foreach}

                </ul>
            </div>
        </div>
    </div>

        <script type="text/javascript">
            $(function() {
                $(".slider-like").jCarouselLite({
                    btnNext: ".next-like",
                    btnPrev: ".prev-like",
                    visible: 4,
                    mouseWheel: true
                });
            });

        </script>
{/if}
<!-- end medium-slider-line -->


