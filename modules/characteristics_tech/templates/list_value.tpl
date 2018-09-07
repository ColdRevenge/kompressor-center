<div class="block">
    {include file="_menu_char_tech.tpl"}
    <div class="page">
{include file=$template_message message=$message error=$error}
<h1><a href="{$MyURL}list/">Характеристики</a> / <a href="{$MyURL}type/list/{$characteristic->id}/">Характиристика "{$characteristic->name}"</a> / Тип &laquo;{$types->name}&raquo;</h1>

    {if $characteristics|@count > 0}
        <form method="post" enctype="multipart/form-data" action="{$MyURL}value/list/{$characteristic->id}/{$types->id}/1/">
            <input type="hidden" name="characteristic_id" value="{$characteristic->id}" />
            <table cellpadding="5" cellspacing="1" border="0" class="table" width="900" style="width: 510px;">
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">Название характеристики:</td>
                    <td valign="middle" align="center">Ед. измерения: </td>
                        <td valign="middle" align="center">Сортировка:</td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </tbody>

        {foreach from = $characteristics item = 'characteristic'}
                <tbody class="tbody">
                    <tr>

                        <td valign="middle" align="center"><input type="text" name="name[{$characteristic->id}]" value="{$characteristic->name|stripslashes}"  style="width: 350px;" maxlength="255" /></td>
                        <td valign="middle" align="center"><input type="text" name="unit[{$characteristic->id}]" value="{$characteristic->unit|stripslashes}"  style="width: 50px; text-align: center"  /></td>
                        <td valign="middle" align="center"><input type="text" name="order[{$characteristic->id}]" value="{$characteristic->order}"  style="width: 50px; text-align: center" maxlength="11" /></td>
                        <td valign="middle" align="center">
                            <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить `{$characteristic->name}`??','{$MyURL}value/list/{$characteristic->characteristic_id}/{$types->id}/3/{$characteristic->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" title="Удалить характиристику" alt="Удалить характиристику" /></a>
                        </td>
                    </tr>
                </tbody>
        {/foreach}
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="5">
                            <input type="hidden" name="save" value="1" />
                            <input type="image" src="{$sys_images_url}save.png" name="submit"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
{/if}
        <h1>Добавить значение</h1>
        <form method="post" enctype="multipart/form-data" action="">
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="width: 510px;">
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">Название:</td>
                    <td valign="middle" align="center">Ед. измерения: </td>
                        <td valign="middle" align="center">Сортировка:</td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><input type="text" value=""  name="add_name" style="width: 300px;" maxlength="255"/></td>
                        <td valign="middle" align="center"><input type="text" value="" name="unit" style="width: 50px; text-align: center"/></td>
                        <td valign="middle" align="center"><input type="text" value="0" name="add_order" style="width: 50px; text-align: center" maxlength="11" /></td>
                        
                        <td valign="middle" align="center">
                            <input type="hidden" name="add" value="1" />
                            <input type="image" src="{$sys_images_url}add.png" name="submit"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>