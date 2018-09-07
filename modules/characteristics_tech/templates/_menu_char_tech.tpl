<div class="menu">
  <ul>
        <li>{if $is_menu_recovery != 1}<span class="selected">Общие настройки</span>{else}<a href="{$admin_url}setting/general/">Общие настройки</a>{/if}</li>
        <li><a href="{$admin_url}brand/list/">Производители</a></li>
        <li><a href="{$admin_url}characteristics/list/">Характеристики товара</a></li>
        {*<li><a href="{$admin_url}characteristics_tech/list/">Технические характеристики</a></li>*}
        <li>{if $is_menu_recovery == 1}<span class="selected">Резервные копии</span>{else}<a href="{$admin_url}setting/backup/">Резервные копии</a>{/if}</li>

        {*<li><a href="{$admin_url}sync/yandex_market/">Яндекс Маркет</a></li>*}
    </ul>
</div>