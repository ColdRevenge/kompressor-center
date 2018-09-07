
{if $is_ok == 1}
    <div id="send-message">Вы успешно подписаны на рассылку!</div>
{elseif $is_ok == 2}
    <div id="send-message">E-mail адрес {$smarty.post.email} уже подписан на рассылку</div>

{else}
    <div class="header-send">Подпишитесь на акции и рассылки!</div>
    <form method="post" action="" id="form_mailer">
        {*     <span{if $is_error == 3} style="color: red;"{/if}><input name="mail_news" type="checkbox"{if $smarty.post.mail_news == "on"} checked="checked"{/if} id="news_tinko"> <label for="news_tinko">Новости ООО "Тинко"</label></span>
        <span{if $is_error == 3} style="color: red;"{/if}><input name="mail_new_cat" type="checkbox"{if $smarty.post.mail_new_cat == "on"} checked="checked"{/if} id="news_catalog"> <label for="news_catalog">Новинки каталога</label></span>*}
        <input type="text" name="email" value="{$smarty.post.email}" placeholder="Ваш E-Mail"  {if $is_error == 1} style="color: red;border-color: red;"{/if} />
        <button onclick="AjaxFormQuery('sendind', 'form_mailer', '{$url}send/');
                return false;"></button>
    </form>
    <div class="clear">&nbsp;</div>
{/if}
