<div class="block">
    {include file="_menu_page.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <div class="quick_actions">
            <img src="{$sys_images_url}added.png" alt="Добавить" /><a href="{$admin_url}page/add/{$type}/{$category_id}/{$smarty.now}/"  style="font-size: 17px;" {if !$category_id}onclick="alert('Выберите категорию меню, к которой будет принадлежать статья');
                    return false;"{/if}>Добавить страницу</a>
        </div>
        <h1>Список страниц{if $category_name->name} - &laquo;{$category_name->name|stripslashes}&raquo;{/if}</h1>

        {if $pages|@count}

            <form method="post" action="">

                <div class="clear">&nbsp;</div>
                <table class="table" width="100%">
                    <thead>
                        <tr>
                            <td valign="middle" align="center">Название страницы: </td>
                            <td valign="middle" align="center">Путь: </td>
                            <td valign="middle" align="center">Сорт.</td>

                            <td valign="middle" align="center">Добавленно: </td>
                            <td valign="middle" align="center" width="70">&nbsp;</td>
                        </tr>
                    </thead>

                    {foreach from = $pages item = 'page'}
                        <tbody>
                            <tr>
                                <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '{$MyURL}edit/{$type}/{$category_id}/{$page->id}/'">{$page->header|stripslashes}</td>

                                <td valign="middle" align="center"><a href="{$url}{page_obj->getFullAdressPageTemplate page_id=$page->id type=-1}" target="__blank" title="Посмотреть страницу">{$url}{page_obj->getFullAdressPageTemplate page_id=$page->id type=-1}</a></td>
                                <td valign="middle" align="center"><input type="text" name="order[{$page->id}]" value="{$page->order}" style="text-align: center;width: 40px;" maxlength="20"/></td>
                                <td valign="middle" align="center">{$page->created|date_format:"%d:%m:%Y %H:%M"}</td>
                                <td valign="middle" align="center">
                                    <a href="{$MyURL}edit/{$type}/{$category_id}/{$page->id}/"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                                    <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить страницу??')) {ldelim}
                                                location.href = '{$MyURL}list/{$type}/{$category_id}/3/{$page->id}/';{rdelim}"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" alt="Удалить раздел" /></a>
                                </td>
                            </tr>

                        </tbody>
                    {/foreach}
                    <tfoot>
                        <tr>
                            <td valign="middle" align="right" colspan="7">
                                <button>Сохранить</button>    

                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>

        {else}
            <h2>В разделе {if $category_name->name} - &laquo;{$category_name->name|stripslashes}&raquo;{/if} нет ни одной страницы. <a href="{$admin_url}page/add/{$type}/{$category_id}/{$smarty.now}/" {if !$category_id}onclick="alert('Выберите категорию меню, к которой будет принадлежать статья');
                    return false;"{/if}><b>Добавить?</b></a></h2>
            {/if}
    </div>
</div>