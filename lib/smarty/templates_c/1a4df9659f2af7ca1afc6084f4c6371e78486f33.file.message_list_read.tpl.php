<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-11 20:30:49
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_list_read.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99221170255ed44e45a3237-43113790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a4df9659f2af7ca1afc6084f4c6371e78486f33' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/message_list_read.tpl',
      1 => 1441992646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99221170255ed44e45a3237-43113790',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55ed44e46311f1_19621628',
  'variables' => 
  array (
    'base_dir' => 0,
    'get_message' => 0,
    'url' => 0,
    'user_id' => 0,
    'message' => 0,
    'get_from_user' => 0,
    'param_tpl' => 0,
    'to_user_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ed44e46311f1_19621628')) {function content_55ed44e46311f1_19621628($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?>
<div id="topics" style="margin-top: 0">
    <div id="stat-left-menu">
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("/modules/stat/templates/stat_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
    <div id="stat_content">
        <?php if (count($_smarty_tpl->tpl_vars['get_message']->value)) {?>
            <div class="breadcrumbs-block">
                <ul class="clearfix">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Женский форум Lalipop</a><span>/</span></li>
                    <li><a href="/forum/post/list/">Личные сообщения</a><span>/</span></li>
                    <li><?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_message']->value[0]->name));?>
</li>
                </ul>
            </div>
            <h1><?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_message']->value[0]->name));?>
</h1>
            <?php if ($_smarty_tpl->tpl_vars['get_message']->value[0]->user_id==$_smarty_tpl->tpl_vars['user_id']->value) {?>
                <?php $_smarty_tpl->tpl_vars["to_user_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['get_message']->value[0]->from_user_id, null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars["to_user_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['get_message']->value[0]->user_id, null, 0);?>
            <?php }?>
            <table class="forum-table-answer" cellpadding="0" cellspacing="0" border="1" style="width: 100%">
                <?php  $_smarty_tpl->tpl_vars["message"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["message"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_message']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["message"]->key => $_smarty_tpl->tpl_vars["message"]->value) {
$_smarty_tpl->tpl_vars["message"]->_loop = true;
?>
                    <tbody class="thead">
                        <tr>
                            <td colspan="2">
                                <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getDateTemplate(array('date'=>$_smarty_tpl->tpl_vars['message']->value->created),$_smarty_tpl);?>

                                
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="tbody">
                        <tr>
                            <td style="width: 200px;" class="answer-user-info">
                                <?php $_smarty_tpl->assign("get_from_user",$_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getUserIdTemplate(array('user_id'=>$_smarty_tpl->tpl_vars['message']->value->from_user_id),$_smarty_tpl));?>

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
                                        <div class="answer-status"><?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getUserStatus(array('count_post'=>$_smarty_tpl->tpl_vars['get_from_user']->value->count_message,'count_like'=>$_smarty_tpl->tpl_vars['get_from_user']->value->count_like),$_smarty_tpl);?>
</div>
                                        <div class="answer-notice">
                                            <?php if ($_smarty_tpl->tpl_vars['get_from_user']->value->birth_day>0) {?>
                                                <div>
                                                    Возраст: <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getCountYearTemplate(array('year'=>smarty_modifier_date_format($_smarty_tpl->tpl_vars['get_from_user']->value->birth_day,"Y")),$_smarty_tpl);?>

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
                            <div id="message_add">
                                <div id="message_result">
                                    <?php echo $_smarty_tpl->getSubTemplate ("message_add.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('parent_id'=>$_smarty_tpl->tpl_vars['param_tpl']->value['message_id'],'to_user_id'=>$_smarty_tpl->tpl_vars['to_user_id']->value), 0);?>

                                </div>
                            </div>
                            <?php }?>
                            </div>
                        </div><?php }} ?>