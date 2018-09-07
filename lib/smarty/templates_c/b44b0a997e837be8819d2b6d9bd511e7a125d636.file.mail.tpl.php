<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 17:08:29
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/send/templates/mail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204093858755d5df5e00a400-16592611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b44b0a997e837be8819d2b6d9bd511e7a125d636' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/send/templates/mail.tpl',
      1 => 1439727578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204093858755d5df5e00a400-16592611',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'visual_editor' => 0,
    'mails' => 0,
    'MyURL' => 0,
    'admin_url' => 0,
    'upload' => 0,
    'history' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5df5e065cf7_46410159',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5df5e065cf7_46410159')) {function content_55d5df5e065cf7_46410159($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['visual_editor']->value;?>
"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        tinymce.init({
            selector: "textarea",
            skin: 'light',
            image_advtab: true,
            plugins: [
                "images, advlist autolink autosave link image lists charmap   pagebreak spellchecker",
                "searchreplace wordcount code fullscreen media ",
                "table contextmenu directionality  template textcolor paste  textcolor jbimages"
            ],
            toolbar1: "bullist numlist | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontsizeselect | forecolor backcolor | code ",
            toolbar2: "gallery blockquote | outdent indent undo redo | link unlink  image jbimages  media | table | removeformat | subscript superscript | charmap |  fullscreen | spellchecker | cut copy paste searchreplace |   restoredraft",
            //template
            language: "ru",
            menubar: false,
            statusbar: false,
            spellchecker_language: "ru",
            spellchecker_rpc_url: "http://speller.yandex.net/services/tinyspell",
            convert_urls: false,
            autosave_restore_when_empty: false,
            content_css: '/style_ve.css',
            toolbar_items_size: 'small',
            block_formats: "Абзац=p;Заголовок 1=h1;Заголовок 2=h2;Заголовок 3=h3",
            fontsize_formats: "10px 12px 13px 14px 15px 17px 19px 20px 21px 25px 30px 35px",
            setup: function(ed) {
                ed.addButton('gallery', {
                    title: 'Добавить блок изображений',
                    image: '/images/sys/folder-pictures_7965.png',
                    onclick: function() {
                        ed.selection.setContent('<div class="images-block">' + ed.selection.getContent() + '</div>');
                    }}
                )
            },
            extended_valid_elements: "iframe[name,src,framespacing,border,frameborder,scrolling,title,height,width]style,div[*],p[*],a[*],object[declare,classid,codebase,data,type,codetype,archive,standby,height,width,usemap,name,tabindex,align,border,hspace,vspace, script[*]]",
        });

        function pasteImage(full_img, small_img) {
            var myField = tinyMCE.get("SMSBody");

            //IE support
            if (document.selection) {
                myField.focus();
                sel = document.selection.createRange();
                if (small_img != '') {
                    sel.text = '<a href="' + full_img + '"><img src="' + small_img + '" alt="" /></a>';
                }
                else {
                    sel.text = '<img src="' + full_img + '" alt="" />';
                }
            }
            else if (document.getSelection) {
                if (small_img != '') {
                    tinyMCE.activeEditor.selection.setContent('<a href="' + full_img + '" rel="prettyPhoto[gallery1]"><img src="' + small_img + '" alt="" /></a>');
                }
                else {
                    tinyMCE.activeEditor.selection.setContent('<img src="' + full_img + '" alt="" />');
                }
                myField.focus();
            }
        }
    <?php echo '</script'; ?>
>


<?php if ($_POST['name']) {?>
    <h2>Письма успешно отправлены!</h2>
<?php } else { ?>
    <div class="block">
        <h1>Почтовая рассылка (<?php echo count($_smarty_tpl->tpl_vars['mails']->value);?>
 почтовых адресов)</h1>
        <div id="result">
            <form method="post" action="" name="form_send" id="form_send">
                <table cellpadding="3" cellspacing="0" border="0">
                    <tr>
                        <td valign="top" align="left">
                            <table cellpadding="3" cellspacing="0" border="0">
                                
                                <tr>
                                    <td valign="middle" align="right">Тема сообшения: </td>
                                    <td valign="middle" align="left" width="400">
                                        <input type="text" id="subject" name="subject" value="<?php echo $_POST['subject'];?>
" style="width: 715px;"/>
                                    </td>
                                </tr>
                                <tr style="display: none">
                                    <td valign="middle" align="right">Подписчикам: </td>
                                    <td valign="middle" align="left" width="400">     
                                        <input type="radio" checked="checked" name="type" value="0"  id="type_0" onchange="if ($(this).attr('checked')) {
                                                    $('#result').find('input[type=checkbox]').attr('checked', 'checked');
                                                }" style="vertical-align: baseline"/><label for="type_0"style="vertical-align: baseline">Всем</label>
                                        <input type="radio" name="type" value="1" id="type_1" onchange="if ($(this).attr('checked')) {
                                                    $('#result').find('input[type=checkbox]').removeAttr('checked');
                                                    $('#result').find('input[type=checkbox][lang=1]').attr('checked', 'checked');
                                                }" style="vertical-align: baseline"/><label for="type_1"style="vertical-align: baseline">Только активным</label>
                                        
                             
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" align="right">Текст: </td>
                                    <td valign="middle" align="left" colspan="2">
                                        <div style="display: none"><textarea name="message" id="send_message" ></textarea></div>
                                        <textarea  id="SMSBody" cols="10" style="width: 700px;height: 370px;"><?php echo stripslashes($_POST['text']);?>
</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle">&nbsp;</td>
                                    <td valign="middle" align="right" colspan="2">
                                        <div style="float: left; color: gray;"><span class="asterix">*</span> Для перевода строки зажмите <b>Shift + Enter</b></div>

                                        <input type="hidden"  name="submit" />
                                        <button  onclick=" this.style.display = 'none';
                                                document.getElementById('send_message').value = tinyMCE.get('SMSBody').getContent();
                                                AjaxFormRequest('result', 'form_send', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
mail/');
                                                return false;">Отправить</button>
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <td valign="top" align="left">
                            <h2>Подписчики: </h2>
                            <div style="overflow-x: auto; height: 450px; width: 250px;border: 1px solid #CCCCCC;">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" style="width: 100%;" id="list_mail_adress">
                                    <?php echo $_smarty_tpl->getSubTemplate ("getSender.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                                </table>
                            </div><br/>
                            <div class="notice"><label class="p-check"><input type="checkbox" onclick="SelectAll()" name="asdf" id="asdf" checked="checked"  /><em>&nbsp;</em><span>Выделить все/Снять выбор</span></label></div>
                            <br/>
                            <br/><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
send/export/" class="button">Выгрузить e-mail адреса</a><br/>
                            <button style="margin-top: 3px;" onclick="if (confirm('Вы действительно хотите удалить выбраные e-mail адреса?')) {
                                        AjaxFormRequest('list_mail_adress', 'form_send', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
send/list/mail/');
                                        return false;
                                    }
                                    else {
                                        return false;
                                    }">Удалить выбраное</button>
                        </td>
                    </tr>
                </table>
            </form>
            <h1>Загрузка изображений и прикрепление файлов к письму</h1>
            <?php echo $_smarty_tpl->tpl_vars['upload']->value;?>

            <h1>История рассылки</h1>
            <div style="overflow: auto; max-height: 170px; width: 400px;margin-bottom: 20px;">
                <table class="table" cellpadding="3" cellspacing="0" border="0" style="width: 380px;">
                    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['history']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                        <tbody class="tbody">
                            <tr>
                                <td style="text-align: center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value->created,"%d.%m.%Y %H:%M");?>
</td>
                                <td style="text-align: left"><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
send/history/<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
/?not_html=1" rel="fancy" title="<?php echo (($tmp = @smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['item']->value->subject),'"',"'"))===null||$tmp==='' ? "<i>Без темы</i>" : $tmp);?>
"><?php echo (($tmp = @stripslashes($_smarty_tpl->tpl_vars['item']->value->subject))===null||$tmp==='' ? "<i>Без темы</i>" : $tmp);?>
</a></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
<?php }?>
<?php echo '<script'; ?>
 type="text/javascript">
    function SelectAll()
    {
        for (i = 0; i < document.forms['form_send'].elements.length; i++) {
            var item = document.forms['form_send'].elements[i];
            item.checked = document.forms['form_send'].asdf.checked;
        }
        ;
    }
<?php echo '</script'; ?>
><?php }} ?>
