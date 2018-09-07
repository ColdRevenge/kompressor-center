<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-21 18:47:02
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/setting/templates/sms.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18908068155d747f63a78a4-00039431%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e83019b54ef61d502e3c20c58052d516b62b6e13' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/setting/templates/sms.tpl',
      1 => 1439728124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18908068155d747f63a78a4-00039431',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'template_message' => 0,
    'message' => 0,
    'error' => 0,
    'status' => 0,
    'item' => 0,
    'status_id' => 0,
    'get_sms' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d747f64bdc38_55393847',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d747f64bdc38_55393847')) {function content_55d747f64bdc38_55393847($_smarty_tpl) {?><?php echo '<script'; ?>
 type="text/javascript">
    function countChars(obj) {
        if ($(obj).val().search(/[А-яЁё]/) !== -1) {
            max_limit = 70;
        }
        else {
            max_limit = 160;
        }
        if ((max_limit - $(obj).val().length) < 0) {
            count_sms = Math.ceil($(obj).val().length / max_limit);
        }
        else {
            count_sms = 1;
        }
        limit = count_sms * max_limit - $(obj).val().length


        $(obj).parent().parent().find('.count_sms').html('Количество СМС: <b>' + count_sms + '</b><br/>Осталось символов: <b>' + limit + '</b>')
    }

    $(document).ready(function () {
        $('#sms_status_form textarea').each(function () {
            countChars($(this));
            $(this).change(function () {
                countChars($(this));
            });
            $(this).keyup(function () {
                countChars($(this));
            });
        });
        $('#sms_status_form input').each(function () {
            isActiveSMS($(this));
        });
    });

    function isActiveSMS(obj) {

        if ($(obj).attr('checked') === undefined) {
            $(obj).parent().parent().find('textarea').attr('readonly', 'readonly');
        }
        else {
            $(obj).parent().parent().find('textarea').removeAttr('readonly');
        }
    }
<?php echo '</script'; ?>
>


<div class="block">
    <?php echo $_smarty_tpl->getSubTemplate ("_menu_setting.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <div class="page">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'error'=>$_smarty_tpl->tpl_vars['error']->value), 0);?>

        <h1>СМС уведомления</h1>

        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="710" id="sms_status_form">
                <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars["status_id"] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value->id, null, 0);?>
                    <tr>
                        <td valign="middle" align="right" width="450">Отправлять смс при статусе: <b><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</b>       
                            <br/><br/>
                            <label class="p-check"><input type="checkbox"<?php if ($_smarty_tpl->tpl_vars['get_sms']->value[$_smarty_tpl->tpl_vars['status_id']->value]->is_active==1) {?> checked="checked"<?php }?>  name="is_active[<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
]" value="1" onchange="isActiveSMS(this)" id="is_active_<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
" /><em>&nbsp;</em><span>Активный</span></label>
                            <br/>
                            <label class="p-check"><input type="checkbox"<?php if ($_smarty_tpl->tpl_vars['get_sms']->value[$_smarty_tpl->tpl_vars['status_id']->value]->is_email==1) {?> checked="checked"<?php }?>  name="is_email[<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
]" value="1" id="is_email_<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
" /><em>&nbsp;</em><span>Дублировать на email</span></label>

                            <br/><br/>
                            <div class="notice"><div class="count_sms"> &nbsp; </div></div>

                        </td>
                        <td valign="middle" align="left">
                            <textarea name="text[<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
]" style="width: 350px;height: 100px;"><?php echo stripslashes($_smarty_tpl->tpl_vars['get_sms']->value[$_smarty_tpl->tpl_vars['status_id']->value]->text);?>
</textarea>
                        </td>
                    </tr>
                <?php } ?>

                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <input type="hidden" name="submit" value="1" />
                        <button>Сохранить</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div><?php }} ?>
