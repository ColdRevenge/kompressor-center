<?php /* Smarty version 3.1.24, created on 2015-09-13 16:07:03
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/comments/templates/comments.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:78758055555f574f76c7a29_16139504%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e41bfb1609d65f4fea71684976a4b836b8e2d16' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/comments/templates/comments.tpl',
      1 => 1423307966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78758055555f574f76c7a29_16139504',
  'variables' => 
  array (
    'parent_id' => 0,
    'comments' => 0,
    'comment' => 0,
    'is_message' => 0,
    'is_error' => 0,
    'url' => 0,
    'type_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f574f7762e92_11518706',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f574f7762e92_11518706')) {
function content_55f574f7762e92_11518706 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '78758055555f574f76c7a29_16139504';
?>
<div id="comments_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
">
    <h1>Комментарии<?php if (count($_smarty_tpl->tpl_vars['comments']->value)) {?> <span style="font-size: 14px;">(<a href="javascript:void(0)" onclick="jQuery.scrollTo('#add_comment', 1200);">Написать комментарий</a>)</span><?php }?></h1>
    <div style="padding:5px 10px 0px 5px;">
        <?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['comments']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["comment"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["comment"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["comment"]->value) {
$_smarty_tpl->tpl_vars["comment"]->_loop = true;
$foreach_comment_Sav = $_smarty_tpl->tpl_vars["comment"];
?>
                <span style="color: #78a723"><b style="font-size: 16px;"><?php if (trim($_smarty_tpl->tpl_vars['comment']->value->name) != '') {
echo $_smarty_tpl->tpl_vars['comment']->value->name;
} else { ?>Гость<?php }?></b>
                    &nbsp;<span style="color: gray;font-size: 13px;">[<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comment']->value->created,"d.m.Y");?>
]</span></span> 
    <?php if (trim($_smarty_tpl->tpl_vars['comment']->value->defect) != '') {?><p style="font-size: 13px;"><strong>Недостатки</strong>:<br/><?php echo nl2br(stripslashes($_smarty_tpl->tpl_vars['comment']->value->defect));?>
</p><?php }?>
<?php if (trim($_smarty_tpl->tpl_vars['comment']->value->recommend) != '') {?><p style="font-size: 13px;"><strong>Достоинства</strong>:<br/><?php echo nl2br(stripslashes($_smarty_tpl->tpl_vars['comment']->value->recommend));?>
</p><?php }?>
    <?php if (trim($_smarty_tpl->tpl_vars['comment']->value->comment) != '') {?><p style="font-size: 13px;"><strong>Комментарий</strong>:<br/><?php echo nl2br(stripslashes($_smarty_tpl->tpl_vars['comment']->value->comment));?>
</p><?php }?>

<div style="margin: auto; width: 93%; height: 1px; border-top: 1px solid #e5e5e5; margin: 10px auto 10px auto"></div>
<?php
$_smarty_tpl->tpl_vars["comment"] = $foreach_comment_Sav;
}
?>
<?php } else { ?>
    Нет комментариев
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['is_message']->value == 1) {?> 
    <h2 style="color: #ff6600;padding-bottom: 0;margin-bottom: 0">Комментарий успешно добавлен!</h2>
    <h3 style="margin-top: 0; padding-top: 0;font-size: 17px; ">После прохождения модерации, он будет опубликован на сайте</h3>
<?php } elseif ($_smarty_tpl->tpl_vars['is_error']->value == 1) {?>   
    <h2 style="color: #eb0f33;">Заполните все поля</h2>
<?php } elseif ($_smarty_tpl->tpl_vars['is_error']->value == 5) {?>   
    <h2 style="color: #eb0f33;margin-bottom: 20px;">Код с картинки введен не правильно</h2>
<?php } elseif ($_smarty_tpl->tpl_vars['is_error']->value == 3) {?>   
    <h2 style="color: #eb0f33;font-size: 17px;">
        Ваш комментарий попал под фильтр. Исправьте текст комментария, и отправьте его еще раз. <br/><br/>
        1. В комментариях должны присутствовать русские буквы. 
        <br/><br/>
        Приносим свои извинения за неудобства.
    </h2>
<?php }?>  

<h2 id="add_comment">Написать комментарий </h2>
<form method="post" action="" id="form_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
">
    <table cellpadding="0" cellspacing="1" border="0">
        <tr>
            <td valign="top" align="left">
                <p><strong>Ваше имя</strong><br/>
                    <input type="text" value="<?php echo (($tmp = @$_POST['name'])===null||$tmp==='' ? $_SESSION['comment_name'] : $tmp);?>
" name="name" onfocus="this.className='selInput'" onblur = "this.className = 'text'" style="width: 400px;margin-top: 3px;" />
            </td>
        </tr>
   
        <tr>
            <td valign="top" align="left">
                <p><strong>Комментарий</strong><br/>
                    <textarea rows="7" cols="4"  onfocus="this.className='selInput'" onblur = "this.className = ''" style="width: 400px;height: 120px;margin-top: 3px;" name="comment"><?php echo stripslashes($_POST['comment']);?>
</textarea></p>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right" colspan="2" style="text-align: right">
                <button class="send"  onclick="AjaxFormQuery('comments_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
', 'form_<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/comments/list/<?php echo $_smarty_tpl->tpl_vars['type_id']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
/'); return false;" ></button>
            </td>
        </tr>
    </table>
</form>
</div>
</div><?php }
}
?>