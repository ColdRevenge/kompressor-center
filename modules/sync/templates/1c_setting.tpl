<div class="block">
    {include file="_menu_sync.tpl"}
    <div class="page">
        <h1>Синхронизация с 1C</h1>
        {include file=$template_message message=$message error=$error}
        <form method="post">
            <button name="send" value="1">Обновить цены и остатки на сайте</button>
            
        </form>
    </div>
</div>