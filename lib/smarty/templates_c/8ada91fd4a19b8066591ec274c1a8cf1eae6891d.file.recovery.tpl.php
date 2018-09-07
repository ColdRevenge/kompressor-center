<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-30 12:53:53
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/auth/templates/recovery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83171338855d595c6576373-13885057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ada91fd4a19b8066591ec274c1a8cf1eae6891d' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/auth/templates/recovery.tpl',
      1 => 1440761469,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83171338855d595c6576373-13885057',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d595c65e79c5_10465494',
  'variables' => 
  array (
    'is_mobile' => 0,
    'https_url' => 0,
    'message' => 0,
    'template_message' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d595c65e79c5_10465494')) {function content_55d595c65e79c5_10465494($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['is_mobile']->value==1) {?>
    <div id="breadcrumbs-block">
        <div id="bread-back"><a href="<?php echo $_smarty_tpl->tpl_vars['https_url']->value;?>
auth/auth/">Назад</a></div>
        <h1>Восстановление пароля</h1>
        <div class="clear">&nbsp;</div>
    </div>

    <div style="margin: 20px 10px 10px 10px;text-align: center">
        <?php if ($_smarty_tpl->tpl_vars['message']->value) {?>
            <div style="text-align: center">
                <h3 style="padding-bottom: 20px;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h2>
                    
            </div>
        <?php } else { ?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>


            <form method="post" action="" id="form"> 
                 <input type="text" class="text"  name="email" placeholder="Введите e-mail адрес" value="<?php echo $_POST['email'];?>
"  style="width:230px; vertical-align: top;"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/>
                <button class="send"></button>

                <div style=" padding-top: 5px;width: 180px;"><label for="email"></label></div>
            </form>
        </div>
    <?php }?>
<?php } else { ?>
    <div>
        <h1>Восстановление пароля</h1>
        <?php if ($_smarty_tpl->tpl_vars['message']->value) {?>
            <div style="text-align: center">
                <h3 style="padding-bottom: 20px;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h2>
                    
            </div>
        <?php } else { ?>
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>


            <form method="post" action="" id="form"> 
                E-mail: <input type="text" class="text"  name="email" value="<?php echo $_POST['email'];?>
"  style="width:230px; vertical-align: middle;"  onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"/>
                <div style="float: left; padding-top: 5px;width: 180px;"><label for="email"></label></div>
                <div style="text-align: right; padding-right: 20px;padding-top: 6px;">
                    <button class="send"></button>
                </div>
            </form>
        </div>
    <?php }?>

<?php }?>




<?php echo '<script'; ?>
 src="/js/jquery.validate.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    jQuery(document).ready(function () {
        $('#form').validate({
            rules: {
                email: {
                    required: true,
                    minlength: 5,
    regexp: /^([a-zа-я0-9_\-]+\.)*[a-zа-я0-9_\-]+@([a-zа-я0-9][a-zа-я0-9\-]*[a-z0-9]\.)+[а-яa-z]{2,4}$/i
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
<?php echo '</script'; ?>
><?php }} ?>
