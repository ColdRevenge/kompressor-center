<div class="{if  $is_ajax != 1}container{/if}">
    <div>
        {if $param_tpl.param_id == 3}
            {if $products.0->created}
                <p>Последнее поступление новинок: <b>{$products.0->created|date_format:"%d.%m.%Y"}</b></p>
            {/if}
        {/if}
        <div class="c-products">
            {foreach from=$products item="product" name="product_item" key="key"}
                <div class="c-products__item">
                    {include file=$base_dir|cat:"modules/catalog/templates/getProductItem.tpl" product=$product product_images=$product_images key=$key}
                </div>
            {/foreach}
        </div> 
    </div>
</div>