<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 14:32:31
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/order/templates/getOrder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133922374255d4694fb275c4-34293437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4f10d2902039c0374632131be4b5e64196ac8f9' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/order/templates/getOrder.tpl',
      1 => 1439730313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133922374255d4694fb275c4-34293437',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'admin_url' => 0,
    'order' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'status' => 0,
    'status_item' => 0,
    'setting' => 0,
    'get_user' => 0,
    'is_multi_manager' => 0,
    'managers' => 0,
    'manager' => 0,
    'url' => 0,
    'is_coupon' => 0,
    'base_dir' => 0,
    'order_user_id' => 0,
    'metro' => 0,
    'item' => 0,
    'payment_methods' => 0,
    'method' => 0,
    'check_out_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4694fd91b29_32980800',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4694fd91b29_32980800')) {function content_55d4694fd91b29_32980800($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?>
<div class="block">
    <?php if ($_GET['not_menu']!='1') {?>
        <div id="breadcrumbs">
            <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
order/list/">Заказы</a> &laquo; Заказ № <?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>

        </div>
    <?php }?>
    <h1>Заказ № <?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</h1>
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

    <form method="post" action="">
        <table cellpadding="4" cellspacing="1" border="0" class="table">
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">
                        Заказ создан:
                    </td>
                    <td valign="middle" align="left">
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value->created,"%d.%m.%Y %H:%M");?>

                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">
                        Статус: 
                    </td>
                    <td valign="middle" align="left">
                        <select name="status_id" style="width: 250px;">
                            <?php  $_smarty_tpl->tpl_vars["status_item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["status_item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["status_item"]->key => $_smarty_tpl->tpl_vars["status_item"]->value) {
$_smarty_tpl->tpl_vars["status_item"]->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['status_item']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['order']->value->status_id==$_smarty_tpl->tpl_vars['status_item']->value->id) {?>selected="selected"<?php }?> <?php if ($_smarty_tpl->tpl_vars['order']->value->sum_expense==0&&$_smarty_tpl->tpl_vars['setting']->value->is_expense==1&&$_smarty_tpl->tpl_vars['status_item']->value->id==3) {?> disabled="disabled"<?php }?>><?php echo $_smarty_tpl->tpl_vars['status_item']->value->name;
if ($_smarty_tpl->tpl_vars['order']->value->sum_expense==0&&$_smarty_tpl->tpl_vars['setting']->value->is_expense==1&&$_smarty_tpl->tpl_vars['status_item']->value->id==3) {?> (Необходимо указать расход на заказ) <?php }?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->user_type!=1||$_smarty_tpl->tpl_vars['is_multi_manager']->value==0) {?> style="display: none"<?php }?>>
                <tr>
                    <td valign="middle" align="right">
                        Менеджер: 
                    </td>
                    <td valign="middle" align="left">
                        <select name="manager_id" style="width: 250px;" >
                            <option value="0">Не выбран</option>
                            <?php  $_smarty_tpl->tpl_vars["manager"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["manager"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['managers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["manager"]->key => $_smarty_tpl->tpl_vars["manager"]->value) {
$_smarty_tpl->tpl_vars["manager"]->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['manager']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['order']->value->manager_id==$_smarty_tpl->tpl_vars['manager']->value->id) {?>selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['manager']->value->name);?>
</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            </tbody>



            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <div style="float: left">
                            <button onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
example_blank.php?order_id=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
');
                                    return false;" value="Печать бланка" >Печать бланка</button>
                        </div>
                        <button>Сохранить</button>
                    </td>
                </tr>
            </tbody>

        </table>
    </form>

    <?php echo $_smarty_tpl->getSubTemplate ("buy_market_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div id="order_products">
        <?php echo $_smarty_tpl->getSubTemplate ("getOrderProducts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
  
    </div>
    <h2>Контактная информация</h2>
    <form method="post" action="">
        <table cellpadding="4" cellspacing="1" border="0" class="table">
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Получатель: </td>
                    <td valign="middle" align="left">
                        <input type="text" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['order']->value->fio));?>
" name="fio" style="width: 340px;" />
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Телефон: </td>
                    <td valign="middle" align="left"><input type="text" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes((($tmp = @$_smarty_tpl->tpl_vars['order']->value->phone)===null||$tmp==='' ? '' : $tmp)));?>
" name="phone" style="width: 340px;" /></td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">E-mail: </td>
                    <td valign="middle" align="left"><input type="text" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['order']->value->email));?>
" name="email" style="width: 340px;" /></td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Индекс/Город: </td>
                    <td valign="middle" align="left">
                        <input type="text" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['order']->value->city_index));?>
" name="city_index" style="width: 80px;" />
                        <input type="text" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['order']->value->city));?>
" name="city" />
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Почтовый идентификатор: </td>
                    <td valign="middle" align="left">
                        <input type="text" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['order']->value->post_code));?>
" name="post_code" style="width: 340px;" />
                    </td>
                </tr>
            </tbody>
            <?php if ($_smarty_tpl->tpl_vars['is_coupon']->value==1) {?>
                <tbody id="coupon_tbody">
                    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).('modules/users/templates/user_coupon.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('order_user_id'=>$_smarty_tpl->tpl_vars['order_user_id']->value), 0);?>

                </tbody>
            <?php }?>
            <tbody class="tbody">
                <tr>
                    <td valign="top" align="right">Адрес: </td>
                    <td valign="middle" align="left">
                        <textarea name="adress" style="width: 340px;"><?php echo stripslashes($_smarty_tpl->tpl_vars['order']->value->adress);?>
</textarea>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Метро: </td>
                    <td valign="middle" align="left">
                        <select class="text" name="metro_id" style="width: 230px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
                            <option value="">Выбрать</option>
                            <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['metro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_POST['metro_id']==$_smarty_tpl->tpl_vars['item']->value->id||$_smarty_tpl->tpl_vars['order']->value->metro_id==$_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Метод оплаты: </td>
                    <td valign="middle" align="left">
                        <select class="text" name="payment_method_id" style="width: 230px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
                            <option value="">Выбрать</option>
                            <?php  $_smarty_tpl->tpl_vars["method"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["method"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["method"]->key => $_smarty_tpl->tpl_vars["method"]->value) {
$_smarty_tpl->tpl_vars["method"]->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['method']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['order']->value->payment_method_id==$_smarty_tpl->tpl_vars['method']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['method']->value->name;?>
</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Комментарий к заказу: </td>
                    <td valign="middle" align="left"><textarea name="comment" style="width: 340px;"><?php echo $_smarty_tpl->tpl_vars['order']->value->comment;?>
</textarea></td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">&nbsp;</td>
                    <td valign="middle" align="left" style="text-align: left">
                        <label class="p-check"><input type="radio" value="0"<?php if ($_smarty_tpl->tpl_vars['order']->value->is_jur_person==''||$_smarty_tpl->tpl_vars['order']->value->is_jur_person=='0'||$_POST['is_jur_person']=='0') {?> checked="checked"<?php }?> onchange="$('#jur_person_block').fadeOut('slow', function () {
                            $(this).css('display', 'none');});" name="is_jur_person" id="is_jur_person_0" /><em>&nbsp;</em><span>Физ. лицо</span></label>

                            <label class="p-check"><input type="radio" value="1"<?php if ($_smarty_tpl->tpl_vars['order']->value->is_jur_person=='1'||$_POST['is_jur_person']=='1') {?> checked="checked"<?php }?> onchange="$('#jur_person_block').fadeIn('slow', function () {
                                $(this).css('display', 'table-row-group');});" name="is_jur_person" id="is_jur_person_1" /><em>&nbsp;</em><span>Юр. лицо</span></label>

                    </td>
                </tr>
            </tbody>
            <tbody <?php if ($_smarty_tpl->tpl_vars['order']->value->is_jur_person!=1&&$_POST['is_jur_person']!='1') {?>style="display: none"<?php }?> id="jur_person_block" class="tbody">
                <tr>
                    <td valign="middle" align="right" style="text-align: right; width: 230px;">Название:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_name" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_name']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_name : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">Факс:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_fax" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_fax']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_fax : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">ИНН:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_inn" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_inn']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_inn : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">Юридический адрес:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_ur_adress" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_ur_adress']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_ur_adress : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">Банк:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_bank" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_bank']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_bank : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">БИК:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_bik" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_bik']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_bik : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">P/c:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_rs" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_rs']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_rs : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">К/c:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_ks" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_ks']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_ks : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">КПП:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_kpp" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_kpp']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_kpp : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">ОКПО:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_okpo" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_okpo']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_okpo : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">ОКНХ:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_oknx" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_oknx']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_oknx : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">ФИО Ген. директора:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_fio_director" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_fio_director']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_fio_director : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">ФИО Гл. бухгалтера:</td>
                    <td valign="middle" align="left">
                        <input type="text" size="30" name="company_fio_accountant" value="<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes((($tmp = @preg_replace('!<[^>]*?>!', ' ', stripslashes(smarty_modifier_replace(stripslashes($_POST['company_fio_accountant']),"'",'"'))))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['order']->value->company_fio_accountant : $tmp)),"'",'"')));?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 330px"/>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">Комментарий менеджера: </td>
                    <td valign="middle" align="left"><textarea name="comment_admin" style="width: 340px;"><?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['order']->value->comment_admin),'"','&quot;');?>
</textarea></td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <button>Сохранить</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <?php echo $_smarty_tpl->tpl_vars['check_out_info']->value;?>

</div>
<?php }} ?>
