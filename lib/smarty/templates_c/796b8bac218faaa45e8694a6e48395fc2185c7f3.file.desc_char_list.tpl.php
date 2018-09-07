<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 19:04:55
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/characteristics/templates/desc_char_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72711190355d5faa7941c97-00439412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '796b8bac218faaa45e8694a6e48395fc2185c7f3' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/characteristics/templates/desc_char_list.tpl',
      1 => 1438594029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72711190355d5faa7941c97-00439412',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'visual_editor' => 0,
    'param_tpl' => 0,
    'url' => 0,
    'admin_url' => 0,
    'category_id' => 0,
    'category_tree_list_0' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'sys_images_url' => 0,
    'get_characteristic' => 0,
    'char_name' => 0,
    'char_id' => 0,
    'get_chars' => 0,
    'item' => 0,
    'desc_char_edit' => 0,
    'desc_chars' => 0,
    'chars' => 0,
    'characteristic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5faa7ade760_36635868',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5faa7ade760_36635868')) {function content_55d5faa7ade760_36635868($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><div class="block">
    
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

    

    <div class="menu">
        <h1>Видимость:</h1>
        <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
            <tbody class="<?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['category_id']==0) {?>tbody_hover <?php }?>tbody">
                <tr>
                    <td align="left" valign="middle" style="cursor: pointer;" title="Открыть" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
xadmin/characteristics/desc/list/0/0/'">
                        <div style="margin-left:0px;"><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
characteristics/desc/list/0/0/"<?php if ($_smarty_tpl->tpl_vars['category_id']->value==0) {?> style="font-weight: bold;"<?php }?>>Везде</a></div>
                    </td>
                </tr>
            </tbody>
            <?php echo $_smarty_tpl->tpl_vars['category_tree_list_0']->value;?>

        </table>
    </div>
    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <h1><?php if ($_GET['edit_id']) {?>Редактировать<?php } else { ?>Добавить<?php }?> характиристику</h1>
        <div class="small-navigation">
            <div>
                <img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/add.png" /><a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
characteristics/desc/list/0/<?php echo (($tmp = @$_POST['category_id'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_id']->value : $tmp);?>
/?is_add=1">Добавить описание для характеристики</a>
            </div>
        </div>
        <?php if ($_GET['is_add']==1||$_GET['edit_id']>0) {?>
            <form method="post" enctype="multipart/form-data">

                <table cellpadding="2" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td valign="middle" align="right">Для характеристик <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <select name="characteristic_value_id" style="width: 180px;">
                                    <option value="0">Не выбрано</option>
                                    <?php  $_smarty_tpl->tpl_vars["char_name"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_name"]->_loop = false;
 $_smarty_tpl->tpl_vars["char_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['get_characteristic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_name"]->key => $_smarty_tpl->tpl_vars["char_name"]->value) {
$_smarty_tpl->tpl_vars["char_name"]->_loop = true;
 $_smarty_tpl->tpl_vars["char_id"]->value = $_smarty_tpl->tpl_vars["char_name"]->key;
?>
                                        <optgroup label="<?php echo $_smarty_tpl->tpl_vars['char_name']->value;?>
">
                                            <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_chars']->value[$_smarty_tpl->tpl_vars['char_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['desc_char_edit']->value->characteristic_value_id==$_smarty_tpl->tpl_vars['item']->value->id||$_POST['characteristic_value_id']==$_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>
</option>
                                            <?php } ?>
                                        </optgroup>
                                    <?php } ?>
                                </select>

                                <select name="characteristic_value_2_id" style="width: 180px;">
                                    <option value="0">Не выбрано</option>
                                    <?php  $_smarty_tpl->tpl_vars["char_name"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_name"]->_loop = false;
 $_smarty_tpl->tpl_vars["char_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['get_characteristic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_name"]->key => $_smarty_tpl->tpl_vars["char_name"]->value) {
$_smarty_tpl->tpl_vars["char_name"]->_loop = true;
 $_smarty_tpl->tpl_vars["char_id"]->value = $_smarty_tpl->tpl_vars["char_name"]->key;
?>
                                        <optgroup label="<?php echo $_smarty_tpl->tpl_vars['char_name']->value;?>
">
                                            <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_chars']->value[$_smarty_tpl->tpl_vars['char_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['desc_char_edit']->value->characteristic_value_2_id==$_smarty_tpl->tpl_vars['item']->value->id||$_POST['characteristic_value_2_id']==$_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>
</option>
                                            <?php } ?>
                                        </optgroup>
                                    <?php } ?>
                                </select>

                                <select name="characteristic_value_3_id" style="width: 180px;">
                                    <option value="0">Не выбрано</option>
                                    <?php  $_smarty_tpl->tpl_vars["char_name"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["char_name"]->_loop = false;
 $_smarty_tpl->tpl_vars["char_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['get_characteristic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["char_name"]->key => $_smarty_tpl->tpl_vars["char_name"]->value) {
$_smarty_tpl->tpl_vars["char_name"]->_loop = true;
 $_smarty_tpl->tpl_vars["char_id"]->value = $_smarty_tpl->tpl_vars["char_name"]->key;
?>
                                        <optgroup label="<?php echo $_smarty_tpl->tpl_vars['char_name']->value;?>
">
                                            <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_chars']->value[$_smarty_tpl->tpl_vars['char_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"<?php if ($_smarty_tpl->tpl_vars['desc_char_edit']->value->characteristic_value_3_id==$_smarty_tpl->tpl_vars['item']->value->id||$_POST['characteristic_value_3_id']==$_smarty_tpl->tpl_vars['item']->value->id) {?> selected="selected"<?php }?>><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value->name);?>
</option>
                                            <?php } ?>
                                        </optgroup>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Title <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="title" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['desc_char_edit']->value->title),'"','&quot;'))===null||$tmp==='' ? $_POST['title'] : $tmp)),'"','&quot;');?>
" maxlength="255" style="width: 532px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">h1 <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="name" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['desc_char_edit']->value->name),'"','&quot;'))===null||$tmp==='' ? $_POST['name'] : $tmp)),'"','&quot;');?>
" maxlength="255" style="width: 532px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Meta Keyword <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="meta_key" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['desc_char_edit']->value->meta_key),'"','&quot;'))===null||$tmp==='' ? $_POST['meta_key'] : $tmp)),'"','&quot;');?>
" maxlength="255" style="width: 532px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Meta Desc <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <input type="text" name="meta_desc" value="<?php echo smarty_modifier_replace(stripslashes((($tmp = @smarty_modifier_replace(stripslashes($_smarty_tpl->tpl_vars['desc_char_edit']->value->meta_desc),'"','&quot;'))===null||$tmp==='' ? $_POST['meta_desc'] : $tmp)),'"','&quot;');?>
" maxlength="255" style="width: 532px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="vertical-align: top">Текст <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left">
                                <textarea style="height: 332px;" name="desc"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['desc_char_edit']->value->desc)===null||$tmp==='' ? $_POST['desc'] : $tmp);?>
</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" colspan="2">
                                <button><?php if ($_GET['edit_id']) {?>Редактировать<?php } else { ?>Добавить<?php }?></button>                            
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" value="<?php echo (($tmp = @$_POST['category_id'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_id']->value : $tmp);?>
" name="category_id" />
            </form>
        <?php }?>



        <h1>Характеристики товара</h1>
        <?php if (count($_smarty_tpl->tpl_vars['desc_chars']->value)) {?>
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

                <?php  $_smarty_tpl->tpl_vars['chars'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['chars']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['desc_chars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['chars']->key => $_smarty_tpl->tpl_vars['chars']->value) {
$_smarty_tpl->tpl_vars['chars']->_loop = true;
?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left"><?php echo stripslashes($_smarty_tpl->tpl_vars['chars']->value->name);?>
</td>

                            <td valign="middle" align="left"><?php echo (($tmp = @stripslashes($_smarty_tpl->tpl_vars['chars']->value->characteristic_name))===null||$tmp==='' ? "-" : $tmp);?>
</td> 
                            <td valign="middle" align="left"><?php echo (($tmp = @stripslashes($_smarty_tpl->tpl_vars['chars']->value->characteristic_2_name))===null||$tmp==='' ? "-" : $tmp);?>
</td> 
                            <td valign="middle" align="left"><?php echo (($tmp = @stripslashes($_smarty_tpl->tpl_vars['chars']->value->characteristic_3_name))===null||$tmp==='' ? "-" : $tmp);?>
</td> 
                            <td valign="middle" align="left"><?php echo (($tmp = @stripslashes($_smarty_tpl->tpl_vars['chars']->value->characteristic_4_name))===null||$tmp==='' ? "-" : $tmp);?>
</td> 
                            <td valign="middle" align="center">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
characteristics/desc/list/0/<?php echo (($tmp = @$_POST['category_id'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_id']->value : $tmp);?>
/?edit_id=<?php echo $_smarty_tpl->tpl_vars['chars']->value->id;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Добавить значение" title="Добавить значение" /></a>
                                <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить `<?php echo $_smarty_tpl->tpl_vars['characteristic']->value->name;?>
`??', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
characteristics/desc/list/0/<?php echo (($tmp = @$_POST['category_id'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['category_id']->value : $tmp);?>
/3/<?php echo $_smarty_tpl->tpl_vars['chars']->value->id;?>
/');"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" title="Удалить характиристику" alt="Удалить характиристику" /></a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        <?php } else { ?>
            <h2>Нет ни одного описания характеристик</h2>
        <?php }?>
        <br/>

    </div>
</div> <?php }} ?>
