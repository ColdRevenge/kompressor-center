<div class="block">

    <div id="breadcrumbs">
        <a href="{$admin_url}tenders/">Тендеры</a>  &raquo;  <span>Просмотр тендера &laquo;{$tender->name}&raquo;</span>
    </div>
    {include file=$template_message message=$message error=$error}

    <h1>Просмотр тендера &laquo;{$tender->name}&raquo;</h1>

    <h2>Номер тендера: <strong>&laquo;{$tender->id}&raquo;</strong></h2>
    <h2>Название тендера: <strong>&laquo;{$tender->name}&raquo;</strong></h2>
    <h2>Ответственный менеджер: <strong>&laquo;{$tender->manager|stripslashes}&raquo;</strong></h2>
    <h2>Дата создания: <strong>&laquo;{$tender->created|date_format:"%d.%m.%Y %H:%m"}&raquo;</strong></h2>
    <h2>Состояние: <strong>&laquo;{if $tender->status == 0}Подготовка{elseif $tender->status == 1}Открыт{elseif $tender->status == 2}Закрыт{if $tender->close_offer_user_id > 0}, {if $tender->close_accept_user == 1}<span>Подтвержден</span>{else}Ожидает подтверждения{/if}{/if}{/if}&raquo;</strong></h2>
{if $tender->status == 1}<h2>Дата открытия: <strong>&laquo;{$tender->change_status|date_format:"%d.%m.%Y %H:%m"}&raquo;</strong></h2>{/if}
{if $tender->status == 2}<h2>Дата закрытия: <strong>&laquo;{$tender->change_status|date_format:"%d.%m.%Y %H:%m"}&raquo;</strong></h2>{/if}
<h2>Плановое время закрытия торгов: <strong>&laquo;{$tender->close_time}&raquo;</strong></h2>
<br/>
<form method="post" action="">
    <input type="hidden" value="1" name="is_start" />
    {if $tender->status == 2 && $tender->close_offer_user_id > 0}
        {* Если в тендере победила заявка пользователя, кнопки не показываем *}
    {else}    
        {if $tender->status == 0}
            <input type="image" name="status" value="1" src="{$sys_images_url}open_t.png" onclick="if (!confirm('Вы действительно хотите открыть тендер &laquo;{$tender->name}&raquo;?')) return false;"/>
            <input type="image" name="status" value="2" src="{$sys_images_url}close_t.png" onclick="if (!confirm('Вы действительно хотите закрыть тендер &laquo;{$tender->name}&raquo;?')) return false;"/>
        {elseif $tender->status == 1}
            <input type="image" name="status" value="0" src="{$sys_images_url}podgotov.png" {if $tender_products_offer_user|@count == 0}onclick="if (!confirm('Вы действительно хотите отправить на подготовку тендер &laquo;{$tender->name}&raquo;?')) return false;"{else}onclick="alert('Ошибка! Невозможно отправить тендер на доработку, т.к. на него уже есть {$tender_products_offer_user|@count} заявки');return false;"{/if}/>
            <input type="image" name="status" value="2" src="{$sys_images_url}close_t.png" onclick="if (!confirm('Вы действительно хотите закрыть тендер &laquo;{$tender->name}&raquo;?')) return false;"/>
        {elseif $tender->status == 2}
            <input type="image" name="status" value="1" src="{$sys_images_url}open_t.png" onclick="if (!confirm('Вы действительно хотите открыть тендер &laquo;{$tender->name}&raquo;?')) return false;"/>
            <input type="image" name="status" value="0" src="{$sys_images_url}podgotov.png" onclick="if (!confirm('Вы действительно хотите отправить на подготовку тендер &laquo;{$tender->name}&raquo;?')) return false;"/>
        {/if}
    {/if}

</form><br/>
<div class="notice"><span class="asterix">*</span>Для запуска тендера нажмите кнопку &laquo;Запустить&raquo;</div>

<br/>
<form method="post" action="" >
    <table cellpadding="4" cellspacing="1" border="0" class="table" width="1000">
        <tbody class="table_header">
            <tr>
                <td valign="middle" align="center" width="150">Добавлен: </td>
                <td valign="middle" align="center">Название товара: </td>
                <td valign="middle" align="center">Необходимое кол-во:</td>
                {*<td valign="middle" align="center">Цена мгновенной победы:</td>*}

            {if $tender->status == 0}<td valign="middle" align="center" width="60">&nbsp;</td>{/if}
        </tr>
    </tbody>
    {foreach from = $tender_products item = 'product' name="product"}
        <tbody class="tbody">
            <tr>
                <td valign="middle" align="center">{$product->created|date_format:"%d.%m.%Y %H:%m"}</td>
                <td valign="middle" align="center">{$product->name|stripslashes}</td>
                <td valign="middle" align="center">
                    {if $tender->status > 0}{*Если тендер открыт или закрыт*}
                            {$product->count|default:0} 
                        {else}
                            <input type="text" value="{$product->count|default:0}" name="count[{$product->product_id}]" maxlength="11" style="width: 50px;text-align: right" /> 
                        {/if}
                    </td>
                    {*<td valign="middle" align="center">
                    {if $tender->status > 0}
                    {$product->price_finish_product|default:0} руб.
                    {else}
                    <input type="text" value="{$product->price_finish_product|default:0}" name="price_finish_product[{$product->product_id}]" maxlength="11" style="width: 70px;text-align: right" /> руб.
                    {/if}
                    </td> *}

                    {if $tender->status == 0}
                        <td valign="middle" align="center">
                            <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить продукт &laquo;{$product->name|stripslashes}&raquo; из тендера? ?','{$admin_url}tenders/products/{$tender->id}/{$product->product_id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" alt="Удалить раздел" /></a>
                        </td>
                    {/if}
                </tr>
            </tbody>
            {/foreach}
                <tbody>
                    <tr>
                        <td valign="middle" align="right" colspan="5" style="height: 22px;">Всего продуктов участвующих в тендере: <strong>{$smarty.foreach.product.iteration}</strong>&nbsp;</td>

                    </tr>
                </tbody>
                {if $tender->status == 0}
                    <tbody>
                        <tr>
                            <td valign="middle" align="right" colspan="5" style="height: 22px;">
                                <input type="image" name="submit" src="{$sys_images_url}save.png"/>
                            </td>
                        </tr>
                    </tbody>{/if}
                </table>
            </form>

            {if $tender->status == 1}<br/>
                <h2>На тендер поступило <strong>{$tender_products_offer_user|@count}</strong> заявок</h2>

                {foreach from=$tender_products_offer_user item="user_product_value" key="user_id"}
                    {if $users_list.$user_id}
                        <h1>Пользователь: {$users_list.$user_id->name}</h1>
                        <h1>Телефон: {$users_list.$user_id->phone}</h1>
                        <h1>E-mail: {$users_list.$user_id->email}</h1>
                        <h1>Логин: {$users_list.$user_id->login}</h1>
                        <table cellpadding="3" cellspacing="1" border="0" class="table" width="1000">
                            <tbody class="table_header">
                                <tr>
                                    <td valign="middle" align="center">Название: </td>
                                    <td valign="middle" align="center">Цена предл.: </td>
                                    <td valign="middle" align="center">Кол-во предл.: </td>
                                    <td valign="middle" align="center">Комментарий: </td>
                                </tr>
                            </tbody>
                            {foreach from=$user_product_value item="product_value"}
                                <tbody class="tbody">
                                    <tr>
                                        <td valign="middle" align="center">{$product_value->product_count}|{$product_value->product_name|stripslashes}</td>
                                        <td valign="middle" align="center">{$product_value->count}</td>
                                        <td valign="middle" align="center">{$product_value->price}</td>
                                        <td valign="middle" align="center">{$product_value->comment|stripslashes}</td>
                                    </tr>
                                </tbody>
                            {/foreach}
                            <tbody class="tbody">
                                <tr>
                                    <td valign="middle" align="right" colspan="4" >
                                        <form method="post" action="">

                                            <input type="hidden" value="{$user_id}" name="user_accept_id" />
                                            <input type="image" src="{$sys_images_url}podtverd.png" onclick="if(!confirm('При подтверждении заявки, остальным заявкам будет присвоен статус  «Отказ», и разосланы почтовые уведомления. Вы действительно хотите подтвердить заявку? ')) return false;" name="accept" />
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    {/if}
                {/foreach}    







            {elseif $tender->status == 2 && $tender->close_offer_user_id > 0} {* Если в тендере победила заявка пользователя, выводим инфу о ней *}
                <br/><h2>В тендере победила заявка:</h2>

                <h1>Пользователь: {$close_user_info->name}</h1>
                <h1>Телефон: {$close_user_info->phone}</h1>
                <h1>E-mail: {$close_user_info->email}</h1>
                <h1>Логин: {$close_user_info->login}</h1>

                <table cellpadding="3" cellspacing="1" border="0" class="table" width="1000">
                    <tbody class="table_header">
                        <tr>
                            <td valign="middle" align="center">Название: </td>
                            <td valign="middle" align="center">Цена предл.: </td>
                            <td valign="middle" align="center">Кол-во предл.: </td>
                            <td valign="middle" align="center">Комментарий: </td>
                        </tr>
                    </tbody>
                    {foreach from=$close_tender_product item="product_value"}
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="center">{$product_value->product_name|stripslashes}</td>
                                <td valign="middle" align="center">{$product_value->count}</td>
                                <td valign="middle" align="center">{$product_value->price}</td>
                                <td valign="middle" align="center">{$product_value->comment|stripslashes}</td>
                            </tr>
                        </tbody>
                    {/foreach}
                </table>
            {/if}

        </div>