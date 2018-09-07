{if $is_mobile == 1}
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="/">Назад</a></div>
        <h1>Авторизация</h1>
        <div class="clear">&nbsp;</div>
    </div>
    {if $is_auth == 0}

        <div style="margin: 10px 0;">
            {include file=$template_message message=$message error=$error is_stick=0 eclass="auth_error"}
            <form method="post" action="">
                <table cellpadding="0" cellspacing="2" border="0" style="margin:auto;" class="table_list">
                    <tr>
                        <td valign="middle" align="right" style="font-size: 14px;">E-mail:&nbsp; </td>
                        <td valign="middle" align="left"><input type="text" class="text" name="login" value="{$smarty.post.login}" maxlength="255" style="width: 180px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="font-size: 14px;">Пароль:&nbsp; </td>
                        <td valign="middle" align="left"><input type="password" class="text" name="password" maxlength="255" style="width: 180px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td valign="middle" align="right"style="text-align: right">
                            <div style="float: left; font-size: 12px;">
                                <a href="{$host_url}auth/recovery/?is_modal=1">Забыли пароль?</a> 
                                <br/>
                                <a href="{$host_url}auth/register/?is_modal=1">Регистрация</a>
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
                    <li class="vk"><a href="{$vk_links}" title="Вконтакте"><span>Вконтакте</span></a></li>
                    <li class="ya"><a href="{$ya_links}" title="Yandex"><span>Yandex</span></a></li>
                    <li class="mail-ru"><a href="{$mail_links}" title="Mail.ru"><span>Mail.ru</span></a></li> 
                    <li class="google"><a href="{$google_links}" title="Google"><span>Google</span></a></li>
                    <li class="oneclass"><a href="{$odnoklassniki_links}" title="Одноклассники"><span>Одноклассники</span></a></li>
                    <li class="fb"><a href="{$facebook_links}" title="Facebook"><span>Facebook</span></a></li>
                </ul>
            </div>
        </div>
    {else}
        <script type="text/javascript">

            if ('{$host}' == 'https://') {
                window.parent.location.href = '{$host_url}stat/profile/{if $shop == 'forum'}forum/{/if}';
                    }
                    else {
                        AjaxQueryParentFrame('stat', '{$host_url}auth/mini_auth/');
                    }
        </script>
        <div style="text-align: center;">
            <br/><br/>
            <h2 style="padding: 0; margin: 10px 0 12px 0; color: black; text-align: center">Вы успешно авторизированы!</h2>
            <ul id="profile-link">
                <li><a href="{$url}">Вернуться на сайт</a></li>
                <li><a href="/stat/delivery/post/">Отследить заказ (Почта России)</a></li>
                <li><a href="/stat/orders/">Мои заказы</a></li>
                <li><a href="/stat/profile/">Мой профиль</a></li>
                <li><a href="/stat/password/">Сменить пароль</a></li>
                <li><a href="/auth/exit/?back_url={$url}{$smarty.server.REQUEST_URI|ltrim:"/"}">Выход</a></li>
            </ul>
            {*        <button class="close" onclick="parent.$.fancybox.close();"></button>*}
            <br/><br/>
        </div>
    {/if}


{else}
    {if $is_auth == 0}
        <div>
            {include file=$template_message message=$message error=$error is_stick=0 eclass="auth_error"}
            <h1>Авторизация</h1>
            <form method="post" action="{if $smarty.get.back_url}?back_url={$smarty.get.back_url}{if $smarty.get.is_modal == 1}&is_modal=1{/if}{/if}">
                <table cellpadding="0" cellspacing="2" border="0" style="margin:auto;" class="table_list">
                    <tr>
                        <td valign="middle" align="right" style="font-size: 14px;">E-mail: </td>
                        <td valign="middle" align="left"><input type="text" class="text" name="login" value="{$smarty.post.login}" maxlength="255" style="width: 180px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="font-size: 14px;">Пароль: </td>
                        <td valign="middle" align="left"><input type="password" class="text" name="password" maxlength="255" style="width: 180px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" colspan="2" style="text-align: right">
                            <div style="float: left; font-size: 12px;">
                                <a href="{$host_url}auth/recovery/?is_modal=1">Забыли пароль?</a> 
                                {*    / 
                                <a href="{$url}auth/recovery/?is_modal=1">Регистрация</a>*}
                            </div>
                            <input type="hidden" name="auth" value="1" />
                            <button class="auth_button"></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    {else}
        <script type="text/javascript">

            if ('{$host}' == 'https://') {
            {if $smarty.get.back_url}
                window.parent.location.href = '{$smarty.get.back_url}';
            {else}
                window.parent.location.href = '{$host_url}stat/profile/{if $shop == 'forum'}forum/{/if}';
            {/if}
                    }
                    else {
                        AjaxQueryParentFrame('stat', '{$host_url}auth/mini_auth/');
                    }
        </script>
        <div style="text-align: center;">
            <br/><br/>
            <h2 style="padding: 0; margin: 10px 0 12px 0; color: black; text-align: center">Вы успешно авторизированы!</h2>
            {*        <button class="close" onclick="parent.$.fancybox.close();"></button>*}
            <br/><br/>
        </div>
    {/if}
{/if}