<?php /* Smarty version 3.1.24, created on 2015-10-20 17:04:38
         compiled from "/home/admin/domains/coralmedia.ru/public_html/modules/delivery/templates/service_post.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1670959857562649f69acdc9_25133180%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3035e9ad53ce60aa3d530fe4377bc2d9b3f443c' => 
    array (
      0 => '/home/admin/domains/coralmedia.ru/public_html/modules/delivery/templates/service_post.tpl',
      1 => 1442305255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1670959857562649f69acdc9_25133180',
  'variables' => 
  array (
    'is_mobile' => 0,
    'get_user' => 0,
    'sum_basket' => 0,
    'price_russion_post' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_562649f6a7fb54_06920898',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_562649f6a7fb54_06920898')) {
function content_562649f6a7fb54_06920898 ($_smarty_tpl) {
if (!is_callable('smarty_function_math')) require_once '/home/admin/domains/coralmedia.ru/public_html/lib/smarty/plugins/function.math.php';

$_smarty_tpl->properties['nocache_hash'] = '1670959857562649f69acdc9_25133180';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
    <div style="padding-left: 20px;">
        <table style="width: 100%;">
            <tbody>

                <tr>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="city_index" id="city_index" value="<?php echo stripslashes((($tmp = @$_POST['city_index'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city_index : $tmp));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 100%" id="index" placeholder="Индекс"/> 
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="city"  id="city" value="<?php echo stripslashes((($tmp = @$_POST['city'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city : $tmp));?>
" class="text"   maxlength="255" style="width: 100%" placeholder="Город"/> 
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="left">
                        <textarea name="adress" placeholder="Адрес, по которому будет производиться доставка" style="width: 100%; height: 100px"><?php echo $_POST['adress'];?>
</textarea>
                    </td>
                </tr>

                <?php echo $_smarty_tpl->getSubTemplate ("free_delivery_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            </tbody>
        </table>
    </div>
<?php } else { ?>
    <table class="table_fields">
        <tbody>
            <tr>
                <td valign="top" align="right" style="text-align: right">Адрес доставки: <span class="asterix">*</span></td>
                <td valign="middle" align="left" style="text-align: left">
                    <input type="text" size="30" name="city_index" id="city_index" value="<?php echo stripslashes((($tmp = @$_POST['city_index'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city_index : $tmp));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 80px" id="index" placeholder="Индекс"/> 
                    <input type="text" size="30" name="city"  id="city" value="<?php echo stripslashes((($tmp = @$_POST['city'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city : $tmp));?>
" class="text"   maxlength="255" style="width: 230px" placeholder="Город"/> 

                </td>
            </tr>
            <tr>
                <td valign="top" align="right" style="text-align: right"> </td>

                <td valign="middle" align="left">
                    <input type="text" name="street" value="<?php echo $_POST['street'];?>
" id="street" placeholder="Улица" style="width: 330px;" />
                </td>

                
            </tr>
            <tr>
                <td valign="top" align="right" style="text-align: right"></td>
                <td valign="middle" align="left">
                    <input type="text" name="house" value="<?php echo $_POST['house'];?>
" id="house" placeholder="Дом" style="width: 65px" />
                    <input type="text" name="housing" value="<?php echo $_POST['housing'];?>
"  placeholder="Корпус" style="width: 65px" />
                    <input type="text" name="building" value="<?php echo $_POST['building'];?>
"  placeholder="Строение" style="width: 70px" />
                    <input type="text" name="appartment" value="<?php echo $_POST['appartment'];?>
"  placeholder="Квартира" style="width: 70px" />
                </td>
            </tr>
            <?php echo $_smarty_tpl->getSubTemplate ("free_delivery_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </tbody>
    </table>
<?php }?>

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