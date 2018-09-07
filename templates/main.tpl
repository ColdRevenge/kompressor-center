{if $shop == 'forum'}
    {include file="forum_main.tpl"}
{elseif $is_mobile == '1'}
    {include file="mobile.tpl"}
{elseif $is_only_content == 1}{$content}{else}{if $smarty.get.is_modal != 1}{include file="header.tpl"}
        <div id="content">
            <div id="find"{if $smarty.get.find} style="display: block;"{/if}>
                {$live_search}
            </div>
            {if $param_tpl.module != 'stat'}
                <div id="content-left">



                    {*if $is_main != 1}
                        {if $last_news|@count}<br/>
                            <div class="h1"><a href="/novosti/">Новости и статьи</a></div>
                            <div class="news-box">
                                {foreach from=$last_news item="item_news"}            
                                    <div class="news">
                                        {assign var="month" value=$item_news->date|date_format:"%m"}
                                        {assign var="month_int" value=$month*1-1}
                                        {assign var="month_int_0" value=$month*1}{setFile->setFile file=$item_news->icon assign="icon"}

                                        <div class="news-date">{$item_news->date|date_format:"%d"} {$months.$month_int} {$item_news->date|date_format:"%Y"}</div>
                                        <div class="news-name"><a href="{$url}news/look/{$item_news->id}/">{$item_news->name|stripslashes}</a></div>
                                                                    <div class="news-desc">{$item_news->desc|stripslashes}</div>
                                    </div>
                                {/foreach}
                            </div>
                        {/if}


                    {/if*}

                </div>
            {/if}


            {if $is_main == 1}
                <div class="clear">&nbsp;</div>

                {*      <div class="clear" style="padding-bottom: 20px;">&nbsp;</div>
                <div class="h1">Полезно знать</div>
                <div class="news-box">
                {foreach from=$last_articles item="item_news"}            
                <div class="news" style='vertical-align:top;'>
                {assign var="month" value=$item_news->date|date_format:"%m"}
                {assign var="month_int" value=$month*1-1}
                {assign var="month_int_0" value=$month*1}{setFile->setFile file=$item_news->icon assign="icon"}
                {if $item_news->icon}<div class="news-img"><a href="{$url}news/look/{$item_news->id}/"><img src="{$news_image_url}{$icon|default:$item_news->icon}" alt="" /></a></div>{/if}
                <div class="news-date">{$item_news->date|date_format:"%d/%m/%Y"}  </div>
                <div class="news-name"><a href="{$url}news/look/{$item_news->id}/" class="article">{$item_news->name|stripslashes}</a></div>
                </div>
                {/foreach}
                </div>*}
                {*$item_news->date|date_format:"%d"} {$months.$month_int*}


        



            {/if}



            {if $shop == 'lady' ||  $shop == 'sumka' ||  $shop == 'woman'}
                <div  id="brands_list">
                    <div class="h1">Бренды</div>
                    {*       <div class="carousel-wrap">
                    <button class="prevBrand"></button>
                    <button class="nextBrand"></button>
                    <div class="carousel-brand">	*}					
                    <ul>
                        {foreach from=$brands item="brand"}
                            <li>
                                <a href="{$url}{$catalog_dir}/brand/{$brand->pseudo_dir}/" title="{$brand->name|stripslashes}"><img src="{$icons_url}{$brand->icon}" onerror="this.src='{$icons_url}no-brand.png'" style="width: 184px;height: 92px;" alt="{$brand->name|stripslashes}" /></a>
                            </li>
                        {/foreach}
                    </ul>
                </div>
                {* </div>
                </div>*}
            {/if}



            {*                            <div class="clear"{if $is_main != 1} style="padding-top: 20px"{/if}>&nbsp;</div>*}


            {*if $is_main == 1} {$news_product}{/if*} {* Последние добавления *}

            {*$video*}


            {*$podbor*}

            {*<div id="auth">
            {$mini_auth}
            </div>*}

            {*$articles*}


            {*if $session_products|@count > 1}
            <h1>Вы смотрели</h1>
            
            <div id="is_look">
            <div id="is_look_top">
            <div id="is_look_bottom">
            
            
            {foreach from=$session_products item="s_product" name="product"}
            {if $smarty.foreach.product.iteration != 0}
            <div class="is_look">
                <div class="product_img">
                    <a href="{$url}products/{$s_product.pseudo_dir}/">
                        {if $s_product.file}
                            <img src="{$fronted_images_url}{$gallery_url}{$s_product.file}" alt="" />{else}<img src="{$fronted_images_url}/images/icons/no-image.png" alt="" />
                        {/if}
                    </a>
                </div>
                <div class="name"><a href="">{$s_product.name}</a></div>
                {if ! $setting->hide_prices}
                    <div class="price"><a href="">{$s_product.price} <img src="{$fronted_images_url}{$fronted_images_url}rub.png" alt="" /></a></div>
                    <div id="buy"><a href="{$url}basket/add/info/{$s_product.id}/"><img src="{$fronted_images_url}{$fronted_images_url}buy.png" alt="" /></a></div>
                {/if}
            </div>
            {/if}
            {/foreach}
            </div>
            </div>
            </div>
            {/if*}





            {*<h1>Лучшие предложения</h1>*}
            {*$call_back_mini*}{*$mini_auth*}

            {*$random_products_block*}

            {*$top_product*}





            {include file="footer.tpl"}
        {else}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
            <html xmlns="https://www.w3.org/1999/xhtml">
                <head>
                    {include file="head.tpl"}
                </head>
                <body style="background: none white;" id="modal">
                    {if $shop == 'lady' || $shop == 'woman'}<div id="lady">{$content}</div>
                    {else}
                        {$content}
                    {/if}
                    <link rel="stylesheet" href="{$host_url}js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
                    <script src="{$host_url}js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
                    {if $is_open_product == 1}
                        <link rel="stylesheet" type="text/css" href="{$host_url}js/zoom/cloud-zoom.css" />
                        <script type="text/javascript" src="{$host_url}js/zoom/cloud-zoom.1.0.2.min.js"></script>
                    {/if}
                    <script type="text/javascript" src="{$host_url}js/srcollTo.js"></script>
                    <script type="text/javascript" src="/lib/rinit.min.js"></script>
                    <script type='text/javascript' src='{$lib_url}top.js'></script>
                    <!--Замена PrettyPopin-->
                    <script type="text/javascript" src="{$host_url}js/fancybox/jquery.fancybox.min.js"></script>
                    <script type="text/javascript" src="{$host_url}js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
                    <link rel="stylesheet" href="{$host_url}js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
                </body>
            </html>
        {/if}
    {/if}