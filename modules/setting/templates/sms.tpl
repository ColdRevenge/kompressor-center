<script type="text/javascript">
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
</script>


<div class="block">
    {include file="_menu_setting.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>СМС уведомления</h1>

        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="710" id="sms_status_form">
                {foreach from=$status item="item"}
                    {assign var="status_id" value=$item->id}
                    <tr>
                        <td valign="middle" align="right" width="450">Отправлять смс при статусе: <b>{$item->name}</b>       
                            <br/><br/>
                            <label class="p-check"><input type="checkbox"{if $get_sms.$status_id->is_active == 1} checked="checked"{/if}  name="is_active[{$item->id}]" value="1" onchange="isActiveSMS(this)" id="is_active_{$item->id}" /><em>&nbsp;</em><span>Активный</span></label>
                            <br/>
                            <label class="p-check"><input type="checkbox"{if $get_sms.$status_id->is_email == 1} checked="checked"{/if}  name="is_email[{$item->id}]" value="1" id="is_email_{$item->id}" /><em>&nbsp;</em><span>Дублировать на email</span></label>

                            <br/><br/>
                            <div class="notice"><div class="count_sms"> &nbsp; </div></div>

                        </td>
                        <td valign="middle" align="left">
                            <textarea name="text[{$item->id}]" style="width: 350px;height: 100px;">{$get_sms.$status_id->text|stripslashes}</textarea>
                        </td>
                    </tr>
                {/foreach}

                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <input type="hidden" name="submit" value="1" />
                        <button>Сохранить</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>