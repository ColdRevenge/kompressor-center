<?php /* Smarty version 3.1.24, created on 2015-09-13 17:52:56
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/get_users.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:88246075855f58dc8220ee5_95839330%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1e5b56a10c4460f96c1c619ae7bcbb006c3ebb9' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/get_users.tpl',
      1 => 1441987927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88246075855f58dc8220ee5_95839330',
  'variables' => 
  array (
    'content' => 0,
    'get_users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f58dc82997c9_99791372',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f58dc82997c9_99791372')) {
function content_55f58dc82997c9_99791372 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '88246075855f58dc8220ee5_95839330';
if ($_smarty_tpl->tpl_vars['content']->value) {?>
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
        <?php
$_from = $_smarty_tpl->tpl_vars['get_users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars["user"] = new Smarty_Variable;
$_smarty_tpl->tpl_vars["user"]->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars["user"]->value) {
$_smarty_tpl->tpl_vars["user"]->_loop = true;
$foreach_user_Sav = $_smarty_tpl->tpl_vars["user"];
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
                    <td><?php if ($_smarty_tpl->tpl_vars['user']->value->birth_day > 0) {?>
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
                <?php
$_smarty_tpl->tpl_vars["user"] = $foreach_user_Sav;
}
?>
                </table>
                <?php }
}
}
?>