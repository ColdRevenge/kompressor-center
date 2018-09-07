{* Подгрузка списка категорий, например для раздела страницы, или др. разделов *}
{if $tree[$id][0] != ""}
    {foreach from=$tree[$id] key="key" item="subtree"}
        {if $subtree->id}
            {assign var="_id" value=$tree[$id][$key]->id}
            {assign var="_parent_id" value=$tree[$id][$key]->parent_id}
            <tbody class="level_{$level} parent_product_{$tree[$id][$key]->parent_id}" {if $smarty.session.admin_category_minimize.$_parent_id == 1} style="display: none"{/if}>
                <tr>
                    <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href = '{$admin_url}products/list/{$type}/{$subtree->id}'">
                        <div style="margin-left:{$level*$offset}px;"><a href="{$admin_url}products/list/{$type}/{$subtree->id}/" style="{if $category_id == $subtree->id}font-weight:bold;{/if}{if $subtree->is_visible == 0}color:gray;{/if}">{$subtree->name|stripslashes}</a> ({$subtree->count})</div>
                    </td>
                    <td class="minumizeMenu">
                        {if $tree[$_id][0]|@count}
                            <img src="{$sys_images_url}admin/menu_arrow_{if $smarty.session.admin_category_minimize.$_id != '1'}m{else}l{/if}.png" alt="" title="Свернуть/Развернуть"  class="parent_product_{$tree[$id][$key]->id}" rel="{$tree[$id][$key]->id}"  />
                        {/if}
                    </td>
            </tbody>
        {/if}
        {include file="product_tree_list.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 offset=$offset}
    {/foreach}
{/if}