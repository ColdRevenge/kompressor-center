<script type="text/javascript" src="{$visual_editor}"></script>
{literal}
    <script type="text/javascript">
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
    </script>
{/literal}

{if $smarty.post.name}
    <h2>Письма успешно отправлены!</h2>
{else}
    <div class="block">
        <h1>Почтовая рассылка ({$mails|@count} почтовых адресов)</h1>
        <div id="result">
            <form method="post" action="" name="form_send" id="form_send">
                <table cellpadding="3" cellspacing="0" border="0">
                    <tr>
                        <td valign="top" align="left">
                            <table cellpadding="3" cellspacing="0" border="0">
                                {*   <tr>
                                <td valign="middle" align="right">Имя отправителя: </td>
                                <td valign="middle" align="left">
                                <input type="text" name="name" value="{$smarty.post.name|default:$setting->name}" style="width: 300px;"/>
                                </td>
                                </tr>*}
                                <tr>
                                    <td valign="middle" align="right">Тема сообшения: </td>
                                    <td valign="middle" align="left" width="400">
                                        <input type="text" id="subject" name="subject" value="{$smarty.post.subject}" style="width: 715px;"/>
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
                                        {*            <input type="radio" name="type" value="2" id="type_2" onchange="if ($(this).attr('checked')) {
                                        $('#result').find('input[type=checkbox]').removeAttr('checked');
                                        $('#result').find('input[type=checkbox][rel=1]').attr('checked', 'checked');
                                        }" style="vertical-align: baseline"/><label for="type_2"style="vertical-align: baseline">Новинки каталога</label>*}
                             {*           <script type="text/javascript">
                                            $(document).ready(function() {

                                                if ($('#type_1').attr('checked')) {
                                                    $('#result').find('input[type=checkbox]').removeAttr('checked');
                                                    $('#result').find('input[type=checkbox][lang=1]').attr('checked', 'checked');
                                                }
                                            });
                                        </script>*}
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" align="right">Текст: </td>
                                    <td valign="middle" align="left" colspan="2">
                                        <div style="display: none"><textarea name="message" id="send_message" ></textarea></div>
                                        <textarea  id="SMSBody" cols="10" style="width: 700px;height: 370px;">{$smarty.post.text|stripslashes}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle">&nbsp;</td>
                                    <td valign="middle" align="right" colspan="2">
                                        <div style="float: left; color: gray;"><span class="asterix">*</span> Для перевода строки зажмите <b>Shift + Enter</b></div>

                                        <input type="hidden"  name="submit" />
                                        <button  onclick=" this.style.display = 'none';
                                                document.getElementById('send_message').value = tinyMCE.get('SMSBody').getContent();
                                                AjaxFormRequest('result', 'form_send', '{$MyURL}mail/');
                                                return false;">Отправить</button>
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <td valign="top" align="left">
                            <h2>Подписчики: </h2>
                            <div style="overflow-x: auto; height: 450px; width: 250px;border: 1px solid #CCCCCC;">
                                <table cellpadding="0" cellspacing="0" border="0" class="table" style="width: 100%;" id="list_mail_adress">
                                    {include file="getSender.tpl"}
                                </table>
                            </div><br/>
                            <div class="notice"><label class="p-check"><input type="checkbox" onclick="SelectAll()" name="asdf" id="asdf" checked="checked"  /><em>&nbsp;</em><span>Выделить все/Снять выбор</span></label></div>
                            <br/>
                            <br/><a href="{$admin_url}send/export/" class="button">Выгрузить e-mail адреса</a><br/>
                            <button style="margin-top: 3px;" onclick="if (confirm('Вы действительно хотите удалить выбраные e-mail адреса?')) {
                                        AjaxFormRequest('list_mail_adress', 'form_send', '{$admin_url}send/list/mail/');
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
            {$upload}
            <h1>История рассылки</h1>
            <div style="overflow: auto; max-height: 170px; width: 400px;margin-bottom: 20px;">
                <table class="table" cellpadding="3" cellspacing="0" border="0" style="width: 380px;">
                    {foreach from=$history item="item"}
                        <tbody class="tbody">
                            <tr>
                                <td style="text-align: center">{$item->created|date_format:"%d.%m.%Y %H:%M"}</td>
                                <td style="text-align: left"><a href="{$admin_url}send/history/{$item->id}/?not_html=1" rel="fancy" title="{$item->subject|stripslashes|replace:'"':"'"|default:"<i>Без темы</i>"}">{$item->subject|stripslashes|default:"<i>Без темы</i>"}</a></td>
                            </tr>
                        </tbody>
                    {/foreach}
                </table>
            </div>
        </div>
    </div>
{/if}
<script type="text/javascript">
    function SelectAll()
    {
        for (i = 0; i < document.forms['form_send'].elements.length; i++) {
            var item = document.forms['form_send'].elements[i];
            item.checked = document.forms['form_send'].asdf.checked;
        }
        ;
    }
</script>