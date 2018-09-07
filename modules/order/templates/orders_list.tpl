<div class="block">
    <h1>Поиск заказа</h1>
    {include file=$template_message message=$message error=$error}

    <form method="post" action="">

        <table cellpadding="4" cellspacing="1" border="0" class="table" width="930" style="margin: auto">
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">
                        Дата заказа:
                    </td>
                    <td valign="middle" align="left">
                        с {$start_date_form} до {$end_date_form}
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">
                        Номер заказа:&nbsp;
                    </td>
                    <td valign="middle" align="left">
                        <input type="text" value="{$smarty.post.number}" name="number" style="width: 92px;"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        Статус: 
                        <select name="search_status_id" style="width: 210px;">
                            <option value="-1">Не выбран</option>
                            {foreach from=$status item="status_item"}
                                <option value="{$status_item->id}" {if $smarty.post.search_status_id == $status_item->id}selected="selected"{/if}>{$status_item->name}</option>
                            {/foreach}
                        </select>
                        {if  $is_multi_manager != 0}
                            &nbsp;&nbsp;&nbsp;&nbsp;Менеджер: 
                            <select name="manager_id" style="width: 195px;">
                                <option value="-1">Все менеджеры</option>
                                <option value="0">Не выбран</option>
                                {foreach from=$managers item="manager"}
                                    <option value="{$manager->id}" {if $smarty.post.manager_id == $manager->id}selected="selected"{/if}>{$manager->name|stripslashes}</option>
                                {/foreach}
                            </select>
                        {/if}
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right">
                        Название (или ФИО):&nbsp;
                    </td>
                    <td valign="middle" align="left">
                        <input type="text" value="{$smarty.post.find}" name="find" style="width: 525px;"/>
                    </td>
                </tr>
            </tbody>
            <tbody class="tbody">
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <button name="send">Сформировать</button>
                    </td>
                </tr>
            </tbody>
        </table><br/>


    </form>
    {if $orders|@count}
        <div  id="order_list_block">
            {include file="order_list_ajax.tpl" orders=$orders}
        </div>


    {else}
        <h2>Заказы отсутствуют</h2>
    {/if}
</div>
