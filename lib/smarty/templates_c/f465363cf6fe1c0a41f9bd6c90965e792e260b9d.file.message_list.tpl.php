<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-11 19:31:09
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141313140155ed455666fe00-01843703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f465363cf6fe1c0a41f9bd6c90965e792e260b9d' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_list.tpl',
      1 => 1441989068,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141313140155ed455666fe00-01843703',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55ed45566cfbf1_69373718',
  'variables' => 
  array (
    'base_dir' => 0,
    'url' => 0,
    'get_message' => 0,
    'message' => 0,
    'user_id' => 0,
    'get_from_user' => 0,
    'count_message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ed45566cfbf1_69373718')) {function content_55ed45566cfbf1_69373718($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.truncate.php';
?><div id="stat-left-menu">

    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("/modules/stat/templates/stat_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div id="stat_content">
    
    <div class="breadcrumbs-block">

        <ul class="clearfix">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Женский форум Lalipop</a><span>/</span></li>
            <li>Личные сообщения</li>
        </ul>
    </div>
    <h1>Личные сообщения</h1>

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
                            <td style="width: 250px;">
                                Собеседник
                            </td>
                            <td>
                                Тема
                            </td>
                            <td style="width: 150px">
                                Последнее сообщение
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="tbody">
                        <tr>
                            <td class="message-user-info">
                                <?php $_smarty_tpl->assign("get_from_user",$_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getUserIdTemplate(array('user_id'=>$_smarty_tpl->tpl_vars['message']->value->from_user_id),$_smarty_tpl));?>

                                <?php $_smarty_tpl->assign("count_message",$_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getCountNewTemplateMessageId(array('message_id'=>$_smarty_tpl->tpl_vars['message']->value->id,'user_id'=>$_smarty_tpl->tpl_vars['user_id']->value),$_smarty_tpl));?>

                                <a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['get_from_user']->value->id;?>
/?is_modal=1" rel="set"><?php if ($_smarty_tpl->tpl_vars['get_from_user']->value->icon) {?>
                                    <img src="/images/forum/avatars/<?php echo $_smarty_tpl->tpl_vars['get_from_user']->value->icon;?>
" alt="" onerror="this.src='/images/forum/avatars/no-avatars.png'" />
                                    <?php } else { ?>
                                        <img src="/images/forum/avatars/no-avatars.png" alt="" />
                                        <?php }?></a>
                                            <div class="answer-name"><a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['get_from_user']->value->id;?>
/?is_modal=1" rel="set"><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['get_from_user']->value->forum_name));?>
</a></div>
                                        
                                        <div class="last_visit">Была <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getCountDaysTemplate(array('date'=>$_smarty_tpl->tpl_vars['get_from_user']->value->last_visit),$_smarty_tpl);?>
</div>
                                    </td>
                                    <td class="message-name">

                                        <a href="/forum/post/read/<?php echo $_smarty_tpl->tpl_vars['message']->value->id;?>
/"><?php echo $_smarty_tpl->tpl_vars['message']->value->name;
if ($_smarty_tpl->tpl_vars['count_message']->value) {?> <span style="color: #f94208">(не прочитано)</span><?php }?></a>
                                        <?php echo smarty_modifier_truncate(nl2br(preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['message']->value->message))),200,'','');?>


                                        
                                    </td>
                                    <td class="message-date">

                                        <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getDateTemplate(array('date'=>$_smarty_tpl->tpl_vars['message']->value->created),$_smarty_tpl);?>

                                        <br/>Всего <b><?php echo (($tmp = @$_smarty_tpl->tpl_vars['message']->value->count)===null||$tmp==='' ? 0 : $tmp);?>
</b> сообщений
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                            </table>
                        </div>
                        <?php } else { ?>
                            <h3>У вас нет сообщений</h3><br/><br/><br/><br/>
                            <?php }?>
                            </div><?php }} ?>
