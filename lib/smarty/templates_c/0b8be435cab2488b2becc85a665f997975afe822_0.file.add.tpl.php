<?php /* Smarty version 3.1.24, created on 2018-07-02 09:02:48
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/news/templates/add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:7424576795b39c0080cca93_44045273%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b8be435cab2488b2becc85a665f997975afe822' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/news/templates/add.tpl',
      1 => 1530509478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7424576795b39c0080cca93_44045273',
  'variables' => 
  array (
    'type' => 0,
    'visual_editor' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'news_id' => 0,
    'date_form' => 0,
    'uploaded_image' => 0,
    'news_image_url' => 0,
    'upload_photo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39c00816f759_10532702',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39c00816f759_10532702')) {
function content_5b39c00816f759_10532702 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7424576795b39c0080cca93_44045273';
?>
<div class="block">
    <?php if ($_smarty_tpl->tpl_vars['type']->value < 3) {?> <div class="menu">
            <?php echo $_smarty_tpl->getSubTemplate ("_menu_news.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        </div>
        <div class="page"><?php }?>
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
                    });<?php echo '</script'; ?>
>
                
                <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

            <h1><?php if ($_smarty_tpl->tpl_vars['news_id']->value) {?>Редактировать<?php } else { ?>Добавить<?php }?> <?php if ($_smarty_tpl->tpl_vars['type']->value == 2) {?>объявлений<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 3) {?>статей<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 4) {?>мнений профессионалов<?php } else { ?>новостей<?php }?> </h1>

            <form method="POST" enctype="multipart/form-data" action="">
                <div  id="language_1">
                    <table cellpadding="3" cellspacing="0" border="0">
                        <tr>
                            <td valign="middle" align="right">Дата<span class="asterix">*</span>:</td>
                            <td valign="top" align="left">
                                <?php echo $_smarty_tpl->tpl_vars['date_form']->value;?>

                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Название<span class="asterix">*</span>:</td>
                            <td valign="top" align="left">
                                <input type="text" name="name" value='<?php echo stripslashes($_POST['name']);?>
' style="width: 730px;" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td valign="top" align="right"><?php if ($_smarty_tpl->tpl_vars['type']->value == 2) {?>Объявление<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 3) {?>Статья<?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 4) {?>Мнение профессионалов<?php } else { ?>Новость<?php }?><span class="asterix">*</span>:</td>
                            <td valign="top" align="left">
                                <textarea name="text"   style="width: 730px;height:250px;"><?php echo stripslashes($_POST['text']);?>
</textarea>
                            </td>
                        </tr>
                        <?php if ($_smarty_tpl->tpl_vars['type']->value != 12) {?> <tr>
                                <td valign="middle" align="right">Иконка:</td>
                                <td valign="middle" align="left">
                                    <?php if ($_smarty_tpl->tpl_vars['uploaded_image']->value) {?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['news_image_url']->value;
echo $_smarty_tpl->tpl_vars['uploaded_image']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['news_image_url']->value;
echo $_smarty_tpl->tpl_vars['uploaded_image']->value;?>
" alt="" style="max-width: 100px;vertical-align: middle; border: 1px solid #CCCCCC" /></a>
                                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['uploaded_image']->value;?>
" name="uploaded_image" />
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['uploaded_image']->value) {?>Заменить: <?php }?><input type="file" name="icon" />
                            </tr><?php }?>
                            <tr>
                                <td valign="middle" align="right">  </td>
                                <td valign="middle" align="right" colspan="2">
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['news_id']->value > 0) {?><button>Сохранить</button><?php } else { ?><button>Добавить</button><?php }?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br/><br/>
                <?php echo $_smarty_tpl->tpl_vars['upload_photo']->value;?>

            </div>
        </div><?php }
}
?>