<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-24 14:42:01
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/report_completed_chars.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162619219655daf793f12757-37037274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a4e7973743030b32c0ab6f000192974a5ff0430' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/report_completed_chars.tpl',
      1 => 1440416227,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162619219655daf793f12757-37037274',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55daf7940b1198_71105837',
  'variables' => 
  array (
    'char' => 0,
    'start_date_form' => 0,
    'end_date_form' => 0,
    'sys_images_url' => 0,
    'reports' => 0,
    'report' => 0,
    'color' => 0,
    'colors' => 0,
    'admin_url' => 0,
    'start_date' => 0,
    'end_date' => 0,
    'url' => 0,
    'total' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55daf7940b1198_71105837')) {function content_55daf7940b1198_71105837($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/function.counter.php';
?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_reports.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <h1>Статистика по характеристике &laquo;<?php echo $_smarty_tpl->tpl_vars['char']->value->name;?>
&raquo;</h1>

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
                            ["Размер", "Сумма", {role: "style"}],
                <?php  $_smarty_tpl->tpl_vars["report"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["report"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["report"]->key => $_smarty_tpl->tpl_vars["report"]->value) {
$_smarty_tpl->tpl_vars["report"]->_loop = true;
?>
                    <?php echo smarty_function_counter(array('name'=>"color",'assign'=>"color"),$_smarty_tpl);?>

                    ["<?php echo $_smarty_tpl->tpl_vars['report']->value->name;?>
 (<?php echo $_smarty_tpl->tpl_vars['report']->value->count;?>
 шт.)", <?php echo number_format($_smarty_tpl->tpl_vars['report']->value->sum_total,0,'','');?>
, "<?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['color']->value];?>
"],
                <?php } ?>
                
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
                            <td valign="middle" align="center">Размер</td>
                            <td valign="middle" align="center">Кол-во</td>
                            <td valign="middle" align="center">Сумма</td>
                        </tr>
                    </thead>
                    <?php  $_smarty_tpl->tpl_vars["report"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["report"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["report"]->key => $_smarty_tpl->tpl_vars["report"]->value) {
$_smarty_tpl->tpl_vars["report"]->_loop = true;
?>
                        <tbody>
                            <tr>
                                <td valign="middle" align="center">
                                    <a href="javascript:void(0)" onclick="
                                            AjaxRequest('order_data_<?php echo $_smarty_tpl->tpl_vars['report']->value->id;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/completed/chars/detailed/<?php echo $_smarty_tpl->tpl_vars['report']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['start_date']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['end_date']->value;?>
/');
                                            fadeReports(this, '#order_<?php echo $_smarty_tpl->tpl_vars['report']->value->id;?>
');
                                       "><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/sys/admin/icon_show.png" /></a>
                                </td>
                                <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['report']->value->id;?>
</td>
                                <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['report']->value->count;?>
</td>
                                <td valign="middle" align="center"><?php echo number_format($_smarty_tpl->tpl_vars['report']->value->sum_total,0,''," ");?>
 руб.</td>

                            </tr>
                        </tbody>
                        <tbody style="display: none" id="order_<?php echo $_smarty_tpl->tpl_vars['report']->value->id;?>
">
                            <tr>
                                <td valign="middle" align="center" colspan="5" id="order_data_<?php echo $_smarty_tpl->tpl_vars['report']->value->id;?>
">

                                </td>
                            </tr>
                        </tbody>

                        <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['report']->value->sum_total, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["count"] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+$_smarty_tpl->tpl_vars['report']->value->count, null, 0);?>
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
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <?php }} ?>
