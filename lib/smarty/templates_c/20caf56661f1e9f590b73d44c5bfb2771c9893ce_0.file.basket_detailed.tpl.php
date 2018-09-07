<?php /* Smarty version 3.1.24, created on 2017-01-28 02:36:38
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/basket/templates/basket_detailed.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:980388996588bd9868c00f8_50011231%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20caf56661f1e9f590b73d44c5bfb2771c9893ce' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/basket/templates/basket_detailed.tpl',
      1 => 1485559637,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '980388996588bd9868c00f8_50011231',
  'variables' => 
  array (
    'is_mobile' => 0,
    'not_detailed' => 0,
    'url' => 0,
    'basket' => 0,
    'is_coupon' => 0,
    'user_coupon_code' => 0,
    'host_url' => 0,
    'setting' => 0,
    'basket_item' => 0,
    'product_id' => 0,
    'is_size_model_repeat' => 0,
    'gallery_url' => 0,
    'shop_url' => 0,
    'sizes' => 0,
    'size' => 0,
    'all_sum' => 0,
    'discount' => 0,
    'discount_sum' => 0,
    'order_form' => 0,
    'lacking' => 0,
    'sum_basket' => 0,
    'lacking_discount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588bd986a6bbe4_66186605',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588bd986a6bbe4_66186605')) {
function content_588bd986a6bbe4_66186605 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc-pskov/data/www/kc-pskov.ru/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '980388996588bd9868c00f8_50011231';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("basket_detailed_mobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } else { ?>
    <div id="basket_detailed">
        <?php if ($_smarty_tpl->tpl_vars['not_detailed']->value != 1) {?>
            <div class="breadcrumbs-block">
                <ul class="clearfix">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
                    <li>Корзина</li>
                </ul>
            </div>
            <div class="text">
                <h1>Корзина</h1>
            <?php } else { ?>
                <div class="text">
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['basket']->value) {?>

                    <?php if ($_smarty_tpl->tpl_vars['is_coupon']->value == 1) {?>
                        <div style="float: right; font-size: 15px;">
                            Введите № Вашей дисконтной карты    &nbsp;    <input type="text" value="<?php if ($_SESSION['coupon_code'] != '') {
echo $_SESSION['coupon_code'];
} else {
echo $_smarty_tpl->tpl_vars['user_coupon_code']->value;
}?>" name="coupon_code" id="coupon_code_text" style="width: 95px;text-align: center" maxlength="9" onchange="AjaxRequest('coupon_result', '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
discount/coupons/?is_html=1&number=' + $(this).val());
                                    $('#coupon_code').val(this.value);" onkeyup="AjaxRequest('coupon_result', '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
discount/coupons/?is_html=1&number=' + this.value);
                                            $('#coupon_code').val(this.value)" /> 
                        <?php }?>
                    </div>
                    <style type="text/css">
                        #content .is_basket_size_model_repeat td {
                            background-color: #f5f5f5;
                        }
                        #content .is_basket_size_model_repeat td .price {
                            color: gray;
                        }
                        #content .is_basket_size_model_repeat td img, #content .is_basket_size_model_repeat td button, #content .is_basket_size_model_repeat td .count a {
                            -webkit-filter: grayscale(1); /* Webkit браузеры */  
                            filter: gray; /* для IE6-9 */  
                            filter: grayscale(1); /* W3C */  
                        }
                        #content .is_basket_size_model_repeat td a {
                            color: gray;
                        }
                    </style>
                    <table cellpadding="4" cellspacing="0" border="3" width="100%">
                        <tbody>
                            <tr>
                                <td valign="middle" align="center" style="width: 90px;">&nbsp;</td>
                                <!--                <td valign="middle" align="center">&nbsp;</td>-->
                                <td valign="middle" align="center" style="width:300px;">Название</td>
                                <td valign="middle" align="center" style="width: 140px;">Количество</td>
                                <td valign="middle" align="center" <?php if ($_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>style="display: none;"<?php }?>>Стоимость</td>
                                <td valign="middle" align="center">&nbsp;</td>
                            </tr>
                        </tbody>
                        <?php $_smarty_tpl->tpl_vars["all_sum"] = new Smarty_Variable(0, null, 0);?>

                        <?php
$_from = $_smarty_tpl->tpl_vars['basket']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["basket_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["basket_item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["basket_item"]->value) {
$_smarty_tpl->tpl_vars["basket_item"]->_loop = true;
$foreach_basket_item_Sav = $_smarty_tpl->tpl_vars["basket_item"];
?>
                            <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['basket_item']->value->product_id, null, 0);?>
                            <tbody<?php if (count($_smarty_tpl->tpl_vars['is_size_model_repeat']->value[$_smarty_tpl->tpl_vars['product_id']->value]) > 1) {?> class="is_basket_size_model_repeat"<?php }?>>
                                <tr>
                                    <!--            <td valign="middle" align="center">&nbsp;</td>-->
                                    <td valign="middle" align="center" style="text-align: center">
                                        <?php if ($_smarty_tpl->tpl_vars['basket_item']->value->image) {?><a href="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['basket_item']->value->big_image;?>
" rel="prettyPhoto[gallery8]" title=""><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['basket_item']->value->image;?>
" alt="" /></a><?php }?>

                                    </td>
                                    <td valign="middle" align="center" style="text-align: left;">
                                        <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable($_smarty_tpl->tpl_vars['url']->value, null, 0);?>
                                        
                                        
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['basket_item']->value->pseudo_dir;?>
/" style="font-size: 15px;"><?php echo stripslashes($_smarty_tpl->tpl_vars['basket_item']->value->name);?>
 </a>
                                        <?php if ($_smarty_tpl->tpl_vars['basket_item']->value->shop_id == '2') {?>
                                            <div class="notice" style="padding-top: 5px;">Размер:
                                                <?php
$_from = $_smarty_tpl->tpl_vars['sizes']->value[$_smarty_tpl->tpl_vars['product_id']->value][2];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["size"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["size"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_size'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["size"]->value) {
$_smarty_tpl->tpl_vars["size"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_size']->value['iteration']++;
$foreach_size_Sav = $_smarty_tpl->tpl_vars["size"];
?>
                                                    <?php echo $_smarty_tpl->tpl_vars['size']->value->name;
if ((isset($_smarty_tpl->tpl_vars['__foreach_size']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_size']->value['iteration'] : null) != (isset($_smarty_tpl->tpl_vars['__foreach_size']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_size']->value['total'] : null)) {?>, <?php }?>
                                                <?php
$_smarty_tpl->tpl_vars["size"] = $foreach_size_Sav;
}
?>
                                                <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->char_name_1;?>

                                            </div>
                                        <?php }?>
                                        <div class="notice">
                                            <?php if ($_smarty_tpl->tpl_vars['basket_item']->value->warehouse <= 0) {?>
                                                <span  style="font-size: 13px;color: red">под заказ</span><?php if ($_smarty_tpl->tpl_vars['basket_item']->value->is_credit == 1) {?>, <?php }?>
                                            <?php }?>

                                            <?php if ($_smarty_tpl->tpl_vars['basket_item']->value->is_credit == 1) {?>
                                                <span  style="font-size: 13px;color: green">в кредит</span>
                                            <?php }?>
                                        </div>
                                        
                                        </div>
                                    </td>
                                    <td valign="middle" align="center"> 


                                        <span class="count">
                                            <a href="javascript: void(0);" class="less" onclick="if ($(this).next('input').val() <= 1)
                                                        if (!confirm('Удалить товар?'))
                                                            return false;
                                                    basket(4, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->product_id;?>
, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->mod_id;?>
, 0, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->image_id)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_1)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_2)===null||$tmp==='' ? 0 : $tmp);?>
, 0, 0, 0, parseInt($(this).next().val()), <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->type;?>
);">-</a><input type="text" maxlength="3" class="basket-text" value="<?php echo $_smarty_tpl->tpl_vars['basket_item']->value->count;?>
" style="border-left: 0; border-right: 0" onchange="basket(3, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->product_id;?>
, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->mod_id;?>
, 0, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->image_id)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_1)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_2)===null||$tmp==='' ? 0 : $tmp);?>
, 0, 0, 0, parseInt(this.value), <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->type;?>
);"/><a href="javascript: void(0);" class="more" onclick="basket(3, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->product_id;?>
, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->mod_id;?>
, 0, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->image_id)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_1)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_2)===null||$tmp==='' ? 0 : $tmp);?>
, 0, 0, 0, parseInt($(this).prev().val()) + 1, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->type;?>
);">+</a>
                                        </span>
                                    </td>

                                    </td>
                                    <td valign="middle" align="center" <?php if ($_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>style="display: none;"<?php }?>>
                                        <span class="price" style="font-size: 17px">
                                            <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['basket_item']->value->sum_price,0),",","&nbsp;");?>
 руб.
                                        </span>
                                    </td>
                                    <td valign="middle" align="center">
                                        <button alt="Удалить"  title="Удалить"  class="del-basket"  onclick="basket(2, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->mod_id;?>
, <?php echo $_smarty_tpl->tpl_vars['not_detailed']->value;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->image_id)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_1)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_2)===null||$tmp==='' ? 0 : $tmp);?>
)" >
                                        </button>
                                    </td>
                                </tr>
                                <?php if (count($_smarty_tpl->tpl_vars['is_size_model_repeat']->value[$_smarty_tpl->tpl_vars['product_id']->value]) > 1) {?> 
                                        <tr>
                                            <td colspan="5" style="background-color: #e5e5e5; text-align: center">
                                                <span style="color: red">Заказать примерку товара можно только 1-ого размера. Если Вы хотите оформить заказ с примеркой, Вам необходимо удалить лишние размеры</span>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <?php $_smarty_tpl->tpl_vars["all_sum"] = new Smarty_Variable($_smarty_tpl->tpl_vars['all_sum']->value+$_smarty_tpl->tpl_vars['basket_item']->value->sum_price, null, 0);?>


                                </tbody>
                                <?php
$_smarty_tpl->tpl_vars["basket_item"] = $foreach_basket_item_Sav;
}
?>
                                    </tbody>
                                    <tfoot  <?php if ($_smarty_tpl->tpl_vars['setting']->value->hide_prices) {?>style="display: none;"<?php }?>>
                                        <tr>
                                            <td valign="middle" align="right" colspan="6" style="text-align: right;font-size: 18px;padding-top: 5px;" id="coupon_result">


                                                Итого: 
                                                <b style="font-size: 24px;font-weight: normal">
                                                    <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['all_sum']->value,0),",","&nbsp;");?>
 
                                                </b> руб. 
                                                <?php if ($_smarty_tpl->tpl_vars['discount']->value) {?>
                                                    <b style="font-size: 20px; color: #e41b1f">
                                                        - <?php echo $_smarty_tpl->tpl_vars['discount']->value;?>
%
                                                    </b>
                                                     = 
                                                    <b style="font-size: 18px; font-weight: normal">
                                                        <?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['discount_sum']->value,0),",","&nbsp;");?>
 руб. 
                                                    </b>
                                                <?php }?>


                                            </td>
                                        </tr>
                                    </tfoot>
                                    

                                </table>



                                <?php if ($_smarty_tpl->tpl_vars['not_detailed']->value != 1) {?>

                                    <?php if ($_smarty_tpl->tpl_vars['setting']->value->min_price <= $_smarty_tpl->tpl_vars['all_sum']->value) {?>
                                        <div id="order_button"><button onclick="$(this).parent().hide();
                                                showJQuery('order_form', 1);
                                                jQuery.scrollTo('#order_form', 700);
                                                return  false;"></button></div>
                                        <div style="display: none" id="min_order_price_block">
                                            <h2 style="color: red; text-align: center">Минимальная сумма заказа <?php echo stripslashes($_smarty_tpl->tpl_vars['setting']->value->min_price);?>
 руб.</h2>
                                        </div>


                                        <div id="order_form"<?php if ($_POST['fio']) {?> style="display: block"<?php }?>>
                                            
                                            <?php echo $_smarty_tpl->tpl_vars['order_form']->value;?>

                                        </div>
                                    <?php } else { ?>
                                        <h2 style="color: red; text-align: center">Минимальная сумма заказа <?php echo stripslashes($_smarty_tpl->tpl_vars['setting']->value->min_price);?>
 руб.</h2>
                                    <?php }?>
                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['is_coupon']->value == 1) {?>
                                    <?php echo '<script'; ?>
 type="text/javascript">
                                        AjaxRequestAsync('coupon_result', base_url + 'discount/coupons/?is_html=1&number=' + $('#coupon_code_text').val());
                                        $('#coupon_code').val($('#coupon_code_text').val());
                                    <?php echo '</script'; ?>
>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['lacking']->value >= $_smarty_tpl->tpl_vars['sum_basket']->value || $_smarty_tpl->tpl_vars['lacking_discount']->value->discount > 0) {?><br/>
                                    <div class="basket-notice">
                                        <?php if ($_smarty_tpl->tpl_vars['lacking']->value >= $_smarty_tpl->tpl_vars['sum_basket']->value) {?>
                                            <div class="free_delivery">* При заказе от <?php echo $_smarty_tpl->tpl_vars['lacking']->value;?>
 рублей - <a href="/dostavka/" target="_blank">доставка</a> по городу бесплатно</div>
                                        <?php }?>
                                        
                                        <?php if ($_smarty_tpl->tpl_vars['lacking_discount']->value->discount > 0) {?>

                                            <div class="free_delivery">* Добавьте товаров на сумму <b><?php echo smarty_modifier_replace(number_format(($_smarty_tpl->tpl_vars['lacking_discount']->value->sum_start-$_smarty_tpl->tpl_vars['sum_basket']->value),0),",","&nbsp;");?>
 руб.</b> и получите скидку <b><?php echo $_smarty_tpl->tpl_vars['lacking_discount']->value->discount;?>
%</b>!
                                                <br/>  </div>    

                                            <?php }?>
                                    </div>
                                <?php }?>
                                <?php } else { ?>
                                    <div class="text-page">
                                        <h2>В корзине нет товаров</h2>
                                    </div>
                                    <?php }?>
                                    </div>
                                </div>
                                <?php }
}
}
?>