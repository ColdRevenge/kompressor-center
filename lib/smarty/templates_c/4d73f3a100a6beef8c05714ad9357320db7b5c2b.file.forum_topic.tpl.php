<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-08 15:24:13
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_topic.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136614535255dde6a1e0df22-21231309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d73f3a100a6beef8c05714ad9357320db7b5c2b' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_topic.tpl',
      1 => 1441715051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136614535255dde6a1e0df22-21231309',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55dde6a1e988c3_79045117',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55dde6a1e988c3_79045117')) {function content_55dde6a1e988c3_79045117($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['breadcrumbs']->value) {?>
    <div class="breadcrumbs-block">
        <ul>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
                <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumbs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["item"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumbs']['total'] = $_smarty_tpl->tpl_vars["item"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumbs']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumbs']['iteration']++;
?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id']!=0) {?><li><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['breadcrumbs']['iteration']==$_smarty_tpl->getVariable('smarty')->value['foreach']['breadcrumbs']['total']) {
echo stripslashes($_smarty_tpl->tpl_vars['get_category']->value->name);
} else { ?><a href="<?php if ($_smarty_tpl->tpl_vars['get_parent_category']->value->parent_id==1107) {?>/<?php } else {
echo $_smarty_tpl->tpl_vars['shop_url']->value;
echo $_smarty_tpl->tpl_vars['item']->value['pseudo_dir'];?>
/<?php }?>"><?php echo stripslashes($_smarty_tpl->tpl_vars['item']->value['name']);?>
</a><span>/</span><?php }?></li><?php }?>
                    <?php } ?>
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
            <div<?php if ($_smarty_tpl->tpl_vars['get_parent_category']->value->id==1104) {?> class="shop_topic"<?php }?>>
                <a href="/<?php echo $_smarty_tpl->tpl_vars['get_parent_category']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['get_parent_category']->value->name);?>
</a>

                <?php echo $_smarty_tpl->getSubTemplate ("forum_category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('menu_forum'=>$_smarty_tpl->tpl_vars['menu_forum']->value,'id'=>$_smarty_tpl->tpl_vars['open_category_id']->value), 0);?>

            </div>
        <?php }?>
    </div>
<?php }?>
<?php if (count($_smarty_tpl->tpl_vars['topics']->value)>0) {?>

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
                <?php  $_smarty_tpl->tpl_vars["topic"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["topic"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['topics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["topic"]->key => $_smarty_tpl->tpl_vars["topic"]->value) {
$_smarty_tpl->tpl_vars["topic"]->_loop = true;
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
                <?php } ?>
            </table>
        </div>
    <?php }?>
<?php }?>

<div id="add_form">
    <br/>
    <h2>Создать новую тему</h2>
    <?php echo $_smarty_tpl->getSubTemplate ("add_topic.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>



<?php }} ?>
