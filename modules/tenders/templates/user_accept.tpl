<h1>Для поставщиков</h1>
{if !$error}
    <h2>Тендер успешно подтвержден! В ближайшее время с Вами свяжутся менеджеры компании</h2>
{else}
    <h1 style="color: red;">{$error}</h1>
{/if}