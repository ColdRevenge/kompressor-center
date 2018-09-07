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

    {include file="_menu_products.tpl"}
    <div class="page">
        {if $category_id != 0}
            {include file=$template_message message=$message error=$error}
        {/if}
        <h1>Список товаров {if $category_name} - &laquo;{$category_name|stripslashes}&raquo;{/if}</h1>
        {if $category_id == 0 && $products|@count}
            <button onclick="if (confirm('Вы действительно хотите удалить все товары без категории?')) {ldelim}
                        location.href = '{$admin_url}products/list/0/0/100/'{rdelim}">Удалить все товары</button>
        {/if}


            <div id="product_list">
                {include file="list_products.tpl"}
            </div>
            {if $category_id > 0}
                <br/>
                <br/>
                {if !$category->text_top && !$category->text_bottom}
                    <div class="quick_actions">
                        <img src="{$sys_images_url}added.png" alt="Добавить" /><a href="" onclick="document.getElementById('add_text_catalog').style.display = 'block';
                                return false;">Добавить текст в раздел {if $category_name} - &laquo;{$category_name|stripslashes}&raquo;{/if} </a>
                    </div>
                {else}
                    <h2>Текст в разделе {if $category_name} - &laquo;{$category_name|stripslashes}&raquo;{/if}</h2>
                {/if}
                <div {if !$category->text_top && !$category->text_bottom}style="display: none"{/if} id="add_text_catalog">
                    <h1>Текст над товарами</h1>
                    <form method="post" action="">
                        <table cellpadding="2" cellspacing="0" border="0" style="width: 800px">
                            <tr>
                                <td valign="middle" align="left">
                                    <textarea name="text_top"  style="width: 715px;height: 350px;">{$category->text_top|stripslashes}</textarea>
                                </td>
                            </tr>
                        </table>
                        <br/>
                        <h1>Текст под товарами</h1>
                        <table cellpadding="2" cellspacing="0" border="0" style="width: 800px">
                            <tr>
                                <td valign="middle" align="left">
                                    <textarea name="text_bottom" style="width: 715px;height: 350px;">{$category->text_bottom|stripslashes}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">
                                    <button>Сохранить</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            {/if}
    </div>
</div>