<?php /* Smarty version 3.1.24, created on 2018-07-05 11:22:21
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/delivery/templates/service_post.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:8868197165b3dd53d13a689_28383953%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d59f4c490ef35eab2007ad60d70bcb77cfc6e66' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/delivery/templates/service_post.tpl',
      1 => 1530509462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8868197165b3dd53d13a689_28383953',
  'variables' => 
  array (
    'get_user' => 0,
    'sum_basket' => 0,
    'price_russion_post' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b3dd53d1f8da1_93608759',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b3dd53d1f8da1_93608759')) {
function content_5b3dd53d1f8da1_93608759 ($_smarty_tpl) {
if (!is_callable('smarty_function_math')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/function.math.php';

$_smarty_tpl->properties['nocache_hash'] = '8868197165b3dd53d13a689_28383953';
?>
<table class="table_fields">
    <tbody>
        <tr>
            <td valign="top" align="right" style="text-align: right; padding-top: 8px;"><label class="form-label">Адрес доставки: <span class="asterix">*</span></label></td>
            <td valign="middle" align="left" style="text-align: left; padding-bottom: 10px;">
                <input type="text" size="30" name="city_index" id="city_index" value="<?php echo stripslashes((($tmp = @$_POST['city_index'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city_index : $tmp));?>
" class="form-control" maxlength="255" style="width: 80px" id="index" placeholder="Индекс"/> 
                <input type="text" size="30" name="city" class="form-control" id="city" value="<?php echo stripslashes((($tmp = @$_POST['city'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city : $tmp));?>
" maxlength="255" style="width: 246px" placeholder="Город"/> 
            </td>
        </tr>
        <tr>
            <td valign="top" align="right" style="text-align: right"> </td>

            <td valign="middle" align="left">
                <input type="text" class="form-control" name="street" value="<?php echo $_POST['street'];?>
" id="street" placeholder="Улица" style="width: 330px;" />
            </td>
        </tr>
        <tr>
            <td valign="top" align="right" style="text-align: right"></td>
            <td valign="middle" align="left">
                <input type="text" class="form-control -small" name="house" value="<?php echo $_POST['house'];?>
" id="house" placeholder="Дом" style="width: 77px" />
                <input type="text" class="form-control -small" name="housing" value="<?php echo $_POST['housing'];?>
"  placeholder="Корпус" style="width: 77px" />
                <input type="text" class="form-control -small" name="building" value="<?php echo $_POST['building'];?>
"  placeholder="Строение" style="width: 82px" />
                <input type="text" class="form-control -small" name="appartment" value="<?php echo $_POST['appartment'];?>
"  placeholder="Квартира" style="width: 82px" />
            </td>
        </tr>
        <?php echo $_smarty_tpl->getSubTemplate ("free_delivery_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </tbody>
</table>

<?php if ($_smarty_tpl->tpl_vars['sum_basket']->value < 1000) {?>
    <?php echo smarty_function_math(array('assign'=>"price_russion_post",'equation'=>"40 + (y * 0.05)",'y'=>$_smarty_tpl->tpl_vars['sum_basket']->value),$_smarty_tpl);?>

<?php } elseif ($_smarty_tpl->tpl_vars['sum_basket']->value < 5000) {?>
    <?php echo smarty_function_math(array('assign'=>"price_russion_post",'equation'=>"50 + (y * 0.04)",'y'=>$_smarty_tpl->tpl_vars['sum_basket']->value),$_smarty_tpl);?>

<?php } elseif ($_smarty_tpl->tpl_vars['sum_basket']->value < 20000) {?>
    <?php echo smarty_function_math(array('assign'=>"price_russion_post",'equation'=>"150 + (y * 0.02)",'y'=>$_smarty_tpl->tpl_vars['sum_basket']->value),$_smarty_tpl);?>

<?php } elseif ($_smarty_tpl->tpl_vars['sum_basket']->value >= 20000) {?>
    <?php echo smarty_function_math(array('assign'=>"price_russion_post",'equation'=>"250 + (y * 0.015)",'y'=>$_smarty_tpl->tpl_vars['sum_basket']->value),$_smarty_tpl);?>

<?php }?>
<?php echo '<script'; ?>
 type="text/javascript">
    if ($('#method_payments input:checked').val() == 1) {
        $('#post_nal_notice').show();
        $('#method_payments input').change(function () {
            if ($('#method_payments input:checked').val() == 1) {
                $('#post_nal_notice').show();
            }
            else {
                $('#post_nal_notice').hide();
            }
        })
    }
<?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->tpl_vars['price_russion_post']->value > 0) {?>
    <div class="notice" style="color: red;display: none;text-align: center; padding-bottom: 10px;" id="post_nal_notice">При получении заказа почта России взимает комиссию за отправку наложеного платежа<br/> в размере  <strong style="display:inline;vertical-align:top;"><?php echo $_smarty_tpl->tpl_vars['price_russion_post']->value;?>
 руб.</strong> <br/>При оплате банковской картой (Visa / MasterCard) или Яндекс деньгами комиссия за отправку наложеного платежа не взимается.</div>
<?php }
}
}
?>