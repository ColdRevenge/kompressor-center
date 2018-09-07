<div class="block">



    <script type="text/javascript" src="{$visual_editor}"></script>
    {literal}
        <script type="text/javascript">
            tinymce.init({
                selector: "textarea",
                skin: 'light',
                image_advtab: true,
                language: 'ru',
                plugins: [
                    "images, advlist autolink autosave link image lists charmap   pagebreak spellchecker",
                    "searchreplace wordcount code fullscreen media ",
                    "table contextmenu directionality  template textcolor paste textcolor jbimages, codemirror"
                ],
                toolbar1: "bullist numlist | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontsizeselect | forecolor backcolor | code ",
                toolbar2: "gallery blockquote | outdent indent undo redo | link unlink  image jbimages  media | table | tablecontrols | removeformat | subscript superscript | charmap |  fullscreen | spellchecker | cut copy paste searchreplace |   restoredraft",
                //template

                codemirror: {
                    indentOnInit: true, // Whether or not to indent code on init. 
                    path: 'codemirror-4.8', // Path to CodeMirror distribution

                },
                menubar: false,
                tools: "inserttable",
                statusbar: false,
                spellchecker_language: "ru",
                spellchecker_rpc_url: "http://speller.yandex.net/services/tinyspell",
                convert_urls: false,
                autosave_restore_when_empty: false,
                content_css: '/style_ve.css',
                toolbar_items_size: 'small',
                block_formats: "Абзац=p;Заголовок 1=h1;Заголовок 2=h2;Заголовок 3=h3",
                fontsize_formats: "10px 12px 13px 14px 15px 17px 19px 20px 21px 25px 30px 35px",
                setup: function (ed) {
                    ed.addButton('gallery', {
                        title: 'Добавить блок изображений',
                        image: '/images/sys/folder-pictures_7965.png',
                        onclick: function () {
                            ed.selection.setContent('<div class="images-block">' + ed.selection.getContent() + '</div>');
                        }}
                    )
                },
                extended_valid_elements: "iframe[name,src,framespacing,border,frameborder,scrolling,title,height,width]style,div[*],p[*],a[*],object[declare,classid,codebase,data,type,codetype,archive,standby,height,width,usemap,name,tabindex,align,border,hspace,vspace, script[*]]",
            });</script>
        {/literal}




    {include file="_menu_brand.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <div class="quick_actions">
            <img src="{$sys_images_url}added.png" alt="Добавить" /><a href="{$MyURL}list/edit/"  style="font-size: 17px;">Добавить производителя</a>
        </div>
        <h1>Производители</h1>
        {if $list_edit == 1}<h1>{if $edit_id}Редактировать{else}Добавить{/if} производителя</h1>
            <div class="quick_add">
                <form method="post" action="{$admin_url}brand/list/edit/{$edit_id}/" enctype="multipart/form-data">
                    <table cellpadding="2" cellspacing="0" border="0" >
                        {*<tr>
                        <td valign="middle" align="right" width="200">Видимость производителя:</td>
                        <td valign="middle" align="left">
                        <select name="category_id" id="category_id" style="width: 250px;">
                        <option value="0">Во всех разделах</option>
                        {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 current_id=$edit_id selected_id=$smarty.post.category_id}
                        </select>
                        </td>
                        </tr>*}
                        <tr>
                            <td valign="middle" align="right">Название <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left"><input type="text" name="name" id="brand_name" value='{$smarty.post.name|stripslashes|replace:"'":'"'}' maxlength="255" style="width: 246px;"/></td>
                        </tr>



                        <tr>
                            <td valign="middle" align="right">
                                Title:
                            </td>
                            <td valign="middle" align="left">
                                <input type="text" name="title" style="width: 600px;" value="{$smarty.post.title|stripslashes}" />
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">
                                H1:
                            </td>
                            <td valign="middle" align="left">
                                <input type="text" name="h1" style="width: 600px;" value="{$smarty.post.h1|stripslashes}" />
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">
                                Meta Keyword:
                            </td>
                            <td valign="middle" align="left">
                                <input type="text" name="meta_key" style="width: 600px;" value="{$smarty.post.meta_key|stripslashes}" />
                            </td>
                        </tr>

                        <tr>
                            <td valign="middle" align="right">
                                Meta Description:
                            </td>
                            <td valign="middle" align="left">                   
                                <input type="text" name="meta_desc" style="width: 600px;" value="{$smarty.post.meta_desc|stripslashes}" />
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">
                                ЧПУ:
                            </td>
                            <td valign="middle" align="left">
                                <input type="text" id="up_pseudo_dir" name="pseudo_dir" style="width: 300px;" value="{$smarty.post.pseudo_dir}" /><button onclick="AjaxRequest('up_pseudo_dir', '{$url}brand/ajax/0/{$edit_id|default:0}/?brand_name=' + $('#brand_name').val());
                                        return false;">UP</button>
                            </td>
                        </tr>

                        {if $shop == 'lady' || $shop == 'woman'}
                            <tr>
                                <td valign="middle" align="right">Рост модели:</td>
                                <td valign="middle" align="left"><input type="text" name="param_str_1" value="{$smarty.post.param_str_1}" maxlength="255" style="width: 86px;"/></td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">Размер:</td>
                                <td valign="middle" align="left"><input type="text" name="param_str_2" value="{$smarty.post.param_str_2}" maxlength="255" style="width: 86px;"/></td>
                            </tr>
                        {/if}


                        <tr>
                            <td valign="top" align="right">Логотип:</td>
                            <td valign="middle" align="left">
                                {if $uploaded_image}
                                    <a href="{$icons_url}{$uploaded_image}" target="__blank"><img src="{$icons_url}{$uploaded_image}" alt="" style="max-width: 128px;" /></a>
                                    <input type="hidden" value="{$uploaded_image}" name="uploaded_image" />
                                {/if}
                                {if $uploaded_image}<br/>Заменить:<br/> {/if}<input type="file" name="icon" />
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Сортировка</td>
                            <td valign="middle" align="left"><input type="text" name="order" value="{$smarty.post.order}" maxlength="7" style="width: 50px;"/> </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" colspan="2">
                                {if $edit_id > 0}<button name="submit">Сохранить</button>{else}<button name="submit">Добавить</button>{/if}
                            </td>
                        </tr>
                    </table>
                    <br/><br/>
                    <h1>Описание (Текст над товарами)</h1>
                    <table cellpadding="2" cellspacing="0" border="0" style="width: 740px;">
                        <tr>
                            <td valign="middle" align="left">
                                <textarea name="desc"  style="width: 740px;height: 320px;">{$smarty.post.desc|stripslashes}</textarea>
                            </td>
                        </tr>
                    </table>
                    <br/><br/>
                    {*   <h1>Текст над товарами</h1>
                    <table cellpadding="2" cellspacing="0" border="0">
                    <tr>
                    <td valign="middle" align="left">
                    <textarea name="text_top"  style="width: 600px;height: 250px;">{$smarty.post.text_top|stripslashes}</textarea>
                    </td>
                    </tr>
                    </table>*}
                    <h1>Текст под товарами</h1>
                    <table cellpadding="2" cellspacing="0" border="0" style="width: 740px;">
                        <tr>
                            <td valign="middle" align="left">
                                <textarea name="text_bottom" style="width: 740px;height: 320px;">{$smarty.post.text_bottom|stripslashes}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">
                                <button>Сохранить</button>
                            </td>
                        </tr>
                    </table>

                    <input type="hidden" name="is_send_add" value="1" />

                </form><br/><br/>


                {if $brands_categoryes|@count}
                    <h1>Категории производителя</h1>

                    <form method="post" action="{$admin_url}brand/list/edit/{$edit_id}/" enctype="multipart/form-data">

                        <table cellpadding="2" cellspacing="0" border="0">
                            {foreach from=$brands_categoryes item="cat"}
                                {assign var="category_id" value=$cat->id}
                                <tr>
                                    <td valign="middle" align="right" colspan="2" style="">
                                        <div style=" padding: 20px">
                                            <div style="border-bottom: 1px solid #A2D4FD;">&nbsp;</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h2>{$cat->name|stripslashes}</h2></td>
                                </tr>

                                <tr>
                                    <td valign="middle" align="left">
                                        Title:
                                    </td>
                                    <td valign="middle" align="left">
                                        <input type="text" name="category_title[{$category_id}]" style="width: 600px;" value="{$smarty.post.$category_id.category_title|stripslashes|default:$brands_category.$category_id->title|stripslashes}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="left">
                                        H1:
                                    </td>
                                    <td valign="middle" align="left">
                                        <input type="text" name="category_h1[{$category_id}]" style="width: 600px;" value="{$smarty.post.$category_id.category_h1|stripslashes|default:$brands_category.$category_id->h1|stripslashes}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="left">
                                        Meta Keyword:
                                    </td>
                                    <td valign="middle" align="left">
                                        <input type="text" name="category_meta_key[{$category_id}]" style="width: 600px;" value="{$smarty.post.$category_id.category_meta_key|stripslashes|default:$brands_category.$category_id->meta_key|stripslashes}" />
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="middle" align="left">
                                        Meta Description:
                                    </td>
                                    <td valign="middle" align="left">                   
                                        <input type="text" name="category_meta_desc[{$category_id}]" style="width: 600px;" value="{$smarty.post.$category_id.category_meta_desc|stripslashes|default:$brands_category.$category_id->meta_desc|stripslashes}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="left">
                                        Описание:
                                    </td>
                                    <td valign="middle" align="left">
                                        <textarea name="category_desc[{$category_id}]" style="width: 600px;height: 250px;">{$smarty.post.$category_id.category_desc|stripslashes|default:$brands_category.$category_id->desc|stripslashes}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="left">
                                        ЧПУ:
                                    </td>
                                    <td valign="middle" align="left">
                                        <input type="text" id="category_pseudo_dir_{$category_id}" name="category_pseudo_dir[{$category_id}]" style="width: 300px;" value="{$smarty.post.$category_id.category_pseudo_dir|stripslashes|default:$brands_category.$category_id->pseudo_dir|stripslashes}" /><button onclick="AjaxRequest('category_pseudo_dir_{$category_id}', '{$url}brand/ajax/{$category_id}/{$edit_id}/');
                                                return false;">UP</button>
                                    </td>
                                </tr>
                            {/foreach}
                            <tr>
                                <td valign="middle" align="right" colspan="2" style="">
                                    <button>Изменить текст категорий производителя</button>
                                    <input type="hidden" name="is_send_category_add" value="1" />
                                </td>
                            </tr>
                        </table>
                    </form> 
                {/if}
            </div>


        {/if}
        <div style="clear: both;"></div>
        <form method="post" action="{$admin_url}brand/list/">
            {if $brands|@count}
                <table cellpadding="5" cellspacing="1" border="0" class="table" width="700">
                    <thead>
                        <tr>
                            <td valign="middle" align="center">&nbsp;</td>
                            <td valign="middle" align="center">Производитель: </td>
                            {*  <td valign="middle" align="center">Видимость в разделах: </td>*}

                            <td valign="middle" align="center">Сортировка: </td>
                            <td valign="middle" align="center">Добавленно: </td>
                            <td valign="middle" align="center">&nbsp;</td>
                        </tr>
                    </thead>
                    {foreach from = $brands item = 'brand'}
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="center">{if $brand->icon}<a href="{$icons_url}{$brand->icon}" target="__blank"><img src="{$icons_url}{$brand->icon}" alt="" style="max-width: 64px;" /></a>{/if}</td>
                                <td valign="middle" align="center" style="cursor: pointer" onclick="location.href = '{$MyURL}list/edit/{$brand->id}/'">{$brand->name}</td>
                                {*  <td valign="middle" align="center">{if $brand->category_name}{$brand->category_name}{else}Во всех разделах{/if}</td>*}

                                <td valign="middle" align="center"><input type="text" class="text" value="{$brand->order}" name="order[{$brand->id}]" style="text-align: center;width: 40px;" maxlength="20" /></td>
                                <td valign="middle" align="center">{$brand->created|date_format:"%d.%m.%Y %H:%M"}</td>
                                <td valign="middle" align="center">
                                    <a href="{$MyURL}list/edit/{$brand->id}/"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                                    <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить бренд `{$brand->name}`??', '{$MyURL}list/3/{$brand->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" alt="Удалить бренд" /></a>
                                </td>
                            </tr>
                        </tbody>
                    {/foreach}
                    <tfoot>
                        <tr>
                            <td valign="middle" align="right" colspan="6">
                                <button>Сохранить</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            {else}
                <h2>Нет ни одного производителя. <a href="{$MyURL}list/edit/"><b>Добавить?</b></a></h2>
            {/if}
        </form>
    </div>
</div>