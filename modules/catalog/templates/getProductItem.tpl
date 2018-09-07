{if $product->old_price}
    {assign var="old_price_discaunt" value=($product->price*100)/$product->old_price}
    {assign var="old_price_discaunt" value=$old_price_discaunt-100}
{else}
    {assign var="old_price_discaunt" value=0}
{/if}
{assign var='product_id' value=$product->id}

{assign var="_shop_url" value=$url}
<div class="product {if $setting->hide_prices}-no-price{/if}">
    <div class="product__head">
        <div class="product__article">Артикул {$product->article}</div>
        <a class="product__chars-link js-product-show-chars" href="#">Характеристики</a>
    </div>
    <a href="{$_shop_url}products/{$product->pseudo_dir}/" class="product__title">
        {$product->name|stripslashes}
    </a>
    <div class="product__imchar">
        <div class="product__chars-list chars js-product-chars scrollbar-inner">
            {if $product->chars}
                {foreach from=$product->chars item="ichar" name="ichar"}
                    <div class="chars__row">
                        <div class="chars__name">{$ichar->characteristic_name|replace:"?":""|stripslashes}:</div>
                        <div class="chars__value">{$ichar->value_name|replace:"?":""|stripslashes}</div>
                    </div>
                {/foreach}
            {/if}
        </div>
        <a href="{$_shop_url}products/{$product->pseudo_dir}/" class="product__image">
            {if $product_images.$key.1}
                <img class="product__img" src="{$gallery_url}{$product_images.$key.4.0->file}" alt="{$product->name|stripslashes}" id="catalog_img_{$product->id}" />
            {else}
                <img class="product__img" src="/images/icons/no-image.png" alt="" id="catalog_img_{$product->id}"  />
            {/if}
        </a>

        {if $product->is_param_1 == 1}
            <div class="product__label _discount">Скидка</div>
        {elseif  $product->is_param_3 == 1}
            <div class="product__label _new">Новинка</div>
        {elseif  $product->is_param_2 == 1}
            <div class="product__label _promo">Акция</div>
        {elseif  $product->is_param_5 == 1}
            <div class="product__label _sale">Распродажа</div>
        {/if}
    </div>


    <div class="product__bottom">

        {if ! $setting->hide_prices}
            <div class="product__prices product-prices {if $product->old_price}-with-old{/if}">
                {if $product->old_price}
                    <div class="product-prices__old price -old">
                        <span class="price__val">{$product->old_price|number_format:0:"":" "}</span>
                        <span class="price__currency">руб</span>
                    </div>
                {/if}
                <div class="product-prices__current price">
                    <span class="price__val">{$product->price|number_format:0:'.':' '}</span>
                    <span class="price__currency">руб</span>
                </div>
            </div>
        {/if}

        <div class="product__controls">
            <a href="/vs_product/{$product->category_1_id}/?is_modal=1'" 
               class="product__compare compare-icon {if $smarty.session.vs_product[$product->id]}-active{/if}" 
               data-id="{$product->id}" 
               title="{if $smarty.session.vs_product[$product->id]}Сравнить{else}Добавить к сравнению{/if}">
                <span class="sprite -compare"></span>
            </a>
            {if ! $setting->hide_prices}
                <a href="#" class="product__cart btn js-add-to-cart" data-id="{$product->id}" data-mod-id="{$product->mod_id}" data-image-id="{$product_images.$key.1.0->id}">В корзину</a>
            {/if}
            <a href="#" 
               class="product__fav add-to-fav-icon {if $smarty.session.fav[$product->id]}-active{/if}" 
               data-id="{$product->id}"
               data-url="/catalog/add_to_fav/"
               title="{if $smarty.session.fav[$product->id]}Удалить из избранного{else}Добавить в избранное{/if}">
                <span class="sprite -add-to-fav"></span>
            </a>
        </div>
    </div>
</div>
