<div class="block">
    {*    {include file="_menu_char.tpl"}*}
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

    <div class="menu">
        <h1>Видимость:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <tbody class="{if $param_tpl.category_id == 0}tbody_hover {/if}tbody">
                <tr>
                    <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href = '{$url}xadmin/characteristics/desc/list/0/0/'">
                        <div style="margin-left:0px;"><a href="{$admin_url}characteristics/desc/list/0/0/"{if $category_id == 0} style="font-weight: bold;"{/if}>Везде</a></div>
                    </td>
                </tr>
            </tbody>
            {$category_tree_list_0}
        </table>
    </div>
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>{if $smarty.get.edit_id}Редактировать{else}Добавить{/if} характиристику</h1>
        <div class="small-navigation">
            <div>
                <img src="{$sys_images_url}admin/add.png" /><a href="{$admin_url}characteristics/desc/list/0/{$smarty.post.category_id|default:$category_id}/?is_add=1">Добавить описание для характеристики</a>
            </div>
        </div>
        {if $smarty.get.is_add == 1 || $smarty.get.edit_id > 0}
            <form method="post" enctype="multipart/form-data">

                <table cellpadding="2" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td valign="middle" align="right">Для характеристик <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <select name="characteristic_value_id" style="width: 180px;">
                                    <option value="0">Не выбрано</option>
                                    {foreach from=$get_characteristic item="char_name" key="char_id"}
                                        <optgroup label="{$char_name}">
                                            {foreach from=$get_chars.$char_id item="item"}
                                                <option value="{$item->id}"{if $desc_char_edit->characteristic_value_id == $item->id || $smarty.post.characteristic_value_id == $item->id} selected="selected"{/if}>{$item->name|stripslashes}</option>
                                            {/foreach}
                                        </optgroup>
                                    {/foreach}
                                </select>

                                <select name="characteristic_value_2_id" style="width: 180px;">
                                    <option value="0">Не выбрано</option>
                                    {foreach from=$get_characteristic item="char_name" key="char_id"}
                                        <optgroup label="{$char_name}">
                                            {foreach from=$get_chars.$char_id item="item"}
                                                <option value="{$item->id}"{if $desc_char_edit->characteristic_value_2_id == $item->id || $smarty.post.characteristic_value_2_id == $item->id} selected="selected"{/if}>{$item->name|stripslashes}</option>
                                            {/foreach}
                                        </optgroup>
                                    {/foreach}
                                </select>

                                <select name="characteristic_value_3_id" style="width: 180px;">
                                    <option value="0">Не выбрано</option>
                                    {foreach from=$get_characteristic item="char_name" key="char_id"}
                                        <optgroup label="{$char_name}">
                                            {foreach from=$get_chars.$char_id item="item"}
                                                <option value="{$item->id}"{if $desc_char_edit->characteristic_value_3_id == $item->id || $smarty.post.characteristic_value_3_id == $item->id} selected="selected"{/if}>{$item->name|stripslashes}</option>
                                            {/foreach}
                                        </optgroup>
                                    {/foreach}
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Title <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="title" value="{$desc_char_edit->title|stripslashes|replace:'"':'&quot;'|default:$smarty.post.title|stripslashes|replace:'"':'&quot;'}" maxlength="255" style="width: 532px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">h1 <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="name" value="{$desc_char_edit->name|stripslashes|replace:'"':'&quot;'|default:$smarty.post.name|stripslashes|replace:'"':'&quot;'}" maxlength="255" style="width: 532px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Meta Keyword <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="meta_key" value="{$desc_char_edit->meta_key|stripslashes|replace:'"':'&quot;'|default:$smarty.post.meta_key|stripslashes|replace:'"':'&quot;'}" maxlength="255" style="width: 532px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Meta Desc <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="meta_desc" value="{$desc_char_edit->meta_desc|stripslashes|replace:'"':'&quot;'|default:$smarty.post.meta_desc|stripslashes|replace:'"':'&quot;'}" maxlength="255" style="width: 532px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="vertical-align: top">Текст <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <textarea style="height: 332px;" name="desc">{$desc_char_edit->desc|default:$smarty.post.desc}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" colspan="2">
                                <button>{if $smarty.get.edit_id}Редактировать{else}Добавить{/if}</button>                            
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" value="{$smarty.post.category_id|default:$category_id}" name="category_id" />
            </form>
        {/if}



        <h1>Характеристики товара</h1>
        {if $desc_chars|@count}
            <table cellpadding="5" cellspacing="1" border="0" class="table">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Название (h1):</td>
                        <td valign="middle" align="center">&nbsp;</td>
                        <td valign="middle" align="center">&nbsp;</td>
                        <td valign="middle" align="center">&nbsp;</td>
                        <td valign="middle" align="center">&nbsp;</td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </thead>

                {foreach from = $desc_chars item = 'chars'}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left">{$chars->name|stripslashes}</td>

                            <td valign="middle" align="left">{$chars->characteristic_name|stripslashes|default:"-"}</td> 
                            <td valign="middle" align="left">{$chars->characteristic_2_name|stripslashes|default:"-"}</td> 
                            <td valign="middle" align="left">{$chars->characteristic_3_name|stripslashes|default:"-"}</td> 
                            <td valign="middle" align="left">{$chars->characteristic_4_name|stripslashes|default:"-"}</td> 
                            <td valign="middle" align="center">
                                <a href="{$admin_url}characteristics/desc/list/0/{$smarty.post.category_id|default:$category_id}/?edit_id={$chars->id}"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Добавить значение" title="Добавить значение" /></a>
                                <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить `{$characteristic->name}`??', '{$admin_url}characteristics/desc/list/0/{$smarty.post.category_id|default:$category_id}/3/{$chars->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" title="Удалить характиристику" alt="Удалить характиристику" /></a>
                            </td>
                        </tr>
                    </tbody>
                {/foreach}
            </table>
        {else}
            <h2>Нет ни одного описания характеристик</h2>
        {/if}
        <br/>

    </div>
</div> 