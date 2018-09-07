<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-11 18:39:53
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/profile_forum.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104879440055e2cec3787026-91900436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4a9f716eb0bf6e0dccdedf0fd0dbe9a8ec2a11c' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/stat/templates/profile_forum.tpl',
      1 => 1441985988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104879440055e2cec3787026-91900436',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e2cec3831bf9_00837402',
  'variables' => 
  array (
    'url' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'get_user' => 0,
    'birth_date' => 0,
    'metro' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e2cec3831bf9_00837402')) {function content_55e2cec3831bf9_00837402($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><div id="stat-left-menu">
    <?php echo $_smarty_tpl->getSubTemplate ("stat_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div id="stat_content">
    <div class="breadcrumbs-block">

        <ul class="clearfix">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Женский форум Lalipop</a><span>/</span></li>
            <li>Мой профиль</li>
        </ul>
    </div>
    <h1>Мой профиль</h1>

    <div class="text">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value,'mclass'=>"message"), 0);?>

        <form method="post" action="" enctype="multipart/form-data">

            <table cellpadding="0" cellspacing="2" border="0" id="register" style="margin: auto; width: 485px;" class="table_fields">

                <tr> 
                    <td valign="middle" align="right" style="text-align: right">Ваше имя:<span class="asterix">*</span></td>
                    <td valign="middle" align="left">

                        <input type="text" name="forum_name" value="<?php echo stripslashes((($tmp = @stripslashes($_smarty_tpl->tpl_vars['get_user']->value->forum_name))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->name : $tmp));?>
" maxlength="255" class="text"   style="width: 330px"  />

                        <input type="hidden" name="name" value="<?php echo stripslashes((($tmp = @$_POST['name'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->name : $tmp));?>
" maxlength="255" class="text"   style="width: 330px"  />
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">Телефон:<span class="asterix">*</span></td>
                    <td valign="middle" align="left"><input type="text" name="phone" value="<?php echo stripslashes((($tmp = @$_POST['phone'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->phone : $tmp));?>
" class="text"  style="width: 330px" maxlength="255"  /></td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right; vertical-align: top; padding-top: 12px;">E-mail:<span class="asterix">*</span></td>
                    <td valign="middle" align="left">

                        <input type="text" name="forum_email" value="<?php echo stripslashes((($tmp = @stripslashes((($tmp = @$_POST['forum_email'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->forum_email : $tmp)))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->email : $tmp));?>
" maxlength="255" class="text"   style="width: 330px"  />
                        <div style="text-align: left; margin-top: 5px;">
                            <label class="check-style">
                                <input type="checkbox" value="1" name="forum_is_email" <?php if ($_smarty_tpl->tpl_vars['get_user']->value->forum_is_email==1) {?> checked="checked"<?php }?> /><span>&nbsp;</span><span>Показывать e-mail на форуме</span>
                            </label>
                        </div>
                        <input type="hidden" name="email" value="<?php echo stripslashes((($tmp = @$_POST['email'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->email : $tmp));?>
" class="text"  style="width: 330px" maxlength="255"  />

                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">&nbsp;</td>
                    <td valign="middle" align="left">
                        <div style="text-align: left; margin-top: 5px;">
                            <label class="check-style"><input type="checkbox" value="1"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_mailer==1||$_POST['is_mailer']==1) {?> checked="checked"<?php }?> name="is_mailer" id="is_mailer" /><span>&nbsp;</span><span style="font-size: 13px; color: gray"> Я согласен получать ваши рассылки по e-mail</span> &nbsp; 
                        </div>
                    </td>
                </tr>


                <tr>
                    <td valign="top" align="right" style="text-align: right">Дата рождения:</td>
                    <td valign="middle" align="left" style="text-align: left">
                        <?php echo $_smarty_tpl->tpl_vars['birth_date']->value;?>

                    </td>
                </tr>
                <tr>
                    <td valign="top" align="right" style="text-align: right">Аватарка:</td>
                    <td valign="middle" align="left" style="text-align: left">
                        <?php if ($_smarty_tpl->tpl_vars['get_user']->value->icon) {?>
                            <img src="/images/forum/avatars/<?php echo $_smarty_tpl->tpl_vars['get_user']->value->icon;?>
" alt="" />
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['get_user']->value->icon;?>
" name="uploaded_image" />
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['get_user']->value->icon) {?><br/><br/>Заменить: <?php }?><input type="file" name="icon" />

                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right">&nbsp;</td>
                    <td valign="middle" align="left" style="text-align: left">
                        <label class="check-style"><input type="radio" value="0"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person=='0'||$_POST['is_jur_person']=='0') {?> checked="checked"<?php }?> onchange="$('#jur_person_block').fadeOut('slow', function () {
                                    $(this).css('display', 'none');});" name="is_jur_person" id="is_jur_person_0" /><span>&nbsp;</span><span>Физ. лицо</span></label>

                        <label class="check-style"><input type="radio" value="1"<?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person=='1'||$_POST['is_jur_person']=='1') {?> checked="checked"<?php }?> onchange="$('#jur_person_block').fadeIn('slow', function () {
                                    $(this).css('display', 'table-row-group');});" name="is_jur_person" id="is_jur_person_1" /><span>&nbsp;</span><span>Юр. лицо</span></label>

                    </td>
                </tr>

                <tbody <?php if ($_smarty_tpl->tpl_vars['get_user']->value->is_jur_person!=1&&$_POST['is_jur_person']!='1') {?>style="display: none"<?php }?> id="jur_person_block">
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
                    <td valign="top" align="right" style="text-align: right">Город:</td>
                    <td valign="middle" align="left" style="text-align: left">
                        <input type="text"  name="city_index" value="<?php echo stripslashes((($tmp = @$_POST['city_index'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city_index : $tmp));?>
" class="text"   maxlength="255" style="display: none;width: 80px" placeholder="Индекс"/> 
                        <input type="text" name="city" value="<?php echo stripslashes((($tmp = @$_POST['city'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->city : $tmp));?>
" class="text"   maxlength="255" style="width: 227px" placeholder="Город"/> 

                    </td>
                </tr>   
                <tr style="display: none">
                    <td valign="top" align="right" style="text-align: right;">Адрес:</td>
                    <td valign="middle" align="left">
                        <textarea style="width: 330px;height: 80px;" class="text" name="adress"   placeholder="Адрес, по которому будет производиться доставка"><?php echo stripslashes((($tmp = @$_POST['adress'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->adress : $tmp));?>
</textarea>
                    </td>
                </tr>   

                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">Ближайшее метро:</td>
                    <td valign="middle" align="left" style="text-align: left;">
                        <select class="text" name="metro_id" style="width: 350px;"  >
                            <option value="">Выбрать</option>
                            <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['metro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_POST['metro_id']==$_smarty_tpl->tpl_vars['item']->value->id||$_smarty_tpl->tpl_vars['get_user']->value->metro_id==$_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td valign="top" align="right" style="text-align: right;  width: 250px;vertical-align: top;">Информация:</td>
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
</div><?php }} ?>
