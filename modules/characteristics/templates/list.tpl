<div class="block">
    {*    {include file="_menu_char.tpl"}*}

    <div class="menu">
        <h1>Видимость:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <tbody class="{if $param_tpl.category_id == 0}tbody_hover {/if}tbody">
                <tr>
                    <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href = '{$url}xadmin/characteristics/list/0/0/'">
                        <div style="margin-left:0px;"><a href="{$url}xadmin/characteristics/list/0/0/" {if $param_tpl.category_id == 0}style="font-weight:bold;"{/if}>Везде</a></div>
                    </td>
                </tr>
            </tbody>
            {$category_tree_list_0}
        </table>
    </div>
    <div class="page">
        {include file=$template_message message=$message error=$error}

        <h1>Характеристики товара</h1>
        {if $characteristics|@count}
            <form method="post" enctype="multipart/form-data" action="{$MyURL}list/0/{$param_tpl.category_id}/2/">
                <table cellpadding="5" cellspacing="1" border="0" class="table">
                    <thead>
                        <tr>
                            <td valign="middle" align="center">Название характеристики:</td>
{*                            <td valign="middle" align="center">ЧПУ: </td>*}
                            <td valign="middle" align="center">Сортировка: </td>
                            <td valign="middle" align="center">Видимость: </td>
{*                            <td valign="middle" align="center">Иконка: </td>*}
                            {*                            <td valign="middle" align="center">Состав: </td>*}
                            <td valign="middle" align="center">&nbsp;</td>
                        </tr>
                    </thead>

                    {foreach from = $characteristics item = 'characteristic'}
                        <tbody class="tbody">
                            <tr>

                                <td valign="middle" align="left"><input type="text" name="name[{$characteristic->id}]" value="{$characteristic->name|stripslashes}"  style="width: 250px;" maxlength="255" id="name_{$characteristic->id}"/><a href="{$MyURL}value/list/{$param_tpl.category_id|default:0}/{$characteristic->id}/" style="margin-left: 10px;">(значений {$characteristic->count})</a></td>
                                <td valign="middle" align="left" style="display: none"><input type="text" name="pseudo_dir[{$characteristic->id}]" value="{$characteristic->pseudo_dir|stripslashes}"  style="width: 150px;" maxlength="255" id="pseudo_dir_{$characteristic->id}" /><button onclick="AjaxRequestAsync('pseudo_dir_{$characteristic->id}', '{$admin_url}characteristics/pseudo_dir/?name=' + $('#name_{$characteristic->id}').val());
                                        return false;">UP</button></td>
                                <td valign="middle" align="center"><input type="text" name="order[{$characteristic->id}]" value="{$characteristic->order}"  style="width: 50px; text-align: center" maxlength="11" /></td>
                                <td valign="middle" align="center">
                                    <select name="category_id[{$characteristic->id}]" style="width: 200px;">
                                        <option value="0">Везде</option>
                                        {include file="tree_list.tpl" tree=$get_catalog id=0 level=1 offset=3 char_category_id=$characteristic->category_id limit=3}
                                    </select>
                                </td>
                                <td valign="middle" align="center" style="display: none">
                                    {if $characteristic->icon}
                                        <img src="/images/icons/{$characteristic->icon}" alt="" /><br/>
                                        <a href="?del_icon={$characteristic->id}">Удалить логотип</a>
                                    {else}
                                        <input type="file" value="" name="icon_{$characteristic->id}" id="icon_{$characteristic->id}" class="icon-char" />
                                        <button value="{$characteristic->id}" name="load_img_id[{$characteristic->id}]" onclick="$('.icon-char').attr('disabled', 'disabled'); $('#icon_{$characteristic->id}').removeAttr('disabled');">Загрузить</button>
                                    {/if}
                                </td>
                                {*  <td valign="middle" align="center">
                                <select name="category_id" style="width: 150px;">
                                <option value="0">Везде</option>
                                {include file="tree_list.tpl" tree=$get_catalog id=0 level=1 offset=3 char_category_id=$characteristic->category_id}
                                </select>
                                </td>
                                <td valign="middle" align="center">
                                <select name="category_2_id" style="width: 150px;">
                                <option value="0">Везде</option>
                                {include file="tree_list.tpl" tree=$get_catalog id=0 level=1 offset=3 char_category_id=$characteristic->category_2_id}
                                </select>
                                </td>
                                <td valign="middle" align="center">
                                <select name="category_3_id" style="width: 150px;">
                                <option value="0">Везде</option>
                                {include file="tree_list.tpl" tree=$get_catalog id=0 level=1 offset=3 char_category_id=$characteristic->category_3_id}
                                </select>
                                </td>*}
                                {*                                <td valign="middle" align="center"><input type="checkbox" name="is_param_1[{$characteristic->id}]" {if $characteristic->is_param_1 == 1} checked="checked"{/if} value="1"  style="text-align: center"  /></td>*}
                                <td valign="middle" align="center">
                                    <a href="{$MyURL}value/list/{$param_tpl.category_id|default:0}/{$characteristic->id}/"><img src="{$sys_images_url}admin/add.png" align="middle" hspace="1" alt="Добавить значение" title="Добавить значение" /></a>
                                    <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить `{$characteristic->name}`??', '{$MyURL}list/0/{$characteristic->category_id}/3/{$characteristic->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" title="Удалить характиристику" alt="Удалить характиристику" /></a>
                                </td>
                            </tr>
                        </tbody>
                    {/foreach}
                    <tfoot>
                        <tr>
                            <td valign="middle" align="right" colspan="5">
                                <input type="hidden" name="save" value="1" />
                                <button name="submit">Сохранить</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        {else}
            <h2>Нет ни одной характеристики</h2>
        {/if}
        <br/>
        <h1>Добавить характиристику</h1>
        <form method="post" enctype="multipart/form-data" action="{$MyURL}add/{$param_tpl.category_id}/">

            <input type="hidden" value="{$param_tpl.category_id}" name="category_id" />
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="width: 510px;">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Название:</td>
                        <td valign="middle" align="center">Сортировка: </td>
                        {*                        <td valign="middle" align="center">Состав: </td>*}
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><input type="text" value=""  name="name" style="width: 300px;" maxlength="255"/></td>
                        <td valign="middle" align="center"><input type="text" value="{$smarty.post.order|default:0}" name="order" style="width: 50px; text-align: center" maxlength="11" /></td>
                            {*                        <td valign="middle" align="center"><input type="checkbox" name="is_param_1" value="1"  style="text-align: center"  /></td>*}

                        <td valign="middle" align="center">

                            {if $param_tpl.edit_id}<button name="submit">Сохранить</button>{else}<button name="submit">Добавить</button>{/if}
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div> 