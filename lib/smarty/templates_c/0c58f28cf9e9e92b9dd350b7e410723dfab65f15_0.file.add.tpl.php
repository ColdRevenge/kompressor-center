<?php /* Smarty version 3.1.24, created on 2018-07-13 10:07:19
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/products/templates/add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12262137105b484fa7f37410_62235050%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c58f28cf9e9e92b9dd350b7e410723dfab65f15' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/products/templates/add.tpl',
      1 => 1530509494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12262137105b484fa7f37410_62235050',
  'variables' => 
  array (
    'temp_image_id' => 0,
    'visual_editor' => 0,
    'admin_url' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'category_id' => 0,
    'category_name' => 0,
    'edit_id' => 0,
    'url' => 0,
    'images' => 0,
    'gallery_url' => 0,
    'category' => 0,
    'select_tree_file' => 0,
    'shop' => 0,
    'brands' => 0,
    'brand' => 0,
    'MyURL' => 0,
    'is_multi_mod' => 0,
    'characteristics' => 0,
    'characteristic' => 0,
    'characteristic_id' => 0,
    'count_selected' => 0,
    'values' => 0,
    'value' => 0,
    'char_value_id' => 0,
    'selected_values' => 0,
    'selected_value_id' => 0,
    'characteristics_tech' => 0,
    'values_tech' => 0,
    'parent_id' => 0,
    'value_1' => 0,
    'value_id' => 0,
    'selected_values_tech' => 0,
    'upload_photo' => 0,
    'auto_header' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b484fa847f855_15432080',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b484fa847f855_15432080')) {
function content_5b484fa847f855_15432080 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc/data/www/www.kompressor-center.com/lib/smarty/plugins/modifier.replace.php';

$_smarty_tpl->properties['nocache_hash'] = '12262137105b484fa7f37410_62235050';
?>

<?php if ($_GET['is_modal'] != 1) {?>
    <div class="block">
        <div class="menu">
            <?php echo $_smarty_tpl->getSubTemplate ("_menu_products_add.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('temp_image_id'=>$_smarty_tpl->tpl_vars['temp_image_id']->value), 0);
?>

        </div>
        <div class="page">
        <?php }?>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['visual_editor']->value;?>
"><?php echo '</script'; ?>
>
        
            <?php echo '<script'; ?>
 type="text/javascript">
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
                            AjaxRequestTable('mod_table', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/mod/add/');
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
            <?php echo '</script'; ?>
>
        
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

        <?php if ($_GET['success'] == 1 && !$_smarty_tpl->tpl_vars['message']->value && !$_smarty_tpl->tpl_vars['error']->value) {?>
            <div class="messages">Товар успешно добавлен!</div>
        <?php }?>
        <?php if ($_GET['is_modal'] != 1) {?>
            <div id="breadcrumbs">
                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/list/0/">Каталог продукции</a>  &raquo; <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/list/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/"><?php echo $_smarty_tpl->tpl_vars['category_name']->value;?>
</a>  &raquo; <span><?php if ($_smarty_tpl->tpl_vars['edit_id']->value) {?>Редактировать продукт - &laquo;<?php echo stripslashes($_POST['name']);?>
&raquo;<?php } else { ?>Добавить продукт<?php }?></span>
            </div>
        <?php }?>

        <h1 style="display: inline-block"><?php if ($_smarty_tpl->tpl_vars['edit_id']->value) {?>Редактировать продукт - &laquo;<?php echo stripslashes($_POST['name']);?>
&raquo; <?php } else { ?>Добавить продукт<?php }?> </h1>
        <?php if ($_POST['pseudo_dir'] && $_smarty_tpl->tpl_vars['edit_id']->value) {?>&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_POST['pseudo_dir'];?>
/" target="_blank">(посмотреть на сайте)</a><?php }?>
        <form method="post" action="">

            <table cellpadding="3" cellspacing="0" border="0" width="920" style="margin-top: 10px;">

                

                <tr>
                    <td valign="middle" align="right" width="180"> </td>
                    <td valign="middle" align="left">
                        <?php if ($_smarty_tpl->tpl_vars['images']->value[1][0]->file) {?>
                            <div style="float: right; margin-right: 120px;"><img src="<?php echo $_smarty_tpl->tpl_vars['gallery_url']->value;
echo $_smarty_tpl->tpl_vars['images']->value[2][0]->file;?>
" alt="" style="position: absolute;;border: 1px solid #CCCCCC; max-height: 100px;margin-top: 40px; cursor: pointer;" onclick="jQuery.scrollTo('#photo_uploader_id', 1200)"/></div>
                            <?php }?>
                            
                        <input type="checkbox" value="1" <?php if ($_POST['is_active'] == 1) {?>checked="checked"<?php }?> name="is_active" id="is_active" style="vertical-align:middle"/> <label for="is_active">Активный</label><br/>
                    </td>
                </tr>

                <tr>
                    <td valign="middle" align="right" width="180">Категория 1: </td>
                    <td valign="middle" align="left">
                        <select name="category_1_id" style="width:550px;">
                            <option value="0">...</option>
                            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['select_tree_file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'level'=>0,'selected_id'=>$_POST['category_1_id']), 0);
?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" width="150">Категория 2: </td>
                    <td valign="middle" align="left">
                        <select name="category_2_id" style="width:550px;">
                            <option value="0">...</option>
                            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['select_tree_file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'level'=>0,'selected_id'=>$_POST['category_2_id']), 0);
?>

                        </select>
                    </td>
                </tr>
                <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lalipop') {?>
                    <tr>
                        <td valign="middle" align="right" width="150">Камень 1: </td>
                        <td valign="middle" align="left">
                            <select name="category_3_id" style="width:550px;" >
                                <option value="0">...</option>
                                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['select_tree_file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'level'=>0,'selected_id'=>$_POST['category_3_id']), 0);
?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" width="150">Камень 2: </td>
                        <td valign="middle" align="left">
                            <select name="category_4_id" style="width:550px;" >
                                <option value="0">...</option>
                                <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['select_tree_file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'level'=>0,'selected_id'=>$_POST['category_4_id']), 0);
?>

                            </select>
                        </td>
                    </tr>
                <?php }?>
                <tr>
                    <td valign="middle" align="right" width="150">Категория 3: </td>
                    <td valign="middle" align="left">
                        <select name="category_5_id" style="width:550px;" >
                            <option value="0">...</option>
                            <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['select_tree_file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'level'=>0,'selected_id'=>$_POST['category_5_id']), 0);
?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" width="150">Производитель: </td>
                    <td valign="middle" align="left">
                        <select name="brand_id" style="width:550px;">
                            <option value="0">Выбрать</option>
                            <?php
$_from = $_smarty_tpl->tpl_vars['brands']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["brand"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["brand"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["brand"]->value) {
$_smarty_tpl->tpl_vars["brand"]->_loop = true;
$foreach_brand_Sav = $_smarty_tpl->tpl_vars["brand"];
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['brand']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['brand']->value->id == $_POST['brand_id']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['brand']->value->name;?>
</option>
                            <?php
$_smarty_tpl->tpl_vars["brand"] = $foreach_brand_Sav;
}
?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Наименование: </td>
                    <td valign="middle" align="left">
                        <input type="text" id="product_name" value="<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(stripslashes($_POST['name']),'"',"&quot;"),'"',"&quot;"),'"',"&quot;");?>
" style="width: 500px;"  name="name" value="<?php echo smarty_modifier_replace(stripslashes($_POST['name']),"'",'"');?>
" maxlength="255" />
                        <button onclick="AjaxRequest('pseudo_dir', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
ajax/auto_pseudo_dir/?not_html=1&name=' + $('#product_name').val() + '&edit_id=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['edit_id']->value)===null||$tmp==='' ? "0" : $tmp);?>
', true);return false;">UP</button>


                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Адрес: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="pseudo_dir"  id="pseudo_dir"  value="<?php echo $_POST['pseudo_dir'];?>
" maxlength="255" style="width: 400px;vertical-align: middle;"/>
                    </td>
                </tr>
                <?php if ($_smarty_tpl->tpl_vars['is_multi_mod']->value == 0) {?>
                    
                    <?php echo $_smarty_tpl->getSubTemplate ("mod_list_row.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                <?php } else { ?>
                    
                    <?php echo $_smarty_tpl->getSubTemplate ("mod_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                <?php }?>


                
                

                
                <tr>
                    <td valign="center" align="right">Краткое описание: <br/></td>
                    <td valign="middle" align="left">
                        
                        <textarea rows="7" name="desc_4" cols="7" style="width:715px;height: 50px;"><?php echo stripslashes($_POST['desc_4']);?>
</textarea>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="right">Описание: </td>
                    <td valign="middle" align="left">
                        <textarea rows="14" name="desc" cols="8" style="width:715px; height: 250px;"><?php echo stripslashes($_POST['desc']);?>
</textarea>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Размер: <br/></td>
                    <td valign="middle" align="left">
                        <input type="text" value="<?php echo stripslashes($_POST['desc_1']);?>
" name="desc_1" /> см
                    </td>
                </tr>
                <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
                    <tr>
                        <td valign="middle" align="right">Рост модели:</td>
                        <td valign="middle" align="left"><input type="text" name="desc_5" value="<?php echo $_POST['desc_5'];?>
" maxlength="255" /></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Размер:</td>
                        <td valign="middle" align="left"><input type="text" name="desc_6" value="<?php echo $_POST['desc_6'];?>
" maxlength="255" /></td>
                    </tr>
                <?php }?>

                

                

                <?php if (count($_smarty_tpl->tpl_vars['characteristics']->value) > 0) {?>
                    <tr>
                        <td valign="top" align="right">Характеристики: </td>
                        <td valign="middle" align="left">
                            <table cellpadding="4" cellspacing="1" border="0" class="table" width="720" id="characteristic_product">
                                <tbody class="table_header">
                                    <tr>
                                        <td valign="middle" align="center">Название:</td>
                                        <td valign="middle" align="center" style="width: 470px;">Значение:</td>
                                         
                                    </tr>
                                </tbody>
                                <?php
$_from = $_smarty_tpl->tpl_vars['characteristics']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["characteristic"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["characteristic"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["characteristic"]->value) {
$_smarty_tpl->tpl_vars["characteristic"]->_loop = true;
$foreach_characteristic_Sav = $_smarty_tpl->tpl_vars["characteristic"];
?>
                                    <?php $_smarty_tpl->tpl_vars["characteristic_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['characteristic']->value->id, null, 0);?>
                                    <tbody class="tbody">
                                        <tr>
                                            <td valign="middle" align="center"><b><?php echo stripslashes($_smarty_tpl->tpl_vars['characteristic']->value->name);?>
</b><?php if ($_smarty_tpl->tpl_vars['characteristic']->value->is_select != 1) {?> <span class="notice up-count-selected">(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['count_selected']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value])===null||$tmp==='' ? "0" : $tmp);?>
)</span><?php }?></td>
                                            <td valign="middle" align="left">
                                                <?php if ($_smarty_tpl->tpl_vars['characteristic']->value->is_select == 1) {?>
                                                    <?php $_smarty_tpl->tpl_vars["selected_value_id"] = new Smarty_Variable(0, null, 0);?>
                                                    <select name="characteristic[<?php echo $_smarty_tpl->tpl_vars['characteristic_id']->value;?>
][]" style="width: 440px;" id="characteristic_select_<?php echo $_smarty_tpl->tpl_vars['characteristic_id']->value;?>
" onchange="if ($(this).find('option:selected').val() != 0) {
                                                                $(this).next('a').find('img').attr('src', '/images/sys/admin/edit.png');
                                                            }
                                                            else {
                                                                $(this).next('a').find('img').attr('src', '/images/sys/admin/add.png');
                                                            }">
                                                        <option value="0">Выбрать</option>
                                                        <?php
$_from = $_smarty_tpl->tpl_vars['values']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars["value"];
?>
                                                            <?php $_smarty_tpl->tpl_vars["char_value_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value->id, null, 0);?>
                                                        <?php if ($_smarty_tpl->tpl_vars['selected_values']->value[$_smarty_tpl->tpl_vars['char_value_id']->value] == 1) {
$_smarty_tpl->tpl_vars["selected_value_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['char_value_id']->value, null, 0);
}?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['selected_values']->value[$_smarty_tpl->tpl_vars['char_value_id']->value] == 1) {?>selected="selected"<?php }?>><?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['value']->value->name),"?",'');?>
 <?php echo smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['value']->value->unit),"?",'');?>
</option>
                                                    <?php
$_smarty_tpl->tpl_vars["value"] = $foreach_value_Sav;
}
?>
                                                </select>&nbsp;<a href="" title="Редактировать значение" onclick="editCharValue(this, <?php echo $_smarty_tpl->tpl_vars['characteristic_id']->value;?>
);
                                                        return false;"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/sys/<?php if ($_smarty_tpl->tpl_vars['selected_value_id']->value) {?>edit<?php } else { ?>add<?php }?>.gif" align="middle" hspace="1" alt="Редактировать"></a>

                                            <?php } elseif ($_smarty_tpl->tpl_vars['characteristic']->value->is_select == 0) {?> 
                                                <?php
$_from = $_smarty_tpl->tpl_vars['values']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_char_check'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_char_check']->value['iteration']++;
$foreach_value_Sav = $_smarty_tpl->tpl_vars["value"];
?>
                                                    <?php $_smarty_tpl->tpl_vars["char_value_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value->id, null, 0);?>
                                                    <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_char_check']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_char_check']->value['iteration'] : null)%(ceil((isset($_smarty_tpl->tpl_vars['__foreach_char_check']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_char_check']->value['total'] : null)/3)) == 1) {?><div style="float: left"><?php }?>
                                                        <div style=" width: 155px; ">
                                                            <label class="p-check"<?php if ($_smarty_tpl->tpl_vars['characteristic_id']->value == 56) {?> style="font-size: 12px;"<?php }?>>
                                                                <input type="checkbox" style="vertical-align: middle;" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="characteristic[<?php echo $_smarty_tpl->tpl_vars['characteristic_id']->value;?>
][]" <?php if ($_smarty_tpl->tpl_vars['selected_values']->value[$_smarty_tpl->tpl_vars['char_value_id']->value] == 1) {?>checked="checked"<?php }?> id="value_id_<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" /><em<?php if ($_smarty_tpl->tpl_vars['characteristic_id']->value == 56) {?> style="margin-right: 3px;"<?php }?>>&nbsp;</em><span><?php echo stripslashes($_smarty_tpl->tpl_vars['value']->value->name);?>
</span>
                                                            </label>
                                                        </div>
                                                        <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_char_check']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_char_check']->value['iteration'] : null)%(ceil((isset($_smarty_tpl->tpl_vars['__foreach_char_check']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_char_check']->value['total'] : null)/3)) == 0) {?></div><?php }?>
                                                    <?php
$_smarty_tpl->tpl_vars["value"] = $foreach_value_Sav;
}
?>
                                                <?php } else { ?> 
                                                    <?php if ($_smarty_tpl->tpl_vars['values']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value]) {?>
                                                    <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
                                                        <tbody class="tbody">
                                                            <?php
$_from = $_smarty_tpl->tpl_vars['values']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars["value"];
?>
                                                                <?php $_smarty_tpl->tpl_vars["char_value_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value->id, null, 0);?>
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="characteristic[<?php echo $_smarty_tpl->tpl_vars['characteristic_id']->value;?>
][]" <?php if ($_smarty_tpl->tpl_vars['selected_values']->value[$_smarty_tpl->tpl_vars['char_value_id']->value] == 1) {?>checked="checked"<?php }?> id="value_id_<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" /><label for="value_id_<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['value']->value->name);?>
</label>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="price_char[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['selected_values']->value[$_smarty_tpl->tpl_vars['char_value_id']->value]->price)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['value']->value->price : $tmp);?>
" style="width: 50px;" />
                                                                    </td>
                                                                </tr>
                                                            <?php
$_smarty_tpl->tpl_vars["value"] = $foreach_value_Sav;
}
?>
                                                        </tbody>
                                                    </table>
                                                <?php }?>
                                            <?php }?>
                                        </td>
                                    </tr>
                                </tbody>

                            <?php
$_smarty_tpl->tpl_vars["characteristic"] = $foreach_characteristic_Sav;
}
?>
                        </table>
                        <?php echo '<script'; ?>
 type="text/javascript">
                            $('#characteristic_product input[type="checkbox"]').change(function () {
                                $(this).parent().parent().find('.up-count-selected').html("(" + $(this).parent().find('input[type="checkbox"]:checked').length + ")")
                            });
                        <?php echo '</script'; ?>
>
                    </td>
                </tr><?php }?>
                <?php if (count($_smarty_tpl->tpl_vars['characteristics_tech']->value) > 0) {?>
                    <tr>
                        <td valign="top" align="right">&nbsp;</td>
                        <td valign="middle" align="left">
                            <table cellpadding="1" cellspacing="1" border="0" class="table" width="529">
                                <tbody class="table_header">
                                    <tr>
                                        <td valign="middle" align="center" colspan="2" style="height: 25px">Технические характеристики</td>
                                        
                                    </tr>
                                </tbody>
                                <?php
$_from = $_smarty_tpl->tpl_vars['characteristics_tech']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["characteristic"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["characteristic"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["characteristic"]->value) {
$_smarty_tpl->tpl_vars["characteristic"]->_loop = true;
$foreach_characteristic_Sav = $_smarty_tpl->tpl_vars["characteristic"];
?>
                                    <?php if ($_smarty_tpl->tpl_vars['characteristic']->value->category_id == 0 && $_smarty_tpl->tpl_vars['characteristic']->value->category_2_id == 0 && $_smarty_tpl->tpl_vars['characteristic']->value->category_3_id == 0) {?>
                                        <?php $_smarty_tpl->tpl_vars["characteristic_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['characteristic']->value->id, null, 0);?>

                                        <tbody class="tbody">
                                            <tr>
                                                <td valign="middle" align="center"><h2 style="padding: 0px; margin: 0px;"><?php echo $_smarty_tpl->tpl_vars['characteristic']->value->name;?>
</h2></td>
                                            </tr>
                                            <tr>
                                                <td valign="middle" align="left">
                                                    


                                                    <?php
$_from = $_smarty_tpl->tpl_vars['values_tech']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value][0];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars["value"];
?>
                                                        <?php $_smarty_tpl->tpl_vars["parent_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value']->value->id, null, 0);?>
                                                        <strong><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</strong><br/>
                                                        <div style="margin: 5px 0px 5px 15px;">
                                                            <?php if ($_smarty_tpl->tpl_vars['value']->value->is_select == 1) {?>
                                                                <select name="characteristic_tech[<?php echo $_smarty_tpl->tpl_vars['characteristic_id']->value;?>
][]">
                                                                    <option value="0">Пропустить</option>
                                                                    <?php
$_from = $_smarty_tpl->tpl_vars['values_tech']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value][$_smarty_tpl->tpl_vars['parent_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value_1"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value_1"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value_1"]->value) {
$_smarty_tpl->tpl_vars["value_1"]->_loop = true;
$foreach_value_1_Sav = $_smarty_tpl->tpl_vars["value_1"];
?>
                                                                        <?php $_smarty_tpl->tpl_vars["value_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value_1']->value->id, null, 0);?>
                                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['value_1']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['selected_values_tech']->value[$_smarty_tpl->tpl_vars['value_id']->value]) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['value_1']->value->name;?>
</option>
                                                                    <?php
$_smarty_tpl->tpl_vars["value_1"] = $foreach_value_1_Sav;
}
?>
                                                                </select>

                                                            <?php } else { ?>   
                                                                <?php
$_from = $_smarty_tpl->tpl_vars['values_tech']->value[$_smarty_tpl->tpl_vars['characteristic_id']->value][$_smarty_tpl->tpl_vars['parent_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["value_1"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["value_1"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["value_1"]->value) {
$_smarty_tpl->tpl_vars["value_1"]->_loop = true;
$foreach_value_1_Sav = $_smarty_tpl->tpl_vars["value_1"];
?>
                                                                    <?php $_smarty_tpl->tpl_vars["value_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['value_1']->value->id, null, 0);?>
                                                                    <input type="checkbox" name="characteristic_tech[<?php echo $_smarty_tpl->tpl_vars['characteristic_id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['value_1']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['value_1']->value->id;?>
" id="label_<?php echo $_smarty_tpl->tpl_vars['value_1']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['selected_values_tech']->value[$_smarty_tpl->tpl_vars['value_id']->value]) {?>checked="checked"<?php }?> /><label for="label_<?php echo $_smarty_tpl->tpl_vars['value_1']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['value_1']->value->name;?>
</label> &nbsp; 
                                                                <?php
$_smarty_tpl->tpl_vars["value_1"] = $foreach_value_1_Sav;
}
?>
                                                            <?php }?>
                                                        </div>
                                                    <?php
$_smarty_tpl->tpl_vars["value"] = $foreach_value_Sav;
}
?>
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                    <?php }?>
                                <?php
$_smarty_tpl->tpl_vars["characteristic"] = $foreach_characteristic_Sav;
}
?>
                            </table>
                        </td>
                    </tr><?php }?>

                    
                    <tr>
                        <td valign="middle" align="right">Заголовок (Title): </td>
                        <td valign="middle" align="left">
                            <input type="text" name="title" value="<?php echo $_POST['title'];?>
" style="width: 680px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Meta Keyword: </td>
                        <td valign="middle" align="left">
                            <input type="text" name="meta_keyword" value="<?php echo $_POST['meta_keyword'];?>
" style="width: 680px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="right">Meta desc: </td>
                        <td valign="middle" align="left">
                            <textarea rows="4" name="meta_desc" cols="4" style="width:715px;"><?php echo $_POST['meta_desc'];?>
</textarea>
                        </td>
                    </tr>

                    <tr>
                        <td valign="middle" align="right" colspan="2" id="photo_uploader_id">
                            <br/>
                            <a name="photo"></a>
                            <h1>Загрузка фотографий товара</h1>
                            <?php echo $_smarty_tpl->tpl_vars['upload_photo']->value;?>

                            <br/><br/>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top" align="right">&nbsp;</td>
                        <td valign="middle" align="right">
                            <input type="hidden" value="1" name="submit" />
                            <?php if ($_smarty_tpl->tpl_vars['edit_id']->value) {?>
                                <button name="save" value="save">Сохранить</button>
                                <button  name="save_and" value="save_and">Сохранить и продолжить</button>
                            <?php } else { ?>
                                <button name="add" value="add">Добавить</button>
                                <button  name="add_and" value="add_and">Добавить и продолжить</button>
                            <?php }?>


                        </td>
                    </tr>
                </table>
            </form>
            <br/>
            <div style="clear: both; text-align: left">
            </div>
            <?php if ($_GET['is_modal'] != 1) {?></div><?php }?>
        <?php echo '<script'; ?>
 type="text/javascript">

            <?php if (!$_POST['header'] && $_smarty_tpl->tpl_vars['auto_header']->value) {?>
            $('page_header').focus();
            select_text_field('page_header');
            <?php }?>

        <?php echo '</script'; ?>
>
        <?php if ($_GET['is_modal'] != 1) {?></div><?php }
}
}
?>