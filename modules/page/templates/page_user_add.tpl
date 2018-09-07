<h1>Публикация ваших статей на VBBook</h1>

{if !$user_id}
    <p>Для добавления статей необходимо <a href="{$url}auth/auth/"><b>авторизоваться</b></a>.</p>
    <p>Если вы не зарегистрированны на сайте, пройдите простую <a href="{$url}auth/register/"><b>регистрацию</b></a></p>

{else}    
    <script type="text/javascript" src="{$visual_editor}"></script>
    {literal}
        <script type="text/javascript">
 
              tinyMCE.init({
                      // General options
                      mode : "textareas",
                      theme : "advanced",
                      plugins : "images,paste, table,advimage,advlink,inlinepopups,preview,media,fullscreen,noneditable,template,wordcount,autosave",

                      // Theme options
                      theme_advanced_buttons1 : ",bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,|,sub,sup,|,forecolor,backcolor,|,restoredraft,fullscreen,",
                      theme_advanced_buttons2 : "gallery,|,bullist,numlist,|,undo,redo,|,link,unlink,media,code, | ,tablecontrols,",
                      theme_advanced_buttons3 : "",
                      theme_advanced_toolbar_location : "top",
                      theme_advanced_toolbar_align : "center",
                      theme_advanced_statusbar_location : "bottom",
                      theme_advanced_resizing : true,
                    extended_valid_elements : "iframe[name|src|framespacing|border|frameborder|scrolling|title|height|width]style",
                    extended_valid_elements : "pre[*],div[*],p[*],object[declare|classid|codebase|data|type|codetype|archive|standby|height|width|usemap|name|tabindex|align|border|hspace|vspace]",
              
                    theme_advanced_blockformats:"p,h1, h2, h3",
                    language:"ru",
                    content_css : '/style_ve.css',
                    convert_urls : false,
                    paste_remove_spans: true,
                    paste_remove_styles: true,
                    paste_preprocess : function(pl, o) {
                    o.content = strip_tags( o.content,'<b><u><i><p><h1><h2><h3><a><strong><em><table><tbody><tr><td><th><ul><li><ol>' );
                    },
    setup : function(ed) {
      // Add a custom button
            ed.addButton('gallery', {
            title : 'Вставить код',
            image : '/images/sys/header_page.png',
            onclick : function() {
            ed.selection.setContent('<pre>'+ed.selection.getContent()+'</pre>');
            }
            });
                },
                  

                      // Style formats (вставить styleselect,fontselect,)
                      style_formats : [ 
                              {title : 'Bold text', inline : 'b'},
                              {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
                      ]
              });
         
        </script>


    {/literal}

    {include file=$template_message message=$message error=$error}

    <form method="post" action="" name="form_add_page" id="form_add_page">
        <table cellpadding="3" cellspacing="0" border="0" style="width: 800px; margin-left: 20px;">
            <tr>
                <td valign="middle" align="right">Название статьи: <span class="asterix">*</span></td>
                <td valign="middle" align="left" width="400">
                    <input type="text" name="header" value="{$smarty.post.header}" style="width: 600px"/>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">Язык программирования:
                    <div class="notice">Если статья о программировании</div>
                </td>
                <td valign="middle" align="left">
                    <input type="text" name="desc" value="{$smarty.post.desc}" style="width: 600px" />
                </td>
            </tr>
            {if $is_auth == 2}
                <tr>
                    <td valign="middle" align="right">Название статьи: <span class="asterix">*</span></td>
                    <td valign="middle" align="left" width="400">
                        <input type="text" name="title" id="title_article" value="{$smarty.post.title}" style="width: 600px"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Номер урока: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="lesson" value="{$smarty.post.lesson|stripslashes}" maxlength="200" style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Сортировка: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="order" value="{$smarty.post.order}" maxlength="200" style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Категория 1: </td>
                    <td valign="middle" align="left">
                        <select name="category_id" id="category_id" style="width: 250px;">
                            <option value="0">...</option>
                            {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 current_id=$edit_id selected_id=$smarty.post.category_id}
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Категория 2: </td>
                    <td valign="middle" align="left">
                        <select name="category_2_id" id="category_id" style="width: 250px;">
                            <option value="0">...</option>
                            {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 current_id=$edit_id selected_id=$smarty.post.category_2_id}
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Адрес: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="pseudo_dir" id="pseudo_dir" value="{$smarty.post.pseudo_dir}" maxlength="200" style="width: 250px;"/>
                        <a href="javascript:void(0)" onclick="AjaxRequest('pseudo_dir','{$MyURL}ajax/auto_pseudo_dir/?not_html=1&name='+document.getElementById('title_article').value.replace('&', '').replace('&', ''), true);">Обновить адрес</a>
                    </td>
                </tr>
            {/if}    
            <tr>
                <td valign="middle" align="right">Автор: </td>
                <td valign="middle" align="left">
                    <input type="text" name="author" value="{$smarty.post.author|stripslashes|default:$get_user->login}" maxlength="200" style="width: 250px;"/>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">E-Mail: </td>
                <td valign="middle" align="left">
                    <input type="text" name="mail" value="{$smarty.post.mail|stripslashes|default:$get_user->email}" maxlength="200" style="width: 250px;"/>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">Сайт: </td>
                <td valign="middle" align="left">
                    <input type="text" name="www" value="{$smarty.post.www|stripslashes|default:$get_user->www}" maxlength="200" style="width: 250px;"/>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">Skype: </td>
                <td valign="middle" align="left">
                    <input type="text" name="skype" value="{$smarty.post.skype|stripslashes|default:$get_user->skype}" maxlength="100" style="width: 250px;"/>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">ICQ: </td>
                <td valign="middle" align="left">
                    <input type="text" name="icq" value="{$smarty.post.icq|stripslashes|default:$get_user->icq}" maxlength="100" style="width: 250px;"/>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="center" colspan="2">
                    <textarea name="text" id="SMSBody" cols="10" style="width: 800px;height: 420px;">{$smarty.post.text|stripslashes}</textarea>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <div style="float: left; color: gray;"><span class="asterix">*</span> Для перевода строки зажмите <b>Shift + Enter</b></div>
                    <input type="hidden" value="{$up_page_id}" name="page_id" />

                    <button class="save" name="save" onclick="$('#form_add_page').attr('action', ''); $('#form_add_page').attr('target', '');"></button>
                    <button class="preview" onclick="$('#form_add_page').attr('action', '{$url}page/'); $('#form_add_page').attr('target', '__blank');"></button>

                    <button class="add" name="add" onclick="$('#form_add_page').attr('action', ''); $('#form_add_page').attr('target', '');"></button>
                </td>
            </tr>
        </table>
    </form>

    <h1>Добавить изображения и исходники</h1>
    <div class="notice">Исходники должны быть в форматах zip, rar</div>
    <div class="notice" style="margin-bottom: 4px;">Исходники должны быть в форматах jpg, gif, png, jpeg</div>

    {$upload_photo}
{/if}