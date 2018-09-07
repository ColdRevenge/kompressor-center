<?php /* Smarty version 3.1.24, created on 2018-07-02 10:45:18
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/order/templates/add_form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:8089105575b39d80e213278_99578841%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b04a21648762136867d36914d5b9cf26ccfd32e8' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/order/templates/add_form.tpl',
      1 => 1530509482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8089105575b39d80e213278_99578841',
  'variables' => 
  array (
    'delivery' => 0,
    'item' => 0,
    'icons_url' => 0,
    'sum_basket' => 0,
    'delivery_id' => 0,
    'delivery_child' => 0,
    'ikey' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39d80e2e2380_92590830',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39d80e2e2380_92590830')) {
function content_5b39d80e2e2380_92590830 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8089105575b39d80e213278_99578841';
?>
<form method="post" class="order-form" id="form_order" action="" style=" margin-bottom: 20px;margin-top: 10px;">
    <input type="hidden" name="coupon_code" value="" id="coupon_code" />
    <div class="l-layout">
        <div class="l-layout__sidebar">
            <h2 class="headline -small">Контактная информация</h2>
            <div class="form-group">
                <label for="order-form-fio" class="form-label">ФИО: <span class="asterix">*</span></label>
                <input type="text" id="order-form-fio" class="form-control" value="<?php echo $_POST['fio'];?>
" name="fio" id="fio" maxlength="255" />
            </div>
            <div class="form-group">
                <label for="order-form-fio" class="form-label">Телефон: <span class="asterix">*</span></label>
                <input type="text" class="form-control" value="<?php echo $_POST['phone'];?>
" name="phone" maxlength="255" id="phone_mask" />
            </div>
            <div class="form-group">
                <label for="order-form-fio" class="form-label">E-mail: <span class="asterix">*</span></label>
                <input type="text" id="email_check" class="form-control" value="<?php echo $_POST['email'];?>
" name="email" maxlength="255" />
            </div>
            <div class="form-group">
                <label for="order-form-fio" class="form-label">Комментарий: <span class="asterix">*</span></label>
                <textarea class="form-control" placeholder="Комментарий" name="comment"><?php echo $_POST['comment'];?>
</textarea>
            </div>
        </div>
        <div class="l-layout__content">
            <h2 class="headline -small">Информация о доставке</h2>
            <div class="delivery">
                <div class="delivery__item">
                    <?php
$_from = $_smarty_tpl->tpl_vars['delivery']->value[0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                        <?php $_smarty_tpl->tpl_vars["delivery_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['item']->value->id, null, 0);?>
                        <label class="delivery__label">
                            <span class="delivery__radio"><input type="radio" class="js-delivery-radio" name="delivery_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value->service;?>
" /><span>&nbsp;</span></span>
                            <span class="delivery__icon"><?php if ($_smarty_tpl->tpl_vars['item']->value->icon) {?><img src="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['item']->value->icon;?>
" alt="" /><?php }?></span>
                            <span class="delivery__desc">
                                <?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>

                                <?php if ($_smarty_tpl->tpl_vars['item']->value->free_sum-$_smarty_tpl->tpl_vars['sum_basket']->value <= 0) {?>
                                    - <b style="color: red">Бесплатно!</b>
                                <?php } elseif ($_smarty_tpl->tpl_vars['item']->value->price != 0) {?>
                                    - <b><?php echo $_smarty_tpl->tpl_vars['item']->value->price;?>
 руб.</b>
                                <?php }?>
                                <div class="delivery__desc-info"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->info);?>
</div>
                            </span>
                        </label>
                        <?php if ($_smarty_tpl->tpl_vars['item']->value->service) {?> 
                            <div class="delivery-service" id="delivery-service-<?php echo $_smarty_tpl->tpl_vars['delivery_id']->value;?>
"></div>
                        <?php }?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['delivery']->value[$_smarty_tpl->tpl_vars['delivery_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["delivery_child"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["delivery_child"]->_loop = false;
$_smarty_tpl->tpl_vars["ikey"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["ikey"]->value => $_smarty_tpl->tpl_vars["delivery_child"]->value) {
$_smarty_tpl->tpl_vars["delivery_child"]->_loop = true;
$foreach_delivery_child_Sav = $_smarty_tpl->tpl_vars["delivery_child"];
?>
                            <div class="delivery-child" id="delivery-child-<?php echo $_smarty_tpl->tpl_vars['delivery_id']->value;?>
">
                                <label class="check-style">
                                    <span class="delivery_radio_child">
                                    <input type="radio" name="delivery_child_id" class="delivery_child_id" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value->service;?>
" value="<?php echo $_smarty_tpl->tpl_vars['delivery_child']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['ikey']->value == 0) {?>checked<?php }?> />
                                    <span>&nbsp;</span></span>
                                    <span class="delivery-child__desc">
                                        <?php echo stripslashes($_smarty_tpl->tpl_vars['delivery_child']->value->name);?>
 <?php if ($_smarty_tpl->tpl_vars['delivery_child']->value->price != 0) {?> - <b><?php echo $_smarty_tpl->tpl_vars['delivery_child']->value->price;?>
 руб.</b><?php }?>
                                        <div class="delivery-child__info"><?php echo stripslashes($_smarty_tpl->tpl_vars['delivery_child']->value->info);?>
</div>
                                    </span>
                                </label>
                            </div>
                        <?php
$_smarty_tpl->tpl_vars["delivery_child"] = $foreach_delivery_child_Sav;
}
?>
                    <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn -rounded5 -broader" value="Оформить" />
            </div>
        </div>
    </div>
</form><?php }
}
?>