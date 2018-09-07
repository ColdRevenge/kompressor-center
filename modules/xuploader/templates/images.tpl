{if $files|@count > 0}
<table cellpadding="2" cellspacing="0" border="0" class="table" width="700" style="margin: 10px auto;">
    <tbody class="table_header">
        <tr>
            <td valign="middle" align="center">Путь к файлу:</td>
            <td valign="middle" align="center">Размер:</td>
            <td valign="middle" align="center">Обновлен</td>
        </tr>
    </tbody>
    {foreach from=$files item="file"}
    <tbody class="tbody">
        <tr>
            <td valign="middle" align="center"><a href="{$dinst_url}{$file->file}" target="_blank">{$dinst_url}{$file->file}</a></td>
            <td valign="middle" align="center">{$file->size|number_format:"2"} кб.</td>
            <td valign="middle" align="center">{$file->created|date_format:"%d.%m.%Y %H:%M"}</td>
     {*       <td valign="middle" align="center">
                <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить файл \'{$file->file}\'')){ldelim}AjaxQueryParentFrame('file_list', '{$MyURL}list/{$file->id}/');{rdelim}"><img src="{$sys_images_url}admin/del.png" alt="" /></a>
            </td>*}
        </tr>
    </tbody>
    {/foreach}
</table>
{/if}