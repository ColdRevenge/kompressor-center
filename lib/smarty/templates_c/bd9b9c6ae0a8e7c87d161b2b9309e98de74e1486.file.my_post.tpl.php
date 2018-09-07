<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-11 18:09:14
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/my_post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98049027955e2ebccde32e0-24010684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd9b9c6ae0a8e7c87d161b2b9309e98de74e1486' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/my_post.tpl',
      1 => 1441984153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98049027955e2ebccde32e0-24010684',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e2ebccec4a77_75150819',
  'variables' => 
  array (
    'base_dir' => 0,
    'url' => 0,
    'get_answer' => 0,
    'host_url' => 0,
    'topic' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e2ebccec4a77_75150819')) {function content_55e2ebccec4a77_75150819($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><div id="stat-left-menu">

    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['base_dir']->value).("/modules/stat/templates/stat_menu.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
<div id="stat_content">
    <div class="breadcrumbs-block">

        <ul class="clearfix">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Женский форум Lalipop</a><span>/</span></li>
            <li>Мои публикации</li>
        </ul>
    </div>
    <h1>Мои публикации</h1>

    <?php if (count($_smarty_tpl->tpl_vars['get_answer']->value)>0) {?>
        <div id="topics">
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
 $_from = $_smarty_tpl->tpl_vars['get_answer']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["topic"]->key => $_smarty_tpl->tpl_vars["topic"]->value) {
$_smarty_tpl->tpl_vars["topic"]->_loop = true;
?>
                    <tbody onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;
echo $_smarty_tpl->tpl_vars['topic']->value->pseudo_dir;?>
/read/<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
/'">

                        <tr>
                            <td>
                                <div class="topic-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['topic']->value->created,"d.m.Y H:m:s");?>
</div>
                                <div class="topic-name"><a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;
echo $_smarty_tpl->tpl_vars['topic']->value->pseudo_dir;?>
/read/<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
/"><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['topic']->value->name));?>
</a></div>
                                <div class="notice"><?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['topic']->value->user_name));?>
</div>
                            </td>
                            <td style="text-align: right">
                                <div class="topic-date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['topic']->value->change,"d.m.Y H:m:s");?>
</div>
                                <div class="notice"><?php if ($_smarty_tpl->tpl_vars['topic']->value->user_name) {?>от <?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['topic']->value->user_name));
}?></div>
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
</div><?php }} ?>
