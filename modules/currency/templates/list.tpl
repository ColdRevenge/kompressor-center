<div class="block">
    {include file="_menu_char.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}

        <h1>Валюты</h1>
        {if $currencies|@count}
            <form method="post" enctype="multipart/form-data" action="">
                <input type="hidden" value="1" name="save" />
                <table cellpadding="5" cellspacing="1" border="0" class="table" width="600" style="width: 610px;">
                    <tbody class="table_header">
                        <tr>
                            <td valign="middle" align="center">Название:</td>
                            <td valign="middle" align="center">Код:</td>
                            <td valign="middle" align="center">Курс: </td>
                            <td valign="middle" align="center">Сортировка: </td>
                            <td valign="middle" align="center">По умолчанию</td>
                            <td valign="middle" align="center">&nbsp;</td>
                        </tr>
                    </tbody>

                    {foreach from = $currencies item = 'currency'}
                        <tbody class="tbody">
                            <tr>

                                <td valign="middle" align="center"><input type="text" name="name[{$currency->id}]" value="{$currency->name|stripslashes}"  style="width: 80px;" maxlength="255" /></td>
                                <td valign="middle" align="center"><input type="text" name="code[{$currency->id}]" value="{$currency->code|stripslashes}"  style="width: 80px;" maxlength="255" /></td>
                                <td valign="middle" align="center"><input type="text" name="exchange[{$currency->id}]" value="{$currency->exchange|stripslashes}"  style="width: 80px;" maxlength="255" /></td>
                                <td valign="middle" align="center"><input type="text" name="order[{$currency->id}]" value="{$currency->order}"  style="width: 50px; text-align: center" maxlength="11" /></td>
                                <td valign="middle" align="center"><input type="radio" value="{$currency->id}" {if $currency->is_default == 1}checked="checked"{/if} name="is_default" /></td>

                                <td valign="middle" align="center">

                                    <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить `{$currency->name}`??','{$MyURL}3/{$currency->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" title="Удалить валюту" alt="Удалить валюту" /></a>
                                </td>
                            </tr>
                        </tbody>
                    {/foreach}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="right" colspan="7">
                                <input type="hidden" name="save" value="1" />
                                <input type="image" src="{$sys_images_url}save.png" name="submit"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        {else}
            <h2>Нет ни одной характиристики</h2>
        {/if}
        <h1>Добавить валюту</h1>
        <form method="post" enctype="multipart/form-data" action="{$MyURL}add/">
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="width: 750px;">
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">Название:</td>
                        <td valign="middle" align="center">Код:</td>
                        <td valign="middle" align="center">Курс: </td>
                        <td valign="middle" align="center">Сортировка: </td>
                        <td valign="middle" align="center">По умолчанию</td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                <input type="hidden" value="1" name="add" /> 
                <td valign="middle" align="center"><input type="text" name="name" value="{$smarty.post.name|stripslashes}"  style="width: 80px;" maxlength="255" /></td>
                <td valign="middle" align="center"><input type="text" name="code" value="{$smarty.post.code|stripslashes}"  style="width: 80px;" maxlength="255" /></td>
                <td valign="middle" align="center"><input type="text" name="exchange" value="{$smarty.post.exchange|stripslashes}"  style="width: 80px;" maxlength="255" /></td>
                <td valign="middle" align="center"><input type="text" name="order" value="{$smarty.post.order|stripslashes}"  style="width: 50px; text-align: center" maxlength="11" /></td>
                <td valign="middle" align="center"><input type="checkbox" value="1"  name="is_default" /></td>

                <td valign="middle" align="center">
                    <input type="image" src="{$sys_images_url}{if $param_tpl.edit_id}save{else}add{/if}.png" name="submit"/>
                </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>