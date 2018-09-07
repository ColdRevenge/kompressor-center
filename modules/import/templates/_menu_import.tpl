<div class="menu">
    {foreach from=$menu item="item" key="order"}{if $order != 'accesses'}
            {if $item.catalog.access|@count}
                <ul>
                    {foreach from=$item.catalog.access item="access_item"}
                        {if $access_item.is_menu == 1}
                            <li{if $smarty.server.REQUEST_URI|strpos:$access_item.menu_link !== false} class="active"{/if}>
                                {if $smarty.server.REQUEST_URI|strpos:$access_item.menu_link !== false}<span class="selected" onclick="location.href = '{$url}{$access_item.menu_link}'" style="cursor: pointer">{$access_item.title}</span>{else}<a href="{$url}{$access_item.menu_link}">{$access_item.title}</a>{/if}
                            </li>
                        {/if}
                    {/foreach}
                </ul>
    {/if}{/if}{/foreach}
<br/>
    <h1>Загрузить в:</h1>
    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
        <tbody class="{if $param_tpl.category_id == 0}tbody_hover {/if}tbody">
            <tr>
                <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href = '{$url}xadmin/import/0/'">
                    <div style="margin-left:0px;"><a href="{$url}xadmin/import/0/" {if $param_tpl.category_id == 0}style="font-weight:bold;"{/if}>Во все разделы</a></div>
                </td>
            </tr>
        </tbody>
        {$category_tree_list_0}
    </table>
</div> 