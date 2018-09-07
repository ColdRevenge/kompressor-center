<div class="block">
    {include file="_menu_reports.tpl"}
    <div class="page">
        <h1>Статистика по характеристике &laquo;{$char->name}&raquo;</h1>

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
                google.load("visualization", "1", {packages: ["corechart"]});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                            ["Размер", "Сумма", {role: "style"}],{/literal}
                {foreach from=$reports item="report" name="report"}
                    {counter name="color" assign="color"}
                    ["{$report->name} ({$report->count} шт.)", {$report->sum_total|number_format:0:"":""}, "{$colors.$color}"],
                {/foreach}
                {literal}
                        ]);
                                var view = new google.visualization.DataView(data);
                        view.setColumns([0, 1,
                            {calc: "stringify",
                                sourceColumn: 1,
                                type: "string",
                                role: "annotation"},
                            2]);

                        var options = {
                            title: "Размер",
                            width: '100%',
                            height: 300,
                            bar: {groupWidth: "95%"},
                            legend: {position: "none"},
                        };
                        var chart = new google.visualization.ColumnChart(document.getElementById("curve_chart"));
                        chart.draw(view, options);
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
                            <td valign="middle" align="center">Размер</td>
                            <td valign="middle" align="center">Кол-во</td>
                            <td valign="middle" align="center">Сумма</td>
                        </tr>
                    </thead>
                    {foreach from=$reports item="report" name="report"}
                        <tbody>
                            <tr>
                                <td valign="middle" align="center">
                                    <a href="javascript:void(0)" onclick="
                                            AjaxRequest('order_data_{$report->id}', '{$admin_url}reports/completed/chars/detailed/{$report->id}/{$start_date}/{$end_date}/');
                                            fadeReports(this, '#order_{$report->id}');
                                       "><img src="{$url}images/sys/admin/icon_show.png" /></a>
                                </td>
                                <td valign="middle" align="center">{$report->id}</td>
                                <td valign="middle" align="center">{$report->count}</td>
                                <td valign="middle" align="center">{$report->sum_total|number_format:0:"":" "} руб.</td>

                            </tr>
                        </tbody>
                        <tbody style="display: none" id="order_{$report->id}">
                            <tr>
                                <td valign="middle" align="center" colspan="5" id="order_data_{$report->id}">

                                </td>
                            </tr>
                        </tbody>

                        {assign var="total" value=$total+$report->sum_total}
                        {assign var="count" value=$count+$report->count}
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
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        {*
        <div class="block">
        {include file="_menu_reports.tpl"}
        <div class="page">
        <h1>Статистика по характеристике &laquo;{$char->name}&raquo;</h1>
        {include file=$template_message message=$message error=$error}
        <table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: auto;" width="100%">
        <tbody class="table_header">
        <tr>
        <td valign="middle" align="center">{$char->name}</td>
        <td valign="middle" align="center">Выполненных заказов</td>
        <td valign="middle" align="center">%</td>
        <!--                    <td valign="middle" align="center">Стоимость, руб.</td>-->
        </tr>
        </tbody>
        {foreach from=$return.return item="return_item" name="return"}
        <tbody class="tbody">
        <tr>
        <td valign="middle" align="center"><b>{$return_item->name}</b></td>
        <td valign="middle" align="center"><b>{$return_item->count}</b></td>
        <td valign="middle" align="center"><b>{math x=$return.count y=$return_item->count equation="(y/x)*100" format="%.2f"}%</b></td>
        </tr>
        </tbody>
        {/foreach}    
        </table>
        </div>
        </div>*}