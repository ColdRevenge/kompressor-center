<div class="block">
    <div class="quick_actions">
        <img src="{$sys_images_url}added.png" alt="Добавить" /><a href="{$admin_url}opinion/add/" >Добавить</a>
    </div>
    <h1>Отзывы</h1>

{include file=$template_message message=$message error=$error}

    <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%;" >
        <tbody class="table_header">
            <tr>
                <td valign="middle" align="center" width="150">Дата: </td>
                <td valign="middle" align="center" width="150">Имя: </td>
                <td valign="middle" align="center">Должность: </td>
                <td valign="middle" align="center">Отзыв: </td>
                <td valign="middle" align="center">Состояние: </td>
                <td valign="middle" align="center" width="140">Добавленно: </td>
                <td valign="middle" align="center" width="60">&nbsp;</td>
            </tr>
        </tbody>
            {foreach from = $questions item = 'question' name="question"}
        <tbody class="tbody">
            <tr>
                <td valign="middle" align="center">{$question->date|date_format:"%d.%m.%Y %H:%M"}</td>
                <td valign="middle" align="center">{$question->name|stripslashes|nl2br}</td>
                <td valign="middle" align="left">{$question->profession|stripslashes|nl2br}</td>
                <td valign="middle" align="center">{$question->text|stripslashes|nl2br}</td>
                <td valign="middle" align="center">{if $question->is_active == 0}<a href="{$admin_url}opinion/set/{$question->id}/1/">Неактивный</a>{else}<a href="{$admin_url}opinion/set/{$question->id}/0/">Активный</a>{/if}</td>
                <td valign="middle" align="center">{$question->created|date_format:"%d.%m.%Y %H:%M"}</td>
                <td valign="middle" align="center">
                    <a href="{$MyURL}edit/{$question->id}/"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                    <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить страницу??','{$MyURL}3/{$question->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" alt="Удалить раздел" /></a>
                </td>
            </tr>
        </tbody>
            {/foreach}
        <tbody class="tbody">
            <tr>
                <td valign="middle" align="right" colspan="7" style="height: 22px;">Всего записей: <b>{$smarty.foreach.question.iteration}</b>&nbsp;</td>

            </tr>
        </tbody>
    </table>
</div>