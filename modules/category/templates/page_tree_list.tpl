{* Подгрузка списка категорий, например для раздела страницы, или др. разделов *}
{if $tree[$id][0] != ""}
{foreach from=$tree[$id] key="key" item="subtree"}
{if $subtree->id}
<tbody class="{if $category_id == $subtree->id}tbody_hover {/if}tbody" >
    <tr>
        <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href='{$admin_url}page/list/0/{$subtree->id}/'">
            <div style="margin-left:{$level*$offset}px;"><a href="{$admin_url}page/list/0/{$subtree->id}/" style="{if $category_id == $subtree->id}font-weight:bold;{/if}{if $subtree->is_visible == 0}color:gray;{/if}">{$subtree->name|stripslashes}</a> ({$subtree->count})</div>
        </td>
      
</tbody>
{/if}
{include file="page_tree_list.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 offset=$offset}
{/foreach}
{/if}