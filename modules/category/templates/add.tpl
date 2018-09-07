<script type="text/javascript" src="{$visual_editor}"></script>
{literal}
    <script type="text/javascript">
        tinyMCE.init({
            mode: "exact", //режим
            elements: "desc",
            theme: "advanced",
            plugins: "pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,media,searchreplace,contextmenu,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist",
            theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect,|,sub,sup,|,charmap,iespell,media,emotions,image,advhr,|,ltr,rtl",
            theme_advanced_buttons2: "tablecontrols,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,code,|,forecolor,backcolor",
            theme_advanced_buttons3: "",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "center",
            theme_advanced_resizing: false,
            language: "ru",
            content_css: '{/literal}{$url}{literal}style_ve.css',
            convert_urls: false
        });
        function changeCategory() {
            if (document.getElementById('category_id').options[document.getElementById('category_id').selectedIndex].value == 0) {
                document.getElementById('pseudo_dir').disabled = false;
            }
            else {
                document.getElementById('pseudo_dir').disabled = true;
                document.getElementById('pseudo_dir').value = '';
            }

            if (document.getElementById('pseudo_dir').value == "") {
                document.getElementById('category_id').disabled = false;
            }
            else {
                document.getElementById('category_id').disabled = true;
                document.getElementById('category_id').selected = 0;
            }
        }

    </script>
{/literal}
<div class="block">
    <div class="menu">
        {include file="_menu_category.tpl"}
    </div>
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>{if $edit_id > 0}Редактировать{else}Добавить{/if} категорию </h1>

        <form method="post" enctype="multipart/form-data" action="">
            <div  id="language_1">
                <table cellpadding="2" cellspacing="0" border="0">
                    {if $type != 1} <tr>
                            <td valign="middle" align="right" width="170">Родительская категория:</td>
                            <td valign="middle" align="left">
                                <select name="category_id" id="category_id" style="width: 250px;">
                                    <option value="0">...</option>
                                    {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 current_id=$edit_id selected_id=$smarty.post.category_id}
                                </select>
                            </td>
                        </tr>{/if}
                        <tr>
                            <td valign="middle" align="right">Название <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left"><input type="text" name="name" value="{$smarty.post.name|stripslashes|replace:"'":'"'}" maxlength="255" style="width: 450px;vertical-align: middle;"/>&nbsp;<button onclick="AjaxRequest('pseudo_dir', '{$MyURL}ajax/auto_pseudo_dir/?not_html=1&parent_id={$param_tpl.parent_id|default:$smarty.get.parent_id}&name=' + $(this).prev().val() + '&edit_id={$edit_id|default:"0"}', true);
                                    return false;">Обновить адрес</button></td>
                        </tr>

                        <tr>
                            <td valign="middle" align="right">Адрес</td>
                            <td valign="middle" align="left">
                                <input type="text" name="pseudo_dir" {if $is_read_only == 1}readonly="readonly"{/if}  id="pseudo_dir"  onchange="AjaxRequest('is_dir', '{$admin_url}category/is_pseudo_dir/' + this.value + '/0/0/{$edit_id}/');" value="{$smarty.post.pseudo_dir}" maxlength="255" style="width:181px;vertical-align: middle;display: inline-block"/>/<span id="is_dir" style="display: inline-block"></span>
                            </td>
                        </tr>
                        {if $type == 5}
                            <tr>
                                <td valign="middle" align="right">Дата:</td>
                                <td valign="middle" align="left"><input type="text" name="param_str_2" value="{$smarty.post.param_str_2}" placeholder="2012-12-31"/></td>
                            </tr>
                        {/if}
                        {*       <tr>
                        <td>&nbsp;</td>
                        <td valign="middle" align="left" >
                        <input type="checkbox" name="is_param_1" value="1" {if $smarty.post.is_param_1 == 1}checked{/if} class="checkbox" id="is_param_1"/><label for="is_param_1">Показывать раздел в каталоге товаров</label>
                        </td>
                        </tr> *}

                        <tr>
                            <td valign="top" align="right">Иконка раздела:</td>
                            <td valign="middle" align="left">
                                {if $uploaded_image}
                                    <a href="{$icons_url}{$uploaded_image}" target="_blank"><img src="{$icons_url}{$uploaded_image}" alt="" style="max-width: 64px;" /></a>
                                    <input type="hidden" value="{$uploaded_image}" name="uploaded_image" />
                                {/if}
                                {if $uploaded_image}Заменить: {/if}<input type="file" name="icon" />

                                {if $icon_width > 0 || $icon_height > 0}
                                    <p><div class="notice"><span class="asterix">*</span> Размер: <b>{$icon_width|default:"auto"}x{$icon_height|default:"auto"}</b></div></p>
                                {/if}
                            </td>
                        </tr>
              {*          {if $shop != 'forum'}
                            <tr>
                                <td valign="top" align="right">Иконка в меню:</td>
                                <td valign="middle" align="left">
                                    {if $uploaded_image_2}
                                        <a href="{$icons_url}{$uploaded_image_2}" target="_blank"><img src="{$icons_url}{$uploaded_image_2}" alt="" style="max-width: 64px;" /></a>
                                        <input type="hidden" value="{$uploaded_image_2}" name="uploaded_image_2" />
                                    {/if}
                                    {if $uploaded_image_2}Заменить: {/if}<input type="file" name="icon_2" />

                                    {if $icon_2_width > 0 || $icon_2_height > 0}
                                        <p><div class="notice"><span class="asterix">*</span> Размер: <b>{$icon_2_width|default:"auto"}x{$icon_2_height|default:"auto"}</b></div></p>
                                    {/if}
                                </td>
                            </tr>
                        {/if}*}
                        <tr>
                            <td valign="middle" align="right">Сортировка</td>
                            <td valign="middle" align="left"><input type="text" name="order" value="{$smarty.post.order}" maxlength="7" style="width: 50px;"/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td valign="middle" align="left" >
                                <label class="p-check"><input type="checkbox" name="is_visible" value="0" {if $smarty.post.is_visible == 0}checked{/if} class="checkbox" id="is_visible"/><em>&nbsp;</em><span>Скрытый раздел</span></label>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Ссылка:</td>
                            <td valign="middle" align="left"><input type="text" onchange="if (this.value != ''){ldelim}
                                        document.getElementById('pseudo_dir').disabled = true{rdelim} else{ldelim}
                                                    document.getElementById('pseudo_dir').disabled = false{rdelim}"  name="link" value="{$smarty.post.link}" maxlength="255" style="width: 550px;;"/></td>
                        </tr>


                        {*        <tr>
                        <td valign="middle" align="right">Описание категории:</td>
                        <td valign="middle" align="left">
                        <textarea rows="9" name="desc[1]" cols="10" style="width: 600px;">{$smarty.post.desc.1}</textarea>
                        </td>
                        </tr> *}
                    {*    {if $shop == 'forum'}
                            <tr>
                                <td valign="middle" align="right">Описание темы</td>
                                <td valign="middle" align="left"><input type="text" name="param_str_1" value="{$smarty.post.param_str_1|stripslashes|replace:"'":'"'}" maxlength="255" style="width: 640px;;"/></td>
                            </tr>
                        {else}
                            <tr>
                                <td>&nbsp;</td>
                                <td valign="middle" align="left" >
                                    <label class="p-check"><input type="checkbox" name="is_param_1" value="1" {if $smarty.post.is_param_1 == 1}checked{/if} class="checkbox" id="is_param_1"/><em>&nbsp;</em><span>Показывать на главной</span></label> 
                                </td>
                            </tr>
                        {/if}*}
                        <tr>
                            <td valign="middle" align="left" colspan="2"><br/>
                                <h2>Настройки для Сео оптимизатора</h2><br/>
                            </td>
                        </tr>

                        <tr>
                            <td valign="middle" align="right">Заголовок (H1)</td>
                            <td valign="middle" align="left"><input type="text" name="h1" value="{$smarty.post.h1|stripslashes|replace:"'":'"'}" maxlength="255" style="width: 646px;"/></td>
                        </tr>

                        <tr>
                            <td valign="middle" align="right">Заголовок (Title)</td>
                            <td valign="middle" align="left"><input type="text" name="title" value="{$smarty.post.title|stripslashes|replace:"'":'"'}" maxlength="255" style="width: 646px;"/></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Тег META keywords:</td>
                            <td valign="middle" align="left"><input type="text" name="meta_key" value="{$smarty.post.meta_key|stripslashes|replace:"'":'"'}" maxlength="255" style="width: 646px;"/></td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">Тег META description:</td>
                            <td valign="middle" align="left">
                                <textarea name="meta_desc" rows="5" style="width: 646px;">{$smarty.post.meta_desc|stripslashes|replace:"'":'"'}</textarea>
                            </td>
                        </tr> 

                        <tr>
                            <td valign="middle" align="right" colspan="2">
                                {if $edit_id > 0}<button>Сохранить</button>{else}<button>Добавить</button>{/if}
                            </td>
                        </tr>
                    </table>
                </div>

            </form>
        </div>
        {if $edit_id > 0}
            <script type="text/javascript">
                AjaxRequest('is_dir', '{$admin_url}category/is_pseudo_dir/' + $('pseudo_dir').value + '/0/0/{$edit_id}/');
            </script>
        {/if}
    </div>