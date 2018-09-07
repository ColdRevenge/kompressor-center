<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-24 15:24:46
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85715095555db05a76f8634-00945905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'facf34a8e2ff51296f629cac50faeeae635e34a8' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/products.tpl',
      1 => 1440419085,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85715095555db05a76f8634-00945905',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55db05a7766496_02010170',
  'variables' => 
  array (
    'start_date_form' => 0,
    'end_date_form' => 0,
    'sys_images_url' => 0,
    'reports' => 0,
    'report' => 0,
    'admin_url' => 0,
    'start_date' => 0,
    'end_date' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55db05a7766496_02010170')) {function content_55db05a7766496_02010170($_smarty_tpl) {?><div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_reports.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <h1>Статистика по заполнению</h1>

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
        <?php if (count($_smarty_tpl->tpl_vars['reports']->value)) {?>
            <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%" style="margin-top: 10px;">
                <thead>
                    <tr>
                        <td valign="middle" align="center" style="width: 22px;">&nbsp;</td>
                        <td valign="middle" align="center">Менеджер</td>
                        <td valign="middle" align="center">Кол-во</td>
                    </tr>
                </thead>
                <?php  $_smarty_tpl->tpl_vars["report"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["report"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["report"]->key => $_smarty_tpl->tpl_vars["report"]->value) {
$_smarty_tpl->tpl_vars["report"]->_loop = true;
?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="center">
                                <a href="javascript:void(0)" onclick="
                                        AjaxRequest('order_data_<?php echo $_smarty_tpl->tpl_vars['report']->value->admin_id;?>
', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
reports/products/detailed/<?php echo $_smarty_tpl->tpl_vars['report']->value->admin_id;?>
/<?php echo $_smarty_tpl->tpl_vars['start_date']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['end_date']->value;?>
/');
                                        fadeReports(this, '#order_<?php echo $_smarty_tpl->tpl_vars['report']->value->admin_id;?>
');
                                   "><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/sys/admin/icon_show.png" /></a>
                            </td>
                            <td valign="middle" align="left"><?php echo $_smarty_tpl->tpl_vars['report']->value->manager_name;?>
</td>
                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['report']->value->count;?>
</td>

                        </tr>
                    </tbody>
                    <tbody style="display: none" id="order_<?php echo $_smarty_tpl->tpl_vars['report']->value->admin_id;?>
">
                        <tr>
                            <td valign="middle" align="center" colspan="5" id="order_data_<?php echo $_smarty_tpl->tpl_vars['report']->value->admin_id;?>
">

                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        <?php } else { ?>
            <h2>Нет информации</h2>
        <?php }?>
    </div>
</div><?php }} ?>
