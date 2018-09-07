{* Подгрузка списка категорий, например для раздела страницы, или др. разделов *}
{if $tree[$id][0] != ""}
{foreach from=$tree[$id] key="key" item="subtree"}
{if $subtree->id}
<tbody class="{if $category_id == $subtree->id}tbody_hover {/if}tbody" >
    <tr>
        <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href='{$tree_url}{$subtree->id}/{if $is_modal == 1}?is_modal=1{/if}'">
            <div style="margin-left:{$level*$offset}px;"><a href="{$tree_url}{$subtree->id}/{if $is_modal == 1}?is_modal=1{/if}" style="{if $category_id == $subtree->id}font-weight:bold;{/if}{if $subtree->is_visible == 0}color:gray;{/if}">{$subtree->name|stripslashes}</a></div>
        </td>
		{if $type == 5}
			<td align="center" valign="top"><input type="text" name="order[{$subtree->id}]" style="width: 30px;text-align: center;" value="{$subtree->order}" /></td>
			<td align="center"><a href="/xadmin/category/edit/5/{$subtree->id}/?not_menu=1" rel="add_banners_menu"><img src="/images/sys/admin/edit.png" align="middle" hspace="1" alt="Редактировать"></a></td>
			<td align="center">
				<a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить раздел?','/xadmin/category/list/5/3/{$subtree->id}/?not_menu=1');">
                <img src="/images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить раздел"></a>
			</td>
		{/if}
</tbody>
{/if}
{include file="tree_list.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc tree_url=$tree_url level=$level+1 offset=$offset}
{/foreach}
{/if}