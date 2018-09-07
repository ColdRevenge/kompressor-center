<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-30 18:06:33
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/admin_edit_answer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165132822855e318c81c5059-03171226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48157f35eb7603d5d177299d0c9cbe2c79189ddd' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/admin_edit_answer.tpl',
      1 => 1440947037,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165132822855e318c81c5059-03171226',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e318c8208595_62210527',
  'variables' => 
  array (
    'user_id' => 0,
    'visual_editor' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'get_answer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e318c8208595_62210527')) {function content_55e318c8208595_62210527($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_id']->value>0) {?>
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
                    "images, advlist autolink code autosave link image lists charmap   pagebreak smileys",
                    " wordcount  media ",
                    "contextmenu   textcolor  textcolor jbimages"
                ],
                toolbar1: "bullist numlist | bold italic underline strikethrough   | forecolor blockquote |  undo redo | smileys | link unlink  image jbimages  media  code",
                //template

                codemirror: {
                    indentOnInit: true, // Whether or not to indent code on init. 
                    path: 'codemirror-4.8', // Path to CodeMirror distribution

                },
                menubar: false,
                tools: "inserttable",
                statusbar: false,
                convert_urls: false,
                autosave_restore_when_empty: false,
                content_css: '/style_ve.css',
                toolbar_items_size: 'small',
                block_formats: "Абзац=p;Заголовок 1=h1;Заголовок 2=h2;Заголовок 3=h3",
                fontsize_formats: "10px 12px 13px 14px 15px 17px 19px 20px 21px 25px 30px 35px",
                extended_valid_elements: "iframe[name,src,framespacing,border,frameborder,scrolling,title,height,width]style,div[*],p[*],a[*],object[declare,classid,codebase,data,type,codetype,archive,standby,height,width,usemap,name,tabindex,align,border,hspace,vspace, script[*]]",
            });<?php echo '</script'; ?>
>

    

    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>



    <h1 style="padding-top: 0;margin-top: 0;padding-bottom: 15px;">Редактировать ответ пользователя</h1>
    <form method="post" action="" name="form_add_page" >
        <table cellpadding="3" cellspacing="0" border="0" class="table_fields" style="width: 670px">
            <tr>
                <td valign="middle" align="left">
                    <textarea id="SMSBody" name="answer_text" cols="10" style="width: 700px;height: 220px;"><?php echo stripslashes($_smarty_tpl->tpl_vars['get_answer']->value->text);?>
</textarea>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2" style="text-align: right">
                    <button name="sens" class="save" value="save">Отправить</button>
                </td>
            </tr>
        </table>
    </form>
<?php }?><?php }} ?>
