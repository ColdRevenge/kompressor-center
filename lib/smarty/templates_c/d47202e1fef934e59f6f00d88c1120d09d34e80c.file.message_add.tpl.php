<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-08 12:46:25
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130278001755eb175242e171-29544585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd47202e1fef934e59f6f00d88c1120d09d34e80c' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_add.tpl',
      1 => 1441705580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130278001755eb175242e171-29544585',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55eb17524412d4_60941084',
  'variables' => 
  array (
    'is_message' => 0,
    'to_user_id' => 0,
    'user_id' => 0,
    'get_user' => 0,
    'parent_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55eb17524412d4_60941084')) {function content_55eb17524412d4_60941084($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['is_message']->value==1) {?>
    <h3>Сообщение успешно отправлено!</h3>
<?php } elseif ($_smarty_tpl->tpl_vars['to_user_id']->value!=$_smarty_tpl->tpl_vars['user_id']->value&&$_smarty_tpl->tpl_vars['to_user_id']->value!=''||($_smarty_tpl->tpl_vars['get_user']->value->id!=$_smarty_tpl->tpl_vars['user_id']->value&&$_smarty_tpl->tpl_vars['to_user_id']->value=='')) {?>

    <form method="post" id="form_message_id">
        <?php if ($_smarty_tpl->tpl_vars['parent_id']->value==0) {?>
            <h3>Отправить личное сообщение</h3>
        <?php } else { ?>
            <h3>Написать ответ</h3>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['parent_id']->value==0) {?>
            <input type="text" placeholder="Тема сообщения" name="name" value="<?php echo stripslashes($_POST['name']);?>
" />
        <?php } else { ?>
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['parent_id']->value;?>
" name="parent_id" />
        <?php }?>
        <textarea placeholder="Сообщение" name="message"><?php echo stripslashes($_POST['message']);?>
</textarea>
        <?php if ($_smarty_tpl->tpl_vars['user_id']->value>0) {?>
            <div id="form_message_ind">
                <?php if ($_smarty_tpl->tpl_vars['is_message']->value==-1) {?>
                    <div class="error">Заполните поле "Тема сообщения"</div>
                <?php } elseif ($_smarty_tpl->tpl_vars['is_message']->value==-2) {?>
                    <div class="error">Заполните поле "Сообщение"</div>
                <?php }?>
                <button class="send" onclick="return sendUserMessage(<?php echo (($tmp = @$_smarty_tpl->tpl_vars['to_user_id']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['get_user']->value->id : $tmp);?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['parent_id']->value)===null||$tmp==='' ? 0 : $tmp);?>
);">&nbsp;</button>
            </div>
        <?php } else { ?>
            <div class="notice" style="color: red; text-align: right">Для отправления личного сообщение необходимо авторизоваться</div>
        <?php }?>
    </form>
<?php }?><?php }} ?>
