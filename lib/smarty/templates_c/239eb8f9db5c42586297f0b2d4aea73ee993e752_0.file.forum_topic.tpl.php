<?php /* Smarty version 3.1.24, created on 2015-09-13 16:02:41
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_topic.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:193026705655f573f1ed7885_60360128%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '239eb8f9db5c42586297f0b2d4aea73ee993e752' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_topic.tpl',
      1 => 1441715051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193026705655f573f1ed7885_60360128',
  'variables' => 
  array (
    'breadcrumbs' => 0,
    'url' => 0,
    'item' => 0,
    'get_category' => 0,
    'get_parent_category' => 0,
    'shop_url' => 0,
    'open_category_id' => 0,
    'menu_forum' => 0,
    'topics' => 0,
    'host_url' => 0,
    'topic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f573f2043c82_39700319',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f573f2043c82_39700319')) {
function content_55f573f2043c82_39700319 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '193026705655f573f1ed7885_60360128';
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
<h1><?php echo stripslashes($_smarty_tpl->tpl_vars['get_category']->value->name);?>
</h1>
<a href="" onclick="jQuery.scrollTo('#add_form', 600);
        return false;" class="forum-button forum_add" style="float: right">Новая тема</a>
<?php if (count($_smarty_tpl->tpl_vars['menu_forum']->value[$_smarty_tpl->tpl_vars['open_category_id']->value])) {?>
    <div id="main_category">
        <?php if ($_smarty_tpl->tpl_vars['get_parent_category']->value->id) {?>
            <div<?php if ($_smarty_tpl->tpl_vars['get_parent_category']->value->id == 1104) {?> class="shop_topic"<?php }?>>
                <a href="/<?php echo $_smarty_tpl->tpl_vars['get_parent_category']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['get_parent_category']->value->name);?>
</a>

                <?php echo $_smarty_tpl->getSubTemplate ("forum_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('menu_forum'=>$_smarty_tpl->tpl_vars['menu_forum']->value,'id'=>$_smarty_tpl->tpl_vars['open_category_id']->value), 0);
?>

            </div>
        <?php }?>
    </div>
<?php }?>
<?php if (count($_smarty_tpl->tpl_vars['topics']->value) > 0) {?>

    <?php if ($_smarty_tpl->tpl_vars['get_category']->value->id) {?>
        <div id="topics">
            <div id="topic-header">
                Темы раздела: "<?php echo stripslashes($_smarty_tpl->tpl_vars['get_category']->value->name);?>
"
            </div>
            <table class="forum-table" cellpadding="0" cellspacing="0" border="1">
                <thead>
                    <tr>
                        <td>
                            Тема / Автор
                        </td>
                        <td style="width: 170px;">
                            Последнее сообщение
                        </td>
                        <td style="width: 70px;">
                            Ответов
                        </td>
                        <td style="width: 90px;">
                            Просмотров
                        </td>
                    </tr>
                </thead>
                <?php
$_from = $_smarty_tpl->tpl_vars['topics']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["topic"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["topic"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["topic"]->value) {
$_smarty_tpl->tpl_vars["topic"]->_loop = true;
$foreach_topic_Sav = $_smarty_tpl->tpl_vars["topic"];
?>
                    <tbody onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;
echo $_smarty_tpl->tpl_vars['get_category']->value->pseudo_dir;?>
/read/<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
/'">

                        <tr>
                            <td>
                                <div class="topic-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['topic']->value->created,"d.m.Y H:m:s");?>
</div>
                                <div class="topic-name"><a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;
echo $_smarty_tpl->tpl_vars['get_category']->value->pseudo_dir;?>
/read/<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
/"><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['topic']->value->name));?>
</a></div>
                                <div class="notice"><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['topic']->value->user_name));?>
</div>
                            </td>
                            <td style="text-align: right">
                                <div class="topic-date">
                                    <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getDateTemplate(array('date'=>$_smarty_tpl->tpl_vars['topic']->value->change),$_smarty_tpl);?>
</div>
                                    
                            </td>
                            <td style="text-align: center;">
                                <b style="font-size: 15px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value->count_answer)===null||$tmp==='' ? 0 : $tmp);?>
</b>
                            </td>
                            <td style="text-align: center;">
                                <b style="font-size: 15px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['topic']->value->hit)===null||$tmp==='' ? 0 : $tmp);?>
</b>
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
<?php }?>

<div id="add_form">
    <br/>
    <h2>Создать новую тему</h2>
    <?php echo $_smarty_tpl->getSubTemplate ("add_topic.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</div>



<?php }
}
?>