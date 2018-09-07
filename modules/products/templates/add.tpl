
{if  $smarty.get.is_modal != 1}
    <div class="block">
        <div class="menu">
            {include file="_menu_products_add.tpl" temp_image_id=$temp_image_id}
        </div>
        <div class="page">
        {/if}
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
                });

                function setDiscount(discount) {
                    obj = document.getElementById('mod_add');
                    obj_input = document.getElementsByName('mod_price[]');
                    obj_input_old_price = document.getElementsByName('mod_old_price[]');

                    for (var key in obj_input) {
                        child = obj_input[key];
                        child_old_price = obj_input_old_price[key]
                        if (child.nodeName == 'INPUT') {
                            old_price = parseInt(child.value * (discount / 100)) + parseInt(child.value)
                            if (parseInt(child_old_price.value) == 0) {
                                child_old_price.value = child.value;
                                child.value = parseInt(child_old_price.value) - parseInt(child_old_price.value * (discount / 100))
                            }
                            else {
                                child.value = parseInt(child_old_price.value) - parseInt(child_old_price.value * (discount / 100))
                            }
//                                        if (old_price != child.value) {
//                                            child_old_price.value = old_price;
//                                        }
                        }
                    }
                }

                function setArticle(article) {
                    obj = document.getElementById('mod_add');
                    obj_input = document.getElementsByName('mod_article[]');

                    for (var key in obj_input) {
                        child = obj_input[key];
                        if (child.nodeName == 'INPUT') {
                            child.value = article + '' + (parseInt(key) + 1);
                        }
                    }
                }


                function setSizes2() {
                    var myArray = new Array();

                    myArray[0] = '80*190';
                    myArray[1] = '80*195';
                    myArray[2] = '80*200';
                    myArray[3] = '90*190';
                    myArray[4] = '90*195';
                    myArray[5] = '90*200';
                    myArray[6] = '100*190';
                    myArray[7] = '100*195';
                    myArray[8] = '100*200';
                    myArray[9] = '110*190';
                    myArray[10] = '110*195';
                    myArray[11] = '110*200';
                    myArray[12] = '120*190';
                    myArray[13] = '120*195';
                    myArray[14] = '120*200';
                    myArray[15] = '130*190';
                    myArray[16] = '130*195';
                    myArray[17] = '130*200';
                    myArray[18] = '140*190';
                    myArray[19] = '140*195';
                    myArray[20] = '140*200';
                    myArray[21] = '150*190';
                    myArray[22] = '150*195';
                    myArray[23] = '150*200';
                    myArray[24] = '160*190';
                    myArray[25] = '160*195';
                    myArray[26] = '160*200';
                    myArray[27] = '170*190';
                    myArray[28] = '170*195';
                    myArray[29] = '170*200';
                    myArray[30] = '180*190';
                    myArray[31] = '180*195';
                    myArray[32] = '180*200';
                    myArray[33] = '190*190';
                    myArray[34] = '190*195';
                    myArray[35] = '190*200';
                    myArray[36] = '200*190';
                    myArray[37] = '200*195';
                    myArray[38] = '200*200';

                    for (var key in myArray) { //alert(key + ' ' + myArray.length)
                        if (key < myArray.length - 1) { //Если не последний элемент
                            var child = myArray [key];
                            AjaxRequestTable('mod_table', '{/literal}{$admin_url}{literal}products/mod/add/');
                        }
                    }
                    obj_input = document.getElementsByName('mod_name[]');

                    for (var key in obj_input) {
                        child = obj_input[key];
                        if (child.nodeName == 'INPUT') {
                            if (child.value == '') {
                                child.value = myArray[key];
                            }
                        }
                    }
                }
            </script>
        {/literal}
        {include file=$template_message message=$message error=$error}
        {if $smarty.get.success == 1 && !$message && !$error}
            <div class="messages">Товар успешно добавлен!</div>
        {/if}
        {if  $smarty.get.is_modal != 1}
            <div id="breadcrumbs">
                <a href="{$admin_url}products/list/0/">Каталог продукции</a>  &raquo; <a href="{$admin_url}products/list/0/{$category_id}/">{$category_name}</a>  &raquo; <span>{if $edit_id}Редактировать продукт - &laquo;{$smarty.post.name|stripslashes}&raquo;{else}Добавить продукт{/if}</span>
            </div>
        {/if}

        <h1 style="display: inline-block">{if $edit_id}Редактировать продукт - &laquo;{$smarty.post.name|stripslashes}&raquo; {else}Добавить продукт{/if} </h1>
        {if $smarty.post.pseudo_dir && $edit_id}&nbsp;<a href="{$url}products/{$smarty.post.pseudo_dir}/" target="_blank">(посмотреть на сайте)</a>{/if}
        <form method="post" action="">

            <table cellpadding="3" cellspacing="0" border="0" width="920" style="margin-top: 10px;">

                {*      <tr>
                <td valign="middle" align="right" width="180"></td>
                <td valign="middle" align="left">
                <input type="radio" value="0" {if !$smarty.post.marker}checked="checked"{/if} name="marker" id="marker_not" /> <label for="marker_not">Нет</label>

                <input type="radio" value="1" {if $smarty.post.marker == 1}checked="checked"{/if}  name="marker" id="marker_sale" /> <label for="marker_sale">Скидка</label>
                <input type="radio" value="2" {if $smarty.post.marker == 2}checked="checked"{/if} name="marker" id="marker_news" /> <label for="marker_news">Новинка</label>
                <input type="radio" value="3" {if $smarty.post.marker == 3}checked="checked"{/if} name="marker" id="marker_best_price" /> <label for="marker_best_price">Акция</label>
                <input type="radio" value="4" {if $smarty.post.marker == 4}checked="checked"{/if} name="marker" id="marker_best" /> <label for="marker_best">Лидер продаж</label>
                </td>
                </tr>*}

                <tr>
                    <td valign="middle" align="right" width="180">{*На складе:*} </td>
                    <td valign="middle" align="left">
                        {if $images.1.0->file}
                            <div style="float: right; margin-right: 120px;"><img src="{$gallery_url}{$images.2.0->file}" alt="" style="position: absolute;;border: 1px solid #CCCCCC; max-height: 100px;margin-top: 40px; cursor: pointer;" onclick="jQuery.scrollTo('#photo_uploader_id', 1200)"/></div>
                            {/if}
                            {*  <input type="text" name="warehouse" value="{$smarty.post.warehouse|default:100}" maxlength="11"  style="width: 125px;" /> *}
                        <input type="checkbox" value="1" {if $smarty.post.is_active == 1}checked="checked"{/if} name="is_active" id="is_active" style="vertical-align:middle"/> <label for="is_active">Активный</label><br/>
                    </td>
                </tr>

                <tr>
                    <td valign="middle" align="right" width="180">Категория 1: </td>
                    <td valign="middle" align="left">
                        <select name="category_1_id" style="width:550px;">
                            <option value="0">...</option>
                            {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 selected_id=$smarty.post.category_1_id}
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" width="150">Категория 2: </td>
                    <td valign="middle" align="left">
                        <select name="category_2_id" style="width:550px;">
                            <option value="0">...</option>
                            {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 selected_id=$smarty.post.category_2_id}
                        </select>
                    </td>
                </tr>
                {if $shop == 'lalipop'}
                    <tr>
                        <td valign="middle" align="right" width="150">Камень 1: </td>
                        <td valign="middle" align="left">
                            <select name="category_3_id" style="width:550px;" >
                                <option value="0">...</option>
                                {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 selected_id=$smarty.post.category_3_id}
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" width="150">Камень 2: </td>
                        <td valign="middle" align="left">
                            <select name="category_4_id" style="width:550px;" >
                                <option value="0">...</option>
                                {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 selected_id=$smarty.post.category_4_id}
                            </select>
                        </td>
                    </tr>
                {/if}
                <tr>
                    <td valign="middle" align="right" width="150">Категория 3: </td>
                    <td valign="middle" align="left">
                        <select name="category_5_id" style="width:550px;" >
                            <option value="0">...</option>
                            {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 selected_id=$smarty.post.category_5_id}
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" width="150">Производитель: </td>
                    <td valign="middle" align="left">
                        <select name="brand_id" style="width:550px;">
                            <option value="0">Выбрать</option>
                            {foreach from=$brands item="brand"}
                                <option value="{$brand->id}" {if $brand->id == $smarty.post.brand_id}selected="selected"{/if}>{$brand->name}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Наименование: </td>
                    <td valign="middle" align="left">
                        <input type="text" id="product_name" value="{$smarty.post.name|stripslashes|replace:'"':"&quot;"|replace:'"':"&quot;"|replace:'"':"&quot;"}" style="width: 500px;"  name="name" value="{$smarty.post.name|stripslashes|replace:"'":'"'}" maxlength="255" />
                        <button onclick="AjaxRequest('pseudo_dir', '{$MyURL}ajax/auto_pseudo_dir/?not_html=1&name=' + $('#product_name').val() + '&edit_id={$edit_id|default:"0"}', true);return false;">UP</button>

{*                        <input type="text" name="pseudo_dir"  id="pseudo_dir"  {*onchange="AjaxRequest('is_dir', '{$admin_url}category/is_pseudo_dir/'+ this.value +'/0/0/{$edit_id}/');"  value="{$smarty.post.pseudo_dir}" maxlength="255" style="width: 400px;vertical-align: middle;display: inline-block; display: none"/>*}
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Адрес: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="pseudo_dir"  id="pseudo_dir"  value="{$smarty.post.pseudo_dir}" maxlength="255" style="width: 400px;vertical-align: middle;"/>
                    </td>
                </tr>
                {if $is_multi_mod == 0}
                    {* Однострочный вывод модов *}
                    {include file="mod_list_row.tpl"}
                {else}
                    {* Стандартный вывод модов *}
                    {include file="mod_list.tpl"}
                {/if}


                {*      <tr>
                <td valign="middle" align="right">Штук в упаковке: </td>
                <td valign="middle" align="left">
                <input type="text" name="unit" value="{$smarty.post.unit}" style="width: 125px;" />
                </td>
                </tr>
                
                *}
                {*   <tr>
                <td valign="middle" align="right">Код товара: </td>
                <td valign="middle" align="left">
                <input type="text" name="code" value="{$smarty.post.code}"  style="width: 125px;"/>
                </td>
                </tr>*}

                {*            <tr>
                <td valign="top" align="right">Состав: <br/></td>
                <td valign="middle" align="left">
                <textarea rows="7" name="short_desc" cols="7" style="width:715px;height: 120px;">{$smarty.post.short_desc|stripslashes}</textarea>
                </td>
                </tr>*}
                <tr>
                    <td valign="center" align="right">Краткое описание: <br/></td>
                    <td valign="middle" align="left">
                        {*                        <input type="text" value="{$smarty.post.desc_4|stripslashes}" name="desc_4"  style="width:682px;"/>*}
                        <textarea rows="7" name="desc_4" cols="7" style="width:715px;height: 50px;">{$smarty.post.desc_4|stripslashes}</textarea>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="right">Описание: </td>
                    <td valign="middle" align="left">
                        <textarea rows="14" name="desc" cols="8" style="width:715px; height: 250px;">{$smarty.post.desc|stripslashes}</textarea>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Размер: <br/></td>
                    <td valign="middle" align="left">
                        <input type="text" value="{$smarty.post.desc_1|stripslashes}" name="desc_1" /> см
                    </td>
                </tr>
                {if $shop == 'lady' || $shop == 'woman'}
                    <tr>
                        <td valign="middle" align="right">Рост модели:</td>
                        <td valign="middle" align="left"><input type="text" name="desc_5" value="{$smarty.post.desc_5}" maxlength="255" /></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Размер:</td>
                        <td valign="middle" align="left"><input type="text" name="desc_6" value="{$smarty.post.desc_6}" maxlength="255" /></td>
                    </tr>
                {/if}

                {*         <tr>
                <td valign="top" align="right">Тех. документация: <br/></td>
                <td valign="middle" align="left">
                {$upload_tech}
                </td>
                </tr>
                <tr>
                <td valign="top" align="right">Сертификаты: <br/></td>
                <td valign="middle" align="left">
                <textarea rows="7" name="desc_3" cols="7" style="width:715px;height: 120px;">{$smarty.post.desc_3|stripslashes}</textarea>
                {$upload_serf}
                </td>
                </tr>*}

                {* 


                <tr>
                <td valign="top" align="right">Цвета: <br/></td>
                <td valign="middle" align="left">
                <textarea rows="7" name="desc_4" cols="7" style="width:715px;height: 120px;">{$smarty.post.desc_4|stripslashes}</textarea>
                </td>
                </tr>
                <tr>
                <td valign="top" align="right">Основания: <br/></td>
                <td valign="middle" align="left">
                <textarea rows="7" name="desc_5" cols="7" style="width:715px;height: 120px;">{$smarty.post.desc_5|stripslashes}</textarea>
                </td>
                </tr>
                <tr>
                <td valign="top" align="right">Важная информация: <br/></td>
                <td valign="middle" align="left">
                <textarea rows="7" name="desc_6" cols="7" style="width:715px;height: 120px;">{$smarty.post.desc_6|stripslashes}</textarea>
                </td>
                </tr>*}

                {if $characteristics|@count > 0}
                    <tr>
                        <td valign="top" align="right">Характеристики: </td>
                        <td valign="middle" align="left">
                            <table cellpadding="4" cellspacing="1" border="0" class="table" width="720" id="characteristic_product">
                                <tbody class="table_header">
                                    <tr>
                                        <td valign="middle" align="center">Название:</td>
                                        <td valign="middle" align="center" style="width: 470px;">Значение:</td>
                                        {*<td valign="middle" align="center">На складе:</td>*} 
                                    </tr>
                                </tbody>
                                {foreach from=$characteristics item="characteristic" name="char"}
                                    {assign var="characteristic_id" value=$characteristic->id}
                                    <tbody class="tbody">
                                        <tr>
                                            <td valign="middle" align="center"><b>{$characteristic->name|stripslashes}</b>{if $characteristic->is_select != 1} <span class="notice up-count-selected">({$count_selected.$characteristic_id|default:"0"})</span>{/if}</td>
                                            <td valign="middle" align="left">
                                                {if $characteristic->is_select == 1}
                                                    {assign var="selected_value_id" value=0}
                                                    <select name="characteristic[{$characteristic_id}][]" style="width: 440px;" id="characteristic_select_{$characteristic_id}" onchange="if ($(this).find('option:selected').val() != 0) {
                                                                $(this).next('a').find('img').attr('src', '/images/sys/admin/edit.png');
                                                            }
                                                            else {
                                                                $(this).next('a').find('img').attr('src', '/images/sys/admin/add.png');
                                                            }">
                                                        <option value="0">Выбрать</option>
                                                        {foreach from=$values.$characteristic_id item="value"}
                                                            {assign var="char_value_id" value=$value->id}
                                                        {if $selected_values.$char_value_id == 1}{assign var="selected_value_id" value=$char_value_id}{/if}
                                                        <option value="{$value->id}" {if $selected_values.$char_value_id == 1}selected="selected"{/if}>{$value->name|stripslashes|replace:"?":""} {$value->unit|stripslashes|replace:"?":""}</option>
                                                    {/foreach}
                                                </select>&nbsp;<a href="" title="Редактировать значение" onclick="editCharValue(this, {$characteristic_id});
                                                        return false;"><img src="{$url}images/sys/{if $selected_value_id}edit{else}add{/if}.gif" align="middle" hspace="1" alt="Редактировать"></a>

                                            {elseif $characteristic->is_select == 0} {* Вывод х-к с ценами *}
                                                {foreach from=$values.$characteristic_id item="value" name="char_check"}
                                                    {assign var="char_value_id" value=$value->id}
                                                    {if $smarty.foreach.char_check.iteration%(ceil($smarty.foreach.char_check.total/3)) == 1}<div style="float: left">{/if}
                                                        <div style=" width: 155px; ">
                                                            <label class="p-check"{if $characteristic_id == 56} style="font-size: 12px;"{/if}>
                                                                <input type="checkbox" style="vertical-align: middle;" value="{$value->id}" name="characteristic[{$characteristic_id}][]" {if $selected_values.$char_value_id == 1}checked="checked"{/if} id="value_id_{$value->id}" /><em{if $characteristic_id == 56} style="margin-right: 3px;"{/if}>&nbsp;</em><span>{$value->name|stripslashes}</span>
                                                            </label>
                                                        </div>
                                                        {if $smarty.foreach.char_check.iteration%(ceil($smarty.foreach.char_check.total/3)) == 0}</div>{/if}
                                                    {/foreach}
                                                {else} {* Вывод характеристик с наценками *}
                                                    {if $values.$characteristic_id}
                                                    <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
                                                        <tbody class="tbody">
                                                            {foreach from=$values.$characteristic_id item="value"}
                                                                {assign var="char_value_id" value=$value->id}
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" value="{$value->id}" name="characteristic[{$characteristic_id}][]" {if $selected_values.$char_value_id == 1}checked="checked"{/if} id="value_id_{$value->id}" /><label for="value_id_{$value->id}">{$value->name|stripslashes}</label>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="price_char[{$value->id}]" value="{$selected_values.$char_value_id->price|default:$value->price}" style="width: 50px;" />
                                                                    </td>
                                                                </tr>
                                                            {/foreach}
                                                        </tbody>
                                                    </table>
                                                {/if}
                                            {/if}
                                        </td>
                                    </tr>
                                </tbody>

                            {/foreach}
                        </table>
                        <script type="text/javascript">
                            $('#characteristic_product input[type="checkbox"]').change(function () {
                                $(this).parent().parent().find('.up-count-selected').html("(" + $(this).parent().find('input[type="checkbox"]:checked').length + ")")
                            });
                        </script>
                    </td>
                </tr>{/if}
                {if $characteristics_tech|@count > 0}
                    <tr>
                        <td valign="top" align="right">&nbsp;</td>
                        <td valign="middle" align="left">
                            <table cellpadding="1" cellspacing="1" border="0" class="table" width="529">
                                <tbody class="table_header">
                                    <tr>
                                        <td valign="middle" align="center" colspan="2" style="height: 25px">Технические характеристики</td>
                                        {*<td valign="middle" align="center">На складе:</td>*}
                                    </tr>
                                </tbody>
                                {foreach from=$characteristics_tech item="characteristic"}
                                    {if $characteristic->category_id == 0 && $characteristic->category_2_id == 0 && $characteristic->category_3_id == 0}
                                        {assign var="characteristic_id" value=$characteristic->id}

                                        <tbody class="tbody">
                                            <tr>
                                                <td valign="middle" align="center"><h2 style="padding: 0px; margin: 0px;">{$characteristic->name}</h2></td>
                                            </tr>
                                            <tr>
                                                <td valign="middle" align="left">
                                                    {*name="characteristic[{$characteristic_id}]*}


                                                    {foreach from=$values_tech.$characteristic_id.0 item="value"}
                                                        {assign var="parent_id" value=$value->id}
                                                        <strong>{$value->name}</strong><br/>
                                                        <div style="margin: 5px 0px 5px 15px;">
                                                            {if $value->is_select == 1}
                                                                <select name="characteristic_tech[{$characteristic_id}][]">
                                                                    <option value="0">Пропустить</option>
                                                                    {foreach from=$values_tech.$characteristic_id.$parent_id item="value_1"}
                                                                        {assign var="value_id" value=$value_1->id}
                                                                        <option value="{$value_1->id}" {if $selected_values_tech.$value_id}selected="selected"{/if}>{$value_1->name}</option>
                                                                    {/foreach}
                                                                </select>

                                                            {else}   
                                                                {foreach from=$values_tech.$characteristic_id.$parent_id item="value_1"}
                                                                    {assign var="value_id" value=$value_1->id}
                                                                    <input type="checkbox" name="characteristic_tech[{$characteristic_id}][{$value_1->id}]" value="{$value_1->id}" id="label_{$value_1->id}" {if $selected_values_tech.$value_id}checked="checked"{/if} /><label for="label_{$value_1->id}">{$value_1->name}</label> &nbsp; 
                                                                {/foreach}
                                                            {/if}
                                                        </div>
                                                    {/foreach}
                                                </td>
                                                {*<td valign="middle" align="center">
                                                <input type="text" value="0" name="characteristic_warehouse[{$characteristic_id}]" maxlength="11" style="text-align: center; width: 50px;" />
                                                </td>*}
                                            </tr>
                                        </tbody>
                                    {/if}
                                {/foreach}
                            </table>
                        </td>
                    </tr>{/if}

                    {*<tr>
                    <td valign="middle" align="right">Адрес:</td>
                    <td valign="middle" align="left">
                        
                    </td>
                    </tr>*}
                    <tr>
                        <td valign="middle" align="right">Заголовок (Title): </td>
                        <td valign="middle" align="left">
                            <input type="text" name="title" value="{$smarty.post.title}" style="width: 680px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Meta Keyword: </td>
                        <td valign="middle" align="left">
                            <input type="text" name="meta_keyword" value="{$smarty.post.meta_keyword}" style="width: 680px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="right">Meta desc: </td>
                        <td valign="middle" align="left">
                            <textarea rows="4" name="meta_desc" cols="4" style="width:715px;">{$smarty.post.meta_desc}</textarea>
                        </td>
                    </tr>

                    <tr>
                        <td valign="middle" align="right" colspan="2" id="photo_uploader_id">
                            <br/>
                            <a name="photo"></a>
                            <h1>Загрузка фотографий товара</h1>
                            {$upload_photo}
                            <br/><br/>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top" align="right">&nbsp;</td>
                        <td valign="middle" align="right">
                            <input type="hidden" value="1" name="submit" />
                            {if $edit_id}
                                <button name="save" value="save">Сохранить</button>
                                <button  name="save_and" value="save_and">Сохранить и продолжить</button>
                            {else}
                                <button name="add" value="add">Добавить</button>
                                <button  name="add_and" value="add_and">Добавить и продолжить</button>
                            {/if}


                        </td>
                    </tr>
                </table>
            </form>
            <br/>
            <div style="clear: both; text-align: left">
            </div>
            {if  $smarty.get.is_modal != 1}</div>{/if}
        <script type="text/javascript">

            {if !$smarty.post.header && $auto_header}
            $('page_header').focus();
            select_text_field('page_header');
            {/if}

        </script>
        {if  $smarty.get.is_modal != 1}</div>{/if}