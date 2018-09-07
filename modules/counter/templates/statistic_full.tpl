<div class="block">
    {include file="_menu_sync.tpl"}
    <div class="page">
        <h1>Статистика посещаемости за {$date|date_format:"%d.%m.%Y"}</h1>
        <div id="counte_stat" style="display:none;position: absolute;width: 700px;"></div>
        <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%">
            <thead>
                <tr>
                    <td valign="middle" align="center">&nbsp;&nbsp;&nbsp;Время:&nbsp;&nbsp;&nbsp;</td>
                    <td valign="middle" align="center">Браузер:</td>
                    <td valign="middle" align="center">От куда:</b></td>
                    <td valign="middle" align="center">Куда:</td>
                    <td valign="middle" align="center">IP:</td>
                    <td valign="middle" align="center">Кликов:</td>
                </tr>
            </thead>
            {foreach from=$stats item="stat"}
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center">{$stat->last_time|date_format:"%H:%M:%S"}</td>
                        <td valign="middle" align="center">{covert->user_browser param = $stat->browser}</td>
                        <td valign="middle" align="center">{if $stat->referer}<a href="{$stat->referer}"  onclick="return !window.open(this.href)">{$stat->referer|rawurldecode}</a>{else}&nbsp;{/if}</td>
                        <td valign="middle" align="center"><a href="{$url}{$stat->self}" target="__blank">{$url}{$stat->self}</a></td>
                        <td valign="middle" align="center">{$stat->ip}</td>
                        <td valign="middle" align="center">{if $stat->hit > 0}<a href="" onclick="AjaxRequest('counte_stat', '{$MyURL}stat/hits/{$stat->id}/');
                                Popup('counte_stat', event);
                                return false;">{$stat->hit}</a>{else}{$stat->hit}{/if}</td>
                    </tr>
                </tbody>
            {/foreach}
        </table>
    </div>
</div>