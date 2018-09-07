<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:42
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/add_topic.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:124661396355f573f2053ab4_75229398%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d8f2ee6f5324551e1de58b843da47e21847c5ef' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/add_topic.tpl',
      1 => 1442066213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124661396355f573f2053ab4_75229398',
  'variables' => 
  array (
    'user_id' => 0,
    'visual_editor' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'param_tpl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f573f206e2d8_28918853',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573f206e2d8_28918853')) {
function content_55f573f206e2d8_28918853 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '124661396355f573f2053ab4_75229398';
if ($_smarty_tpl->tpl_vars['user_id']->value > 0) {?>
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
                toolbar1: "bullist numlist | bold italic underline strikethrough   | smileys | forecolor blockquote |  undo redo |  link unlink  image jbimages  media  ", //code 
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

    

    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>



    <form method="post" action="" name="form_add_page" id="forum_form">
        <br/>
        <table cellpadding="3" cellspacing="0" border="0" class="table_fields" style="width: 870px">
            <?php if (!$_smarty_tpl->tpl_vars['param_tpl']->value['topic_id']) {?>
                <tr>
                    <td valign="middle" align="right" style="text-align: right; font-size: 14px;">Название темы: </td>
                    <td valign="middle" align="left" width="730" style="text-align: left">
                        <input type="text" name="name"  style="width: 715px;" value="" />

                    </td>
                </tr>
            <?php }?>

            <tr>
                <td valign="top" align="right" style="text-align: right; font-size: 14px;vertical-align: top">Сообщение: </td>
                <td valign="middle" align="left">
                    <textarea name="text" cols="10" style="width: 700px;height: 220px;"></textarea>

                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2" style="text-align: right">
                    <div style="float: left;margin-left: 140px;">
                        <label class="check-style">
                            <input type="checkbox" name="is_notice" value="1" checked="checked" />
                            <span>&nbsp;</span><span>Подписаться на тему</span>
                        </label>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['param_tpl']->value['topic_id'] > 0) {?>
                        <input type="hidden" name="topic_id" value="<?php echo $_smarty_tpl->tpl_vars['param_tpl']->value['topic_id'];?>
" />
                    <?php }?>
                    <button name="sens" class="send" value="save" onclick="sendMessage(tinymce);return false">Отправить</button>
                </td>
            </tr>
        </table>
    </form>
<?php } else { ?><br/><br/>
    <h2 style="color: #f94208;text-align: center; font-size: 16px">Оставлять сообщения могут только <a href="/auth/register/forum/" >зарегистрированные</a> пользователи. <a href="/auth/auth/?is_modal=1" rel="auth">Войдите</a> на сайт, если Вы зарегистрированы.</h2>
    <br/><br/>
<?php }
}
}
?>