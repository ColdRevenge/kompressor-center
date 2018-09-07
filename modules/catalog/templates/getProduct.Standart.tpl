<div id="indicator_catalog">
    <div class="products">
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

                    <div class="img-box">{if $product->is_param_1 == 1}<img src="{$fronted_images_url}sale.png" class="sale" alt="" />{elseif  $product->is_param_3 == 1}<img src="{$fronted_images_url}novinka.png" class="sale" alt="" />{elseif  $product->is_param_2 == 1}<img src="{$fronted_images_url}lucena.png" class="sale" alt="" />{elseif  $product->is_param_4 == 1}<img src="{$fronted_images_url}lider.png" class="sale" alt=""  />{/if}<a  href="{$shop_url}products/{$product->pseudo_dir}/?is_modal=1" title="{$product->name|stripslashes}" class="product_img" rel="fancy" {*onmouseover="showDescCatalog('desc_content_{$product->id}', '{$product->id}')" onmouseout="hideDescCatalog('desc_content_{$product->id}')"*}><span id="img_box_{$product->id}">{if $product_images.$key.1}<img src="{$gallery_url}{$product_images.$key.3.0->file}" alt="{$product->name|stripslashes}"{* title="{$product_images.$key.1.0->name|stripslashes|default:$product->name|stripslashes}"*} id="catalog_img_{$product->id}" />{else}<img src="/images/icons/no-image.png" alt="" id="catalog_img_{$product->id}"  />{/if}</span></a></div>

                    <div class="name"><a href="{$shop_url}products/{$product->pseudo_dir}/">{$product->name|stripslashes}</a></div>

                    <div class="article">Артикул: <b>{$product->article}</b></div>
                    
                    {if ! $setting->hide_prices}
                        <div class="price"
                            {$product->price|number_format:0:'.':' '}
                            {if $product->max_price != $product->price && $product->max_price > 0}
                                 - {price->getPrice price=$product->max_price  product_id=$product->id is_query_price=1 is_max=1}
                            {/if} 
                            руб.
                        </div>
                        
                        <button  onclick="basketAnimated('#img_box_{$product->id}', '#catalog_img_{$product->id}',{$product->id}, {$product->mod_id}, {$product_images.$key.1.0->id|default:0}, 0, 0, 0, 1);"></button>
                    {/if}
                </div>
                {/foreach}
                </div> 
                <div class="clear"></div>
            </div>