{if $tree[$id][0] != ""}
{foreach from=$tree[$id] key="key" item="subtree"}{assign var="level_indent" value=$level*4}
    <option value="{$subtree->id}" {if $subtree->id == $selected_id}selected{/if}{if $is_disabled == 1 && $level==0} disabled="disabled"{/if}>{""|indent:$level_indent:"&nbsp;"}{$tree[$id][$key]->name}</option>
{include file="$inc" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 selected_id=$selected_id}
{/foreach}
{/if}