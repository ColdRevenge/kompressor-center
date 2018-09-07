<?php /* Smarty version 3.1.24, created on 2017-01-27 16:11:45
         compiled from "E:/OpenServer/domains/kc-pskov.dev/modules/order/templates/add_form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3009588b471169bcc0_54776891%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5561f3aff0ede91dfa6155524deff8d00b5e947' => 
    array (
      0 => 'E:/OpenServer/domains/kc-pskov.dev/modules/order/templates/add_form.tpl',
      1 => 1485497758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3009588b471169bcc0_54776891',
  'variables' => 
  array (
    'is_mobile' => 0,
    'get_user' => 0,
    'is_lady_shop' => 0,
    'payment_methods' => 0,
    'method' => 0,
    'delivery' => 0,
    'item' => 0,
    'icons_url' => 0,
    'sum_basket' => 0,
    'delivery_id' => 0,
    'delivery_child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_588b47117b3366_06859113',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_588b47117b3366_06859113')) {
function content_588b47117b3366_06859113 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once 'E:/OpenServer/domains/kc-pskov.dev/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '3009588b471169bcc0_54776891';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {
echo $_smarty_tpl->getSubTemplate ("add_form_mobile.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
} else { ?>
    <form method="post" class="niceform" id="form_order" action="" style=" margin-bottom: 20px;margin-top: 10px;">
        <input type="hidden" name="coupon_code" value="" id="coupon_code" />
        <table cellpadding="3" cellspacing="0" border="0" class="table_fields" id="basket_table" style="margin-left: 0px;width: 100%">
            <tbody  class="order-block">
                <tr>
                    <td valign="middle" align="left"  style="text-align: left">
                        <h2>Контактная информация</h2>
                        <table cellpadding="3" cellspacing="0" border="0" class="table_fields" id="basket_table" style="margin-left: 0px;width: 100%">
                            <tr>
                                <td valign="middle" align="right" style="text-align: right">ФИО: <span class="asterix">*</span> </td>
                                <td valign="middle" align="left">
                                    <input type="text" class="text" value="<?php echo $_POST['fio'];?>
" style="width: 270px;" name="fio" id="fio" maxlength="255" />

                                    
                                    <label for="fio"></label></td>
                                <td valign="middle" align="left" rowspan="3">
                                    <textarea class="text" placeholder="Комментарий" style="width: 285px;height: 102px;margin-left: 2px;" name="comment"><?php echo $_POST['comment'];?>
</textarea>
                                </td>
                            </tr> 
                            <tr>
                                <td valign="middle" align="right" style="text-align: right">Телефон:&nbsp;<span class="asterix">*</span></td>
                                <td valign="middle" align="left"><input type="text" class="text" value="<?php echo $_POST['phone'];?>
" style="width: 270px;" name="phone" maxlength="255" id="phone_mask" />
                                    <label for="phone"></label>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="right" style="text-align: right">E-mail:  <span class="asterix" id="mail_notify" style="display: none">*</span></td>
                                <td valign="middle" align="left"><input type="text" id="email_check" class="text" value="<?php echo $_POST['email'];?>
" style="width: 270px;" name="email" maxlength="255" />
                                    <label for="email"></label>
                                    
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
            <?php if ($_smarty_tpl->tpl_vars['is_lady_shop']->value == 1) {?>
                <tbody  class="order-block">
                    <tr>
                        <td valign="middle" align="left"  style="text-align: left">
                            <h2>Укажите, пожалуйста, ваши параметры <sup>(Не обязательные поля)</sup></h2>
                            <table cellpadding="3" cellspacing="0" border="0" class="table_fields" id="basket_table" style="margin-left: 120px;width: 550px; ">

                                <tr>
                                    <td valign="top" align="right" colspan="2" style="text-align: right">Объем груди:  <span class="asterix" id="mail_notify" style="display: none">*</span></td>
                                    <td valign="middle" align="left"><input type="text"  value="<?php echo $_POST['bust'];?>
" id="bust_size" style="width: 186px;" name="bust" maxlength="255" />
                                        см.
                                        <div id="bust_size_out" class="order_calc_size">

                                        </div>
                                        <?php echo '<script'; ?>
 type="text/javascript">
                                            $('#bust_size').change(function () {
                                                bust_size = $(this).val();
                                                var bust_size_result = 0;
                                                if (bust_size >= 88 && bust_size <= 91)
                                                    bust_size_result = '44';
                                                else if (bust_size >= 92 && bust_size <= 95)
                                                    bust_size_result = '46';
                                                else if (bust_size >= 96 && bust_size <= 99)
                                                    bust_size_result = '48';
                                                else if (bust_size >= 100 && bust_size <= 103)
                                                    bust_size_result = '50';
                                                else if (bust_size >= 104 && bust_size <= 107)
                                                    bust_size_result = '52';
                                                else if (bust_size >= 108 && bust_size <= 111)
                                                    bust_size_result = '54';
                                                else if (bust_size >= 112 && bust_size <= 115)
                                                    bust_size_result = '56';
                                                else if (bust_size >= 116 && bust_size <= 119)
                                                    bust_size_result = '58';
                                                else if (bust_size >= 120 && bust_size <= 123)
                                                    bust_size_result = '60';
                                                else if (bust_size >= 124 && bust_size <= 127)
                                                    bust_size_result = '62';
                                                else if (bust_size >= 128 && bust_size <= 131)
                                                    bust_size_result = '64';
                                                else if (bust_size >= 132 && bust_size <= 135)
                                                    bust_size_result = '66';
                                                else if (bust_size >= 136 && bust_size <= 140)
                                                    bust_size_result = '68';
                                                else if (bust_size >= 141 && bust_size <= 144)
                                                    bust_size_result = '70';
                                                else if (bust_size >= 145 && bust_size <= 149)
                                                    bust_size_result = '72';
                                                else if (bust_size >= 150 && bust_size <= 155)
                                                    bust_size_result = '74';

                                                else
                                                    bust_size_result = 'не найден';

                                                $('#bust_size_out').html("Ваш размер верха: <b>" + bust_size_result + "</b>");
                                            });
                                        <?php echo '</script'; ?>
>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" align="right" colspan="2" style="text-align: right">Объем бедер:  <span class="asterix" id="mail_notify" style="display: none">*</span></td>
                                    <td valign="middle" align="left"><input type="text" id="hips_size" value="<?php echo $_POST['hips'];?>
" style="width: 186px;" name="hips" maxlength="255" />
                                        см.

                                        <div id="hips_size_result" class="order_calc_size">

                                        </div>
                                        <?php echo '<script'; ?>
 type="text/javascript">
                                            $('#hips_size').change(function () {
                                                hips_size = $(this).val();
                                                var hips_size_result = 0;

                                                if (hips_size >= 96 && hips_size <= 99)
                                                    hips_size_result = '44';
                                                else if (hips_size >= 100 && hips_size <= 103)
                                                    hips_size_result = '46';
                                                else if (hips_size >= 104 && hips_size <= 107)
                                                    hips_size_result = '48';
                                                else if (hips_size >= 108 && hips_size <= 111)
                                                    hips_size_result = '50';
                                                else if (hips_size >= 112 && hips_size <= 115)
                                                    hips_size_result = '52';
                                                else if (hips_size >= 116 && hips_size <= 119)
                                                    hips_size_result = '54';
                                                else if (hips_size >= 120 && hips_size <= 123)
                                                    hips_size_result = '56';
                                                else if (hips_size >= 124 && hips_size <= 127)
                                                    hips_size_result = '58';
                                                else if (hips_size >= 128 && hips_size <= 131)
                                                    hips_size_result = '60';
                                                else if (hips_size >= 132 && hips_size <= 135)
                                                    hips_size_result = '62';
                                                else if (hips_size >= 136 && hips_size <= 139)
                                                    hips_size_result = '64';
                                                else if (hips_size >= 140 && hips_size <= 143)
                                                    hips_size_result = '66';
                                                else if (hips_size >= 144 && hips_size <= 150)
                                                    hips_size_result = '68';
                                                else if (hips_size >= 151 && hips_size <= 154)
                                                    hips_size_result = '70';
                                                else if (hips_size >= 155 && hips_size <= 158)
                                                    hips_size_result = '72';
                                                else if (hips_size >= 159 && hips_size <= 164)
                                                    hips_size_result = '74';
                                                else
                                                    hips_size_result = 'не найден';

                                                $('#hips_size_result').html("Ваш размер низа: <b>" + hips_size_result + "</b>");
                                            });
                                        <?php echo '</script'; ?>
>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            <?php }?>
            <tbody class="order-block" style="display: none;">
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

                            <label  class="check-style"><input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['method']->value->id;?>
" name="payment_method_id" id="payment_<?php echo $_smarty_tpl->tpl_vars['method']->value->id;?>
" <?php if (((isset($_smarty_tpl->tpl_vars['__foreach_method']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_method']->value['iteration'] : null) == 1 && !isset($_POST['payment_method_id'])) || $_POST['payment_method_id'] == $_smarty_tpl->tpl_vars['method']->value->id) {?> checked="checked"<?php }?> /> <span<?php if ($_smarty_tpl->tpl_vars['method']->value->id == 1) {?> style="margin-top: 10px;"<?php }?>>&nbsp;</span>                      
                                <?php if ($_smarty_tpl->tpl_vars['method']->value->id == 1) {?><span><img src="/images/sys/nal.jpg" alt="" /></span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['method']->value->id == 2) {?><span><img src="/images/sys/beznal.png" alt="" /></span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['method']->value->id == 3 || $_smarty_tpl->tpl_vars['method']->value->id == 5) {?><span><img src="/images/sys/visa.png" alt="" /></span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['method']->value->id == 6) {?><span><img src="/images/sys/YAD.jpg" alt="" /></span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['method']->value->id == 7) {?><span><img src="/images/sys/cash_yandex.jpg" alt="" /></span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['method']->value->id == 8) {?><span><img src="/images/sys/cash_sberbank.jpg" alt="" /></span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['method']->value->id == 4) {?><span><img src="/images/sys/YAD.jpg" alt="" /></span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['method']->value->id == 5) {?><span><img src="/images/sys/webmoney.jpg" alt="" /></span>
                                <?php }?><div><b><?php echo stripslashes($_smarty_tpl->tpl_vars['method']->value->name);?>
</b><div class="notice">
                                        <?php echo stripslashes($_smarty_tpl->tpl_vars['method']->value->comment);?>


                                    

                                  
                                    </div>
                                </div>
                            </label>
                            <div class="clear">&nbsp;</div> 


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
$_smarty_tpl->tpl_vars['__foreach_delivery'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_delivery']->value['iteration']++;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                                <?php $_smarty_tpl->tpl_vars["delivery_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['item']->value->id, null, 0);?>
                                <label class="check-style">
                                    <span class="delivery_radio"><input type="radio"  name="delivery_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value->service;?>
" /><span>&nbsp;</span></span>
                                    <span class="delivery_icon"><?php if ($_smarty_tpl->tpl_vars['item']->value->icon) {?><img src="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['item']->value->icon;?>
" alt="" /><?php }?></span>
                                    <span class="delivery_desc"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>


                                        <?php if ($_smarty_tpl->tpl_vars['item']->value->free_sum-$_smarty_tpl->tpl_vars['sum_basket']->value <= 0) {?>
                                            - <b style="color: red">Бесплатно!</b>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['item']->value->price != 0) {?>

                                            - <b><?php echo $_smarty_tpl->tpl_vars['item']->value->price;?>
 руб.</b>
                                        <?php }?>
                                        <div><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->info);?>
</div>
                                        
                                    </span>
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
                                        <div class="delivery_child delivery_child_<?php echo $_smarty_tpl->tpl_vars['delivery_id']->value;?>
">
                                            <label class="check-style">
                                                <span class="delivery_radio_child"><input type="radio" name="delivery_child_id" class="delivery_child_id" rel="<?php echo $_smarty_tpl->tpl_vars['item']->value->service;?>
" value="<?php echo $_smarty_tpl->tpl_vars['delivery_child']->value->id;?>
" /><span>&nbsp;</span></span>
                                                <span class="delivery_desc">
                                                    <?php echo stripslashes($_smarty_tpl->tpl_vars['delivery_child']->value->name);?>
 <?php if ($_smarty_tpl->tpl_vars['delivery_child']->value->price != 0) {?> - <b><?php echo $_smarty_tpl->tpl_vars['delivery_child']->value->price;?>
 руб.</b><?php }?>
                                                    <div><?php echo stripslashes($_smarty_tpl->tpl_vars['delivery_child']->value->info);?>
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
}
?>