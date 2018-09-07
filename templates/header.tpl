<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{$head_title|stripslashes|default:$set->title|stripslashes}</title>
    <link rel="shortcut icon" href="{$host_url}favicon.ico" />
    <meta name="description" content='{$head_desc|stripslashes|strip_tags|truncate:249|default:''|stripslashes|strip_tags|truncate:249}' />
    <meta name="keywords" content='{$head_key|stripslashes|default:''|stripslashes|strip_tags}' />

    <link media="all" type="text/css" rel="stylesheet" href="/assets/fonts/fonts.css" />
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/styles.css?v=1" />
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/responsive.css" />
    <script src="/assets/vendor/jquery/jquery-1.12.3.min.js"></script>
</head>
<body>
    <div class="supertop">
        <div class="container supertop__container">
            <div class="supertop__menu supertop-menu">
                <ul class="supertop-menu__ul">
                    {foreach from=$menu_top.0 item="menu" name="menu"}
                        {if $menu->is_visible == 1}
                            <li class="supertop-menu__li">
                                <a class="supertop-menu__link" href="{if $menu->link}{$menu->link}{else}{$url}{page_obj->getFullAdressPageIdRoutes page_id=$menu->page_id}{/if}" >{$menu->name|stripslashes}</a>
                            </li>
                        {/if}
                    {/foreach}
                </ul>
            </div>
            <div class="supertop__city">
                <a href="#" class="supertop__city-link js-select-city">Выберите город</a>
            </div>
            <div class="supertop__buttons supertop-buttons">
                <!-- <a href="#" class="supertop-buttons__link"><span class="sprite -user"></span></a> -->
                <a href="/catalog/fav" class="supertop-buttons__link">
                    <span class="sprite -fav"></span>
                    {if $fav_count}
                        <span class="supertop-buttons__counter _{$fav_count}">{$fav_count}</span>
                    {/if}
                </a>
                <a href="{$https_url}basket/" class="supertop-buttons__link" {if $setting->hide_prices || $smarty.const.hideBasketWidget}style="display: none;"{/if} id="basket">
                    <span class="sprite -cart"></span>
                    {if $basket_count}
                        <span class="supertop-buttons__counter _{$basket_count}">{$basket_count}</span>
                    {/if}
                </a>
            </div>
        </div>
    </div>

    <header class="header">
        <div class="container header__container">
            <div class="header__logo">
                <a href="/">
                    <img src="/assets/img/logo.jpg" alt="Компрессор центр - Энергия воздуха" />
                </a>
            </div><!-- /.header__logo -->
            <div class="header__search-address">
                <form action="/catalog/find/" class="header__search h-search">
                    <input type="text" name="find" class="h-search__input" placeholder="Поиск по сайту" value="{$smarty.get.find|default:''}" />
                    <button type="submit" class="h-search__submit"><span class="sprite -search"></span></button>
                </form>
                <address class="header__address h-address">
                    <div class="h-address__address">
                        <span class="sprite -address -mr5"></span>
                        г. Москва, 1-ая ул. Энтузиастов, д.12 стр.1
                    </div>
                    <div class="h-address__email">
                        <span class="sprite -mail -mr5"></span>
                        <a href="mailto: info@kompressor-center.com" class="h-address__link">info@kompressor-center.com</a>
                    </div>
                </address>
            </div><!-- /.header__search-address -->
            <div class="header__phones">
                <div class="header__phone">{$setting->phone_1|replace:")":")</span>"|replace:'+':"<span>+"|replace:'8(':"<span>8("|replace:'8 (':"<span>8 ("}</div>
                <div class="header__worktime">
                    <span class="sprite -worktime header__worktime-icon"></span>
                    Пн-Вс  08.00-18.00
                </div>
            </div><!-- /.header__phones -->
        </div><!-- /.container -->
    </header>


    <nav class="menu">
        <div class="container">
            <ul class="menu__ul">
                {foreach from=$menu_main.0 item="menu" name="menu"}
                    {if $menu->is_visible == 1}
                        <li class="menu__li">
                            <a class="menu__link" href="{if $menu->link}{$menu->link}{else}{$url}{page_obj->getFullAdressPageIdRoutes page_id=$menu->page_id}{/if}" >{$menu->name|stripslashes}</a>
                        </li>
                    {/if}
                {/foreach}
            </ul><!-- /.menu__ul -->
        </div><!-- /.container -->
    </nav>


    <section class="content">
        {if $is_main != 1}
            {$content}
        {/if}
        {if $is_main == 1}
            <section class="main-slider">
                <div class="container">
                    <div class="slider owl-carousel">
                        {foreach from=$banners_list item="bann_item"}
                            {if $bann_item->file_id == 0}
                                {assign var="file_id" value=$bann_item->id}
                                <div class="slider__item">
                                    {if $get_banners.$file_id->link}<a href="{$get_banners.$file_id->link}">{/if}
                                        <img src='{$host_url}images/banners/{$bann_item->file}' class="slider__img" alt="{$get_banners.$file_id->short_desc}" />
                                    {if $get_banners.$file_id->link}</a>{/if}
                                </div>
                            {/if}
                        {/foreach}
                    </div><!-- /.slider -->
                </div><!-- /.container -->
            </section><!-- /.main-slider -->

            <section class="brands">
                <div class="container">
                    <div class="brands__slider js-brands-slider js-slider owl-carousel">
                        {foreach from=$brands item="brand"}
                            <div class="brands__item js-slider-item">
                                <a class="brands__link" href="{$url}catalog/brand/{$brand->pseudo_dir}/">
                                    <img class="brands__img" width="125px" height="63px" src="/images/icons/{$brand->icon}" alt="{$brand->name}" />
                                </a>
                            </div>
                        {/foreach}
                    </div>
                </div><!-- /.container -->
            </section><!-- /.brands -->

            <div class="container">
                {include file=$base_dir|cat:"modules/catalog/templates/podbor.tpl" hide_title=1 open_category_id=0}
            </div><!-- /.container -->

            <div class="container">
                <div class="divider"></div>
            </div>

            <div class="container">
                <section class="categories">
                    {foreach from=$tree.0 item="icategory" name="icategory"}
                        {assign var="icategory_id" value=$icategory->id}
                        {if $icategory->is_visible == 1}
                            <div class="categories__item">
                                <a href="{$url}{$icategory->category_pseudo_dir}/" class="categories__link" title="{$icategory->name|stripslashes}">
                                    <span class="categories__item-image">
                                        <img src="/images/icons/{if $icategory->icon}{$icategory->icon}{else}no-image.png{/if}" alt="{$icategory->name|stripslashes}" />
                                    </span>
                                    <span class="categories__item-text">{$icategory->name|stripslashes}</span>
                                </a>
                            </div>
                        {/if}
                    {/foreach}
                </section><!-- /.categories -->
            </div><!-- /.container -->

            <div class="container">
                <section class="main-products tabs">
                    <div class="main-products__tabs">
                        <div class="products-tabs tabs__items">
                            <a href="#main-products-tab-discounts" class="products-tabs__link js-tab-link _active">Скидки</a>
                            <a href="#main-products-tab-promo" class="products-tabs__link js-tab-link">Акции</a>
                            <a href="#main-products-tab-new" class="products-tabs__link js-tab-link">Новинки</a>
                            <a href="#main-products-tab-sale" class="products-tabs__link js-tab-link">Распродажи</a>
                        </div>
                    </div>
                    <div class="main-products__content">
                        <div class="tabs__content _active" id="main-products-tab-discounts">
                            <div class="products-slider js-slider owl-carousel">
                                {foreach from=$mainProducts[1]['products'] item="iproduct" name="iproduct" key="key"}
                                    {include file=$base_dir|cat:"modules/catalog/templates/getProductItem.tpl" product=$iproduct product_images=$mainProducts[1]['images'] key=$key}
                                {/foreach}
                            </div><!-- /.products-slider -->
                        </div><!-- .tabs__content -->
                        <div class="tabs__content" id="main-products-tab-promo">
                            <div class="products-slider js-slider owl-carousel">
                                {foreach from=$mainProducts[2]['products'] item="iproduct" name="iproduct" key="key"}
                                    {include file=$base_dir|cat:"modules/catalog/templates/getProductItem.tpl" product=$iproduct product_images=$mainProducts[2]['images'] key=$key}
                                {/foreach}
                            </div><!-- /.products-slider -->
                        </div><!-- .tabs__content -->
                        <div class="tabs__content" id="main-products-tab-new">
                            <div class="products-slider js-slider owl-carousel">
                                {foreach from=$mainProducts[3]['products'] item="iproduct" name="iproduct" key="key"}
                                    {include file=$base_dir|cat:"modules/catalog/templates/getProductItem.tpl" product=$iproduct product_images=$mainProducts[3]['images'] key=$key}
                                {/foreach}
                            </div><!-- /.products-slider -->
                        </div><!-- .tabs__content -->
                        <div class="tabs__content" id="main-products-tab-sale">
                            <div class="products-slider js-slider owl-carousel">
                                {foreach from=$mainProducts[5]['products'] item="iproduct" name="iproduct" key="key"}
                                    {include file=$base_dir|cat:"modules/catalog/templates/getProductItem.tpl" product=$iproduct product_images=$mainProducts[5]['images'] key=$key}
                                {/foreach}
                            </div><!-- /.products-slider -->
                        </div><!-- .tabs__content -->
                    </div><!-- /.main-products__content -->
                    <div class="main-products__link">
                        <a href="{$url}catalog/" class="btn -bordered">В каталог</a>
                    </div>
                </section><!-- /.main-products -->
            </div>

            <div class="container">
                <section class="main-informers">
                    <div class="main-informers__item">
                        <a href="#" class="main-informers__item-cont">
                            <div class="main-informers__image">
                                <img class="main-informers__img" src="/assets/img/informer-business.jpg" alt="Бизнес клиентам - Энергия воздуха" />
                            </div>
                            <div class="main-informers__item-title">Бизнес клиентам</div>
                        </a>
                    </div>
                    <div class="main-informers__item">
                        <a href="/informacionnue-materialu/" class="main-informers__item-cont">
                            <div class="main-informers__image">
                                <img class="main-informers__img" src="/assets/img/informer-info.jpg" alt="Информационные материалы - Энергия воздуха" />
                            </div>
                            <div class="main-informers__item-title">Информационные материалы</div>
                        </a>
                    </div>
                </section><!-- /.main-informers -->
            </div>

            <div class="container">
                <section class="main-articles">
                    {if $last_news.0}
                        <div class="main-articles__item main-article">
                            <div class="main-article__head">
                                <a href="/novosti" class="main-article__type">Новости</a>
                            </div>
                            <article class="main-article__cont article">
                                <a href="{$url}news/look/{$last_news.0->id}/" class="article__image"><img src="{$news_image_url}{setFile->setFile file=$last_news.0->icon}" alt="" /></a>
                                <!--
                                <a href="{$url}news/look/{$last_news.0->id}/" class="article__category"><span class="sprite -news-category article__category-icon"></span> Природа</a>
                                -->
                                <div class="article__title-line">
                                    <span class="article__date">{$last_news.0->date|date_format:"%d.%m.%Y"}</span>
                                    <a href="{$url}news/look/{$last_news.0->id}/" class="article__title">{$last_news.0->name}</a>
                                </div>
                                <div class="article__description">{$last_news.0->text|strip_tags|trim|truncate:75:" ...":true:false|stripslashes}</div>
                            </article>
                            <div class="mail-article__link">
                                <a href="/novosti" class="btn -bordered">Все новости</a>
                            </div>
                        </div><!-- /.main-articles__item -->
                    {/if}

                    {if $last_articles.0}
                        <div class="main-articles__item main-article">
                            <div class="main-article__head">
                                <a href="/stati" class="main-article__type">Статьи</a>
                            </div>
                            <article class="main-article__cont article">
                                <a href="{$url}news/look/{$last_articles.0->id}/" class="article__image"><img src="{$news_image_url}{setFile->setFile file=$last_articles.0->icon}" alt="" /></a>
                                <!--
                                <a href="{$url}news/look/{$last_articles.0->id}/" class="article__category"><span class="sprite -news-category article__category-icon"></span> Природа</a>
                                -->
                                <div class="article__title-line">
                                    <span class="article__date">{$last_articles.0->date|date_format:"%d.%m.%Y"}</span>
                                    <a href="{$url}news/look/{$last_articles.0->id}/" class="article__title">{$last_articles.0->name}</a>
                                </div>
                                <div class="article__description">{$last_articles.0->text|strip_tags|trim|truncate:75:" ...":true:false|stripslashes}</div>
                            </article>
                            <div class="mail-article__link">
                                <a href="/stati" class="btn -bordered">Все статьи</a>
                            </div>
                        </div><!-- /.main-articles__item -->
                    {/if}

                    {if $main_journal.0}
                        <div class="main-articles__item main-article">
                            <div class="main-article__head">
                                <a href="/journal" class="main-article__type">Интернет журнал</a>
                            </div>
                            <article class="main-article__cont article">
                                <a href="{$url}journal/look/{$main_journal.0->id}/" class="article__image"><img src="/images/news/{$main_journal.0->image}" alt="" /></a>
                                <!--
                                <a href="{$url}journal/look/{$main_journal.0->id}/" class="article__category"><span class="sprite -news-category article__category-icon"></span> Природа</a>
                                -->
                                <div class="article__title-line">
                                    <span class="article__date">{$main_journal.0->published_at|date_format:"%d.%m.%Y"}</span>
                                    <a href="{$url}journal/look/{$main_journal.0->id}/" class="article__title">{$main_journal.0->title}</a>
                                </div>
                                <div class="article__description">{$main_journal.0->description|stripslashes}</div>
                            </article>
                            <div class="mail-article__link">
                                <a href="/journal" class="btn -bordered">В Интернет-журнал</a>
                            </div>
                        </div><!-- /.main-articles__item -->
                    {/if}
                </section><!-- /.main-articles -->
            </div>
        {/if}

        <div class="container">
            <form action="" method="post" class="consult">
                <div class="consult__photo">
                    <img class="consult__img" src="/assets/img/consult-photo.png" alt="" />
                </div>
                <div class="consult__phone">
                    <input type="text" placeholder="Ваш телефон" class="form-control" />
                </div>
                <div class="consult__button">
                    <button type="submit" class="btn -dark">Заказать консультацию</button>
                </div>
            </form><!-- /.consult -->
        </div>


        {if $is_main == 1 && $content}
            <div class="container">
                <section class="seo-text">
                    <div class="seo-text__cutter"></div>
                    <a href="#" class="seo-text__read-more js-seo-read-more">Читать дальше →</a>
                    <p>{$content}</p>
                </section><!-- /.main-text -->
            </div><!-- /.container -->
        {/if}
    </section><!-- /.content -->