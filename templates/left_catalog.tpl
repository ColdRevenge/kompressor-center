<div class="product-menu-list">
    <i class="white-bg"></i>
    {* Используется только в ламинате *}
    <!-- {category_obj->getFullAdressCategoryIdRoutes category_id=28} - генерация адреса //-->
    <ul>
        {foreach from=$menu_catalog_list[28] key="key" item="subtree"}
            {assign var="parent_id" value=$subtree->id}
            {if $subtree->is_visible == 1}
                <li{if $parents_category_arr.$tmp_var_id} class="active"{/if}>
                    {* Использовать если требуется динамическое открытие контента   <a {if $tree[$parent_id]|@count == 0}href="{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}"{else} href="javascript:void(0)" onclick="Show('parent_{$parent_id}')"{/if}>{$subtree->name}</a>*}
{if $open_category_id == $parent_id}<span onclick="location.href = '{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}'">{$subtree->name|stripslashes}</span>{else}<a  href="{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree->id}{/if}">{$subtree->name|stripslashes}</a>{/if}
    {assign var="catalog_id" value=$menu_catalog_list[28][$key]->id}

{if $menu_catalog_list[$catalog_id]|@count}

    <div class="drop-box">

        {foreach from=$menu_catalog_list[$catalog_id] key="key_2" item="catalog_child"}
            {assign var="child_catalog_id" value=$menu_catalog_list[$catalog_id][$key_2]->id}
            {if $catalog_child->is_visible == 1}
                <div class="inner-list">
                    <span class="small-gray-title">{$catalog_child->name|stripslashes|strip_tags}</span>
                    <ul class="clearfix">
                        {foreach from=$menu_catalog_list[$child_catalog_id] item="subtree_child"}
                            {if $subtree_child->is_visible == 1}
                                <li>{if $open_category_id == $subtree_child->id}<span onclick="location.href = '{if $subtree_child->link}{$subtree_child->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree_child->id}{/if}'">{$subtree_child->name|stripslashes}</span>{else}<a  href="{if $subtree_child->link}{$subtree_child->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$subtree_child->id}{/if}">{$subtree_child->name|stripslashes}</a>{/if}</li>
                                    {/if}
                                {/foreach}
                    </ul>
                </div>
            {/if}
        {/foreach}
    </div>
{/if}
</li>
{/if}
{/foreach}
</ul>
</div>

<div class="info-menu-list">
    <h3>Полезная информация</h3>
    <ul>
        {foreach from=$articles_block item="articles"}
            {if $open_news_id == $articles->id}
                <li>{$articles->name|stripslashes}</li>
            {else}
                <li><a href="{$url}news/look/{$articles->id}/">{$articles->name|stripslashes}</a></li>
                {/if}
            {/foreach}
    </ul>
</div>