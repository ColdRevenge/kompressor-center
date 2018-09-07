<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-24 15:23:23
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/products_detailed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23876511555db0846c6be52-71974946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9a466498d1917745d0f4fd93fb9f96ce1d41efb' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/reports/templates/products_detailed.tpl',
      1 => 1440419002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23876511555db0846c6be52-71974946',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55db0846d2b784_33569057',
  'variables' => 
  array (
    'reports' => 0,
    'report' => 0,
    '_shop_url' => 0,
    'admin_url' => 0,
    'sys_images_url' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55db0846d2b784_33569057')) {function content_55db0846d2b784_33569057($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: auto;" width="100%">
    <thead>
        <tr>
            <td valign="middle" align="center" style="width: 150px;">Создан</td>
            <td valign="middle" align="center">Товар</td>
            <td valign="middle" align="center">&nbsp;</td>
        </tr>
    </thead>
    <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable("0", null, 0);?>
    <?php  $_smarty_tpl->tpl_vars["report"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["report"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["report"]->key => $_smarty_tpl->tpl_vars["report"]->value) {
$_smarty_tpl->tpl_vars["report"]->_loop = true;
?>
        <?php $_smarty_tpl->tpl_vars['order_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['report']->value->id, null, 0);?>
        <tbody class="tbody">
            <tr>
                <td valign="middle" align="center">

                    <?php if ($_smarty_tpl->tpl_vars['report']->value->shop_id=='1') {?>
                        <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("http://lalipop.ru/", null, 0);?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['report']->value->shop_id=='2') {?>
                        <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("http://lady.lalipop.ru/", null, 0);?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['report']->value->shop_id=='3') {?>
                        <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("http://platok.lalipop.ru/", null, 0);?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['report']->value->shop_id=='4') {?>
                        <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("http://sumka.lalipop.ru/", null, 0);?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['report']->value->shop_id=='5') {?>
                        <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("http://woman.lalipop.ru/", null, 0);?>
                    <?php }?>
                    <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['report']->value->created,"d.m.Y H:i:s");?>

                <td valign="middle" align="left">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['report']->value->pseudo_dir;?>
/" target="__blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['report']->value->name);?>
</a></td>
                </td>
                <td valign="middle" align="center">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/edit/0/<?php echo $_smarty_tpl->tpl_vars['report']->value->category_1_id;?>
/<?php echo $_smarty_tpl->tpl_vars['report']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['report']->value->id;?>
/?is_modal=1"  rel="related" title="Редактировать товар" ><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                </td>
            </tr>
        </tbody>
        <?php $_smarty_tpl->tpl_vars["total"] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['report']->value->sum_total, null, 0);?>
    <?php } ?>
</table><?php }} ?>
