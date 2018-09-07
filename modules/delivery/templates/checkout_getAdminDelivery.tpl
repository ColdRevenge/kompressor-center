{if $order_info->id} 
    <br/>
    <h2>CheckOut - информация</h2>
    <table class="table" cellpadding="5" cellspacing="1">
        <tbody class="table_header">
            <tr>
                <td>
                    Дата:
                </td>
                <td>
                    Индекс
                </td>
                <td>
                    Улица
                </td>
                <td>
                    Дом
                </td>
                <td>
                    Корпус
                </td>
                <td>
                    Строение
                </td>
                <td>
                    Квартира
                </td>
                <td>
                    Тип
                </td>
                <td>
                    Стоимость
                </td>
                <td>
                    Сроки
                </td>
            </tr>
        </tbody>
        <tbody class="tbody">
            <tr>
                <td>
                    {$order_info->created|date_format:"%d.%m.%Y %H:%M"} 
                </td>
                <td>
                    {$order_info->city_index}
                </td>
                <td>
                    {$order_info->street}
                </td>
                <td>
                    {$order_info->house}
                </td>
                <td>
                    {$order_info->housing}
                </td>
                <td>
                    {$order_info->building}
                </td>
                <td>
                    {$order_info->appartment}
                </td>
                <td>
                    {$order_info->delivery_type}
                </td>
                <td>
                    {$order_info->delivery_cost}
                </td>
                <td>
                    от {$order_info->delivery_minTerm} до 
                    {$order_info->delivery_maxTerm}
                </td>
            </tr>
        </tbody>
    </table>
{/if}