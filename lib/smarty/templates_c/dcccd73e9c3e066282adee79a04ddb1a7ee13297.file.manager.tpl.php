<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 17:08:12
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/manager.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49545483655d730ccea0396-64421160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcccd73e9c3e066282adee79a04ddb1a7ee13297' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/manager.tpl',
      1 => 1423307974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49545483655d730ccea0396-64421160',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'start_date_form' => 0,
    'end_date_form' => 0,
    'sys_images_url' => 0,
    'managers' => 0,
    'manager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d730ccf32741_76543060',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d730ccf32741_76543060')) {function content_55d730ccf32741_76543060($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_reports.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <h1><?php if ($_smarty_tpl->tpl_vars['type']->value==4) {?>Отсутствуют на складе<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==3) {?>Самые продоваемые<?php }?></h1>

        <form method="post" action="">

            <table cellpadding="4" cellspacing="1" border="0" class="table" width="710" style="margin: auto">
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">
                            Дата заказа:
                        </td>
                        <td valign="middle" align="left">
                            с <?php echo $_smarty_tpl->tpl_vars['start_date_form']->value;?>
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
        <?php if (count($_smarty_tpl->tpl_vars['managers']->value)) {?>
            <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%" style="margin-top: 10px;">
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">Менеджер</td>
                        <td valign="middle" align="center">Общая стоимость заказов</td>
                        <td valign="middle" align="center">Кол-во</td>
                    </tr>
                </tbody>
                <?php  $_smarty_tpl->tpl_vars["manager"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["manager"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['managers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["manager"]->key => $_smarty_tpl->tpl_vars["manager"]->value) {
$_smarty_tpl->tpl_vars["manager"]->_loop = true;
?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left"><?php echo $_smarty_tpl->tpl_vars['manager']->value->manager_name;?>
</td>
                            <td valign="middle" align="center"><?php echo (($tmp = @smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['manager']->value->sum,2),",","&nbsp;"))===null||$tmp==='' ? 0 : $tmp);?>
 руб.</td>
                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['manager']->value->count;?>
</td>

                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        <?php } else { ?>
            <h2>Статистика недоступна</h2>
        <?php }?>
    </div>
</div><?php }} ?>
