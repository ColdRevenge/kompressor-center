
<div class="block">

    {include file=$template_message message=$message error=$error}
    <h1>Черный список</h1>

    <div class="small-navigation">
        <div>
            <img src="{$sys_images_url}admin/add.png" /><a href="{$admin_url}order/black-list/list/?is_add=1" title="Добавить в черный список" >Добавить  в черный список</a>
        </div>
    </div>

    {if $smarty.get.edit_id || $smarty.get.is_add == '1'}
        <form method="post" action="">
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">ФИО: </td>
                        <td valign="middle" align="left">
                            <input type="text" value="{$get_black_list->fio|stripslashes|strip_tags}"  name="fio" style="width: 340px;" />
                        </td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">Телефон: </td>
                        <td valign="middle" align="left"><input type="text"  value="{$get_black_list->phone|stripslashes|strip_tags}" name="phone" style="width: 340px;" /></td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">E-Mail: </td>
                        <td valign="middle" align="left"><input type="text"  value="{$get_black_list->email|stripslashes|strip_tags}" name="email" style="width: 340px;" /></td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">Комментарий: </td>
                        <td valign="middle" align="left"><textarea name="comment" style="width: 600px;height: 150px;">{$get_black_list->comment|stripslashes|strip_tags}</textarea></td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <button>{if  $smarty.get.is_add == '1'}Добавить{else}Сохранить{/if}</button>
                        </td>
                    </tr>
                </tbody>
            </table><br/>
            <div class="notice">
                <span class="asterix">*</span> Покупатели блокируются по телефону/e-mail. Если поступит заказ от заблокированного клиента, менеджер увидит это, и сможет 
                принять решение о продаже товара
            </div>
        </form><br/><br/>
    {/if}
    <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%">
        <thead>
            <tr>
                <td valign="middle" align="center">ФИО</td>
                <td valign="middle" align="center">Телефон</td>
                <td valign="middle" align="center">E-mail</td>
                <td valign="middle" align="center">Комментарий</td>
                <td valign="middle" align="center" width="47">&nbsp;</td>
            </tr>
        </thead>
        {foreach from=$black_list item="black"}
            <tbody>
                <tr> 
                    <td valign="middle" align="center">{$black->fio|stripslashes}</td>
                    <td valign="middle" align="center">{$black->phone|stripslashes}</td>
                    <td valign="middle" align="center">{$black->email|stripslashes}</td>
                    <td valign="middle" align="center">{$black->comment|stripslashes|nl2br}</td>
                    <td valign="middle" align="center" width="47">
                        <a href="{$admin_url}order/black-list/list/?edit_id={$black->id}"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                        <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить покупателя из черного списка??', '{$admin_url}order/black-list/list/?del_id={$black->id}');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" alt="Удалить" /></a>
                    </td>
                </tr>
            </tbody>
        {/foreach}
    </table>
</div>
