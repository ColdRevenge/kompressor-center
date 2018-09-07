{if $is_mobile != 1}
    {if $shop == 'lady' || $shop == 'woman'}
        {include file="getProductParamMainLady.tpl"}
    {else}
        <div class="products-main">
            {foreach from=$products item="product" name="product_item" key="key"}
                {if $product->old_price}
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

                        <div class="img-box">{if $product->is_param_1 == 1}<img src="/images/fronted/sale.png" class="sale" alt="" />{elseif  $product->is_param_3 == 1}<img src="/images/fronted/novinka.png" class="sale" alt="" />{elseif  $product->is_param_2 == 1}<img src="/images/fronted/lucena.png" class="sale" alt="" />{elseif  $product->is_param_4 == 1}<img src="/images/fronted/lider.png" class="sale" alt=""  />{/if}<a  href="{$shop_url}products/{$product->pseudo_dir}/?is_modal=1" title="{$product->name|stripslashes}" class="product_img" rel="fancy"><span id="img_box_{$product->id}">{if $product_images.$key.1}<img src="/images/gallery/{$product_images.$key.3.0->file}" alt="{$product->name|stripslashes}"id="catalog_img_{$product->id}" />{else}<img src="/images/icons/no-image.png" alt="" id="catalog_img_{$product->id}"  />{/if}</span></a></div>

                        <div class="name"><a href="{$shop_url}products/{$product->pseudo_dir}/">{$product->name|stripslashes}</a></div>

                        {if ! $setting->hide_prices}
                            <div class="price">
                                {$product->price|number_format:0:'.':' '}
                                {if $product->max_price != $product->price && $product->max_price > 0}
                                     - {price->getPrice price=$product->max_price  product_id=$product->id is_query_price=1 is_max=1}
                                {/if} 
                                руб. 
                                {if $product->old_price}
                                    &nbsp;<span>{$product->old_price|number_format:0:"":" "} р.</span>
                                {/if}
                            </div>


                            <button class="buy"  onclick="basketAnimated('#img_box_{$product->id}', '#catalog_img_{$product->id}',{$product->id}, {$product->mod_id}, {$product_images.$key.1.0->id|default:0}, 0, 0, 0, 1);"></button>
                        {/if}
                        <button class="detailed" onclick="location.href = '{$shop_url}products/{$product->pseudo_dir}/'">Подробнее</button>
                    </div>
                    {if $smarty.foreach.product_item.iteration%5 == 0}<div class="clear">&nbsp;</div>{/if}
                    {/foreach}
                        <div class="clear"></div>
                    </div> 
                    {/if}
                        {else}
                            <div class="products-main">
                                {foreach from=$products item="product" name="product_item" key="key"}
                                    {if $product->old_price}
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

                                            <div class="img-box"><a  href="{$shop_url}products/{$product->pseudo_dir}/{if $is_mobile != 1}?is_modal=1{/if}" title="{$product->name|stripslashes}" class="product_img" {if $is_mobile != 1}rel="fancy"{/if}><span id="img_box_{$product->id}">{if $product_images.$key.1}<img src="/images/gallery/{if $is_mobile == 1}{$product_images.$key.2.0->file}{else}{$product_images.$key.3.0->file}{/if}" alt="{$product->name|stripslashes}" id="catalog_img_{$product->id}" />{else}<img src="/images/icons/no-image.png" alt="" id="catalog_img_{$product->id}"  />{/if}</span></a></div>
                                            <div class="name"><a href="{$shop_url}products/{$product->pseudo_dir}/">{$product->name|stripslashes}</a></div>
                                            
                                            {if ! $setting->hide_prices}
                                                <div class="price">
                                                    {$product->price|number_format:0:'.':' '}
                                                    {if $product->max_price != $product->price && $product->max_price > 0}
                                                         - {price->getPrice price=$product->max_price  product_id=$product->id is_query_price=1 is_max=1}
                                                    {/if} 
                                                    руб. 
                                                    {if $product->old_price}
                                                        &nbsp;<span>{$product->old_price|number_format:0:"":" "} р.</span>
                                                    {/if}
                                                </div>
                                            {/if}

                                            {if $product_characteristic.$product_id.51|@count || $product_characteristic_size.$product_id|@count}
                                                <div class="size">
                                                    Размеры:
                                                    {foreach from=$product_characteristic_size.$product_id item="char_size" name="char_size"}
                                                        <span>{$char_size->name}</span>
                                                    {foreachelse}
                                                        {foreach from=$product_characteristic.$product_id.51 item="char_size" name="char_size"}
                                                            <span>{$char_size->name}</span>
                                                        {/foreach}
                                                    {/foreach}
                                                </div>
                                                <div class="clear">&nbsp;</div>
                                            {/if}

                                            <div class="clear">&nbsp;</div>
                                        </div>
                                        {/foreach}
                                        </div> 
                                        {/if}