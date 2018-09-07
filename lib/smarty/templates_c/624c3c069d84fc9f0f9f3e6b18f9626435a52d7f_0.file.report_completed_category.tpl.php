<?php /* Smarty version 3.1.24, created on 2015-10-28 15:22:12
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/reports/templates/report_completed_category.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17139538355630bdf4be7286_34727943%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '624c3c069d84fc9f0f9f3e6b18f9626435a52d7f' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/reports/templates/report_completed_category.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17139538355630bdf4be7286_34727943',
  'variables' => 
  array (
    'start_date_form' => 0,
    'end_date_form' => 0,
    'sys_images_url' => 0,
    'reports' => 0,
    'report' => 0,
    'get_category' => 0,
    'category_names' => 0,
    'color' => 0,
    'colors' => 0,
    'admin_url' => 0,
    'start_date' => 0,
    'end_date' => 0,
    'url' => 0,
    'total' => 0,
    'count' => 0,
    'total_expense' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630bdf4c8f955_32526917',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630bdf4c8f955_32526917')) {
function content_5630bdf4c8f955_32526917 ($_smarty_tpl) {
if (!is_callable('smarty_function_counter')) require_once '/home/c10045/public_html/kompressor-center.com/lib/smarty/plugins/function.counter.php';

$_smarty_tpl->properties['nocache_hash'] = '17139538355630bdf4be7286_34727943';
?>
<div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_reports.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
        <h1>Отчет по категориям</h1>

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
                google.load("visualization", "1", {packages: ["corechart"]});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ["Категория", "Сумма", {role: "style"}],                                                    
            <?php
$_from = $_smarty_tpl->tpl_vars['reports']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["report"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["report"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["report"]->value) {
$_smarty_tpl->tpl_vars["report"]->_loop = true;
$foreach_report_Sav = $_smarty_tpl->tpl_vars["report"];
?>
                <?php echo smarty_function_counter(array('name'=>"color",'assign'=>"color"),$_smarty_tpl);?>

                <?php $_smarty_tpl->tpl_vars["get_category"] = new Smarty_Variable($_smarty_tpl->tpl_vars['report']->value->category_1_id, null, 0);?>
                                    ["<?php echo $_smarty_tpl->tpl_vars['category_names']->value[$_smarty_tpl->tpl_vars['get_category']->value];?>
", <?php echo number_format($_smarty_tpl->tpl_vars['report']->value->sum_total,0,'','');?>
, "<?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['color']->value];?>
"],
            <?php
$_smarty_tpl->tpl_vars["report"] = $foreach_report_Sav;
}
?>
            
                    ]);
                    var view = new google.visualization.DataView(data);
                    view.setColumns([0, 1,
                        {calc: "stringify",
                            sourceColumn: 1,
                            type: "string",
                            role: "annotation"},
                        2]);

                    var options = {
                        title: "Категории",
                        width: '100%',
                        height: 300,
                        bar: {groupWidth: "95%"},
                        legend: {position: "none"},
                    };
                    var chart = new google.visualization.ColumnChart(document.getElementById("curve_chart"));
                    chart.draw(view, options);
                }
            <?php echo '</script'; ?>
>  
            <div id="curve_chart" style="width: 100%"></div>
            <br/><br/>

            <?php $_smarty_tpl->tpl_vars["total_expense"] = new Smarty_Variable("0", null, 0);?>
            <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_Variable("0", null, 0);?>
            <?php $_smarty_tpl->tpl_vars["count"] = new Smarty_Variable("0", null, 0);?>

            <table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: auto;" width="100%">
                <thead>
                    <tr>
                        <td valign="middle" align="center" style="width: 22px;">&nbsp;</td>
                        <td valign="middle" align="center">Категория</td>
                        <td valign="middle" align="center">Кол-во</td>
                        <td valign="middle" align="center">Сумма</td>
                        <td valign="middle" align="center">Доход</td>
                    </tr>
                </thead>
                <?php
$_from = $_smarty_tpl->tpl_vars['reports']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["report"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["report"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["report"]->value) {
$_smarty_tpl->tpl_vars["report"]->_loop = true;
$foreach_report_Sav = $_smarty_tpl->tpl_vars["report"];
?>
                <?php $_smarty_tpl->tpl_vars["get_category"] = new Smarty_Variable($_smarty_tpl->tpl_vars['report']->value->category_1_id, null, 0);?>
                    <tbody>
                        <tr>
                            <td valign="middle" align="center">
                                <a href="javascript:void(0)" onclick="
                                        AjaxRequest('order_data_<?php echo $_smarty_tpl->tpl_vars['get_category']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/completed/category/detailed/<?php echo $_smarty_tpl->tpl_vars['get_category']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['start_date']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['end_date']->value;?>
/');
                                        fadeReports(this, '#order_<?php echo $_smarty_tpl->tpl_vars['get_category']->value;?>
');
                                   "><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/sys/admin/icon_show.png" /></a>
                            </td>
                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['category_names']->value[$_smarty_tpl->tpl_vars['get_category']->value];?>
</td>
                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['report']->value->count;?>
</td>
                            <td valign="middle" align="center"><?php echo number_format($_smarty_tpl->tpl_vars['report']->value->sum_total,0,''," ");?>
 руб.</td>
                            <td valign="middle" align="center"><?php echo number_format($_smarty_tpl->tpl_vars['report']->value->sum_expense,0,''," ");?>
 руб.</td>

                        </tr>
                    </tbody>
                    <tbody style="display: none" id="order_<?php echo $_smarty_tpl->tpl_vars['get_category']->value;?>
">
                        <tr>
                            <td valign="middle" align="center" colspan="5" id="order_data_<?php echo $_smarty_tpl->tpl_vars['get_category']->value;?>
">

                            </td>
                        </tr>
                    </tbody>

                    <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_Variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['report']->value->sum_total, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["count"] = new Smarty_Variable($_smarty_tpl->tpl_vars['count']->value+$_smarty_tpl->tpl_vars['report']->value->count, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars["total_expense"] = new Smarty_Variable($_smarty_tpl->tpl_vars['total_expense']->value+($_smarty_tpl->tpl_vars['report']->value->sum_total-$_smarty_tpl->tpl_vars['report']->value->sum_expense), null, 0);?>
                <?php
$_smarty_tpl->tpl_vars["report"] = $foreach_report_Sav;
}
?>
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
    </div><?php }
}
?>