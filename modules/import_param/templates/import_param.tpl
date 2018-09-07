<div class="block">
    {include file="_menu_import_param.tpl"}
    <div class="page">

        {include file=$template_message message=$message error=$error}
        <table>
            <tr>
                <td style="vertical-align: top; text-align: center">
                    <form method="post" action="">
                        <textarea name="list_param" style="width: 250px; height: 500px;">{$recommend}</textarea>
                        <input type="hidden" name="is_param" value="5" /><br/>
                        <button style="margin-top: 10px;">Обновить "Рекомендуем"</button>
                    </form>
                </td>
                <td style="vertical-align: top; text-align: center">
                    <form method="post" action="">
                        <textarea name="list_param" style="width: 250px; height: 500px;">{$news}</textarea>
                        <input type="hidden" name="is_param" value="2" /><br/>
                        <button style="margin-top: 10px;">Обновить "Новинки"</button>
                    </form>
                </td>
                <td style="vertical-align: top; text-align: center">
                    <form method="post" action="">
                        <textarea name="list_param" style="width: 250px; height: 500px;">{$discount}</textarea>
                        <input type="hidden" name="is_param" value="3" /><br/>
                        <button style="margin-top: 10px;">Обновить "Рапродажи"</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>