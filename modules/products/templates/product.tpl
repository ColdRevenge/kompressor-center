{if $product->old_price}
    {assign var="old_price_discaunt" value=($product->price*100)/$product->old_price}
    {assign var="old_price_discaunt" value=$old_price_discaunt-100}
{else}
    {assign var="old_price_discaunt" value=0}
{/if}
{assign var="product_id" value=$product->id}

<script type="text/javascript">
    var char_1_id = 0;
    var char_2_id = 0;
</script>
<script type="text/javascript">selected_image_id = {$product_images.1.$key->id|default:0}</script>

{if $smarty.get.is_modal != 1}
    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs__cont">
                {assign var="adress" value=''}
                <li class="breadcrumbs__item"><a href="{$url}" class="breadcrumbs__link">Главная</a></li>
                <li class="breadcrumbs__item"><a href="{$url}catalog" class="breadcrumbs__link">Каталог товаров</a></li>
                {foreach from=$bread_page_arr item="bread" name="bread"}
                    {assign var="adress" value=$adress|cat:$bread->pseudo_dir|cat:'/'}
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="{$url}{$adress}">{$bread->bread_name|default:$bread->name}</a></li>
                {/foreach}
                {if $page_id > 1}<li class="breadcrumbs__item"><a class="breadcrumbs__link" href="{$back_url}">Страница {$page_id}</a></li>{/if}
                <li class="breadcrumbs__item">{$product->name|stripslashes} </li>
            </ul>
        </div>
    </div>
{/if}
<div class="{if  $is_ajax != 1}container{/if}">
    <div itemscope itemtype="http://schema.org/Product">
        <h1 class="headline" itemprop="name">{$product->name|stripslashes}</h1>

        <div class="p-product">
            <div class="p-product__cont">
                <div class="p-product__left">
                    <div class="p-product__image">
                        {assign var="img_num" value="0"}
                        {if $smarty.get.img > 0}{assign var="img_num" value=$smarty.get.img}{/if}
                        {if $product_images.6.$img_num->file}
                            <img src="{$gallery_url}{$product_images.6.$img_num->file}" class="p-product__img" itemprop="image" alt="{$product->name|stripslashes}" />
                        {else}
                            <img src="/images/icons/no-image.png" class="p-product__img" alt="" />
                        {/if}
                    </div>
                    <div class="p-product__description text">
                        <h3>Описание</h3>
                        <div itemprop="description">
                            {$product->desc|stripslashes}
                        </div>
                    </div>
                </div>
                <div class="p-product__info p-product-info">
                    {foreach from=$product_mods item="mod" name="product_mod"}
                        <div class="p-product-info__data {if $setting->hide_prices}_no-margin{/if}">
                            <div class="p-product-info__left">
                                <div class="p-main">
                                    <div class="p-main__article">Артикул: {$mod->article}</div>
                                    {if ! $setting->hide_prices}
                                        <div class="p-main__prices product-prices {if $product->old_price}-with-old{/if}">
                                            {if $product->old_price}
                                                <div class="product-prices__old price -old">
                                                    <span class="price__val">{$product->old_price|number_format:0:'.':' '}</span>
                                                    <span class="price__currency">руб</span>
                                                </div>
                                            {/if}
                                            <div class="product-prices__current price">
                                                <span class="price__val" itemprop="price">
                                                    {if $is_b2b != 1}
                                                        {$product->price|number_format:0:'.':' '}
                                                    {else}
                                                        {price->getPrice price=$product->price product_id=$product->id is_query_price=1}
                                                    {/if}
                                                </span>
                                                <span itemprop="priceCurrency" class="price__currency">руб</span>
                                                <span itemprop="priceCurrency" style="display: none">RUB</span>
                                            </div>
                                        </div>
                                        {if $mod->warehouse > 0 && $product->is_active == 1}
                                            <div class="p-main__button">
                                                <a href="#" 
                                                   class="btn js-add-to-cart" 
                                                   data-id="{$product->id}"
                                                   data-mod-id="{$mod->id}"
                                                   data-image-id="{$product_images.1.$img_num->id}"
                                                   >В корзину</a>
                                            </div>
                                        {/if}
                                    {else}
                                        <div class="p-main__prices">
                                            <a href="#" 
                                               class="add-to-fav-icon {if $smarty.session.fav[$product->id]}-active{/if}" 
                                               data-id="{$product->id}"
                                               data-url="/catalog/add_to_fav/"
                                               title="{if $smarty.session.fav[$product->id]}Удалить из избранного{else}Добавить в избранное{/if}">
                                                <span class="sprite -add-to-fav"></span>
                                            </a>
                                        </div>
                                    {/if}
                                </div>
                            </div>
                            <div class="p-product-info__right">
                                <div class="p-main">
                                    {if $mod->warehouse > 0 && $product->is_active == 1}
                                        <div class="p-main__availability p-availability -available">
                                            <link itemprop="availability" href="http://schema.org/InStock" />
                                            В наличии
                                        </div>
                                    {else}
                                        <div class="p-main__availability p-availability">
                                            <link itemprop="availability" href="http://schema.org/OutOfStock" />
                                            Товара нет в наличии
                                        </div>
                                    {/if}
                                    <div class="p-main__prices">
                                        <a href="/vs_product/{$product->category_1_id}/?is_modal=1'" 
                                           class="compare-icon {if $smarty.session.vs_product[$product->id]}-active{/if}" 
                                           data-id="{$product->id}" 
                                           title="{if $smarty.session.vs_product[$product->id]}Сравнить{else}Добавить к сравнению{/if}">
                                            <span class="sprite -compare"></span>
                                        </a>
                                    </div>
                                    {if ! $setting->hide_prices}
                                        <div class="p-main__button">
                                            <a href="#" 
                                               class="add-to-fav-icon {if $smarty.session.fav[$product->id]}-active{/if}" 
                                               data-id="{$product->id}"
                                               data-url="/catalog/add_to_fav/"
                                               title="{if $smarty.session.fav[$product->id]}Удалить из избранного{else}Добавить в избранное{/if}">
                                                <span class="sprite -add-to-fav"></span>
                                            </a>
                                        </div>
                                    {/if}
                                </div>
                            </div>
                        </div>
                        <div class="p-product-info__chars chars -striped -bigger">
                            {foreach from=$characteristics_product item="value" name="char"}
                                {if $is_out_char != $value->characteristic_id && $value->characteristic_id != 63 && $value->characteristic_id != 73 && $value->characteristic_id != 64 && $value->characteristic_id != 2} {* Если не тип изделия *}
                                    <div class="chars__row">
                                        <div class="chars__name">
                                            {if $value->icon}<img src="/images/icons/{$value->icon}" alt="" />{/if}
                                            {$value->characteristic_name|replace:"?":""|stripslashes}:
                                        </div>
                                        <div class="chars__value">
                                            {foreach from=$characteristics_product item="value_1"}
                                                {if $value->characteristic_id == $value_1->characteristic_id}
                                                    {if $is_out_char_value_1 == $value_1->characteristic_id},{/if}
                                                    {$value_1->value_name|replace:"?":""|stripslashes} 
                                                    {$value_1->unit|replace:"?":""|stripslashes}
                                                    {assign var="is_out_char_value_1" value=$value_1->characteristic_id}
                                                {/if}
                                            {/foreach}
                                        </div>
                                    </div>
                                    {assign var='is_out_char' value=$value->characteristic_id}
                                {/if}
                            {/foreach}
                        </div><!-- /.chars.p-product-info__chars -->
                    {/foreach}
                </div><!-- /.p-product-info -->
            </div><!-- /.p-product__cont -->
        </div><!-- /.p-product -->
    </div><!-- /[itemscope] -->

    {if $news_product|@count}
        <div class="headline">Статьи о товаре</div>
        <ul>
            {foreach from=$news_product item="news"}
                <li><a href="/news/look/{$news->id}/">{$news->name|stripslashes}</a></li>
            {/foreach}
        </ul>
    {/if}
</div><!-- /.container -->