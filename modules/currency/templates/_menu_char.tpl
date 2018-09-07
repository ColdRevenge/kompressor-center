<div class="menu">

    <ul>
        <li><a href="{$admin_url}setting/general/">Общие настройки</a></li>
       {* <li><a href="{$admin_url}brand/list/">Производители</a></li>*}

        {*<li><span onclick="location.href='{$admin_url}characteristics/list/'"  class="selected" style="cursor: pointer;">Характеристики товара</span></li>*}
        {*<li><a href="{$admin_url}characteristics_tech/list/">Технические характиристики</a></li>*}
        <li>{if $is_menu_recovery == 1}<span class="selected">Резервные копии</span>{else}<a href="{$admin_url}setting/backup/">Резервные копии</a>{/if}</li>

        {*<li><a href="{$admin_url}sync/yandex_market/">Яндекс Маркет</a></li>*}
    </ul>
</div>