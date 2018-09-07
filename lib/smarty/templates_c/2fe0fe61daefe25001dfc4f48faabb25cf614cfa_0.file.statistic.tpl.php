<?php /* Smarty version 3.1.24, created on 2017-04-10 14:14:20
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/counter/templates/statistic.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:190303531258eb690ceb6de0_16887358%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fe0fe61daefe25001dfc4f48faabb25cf614cfa' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/counter/templates/statistic.tpl',
      1 => 1485559649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190303531258eb690ceb6de0_16887358',
  'variables' => 
  array (
    'start_date_form' => 0,
    'end_date_form' => 0,
    'stats' => 0,
    'stat' => 0,
    'MyURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_58eb690cf38334_50952562',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58eb690cf38334_50952562')) {
function content_58eb690cf38334_50952562 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/user-kc-pskov/data/www/kc-pskov.ru/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '190303531258eb690ceb6de0_16887358';
?>
<div class="block">
    <h1>Статистика посещаемости</h1>

    <?php echo $_smarty_tpl->getSubTemplate ("_menu_sync.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
        <form method="post" action="">
            <div class="stat_date">с <?php echo $_smarty_tpl->tpl_vars['start_date_form']->value;?>
 до <?php echo $_smarty_tpl->tpl_vars['end_date_form']->value;?>
 <button name="send">Сформировать</button> </div>
        </form>

        <table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: auto;width: 800px;margin-top: 5px;">
            <thead>
                <tr>
                    <td valign="middle" align="center">Дата:</td>
                    <td valign="middle" align="center">Посетителей:</td>
                    <td valign="middle" align="center">Кликов:</td>
                    <td valign="middle" align="center">&nbsp;</td>
                </tr>
            </thead>
            <?php
$_from = $_smarty_tpl->tpl_vars['stats']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["stat"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["stat"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["stat"]->value) {
$_smarty_tpl->tpl_vars["stat"]->_loop = true;
$foreach_stat_Sav = $_smarty_tpl->tpl_vars["stat"];
?>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['stat']->value->date,"%d.%m.%Y");?>
</td>
                        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['stat']->value->host;?>
</td>
                        <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['stat']->value->hit;?>
</td>
                        <td valign="middle" align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
stat/full/<?php echo $_smarty_tpl->tpl_vars['stat']->value->date;?>
/">Подробнее</a></td>
                    </tr>
                </tbody>
            <?php
$_smarty_tpl->tpl_vars["stat"] = $foreach_stat_Sav;
}
?>
        </table>
    </div>
</div><?php }
}
?>