{*<div id="breadcrumbs">
<a href="{$url}">Главная</a>  &raquo; <a href="{$url}basket/">Корзина</a>  &raquo;  <span>Оформить заказ</span>
</div>*}
<script src="/js/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>

{*<script src="{$url}js/mi.js" type="text/javascript"></script>*}
{*<script type="text/javascript">{literal}
    jQuery(function ($) {
        //     $("#phone_mask").mask("+7(999) 999-9999");
    });{/literal}
</script>*}
{include file=$template_message message=$message error=$error}
{if $is_order_complete == 1}
    {include file="add_info.tpl"}
{else}
    {if $is_mobile != 1}<h1>Оформить заказ</h1>{/if}
    {$basket}  
    {include file="add_form.tpl"}

    {*При этом необходимо, чтоб поле e-mail стало обязательным, т.к менеджер должен будет выставит куда-то счёт. Плюс к этому для правильного документооборота нам понадобятся следующие обязательные поля: Название, ИНН, Юр.адрес, Банк, БИК, Р/с, КПП.*}
    <script type="text/javascript">{literal}
        jQuery(document).ready(function () {
            $('#form_order').bind('submit', function () {
                if ($('input[name="delivery_id"]:checked').val() === undefined) {
                    $('.delivery_icon img').css({'borderColor': '#ff9d7e'});
                    $('#error_delivery').fadeIn(700, function () {
                        $('.delivery_icon img').css({'borderColor': '#E6E6E6'});
                        $(this).fadeOut(1800);
                    });
                    return false;
                }
                else {
                    return true;
                }
            });
            $('#form_order').validate({
                rules: {
                    fio: {
                        required: true,
                        minlength: 3,
                        regexp: '^[ \tА-Яа-я\sA-Za-z`\'\"]+$'
                    },
                    //          login: {
                    //              required: true,
                    //              minlength: 4,
                    //              regexp: /^[a-zA-Z0-9-]+$/
                    //       },
                    phone: {
                        required: true,
                        minlength: 9
                    },
                    //           password: {
                    //             required: true,
                    //           minlength: 4,
                    //         regexp: /^[a-zA-Z0-9-]+$/
                    //   },
//                is_password: {
                    //                  required: true,
                    //                minlength: 4,
                    //              regexp: /^[a-zA-Z0-9-]+$/
                    //            },
//                email: {
                    //                  required: true,
                    //                minlength: 5,
                    //              regexp: /^([a-zа-я0-9_\-]+\.)*[a-zа-я0-9_\-]+@([a-zа-я0-9][a-zа-я0-9\-]*[a-z0-9]\.)+[а-яa-z]{2,4}$/i
                    //        }
                },
                messages: {
                    fio: {
                        required: 'Заполните поле ФИО',
                        minlength: 'Минимальная длина ФИО - 3 символа',
                        regexp: 'ФИО может состоять только из букв, пробелов'
                    },
                    phone: {
                        required: 'Заполните поле Телефон',
                        minlength: 'Минимальная длина Телефон - 9 символа'
                    }
//                email: {
                    //                  required: 'Заполните поле E-Mail',
                    //                minlength: 'Минимальная длина поля E-Mail - 5 символов',
                    //              regexp: 'E-mail введен не правильно'
                    //        },
//                login: {
                    //                  required: 'Заполните поле Логин',
                    //                minlength: 'Минимальная длина поля Логин - 4 символов',
                    //              regexp: 'Логин должен состоять из латинских букв и цифр'
                    //        },
//                password: {
                    //                  required: 'Заполните поле Пароль',
                    //                minlength: 'Минимальная длина поля Пароль - 4 символов',
                    //              regexp: 'Пароль должен состоять из латинских букв и цифр'
                    //        },
//                is_password: {
                    //                  required: 'Заполните поле "Подтвержение пароля"',
                    //                minlength: 'Минимальная длина поля "Подтвержение пароля" - 4 символов',
                    //              regexp: 'Поле "Подтвержение пароля" должен состоять из латинских букв и цифр'
                    //        }
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

        });{/literal}
    </script>
{/if}