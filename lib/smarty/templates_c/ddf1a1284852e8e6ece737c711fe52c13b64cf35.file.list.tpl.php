<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 12:25:28
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/comments/templates/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28692814155d6ee884fcf54-49705190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddf1a1284852e8e6ece737c711fe52c13b64cf35' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/comments/templates/list.tpl',
      1 => 1423307966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28692814155d6ee884fcf54-49705190',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'start_date_form' => 0,
    'end_date_form' => 0,
    'comments' => 0,
    'url' => 0,
    'comment' => 0,
    'MyURL' => 0,
    'sys_images_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d6ee885a0c79_63222607',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d6ee885a0c79_63222607')) {function content_55d6ee885a0c79_63222607($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><div class="block">

    <?php echo $_smarty_tpl->getSubTemplate ("_menu_comment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <div class="comment">
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

            <h1>Модерирование комментариев</h1>
            <form method="post" action="">
                <div class="stat_date">с <?php echo $_smarty_tpl->tpl_vars['start_date_form']->value;?>
 до <?php echo $_smarty_tpl->tpl_vars['end_date_form']->value;?>
 <button name="send">Сформировать</button> </div>
            </form><br/>
            <div class="clear">&nbsp;</div>
            <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Товар: </td>
                        <td valign="middle" align="center">Имя: </td>
                        <td valign="middle" align="center">Комментарий</td>

                        <td valign="middle" align="center">Добавленно: </td>
                        <td valign="middle" align="center">* </td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </thead>

                <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="center"><a target="__blank" href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
products/<?php echo $_smarty_tpl->tpl_vars['comment']->value->pseudo_dir;?>
/"><?php echo stripslashes($_smarty_tpl->tpl_vars['comment']->value->product_name);?>
</a></td>
                            <td valign="middle" align="center" style="cursor: pointer" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
look/<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
/'"><b><?php echo stripslashes($_smarty_tpl->tpl_vars['comment']->value->name);?>
</b></td>
                            <td valign="middle" align="left" style="cursor: pointer" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
look/<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
/'"><?php echo smarty_modifier_truncate(nl2br(stripslashes($_smarty_tpl->tpl_vars['comment']->value->comment)),200);?>
</td>
                            <td valign="middle" align="center" style="cursor: pointer" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
look/<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
/'"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comment']->value->created,"%d:%m:%Y %H:%M");?>
</td>
                            <td valign="middle" align="center" style="cursor: pointer" onclick="location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
look/<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
/'">
                                <?php if ($_smarty_tpl->tpl_vars['comment']->value->is_active==0) {?><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
look/is_active/<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
/1/">Неактивный</a><?php } else { ?><a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
look/is_active/<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
/0/">Активный</a><?php }?>
                            </td>
                            <td valign="middle" align="center">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
look/<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
/"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                                <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить коммент??')) {
        location.href = '<?php echo $_smarty_tpl->tpl_vars['MyURL']->value;?>
list/<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
/';}"><img src="<?php echo $_smarty_tpl->tpl_vars['sys_images_url']->value;?>
admin/del.png" align="middle" hspace="1" alt="Удалить" /></a>
                            </td>
                        </tr>

                    </tbody>
                <?php } ?>

            </table>
        </div>
    </div>
</div><?php }} ?>
