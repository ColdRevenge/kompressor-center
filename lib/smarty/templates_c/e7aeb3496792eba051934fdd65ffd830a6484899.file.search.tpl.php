<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-08 14:29:39
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85917761555eebfda952a63-55962609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7aeb3496792eba051934fdd65ffd830a6484899' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/search.tpl',
      1 => 1441711778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85917761555eebfda952a63-55962609',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55eebfda9ea391_63464668',
  'variables' => 
  array (
    'url' => 0,
    'topics' => 0,
    'host_url' => 0,
    'topic' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55eebfda9ea391_63464668')) {function content_55eebfda9ea391_63464668($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><div class="clear">&nbsp;</div>
<div class="breadcrumbs-block">
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Главная</a><span>/</span></li>
        <li>Поиск по форуму</li>
    </ul>
</div>

<h1>Поиск по форуму</h1>
<?php if (count($_smarty_tpl->tpl_vars['topics']->value)>0) {?>

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
 $_from = $_smarty_tpl->tpl_vars['topics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                            <div class="topic-date">
                                <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getDateTemplate(array('date'=>$_smarty_tpl->tpl_vars['topic']->value->change),$_smarty_tpl);?>
</div>
                            <div class="notice">от <?php echo htmlspecialchars(stripslashes($_smarty_tpl->tpl_vars['topic']->value->user_name));?>
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
<?php } else { ?>
    <h3>По запросу "<b><?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_GET['find']));?>
</b>" ни чего не найдено</h3>
<?php }?>
<?php }} ?>
