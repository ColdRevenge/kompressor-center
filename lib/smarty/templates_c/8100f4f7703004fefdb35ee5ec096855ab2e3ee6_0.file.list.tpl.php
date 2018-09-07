<?php /* Smarty version 3.1.24, created on 2016-05-04 14:34:51
         compiled from "/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/brand/templates/list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14041260675729de5bea0376_19577255%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8100f4f7703004fefdb35ee5ec096855ab2e3ee6' => 
    array (
      0 => '/var/www/user-kc-pskov/data/www/kc-pskov.ru/modules/brand/templates/list.tpl',
      1 => 1452856761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14041260675729de5bea0376_19577255',
  'variables' => 
  array (
    'visual_editor' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'sys_images_url' => 0,
    'MyURL' => 0,
    'list_edit' => 0,
    'edit_id' => 0,
    'admin_url' => 0,
    'url' => 0,
    'shop' => 0,
    'uploaded_image' => 0,
    'icons_url' => 0,
    'brands_categoryes' => 0,
    'cat' => 0,
    'category_id' => 0,
    'brands_category' => 0,
    'brands' => 0,
    'brand' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5729de5c1844d9_00897083',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5729de5c1844d9_00897083')) {
function content_5729de5c1844d9_00897083 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_replace')) require_once '/var/www/user-kc-pskov/data/www/kc-pskov.ru/lib/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/user-kc-pskov/data/www/kc-pskov.ru/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '14041260675729de5bea0376_19577255';
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
        




    <?php echo $_smarty_tpl->getSubTemplate ("_menu_brand.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

        <div class="quick_actions">
            <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
added.png" alt="Добавить" /><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/edit/"  style="font-size: 17px;">Добавить производителя</a>
        </div>
        <h1>Производители</h1>
        <?php if ($_smarty_tpl->tpl_vars['list_edit']->value == 1) {?><h1><?php if ($_smarty_tpl->tpl_vars['edit_id']->value) {?>Редактировать<?php } else { ?>Добавить<?php }?> производителя</h1>
            <div class="quick_add">
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
brand/list/edit/<?php echo $_smarty_tpl->tpl_vars['edit_id']->value;?>
/" enctype="multipart/form-data">
                    <table cellpadding="2" cellspacing="0" border="0" >
                        
                        <tr>
                            <td valign="middle" align="right">Название <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left"><input type="text" name="name" id="brand_name" value='<?php echo smarty_modifier_replace(stripslashes($_POST['name']),"'",'"');?>
' maxlength="255" style="width: 246px;"/></td>
                        </tr>



                        <tr>
                            <td valign="middle" align="right">
                                Title:
                            </td>
                            <td valign="middle" align="left">
                                <input type="text" name="title" style="width: 600px;" value="<?php echo stripslashes($_POST['title']);?>
" />
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">
                                H1:
                            </td>
                            <td valign="middle" align="left">
                                <input type="text" name="h1" style="width: 600px;" value="<?php echo stripslashes($_POST['h1']);?>
" />
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">
                                Meta Keyword:
                            </td>
                            <td valign="middle" align="left">
                                <input type="text" name="meta_key" style="width: 600px;" value="<?php echo stripslashes($_POST['meta_key']);?>
" />
                            </td>
                        </tr>

                        <tr>
                            <td valign="middle" align="right">
                                Meta Description:
                            </td>
                            <td valign="middle" align="left">                   
                                <input type="text" name="meta_desc" style="width: 600px;" value="<?php echo stripslashes($_POST['meta_desc']);?>
" />
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">
                                ЧПУ:
                            </td>
                            <td valign="middle" align="left">
                                <input type="text" id="up_pseudo_dir" name="pseudo_dir" style="width: 300px;" value="<?php echo $_POST['pseudo_dir'];?>
" /><button onclick="AjaxRequest('up_pseudo_dir', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
brand/ajax/0/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['edit_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
/?brand_name=' + $('#brand_name').val());
                                        return false;">UP</button>
                            </td>
                        </tr>

                        <?php if ($_smarty_tpl->tpl_vars['shop']->value == 'lady' || $_smarty_tpl->tpl_vars['shop']->value == 'woman') {?>
                            <tr>
                                <td valign="middle" align="right">Рост модели:</td>
                                <td valign="middle" align="left"><input type="text" name="param_str_1" value="<?php echo $_POST['param_str_1'];?>
" maxlength="255" style="width: 86px;"/></td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">Размер:</td>
                                <td valign="middle" align="left"><input type="text" name="param_str_2" value="<?php echo $_POST['param_str_2'];?>
" maxlength="255" style="width: 86px;"/></td>
                            </tr>
                        <?php }?>


                        <tr>
                            <td valign="top" align="right">Логотип:</td>
                            <td valign="middle" align="left">
                                <?php if ($_smarty_tpl->tpl_vars['uploaded_image']->value) {?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['uploaded_image']->value;?>
" target="__blank"><img src="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['uploaded_image']->value;?>
" alt="" style="max-width: 128px;" /></a>
                                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['uploaded_image']->value;?>
" name="uploaded_image" />
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['uploaded_image']->value) {?><br/>Заменить:<br/> <?php }?><input type="file" name="icon" />
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Сортировка</td>
                            <td valign="middle" align="left"><input type="text" name="order" value="<?php echo $_POST['order'];?>
" maxlength="7" style="width: 50px;"/> </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" colspan="2">
                                <?php if ($_smarty_tpl->tpl_vars['edit_id']->value > 0) {?><button name="submit">Сохранить</button><?php } else { ?><button name="submit">Добавить</button><?php }?>
                            </td>
                        </tr>
                    </table>
                    <br/><br/>
                    <h1>Описание (Текст над товарами)</h1>
                    <table cellpadding="2" cellspacing="0" border="0" style="width: 740px;">
                        <tr>
                            <td valign="middle" align="left">
                                <textarea name="desc"  style="width: 740px;height: 320px;"><?php echo stripslashes($_POST['desc']);?>
</textarea>
                            </td>
                        </tr>
                    </table>
                    <br/><br/>
                    
                    <h1>Текст под товарами</h1>
                    <table cellpadding="2" cellspacing="0" border="0" style="width: 740px;">
                        <tr>
                            <td valign="middle" align="left">
                                <textarea name="text_bottom" style="width: 740px;height: 320px;"><?php echo stripslashes($_POST['text_bottom']);?>
</textarea>
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


                <?php if (count($_smarty_tpl->tpl_vars['brands_categoryes']->value)) {?>
                    <h1>Категории производителя</h1>

                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
brand/list/edit/<?php echo $_smarty_tpl->tpl_vars['edit_id']->value;?>
/" enctype="multipart/form-data">

                        <table cellpadding="2" cellspacing="0" border="0">
                            <?php
$_from = $_smarty_tpl->tpl_vars['brands_categoryes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["cat"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["cat"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["cat"]->value) {
$_smarty_tpl->tpl_vars["cat"]->_loop = true;
$foreach_cat_Sav = $_smarty_tpl->tpl_vars["cat"];
?>
                                <?php $_smarty_tpl->tpl_vars["category_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['cat']->value->id, null, 0);?>
                                <tr>
                                    <td valign="middle" align="right" colspan="2" style="">
                                        <div style=" padding: 20px">
                                            <div style="border-bottom: 1px solid #A2D4FD;">&nbsp;</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h2><?php echo stripslashes($_smarty_tpl->tpl_vars['cat']->value->name);?>
</h2></td>
                                </tr>

                                <tr>
                                    <td valign="middle" align="left">
                                        Title:
                                    </td>
                                    <td valign="middle" align="left">
                                        <input type="text" name="category_title[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" style="width: 600px;" value="<?php echo stripslashes((($tmp = @stripslashes($_POST[$_smarty_tpl->tpl_vars['category_id']->value]['category_title']))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['brands_category']->value[$_smarty_tpl->tpl_vars['category_id']->value]->title : $tmp));?>
" />
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="left">
                                        H1:
                                    </td>
                                    <td valign="middle" align="left">
                                        <input type="text" name="category_h1[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" style="width: 600px;" value="<?php echo stripslashes((($tmp = @stripslashes($_POST[$_smarty_tpl->tpl_vars['category_id']->value]['category_h1']))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['brands_category']->value[$_smarty_tpl->tpl_vars['category_id']->value]->h1 : $tmp));?>
" />
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="left">
                                        Meta Keyword:
                                    </td>
                                    <td valign="middle" align="left">
                                        <input type="text" name="category_meta_key[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" style="width: 600px;" value="<?php echo stripslashes((($tmp = @stripslashes($_POST[$_smarty_tpl->tpl_vars['category_id']->value]['category_meta_key']))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['brands_category']->value[$_smarty_tpl->tpl_vars['category_id']->value]->meta_key : $tmp));?>
" />
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="middle" align="left">
                                        Meta Description:
                                    </td>
                                    <td valign="middle" align="left">                   
                                        <input type="text" name="category_meta_desc[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" style="width: 600px;" value="<?php echo stripslashes((($tmp = @stripslashes($_POST[$_smarty_tpl->tpl_vars['category_id']->value]['category_meta_desc']))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['brands_category']->value[$_smarty_tpl->tpl_vars['category_id']->value]->meta_desc : $tmp));?>
" />
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="left">
                                        Описание:
                                    </td>
                                    <td valign="middle" align="left">
                                        <textarea name="category_desc[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" style="width: 600px;height: 250px;"><?php echo stripslashes((($tmp = @stripslashes($_POST[$_smarty_tpl->tpl_vars['category_id']->value]['category_desc']))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['brands_category']->value[$_smarty_tpl->tpl_vars['category_id']->value]->desc : $tmp));?>
</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="left">
                                        ЧПУ:
                                    </td>
                                    <td valign="middle" align="left">
                                        <input type="text" id="category_pseudo_dir_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
" name="category_pseudo_dir[<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
]" style="width: 300px;" value="<?php echo stripslashes((($tmp = @stripslashes($_POST[$_smarty_tpl->tpl_vars['category_id']->value]['category_pseudo_dir']))===null||$tmp==='' ? $_smarty_tpl->tpl_vars['brands_category']->value[$_smarty_tpl->tpl_vars['category_id']->value]->pseudo_dir : $tmp));?>
" /><button onclick="AjaxRequest('category_pseudo_dir_<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
brand/ajax/<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['edit_id']->value;?>
/');
                                                return false;">UP</button>
                                    </td>
                                </tr>
                            <?php
$_smarty_tpl->tpl_vars["cat"] = $foreach_cat_Sav;
}
?>
                            <tr>
                                <td valign="middle" align="right" colspan="2" style="">
                                    <button>Изменить текст категорий производителя</button>
                                    <input type="hidden" name="is_send_category_add" value="1" />
                                </td>
                            </tr>
                        </table>
                    </form> 
                <?php }?>
            </div>


        <?php }?>
        <div style="clear: both;"></div>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
brand/list/">
            <?php if (count($_smarty_tpl->tpl_vars['brands']->value)) {?>
                <table cellpadding="5" cellspacing="1" border="0" class="table" width="700">
                    <thead>
                        <tr>
                            <td valign="middle" align="center">&nbsp;</td>
                            <td valign="middle" align="center">Производитель: </td>
                            

                            <td valign="middle" align="center">Сортировка: </td>
                            <td valign="middle" align="center">Добавленно: </td>
                            <td valign="middle" align="center">&nbsp;</td>
                        </tr>
                    </thead>
                    <?php
$_from = $_smarty_tpl->tpl_vars['brands']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['brand']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
$foreach_brand_Sav = $_smarty_tpl->tpl_vars['brand'];
?>
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="center"><?php if ($_smarty_tpl->tpl_vars['brand']->value->icon) {?><a href="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['brand']->value->icon;?>
" target="__blank"><img src="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['brand']->value->icon;?>
" alt="" style="max-width: 64px;" /></a><?php }?></td>
                                <td valign="middle" align="center" style="cursor: pointer" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/edit/<?php echo $_smarty_tpl->tpl_vars['brand']->value->id;?>
/'"><?php echo $_smarty_tpl->tpl_vars['brand']->value->name;?>
</td>
                                

                                <td valign="middle" align="center"><input type="text" class="text" value="<?php echo $_smarty_tpl->tpl_vars['brand']->value->order;?>
" name="order[<?php echo $_smarty_tpl->tpl_vars['brand']->value->id;?>
]" style="text-align: center;width: 40px;" maxlength="20" /></td>
                                <td valign="middle" align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['brand']->value->created,"%d.%m.%Y %H:%M");?>
</td>
                                <td valign="middle" align="center">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/edit/<?php echo $_smarty_tpl->tpl_vars['brand']->value->id;?>
/"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                                    <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить бренд `<?php echo $_smarty_tpl->tpl_vars['brand']->value->name;?>
`??', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/3/<?php echo $_smarty_tpl->tpl_vars['brand']->value->id;?>
/');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" alt="Удалить бренд" /></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php
$_smarty_tpl->tpl_vars['brand'] = $foreach_brand_Sav;
}
?>
                    <tfoot>
                        <tr>
                            <td valign="middle" align="right" colspan="6">
                                <button>Сохранить</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            <?php } else { ?>
                <h2>Нет ни одного производителя. <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/edit/"><b>Добавить?</b></a></h2>
            <?php }?>
        </form>
    </div>
</div><?php }
}
?>