<?php /* Smarty version 3.1.24, created on 2015-10-28 15:24:17
         compiled from "/home/c10045/public_html/kompressor-center.com/modules/page/templates/add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:4067552455630be713b6a47_11289969%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf5973693c85b23dab9ccc76a1a841696458bf8e' => 
    array (
      0 => '/home/c10045/public_html/kompressor-center.com/modules/page/templates/add.tpl',
      1 => 1443533727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4067552455630be713b6a47_11289969',
  'variables' => 
  array (
    'visual_editor' => 0,
    'user_id' => 0,
    'admin_url' => 0,
    'category_id' => 0,
    'auto_header' => 0,
    'page_id' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'catalog_header' => 0,
    'MyURL' => 0,
    'url' => 0,
    'param_tpl' => 0,
    'catalog_pseudo_dir' => 0,
    'upload_photo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5630be7144e628_69585873',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5630be7144e628_69585873')) {
function content_5630be7144e628_69585873 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '4067552455630be713b6a47_11289969';
?>
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
        });<?php echo '</script'; ?>
>
    
    

<div class="block">
    <?php if ($_smarty_tpl->tpl_vars['user_id']->value != 447) {?> <div class="menu">
            <?php echo $_smarty_tpl->getSubTemplate ("_menu_page_add.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </div><?php }?>
        <div class="page">
            <div id="breadcrumbs">
                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/list/1/">Страницы</a>  &raquo; <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/list/0/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/">Список страниц раздела &laquo;<?php echo $_smarty_tpl->tpl_vars['auto_header']->value;?>
&raquo;</a>  &raquo; <span><?php if ($_smarty_tpl->tpl_vars['page_id']->value) {?>Редактировать<?php } else { ?>Добавить<?php }?> страницу <?php if ($_POST['header']) {?>&laquo;<?php echo stripslashes($_POST['header']);?>
&raquo;<?php } else { ?>&laquo;<?php echo $_smarty_tpl->tpl_vars['auto_header']->value;?>
&raquo;<?php }?></span>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

            <h1><?php if ($_smarty_tpl->tpl_vars['page_id']->value) {?>Редактировать<?php } else { ?>Добавить<?php }?> страницу </h1>

            <form method="post" action="" name="form_add_page">
                <div  id="language_1">
                    <table cellpadding="3" cellspacing="0" border="0" style="width: 870px">
                        <tr>
                            <td valign="middle" align="right">Название <span class="notice">(H1)</span>: </td>
                            <td valign="middle" align="left" width="730">
                                <input type="text" name="header" id="page_header" <?php if ($_smarty_tpl->tpl_vars['catalog_header']->value) {?> title="Поле заполняется в разделе продукты (левое меню)" readonly="readonly" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['catalog_header']->value);?>
" <?php } else { ?>value="<?php if ($_POST['header']) {
echo stripslashes($_POST['header']);
} else {
echo $_smarty_tpl->tpl_vars['auto_header']->value;
}?>"<?php }?> style="width: 475px;" <?php if (!$_smarty_tpl->tpl_vars['page_id']->value && $_POST['pseudo_dir'] != 'main' && 2 == 1) {?>onchange="AjaxRequest('pseudo_dir', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
ajax/auto_pseudo_dir/?not_html=1&name=' + this.value.replace('&', '').replace('&', ''), true);
                                        AjaxRequest('is_dir', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/is_pseudo_dir/' + document.getElementById('pseudo_dir').value + '/')" onkeyup="AjaxRequest('pseudo_dir', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
ajax/auto_pseudo_dir/?not_html=1&name=' + this.value.replace('&', '').replace('&', ''), true);
                                                AjaxRequest('is_dir', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/is_pseudo_dir/' + document.getElementById('pseudo_dir').value + '/')"<?php }?> /><?php if ($_POST['pseudo_dir'] != 'main') {?><button onclick="AjaxRequest('pseudo_dir', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
ajax/auto_pseudo_dir/?not_html=1&name=' + document.getElementById('page_header').value.replace('&', '').replace('&', ''), true);
                                                        return false;" style="margin-left: 5px;">UP</button>
                            <?php }?></td>
                    </tr>

                    <tr>
                        <td valign="middle" align="right">Заголовок <span class="notice">(Title)</span>: </td> 
                        <td valign="middle" align="left">
                            <input type="text" name="title" value="<?php if ($_POST['title']) {
echo stripslashes($_POST['title']);
}?>" style="width: 525px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Хлебная крошка: </td>
                        <td valign="middle" align="left">
                            <input type="text" name="bread_name" maxlength="255" value="<?php echo stripslashes($_POST['bread_name']);?>
" style="width: 525px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Meta keyword: </td>
                        <td valign="middle" align="left">
                            <input type="text" name="meta_keyword" maxlength="255" value="<?php echo stripslashes($_POST['meta_keyword']);?>
" style="width: 525px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Meta Desc: </td>
                        <td valign="middle" align="left">
                            <input type="text" name="meta_desc" value="<?php echo stripslashes($_POST['meta_desc']);?>
" style="width: 525px;"/>
                        </td>
                    </tr>
              
                        <tr>
                            <td valign="middle" align="right">Адрес страницы: </td>
                            <td valign="middle" align="left"><?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->smarty->registered_objects['page_obj'][0]->getFullAdressPageTemplate(array('category_id'=>$_smarty_tpl->tpl_vars['param_tpl']->value['category_id'],'type'=>-1),$_smarty_tpl);?>
<input type="text" name="pseudo_dir" id="pseudo_dir" <?php if ($_POST['pseudo_dir'] == 'main') {?>readonly="readonly" value="main"<?php } else {
if ($_smarty_tpl->tpl_vars['catalog_pseudo_dir']->value) {?> title="Поле заполняется в разделе продукты (левое меню)" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['catalog_pseudo_dir']->value;?>
" <?php } else { ?>value="<?php echo $_POST['pseudo_dir'];?>
"<?php }?>  onkeyup="AjaxRequest('is_dir', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
page/is_pseudo_dir/' + this.value + '/')"<?php }?>  style="width: 200px;vertical-align: middle"/>/<span id='is_dir' style="display: inline-block"></span>
                            </td>
                        </tr>

                    <tr>
                        <td valign="top" align="right">Текст: </td>
                        <td valign="middle" align="left">
                            <?php if ($_smarty_tpl->tpl_vars['page_id']->value) {?><input type="hidden" name="order" value="<?php echo $_POST['order'];?>
" /><?php }?>
                            <textarea id="SMSBody" name="text" cols="10" style="width: 700px;height: 420px;"><?php echo stripslashes($_POST['text']);?>
</textarea>
                            
                      
                        </td>
                    </tr>
              
                    <tr>
                        <td valign="middle">&nbsp;</td>
                        <td valign="middle" align="right" colspan="2">
                            <div class="notice" style="float: left;text-align: left"><span class="asterix">*</span> Для перевода строки зажмите <b>Shift + Enter</b><br/>
                                <span class="asterix">*</span> Вставить текст нажмите <b>Ctrl + V</b>
                            </div>

                            <button name="save" value="save"><?php if ($_smarty_tpl->tpl_vars['page_id']->value) {?>Сохранить<?php } else { ?>Добавить<?php }?></button>

                            <?php if ($_smarty_tpl->tpl_vars['page_id']->value) {?><button  name="save_and" value="save_and">Сохранить и продолжить</button><?php }?>
                        </td>
                    </tr>
                </table>
            </div>
            <input type="hidden" name="add_image" id="add_image" value="0" />
        </form>
    </div>
    <br/>
    <h1>Загрузка файлов и изображений на страницу</h1>
    <?php echo $_smarty_tpl->tpl_vars['upload_photo']->value;?>

    <?php echo '<script'; ?>
 type="text/javascript">
        <?php if (!$_POST['header'] && $_smarty_tpl->tpl_vars['auto_header']->value) {?>
        $('page_header').focus();
//        select_text_field('page_header');
        <?php }?>
    <?php echo '</script'; ?>
>
</div> <?php }
}
?>