<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-30 12:58:04
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/auth/templates/register_forum.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2852153755e1eadf27e106-52892151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2fa3cefee842a8d8a18c8a50752746122199c45' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/auth/templates/register_forum.tpl',
      1 => 1440928011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2852153755e1eadf27e106-52892151',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e1eadf30d041_97946701',
  'variables' => 
  array (
    'host_url' => 0,
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'uploaded_image' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e1eadf30d041_97946701')) {function content_55e1eadf30d041_97946701($_smarty_tpl) {?><h1>Регистрация</h1>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
js/mi.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    jQuery(function ($) {
        $("#phone_mask_register").mask("+7(999) 999-9999");
    });
<?php echo '</script'; ?>
>

    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value,'eclass'=>"register_error"), 0);?>

<form method="post" action="" id="form" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="2" border="0" id="register" class="table_list" style="width: 515px">
        <tr>
            <td valign="middle" align="right" style="text-align: right; width: 140px;">Ваше имя:</td>
            <td valign="middle" align="left"><input type="text" name="name" value="<?php echo $_POST['name'];?>
" maxlength="255" class="text"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"  style="width: 320px"/>
                <label for="fio"></label>

            </td>
        </tr>

        

        <tr>
            <td valign="middle" align="right" style="text-align: right">E-mail <span class="asterix">*</span>:</td>
            <td valign="middle" align="left"><input type="text" size="30" name="email" value="<?php echo $_POST['email'];?>
" class="text"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 320px"/>
                <label for="email"></label>
            </td>
        </tr>

        

        



        
        
        <tr>
            <td valign="middle" align="right" style="text-align: right">Пароль <span class="asterix">*</span>:</td>
            <td valign="middle" align="left"><input type="password" size="30" class="text" id="password" name="password"  style="width: 170px" value="<?php echo $_POST['password'];?>
"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"  maxlength="50"/>
                <br/><label for="password"></label></td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">Подтвержение&nbsp;пароля&nbsp;<span class="asterix">*</span>:</td>
            <td valign="middle" align="left"><input type="password" class="text" size="30" id="is_password" name="is_password"  style="width: 170px" value="<?php echo $_POST['is_password'];?>
"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="50"/>
                <br/><label for="is_password"></label></td>
        </tr> 

        <tr>
            <td valign="top" align="right" style="text-align: right">Город:</td>
            <td valign="middle" align="left" style="text-align: left">
                <input type="text" size="30" name="city" value="<?php echo $_POST['city'];?>
" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 227px" placeholder="Город"/> 

            </td>
        </tr>       


        <tr>
            <td valign="top" align="right" style="text-align: right">Аватарка:</td>
            <td valign="middle" align="left">
                <?php if ($_smarty_tpl->tpl_vars['uploaded_image']->value) {?>
                    <img src="/images/forum/avatars/<?php echo $_smarty_tpl->tpl_vars['uploaded_image']->value;?>
" alt="" style="max-width: 64px;" />
                    <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['uploaded_image']->value;?>
" name="uploaded_image" />
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['uploaded_image']->value) {?>Заменить: <?php }?><input type="file" name="icon" />

            </td>
        </tr>

        <tr>
            <td valign="top" align="right" style="text-align: right;">О себе:</td>
            <td valign="middle" align="left">
                <textarea style="width: 330px;height: 80px;" class="text" name="info"  placeholder="Информация о себе"><?php echo $_POST['info'];?>
</textarea>
            </td>
        </tr>    

        <tr>
            <td valign="middle" align="right" style="text-align: right">Код с картинки:</td>
            <td valign="middle" align="left">
                <img src="<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
lib/captcha.php" alt="" onclick="this.src = '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
lib/captcha.php?x=2'" style="cursor: pointer; vertical-align: top;" title="Обновить картинку" />
                <input type="text" class="text" name="captcha" maxlength="3" style="width: 50px;text-align: center; vertical-align: middle" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/>

                <div style="float: right">
                    <button class="register_button" onclick="if (document.getElementById('password').value != document.getElementById('is_password').value) {
                                alert('Пароль и подтверждение пароля не совподают');
                                return false}"></button>
                </div>
            </td>
        </tr> 
    </table>          
</form>



<?php echo '<script'; ?>
 type="text/javascript">
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
    regexp: /^([a-zа-я0-9_\-\s]+\.)*[ a-zа-я0-9_\-]+@([a-zа-я0-9][a-zа-я0-9\-]*[a-z0-9]\.)+[а-яa-z\s]{2,8}$/i
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
<?php echo '</script'; ?>
>
<?php }} ?>
