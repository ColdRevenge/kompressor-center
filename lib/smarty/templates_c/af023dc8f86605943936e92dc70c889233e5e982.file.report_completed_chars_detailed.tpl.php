<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-08 13:06:10
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/reports/templates/report_completed_chars_detailed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136748063055db00e34ebe16-61430340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af023dc8f86605943936e92dc70c889233e5e982' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/reports/templates/report_completed_chars_detailed.tpl',
      1 => 1441289018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136748063055db00e34ebe16-61430340',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55db00e3593c42_84040450',
  'variables' => 
  array (
    'orders' => 0,
    'order' => 0,
    '_shop_url' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55db00e3593c42_84040450')) {function content_55db00e3593c42_84040450($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: auto;" width="100%">
    <thead>
        <tr>
            <td valign="middle" align="center">Название</td>
            <td valign="middle" align="center">Артикул</td>
            <td valign="middle" align="center">Кол-во</td>
            <td valign="middle" align="center">Сумма</td>
            <td valign="middle" align="center">Доход</td>
        </tr>
    </thead>
    <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable("0", null, 0);?>
    <?php  $_smarty_tpl->tpl_vars["order"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["order"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->key => $_smarty_tpl->tpl_vars["order"]->value) {
$_smarty_tpl->tpl_vars["order"]->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->id, null, 0);?>
        <tbody class="tbody">
            <tr>
                <td valign="middle" align="left">
                    
                <?php if ($_smarty_tpl->tpl_vars['order']->value->shop_id=='1') {?>
                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://lalipop.ru/", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->shop_id=='2') {?>
                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://lady.lalipop.ru/", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->shop_id=='3') {?>
                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://platok.lalipop.ru/", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->shop_id=='4') {?>
                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://sumka.lalipop.ru/", null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->shop_id=='5') {?>
                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://woman.lalipop.ru/", null, 0);?>
                <?php }?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['order']->value->pseudo_dir;?>
/" target="__blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->name);?>
</a></td>
                <td valign="middle" align="center">
                    <?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->article);?>

                </td>
                <td valign="middle" align="center">
                    <?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->count);?>

                </td>
                <td valign="middle" align="center">
                    <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['order']->value->sum_total,2),",","&nbsp;");?>
 р.
                </td>
                <td valign="middle" align="center">
                    <?php echo smarty_modifier_replace(number_format(($_smarty_tpl->tpl_vars['order']->value->sum_total-$_smarty_tpl->tpl_vars['order']->value->sum_expense),2),",","&nbsp;");?>
 р.
                </td>
            </tr>
        </tbody>
        <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['order']->value->sum_total, null, 0);?>
    <?php } ?>
</table><?php }} ?>
