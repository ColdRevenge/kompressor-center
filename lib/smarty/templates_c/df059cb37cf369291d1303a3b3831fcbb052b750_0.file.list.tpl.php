<?php /* Smarty version 3.1.24, created on 2015-09-13 17:01:57
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:110155745155f581d5c74078_70877785%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df059cb37cf369291d1303a3b3831fcbb052b750' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/products/templates/list.tpl',
      1 => 1440060623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110155745155f581d5c74078_70877785',
  'variables' => 
  array (
    'visual_editor' => 0,
    'category_id' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'category_name' => 0,
    'products' => 0,
    'admin_url' => 0,
    'category' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f581d5cbf491_40248827',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f581d5cbf491_40248827')) {
function content_55f581d5cbf491_40248827 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '110155745155f581d5c74078_70877785';
?>
<div class="block">
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
        

    <?php echo $_smarty_tpl->getSubTemplate ("_menu_products.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
        <?php if ($_smarty_tpl->tpl_vars['category_id']->value != 0) {?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

        <?php }?>
        <h1>Список товаров <?php if ($_smarty_tpl->tpl_vars['category_name']->value) {?> - &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['category_name']->value);?>
&raquo;<?php }?></h1>
        <?php if ($_smarty_tpl->tpl_vars['category_id']->value == 0 && count($_smarty_tpl->tpl_vars['products']->value)) {?>
            <button onclick="if (confirm('Вы действительно хотите удалить все товары без категории?')) {
                        location.href = '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
products/list/0/0/100/'}">Удалить все товары</button>
        <?php }?>


            <div id="product_list">
                <?php echo $_smarty_tpl->getSubTemplate ("list_products.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            </div>
            <?php if ($_smarty_tpl->tpl_vars['category_id']->value > 0) {?>
                <br/>
                <br/>
                <?php if (!$_smarty_tpl->tpl_vars['category']->value->text_top && !$_smarty_tpl->tpl_vars['category']->value->text_bottom) {?>
                    <div class="quick_actions">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
added.png" alt="Добавить" /><a href="" onclick="document.getElementById('add_text_catalog').style.display = 'block';
                                return false;">Добавить текст в раздел <?php if ($_smarty_tpl->tpl_vars['category_name']->value) {?> - &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['category_name']->value);?>
&raquo;<?php }?> </a>
                    </div>
                <?php } else { ?>
                    <h2>Текст в разделе <?php if ($_smarty_tpl->tpl_vars['category_name']->value) {?> - &laquo;<?php echo stripslashes($_smarty_tpl->tpl_vars['category_name']->value);?>
&raquo;<?php }?></h2>
                <?php }?>
                <div <?php if (!$_smarty_tpl->tpl_vars['category']->value->text_top && !$_smarty_tpl->tpl_vars['category']->value->text_bottom) {?>style="display: none"<?php }?> id="add_text_catalog">
                    <h1>Текст над товарами</h1>
                    <form method="post" action="">
                        <table cellpadding="2" cellspacing="0" border="0" style="width: 800px">
                            <tr>
                                <td valign="middle" align="left">
                                    <textarea name="text_top"  style="width: 715px;height: 350px;"><?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value->text_top);?>
</textarea>
                                </td>
                            </tr>
                        </table>
                        <br/>
                        <h1>Текст под товарами</h1>
                        <table cellpadding="2" cellspacing="0" border="0" style="width: 800px">
                            <tr>
                                <td valign="middle" align="left">
                                    <textarea name="text_bottom" style="width: 715px;height: 350px;"><?php echo stripslashes($_smarty_tpl->tpl_vars['category']->value->text_bottom);?>
</textarea>
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
            <?php }?>
    </div>
</div><?php }
}
?>