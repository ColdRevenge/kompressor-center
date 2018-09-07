<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-24 12:18:43
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/discount/templates/coupons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155311311255dae173afbd79-93881608%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b2dbcae196d7a026c2365ade8ff3c7684fd9272' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/discount/templates/coupons.tpl',
      1 => 1428328362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155311311255dae173afbd79-93881608',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'sys_images_url' => 0,
    'admin_url' => 0,
    'MyURL' => 0,
    'coupons' => 0,
    'coupon' => 0,
    'next_coupon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55dae173bd4525_14070082',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dae173bd4525_14070082')) {function content_55dae173bd4525_14070082($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?>
<div class="block">

    <?php echo $_smarty_tpl->getSubTemplate ("_menu_discount.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <div class="quick_actions">
            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
added.png" alt="Добавить" /><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
discount/coupons/add/?is_modal=1" rel="fancy" >Добавить купон </a>
        </div>
        <h1>Купоны</h1>

        <form method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
">
            <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%" >
                <thead>
                    <tr>
                        <td valign="middle" align="center">Название: </td>
                        <td valign="middle" align="center">Скидка: </td>
                        <td valign="middle" align="center">Минимальная стоимость товара: </td>
                        <td valign="middle" align="center">Дата создания: </td>
                        <td valign="middle" align="center">Дата завершения: </td>
                        <td valign="middle" align="center">Переход на след. купон: </td>
                        <td valign="middle" align="center">&nbsp;</td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </thead>

                <?php  $_smarty_tpl->tpl_vars['coupon'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['coupon']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['coupons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['coupon']->key => $_smarty_tpl->tpl_vars['coupon']->value) {
$_smarty_tpl->tpl_vars['coupon']->_loop = true;
?>
                    <tbody class="tbody">
                        <tr<?php if ($_smarty_tpl->tpl_vars['coupon']->value->is_active!=1) {?> style="color: gray;"<?php }?>>
                            <td valign="middle" align="center"><?php echo stripslashes($_smarty_tpl->tpl_vars['coupon']->value->name);?>
</td>
                            <td valign="middle" align="center"><?php if ($_smarty_tpl->tpl_vars['coupon']->value->discount_sum>0) {
echo $_smarty_tpl->tpl_vars['coupon']->value->discount_sum;?>
 руб.<?php } else {
echo $_smarty_tpl->tpl_vars['coupon']->value->discount_procent;?>
%<?php }?></td>
                            <td valign="middle" align="center"><?php echo $_smarty_tpl->tpl_vars['coupon']->value->min_sum;?>
 руб.</td>
                            <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['coupon']->value->created,"%d.%m.%Y");?>
</td>
                            <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['coupon']->value->end_date,"%d.%m.%Y");?>
</td>


                            <td valign="middle" align="center">
                                <?php if ($_smarty_tpl->tpl_vars['coupon']->value->code_next_coupon_id>0) {?>при <?php echo $_smarty_tpl->tpl_vars['coupon']->value->code_next_sum;?>
 р.

                                    <?php  $_smarty_tpl->tpl_vars["next_coupon"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["next_coupon"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['coupons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["next_coupon"]->key => $_smarty_tpl->tpl_vars["next_coupon"]->value) {
$_smarty_tpl->tpl_vars["next_coupon"]->_loop = true;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['next_coupon']->value->id==$_smarty_tpl->tpl_vars['coupon']->value->code_next_coupon_id) {?>
                                            - &laquo;<?php echo $_smarty_tpl->tpl_vars['next_coupon']->value->name;?>
&raquo;
                                        <?php }?>
                                    <?php } ?>
                                <?php }?>
                            </td>

                            <td valign="middle" align="center"><?php if ($_smarty_tpl->tpl_vars['coupon']->value->is_active==1) {?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
discount/coupons/active/4/<?php echo $_smarty_tpl->tpl_vars['coupon']->value->id;?>
/0/">Активный</a><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
discount/coupons/active/4/<?php echo $_smarty_tpl->tpl_vars['coupon']->value->id;?>
/1/">Не активный</a><?php }?></td>
                            <td valign="middle" align="center">

                                <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
coupons/id/<?php echo $_smarty_tpl->tpl_vars['coupon']->value->id;?>
/" title="Просмотрт кодов "><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/look.png" alt=""  style="vertical-align: middle" /></a>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
coupons/add/<?php echo $_smarty_tpl->tpl_vars['coupon']->value->id;?>
/?is_modal=1" rel="fancy" title="Редактировать "><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" alt=""  style="vertical-align: middle" /></a>
                                <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить купон в `<?php echo $_smarty_tpl->tpl_vars['coupon']->value->name;?>
%`?', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
discount/coupons/del/3/<?php echo $_smarty_tpl->tpl_vars['coupon']->value->id;?>
/');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" style="vertical-align: middle" hspace="1" title="Удалить купон" alt="Удалить" /></a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>

        </form>
    </div>
</div><?php }} ?>
