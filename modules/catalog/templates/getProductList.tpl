<div id="indicator_catalog">
    <div class="products-list">
        {foreach from=$products item="product" name="product_item" key="key"}
            {if $product->old_price }
                {assign var="old_price_discaunt" value=($product->price*100)/$product->old_price}
                {assign var="old_price_discaunt" value=$old_price_discaunt-100}
            {else}
                {assign var="old_price_discaunt" value=0}
            {/if}
            {assign var='product_id' value=$product->id}
            {assign var="_shop_url" value=$url}
            <div class="product">
                {if ! $setting->hide_prices}
                    {if $old_price_discaunt}
                        <div class="size_block">
                            <span>{$old_price_discaunt|number_format}%</span>
                        </div>
                    {/if}
                {/if}

                <a href="{$gallery_url}{$product_images.$key.6.0->file}" title="{$product->name|stripslashes}" class="quick-lupa" rel="prettyPhoto[{$product->id}]">Увеличить</a>
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
                    {if $product->is_param_1 == 1}
                        <img src="{$fronted_images_url}sale.png" class="sale" alt="" />
                    {elseif  $product->is_param_3 == 1}
                        <img src="{$fronted_images_url}novinka.png" class="sale" alt="" />
                    {elseif  $product->is_param_2 == 1}
                        <img src="{$fronted_images_url}lucena.png" class="sale" alt="" />
                    {elseif  $product->is_param_4 == 1}
                        <img src="{$fronted_images_url}lider.png" class="sale" alt=""  />
                    {/if}
                    <span>
                        <a  href="{$_shop_url}products/{$product->pseudo_dir}/" title="{$product->name|stripslashes}">
                            {if $product_images.$key.1}
                                <img src="{$gallery_url}{$product_images.$key.3.0->file}" alt="{$product_images.$key.1.0->name|stripslashes|default:$product->name|stripslashes}" id="catalog_img_{$product->id}" />
                            {else}
                                <img src="/images/icons/no-image.png" alt="" id="catalog_img_{$product->id}"  />
                            {/if}
                        </a>
                    </span>

                    {if $product_images.$key.1|@count > 1}
                        <div class="product-images-list">
                            {foreach from=$product_images.$key.1 item="small_img" key="key_img" name="key_item"}
                                <img src="/images/gallery/{$small_img->file}" alt="" onmouseover="CatalogImg.setCatalogImgList(this, '{$product_images.$key.3.$key_img->file}');" {if $smarty.foreach.key_item.iteration == 1} class="active"{/if} />
                                {if $product_images.$key.6.0->id != $product_images.$key.6.$key_img->id}
                                    <a  href="{$gallery_url}{$product_images.$key.6.$key_img->file}" title="{$product->name|stripslashes}" rel="prettyPhoto[{$product->id}]">&nbsp;</a>
                                {/if}
                            {/foreach}
                        </div>
                    {/if}
                </div>

                <div class="desc-block-wrapper">
                    <div class="name"><a href="{$_shop_url}products/{$product->pseudo_dir}/">{$product->name|stripslashes}</a></div>

                    <div class="desc-block">

                        <div class="article">Артикул: <b>{$product->article}</b></div>

                        {char_obj->getProductValuesCharAllTemplate key_type="list" characteristic_id=-1  product_id = $product_id  shop_id = $product->shop_id assign="product_characteristic"}

                        {if $product_characteristic.$product_id|@count}
                            <div class="chars-product">
                    
                                {assign var="is_out_char" value="0"}
                                {foreach from=$product_characteristic.$product_id item="value_root"}
                                    {foreach from=$value_root item="value" name="char"}
                                        {if $is_out_char != $value->characteristic_id  && $value->characteristic_id != 73 && $value->characteristic_id != 63 && $value->characteristic_id != 64 && $value->characteristic_id != 5 && $value->characteristic_id != 2 && $value->characteristic_id != 12}
                                            {assign var="char_id" value=$value->characteristic_id}
                                            <div>
                                                <b>
                                                    {if $value->icon}
                                                        <img src="/images/icons/{$value->icon}" alt="" />
                                                    {/if}
                                                    {$value->characteristic_name|replace:"?":""|stripslashes}:
                                                </b>
                                                <div>
                                                    {foreach from=$product_characteristic.$product_id.$char_id item="value_1"}{if $value->characteristic_id == $value_1->characteristic_id}{if $is_out_char_value_1 == $value_1->characteristic_id},{/if}
                                                        {$value_1->name|replace:"?":""|stripslashes} {$value_1->unit|replace:"?":""|stripslashes}{assign var="is_out_char_value_1" value=$value_1->characteristic_id}{/if}
                                                    {/foreach}
                                                </div>
                                            </div>

                                            {assign var='is_out_char' value=$value->characteristic_id}
                                        {/if}
                                    {/foreach}
                                {/foreach}
                            </div>
                        {/if}
                    </div>

                    <div class="buy-box-wrapper">
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
                                        <span>руб.</span>
                                        {if $product->old_price}<div class="notice">Старая цена: {$product->old_price|number_format:0:"":" "} р.</div>{/if}
                                    </div>
                                </div>
                            </div>
                        {/if}


                        <div class="price-buy-box">
                            <div class="price-block">
                                <button class="detailed" onclick="location.href = '{$_shop_url}products/{$product->pseudo_dir}/'">&nbsp;</button>
                            </div>
                        </div>
                    </div>
                    <div class="clear">&nbsp;</div>
                </div>
            </div>
        {/foreach}
    </div>
    <div class="clear"></div>
</div>