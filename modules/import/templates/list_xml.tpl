<div class="block">

    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>Импорт товаров</h1>

        <h2>Загрузка xml-файла</h2>

        <form action="" method="post">
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center" colspan="5">XML файл</td>
                    </tr>
                </thead>
                {foreach from=$files item="file"}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left">
                                <input type="text" name="xml_name[]" value="{$file->name}" style="width: 150px;" placeholder="Имя" />
                                <input type="text" name="xml_link[]" value="{$file->link}" style="width: 400px;" placeholder="Ссылка на файл"/>
                                <input type="text" name="xml_category[]" value="{$file->category}" style="width: 200px;" placeholder="id категорий через запятую"/>
                                <input type="hidden" name="xml_type[]" value="{$file->xml_type}" placeholder="Тип выгрузки"/>
                            </td>
                            <td valign="middle" align="right">
                                <select name="category_id[]" style="width: 200px;">
                                    <option value="0">Товары без категории</option>
                                    {include file="$select_tree_file" id=0 tree=$tree inc=$select_tree_file level=0 selected_id=$file->category_id}
                                </select>
                            </td>
                            <td valign="middle" align="center" title="Дата обновления">
                                <div class="notice"><b>{$file->uptime|date_format:"d.m.Y H:i"}</b></div>
                            </td>
                            <td valign="middle" align="center" style="width: 55px">

                                <button onclick="AjaxRequestInd('result_up_{$file->id}', '{$admin_url}import/xml/up/{$file->id}/', '#result_up_{$file->id}', 0, null, 2);
                                        $(this).hide();
                                        return  false;">UP</button>
                                <div id="result_up_{$file->id}" style="font-size: 0">&nbsp;</div>
                            </td>
                            <td valign="middle" align="right">
                                <a href="javascript:void(0)" title="Удалить товар" onclick="setConfirm('Вы действительно хотите удалить xml файл - {$file->name}?', '{$admin_url}import/xml/del/{$file->id}/');">
                                    <img src="/images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить xml файл"></a>
                            </td>
                        </tr>
                    </tbody>
                {/foreach}
                <thead>
                    <tr>
                        <td valign="middle" align="center" colspan="5">Добавить XML файл</td>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="left" colspan="5">
                            <input type="text" name="xml_name[]" style="width: 150px;" placeholder="Имя" />
                            <input type="text" name="xml_link[]" style="width: 400px;" placeholder="Ссылка на файл"/>
                            <input type="text" name="xml_category[]" value="" style="width: 200px;" placeholder="id категорий через запятую"/>

                            <input type="hidden" name="xml_type[]" value="0" placeholder="Тип выгрузки"/>
                            <select name="category_id[]" style="width: 217px;">
                                <option value="0">Товары без категории</option>
                                {include file="$select_tree_file" id=0 tree=$tree inc=$select_tree_file level=0 selected_id=0}
                            </select>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td valign="middle" align="right" colspan="5">
                            <button>Сохранить</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>