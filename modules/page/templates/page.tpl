{if $page->category_id != 0 && $param_tpl.not_header != 1 && $param_tpl.only_text != 1}
    {if $is_main != 1}  
        {if $smarty.get.is_modal != 1}
            <div class="breadcrumbs">
                <div class="container">
                    <ul class="breadcrumbs__cont">
                        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="{$url}">Главная</a></li>
                        {assign var="adress" value=''}
                        {foreach from=$bread_page_arr item="bread" name="bread"}
                            {assign var="adress" value=$adress|cat:$bread->pseudo_dir|cat:'/'}
                            {if $smarty.foreach.bread.total == $smarty.foreach.bread.iteration}
                                <li class="breadcrumbs__item">{$bread->bread_name|default:$bread->header} </li>
                            {else}
                                <li><a class="breadcrumbs__link" href="{$url}{$adress}">{$bread->bread_name|default:$bread->header}</a><span>/</span></li>
                            {/if}
                        {/foreach}
                    </ul>
                </div>
            </div>
        {/if}
    {/if}
{/if}
{if $param_tpl.only_text == 1}
    <div class="{if $is_main != 1}container{/if}">
        <h1 class="headline">{$page->header|strtolower|stripslashes}</h1>
        {$page->text|stripslashes|replace:$url:$host_url}
        {$text}
    </div>
{else}
    <div class="{if $is_main != 1}container{/if}">
        {if $is_main != 1}
            <h1 class="headline">{$page->header|strtolower|stripslashes}</h1>
        {/if}

        <div class="text"{if $is_main == 1} style="min-height: 0;"{elseif $open_category_id == 1040 || $open_category_id == 1038 || $open_category_id == 972 || $open_category_id == 971 || $open_category_id == 762 || $open_category_id == 939 || $open_category_id == 880 || $open_category_id == 907 || $open_category_id == 909}  style="padding-right:0;" {elseif $smarty.get.is_modal == 1} style="min-height: 0;background-color: transparent"{/if}>

            {$page->text|stripslashes|replace:$url:$host_url}
            {$text}
        {/if}
    </div>
</div>
