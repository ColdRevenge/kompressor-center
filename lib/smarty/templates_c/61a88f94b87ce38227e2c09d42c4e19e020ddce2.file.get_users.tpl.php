<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-11 19:22:40
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/get_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53933190855e81785c6c064-99094332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61a88f94b87ce38227e2c09d42c4e19e020ddce2' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/get_users.tpl',
      1 => 1441987927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53933190855e81785c6c064-99094332',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e81785c91520_24036058',
  'variables' => 
  array (
    'content' => 0,
    'get_users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e81785c91520_24036058')) {function content_55e81785c91520_24036058($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['content']->value) {?>
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php } else { ?>
    <table border="3" style="margin-top: 0">
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>Имя</td>
                <td>Возраст</td>
                <td>Город</td>
                <td>Сообщений</td>
                <td>Поблагодарили</td>
            </tr>
        </tbody>
        <?php  $_smarty_tpl->tpl_vars["user"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["user"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['get_users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["user"]->key => $_smarty_tpl->tpl_vars["user"]->value) {
$_smarty_tpl->tpl_vars["user"]->_loop = true;
?>
            <tbody>
                <tr>
                    <td><a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/?is_modal=1" rel="set">
                            <?php if ($_smarty_tpl->tpl_vars['user']->value->icon) {?>
                                <img src="/images/forum/avatars/<?php echo $_smarty_tpl->tpl_vars['user']->value->icon;?>
" alt="" onerror="this.src='/images/forum/avatars/no-avatars.png'" style="width: 64px" />
                            <?php } else { ?>
                                <img src="/images/forum/avatars/no-avatars.png" alt=""  style="width: 64px"/>
                            <?php }?>
                        </a>
                    </td>
                    <td><a href="/forum/user/<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
/?is_modal=1" rel="set"><?php echo stripslashes($_smarty_tpl->tpl_vars['user']->value->forum_name);?>
</a></td>
                    <td><?php if ($_smarty_tpl->tpl_vars['user']->value->birth_day>0) {?>
                        <div>
                            <?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getCountYearTemplate(array('year'=>smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value->birth_day,"Y")),$_smarty_tpl);?>

                        </div>
                        <?php }?></td>
                        <td><?php echo stripslashes($_smarty_tpl->tpl_vars['user']->value->city);?>
</td>
                        <td><?php echo stripslashes($_smarty_tpl->tpl_vars['user']->value->count_message);?>
</td>
                        <td><?php echo stripslashes($_smarty_tpl->tpl_vars['user']->value->count_like);?>
</td>
                    </tr>
                </tbody>
                <?php } ?>
                </table>
                <?php }?><?php }} ?>
