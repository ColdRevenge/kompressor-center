{if $shop == 'forum'}
    {if $is_auth == 0}
        <ul id="auth-link">
            <li><a href="{$https_url}auth/auth/?is_modal=1&back_url={$url}{$smarty.server.REQUEST_URI|ltrim:"/"}" rel="auth">Войти</a></li>
            <li><a href="{$https_url}auth/register/forum/">Регистрация</a></li>
            <li>
                <span>Войти с помощью:</span>
                <ul class="soc">
                    <li class="vk"><a href="{$vk_links}" title="Вконтакте"><span>Вконтакте</span></a></li>
                    <li class="ya"><a href="{$ya_links}" title="Yandex"><span>Yandex</span></a></li>
                    <li class="mail-ru"><a href="{$mail_links}" title="Mail.ru"><span>Mail.ru</span></a></li> 
                    <li class="google"><a href="{$google_links}" title="Google"><span>Google</span></a></li>
                    <li class="oneclass"><a href="{$odnoklassniki_links}" title="Одноклассники"><span>Одноклассники</span></a></li>
                    <li class="fb"><a href="{$facebook_links}" title="Facebook"><span>Facebook</span></a></li>
                </ul>
            </li>
        </ul>
    {else}
        <ul id="auth-link">
            <li><a href="{$https_url}stat/profile/forum/">Мой профиль</a></li>
            <li><a href="{$https_url}my-post/">Мои публикации</a></li>
            <li><a href="{$https_url}forum/post/list/">Личные сообщения {if $count_new_message}<b style="color: yellow">({$count_new_message})</b>{/if}</a></li>
            <li><a href="{$https_url}stat/password/">Сменить пароль</a></li>
            <li><a href="{$https_url}auth/exit/?back_url={$url}{$smarty.server.REQUEST_URI|ltrim:"/"}">Выход</a></li>
        </ul>
    {/if}
{else}
    {if $is_auth == 0}
        <ul id="auth-link">
            <li><a href="{$https_url}auth/auth/?is_modal=1" rel="auth">Войти</a></li>
            <li><a href="{$https_url}auth/register/">Регистрация</a></li>
            <li>
                <span>Войти с помощью:</span>
                <ul class="soc">
                    <li class="vk"><a href="{$vk_links}" title="Вконтакте"><span>Вконтакте</span></a></li>
                    <li class="ya"><a href="{$ya_links}" title="Yandex"><span>Yandex</span></a></li>
                    <li class="mail-ru"><a href="{$mail_links}" title="Mail.ru"><span>Mail.ru</span></a></li> 
                    <li class="google"><a href="{$google_links}" title="Google"><span>Google</span></a></li>
                    <li class="oneclass"><a href="{$odnoklassniki_links}" title="Одноклассники"><span>Одноклассники</span></a></li>
                    <li class="fb"><a href="{$facebook_links}" title="Facebook"><span>Facebook</span></a></li>
                </ul>
            </li>
        </ul>
    {else}
        <ul id="auth-link">
            <li><a href="{$https_url}stat/delivery/post/">Отследить заказ (Почта России)</a></li>
            <li><a href="{$https_url}stat/orders/">Мои заказы</a></li>
            <li><a href="{$https_url}stat/profile/">Мой профиль</a></li>
            <li><a href="{$https_url}stat/password/">Сменить пароль</a></li>
            <li><a href="{$https_url}auth/exit/?back_url={$url}{$smarty.server.REQUEST_URI|ltrim:"/"}">Выход</a></li>
        </ul>
    {/if}
{/if}