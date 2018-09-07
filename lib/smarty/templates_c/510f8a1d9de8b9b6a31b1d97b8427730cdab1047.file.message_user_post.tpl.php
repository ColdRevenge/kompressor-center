<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-05 19:00:44
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_user_post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201830722655eb1026c16572-00434905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '510f8a1d9de8b9b6a31b1d97b8427730cdab1047' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_user_post.tpl',
      1 => 1441468841,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201830722655eb1026c16572-00434905',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55eb1026c25f19_73883268',
  'variables' => 
  array (
    'is_message' => 0,
    'user_id' => 0,
    'url' => 0,
    'get_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55eb1026c25f19_73883268')) {function content_55eb1026c25f19_73883268($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_message']->value==1) {?>
    <h3>Сообщение успешно отправлено!</h3>
<?php } else { ?>
    <form method="post" id="form_message_id">
        <h3>Отправить личное сообщение <span style="color: red">(в разработке)</span></h3>
        <input type="text" placeholder="Тема сообщения" name="name" />
        <textarea placeholder="Сообщение" name="message"></textarea>
        <?php if ($_smarty_tpl->tpl_vars['user_id']->value>0) {?>
            <div style="text-align: right">
                <button class="send" onclick="$(this).hide();
                        AjaxFormRequest('message_result', 'form_message_id', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
forum/post/user/<?php echo $_smarty_tpl->tpl_vars['get_user']->value->id;?>
/');
                        return false;">&nbsp;</button>
            </div>
        <?php } else { ?>
            <div class="notice" style="color: red; text-align: right">Для отправления личного сообщение необходимо авторизоваться</div>
        <?php }?>
    </form>
<?php }?><?php }} ?>
