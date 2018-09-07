<?php /* Smarty version 3.1.24, created on 2015-09-14 07:11:07
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/order/templates/add_form_mobile.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:84001216555f648db177072_48698111%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5beed2d6d736a1532233ba822fe3270bd691624' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/order/templates/add_form_mobile.tpl',
      1 => 1434394236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84001216555f648db177072_48698111',
  'variables' => 
  array (
    'get_user' => 0,
    'payment_methods' => 0,
    'method' => 0,
    'delivery' => 0,
    'item' => 0,
    'sum_basket' => 0,
    'delivery_id' => 0,
    'delivery_child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f648db2f9d19_04615897',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f648db2f9d19_04615897')) {
function content_55f648db2f9d19_04615897 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '84001216555f648db177072_48698111';
?>
<form method="post" class="niceform" id="form_order" action="" style=" margin-bottom: 20px;margin-top: 10px;">
    <input type="hidden" name="coupon_code" value="" id="coupon_code" />
    <table cellpadding="3" cellspacing="0" border="0" id="basket_table" style="margin-left: 0px;width: 100%">
        <tbody  class="order-block">
            <tr>
                <td valign="middle" align="left"  style="text-align: left">
                    <h2>Контактная информация</h2>
                    <table cellpadding="1" cellspacing="0" border="0" id="basket_table" style="margin-left: 0px;width: 100%">
                        <tr>
                            <td valign="middle" align="left">
                                <input type="text" class="text" value="<?php echo $_POST['fio'];?>
" style="width: 100%;" name="fio" placeholder="ФИО" id="fio" maxlength="255" />
                                <label for="fio"></label></td>

                        </tr> 
                        <tr>
                            <td valign="middle" align="left"><input type="text" class="text" placeholder="Телефон" value="<?php echo $_POST['phone'];?>
" style="width: 100%;" name="phone" maxlength="255" id="phone_mask" />
                                <label for="phone"></label>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="left"><input type="text" id="email_check" placeholder="E-mail" class="text" value="<?php echo $_POST['email'];?>
" style="width: 100%;" name="email" maxlength="255" />
                                <label for="email"></label>
                                
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="left">
                                <textarea class="text" placeholder="Комментарий" style="width: 100%;height: 102px;" name="comment"><?php echo $_POST['comment'];?>
</textarea>
                            </td>
                        </tr>
                        <tr style="display: none;">
                            <td valign="middle" align="right">&nbsp;</td>
                            <td valign="middle" align="left" style="text-align: left">
                                <input type="radio" value="0"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person == '0' || $_POST['is_jur_person'] == '0' || $_smarty_tpl->tpl_vars['get_user']->value->is_jur_person == '') {?> checked="checked"<?php }?> onchange="$('#jur_person_block').fadeOut('slow', function () {
                                            $(this).css('display', 'none');});" name="is_jur_person" id="is_jur_person_0" /><label for="is_jur_person_0" style="display: inline">Физ. лицо</label>

                                <input type="radio" value="1"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person == '1' || $_POST['is_jur_person'] == '1') {?> checked="checked"<?php }?> onchange="$('#jur_person_block').fadeIn('slow', function () {
                                            $(this).css('display', 'table-row-group');});" name="is_jur_person" id="is_jur_person_1" /><label for="is_jur_person_1" style="display: inline">Юр. лицо</label>

                            </td>
                        </tr>


                    </table>

                </td>

            </tr>


        </tbody>
        <tbody class="order-block">
            <tr>
                <td valign="middle" align="left" id="method_payments" style="text-align: left">
                    <h2>Способ оплаты</h2>
                    <?php
$_from = $_smarty_tpl->tpl_vars['payment_methods']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["method"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["method"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_method'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["method"]->value) {
$_smarty_tpl->tpl_vars["method"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_method']->value['iteration']++;
$foreach_method_Sav = $_smarty_tpl->tpl_vars["method"];
?>
                        <label>
                            <span><input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['method']->value->id;?>
" name="payment_method_id" id="payment_<?php echo $_smarty_tpl->tpl_vars['method']->value->id;?>
" <?php if (((isset($_smarty_tpl->tpl_vars['__foreach_method']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_method']->value['iteration'] : null) == 1 && !isset($_POST['payment_method_id'])) || $_POST['payment_method_id'] == $_smarty_tpl->tpl_vars['method']->value->id) {?> checked="checked"<?php }?> /></span><div><b><?php echo stripslashes($_smarty_tpl->tpl_vars['method']->value->name);?>
</b><div class="notice">
                                    <?php echo stripslashes($_smarty_tpl->tpl_vars['method']->value->comment);?>

                                </div>
                            </div>
                            <div class="clear">&nbsp;</div> 
                        </label>
                    <?php
$_smarty_tpl->tpl_vars["method"] = $foreach_method_Sav;
}
?>  
                </td>
            </tr>
        </tbody>
        <tbody <?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person != 1 && $_POST['is_jur_person'] != '1') {?>style="display: none"<?php }?> id="jur_person_block" class="order-block">
            <tr>
                <td valign="middle" align="left"  style="text-align: left">
                    <h2>Контактная информация</h2>
                    <table cellpadding="3" cellspacing="0" border="0" class="table_fields" id="basket_table" style="margin-left: 0px;width: 100%">
                        <tr>
                            <td valign="middle" align="right" colspan="2"><h3 style="font-size: 23px;text-align: center">Реквизиты компании</h3></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right; width: 230px;">Название: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_name" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_name']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_name : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">Факс:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_fax" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_fax']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_fax : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ИНН: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_inn" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_inn']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_inn : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">Юридический адрес: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_ur_adress" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_ur_adress']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_ur_adress : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">Банк: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_bank" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_bank']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_bank : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">БИК: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_bik" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_bik']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_bik : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">P/c: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_rs" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_rs']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_rs : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">К/c:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_ks" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_ks']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_ks : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">КПП: <span class="asterix">*</span></td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_kpp" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_kpp']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_kpp : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ОКПО:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_okpo" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_okpo']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_okpo : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ОКНХ:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_oknx" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_oknx']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_oknx : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ФИО Ген. директора:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_fio_director" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_fio_director']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_fio_director : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ФИО Гл. бухгалтера:</td>
                            <td valign="middle" align="left">
                                <input type="text" size="30" name="company_fio_accountant" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_fio_accountant']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_fio_accountant : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
        </tbody>
        <tbody class="order-block">
            <tr>
                <td valign="middle" align="left" style="text-align: left">
                    <h2>Информация о доставке</h2>
                    <div  id="delivery_methods">
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
                            <label class="check-style">
                                <span class="delivery_radio"><input type="radio"  name="delivery_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value->service;?>
" /><span>&nbsp;</span></span>
                                <span class="delivery_desc"><b><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>
</b>
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value->free_sum-$_smarty_tpl->tpl_vars['sum_basket']->value <= 0) {?>
                                        - <b style="color: red">Бесплатно!</b>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['item']->value->price != 0) {?>

                                        - <b><?php echo $_smarty_tpl->tpl_vars['item']->value->price;?>
 руб.</b>
                                    <?php }?>
                                    <div class="notice"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->info);?>
</div>
                                    
                                </span>
                                <div class="clear">&nbsp;</div>
                            </label>
                            <?php if ($_smarty_tpl->tpl_vars['item']->value->service) {?> 
                                    <div class="delivery_service" id="delivery_service_<?php echo $_smarty_tpl->tpl_vars['delivery_id']->value;?>
">

                                    </div>
                                <?php }?>
                                <?php
$_from = $_smarty_tpl->tpl_vars['delivery']->value[$_smarty_tpl->tpl_vars['delivery_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["delivery_child"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["delivery_child"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["delivery_child"]->value) {
$_smarty_tpl->tpl_vars["delivery_child"]->_loop = true;
$foreach_delivery_child_Sav = $_smarty_tpl->tpl_vars["delivery_child"];
?>
                                    <div class="delivery_child" id="delivery_child_<?php echo $_smarty_tpl->tpl_vars['delivery_id']->value;?>
">
                                        <label class="check-style">
                                            <span class="delivery_radio_child"><input type="radio" name="delivery_child_id" class="delivery_child_id" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value->service;?>
" value="<?php echo $_smarty_tpl->tpl_vars['delivery_child']->value->id;?>
" /><span>&nbsp;</span></span>
                                            <span class="delivery_desc">
                                                <b><?php echo stripslashes($_smarty_tpl->tpl_vars['delivery_child']->value->name);?>
 <?php if ($_smarty_tpl->tpl_vars['delivery_child']->value->price != 0) {?> - <b><?php echo $_smarty_tpl->tpl_vars['delivery_child']->value->price;?>
 руб.</b><?php }?></b>
                                                <div class="notice"><?php echo stripslashes($_smarty_tpl->tpl_vars['delivery_child']->value->info);?>
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
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td valign="middle" align="right">
                                <div id="error_delivery">Выберите удобный способ доставки</div>
                                <input type="hidden" value="1" name="send" />
                                <div id="order_button" style="text-align: right"><button>Оформить заказ</button></div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>
            <?php }
}
?>