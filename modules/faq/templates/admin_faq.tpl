<div class="block">
    <div class="quick_actions">
        <img src="{$sys_images_url}added.png" alt="Добавить" /><a href="{$admin_url}faq/add/" >Добавить</a>
    </div>
    <h1>Вопросы и ответы </h1>


    <table cellpadding="4" cellspacing="1" border="0" class="table">
        <thead>
            <tr>
                <td valign="middle" align="center" width="150">Фио: </td>
                {*<td valign="middle" align="center">Тема: </td>*}
                <td valign="middle" align="center">Вопрос: </td>
                <td valign="middle" align="center" width="150">Почта: </td>
                <td valign="middle" align="center" width="140">Добавленно: </td>
                <td valign="middle" align="center" width="80">Позиция: </td>
                <td valign="middle" align="center" width="60">&nbsp;</td>
            </tr>
        </thead>
        {foreach from = $questions item = 'question' name="question"}
            <tbody>
                <tr>
                    <td valign="middle" align="center">{$question->fio}</td>
                    <td valign="middle" align="center">{$question->subject}</td>
                    {*<td valign="top" align="left">{$question->question|substr:0:200}{if $question->question}...{/if}</td>*}
                    <td valign="middle" align="center"><a href="mailto:{$question->mail}">{$question->mail}</a></td>
                    <td valign="middle" align="center">{$question->created}</td>
                    <td valign="middle" align="center">{$question->order}</td>
                    <td valign="middle" align="center">
                        <a href="{$MyURL}edit/{$question->id}/"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                        <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить страницу??', '{$MyURL}3/{$question->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" alt="Удалить раздел" /></a>
                    </td>
                </tr>
            </tbody>
        {/foreach}
        <tfoot>
            <tr>
                <td valign="middle" align="right" colspan="7" style="height: 22px;">Всего записей: {$smarty.foreach.question.iteration}&nbsp;</td>

            </tr>
        </tfoot>
    </table>
</div>