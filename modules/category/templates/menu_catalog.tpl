{* Подгрузка списка категорий, например для раздела страницы, или др. разделов *}
{if $tree[$id][0] != ""}
    {assign var="child_id" value=$tree[$id][0]->id}
    <ul id="parent_{$id}" {if $parents_category_arr.$id} class="active"{/if}>
        {foreach from=$tree[$id] key="key" item="subtree"}
            {if $shop == 'lady' || $shop == 'woman'}
                {if $subtree->id == 897 || $subtree->id == 1030}{assign var="category_icon" value="icon-menu-bluza"}
                {elseif $subtree->id == 894 || $subtree->id == 1027}{assign var="category_icon" value="icon-menu-bruki"}
                {elseif $subtree->id == 887}{assign var="category_icon" value="icon-menu-vodolozki"}
                {elseif $subtree->id == 893}{assign var="category_icon" value="icon-menu-jaketu"}
                {elseif $subtree->id == 892}{assign var="category_icon" value="icon-menu-jiletu"}
                {elseif $subtree->id == 890 || $subtree->id == 1023}{assign var="category_icon" value="icon-menu-kardiganu"}
                {elseif $subtree->id == 915 || $subtree->id == 1044}{assign var="category_icon" value="icon-menu-kostumi"}
                {elseif $subtree->id == 886 || $subtree->id == 1019}{assign var="category_icon" value="icon-menu-plate"}
                {elseif $subtree->id == 889}{assign var="category_icon" value="icon-menu-poncho"}
                {elseif $subtree->id == 885}{assign var="category_icon" value="icon-menu-sarafan"}
                {elseif $subtree->id == 1119}{assign var="category_icon" value="icon-menu-sport"} 
                {elseif $subtree->id == 888}{assign var="category_icon" value="icon-menu-top"}
                {elseif $subtree->id == 891 || $subtree->id == 1024}{assign var="category_icon" value="icon-menu-tuniki"}
                {elseif $subtree->id == 896}{assign var="category_icon" value="icon-menu-vverx"}
                {elseif $subtree->id == 916 || $subtree->id == 1045}{assign var="category_icon" value="icon-menu-sviter"}
                {elseif $subtree->id == 895 || $subtree->id == 1028}{assign var="category_icon" value="icon-menu-ubka"}
                {/if}
            {/if}
            {assign var="parent_id" value=$subtree->id}
            {if $subtree->is_visible == 1}
                {assign var="tmp_var_id" value=$tree[$id][$key]->id}
                <li{if $category_icon} class="{$category_icon}{if $parents_category_arr.$tmp_var_id} active{/if}"{elseif $parents_category_arr.$tmp_var_id} class="active"{/if}>
                    {* Использовать если требуется динамическое открытие контента   <a {if $tree[$parent_id]|@count == 0}href="{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}"{else} href="javascript:void(0)" onclick="Show('parent_{$parent_id}')"{/if}>{$subtree->name}</a>*}

            {if $open_category_id == $parent_id}<span onclick="location.href = '{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}'">{$subtree->name|stripslashes}</span>{else}<a  href="{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}">{$subtree->name|stripslashes}</a>{/if}
                {if $shop == 'lady' || $shop == 'woman'}
                    {include file="menu_catalog_podbor_lady.tpl"}
                {/if}
                {if $tree[$tmp_var_id][0]}
                    {include file="menu_catalog.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 offset=$offset}
                {/if}
        </li>
    {else}
        {category_obj->getFullAdressCategoryIdRoutes hide=1 category_id=$subtree->id}
    {/if}
{/foreach}
</ul>
{/if} 