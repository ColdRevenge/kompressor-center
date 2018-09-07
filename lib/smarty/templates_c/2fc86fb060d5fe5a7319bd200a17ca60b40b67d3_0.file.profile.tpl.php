<?php /* Smarty version 3.1.24, created on 2015-09-13 20:39:03
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/profile.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:148445283855f5b4b72a7099_50211219%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fc86fb060d5fe5a7319bd200a17ca60b40b67d3' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/profile.tpl',
      1 => 1441987768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148445283855f5b4b72a7099_50211219',
  'variables' => 
  array (
    'is_mobile' => 0,
    'url' => 0,
    'get_coupon_code' => 0,
    'coupon' => 0,
    'next_discount' => 0,
    'get_user' => 0,
    'metro' => 0,
    'item' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'managers' => 0,
    'manager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f5b4b77bafc4_96080454',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f5b4b77bafc4_96080454')) {
function content_55f5b4b77bafc4_96080454 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '148445283855f5b4b72a7099_50211219';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="/">Назад</a></div>
        <h1>Мой профиль</h1>
        <div class="clear">&nbsp;</div>
    </div>

    <ul id="profile-link">
        <li><a href="/stat/delivery/post/">Отследить заказ (Почта России)</a></li>
        <li><a href="/stat/orders/">Мои заказы</a></li>
        <li><a href="/stat/password/">Сменить пароль</a></li>
        <li><a href="/auth/exit/?back_url=<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo ltrim($_SERVER['REQUEST_URI'],"/");?>
">Выход</a></li>
    </ul>

    <table cellpadding="0" cellspacing="2" border="0" id="register" style="margin-left: 20px; width: 100%;margin: auto;">
        <?php if ($_smarty_tpl->tpl_vars['get_coupon_code']->value->id && $_smarty_tpl->tpl_vars['coupon']->value->discount_procent > 0) {?>
            <tr>
                <td valign="middle" align="left" colspan="2" style="text-align: center">
                    <h2 style="text-align: center">Дисконтная карта</h2>
                </td>
            </tr>
            <tr> 
                <td valign="middle" align="right" style="text-align: right">Номер карты:&nbsp;&nbsp;</td>
                <td valign="middle" align="left" style="text-align: left"><b><?php echo $_smarty_tpl->tpl_vars['get_coupon_code']->value->code;?>
</b></td>

            </tr>
            <tr> 
                <td valign="middle" align="right" style="text-align: right">Сумма покупок:&nbsp;&nbsp;</td>
                <td valign="middle" align="left" style="text-align: left"><b><?php echo number_format($_smarty_tpl->tpl_vars['get_coupon_code']->value->sum,0,"."," ");?>
</b> руб.</td>
            </tr>
            <tr> 
                <td valign="middle" align="right" style="text-align: right">Скидка:&nbsp;&nbsp;</td>
                <td valign="middle" align="left" style="text-align: left"><b><?php echo $_smarty_tpl->tpl_vars['coupon']->value->discount_procent;?>
%</b></td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['next_discount']->value->discount_procent > 0) {?>
                <tr> 
                    <td valign="middle" align="right" style="text-align: center; font-size: 13px" colspan="3" class="notice">
                        <br/>До следующей скидки <b><?php echo $_smarty_tpl->tpl_vars['next_discount']->value->discount_procent;?>
%</b>  Вам осталось совершить покупки на сумму <b><?php echo number_format(($_smarty_tpl->tpl_vars['coupon']->value->code_next_sum-$_smarty_tpl->tpl_vars['get_coupon_code']->value->sum),0,"."," ");?>
 руб.</b> </td>
                </tr>
            <?php }?>
        <?php }?>
    </table>

    <form method="post" action="" id="form">

        <?php if ($_smarty_tpl->tpl_vars['get_user']->value->icon) {?>
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['get_user']->value->icon;?>
" name="uploaded_image" />
        <?php }?>
        <div class="field-block">
            <h2>Контактная информация</h2>
            <div><input type="text" name="name" value="<?php echo stripslashes((($tmp = @$_POST['name'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->name : $tmp));?>
" maxlength="255" placeholder="Ваше имя" /></div>
            <div><input type="text" name="phone" value="<?php echo stripslashes((($tmp = @$_POST['phone'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->phone : $tmp));?>
" maxlength="255" placeholder="Телефон"  /></div>
            <div><input type="text" name="email" value="<?php echo stripslashes((($tmp = @$_POST['email'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->email : $tmp));?>
" placeholder="E-mail" maxlength="255"  /></div>
            <div class="notice"><label><input type="checkbox" value="1"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_mailer == 1 || $_POST['is_mailer'] == 1) {?> checked="checked"<?php }?> name="is_mailer" />&nbsp;Я согласен получать e-mail рассылки</label></div>
            <h2>Информация о доставке</h2>
            <div><input type="text" name="city_index" value="<?php echo stripslashes((($tmp = @$_POST['city_index'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city_index : $tmp));?>
"  placeholder="Индекс"/> </div>
            <div><input type="text" name="city" value="<?php echo stripslashes((($tmp = @$_POST['city'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city : $tmp));?>
"  placeholder="Город"/></div>
            <div><textarea style="width: 100%;height: 60px;" class="text" name="adress"   placeholder="Адрес, по которому будет производиться доставка"><?php echo stripslashes((($tmp = @$_POST['adress'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->adress : $tmp));?>
</textarea></div>
            <div><select name="metro_id"  >
                    <option value="">Ближайшее метро</option>
                    <?php
$_from = $_smarty_tpl->tpl_vars['metro']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_POST['metro_id'] == $_smarty_tpl->tpl_vars['item']->value->id || $_smarty_tpl->tpl_vars['get_user']->value->metro_id == $_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                    <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                </select></div>
            <div><textarea style="width: 100%;height: 80px;" placeholder="Дополнительная информация" name="info"><?php echo stripslashes((($tmp = @$_POST['info'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->info : $tmp));?>
</textarea></div>
            <div style="text-align: right"><input type="hidden" value="1" name="register" /><button class="save">&nbsp;</button></div>
        </div>

    </form>
<?php } else { ?>
    <div id="stat-left-menu">
        <?php echo $_smarty_tpl->getSubTemplate ("stat_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </div>
    <div id="stat_content">
        <div class="breadcrumbs-block">

            <ul class="clearfix">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
                <li>Мой профиль</li>
            </ul>
        </div>
        <h1>Мой профиль</h1>

        <div class="text">
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value,'mclass'=>"message"), 0);
?>

            <form method="post" action="">
                <?php if ($_smarty_tpl->tpl_vars['get_user']->value->icon) {?>
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['get_user']->value->icon;?>
" name="uploaded_image" />
                <?php }?>
                <table cellpadding="0" cellspacing="2" border="0" id="register" style="margin-left: 20px; width: 440px;margin: auto;">
                    <?php if ($_smarty_tpl->tpl_vars['get_coupon_code']->value->id && $_smarty_tpl->tpl_vars['coupon']->value->discount_procent > 0) {?>
                        <tr>
                            <td valign="middle" align="left" colspan="3" style="text-align: center">
                                <h2>Дисконтная карта для VIP клиента!</h2>
                                <br/>
                            </td>
                        </tr>
                        <tr> 
                            <td valign="middle" align="right" style="text-align: right">Номер карты:&nbsp;&nbsp;</td>
                            <td valign="middle" align="left" style="text-align: left"><b><?php echo $_smarty_tpl->tpl_vars['get_coupon_code']->value->code;?>
</b></td>
                            <td rowspan="3" style="text-align: left">
                                <img src="/images/card.png" alt="" />
                            </td>
                        </tr>
                        <tr> 
                            <td valign="middle" align="right" style="text-align: right">Сумма покупок:&nbsp;&nbsp;</td>
                            <td valign="middle" align="left" style="text-align: left"><b><?php echo number_format($_smarty_tpl->tpl_vars['get_coupon_code']->value->sum,0,"."," ");?>
</b> руб.</td>
                        </tr>
                        <tr> 
                            <td valign="middle" align="right" style="text-align: right">Скидка:&nbsp;&nbsp;</td>
                            <td valign="middle" align="left" style="text-align: left"><b><?php echo $_smarty_tpl->tpl_vars['coupon']->value->discount_procent;?>
%</b></td>
                        </tr>
                        <?php if ($_smarty_tpl->tpl_vars['next_discount']->value->discount_procent > 0) {?>
                            <tr> 
                                <td valign="middle" align="right" style="text-align: center; font-size: 13px" colspan="3" class="notice">
                                    <br/>До следующей скидки <b><?php echo $_smarty_tpl->tpl_vars['next_discount']->value->discount_procent;?>
%</b>  Вам осталось совершить покупки на сумму <b><?php echo number_format(($_smarty_tpl->tpl_vars['coupon']->value->code_next_sum-$_smarty_tpl->tpl_vars['get_coupon_code']->value->sum),0,"."," ");?>
 руб.</b> </td>
                            </tr>
                        <?php }?>
                    <?php }?>
                </table>
                <table cellpadding="0" cellspacing="2" border="0" id="register" style="margin-left: 20px; width: 540px;" class="table_fields">
                    <tr>
                        <td valign="middle" align="left" colspan="2">
                            <br/>
                            <h2>Контактная информация</h2></td>
                    </tr>
                    <tr> 
                        <td valign="middle" align="right" style="text-align: right">Ваше имя:<span class="asterix">*</span></td>
                        <td valign="middle" align="left"><input type="text" name="name" value="<?php echo stripslashes((($tmp = @$_POST['name'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->name : $tmp));?>
" maxlength="255" class="text"   style="width: 330px"  /></td>
                    </tr>
                    
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">Телефон:<span class="asterix">*</span></td>
                        <td valign="middle" align="left"><input type="text" name="phone" value="<?php echo stripslashes((($tmp = @$_POST['phone'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->phone : $tmp));?>
" class="text"  style="width: 330px" maxlength="255"  /></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">E-mail:<span class="asterix">*</span></td>
                        <td valign="middle" align="left"><input type="text" name="email" value="<?php echo stripslashes((($tmp = @$_POST['email'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->email : $tmp));?>
" class="text"  style="width: 330px" maxlength="255"  />
                            <div style="text-align: left; margin-top: 5px;">
                                <label class="check-style"><input type="checkbox" value="1"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_mailer == 1 || $_POST['is_mailer'] == 1) {?> checked="checked"<?php }?> name="is_mailer" id="is_mailer" /><span>&nbsp;</span><span style="font-size: 13px; color: gray"> Я согласен получать ваши рассылки по e-mail</span> &nbsp; 
                            </div>
                        </td>
                    </tr>
                    <?php if ($_smarty_tpl->tpl_vars['get_user']->value->user_type == 0) {?>
                        <tr style="display: none">
                            <td valign="top" align="right" style="text-align: right;">Мой менеджер:</td>
                            <td valign="middle" align="left" style="text-align: left">
                                <select name="manager_id" style="width: 250px;"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->manager_id > 0) {?> disabled="disabled"<?php }?>>
                                    <option value="0">Не выбран</option>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['managers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["manager"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["manager"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["manager"]->value) {
$_smarty_tpl->tpl_vars["manager"]->_loop = true;
$foreach_manager_Sav = $_smarty_tpl->tpl_vars["manager"];
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['manager']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['get_user']->value->manager_id == $_smarty_tpl->tpl_vars['manager']->value->id) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['manager']->value->name);?>
</option>
                                    <?php
$_smarty_tpl->tpl_vars["manager"] = $foreach_manager_Sav;
}
?>
                                </select>
                            </td>
                        </tr>  
                    <?php }?>

                    <tr>
                        <td valign="middle" align="right">&nbsp;</td>
                        <td valign="middle" align="left" style="text-align: left">
                            <label class="check-style"><input type="radio" value="0"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person == '0' || $_POST['is_jur_person'] == '0') {?> checked="checked"<?php }?> onchange="$('#jur_person_block').fadeOut('slow', function () {
                                        $(this).css('display', 'none');});" name="is_jur_person" id="is_jur_person_0" /><span>&nbsp;</span><span>Физ. лицо</span></label>

                            <label class="check-style"><input type="radio" value="1"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person == '1' || $_POST['is_jur_person'] == '1') {?> checked="checked"<?php }?> onchange="$('#jur_person_block').fadeIn('slow', function () {
                                        $(this).css('display', 'table-row-group');});" name="is_jur_person" id="is_jur_person_1" /><span>&nbsp;</span><span>Юр. лицо</span></label>

                        </td>
                    </tr>
                    

                    <tbody <?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person != 1 && $_POST['is_jur_person'] != '1') {?>style="display: none"<?php }?> id="jur_person_block">
                        <tr>
                            <td valign="middle" align="right" style="text-align: right; width: 230px;">Название:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_name" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_name']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_name : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">Факс:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_fax" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_fax']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_fax : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ИНН:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_inn" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_inn']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_inn : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">Юридический адрес:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_ur_adress" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_ur_adress']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_ur_adress : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">Банк:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_bank" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_bank']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_bank : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">БИК:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_bik" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_bik']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_bik : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">P/c:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_rs" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_rs']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_rs : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">К/c:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_ks" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_ks']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_ks : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">КПП:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_kpp" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_kpp']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_kpp : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ОКПО:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_okpo" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_okpo']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_okpo : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ОКНХ:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_oknx" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_oknx']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_oknx : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ФИО Ген. директора:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_fio_director" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_fio_director']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_fio_director : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right">ФИО Гл. бухгалтера:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="company_fio_accountant" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_fio_accountant']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_fio_accountant : $tmp)),"'",'"');?>
" class="text"   maxlength="255" style="width: 330px"/>
                            </td>
                        </tr>
                        
                    </tbody>






                    <tr>
                        <td valign="middle" align="left" colspan="2">
                            <h2>Информация о доставке</h2></td>
                    </tr>
                    <tr>
                        <td valign="top" align="right" style="text-align: right">Город:</td>
                        <td valign="middle" align="left" style="text-align: left">
                            <input type="text" name="city_index" value="<?php echo stripslashes((($tmp = @$_POST['city_index'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city_index : $tmp));?>
" class="text"   maxlength="255" style="width: 80px" placeholder="Индекс"/> 
                            <input type="text" name="city" value="<?php echo stripslashes((($tmp = @$_POST['city'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city : $tmp));?>
" class="text"   maxlength="255" style="width: 227px" placeholder="Город"/> 

                        </td>
                    </tr>   
                    <tr>
                        <td valign="top" align="right" style="text-align: right;">Адрес:</td>
                        <td valign="middle" align="left">
                            <textarea style="width: 330px;height: 80px;" class="text" name="adress"   placeholder="Адрес, по которому будет производиться доставка"><?php echo stripslashes((($tmp = @$_POST['adress'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->adress : $tmp));?>
</textarea>
                        </td>
                    </tr>   

                    <tr>
                        <td valign="middle" align="right" style="text-align: right">Ближайшее метро:</td>
                        <td valign="middle" align="left" style="text-align: left;">
                            <select class="text" name="metro_id" style="width: 350px;"  >
                                <option value="">Выбрать</option>
                                <?php
$_from = $_smarty_tpl->tpl_vars['metro']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_POST['metro_id'] == $_smarty_tpl->tpl_vars['item']->value->id || $_smarty_tpl->tpl_vars['get_user']->value->metro_id == $_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                                <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td valign="middle" align="left" colspan="2">
                            <h2>Дополнительная информация</h2></td>
                    </tr>
                    <tr>
                        <td valign="top" align="right" style="text-align: right;  width: 250px;"></td>
                        <td valign="middle" align="left">
                            <textarea style="width: 330px;height: 100px;" class="text"  name="info"><?php echo stripslashes((($tmp = @$_POST['info'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->info : $tmp));?>
</textarea>
                        </td>
                    </tr>

                    
                    <tr>
                        <td valign="middle" align="right" colspan="2" style="text-align: right">
                            <input type="hidden" value="1" name="register" />
                            <button class="save">&nbsp;</button>
                        </td>
                    </tr>
                </table>
            </form>

            
        </div>
    </div>
<?php }
}
}
?>