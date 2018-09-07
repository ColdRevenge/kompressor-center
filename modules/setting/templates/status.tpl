<div class="block">
    {include file="_menu_setting.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>Статусы заказов</h1>

        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="510">
                {foreach from=$status item="item"}
                    {assign var="status_id" value=$item->id}
                    <tr>
                        <td valign="middle" align="right" width="300"><input type="text" value="{$item->name}" name="status[{$item->id}]" style="width: 300px;" /></td>
                        <td valign="middle" align="right" width="100"><input type="text" value="{$item->order}" name="order[{$item->id}]" style="width: 100px;" /></td>
                        <td>
                            {if  $item->id > 0 && $item->action != 1}
                                <a href="javascript:void(0)" title="Удалить товар" onclick="setConfirm('Вы действительно хотите удалить раздел??', '{$admin_url}setting/status/del/{$item->id}/');">
                                    <img src="{$url}images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить раздел"></a>
                                {/if}
                        </td>
                    </tr>
                {/foreach}
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <button>Сохранить</button>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <input type="hidden" name="is_edit" value="1" />
        </form>
        <br/><br/> 
        <h2>Добавить статус</h2>

        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="510">
                <tr>
                    <td valign="middle" align="right" width="300"><input type="text" value="" name="status" placeholder="Название статуса" style="width: 300px;" /></td>
                    <td valign="middle" align="right" width="100"><input type="text" value="" name="order" placeholder="Сорт." style="width: 100px;" /></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <button>Добавить</button>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <input type="hidden" name="is_add" value="1" />
        </form>
    </div>
</div>