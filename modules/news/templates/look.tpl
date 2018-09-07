
{foreach from=$news item="item_news" key="key" name="news"}

    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs__cont">
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/">Главная</a></li>
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="/{if $news.0->type == 1}novosti{elseif $news.0->type == 3}stati{elseif $news.0->type == 4}Мнения профессионалов{/if}/">{if $news.0->type == 1}Новости{elseif $news.0->type == 3}Статьи{elseif $news.0->type == 4}Мнения профессионалов{/if}</a></li>
                <li class="breadcrumbs__item">{$item_news->name|stripslashes}</li>
            </ul>
        </div>
    </div>

    <div class="container">
        <h1>{$item_news->name|stripslashes}</h1>

        <div class="text">
       
            {assign var="month" value=$item_news->date|date_format:"%m"}
            {assign var="month_int" value=$month*1-1}
            {assign var="month_int_0" value=$month*1}
            <div class="news_look">
                <div class="text-page">
                    {if $is_mobile != 1}
                        <div class="date" style="color: gray; font-size: 13px;  font-weight: normal;margin-bottom: 7px;">{$item_news->date|date_format:"%d"} {$months.$month_int} {$item_news->date|date_format:"%Y"}</div>
                    {/if}
                    {$item_news->text}


                </div>
            </div>

        </div>
    </div>

{/foreach}
{include file=$base_dir|cat:'modules/catalog/templates/getProduct.tpl' products=$products product_images=$product_images}


<br/>
<div style="margin: 10px auto;text-align: center;">
  
    
    {if $news.0->type == 1}
        <a href="{$url}novosti/" class="font-data">Вернуться</a>
    {elseif $news.0->type == 3}
        <a href="{$url}stati/" class="font-data">Вернуться</a>
    {elseif $news.0->type == 4}
        <a href="{$url}page/mneniya-professionalov/" class="font-data">Вернуться</a>
    {/if}

</div>