<div class="block">

    {assign var="char_id" value=$characteristic->id}
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

        <div id="breadcrumbs">
            <a href="{$admin_url}characteristics/list/0/{$param_tpl.category_id}/">Характеристики товара</a>  &raquo; <span>Значение для характеристики &laquo;{$characteristic->name}&raquo;</span>
        </div>

        {include file=$template_message message=$message error=$error}
        <h1>Значение для характеристики &laquo;{$characteristic->name}&raquo;</h1>
        {if $characteristics|@count > 0}
            {assign var="c_id" value=$characteristic->id}
            {if ($param_tpl.id != 63 && $shop == 'platok') || ($param_tpl.id != 73 && $shop == 'sumka') || ($param_tpl.id != 117 && $shop == 'woman') || ($param_tpl.id != 55 && $shop == 'lady') || $param_tpl.id != 2}<form method="post" enctype="multipart/form-data" action="{$MyURL}value/list/{$param_tpl.category_id}/{$characteristic->id}/1/">{/if}
                <input type="hidden" name="characteristic_id" value="{$characteristic->id}" />
                <table cellpadding="5" cellspacing="1" border="0" class="table" >
                    <thead>
                        <tr>
                            <td valign="middle" align="center">Название значения:</td>
                            {*                            <td valign="middle" align="center">ЧПУ: </td>*}
                            <td valign="middle" align="center">Сортировка:</td>
                            <td valign="middle" align="center">Ед. изм.:</td>
                            <td valign="middle" align="center">№:</td>
                            {*                            <td valign="middle" align="center">В название</td>*}
                            {*                            <td valign="middle" align="center">Эквивалент: </td>*}
                            {*                            {if ($param_tpl.id == 5 && $shop == 'lady') || $param_tpl.id == 2}    <td valign="middle" align="center">Логотип: </td>{/if}*}
                            {*                            <td valign="middle" align="center">Наценка:</td>*}
                            <td valign="middle" align="center">&nbsp;</td>
                        </tr>
                    </thead>

                    {foreach from = $characteristics item = 'characteristic'}
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="center">

                                    <input type="text" name="name[{$characteristic->id}]" value="{$characteristic->name|stripslashes|replace:'"':"&quot;"}"  style="width: 300px;" maxlength="255"  id="name_{$characteristic->id}"/></td>
                                <td valign="middle" align="left" style="display: none"><input type="text" name="pseudo_dir[{$characteristic->id}]" value="{$characteristic->pseudo_dir|stripslashes}"  style="width: 150px;" maxlength="255"  id="pseudo_dir_{$characteristic->id}" /><button onclick="AjaxRequestAsync('pseudo_dir_{$characteristic->id}', '{$admin_url}characteristics/pseudo_dir/?name=' + $('#name_{$characteristic->id}').val());
                                        return false;">UP</button></td>
                                <td valign="middle" align="center">
                                    <input type="text" name="order[{$characteristic->id}]" value="{$characteristic->order}"  style="width: 50px; text-align: center" maxlength="11" />
                                    {*   {if ($param_tpl.id == 73 && $shop == 'sumka') || ($param_tpl.id == 5 && $shop == 'lady') || $param_tpl.id == 2}

                                    <input type="hidden" name="save" value="1" />
                                    <button name="submit">Сохранить</button>
                                    {/if}*}
                                </td>
                                <td valign="middle" align="center"><input type="text" name="unit[{$characteristic->id}]" value="{$characteristic->unit}"  style="width: 50px; text-align: center" maxlength="11" /></td>
                                    {*                                <td valign="middle" align="center"><input type="text" name="price[{$characteristic->id}]" value="{$characteristic->price}"  style="width: 50px; text-align: center" maxlength="11" /></td>*}
                                <td valign="middle" align="center"><div class="notice">{$characteristic->id|stripslashes}</div></td>
                                <td valign="middle" align="center" style="display: none"><label class="p-check"><input type="checkbox" value="1" name="is_param_1[{$characteristic->id}]" {if $characteristic->is_param_1} checked="checked"{/if} /><em>&nbsp;</em></label></td>

                                <td valign="middle" align="center" style="display: none">
                                    <select name="is_param_2[{$characteristic->id}]">
                                        <option value="0">Не выбрано</option>
                                        {foreach from=$all_characteristic item="all_char"}
                                            {assign var="all_char_id" value=$all_char->id}
                                            <optgroup label="{$all_char->name|stripslashes}">
                                                {foreach from=$all_char_values.$all_char_id item="all_value"}
                                                    <option value="{$all_value->id}"{if $all_value->id == $characteristic->is_param_2} selected="selected"{/if}>{$all_value->name|stripslashes}</option>
                                                {/foreach}
                                            </optgroup>
                                        {/foreach}
                                    </select>
                                </td>

                                <td valign="middle" align="center">
                                    <input type="hidden" name="is_select[{$characteristic->id}]" value="{$characteristic->is_select}" />
                                    <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить `{$characteristic->name}`??', '{$MyURL}value/list/{$param_tpl.category_id}/{$characteristic->characteristic_id}/3/{$characteristic->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" title="Удалить характиристику" alt="Удалить характиристику" /></a>
                                </td>
                            </tr>
                        </tbody>
                    {/foreach}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="right" colspan="7">
                                <input type="hidden" name="save" value="1" />
                                <button name="submit">Сохранить</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {if ($param_tpl.id != 63 && $shop == 'platok') || ($param_tpl.id != 73 && $shop == 'sumka') || ($param_tpl.id != 117 && $shop == 'woman') || ($param_tpl.id != 55 && $shop == 'lady') || $param_tpl.id != 2}        </form>{/if}
            {/if}
        <br/>
        <h1>Добавить характиристику</h1>
        <form method="post" enctype="multipart/form-data" action="">
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Название:</td>
                        <td valign="middle" align="center">Сортировка:</td>
                        <td valign="middle" align="center">Ед. изм.:</td>
                        {*                        <td valign="middle" align="center">Наценка:</td>*}
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><input type="text" value=""  name="add_name" style="width: 300px;" maxlength="255"/></td>
                        <td valign="middle" align="center"><input type="text" value="{$smarty.post.order|default:0}" name="add_order" style="width: 50px; text-align: center" maxlength="11" /></td>
                        <td valign="middle" align="center"><input type="text" value="" name="unit" maxlength="255" style="width: 50px; text-align: center"  /></td>
                            {*                        <td valign="middle" align="center"><input type="text" value="" name="price" maxlength="255" style="width: 50px; text-align: center"  /></td>*}
                        <td valign="middle" align="center">
                            <input type="hidden" name="is_select" value="0" />
                            <input type="hidden" name="add" value="1" />
                            <button name="submit">Добавить</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>