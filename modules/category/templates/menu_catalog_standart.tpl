{* Подгрузка списка категорий, например для раздела страницы, или др. разделов *}
{if $tree[$id][0] != ""}
    {assign var="child_id" value=$tree[$id][0]->id}
    <ul id="parent_{$id}" {if $parents_category_arr.$id} class="active"{/if}>
{foreach from=$tree[$id] key="key" item="subtree"}
{assign var="parent_id" value=$subtree->id}
{if $subtree->is_visible == 1}
{assign var="tmp_var_id" value=$tree[$id][$key]->id}
    <li{if $parents_category_arr.$tmp_var_id} class="active"{/if}>
{* Использовать если требуется динамическое открытие контента   <a {if $tree[$parent_id]|@count == 0}href="{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}"{else} href="javascript:void(0)" onclick="Show('parent_{$parent_id}')"{/if}>{$subtree->name}</a>*}
    
    {if $open_category_id == $parent_id}<span onclick="location.href='{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}'">{$subtree->name|stripslashes}</span>{else}<a  href="{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}">{$subtree->name|stripslashes}</a>{/if}
    
    {if $tree[$tmp_var_id][0]}
    {include file="menu_catalog.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 offset=$offset}
  
    {/if}
    </li>
{/if}
{/foreach}
</ul>
{/if}