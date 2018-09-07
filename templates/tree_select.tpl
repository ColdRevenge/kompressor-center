{if $tree[$id][0] != ""}
{foreach from=$tree[$id] key="key" item="subtree"}
<!--Раздел нельзя поместить в него самого-->
{if $current_id != $subtree->id} {assign var="level_indent" value=$level*4}
<option value="{$subtree->id}" {if $subtree->id == $selected_id}selected{/if}>{""|indent:$level_indent:"&nbsp;"}{$tree[$id][$key]->name|stripslashes}</option>
{include file="$inc" current_id=$current_id id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 selected_id=$selected_id}
{/if}{/foreach}
{/if}