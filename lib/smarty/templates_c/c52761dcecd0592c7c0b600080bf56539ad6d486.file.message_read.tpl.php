<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-06 19:57:38
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_read.tpl" */ ?>
<?php /*%%SmartyHeaderCode:55508431455eb1df3f3ff72-46213907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c52761dcecd0592c7c0b600080bf56539ad6d486' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_read.tpl',
      1 => 1441558656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55508431455eb1df3f3ff72-46213907',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55eb1df4034032_31409031',
  'variables' => 
  array (
    'get_message' => 0,
    'message' => 0,
    'get_from_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55eb1df4034032_31409031')) {function content_55eb1df4034032_31409031($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><h2 style="color: red">Модуль личные сообщения находится в разработке</h2>

<?php if (count($_smarty_tpl->tpl_vars['get_message']->value)) {?>
    <div id="topics">
        <table class="forum-table-answer" cellpadding="0" cellspacing="0" border="1" style="width: 100%">
            <?php  $_smarty_tpl->tpl_vars["message"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["message"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_message']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["message"]->key => $_smarty_tpl->tpl_vars["message"]->value) {
$_smarty_tpl->tpl_vars["message"]->_loop = true;
?>
                <tbody class="thead">
                    <tr>
                        <td colspan="2">
                            <?php echo $_smarty_tpl->tpl_vars['message']->value->name;?>

                            <div style="float: right">
                                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value->created,"d.m.Y H:i:s");?>

                            </div>
                        </td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td style="width: 200px;" class="answer-user-info">
                            <?php $_smarty_tpl->assign("get_from_user",$_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getUserIdTemplate(array('user_id'=>$_smarty_tpl->tpl_vars['message']->value->from_user_id),$_smarty_tpl));?>

                            <a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['get_from_user']->value->user_id;?>
/?is_modal=1" rel="set"><?php if ($_smarty_tpl->tpl_vars['get_from_user']->value->user_icon) {?>
                                <img src="/images/forum/avatars/<?php echo $_smarty_tpl->tpl_vars['get_from_user']->value->user_icon;?>
" alt="" onerror="this.src='/images/forum/avatars/no-avatars.png'" />
                                <?php } else { ?>
                                    <img src="/images/forum/avatars/no-avatars.png" alt="" />
                                    <?php }?></a>
                                    <div class="answer-name"><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['get_from_user']->value->name));?>
</div>
                                    <div class="answer-status"><?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getUserStatus(array('count_post'=>$_smarty_tpl->tpl_vars['get_from_user']->value->count_message,'count_like'=>$_smarty_tpl->tpl_vars['get_from_user']->value->count_like),$_smarty_tpl);?>
</div>
                                    <div class="answer-notice">
                                        <?php if ($_smarty_tpl->tpl_vars['get_from_user']->value->birth_day>0) {?>
                                            <div>
                                                Родилась: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['get_from_user']->value->birth_day,"d.m.Y");?>

                                            </div>
                                        <?php }?>
                                        <div>На форуме с <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['get_from_user']->value->created,"d.m.Y");?>
</div>
                                        <div>Сообщений: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['get_from_user']->value->count_message)===null||$tmp==='' ? '0' : $tmp);?>
</div> 
                                        <div id="result_like_<?php echo $_smarty_tpl->tpl_vars['get_from_user']->value->id;?>
">Поблагодарили: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['get_from_user']->value->count_like)===null||$tmp==='' ? '0' : $tmp);?>
</div>

                                    </div>
                                </td>
                                <td class="answer-message">

                                    <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['message']->value->message));?>

                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                        </table>
                    </div>
                    <?php }?><?php }} ?>
