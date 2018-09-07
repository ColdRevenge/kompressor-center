<ul>
    <li{if $is_menu_add != 1} class="active"{/if}>{if $is_menu_add != 1}<span class="selected">Список журналов</span>{else}<a href="{$admin_url}journal/list/">Список журналов</a>{/if}</li>
    <li{if $is_menu_add == 1} class="active"{/if}>{if $is_menu_add == 1}<span class="selected">Добавить журнал</span>{else}<a href="{$admin_url}journal/add/">Добавить журнал</a>{/if}</li>
</ul>