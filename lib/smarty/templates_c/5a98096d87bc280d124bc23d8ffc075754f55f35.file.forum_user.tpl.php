<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-11 19:13:09
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:187553896255e866aa7c7cb5-54194779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a98096d87bc280d124bc23d8ffc075754f55f35' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/forum/templates/forum_user.tpl',
      1 => 1441987987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187553896255e866aa7c7cb5-54194779',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e866aa7c8743_99208721',
  'variables' => 
  array (
    'get_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e866aa7c8743_99208721')) {function content_55e866aa7c8743_99208721($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/lalipop/domains/lalipop.ru/public_html/lib/smarty/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['get_user']->value->id) {?>
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
                    <?php if ($_smarty_tpl->tpl_vars['get_user']->value->birth_day>0) {?>
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
                    <?php if ($_smarty_tpl->tpl_vars['get_user']->value->email&&$_smarty_tpl->tpl_vars['get_user']->value->forum_is_email==1) {?>
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
                    <?php echo $_smarty_tpl->getSubTemplate ("message_add.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </td>
            </tr>
        </tbody>
    </table>

<?php }?><?php }} ?>
