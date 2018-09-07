<h1>Регистрация</h1>
<script src="{$host_url}js/mi.js" type="text/javascript"></script>
<script type="text/javascript">{literal}
    jQuery(function ($) {
        $("#phone_mask_register").mask("+7(999) 999-9999");
    });{/literal}
</script>

    {include file=$template_message message=$message error=$error eclass="register_error"}
<form method="post" action="" id="form" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="2" border="0" id="register" class="table_list" style="width: 515px">
        <tr>
            <td valign="middle" align="right" style="text-align: right; width: 140px;">Ваше имя:</td>
            <td valign="middle" align="left"><input type="text" name="name" value="{$smarty.post.name}" maxlength="255" class="text"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"  style="width: 320px"/>
                <label for="fio"></label>

            </td>
        </tr>

        {*
        <tr>
        <td valign="middle" align="right" style="text-align: right">Номер договора:</td>
        <td valign="middle" align="left"><input type="text" size="30" name="param_str_1" value="{$smarty.post.param_str_1}" class="text"   onfocus="this.className='selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 350px"/>
        <label for="email"></label>
        </td>
        </tr>*}

        <tr>
            <td valign="middle" align="right" style="text-align: right">E-mail <span class="asterix">*</span>:</td>
            <td valign="middle" align="left"><input type="text" size="30" name="email" value="{$smarty.post.email}" class="text"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 320px"/>
                <label for="email"></label>
            </td>
        </tr>

        {*       <tr>
        <td valign="middle" align="left"></td>
        <td valign="middle" align="left" colspan="2" style="font-size: 12px;"><input type="checkbox" value="1" {if $smarty.post.is_mailer == 1}checked="checked"{/if} name="is_mailer" id="is_mailer" style="vertical-align: middle" />
        <label for="is_mailer" style="color: gray">Получать информацию событиях на сайте</label>

        </td>
        </tr>*}

        {*<tr>
        <td valign="middle" align="center" colspan="2"><div class="page-border" style="margin-top: 9px;"></div></td>
        </tr>
        <tr>
        <td valign="middle" align="right" style="text-align: right">ICQ:</td>
        <td valign="middle" align="left"><input type="text" class="text" name="icq" value="{$smarty.post.icq}"  style="width: 170px"  onfocus="this.className='selInput'" onblur = "this.className = 'text'"  maxlength="11"/></td>
        </tr>
        <tr>
        <td valign="middle" align="right" style="text-align: right">Skype:</td>
        <td valign="middle" align="left"><input type="text" class="text" name="skype" value="{$smarty.post.skype}"  style="width: 170px"  onfocus="this.className='selInput'" onblur = "this.className = 'text'"  maxlength="255"/></td>
        </tr>
        <tr>
        <td valign="middle" align="right" style="text-align: right">Сайт:</td>
        <td valign="middle" align="left"><input type="text" class="text" name="site" value="{$smarty.post.site}"  style="width: 170px"  onfocus="this.className='selInput'" onblur = "this.className = 'text'"  maxlength="255"/>

        </td>
        </tr>
        <tr>
        <td valign="middle" align="right" style="text-align: right">Город:</td>
        <td valign="middle" align="left"><input type="text" class="text" name="adress" value="{$smarty.post.adress}"  style="width: 170px"  onfocus="this.className='selInput'" onblur = "this.className = 'text'"  maxlength="255"/>

        </td>
        </tr>*}



        {*
        <tr>
        <td valign="middle" align="center" colspan="2"><div class="page-border" style="margin-top: 9px;"></div></td>
        </tr>*}
        {*            <tr>
        <td valign="middle" align="right" style="text-align: right">Логин <span class="asterix">*</span>:</td>
        <td valign="middle" align="left"><input type="text" size="30" name="login" value="{$smarty.post.login}" class="text"  style="width: 170px"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="30"/>
        <br/><label for="login"></label>
        </td>
        </tr>*}
        <tr>
            <td valign="middle" align="right" style="text-align: right">Пароль <span class="asterix">*</span>:</td>
            <td valign="middle" align="left"><input type="password" size="30" class="text" id="password" name="password"  style="width: 170px" value="{$smarty.post.password}"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"  maxlength="50"/>
                <br/><label for="password"></label></td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">Подтвержение&nbsp;пароля&nbsp;<span class="asterix">*</span>:</td>
            <td valign="middle" align="left"><input type="password" class="text" size="30" id="is_password" name="is_password"  style="width: 170px" value="{$smarty.post.is_password}"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="50"/>
                <br/><label for="is_password"></label></td>
        </tr> 

        <tr>
            <td valign="top" align="right" style="text-align: right">Город:</td>
            <td valign="middle" align="left" style="text-align: left">
                <input type="text" size="30" name="city" value="{$smarty.post.city}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 227px" placeholder="Город"/> 

            </td>
        </tr>       


        <tr>
            <td valign="top" align="right" style="text-align: right">Аватарка:</td>
            <td valign="middle" align="left">
                {if $uploaded_image}
                    <img src="/images/forum/avatars/{$uploaded_image}" alt="" style="max-width: 64px;" />
                    <input type="hidden" value="{$uploaded_image}" name="uploaded_image" />
                {/if}
                {if $uploaded_image}Заменить: {/if}<input type="file" name="icon" />

            </td>
        </tr>

        <tr>
            <td valign="top" align="right" style="text-align: right;">О себе:</td>
            <td valign="middle" align="left">
                <textarea style="width: 330px;height: 80px;" class="text" name="info"  placeholder="Информация о себе">{$smarty.post.info}</textarea>
            </td>
        </tr>    

        <tr>
            <td valign="middle" align="right" style="text-align: right">Код с картинки:</td>
            <td valign="middle" align="left">
                <img src="{$host_url}lib/captcha.php" alt="" onclick="this.src = '{$host_url}lib/captcha.php?x=2'" style="cursor: pointer; vertical-align: top;" title="Обновить картинку" />
                <input type="text" class="text" name="captcha" maxlength="3" style="width: 50px;text-align: center; vertical-align: middle" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/>

                <div style="float: right">
                    <button class="register_button" onclick="if (document.getElementById('password').value != document.getElementById('is_password').value) {ldelim}
                                alert('Пароль и подтверждение пароля не совподают');
                                return false{rdelim}"></button>
                </div>
            </td>
        </tr> 
    </table>          
</form>


{*   login: {
required: true,
minlength: 4,
regexp: /^[a-zA-Z0-9-]+$/
},*}
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('#form').validate({
            rules: {
                fio: {
                    required: true,
                    minlength: 3,
                    regexp: '^[ \tА-Яа-яёЁ\sA-Za-z`\'\"]+$'
                },
                password: {
                    required: true,
                    minlength: 4,
                    regexp: /^[a-zA-Z0-9-]+$/
                },
                is_password: {
                    required: true,
                    minlength: 4,
                    regexp: /^[a-zA-Z0-9-]+$/
                },
                email: {
                    required: true,
                    minlength: 5,
    {literal}regexp: /^([a-zа-я0-9_\-\s]+\.)*[ a-zа-я0-9_\-]+@([a-zа-я0-9][a-zа-я0-9\-]*[a-z0-9]\.)+[а-яa-z\s]{2,8}$/i{/literal}
                    }
                },
                messages: {
                    fio: {
                        required: 'Заполните поле ФИО',
                        minlength: 'Минимальная длина ФИО - 3 символа',
                        regexp: 'ФИО может состоять только из букв, пробелов'
                    },
                    email: {
                        required: 'Заполните поле E-Mail',
                        minlength: 'Минимальная длина поля E-Mail - 5 символов',
                        regexp: 'E-mail введен не правильно'
                    },
                    password: {
                        required: 'Заполните поле Пароль',
                        minlength: 'Минимальная длина поля Пароль - 4 символа',
                        regexp: 'Пароль должен состоять из латинских букв и цифр'
                    },
                    is_password: {
                        required: 'Заполните поле "Подтвержение пароля"',
                        minlength: 'Минимальная длина поля  - 4 символа',
                        regexp: 'Поле  должен состоять из латинских букв и цифр'
                    }
                },
                errorPlacement: function (error, element) {
                    var er = element.attr("name");
                    error.appendTo(
                            element.parent()
                            .find("label[for=" + er + "]")
                            );
                }


            });
            jQuery.validator.addMethod(
                    'regexp',
                    function (value, element, regexp) {
                        var re = new RegExp(regexp);
                        return this.optional(element) || re.test(value);
                    },
                    "Please check your input."
                    );

        });
</script>
