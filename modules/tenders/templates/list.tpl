<div class="block">
    <div class="quick_actions">
        <img src="{$sys_images_url}added.png" alt="Добавить" /><a href="javascript:void(0)" onclick="showJQuery('add_tender_form')" >Добавить</a>
    </div>
        <h2>Подписано на получаение уведомлений об открытии тендера <strong>&laquo;{$users_mail|count}&raquo;</strong> пользователя</h2>
    {include file=$template_message message=$message error=$error}
    <div id="add_tender_form"  style="display: none;width: 550px;margin: 0;">
        <form method="post"  >
            <h1>Добавить тендер</h1>
            <div class="quick_add">
                <table cellpadding="2" cellspacing="0" border="0" >
                    <tr>
                        <td valign="middle" align="right">Название тендера<span class="asterix">*</span>:</td>
                        <td valign="middle" align="left"><input type="text" name="name" value='{$smarty.post.name|stripslashes|replace:"'":'"'}' maxlength="255" style="width: 246px;"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Ответственный менеджер<span class="asterix">*</span>:</td>
                        <td valign="middle" align="left"><input type="text" name="manager" value='{$smarty.post.manager|stripslashes|replace:"'":'"'}' maxlength="255" style="width: 246px;"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Плановое время закрытия торгов<span class="asterix">*</span>:</td>
                        <td valign="middle" align="left"><input type="text" style="width:120px;"  name="close_time" value='{$smarty.post.close_time|stripslashes|replace:"'":'"'}' maxlength="255" style="width: 246px;"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" colspan="2"><input type="image" name="submit" src="{if $edit_id > 0}{$sys_images_url}save.png{else}{$sys_images_url}add.png{/if}"/></td>
                    </tr>
                </table>
            </div>
    </div>

    {if $tenders_active|@count == 0 && $tenders|@count == 0 && $tenders_closed|@count == 0}
        <h2>Нет ни одного тендера. <a href="javascript:void(0)" onclick="showJQuery('add_tender_form')" >Добавить тендер</a>?</h2>
    {/if}
    {if $tenders_active|@count}
        <h1>Список активных тендеров</h1>
        {include file="list_table_tenders.tpl" tenders=$tenders_active}
    {/if}   
    {if $tenders|@count}
        <h1>Список тендеров на подготовку</h1>
        {include file="list_table_tenders.tpl" tenders=$tenders}
    {/if}    
    {if $tenders_closed|@count}
        <h1>Список закрытых тендеров</h1>
        {include file="list_table_tenders.tpl" tenders=$tenders_closed}
    {/if}   
</div>