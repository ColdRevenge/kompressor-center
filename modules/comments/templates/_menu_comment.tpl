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
</div> 