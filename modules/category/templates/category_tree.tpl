{if $tree[$id][0] != ""}
    {foreach from=$tree[$id] key="key" item="subtree" }
        <tbody class="check_{$subtree->parent_id}">
            <tr>
                <td>
                    <label class="p-check"><input type="checkbox" value="1" name="category_id[{$subtree->id}]" onchange="checkMenu.checkClass(this, 'check_{$subtree->id}')" /><em>&nbsp;</em></label>
                </td>
                <td align="left" valign="middle" style="cursor: pointer;" title="Редактировать" onclick="location.href ={if $type != 0  && $type != 100}'{$MyURL}list/edit/{$type}/{$tree[$id][$key]->id}/'{else}'{$MyURL}edit/{$type}/{$tree[$id][$key]->id}/'{/if}">
                    <div style="margin-left:{$level*32}px;{if $subtree->is_visible == 0}color:#999999;{/if}">{$subtree->name|stripslashes}</div>
                </td>
                <td align="center" valign="middle">
                    <div style="{if $subtree->is_visible == 0}color:#999999;{/if}"><input type="text" name="order[{$subtree->id}]" value="{$subtree->order}" style="width: 40px; text-align: center;" maxlength="4" /></div>
                </td>

                <td align="center" valign="middle">
                    <a href="{if $type == 0 || $type == 100}{$MyURL}add/{$type}/{$tree[$id][$key]->id}/{else}{$MyURL}list/add/{$type}/{$tree[$id][$key]->id}/{/if}"><img src="{$sys_images_url}admin/add.png" align="middle"  hspace="1" alt="Создать подраздел" /></a>
                    {if $type != 0}<a href="{$MyURL}list/edit/{$type}/{$tree[$id][$key]->id}/"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>{else}
                        <a href="{$MyURL}edit/{$type}/{$tree[$id][$key]->id}/"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>{/if}
                            {if $tree[$id][$key]->not_delete == "0"}
                            <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить раздел?', '{$MyURL}list/{$type}/3/{$tree[$id][$key]->id}/');">
                                <img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" alt="Удалить раздел" /></a>
                            {/if}
                    </td>
                </tr>
            </tbody>
            {include file="$inc" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1}
            {/foreach}
                {/if}