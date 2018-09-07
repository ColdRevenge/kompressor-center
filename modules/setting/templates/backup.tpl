<div class="block">
    {include file="_menu_setting.tpl"}
    <div class="page">
        <h1>Резервные копии</h1>
        {include file=$template_message message=$message error=$error}

        <h2>Создание новой резервной копии</h2>
        <form method="post" action="">
            <button onclick="this.style.visibility = 'hidden'"  name="dump">Сделать резервную копию сайта</button>
        </form>
        <br/><br/>
        <h2>Восстанавление сайта из резервной копии</h2>
        <table cellpadding="6" cellspacing="1" border="0" class="table">
            <tbody class="table_header">
                <tr>
                    <td valign="middle" align="center">Дата создания копии</td>
                    <td valign="middle" align="center">Файлы (скачать)</td>
                    <td valign="middle" align="center">&nbsp;</td>
                </tr>
            </tbody>
            {foreach from=$backups item="backup"}
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center">{$backup->created|date_format:"%d.%m.%Y %H:%S"}</td>
                        <td valign="middle" align="center" style="font-size: 12px;">
                            <a href="{$url}backups/{$backup->sql}" target="_blank">{$backup->sql}</a><br/>
                            {if $backup->files}<a href="{$url}backups/{$backup->files}" target="_blank">{$backup->files}</a>{/if}
                        </td>
                        <td valign="middle" align="center">
                            <form method="post" action="">
                                <input type="hidden" value="{$backup->id}" name="dump_id" />
                                <button>Восстановить сайт из этой копии</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            {/foreach}
        </table>
    </div>
</div>