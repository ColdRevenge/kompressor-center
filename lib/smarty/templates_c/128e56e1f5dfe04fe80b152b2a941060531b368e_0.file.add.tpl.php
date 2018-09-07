<?php /* Smarty version 3.1.24, created on 2018-07-02 10:45:17
         compiled from "/var/www/user-kc/data/www/www.kompressor-center.com/modules/order/templates/add.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:175376565b39d80df3c037_32806061%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '128e56e1f5dfe04fe80b152b2a941060531b368e' => 
    array (
      0 => '/var/www/user-kc/data/www/www.kompressor-center.com/modules/order/templates/add.tpl',
      1 => 1530509482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175376565b39d80df3c037_32806061',
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'is_order_complete' => 0,
    'is_mobile' => 0,
    'basket' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5b39d80e1f5646_00060076',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5b39d80e1f5646_00060076')) {
function content_5b39d80e1f5646_00060076 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '175376565b39d80df3c037_32806061';
?>

<?php echo '<script'; ?>
 src="/js/jquery.validate.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>



<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);
?>

<?php if ($_smarty_tpl->tpl_vars['is_order_complete']->value == 1) {?>
    <?php echo $_smarty_tpl->getSubTemplate ("add_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['is_mobile']->value != 1) {?><h1>Оформить заказ</h1><?php }?>
    <?php echo $_smarty_tpl->tpl_vars['basket']->value;?>
  
    <?php echo $_smarty_tpl->getSubTemplate ("add_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    
    <?php echo '<script'; ?>
 type="text/javascript">
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

        });
    <?php echo '</script'; ?>
>
<?php }
}
}
?>