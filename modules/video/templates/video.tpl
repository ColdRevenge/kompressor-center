<div style="width: 20%; float: left;">
    <table cellpadding="5" cellspacing="1" border="0" class="table_list">
        <tbody class="table_header_list">
            <tr>
                <td valign="middle" align="center"><b>Разделы меню:</b></td>
            </tr>
        </tbody>
        <tbody>
        <td valign="middle" align="left"><div style="padding-left: 10px;">{$category_tree_list}</div></td>
        </tbody>
    </table>
</div>

<div style="width: 80%; float: right;">
    <table cellpadding="4" cellspacing="1" border="0" class="table_list" width="100%;">
        <tbody class="table_header_list">
            <tr>
                <td valign="middle" align="center">&nbsp;</td>
                <td valign="middle" align="center">Путь к файлу:</td>
                {if $is_name == 1}<td valign="middle" align="center">Название:</td>{/if}
                {if $is_desc == 1}<td valign="middle" align="center">Описание:</td>{/if}
                <td valign="middle" align="center">Размер:</td>
                <td valign="middle" align="center">&nbsp;</td>
            </tr>
        </tbody>
        {foreach from=$files item="file"}
        <tbody class="tbody">
            <tr>
                <td valign="middle" align="center"><img src="{$sys_images_url}swf.jpg" alt="" /></td>
                <td valign="middle" align="center"><a href="{$dinst_url}{$file->file}" target="_blank">{$dinst_url}{$file->file}</a></td>
                {if $is_name == 1}<td valign="middle" align="center">{$file->name}</td>{/if}
                {if $is_desc == 1}<td valign="middle" align="center">{$file->desc}</td>{/if}
                <td valign="middle" align="center">{$file->size}</td>
                <td valign="middle" align="center">
                    <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить файл \'{$file->file}\'')){ldelim}AjaxQueryParentFrame('file_list', '{$MyURL}list/{$category_id}/{$file->id}/');{rdelim}"><img src="{$sys_images_url}admin/del.png" alt="" /></a>
                </td>
            </tr>
        </tbody>
        {/foreach}
    </table>
</div>