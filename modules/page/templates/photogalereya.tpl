
<div class="breadcrumbs-block">
    <ul class="clearfix">
        <li><a href="{$url}">Главная</a><span>/</span></li>
        {if $param_tpl.category_id}<li><a href="/page/photogalereya/">Фотогалерея</a><span>/</span></li>{else}<li>Фотогалерея</li>{/if}
        {if $param_tpl.is_photos_cat_id}<a href="/page/photogalereya/{$bread_id_2}/">{$bread_name_2}</a> /{/if}
        <li>{$bread_name}</li>
    </ul>
</div>

<h1>{if $bread_name}{$bread_name}{else}Фотогалерея{/if}</h1>
<div style="text-align: center; margin-top: 10px;">
    {if $middle_menu|@count}
        {foreach from=$middle_menu item="menu" name="menu"}
            {if $menu->is_visible == 1}
                {assign var="item_id" value=$menu->id}
                <div style="display: inline-block;margin: 0 5px 15px 0;text-align: center;width: 170px;vertical-align: top;">
                    <a class="selected" href="{$url}page/photogalereya/{if $param_tpl.category_id}{$param_tpl.category_id}/{/if}{$menu->id}/">
                        {if $menu->icon}<img style="display: block;border:0;margin: auto;" src="/images/icons/{$menu->icon}" alt="" />{/if}<br/>
                    </a>
					<div style="text-align: left;font: bold 12px Arial;margin-left: 13px;">{if $menu->param_str_2}{$menu->param_str_2|date_format:"d.m.Y"}{else}{$menu->created|date_format:"%d.%m.%Y"}{/if}</div>
					<div style="font: italic 13px Arial;text-align: left;margin-left: 13px;padding: 5px 0;">{$menu->name|stripslashes}</div>
					<div style="text-align: left;margin-left: 13px;"><a href="{$url}page/photogalereya/{if $param_tpl.category_id}{$param_tpl.category_id}/{/if}{$menu->id}/">Фотографий: {$menu->count_images}</a></div>
                </div>
            {/if}
        {/foreach}
        <div class="clear">&nbsp;</div>
    {/if}
</div>

{if $gallery|@count}
    <br/>
    {foreach from=$gallery item="bann_item"}
        {if $bann_item->resize_type == 1}
            {assign var="file_id" value=$bann_item->id}
            <a style="display: block;margin: 0 16px 15px 0;float: left;" href="{$url}images/banners/{$bann_item->file|replace:"_b.":"."}" rel="prettyPhoto[gallery1]" title=""><img src="{$url}images/banners/{$bann_item->file}" alt="" /></a>
            {/if}
        {/foreach}
    <div class="clear">&nbsp;</div>
{/if}

{$page->text|stripslashes}
{$text}

{if $middle_menu_dop|@count}
    {foreach from=$middle_menu_dop item="menu" name="menu"}
        {if $menu->is_visible == 1}
            {assign var="item_id" value=$menu->id}
            {if $open_category_id == $menu->id}
                <span class="is_selected">{$menu->name|stripslashes}</span>
            {else}
                <a class="selected" href="{if $menu->link}{$menu->link}{else}{$url}{page_obj->getFullAdressPageIdChache page_id=$menu->page_id}{/if}">{$menu->name|stripslashes}</a>
            {/if}
        {/if}
    {/foreach}
</ul>
{/if}

{if $page->is_comment == 1}
    <div class="page-content">
        {if $page->category_id != 8 && $page->category_id != 0}
            {if $back_page->id}<a href="{$url}{$bread_page.0->pseudo_dir}/{$back_page->pseudo_dir}/" rel="nofollow">{if $back_page->lesson}Урок {$back_page->lesson} -&nbsp;{/if}{$back_page->header|stripslashes}</a>{/if}
            <a href="{$url}{$bread_page.0->pseudo_dir}/">Содержание</a>
            {if $next_page->id}<a href="{$url}{$bread_page.0->pseudo_dir}/{$next_page->pseudo_dir}/" rel="nofollow">{if $next_page->lesson}Урок {$next_page->lesson} -&nbsp;{/if}{$next_page->header|stripslashes}</a>{/if}
        {/if}
    </div>


</div>
{$comments}
{/if}