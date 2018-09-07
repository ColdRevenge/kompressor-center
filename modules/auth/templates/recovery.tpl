{if $is_mobile == 1}
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="{$https_url}auth/auth/">Назад</a></div>
        <h1>Восстановление пароля</h1>
        <div class="clear">&nbsp;</div>
    </div>

    <div style="margin: 20px 10px 10px 10px;text-align: center">
        {if $message}
            <div style="text-align: center">
                <h3 style="padding-bottom: 20px;">{$message}</h2>
                    {*                <button class="close" onclick="parent.$.fancybox.close();"></button>*}
            </div>
        {else}
            {include file=$template_message message=$message error=$error}

            <form method="post" action="" id="form"> 
                 <input type="text" class="text"  name="email" placeholder="Введите e-mail адрес" value="{$smarty.post.email}"  style="width:230px; vertical-align: top;"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/>
                <button class="send"></button>

                <div style=" padding-top: 5px;width: 180px;"><label for="email"></label></div>
            </form>
        </div>
    {/if}
{else}
    <div>
        <h1>Восстановление пароля</h1>
        {if $message}
            <div style="text-align: center">
                <h3 style="padding-bottom: 20px;">{$message}</h2>
                    {*                <button class="close" onclick="parent.$.fancybox.close();"></button>*}
            </div>
        {else}
            {include file=$template_message message=$message error=$error}

            <form method="post" action="" id="form"> 
                E-mail: <input type="text" class="text"  name="email" value="{$smarty.post.email}"  style="width:230px; vertical-align: middle;"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/>
                <div style="float: left; padding-top: 5px;width: 180px;"><label for="email"></label></div>
                <div style="text-align: right; padding-right: 20px;padding-top: 6px;">
                    <button class="send"></button>
                </div>
            </form>
        </div>
    {/if}

{/if}




<script src="/js/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('#form').validate({
            rules: {
                email: {
                    required: true,
                    minlength: 5,
    {literal}regexp: /^([a-zа-я0-9_\-]+\.)*[a-zа-я0-9_\-]+@([a-zа-я0-9][a-zа-я0-9\-]*[a-z0-9]\.)+[а-яa-z]{2,4}$/i{/literal}
                    }
                },
                messages: {
                    email: {
                        required: 'Заполните поле E-Mail',
                        minlength: 'Минимальная длина поля E-Mail - 5 символов',
                        regexp: 'E-mail введен не правильно'
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