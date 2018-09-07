<html>
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
                                                        <font size="5" face="Arial, sans-serif">{$mail_header}</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10"></td>
                                                </tr>
                                                <tr>
                                                    <td><font size="3" face="Arial, sans-serif">{$mail_text}</font></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        {if $name}<font size="2" face="Arial, sans-serif">Имя:&nbsp;<b>{$name}</b></font>{/if}
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        {if $phone}<font size="2" face="Arial, sans-serif">Телефон:&nbsp;<b>{$phone}</b></font><div style="height: 5px; font-size: 0">&nbsp;</div>{/if}
                                                        {if $email}<font size="2" face="Arial, sans-serif">E-mail:&nbsp;<b>{$email}</b></font>{/if}
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        {if $text}<font size="2" face="Arial, sans-serif">Текст сообщения:&nbsp;<br/><b>{$text}</b></font>{/if}
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
                                            <font size="3" face="Arial, sans-serif">С уважением,<br>  <a href="{$url}" style="text-decoration: none;">
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
