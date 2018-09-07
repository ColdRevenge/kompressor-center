{if $is_save_banner == 1}
    <script type="text/javascript">
        parent.$.fancybox.close();
    </script>
{/if}
<div class="page">
    <form method="post" action="">
        <h2>Добавить ссылку на баннер</h2>
        <div>Название: </div>
        <input type="text" value="{$smarty.post.short_desc}" name="short_desc" style="width: 300px;" maxlength="255" />
        <div>Ссылка: </div>
        <input type="text" value="{$smarty.post.link}" name="link" style="width: 300px;" maxlength="255" />
        <button style="margin-left: 220px;width: 90px">Сохранить</button>
    </form>
</div>