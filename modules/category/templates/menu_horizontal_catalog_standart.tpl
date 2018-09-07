{if $tree[$id][0] != ""}
    <ul>
{foreach from=$tree[$id] key="key" item="subtree"}
{assign var="parent_id" value=$subtree->id}
{if $subtree->is_visible == 1}
{assign var="tmp_var_id" value=$tree[$id][$key]->id}
    <li{if $open_category_id == $parent_id} class="active"{/if}>{* Использовать если требуется динамическое открытие каталога: - <a {if $tree[$parent_id]|@count == 0}href="{$url}{$catalog_dir}/{$subtree->pseudo_dir}/"{else} href="javascript:void(0)" onclick="Show('parent_{$parent_id}')"{/if} {if $open_category_id == $parent_id}class="selected_catalog"{/if}>{$subtree->name}</a>*}
{*if $open_category_id == $parent_id}<span onclick="location.href='{$url}{$catalog_dir}/{$subtree->pseudo_dir}/'">{$subtree->name|stripslashes}</span>{else*}
<a  href="{$url}{$catalog_dir}/{$subtree->pseudo_dir}/">{$subtree->name|stripslashes}</a>{*/if*}

    {if $tree[$tmp_var_id][0]}
    {include file="menu_horizontal_catalog.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 offset=$offset}
  
    {/if}
    </li>
{/if}
{/foreach}
</ul> 
{/if} 