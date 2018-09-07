{*{include file=$template_message message=$message error=$error}*}

<p>Обновлено: <b>{$list.result.checkpoints|date_format:"%d.%m.%Y %H:%I"}</b> <span class="notice">(трек: <b>{$list.result.tracking_number})</b></span></p>

<table cellpadding="6" cellspacing="1" border="0" class="table" style="margin: auto;">
    <thead>
        <tr>
            <td valign="middle" align="center" style="font-size: 12px;">Время</td>
            <td valign="middle" align="center" style="font-size: 12px;">Адрес</td>
            <td valign="middle" align="center" style="font-size: 12px;">Статус</td>
        </tr>
    </thead>
    {foreach from=$list.result.checkpoints item="deliv" name="deliv"}
        <tbody style="font-size: 12px;" {if $smarty.foreach.deliv.iteration > 3} class="hide"{/if}>
            <tr>
                <td valign="middle" align="center">
                    {$deliv.time|date_format:"%d.%m.%Y %H:%I"}
                </td>
                <td valign="middle" align="center">
                    {$deliv.location}
                </td>
                <td valign="middle" align="center">
                    {$deliv.message}
                </td>
            </tr>
        </tbody>
    {/foreach}
</table>
{if $smarty.foreach.deliv.total > 3}
    <div style="text-align: center;margin-top: 4px;"><button onclick="$(this).parent().parent().find('table tbody.hide').removeClass('hide'); $(this).fadeOut('fast')">Показать все статусы</button></div>
{/if}