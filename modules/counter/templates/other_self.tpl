<div class="block">
    <h1>С каких сайтов заходят</h1>

    <form method="post" action="">
        <div style="text-align: center">с {$start_date_form} до {$end_date_form} <button name="send">Сформировать</button> </div>
    </form>

    <table cellpadding="8" cellspacing="1" border="0" style="width: 900px;margin: auto">
        <tr>
            <td valign="top" align="left">
                <h1>На страницу {$url}{$self|substr:11} заходили со следующих сайтов:</h1>
                <table cellpadding="4" cellspacing="1" border="0" class="table">
                    <tbody class="table_header">
                        <tr>
                            <td valign="middle" align="center" width="700">Сайт:</td>
                            <td valign="middle" align="center" width="200">Заходов:</td>
                        </tr>
                    </tbody>
                {foreach from=$referer_stat.stat item="referef"}
                {assign var="procent" value=$referef->count/$referer_stat.all_sum*100}
                    <tbody class="tbody">
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