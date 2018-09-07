<table cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td valign="top" align="left">
                <ul>
                {foreach from="$category" item="item_category"}{if $item_category->is_visible == 1}
                <li> - <a href="{if $item_category->link}{$item_category->link}{else}{$url}page/{$item_category->pseudo_dir}/{/if}">{$item_category->name}</a></li>
                {/if}{/foreach}
                </ul>
            </td>
        </tr>
    </tbody>
</table>