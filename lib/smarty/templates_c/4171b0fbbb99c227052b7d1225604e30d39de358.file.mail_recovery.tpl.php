<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-30 12:56:03
         compiled from "/home/lalipop/domains/lalipop.ru/private_html/modules/auth/templates/mail_recovery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29718745155e2d2b71db3c1-43947793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4171b0fbbb99c227052b7d1225604e30d39de358' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/private_html/modules/auth/templates/mail_recovery.tpl',
      1 => 1440928528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29718745155e2d2b71db3c1-43947793',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55e2d2b7223a35_44492008',
  'variables' => 
  array (
    'setting' => 0,
    'url' => 0,
    'set_name' => 0,
    'fio' => 0,
    'login' => 0,
    'password' => 0,
    'shop' => 0,
    'shop_name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55e2d2b7223a35_44492008')) {function content_55e2d2b7223a35_44492008($_smarty_tpl) {?><!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
        <title><?php echo stripslashes($_smarty_tpl->tpl_vars['setting']->value->name);?>
</title>
    </head>
    <body bgcolor="#f6f5f3">
        <table width="700" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border: 1px solid #e8e7e5;">
            <tr>
                <td colspan="3" height="35"></td>
            </tr>
            <tr>
                <td width="35"></td>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr xmlns="">
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="50%" rowspan="2"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
images/fronted/logo.png" border="0"  alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['setting']->value->name);?>
"></a></td>
                                        <td height="12"></td>
                                    </tr>
                                    <tr>
                                        <td width="50%" align="right"></td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr xmlns="">
                            <td height="45"></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr xmlns="">
                                        <td width="48"></td>
                                        <td width="580" valign="top">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <font size="5" face="Arial, sans-serif">Восстановление доступа к сайту &laquo;<?php echo $_smarty_tpl->tpl_vars['set_name']->value;?>
&raquo;</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10"></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="3" face="Arial, sans-serif">Здравствуйте, <?php echo $_smarty_tpl->tpl_vars['fio']->value;?>
! Вы послали запрос на восстановление 
                                                            пароля к вашей учетной записи на сайте &laquo;<?php echo $_smarty_tpl->tpl_vars['set_name']->value;?>
&raquo;.</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div style="height: 15px; font-size: 0">&nbsp;</div>
                                                        <font size="3" face="Arial, sans-serif">
                                                            Ваши учетные данные:
                                                        </font>
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        <font size="2" face="Arial, sans-serif">
                                                            Логин: <b><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</b>
                                                        </font><br/>
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        <font size="2" face="Arial, sans-serif">
                                                            Пароль: <b><?php echo $_smarty_tpl->tpl_vars['password']->value;?>
</b>
                                                        </font>

                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr xmlns="">
                                        <td colspan="2" height="48"></td>
                                    </tr>

                                    <tr xmlns=""><td colspan="2" height="21"></td></tr>
                                    <tr xmlns=""><td width="48"></td>
                                        <td width="580" valign="top">
                                            <font size="3" face="Arial, sans-serif">С уважением,<br> <?php if ($_smarty_tpl->tpl_vars['shop']->value!='farum') {?>магазин&nbsp;<?php }?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" style="text-decoration: none;">
                                                        <font color="#000">&laquo;<?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
&raquo;</font></a></font>
                                        </td>
                                    </tr>
                                    <tr xmlns="">
                                        <td colspan="2" height="21"></td>
                                    </tr>
                                </table>

                            </td>
                            <td width="35"></td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </body>
</html>
<?php }} ?>
