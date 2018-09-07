<div class="block">
    <h1>Статистика заходов</h1>
    <form method="post" action="">
        <div style="text-align: center">с {$start_date_form} до {$end_date_form} <button name="send">Сформировать</button> </div>
    </form>

    <table cellpadding="8" cellspacing="1" border="0" style="width: 900px;margin: auto">
        <tr>
            <td valign="top" align="left">
                <h1>С каких сайтов заходят:</h1>
                <table cellpadding="4" cellspacing="1" border="0" class="table">
                    <tbody class="table_header">
                        <tr>
                            <td valign="middle" align="center">Сайт:</td>
                            <td valign="middle" align="center" width="200">Заходов:</td>
                        </tr>
                    </tbody>
                {foreach from=$referer_stat.stat item="referef"}
                {assign var="procent" value=$referef->count/$referer_stat.all_sum*100}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left"><a href="{$MyURL}stat/other/referer/{$referef->domain}/">{$referef->domain}</a></td>
                            <td valign="middle" align="center">{$referef->count} <b>({$procent|number_format:2}%)</b></td>
                        </tr>
                    </tbody>
                {/foreach}
                </table>
            </td>
            <td valign="top" align="left">
                <h1>На какие страницы заходят:</h1>
                <table cellpadding="4" cellspacing="1" border="0" class="table">
                    <tbody class="table_header">
                        <tr>
                            <td valign="middle" align="center">Страница:</td>
                            <td valign="middle" align="center" width="200">Заходов:</td>
                        </tr>
                    </tbody>
                {foreach from=$page_stat.stat item="page"}
                    <tbody class="tbody">
                        <tr>
                    {assign var="procent" value=$page->count/$page_stat.all_sum*100}

                            <td valign="middle" align="left"><a href="{$MyURL}stat/other/self/?self=/index.php{if $page->self}/{$page->self}{/if}">{$url}{$page->self}</a></td>
                            <td valign="middle" align="center">{$page->count} <b>({$procent|number_format:2}%)</b></td>
                        </tr>
                    </tbody>
                {/foreach}
                </table>
            </td>
        </tr>
    </table>
</div>