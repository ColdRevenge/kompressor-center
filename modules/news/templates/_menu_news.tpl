<ul>
    <li{if $is_menu_add != 1} class="active"{/if}>{if $is_menu_add != 1}<span class="selected">Список новостей</span>{else}<a href="{$admin_url}news/list/{$type}/">Список новостей</a>{/if}</li>
    <li{if $is_menu_add == 1} class="active"{/if}>{if $is_menu_add == 1}<span class="selected">Добавить новость</span>{else}<a href="{$admin_url}news/add/{$type}/{$smarty.now}/">Добавить новость</a>{/if}</li>
</ul>

{if $tmp_news_id}
    <br/>
    <h2>Товар в {if $type==2}обзор{else}новость{/if} </h2>
    <div id="news_for_products">
        {include file="news_product_menu.tpl"}
    </div>
    <br/>
    <p><a href="{$admin_url}news/product/{$tmp_news_id}/?is_modal=1" rel="fancy">Добавить {if $type==2}обзор{else}новость{/if} в товар</a></p>
{/if}