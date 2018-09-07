<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:32:20
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/gdePosulkaList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18288643355d46944cd8633-41775302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22d47eae6e7e2d4ecaa321c3cfa0778ff5f16848' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/delivery/templates/gdePosulkaList.tpl',
      1 => 1438795811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18288643355d46944cd8633-41775302',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'deliv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d46944d0d122_78236068',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d46944d0d122_78236068')) {function content_55d46944d0d122_78236068($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?>

<p>Обновлено: <b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['result']['checkpoints'],"%d.%m.%Y %H:%I");?>
</b> <span class="notice">(трек: <b><?php echo $_smarty_tpl->tpl_vars['list']->value['result']['tracking_number'];?>
)</b></span></p>

<table cellpadding="6" cellspacing="1" border="0" class="table" style="margin: auto;">
    <thead>
        <tr>
            <td valign="middle" align="center" style="font-size: 12px;">Время</td>
            <td valign="middle" align="center" style="font-size: 12px;">Адрес</td>
            <td valign="middle" align="center" style="font-size: 12px;">Статус</td>
        </tr>
    </thead>
    <?php  $_smarty_tpl->tpl_vars["deliv"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["deliv"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['result']['checkpoints']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["deliv"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["deliv"]['total'] = $_smarty_tpl->tpl_vars["deliv"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["deliv"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["deliv"]->key => $_smarty_tpl->tpl_vars["deliv"]->value) {
$_smarty_tpl->tpl_vars["deliv"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["deliv"]['iteration']++;
?>
        <tbody style="font-size: 12px;" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['deliv']['iteration']>3) {?> class="hide"<?php }?>>
            <tr>
                <td valign="middle" align="center">
                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['deliv']->value['time'],"%d.%m.%Y %H:%I");?>

                </td>
                <td valign="middle" align="center">
                    <?php echo $_smarty_tpl->tpl_vars['deliv']->value['location'];?>

                </td>
                <td valign="middle" align="center">
                    <?php echo $_smarty_tpl->tpl_vars['deliv']->value['message'];?>

                </td>
            </tr>
        </tbody>
    <?php } ?>
</table>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['deliv']['total']>3) {?>
    <div style="text-align: center;margin-top: 4px;"><button onclick="$(this).parent().parent().find('table tbody.hide').removeClass('hide'); $(this).fadeOut('fast')">Показать все статусы</button></div>
<?php }?><?php }} ?>
