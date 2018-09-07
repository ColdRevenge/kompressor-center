<?php /* Smarty version 3.1.24, created on 2017-08-23 08:34:51
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/_editor.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1542017304599d13fbca1e74_41319903%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa3154e5217742654e4197d63333503077c6c7e9' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/_editor.tpl',
      1 => 1503466253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1542017304599d13fbca1e74_41319903',
  'variables' => 
  array (
    'visual_editor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_599d13fbca8228_31089564',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599d13fbca8228_31089564')) {
function content_599d13fbca8228_31089564 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1542017304599d13fbca1e74_41319903';
?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['visual_editor']->value;?>
"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
    tinymce.init({
        selector: ".editor",
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
<?php echo '</script'; ?>
>
<?php }
}
?>