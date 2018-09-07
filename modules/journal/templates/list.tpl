<div class="block">
    <div class="menu">
        {include file="_menu_journal.tpl"}
    </div>
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <div class="quick_actions">
            <img src="{$sys_images_url}added.png" alt="Добавить" /><a href="{$admin_url}journal/add/" >Добавить </a>
        </div>
        <h1>Интернет журнал</h1>
        {if $list|@count > 0}
            <form method="POST" action="">
                <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
                    <thead>
                        <tr>
                            <td valign="top" align="center" width="150">Дата публикации:</td>
                            <td valign="top" align="center" width="150">Изображение:</td>
                            <td valign="top" align="center">Название:</td>
                            <td valign="top" align="left" width="50">&nbsp;</td>
                        </tr>
                    </thead>
                    {foreach from=$list key="key" item="item"}
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '{$MyURL}edit/{$item->id}/'">{$item->published_at}</td>
                                <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '{$MyURL}edit/{$item->id}/'"><img style="width: 100px;" src="/images/news/small_{$item->image}" alt="" /></td>
                                <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '{$MyURL}edit/{$item->id}/'">{$item->title|stripslashes}</td>
                                <td valign="middle" align="center">
                                    <a href="{$MyURL}edit/{$item->id}/" title="Редактировать"><img src="{$sys_images_url}admin/edit.png" alt="" /></a>
                                    <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить журнал??')) {ldelim}
    location.href = '{$MyURL}delete/{$item->id}/';{rdelim}"><img src="{$sys_images_url}admin/del.png" alt="Удалить новость" /></a>
                                </td>
                            </tr>
                        </tbody>
                    {/foreach}
                </table>
                <br/>
            </form>
        {else}
            <h2>Журналов нет.</h2>
        {/if}
    </div>
</div>