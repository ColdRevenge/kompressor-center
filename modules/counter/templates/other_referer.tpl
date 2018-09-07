<div class="block">
    <h1>С каких сайтов заходят</h1>

    <form method="post" action="">
        <div style="text-align: center">с {$start_date_form} до {$end_date_form} <button name="send">Сформировать</button> </div>
    </form>

    <table cellpadding="8" cellspacing="1" border="0" style="width: 900px;margin: auto">
        <tr>
            <td valign="top" align="left">
                <h1 style="margin-top: 0px;">С сайта {$domain} заходили по след. запросам:</h1>
                <table cellpadding="4" cellspacing="1" border="0" class="table">
                    <tbody class="table_header">
                        <tr>
                            <td valign="middle" align="center"><b>Сайт:</b></td>
                            <td valign="middle" align="center" width="200"><b>Заходов:</b></td>
                        </tr>
                    </tbody>
                {foreach from=$referer_stat.stat item="referef"}
                {assign var="procent" value=$referef->count/$referer_stat.all_sum*100}
                    <tbody class="table">
                        <tr>
                            <td valign="middle" align="left"><a href="{$referef->referer}" target="__blank">{covert->convert_cp1251 param = $referef->referer|rawurldecode}</a></td>
                            <td valign="middle" align="center">{$referef->count} <b>({$procent|number_format:2}%)</b></td>
                        </tr>
                    </tbody>
                {/foreach}
                </table>
            </td>
        </tr>
    </table>
</div>