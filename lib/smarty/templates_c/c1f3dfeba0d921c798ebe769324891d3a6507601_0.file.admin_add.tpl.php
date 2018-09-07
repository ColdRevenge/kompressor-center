<?php /* Smarty version 3.1.24, created on 2017-04-10 14:17:52
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/users/templates/admin_add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:168408447958eb69e0b3a4b4_09892460%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1f3dfeba0d921c798ebe769324891d3a6507601' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/users/templates/admin_add.tpl',
      1 => 1485559684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168408447958eb69e0b3a4b4_09892460',
  'variables' => 
  array (
    'list_edit' => 0,
    'get_user' => 0,
    'user_type' => 0,
    'access' => 0,
    'order' => 0,
    'item' => 0,
    'item_2' => 0,
    'key_2' => 0,
    'my_access' => 0,
    'my_item' => 0,
    'my_key_2' => 0,
    'my_item_2' => 0,
    'my_access_item' => 0,
    'access_item' => 0,
    'key_3' => 0,
    'managers' => 0,
    'manager' => 0,
    'is_coupon' => 0,
    'metro' => 0,
    'param_tpl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_58eb69e0e69917_38304914',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58eb69e0e69917_38304914')) {
function content_58eb69e0e69917_38304914 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc-pskov/data/www/kc-pskov.ru/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '168408447958eb69e0b3a4b4_09892460';
?>
<?php echo '<script'; ?>
 type="text/javascript">
    function str_rand() {
        var result = '';
        var words = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        var max_position = words.length - 1;
        for (i = 0; i < 10; ++i) {
            position = Math.floor(Math.random() * max_position);
            result = result + words.substring(position, position + 1);
        }
        return result;
    }
<?php echo '</script'; ?>
>

<?php if ($_smarty_tpl->tpl_vars['list_edit']->value == 1) {?>
    

    <form method="post" action="<?php if ($_GET['is_modal'] == 1) {?>?is_modal=1<?php }?>">
        <div <?php if ($_GET['is_modal'] != 1) {?>class="quick_add"<?php }?>>
            <div style="float: right;padding: 0 25px;vertical-align: top;<?php if ($_smarty_tpl->tpl_vars['get_user']->value->user_type != 1 && $_smarty_tpl->tpl_vars['get_user']->value->user_type != 2 && $_POST['user_type'] != 1 && $_POST['user_type'] != 2 && $_smarty_tpl->tpl_vars['user_type']->value != 1 && $_smarty_tpl->tpl_vars['user_type']->value != 2) {?>display: none<?php }?>" id="access_form_block">
                <h2 style="margin-top: 0; padding-top: 0">Права доступа</h2>
                <input type="text" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['start_access_link']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->start_access_link : $tmp)),"'",'"');?>
" placeholder="Стартовая страница" name="start_access_link" style="width: 230px;" />
                <?php
$_from = $_smarty_tpl->tpl_vars['access']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
$_smarty_tpl->tpl_vars["order"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["order"]->value => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                    <?php if ($_smarty_tpl->tpl_vars['order']->value != 'accesses') {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['item']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item_2"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item_2"]->_loop = false;
$_smarty_tpl->tpl_vars["key_2"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key_2"]->value => $_smarty_tpl->tpl_vars["item_2"]->value) {
$_smarty_tpl->tpl_vars["item_2"]->_loop = true;
$foreach_item_2_Sav = $_smarty_tpl->tpl_vars["item_2"];
?>
                            <div style="font-size: 13px;">
                                <?php if ($_smarty_tpl->tpl_vars['item_2']->value['title']) {?><div><label class="p-check"><input type="checkbox" <?php if ($_smarty_tpl->tpl_vars['my_access']->value[$_smarty_tpl->tpl_vars['order']->value][$_smarty_tpl->tpl_vars['key_2']->value]['title'] == $_smarty_tpl->tpl_vars['item_2']->value['title']) {?> checked="checked"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['item_2']->value['title'];?>
" name="access[name][<?php echo $_smarty_tpl->tpl_vars['key_2']->value;?>
]" onchange="$(this).parent().parent().find('input').attr('checked', this.checked)" id="menu_title_<?php echo $_smarty_tpl->tpl_vars['key_2']->value;?>
"  /><em>&nbsp;</em><span><?php echo $_smarty_tpl->tpl_vars['item_2']->value['title'];?>
</span></label></div><?php }?>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['item_2']->value['access'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["access_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["access_item"]->_loop = false;
$_smarty_tpl->tpl_vars["key_3"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["key_3"]->value => $_smarty_tpl->tpl_vars["access_item"]->value) {
$_smarty_tpl->tpl_vars["access_item"]->_loop = true;
$foreach_access_item_Sav = $_smarty_tpl->tpl_vars["access_item"];
?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="p-check"><input type="checkbox" 
                        <?php
$_from = $_smarty_tpl->tpl_vars['my_access']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["my_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["my_item"]->_loop = false;
$_smarty_tpl->tpl_vars["my_order"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["my_order"]->value => $_smarty_tpl->tpl_vars["my_item"]->value) {
$_smarty_tpl->tpl_vars["my_item"]->_loop = true;
$foreach_my_item_Sav = $_smarty_tpl->tpl_vars["my_item"];
$_from = $_smarty_tpl->tpl_vars['my_item']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["my_item_2"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["my_item_2"]->_loop = false;
$_smarty_tpl->tpl_vars["my_key_2"] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars["my_key_2"]->value => $_smarty_tpl->tpl_vars["my_item_2"]->value) {
$_smarty_tpl->tpl_vars["my_item_2"]->_loop = true;
$foreach_my_item_2_Sav = $_smarty_tpl->tpl_vars["my_item_2"];
if ($_smarty_tpl->tpl_vars['key_2']->value == $_smarty_tpl->tpl_vars['my_key_2']->value) {
$_from = $_smarty_tpl->tpl_vars['my_item_2']->value['access'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["my_access_item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["my_access_item"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["my_access_item"]->value) {
$_smarty_tpl->tpl_vars["my_access_item"]->_loop = true;
$foreach_my_access_item_Sav = $_smarty_tpl->tpl_vars["my_access_item"];
if ($_smarty_tpl->tpl_vars['my_access_item']->value['title'] == $_smarty_tpl->tpl_vars['access_item']->value['title']) {?>checked="checked"<?php }
$_smarty_tpl->tpl_vars["my_access_item"] = $foreach_my_access_item_Sav;
}
}
$_smarty_tpl->tpl_vars["my_item_2"] = $foreach_my_item_2_Sav;
}
$_smarty_tpl->tpl_vars["my_item"] = $foreach_my_item_Sav;
}
?>
                        value="<?php echo $_smarty_tpl->tpl_vars['access_item']->value['title'];?>
" name="access[access][<?php echo $_smarty_tpl->tpl_vars['key_2']->value;?>
][]" id="<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['key_2']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['key_3']->value;?>
"><em>&nbsp;</em><span><?php echo $_smarty_tpl->tpl_vars['access_item']->value['title'];?>
</span></label><Br/>
                <?php
$_smarty_tpl->tpl_vars["access_item"] = $foreach_access_item_Sav;
}
?>
            </div>
        <?php
$_smarty_tpl->tpl_vars["item_2"] = $foreach_item_2_Sav;
}
?>
    <?php }?>
<?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
</div>
<table cellpadding="2" cellspacing="0" border="0" style="float: left">
    <tr>
        <td colspan="2">
            <h2 style="margin-top: 0; padding-top: 0">Основные параметры</h2>
        </td>
    </tr>
    <tr style="display: none">
        <td valign="middle" align="right" style="width: 180px;">Менеджер:</td>
        <td valign="middle" align="left">
            <select name="manager_id" style="width: 250px;">
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
    <tr>
        <td valign="middle" align="right" style="width: 180px;">Логин:</td>
        <td valign="middle" align="left"><input type="text" name="login" value='<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['login']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->login : $tmp)),"'",'"');?>
' maxlength="255" style="width: 280px;"/></td>
    </tr>
    <tr>
        <td valign="middle" align="right">Пароль:</td>
        <td valign="middle" align="left">
            <input type="text" name="password" value='<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['password']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->password : $tmp)),"'",'"');?>
' maxlength="255" style="width: 222px;"/>
            <button onclick="$(this).prev('input').val(str_rand());
                    return false;">UP</button>
        </td>
    </tr>
    <tr style="display: none">
        <td valign="middle" align="right">Тип:</td>
        <td valign="middle" align="left" style="font-size: 13px;">
            <label class="p-check"><input type="radio" value="1"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->user_type == 1 || $_POST['user_type'] == 1 || $_smarty_tpl->tpl_vars['user_type']->value == 1) {?> checked="checked"<?php }?>  onchange="$('#access_form_block').fadeIn('slow', function () {
                $(this).css('display', 'table-cell');});" name="user_type" id="user_type_1" /><em>&nbsp;</em><span>Администратор</span></label> &nbsp; 
                            <label class="p-check"><input type="radio" value="2"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->user_type == 2 || $_POST['user_type'] == 2 || $_smarty_tpl->tpl_vars['user_type']->value == 2) {?> checked="checked"<?php }?> onchange="$('#access_form_block').fadeIn('slow', function () {
                                $(this).css('display', 'table-cell');});" name="user_type" id="user_type_2" /><em>&nbsp;</em><span>Менеджер</span></label><br/>
                                                    <label class="p-check"><input type="radio" value="0"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->user_type == '0' || $_POST['user_type'] == '0') {?> checked="checked"<?php }?> onchange="$('#access_form_block').fadeOut('slow', function () {
                                                        $(this).css('display', 'none');});" name="user_type" id="user_type_0" /><em>&nbsp;</em><span>Пользователь</span></label><br/>
        </td>
    </tr>
    <tr>
        <td valign="middle" align="right">ФИО:</td>
        <td valign="middle" align="left"><input type="text" name="name" value='<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['name']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->name : $tmp)),"'",'"');?>
' maxlength="255" style="width: 280px;"/></td>
    </tr>
    <tr style="display: none">
        <td valign="middle" align="right">&nbsp;</td>
        <td valign="middle" align="left"><input type="checkbox" checked="checked" name="is_visible_unassigned_order" value='1' id="is_visible_unassigned_order" <?php if ($_POST['is_visible_unassigned_order'] == 1 || $_smarty_tpl->tpl_vars['get_user']->value->is_visible_unassigned_order == 1) {?> checked="checked"<?php }?> /> <label for="is_visible_unassigned_order">Видит неназначенные заказы</label></td>
    </tr>
    
    <tr>
        <td valign="middle" align="right">E-mail:</td>
        <td valign="middle" align="left"><input type="text" name="email" value='<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['email']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->email : $tmp)),"'",'"');?>
' maxlength="255" style="width: 280px;"/></td>
    </tr>
    <tr>
        <td valign="middle" align="right">Телефон:</td>
        <td valign="middle" align="left"><input type="text" name="phone" value='<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['phone']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->phone : $tmp)),"'",'"');?>
' maxlength="255" style="width: 280px;"/></td>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['is_coupon']->value == 1) {?>
        <tbody id="coupon_tbody">
            <?php echo $_smarty_tpl->getSubTemplate ("user_coupon.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </tbody>
    <?php }?>
    <tr style="display: none">
        <td valign="middle" align="right">&nbsp;</td>
        <td valign="middle" align="left">
            <input type="radio" value="1"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person == '1' || $_POST['is_jur_person'] == '1') {?> checked="checked"<?php }?> onchange="$('#jur_person_block').fadeIn('slow', function () {
                        $(this).css('display', 'table-row-group');});" name="is_jur_person" id="is_jur_person_1" /><label for="is_jur_person_1">Юр. лицо</label> &nbsp; 
            <input type="radio" value="0"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person == '0' || $_POST['is_jur_person'] == '0') {?> checked="checked"<?php }?> onchange="$('#jur_person_block').fadeOut('slow', function () {
                        $(this).css('display', 'none');});" name="is_jur_person" id="is_jur_person_0" /><label for="is_jur_person_0">Физ. лицо</label> 
        </td>
    </tr>
    <tr>
        <td valign="top" align="right" style="text-align: right; vertical-align: middle">Город:</td>
        <td valign="middle" align="left" style="text-align: left">
            <input type="text" size="30" name="city_index" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['city_index']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city_index : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 80px" placeholder="Индекс"/>&nbsp;<input type="text" size="30" name="city" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['city']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 181px" placeholder="Город"/> 

        </td>
    </tr>   
    <tr>
        <td valign="top" align="right">Адрес:</td>
        <td valign="middle" align="left"><textarea name="adress" style="width: 280px; height: 70px;"><?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['adress']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->adress : $tmp)),"'",'"');?>
</textarea></td>
    </tr>
    
    <tr>
        <td valign="top" align="right">Информация:</td>
        <td valign="middle" align="left"><textarea name="info" style="width: 280px; height: 70px;"><?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['info']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->info : $tmp)),"'",'"');?>
</textarea></td>
    </tr>
    <tr style="display: none">
        <td valign="middle" align="right">Метро:</td>
        <td valign="middle" align="left">
            <select class="text" name="metro_id" style="width: 259px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
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
"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->metro_id == $_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
            </select>
        </td>
    </tr>
    <tr style="display: none">
        <td valign="top" align="right">Рассылка:</td>
        <td valign="middle" align="left">
            <input type="checkbox" value="1"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_mailer == 1 || $_POST['is_mailer'] == 1) {?> checked="checked"<?php }?> name="is_mailer" id="is_mailer" /><label for="is_mailer">Новости</label> &nbsp; 
            <input type="checkbox" value="1"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_mailer_2 == 1 || $_POST['is_mailer_2'] == 1) {?> checked="checked"<?php }?> name="is_mailer_2" id="is_mailer_2" /><label for="is_mailer_2">Новинки</label>
        </td>
    </tr>

    
    <tbody <?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person != 1 && $_POST['is_jur_person'] != '1') {?>style="display: none"<?php }?> id="jur_person_block">
        <tr>
            <td valign="middle" align="right" style="text-align: right; ">Название:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_name" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_name']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_name : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">Факс:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_fax" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_fax']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_fax : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">ИНН:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_inn" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_inn']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_inn : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">Юридический адрес:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_ur_adress" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_ur_adress']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_ur_adress : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">Банк:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_bank" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_bank']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_bank : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">БИК:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_bik" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_bik']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_bik : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">P/c:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_rs" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_rs']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_rs : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">К/c:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_ks" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_ks']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_ks : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">КПП:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_kpp" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_kpp']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_kpp : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">ОКПО:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_okpo" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_okpo']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_okpo : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">ОКНХ:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_oknx" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_oknx']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_oknx : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">ФИО Ген. директора:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_fio_director" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_fio_director']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_fio_director : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">ФИО Гл. бухгалтера:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_fio_accountant" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_POST['company_fio_accountant']),"'",'"'))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->company_fio_accountant : $tmp)),"'",'"');?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        
    </tbody>
    <tr>
        <td valign="middle" align="right" colspan="2" style="padding-right: 20px;">
            <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['user_id'] > 0) {?><button>Сохранить</button><?php } else { ?><button>Добавить</button><?php }?>
    </tr>
</table>
</div>
</form>
<?php }
}
}
?>