<h1>Добавить условие доставки</h1>
<form method="post"  action="{$admin_url}delivery/list/?is_modal=1" enctype="multipart/form-data">
    <table cellpadding="6" cellspacing="1" border="0">
        <tbody>
            <tr>
                <td valign="middle" align="center">Название</td>
                <td valign="middle" align="left">
                    <input type="text" name="name" value="" style="width: 250px;" />
                    <input type="hidden" name="parent_id" value="{$param_tpl.parent_id}"/>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="center">Стоимость</td>
                <td valign="middle" align="left">
                    <input type="text" name="price" value="" style="width: 100px;text-align: center;" />
                </td>
            </tr>
            <tr>
                <td valign="middle" align="center">От (дней)</td>
                <td valign="middle" align="left">
                    <input type="text" name="from_day" value="" style="width: 40px;text-align: center;" maxlength="3" />
                </td>
            </tr>
            <tr>
                <td valign="middle" align="center">До (дней)</td>
                <td valign="middle" align="left">
                    <input type="text" name="to_day" value="" style="width: 40px;text-align: center;" maxlength="3" />
                </td>
            </tr>
            </tr>
            <tr>
                <td valign="middle" align="center">Сортировка</td>
                <td valign="middle" align="left">
                    <input type="text" name="order" value="" style="width: 40px;text-align: center;" maxlength="11" />
                </td>
            </tr>
        </tbody>
        <tbody class="tbody">
            <tr>
                <td valign="middle" align="right" colspan="6">
                    <input type="hidden" name="is_add" value="1" />
                    <button>Добавить</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>