

{if !$message}
    {include file=$template_message message=$message error=$error}
    <form method="post" action="" id="call_back_form_2">
        <div class="h1" style="font-size: 20px">Обратный звонок</div>
        <div><input type="text" value="{$smarty.post.name}" {if $err_name == 1} style="color: red; border-color: red;"{/if}  name="name" id="first_name_id_2" placeholder="Ваше имя" /></div>
        <div><input type="text" value="{$smarty.post.phone}" {if $err_phone == 1} style="color: red; border-color: red;"{/if} name="phone"  id="phone_id_2" placeholder="Ваш телефон" /></div>
        <div><button onclick="AjaxFormRequest('question-box_2', 'call_back_form_2', '{$url}call_back/2/2/');
            return false;">Отправить</button></div>
        <input type="hidden" name="call" value="1" />
    </form>
{elseif $message || $err_str}
    <h3 style="text-align: center; padding-top: 30px;">В ближайшее время с Вами свяжется наш менеджер!</h3>
{elseif $error}
    <h2 style="color: #ff1a9b; margin-top: 25px;">{$error}</h2>
{/if}
