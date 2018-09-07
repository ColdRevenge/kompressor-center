<table cellpadding="4" cellspacing="1" border="0" class="table" style="width: 100%;max-width: 1100px;">
    <tbody class="table_header">
        <tr>
            <td valign="middle" align="center">Номер: </td>
            <td valign="middle" align="center" width="150">Создан: </td>
            <td valign="middle" align="center">Название: </td>
            <td valign="middle" align="center">Ответственный менеджер: </td>
            <td valign="middle" align="center">Плановое время закрытия торгов: </td>
            <td valign="middle" align="center">Состояние: </td>
            <td valign="middle" align="center">&nbsp;</td>
            <td valign="middle" align="center" width="60">&nbsp;</td>
        </tr>
    </tbody>
    {foreach from = $tenders item = 'tender' name="tenders"}
        <tbody class="tbody">
            <tr>
                <td valign="middle" align="center" onclick="location.href='{$admin_url}tenders/products/{$tender->id}/'" style="cursor: pointer">{$tender->id}</td>
                <td valign="middle" align="center" onclick="location.href='{$admin_url}tenders/products/{$tender->id}/'" style="cursor: pointer">{$tender->created|date_format:"%d.%m.%Y %H:%m"}</td>
                <td valign="middle" align="center" onclick="location.href='{$admin_url}tenders/products/{$tender->id}/'" style="cursor: pointer">{$tender->name}</td>
                <td valign="middle" align="center" onclick="location.href='{$admin_url}tenders/products/{$tender->id}/'" style="cursor: pointer">{$tender->manager}</td>
                <td valign="middle" align="center" onclick="location.href='{$admin_url}tenders/products/{$tender->id}/'" style="cursor: pointer">{$tender->close_time}</td>
                <td valign="middle" align="center" onclick="location.href='{$admin_url}tenders/products/{$tender->id}/'" style="cursor: pointer"><strong>&laquo;{if $tender->status == 0}Подготовка{elseif $tender->status == 1}Открыт{elseif $tender->status == 2}Закрыт{/if}&raquo;</strong></td>
                <td valign="middle" align="center" onclick="location.href='{$admin_url}tenders/products/{$tender->id}/'" style="cursor: pointer"><strong>{$tender->count|default:0}</strong> товара</a></td>
                <td valign="middle" align="center">
                    <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить тендер &laquo;{$tender->name|addslashes}&raquo; ?','{$MyURL}3/{$tender->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" alt="Удалить раздел" /></a>
                </td>
            </tr>
        </tbody>
    {/foreach}
    <tbody>
        <tr>
            <td valign="middle" align="right" colspan="8" style="height: 22px;">Всего тендеров: {$smarty.foreach.tenders.iteration}&nbsp;</td>

        </tr>
    </tbody>
</table>