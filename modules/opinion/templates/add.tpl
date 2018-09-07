<div class="block">
    <h1>{if $edit_id}Редактировать{else}Добавить{/if} отзыв</h1>

    <form method="post" action="" style="margin-left: 30px;">
        <table cellpadding="3" cellspacing="0" border="0">
            <tr>
                <td valign="top" align="right">Дата: </td>
                <td valign="middle" align="left">
                    {$date_form}
                </td>
            </tr>
            <tr>
                <td valign="top" align="right">Ваше имя: </td>
                <td valign="middle" align="left">
                    <input type="text" name="name" value="{$smarty.post.name}" style="width: 590px;" />
                </td>
            </tr>

            <tr>
                <td valign="top" align="right">Должность: </td>
                <td valign="middle" align="left">
                    <input type="text" name="profession" value="{$smarty.post.profession|replace:'"':"&quot;"}" style="width: 590px;" />
                </td>
            </tr>

            <tr>
                <td valign="top" align="right">Отзыв: </td>
                <td valign="middle" align="left">
                    <textarea rows="9" name="text" cols="10" style="width: 590px;">{$smarty.post.text|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td valign="top" align="right">Состояние: </td>
                <td valign="middle" align="left">
                    <input type="checkbox" value="1" {if $smarty.post.is_active == 1}checked="checked"{/if} name="is_active" id="is_active" style="vertical-align: middle;" /> <label for="is_active">Активный</label>
                </td>
            </tr>

            <tr>
                <td valign="middle" align="right" colspan="2">
                    <input type="submit" name="submit" value="{if $edit_id}Сохранить{else}Добавить{/if}"/>
                </td>
            </tr>
        </table>
    </form>
</div>