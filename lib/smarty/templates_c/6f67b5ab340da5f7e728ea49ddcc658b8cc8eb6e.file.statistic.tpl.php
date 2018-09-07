<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 19:28:05
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/counter/templates/statistic.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178211393955d4ae95c45859-60778642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f67b5ab340da5f7e728ea49ddcc658b8cc8eb6e' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/counter/templates/statistic.tpl',
      1 => 1423307967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178211393955d4ae95c45859-60778642',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'start_date_form' => 0,
    'end_date_form' => 0,
    'stats' => 0,
    'stat' => 0,
    'MyURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4ae95c90d52_67435262',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4ae95c90d52_67435262')) {function content_55d4ae95c90d52_67435262($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><div class="block">
    <h1>Статистика посещаемости</h1>

    <?php echo $_smarty_tpl->getSubTemplate ("_menu_sync.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
            <?php  $_smarty_tpl->tpl_vars["stat"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["stat"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["stat"]->key => $_smarty_tpl->tpl_vars["stat"]->value) {
$_smarty_tpl->tpl_vars["stat"]->_loop = true;
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
            <?php } ?>
        </table>
    </div>
</div><?php }} ?>
