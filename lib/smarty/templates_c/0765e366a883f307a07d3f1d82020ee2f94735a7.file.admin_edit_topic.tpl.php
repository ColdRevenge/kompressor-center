<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-04 19:05:49
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/admin_edit_topic.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213664583855e30789065e39-22344158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0765e366a883f307a07d3f1d82020ee2f94735a7' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/admin_edit_topic.tpl',
      1 => 1441382746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213664583855e30789065e39-22344158',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e307890937a4_86899355',
  'variables' => 
  array (
    'get_topic' => 0,
    'base_template' => 0,
    'menu_forum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e307890937a4_86899355')) {function content_55e307890937a4_86899355($_smarty_tpl) {?>
<h1 style="padding-top: 0;margin-top: 0;padding-bottom: 15px;">Редактировать тему</h1>
<form method="post" action="">
    <div style="margin-bottom: 4px"><input type="text" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['get_topic']->value->title);?>
" name="topic_title" style="width: 684px;vertical-align: top" placeholder="Title" /></div>
    <input type="text" value="<?php echo stripslashes($_smarty_tpl->tpl_vars['get_topic']->value->name);?>
" name="topic_name" style="width: 450px;vertical-align: top" placeholder="Название темы" />
    <select style="width: 230px;vertical-align: bottom" name="topic_category_id">
        <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_template']->value).("tree_select.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tree'=>$_smarty_tpl->tpl_vars['menu_forum']->value,'id'=>"0",'inc'=>($_smarty_tpl->tpl_vars['base_template']->value).("tree_select.tpl"),'selected_id'=>$_smarty_tpl->tpl_vars['get_topic']->value->category_id), 0);?>

    </select>
    <div style="text-align: left; margin-top: 5px; margin-left: 612px;">
        <button class="save">Сохранить</button>
    </div>
</form><?php }} ?>
