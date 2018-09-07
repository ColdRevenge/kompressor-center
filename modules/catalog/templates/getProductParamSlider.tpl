<div class="slider-wrap-main">
    <button class="prev-main"></button>
    <button class="next-main"></button>        
    <div class="slider-main">
        <ul>
            {foreach from=$products item="product" name="product_item" key="key"}
                <li>
                    {if $product->old_price > $product->price}
                        {assign var="old_price_discaunt" value=($product->price*100)/$product->old_price}
                        {assign var="old_price_discaunt" value=$old_price_discaunt-100}
                    {else}
                        {assign var="old_price_discaunt" value=0}
                    {/if}
                    {assign var='product_id' value=$product->id}
                    <div class="product">

                        {if ! $setting->hide_prices}
                            {if $old_price_discaunt}
                                <div class="size_block">
                                    <span>{$old_price_discaunt|number_format}%</span>
                                </div>
                            {/if}
                        {/if}

                        {assign var="product_id" value=$product->id}
                        {if $product->is_param_1 == 1|| $product->is_param_2 || $product->is_param_3 || $product->is_param_4}
                            <div class="catalog-icon">
                                {if $product->is_param_1 == 1}
                                    <div class="is_param_1">&nbsp;</div>
                                {/if}
                                {if $product->is_param_2 == 1}
                                    <div class="is_param_2">&nbsp;</div>
                                {/if}
                                {if $product->is_param_3 == 1}
                                    <div class="is_param_3">&nbsp;</div>
                                {/if}
                                {if $product->is_param_4 == 1}
                                    <div class="is_param_4">&nbsp;</div>
                                {/if}
                            </div>
                        {/if}
                        <div class="img-box" id="img_box_{$product->id}">
                            <a href="{$shop_url}products/{$product->pseudo_dir}/?is_modal=1" rel="fancy">
                                <span>
                                    {if $product_images.$key.1}
                                        <img src="{$gallery_url}{$product_images.$key.2.0->file}" alt="{$product_images.$key.1.0->name|stripslashes|default:$product->name|stripslashes}" id="catalog_img_{$product->id}" />
                                    {else}
                                        <img src="/images/icons/no-image.png" alt="" id="catalog_img_{$product->id}"  />
                                    {/if}
                                </span>
                            </a>
                        </div>

                        <div class="name"><a href="{$shop_url}products/{$product->pseudo_dir}/">{$product->name|stripslashes}</a></div>

                        <div class="clear"></div>
                        {if ! $setting->hide_prices}
                            <div class="buy-box">

                                <div class="price-box">
                                    <div class="price"{if $old_price_discaunt}{/if}>
                                        {if $is_b2b != 1}
                                            {$product->price|number_format:0:'.':' '}
                                        {else}
                                            {price->getPrice price=$product->price product_id=$product->id is_query_price=1} 
                                            {if $product->max_price != $product->price && $product->max_price > 0}
                                                 - {price->getPrice price=$product->max_price  product_id=$product->id is_query_price=1 is_max=1}
                                            {/if}
                                        {/if} 
                                        р.
                                    </div>
                                </div>

                                <div class="price-block">
                                    <button onclick="basketAnimated('#img_box_{$product->id}', '#catalog_img_{$product->id}',{$product->id}, {$product->mod_id}, {$product_images.$key.1.0->id|default:0}, 0, 0, 0, 1);"></button>
                                </div>

                            </div>
                        {/if}
                    </div>
                </li>
            {/foreach}

        </ul>
    </div>
</div>
