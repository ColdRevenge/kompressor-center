<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:48
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_topic_read.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:188550072055f573f8450338_46229487%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '019ec1cc6fbdab8ef6afa0508de1e4bdb7419e2f' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_topic_read.tpl',
      1 => 1442066910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188550072055f573f8450338_46229487',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'url' => 0,
    'item' => 0,
    'get_category' => 0,
    'get_parent_category' => 0,
    'shop_url' => 0,
    'get_user' => 0,
    'get_topic' => 0,
    'action_notice' => 0,
    'user_id' => 0,
    'topic_answers' => 0,
    'topic' => 0,
    'get_topic_news' => 0,
    '_shop_url' => 0,
    'answer_id' => 0,
    'users_like' => 0,
    'user_like' => 0,
    'count_user_like' => 0,
    'get_answer_like' => 0,
    'host_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f573f85a1128_96264188',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573f85a1128_96264188')) {
function content_55f573f85a1128_96264188 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '188550072055f573f8450338_46229487';
if ($_smarty_tpl->tpl_vars['breadcrumbs']->value) {?>
    <div class="breadcrumbs-block">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
                <?php
$_from = $_smarty_tpl->tpl_vars['breadcrumbs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_breadcrumbs'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_breadcrumbs']->value['iteration']++;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id'] != 0) {?><li><?php if ((isset($_smarty_tpl->tpl_vars['__foreach_breadcrumbs']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_breadcrumbs']->value['iteration'] : null) == (isset($_smarty_tpl->tpl_vars['__foreach_breadcrumbs']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_breadcrumbs']->value['total'] : null)) {
echo stripslashes($_smarty_tpl->tpl_vars['get_category']->value->name);
} else { ?><a href="<?php if ($_smarty_tpl->tpl_vars['get_parent_category']->value->parent_id == 1107) {?>/<?php } else {
echo $_smarty_tpl->tpl_vars['shop_url']->value;
echo $_smarty_tpl->tpl_vars['item']->value['pseudo_dir'];?>
/<?php }?>"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value['name']);?>
</a><span>/</span><?php }?></li><?php }?>
                    <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
        </ul>
    </div>
<?php }?>
<div itemscope itemtype="http://schema.org/Question"> 
    <?php if ($_smarty_tpl->tpl_vars['get_user']->value->user_type == 1) {?>
        <div  class="edit-wrapper">
            <h1 itemprop="name"><?php echo stripslashes($_smarty_tpl->tpl_vars['get_topic']->value->name);?>

                <span class="edit-block">
                    <a href="/admin/edit/topic/<?php echo $_smarty_tpl->tpl_vars['get_topic']->value->id;?>
/?is_modal=1" rel="set"><img src="/images/sys/admin/edit.png" align="middle" hspace="1" alt="Редактировать"></a>
                    <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить тему ??')) {
                                location.href = '/admin/del/topic/<?php echo $_smarty_tpl->tpl_vars['get_topic']->value->id;?>
/1/';
                            }"><img src="/images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить"></a>
                </span>
            </h1>
            <div id="is_notice">
                <?php if ($_smarty_tpl->tpl_vars['action_notice']->value != 2) {?>
                    <a href="javascript:void(0)" onclick="AjaxRequestAsync('is_notice', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
forum/notice/<?php echo $_smarty_tpl->tpl_vars['get_topic']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
/1/')">Подписаться на тему</a>
                <?php } else { ?>
                    <a href="javascript:void(0)" onclick="AjaxRequestAsync('is_notice', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
forum/notice/<?php echo $_smarty_tpl->tpl_vars['get_topic']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
/0/')">Отписаться от темы</a>
                <?php }?>
            </div>
        </div>
    <?php } else { ?>
        <h1 itemprop="name"><?php echo stripslashes($_smarty_tpl->tpl_vars['get_topic']->value->name);?>
</h1>
        <?php if ($_smarty_tpl->tpl_vars['user_id']->value > 0) {?>
            <div id="is_notice">
                <?php if ($_smarty_tpl->tpl_vars['action_notice']->value != 2) {?>
                    <a href="javascript:void(0)" onclick="AjaxRequestAsync('is_notice', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
forum/notice/<?php echo $_smarty_tpl->tpl_vars['get_topic']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
/1/')">Подписаться на тему</a>
                <?php } else { ?>
                    <a href="javascript:void(0)" onclick="AjaxRequestAsync('is_notice', '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
forum/notice/<?php echo $_smarty_tpl->tpl_vars['get_topic']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
/0/')">Отписаться от темы</a>
                <?php }?>
            </div>
        <?php }?>
    <?php }?>
    <a href="" onclick="jQuery.scrollTo('#add_form', 600);
            return false;" class="forum-button forum_add" style="float: right">Написать сообщение</a>


    <?php if (count($_smarty_tpl->tpl_vars['topic_answers']->value) > 0) {?>
        <div id="topics">

            <table class="forum-table-answer" cellpadding="0" cellspacing="0" border="1">
                <?php
$_from = $_smarty_tpl->tpl_vars['topic_answers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["topic"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["topic"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_topic'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["topic"]->value) {
$_smarty_tpl->tpl_vars["topic"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_topic']->value['iteration']++;
$foreach_topic_Sav = $_smarty_tpl->tpl_vars["topic"];
?>
                    <tbody class="thead">
                        <tr>
                            <td colspan="2">
                                <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getDateTemplate(array('date'=>$_smarty_tpl->tpl_vars['topic']->value->created),$_smarty_tpl);?>

                                <?php if ($_smarty_tpl->tpl_vars['get_user']->value->user_type == 1) {?>
                                    <div class="edit-answer-block">
                                        <a href="/admin/edit/answer/<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
/?is_modal=1" rel="set"><img src="/images/sys/admin/edit.png" align="middle" hspace="1" alt="Редактировать"></a>
                                        <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить страницу??')) {
                                                    location.href = '/admin/del/answer/<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
/1/';
                                                }"><img src="/images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить"></a>

                                    </div>
                                <?php } elseif ((isset($_smarty_tpl->tpl_vars['__foreach_topic']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_topic']->value['iteration'] : null) == (isset($_smarty_tpl->tpl_vars['__foreach_topic']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_topic']->value['total'] : null) && $_smarty_tpl->tpl_vars['topic']->value->user_id == $_smarty_tpl->tpl_vars['user_id']->value) {?>
                                    <div class="edit-answer-block">
                                        <a href="/forum/edit/answer/<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
/?is_modal=1" rel="set"><img src="/images/sys/admin/edit.png" align="middle" hspace="1" alt="Редактировать"></a>
                                    </div>
                                <?php }?>
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="tbody">
                        <tr>
                            <td style="width: 200px;" class="answer-user-info">
                                <a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['topic']->value->user_id;?>
/?is_modal=1" rel="set"><?php if ($_smarty_tpl->tpl_vars['topic']->value->user_icon) {?>
                                    <img src="/images/forum/avatars/<?php echo $_smarty_tpl->tpl_vars['topic']->value->user_icon;?>
" alt="" onerror="this.src='/images/forum/avatars/no-avatars.png'" />
                                    <?php } else { ?>
                                        <img src="/images/forum/avatars/no-avatars.png" alt="" />
                                        <?php }?></a>
                                        <div class="answer-name"><a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['topic']->value->user_id;?>
/?is_modal=1" rel="set"><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['topic']->value->user_name));?>
</a></div>
                                        <div class="answer-status"><?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getUserStatus(array('count_post'=>$_smarty_tpl->tpl_vars['topic']->value->count_message,'count_like'=>$_smarty_tpl->tpl_vars['topic']->value->count_like),$_smarty_tpl);?>
</div>
                                        <div class="answer-notice">
                                            <?php if ($_smarty_tpl->tpl_vars['topic']->value->birth_day > 0) {?>
                                                <div>
                                                    Возраст: <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getCountYearTemplate(array('year'=>smarty_modifier_date_format($_smarty_tpl->tpl_vars['topic']->value->birth_day,"Y")),$_smarty_tpl);?>

                                                </div>
                                            <?php }?>
                                            <div>На форуме с <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['topic']->value->user_created,"d.m.Y");?>
</div>
                                            <div>Сообщений: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value->count_message)===null||$tmp==='' ? '0' : $tmp);?>
</div> 
                                            <div id="result_like_<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
">Поблагодарили: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value->count_like)===null||$tmp==='' ? '0' : $tmp);?>
</div>

                                        </div>
                                    </td>
                                    <td class="answer-message" itemprop="acceptedAnswer" itemscope itemtype="http://schema.org/Answer">
                                        <meta itemprop="upvoteCount" content="<?php echo $_smarty_tpl->tpl_vars['topic']->value->count_answer_like;?>
" />
                                        <div itemprop="text">
                                            <?php echo stripslashes($_smarty_tpl->tpl_vars['topic']->value->text);?>

                                            <?php if ($_smarty_tpl->tpl_vars['get_topic_news']->value->id) {?>
                                                <?php if ($_smarty_tpl->tpl_vars['get_topic_news']->value->shop_id == '1') {?>
                                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://lalipop.ru/", null, 0);?>
                                                <?php } elseif ($_smarty_tpl->tpl_vars['get_topic_news']->value->shop_id == '2') {?>
                                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://lady.lalipop.ru/", null, 0);?>
                                                <?php } elseif ($_smarty_tpl->tpl_vars['get_topic_news']->value->shop_id == '3') {?>
                                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://platok.lalipop.ru/", null, 0);?>
                                                <?php } elseif ($_smarty_tpl->tpl_vars['get_topic_news']->value->shop_id == '4') {?>
                                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://sumka.lalipop.ru/", null, 0);?>
                                                <?php } elseif ($_smarty_tpl->tpl_vars['get_topic_news']->value->shop_id == '5') {?>
                                                    <?php $_smarty_tpl->tpl_vars["_shop_url"] = new Smarty_Variable("https://woman.lalipop.ru/", null, 0);?>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['_shop_url']->value && (isset($_smarty_tpl->tpl_vars['__foreach_topic']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_topic']->value['iteration'] : null) == 1) {?>
                                                    <div style="text-align: center"><br/>
                                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_shop_url']->value;?>
news/look/<?php echo $_smarty_tpl->tpl_vars['get_topic_news']->value->id;?>
/" target="_blank" class="topic_news">Посмотреть ориганал новости на сайте</a>
                                                        <br/><br/> </div>
                                                    <?php }?>
                                                <?php }?>
                                        </div>
                                        <?php $_smarty_tpl->tpl_vars["answer_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['topic']->value->id, null, 0);?>
                                        <div class="like-box">
                                            <?php if ($_smarty_tpl->tpl_vars['user_id']->value > 0) {?>
                                                <button class="answer-button" onclick="tinyMCE.activeEditor.setContent('<blockquote><p>' + $('.answer-text_<?php echo $_smarty_tpl->tpl_vars['answer_id']->value;?>
').text().replace(/\n/g,'<br>') + '</p></blockquote><br/><br/>'); jQuery.scrollTo('#add_form', 600);">&nbsp;</button>
                                            <?php }?>
                                            <?php $_smarty_tpl->assign("users_like",$_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getLikeUserAnswerTemplate(array('user_id'=>$_smarty_tpl->tpl_vars['topic']->value->user_id,'answer_id'=>$_smarty_tpl->tpl_vars['answer_id']->value),$_smarty_tpl));?>

                                            <?php if (count($_smarty_tpl->tpl_vars['users_like']->value)) {?>
                                                <span class="notice">
                                                    Нравиться:
                                                    <?php
$_from = $_smarty_tpl->tpl_vars['users_like']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['user_like'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['user_like']->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_user_like'] = new Smarty_Variable(array('total' => $_smarty_tpl->_count($_from), 'iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars['user_like']->value) {
$_smarty_tpl->tpl_vars['user_like']->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_user_like']->value['iteration']++;
$foreach_user_like_Sav = $_smarty_tpl->tpl_vars['user_like'];
?>
                                                        <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_user_like']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_user_like']->value['iteration'] : null) < 4) {?>
                                                            <a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['user_like']->value->from_user_id;?>
/?is_modal=1" rel="set"><?php echo stripslashes($_smarty_tpl->tpl_vars['user_like']->value->user_name);?>
</a><?php if ((isset($_smarty_tpl->tpl_vars['__foreach_user_like']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_user_like']->value['iteration'] : null) != (isset($_smarty_tpl->tpl_vars['__foreach_user_like']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_user_like']->value['total'] : null)) {?>, <?php }?>
                                                        <?php }?>
                                                    <?php
$_smarty_tpl->tpl_vars['user_like'] = $foreach_user_like_Sav;
}
?>
                                                    <?php if ((isset($_smarty_tpl->tpl_vars['__foreach_user_like']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_user_like']->value['total'] : null) > 3) {?>
                                                        <?php $_smarty_tpl->assign("count_user_like",$_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getCountUserTemplate(array('count'=>(isset($_smarty_tpl->tpl_vars['__foreach_user_like']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_user_like']->value['total'] : null)),$_smarty_tpl));?>

                                                        и еще <a href="/forum/answer/like/<?php echo $_smarty_tpl->tpl_vars['topic']->value->user_id;?>
/<?php echo $_smarty_tpl->tpl_vars['answer_id']->value;?>
/?is_modal=1" rel="set"><?php echo (isset($_smarty_tpl->tpl_vars['__foreach_user_like']->value['total']) ? $_smarty_tpl->tpl_vars['__foreach_user_like']->value['total'] : null)-3;?>
-<?php echo $_smarty_tpl->tpl_vars['count_user_like']->value;?>
 девушкам</a>
                                                    <?php }?>
                                                </span>
                                            <?php }?>
                                            
                                            <?php if ($_smarty_tpl->tpl_vars['topic']->value->user_id != $_smarty_tpl->tpl_vars['user_id']->value && $_smarty_tpl->tpl_vars['user_id']->value > 0 && $_smarty_tpl->tpl_vars['get_answer_like']->value[$_smarty_tpl->tpl_vars['answer_id']->value][$_smarty_tpl->tpl_vars['user_id']->value] != 1) {?>
                                                <button class="like" onclick="$(this).hide();
                                                        AjaxRequest('result_like_<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
', '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
like/<?php echo $_smarty_tpl->tpl_vars['topic']->value->topic_id;?>
/<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
/<?php echo $_smarty_tpl->tpl_vars['topic']->value->user_id;?>
/');"></button>
                                            <?php }?>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
$_smarty_tpl->tpl_vars["topic"] = $foreach_topic_Sav;
}
?>
                            </table>
                        </div>
                        <?php }?>
                        </div>
                        <div id="add_form">
                            <br/>
                            <h2>Создать новую тему</h2>
                            <?php echo $_smarty_tpl->getSubTemplate ("add_topic.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                        </div>

                        <?php }
}
?>