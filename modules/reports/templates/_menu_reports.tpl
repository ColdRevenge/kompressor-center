<div class="menu">
    <ul>
        <li{if $is_complected == 1} class="active"{/if}>
            {if $is_complected == 1}<span class="selected" onclick="location.href = '{$admin_url}reports/completed/'" style="cursor: pointer">Выполненные заказы</span>{else}<a href="{$admin_url}reports/completed/">Выполненные заказы</a>{/if}
        </li>
        <li{if $is_brand == 1} class="active"{/if}>
            {if $is_brand == 1}<span class="selected" onclick="location.href = '{$admin_url}reports/completed/brand/'" style="cursor: pointer">Отчет по брендам</span>{else}<a href="{$admin_url}reports/completed/brand/">Отчет по брендам</a>{/if}
        </li>
        <li{if $is_category == 1} class="active"{/if}>
            {if $is_category == 1}<span class="selected" onclick="location.href = '{$admin_url}reports/completed/category/'" style="cursor: pointer">Отчет по категориям</span>{else}<a href="{$admin_url}reports/completed/category/">Отчет по категориям</a>{/if}
        </li>
        {if $shop == 'lady' || $shop == 'woman'}
            <li{if $is_chars == 1} class="active"{/if}>
                {if $is_chars == 1}<span class="selected" onclick="location.href = '{$admin_url}reports/completed/chars/{if $shop == 'lady'}51{else}118{/if}/'" style="cursor: pointer">Статистика размеров</span>{else}<a href="{$admin_url}reports/completed/chars/{if $shop == 'lady'}51{else}118{/if}/">Статистика размеров</a>{/if}
            </li>
        {/if}
        <li{if $is_top == 1} class="active"{/if}>
            {if $is_top == 1}<span class="selected" onclick="location.href = '{$admin_url}reports/products_top/3/'" style="cursor: pointer">Самые продоваемые</span>{else}<a href="{$admin_url}reports/products_top/3/">Самые продоваемые</a>{/if}
        </li>
        <li{if $is_cancel == 1} class="active"{/if}>
            {if $is_cancel == 1}<span class="selected" onclick="location.href = '{$admin_url}reports/history/2/'" style="cursor: pointer">Отмененные заказы</span>{else}<a href="{$admin_url}reports/history/2/">Отмененные заказы</a>{/if}
        </li>
    </ul>
</div>