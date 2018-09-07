<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-04 17:16:12
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/basket/templates/basket_detailed_mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58155232555da20b97530c9-81193786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a047eabd874759e9a93b8673119114c4df7fe25' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/basket/templates/basket_detailed_mobile.tpl',
      1 => 1441288843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58155232555da20b97530c9-81193786',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55da20b98b9f12_01114812',
  'variables' => 
  array (
    'not_detailed' => 0,
    'url' => 0,
    'basket' => 0,
    'is_coupon' => 0,
    'user_coupon_code' => 0,
    'host_url' => 0,
    'basket_item' => 0,
    'gallery_url' => 0,
    '_shop_url' => 0,
    'shop' => 0,
    'product_id' => 0,
    'sizes' => 0,
    'size' => 0,
    'all_sum' => 0,
    'discount' => 0,
    'discount_sum' => 0,
    'setting' => 0,
    'order_form' => 0,
    'lacking' => 0,
    'sum_basket' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55da20b98b9f12_01114812')) {function content_55da20b98b9f12_01114812($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><div id="basket_detailed">
    <?php if ($_smarty_tpl->tpl_vars['not_detailed']->value!=1) {?>
        <div id="breadcrumbs-block">
            <div id="bread-back"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Назад</a></div>
            <h1 itemprop="name">Корзина</h1>
            <div class="clear">&nbsp;</div>
        </div>
    <?php } else { ?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['basket']->value) {?>

        <?php if ($_smarty_tpl->tpl_vars['is_coupon']->value==1) {?>
            <div class="discount-card">
                № дисконтной карты    &nbsp;    <input type="text" value="<?php if ($_SESSION['coupon_code']!='') {
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
        <table cellpadding="4" cellspacing="0"  width="100%" class="basket-detailed">
            <?php $_smarty_tpl->tpl_vars["all_sum"] = new Smarty_variable(0, null, 0);?>
            <?php  $_smarty_tpl->tpl_vars["basket_item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["basket_item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['basket']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["basket_item"]->key => $_smarty_tpl->tpl_vars["basket_item"]->value) {
$_smarty_tpl->tpl_vars["basket_item"]->_loop = true;
?>
                <tbody>
                    <?php $_smarty_tpl->tpl_vars["product_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['basket_item']->value->product_id, null, 0);?>
                    <tr>
                        <!--            <td valign="middle" align="center">&nbsp;</td>-->
                        <td valign="middle" align="center" style="text-align: center ;width: 70px;">
                            <?php if ($_smarty_tpl->tpl_vars['basket_item']->value->image) {?><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['basket_item']->value->image;?>
" alt="" /><?php }?>
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
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['basket_item']->value->name);?>
 </a>
                            <?php if (($_smarty_tpl->tpl_vars['shop']->value=='lady'||$_smarty_tpl->tpl_vars['shop']->value=='woman')&&$_smarty_tpl->tpl_vars['basket_item']->value->type!='1') {?>
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
                            <span class="price" style="font-size: 17px"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['basket_item']->value->sum_price,0),",","&nbsp;");?>
 руб.</span>
                            <span class="count">
                                <input type="text" maxlength="3" class="basket-text" value="<?php echo $_smarty_tpl->tpl_vars['basket_item']->value->count;?>
" onchange="basket(3, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->product_id;?>
, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->mod_id;?>
, 0, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->image_id)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_1)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_2)===null||$tmp==='' ? 0 : $tmp);?>
, 0, 0, 0, parseInt(this.value), <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->type;?>
);"/>
                            </span>
                            
                            <button alt="Удалить"  title="Удалить"  class="del-basket"  onclick="basket(2, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['basket_item']->value->mod_id;?>
, <?php echo $_smarty_tpl->tpl_vars['not_detailed']->value;?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->image_id)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_1)===null||$tmp==='' ? 0 : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['basket_item']->value->char_id_2)===null||$tmp==='' ? 0 : $tmp);?>
)" ></button>
                        </td>


                        
                    </tr>
                    <?php $_smarty_tpl->tpl_vars["all_sum"] = new Smarty_variable($_smarty_tpl->tpl_vars['all_sum']->value+$_smarty_tpl->tpl_vars['basket_item']->value->sum_price, null, 0);?>
                </tbody>
            <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td valign="middle" align="right" colspan="2" style="text-align: right;font-size: 18px;padding-top: 5px;" id="coupon_result">


                        Итого: <b style="font-size: 24px;font-weight: normal"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['all_sum']->value,0),",","&nbsp;");?>
 </b> р. <?php if ($_smarty_tpl->tpl_vars['discount']->value) {?><b style="font-size: 20px; color: #e41b1f">- <?php echo $_smarty_tpl->tpl_vars['discount']->value;?>
%</b> = <b style="font-size: 18px; font-weight: normal"><?php echo smarty_modifier_replace(number_format($_smarty_tpl->tpl_vars['discount_sum']->value,0),",","&nbsp;");?>
 р. </b><?php }?>


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
                $(document).ready(function () {
                    AjaxRequestAsync('coupon_result', base_url + 'discount/coupons/?is_html=1&number=' + $('#coupon_code_text').val());
                    $('#coupon_code').val($('#coupon_code_text').val());
                })

            <?php echo '</script'; ?>
>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['lacking']->value>=$_smarty_tpl->tpl_vars['sum_basket']->value) {?><br/><div class="free_delivery" style="text-align: center">* Добавьте товаров на <b><?php echo smarty_modifier_replace(number_format(($_smarty_tpl->tpl_vars['lacking']->value-$_smarty_tpl->tpl_vars['sum_basket']->value),0),",","&nbsp;");?>
 руб.</b>, доставка заказа станет <b>БЕСПЛАТНОЙ</b>!</div><?php }?>
    <?php } else { ?>
        <div class="text-page">
            <h2>В корзине нет товаров</h2>
        </div>
    <?php }?>
</div><?php }} ?>
