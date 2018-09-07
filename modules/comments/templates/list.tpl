<div class="block">

    {include file="_menu_comment.tpl"}
    <div class="page">
        <div class="comment">
            {include file=$template_message message=$message error=$error}
            <h1>Модерирование комментариев</h1>
            <form method="post" action="">
                <div class="stat_date">с {$start_date_form} до {$end_date_form} <button name="send">Сформировать</button> </div>
            </form><br/>
            <div class="clear">&nbsp;</div>
            <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Товар: </td>
                        <td valign="middle" align="center">Имя: </td>
                        <td valign="middle" align="center">Комментарий</td>

                        <td valign="middle" align="center">Добавленно: </td>
                        <td valign="middle" align="center">* </td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </thead>

                {foreach from = $comments item = 'comment'}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="center"><a target="__blank" href="{$url}products/{$comment->pseudo_dir}/">{$comment->product_name|stripslashes}</a></td>
                            <td valign="middle" align="center" style="cursor: pointer" onclick="location.href = '{$MyURL}look/{$comment->id}/'"><b>{$comment->name|stripslashes}</b></td>
                            <td valign="middle" align="left" style="cursor: pointer" onclick="location.href = '{$MyURL}look/{$comment->id}/'">{$comment->comment|stripslashes|nl2br|truncate:200}</td>
                            <td valign="middle" align="center" style="cursor: pointer" onclick="location.href = '{$MyURL}look/{$comment->id}/'">{$comment->created|date_format:"%d:%m:%Y %H:%M"}</td>
                            <td valign="middle" align="center" style="cursor: pointer" onclick="location.href = '{$MyURL}look/{$comment->id}/'">
                                {if $comment->is_active == 0}<a href="{$MyURL}look/is_active/{$comment->id}/1/">Неактивный</a>{else}<a href="{$MyURL}look/is_active/{$comment->id}/0/">Активный</a>{/if}
                            </td>
                            <td valign="middle" align="center">
                                <a href="{$MyURL}look/{$comment->id}/"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                                <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить коммент??')) {ldelim}
        location.href = '{$MyURL}list/{$comment->id}/';{rdelim}"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" alt="Удалить" /></a>
                            </td>
                        </tr>

                    </tbody>
                {/foreach}

            </table>
        </div>
    </div>
</div>