{* Подгрузка списка категорий, например для раздела страницы, или др. разделов *}
{if $tree[$id][0] != ""}
    {foreach from=$tree[$id] key="key" item="subtree"}
        {if $subtree->id}
            <tbody class="{if $category_id == $subtree->id}tbody_hover {/if}tbody" >
                <tr>
                    <td align="left" valign="middle" style="cursor: pointer;" title="Открыть"  onclick="AjaxRequest('product_list', '{$admin_url}related/add/product/{$type}/{$subtree->id}/{$product_id}/');$('.menu-list .tbody').find('a').css('font-weight', 'normal');$(this).find('a').css('font-weight', 'bold');
                                return false;">
                        <div style="margin-left:{$level*$offset}px;"><a href="javascript:void(0)" onclick="AjaxRequest('product_list', '{$admin_url}related/add/product/{$type}/{$subtree->id}/{$product_id}/');
                                $(this).css('font-weight', 'bold');return false;" style="{if $category_id == $subtree->id}font-weight:bold;{/if}{if $subtree->is_visible == 0}color:gray;{/if}">{$subtree->name|stripslashes}</a> ({$subtree->count})</div>
                    </td>

            </tbody>
        {/if}        
        {include file="admin_related_tree.tpl" parents_category_arr=$parents_category_arr id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 offset=$offset}

    {/foreach}
{/if}