<?php /* Smarty version 3.1.24, created on 2015-09-13 16:53:02
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_user.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:137359637455f57fbe895a20_36672140%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17e1f027fd70ccafde109e131ea8a03dc87b2968' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_user.tpl',
      1 => 1441987987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137359637455f57fbe895a20_36672140',
  'variables' => 
  array (
    'get_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57fbe999555_36295136',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57fbe999555_36295136')) {
function content_55f57fbe999555_36295136 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '137359637455f57fbe895a20_36672140';
if ($_smarty_tpl->tpl_vars['get_user']->value->id) {?>
    <h1><?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_user']->value->forum_name));?>
</h1>
    <table class="table-user-info">
        <tbody>
            <tr>
                <td class="user-img">
                    <div>
                        <?php if ($_smarty_tpl->tpl_vars['get_user']->value->icon) {?>
                            <img src="/images/forum/avatars/<?php echo $_smarty_tpl->tpl_vars['get_user']->value->icon;?>
" alt=""  onerror="this.src='/images/forum/avatars/no-avatars.png'" />
                        <?php } else { ?>
                            <img src="/images/forum/avatars/no-avatars.png" alt="" />
                        <?php }?>
                    </div>
                </td>
                <td class="user-info">
                    <?php if ($_smarty_tpl->tpl_vars['get_user']->value->birth_day > 0) {?>
                        <div>
                            Возраст: <b><?php echo $_smarty_tpl->smarty->registered_objects['forum_obj'][0]->getCountYearTemplate(array('year'=>smarty_modifier_date_format($_smarty_tpl->tpl_vars['get_user']->value->birth_day,"Y")),$_smarty_tpl);?>
</b>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['get_user']->value->city) {?>
                        <div>
                            Город: <b><?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_user']->value->city));?>
</b>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['get_user']->value->email && $_smarty_tpl->tpl_vars['get_user']->value->forum_is_email == 1) {?>
                        <div>
                            E-mail: <a href="mailto:<?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_user']->value->email));?>
"><?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_user']->value->email));?>
</a>
                        </div>
                    <?php }?>
                    <div>
                        Зарегистрирована: <b><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['get_user']->value->created,"d.m.Y H:i");?>
</b>
                    </div>
                    <div>
                        Сообщений: <b><?php echo (($tmp = @$_smarty_tpl->tpl_vars['get_user']->value->count_message)===null||$tmp==='' ? 0 : $tmp);?>
</b>
                    </div>
                    <div>
                        Поблагодарили: <b><?php echo (($tmp = @$_smarty_tpl->tpl_vars['get_user']->value->count_like)===null||$tmp==='' ? 0 : $tmp);?>
</b>
                    </div>
                    <div>
                        <?php echo preg_replace('!<[^>]*?>!', ' ', stripslashes($_smarty_tpl->tpl_vars['get_user']->value->info));?>

                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="user-message" id="message_result">
                    <?php echo $_smarty_tpl->getSubTemplate ("message_add.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                </td>
            </tr>
        </tbody>
    </table>

<?php }
}
}
?>