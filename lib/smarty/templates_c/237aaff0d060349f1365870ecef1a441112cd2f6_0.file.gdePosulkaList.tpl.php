<?php /* Smarty version 3.1.24, created on 2015-09-13 16:51:56
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/delivery/templates/gdePosulkaList.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:191489568655f57f7c513e25_50922391%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '237aaff0d060349f1365870ecef1a441112cd2f6' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/delivery/templates/gdePosulkaList.tpl',
      1 => 1438795811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191489568655f57f7c513e25_50922391',
  'variables' => 
  array (
    'list' => 0,
    'deliv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57f7c547c90_83096228',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57f7c547c90_83096228')) {
function content_55f57f7c547c90_83096228 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '191489568655f57f7c513e25_50922391';
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
    <?php
$_from = $_smarty_tpl->tpl_vars['list']->value['result']['checkpoints'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["deliv"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["deliv"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_deliv'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["deliv"]->value) {
$_smarty_tpl->tpl_vars["deliv"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_deliv']->value['iteration']++;
$foreach_deliv_Sav = $_smarty_tpl->tpl_vars["deliv"];
?>
        <tbody style="font-size: 12px;" <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_deliv']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_deliv']->value['iteration'] : null) > 3) {?> class="hide"<?php }?>>
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
    <?php
$_smarty_tpl->tpl_vars["deliv"] = $foreach_deliv_Sav;
}
?>
</table>
<?php if ((isset($_smarty_tpl->tpl_vars['__foreach_deliv']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_deliv']->value['total'] : null) > 3) {?>
    <div style="text-align: center;margin-top: 4px;"><button onclick="$(this).parent().parent().find('table tbody.hide').removeClass('hide'); $(this).fadeOut('fast')">Показать все статусы</button></div>
<?php }
}
}
?>