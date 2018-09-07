<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 09:22:17
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/report_completed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214409780255d57219ed08c6-59686269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dd0edc0223f86aeee5f6397cdf935fcce039910' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/report_completed.tpl',
      1 => 1437930831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214409780255d57219ed08c6-59686269',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'start_date_form' => 0,
    'end_date_form' => 0,
    'sys_images_url' => 0,
    'reports' => 0,
    'report' => 0,
    'date_type' => 0,
    'get_month' => 0,
    'months_format' => 0,
    'months' => 0,
    'admin_url' => 0,
    'url' => 0,
    'total' => 0,
    'count' => 0,
    'total_expense' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5721a0a9e71_51040809',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5721a0a9e71_51040809')) {function content_55d5721a0a9e71_51040809($_smarty_tpl) {?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_reports.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                            с&nbsp; <?php echo $_smarty_tpl->tpl_vars['start_date_form']->value;?>
 до <?php echo $_smarty_tpl->tpl_vars['end_date_form']->value;?>

                        </td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <input type="hidden" src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
sform.png" name="send" value="Сформировать"/>
                            <button>Сформировать</button>
                        </td>
                    </tr>
                </tbody>
            </table>


        </form>
        <br/>
        <?php echo '<script'; ?>
 type="text/javascript"
                src="https://www.google.com/jsapi?autoload={
                'modules':[{
                'name':'visualization',
                'version':'1',
                'packages':['corechart', 'line']
                }]
        }"><?php echo '</script'; ?>
>
         
            <?php echo '<script'; ?>
 type="text/javascript">
                google.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Дата', 'Общая сумма', 'Доход'],
             
            <?php  $_smarty_tpl->tpl_vars["report"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["report"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["report"]->key => $_smarty_tpl->tpl_vars["report"]->value) {
$_smarty_tpl->tpl_vars["report"]->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars["get_month"] = new Smarty_variable($_smarty_tpl->tpl_vars['report']->value->month-1, null, 0);?>
                        ["<?php if ($_smarty_tpl->tpl_vars['date_type']->value==0) {
echo $_smarty_tpl->tpl_vars['report']->value->day;?>
 <?php echo $_smarty_tpl->tpl_vars['months_format']->value[$_smarty_tpl->tpl_vars['get_month']->value];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['get_month']->value];?>
 <?php }?> <?php echo $_smarty_tpl->tpl_vars['report']->value->year;?>
", <?php echo number_format($_smarty_tpl->tpl_vars['report']->value->sum_total,0,'','');?>
, <?php echo number_format(($_smarty_tpl->tpl_vars['report']->value->sum_total-$_smarty_tpl->tpl_vars['report']->value->sum_expense),0,'','');?>
],
            <?php } ?>
             
                                ]);
                                var options = {
                                    title: 'Выполненные заказы',
                                    curveType: 'function',
                                    legend: {position: 'bottom'}
                                };

                                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                                chart.draw(data, options);
                            }
            <?php echo '</script'; ?>
>  
            <div id="curve_chart" style="width: 100%"></div>
            <br/><br/>

            <?php $_smarty_tpl->tpl_vars["total_expense"] = new Smarty_variable("0", null, 0);?>
            <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable("0", null, 0);?>
            <?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable("0", null, 0);?>

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
                <?php  $_smarty_tpl->tpl_vars["report"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["report"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["report"]->key => $_smarty_tpl->tpl_vars["report"]->value) {
$_smarty_tpl->tpl_vars["report"]->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars["get_month"] = new Smarty_variable($_smarty_tpl->tpl_vars['report']->value->month-1, null, 0);?>
                    <tbody>
                        <tr>
                            <td valign="middle" align="center">
                                <a href="javascript:void(0)" onclick="
                                        AjaxRequest('order_data_<?php if ($_smarty_tpl->tpl_vars['date_type']->value==0) {
echo $_smarty_tpl->tpl_vars['report']->value->day;?>
_<?php }
echo $_smarty_tpl->tpl_vars['get_month']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['report']->value->year;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/completed/detailed/<?php echo $_smarty_tpl->tpl_vars['report']->value->year;?>
/<?php echo $_smarty_tpl->tpl_vars['get_month']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['date_type']->value==0) {
echo $_smarty_tpl->tpl_vars['report']->value->day;
} else { ?>0<?php }?>/');
                                        fadeReports(this, '#order_<?php if ($_smarty_tpl->tpl_vars['date_type']->value==0) {
echo $_smarty_tpl->tpl_vars['report']->value->day;?>
_<?php }
echo $_smarty_tpl->tpl_vars['get_month']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['report']->value->year;?>
');
                                   "><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/sys/admin/icon_show.png" /></a>
                            </td>
                            <td valign="middle" align="center"><?php if ($_smarty_tpl->tpl_vars['date_type']->value==0) {
echo $_smarty_tpl->tpl_vars['report']->value->day;?>
 <?php }
echo $_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['get_month']->value];?>
 <?php echo $_smarty_tpl->tpl_vars['report']->value->year;?>
</td>
                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['report']->value->count;?>
</td>
                            <td valign="middle" align="center"><?php echo number_format($_smarty_tpl->tpl_vars['report']->value->sum_total,0,''," ");?>
 руб.</td>
                            <td valign="middle" align="center"><?php echo number_format(($_smarty_tpl->tpl_vars['report']->value->sum_total-$_smarty_tpl->tpl_vars['report']->value->sum_expense),0,''," ");?>
 руб.</td>

                        </tr>
                    </tbody>
                    <tbody style="display: none" id="order_<?php if ($_smarty_tpl->tpl_vars['date_type']->value==0) {
echo $_smarty_tpl->tpl_vars['report']->value->day;?>
_<?php }
echo $_smarty_tpl->tpl_vars['get_month']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['report']->value->year;?>
">
                        <tr>
                            <td valign="middle" align="center" colspan="5" id="order_data_<?php if ($_smarty_tpl->tpl_vars['date_type']->value==0) {
echo $_smarty_tpl->tpl_vars['report']->value->day;?>
_<?php }
echo $_smarty_tpl->tpl_vars['get_month']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['report']->value->year;?>
">

                            </td>
                        </tr>
                    </tbody>

                    <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['report']->value->sum_total, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+$_smarty_tpl->tpl_vars['report']->value->count, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["total_expense"] = new Smarty_variable($_smarty_tpl->tpl_vars['total_expense']->value+($_smarty_tpl->tpl_vars['report']->value->sum_total-$_smarty_tpl->tpl_vars['report']->value->sum_expense), null, 0);?>
                <?php } ?>
                <tbody>
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <b>Итого: </b>
                        </td>
                        <td valign="middle" align="center">
                            <b><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</b>
                        </td>
                        <td valign="middle" align="center">
                            <b><?php echo number_format($_smarty_tpl->tpl_vars['total']->value,0,''," ");?>
 руб.</b>
                        </td>
                        <td valign="middle" align="center">
                            <b><?php echo number_format($_smarty_tpl->tpl_vars['total_expense']->value,0,''," ");?>
 руб.</b>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div><?php }} ?>
