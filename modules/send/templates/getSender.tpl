{foreach from=$mails item="mail"}
    <tbody class="tbody">
        <tr>
            <td valign="middle" align="left" style="border-bottom: 1px solid #CCCCCC">
                <label class="p-check"><input type="checkbox" value="{$mail->email}" name="mails[]" checked="checked" rel="{$mail->is_mailer}" lang="{$mail->is_mailer_2}" id="user_{$mail->id}"  /><em>&nbsp;</em></label>
            </td>
            <td valign="middle" align="left" style="border-bottom: 1px solid #CCCCCC;">
                {if $mail->name}<label for="user_{$mail->id}">{$mail->name} {$mail->middle_name} {$mail->last_name}</label>{/if}
                <div class="notice"><label for="user_{$mail->id}" style="{*{if $mail->is_mailer == 0} color: #CCCCCC;{else}color: black{/if}*}">{$mail->email}</label></div>
            </td>
            <td valign="middle" align="left" style="border-bottom: 1px solid #CCCCCC">
                {if $mail->is_mailer == 0}
                    <a href="javascript:void(0)" title="Активировать" onclick="if (confirm('Вы действительно хотите разблокировать адрес `{$mail->email}`'))
                                AjaxRequestAsync('list_mail_adress', '{$admin_url}send/list/mail/?is_mailer_active={$mail->id}&show_active=');
                            return false;">
                        <img src="{$url}images/sys/active.png" align="middle" hspace="1" alt="Активировать"></a>
                    {else}
                    <a href="javascript:void(0)" title="Заблокировать" onclick="if (confirm('Вы действительно хотите заблокировать адрес `{$mail->email}`'))
                                AjaxRequestAsync('list_mail_adress', '{$admin_url}send/list/mail/?is_mailer_deactive={$mail->id}');
                                        return false;">
                        <img src="{$url}images/sys/deactive.png" align="middle" hspace="1" alt="Заблокировать"></a>
                    {/if}

                <a href="javascript:void(0)" title="Удалить товар" onclick="if (confirm('Вы действительно хотите отписать от рыссылки `{$mail->email}`'))
                            AjaxRequestAsync('list_mail_adress', '{$admin_url}send/list/mail/?del_id={$mail->id}');
                                    return false;">
                    <img src="{$url}images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить"></a>
            </td>
        </tr>
    </tbody>
{/foreach}
<script type="text/javascript">
    if ($('#type_1').attr('checked')) {
        $('#result').find('input[type=checkbox]').removeAttr('checked');
        $('#result').find('input[type=checkbox][lang=1]').attr('checked', 'checked');
    }
</script>