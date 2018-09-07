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
                <div class="p-product__image">
                    {assign var="img_num" value="0"}
                    {if $smarty.get.img > 0}{assign var="img_num" value=$smarty.get.img}{/if}
                    {if $product_images.5.$img_num->file}
                        <img src="{$gallery_url}{$product_images.5.$img_num->file}" class="p-product__img" itemprop="image" alt="{$product->name|stripslashes}" />
                    {else}
                        <img src="/images/icons/no-image.png" class="p-product__img" alt="" />
                    {/if}
                </div>
                <div class="p-product__info p-product-info">
                    <div class="p-product-info__data">
                        <div class="p-product-info__left">
                            <div class="p-main">
                                
                                <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span class="number"><span>
                                            {if $is_b2b != 1}
                                                Цена: <b itemprop="price">{$product->price|number_format:0:'.':' '}</b>
                                            {else}
                                                Цена: <b itemprop="price">{price->getPrice price=$product->price product_id=$product->id is_query_price=1}</b>
                                            {/if} р.
                                            </span>
                                            {if $product->old_price}<div id="discount_product"><strike>Старая цена: {$product->old_price} р.</strike></div>{/if}
                                            
                                        </div>
                                    </span>


                                <div class="p-main__article">Артикул: 4150470</div>
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
                                <div class="p-main__button"><a href="#" class="btn">В корзину</a></div>
                            </div>
                        </div>
                        <div class="p-product-info__right">
                            <div class="p-main">
                                <div class="p-main__availability p-availability -available">
                                    <link itemprop="availability" href="http://schema.org/InStock" />
                                    В наличии
                                </div>
                                <div class="p-main__prices">
                                    <a href="#" class="compare-icon" title="Добавить к сравнению"><span class="sprite -compare"></span></a>
                                </div>
                                <div class="p-main__button">
                                    <a href="#" class="add-to-fav-icon" title="Добавить в избранное"><span class="sprite -add-to-fav"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-product-info__chars chars -striped -bigger">
                        <div class="chars__row">
                            <div class="chars__name">Страна производитель:</div>
                            <div class="chars__value">Китай</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Тип компрессора:</div>
                            <div class="chars__value">Маслозаполненный</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Тип привода:</div>
                            <div class="chars__value">Прямой</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Объём ресивера:</div>
                            <div class="chars__value">24 л</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Количество цилиндров:</div>
                            <div class="chars__value">1</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Ступени сжатия:</div>
                            <div class="chars__value">1</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Производительность:</div>
                            <div class="chars__value">200 л/мин</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Давление:</div>
                            <div class="chars__value">8 бар</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Мощность двигателя:</div>
                            <div class="chars__value">1.5 кВт</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Напряжение:</div>
                            <div class="chars__value">220 вольт</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Длина:</div>
                            <div class="chars__value">620 мм</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Ширина:</div>
                            <div class="chars__value">300 мм</div>
                        </div>
                        <div class="chars__row">
                            <div class="chars__name">Высота:</div>
                            <div class="chars__value">650 м</div>
                        </div>
                    </div><!-- /.chars.p-product-info__chars -->
                </div><!-- /.p-product-info -->
            </div><!-- /.p-product__cont -->
            <div class="p-product__description text">
                <h3>Описание</h3>
                <p>
                    Главными достоинствами компрессора является его компактность и мобильность,  а производительности хватит для того чтобы выполнять многие виды бытовых и гаражных работ.
                </p>
                <p>
                    Используется для:
                </p>
                    <ul>
                        <li>Подкачки шин автомобиля, мотоцикла, мотоблока, квадроцикла, мячей, матрацев итд.</li>
                        <li>Продувка,опрессовка трубопроводов,очистка воздухом от грязи и пыли;</li>
                        <li>Окраски с использованием краскораспылителя (от стен до машин);</li>
                        <li>Мойки машин и деталей;</li>
                        <li>Работы с пневмоинструментом (краскораспылитель,пневмостеплер, и т.д.).</li>
                    </ul>
                </p>
            </div>
        </div><!-- /.p-product -->
    </div><!-- /[itemscope] -->
</div><!-- /.container -->
<div id="left_box" itemscope itemtype="http://schema.org/Product">
        


        <div>
            <div class="about-product-info">
                <div class="img-box">
                    {if ! $setting->hide_prices}
                    {if $product->old_price}<div id="dicount_circl">{$old_price_discaunt|number_format:"0"}%</div>{/if}
                    {/if}
                    {if $product->is_param_1 == 1|| $product->is_param_2 || $product->is_param_3 || $product->is_param_4}
                    <div class="product-icon">
                        {if $product->is_param_1 == 1}
                        <img src="{$fronted_images_url}sale.png" class="sale" alt="" />
                        {elseif  $product->is_param_3 == 1}
                        <img src="{$fronted_images_url}novinka.png" class="sale" alt="" />
                        {elseif  $product->is_param_2 == 1}
                        <img src="{$fronted_images_url}lucena.png" class="sale" alt="" />
                        {elseif  $product->is_param_4 == 1}
                        <img src="{$fronted_images_url}lider.png" class="sale" alt=""  />
                        {/if}
                    </div>
                    {/if}
                    <div class="tovar-photos">
                        {assign var="img_num" value="0"}
                        {if $smarty.get.img > 0}{assign var="img_num" value=$smarty.get.img}{/if}
                        <div class="big-img">
                            <div  id="big_image_box">
                                <a href="{$gallery_url}{$product_images.6.$img_num->file}" rel="prettyPhoto">
                                    {if $product->id}{if $product_images.5.$img_num->file}<img src="{$gallery_url}{$product_images.5.$img_num->file}" itemprop="image" id="big_image" alt="{$product->name|stripslashes}" />{else}<img src="/images/icons/no-image.png" alt="" id="big_image" />{/if}</a></div></div>
                                    {* <link itemprop="availability" href="http://schema.org/InStock">*}

                                </div>
                                <div style=" text-align: center; clear: both">
                                    {*{if $smarty.get.is_modal != 1 && $product_images.6.$img_num->file}<a href="{$gallery_url}{$product_images.6.0->file}" rel="prettyPhoto" id="lupa"></a>{/if}*}


                                    {*                                    <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>*}

                                    <br/>

                                    {include file="small-images.tpl"}
                                </div>
                            </div>
                            <div class="about-product-info-box">
                                {foreach from=$product_mods item="mod" name="product_mod"}
                                <div class="product-price-box">
                                    {if ! $setting->hide_prices}
                                    <div class="top-line">
                                        <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                            <span class="number"><span>{if $is_b2b != 1}Цена: <b itemprop="price">{$product->price|number_format:0:'.':' '}</b>{else}Цена: <b itemprop="price">{price->getPrice price=$product->price product_id=$product->id is_query_price=1}</b>{/if} р.</span>
                                            {if $product->old_price}<div id="discount_product"><strike>Старая цена: {$product->old_price} р.</strike></div>{/if}
                                            <div id="count-price-field" style="display: none">
                                                <div>
                                                    <input type="text" value="1" id="price_count" onchange="($(this).val() < 1) ? $(this).val('1') : null;" maxlength="2" />
                                                </div>
                                                <div>
                                                    <button class="less" onclick="$('input#price_count').val(parseInt($('input#price_count').val()) + 1);
                                                    $('input#price_count').change();"></button><button  onclick="$(this).parent().parent().find('input').val(parseInt($('input#price_count').val()) - 1);
                                                    $('input#price_count').change();" class="more">
                                                </button>
                                            </div>
                                        </div>
                                    </span>
                                    <span itemprop="priceCurrency" style="display: none">RUB</span>
                                </div>
                                {if $mod->warehouse > 0 && $product->is_active == 1}
                                <button class="buy_button" onclick="{if $smarty.get.is_buy_open == '1'}window.parent.location.href = '{$url}products/{$product->pseudo_dir}/';{elseif $smarty.get.is_modal == 1}basketModal('#big_image_box', '#big_image',{$product->id}, {$mod->id}, {$product_images.1.0->id|default:0}, char_1_id, char_2_id, 0, 0, 0, parseInt($('input#price_count').val()));{else}basketAnimated('#big_image_box', '#big_image',{$product->id}, {$mod->id}, {$product_images.1.0->id|default:0}, char_1_id, char_2_id, 0, 0, 0, parseInt($('input#price_count').val()));{/if}"></button>
                                {else}
                                <div><b>Товара нет в наличии</b></div>
                                {/if}
                                <div id="basket_added">
                                    Товар успешно добавлен в корзину!
                                </div>


                                <div class="clear">&nbsp;</div>
                            </div>
                            {/if}
                            {if $mod->warehouse > 0 && $product->is_active == 1}
                            <span style="padding-bottom: 10px; display: block; border-bottom: 1px solid #ddd; margin-bottom: 10px;">В наличии</span>
                            {/if}
                            <div style="padding-bottom: 10px; display: block; border-bottom: 1px solid #ddd; margin-bottom: 10px;">
                                <div class="pull-left">
                                    {if $smarty.session.fav[$product->id]}
                                    <a href="#" class="ajax-send-data" data-id="{$product->id}" data-url="/catalog/add_to_fav/" data-success="Добавить в избранное">Удалить из избранного</a>
                                    {else}
                                    <a href="#" class="ajax-send-data" data-id="{$product->id}" data-url="/catalog/add_to_fav/" data-success="Удалить из избранного">Добавить в избранное</a>
                                    {/if}
                                </div>
                                <div class="pull-right">
                                    <div class="vs-catalog">
                                        <input type="checkbox" value="1" name="vs[]" {if $smarty.session.vs_product.$product_id}checked="checked"{/if} id="vs_porduct_{$product_id}"  onchange="vs('vs_link_id_{$product_id}', 'vs_porduct_{$product_id}', 1, {$product_id});" />
                                        <a href="javascript:void(0)" onclick="vs('vs_link_id_{$product_id}', 'vs_porduct_{$product_id}', 0, {$product_id}, {$product_root_category})" id="vs_link_id_{$product_id}" {if $smarty.session.vs_product.$product_id}class="vs_selected"{/if} target="_top">
                                            {if $smarty.session.vs_product.$product_id}Сравнить{else}К сравнению{/if}
                                        </a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            {*        {if $characteristics_size_value|@count}
                            <div class="top-line" style="text-align: left" id="select_size">
                                <div style="padding-bottom: 5px;margin-top: 5px;"><b>Выберите размер:</b></div>{foreach from=$characteristics_size_value item="value" name="name"}{if $smarty.foreach.name.iteration == 1}<script type="text/javascript">char_1_id = {$value-> id}</script>{/if}<input type="radio" id="c{$value->id}" name="cc" {if $smarty.foreach.name.iteration == 1} checked="checked"{/if} onchange=" char_1_id = {$value->id}" /><label for="c{$value->id}"><span></span><div>{$value->name|stripslashes}</div></label>{/foreach}
                                <div class="clear">&nbsp;</div>
                                <a href="{$url}table_size/?is_modal=1" rel="fancy-size">Определить свой размер</a>
                            </div>
                            <div class="clear">&nbsp;</div>
                            {else}
                            <div style="display: none">
                                <select id="size_product_{$mod->id}">
                                    <option value="0"></option>
                                </select>
                            </div>
                            {/if}*}

                            <div class="clear">&nbsp;</div>

                            {*            <div class="top-line" id="navigate-products">
                            {if $nav_products.result.$nav_product_key}
                            {assign var="prev_id" value=$nav_product_key-1}
                            {assign var="next_id" value=$nav_product_key+1}
                            {if !isset($nav_products.result.$prev_id)}
                            {assign var="prev_id" value=$nav_products.result|@count-1}
                            {/if}
                            <a href="/products/{$nav_products.result.$prev_id->pseudo_dir}/{if $smarty.get.is_modal}?is_modal={$smarty.get.is_modal}{/if}">Предыдущий товар</a>
                            / 
                            {if !isset($nav_products.result.$next_id)}
                            {assign var="next_id" value=0}
                            {/if}
                            <a href="/products/{$nav_products.result.$next_id->pseudo_dir}/{if $smarty.get.is_modal}?is_modal={$smarty.get.is_modal}{/if}">Следующий товар</a>
                            {/if}
                            {if $smarty.get.is_modal != 1}
                            <div class="notice"><a href='{$back_url}'>Вернуться</a></div> 
                            {/if}
                        </div>*}
                        {if $characteristics_product|@count}
                        <div>
                            <div class="article">{if $mod->article}Артикул: <b>{$mod->article}</b>{/if}</div>
                            <div class="h7">Параметры</div>
                            <div class="chars-product">
                                {assign var="is_out_char" value="0"}
                                {if $shop == 'sumka' && $product->desc_1 != '' }
                                <div><b{if $smarty.get.is_modal == 1} style="background-color: white"{/if}>Размер:</b>
                                    <div{if $smarty.get.is_modal == 1} style="background-color: white"{/if}>
                                    {$product->desc_1} см.
                                </div>
                            </div>
                            {/if}

                            {if ($shop == 'platok' || $shop == 'sumka') && $mod->name != ''}
                            <div><b{if $smarty.get.is_modal == 1} style="background-color: white"{/if}>Состав: </b><div{if $smarty.get.is_modal == 1} style="background-color: white"{/if}>{$mod->name|stripslashes}</div>
                        </div>
                        {/if}
                        {foreach from=$characteristics_product item="value" name="char"}
                        {if ($smarty.foreach.char.iteration <= 6 && $smarty.get.is_modal == 1) || $smarty.get.is_modal != 1}
                        {if $is_out_char != $value->characteristic_id && $value->characteristic_id != 63 && $value->characteristic_id != 73 && $value->characteristic_id != 64 && $value->characteristic_id != 2} {* Если не тип изделия *}
                        <div><b{if $smarty.get.is_modal == 1} style="background-color: white"{/if}>{if $value->icon}<img src="/images/icons/{$value->icon}" alt="" />{/if}{$value->characteristic_name|replace:"?":""|stripslashes}:</b>
                            <div{if $smarty.get.is_modal == 1} style="background-color: white"{/if}>
                            {foreach from=$characteristics_product item="value_1"}{if $value->characteristic_id == $value_1->characteristic_id}{if $is_out_char_value_1 == $value_1->characteristic_id},{/if}
                            {$value_1->value_name|replace:"?":""|stripslashes} {$value_1->unit|replace:"?":""|stripslashes}{assign var="is_out_char_value_1" value=$value_1->characteristic_id}{/if}{/foreach}
                        </div>
                    </div>

                    {assign var='is_out_char' value=$value->characteristic_id}
                    {/if}
                    {/if}
                    {/foreach}
                </div>
                {/if}


                {if $product->desc_4 && $smarty.get.is_modal == 1}
                {if $product_images.1|@count > 1} <div class="top-line">{/if}
                <div class="h7">Описание</div>

                {$product->desc_4|stripslashes|replace:"&nbsp;":" "}

                {if $product_images.1|@count > 1} </div>{/if}
                {/if}

                {*                                                    {if $smarty.get.is_modal != 1}*}




                {if $smarty.get.is_modal == 1}
                <button class="in_product" onclick="parent.location.href = '{$url}products/{$product->pseudo_dir}/'"></button>
                {/if}
                {* <div class="product-box-icon">
                <a href="{$url}dostavka-i-oplata/?is_modal=1"{if $smarty.get.is_modal == 1} rel="page_mini"{else} rel="page"{/if} class="icon-1">Доставка</a>
                <a href="{$url}garantii-kachestva/?is_modal=1"{if $smarty.get.is_modal == 1} rel="page_mini"{else} rel="page"{/if} class="icon-3">Гарантия качества</a>
                <a href="{$url}vozvrat/?is_modal=1"{if $smarty.get.is_modal == 1} rel="page_mini"{else} rel="page"{/if} class="icon-4">Возврат и обмен</a>
                <a href="{$url}pynktu-samovuvoza/?is_modal=1"{if $smarty.get.is_modal == 1} rel="page_mini"{else} rel="page"{/if} class="icon-2">Доставка</a>
            </div>*}
            {*                                                    {/if}*}
        </div>
        {/foreach}

        <div class="clear">&nbsp;</div>
    </div>


</div>
<div class="clear"></div>



<div class="desc_product">


    {if $smarty.get.is_modal != 1 && $product->desc}
    <div class="h2">Описание:</div>
    <div itemprop="description">
        {$product->desc|stripslashes}
    </div>

    {if $smarty.get.is_modal != 1}
    {this->getCategoryAdress category_id=$product->category_1_id assign="category_adress"}
    <div id="product-selection">
        {foreach from=$characteristics_product item="char_product"}
        {if $char_product->characteristic_id == 5 && $char_product->char_pseudo_dir != '' && $char_product->char_value_pseudo_dir != ''}
        <a href="{$url}{$category_adress}char/{$char_product->char_pseudo_dir}/{$char_product->char_value_pseudo_dir}/" target="_blank">Похожие {$category_obj->name|stripslashes}, содержащие "{$char_product->value_name|stripslashes}"</a><br/>
        {/if}
        {/foreach}
        {foreach from=$characteristics_product item="char_product"}
        {if $char_product->characteristic_id == 2 && $char_product->char_pseudo_dir != '' && $char_product->char_value_pseudo_dir != ''}
        <a href="{$url}{$category_adress}char/{$char_product->char_pseudo_dir}/{$char_product->char_value_pseudo_dir}/" target="_blank">Похожие {$category_obj->name|stripslashes}, содержащие цвет "{$char_product->value_name|stripslashes}"</a><br/>
        {/if}
        {/foreach}
    </div>
    {/if}

    {/if}
    {if $smarty.get.is_modal != 1}

    {if $news_product|@count}
    <div class="clear">&nbsp;</div><br/>
    <div class="h1">Статьи о товаре</div>
    <ul>
        {foreach from=$news_product item="news"}
        <li><a href="/news/look/{$news->id}/">{$news->name|stripslashes}</a></li>
        {/foreach}
    </ul>
    {/if}

    <div class="clear"></div>








    {* Сопутствующие товары для тиала *}
    {*     {if $related_products.0|@count > 0}
    <br/>
    <h1>Товары из комплекта</h1>
    {include file=$base_dir|cat:'modules/catalog/templates/getProduct.tpl' products=$related_products product_images=$related_product_images}
    {/if}
    {include file='collection_product.tpl' products=$collection}
    {include file='like_product.tpl' products_in_category=$products_in_category type="1"}
    {include file='like_product.tpl' products_in_category=$complect_products type="2"}
    {include file='history_product.tpl'}
    {$comment}*}
    {/if}


    {*
    <div id="desc_type">
        <a href="javascript:void(0)" onclick="this.className='selected';document.getElementById('comment_box_a').className=null;document.getElementById('desc_box_a').className=null;ShowHide('desc_box', 2);ShowHide('comment_block', 2);showJQuery('tech', 1); " class="selected" id="tech_a">Технические характеристики</a> 
        / <a href="javascript:void(0)" onclick="this.className='selected';document.getElementById('comment_box_a').className=null;document.getElementById('tech_a').className=null;ShowHide('tech', 2);ShowHide('comment_block', 2);showJQuery('desc_box', 1); " id="desc_box_a">Описание</a>
        / <a href="javascript:void(0)" onclick="this.className='selected';document.getElementById('desc_box_a').className=null;document.getElementById('tech_a').className=null;ShowHide('tech', 2);ShowHide('desc_box', 2);showJQuery('comment_block', 1); " id="comment_box_a">Комментарии</a>
    </div>
    <div id="comment_block" style="display: none;">
        {$comment}
    </div>
    <div id="tech">
        {if $characteristics_tech|@count}
        <div class="h1">Технические характеристики</div>
        <table class="specific">
            <tbody>
                {foreach from=$characteristics_tech item="characteristic" key="char_id"}
                <tr class="selected">
                    <td colspan="2" style="text-align: center;">
                        <strong>{$characteristic->name|stripslashes}</strong>
                    </td>
                </tr>
                {foreach from=$characteristics_tech_type.$char_id item="char_type" key="type_id"}
                {if $characteristics_tech_product.$type_id|@count}
                <tr>

                    <td>{$char_type->name|stripslashes}</td>
                    <td>{foreach from=$characteristics_tech_product.$type_id item='char_values' name='char_values'}{$char_values->name|stripslashes}{$char_values->unit|stripslashes}{if $smarty.foreach.char_values.iteration < $smarty.foreach.char_values.total}/{/if}{/foreach}</td>

                </tr>
                {/if}
                {/foreach}

                {/foreach}
            </tbody>
        </table>
        {/if}
    </div>    
    *}



    {* Нормальны Сопутствующие товары *}
    {*if $related_products|@count != 0}
    <h2>Аналоги</h2>
    {foreach from=$related_products item="rproduct" name="related"}
    <div class="related">
        {assign var="related_rproduct_id" value=$rproduct->id}

        <div class="desc_rproduct" style="{if $smarty.foreach.related.index%2}background: white;{/if}">
            <div class="left_desc">
                Артикул: <b>{$rproduct->article}</b><br/>
                {foreach from=$characteristics_related_rproduct.$related_rproduct_id item="value"}
                <div style="margin-bottom: 3px;">{$value->characteristic_name|stripslashes}: <b>{$value->value_name|stripslashes}</b></div>
                {/foreach}
            </div>
            <div class="middle_desc">
                <div class="h3" style="text-align: left;color: #ff1a9b">
                    {if ! $setting->hide_prices}
                    Стоимость: 
                    {$rproduct->price|number_format|replace:",":"&nbsp;"} 
                    {/if}
                    {$default_currency->name}
                </div>
            </div>
            <div class="right_desc">
                {if ! $setting->hide_prices}
                <a href="{$url}basket/add/info/{$rproduct->id}/" rel="prettyPopin" id="basket_button" onclick="basket(this, 1, {$rproduct->id}, 0, {$rproduct_images.1.0->id|default:0}, document.getElementById('count_add_rproduct_{$rproduct->id}').options[ document.getElementById('count_add_rproduct_{$rproduct->id}').selectedIndex].value);">
                    <div class="buy">

                        <img src="{$fronted_images_url}buy.png" class="buy_button" alt="" title="Купить" />
                    </div>
                </a>
                {/if}
                <div style="text-align: center; padding-top: 3px; padding-left: 7px;clear: both;">
                    <select id="count_add_rproduct_{$rproduct->id}" class="text" style="vertical-align: middle; width: 45px;">
                        {section start=1 loop=10 name="count"}
                        <option value="{$smarty.section.count.iteration}">{$smarty.section.count.iteration}</option>
                        {/section}
                    </select>
                </div>
            </div>
            <div class="clear">&nbsp;</div>
        </div>



    </div>
    {/foreach}

    {/if*}


    <br/><br/><br/>


</div>
<div class="clear">&nbsp;</div>
</div>
</div>
{else}
<p>Продукт не найден</p>
{/if}    
</div>
</div>
</div>