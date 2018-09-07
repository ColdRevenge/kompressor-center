{if $hits|@count}
<table class="table" cellpadding="4" cellspacing="1" border="0" width="100%">
    <tbody class="table_header">
        <tr>
            <td valign="middle" align="center" width="150">Дата:</td>
            <td valign="middle" align="center">Страница:</td>
        </tr>
    </tbody>

{foreach from=$hits item="hit"}
    <tbody class="tbody">
        <tr>
            <td valign="middle" align="center">{$hit->created|date_format:"%d.%m.%Y %H:%M:%S"}</td>
            <td valign="middle" align="center"><a href="{$url|trim:"/"|replace:$folder:""|trim:"/"}{$hit->self|replace:"index.php":""}" target="__blank">{$url|replace:$folder:""|trim:"/"}{$hit->self|replace:"index.php":""}</a></td>
        </tr>
    </tbody>
{/foreach}
</table>
{else}
Нет кликов
{/if}