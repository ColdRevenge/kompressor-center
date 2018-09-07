<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-19 15:13:37
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/call_back/templates/call_back.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21128350155d472f129f304-05496694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5a8c2c6b49c9b0be23b6ef75cdc4fd9ee5ecce8' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/call_back/templates/call_back.tpl',
      1 => 1433686907,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21128350155d472f129f304-05496694',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'error' => 0,
    'err_str' => 0,
    'err_name' => 0,
    'err_massage' => 0,
    'host_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d472f1323c47_56366227',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d472f1323c47_56366227')) {function content_55d472f1323c47_56366227($_smarty_tpl) {?><div id="question-box">
    <?php if (!$_smarty_tpl->tpl_vars['message']->value&&!$_smarty_tpl->tpl_vars['error']->value&&!$_smarty_tpl->tpl_vars['err_str']->value) {?>
        <?php if ($_GET['is_update']==1) {?>
            <h2>Помогите улучшить магазин!</h2>
            <form method="post" action="" id="call_back_form" class="senders">
                <p>Если у Вас есть предложения по улучшению магазина, или Вы заметили какую-нибудь неточность, ошибку или просто что-то не удобно, напишите нам, мы исправим.</p>
                <p style="padding-top: 7px;">В качестве благодарности, каждому, кто оставит предложение по улучшению магазина, мы сделаем дополнительную <b style="color: red;">скидку 3%</b> на любой товар</p>
            <?php } else { ?>
                <h2>Нам важно знать Ваше мнение!</h2>
                <form method="post" action="" id="call_back_form" class="senders">
                    <p>С помощью этой формы Вы можете оставить Ваше <b>предложение</b>, <b>жалобу</b>, <b>отзыв</b>, или <b>вопрос</b>. </p>
                    <p>Каждое обращение будет обработано <b>директором</b> магазина</p>
                <?php }?>
                <br/>
                <div><input type="text" value="<?php echo $_POST['name'];?>
" <?php if ($_smarty_tpl->tpl_vars['err_name']->value==1) {?> style="color: red; border-color: red;"<?php }?>  name="name" id="first_name_id" placeholder="Ваше имя" /></div>
                <div><input type="text" value="<?php echo $_POST['email'];?>
" name="email" id="mail_id" placeholder="Ваш e-mail"/></div>
                <div><input type="text" value="<?php echo $_POST['phone'];?>
" name="phone"  id="phone_id" placeholder="Ваш телефон"/></div>
                <div><textarea cols="10" rows="10" <?php if ($_smarty_tpl->tpl_vars['err_massage']->value==1) {?> style="color: red; border-color: red;"<?php }?> name="message" id="message_id" placeholder="<?php if ($_GET['is_update']==1) {?>Ваше предложение по улучшению магазина, найденные ошибки, и не точности :) <?php } else { ?>предложение, жалобу, отзыв, или вопрос<?php }?>"><?php echo $_POST['message'];?>
</textarea></div>
                <div style="text-align: right"><button onclick="AjaxFormRequest('question-box', 'call_back_form', '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
call_back/1/1/<?php if ($_GET['is_update']==1) {?>?is_update=1<?php }?>');
                        return false;" class="send">Отправить</button></div>
                <input type="hidden" name="call" value="1" />
            </form>
        <?php } elseif ($_smarty_tpl->tpl_vars['err_str']->value) {?>
            <h2 style="color: #ff1a9b; margin-top: 25px;cursor: pointer;" onclick="AjaxRequest('call_me', '<?php echo $_smarty_tpl->tpl_vars['host_url']->value;?>
call_back/mini/');"><?php echo $_smarty_tpl->tpl_vars['err_str']->value;?>
</h2>
        <?php } elseif ($_smarty_tpl->tpl_vars['message']->value||$_smarty_tpl->tpl_vars['err_str']->value) {?>
            <?php if ($_GET['is_update']==1) {?>
                <h2 style=" margin-top: 134px;margin-bottom: 23px;text-align: center">Ваше предложение успешно отправленно!</h2>
                <h3 style="text-align: center">В ближайшее время Ваше предложение будет обработано!!</h3>
            <?php } else { ?>
                <h2 style=" margin-top: 134px;margin-bottom: 23px;text-align: center">Ваше сообщение успешно отправленно!</h2>
                <h3 style="text-align: center">В ближайшее время Ваше обращение будет обработано!!</h3>
            <?php }?>
        <?php } elseif ($_smarty_tpl->tpl_vars['error']->value) {?>
            <h2 style="color: #ff1a9b; margin-top: 25px;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h2>
        <?php }?>
</div>
<?php }} ?>
