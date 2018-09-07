<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
        <title>{$setting->name|stripslashes}</title>
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
                                        <td width="50%" rowspan="2"><a href="{$url}"><img src="{$url}images/fronted/logo.png" border="0"  alt="{$setting->name|stripslashes}"></a></td>
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
                                                        <font size="5" face="Arial, sans-serif">Восстановление доступа к сайту &laquo;{$set_name}&raquo;</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10"></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="3" face="Arial, sans-serif">Здравствуйте, {$fio}! Вы послали запрос на восстановление 
                                                            пароля к вашей учетной записи на сайте &laquo;{$set_name}&raquo;.</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div style="height: 15px; font-size: 0">&nbsp;</div>
                                                        <font size="3" face="Arial, sans-serif">
                                                            Ваши учетные данные:
                                                        </font>
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        <font size="2" face="Arial, sans-serif">
                                                            Логин: <b>{$login}</b>
                                                        </font><br/>
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        <font size="2" face="Arial, sans-serif">
                                                            Пароль: <b>{$password}</b>
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
                                            <font size="3" face="Arial, sans-serif">С уважением,<br> {if $shop != 'farum'}магазин&nbsp;{/if}<a href="{$url}" style="text-decoration: none;">
                                                        <font color="#000">&laquo;{$shop_name}&raquo;</font></a></font>
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
