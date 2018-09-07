<div class="block">
    {if $type<3}<div class="menu">
            {include file="_menu_news.tpl"}
        </div>
        <div class="page">{/if}
            {include file=$template_message message=$message error=$error}
            <div class="quick_actions">
                <img src="{$sys_images_url}added.png" alt="Добавить" /><a href="{$admin_url}news/add/{$type}/{$smarty.now}/" >Добавить </a>
            </div>
            <h1>{if $type==2}Объявления{elseif $type == 3}Статьи{elseif $type == 4}Мнения профессионалов{else}Новости{/if}</h1>
            {if $news|@count > 0}
                <form method="POST" action="">
                    <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
                        <thead>
                            <tr>
                                <td valign="top" align="center" width="90">Дата:</td>
                                <td valign="top" align="center">Название:</td>
                                <td valign="top" align="center">Описание:</td>
                                <td valign="top" align="center" width="140">Создано:</td>
                                <td valign="top" align="center">Сорт.:</td>
                                <td valign="top" align="left" width="50">&nbsp;</td>
                            </tr>
                        </thead>
                        {foreach from=$news key="key" item="item_news" name="news"}
                            <tbody class="tbody">
                                <tr>
                                    <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '{$MyURL}edit/{$item_news->id}/'">{$item_news->format_date}</td>
                                    <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '{$MyURL}edit/{$item_news->id}/'">{$item_news->name|stripslashes}</td>
                                    <td valign="middle" align="left" style="cursor: pointer;" title="Редактировать" onclick="location.href = '{$MyURL}edit/{$item_news->id}/'">{$item_news->text|strip_tags|truncate:100:"..":true|stripslashes}</td>
                                    <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '{$MyURL}edit/{$item_news->id}/'">{$item_news->format_created}</td>
                                    <td valign="middle" align="center"><input type="text" name="order[{$item_news->id}]" style="width: 50px;text-align: center;" value="{$item_news->order}" /></td>
                                    <td valign="middle" align="center">
                                        <a href="{$MyURL}edit/{$item_news->id}/" title="Редактировать новость"><img src="{$sys_images_url}admin/edit.png" alt="" /></a>
                                        <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить новость??')) {ldelim}
        location.href = '{$MyURL}list/{$type}/3/{$item_news->id}/';{rdelim}"><img src="{$sys_images_url}admin/del.png" alt="Удалить новость" /></a>
                                    </td>
                                </tr>
                            </tbody>
                        {/foreach}
                    </table>
                    <br/>
                    <div style="text-align: right;"><button>Сохранить</button></div>
                </form>
            {else}
                <h2>Нет {if $type==2}объявлений{elseif $type == 3}статей{elseif $type == 4}мнений профессионалов{else}новостей{/if}. <a href="{$admin_url}news/add/{$type}/{$smarty.now}/"><b>Добавить?</b></a></h2>
            {/if}
        </div>
    </div>