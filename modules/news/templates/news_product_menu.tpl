{foreach from=$news_product item="news_item"}
    <div style="margin-bottom: 2px;"><a href="{$url}products/{$news_item->pseudo_dir}/" target="_blank">{$news_item->name|stripslashes}</a> 
    </div>
{/foreach}