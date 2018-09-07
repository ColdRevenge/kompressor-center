<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"></meta>
        <title>{$setting->name|stripslashes}</title>
        <link rel="stylesheet" href="{$url}style_ve.css" type="text/css" media="screen" />
    </head>
    <body bgcolor="#f6f5f3">
{if $is_history == 1}     <a href="javascript:void(0)" onclick="parent.document.getElementById('subject').value='{$subject|stripslashes|replace:'"':"&quot;"}';parent.tinyMCE.activeEditor.setContent(document.getElementById('content_tiny').innerHTML); parent.$.fancybox.close()">»спользовать</a> {/if}
        <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border: 1px solid #e8e7e5;padding: 5px 12px;">
            <tr>
                <td id="content_tiny" style="vertical-align: top; text-align: left">
                    {assign var="images_url" value=$url|cat:"images/"}
                    {$messages|replace:'/images/':$images_url}
                </td> 
            </tr>
        </table>
    </body>
</html>
