<div class="block">
    {include file="_menu_sync.tpl"}
    <div class="page">
        <h1>Статистика поисковых запросов</h1>

        <form method="post" action="">
            <div style="text-align: center">с {$start_date_form} до {$end_date_form} <button name="send">Сформировать</button> </div>
        </form>
    {if $yandex.all_sum}{assign var="yandex_procent" value=$yandex.all_sum/$all_query_sum*100}{/if}
{if $google.all_sum}{assign var="google_procent" value=$google.all_sum/$all_query_sum*100}{/if}
{if $rambler.all_sum}{assign var="rambler_procent" value=$rambler.all_sum/$all_query_sum*100}{/if}
{if $mail.all_sum}{assign var="mail_procent" value=$mail.all_sum/$all_query_sum*100}{/if}
{if $qip.all_sum}{assign var="qip_procent" value=$qip.all_sum/$all_query_sum*100}{/if}


<table cellpadding="4" cellspacing="1" border="0">
    <tr>
        <td valign="top" align="left">

            <h1>Яндекс ({$yandex_procent|number_format:2}%)</h1>
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Запрос:</td>
                        <td valign="middle" align="center" width="200">Поситителей:</td>
                    </tr>
                </thead>
                {foreach from=$yandex.query item="query" key="key"}
                    {assign var="procent" value=$yandex.count.$key/$yandex.all_sum*100}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left">{*<a href="{$yandex.base_query.$key}" target="__blank">*}{$query}{*</a>*}</td>
                            <td valign="middle" align="center">{$yandex.count.$key} ({$procent|number_format:2}%)</td>
                        </tr>
                    </tbody>
                {/foreach}
            </table>
        </td>

        <td valign="top" align="left">
            <h1>Google  ({$google_procent|number_format:2}%)</h1>
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Запрос:</td>
                        <td valign="middle" align="center" width="200">Поситителей:</td>
                    </tr>
                </thead>
                {foreach from=$google.query item="query" key="key"}
                    {assign var="procent" value=$google.count.$key/$google.all_sum*100}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left">{*<a href="{$google.base_query.$key}" target="__blank">*}{$query}{*</a>*}</td>
                            <td valign="middle" align="center">{$google.count.$key} ({$procent|number_format:2}%)</td>
                        </tr>
                    </tbody>
                {/foreach}
            </table>
        </td>

        <td valign="top" align="left">
            <h1>Rambler  ({$rambler_procent|number_format:2}%)</h1>
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Запрос:</td>
                        <td valign="middle" align="center" width="200">Поситителей:</td>
                    </tr>
                </thead>
                {foreach from=$rambler.query item="query" key="key"}
                    {assign var="procent" value=$rambler.count.$key/$rambler.all_sum*100}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left">{*<a href="{$rambler.base_query.$key}" target="__blank">*}{$query}{*</a>*}</td>
                            <td valign="middle" align="center">{$rambler.count.$key} ({$procent|number_format:2}%)</td>
                        </tr>
                    </tbody>
                {/foreach}
            </table>
        </td>

        <td valign="top" align="left" style="vertical-align: top">
            <h1>Mail  ({$mail_procent|number_format:2}%)</h1>
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Запрос:</td>
                        <td valign="middle" align="center" width="200">Поситителей:</td>
                    </tr>
                </thead>
                {foreach from=$mail.query item="query" key="key"}
                    {assign var="procent" value=$mail.count.$key/$mail.all_sum*100}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left">{*<a href="{$mail.base_query.$key}" target="__blank">*}{$query}{*</a>*}</td>
                            <td valign="middle" align="center">{$mail.count.$key} ({$procent|number_format:2}%)</td>
                        </tr>
                    </tbody>
                {/foreach}
            </table>
        </td>
    </tr>
</table>
</div>
</div>