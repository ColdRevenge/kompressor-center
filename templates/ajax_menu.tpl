<div id="top_menu">
    {foreach from=$category.0 item="item_category"}{if $item_category->is_visible == 1}
    <a href="javascript:void(0)" onclick="AjaxQuery('load_menu', '{$url}child_category/{$item_category->pseudo_dir}/')" {if $selected_root_category_id == $item_category->id} class="selected"{/if}>{$item_category->name}</a>{/if}
    {/foreach}
</div>
<div id="child_menu">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="table_menu">
        <tr>
            {foreach from=$category.$selected_root_category_id item="item_category"}
            {if $item_category->is_visible == 1}
            <td valign="top" align="center">
                <a href="{if $item_category->link}{$item_category->link}{else}{if $item_category->is_child > 0}javascript:void(0){else}{$base_url}page/{$item_category->pseudo_dir}/{/if}{/if}" class="td_menu" {if $item_category->is_child > 0}onclick="show_menu('child_category_{$item_category->id}','{$url}show_menu/{$item_category->id}/')"{/if}>{if $item_category->is_child > 0}<b>{/if}{$item_category->name}{if $item_category->is_child > 0}</b>{/if}</a>
                {if $item_category->is_child > 0}<div id="child_category_{$item_category->id}" class="show_menu">&nbsp;</div>{/if}
            </td>{/if}
            {/foreach}
        </tr>
    </table>
</div>