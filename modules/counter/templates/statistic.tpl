<div class="block">
    <h1>Статистика посещаемости</h1>

    {include file="_menu_sync.tpl"}
    <div class="page">
        <form method="post" action="">
            <div class="stat_date">с {$start_date_form} до {$end_date_form} <button name="send">Сформировать</button> </div>
        </form>

        <table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: auto;width: 800px;margin-top: 5px;">
            <thead>
                <tr>
                    <td valign="middle" align="center">Дата:</td>
                    <td valign="middle" align="center">Посетителей:</td>
                    <td valign="middle" align="center">Кликов:</td>
                    <td valign="middle" align="center">&nbsp;</td>
                </tr>
            </thead>
            {foreach from=$stats item="stat"}
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center">{$stat->date|date_format:"%d.%m.%Y"}</td>
                        <td valign="middle" align="center">{$stat->host}</td>
                        <td valign="middle" align="center">{$stat->hit}</td>
                        <td valign="middle" align="center"><a href="{$MyURL}stat/full/{$stat->date}/">Подробнее</a></td>
                    </tr>
                </tbody>
            {/foreach}
        </table>
    </div>
</div>