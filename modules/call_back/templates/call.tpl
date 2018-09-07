<script src="{$url}js/mi.js" type="text/javascript"></script>
<script type="text/javascript">{literal}
    jQuery(function($) {
        $("#phone_mask").mask("+7(999) 999-9999");
    });{/literal}
</script>
{if $is_send_ok == 0}<h1 style='margin-top:0; padding-top:0;'>Перезвони мне</h1>{/if}
{if $is_error == 1}
    <form action="" id="request_form">
        <input type="text" value="{$smarty.post.name}" name="name" />
        <input type="text" value="{$smarty.post.phone}" name="phone" style="background-color: #ffcece;"/>
        <div style="text-align: center"><button class="send" onclick="AjaxFormRequest('request-box', 'request_form', '{$url}call_back/');
                return false;" name="call">Отправить</button></div>
    </form>
{else}
        {if $message_call}
            {*<div id="message_call{if $is_mini_call == 1}_mini{/if}">{$message_call}</div>*}
            <div style="font: 28px Arial;text-align: center;height: 220px;">{$message_call}</div>
        {/if}
{/if}
{if $is_send_ok == 0}
    {include file=$template_message message=$message error=$error}
    <form method="post" action="">
        <table cellpadding="0" cellspacing="3" border="0" style="margin: auto;width: 480px;background-color: #EAEAEA"  class="table_fields modal_table">

            <tr>
                <td valign="middle" align="right" width="120" style="text-align: right">Ваше имя: </td>
                <td valign="middle" align="left" style="text-align: left"><input type="text" class="text" name="name" onfocus="this.className = 'selInput'" onblur = "this.className = ''"  style="width:350px;" value="{$smarty.post.name}" /></td>
            </tr>
            <tr>
                <td valign="middle" align="right" style="text-align: right">Телефон: </td>
                <td valign="middle" align="left" style="text-align: left"><input type="text" class="text" id="phone_mask" name="phone" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'"  style="width:350px;"  value="{$smarty.post.phone}" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td valign="middle" align="right" style="text-align: right">
                    <div style="float: left">
                        <img src="{$lib_url}captcha.php" width="80" height="30" alt="" style="vertical-align: middle;padding-bottom: 10px;border: 1px solid #CCCCCC;background-color: white; cursor: pointer" onclick="this.src = '{$url}lib/captcha.php?x=2'" />
                        <input type="text" name="captcha" style="width:60px;text-align:center" maxlength="5">
                    </div>
                    <div style="float: right">
                        <input type="hidden" name="click" value="1" />
                        <button class="send"></button>
                    </div>
                </td>
            </tr>
        </table>
    </form>
{/if}