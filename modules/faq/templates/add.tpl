<script type="text/javascript" src="{$visual_editor}"></script>
{*literal}
<script type="text/javascript">
    tinyMCE.init({
        mode:"textareas",
        theme:"advanced",
        plugins : "pagebreak,style",
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,fontsizeselect,|,sub,sup,|,forecolor,backcolor",
        theme_advanced_buttons2 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "center",
        theme_advanced_resizing : false,
        language:"ru",
        content_css : '{/literal}{$url}{literal}style_ve.css',
        convert_urls : false
    });
</script>
{/literal*}
<div class="block">
<h1>{if $edit_id}Редактировать{else}Добавить{/if} вопрос</h1>

    <form method="post" action="">
        <table cellpadding="3" cellspacing="0" border="0">
           
            <tr>
                <td valign="top" align="right" width="100">Вопоос: </td>
                <td valign="middle" align="left">
                    <textarea rows="9" name="subject" cols="10" style="width: 790px;">{$smarty.post.subject}</textarea>
                </td>
            </tr>{*  <tr>
                <td valign="top" align="right" width="100">Тема: </td>
                <td valign="middle" align="left">
                    <input type="text" name="subject" value="{$smarty.post.subject}" style="width: 790px;" />
                </td>
            </tr>
            <tr>
                <td valign="top" align="right" width="100">Вопоос: </td>
                <td valign="middle" align="left">
                    <textarea rows="9" name="question" cols="10" style="width: 790px;">{$smarty.post.question}</textarea>
                </td>
            </tr>*}
            <tr>
                <td valign="top" align="right">Ответ: </td>
                <td valign="middle" align="left">
                    <textarea rows="9" name="answer" cols="10" style="width: 790px;">{$smarty.post.answer}</textarea>
                </td>
            </tr>
            <tr>
                <td valign="top" align="right">Позиция: </td>
                <td valign="middle" align="left">
                    <input type="text" name="order" value="{$smarty.post.order}" style="width: 50px" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <button name="submit" >{if $edit_id}Сохранить{else}Добавить{/if}</button>
                </td>
            </tr>
        </table>
    </form>
</div>