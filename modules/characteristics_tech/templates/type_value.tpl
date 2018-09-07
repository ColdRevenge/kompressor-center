<div class="block">
    {include file="_menu_char_tech.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1><a href="{$MyURL}list/">Характеристики</a> / Типы для характеристики "{$characteristic->name}"</h1>


        {if $characteristics|@count > 0}
            <form method="post" enctype="multipart/form-data" action="{$MyURL}type/list/{$characteristic->id}/1/">
                <input type="hidden" name="characteristic_id" value="{$characteristic->id}" />
                <table cellpadding="5" cellspacing="1" border="0" class="table" width="900" style="width: 850px;">
                    <tbody class="table_header">
                        <tr>
                            <td valign="middle" align="center">Название характеристики:</td>
                            <td valign="middle" align="center">Список: </td>
                            <td valign="middle" align="center">Участие в подборе: </td>
                            <td valign="middle" align="center">Участие в каталоге:
                                <div class="notice">(при наведении на товар)</div></td>
                            <td valign="middle" align="center">Сортировка:</td>
                            <td valign="middle" align="center">&nbsp;</td>
                        </tr>
                    </tbody>

                    {foreach from = $characteristics item = 'characteristic'}
                        <tbody class="tbody">
                            <tr>

                                <td valign="middle" align="center"><input type="text" name="name[{$characteristic->id}]" value="{$characteristic->name}"  style="width: 230px;" maxlength="255" /> <a href="{$MyURL}value/list/{$characteristic->characteristic_id}/{$characteristic->id}/" style="margin-left: 10px;">(значений {$characteristic->count})</a></td>

                                <td valign="middle" align="center"><input type="checkbox" {if $characteristic->is_select == 1}checked="checked"{/if} name="is_select[{$characteristic->id}]" value="1" /> </td> 
                                <td valign="middle" align="center"><input type="checkbox" {if $characteristic->is_selection == 1}checked="checked"{/if} name="is_selection[{$characteristic->id}]" value="1" /> </td>
                                <td valign="middle" align="center"><input type="checkbox" {if $characteristic->is_catalog == 1}checked="checked"{/if} name="is_catalog[{$characteristic->id}]" value="1" /> </td>

                                <td valign="middle" align="center"><input type="text" name="order[{$characteristic->id}]" value="{$characteristic->order}"  style="width: 50px; text-align: center" maxlength="11" /></td>

                                <td valign="middle" align="center">
                                    <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить `{$characteristic->name}`??','{$MyURL}type/list/{$characteristic->characteristic_id}/3/{$characteristic->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" title="Удалить характиристику" alt="Удалить характиристику" /></a>
                                </td>
                            </tr>
                        </tbody>
                    {/foreach}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="right" colspan="6">
                                <input type="hidden" name="save" value="1" />
                                <input type="image" src="{$sys_images_url}save.png" name="submit"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        {/if}
        <h1>Добавить Тип</h1>
        <form method="post" enctype="multipart/form-data" action="">
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="width: 820px;">
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">Название:</td>
                        <td valign="middle" align="center">Список: </td>
                        <td valign="middle" align="center">Участие в каталоге:</td>
                        <td valign="middle" align="center">Участие&nbsp;в подборе: </td> 
                        <td valign="middle" align="center">Сортировка:</td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><input type="text" value=""  name="add_name" style="width: 300px;" maxlength="255"/></td>
                        <td valign="middle" align="center"><input type="checkbox"  name="is_select" value="1" /> </td>
                        <td valign="middle" align="center"><input type="checkbox"  name="is_catalog" value="1" /> </td>
                        <td valign="middle" align="center"><input type="checkbox"  name="is_selection" value="1" /> </td> 
                        <td valign="middle" align="center"><input type="text" value="{$smarty.post.order|default:0}" name="add_order" style="width: 50px; text-align: center" maxlength="11" /></td>
                        <td valign="middle" align="center">
                            <input type="hidden" name="add" value="1" />
                            <input type="image" src="{$sys_images_url}add.png" name="submit"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>


        <h2>Настройки</h2>
        <form method="post" action="">
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="width: 720px;">
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center">
                            Использовать характиристику только в  
                        </td>
                        <td valign="middle" align="center">
                            <select name="only_category_id">
                                <option value="0">Во всех разделах</option>
                                {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 current_id=$edit_id selected_id=$smarty.post.only_category_id}
                            </select><br/>
                            
                            <select name="only_category_2_id">
                                <option value="0">Во всех разделах</option>
                                {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 current_id=$edit_id selected_id=$smarty.post.only_category_2_id}
                            </select><br/>
                            
                            <select name="only_category_3_id">
                                <option value="0">Во всех разделах</option>
                                {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 current_id=$edit_id selected_id=$smarty.post.only_category_3_id}
                            </select>
                            
                        </td>
                        <td valign="middle" align="center">
                            <input type="image" src="{$sys_images_url}save.png" name="submit"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>