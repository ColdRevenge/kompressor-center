<?php /* Smarty version 3.1.24, created on 2015-09-13 16:40:42
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/auth/templates/auth.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14592936055f57cda883041_79575236%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9b5950d73755b6c55cc4b129d5ed378cb12b706' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/auth/templates/auth.tpl',
      1 => 1441904265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14592936055f57cda883041_79575236',
  'variables' => 
  array (
    'is_mobile' => 0,
    'is_auth' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'host_url' => 0,
    'vk_links' => 0,
    'ya_links' => 0,
    'mail_links' => 0,
    'google_links' => 0,
    'odnoklassniki_links' => 0,
    'facebook_links' => 0,
    'host' => 0,
    'shop' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55f57cda911cd3_91302484',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f57cda911cd3_91302484')) {
function content_55f57cda911cd3_91302484 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '14592936055f57cda883041_79575236';
if ($_smarty_tpl->tpl_vars['is_mobile']->value == 1) {?>
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="/">Назад</a></div>
        <h1>Авторизация</h1>
        <div class="clear">&nbsp;</div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['is_auth']->value == 0) {?>

        <div style="margin: 10px 0;">
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value,'is_stick'=>0,'eclass'=>"auth_error"), 0);
?>

            <form method="post" action="">
                <table cellpadding="0" cellspacing="2" border="0" style="margin:auto;" class="table_list">
                    <tr>
                        <td valign="middle" align="right" style="font-size: 14px;">E-mail:&nbsp; </td>
                        <td valign="middle" align="left"><input type="text" class="text" name="login" value="<?php echo $_POST['login'];?>
" maxlength="255" style="width: 180px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="font-size: 14px;">Пароль:&nbsp; </td>
                        <td valign="middle" align="left"><input type="password" class="text" name="password" maxlength="255" style="width: 180px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td valign="middle" align="right"style="text-align: right">
                            <div style="float: left; font-size: 12px;">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
auth/recovery/?is_modal=1">Забыли пароль?</a> 
                                <br/>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
auth/register/?is_modal=1">Регистрация</a>
                            </div>
                            <input type="hidden" name="auth" value="1" />
                            <button class="auth_button"></button>
                        </td>
                    </tr>
                </table>
            </form>
            <div  id="soc-auth">
                <span>Войти с помощью:</span>
                <ul class="soc">
                    <li class="vk"><a href="<?php echo $_smarty_tpl->tpl_vars['vk_links']->value;?>
" title="Вконтакте"><span>Вконтакте</span></a></li>
                    <li class="ya"><a href="<?php echo $_smarty_tpl->tpl_vars['ya_links']->value;?>
" title="Yandex"><span>Yandex</span></a></li>
                    <li class="mail-ru"><a href="<?php echo $_smarty_tpl->tpl_vars['mail_links']->value;?>
" title="Mail.ru"><span>Mail.ru</span></a></li> 
                    <li class="google"><a href="<?php echo $_smarty_tpl->tpl_vars['google_links']->value;?>
" title="Google"><span>Google</span></a></li>
                    <li class="oneclass"><a href="<?php echo $_smarty_tpl->tpl_vars['odnoklassniki_links']->value;?>
" title="Одноклассники"><span>Одноклассники</span></a></li>
                    <li class="fb"><a href="<?php echo $_smarty_tpl->tpl_vars['facebook_links']->value;?>
" title="Facebook"><span>Facebook</span></a></li>
                </ul>
            </div>
        </div>
    <?php } else { ?>
        <?php echo '<script'; ?>
 type="text/javascript">

            if ('<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
' == 'https://') {
                window.parent.location.href = '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
stat/profile/<?php if ($_smarty_tpl->tpl_vars['shop']->value == 'forum') {?>forum/<?php }?>';
                    }
                    else {
                        AjaxQueryParentFrame('stat', '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
auth/mini_auth/');
                    }
        <?php echo '</script'; ?>
>
        <div style="text-align: center;">
            <br/><br/>
            <h2 style="padding: 0; margin: 10px 0 12px 0; color: black; text-align: center">Вы успешно авторизированы!</h2>
            <ul id="profile-link">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">Вернуться на сайт</a></li>
                <li><a href="/stat/delivery/post/">Отследить заказ (Почта России)</a></li>
                <li><a href="/stat/orders/">Мои заказы</a></li>
                <li><a href="/stat/profile/">Мой профиль</a></li>
                <li><a href="/stat/password/">Сменить пароль</a></li>
                <li><a href="/auth/exit/?back_url=<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo ltrim($_SERVER['REQUEST_URI'],"/");?>
">Выход</a></li>
            </ul>
            
            <br/><br/>
        </div>
    <?php }?>


<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['is_auth']->value == 0) {?>
        <div>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value,'is_stick'=>0,'eclass'=>"auth_error"), 0);
?>

            <h1>Авторизация</h1>
            <form method="post" action="<?php if ($_GET['back_url']) {?>?back_url=<?php echo $_GET['back_url'];
if ($_GET['is_modal'] == 1) {?>&is_modal=1<?php }
}?>">
                <table cellpadding="0" cellspacing="2" border="0" style="margin:auto;" class="table_list">
                    <tr>
                        <td valign="middle" align="right" style="font-size: 14px;">E-mail: </td>
                        <td valign="middle" align="left"><input type="text" class="text" name="login" value="<?php echo $_POST['login'];?>
" maxlength="255" style="width: 180px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="font-size: 14px;">Пароль: </td>
                        <td valign="middle" align="left"><input type="password" class="text" name="password" maxlength="255" style="width: 180px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" colspan="2" style="text-align: right">
                            <div style="float: left; font-size: 12px;">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
auth/recovery/?is_modal=1">Забыли пароль?</a> 
                                
                            </div>
                            <input type="hidden" name="auth" value="1" />
                            <button class="auth_button"></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php } else { ?>
        <?php echo '<script'; ?>
 type="text/javascript">

            if ('<?php echo $_smarty_tpl->tpl_vars['host']->value;?>
' == 'https://') {
            <?php if ($_GET['back_url']) {?>
                window.parent.location.href = '<?php echo $_GET['back_url'];?>
';
            <?php } else { ?>
                window.parent.location.href = '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
stat/profile/<?php if ($_smarty_tpl->tpl_vars['shop']->value == 'forum') {?>forum/<?php }?>';
            <?php }?>
                    }
                    else {
                        AjaxQueryParentFrame('stat', '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
auth/mini_auth/');
                    }
        <?php echo '</script'; ?>
>
        <div style="text-align: center;">
            <br/><br/>
            <h2 style="padding: 0; margin: 10px 0 12px 0; color: black; text-align: center">Вы успешно авторизированы!</h2>
            
            <br/><br/>
        </div>
    <?php }?>
<?php }
}
}
?>