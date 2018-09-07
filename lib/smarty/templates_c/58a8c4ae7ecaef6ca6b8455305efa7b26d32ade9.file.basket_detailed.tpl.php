<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-03 18:08:35
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/basket/templates/basket_detailed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213587842755d47bcb0fc4d7-63429261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58a8c4ae7ecaef6ca6b8455305efa7b26d32ade9' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/basket/templates/basket_detailed.tpl',
      1 => 1441289071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213587842755d47bcb0fc4d7-63429261',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d47bcb2c95e4_97487330',
  'variables' => 
  array (
    'is_mobile' => 0,
    'not_detailed' => 0,
    'url' => 0,
    'basket' => 0,
    'is_coupon' => 0,
    'user_coupon_code' => 0,
    'host_url' => 0,
    'basket_item' => 0,
    'product_id' => 0,
    'is_size_model_repeat' => 0,
    'gallery_url' => 0,
    '_shop_url' => 0,
    'sizes' => 0,
    'size' => 0,
    'all_sum' => 0,
    'discount' => 0,
    'discount_sum' => 0,
    'setting' => 0,
    'order_form' => 0,
    'lacking' => 0,
    'sum_basket' => 0,
    'lacking_discount' => 0,
    'is_hide_sumka' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d47bcb2c95e4_97487330')) {function content_55d47bcb2c95e4_97487330($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("basket_detailed_mobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php } else { ?>
    <div id="basket_detailed">
        <?php if ($_smarty_tpl->tpl_vars['not_detailed']->value!=1) {?>
            <div class="breadcrumbs-block">
                <ul class="clearfix">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a></li>
                    <li>Корзина</li>
                </ul>
            </div>
            <div class="text">
                <h1>Корзина</h1>
            <?php } else { ?>
                <div class="text">
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['basket']->value) {?>

                    <?php if ($_smarty_tpl->tpl_vars['is_coupon']->value==1) {?>
                        <div style="float: right; font-size: 15px;">
                            Введите № Вашей дисконтной карты    &nbsp;    <input type="text" value="<?php if ($_SESSION['coupon_code']!='') {
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
                                <td valign="middle" align="center">Стоимость</td>
                                <td valign="middle" align="center">&nbsp;</td>
                            </tr>
                        </tbody>
                        <?php $_smarty_tpl->tpl_vars["all_sum"] = new Smarty_variable(0, null, 0);?>

                        <?php  $_smarty_tpl->tpl_vars["basket_item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["basket_item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['basket']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["basket_item"]->key => $_smarty_tpl->tpl_vars["basket_item"]->value) {
$_smarty_tpl->tpl_vars["basket_item"]->_loop = true;
?>
                            <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['basket_item']->value->product_id, null, 0);?>
                            <tbody<?php if (count($_smarty_tpl->tpl_vars['is_size_model_repeat']->value[$_smarty_tpl->tpl_vars['product_id']->value])>1) {?> class="is_basket_size_model_repeat"<?php }?>>
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
                                        <?php if ($_smarty_tpl->tpl_vars['basket_item']->value->shop_id=='1') {?>
                                            <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://lalipop.ru/", null, 0);?>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['basket_item']->value->shop_id=='2') {?>
                                            <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://lady.lalipop.ru/", null, 0);?>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['basket_item']->value->shop_id=='3') {?>
                                            <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://platok.lalipop.ru/", null, 0);?>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['basket_item']->value->shop_id=='4') {?>
                                            <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://sumka.lalipop.ru/", null, 0);?>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['basket_item']->value->shop_id=='5') {?>
                                            <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_variable("https://woman.lalipop.ru/", null, 0);?>
                                        <?php }?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['basket_item']->value->pseudo_dir;?>
/" style="font-size: 16px;"><?php echo stripslashes($_smarty_tpl->tpl_vars['basket_item']->value->name);?>
 </a>
                                        <?php if ($_smarty_tpl->tpl_vars['basket_item']->value->shop_id=='2') {?>
                                            <div class="notice" style="padding-top: 5px;">Размер:
                                                <?php  $_smarty_tpl->tpl_vars["size"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["size"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sizes']->value[$_smarty_tpl->tpl_vars['product_id']->value][2]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["size"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["size"]['total'] = $_smarty_tpl->tpl_vars["size"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["size"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["size"]->key => $_smarty_tpl->tpl_vars["size"]->value) {
$_smarty_tpl->tpl_vars["size"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["size"]['iteration']++;
?>
                                                    <?php echo $_smarty_tpl->tpl_vars['size']->value->name;
if ($_smarty_tpl->getVariable('smarty')->value['foreach']['size']['iteration']!=$_smarty_tpl->getVariable('smarty')->value['foreach']['size']['total']) {?>, <?php }?>
                                                <?php } ?>
                                                <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->char_name_1;?>

                                            </div>
                                        <?php }?>
                                        <div class="notice">
                                            <?php if ($_smarty_tpl->tpl_vars['basket_item']->value->warehouse<=0) {?>
                                                <span  style="font-size: 13px;color: red">под заказ</span><?php if ($_smarty_tpl->tpl_vars['basket_item']->value->is_credit==1) {?>, <?php }?>
                                            <?php }?>

                                            <?php if ($_smarty_tpl->tpl_vars['basket_item']->value->is_credit==1) {?>
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
                                    <td valign="middle" align="center"><span class="price" style="font-size: 17px"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['basket_item']->value->sum_price,0),",","&nbsp;");?>
 руб.</span></td>
                                    <td valign="middle" align="center">
                                        
                                        <button alt="Удалить"  title="Удалить"  class="del-basket"  onclick="basket(2, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->mod_id;?>
, <?php echo $_smarty_tpl->tpl_vars['not_detailed']->value;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->image_id)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_1)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_2)===null||$tmp==='' ? 0 : $tmp);?>
)" ></button>
                                    </td>
                                </tr>
                                <?php if (count($_smarty_tpl->tpl_vars['is_size_model_repeat']->value[$_smarty_tpl->tpl_vars['product_id']->value])>1) {?> 
                                        <tr>
                                            <td colspan="5" style="background-color: #e5e5e5; text-align: center">
                                                <span style="color: red">Заказать примерку товара можно только 1-ого размера. Если Вы хотите оформить заказ с примеркой, Вам необходимо удалить лишние размеры</span>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    <?php $_smarty_tpl->tpl_vars["all_sum"] = new Smarty_variable($_smarty_tpl->tpl_vars['all_sum']->value+$_smarty_tpl->tpl_vars['basket_item']->value->sum_price, null, 0);?>


                                </tbody>
                                <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td valign="middle" align="right" colspan="6" style="text-align: right;font-size: 18px;padding-top: 5px;" id="coupon_result">


                                                Итого: <b style="font-size: 24px;font-weight: normal"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['all_sum']->value,0),",","&nbsp;");?>
 </b> руб. <?php if ($_smarty_tpl->tpl_vars['discount']->value) {?><b style="font-size: 20px; color: #e41b1f">- <?php echo $_smarty_tpl->tpl_vars['discount']->value;?>
%</b> = <b style="font-size: 18px; font-weight: normal"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['discount_sum']->value,0),",","&nbsp;");?>
 руб. </b><?php }?>


                                            </td>
                                        </tr>
                                    </tfoot>
                                    

                                </table>



                                <?php if ($_smarty_tpl->tpl_vars['not_detailed']->value!=1) {?>

                                    <?php if ($_smarty_tpl->tpl_vars['setting']->value->min_price<=$_smarty_tpl->tpl_vars['all_sum']->value) {?>
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

                                <?php if ($_smarty_tpl->tpl_vars['is_coupon']->value==1) {?>
                                    <?php echo '<script'; ?>
 type="text/javascript">
                                        AjaxRequestAsync('coupon_result', base_url + 'discount/coupons/?is_html=1&number=' + $('#coupon_code_text').val());
                                        $('#coupon_code').val($('#coupon_code_text').val());
                                    <?php echo '</script'; ?>
>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['lacking']->value>=$_smarty_tpl->tpl_vars['sum_basket']->value||$_smarty_tpl->tpl_vars['lacking_discount']->value->discount>0) {?><br/>
                                    <div class="basket-notice">
                                        <?php if ($_smarty_tpl->tpl_vars['lacking']->value>=$_smarty_tpl->tpl_vars['sum_basket']->value) {?><div class="free_delivery">* Добавьте товаров на <b><?php echo smarty_modifier_replace(number_format(($_smarty_tpl->tpl_vars['lacking']->value-$_smarty_tpl->tpl_vars['sum_basket']->value),0),",","&nbsp;");?>
 руб.</b>, доставка заказа станет <b>БЕСПЛАТНОЙ</b>!</div><?php }?>

                                        <?php if ($_smarty_tpl->tpl_vars['lacking_discount']->value->discount>0) {?>

                                            <div class="free_delivery">* Добавьте товаров на сумму <b><?php echo smarty_modifier_replace(number_format(($_smarty_tpl->tpl_vars['lacking_discount']->value->sum_start-$_smarty_tpl->tpl_vars['sum_basket']->value),0),",","&nbsp;");?>
 руб.</b> и получите скидку <b><?php echo $_smarty_tpl->tpl_vars['lacking_discount']->value->discount;?>
%</b>!
                                                <br/>  </div>    

                                            <div class="notice"> <br/><span class="asterix">*</span> Вы можете выбрать любой товар из разделов <a href='https://lalipop.ru/' target="_blank">Бижутерия</a> / <a href='https://lady.lalipop.ru/' target="_blank">Одежда больших размеров</a> / <a href='https://woman.lalipop.ru/' target="_blank">Одежда</a> / <a href='https://platok.lalipop.ru/' target="_blank">Платки</a> / <a href='https://sumka.lalipop.ru/' target="_blank"<?php if ($_smarty_tpl->tpl_vars['is_hide_sumka']->value=='1') {?> class="hide"<?php }?>>Сумки</a><br/></div>
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
                                <?php }?><?php }} ?>
