<div id="random">
    <h6>СЛУЧАЙНЫЕ ТОВАРЫ</h6>
    <div class="products">
        {foreach from=$products item="product" name="product"}
            {assign var="product_id" value=$product->id}
            {if $smarty.foreach.product.iteration < 4}
                <div class="product">
                    <div>
                        <a href="{$shop_url}products/{$product->pseudo_dir}/"  title='{$product->name|stripslashes|replace:"'":'"'} ({$product->price|number_format|replace:",":"&nbsp;"} руб.)' class="a_random">
                            <img src="{$gallery_url}{$product->file}" alt="" />
                        </a>
                    </div>
                    <div class="desc">
                        <a href="{$shop_url}products/{$product->pseudo_dir}/">
                            {$product->name|stripslashes}
                        </a>
                    </div>
                    {if ! $setting->hide_prices}
                        <a href="{$url}basket/add/info/{$product->id}/" rel="prettyPopin"  onclick="basket(this, 1, {$product->id}, 0, {$product_images.$product_id.1.0->id|default:0});">
                            <div class="basket">
                                <img src="{$fronted_images_url}baslet_in.png" alt="" /> 
                                    {$product->price} руб.
                            </div>
                        </a>
                    {/if}
                </div>
            {/if}
        {/foreach}
    </div>
</div>