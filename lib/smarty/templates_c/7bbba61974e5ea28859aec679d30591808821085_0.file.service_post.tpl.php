<?php /* Smarty version 3.1.24, created on 2015-09-13 16:50:22
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/delivery/templates/service_post.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:152666724955f57f1ee963e8_29736242%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bbba61974e5ea28859aec679d30591808821085' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/delivery/templates/service_post.tpl',
      1 => 1440345342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152666724955f57f1ee963e8_29736242',
  'variables' => 
  array (
    'is_mobile' => 0,
    'get_user' => 0,
    'sum_basket' => 0,
    'price_russion_post' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57f1f080833_67271421',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57f1f080833_67271421')) {
function content_55f57f1f080833_67271421 ($_smarty_tpl) {
if (!is_callable('smarty_function_math')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/function.math.php';

$_smarty_tpl->properties['nocache_hash'] = '152666724955f57f1ee963e8_29736242';
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