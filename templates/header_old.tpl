{*
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
    <link media="all" type="text/css" rel="stylesheet" href="/assets/css/styles.css" />
</head>
<body>
<div class="bg-menu-left"><a class="iml-1" href="{$url}catalog/full_podbor/">Подобрать оборудование</a></div>
            <div class="bg-menu-left"><a class="iml-2" href="{$url}akcii/">Акции</a></div>
            <div class="bg-menu-left"><a class="iml-3" href="{$url}dostavka/">Доставка</a></div>
            <div class="bg-menu-left"><a class="iml-4" href="{$url}oplata/">Оплата</a></div>
            <div class="bg-menu-left"><a class="iml-5" href="/call_back/send/?is_modal=1" rel="call_back">Обратная связь</a></div>
    <div class="supertop">
        <div class="container supertop__container">
            <div class="supertop__menu supertop-menu">
                <ul class="supertop-menu__ul">
                    <li class="supertop-menu__li"><a href="/" class="supertop-menu__link">Главная</a></li>
                    <li class="supertop-menu__li"><a href="#" class="supertop-menu__link">О компании</a></li>
                    <li class="supertop-menu__li"><a href="#" class="supertop-menu__link">Бизнес-Клиентам</a></li>
                    <li class="supertop-menu__li"><a href="#" class="supertop-menu__link">Оплата</a></li>
                    <li class="supertop-menu__li"><a href="#" class="supertop-menu__link">Доставка</a></li>
                    <li class="supertop-menu__li"><a href="#" class="supertop-menu__link">Сервис</a></li>
                </ul>
            </div>
            <div class="supertop__city">
                <a href="#" class="supertop__city-link js-select-city">Выберите город</a>
            </div>
            <div class="supertop__buttons supertop-buttons">
                <a href="#" class="supertop-buttons__link"><span class="sprite -user"></span></a>
                <a href="#" class="supertop-buttons__link"><span class="sprite -fav"></span></a>
                <a href="#" class="supertop-buttons__link"><span class="sprite -cart"></span></a>
            </div>
        </div>
    </div>


    <!-- scripts -->

    <script src="/assets/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="/assets/vendor/owl/owl.carousel.min.js"></script>
    <link href="/assets/vendor/owl/assets/owl.carousel.min.css" rel="stylesheet" />
    <script src="/assets/vendor/scrollbar/jquery.scrollbar.min.js"></script>
    <link href="/assets/vendor/scrollbar/jquery.scrollbar.css" rel="stylesheet" />
    <script src="/assets/js/scripts.js"></script>
</body>
</html>
*}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "{$host}www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="{$host}www.w3.org/1999/xhtml">
    <head>
        {include file="head.tpl"}
        {*{literal}
        <!-- Put this script tag to the <head> of your page -->
        <script type="text/javascript" src="http://userapi.com/js/api/openapi.js?52"></script>

        <script type="text/javascript">
        VK.init({apiId: 3066792, onlyWidgets: true});
        </script>
        {/literal}*}
    </head> 
    <body>
        <div id="right-shadow">
            <div id="wrapper">

                <div id="left-wrap">
                    <div class="choose-city-select">
                        <a href="#">Выберите город</a>
                    </div>

                    <div style="width: 215px;">&nbsp;</div>
                    {*                    {$menu_catalog}*}
                    <ul>
                {foreach from=$menu_top.0 item="menu" name="menu"}{if $menu->is_visible == 1}<li><span{if $smarty.foreach.menu.iteration ==  $smarty.foreach.menu.total} style="background: none;"{/if}{if $open_category_id == $menu->id || $menu->id == 769 && $open_category_id == 0 || ($smarty.server.REQUEST_URI == $menu->link|replace:$url:"/")}  class="selected_menu"{/if}><a href="{if $menu->link}{$menu->link}{else}{$url}{page_obj->getFullAdressPageIdRoutes page_id=$menu->page_id}{/if}" >{$menu->name|stripslashes}</a></span></li>{/if}{/foreach}
            </ul>


            <div class="bg-menu-left"><a class="iml-1" href="{$url}catalog/full_podbor/">Подобрать оборудование</a></div>
            <div class="bg-menu-left"><a class="iml-2" href="{$url}akcii/">Акции</a></div>
            <div class="bg-menu-left"><a class="iml-3" href="{$url}dostavka/">Доставка</a></div>
            <div class="bg-menu-left"><a class="iml-4" href="{$url}oplata/">Оплата</a></div>
            <div class="bg-menu-left"><a class="iml-5" href="/call_back/send/?is_modal=1" rel="call_back">Обратная связь</a></div>
            {if $is_main == 1}
                <div class="limg-block">
                    <img src="/images/fronted/limg-1.png" alt="" />
                    <img src="/images/fronted/limg-2.png" alt="" />
                    <img src="/images/fronted/limg-3.png" alt="" />
                    <img src="/images/fronted/limg-4.png" alt="" />
                    <img src="/images/fronted/limg-5.png" alt="" />
                </div>
                <div class="ytube">
                    <span>Наш канал на <img src="/images/fronted/ytube.png" alt="" /></span>
                    {*<iframe width="187" height="" src="https://www.youtube.com/embed/videoseries?list=PLJUqsa8rfxTJ_ZG4R4Zki27K0G3chEzgi" frameborder="0" allowfullscreen></iframe>*}
                    <iframe width="187" height="150" src="https://www.youtube.com/embed/BJL6EW5nCYo" frameborder="0" allowfullscreen></iframe>
                    <a href="https://www.youtube.com/channel/UCK3DiDx8qNjgkEuYt1XjYOA" target="_blank">Перейти на канал</a>
                </div>
            {/if}

        </div>

        <div id="content-wrap">
            <div class="header-search">
                <form class="search-block" action="/catalog/find/">
                    <input type="text" name="find" placeholder="Поисковое слово или фраза" value="{$smarty.get.find|default:''}" />
                    <input type="image" src="/images/fronted/search-btn.png" />
                </form>
            </div>
            <div id="header">
                <div id="logo">
                    {if $is_main == 1 && $smarty.server.REQUEST_URI != '/404/'}<img src="{$fronted_images_url}logo.jpg" alt="Энергия воздуха" />{else}<a href="{$url}"><img src="{$fronted_images_url}logo.jpg" alt="Энергия воздуха" /></a>{/if}
                    <br />
                    Ждём Ваши заказы: <a href="mailto: info@kompressor-center.com">info@kompressor-center.com</a>
                </div>
                <div id="adress-block">

                    <div id="basket-block">
                        <a href="/catalog/fav" title="Избранное" class="fav">
                            {if $fav_count}
                                <span class="basket-counter">{$fav_count}</span>
                            {/if}
                            <img src="/images/fronted/fav.png" alt="Избранное" />
                            Избранное
                        </a>
        
                        <a href="{$https_url}basket/" {if $setting->hide_prices || $smarty.const.hideBasketWidget}style="display: none;"{/if} id="basket">
                            {$basket}
                        </a>
                    </div>

                    <div id="adress">
                        г. Москва
                    </div>
                    <div id="phone">
                        {$setting->phone_1|replace:")":")</span>"|replace:'+':"<span>+"|replace:'8(':"<span>8("|replace:'8 (':"<span>8 ("}
                    </div>
                </div>
                <div class="clear">&nbsp;</div>
            </div>
            
            {if $banners_list|@count > 0}
                {if $banners_list|@count <= 2}
                    {foreach from=$banners_list item="bann_item"}
                        {if $bann_item->file_id == 0}
                            {assign var="file_id" value=$bann_item->id}
                            {if $get_banners.$file_id->link}<a href="{$get_banners.$file_id->link}">{/if}<img src='{$host_url}images/banners/{$bann_item->file}' width="773" height="288" alt="{$get_banners.$file_id->short_desc}" />{if $get_banners.$file_id->link}</a>{/if}

                        {/if}
                    {/foreach}
                {else}
                    <div id="slider">
                        <div class="slider">
                            <ul>
                                {foreach from=$banners_list item="bann_item"}
                                    {if $bann_item->file_id == 0}
                                        {assign var="file_id" value=$bann_item->id}
                                        <li>{if $get_banners.$file_id->link}<a href="{$get_banners.$file_id->link}">{/if}<img src='{$host_url}images/banners/{$bann_item->file}' width="773" height="288" alt="{$get_banners.$file_id->short_desc}" />{if $get_banners.$file_id->link}</a>{/if}</li>

                                    {/if}
                                {/foreach}
                            </ul>
                        </div>


                        <div class="navAndArrowButtonStyle">
                            <div class="arrowSliderButton">
                                <button class="prev">Пред.</button>
                                <button class="next">След.</button>
                            </div>
                            <div class="navSliderButton">
                                {foreach from=$banners_list item="bann_item" name="ban"}
                                    {if $bann_item->file_id == 0}
                                        <button class="{counter name="slide-count" assign="i"}{$i}{if $i == 1} j-active{/if}"></button>
                                    {/if}
                                {/foreach}
                            </div>
                            <div class="clear">&nbsp;</div>
                        </div>
                    </div>

                {/if}
            {/if}




            {if $is_main == 1}
                <div class="main-content-top-data">
                    <div class="main-content-text">
                        <b>Компрессор-Центр «Энергия Воздуха»</b> – это специализированная площадка на которой специалисты в области компрессорного и пневматического оборудования профессионально подойдут к решению любой задачи в области сжатого воздуха какой бы простой или сложной она не была. Компрессор-Центр предлагает только самые передовые технологии, от ведущих мировых производителей компрессорной техники и пневматического инструмента, которые зарекомендовали себя у российского потребителя.
                    </div>

                    <div class="head-h1"><a href="/rasprodaja/"><span>Специализированная сеть компрессор-центров</span></a></div>
                    <div id="main-icon">
                        <a href="/bolshoiy-oput-servisnux-rabot/"><img src="/images/fronted/icon-1.png" alt="" /><span>Большой опыт сервисных работ</span></a>
                        <a href="/garantiya-kachestva/"><img src="/images/fronted/icon-2.png" alt="" /><span>Гарантия качества</span></a>
                        <a href="/bolee-10-let-rabotu/"><img src="/images/fronted/icon-3.png" alt="" /><span>Более 10 лет работы</span></a>
                        <a href="/nalichie-sklada-oborydovaniya/"><img src="/images/fronted/icon-4.png" alt="" /><span>Наличие склада оборудования</span></a>
                        <a href="/set-po-vseiy-rossii/"><img src="/images/fronted/icon-5.png" alt="" /><span>Сеть по всей России</span></a>
                    </div>

                    <div class="main-brands">
                        <div class="main-brands_title">Производители</div>

                        <div class="main-brands_slider">
                            <ul>
                                {foreach from=$brands item="brand"}
                                    <li><a href="{$url}catalog/brand/{$brand->pseudo_dir}/"><img width="125px" height="63px" src="/images/icons/{$brand->icon}" alt="{$brand->name}" /></a></li>
                                    {/foreach}
                            </ul>
                        </div>
                        <div class="arrowSliderButton">
                            <button class="prev">Пред.</button>
                            <button class="next">След.</button>
                        </div>
                    </div>
                </div>

                <div class="main-podbor">
                    <div class="head-h1"><a href="/catalog/full_podbor/"><span>Подбор оборудования</span></a></div>
                    {include file=$base_dir|cat:"modules/catalog/templates/podbor.tpl" hide_title=1 open_category_id=0}
                    <script>
                        $('.main-podbor .sel-button').click(function() {
                            $('.main-content-bottom-data, .main-content-top-data, #slider, .main-info').hide();
                            $(window).scrollTop(200)
                        })
                    </script>
                </div>

                <div class="main-content-bottom-data">
                    <div class="head-h1"><a href="/rasprodaja/"><span>Каталог оборудования</span></a></div>
                    <div id="category-group">
                        {foreach from=$tree.0 item="icategory" name="icategory"}
                            {assign var="icategory_id" value=$icategory->id}
                            {if $icategory->is_visible == 1}
                                <a href="{$url}{$icategory->category_pseudo_dir}/" title="{$icategory->name|stripslashes}">
                                    <img src="/images/icons/{if $icategory->icon}{$icategory->icon}{else}no-image.png{/if}" alt="{$icategory->name|stripslashes}" />
                                    <span>{$icategory->name|stripslashes}</span>
                                </a>
                            {/if}
                        {/foreach}
                    </div>
                </div>
                <br/>
            {/if}

            {$content}

            {if $is_main == 1}
                <div class="main-info">

                    <div class="main-news-box">
                        <div class="main-news-box_title">Новости</div>

                        {foreach from=$last_news item="item_news" key="key" name="news"}
                            {assign var="month" value=$item_news->date|date_format:"%m"}
                            {assign var="month_int" value=$month*1-1}
                            {assign var="month_int_0" value=$month*1}
                            <div class="main-news-box_content">
                                <span>{$item_news->date|date_format:"%d"} {$months.$month_int} {$item_news->date|date_format:"%Y"}</span>
                                <a href="{$url}news/look/{$item_news->id}/">{$item_news->name}</a>
                            </div>
                        {/foreach}

                        <div class="main-news-box_bottom">
                            <a href="{$url}novosti/">Все новости</a>
                        </div>

                    </div>

                    <div class="main-news-box main-news-box-fix-width">
                        <div class="main-news-box_title">Полезная информация</div>

                        {foreach from=$last_articles item="item_news" key="key" name="news"}
                            {assign var="month" value=$item_news->date|date_format:"%m"}
                            {assign var="month_int" value=$month*1-1}
                            {assign var="month_int_0" value=$month*1}
                            <div class="main-news-box_content">
                                <img src="/images/news/{$item_news->icon}" alt="" />
                                <span>{$item_news->date|date_format:"%d"} {$months.$month_int} {$item_news->date|date_format:"%Y"}</span>
                                <a href="{$url}news/look/{$item_news->id}/">{$item_news->name}</a>
                                <div class="clear"></div>
                            </div>
                        {/foreach}

                        <div class="main-news-box_bottom">
                            <a href="{$url}stati/">Все статьи</a>
                        </div>

                    </div>

                </div>
                <div class="clear"></div>
                {if ($main_journal)}
                    <div class="main-news-box_title">Наш Интернет Журнал</div>
                    <div class="journal-list">
                        {foreach from=$main_journal item="journal"}
                            {assign var="month" value=$journal->published_at|date_format:"%m"}
                            {assign var="month_int" value=$month*1-1}
                            <div class="journal-item">
                                <a href="{$url}journal/look/{$journal->id}/" class="journal-image"><img src="/images/news/small_{$journal->image}" alt="" /></a>
                                <div class="journal-date">{$journal->published_at|date_format:"%d"} {$months.$month_int} {$journal->published_at|date_format:"%Y"}</div>
                                <a href="{$url}journal/look/{$journal->id}/" class="journal-title">{$journal->title}</a>
                            </div>
                        {/foreach}
                    </div>
                {/if}
            {/if}

        </div>
    </div>
</div>



{*        <div id="bg_ng_header">&nbsp;</div>*}

<div class="clear">&nbsp;</div>



{*        <div class="clear">&nbsp;</div>*}
{*        <div id="menu-wrap">*}
{*            <div id="menu"><button id="find-button" title="Поиск по сайту">Поиск по сайту</button><div></div></div>*}
{*        </div>*}
{*$call_back_mini*}{*
            
<div id="call_back">
{$call_back_mini}
</div>
*}