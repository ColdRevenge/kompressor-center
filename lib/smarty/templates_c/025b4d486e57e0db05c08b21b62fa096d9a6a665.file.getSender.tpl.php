<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-20 17:08:30
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/send/templates/getSender.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158780689155d5df5e069108-35509364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '025b4d486e57e0db05c08b21b62fa096d9a6a665' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/send/templates/getSender.tpl',
      1 => 1439727539,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158780689155d5df5e069108-35509364',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mails' => 0,
    'mail' => 0,
    'admin_url' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55d5df5e0cc004_44425485',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55d5df5e0cc004_44425485')) {function content_55d5df5e0cc004_44425485($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars["mail"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["mail"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["mail"]->key => $_smarty_tpl->tpl_vars["mail"]->value) {
$_smarty_tpl->tpl_vars["mail"]->_loop = true;
?>
    <tbody class="tbody">
        <tr>
            <td valign="middle" align="left" style="border-bottom: 1px solid #CCCCCC">
                <label class="p-check"><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value->email;?>
" name="mails[]" checked="checked" rel="<?php echo $_smarty_tpl->tpl_vars['mail']->value->is_mailer;?>
" lang="<?php echo $_smarty_tpl->tpl_vars['mail']->value->is_mailer_2;?>
" id="user_<?php echo $_smarty_tpl->tpl_vars['mail']->value->id;?>
"  /><em>&nbsp;</em></label>
            </td>
            <td valign="middle" align="left" style="border-bottom: 1px solid #CCCCCC;">
                <?php if ($_smarty_tpl->tpl_vars['mail']->value->name) {?><label for="user_<?php echo $_smarty_tpl->tpl_vars['mail']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['mail']->value->name;?>
 <?php echo $_smarty_tpl->tpl_vars['mail']->value->middle_name;?>
 <?php echo $_smarty_tpl->tpl_vars['mail']->value->last_name;?>
</label><?php }?>
                <div class="notice"><label for="user_<?php echo $_smarty_tpl->tpl_vars['mail']->value->id;?>
" style=""><?php echo $_smarty_tpl->tpl_vars['mail']->value->email;?>
</label></div>
            </td>
            <td valign="middle" align="left" style="border-bottom: 1px solid #CCCCCC">
                <?php if ($_smarty_tpl->tpl_vars['mail']->value->is_mailer==0) {?>
                    <a href="javascript:void(0)" title="Активировать" onclick="if (confirm('Вы действительно хотите разблокировать адрес `<?php echo $_smarty_tpl->tpl_vars['mail']->value->email;?>
`'))
                                AjaxRequestAsync('list_mail_adress', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
send/list/mail/?is_mailer_active=<?php echo $_smarty_tpl->tpl_vars['mail']->value->id;?>
&show_active=');
                            return false;">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/sys/active.png" align="middle" hspace="1" alt="Активировать"></a>
                    <?php } else { ?>
                    <a href="javascript:void(0)" title="Заблокировать" onclick="if (confirm('Вы действительно хотите заблокировать адрес `<?php echo $_smarty_tpl->tpl_vars['mail']->value->email;?>
`'))
                                AjaxRequestAsync('list_mail_adress', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
send/list/mail/?is_mailer_deactive=<?php echo $_smarty_tpl->tpl_vars['mail']->value->id;?>
');
                                        return false;">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/sys/deactive.png" align="middle" hspace="1" alt="Заблокировать"></a>
                    <?php }?>

                <a href="javascript:void(0)" title="Удалить товар" onclick="if (confirm('Вы действительно хотите отписать от рыссылки `<?php echo $_smarty_tpl->tpl_vars['mail']->value->email;?>
`'))
                            AjaxRequestAsync('list_mail_adress', '<?php echo $_smarty_tpl->tpl_vars['admin_url']->value;?>
send/list/mail/?del_id=<?php echo $_smarty_tpl->tpl_vars['mail']->value->id;?>
');
                                    return false;">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить"></a>
            </td>
        </tr>
    </tbody>
<?php } ?>
<?php echo '<script'; ?>
 type="text/javascript">
    if ($('#type_1').attr('checked')) {
        $('#result').find('input[type=checkbox]').removeAttr('checked');
        $('#result').find('input[type=checkbox][lang=1]').attr('checked', 'checked');
    }
<?php echo '</script'; ?>
><?php }} ?>
