<?php /* Smarty version 3.1.24, created on 2015-10-28 15:23:07
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/counter/templates/query_stat.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13559238515630be2b639c44_21876399%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0b1946eb66e9539c69a7e28b6dd86346fa7a081' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/counter/templates/query_stat.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13559238515630be2b639c44_21876399',
  'variables' => 
  array (
    'start_date_form' => 0,
    'end_date_form' => 0,
    'yandex' => 0,
    'all_query_sum' => 0,
    'google' => 0,
    'rambler' => 0,
    'mail' => 0,
    'qip' => 0,
    'yandex_procent' => 0,
    'key' => 0,
    'query' => 0,
    'procent' => 0,
    'google_procent' => 0,
    'rambler_procent' => 0,
    'mail_procent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630be2b7029d6_83186987',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630be2b7029d6_83186987')) {
function content_5630be2b7029d6_83186987 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13559238515630be2b639c44_21876399';
?>
<div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_sync.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
        <h1>Статистика поисковых запросов</h1>

        <form method="post" action="">
            <div style="text-align: center">с <?php echo $_smarty_tpl->tpl_vars['start_date_form']->value;?>
 до <?php echo $_smarty_tpl->tpl_vars['end_date_form']->value;?>
 <button name="send">Сформировать</button> </div>
        </form>
    <?php if ($_smarty_tpl->tpl_vars['yandex']->value['all_sum']) {
$_smarty_tpl->tpl_vars["yandex_procent"] = new Smarty_Variable($_smarty_tpl->tpl_vars['yandex']->value['all_sum']/$_smarty_tpl->tpl_vars['all_query_sum']->value*100, null, 0);
}?>
<?php if ($_smarty_tpl->tpl_vars['google']->value['all_sum']) {
$_smarty_tpl->tpl_vars["google_procent"] = new Smarty_Variable($_smarty_tpl->tpl_vars['google']->value['all_sum']/$_smarty_tpl->tpl_vars['all_query_sum']->value*100, null, 0);
}?>
<?php if ($_smarty_tpl->tpl_vars['rambler']->value['all_sum']) {
$_smarty_tpl->tpl_vars["rambler_procent"] = new Smarty_Variable($_smarty_tpl->tpl_vars['rambler']->value['all_sum']/$_smarty_tpl->tpl_vars['all_query_sum']->value*100, null, 0);
}?>
<?php if ($_smarty_tpl->tpl_vars['mail']->value['all_sum']) {
$_smarty_tpl->tpl_vars["mail_procent"] = new Smarty_Variable($_smarty_tpl->tpl_vars['mail']->value['all_sum']/$_smarty_tpl->tpl_vars['all_query_sum']->value*100, null, 0);
}?>
<?php if ($_smarty_tpl->tpl_vars['qip']->value['all_sum']) {
$_smarty_tpl->tpl_vars["qip_procent"] = new Smarty_Variable($_smarty_tpl->tpl_vars['qip']->value['all_sum']/$_smarty_tpl->tpl_vars['all_query_sum']->value*100, null, 0);
}?>


<table cellpadding="4" cellspacing="1" border="0">
    <tr>
        <td valign="top" align="left">

            <h1>Яндекс (<?php echo number_format($_smarty_tpl->tpl_vars['yandex_procent']->value,2);?>
%)</h1>
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Запрос:</td>
                        <td valign="middle" align="center" width="200">Поситителей:</td>
                    </tr>
                </thead>
                <?php
$_from = $_smarty_tpl->tpl_vars['yandex']->value['query'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["query"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["query"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["query"]->value) {
$_smarty_tpl->tpl_vars["query"]->_loop = true;
$foreach_query_Sav = $_smarty_tpl->tpl_vars["query"];
?>
                    <?php $_smarty_tpl->tpl_vars["procent"] = new Smarty_Variable($_smarty_tpl->tpl_vars['yandex']->value['count'][$_smarty_tpl->tpl_vars['key']->value]/$_smarty_tpl->tpl_vars['yandex']->value['all_sum']*100, null, 0);?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left"><?php echo $_smarty_tpl->tpl_vars['query']->value;?>
</td>
                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['yandex']->value['count'][$_smarty_tpl->tpl_vars['key']->value];?>
 (<?php echo number_format($_smarty_tpl->tpl_vars['procent']->value,2);?>
%)</td>
                        </tr>
                    </tbody>
                <?php
$_smarty_tpl->tpl_vars["query"] = $foreach_query_Sav;
}
?>
            </table>
        </td>

        <td valign="top" align="left">
            <h1>Google  (<?php echo number_format($_smarty_tpl->tpl_vars['google_procent']->value,2);?>
%)</h1>
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Запрос:</td>
                        <td valign="middle" align="center" width="200">Поситителей:</td>
                    </tr>
                </thead>
                <?php
$_from = $_smarty_tpl->tpl_vars['google']->value['query'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["query"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["query"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["query"]->value) {
$_smarty_tpl->tpl_vars["query"]->_loop = true;
$foreach_query_Sav = $_smarty_tpl->tpl_vars["query"];
?>
                    <?php $_smarty_tpl->tpl_vars["procent"] = new Smarty_Variable($_smarty_tpl->tpl_vars['google']->value['count'][$_smarty_tpl->tpl_vars['key']->value]/$_smarty_tpl->tpl_vars['google']->value['all_sum']*100, null, 0);?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left"><?php echo $_smarty_tpl->tpl_vars['query']->value;?>
</td>
                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['google']->value['count'][$_smarty_tpl->tpl_vars['key']->value];?>
 (<?php echo number_format($_smarty_tpl->tpl_vars['procent']->value,2);?>
%)</td>
                        </tr>
                    </tbody>
                <?php
$_smarty_tpl->tpl_vars["query"] = $foreach_query_Sav;
}
?>
            </table>
        </td>

        <td valign="top" align="left">
            <h1>Rambler  (<?php echo number_format($_smarty_tpl->tpl_vars['rambler_procent']->value,2);?>
%)</h1>
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Запрос:</td>
                        <td valign="middle" align="center" width="200">Поситителей:</td>
                    </tr>
                </thead>
                <?php
$_from = $_smarty_tpl->tpl_vars['rambler']->value['query'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["query"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["query"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["query"]->value) {
$_smarty_tpl->tpl_vars["query"]->_loop = true;
$foreach_query_Sav = $_smarty_tpl->tpl_vars["query"];
?>
                    <?php $_smarty_tpl->tpl_vars["procent"] = new Smarty_Variable($_smarty_tpl->tpl_vars['rambler']->value['count'][$_smarty_tpl->tpl_vars['key']->value]/$_smarty_tpl->tpl_vars['rambler']->value['all_sum']*100, null, 0);?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left"><?php echo $_smarty_tpl->tpl_vars['query']->value;?>
</td>
                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['rambler']->value['count'][$_smarty_tpl->tpl_vars['key']->value];?>
 (<?php echo number_format($_smarty_tpl->tpl_vars['procent']->value,2);?>
%)</td>
                        </tr>
                    </tbody>
                <?php
$_smarty_tpl->tpl_vars["query"] = $foreach_query_Sav;
}
?>
            </table>
        </td>

        <td valign="top" align="left" style="vertical-align: top">
            <h1>Mail  (<?php echo number_format($_smarty_tpl->tpl_vars['mail_procent']->value,2);?>
%)</h1>
            <table cellpadding="4" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Запрос:</td>
                        <td valign="middle" align="center" width="200">Поситителей:</td>
                    </tr>
                </thead>
                <?php
$_from = $_smarty_tpl->tpl_vars['mail']->value['query'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["query"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["query"]->_loop = false;
$_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key"]->value => $_smarty_tpl->tpl_vars["query"]->value) {
$_smarty_tpl->tpl_vars["query"]->_loop = true;
$foreach_query_Sav = $_smarty_tpl->tpl_vars["query"];
?>
                    <?php $_smarty_tpl->tpl_vars["procent"] = new Smarty_Variable($_smarty_tpl->tpl_vars['mail']->value['count'][$_smarty_tpl->tpl_vars['key']->value]/$_smarty_tpl->tpl_vars['mail']->value['all_sum']*100, null, 0);?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left"><?php echo $_smarty_tpl->tpl_vars['query']->value;?>
</td>
                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['mail']->value['count'][$_smarty_tpl->tpl_vars['key']->value];?>
 (<?php echo number_format($_smarty_tpl->tpl_vars['procent']->value,2);?>
%)</td>
                        </tr>
                    </tbody>
                <?php
$_smarty_tpl->tpl_vars["query"] = $foreach_query_Sav;
}
?>
            </table>
        </td>
    </tr>
</table>
</div>
</div><?php }
}
?>