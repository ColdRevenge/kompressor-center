<div class="block">
    {include file="_menu_char_tech.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}

        <h1>Характеристики товара</h1>
        {if $characteristics|@count}
            <form method="post" enctype="multipart/form-data" action="{$MyURL}list/2/">
                <table cellpadding="5" cellspacing="1" border="0" class="table" width="900" style="width: 840px;">
                    <tbody class="table_header">
                        <tr>
                            <td valign="middle" align="center">Название характеристики:</td>
                            <td valign="middle" align="center">Участие в каталоге:
                                <div class="notice">(при наведении на товар)</div></td>
                            <td valign="middle" align="center">Участие&nbsp;в подборе: </td> 
                            <td valign="middle" align="center">Сортировка: </td>
                            <td valign="middle" align="center">&nbsp;</td>
                        </tr>
                    </tbody>

                    {foreach from = $characteristics item = 'characteristic'}
                        <tbody class="tbody">
                            <tr>

                                <td valign="middle" align="left"><input type="text" name="name[{$characteristic->id}]" value="{$characteristic->name|stripslashes}"  style="width: 250px;" maxlength="255" /><a href="{$MyURL}type/list/{$characteristic->id}/" style="margin-left: 10px;">(значений {$characteristic->count})</a></td>
                                <td valign="middle" align="center"><input type="checkbox" name="is_catalog[{$characteristic->id}]" value="1" {if $characteristic->is_catalog == 1}checked="checked"{/if}  /></td>
                                <td valign="middle" align="center"><input type="checkbox" {if $characteristic->is_selection == 1}checked="checked"{/if} name="is_selection[{$characteristic->id}]" value="1" /> </td>
                                <td valign="middle" align="center"><input type="text" name="order[{$characteristic->id}]" value="{$characteristic->order}"  style="width: 50px; text-align: center" maxlength="11" /></td>

                                <td valign="middle" align="center">
                                    <a href="{$MyURL}type/list/{$characteristic->id}/"><img src="{$sys_images_url}admin/add.png" align="middle" hspace="1" alt="Добавить значение" title="Добавить значение" /></a>
                                    <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить `{$characteristic->name}`??','{$MyURL}list/3/{$characteristic->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" title="Удалить характиристику" alt="Удалить характиристику" /></a>
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
        {else}
            <h2>Нет ни одной характеристики</h2>
        {/if}
        <h1>Добавить характиристику</h1>
        <form method="post" enctype="multipart/form-data" action="{$MyURL}add/">
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="width: 820px;">
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">Название:</td>
                        <td valign="middle" align="center">Участие в каталоге:
                            <div class="notice">(при наведении на товар)</div></td>
                        <td valign="middle" align="center">Участие&nbsp;в подборе: </td> 
                        <td valign="middle" align="center">Сортировка: </td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><input type="text" value=""  name="name" style="width: 300px;" maxlength="255"/></td>
                        <td valign="middle" align="center"><input type="checkbox" name="is_catalog" value="1"   /></td>
                        <td valign="middle" align="center"><input type="checkbox"  name="is_selection" value="1" /> </td> 
                        <td valign="middle" align="center"><input type="text" value="{$smarty.post.order|default:0}" name="order" style="width: 50px; text-align: center" maxlength="11" /></td>
                        <td valign="middle" align="center">
                            <input type="image" src="{$sys_images_url}{if $param_tpl.edit_id}save{else}add{/if}.png" name="submit"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>