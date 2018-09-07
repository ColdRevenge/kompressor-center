<?php /* Smarty version 3.1.24, created on 2015-09-14 21:27:09
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:154570044455f7117db7ddc6_55870998%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a38cbb4ba5870e2a290f2e06299fd4811976bba2' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_list.tpl',
      1 => 1441989068,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154570044455f7117db7ddc6_55870998',
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
  'version' => '3.1.24',
  'unifunc' => 'content_55f7117dc25301_00531393',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f7117dc25301_00531393')) {
function content_55f7117dc25301_00531393 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.truncate.php';

$_smarty_tpl->properties['nocache_hash'] = '154570044455f7117db7ddc6_55870998';
?>
<div id="stat-left-menu">

    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("/modules/stat/templates/stat_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

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
                <?php
$_from = $_smarty_tpl->tpl_vars['get_message']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["message"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["message"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["message"]->value) {
$_smarty_tpl->tpl_vars["message"]->_loop = true;
$foreach_message_Sav = $_smarty_tpl->tpl_vars["message"];
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
                            <?php
$_smarty_tpl->tpl_vars["message"] = $foreach_message_Sav;
}
?>
                            </table>
                        </div>
                        <?php } else { ?>
                            <h3>У вас нет сообщений</h3><br/><br/><br/><br/>
                            <?php }?>
                            </div><?php }
}
?>