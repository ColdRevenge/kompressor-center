{include file=$template_message message=$message error=$error}
<h1>Изменить пароль</h1>
<div class="add" style="width: 400px;margin: auto; float: none;text-align: right;">
    <img src="{$sys_images_url}setting_general.png" alt="" /><a href="{$MyURL}general/"><b>Общие настройки</b></a>
    {*}<img src="{$sys_images_url}setting_images.png" alt="" /><a href="{$MyURL}products/"><b>Настройки изображений</b></a>{*}
</div>
<div class="block" style="width: 340px;">
    <form method="post" action="">
        <table cellpadding="3" cellspacing="0" border="0">
            <tr>
                <td valign="middle" align="right">Страый пароль: </td>
                <td valign="middle" align="left">
                    <input type="password" value="" name="old_password"  style="width: 150px;"/>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">Новый пароль: </td>
                <td valign="middle" align="left">
                    <input type="password" name="password" value=""  style="width: 150px;"/>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">Подтверждение нового пароля: </td>
                <td valign="middle" align="left">
                    <input type="password" name="confirm_password" value=""  style="width: 150px;"/>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <input type="submit" name="submit" value="Сохранить" style="width: 120px;"/>
                </td>
            </tr>
            
        </table>
    </form>
</div>