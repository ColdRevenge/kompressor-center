{*if $news.0->type == 1}<div style="text-align: right;float: right;width: 300px;;">
<div style="position: absolute; margin-top: -50px;z-index: 0;">
{if !$smarty.post.new_mail}
<form method="post" action="">
<input type="text" name="new_mail" value="" style="width: 150px;margin-right: 5px;" maxlength="11"/><input type="image" src="/images/fronted/sendmail.png" />
</form>
{else}
<h2>Вы успешно подписаны!</h2>
{/if}
</div>
</div>{/if*}
{* Новости на главную старницу *}

{if $param_tpl.is_strip != 1}
    {if $is_mobile == 1}
        <div id="breadcrumbs-block">
            <div id="bread-back"><a href="{$full_adress|default:"/"}">Назад</a></div>
            <h1>Новости и статьи</h1>
            <div class="clear">&nbsp;</div>
        </div>
    {else}
        <div class="breadcrumbs-block">
            <ul>
                <li><a href="/">Главная</a><span>/</span></li>
                <li><span>Новости</span></li>
            </ul>
        </div>
        {if $param_tpl.type == 3}
            <h1>Модный журнал</h1>
        {else}
            <h1>Новости</h1>
        {/if}
    {/if}
    <div class="text">
        <p></p>
    {/if}
    <div class="page-news" style="padding-left: 10px;">
        {foreach from=$news item="item_news" key="key" name="news"}
            {assign var="month" value=$item_news->date|date_format:"%m"}
            {assign var="month_int" value=$month*1-1}
            {assign var="month_int_0" value=$month*1}
            {if $item_news->icon && $is_mobile != 1}<div style="float: left;margin-right: 10px; min-width: 125px;text-align: center"><a href="{$url}news/look/{$item_news->id}/" title=""><img src="{$news_image_url}{setFile->setFile file=$item_news->icon}" alt="" style="margin-top: 7px;"  /></a></div>{/if}

            <div class="news-text">

                <div class="font-data">{$item_news->date|date_format:"%d"} {$months.$month_int} {$item_news->date|date_format:"%Y"}</div>
                <div><a href="{$url}news/look/{$item_news->id}/" class="h3">{$item_news->name|stripslashes}</a></div>

                {$item_news->text|strip_tags|trim|truncate:103:"..":true:false|stripslashes|replace:"&nbsp;":" "} 
                <a href="{$url}news/look/{$item_news->id}/">Читать полностью</a></div>
            <div class="clear">&nbsp;</div>
        {if $smarty.foreach.news.iteration != $smarty.foreach.news.total}<div class="border-desc"></div>{else}{/if}
    {/foreach}
</div><br/>
{if $news.0->type != 5}
    <div style="text-align: right;margin-top: 8px;vertical-align: middle; margin-right: 20px;font-size: 21px; ">
        {*}Вывод страниц current_page{*}
        {if $start > 1}
            <a href="{$url}news/all/{$start-1}/{$param_tpl.type}/"><span style="font-size: 17px;vertical-align: middle;">«</span></a> <a href="{$url}1/">1</a> ...

            {* Промежуточные страницы *}
            {assign var="_last_page" value=$start} {* Самая первая страница *}
            {assign var="_steep" value=$start*30/100|floor} {* Шаг *}
            {* Промежуточные страницы *}
            {if $count_all_pages >= 20}
                {section start = 1 loop = $start step=$_steep name='test'}
                    {if $smarty.section.test.index <= $start-5 && $smarty.section.test.index >= 5}
                        <a href="{$url}news/all/{$smarty.section.test.index}/{$param_tpl.type}/">{$smarty.section.test.index}</a> ...
                    {/if}
                {/section}
            {/if}
            {* Промежуточные страницы *}

        {/if}
        {section start=$start loop=$end name="num_page"}
            {if $smarty.section.num_page.index == $current_page}
                <a href="{$url}news/all/{$smarty.section.num_page.index}/{$param_tpl.type}/" style="color:gray;font-size: 21px;">{$smarty.section.num_page.index}</a>
            {else}
                <a href="{$url}news/all/{$smarty.section.num_page.index}/{$param_tpl.type}/" style="font-size: 21px;">{$smarty.section.num_page.index}</a>
            {/if}
        {/section}

        {if $end && $end <= $count_all_pages-1}
            {* Промежуточные страницы *}
            {assign var="_end_page" value=$end-1} {* Последняя страница *}
            {assign var="_last_page" value=$count_all_pages-1} {* Самая последняя страница *}
            {assign var="_count_hide_page" value=$_last_page-$_end_page} {* Кол-во скрытых страниц *}
            {assign var="_steep" value=$_count_hide_page*30/100|floor} {* Шаг *}
            {* Промежуточные страницы *}
            {if $count_all_pages >= 20}
                {section start = $_end_page+$_steep loop = $_last_page step=$_steep name='test'}
                    {if $smarty.section.test.index <= $_last_page-5 && $smarty.section.test.index >= $_end_page+5}
                        ... <a href="{$url}news/all/{$smarty.section.test.index}/{$param_tpl.type}/">{$smarty.section.test.index}</a>
                    {/if}
                {/section}
            {/if}
            {* Промежуточные страницы *}
            ... <a href="{$url}news/all/{$count_all_pages-1}/{$param_tpl.type}/">{$count_all_pages-1}</a> <a href="{$url}{$end}/">
                <span style="font-weight: bold; font-size: 14px;vertical-align: middle;">»</span></a>
            {/if}
    </div>
{/if}

{if $param_tpl.is_strip != 1}
</div>
{/if}