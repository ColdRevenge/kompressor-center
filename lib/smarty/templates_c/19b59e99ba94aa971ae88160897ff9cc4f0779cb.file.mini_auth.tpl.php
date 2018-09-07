<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-09-10 19:49:38
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/auth/templates/mini_auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188820973355d4694b7b2448-83674432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19b59e99ba94aa971ae88160897ff9cc4f0779cb' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/auth/templates/mini_auth.tpl',
      1 => 1441903756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188820973355d4694b7b2448-83674432',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d4694b7fdc29_44764380',
  'variables' => 
  array (
    'shop' => 0,
    'is_auth' => 0,
    'https_url' => 0,
    'url' => 0,
    'vk_links' => 0,
    'ya_links' => 0,
    'mail_links' => 0,
    'google_links' => 0,
    'odnoklassniki_links' => 0,
    'facebook_links' => 0,
    'count_new_message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d4694b7fdc29_44764380')) {function content_55d4694b7fdc29_44764380($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['shop']->value=='forum') {?>
    <?php if ($_smarty_tpl->tpl_vars['is_auth']->value==0) {?>
        <ul id="auth-link">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
auth/auth/?is_modal=1&back_url=<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo ltrim($_SERVER['REQUEST_URI'],"/");?>
" rel="auth">Войти</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
auth/register/forum/">Регистрация</a></li>
            <li>
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
            </li>
        </ul>
    <?php } else { ?>
        <ul id="auth-link">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
stat/profile/forum/">Мой профиль</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
my-post/">Мои публикации</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
forum/post/list/">Личные сообщения <?php if ($_smarty_tpl->tpl_vars['count_new_message']->value) {?><b style="color: yellow">(<?php echo $_smarty_tpl->tpl_vars['count_new_message']->value;?>
)</b><?php }?></a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
stat/password/">Сменить пароль</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
auth/exit/?back_url=<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo ltrim($_SERVER['REQUEST_URI'],"/");?>
">Выход</a></li>
        </ul>
    <?php }?>
<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['is_auth']->value==0) {?>
        <ul id="auth-link">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
auth/auth/?is_modal=1" rel="auth">Войти</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
auth/register/">Регистрация</a></li>
            <li>
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
            </li>
        </ul>
    <?php } else { ?>
        <ul id="auth-link">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
stat/delivery/post/">Отследить заказ (Почта России)</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
stat/orders/">Мои заказы</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
stat/profile/">Мой профиль</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
stat/password/">Сменить пароль</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
auth/exit/?back_url=<?php echo $_smarty_tpl->tpl_vars['url']->value;
echo ltrim($_SERVER['REQUEST_URI'],"/");?>
">Выход</a></li>
        </ul>
    <?php }?>
<?php }?><?php }} ?>
