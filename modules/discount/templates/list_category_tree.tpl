{* Подгрузка списка категорий, например для раздела страницы, или др. разделов *}
{if $tree[$id][0] != ""}
    {foreach from=$tree[$id] key="key" item="subtree"}
        {if $subtree->is_visible == 1}
            {assign var="sub_id" value=$subtree->id}
            <div style="margin-left:{$level*$offset}px;" class="check_{$subtree->parent_id}"><label class="p-check"><input type="checkbox" value="1" {if $get_checked_arr.$sub_id == 1} checked="checked"{/if} name="category_id[{$subtree->id}]" onchange="checkMenu.checkClass(this, 'check_{$subtree->id}')" /><em>&nbsp;</em><span>{$subtree->name|stripslashes}</span></label></div>
        {/if}
        {include file="list_category_tree.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 offset=$offset}
    {/foreach}
{/if}