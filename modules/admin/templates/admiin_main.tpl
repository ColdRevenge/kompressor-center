{*<div class="block">*}
{*    
    <h1>Выберите раздел</h1>
    {foreach from=$menu item="item" key="order"}
        {if $order != 'accesses'}
            {foreach from=$item key="key_2" item="item_2"}
                <div style="display: inline-block; margin-bottom: 20px;vertical-align: top; margin-right: 10px;">
                    <a href="{$url}{$item_2.menu_link}"><span>{$item_2.title}</span></a>
                    {if $item_2.access|@count}
                        {foreach from=$item_2.access item="access_item"}
                            {if $access_item.is_menu == 1}
                                <div  style="margin-left: 20px;"><a href="{$url}{$access_item.menu_link}">{$access_item.title}</a></div>
                            {/if}
                        {/foreach}
                    {/if}
                </div>
            {/foreach}
        {/if}
    {/foreach}
*}
{*            </div>*}
