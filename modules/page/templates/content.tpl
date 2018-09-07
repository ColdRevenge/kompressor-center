{if $is_find == 1}
    <h1>Поиск</h1>

    {if $content|@count == 0}
        <h2>По запросу &laquo;{$smarty.post.find}&raquo; ни чего не найдено</h2>
    {/if}
{else}

{/if}
{if $childs|@count}
<ul>
{foreach from=$childs item="menu" name="menu"}{if $menu->is_visible == 1}<li{if $open_category_id == $menu->id} class="selected"{/if}>{if $open_category_id == $menu->id}<span>{$menu->name|stripslashes}</span>{else}<a href="{if $menu->link}{$menu->link}{else}{$url}{page_obj->getFullAdressPageIdChache page_id=$menu->page_id}{/if}">{$menu->name|stripslashes}</a>{/if}</li>{/if}{/foreach}
</ul>
{/if}
{*
<ul>
    {foreach from=$content item="page"}
        <li><a href="{$url}page/{$page->pseudo_dir}/" class="gray-link">{$page->header|stripslashes}</a></li>
    {/foreach}
</ul>*}
<div class="clear">&nbsp;</div>