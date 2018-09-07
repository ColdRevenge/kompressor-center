<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-08-27 10:12:42
         compiled from "/home/lalipop/domains/lalipop.ru/public_html/modules/call_back/templates/mail_call_back.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1393251755deb86ad4d5d3-18976810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e355a0709db8e0130883221402f89d70fc5c3dd' => 
    array (
      0 => '/home/lalipop/domains/lalipop.ru/public_html/modules/call_back/templates/mail_call_back.tpl',
      1 => 1428758079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1393251755deb86ad4d5d3-18976810',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'setting' => 0,
    'url' => 0,
    'mail_header' => 0,
    'mail_text' => 0,
    'name' => 0,
    'phone' => 0,
    'email' => 0,
    'text' => 0,
    'shop_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55deb86adaff47_63967577',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55deb86adaff47_63967577')) {function content_55deb86adaff47_63967577($_smarty_tpl) {?><html>
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
                                                        <font size="5" face="Arial, sans-serif"><?php echo $_smarty_tpl->tpl_vars['mail_header']->value;?>
</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10"></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="3" face="Arial, sans-serif"><?php echo $_smarty_tpl->tpl_vars['mail_text']->value;?>
</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        <?php if ($_smarty_tpl->tpl_vars['name']->value) {?><font size="2" face="Arial, sans-serif">Имя:&nbsp;<b><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</b></font><?php }?>
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        <?php if ($_smarty_tpl->tpl_vars['phone']->value) {?><font size="2" face="Arial, sans-serif">Телефон:&nbsp;<b><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</b></font><div style="height: 5px; font-size: 0">&nbsp;</div><?php }?>
                                                        <?php if ($_smarty_tpl->tpl_vars['email']->value) {?><font size="2" face="Arial, sans-serif">E-mail:&nbsp;<b><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</b></font><?php }?>
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        <?php if ($_smarty_tpl->tpl_vars['text']->value) {?><font size="2" face="Arial, sans-serif">Текст сообщения:&nbsp;<br/><b><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</b></font><?php }?>
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
                                            <font size="3" face="Arial, sans-serif">С уважением,<br>  <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
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
