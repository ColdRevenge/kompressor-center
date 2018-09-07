{if $is_mobile == 1}
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="{$https_url}auth/auth/">Назад</a></div>
        <h1>Регистрация</h1>
        <div class="clear">&nbsp;</div>
    </div>



    {include file=$template_message message=$message error=$error eclass="register_error"}
    {if !($message != "")}
        <form method="post" action="" id="form">
            <div id='register-block'>
                <div><input type="text" size="30" name="email" value="{$smarty.post.email}"  maxlength="255" placeholder="Ваш E-mail" /></div>
                <div><input type="password" size="30" id="password" name="password" value=""   maxlength="50" placeholder="Пароль"/></div>
                <div><input type="password" size="30" id="is_password" name="is_password"  value="" maxlength="50" placeholder="Подтверждение пароля" /></div>

                <button onclick="if (document.getElementById('password').value != document.getElementById('is_password').value) {ldelim}
                            alert('Пароль и подтверждение пароля не совподают');
                            return false{rdelim}"></button>
            </div>
            <label for="password"></label>
            <label for="is_password"></label>
            <label for="email"></label>

        </form>



    {else}
        <div style="margin: 10px 0;">
            <form method="post" action="/auth/auth/">
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
        </div>
    {/if}


















{else}

    <h1>Регистрация</h1>
    <script src="{$host_url}js/mi.js" type="text/javascript"></script>
    <script type="text/javascript">{literal}
                            jQuery(function ($) {
                                $("#phone_mask_register").mask("+7(999) 999-9999");
                            });{/literal}
    </script>
    {include file=$template_message message=$message error=$error eclass="register_error"}
    {if !($message != "")}
        <form method="post" action="" id="form">
            <table cellpadding="0" cellspacing="2" border="0" id="register" class="table_list">
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

                <tr>
                    <td valign="middle" align="right" style="text-align: right">Телефон <span class="asterix">*</span>:</td>
                    <td valign="middle" align="left"><input type="text" size="30" name="phone"  value="{$smarty.post.phone}" id="phone_mask_register"  style="width: 170px"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="50"/>
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

                <tr style="display: none">
                    <td valign="top" align="right" style="text-align: right;">Мой менеджер:</td>
                    <td valign="middle" align="left">
                        <select name="manager_id" style="width: 250px;">
                            <option value="0">Не выбран</option>
                            {foreach from=$managers item="manager"}
                                <option value="{$manager->id}" {if $smarty.post.manager_id == $manager->id}selected="selected"{/if}>{$manager->name|stripslashes}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>   
                <tr>
                    <td valign="middle" align="left" colspan="2">
                        <h2>Информация о доставке</h2></td>
                </tr>
                <tr>
                    <td valign="top" align="right" style="text-align: right">Город:</td>
                    <td valign="middle" align="left" style="text-align: left">
                        <input type="text" size="30" name="city_index" value="{$smarty.post.city_index}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 80px" placeholder="Индекс"/> 
                        <input type="text" size="30" name="city" value="{$smarty.post.city}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 227px" placeholder="Город"/> 

                    </td>
                </tr>   
                <tr>
                    <td valign="top" align="right" style="text-align: right;">Адрес:</td>
                    <td valign="middle" align="left">
                        <textarea style="width: 330px;height: 80px;" class="text" name="adress"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" placeholder="Адрес, по которому будет производиться доставка">{$smarty.post.adress}</textarea>
                    </td>
                </tr>    

                <tr>
                    <td valign="middle" align="right" style="text-align: right">Ближайшее метро:</td>
                    <td valign="middle" align="left">
                        <select class="text" name="metro_id" style="width: 317px;"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
                            <option value="">Выбрать</option>
                            {foreach from=$metro item="item"}
                                <option value="{$item->id}"{if $smarty.post.metro_id == $item->id} selected="selected"{/if}>{$item->name}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>


                <tr>
                    <td valign="middle" align="center" colspan="2"><div class="page-border" style="margin-top:5px;"></div></td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right">Код с картинки:</td>
                    <td valign="middle" align="left">
                        <img src="{$host_url}lib/captcha.php" alt="" onclick="this.src = '{$host_url}lib/captcha.php?x=2'" style="cursor: pointer; vertical-align: top;" title="Обновить картинку" />
                        <input type="text" class="text" name="captcha" maxlength="3" style="width: 50px;text-align: center; vertical-align: middle" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/>
                    </td>
                </tr> 
                <tr>
                    <td valign="middle" align="right" style="text-align: right"></td>
                    <td valign="middle" align="right" style="text-align: right"><button class="register_button" onclick="if (document.getElementById('password').value != document.getElementById('is_password').value) {ldelim}
                                alert('Пароль и подтверждение пароля не совподают');
                                return false{rdelim}"></button></td>
                </tr> 
            </table>          
        </form>
    {else}
        <form method="post" action="{$url}auth/auth/">
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
                            <a href="{$url}auth/recovery/?is_modal=1">Забыли пароль?</a> 
                            {*    / 
                            <a href="{$url}auth/recovery/?is_modal=1">Регистрация</a>*}
                        </div>
                        <input type="hidden" name="auth" value="1" />
                        <button class="auth_button"></button>
                    </td>
                </tr>
            </table>
        </form>
    {/if}

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
                        regexp: '^[ \tА-Яа-я\sA-Za-z`\'\"]+$'
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

{/if}