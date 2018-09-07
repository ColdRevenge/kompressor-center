<?php /* Smarty version 3.1.24, created on 2018-07-27 22:19:52
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/setting/templates/general.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:520957415b5b705878f762_23321599%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eef2e5b6c381d36878871635117ada66ba105749' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/setting/templates/general.tpl',
      1 => 1532719011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '520957415b5b705878f762_23321599',
  'variables' => 
  array (
    'visual_editor' => 0,
    'url' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'setting' => 0,
    'is_b2b' => 0,
    'b2b_setting' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b5b7058b3e632_49883864',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b5b7058b3e632_49883864')) {
function content_5b5b7058b3e632_49883864 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '520957415b5b705878f762_23321599';
?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['visual_editor']->value;?>
"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        tinyMCE.init({
            mode: "exact",
            elements: "footer_left",
            plugins: "images, pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,media,searchreplace,contextmenu,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist",
            theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect,|,sub,sup,|,charmap,iespell,media,emotions,images,image,advhr,|,ltr,rtl",
            theme_advanced_buttons2: "gallery,|tablecontrols,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,code,|,forecolor,backcolor",
            theme_advanced_buttons3: "",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "center",
            extended_valid_elements: "script|iframe[name|src|framespacing|border|frameborder|scrolling|title|height|width]",
            extended_valid_elements : "div[*],p[*],object[declare|classid|codebase|data|type|codetype|archive|standby|height|width|usemap|name|tabindex|align|border|hspace|vspace]",
                    theme_advanced_resizing: false,
            theme_advanced_blockformats: "p,h1, h2",
            language: "ru",
            content_css: '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
style_ve.css',
            convert_urls: false,
            setup: function (ed) {
                // Add a custom button
                ed.addButton('gallery', {
                    title: 'Вставить контейнер',
                    image: '/images/sys/header_page.png',
                    onclick: function () {
                        ed.selection.setContent('<div class="header_page"><h6>Заголовок</h6></div>');
                    }
                });
            }
        });


    <?php echo '</script'; ?>
>


<div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_setting.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

        <h1>Общие настройки</h1>

        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="510">
                <tr>
                    <td valign="middle" align="right" width="250">Название: </td>
                    <td valign="middle" align="left">
                        <input type="text" value="<?php echo (($tmp = @$_POST['name'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->name : $tmp);?>
" name="name"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">E-mail адрес уведомлений: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="email" value="<?php echo (($tmp = @$_POST['email'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->email : $tmp);?>
"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">E-mail адрес уведомлений 2: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="email_2" value="<?php echo (($tmp = @$_POST['email_2'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->email_2 : $tmp);?>
"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">E-mail адрес уведомлений 3: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="email_3" value="<?php echo (($tmp = @$_POST['email_3'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->email_3 : $tmp);?>
"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Телефон 1: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="phone_1" value="<?php echo (($tmp = @$_POST['phone_1'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->phone_1 : $tmp);?>
"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Телефон 2: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="phone_2" value="<?php echo (($tmp = @$_POST['phone_2'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->phone_2 : $tmp);?>
"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Телефон 3: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="phone_3" value="<?php echo (($tmp = @$_POST['phone_3'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->phone_3 : $tmp);?>
"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Телефон 4: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="phone_4" value="<?php echo (($tmp = @$_POST['phone_4'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->phone_4 : $tmp);?>
"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Заголовок (по-умолчанию): </td>
                    <td valign="middle" align="left">
                        <input type="text" name="title" value="<?php echo (($tmp = @$_POST['title'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->title : $tmp);?>
"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="right">Meta-описание (по-умолчанию): </td>
                    <td valign="middle" align="left">
                        <textarea style="width: 250px;" rows="8" name="meta_desc"><?php echo (($tmp = @$_POST['meta_desc'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->meta_desc : $tmp);?>
</textarea>
                    </td>
                </tr><tr>
                    <td valign="top" align="right">Meta-ключ. слова (по-умолчанию): </td>
                    <td valign="middle" align="left">
                        <textarea style="width: 250px;" rows="5" name="meta_key"><?php echo (($tmp = @$_POST['meta_key'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->meta_key : $tmp);?>
</textarea>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="top" align="right">Наценка: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="mark_up" maxlength="11" value="<?php echo (($tmp = @$_POST['mark_up'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->mark_up : $tmp);?>
"  style="width: 50px;"/>
                        <div class="notice">(Например, <b>1.15</b>, цена будет увеличена на 15%, или <b>0.70</b> - снижена на 30%)</div>
                    </td>
                </tr>
                
                


                <tr>
                    <td valign="middle" align="right">Минимальная сумма заказа: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="min_price" maxlength="11" value="<?php echo (($tmp = @$_POST['min_price'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->min_price : $tmp);?>
"  style="width: 50px;"/> руб.
                    </td>
                </tr>


                <tr>
                    <td valign="middle" align="right">Скрыть цены: </td>
                    <td valign="middle" align="left">
                        <input type="checkbox" value="1" name="hide_prices" <?php if ((($tmp = @$_POST['hide_prices'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->hide_prices : $tmp) == 1) {?> checked="checked"<?php }?> />
                    </td>
                </tr>

         
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <input type="hidden" name="submit" value="1" />
                        <button>Сохранить</button>
                    </td>
                </tr>
            </table>
        </form>
        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="510">
                <tr>
                    <td valign="middle" align="left" colspan="2"><h1>Изменить пароль</h1></td>
                </tr>

                <tr>
                    <td valign="middle" align="right" width="250">Страый пароль: </td>
                    <td valign="middle" align="left">
                        <input type="password" value="" name="old_password"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Новый пароль: </td>
                    <td valign="middle" align="left">
                        <input type="password" name="password" value=""  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Подтверждение нового пароля: </td>
                    <td valign="middle" align="left">
                        <input type="password" name="confirm_password"  value=""  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <input type="hidden" name="submit_pass" value="1" />
                        <button>Сохранить</button>
                    </td>
                </tr>

            </table>
        </form>

        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="510">
                <tr>
                    <td valign="middle" align="left" colspan="2"><h1>Валютный курс</h1></td>
                </tr>
                <tr>
                    <td valign="middle" align="right" width="250">USD:</td>
                    <td valign="middle" align="left">
                        <input type="text" value="<?php echo (($tmp = @$_POST['usd'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->usd : $tmp);?>
" name="usd"
                               style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">EUR:</td>
                    <td valign="middle" align="left">
                        <input type="text" name="eur" value="<?php echo (($tmp = @$_POST['eur'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['setting']->value->eur : $tmp);?>
"
                               style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <input type="hidden" name="submit_currency" value="1" />
                        <button>Сохранить</button>
                    </td>
                </tr>

            </table>
        </form>

        <?php if ($_smarty_tpl->tpl_vars['is_b2b']->value) {?>
            <form method="post" action="">
                <table cellpadding="4" cellspacing="0" border="0" width="710">
                    <tr>
                        <td valign="middle" align="left" colspan="2"><h1>Авто-переключение колонок цен (B2B)</h1></td>
                    </tr>

                    <tr>
                        <td valign="middle" align="right" width="250">Цена 2: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b2b_setting']->value[1]->price;?>
" name="b2b[1]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[1]" <?php if ($_smarty_tpl->tpl_vars['b2b_setting']->value[1]->is_active == 1) {?> checked="checked"<?php }?> id="b2b_1" /><label for="b2b_1">Активный</label>
                        </td> 
                    </tr>

                    <tr>
                        <td valign="middle" align="right" width="250">Цена 3: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b2b_setting']->value[2]->price;?>
" name="b2b[2]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[2]" <?php if ($_smarty_tpl->tpl_vars['b2b_setting']->value[2]->is_active == 1) {?> checked="checked"<?php }?> id="b2b_2" /><label for="b2b_2">Активный</label>
                        </td>
                    </tr>

                    <tr>
                        <td valign="middle" align="right" width="250">Цена 4: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b2b_setting']->value[3]->price;?>
" name="b2b[3]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[3]" <?php if ($_smarty_tpl->tpl_vars['b2b_setting']->value[3]->is_active == 1) {?> checked="checked"<?php }?> id="b2b_3" /><label for="b2b_3">Активный</label>
                        </td>
                    </tr>

                    <tr>
                        <td valign="middle" align="right" width="250">Цена 5: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b2b_setting']->value[4]->price;?>
" name="b2b[4]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[4]" <?php if ($_smarty_tpl->tpl_vars['b2b_setting']->value[4]->is_active == 1) {?> checked="checked"<?php }?> id="b2b_4" /><label for="b2b_4">Активный</label>
                        </td>
                    </tr>


                    <tr>
                        <td valign="middle" align="right" width="250">Цена 6: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b2b_setting']->value[5]->price;?>
" name="b2b[5]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[5]" <?php if ($_smarty_tpl->tpl_vars['b2b_setting']->value[5]->is_active == 1) {?> checked="checked"<?php }?> id="b2b_5" /><label for="b2b_5">Активный</label>
                        </td>
                    </tr>


                    <tr>
                        <td valign="middle" align="right" width="250">Цена 7: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b2b_setting']->value[6]->price;?>
" name="b2b[6]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[6]" <?php if ($_smarty_tpl->tpl_vars['b2b_setting']->value[6]->is_active == 1) {?> checked="checked"<?php }?> id="b2b_6" /><label for="b2b_6">Активный</label>
                        </td>
                    </tr>


                    <tr>
                        <td valign="middle" align="right" width="250">Цена 8: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b2b_setting']->value[7]->price;?>
" name="b2b[7]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[7]" <?php if ($_smarty_tpl->tpl_vars['b2b_setting']->value[7]->is_active == 1) {?> checked="checked"<?php }?> id="b2b_7" /><label for="b2b_7">Активный</label>
                        </td>
                    </tr>


                    <tr>
                        <td valign="middle" align="right" width="250">Цена 9: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b2b_setting']->value[8]->price;?>
" name="b2b[8]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[8]" <?php if ($_smarty_tpl->tpl_vars['b2b_setting']->value[8]->is_active == 1) {?> checked="checked"<?php }?> id="b2b_8" /><label for="b2b_8">Активный</label>
                        </td>
                    </tr>

                    <tr>
                        <td valign="middle" align="right" width="250">Цена 10: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['b2b_setting']->value[9]->price;?>
" name="b2b[9]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[9]" <?php if ($_smarty_tpl->tpl_vars['b2b_setting']->value[9]->is_active == 1) {?> checked="checked"<?php }?> id="b2b_9" /><label for="b2b_9">Активный</label>
                        </td>
                    </tr>

                    
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <input type="hidden" name="submit_b2b" value="1" />
                            <button>Сохранить</button>
                        </td>
                    </tr>

                </table>
            </form>
        <?php }?>
    </div>
</div><?php }
}
?>