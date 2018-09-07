<div class="block">
    {if $type < 3} <div class="menu">
            {include file="_menu_news.tpl"}
        </div>
        <div class="page">{/if}
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
                {include file=$template_message message=$message error=$error}
            <h1>{if $news_id}Редактировать{else}Добавить{/if} {if $type==2}объявлений{elseif $type == 3}статей{elseif $type == 4}мнений профессионалов{else}новостей{/if} </h1>

            <form method="POST" enctype="multipart/form-data" action="">
                <div  id="language_1">
                    <table cellpadding="3" cellspacing="0" border="0">
                        <tr>
                            <td valign="middle" align="right">Дата<span class="asterix">*</span>:</td>
                            <td valign="top" align="left">
                                {$date_form}
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Название<span class="asterix">*</span>:</td>
                            <td valign="top" align="left">
                                <input type="text" name="name" value='{$smarty.post.name|stripslashes}' style="width: 730px;" />
                            </td>
                        </tr>
                        {*  <tr>
                        <td valign="top" align="right">Описание:</td>
                        <td valign="top" align="left">
                        <textarea name="desc" rows="5" style="width: 685px;height:80px;">{$smarty.post.desc|stripslashes}</textarea>
                        </td>
                        </tr>*}
                        <tr>
                            <td valign="top" align="right">{if $type==2}Объявление{elseif $type == 3}Статья{elseif $type == 4}Мнение профессионалов{else}Новость{/if}<span class="asterix">*</span>:</td>
                            <td valign="top" align="left">
                                <textarea name="text"   style="width: 730px;height:250px;">{$smarty.post.text|stripslashes}</textarea>
                            </td>
                        </tr>
                        {if $type != 12} <tr>
                                <td valign="middle" align="right">Иконка:</td>
                                <td valign="middle" align="left">
                                    {if $uploaded_image}
                                        <a href="{$news_image_url}{$uploaded_image}"><img src="{$news_image_url}{$uploaded_image}" alt="" style="max-width: 100px;vertical-align: middle; border: 1px solid #CCCCCC" /></a>
                                        <input type="hidden" value="{$uploaded_image}" name="uploaded_image" />
                                    {/if}
                                    {if $uploaded_image}Заменить: {/if}<input type="file" name="icon" />
                            </tr>{/if}
                            <tr>
                                <td valign="middle" align="right"> {*Сортировка:*} </td>
                                <td valign="middle" align="right" colspan="2">
                                    {*<div style="float: left">
                                    <input type="text" maxlength="5" name="order" value="{$smarty.post.order}" style="width: 25px; text-align: center;" />
                                    </div>*}
                                    {if $news_id > 0}<button>Сохранить</button>{else}<button>Добавить</button>{/if}
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br/><br/>
                {$upload_photo}
            </div>
        </div>