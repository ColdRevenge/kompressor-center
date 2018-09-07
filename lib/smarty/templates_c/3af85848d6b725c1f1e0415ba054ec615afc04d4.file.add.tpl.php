<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-26 11:58:51
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7634594655d5dc2ef25171-02954970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3af85848d6b725c1f1e0415ba054ec615afc04d4' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/category/templates/add.tpl',
      1 => 1440579529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7634594655d5dc2ef25171-02954970',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5dc2f11a456_89162879',
  'variables' => 
  array (
    'visual_editor' => 0,
    'url' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'edit_id' => 0,
    'type' => 0,
    'category' => 0,
    'select_tree_file' => 0,
    'MyURL' => 0,
    'param_tpl' => 0,
    'is_read_only' => 0,
    'admin_url' => 0,
    'shop' => 0,
    'uploaded_image' => 0,
    'icons_url' => 0,
    'icon_width' => 0,
    'icon_height' => 0,
    'uploaded_image_2' => 0,
    'icon_2_width' => 0,
    'icon_2_height' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5dc2f11a456_89162879')) {function content_55d5dc2f11a456_89162879($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.replace.php';
?><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['visual_editor']->value;?>
"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        tinyMCE.init({
            mode: "exact", //режим
            elements: "desc",
            theme: "advanced",
            plugins: "pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,media,searchreplace,contextmenu,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist",
            theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect,|,sub,sup,|,charmap,iespell,media,emotions,image,advhr,|,ltr,rtl",
            theme_advanced_buttons2: "tablecontrols,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,code,|,forecolor,backcolor",
            theme_advanced_buttons3: "",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "center",
            theme_advanced_resizing: false,
            language: "ru",
            content_css: '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
style_ve.css',
            convert_urls: false
        });
        function changeCategory() {
            if (document.getElementById('category_id').options[document.getElementById('category_id').selectedIndex].value == 0) {
                document.getElementById('pseudo_dir').disabled = false;
            }
            else {
                document.getElementById('pseudo_dir').disabled = true;
                document.getElementById('pseudo_dir').value = '';
            }

            if (document.getElementById('pseudo_dir').value == "") {
                document.getElementById('category_id').disabled = false;
            }
            else {
                document.getElementById('category_id').disabled = true;
                document.getElementById('category_id').selected = 0;
            }
        }

    <?php echo '</script'; ?>
>

<div class="block">
    <div class="menu">
        <?php echo $_smarty_tpl->getSubTemplate ("_menu_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <h1><?php if ($_smarty_tpl->tpl_vars['edit_id']->value>0) {?>Редактировать<?php } else { ?>Добавить<?php }?> категорию </h1>

        <form method="post" enctype="multipart/form-data" action="">
            <div  id="language_1">
                <table cellpadding="2" cellspacing="0" border="0">
                    <?php if ($_smarty_tpl->tpl_vars['type']->value!=1) {?> <tr>
                            <td valign="middle" align="right" width="170">Родительская категория:</td>
                            <td valign="middle" align="left">
                                <select name="category_id" id="category_id" style="width: 250px;">
                                    <option value="0">...</option>
                                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['select_tree_file']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>0,'tree'=>$_smarty_tpl->tpl_vars['category']->value,'inc'=>$_smarty_tpl->tpl_vars['select_tree_file']->value,'level'=>0,'current_id'=>$_smarty_tpl->tpl_vars['edit_id']->value,'selected_id'=>$_POST['category_id']), 0);?>

                                </select>
                            </td>
                        </tr><?php }?>
                        <tr>
                            <td valign="middle" align="right">Название <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left"><input type="text" name="name" value="<?php echo smarty_modifier_replace(stripslashes($_POST['name']),"'",'"');?>
" maxlength="255" style="width: 450px;vertical-align: middle;"/>&nbsp;<button onclick="AjaxRequest('pseudo_dir', '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
ajax/auto_pseudo_dir/?not_html=1&parent_id=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['param_tpl']->value['parent_id'])===null||$tmp==='' ? $_GET['parent_id'] : $tmp);?>
&name=' + $(this).prev().val() + '&edit_id=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['edit_id']->value)===null||$tmp==='' ? "0" : $tmp);?>
', true);
                                    return false;">Обновить адрес</button></td>
                        </tr>

                        <tr>
                            <td valign="middle" align="right">Адрес</td>
                            <td valign="middle" align="left">
                                <input type="text" name="pseudo_dir" <?php if ($_smarty_tpl->tpl_vars['is_read_only']->value==1) {?>readonly="readonly"<?php }?>  id="pseudo_dir"  onchange="AjaxRequest('is_dir', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
category/is_pseudo_dir/' + this.value + '/0/0/<?php echo $_smarty_tpl->tpl_vars['edit_id']->value;?>
/');" value="<?php echo $_POST['pseudo_dir'];?>
" maxlength="255" style="width:181px;vertical-align: middle;display: inline-block"/>/<span id="is_dir" style="display: inline-block"></span>
                            </td>
                        </tr>
                        <?php if ($_smarty_tpl->tpl_vars['type']->value==5) {?>
                            <tr>
                                <td valign="middle" align="right">Дата:</td>
                                <td valign="middle" align="left"><input type="text" name="param_str_2" value="<?php echo $_POST['param_str_2'];?>
" placeholder="2012-12-31"/></td>
                            </tr>
                        <?php }?>
                        

                        <?php if ($_smarty_tpl->tpl_vars['shop']->value!='forum') {?>
                            <tr>
                                <td valign="top" align="right">Иконка раздела:</td>
                                <td valign="middle" align="left">
                                    <?php if ($_smarty_tpl->tpl_vars['uploaded_image']->value) {?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['uploaded_image']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['uploaded_image']->value;?>
" alt="" style="max-width: 64px;" /></a>
                                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['uploaded_image']->value;?>
" name="uploaded_image" />
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['uploaded_image']->value) {?>Заменить: <?php }?><input type="file" name="icon" />

                                    <?php if ($_smarty_tpl->tpl_vars['icon_width']->value>0||$_smarty_tpl->tpl_vars['icon_height']->value>0) {?>
                                        <p><div class="notice"><span class="asterix">*</span> Размер: <b><?php echo (($tmp = @$_smarty_tpl->tpl_vars['icon_width']->value)===null||$tmp==='' ? "auto" : $tmp);?>
x<?php echo (($tmp = @$_smarty_tpl->tpl_vars['icon_height']->value)===null||$tmp==='' ? "auto" : $tmp);?>
</b></div></p>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="right">Иконка в меню:</td>
                                <td valign="middle" align="left">
                                    <?php if ($_smarty_tpl->tpl_vars['uploaded_image_2']->value) {?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['uploaded_image_2']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['icons_url']->value;
echo $_smarty_tpl->tpl_vars['uploaded_image_2']->value;?>
" alt="" style="max-width: 64px;" /></a>
                                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['uploaded_image_2']->value;?>
" name="uploaded_image_2" />
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['uploaded_image_2']->value) {?>Заменить: <?php }?><input type="file" name="icon_2" />

                                    <?php if ($_smarty_tpl->tpl_vars['icon_2_width']->value>0||$_smarty_tpl->tpl_vars['icon_2_height']->value>0) {?>
                                        <p><div class="notice"><span class="asterix">*</span> Размер: <b><?php echo (($tmp = @$_smarty_tpl->tpl_vars['icon_2_width']->value)===null||$tmp==='' ? "auto" : $tmp);?>
x<?php echo (($tmp = @$_smarty_tpl->tpl_vars['icon_2_height']->value)===null||$tmp==='' ? "auto" : $tmp);?>
</b></div></p>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td valign="middle" align="right">Сортировка</td>
                            <td valign="middle" align="left"><input type="text" name="order" value="<?php echo $_POST['order'];?>
" maxlength="7" style="width: 50px;"/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td valign="middle" align="left" >
                                <label class="p-check"><input type="checkbox" name="is_visible" value="0" <?php if ($_POST['is_visible']==0) {?>checked<?php }?> class="checkbox" id="is_visible"/><em>&nbsp;</em><span>Скрытый раздел</span></label>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Ссылка:</td>
                            <td valign="middle" align="left"><input type="text" onchange="if (this.value != ''){
                                        document.getElementById('pseudo_dir').disabled = true} else{
                                                    document.getElementById('pseudo_dir').disabled = false}"  name="link" value="<?php echo $_POST['link'];?>
" maxlength="255" style="width: 550px;;"/></td>
                        </tr>


                        
                        <?php if ($_smarty_tpl->tpl_vars['shop']->value=='forum') {?>
                            <tr>
                                <td valign="middle" align="right">Описание темы</td>
                                <td valign="middle" align="left"><input type="text" name="param_str_1" value="<?php echo smarty_modifier_replace(stripslashes($_POST['param_str_1']),"'",'"');?>
" maxlength="255" style="width: 640px;;"/></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td>&nbsp;</td>
                                <td valign="middle" align="left" >
                                    <label class="p-check"><input type="checkbox" name="is_param_1" value="1" <?php if ($_POST['is_param_1']==1) {?>checked<?php }?> class="checkbox" id="is_param_1"/><em>&nbsp;</em><span>Показывать на главной</span></label> 
                                </td>
                            </tr>
                        <?php }?>
                        <tr>
                            <td valign="middle" align="left" colspan="2"><br/>
                                <h2>Настройки для Сео оптимизатора</h2><br/>
                            </td>
                        </tr>

                        <tr>
                            <td valign="middle" align="right">Заголовок (H1)</td>
                            <td valign="middle" align="left"><input type="text" name="h1" value="<?php echo smarty_modifier_replace(stripslashes($_POST['h1']),"'",'"');?>
" maxlength="255" style="width: 646px;"/></td>
                        </tr>

                        <tr>
                            <td valign="middle" align="right">Заголовок (Title)</td>
                            <td valign="middle" align="left"><input type="text" name="title" value="<?php echo smarty_modifier_replace(stripslashes($_POST['title']),"'",'"');?>
" maxlength="255" style="width: 646px;"/></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right">Тег META keywords:</td>
                            <td valign="middle" align="left"><input type="text" name="meta_key" value="<?php echo smarty_modifier_replace(stripslashes($_POST['meta_key']),"'",'"');?>
" maxlength="255" style="width: 646px;"/></td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">Тег META description:</td>
                            <td valign="middle" align="left">
                                <textarea name="meta_desc" rows="5" style="width: 646px;"><?php echo smarty_modifier_replace(stripslashes($_POST['meta_desc']),"'",'"');?>
</textarea>
                            </td>
                        </tr> 

                        <tr>
                            <td valign="middle" align="right" colspan="2">
                                <?php if ($_smarty_tpl->tpl_vars['edit_id']->value>0) {?><button>Сохранить</button><?php } else { ?><button>Добавить</button><?php }?>
                            </td>
                        </tr>
                    </table>
                </div>

            </form>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['edit_id']->value>0) {?>
            <?php echo '<script'; ?>
 type="text/javascript">
                AjaxRequest('is_dir', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
category/is_pseudo_dir/' + $('pseudo_dir').value + '/0/0/<?php echo $_smarty_tpl->tpl_vars['edit_id']->value;?>
/');
            <?php echo '</script'; ?>
>
        <?php }?>
    </div><?php }} ?>
