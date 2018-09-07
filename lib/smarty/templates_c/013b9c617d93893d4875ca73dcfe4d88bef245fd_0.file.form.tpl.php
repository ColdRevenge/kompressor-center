<?php /* Smarty version 3.1.24, created on 2017-08-23 08:34:51
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2080448653599d13fbc0a1c9_15019646%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '013b9c617d93893d4875ca73dcfe4d88bef245fd' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/journal/templates/form.tpl',
      1 => 1503466252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2080448653599d13fbc0a1c9_15019646',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'data' => 0,
    'news_image_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_599d13fbc95422_53098021',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_599d13fbc95422_53098021')) {
function content_599d13fbc95422_53098021 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2080448653599d13fbc0a1c9_15019646';
?>
<div class="block">
    <div class="menu">
        <?php echo $_smarty_tpl->getSubTemplate ("_menu_journal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    </div>
    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ("_editor.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

        <h1><?php if ($_smarty_tpl->tpl_vars['data']->value->id) {?>Редактировать<?php } else { ?>Добавить<?php }?> журнал</h1>

        <form method="POST" enctype="multipart/form-data" action="">
            <div id="language_1">
                <table cellpadding="3" cellspacing="0" border="0">
                    <tr>
                        <td valign="middle" align="right">Дата публикации<span class="asterix">*</span>:</td>
                        <td valign="top" align="left">
                            <input type="text" name="published_at" value='<?php echo stripslashes($_POST['published_at']);?>
' class="datetime" style="width: 230px;" />
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Название<span class="asterix">*</span>:</td>
                        <td valign="top" align="left">
                            <input type="text" name="title" value='<?php echo stripslashes($_POST['title']);?>
' style="width: 730px;" />
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="right">Описание:</td>
                        <td valign="top" align="left">
                            <textarea name="description" rows="5" style="width: 730px;height:80px;"><?php echo stripslashes($_POST['description']);?>
</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="right">Текст:<span class="asterix">*</span>:</td>
                        <td valign="top" align="left">
                            <textarea name="text" class="editor"  style="width: 730px;height:250px;"><?php echo stripslashes($_POST['text']);?>
</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Изображение:</td>
                        <td valign="middle" align="left">
                            <?php if ($_smarty_tpl->tpl_vars['data']->value->image) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['news_image_url']->value;
echo $_smarty_tpl->tpl_vars['data']->value->image;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['news_image_url']->value;?>
small_<?php echo $_smarty_tpl->tpl_vars['data']->value->image;?>
" alt="" style="max-width: 100px;vertical-align: middle; border: 1px solid #CCCCCC" /></a>
                                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value->image;?>
" name="uploaded_image" />
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value->image) {?>Заменить: <?php }?><input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><br /><b>SEO</b></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Заголовок (meta):</td>
                        <td valign="top" align="left">
                            <input type="text" name="meta_title" value='<?php echo stripslashes($_POST['meta_title']);?>
' style="width: 730px;" />
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Описание (meta):</td>
                        <td valign="top" align="left">
                            <input type="text" name="meta_description" value='<?php echo stripslashes($_POST['meta_description']);?>
' style="width: 730px;" />
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Ключевые слова (meta):</td>
                        <td valign="top" align="left">
                            <input type="text" name="meta_keywords" value='<?php echo stripslashes($_POST['meta_keywords']);?>
' style="width: 730px;" />
                        </td>
                    </tr>
                </table>
                <br />
                <?php if ($_smarty_tpl->tpl_vars['data']->value->id) {?><button>Сохранить</button><?php } else { ?><button>Добавить</button><?php }?>
            </div>
        </form>
    </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/datetimepicker/jquery.datetimepicker.full.min.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="/js/datetimepicker/jquery.datetimepicker.min.css"/>
<?php echo '<script'; ?>
>
    
        $.datetimepicker.setLocale('ru');
        $(document).ready(function() {
            $('.datetime').datetimepicker({
                format:'d.m.Y H:i'
            })
        })
    
<?php echo '</script'; ?>
><?php }
}
?>