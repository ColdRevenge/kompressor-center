<div class="block">
    {include file="_menu_reports.tpl"}
    <div class="page">
        <h1>История выполненных заказов</h1>

        <form method="post" action="">

            <table cellpadding="4" cellspacing="1" border="0" class="table"  style="margin: auto">
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">
                            Дата заказа:
                        </td>
                        <td valign="middle" align="left">
                            с&nbsp; {$start_date_form} до {$end_date_form}
                        </td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <input type="hidden" src="{$sys_images_url}sform.png" name="send" value="Сформировать"/>
                            <button>Сформировать</button>
                        </td>
                    </tr>
                </tbody>
            </table>


        </form>
        <br/>
        <script type="text/javascript"
                src="https://www.google.com/jsapi?autoload={
                'modules':[{
                'name':'visualization',
                'version':'1',
                'packages':['corechart', 'line']
                }]
        }"></script>
        {literal} 
            <script type="text/javascript">
                google.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Дата', 'Общая сумма', 'Доход'],
            {/literal} 
            {foreach from=$reports item="report" name="report"}
                {assign var="get_month" value=$report->month-1}
                        ["{if $date_type == 0}{$report->day} {$months_format.$get_month} {else} {$months.$get_month} {/if} {$report->year}", {$report->sum_total|number_format:0:"":""}, {($report->sum_total-$report->sum_expense)|number_format:0:"":""}],
            {/foreach}
            {literal} 
                                ]);
                                var options = {
                                    title: 'Выполненные заказы',
                                    curveType: 'function',
                                    legend: {position: 'bottom'}
                                };

                                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                                chart.draw(data, options);
                            }
            </script> {/literal} 
            <div id="curve_chart" style="width: 100%"></div>
            <br/><br/>

            {assign var="total_expense" value="0"}
            {assign var="total" value="0"}
            {assign var="count" value="0"}

            <table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: auto;" width="100%">
                <thead>
                    <tr>
                        <td valign="middle" align="center" style="width: 22px;">&nbsp;</td>
                        <td valign="middle" align="center">Дата</td>
                        <td valign="middle" align="center">Кол-во</td>
                        <td valign="middle" align="center">Сумма</td>
                        <td valign="middle" align="center">Доход</td>
                    </tr>
                </thead>
                {foreach from=$reports item="report" name="report"}
                    {assign var="get_month" value=$report->month-1}
                    <tbody>
                        <tr>
                            <td valign="middle" align="center">
                                <a href="javascript:void(0)" onclick="
                                        AjaxRequest('order_data_{if $date_type == 0}{$report->day}_{/if}{$get_month}_{$report->year}', '{$admin_url}reports/completed/detailed/{$report->year}/{$get_month}/{if $date_type == 0}{$report->day}{else}0{/if}/');
                                        fadeReports(this, '#order_{if $date_type == 0}{$report->day}_{/if}{$get_month}_{$report->year}');
                                   "><img src="{$url}images/sys/admin/icon_show.png" /></a>
                            </td>
                            <td valign="middle" align="center">{if $date_type == 0}{$report->day} {/if}{$months.$get_month} {$report->year}</td>
                            <td valign="middle" align="center">{$report->count}</td>
                            <td valign="middle" align="center">{$report->sum_total|number_format:0:"":" "} руб.</td>
                            <td valign="middle" align="center">{($report->sum_total-$report->sum_expense)|number_format:0:"":" "} руб.</td>

                        </tr>
                    </tbody>
                    <tbody style="display: none" id="order_{if $date_type == 0}{$report->day}_{/if}{$get_month}_{$report->year}">
                        <tr>
                            <td valign="middle" align="center" colspan="5" id="order_data_{if $date_type == 0}{$report->day}_{/if}{$get_month}_{$report->year}">

                            </td>
                        </tr>
                    </tbody>

                    {assign var="total" value=$total+$report->sum_total}
                    {assign var="count" value=$count+$report->count}
                    {assign var="total_expense" value=$total_expense+($report->sum_total-$report->sum_expense)}
                {/foreach}
                <tbody>
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <b>Итого: </b>
                        </td>
                        <td valign="middle" align="center">
                            <b>{$count}</b>
                        </td>
                        <td valign="middle" align="center">
                            <b>{$total|number_format:0:"":" "} руб.</b>
                        </td>
                        <td valign="middle" align="center">
                            <b>{$total_expense|number_format:0:"":" "} руб.</b>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>