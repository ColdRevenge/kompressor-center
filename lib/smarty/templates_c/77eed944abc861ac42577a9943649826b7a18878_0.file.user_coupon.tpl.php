<?php /* Smarty version 3.1.24, created on 2015-09-13 16:52:08
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/users/templates/user_coupon.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:153706420655f57f88da5367_29591338%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77eed944abc861ac42577a9943649826b7a18878' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/users/templates/user_coupon.tpl',
      1 => 1439728030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153706420655f57f88da5367_29591338',
  'variables' => 
  array (
    'param_tpl' => 0,
    'order_user_id' => 0,
    'admin_url' => 0,
    'coupon_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57f88df1454_16284865',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57f88df1454_16284865')) {
function content_55f57f88df1454_16284865 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '153706420655f57f88da5367_29591338';
if ($_smarty_tpl->tpl_vars['param_tpl']->value['user_id'] > 0 || $_smarty_tpl->tpl_vars['order_user_id']->value > 0) {?>

    <tr>
        <td valign="middle" align="right">Номер купона:</td>
        <td valign="middle" align="left">
            <?php echo '<script'; ?>
 type="text/javascript">
                CouponUser = {
                    user_id: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['param_tpl']->value['user_id'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order_user_id']->value : $tmp);?>
,
                    addCoupon: function () {
                        answer = AjaxRequestAsync('', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/coupon/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['param_tpl']->value['user_id'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order_user_id']->value : $tmp);?>
/' + (($('#coupon_sum').attr('checked') == 'checked') ? 1 : 0) + '/?coupon=' + $('#coupon_name').val());
                        if (answer == 'not_coupon') { //Если купона не существует, предлагаем его создать по минимальной скидке купонов
                            if (confirm('Купона с номером ' + $('#coupon_name').val() + ' не существует, создать его?')) {
                                answer_add = AjaxRequestAsync('', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/coupon/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['param_tpl']->value['user_id'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order_user_id']->value : $tmp);?>
/' + (($('#coupon_sum').attr('checked') == 'checked') ? 1 : 0) + '/?coupon_add=' + $('#coupon_name').val());
                                if (answer_add == 'empty_code') {
                                    alert('Ошибка: Нельзя добавить пустой купон');
                                }
                                else if (answer_add == 'empty_code_added') {
                                    alert('Ошибка: Купон уже добавлен');
                                }
                                else {
                                    $('#coupon_tbody').html(answer_add);
                                }

                            }
                        }
                        else {
                            $('#coupon_tbody').html(answer);
                            $('#coupon_tbody script').each(function () {
                                eval($(this).html());
                            });
                        }
                        return false;
                    },
                    delCoupon: function (coupon_id) {
                        AjaxRequestAsync('coupon_tbody', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
users/admin/coupon/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['param_tpl']->value['user_id'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order_user_id']->value : $tmp);?>
/' + (($('#coupon_sum').attr('checked') == 'checked') ? 1 : 0) + '/?del_coupon_id=' + coupon_id);
                    }
                }

            <?php echo '</script'; ?>
>
            <?php if ($_smarty_tpl->tpl_vars['coupon_code']->value == 0) {?>
                <input type="text" name="coupon" id="coupon_name" value='' maxlength="255" style="width: 160px;"/>&nbsp;<button onclick="CouponUser.addCoupon();
                        return false">Привязать</button>
                    <div class="notice" style="margin: 3px 0;<?php if ($_smarty_tpl->tpl_vars['order_user_id']->value > 0 && $_smarty_tpl->tpl_vars['param_tpl']->value['user_id'] == 0) {?> display: none<?php }?>"><label class="p-check"><input type="checkbox" checked="checked" name="coupon_sum" id="coupon_sum" value="1" /><em>&nbsp;</em><span>Начислить на купон сумму заказов</span></label></div>

            <?php } else { ?>
                <b><?php echo $_smarty_tpl->tpl_vars['coupon_code']->value;?>
</b>&nbsp;&nbsp;
                <button onclick="CouponUser.delCoupon('<?php echo $_smarty_tpl->tpl_vars['coupon_code']->value;?>
');
                        return false;">Отвязать купон</button> 
                            <div class="notice" style="margin: 3px 0;"><label class="p-check"><input type="checkbox" name="coupon_sum" id="coupon_sum" value="1" /><em>&nbsp;</em><span>Вычесть сумму заказов пользователя</span></label></div>

            <?php }?>


        </td>
    </tr>
<?php }
}
}
?>