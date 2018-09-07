<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:32
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:184478985055f573e8c9eed5_12354592%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bca2861c2cd92292c66e5ad13c53bc40dc218ec' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_main.tpl',
      1 => 1442080781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184478985055f573e8c9eed5_12354592',
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
  'version' => '3.1.24',
  'unifunc' => 'content_55f573e8d2eaa9_01341351',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573e8d2eaa9_01341351')) {
function content_55f573e8d2eaa9_01341351 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '184478985055f573e8c9eed5_12354592';
?>
<div id="forum_main">
    <div id="main_category">
        <?php
$_from = $_smarty_tpl->tpl_vars['menu_forum']->value[$_smarty_tpl->tpl_vars['open_category_id']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["icategory"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["icategory"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["icategory"]->value) {
$_smarty_tpl->tpl_vars["icategory"]->_loop = true;
$foreach_icategory_Sav = $_smarty_tpl->tpl_vars["icategory"];
?>
            <?php $_smarty_tpl->tpl_vars["icategory_id"] = new Smarty_Variable($_smarty_tpl->tpl_vars['icategory']->value->id, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['icategory']->value->is_visible == 1) {?>
                <div<?php if ($_smarty_tpl->tpl_vars['icategory']->value->id == 1104) {?> class="shop_topic"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo $_smarty_tpl->tpl_vars['icategory']->value->category_pseudo_dir;?>
/" title="<?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['icategory']->value->name);?>
</a>

                    <?php echo $_smarty_tpl->getSubTemplate ("forum_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('menu_forum'=>$_smarty_tpl->tpl_vars['menu_forum']->value,'id'=>$_smarty_tpl->tpl_vars['icategory_id']->value), 0);
?>

                </div>
            <?php }?>
        <?php
$_smarty_tpl->tpl_vars["icategory"] = $foreach_icategory_Sav;
}
?>

        <?php if ($_smarty_tpl->tpl_vars['user_id']->value == 446 && count($_smarty_tpl->tpl_vars['get_topic_not_title']->value)) {?>
            <h2 style="color: red">Нет Title (Только для админа)</h2>
            <ul>
                <?php
$_from = $_smarty_tpl->tpl_vars['get_topic_not_title']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["topic_not_title"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["topic_not_title"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_not_title'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["topic_not_title"]->value) {
$_smarty_tpl->tpl_vars["topic_not_title"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_not_title']->value['iteration']++;
$foreach_topic_not_title_Sav = $_smarty_tpl->tpl_vars["topic_not_title"];
?>
                    <li style="padding-left: 10px;"><?php echo (isset($_smarty_tpl->tpl_vars['__foreach_not_title']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_not_title']->value['iteration'] : null);?>
. <a href="/<?php echo $_smarty_tpl->tpl_vars['topic_not_title']->value->pseudo_dir;?>
/read/<?php echo $_smarty_tpl->tpl_vars['topic_not_title']->value->id;?>
/" target="_blank"><?php echo stripslashes($_smarty_tpl->tpl_vars['topic_not_title']->value->name);?>
</a></li>
                    <?php
$_smarty_tpl->tpl_vars["topic_not_title"] = $foreach_topic_not_title_Sav;
}
?>
            </ul>
        <?php }?>
    </div>
    <div id="forum_main_right">
        <?php if ($_smarty_tpl->tpl_vars['user_id']->value > 0) {?>
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
                        <?php
$_from = $_smarty_tpl->tpl_vars['get_last_topics']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["item"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["item"]->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_item'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_item']->value['iteration']++;
$foreach_item_Sav = $_smarty_tpl->tpl_vars["item"];
?>
                            <?php if ($_smarty_tpl->tpl_vars['user_id']->value > 0 && (isset($_smarty_tpl->tpl_vars['__foreach_item']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_item']->value['iteration'] : null) <= 9 || !$_smarty_tpl->tpl_vars['user_id']->value && (isset($_smarty_tpl->tpl_vars['__foreach_item']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_item']->value['iteration'] : null) <= 14) {?>
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
                        <?php
$_smarty_tpl->tpl_vars["item"] = $foreach_item_Sav;
}
?>
                    </ul>
                </li>
            </ul>
        </div>
    </div><?php }
}
?>