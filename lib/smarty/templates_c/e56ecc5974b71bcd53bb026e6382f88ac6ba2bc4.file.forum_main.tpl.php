<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-12 20:59:41
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144355715055dde67f79ce96-41941190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e56ecc5974b71bcd53bb026e6382f88ac6ba2bc4' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_main.tpl',
      1 => 1442080781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144355715055dde67f79ce96-41941190',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55dde67f806187_79270175',
  'variables' => 
  array (
    'open_category_id' => 0,
    'menu_forum' => 0,
    'icategory' => 0,
    'url' => 0,
    'icategory_id' => 0,
    'user_id' => 0,
    'get_topic_not_title' => 0,
    'topic_not_title' => 0,
    'get_user' => 0,
    'get_last_topics' => 0,
    'item' => 0,
    'get_topic' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dde67f806187_79270175')) {function content_55dde67f806187_79270175($_smarty_tpl) {?><div id="forum_main">
    <div id="main_category">
        <?php  $_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["icategory"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu_forum']->value[$_smarty_tpl->tpl_vars['open_category_id']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->key => $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
?>
            <?php $_smarty_tpl->tpl_vars["icategory_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['icategory']->value->id, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['icategory']->value->is_visible==1) {?>
                <div<?php if ($_smarty_tpl->tpl_vars['icategory']->value->id==1104) {?> class="shop_topic"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['icategory']->value->category_pseudo_dir;?>
/" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</a>

                    <?php echo $_smarty_tpl->getSubTemplate ("forum_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('menu_forum'=>$_smarty_tpl->tpl_vars['menu_forum']->value,'id'=>$_smarty_tpl->tpl_vars['icategory_id']->value), 0);?>

                </div>
            <?php }?>
        <?php } ?>

        <?php if ($_smarty_tpl->tpl_vars['user_id']->value==446&&count($_smarty_tpl->tpl_vars['get_topic_not_title']->value)) {?>
            <h2 style="color: red">Нет Title (Только для админа)</h2>
            <ul>
                <?php  $_smarty_tpl->tpl_vars["topic_not_title"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["topic_not_title"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_topic_not_title']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["not_title"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["topic_not_title"]->key => $_smarty_tpl->tpl_vars["topic_not_title"]->value) {
$_smarty_tpl->tpl_vars["topic_not_title"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["not_title"]['iteration']++;
?>
                    <li style="padding-left: 10px;"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['not_title']['iteration'];?>
. <a href="/<?php echo $_smarty_tpl->tpl_vars['topic_not_title']->value->pseudo_dir;?>
/read/<?php echo $_smarty_tpl->tpl_vars['topic_not_title']->value->id;?>
/" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['topic_not_title']->value->name);?>
</a></li>
                    <?php } ?>
            </ul>
        <?php }?>
    </div>
    <div id="forum_main_right">
        <?php if ($_smarty_tpl->tpl_vars['user_id']->value>0) {?>
            <ul>
                <li class="right-header"><a href="/stat/profile/forum/">Панель пользователя</a></li>
                <li>
                    <div id="prifile-mini">
                        <a href="/stat/profile/forum/"><?php if ($_smarty_tpl->tpl_vars['get_user']->value->icon) {?>
                            <img src="/images/forum/avatars/<?php echo $_smarty_tpl->tpl_vars['get_user']->value->icon;?>
" alt="" onerror="this.src='/images/forum/avatars/no-avatars.png'" />
                        <?php } else { ?>
                            <img src="/images/forum/avatars/no-avatars.png" alt="" />
                        <?php }?></a>
                    <div class="answer-status"><?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getUserStatus(array('count_post'=>$_smarty_tpl->tpl_vars['get_user']->value->count_message,'count_like'=>$_smarty_tpl->tpl_vars['get_user']->value->count_like),$_smarty_tpl);?>
</div>
                    <div class="notice">Всего постов: <b><?php echo (($tmp = @$_smarty_tpl->tpl_vars['get_user']->value->count_message)===null||$tmp==='' ? '0' : $tmp);?>
</b></div>
                    <div class="notice">Поблагодарили: <b><?php echo (($tmp = @$_smarty_tpl->tpl_vars['get_user']->value->count_like)===null||$tmp==='' ? '0' : $tmp);?>
</b></div>

                </div>

            </li>
        </ul>
        <?php }?>
            <ul>
                <li class="right-header"><a href="/poslednie-temu/">Последние темы</a></li>
                <li>
                    <ul id="mini-last-topic">
                        <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_last_topics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["item"]['iteration']++;
?>
                            <?php if ($_smarty_tpl->tpl_vars['user_id']->value>0&&$_smarty_tpl->getVariable('smarty')->value['foreach']['item']['iteration']<=9||!$_smarty_tpl->tpl_vars['user_id']->value&&$_smarty_tpl->getVariable('smarty')->value['foreach']['item']['iteration']<=14) {?>
                                <?php $_smarty_tpl->assign("get_topic",$_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getTopicTemplate(array('topic_id'=>$_smarty_tpl->tpl_vars['item']->value->topic_id),$_smarty_tpl));?>

                                <li>
                                    <span>
                                        <?php if ($_smarty_tpl->tpl_vars['item']->value->user_icon) {?>
                                            <img src="/images/forum/avatars/<?php echo $_smarty_tpl->tpl_vars['item']->value->user_icon;?>
" alt=""  onerror="this.src='/images/forum/avatars/no-avatars.png'" />
                                        <?php } else { ?>
                                            <img src="/images/forum/avatars/no-avatars.png" alt="" />

                                        <?php }?></span>
                                    <div>
                                        <a href="/<?php echo $_smarty_tpl->tpl_vars['get_topic']->value->pseudo_dir;?>
/read/<?php echo $_smarty_tpl->tpl_vars['item']->value->topic_id;?>
/"><?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_topic']->value->name));?>
</a>
                                        <div><a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['item']->value->user_id;?>
/?is_modal=1" rel="set"><?php echo $_smarty_tpl->tpl_vars['item']->value->user_name;?>
</a><span>
                                                <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getDateTemplate(array('date'=>$_smarty_tpl->tpl_vars['item']->value->created),$_smarty_tpl);?>
</span></div>
                                    </div>
                                </li>
                            <?php }?>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div><?php }} ?>
