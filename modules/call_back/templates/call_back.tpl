<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?onload=recaptchaCallBack&render=explicit&hl=ru"></script>
<script>
var recaptchaCallBack = function() {
    grecaptcha.render('recaptcha', {
          'sitekey' : '6LcA2CAUAAAAAG6FhUBTTvXjizMWvFFDi6p1PqUX',
          'theme' : 'light'
        });
}
function AjaxQueryScriptWrapper() {
    recaptchaCallBack();
}
</script>
<div id="question-box">
    {if !$message && !$error && !$err_str}
        {if $smarty.get.is_update == 1}
            <h2>Помогите улучшить магазин!</h2>
            <form method="post" action="javascript:;" id="call_back_form" class="senders">
                <p>Если у Вас есть предложения по улучшению магазина, или Вы заметили какую-нибудь неточность, ошибку или просто что-то не удобно, напишите нам, мы исправим.</p>
                <p style="padding-top: 7px;">В качестве благодарности, каждому, кто оставит предложение по улучшению магазина, мы сделаем дополнительную <b style="color: red;">скидку 3%</b> на любой товар</p>
            {else}
                <h2>Нам важно знать Ваше мнение!</h2>
                <form method="post" action="javascript:;" id="call_back_form" class="senders">
                    <p>С помощью этой формы Вы можете оставить Ваше <b>предложение</b>, <b>жалобу</b>, <b>отзыв</b>, или <b>вопрос</b>. </p>
                    <p>Каждое обращение будет обработано <b>директором</b> магазина</p>
                {/if}
                <br/>
                <div><input type="text" value="{$smarty.post.name}" {if $err_name == 1} style="color: red; border-color: red;"{/if}  name="name" id="first_name_id" placeholder="Ваше имя" /></div>
                <div><input type="text" value="{$smarty.post.email}" name="email" id="mail_id" placeholder="Ваш e-mail"/></div>
                <div><input type="text" value="{$smarty.post.phone}" name="phone"  id="phone_id" placeholder="Ваш телефон"/></div>
                <div><textarea cols="10" rows="10" {if $err_massage == 1} style="color: red; border-color: red;"{/if} name="message" id="message_id" placeholder="{if $smarty.get.is_update == 1}Ваше предложение по улучшению магазина, найденные ошибки, и не точности :) {else}предложение, жалобу, отзыв, или вопрос{/if}">{$smarty.post.message}</textarea></div>
                <div style="position: relative">
                    <div class="g-recaptcha" id="recaptcha" data-sitekey="6LcA2CAUAAAAAG6FhUBTTvXjizMWvFFDi6p1PqUX"></div>
                    {if $err_massage == 2} <div style="color: red; font-size: 12px; position: absolute; bottom : -22px; left: 0;">Рекаптча решена неверно</div>{/if}
                </div>
                <div style="text-align: right"><button onclick="AjaxFormRequest('question-box', 'call_back_form', '{$host_url}call_back/1/1/{if $smarty.get.is_update == 1}?is_update=1{/if}');
                        return false;" class="send">Отправить</button></div>
                <input type="hidden" name="call" value="1" />
            </form>
        {elseif $err_str}
            <h2 style="color: #ff1a9b; margin-top: 25px;cursor: pointer;" onclick="AjaxRequest('call_me', '{$host_url}call_back/mini/');">{$err_str}</h2>
        {elseif $message || $err_str}
            {if $smarty.get.is_update == 1}
                <h2 style=" margin-top: 134px;margin-bottom: 23px;text-align: center">Ваше предложение успешно отправленно!</h2>
                <h3 style="text-align: center">В ближайшее время Ваше предложение будет обработано!!</h3>
            {else}
                <h2 style=" margin-top: 134px;margin-bottom: 23px;text-align: center">Ваше сообщение успешно отправленно!</h2>
                <h3 style="text-align: center">В ближайшее время Ваше обращение будет обработано!!</h3>
            {/if}
        {elseif $error}
            <h2 style="color: red; margin-top: 25px;">{$error}</h2>
        {/if}
</div>
